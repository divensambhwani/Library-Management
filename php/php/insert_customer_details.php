<html>
<head>
<title>
insert_customer_details.php
</title>
</head>

<body>

<?php

$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$address = $_POST["address"];

require("/home/student_2018_fall/dk_sambhwani/db.php");


$table = "CUSTOMER";

$link = mysqli_connect($host, $user, $pass , $db);
if (!$link) die("Couldn't connect to MySQL");

mysqli_select_db($link, $db)
        or die("Couldn't connect to $db: ".mysqli_error($link));

if (strlen($f_name)==0 || strlen($l_name)==0 || strlen($mobile)==0 || strlen($email)==0)
{
	print "<p><p>Please input First Name, Last Name, Email and Mobile Number";
    
}

    

else 
{
    if (strlen($address)==0) $address = "null";

	$result = mysqli_query($link, "select * from $table where fname='$f_name' and lname='$l_name'");
    $num_rows = mysqli_num_rows($result);
  if($num_rows>0)
  {
      echo "<form action=\"\" method=\"POST\">Customer with the same name exists!Do you want to continue?
                    <br> <input type=\"submit\" name=\"Yes\" value=\"yes\"> <input type=\"submit\" name=\"No\" value=\"no\"> 
                    <input type=\"hidden\" name=\"f_name\" value=\"".$f_name."\">
                    <input type=\"hidden\" name=\"l_name\" value=\"".$l_name."\">
                    <input type=\"hidden\" name=\"mobile\" value=\"".$mobile."\">
                    <input type=\"hidden\" name=\"email\" value=\"".$email."\">
                    <input type=\"hidden\" name=\"address\" value=\"".$address."\">
              </form>";

                 if(isset($_POST['Yes']))
                 {

                    $query = mysqli_query($link, "insert into $table  (fname,lname,mobile_no,address,email) values ('$f_name','$l_name','$mobile','$address','$email')");
                    if (!$query) 
                    {
                      print "SQL error: ".mysqli_error($link);
                    }
                    else
                    { 
                      $message = "Data Inserted";
                      echo "<script type='text/javascript'>alert('$message');</script>";
                       header("location: main.php");
                    }
                 }
                 elseif (isset($_POST['No'])) 
                 {
                   $message = "Data not Inserted";
                   echo "<script type='text/javascript'>alert('$message');</script>";
                   header("location: main.php");
                 }
  }
  else
  {

                    $query = mysqli_query($link, "insert into $table  (fname,lname,mobile_no,address,email) values ('$f_name','$l_name','$mobile','$address','$email')");
                    if (!$query) 
                    {
                      print "SQL error: ".mysqli_error($link);
                    }
                    else
                    { 
                      $message = "Data Inserted";
                      echo "<script type='text/javascript'>alert('$message');</script>";
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
