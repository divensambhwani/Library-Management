<html>
<head>
<title>
get_article_details.php
</title>
</head>
<body>
<!-- <body style="background: url(https://www.arnpriorlibrary.ca/uploads/1/8/2/8/18281027/interior_2_orig.jpg);background-size: 100% 100%;"> -->
	<center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<style type="text/css">
	tab1 { padding-left: 4em; }
	tab2 { padding-left: 1em; }
</style>
<form action="insert_article_details.php" method="POST">

   <?php

require("/home/student_2018_fall/dk_sambhwani/db.php");

$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) die("Couldn't connect to MySQL");
//print "Successfully connected to server<p>";

mysqli_select_db($link, $db)
   or die("Couldn't open $db: ".mysqli_error($link));
#print "Successfully selected database \"$db\"<p>";
?>
<!--
<b>Article ID:</b>
<tab2><input type="text" name="article_id"></tab2>
<p>
<b>Author ID:</b>
<tab2><input type="text" name="author_id"></tab2>
<p>
<b>Volume No:</b>
<tab2><input type="text" name="volume_no"></tab2>
<p>
<b>Magazine ID:</b>
<tab2><input type="text" name="magazine_id"></tab2>
<p>
<b>Title:</b>
<tab2><input type="text" name="title"></tab2>
<p>
<b>Page No:</b>
<tab2><input type="text" name="page_no"></tab2>
<p>
<input type="submit" value="Add New Article">


--->
<table id="customer_table" align=center>
   <tr><td><input type="text" name="article_id" placeholder="ENTER ARTICLE ID"></td></tr>
   <tr><td><input type="text" name="author_id" placeholder="ENTER AUTHOR ID"></td></tr>
   <tr><td><input type="text" name="volume_no" placeholder="ENTER VOLUME NO"></td></tr>
   <tr><td><input type="text" name="magazine_id" placeholder="ENTER MAGAZINE ID"></td></tr>
   <tr><td><input type="text" name="title" placeholder="ENTER TITLE"></td></tr>
   <tr><td><input type="text" name="page_no" placeholder="ENTER PAGE NUMBER"></td></tr>
   <tr><td>
      <select name="author_name">
<?php 
$sql = mysqli_query($link, "SELECT author_name FROM author_new");
while ($row = $sql->fetch_assoc()){
$temp=$row['author_name'];
echo "<option value=".$temp.">" . $row['author_name'] . "</option>";
//   $sqlt = "SELECT author_name FROM (author_new)";
//  $queryt = mysqli_query ($link,$sqlt);
// while ($resultt = mysqli_fetch_array($queryt, MYSQL_ASSOC)){
//         echo "<option value='" .$resultt['author_name']."'>" . $resultt['author_name'] . "</option>";
}
   
?>
</select>


   </td></tr>
   <tr><td><input type="submit" value="SUBMIT"></td></tr>




   
</table>


</form>

</body>

<b><a href="main.php"> Main Page </a></p></tab1></b>
</center>
</html>
