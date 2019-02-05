<html>
<head>
<title>
insert_signup_details.php
</title>
</head>

<body>

<?php

$name = $_POST["name"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];

require("/home/student_2018_fall/dk_sambhwani/db.php");


$table = "login";

$link = mysqli_connect($host, $user, $pass , $db);
if (!$link) die("Couldn't connect to MySQL");

mysqli_select_db($link, $db)
        or die("Couldn't connect to $db: ".mysqli_error($link));

if (strlen($email)==0 || strlen($password)==0)
{
	print "<p><p>Please input email and password";
    
}
    

else {
    if (strlen($name)==0) $name = "null";
    if (strlen($mobile)==0) $mobile = "null";
    $query = mysqli_query($link, "insert into $table  values ('$email','$name','$mobile','$password')");

    if (!$query) print "SQL error: ".mysqli_error($link);
}

mysqli_close($link);

print "<p>Connection closed"
?>

<p>
<b><a href="main.php">MAIN menu </a></b></p>
<b><a href="get_signup_details.php">Signup page </a></b><p>
<b><a href="login.php"> Log in </a></b>

</body>

</html>
