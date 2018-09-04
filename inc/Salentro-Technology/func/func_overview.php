<?php 
function ChangeDo($DoCall, $values = false){

global $DB;

	$DoArray = array('poll'); // list of acceptable calls

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){		

			case "poll": {
			
				$DB->Update("UPDATE poll_data SET votecount = votecount + 1 WHERE voteid = '".$values['voteid']."' AND pollid = '".$values['pollid']."'");
				$DB->Insert("INSERT INTO `poll_check` ( `pollid` , `uid` , `time` )VALUES ('".$values['pollid']."', '".$_SESSION['uid']."', NOW())");
	
				return "Poll Voted Added";
			
			} break;
			
		}
	
	}
	
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
	
	$FoundExpired = $DB->Row("SELECT id, uid FROM members_billing WHERE uid= ( '".$id."' ) AND date_expire < '".date("Y-m-d H:i:s")."' AND running='yes' AND subscription ='no' LIMIT 1");
	
	if(!empty($FoundExpired)){
		
		$DB->Update("UPDATE members_billing SET running='no' WHERE id= ( '".$FoundExpired['id']."' )");
		$DB->Update("UPDATE members SET packageid=3 WHERE id= ( '".$FoundExpired['uid']."' )");
		
			/////////////////////////////////////////
			// SEND MEMBER AN EMAIL TO CONFIRM NEW MSG
			//////////////////////////////////////////
			$val = $DB->Row("SELECT members.email, members.username FROM members WHERE members.id = ( '".$FoundExpired['uid']."' )");
			if(!empty($val)){
							
				$Data['email'] =  $val['email'];
				$Data['username'] =  $val['username'];																	
				SendTemplateMail($Data, 14);
			}
			
	}
}
function CheckLogin($username, $password, $remember, $visible){
		
		/*
			THIS FUNCTION IS TO VALIDATE THE MEMBERS LOGIN DETAILS
			THIS ALSO CALLED THE SESSION HANDEL AND SETS THE USER
			ACCOUNT PERMISSIONS
		
		*/
		
		global $DB;
		
		$username = trim(strip_tags($username));
		$password = trim(strip_tags($password));

		$sql = "SELECT members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members, members_privacy WHERE " .
			"members.id = members_privacy.uid AND members.username = '$username' AND " .
			"members.password = '".md5($password)."' LIMIT 1";

		$result = $DB->Row($sql);
		
		if ( is_array($result) ) {
			
			if($result['active'] =="suspended"){
			
				return "suspended";
				
			}elseif($result['activate_code'] != "OK" && VALIDATE_EMAIL ==1){
			
				return "activate";				
			
			}elseif($result['active'] =="unapproved"){
			
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
	$result = $DB->Row("SELECT username, password FROM members WHERE email ='".$CheckThisEmail."'");
	if(empty($result)){ return "invalid"; }	


	$LostPassword['email'] = $CheckThisEmail;
	$LostPassword['username'] = $result['username'];
	$LostPassword['password'] = makeRandomPassword(); // THE NEW PASSWORD IS GENERATED HERE
	
	$DB->Update("UPDATE members SET password='".md5($LostPassword['password'])."' WHERE email ='".$CheckThisEmail."'");
	
	// Send the email to the user			
	SendTemplateMail($LostPassword, 4);
	
	return "complete";
				
}
?>