
printf "\nEnter SQL credentials to create new tables into MySql \n"
printf "\n username: "
# dk_sambhwani
read username
printf "\npassword: "
# A00425915
read -s pass
printf "\nDatabase: "
# dk_sambhwani
read db
printf "\nName of SQL file: "
# new_tables
read sql_file

mysql --password=$pass -u "$username" $db < "$sql_file.sql"
printf "Executed successfully"


printf "\nEnter MongoDB Credentials:\n"
printf "\nusername: "
# dk_sambhwani
read username
printf "\npassword: "
# A00425915
read -s pass
printf "\nDatabase: "
# dk_sambhwani
read db

printf "\nEnter name of JSON files:\n"
printf "\nName of JSON file for Collection-Author: "
# author
read author_file
printf "\nName of JSON file for Collection-Article: "
# articles_50
read article_file

#Dropping collctions loaded in MongoDB
mongo  $username -u "$username" -p "$pass" --eval "db.author.drop()"
mongo  $username -u "$username" -p "$pass" --eval "db.ARTICLE_temp.drop()"
mongo  $username -u "$username" -p "$pass" --eval "db.articles_all.drop()"
mongo  $username -u "$username" -p "$pass" --eval "db.magazine.drop()"
mongo  $username -u "$username" -p "$pass" --eval "db.magazine_temp.drop()"
mongo  $username -u "$username" -p "$pass" --eval "db.volume.drop()"
mongo  $username -u "$username" -p "$pass" --eval "db.volume_temp.drop()"

mongoimport -d "$db" -p "$pass" -u "$username"  -c "author" --file "$author_file.json" --jsonArray
mongoimport -d "$db" -p "$pass" -u "$username" -c "articles_all" --file "$article_file.json" --jsonArray

#Loading Java Script file which takes only those fields from article which are needed
mongo  dk_sambhwani -u dk_sambhwani -p A00425915 --eval "load('article.js')"


printf "\n All 3 operations completed, Thankyou! \n"

