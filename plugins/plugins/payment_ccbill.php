<?php
/**
 * api: eMeeting Dating Software
 * title: CCBIll Callback Plugin
 * description: Allows you to integrate CCBIll into your website.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.ccbill.com
 * license: eMeeting 9.0
 * config:<var name="CCBill[ID]" type="text" class="t1" value="0" title="CCBill Account Number" description="Enter your CCBill Account Number" set="always" /><var name="CCBill[SUB]" type="text" class="t1" value="0" title="CCBill Sub Account Number" description="Enter your CCBill Sub Account Number" set="always" />
 * provides: CCBill
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 5th 2008
 */


///////////////////////////////////////////////////////////////////////////////////////////
// ADMIN AREA FUNCTION
///////////////////////////////////////////////////////////////////////////////////////////
if(defined("A_LANG") && isset($_POST['setting']['CCBill%5BID%5D']) ){ // only display for admin area pages
 
	$data = array();

	$data['Merchant_Name'] 		= "CCBill";
	$data['Merchant_Image'] 	= "http://".$_SERVER['HTTP_HOST']."/images/payment/ccbill.gif"; // not used
	$data['Merchant_Method'] 	= "POST"; // POST OR GET
	$data['Merchant_Gateway'] 	= "https://bill.ccbill.com/jpost/signup.cgi"; // gateway URL, CURL or bank

	$data['accNo'] = $_POST['setting']['CCBill%5BID%5D'];
	$data['subNo'] = $_POST['setting']['CCBill%5BSUB%5D'];

	PluginCCBill($data);

}

///////////////////////////////////////////////////////////////////////////////////////////
// PYMENT CALLBACK (AFTER PAYMENT IS MADE)
///////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['subscription_id']) && is_numeric($_POST['subscription_id']) ){


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
			$DB_MAIL->setSubject("CCBill POSTBACK DATA");
			$DB_MAIL->setHeader('X-Mailer', 'eMeeting Dating Software');
			$result = $DB_MAIL->send(array(ADMIN_EMAIL));
			
			@ini_restore(sendmail_from);

			//<!-- email sent --
 

			$OrderID 	= trim($_POST['custom']);
			$ORDER_PARTS = explode("**", $OrderID);
			$PackageID 	=  $ORDER_PARTS[1];
			$UserID 	=  $ORDER_PARTS[0];
			
			$Email = $_POST['email'];
			$TransID = $_POST['subscription_id'];
			if($_POST['testMode'] ==100){ $_POST['transId']=100;}

			if($Email==""){ $Email="email@email.com"; }			
			if($TransID ==""){ $TransID="123".date('d'); }			

			if($PackageID !="" && $UserID !="" ){ 
			 
				$td = $DB->Row("SELECT id FROM members_billing WHERE transaction_id = ( '".$TransID."' ) LIMIT 1");
				
				if( empty($td) ){
					
					// CHECK PACKAGE DETAILS
					$pak = $DB->Row("SELECT subscription, price, numdays FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");
					
					// DELETE OLD ENTRIES TO KEEP THE SYSTEM CLEAN
					$DB->Update("DELETE FROM members_billing WHERE uid = ( '".$UserID."' ) ");
					
					// ADD ENTRY TO DATABASE
					$DB->Insert("INSERT INTO `members_billing` (`id` ,`uid` ,`packageid` ,`date_upgrade` ,`date_expire` ,`pay_method` ,`running` ,`subscription` ,`bill_email` ,`transaction_id`) 
					VALUES (NULL , '".$UserID."', '".$PackageID."', '".date("Y-m-d H:i:s")."', '".date('Y-m-d H:i:s', strtotime('+'.$pak['numdays'].' days'))."', 'CCBill', 'yes', '".$pak['subscription']."', '".$email."', '".$TransID."')");
					
					// UPGRADE MEMBERS ACCOUNT 
					UpgradeMembersAccount($PackageID, $UserID);

					// EMAIL UPGRADE EMAIL TO MEMBER
					$_POST['username'] = "Member"; // no username postback is available so to save an extra SQL we just user member
					SendTemplateMail($_POST, 2);

					// CHECK THE AFFILIATE SYSTEM
					//CheckAffiliate($UserID, $pak['price']);				
					
				
				}

		
			}

}
///////////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS
///////////////////////////////////////////////////////////////////////////////////////////
function PluginCCBill($data){

	global $DB;

	// CHECK THIS DOESNT ALREADY EXIST

	$Merchant = $DB->Row("SELECT id FROM merchant WHERE name='".$data['Merchant_Name']."' LIMIT 1");

	if(empty($Merchant)){
	
		$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , '".$data['Merchant_Name']."', '', 'yes', '".$data['Merchant_Gateway']."', '".$data['Merchant_Method']."', '".$data['Merchant_Image']."')");
		
		$LASTID = $DB->InsertID();

		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'clientAccnum', '".$data['accNo']."', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'clientSubacc', '".$data['subNo']."', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'formName', '(name)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'custom', '(custom)', 'hidden')");

	}else{

		// already in database so dont do anything

	}

}	



