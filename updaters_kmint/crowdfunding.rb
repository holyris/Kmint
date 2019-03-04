# encoding: utf-8

require 'kickscraper'
require 'date'
require 'mysql2'

c = Kickscraper.client

begin
    conn = Mysql2::Client.new(:host => "localhost", :username => "kmint", :password => "kmint123", :database => "kmint")
    # conn = Mysql2::Client.new(:host => "164.132.195.3", :username => "thebault", :password => "thebault", :database => "kmint")

    results = conn.query("select titre, lien from crowdfunding")

    
    results.each do |row|
        projet = c.search_projects(row["titre"]).first  #   prend le premier projet de la recherche
        titre = conn.escape(row["titre"]);              #   On echappe pour eviter des problemes lors de l'insert
        engagement = projet.pledged
        goal = projet.goal
        engagement = (engagement*100)/goal              #   conversion en pourcentage
        engagement = engagement.round                   
        deadline = Time.at(projet.deadline).to_s        #   conversion en quelque chose de plus lisible        
        deadline = DateTime.parse(deadline)             #   rend la donnee exploitable 
        timeleft = (deadline - DateTime.now).to_i       #   date de fin moins date actuelle converti en int
        etat = projet.state

        conn.query("UPDATE crowdfunding SET engagement = '"+engagement.to_s+"', deadline = '"+timeleft.to_s+"', etat = '"+etat.to_s+"' where titre = '"+titre+"'")


    end


    results.free

rescue Mysql2::Error => e
    puts e.errno
    puts e.error


ensure
    conn.close if conn
end