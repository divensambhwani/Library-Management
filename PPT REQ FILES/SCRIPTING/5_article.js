
// MAGAZINE

var auto_id = 0;
 var X = db.articles_all.find({}, {}).toArray();

 for (var i = 0; i < X.length; i++) {

        var row = {"magazine_id":X[i].m_id,
                   "name":X[i].journal};
        db.magazine_temp.insert(row);
        auto_id++;
}


var X = db.magazine_temp.aggregate([{ $group:{_id: { magazine_id:"$magazine_id", name:"$name"}}}]).toArray();
for (var i = 0; i < X.length; i++) {

        var row = {"magazine_id":X[i]._id.magazine_id,
                   "name":X[i]._id.name};
        db.magazine.insert(row);
}

// VOLUME

var X = db.articles_all.find({}, {}).toArray();

for (var i = 0; i < X.length; i++) {

        var row = {"volume_no":X[i].volume, "magazine_id":X[i].m_id, "publish_year":X[i].year};
        db.volume_temp.insert(row);
}


var X = db.volume_temp.aggregate([{ $group:{_id: { volume_no:"$volume_no",magazine_id:"$magazine_id", publish_year:"$publish_year"}}}]).toArray();
for (var i = 0; i < X.length; i++) {

        var row = {"volume_no":X[i]._id.volume_no,"magazine_id":X[i]._id.magazine_id,
                   "publish_year":X[i]._id.publish_year};
        db.volume.insert(row);
}


// AUTHOR

var auto_id = 0;

var X = db.articles_all.find({}, {}).toArray();

for (var i = 0; i < X.length; i++) {
        var row = {"author_id":auto_id,"author_name":X[i].author};
        db.author_temp.insert(row);
        auto_id++;
    
}
var X = db.volume_temp.aggregate([{ $group:{_id: { volume_no:"$volume_no",magazine_id:"$magazine_id", publish_year:"$publish_year"}}}]).toArray();
for (var i = 0; i < X.length; i++) {

        var row = {"author_id":X[i]._id.author_id,"author_name":X[i]._id.author_name};
        db.author.insert(row);
}

// ARTICLE

var auto_id = 0;
var X = db.articles_all.find({}, {}).toArray();

for (var i = 0; i < X.length; i++) {

        var row = {"article_id":auto_id, "author_name":X[i].author, "volume_no":X[i].volume, 
                   "magazine_name":X[i].journal, "title":X[i].title, "page_no":X[i].pages};
        db.ARTICLE_temp.insert(row);
        auto_id++;
}

