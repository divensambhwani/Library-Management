<html>
<head>
<title>
GET DATA.php
</title>
</head>

<body style="background: url(https://www.arnpriorlibrary.ca/uploads/1/8/2/8/18281027/interior_2_orig.jpg);background-size: 100% 100%;">
	<center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<style type="text/css">
	tab1 { padding-left: 4em; }
	tab2 { padding-left: 1em; }
</style>
<?php
function prtable($table) {
	print "<table border=1>\n";
	while ($a_row = mysqli_fetch_row($table)) {
		print "<tr>";
		foreach ($a_row as $field) print "<td>$field</td>";
		print "</tr>";
	}
	print "</table>";
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
print "Total no of rows: $num_rows<p>";

prtable($result);

mysqli_close($link);
?>

<form action="view_data.php" method="POST">
<!--
<b>Table Name:</b>
<tab2><input type="text" name="name"></tab2>
<p>
<input type="submit" value="SHOW DATA">
-->

<table id="data_table" align=center>
   <tr><td><input type="text" name="name" placeholder="ENTER TABLE NAME"></td></tr>
   <tr><td><input type="submit" value="SHOW DATA"></td></tr>


   
</table>

</form>

</body>

<b><a href="main.php"> Main Page </a></p></tab1></b>
</center>
</html>
