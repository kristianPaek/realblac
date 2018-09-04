<?php 



// no direct access

defined( 'KEY_ID' ) or die( 'Restricted access' );





function ChangeDo($DoCall, $values = false){



global $DB;



	$DoArray = array('privacy','password','cancel','sms_alerts','email_alerts','settings'); // list of acceptable calls



	if(in_array($DoCall, $DoArray)){

	

		switch($DoCall){



		case "settings": {

		

		$RunningCount=1;

		$MatchDataArray= array();

		
/*
			for($i = 1; $i < 60; $i++) { 								



					if(isset($values['FieldName'.$i]) && $values['FieldName'.$i] != ""){

										

							## Do Multiple Checkbox

							if($values['FieldType'.$i] ==5){																		

									if($values['FieldValue'.$i] == 1){

											$BuiltArray .="1**";

									}else{

											$BuiltArray .="0**";

									}

									$RunExtra.= ", ".$values['FieldName'.$i] ."='".$BuiltArray."'";												

							}

							if(($values['FieldType'.$i] ==1 || $values['FieldType'.$i] ==7) && $values['FieldName'.$i]=="age"){

															

									$GroupsDataArray[$RunningCount]['name'] = $values['FieldName'.$i];

									$GroupsDataArray[$RunningCount]['value'] = $values['age1']." - " .$values['age2'];

									$GroupsDataArray[$RunningCount]['type'] = $values['FieldType'.$i];

									$GroupsDataArray[$RunningCount]['caption'] = eMeetingInput($values['FieldCap'.$i]);

							## Do Normal Input Box						

							}elseif($values['FieldType'.$i] !=5){

							

									$GroupsDataArray[$RunningCount]['name'] = $values['FieldName'.$i];

									$GroupsDataArray[$RunningCount]['value'] = $values['FieldValue'.$i];

									$GroupsDataArray[$RunningCount]['type'] = $values['FieldType'.$i];

									$GroupsDataArray[$RunningCount]['caption'] = eMeetingInput($values['FieldCap'.$i]);

							}										

						}

						$RunningCount++;							

					}
*/

			while (list($key, $value) = each($values))
			{
					$i = "";
					
					$current = explode("FieldName",$key);
					if($current[1] != "" && is_numeric($current[1]))
						$i = $current[1];
					else
						continue;
					
					if(!empty($i) && isset($values['FieldName'.$i]) && $values['FieldName'.$i] != ""){

							## Do Multiple Checkbox
							if($values['FieldType'.$i] ==5){																		
									if($values['FieldValue'.$i] == 1){
											$BuiltArray .="1**";
									}else{
											$BuiltArray .="0**";
									}
									$RunExtra.= ", ".$values['FieldName'.$i] ."='".$BuiltArray."'";												
							}
							if(($values['FieldType'.$i] ==1 || $values['FieldType'.$i] ==7) && $values['FieldName'.$i]=="age"){
															
									$GroupsDataArray[$RunningCount]['name'] = $values['FieldName'.$i];
									$GroupsDataArray[$RunningCount]['value'] = $values['age1']." - " .$values['age2'];
									$GroupsDataArray[$RunningCount]['type'] = $values['FieldType'.$i];
									$GroupsDataArray[$RunningCount]['caption'] = eMeetingInput($values['FieldCap'.$i]);
							## Do Normal Input Box						
							}elseif($values['FieldType'.$i] !=5){
							
									$GroupsDataArray[$RunningCount]['name'] = $values['FieldName'.$i];
									$GroupsDataArray[$RunningCount]['value'] = $values['FieldValue'.$i];
									$GroupsDataArray[$RunningCount]['type'] = $values['FieldType'.$i];
									$GroupsDataArray[$RunningCount]['caption'] = eMeetingInput($values['FieldCap'.$i]);
							}										
						}

						$RunningCount++;							
					}
					// end for loop

					

					$DB->Insert("UPDATE members_privacy SET match_array ='".serialize($GroupsDataArray)."' WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");

					

					return $GLOBALS['_LANG_ERROR']['_complete']."**1";

		} break;

		

			case "email_alerts": {

					

					/////////////////////////

					/// CHECK EMAIL IS VALID

					/////////////////////////

					$CanContinue=1;

					// Lets check the email address is of valid

					@list($userName, $mailDomain) = split("@", $values['email']); 

					if (strtoupper(substr(PHP_OS, 0, 3) == 'WIN')) {

							## Custome check for windows servers	

							if (myCheckDNSRR($mailDomain) == 1){

								$CanContinue=0;

							}

							

					}else{

							## Linus Server			

							if (!checkdnsrr($mailDomain, "MX")) {

								$CanContinue=0;

							}

					}			

					///////////////////////////////////

					///////////////////////////////////

					

					if($CanContinue!=0){

					

						$DB->Update("UPDATE members SET email='".strip_tags($values['email'])."' WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");						

						$DB->Update("UPDATE `members_privacy` SET `Newsletters` = '".$values['alert6']."', `Notifications` = '".$values['alert5']."', `email_winks` = '".$values['alert2']."', `email_msg` = '".$values['alert1']."', `email_friends` = '".$values['alert3']."', `email_match` = '".$values['alert4']."' WHERE `uid` = ".$_SESSION['uid']." LIMIT 1");						

						return "Email Alerts Updated";

						

					}else{

						return $GLOBALS['LANG_SETTINGS'][1];

					}			



			

			} break;

			

			case "sms_alerts": {

	

					 // Remove hyphens - they are not part of a telephine number

					$strNumber = str_replace ('-', '', $values['smsnum']);

					$strNumber = str_replace (' ', '', $strNumber);

					

					switch(ValidateSMSNumber(strip_tags($strNumber))){					

						case "1":{							

							return $GLOBALS['LANG_SETTINGS'][2];							

						} break;		

						case "2":{							

							return $GLOBALS['LANG_SETTINGS'][3];							

						} break;						

						case "3":{						

							return $GLOBALS['LANG_SETTINGS'][4];						

						} break;						

						case "4":{						

							return $GLOBALS['LANG_SETTINGS'][5];						

						} break;						

						case "5":{						

							return $GLOBALS['LANG_SETTINGS'][6];						

						} break;						

						case "0": {						

							$DB->Update("UPDATE members_privacy SET  SMS_country='".$values['sms_country']."', SMS_email='".$values['sms_msg_alert']."', SMS_wink='".$values['sms_wink_alert']."', SMS_number='".strip_tags(trim($values['smsnum']))."' WHERE uid='".$_SESSION['uid']."' LIMIT 1");				

							

							return $GLOBALS['_LANG_ERROR']['_complete']."**1";											

						} break;			

					}

						

			} break;

			

			case "privacy": {



					$AccessLevel="";



					for($i=0;$i<sizeof($values["access"]);$i++) {

							

								$AccessLevel .=  "*".$values["access"][$i];

					}

 

					$DB->Update("UPDATE members_privacy SET skype='".$values['skype']."',  `Time Zone` = '".$AccessLevel."', `IM` = '".$values['im']."',`Language` = '".$values['lang']."', friends='".$values['friends']."', comments='".$values['comments']."', profile_view='".$values['pView']."' WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");

					

					// EXTRA SECTION FOR UPDATING PROFILE VIEW ACCESS



					for($i=0;$i<sizeof($values["profileview1"]);$i++) {

							

								$ProfileView1 .=  "*".$values["profileview1"][$i];

					}

					for($i=0;$i<sizeof($values["profileview2"]);$i++) {

							

								$ProfileView2 .=  "*".$values["profileview2"][$i];

					}

					$DB->Update("UPDATE members_privacy SET profileview_friends='".$ProfileView1."', profileview_nonfriend ='".$ProfileView2."' WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");



					return $GLOBALS['_LANG_ERROR']['_complete']."**1";					

																	

			} break;

			

			case "password":{

			

				$pw = $DB->Row("SELECT password FROM members WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");

			
//print $values['cpassword'];
//print "<br>";
//print md5($values['cpassword']);
//print "<br>";
//print $pw['password'];
//print "<br>";

define('OW_PASSWORD_SALT', '4f94930cd4ff3');
$extra = hash('sha256', OW_PASSWORD_SALT . $values['cpassword']);
//print $extra;
//exit;


				if( ( D_MD5 ==1 && $extra == $pw['password']) || ( $values['cpassword'] == $pw['password'] ) ){



				if(D_MD5 ==1){

					//$passcode = md5($values['npassword']);
define('OW_PASSWORD_SALT', '4f94930cd4ff3');
$passcode = hash('sha256', OW_PASSWORD_SALT . $values['npassword']);

				}else{

					$passcode = $values['npassword'];

				}

				

				$DB->Update("UPDATE members SET password='".$passcode."' WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");

					

					

					/* FORUM INTEGRATION CODE */

					

					if(FORUM_PHPBB_ENABLED =="yes"){

					

						global $db, $cache, $config, $user, $auth;					

					

						$DB->Update("UPDATE ".FORUM_PHPBB_DATABASE.".".USERS_TABLE." SET user_password='".phpbb_hash($values['npassword'])."' WHERE user_id = ( '".$_SESSION['uid']."' ) LIMIT 1");

					

					}elseif(FORUM_VB_ENABLED=="yes"){

						

						include_once('func_forums.php');

						

						$DB->Update("UPDATE ".FORUM_VB_DATABASE.".`user` SET password='".verify_password($values['npassword'])."' WHERE userid = ( '".$_SESSION['uid']."' ) LIMIT 1");

						

					}

					/* END FORUM INTEGRATION */

					

					return $GLOBALS['LANG_SETTINGS'][9]."**1";

								

				}else{

				

					return $GLOBALS['LANG_SETTINGS'][10];

				

				}

				

			} break;



		case "cancel": {

		

		

			if(isset($values['confirm']) && $values['confirm'] == "yes"){

			

				$DB->Update("UPDATE members SET active='cancel' WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");

				

				return $GLOBALS['LANG_SETTINGS'][11];

			

			}else{

			

				$DB->Update("UPDATE members SET active='active' WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");

				

				return $GLOBALS['LANG_SETTINGS'][12]."**1";			

			}



		

		} break;		

					

		}

	

	}

	

	return "error_invalid_call";	

}



##########################################################################################

## 							SMS FUNCTIONS												##

##########################################################################################

function ValidateSMSNumber($number){



  

  // Don't allow country codes to be included (assumes a leading "+") 

  //if (ereg('^(\+)[\s]*(.*)$',$number)) { 
  if (preg_match('/^(\+)[\s]*(.*)$/',$number)) {
  

    return 2;

	

  }

    

  // Now check that all the characters are digits

  //if (!ereg('^[0-9]{6,15}$',$number) && $number !="") {
  if (!preg_match('/^[0-9]{6,15}$/',$number) && $number !="") {
  

    return 3;

	

  }

  /*

  // Now check that the first digit is 0

  if (!ereg('^0[0-9]{9,15}$',$number)) {

  

    return 4;

	

  }

  */

  // Finally, check that the telephone number is appropriate.

 /* if (!ereg('^(01|02|03|05|070|077|07624|078|079)[0-9]+$',$number)) {

  

    return 5;

	

  }

  */

  // Seems to be valid - return the stripped telephone number

  return 0; 



}



?>