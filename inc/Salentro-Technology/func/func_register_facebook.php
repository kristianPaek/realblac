<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function ChangeDo1($DoCall, $values = false, $Files = false,$obj=false){
		

	global $DB;
	 
	$DoArray = array('add','email_contacts','forward'); // list of acceptable calls
  
	if(in_array($DoCall, $DoArray)){
	 
		$SwitchValue = ValidateAccount($values,$Files, $obj);

		switch($DoCall){
		
			case "add": {
							switch($SwitchValue){
								
								case "username": {
								
									return $GLOBALS['LANG_REGISTER'][1];
								
								} break;

								case "email": {
								
									return $GLOBALS['LANG_REGISTER'][2];
								
								} break;

								case "invalid_email": {
								
									return $GLOBALS['LANG_REGISTER'][3];
								
								} break;
								
								case "password": {
								
									return $GLOBALS['LANG_REGISTER'][4];
								
								} break;
								
								case "username_short": {
								
									return $GLOBALS['LANG_REGISTER'][5];
																	
								} break;
								
								case "username_chars": {
								
									return $GLOBALS['LANG_REGISTER'][6];
								
								}break;
								
								case "password_lenght": {
								
									return $GLOBALS['LANG_REGISTER'][7];
								
								} break;
								
								case "field_empty": {
								
									return $GLOBALS['LANG_REGISTER'][8];
								
								} break;

								case "verification": {
								
									return $GLOBALS['LANG_REGISTER'][9];
																	
								}break;

								case "photo": {
								
									return $GLOBALS['LANG_REGISTER'][10];
								
								}break;

								case "photo_invalid": {

								 return "The photo you have selected is invalid. We only accept .jpg,.png and .bmp image types. Please select a different photo and try again.";

								}
																																
								case "complete": {								
									
									## Define Variables
									$RunExtra ="";
									
									## Define List of BadWords
									$BadWords = array();					
									// retrieve censor words for filter
									$result = $DB->Query("SELECT * FROM badwords");
									$bw = 1;
									while( $im = $DB->NextRow($result) )
									{
										$BadWords['word'][$bw] = $im['word'];  
										$bw ++;
									}
									## Loop to create member profile data
									for($i = 1; $i < 200; $i++) { 

										if(isset($values['FieldName'.$i]) && $values['FieldName'.$i] != ""){
										
											## Do Multiple Checkbox
											if($values['FieldType'.$i] ==5){																		
													if($values['FieldValue'.$i] == 1){
														$BuiltArray .="1**";
													}else{
														$BuiltArray .="0**";
													}
													$RunExtra.= ", ".$values['FieldName'.$i] ."='".$BuiltArray."'";												
											  	

											## AGE FIELD
											}elseif($values['FieldType'.$i] == 7){
					 
											$RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i.'a']."-".$values['FieldValue'.$i.'b']."-".$values['FieldValue'.$i.'c']."'";
														
											}elseif(isset($values['FieldValue'.$i]) && $values['FieldType'.$i] !=5){

												if($values['FieldName'.$i] == "age"){ 
  
													if(isset($values['birthdatey'])){
													$RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['birthdatey']."-".$values['birthdatem']."-".$values['birthdated']."'"; //1985-JAN-01
													}else{
													$RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";
													}											

												}else{
													$RunExtra.= ", ".$values['FieldName'.$i] ."='".filter_str(strip_tags($values['FieldValue'.$i]),$BadWords,$bw)."'";
												}
											}
										
										}							
									}
									// end for loop		
									 //die(count($values).print_r($values).$RunExtra);
									///////////////////////////////////////////////////////////
									//			CREATE MEMBER ACCOUNT
									///////////////////////////////////////////////////////////
																		 
									$ComData = AddMember($values, $RunExtra);
									$ComParts = explode("**",$ComData);
									CheckAdminEmail("register","register", $values, "-**1");
 
									$sql = "SELECT members.id, members.email, members_privacy.SMS_number, members_data.gender AS genderD, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members
									INNER JOIN members_privacy ON ( members.id = members_privacy.uid ) 
									LEFT JOIN members_data ON ( members.id = members_data.uid )
									LEFT JOIN package ON ( members.packageid = package.pid )		
									WHERE members.id = '".$ComParts[0]."' LIMIT 1";																	
															
									$values = $DB->Row($sql);
									setSession($values, 0, 0);
									// MEMBER ACCOUNT PACKAGE DATA								
									$values['id'] = $ComParts[0];
									$values['password'] = $ComParts[1];
									$values['packageid'] = DEFAULT_PACKAGE;
									$values['custom'] = $ComParts[2];

									////////////////////////
									// SEND WELCOME EMAIL
									////////////////////////
									$D1 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_email' LIMIT 1");

									SendTemplateMail($values, $D1['value1']);

									$_SESSION['my_email'] =$values['email']; // used for activation account
 
									$DB->Insert("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a`,password, 	time, 	date )
									VALUES (NULL , '".$_SESSION['uid']."', '".$_SESSION['username']." Album', '', '0', 'public', '0', '0', '0', '0','',now(),now())");
									$albumID = $DB->InsertID();
									
									// ADD IMAGE IF ONE HAS BEEN UPLOADED
									require_once(dirname(__FILE__)."/func_uploads_facebook.php");
	

									$UploadMax = 0;
									while($UploadMax < 13){							
											
											// IF THE USER DOESNT HAVE AN ALBUM, CREATE ONE
											if(!isset($values['aid'])){ $values['aid']="new";}																
											if( ( $value['error'] !=4 ) && is_array($Files["uploadFile0".$UploadMax]) && $Files["uploadFile0".$UploadMax]['type'] !="" ){ // error 4 = empty file			
											
												$Status = UploadFile($Files["uploadFile0".$UploadMax], $_SESSION['uid'], strip_tags($values['title']), strip_tags($values['comments']), 1, 'photo', $albumID,'no');
											
											}
										
									$UploadMax++; }
 
									## insert message into the database
									$D2 = $DB->Row("SELECT value2 FROM system_settings WHERE name='welcome_message' LIMIT 1");
									$D3 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_subject' LIMIT 1");

									## make replacements
									$Subject = str_replace("(username)",$_SESSION['username'],$D3['value1']);
									$Subject = str_replace("(password)",$ComParts[1],$Subject);
									$Subject = str_replace("(code)",$ComParts[2],$Subject);
									
									$Message = str_replace("(username)",$_SESSION['username'],$D2['value2']);
									$Message = str_replace("(password)",$ComParts[1],$Message);
									$Message = str_replace("(code)",$ComParts[2],$Message);

									$DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
									VALUES ('0', NULL , '".$_SESSION['uid']."', 'unread', NOW(), NOW(), '".eMeetingInput($Subject)."', '".eMeetingInput($Message)."', '1', 'sent', 'inbox')");
									
									// NOW LETS CHECK IF THEY SIGNUP WITH AN MSN / AOL OR GMAIL EMAIL ADDRESS
									// if contacts are found they are redirected back to the register page
/*
									$TotalContactsFound = ContactListChecker($values['email'],$values['password']);
									if(is_array($TotalContactsFound) && !empty($TotalContactsFound) ){

										return $TotalContactsFound;
										
									}
*/
									## NOW DECIDE WHAT TODO NEXT?
									$ReturnValue = RegisterCompleteRedirect();

									return $ReturnValue;
								
								} break;
							
							}
				} break;


				case "email_contacts": {

							 
						if($values['totalrows'] > 1 ){
							$Counter=0;

							for($i = 1; $i < $values['totalrows']; $i++) { 
					
								if(isset($values['email'. $i])){
									
									$data['username'] = $values['name'. $i];
									$data['from_username'] = $_SESSION['username'];
									$data['email'] = $values['email'. $i];
									SendTemplateMail($data, 12);
									$Counter++;
								}					
							}
							$Counter++;
						}

							
						## NOW DECIDE WHAT TODO NEXT?
						return RegisterCompleteRedirect();
						
				} break;



				case "forward": {

						## NOW DECIDE WHAT TODO NEXT?
						return RegisterCompleteRedirect();

				} break;


			
		}
	
	}
	
	return "Balllls!!".$DoCall."-".$SwitchValue;	
}


