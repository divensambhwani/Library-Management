<html>
<head>
<title>
insert_transaction_details.php
</title>
</head>

<body>

<?php

$customer_id = $_POST["customer_id"];
$transaction_id = $_POST["transaction_id"];
$item_id = $_POST["item_id"];
$quantity = $_POST["quantity"];


require("/home/student_2018_fall/dk_sambhwani/db.php");


$table = "TRANSACTION_BILL";

$link = mysqli_connect($host, $user, $pass , $db);
if (!$link) die("Couldn't connect to MySQL");

mysqli_select_db($link, $db)
        or die("Couldn't connect to $db: ".mysqli_error($link));


$sum=0;
 for($i=0;$i<count($item_id);$i++)
 {
  if($item_id[$i]!="" && $quantity[$i]!="")
  {
  	#$temp='$item_id[$i]';
  	$result = mysqli_query($link, "SELECT price FROM ITEM WHERE item_id = '$item_id[$i]'");
  	 $price = mysqli_fetch_row($result);
  	 foreach( $price as $a)
  	 {
  	 	  	$item_price=$quantity[$i]*$a;
  	 }
 	 $sum=$sum+$item_price;
		$query = mysqli_query($link, "insert into $table values ('$customer_id','$transaction_id','$item_id[$i]','$quantity[$i]','$item_price')");

    		if (!$query) print "SQL error: ".mysqli_error($link);

  }
 }

$DC=0;
 $query = mysqli_query($link,"SELECT SUM(ITEM_PRICE) 
FROM TRANSACTION_BILL A
JOIN TRANSACTION B
ON A.TRANSACTION_NO=B.TRANSACTION_NO
WHERE  CUSTOMER_ID='$customer_id' AND B.TRANSACTION_DATE BETWEEN DATE_SUB(NOW(), INTERVAL 5 YEAR) AND NOW()
GROUP BY CUSTOMER_ID");

$output = mysqli_fetch_row($query);
    foreach( $output as $a)
    {   

        if ($a >= 100 and $a <= 200)
        {
          $DC=1;
        }
        else if ($a >= 201 and $a <= 300)
        {
          $DC=2;
        } 
          else if ($a >= 301 and $a <= 400)
        {
          $DC=3;
        } 
          else if ($a >= 400 and $a <= 500)
        {
          $DC=4;
        } 
          else if ($a >= 501)
        {
          $DC=5;
        }   
    }

    $sum=$sum*(1-2.5*$DC/100);

$query = mysqli_query($link, "insert into TRANSACTION values ('$transaction_id',curdate(),'$DC','$sum')");

        
        if (!$query) 
                {
                    print "SQL error: ".mysqli_error($link);
                }
                else
                {
                    $message = "Data Inserted";
                    echo "<script type='text/javascript'>alert('$message');</script>";

                }

mysqli_close($link);
print "<p>Connection closed"
?>

<p>
<b><a href="main.php">MAIN menu </a></b></p>


</body>

</html>
