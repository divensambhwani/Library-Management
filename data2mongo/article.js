var auto_id = 0;
 var X = db.articles_all.find({}, {}).toArray();

 for (var i = 0; i < X.length; i++) {

        var row = {"magazine_id":X[i].m_id,
                   "name":X[i].journal};
        db.magazine_temp.insert(row);
        auto_id++;
}

// var X = db.magazine_temp.aggregate([{ $group:{_id: { magazine_id:"$magazine_id", name:"$name"}}},
//                       { $out : "magazine" }])

var X = db.magazine_temp.aggregate([{ $group:{_id: { magazine_id:"$magazine_id", name:"$name"}}}]).toArray();
for (var i = 0; i < X.length; i++) {

        var row = {"magazine_id":X[i]._id.magazine_id,
                   "name":X[i]._id.name};
        db.magazine.insert(row);
}


var X = db.articles_all.find({}, {}).toArray();

for (var i = 0; i < X.length; i++) {

        var row = {"volume_no":X[i].volume, "magazine_id":X[i].m_id, "publish_year":X[i].year};
        db.volume_temp.insert(row);
}

// var X = db.volume_temp.aggregate([{ $group:{_id: { volume_no:"$volume_no",magazine_id:"$magazine_id", publish_year:"$publish_year"}}},
//                       { $out : "volume_temp_2" }])

var X = db.volume_temp.aggregate([{ $group:{_id: { volume_no:"$volume_no",magazine_id:"$magazine_id", publish_year:"$publish_year"}}}]).toArray();
for (var i = 0; i < X.length; i++) {

        var row = {"volume_no":X[i]._id.volume_no,"magazine_id":X[i]._id.magazine_id,
                   "publish_year":X[i]._id.publish_year};
        db.volume.insert(row);
}

// var auto_id = 0;

// var X = db.articles_all.find({}, {}).toArray();

// for (var i = 0; i < X.length; i++) {
//         var row = {"author_id":auto_id,"lname":X[i].author};
//         db.author.insert(row);
//         auto_id++;
    
// }
var X = db.volume_temp.aggregate([{ $group:{_id: { volume_no:"$volume_no",magazine_id:"$magazine_id", publish_year:"$publish_year"}}}]).toArray();
for (var i = 0; i < X.length; i++) {

        var row = {"volume_no":X[i]._id.volume_no,"magazine_id":X[i]._id.magazine_id,
                   "publish_year":X[i]._id.publish_year};
        db.volume.insert(row);
}


var auto_id = 0;
var X = db.articles_all.find({}, {}).toArray();

for (var i = 0; i < X.length; i++) {

        var row = {"article_id":auto_id, "author_name":X[i].author, "volume_no":X[i].volume, 
                   "magazine_name":X[i].journal, "title":X[i].title, "page_no":X[i].pages};
        db.ARTICLE_temp.insert(row);
        auto_id++;
}


// mongoexport --db dk_sambhwani -p A00425915 -u dk_sambhwani --collection magazine --type csv --out /home/student_2018_fall/dk_sambhwani/mongo/project/magazine.csv --fields magazine_id,name;
//mongoexport --db dk_sambhwani -p A00425915 -u dk_sambhwani --collection AUTHOR --type csv --out /home/student_2018_fall/dk_sambhwani/mongo/project/AUTHOR.csv --fields author_id,author_name,email_id,phone;
//mongoexport --db dk_sambhwani -p A00425915 -u dk_sambhwani --collection ARTICLE_temp --type csv --out /home/student_2018_fall/dk_sambhwani/mongo/project/ARTICLE_temp.csv --fields article_id,author_name,volume_no,magazine_name,title,page_no;
// mongoimport -d dk_sambhwani -p A00425915 -u dk_sambhwani -c articles_all --file articles_50.json --jsonArray
//load data local infile 'author.csv' into table author;
// //load data local infile 'article.csv' into table article;
// db.collection.update({}, {$rename: {'XUknown': 'XString'}}, false, true);
// db.magazine.update({}, {$rename: {'_id.magazine_name': 'magazine_name'}}, false, true)
