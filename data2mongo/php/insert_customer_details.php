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
   	echo '<script language="javascript">';
	echo 'var retVal = confirm("Do you want to continue ?");';
	 $retVal= "<script>document.writeln(retVal);</script>";
	echo $_GET['retVal'];
	echo 'if( retVal == true ){';
	echo 'console.log("true");';
	if($retVal)
	$query = mysqli_query($link, "insert into $table  (fname,lname,mobile_no,address,email)values ('$f_name','$l_name','$mobile','$address','$email')");

    		// if (!$query) print "SQL error: ".mysqli_error($link);

	echo 'alert("DATA INSERTED");}';

	

	echo 'if( retVal == false ){';
	echo 'console.log("false");';
		echo 'alert("DATA NOT INSERTED");}';

	#echo 'console.log(retVal);'
	echo '</script>';
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
                    // alert("I am an alert box!");
                    $message = "Data Inserted";
                    echo "<script type='text/javascript'>alert('$message');</script>";

                }

   }



}

/*else
{
	if (strlen($address)==0) $address = "null";
	$result = mysqli_query($link, "select * from $table where fname='$f_name' and lname='$l_name'");
    $num_rows = mysqli_num_rows($result);
   if($num_rows>0)

   {
   		var r = confirm("SURE?");
		if (r == true)
		{
			$query = mysqli_query($link, "insert into $table  (fname,lname,mobile_no,address,email)values ('$f_name','$l_name','$mobile','$address','$email')");

    		if (!$query) print "SQL error: ".mysqli_error($link);
    		echo "<script>alert('DATA  INSERTED');
			</script>";
		}
		else
		{
			echo "<script>alert('DATA NOT INSERTED');
			</script>";

		}
   }
   else
   {
   		$query = mysqli_query($link, "insert into $table  (fname,lname,mobile_no,address,email)values ('$f_name','$l_name','$mobile','$address','$email')");

    		if (!$query) print "SQL error: ".mysqli_error($link);

   }
   
}*/



mysqli_close($link);


print "<p>Connection closed"
?>

<p>
<b><a href="main.php">Home</a></b></p>


</body>

</html>
