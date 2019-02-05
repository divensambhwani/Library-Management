<html>
<head>
<title>
get_article_details.php
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
<br><br>
<style type="text/css">
	tab1 { padding-left: 4em; }
	tab2 { padding-left: 1em; }
</style>
<form action="insert_article_details_2.php" method="POST">
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
   <tr><td><input type="text" name="author_name" placeholder="ENTER AUTHOR NAME"></td></tr>
   <tr><td><input type="text" name="magazine_name" placeholder="ENTER MAGAZINE NAME"></td></tr>
   <tr><td><input type="text" name="volume_no" placeholder="ENTER VOLUME NO"></td></tr>
   <tr><td><input type="text" name="title" placeholder="ENTER TITLE"></td></tr>
   <tr><td><input type="text" name="page_no" placeholder="ENTER PAGE NUMBER"></td></tr>
   <tr><td><input type="submit" value="SUBMIT"></td></tr>


   
</table>


</form>

</body>

<b><a href="main.php"> Main Page </a></p></tab1></b>
</center>
</html>
