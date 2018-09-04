<?php

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function ChangeDo($DoCall, $values = false, $obj=false){

	global $DB;


	## make data safe
	$values = array_map('eMeetingInput', $values);

	$DoArray = array('join','login','edit','password'); // list of acceptable calls


	## Check the verification code
	if(isset($obj) && $DoCall=="login" && D_REGISTER_IMAGE ==1){
	if (!$obj->validRequest($values['code'])) {

			return $GLOBALS['_LANG_ERROR']['_invalidCode'];

	} }

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
		
		case "edit": {
				
		$DB->Update("UPDATE aff_members SET
		
												`username` ='".strip_tags($values['j1'])."',
												`password` ='".strip_tags($values['j2'])."',
												`firstname` ='".strip_tags($values['j3'])."',
												`lastname` ='".strip_tags($values['j4'])."',
												`businessname` ='".strip_tags($values['j5'])."',
												`address` ='".strip_tags($values['j6'])."',
												`street` ='".strip_tags($values['j7'])."',
												`town_city` ='".strip_tags($values['j8'])."',
												`state_county` ='".strip_tags($values['j9'])."',
												`zip_post` ='".strip_tags($values['j11'])."',
												`country` ='".strip_tags($values['j10'])."',
												`telephone` ='".strip_tags($values['j12'])."',
												`fax` ='".strip_tags($values['j13'])."',
												`email` ='".strip_tags($values['j14'])."',
												`website` ='".strip_tags($values['j15'])."',
												`payment_to`='".strip_tags($values['j16'])."' WHERE id= ( '".$_SESSION['aff_uid']."' ) LIMIT 1");
												
					return $GLOBALS['LANG_AFFILIATE'][1]."**1";
				
		} break;
				
		case "login": {
		

					$SwtchThis = CheckLogin($values['username'], $values['password']);
					
					switch($SwtchThis){
							
						case "active": {				
									header("Location: ".DB_DOMAIN."index.php?dll=affiliate&sub=summary");
									exit();
						} break;
						
						case "suspended": {
									return $GLOBALS['LANG_AFFILIATE'][2];
						} break;
						
						case "failed": {
									return $GLOBALS['LANG_AFFILIATE'][5];
						} break;
					}
					
								
		} break;


			case "password": {

					if(strlen($values['email']) < 5){					
						return $GLOBALS['LANG_AFFILIATE'][13];						
					}else{
										
						switch(ForgottenPassword($values['email'])){						
							case "invalid": {							
								return $GLOBALS['LANG_AFFILIATE'][12];							
							} break;							
							case "complete": {							
								return $GLOBALS['LANG_AFFILIATE'][14];							
							} break;
						}
					}
			
			} break;
			
				
		case "join": {					
							switch(ValidateAccount($values)){
								
								case "username": {
								
									return $GLOBALS['LANG_AFFILIATE'][3];
								
								} break;

								case "email": {
								
									return $GLOBALS['LANG_AFFILIATE'][4];
								
								} break;

								case "invalid_email": {
								
									return $GLOBALS['LANG_AFFILIATE'][5];
								
								} break;
								
								case "password": {
								
									return $GLOBALS['LANG_AFFILIATE'][6];
								
								} break;
								
								case "username_short": {
								
									return $GLOBALS['LANG_AFFILIATE'][7];
								
								} break;
								
								case "username_chars": {
								
									return $GLOBALS['LANG_AFFILIATE'][8];
								
								}break;
								
								case "password_lenght": {
								
									return $GLOBALS['LANG_AFFILIATE'][9];
								
								} break;
								
								case "field_empty": {
								
									return $GLOBALS['LANG_AFFILIATE'][10];
								
								} break;

																																
								case "complete": {
								
										$DB->Insert("INSERT INTO `aff_members` (
										`joined` ,
										`username` ,
										`password` ,
										`firstname` ,
										`lastname` ,
										`businessname` ,
										`address` ,
										`street` ,
										`town_city` ,
										`state_county` ,
										`zip_post` ,
										`country` ,
										`telephone` ,
										`fax` ,
										`email` ,
										`website` ,
										`payment_to` 
										)
										VALUES ('".date("Y-m-d")."', '".strip_tags($values['j1'])."', '".strip_tags($values['j16'])."', '".strip_tags($values['j2'])."', '".strip_tags($values['j3'])."', '".strip_tags(trim($values['j4']))."', '".strip_tags(trim($values['j5']))."', '".strip_tags(trim($values['j6']))."', '".strip_tags(trim($values['j7']))."', '".strip_tags(trim($values['j8']))."', '".strip_tags(trim($values['j9']))."', '".strip_tags(trim($values['j10']))."', '".strip_tags(trim($values['j11']))."', '".strip_tags(trim($values['j12']))."', '".strip_tags(trim($values['j13']))."', '".strip_tags(trim($values['j14']))."', '".strip_tags(trim($values['j15']))."')");
									
									$userid = $DB->InsertID();
									$DB->Insert("UPDATE aff_members SET total_clicks='0',total_registered='0' WHERE id=".$userid);
									
										// SEND THEM AN EMAIL TO CONFIRM THEIR REGISTRATION DETAILS
										$data['email'] = strip_tags(trim($values['j13']));
										$data['username'] = strip_tags(trim($values['j1']));
										$data['password'] = strip_tags(trim($values['j16']));
										SendTemplateMail($data, 32);
										// SEND THE ADMIN AN EMAIL TO CONFIRM SIGNUP
											$data['email'] = ADMIN_EMAIL;	
											SendTemplateMail($data, 31);
	 
										header("location: ".DB_DOMAIN."index.php?dll=affiliate&sub=login&errorid=".$GLOBALS['LANG_AFFILIATE'][11]."**1&sub=login"); exit();
										
								} break;				
								
					} break;
				}}	
	}
	
	return "error_invalid_call";	
}


