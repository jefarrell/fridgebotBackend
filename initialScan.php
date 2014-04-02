<?php


 mysql_connect("mysql.xxxxxxx.com", username, password) or die(mysql_error()); 
 mysql_select_db(db_name) or die(mysql_error()); 

//Get variable 'code' from Processing sketch, which should be ID Card Number
if (isset($_GET['code'])) { 

	
	$user_id = $_GET['code'];
	
	//Search database for cardNumber, returning Name, netID, and Card Number
	$checkUserID = mysql_query("SELECT cardNumber, netID, Name FROM foodEntries WHERE cardNumber = '$user_id' limit 1")  or die ('MySQL Error: '.mysql_error());

		//If it's not there, send back the Card Number to Processing
		if(mysql_num_rows($checkUserID) == 0) {
			echo $user_id;
		} else {
			//If it is there, return Name, netID, and Card Number to Processing
			$results = mysql_fetch_row($checkUserID);
			
			echo $results[0].','.$results[1].','.$results[2];
		}
 
	}
?>