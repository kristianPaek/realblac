<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );

function ChangeDo($DoCall, $values = false, $obj="",$mobile=""){

	global $DB;

	$DoArray = array('login','password','validate','newcode'); // list of acceptable calls

	## Check the verification code
	if(isset($values['code']) && D_REGISTER_IMAGE ==1){
	if (!$obj->validRequest($values['code'])) {

			return $GLOBALS['_LANG_ERROR']['_invalidCode'];

	} }

	## make data safe
	$values = array_map('eMeetingInput', $values);

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
		
			case "login": {
						
						if(!isset($values['remember'])){$values['remember']=0; }
						if(!isset($values['skip_pass'])){ $values['skip_pass']=false; }
						$SwtchThis = CheckLogin($values['username'], $values['password'], $values['remember'], $values['visible'], $values['skip_pass']);

							switch($SwtchThis){
							
								case "active": {
										
									## add system log
									if(strpos($values['username'],"@") ===false){
										AddEventSystemLog(eMeetingInput($values['username']),"login", "login", "", 0,0,0);
									}



										/* PHPBB3 LOGIN INTEGRATION */
										if(FORUM_PHPBB_ENABLED =="yes"){
										
											global $db, $cache, $config, $user, $auth;
											if(!$user->data['is_registered'])


											{	
												$FoundPHPUser = $DB->Row("SELECT count(user_id) AS total FROM ".FORUM_PHPBB_DATABASE.".".USERS_TABLE." WHERE user_id='".$_SESSION['uid']."' LIMIT 1");




												if($FoundPHPUser[total] != 0){

												
													$username = strip_tags(strtolower($values['username']));
													$password = strip_tags($values['password']);
													$result = $auth->login($username, $password);	
												
												}else{

												
														/* THIS MEMBER DOESNT HAVE A FORUM ACCOUNT
															SO WE HAVE TO CREATE ONE FOR THEM 	*/
															
														$DB->Insert("DELETE FROM ".FORUM_PHPBB_DATABASE.".".USERS_TABLE." WHERE user_id='".$_SESSION['uid']."' LIMIT 1");
														$MyEmail = $DB->Row("SELECT email FROM members WHERE id='".$_SESSION['uid']."' LIMIT 1");
														$confirm_id = request_var('confirm_id', '');     
														$group_name = ($coppa) ? 'REGISTERED_COPPA' : 'REGISTERED';
														$sql = 'SELECT group_id  FROM ' . GROUPS_TABLE . "
																	 WHERE group_name = '" . $db->sql_escape($group_name) . "'
																	 AND group_type = " . GROUP_SPECIAL;
																	 
														$result = $db->sql_query($sql);
														$row = $db->sql_fetchrow($result);
														$db->sql_freeresult($result);
														//$group_id = $row['group_id'];
														$group_id = 2;


														$user_row = array(
																	 'user_id'           =>  $_SESSION['uid'],
																	 'username'           => strtolower($values['username']),
																	 'user_password'      => phpbb_hash($values['password']),
																	 'user_email'         => $MyEmail['email'],
																	 'group_id'           => (int) $group_id,
																	 'user_timezone'      => "0.00",
																	 'user_dst'           => 0,
																	 'user_lang'          => "en",
																	 'user_type'          => USER_NORMAL,
																	 'user_ip'            => $_SERVER['REMOTE_ADDR'],
																	 'user_regdate'       => time(),
																	 'user_actkey'        => '',
																	 'user_inactive_reason'   => 0,
																	 'user_inactive_time'   => 0,
														);
														user_add($user_row, $cp_data);	
														
														/* NOW LOGIN THEM IN */
														$username = strip_tags(strtolower($values['username']));
														$password = strip_tags($values['password']);
														$auth->login($username, $password);											
												}	
															
											}
																						
										}
										
										
											if(FORUM_VB_ENABLED=="yes"){
											
											global $vbulletin;
											
											if ($vbulletin->userinfo['userid']){
				
												vbsetcookie('userid', $vbulletin->userinfo['userid'], true, true, true);
												vbsetcookie('password', md5($vbulletin->userinfo['password'] . COOKIE_SALT), true, true, true);
												process_new_login('cplogin', TRUE, TRUE);
											
											}else{
												
											
				
											$FoundVBUser = $DB->Row("SELECT count(userid) AS total FROM ".FORUM_VB_DATABASE.".`user` WHERE userid='".$_SESSION['uid']."' LIMIT 1");											
											if($FoundVBUser['total'] ==0){
																						
											$MyEmail = $DB->Row("SELECT email FROM members WHERE id='".$_SESSION['uid']."' LIMIT 1");	
											include_once('func_forums.php');
											
											$DB->Insert("INSERT INTO ".FORUM_VB_DATABASE.".`user` (`userid`, `usergroupid`, `membergroupids`, `displaygroupid`, `username`, `password`, `passworddate`, `email`, `styleid`, `parentemail`, `homepage`, `icq`, `aim`, `yahoo`, `msn`, `skype`, `showvbcode`, `showbirthday`, `usertitle`, `customtitle`, `joindate`, `daysprune`, `lastvisit`, `lastactivity`, `lastpost`, `lastpostid`, `posts`, `reputation`, `reputationlevelid`, `timezoneoffset`, `pmpopup`, `avatarid`, `avatarrevision`, `profilepicrevision`, `sigpicrevision`, `options`, `birthday`, `birthday_search`, `maxposts`, `startofweek`, `ipaddress`, `referrerid`, `languageid`, `emailstamp`, `threadedmode`, `autosubscribe`, `pmtotal`, `pmunread`, `salt`) 
												VALUES (".$_SESSION['uid'].", '6', '', '0', '".strtolower($values['username'])."', '".verify_password($values['password'])."', '2025-01-01', '".$MyEmail['email']."', '0', '', '', '', '', '', '', '', '0', '2', '', '0', '0', '0', '0', '0', '0', '0', '0', '10', '1', '', '0', '0', '0', '0', '0', '15', '', '0000-00-00', '-1', '1', '', '0', '0', '0', '0', '-1', '0', '0', 'Kxn')");
											
											}	
											}
											}
	
										/* END FORUM INTEGRATION */
										
										$values = $DB->Row("SELECT id, username, ip_long ,ip_lat FROM members WHERE username = '".strip_tags(trim($values['username']))."' LIMIT 1");
										

										## update members country and location automatically
										/* if(isset($_SESSION['clever_ip_country_name']) && $_SESSION['clever_ip_country_name'] !=""){
											$DB->Update("UPDATE members_data SET country='".eMeetingInput($_SESSION['clever_ip_country_name'])."', 
											location='".eMeetingInput($_SESSION['clever_ip_country'])."' WHERE uid='".$_SESSION['uid']."' LIMIT 1");
										}(*/

										// ATTEMPT TO UPDATE THE USERS DETAILS IF THEY HAVE LOGGED IN AGAIN
										if(MAPS_ID !="" && GOOGLE_MAPS_KEY !="" && $_SERVER['REMOTE_ADDR'] !="127.0.0.1" && ($values['ip_long'] =="" || $values['ip_lat']=="") ){

											$exe_data = explode(",",ValidateExternalCountry($_SERVER['REMOTE_ADDR']));
											
											if(is_array($exe_data) && $exe_data != 0){			
												$reg_long=$exe_data[4]; $reg_lat=$exe_data[3]; $reg_country=$exe_data[2]; $reg_code=$exe_data[0];												
												$DB->Row("UPDATE members SET ip_long='".$reg_long."', ip_lat='".$reg_lat."', ip_country='".$reg_country."', ip_code='".$reg_code."' WHERE id='".$values['id']."' LIMIT 1");			
											}


										}
							
									// UPDATE LOGIN LANGUAGE
									if(D_LANG !="english"){
										$addExtra = "&l=".D_LANG;
									}else{
										$addExtra = "";
									}														

									// EMAIL ADMIN
									CheckAdminEmail("login","", $values,"-**1");

if ($mobile == "yes") {
	header("Location: ".DB_DOMAIN."mobile.php?dll=overview&lim=1&l=".D_LANG."&".$addExtra);	
}else{
	header("Location: ".DB_DOMAIN."index.php?dll=overview&lim=1&l=".D_LANG."&".$addExtra);	
}



								
									exit();
								} break;
								case "suspended": {
									return $GLOBALS['LANG_LOGIN'][1];
								} break;
								case "activate": {									
									return $GLOBALS['LANG_LOGIN'][2];									
								} break;
								case "unapproved": {
									return $GLOBALS['LANG_LOGIN'][3];
								} break;
								case "failed": {
									return $GLOBALS['LANG_LOGIN'][4];
								} break;															
							}
							
														
			} break;
			
			case "validate": {

							switch(ValidateCode($values)){
								
									case "error": {
									 return $GLOBALS['LANG_LOGIN'][5];										
									} break;
	
									case "OK": {

										if(APPROVE_ACCOUNTS =="yes"){
										
											// STILL WAITING FOR ADMIN APPROVAL
											return "waiting";


										}else{

											$values = $DB->Row("SELECT ID, username, ip_long ,ip_lat FROM members WHERE email = '".strip_tags(trim($values['email']))."' LIMIT 1");
											$values['skip_pass'] =true;
											$values['remember'] =1;
											$values['password']="";
											$values['visible'] =0;
											ChangeDo('login', $values);										
											// UPDATE LOGIN LANGUAGE
											if(D_LANG !="english"){
												$addExtra = "&l=".D_LANG;
											}else{
												$addExtra = "";
											}
 
											return "login";

											//header("location: ".DB_DOMAIN."index.php?dll=login".$addExtra);
											//exit();

										}
									
									} break;
							}			
			} break;

			case "newcode": {

				$newcode = $DB->Row("SELECT email, activate_code, username FROM members WHERE email = '".strip_tags(trim($values['email']))."' LIMIT 1");
				
				if(!empty($newcode)){
					
					// SEND VALIDATE EMAIL AGAIN TO USER
					if($newcode['activate_code'] =="OK"){						
						return $GLOBALS['LANG_LOGIN'][11];						
					}else{
						$values['custom'] = $newcode['activate_code'];
						$values['username'] = $newcode['username'];
						SendTemplateMail($values, 19);
					}

					return $GLOBALS['LANG_LOGIN'][6]."**1";
					
				}else{
							
					return $GLOBALS['LANG_LOGIN'][7];
	
				}
								
			} break;
						
			case "password": {

					if(strlen($values['email']) < 5){					
						return $GLOBALS['LANG_LOGIN'][8];						
					}else{
										
						switch(ForgottenPassword($values['email'], $values['username'])){						
							case "invalid": {							
								return $GLOBALS['LANG_LOGIN'][9];							
							} break;							
							case "complete": {							
								return $GLOBALS['LANG_LOGIN'][10]."**1";							
							} break;
						}
					}
			
			} break;
						
		}
	
	}
	
	return "error_invalid_call";	
}


