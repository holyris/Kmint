#encoding: utf-8

require 'kickscraper'
require 'date'
require 'mysql2'

c = Kickscraper.client

begin
    # conn = Mysql2::Client.new(:host => "localhost", :username => "kmint", :password => "kmint123", :database => "kmint")
    conn = Mysql2::Client.new(:host => "164.132.195.3", :username => "thebault", :password => "thebault", :database => "kmint")

    results = conn.query("select titre, lien from crowdfunding")

    
    results.each do |row|
        puts projet = c.search_projects(row["titre"]).first
        puts titre = conn.escape(row["titre"])          #   on echappe le texte pour eviter des problemes lors de l'update
        engagement = projet.pledged
        goal = projet.goal
        engagement = (engagement*100)/goal
        puts engagement = engagement.round              #   engagement en pourcentage
        deadline = Time.at(projet.deadline).to_s        #   convertion en quelque chose de plus lisible        
        deadline = DateTime.parse(deadline)             #   rend la donnee exploitable 
        puts timeleft = (deadline - DateTime.now).to_i  #   date de fin moins date actuelle converti en int
        puts etat = projet.state

        conn.query("UPDATE crowdfunding SET engagement = '"+engagement.to_s+"', deadline = '"+timeleft.to_s+"', etat = '"+etat.to_s+"' where titre = '"+titre+"'")


    end


    results.free

rescue Mysql2::Error => e
    puts e.errno
    puts e.error


ensure
    conn.close if conn
end