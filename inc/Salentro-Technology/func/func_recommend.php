<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function ChangeDo($DoCall, $values = false, $obj=false){

	global $DB;

	$DoArray = array('send'); // list of acceptable calls
	
	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
		
			case "send": {
					
 
					## Check the verification code
					if (!$obj->validRequest($values['code']) && D_REGISTER_IMAGE ==1) {
						return $GLOBALS['_LANG_ERROR']['_invalidCode'];
					}
					## checks to make sure the email address is valid
					if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $values['email'])) {

					// get email for added members
					
					for($i = 1; $i < $values['total']+1; $i++) { 
					
						if(isset($values['d'. $i]) && $values['d'.$i] == "on"){

							$ee = $DB->Row("SELECT email FROM members WHERE id='".$values['d'. $i]."' LIMIT 1");							

							SendMail($ee['email'], "Have you seen this website?", eMeetingInput($values['SendMessage'])." - ".eMeetingOutput($values['name']));

						}

					}

					// SEND TO THE SINGLE EMAIL
					SendMail($values['email'], "Have you seen this website?", eMeetingInput($values['SendMessage'])." - ".eMeetingOutput($values['name']));


 

						//$values['custom'] = $values['email']; // Must be above the admin_email
						//$values['email'] = ADMIN_EMAIL;
						//SendTemplateMail($values, 3);
						
						return $GLOBALS['_LANG_ERROR']['_emailSent']."**1";
					
					}else {
					
					  return $GLOBALS['_LANG_ERROR']['_error'];
					
					}

			
			} break;
		}
	
	}
	
	return "error_invalid_call";	
}

?>