<?php

 mysql_connect("mysql.xxxxxxx.com", username, password) or die(mysql_error()); 
 mysql_select_db(db_name) or die(mysql_error()); 



if (isset($_GET['barcodeNum'])) { 

	$barcode=$_GET['barcodeNum'];


	$sqlUpdate = mysql_query("UPDATE foodEntries SET foodTaken=NOW() where Barcode = '$barcode'");

	}
?>