############################################################
#################### FUNCTIONS #############################

function CheckLogin($username, $password){
		
		/*
			THIS FUNCTION IS TO VALIDATE THE MEMBERS LOGIN DETAILS
			THIS ALSO CALLED THE SESSION HANDEL AND SETS THE USER
			ACCOUNT PERMISSIONS
		
		*/
		
		global $DB;
		
		$username = trim(strip_tags($username));
		$password = trim(strip_tags($password));

		$sql = "SELECT username, id, status FROM aff_members WHERE ( Username = '$username' OR email= '$username') AND password = '".$password."' LIMIT 1";

		$result = $DB->Row($sql);
		
		if ( is_array($result) ) {
			
			if($result['status'] =="unapproved"){
			
				return "unapproved";
							
			}else{
			
				setAffSession($result);
				return "active";
			}
			
		} else {
			return "failed";
		}
}
function setAffSession(&$values) {
	
	/*
		THIS FUNCTION SETS THE MEMBERS SESSIONS
		ALSO THE MEMBERS IP IS LOGGED WITH DATE AND TIME
	*/
	
	global $DB;

   $_SESSION['aff_uid'] = $values['id'];
   $_SESSION['aff_username'] = htmlspecialchars($values['username']);
   $_SESSION['aff_auth'] = "yes";
	
}

function ValidateAccount($data){

	/*
		THIS FUNCTION VALIDATE THE NEW MEMBERS INPUT
		FROM THE REGISTER FORM
	*/

	global $DB;
		
	## First lets check this user name isnt already taken
	$check = $DB->Row("select count(username) AS result from aff_members where Username='".$data['j1']."'");
	if($check['result'] != 0){ return "username"; }

	## Check the password lenght
	if(strlen($data['j16']) < 4){
			return "password_lenght";
	}
		
	## Check the username lenght
	if(strlen($data['j1']) < 3){
		return "username_short";
	}	
			
	## Check the username characters
	if (!preg_match('/^[\w-]+$/', $data['j1'])){
		return "username_chars";	
	}
	
	## Lets check the email addresss
	$check2 = $DB->Row("select count(email) AS result from aff_members where email ='".$data['j3']."'");
	if($check2['result'] != 0){ return "email"; }
		
	// Lets check the email address is of valid
	list($userName, $mailDomain) = explode("@", $data['j13']); 
	if (strtoupper(substr(PHP_OS, 0, 3) == 'WIN')) {
			## Custome check for windows servers	
			if (myCheckDNSRR($mailDomain) == 1){
				return "invalid_email";
			}
			
	}else{
			## Linus Server			
			if ($mailDomain == "") {
				return "invalid_email";
			}
			else { if (!checkdnsrr($mailDomain, "MX")) {
					return "invalid_email";
				}
			}
	}
									
	// NO ERRORS
	return "complete";
}

function ForgottenPassword($CheckThisEmail){
	
	/*
		THIS FUNCTION SENDS A NEW PASSWORD TO THE MEMBER
		WITH A NEWLY GENERATED PASSWORD
		
		NOTE: THE PASSWORD STORED IN THE DATABASE IS M5D
		ENCRYPTED, THEREFORE WE CANT JUST SEND THE OLD PASSWORD
		SO WE MUST CREATE A NEW ONE.
	
	*/

	global $DB;
	
	$today_time=TIME_NOW;
	$today_date=DATE_NOW;
			
	// First lets check this email address is in the database
	$result = $DB->Row("SELECT username, email, password FROM aff_members WHERE email ='".$CheckThisEmail."'");
	if(empty($result)){ return "invalid"; }	


	$LostPassword['email'] = $result['email'];
	$LostPassword['username'] = $result['username']; 
	$LostPassword['password'] = $result['password'];	
	// Send the email to the user			
	SendTemplateMail($LostPassword, 4);
	
	return "complete";
				
}

?>