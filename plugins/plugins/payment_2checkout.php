<?php
/**
 * api: eMeeting Dating Software
 * title: 2Checkout Callback Plugin
 * description: Allows you to integrate 2checkout (2co) into your website.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting LLC
 * url: http://www.2checkout.com/
 * license: eMeeting 9.0
 * provides: 2checkout
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 2012
 */



///////////////////////////////////////////////////////////////////////////////////////////
// PAYMENT CALLBACK (AFTER PAYMENT IS MADE)
///////////////////////////////////////////////////////////////////////////////////////////


//if(isset($_POST['payment_status']) && $_POST['payment_status'] == "COMPLETE" ){


if(isset($_POST['message_type'])  ){


	
	
	$string="";
	foreach($_POST as $key => $value){
		 $string .= $key." == ".$value." <br>";
	}

	
			// SEND POSTBACK DATA TO ADMIN FOR STORING
			$text = "";
			$html = $string;
			$DB_MAIL = new htmlMimeMail();
			$DB_MAIL->setHtml($html, $text);
			$DB_MAIL->setReturnPath(ADMIN_EMAIL);
			$DB_MAIL->setFrom('"'.ADMIN_EMAIL.'" <'.ADMIN_EMAIL.'>');
			$DB_MAIL->setSubject("2CHECKOUT POSTBACK DATA");
			$DB_MAIL->setHeader('X-Mailer', 'eMeeting Dating Software');

			//$result = $DB_MAIL->send(array('info@datingscripts.co.uk'));
			//@ini_restore(sendmail_from);

			$result = $DB_MAIL->send(array(ADMIN_EMAIL));
			@ini_restore(sendmail_from);


		$OrderInfo 	= trim($_POST['vendor_order_id']);
		$ORDER_PARTS = explode("**", $OrderInfo);
		$PackageID 	=  $ORDER_PARTS[1];
		$UserID 	=  $ORDER_PARTS[0];

		$refno = trim($_POST['sale_id']);			
       
		// Transaction is complete. It means that the amount was paid successfully.
						
		 AddOrder($UserID, $PackageID, "2checkout", $_POST['customer_email'], $refno);
	
}	


?>