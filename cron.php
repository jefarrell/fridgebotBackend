<?php

require 'PHPMailerAutoload.php';

function sendMail($netId) {
	$mail = new PHPMailer();

	$mail->isSMTP();                                     // Set mailer to use SMTP
	$mail->Host = hostname;  							 // Specify main and backup server     *********
	$mail->SMTPAuth = true;                              // Enable SMTP authentication
	$mail->Username = username; 					     // SMTP username        ********
	$mail->Password = password;                          // SMTP password
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;                            

	$mail->From = from;
	$mail->FromName = fromName;
	$mail->addAddress($netId);  				// Add a recipient     ********  should be netID from database
	$mail->addReplyTo(replyTo);


	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	$mail->isHTML(true);                                  

	$mail->Subject = 'You Forgot Your Food!';
	$mail->Body    = 'Hey there!  It seems like you forgot to eat your food in the ITP refrigerator.  You should go eat it.  Or, maybe you could give it away to another student.';
	$mail->AltBody = 'Hey there!  It seems like you forgot to eat your food in the ITP refrigerator.  You should go eat it.  Or, maybe you could give it away to another student.';

	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}

	echo 'Message has been sent';
}

 mysql_connect("mysql.xxxxxxx.com", username, password) or die(mysql_error()); 
 mysql_select_db(db_name) or die(mysql_error()); 


	
	//Get entry and checkout times
	$checkTime = mysql_query("SELECT UNIX_TIMESTAMP(foodEntered) as foodEntered, UNIX_TIMESTAMP(foodTaken) as foodTaken, netID FROM foodEntries")  or die ('MySQL Error: '.mysql_error());

	while($row = mysql_fetch_assoc($checkTime)) {
		if( $row['foodTaken'] == 0 && $row['foodEntered'] + 172800 < time() ) {
			echo $row['netID'];
			sendMail($row['netID']);
		}
	}


?>