if(!function_exists('UpgradeMembersAccount')){

	function UpgradeMembersAccount($PackageID, $UserID){

	global $DB;
	
		if(stristr($PackageID, 'sms') === FALSE) {
			
			// NORMAL PACKAGE UPGRADE USING PACKAGE ID
			$SmsCheck = $DB->Row("SELECT icon, SMS_credits FROM package WHERE pid = ('".$PackageID."') LIMIT 1");
			
			if($SmsCheck['icon'] =="SMS" && is_numeric($SmsCheck['SMS_credits']) ){
			
				$Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$SmsCheck['SMS_credits']." WHERE uid=".$UserID);
				
			}else{
				if(is_numeric($PackageID)){
					$Upgrade_Record = $DB->Row("UPDATE members SET packageid=".$PackageID." WHERE id= ( '".$UserID."' ) LIMIT 1");
				}
				if(is_numeric($SmsCheck['SMS_credits'])){
					$Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$SmsCheck['SMS_credits']." WHERE uid = ( '".$UserID."' ) LIMIT 1");
				}
			}
			
			
		}else{
		
		// SPECIAL PACKAGE UPGRADE
		
			$cc = explode("--",$PackageID);
			// do SMS credits
			if($cc[0] == "sms"){
				if(is_numeric($SmsCheck['SMS_credits'])){
					$Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$cc[1]." WHERE uid = ( '".$UserID."' ) LIMIT 1");
				}
			}elseif($cc[0] == "highlight"){
			
				$Upgrade_Record = $DB->Row("UPDATE members SET highlight='on'  WHERE id= ( '".$UserID."' ) LIMIT 1");
			
			}elseif($cc[0] == "featured"){
			
				$Upgrade_Record = $DB->Row("UPDATE files SET featured='yes'  WHERE id= ( '".$UserID."' ) LIMIT 1");
				
			}
						
		}
	
	
		return $Upgrade_Record;
	}	
}

/*
customer_fname == Joe
customer_lname == Blogs
email == info@joeblogs.com
username == 
password == 
productDesc == 
price == $5.00(USD) for 30 days then $5.00(USD) recurring every 30 days 
subscription_id == 0209131101000004034 
denialId == 
clientAccnum == 9382292 
clientSubacc == 0000 
address1 == 5 Noth Main Street 
city == Jamestown 
state == 
country == US 
phone_number == 
zipcode == 14701 
start_date == 2008-05-11 07:59:51 
referer == 
ccbill_referer == 
reservationId == 
referringUrl == http://www.<website>.com/inc/payment/upgrade_process.php 
reasonForDecline == 
reasonForDeclineCode == 
formName == 144cc 
cardType == MASTERCARD 
responseDigest == 
custom == 1430**8 
typeId == 0000000835 
initialPrice == 5 
initialPeriod == 30 
recurringPrice == 5 
recurringPeriod == 30 
rebills == 99 
initialFormattedPrice == $5.00 
recurringFormattedPrice == $5.00 
ip_address == 64.66.111.60 
currencyCode == 840 
baseCurrency == 840 
accountingAmount == 5.00 
*/
?>