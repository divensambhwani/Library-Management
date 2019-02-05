<html>
<head>
<title>
get_transaction_details.php
</title>


<link rel="stylesheet" type="text/css" href="lib_styles.css">

<script type="text/javascript">
  function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
function add_row()
{
 $rowno=$("#transaction_table tr").length;
 $rowno=$rowno+1;
 $("#transaction_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='item_id[]' placeholder='Enter ITEM ID'></td><td><input type='text' name='quantity[]' placeholder='Enter QUANTITY'></td></tr>");
}

</script>
</head>


<body>
<div>
<img src="sclib.jpg" class="img2">
<br><br><h2><u><b>Halifax Science Library</b></u></h2>
</div>
<center>
<br><br><br>
<div class="menubox">
<br><br><br><br>
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
    <td><b>Quantity:</b>
  <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
  <input type="number" name="quantity[]" id="number" value="0" />
  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></td>
   </tr>
  </table>


<input type="button" onclick="add_row()" value="ADD ROW">
<input type="submit" value="SUBMIT"><br><br>
 <b><a href="main.php">Home</a></b>
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



</body>


</center>
</html>


