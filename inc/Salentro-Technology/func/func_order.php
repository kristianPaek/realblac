<?php 
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
function FindUserID($OrderNumber){
	/*
	 This functoin simply seperates the values passed from the merchant 
	 to determin the member ID and the package ID
	 [0] = member id
	 [1] = packageid
	*/
	$pieces = explode("**", $OrderNumber);		  
	return $pieces[0];
}
function FindSubscriptionPackageID($OrderNumber){
	/*
	 This functoin simply seperates the values passed from the merchant 
	 to determin the ID for the membership package. (gold package, silver etc)
	*/
	$pieces = explode("**", $OrderNumber);		  
	return $pieces[1];
}
function FindSubscriptionPeriod($PackageID){

	global $DB;
	
	$Upgrade_Period = $DB->Row("SELECT numdays AS result FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");

	return $Upgrade_Period['result'];
}
function FindSubscriptionPrice($PackageID){
	/* 
		This function determins the price for the package as listed on the website before payment is made	
	*/
	global $DB;
	
	$Upgrade_Price = $DB->Row("SELECT price AS result FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");
	
	return $Upgrade_Price['result'];
}

function CheckAffiliate($UserID, $Price){

	/* AFFILIATE SYSTEM INTEGRATION */
	
	global $DB;	
	// check to see if this user signed up via an affiliate code
	$found = $DB->Row("SELECT affiliate_id FROM aff_signup  WHERE member_id= ( '".$UserID."' ) LIMIT 1");
	
	if(isset($found['affiliate_id'])){
	
		// WORK OUT COMMISION RATE
		
		$result = $DB->Row("SELECT content FROM aff_pages WHERE page='commission' LIMIT 1");
		
		$result['content'];
		$COMMISSION_RATE = ($result['content']/100 * $Price);
		
		$DB->Insert("INSERT INTO `aff_payment` (`member_id` ,`affiliate_id` ,`total_due` ,`status` ,`date` )VALUES ('".$UserID."', '".$found['affiliate_id']."', '".$COMMISSION_RATE."', 'unapproved', '".date("Y-m-d")."')");
	}
	
	return;
}

function UpgradeMembersAccount($PackageID, $UserID){
	/* 
		This function updates the package Id on the members database record	
	*/
	global $DB;
	
	if(stristr($PackageID, 'sms') === FALSE) {
	
		$Upgrade_Record = $DB->Row("UPDATE members SET packageid= ( '".$PackageID."' ) WHERE id= ( '".$UserID."' ) LIMIT 1");
		
	}else{
		$cc = explode("--",$PackageID);
		// do SMS credits
		if($cc[0] == "sms"){
		
			$Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$cc[1]." WHERE uid='".$UserID."' LIMIT 1");
			
		}elseif($cc[0] == "highlight"){
		
			$Upgrade_Record = $DB->Row("UPDATE members SET highlight='on' WHERE id='".$UserID."' LIMIT 1");
		
		}elseif($cc[0] == "featured"){
		
			$Upgrade_Record = $DB->Row("UPDATE files SET featured='yes' WHERE uid='".$UserID."' LIMIT 1");
			
		}else{
		
		}
		
	}
	
	
	return $Upgrade_Record;
}
function AddMemberSubscription($PackageID, $UserID, $Bill_Info){
	/* 
		This function adds the new subscription to the billing table in the database	
	*/
	$today_date=date("y-m-d");
		
	## INSERT VALUES INTO THE DATABASE

	 return $result;
}
function PreventMultipleEntries($UserID, $PackageID){

	/* 
		This function determins if the user has already been upgraded today to prevent multiple entires into the database	
	*/
	global $DB;
	
	$Upgrade_Record = $DB->Row("SELECT count(id) AS result FROM members WHERE id= ( '".$UserID."' ) AND packageid= ( '".$PackageID."' )");

	return $Upgrade_Already['result'];
}

function AddOrder($UserID, $PackageID, $pay_period, $method, $email){

	global $DB;
	
	// IS THIS PACKAGE A SUBSCRIPTION? 
	// IF SO WE MUST NOT N
	$pak = $DB->Row("SELECT subscription FROM package WHERE pid= ( '".$PackageID."' )");	
	
	$DB->Row("INSERT INTO `members_billing` ( `id` , `uid` , `packageid` , `date_upgrade` , `date_expire` , `pay_method` , `running` , `subscription` , `bill_email` )
	VALUES (NULL , '".$UserID."', '".$PackageID."', '".date("Y-m-d H:i:s")."', '".date('Y-m-d H:i:s', strtotime('+'.$pay_period.' days'))."', '".$method."', 'yes', '".$pak['subscription']."', '".$email."')");
	
	return 1;
}
?>