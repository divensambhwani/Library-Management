<html>
<head>
<title>
insert_customer_details.php
</title>
</head>

<body>

<?php

$article_id = $_POST["article_id"];
$author_id = $_POST["author_id"];
$volume_no = $_POST["volume_no"];
$magazine_id = $_POST["magazine_id"];
$title = $_POST["title"];
$page_no = $_POST["page_no"];

require("/home/student_2018_fall/dk_sambhwani/db.php");


$table = "ARTICLE";

$link = mysqli_connect($host, $user, $pass , $db);
if (!$link) die("Couldn't connect to MySQL");

mysqli_select_db($link, $db)
        or die("Couldn't connect to $db: ".mysqli_error($link));

if (strlen($article_id)==0 || strlen($author_id)==0 || strlen($volume_no)==0 || strlen($magazine_id)==0 || strlen($title)==0 || strlen($page_no)==0)
{
	print "<p><p>Please input data in all fields";
    
}
else
{
            $pk_void = mysqli_query($link, "select * from $table where article_id='$article_id' and magazine_id='$magazine_id'");
                $num_rows_pk = mysqli_num_rows($pk_void);
                if($num_rows_pk > 0)
                {
                    echo "<script>alert('Article id is already issued for this magazines  !');
                    </script>";
                 }
                else
                {

                    $magazine_check = mysqli_query($link, "select * from MAGAZINE where magazine_id='$magazine_id'");
                    $num_rows_magazine = mysqli_num_rows($magazine_check);
                    if($num_rows_magazine == 0)
                    {
                        echo "<script>alert('No magazine found with such ID !');
                        </script>";
                    }
                    else
                    {

                       $volume_check = mysqli_query($link, "select * from VOLUME where volume_no='$volume_no' and magazine_id='$magazine_id'");
                        $num_rows_volume = mysqli_num_rows($volume_check);
                         if($num_rows_volume == 0)
                         {
                            echo "<script>alert('No volume found for this magazine !');
                          </script>";
                         }
                         else
                         {

                                $author_check = mysqli_query($link, "select * from AUTHOR where author_id='$author_id'");
                                $num_rows_author = mysqli_num_rows($author_check);
                                if($num_rows_author == 0)
                               {
                                echo "<script>alert('No Author found with this Auhtor ID !');
                                </script>";
                               }
                         }
                    }
                }



                    


                if($num_rows_pk == 0 and $num_rows_magazine == 1 and $num_rows_volume == 1 and $num_rows_author == 1) 
                {
    
                 $query = mysqli_query($link, "insert into $table values ('$article_id','$author_id','$volume_no','$magazine_id','$title','$page_no')");

                if (!$query) 
                {
                    print "SQL error: ".mysqli_error($link);
                }
                else
                {
                    // alert("I am an alert box!");
                    $message = "Data Inserted";
                    echo "<script type='text/javascript'>alert('$message');</script>";

                }
}

}


mysqli_close($link);

print "<p>Connection closed"
?>

<p>
<b><a href="main.php">MAIN menu </a></b></p>


</body>

</html>
