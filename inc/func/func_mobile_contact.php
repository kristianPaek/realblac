<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function ChangeDo($DoCall, $values = false, $obj=false){

	$DoArray = array('send'); // list of acceptable calls
	
	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
		
			case "send": {
					
 
					## Check the verification code
					if (!$obj->validRequest($values['code']) && D_REGISTER_IMAGE ==1) {
						return $GLOBALS['_LANG_ERROR']['_invalidCode'];
					}
					## checks to make sure the email address is valid
					//if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $values['email'])) {

					if ( filter_var($values['email'], FILTER_VALIDATE_EMAIL)  == TRUE) {

						$values['custom'] = $values['email']; // Must be above the admin_email
						$values['email'] = ADMIN_EMAIL;
						SendTemplateMail($values, 3);
						
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