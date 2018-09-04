<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


 function ChangeDo($DoCall, $values = false, $Files = false){

	global $DB;

	$DoArray = array('update'); // list of acceptable calls

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){


			/**
			* Info: update follow settings
			* 		
			* @version  9.0
			* @created  Fri Sep 25 10:48:31 EEST 2008
			* @updated  Fri Sep 25 10:48:31 EEST 2008
			*/

			case "update": {

				// DOES THIS USER HAVE AN ACCOUNT?
				$DB->Row("SELECT autoid FROM members_follow WHERE uid='".$_SESSION['uid']."' LIMIT 1");
				if ($DB->Affected() == 0){
	
					$DB->Insert("INSERT INTO `members_follow` (`follow_friends` ,`follow_autoadd` ,`allow_approve` ,`follow_display` ,`uid`) VALUES ('".$values['follow_friends']."', '".$values['follow_auto']."', '".$values['follow_approve']."', '".$values['follow_display']."', '".$_SESSION['uid']."')");
					$DB->Insert("INSERT INTO `members_network` (`uid`, `to_uid`, `date`, `comments`, `type`, `approved`) VALUES ('".$_SESSION['uid']."', '".$_SESSION['uid']."', '', '', 8, 'yes')");
				}else{
	
					$DB->Update("UPDATE members_follow SET follow_friends='".$values['follow_friends']."', follow_autoadd='".$values['follow_auto']."', allow_approve='".$values['follow_approve']."', follow_display='".$values['follow_display']."' WHERE uid='".$_SESSION['uid']."' LIMIT 1");
				
				}

				return $GLOBALS['_LANG_ERROR']["_complete"]."**1";

			} break;

		}
	
	}

	return "error_invalid_call";
}
?>