<?php

 mysql_connect("mysql.xxxxxxx.com", username, password) or die(mysql_error()); 
 mysql_select_db(db_name) or die(mysql_error()); 

//Get loadUser variable from Processing.  Should contain Card Number, email address, name, and netID
if (isset($_GET['loadUser'])) { 

	$userInfo = $_GET['loadUser'];

	//break out the entry so it can be entered into database
	list($cardNum, $email, $userName, $barcodeID) = explode(',', $userInfo, 4);

	//run query to insert the 4 entries into database
	$updateQuery = mysql_query ("INSERT INTO foodEntries (cardNumber, netID, Name, Barcode)
			VALUES ('$cardNum', '$email', '$userName', '$barcodeID')");


	}	

 ?>