//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////

function CheckUpgrade($id, $package){
	
	/*
		THIS FUNCTION CHECKS TO SEE IF THE MEMBER UPGRADE HAS EXPIRED
		THIS IS CHECKED DURING LOGIN AND WILL DOWN GRADE THE MEMBER
		AND SEND AN EMAIL TO CONFIRM THE DOWNGRADE
			
	*/
	
	global $DB;
	
	## UPGRADE CHECK UPDATED
	## LOOKS FOR ALL ENTRIED BY ONLY FINDS LAST ONE BASED ON DATE (INCASE THEY HAVE UPGRADED SINCE)
	$FoundExpired = $DB->Row("SELECT id, uid, date_expire FROM members_billing WHERE uid= ( '".$id."' ) AND running='yes' AND subscription ='no' ORDER BY date_expire, id DESC LIMIT 1");

	if(!empty($FoundExpired) && $FoundExpired['date_expire'] < date("Y-m-d H:i:s")){
		
		$DB->Update("UPDATE members_billing SET running='no' WHERE id= ( '".$FoundExpired['id']."' )");
		$DB->Update("UPDATE members SET packageid='".DEFAULT_PACKAGE."' WHERE id= ( '".$FoundExpired['uid']."' ) LIMIT 1");
		
			/////////////////////////////////////////
			// SEND MEMBER AN EMAIL TO CONFIRM NEW MSG
			//////////////////////////////////////////
			$val = $DB->Row("SELECT members.email, members.username FROM members WHERE members.id = ( '".$FoundExpired['uid']."' ) LIMIT 1");
			if(!empty($val)){
							
				$Data['email'] =  $val['email'];
				$Data['username'] =  $val['username'];																	
				SendTemplateMail($Data, 14);
			}
			
	}
}
function CheckLogin($username, $password, $remember, $visible, $skip_pass=false){

		/*
			THIS FUNCTION IS TO VALIDATE THE MEMBERS LOGIN DETAILS
			THIS ALSO CALLED THE SESSION HANDEL AND SETS THE USER
			ACCOUNT PERMISSIONS
		
		*/
		
		global $DB;
		
		$username = trim(strip_tags($username));
		$password = trim(strip_tags($password));

		$sql = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members
				INNER JOIN members_privacy ON ( members.id = members_privacy.uid ) 
				LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid )
				LEFT JOIN members_data ON ( members.id = members_data.uid )
				LEFT JOIN package ON ( members.packageid = package.pid )		
		  		WHERE ( members.username = '".$username."' OR members.email='".$username."' ) ";
				if($skip_pass){
					$sql .= " LIMIT 1";
				}else{

					if(D_MD5 ==1){
						$sql .="AND members.password = '".md5($password)."' LIMIT 1";
					}else{
						$sql .="AND members.password = '".$password."' LIMIT 1";
					}
					
				}
		

		$result = $DB->Row($sql);
		
		if ( is_array($result) ) {
			
			if($result['active'] =="suspended"){
			
				return "suspended";
				
			}elseif($result['activate_code'] != "OK" && VALIDATE_EMAIL ==1){
			
				return "activate";				
			
			}elseif($result['active'] =="unapproved" && $result['activate_code'] = "OK"){
			
				return "unapproved";
			
			}else{
			
				CheckUpgrade($result['id'], $result['packageid']);
				setSession($result, $remember, $visible, 1);
				return "active";
			}
			
		} else {
			return "failed";
		}
}

