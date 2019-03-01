require 'kickscraper'
require 'date'
require 'mysql2'

c = Kickscraper.client

begin
    conn = Mysql2::Client.new(:host => "localhost", :username => "kmint", :password => "kmint123", :database => "kmint")

    page = []
    pagenb = 100
    page[0] = c.recently_launched_projects
    for n in 1..pagenb
        page[n] = c.load_more_projects if c.more_projects_available?
        for i in 0..11
            
            if page[n][i].country == "FR"
                
                title = page[n][i].name
                description = page[n][i].blurb
                url = page[n][i].urls.web.project
                img = page[n][i].photo.full
                engagement = page[n][i].pledged
                goal = page[n][i].goal
                engagement = (engagement*100)/goal
                engagement = engagement.round              #   engagement en pourcentage
                deadline = Time.at(page[n][i].deadline).to_s    #   convertion en quelque chose de plus lisible        
                deadline = DateTime.parse(deadline)             #   rend la donnee exploitable 
                timeleft = (deadline - DateTime.now).to_i  #   date de fin moins date actuelle converti en int
                creator = page[n][i].creator.name
                category = page[n][i].category.name
                conn.query("Insert into crowdfunding values ('"+conn.escape(title.to_s)+"','"+conn.escape(description.to_s)+"','"+url.to_s+"','"+img.to_s+"','"+engagement.to_s+"','"+timeleft.to_s+"','"+conn.escape(creator.to_s)+"','"+category.to_s+"', CURRENT_TIMESTAMP)")
                

            end
        end
    end


rescue Mysql2::Error => e
    puts e.errno
    puts e.error


ensure
    conn.close if conn
end



