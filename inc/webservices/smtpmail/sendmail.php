<?php
include 'library.php'; // include the library file
include "classes/class.phpmailer.php"; // include the class name

	$email = 'iqbal.salentro@gmail.com';
	$mail	= new PHPMailer; 
	$mail->IsSMTP(); 
	$mail->SMTPSecure = 'ssl';
	$mail->Host = SMTP_HOST; 
	$mail->Port = SMTP_PORT; 
	$mail->SMTPAuth = true; 
	$mail->Username = SMTP_UNAME; 
	$mail->Password = SMTP_PWORD; 
	$mail->AddReplyTo("no-reply@workrockers.com", "Workrockers Team"); //reply-to address
	$mail->SetFrom("no-reply@workrockers.com", "WorkRockers Team"); 
	$mail->Subject = "Salentro SMTP Mail"; 
	//$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line, 
	$mail->AddAddress($email, "WorkRockers"); //To address who will receive this email
	$mail->MsgHTML("<b>Hi, your first SMTP mail has been received. Great Job!.. <br/><br/></b>"); 

	$send = $mail->Send(); //Send the mails

?>
 
