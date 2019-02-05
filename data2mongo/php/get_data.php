<html>
<head>
<title>
GET DATA.php
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
<form action="view_data.php" method="POST">
<?php
function prtable($table) {
	print "<select name=name>\n";
	
	while ($a_row = mysqli_fetch_row($table)) {
		
		foreach ($a_row as $field) print "<option value=".$field.">$field</option>";
		
	}
	print "</select>";

}

require("/home/student_2018_fall/dk_sambhwani/db.php");

$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) die("Couldn't connect to MySQL");
//print "Successfully connected to server<p>";

mysqli_select_db($link, $db)
	or die("Couldn't open $db: ".mysqli_error($link));
#print "Successfully selected database \"$db\"<p>";

$result = mysqli_query($link, "show tables");
$num_rows = mysqli_num_rows($result);
print "Total No. Of Tables: $num_rows<p>";

prtable($result);

mysqli_close($link);
?>
<script>
function myFunction() {
alert((document.getElementById('name').value));
document.location.href="www.google.com";
}
</script>
   <tr><td><input type="submit" value="SHOW DATA"></td></tr>
   
</table>
<br><br><br><br>
<a href="main.php"><b>Home</b></a>

</form>
</div>
</body>
</center>
</html>