function ForgottenPassword($CheckThisEmail, $username){
	
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
	$result = $DB->Row("SELECT username, password FROM members WHERE email ='".strip_tags($CheckThisEmail)."' LIMIT 1");
	if(empty($result)){ return "invalid"; }	



	$LostPassword['email'] = $CheckThisEmail;
	$LostPassword['username'] = $result['username'];
	$LostPassword['password'] = makeRandomPassword(); // THE NEW PASSWORD IS GENERATED HERE
	

	if(D_MD5 ==1){
		$passcode = md5($LostPassword['password']);
	}else{
		$passcode = $LostPassword['password'];
	}

	$DB->Update("UPDATE members SET password='".$passcode."', activate_code ='OK' WHERE email ='".$CheckThisEmail."'");
	
	// Send the email to the user			
	SendTemplateMail($LostPassword, 4);
	
	return "complete";
				
}

function ValidateCode($data){
	
	/*
		THIS FUNCTION WILL VALIDATE THE MEMBERS
		ENTERED VALIDATION CODE
	*/
	global $DB;

	if(!function_exists('DisplayMyFriendsList')){

	require ("inc/API/api_functions.php");

	}
	
	## check that the emil and validate code are correct
	$SQL = "SELECT members.*, members_privacy.* FROM members
	INNER JOIN members_privacy ON ( members.id = members_privacy.uid ) 
	WHERE email= ( '".eMeetingInput($data['email'])."' ) AND activate_code= ( '".eMeetingInput($data['valMe'])."' ) LIMIT 1";
 
	$check = $DB->Row($SQL);
	if(empty($check)){ 
	
		return "error"; 
		
	}else{

		## SHOULD WE SEND A TEXT MESSAGE?
		if(UPGRADE_SMS =="yes"){
			$D4 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_sms' LIMIT 1");
			$D6 = $DB->Row("SELECT members_data.country FROM members, members_data WHERE members.id = members_data.uid AND members.email= ( '".eMeetingInput($data['email'])."' ) AND members.activate_code= ( '".eMeetingInput($data['valMe'])."' ) LIMIT 1");

			if($D4['value1'] !="" && $check['SMS_number'] !="" && strlen($check['SMS_number']) > 4 && $D6['country'] !=""  && $check['SMS_credits'] > 0 ){

				$SMSMessage = str_replace("(username)",$check['username'],$D4['value1']);
				SendSMS($_SESSION['username'], $check['SMS_number'], $SMSMessage, MakeCountry($D6['country']), KEY_ID);
										
			}
		}

		if(APPROVE_ACCOUNTS =="yes"){
			// UPDATE THE USERS ACCOUNT AND PASS OK MESSAGES
			$DB->Insert("UPDATE members SET activate_code ='OK', active='unapproved' WHERE id= ( '".$check['id']."' ) LIMIT 1");
		}else{
			// UPDATE THE USERS ACCOUNT AND PASS OK MESSAGES
			$DB->Insert("UPDATE members SET activate_code ='OK', active='active' WHERE id= ( '".$check['id']."' ) LIMIT 1");
		}
		return "OK";		
	}

}
?>