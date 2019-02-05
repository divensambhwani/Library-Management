
printf "\nENTER MONGODB CREDENTIALS "
printf "\nusername: "
# dk_sambhwani
read username
printf "\npassword: "
# A00425915
read -s pass
printf "\nDatabase: "
# dk_sambhwani
read db

#EXPORT COLLECTIONS TO CSV
mongoexport --db "$db" -p "$pass" -u "$username"  --collection author --type csv --out /home/student_2018_fall/dk_sambhwani/mongo/project/AUTHOR.csv --fields author_id,author_name,email_id,phone;
mongoexport --db "$db" -p "$pass" -u "$username"  --collection magazine --type csv --out /home/student_2018_fall/dk_sambhwani/mongo/project/magazine.csv --fields magazine_id,name;
mongoexport --db "$db" -p "$pass" -u "$username"  --collection ARTICLE_temp --type csv --out /home/student_2018_fall/dk_sambhwani/mongo/project/ARTICLE_temp.csv --fields article_id,author_name,volume_no,magazine_name,title,page_no;
mongoexport --db "$db" -p "$pass" -u "$username"  --collection volume --type csv --out /home/student_2018_fall/dk_sambhwani/mongo/project/volume.csv --fields volume_no,magazine_id,publish_year;



printf "\nEnter SQL credentials to insert  data  into article table \n"
printf "\n username: "
# dk_sambhwani
read username
printf "\npassword: "
# Diven08#
read -s pass
printf "\nDatabase: "
# dk_sambhwani
read db


#IMPORT DATA INTO SQL SERVER USING CSV FILES CREATED ABOVE
mysql -u "$user" --password=$pass "$db" -e "load data local infile 'AUTHOR.csv' into table AUTHOR fields terminated by ',' lines terminated by '\n' (author_id,author_name,email_id,phone)"
mysql -u "$username" --password=$pass "$db" -e "load data local infile 'magazine.csv' into table MAGAZINE fields terminated by ',' lines terminated by '\n' IGNORE 1 LINES (magazine_id,name)"
mysql -u "$username" --password=$pass "$db" -e "load data local infile 'ARTICLE_temp.csv' into table ARTICLE_temp fields terminated by ',' lines terminated by '\n' IGNORE 1 LINES (article_id,author_name,volume_no,magazine_name,title,page_no)"
mysql -u "$username" --password=$pass "$db" -e "load data local infile 'volume.csv' into table VOLUME fields terminated by ',' lines terminated by '\n' IGNORE 1 LINES (volume_no,magazine_id,publish_year)"



printf "\nName of SQL file: "
# article
read sql_file

#CREATES ARTICLE TABLE JOING ARTICLE TEMP TO AUTHOR AND MAGAZINE FOR ID'S
mysql --password=$pass -u "$username" $db < "$sql_file.sql"
printf "Executed successfully"