//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
function AddMember($data, $extra){
	


	/*
		THIS FUNCTION WILL GENERATE A NEW MEMBER ACCOUNT
	*/
	
	global $DB;
		
	$user = str_replace(" ", "", strip_tags($data['username']));
	$email = str_replace(" ", "", strip_tags($data['email']));
	$pass = str_replace(" ", "", strip_tags($data['password']));
	$default_CC ="United States";  
	$MSGSTATUS= D_STATUSMSG;

	$ip = $_SERVER['REMOTE_ADDR']; 
	$session = session_id();
	
	$member_Package_id = DEFAULT_PACKAGE;
	/*
	// DETERMIN ACCOUNT STATUS
	if(APPROVE_ACCOUNTS == "yes"){ 
		$status = "unapproved"; 
	}else{ $status = "active"; }
	*/
	$status = "active";
	////////////////////////////////
	## FIRST LETS GET THE DATA FROM THE PACKAGES
	$packageData = $DB->Row("SELECT * FROM package WHERE pid='".$member_Package_id."' LIMIT 1");
	
	////////////////////////////////////////////
	//  	EMEETING GOIP SYSTEM DETECTION    //
	$reg_long=""; $reg_lat=""; $reg_country=""; $reg_code="";

	if(!isset($_SESSION['clever_ip_country']) && MAPS_ID !="" && GOOGLE_MAPS_KEY !=""){

		$exe_data = explode(",",ValidateExternalCountry($_SERVER['REMOTE_ADDR']));
		if(is_array($exe_data) && $exe_data != 0){			
			$reg_long=$exe_data[4]; $reg_lat=$exe_data[3]; $reg_country=$exe_data[2]; $reg_code=$exe_data[0];			
		}

	}elseif( isset($_SESSION['clever_ip_long']) ){

			$reg_long	 	= $_SESSION['clever_ip_long'];
			$reg_lat 		= $_SESSION['clever_ip_lat'];
			$reg_country 	= $_SESSION['clever_ip_country'];
			$reg_code 		= $_SESSION['clever_ip_code'];
			$default_CC  	= $_SESSION['clever_ip_country_name'];

	}elseif(isset($data['country'])){

		$reg_country = $data['country'];
		$default_CC =$data['country'];
	}

	if(D_MD5 ==1){
		$passcode = md5($pass);
	}else{
		$passcode = $pass;
	}
	/////////////////////////////////////////////
	$DB->Insert("INSERT INTO `members` ( `id` , `username` , `password` , `email` , `session` , `ip` , `lastlogin` , `visible` , active, `created`, packageid, hits, profile_complete, templateid, updated, moderator, activate_code, highlight, ip_long, ip_lat, ip_country, ip_code,member_rating,  msgStatus,  video_duration,  video_live )
				VALUES (NULL , '".$user."', '".$passcode."', '".$email."', '".$session."', '".$ip."', '".DATE_TIME."', 'yes', '".$status."', '".DATE_TIME."', '".$member_Package_id."','0','0','1','".DATE_TIME."', 'no', 'OK','off','".$reg_long."','".$reg_lat."','".$reg_country."','".$reg_code."', '0','".eMeetingInput($MSGSTATUS)."','0','no')");
	$userid = $DB->InsertID();
	/*
	if(VALIDATE_EMAIL ==1){
		// GENERATE ACTIVATE CODE
		$ACTIVATION_CODE = makeRandomPassword(9);
		if($ACTIVATION_CODE ==""){ $ACTIVATION_CODE = makeRandomPassword(9); }
		$DB->Insert("UPDATE members SET activate_code ='".$ACTIVATION_CODE."' WHERE id= ( '".$userid."' ) LIMIT 1");
		//---------------------
	}
	*/
	$DB->Insert("INSERT INTO `members_data` ( `uid` ) values ( '$userid' )");
	$DB->Update("UPDATE `members_data` SET age='1974-JAN-15', country='".eMeetingInput($default_CC)."', headline='' WHERE uid='".$userid."' LIMIT 1"); // make default values
	
	
	if(isset($data['news']) && $data['news'] =="yes"){ $nw ="yes"; }else{ $nw ="no";}
	if(isset($data['notify']) && $data['notify'] =="yes"){ $nn ="yes"; }else{ $nn ="no";}


	if(UPGRADE_SMS =="yes"){
		$SMS_NUM=$data['smsnum'];
		$SMS_MSG=$data['sms_msg_alert'];
		$SMS_EMAIL=$data['sms_wink_alert'];
	}else{
		$SMS_NUM="";
		$SMS_MSG="";
		$SMS_EMAIL="";
	}

	$DB->Insert("INSERT INTO `members_privacy` (`uid` ,`Newsletters` ,`Notifications` ,`IM` ,`Language` ,`Time Zone` ,`friends` ,`comments` ,`profile_view` ,`im_window` ,`SMS_email` ,`SMS_wink` , SMS_number ,`SMS_credits` ,`SMS_country` ,`match_array` ,`email_winks` ,`email_msg` ,`email_friends` ,`email_match`, `profileview_friends`, `profileview_nonfriend`)
	VALUES ('".$userid."', '".$nw."', '".$nn."', 'yes', 'english', '', 'no', 'no', 'all', 'off', 'off', 'off', '".$SMS_NUM."', '".$packageData['SMS_credits']."', '".$reg_country."', '', 'yes', 'yes', 'yes', 'yes','','')");
	
	if(strlen($extra)> 5){ $DB->Insert("UPDATE members_data SET uid= ( '".$userid."') $extra WHERE uid= ( '".$userid."' ) LIMIT 1"); }
	
	$Str = "".$userid."**".$pass."**".$ACTIVATION_CODE;
	
	/*
		AFFILIATE CODE CHECK AND DATABASE UPDATE
	*/
	if(isset($_COOKIE['affiliate'])){
		
		// ADD THE USER AND AFFILIATE ID TO THE DATABASE
		$DB->Insert("INSERT INTO `aff_signup` (`affiliate_id` ,`member_id` ,`date` )VALUES ('".strip_tags($_COOKIE['affiliate'])."', '".$userid."', '".DATE_NOW."')");
		$DB->Insert("UPDATE aff_members SET total_registered=total_registered+1 WHERE id= ( '".strip_tags($_COOKIE['affiliate'])."' ) LIMIT 1");
	
	}
	
	/*	
		FORUM INTEGRATION CODE
	*/
	
	if(FORUM_VB_ENABLED=="yes"){
	
	include_once('func_forums.php');
	
		$DB->Insert("INSERT INTO ".FORUM_VB_DATABASE.".`user` (`userid`, `usergroupid`, `membergroupids`, `displaygroupid`, `username`, `password`, `passworddate`, `email`, `styleid`, `parentemail`, `homepage`, `icq`, `aim`, `yahoo`, `msn`, `skype`, `showvbcode`, `showbirthday`, `usertitle`, `customtitle`, `joindate`, `daysprune`, `lastvisit`, `lastactivity`, `lastpost`, `lastpostid`, `posts`, `reputation`, `reputationlevelid`, `timezoneoffset`, `pmpopup`, `avatarid`, `avatarrevision`, `profilepicrevision`, `sigpicrevision`, `options`, `birthday`, `birthday_search`, `maxposts`, `startofweek`, `ipaddress`, `referrerid`, `languageid`, `emailstamp`, `threadedmode`, `autosubscribe`, `pmtotal`, `pmunread`, `salt`) 
		VALUES (".$userid.", '6', '', '0', '".strtolower($user)."', '".verify_password($pass)."', '2025-01-01', '".$email."', '0', '', '', '', '', '', '', '', '0', '2', '', '0', '0', '0', '0', '0', '0', '0', '0', '10', '1', '', '0', '0', '0', '0', '0', '15', '', '0000-00-00', '-1', '1', '', '0', '0', '0', '0', '-1', '0', '0', 'Kxn')");
							
	}
	
	
	if(FORUM_PHPBB_ENABLED =="yes"){
	
	 $username = $user;	
	 global $db, $cache, $config, $user, $auth;
		
		// Start session management
			$DB->Insert("DELETE FROM ".FORUM_PHPBB_DATABASE.".".USERS_TABLE." WHERE user_id='".$userid."' LIMIT 1");
			$confirm_id = request_var('confirm_id', '');     
			$group_name = ($coppa) ? 'REGISTERED_COPPA' : 'REGISTERED';
			$sql = 'SELECT group_id  FROM ' . GROUPS_TABLE . "
						 WHERE group_name = '" . $db->sql_escape($group_name) . "'
						 AND group_type = " . GROUP_SPECIAL;
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			$db->sql_freeresult($result);
			$group_id = $row['group_id'];
			$user_row = array(
				 		 'user_id'           =>  $userid,
						 'username'           => strtolower($username),
						 'user_password'      => phpbb_hash($pass),
						 'user_email'         => $email,
						 'group_id'           => (int) $group_id,
						 'user_timezone'      => "0.00",
						 'user_dst'           => 0,
						 'user_lang'          => "en",
						 'user_type'          => USER_NORMAL,
						 'user_ip'            => $ip,
						 'user_regdate'       => time(),
						 'user_actkey'        => '',
						 'user_inactive_reason'   => 0,
						 'user_inactive_time'   => 0,
			);
			user_add($user_row, $cp_data);
			
			/* NOW LOGIN THEM IN */			
			$auth->login(strtolower($username), $pass);	
	}

	return $Str;
}
function ValidateAccount($data, $file, $obj){
	/*
		THIS FUNCTION VALIDATE THE NEW MEMBERS INPUT
		FROM THE REGISTER FORM
	*/	
	global $DB;

	$bad_username_array = explode(",",BLOCK_USERNAMES);
 
	
		
	## First lets check this user name isnt already taken
	$check = $DB->Row("select count(username) AS result from members where username='".$data['username']."'");
	if($check['result'] != 0){ return "username"; }

	if(in_array($data['username'], $bad_username_array)){
		return "username";
	}

	## Check the username characters
	if (!preg_match('/^[\w-]+$/', $data['username'])){
		return "username_chars";	
	}
	
	## Check the username lenght
	if ( strlen($data['username']) < 5 ) {
		return "username_short";
	}
	
	## Lets check the email addresss
	$check2 = $DB->Row("select count(email) AS result from members where email ='".$data['email']."'");
	if($check2['result'] != 0){ return "email"; }
	
	## Check the email length
	if ( strlen( $data['email'] ) < 7 ){
			return "invalid_email";
	}
	
	/*if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $values['email'])) {
	
	}else{
		return "invalid_email";
	}*/
	/*	
	// Lets check the email address is of valid
	list($userName, $mailDomain) = split("@", $data['email']); 
	if (strtoupper(substr(PHP_OS, 0, 3) == 'WIN')) {
			## Custome check for windows servers	
			if (myCheckDNSRR($mailDomain) == 1){
				return "invalid_email";
			}
			
	}else{
			## Linus Server			
			if (!checkdnsrr($mailDomain, "MX")) {
				return "invalid_email";
			}
	}
	*/
	## Check the password lenght
	if ( strlen( $data['password'] ) < 5 ){
			return "password_lenght";
	}
		
	## Check the password
	if($data['password'] != $data['password_confirm']){
			return "password";
	}	
	
	if(MUST_HAVE_IMAGE == 222){
		## Check the user has uploaded a photo		
		if(isset($file['uploadFile00']['name']) && strlen($file['uploadFile00']['name']) < 4){
			return "photo";
		}
	
		## Check the user has uploaded a photo
		if($file['uploadFile00']['size'] == 0){
			return "photo";
		}

		## CHECK THE IMAE TYPE IS CORRECT
		$uptypes=array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/x-png');
		if(!in_array($file['uploadFile00']['type'], $uptypes)){ 
				 return "photo_invalid";
		}

	}		
	if(D_REGISTER_IMAGE ==99){
		## Check the verification code
		if (!$obj->validRequest($data['code'])) {
			return "verification";
		}
	}
	
	## CHECK ALL THE FIELDS HAVE BEEN COMPLETED
	$Exptions =  $data['LinkedRows'];
	for($i = 1; $i < 200; $i++) { 

		if($data['FieldName'.$i] == "age"){

			if(  ( isset($data['FieldValue'.$i]) && $data['FieldValue'.$i] =="1990-JAN-01" ) || 
				( isset($data['FieldValue'.$i.'a']) && $data['FieldValue'.$i.'a'] == "0" ) || 
				( isset($data['FieldValue'.$i.'b']) && $data['FieldValue'.$i.'b'] == "0" ) || 
				( isset($data['FieldValue'.$i.'c']) && $data['FieldValue'.$i.'c'] == "0" ) )

			{
	 
				return "field_empty";
	
			}
		}


									
		if(isset($data['FieldName'.$i]) && $data['FieldName'.$i] != "" && $data['FieldName'.$i] != "location" ){ // && $data['FieldName'.$i] != "country" 

			if(isset($data['FieldValue'.$i]) && ( ( $data['FieldValue'.$i] == "" ) || ( $data['FieldValue'.$i] == '0' ) )  ){
				if($Exptions ==0){
					return "field_empty";
				}else{
					$Exptions--;
				}
			}
		}							
	 }
								
	// NO ERRORS
	return "complete";
}


	function RegisterCompleteRedirect(){
	
		global $DB;
		
		// THE MEMBER ACCOUNT HAS NOW BEEN CREATED
		// WE MUST NOW REDIRECT THEM EITHER TO THEIR
		// ACCOUNT PAGE, OR TO THE VALIDATE PAGE
	 	/*
		if(VALIDATE_EMAIL ==1 ){
	
				## DISTORY USER SESSIONS
				$_SESSION['auth']="no";
				return "activateAccount";
		
		}elseif(isset($_SESSION['uid'])){
	
	 
			return "gogogo";
		}
		*/		
		if(isset($_SESSION['uid'])){
			return "gogogo";
		}

	
	}
?>