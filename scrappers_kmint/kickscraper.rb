require 'kickscraper'
require 'mysql'

# c = Kickscraper.client

# array = c.recently_launched_projects
# array2 = c.load_more_projects if c.more_projects_available?
# for j in 0..11
# 	# puts array[j].photo.full
# 	puts array[j].category.name
# end

begin
    con = Mysql.new '164.132.195.3', 'kmint', 'kmint123'
    puts con.get_server_info
    rs = con.query 'SELECT VERSION()'
    puts rs.fetch_row    
    
rescue Mysql::Error => e
    puts e.errno
    puts e.error
    
ensure
    con.close if con
end



# page = []
# pagenb = 30
# page[0] = c.recently_launched_projects
# for n in 1..pagenb
# 	page[n] = c.load_more_projects if c.more_projects_available?
# 	for i in 0..11
		 
# 		if page[n][i].country == "FR"

# 			puts title = page[n][i].name
# 			puts description = page[n][i].blurb
# 			puts url = page[n][i].urls.web.project
# 			puts img = page[n][i].photo.full
# 			puts engagement = page[n][i].pledged
# 			puts goal = page[n][i].goal
# 			puts startline = page[n][i].launched_at
# 			puts deadline = page[n][i].deadline
# 			puts creator = page[n][i].creator.name
# 			puts category = page[n][i].category.name
			

			

# 		end
# 	end
# end




