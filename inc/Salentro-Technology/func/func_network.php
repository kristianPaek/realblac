<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function ChangeDo($DoCall, $values = false, $obj=false){

	global $DB;
	
	$DoArray = array('add','run','email_contacts','tell'); // list of acceptable calls
	
	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
				
		case "run": {
		
			if (!$curld = curl_init()) {
					
						die("CURL IS NOT ENABLED ON THIS SERVER, PLEASE CONTACT YOUR HOSTING PROVIDER AND ASK THEM TO ENABLE cURL()");
						
			}else{
			
					
					require_once("inc/classes/class_imfunctions.php");
	
					$CookiePath = str_replace("/images", "", PATH_IMAGE);
					$RunningCount =1;
					$ContactsDataArray = array();
		
					if (eregi('yahoo', $values['username'])) {
						$system="yahoo";
					}elseif (eregi('gmail', $values['username'])) {
						$system="gmail";
					}elseif (eregi('googlemail', $values['username'])) {
						$system="gmail";
					}elseif (eregi('aol', $values['username'])) {
						$system="aol";
					}else{
						$system="hotmail";
					}
					 $CookiePath ="";
					$contactemails=eMeeting_Contacts($values['username'],$values['password'], $system,$CookiePath);
 
					if(is_array($contactemails)){
					
						// GET EMAIL ADDRESS ARRAY
						$EmailArray = GetEmailArray();

							foreach($contactemails as $contact){							
									$ContactsDataArray[$RunningCount]['username'] = htmlspecialchars(@$contact[0],ENT_QUOTES);
									$ContactsDataArray[$RunningCount]['email'] = htmlspecialchars(@$contact[1],ENT_QUOTES);
									if(in_array(htmlspecialchars(@$contact[1],ENT_QUOTES), $EmailArray)){
										$ContactsDataArray[$RunningCount]['joined'] = true;
									}else{
										$ContactsDataArray[$RunningCount]['joined'] = false;
									}
									$RunningCount++;			
							}							
							return $ContactsDataArray;
							
					}else{						
						return $GLOBALS['LANG_NETWORK'][7];
					}
						
			}
				
				
			} break;

			case "tell": {
					
 
					## Check the verification code
					if (!$obj->validRequest($values['code']) && D_REGISTER_IMAGE ==1) {
						return $GLOBALS['_LANG_ERROR']['_invalidCode'];
					}
					## checks to make sure the email address is valid
					//if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $values['email'])) {
					if ( filter_var($values['email'], FILTER_VALIDATE_EMAIL)  == TRUE) {	 
						 
						SendMail($values['email'], "Have you seen this website?", eMeetingInput($values['message'])." - ".eMeetingOutput($values['name']));
						
						return $GLOBALS['_LANG_ERROR']['_emailSent']."**1";
					
					}else {
					
					  return $GLOBALS['_LANG_ERROR']['_error'];
					
					}

			
			} break;
	
		}
	
	}
	
	return "error_invalid_call";	
}

////////////////////////////////////////////////////////////////
function GetUid($username){

	global $DB;
	
	$result = $DB->Row("SELECT id FROM members WHERE username='".$username."' LIMIT 1");
	
	return $result['id'];
}
function GetEmailArray(){

	global $DB;
	$RunningCount =1;
	$DataArray = array();
		
	$result = $DB->Query("SELECT DISTINCT email FROM members WHERE email !=''");
    while( $email = $DB->NextRow($result) )
    {
		$DataArray[$RunningCount] = $email['email'];
		$RunningCount++;
	}	
	return $DataArray;
}
?>