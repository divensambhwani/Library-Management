#!/bin/bash

printf "\nStep 1: MongoDB:"
printf "\nMongo Username: "
read user
printf "\nMongodb password: "
read -s pass
printf "\nMongo Database name: "
read db


printf "\nEntering Mongo DB\"\n-\n"

mongo  "$db" -u "$user" -p "$pass" --eval "load('make_coll_ordparts1.js')"

mongoexport -d "$db" -u "$user" -p "$pass" -c AUTHOR --type=csv --out author.csv --fields A_Name,A_Last,Email
mongoexport -d "$db" -u "$user" -p "$pass" -c ID --type=csv --out id.csv --fields _id,price
mongoexport -d "$db" -u "$user" -p "$pass" -c MAGAZINE --type=csv --out magazine.csv --fields _id,Title,Year_Publish,Volume

mongo  "$db" -u "$user" -p "$pass" --eval "db.ID.drop()"
mongo  "$db" -u "$user" -p "$pass" --eval "db.MAGAZINE.drop()"

#mysql -u "$user" --password=$pass "$db" -e "drop table if exists MAGAZINE"
#mysql -u "$user" --password=$pass "$db" -e "drop table if exists AUTHOR"
#mysql -u "$user" --password=$pass "$db" -e "drop table if exists ITEM"
mysql -u "$user" --password=$pass "$db" -e "load data local infile 'author.csv' into table AUTHOR fields terminated by ',' lines terminated by '\n' (A_Name,A_Last,Email)"
mysql -u "$user" --password=$pass "$db" -e "load data local infile 'id.csv' into table ITEM fields terminated by ',' lines terminated by '\n' (ID,Price)"
mysql -u "$user" --password=$pass "$db" -e "load data local infile 'magazine.csv' into table MAGAZINE fields terminated by ',' lines terminated by '\n' (Maganize_ID,Title,Year_Publish,Volume)"

rm author.csv id.csv magazine.csv

