<html>
<head>
<title>
get_customer_details.php
</title>
</head>

<body style="background: url(https://www.arnpriorlibrary.ca/uploads/1/8/2/8/18281027/interior_2_orig.jpg);background-size: 100% 100%;">
	<center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<style type="text/css">
	tab1 { padding-left: 4em; }
	tab2 { padding-left: 1em; }
</style>
<form action="insert_customer_details.php" method="POST">
	
<!--
<b>First Name:</b>
<tab2><input type="text" name="f_name"></tab2>
<p>
<b>Last Name:</b>
<tab2><input type="text" name="l_name"></tab2>
<p>
<b>Mobile:</b>
<tab2><input type="text" name="mobile"></tab2>
<p>
<b>Email:</b>
<tab2><input type="text" name="email"></tab2>
<p>
<b>Address:</b>
<tab2><input type="text" name="address"></tab2>
<p>
<input type="submit" value="Add New Customer">

-->



<table id="customer_table" align=center>
   <tr><td><input type="text" name="f_name" placeholder="ENTER FIRST NAME"></td></tr>
   <tr><td><input type="text" name="l_name" placeholder="ENTER LAST NAME"></td></tr>
   <tr><td><input type="text" name="mobile" placeholder="ENTER MOBILE NUMBER "></td></tr>
   <tr><td><input type="text" name="email" placeholder="ENTER EMAIL ID"></td></tr>
   <tr><td><input type="text" name="address" placeholder="ENTER ADDRESS"></td></tr>
   <tr><td><input type="submit" value="SUBMIT"></td></tr>


   
</table>

</form>

</body>

<b><tab1><a href="main.php"> Main Page </a></p></tab1></b>
</center>
</html>
