<html>
<head>
<title>
View Data
</title>
</head>
<body>
<center>
	<br><br><br><br><br><br><br><br><br><br><br><br>

<?php
$name = $_POST["name"];
function prtable($table) {
	print "<table border=1>\n";
	while($a_field = mysqli_fetch_field($table))
	{
		print "<th>$a_field->name</th>";
	}
	while ($row = mysqli_fetch_row($table)) {
		print "<tr>";
		foreach ($row as $field) print "<td>$field</td>";
		print "</tr>";
	}
	print "</table>";
}

require("/home/student_2018_fall/dk_sambhwani/db.php");

$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) die("Couldn't connect to MySQL");

mysqli_select_db($link, $db)
	or die("Couldn't open $db: ".mysqli_error($link));

$result = mysqli_query($link, "select * from $name");
$num_rows = mysqli_num_rows($result);
print "Total no of rows: $num_rows<p>";

prtable($result);

mysqli_close($link);

print "<p><p>Connection closed"
?>

<p>
<a href="main.php"> MAIN menu</a>
</center>
</body>

</html>

