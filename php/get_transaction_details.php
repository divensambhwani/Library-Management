<html>
<head>
<title>
get_transaction_details.php
</title>


<link href="form_style.css" type="text/css" rel="stylesheet"/>

<script type="text/javascript">
function add_row()
{
 $rowno=$("#transaction_table tr").length;
 $rowno=$rowno+1;
 $("#transaction_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='item_id[]' placeholder='Enter ITEM ID'></td><td><input type='text' name='quantity[]' placeholder='Enter QUANTITY'></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
</head>


<body style="background: url(https://www.arnpriorlibrary.ca/uploads/1/8/2/8/18281027/interior_2_orig.jpg);background-size: 100% 100%;">
	<div id="wrapper">
	<div id="form_div">
	<center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<style type="text/css">
	tab1 { padding-left: 4em; }
	tab2 { padding-left: 1em; }
</style>
<form action="insert_transaction_details.php" method="POST">
<b>Customer ID:</b>
<tab2><input type="text" name="customer_id"></tab2>
<b>Transaction ID:</b>
<tab2><input type="text" name="transaction_id"></tab2>
<p>

<table id="transaction_table" align=center>
   <tr id="row1">
    <td><input type="text" name="item_id[]" placeholder="ENTER ITEM ID"></td>
    <td><input type="text" name="quantity[]" placeholder="ENTER QUANTITY"></td>
   </tr>
  </table>


<input type="button" onclick="add_row()" value="ADD ROW">
<input type="submit" value="SUBMIT">
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="jquery.js"></script> -->

</body>

<b><tab1><a href="main.php"> Main Page </a></p></tab1></b>
</center>
</html>


