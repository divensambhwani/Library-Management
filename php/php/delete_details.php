<html>
<head>
<title>
delete_details.php
</title>
<link rel="stylesheet" type="text/css" href="lib_styles.css">
</head>

<body>
<div>
<img src="sclib.jpg" class="img2">
<br><br><h2><u><b>Halifax Science Library</b></u></h2>
</div>
	<center>
<br><br><br>
<div class="menubox">
<br><br><br>

<?php

$transaction_no = $_POST["transaction_no"];


require("/home/student_2018_fall/dk_sambhwani/db.php");


$table1 = "TRANSACTION";
$table2 = "TRANSACTION_BILL";


$link = mysqli_connect($host, $user, $pass , $db);
if (!$link) die("Couldn't connect to MySQL");

mysqli_select_db($link, $db)
        or die("Couldn't connect to $db: ".mysqli_error($link));

if (strlen($transaction_no)==0)
{
	print "<p><p>Please input Transaction No";
    
}

    

else 
{
    $query3 = mysqli_query($link, "select * from $table1 where transaction_no='$transaction_no'");
     $num_rows = mysqli_num_rows($query3);
    if($num_rows == 0)
    {
        echo "<script>alert('Incorrect Transaction NO');
        </script>";   
    }
    if($num_rows>0)
    {
        $query1 = mysqli_query($link, "delete from $table1 WHERE transaction_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()
                            and transaction_no='$transaction_no'");  

    $query3 = mysqli_query($link, "select * from $table1 where transaction_no='$transaction_no'");
    $num_rows = mysqli_num_rows($query3);
    if($num_rows == 0)
    {
        $query2 = mysqli_query($link, "delete from $table2 where transaction_no = '$transaction_no'"); 
        $temp = mysqli_num_rows($query2); 
        if (!$query2) 
                {
                    print "SQL error: ".mysqli_error($link);
                }
                else 
                {
                    $message = "Data Deleted";
                    echo "<script type='text/javascript'>alert('$message');</script>";

                }

    }
    if($num_rows == 1)
    {
        echo "<script>alert('Items returned after 30 day of purchase are not accepted');
        </script>";
    }
    }

}



mysqli_close($link);

print "<p>Connection closed"
?>

<p>
<b><a href="main.php">Home</a></b></p>


</body>

</html>
