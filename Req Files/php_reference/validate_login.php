<html>
<head>
<title>
insert_signup_details.php
</title>
</head>

<body>

<?php

$email = $_POST["email"];
$password = $_POST["password"];

require("/home/student_2018_fall/dk_sambhwani/db.php");
$table = "login";

$link = mysqli_connect($host, $user, $pass , $db);
if (!$link) die("Could not connect to Database");

mysqli_select_db($link, $db)
        or die("Could not open $db:".mysqli_error($link));

$result = mysqli_query($link, "SELECT password FROM login WHERE email = '$email'");


if (!$result)
     print("ERROR: ".mysqli_error($link));
else {
    $output = mysqli_fetch_row($result);
    foreach( $output as $a)
    {   

        if ($a == $password)
                print "Account logged in</b>";
        else
                print "incorrect password";
            
    }

}

mysqli_close($link);

print "<p>Connection closed."
?>

<p>
<a href="main.php"> back to MAIN menu </a>

</body>

</html>
