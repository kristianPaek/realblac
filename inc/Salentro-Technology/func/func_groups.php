<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Functions used for saving group data
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function ChangeDo($DoCall, $values = false){
	
	global $DB;
	
	$DoArray = array('join','remove','add','topic','comments'); // list of acceptable calls
	
	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){


			/**
			* Info: Functions used for saving blog data
			* 		
			* @version  9.0
			* @created  Fri Sep 25 10:48:31 EEST 2008
			* @updated  Fri Sep 25 10:48:31 EEST 2008
			*/
		
			case "add": {					
		
			
				if(isset($values['eid'])){				


					## edit options for moderator
					if( ( isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes") || APPROVE_ACCOUNTS =="no" ){

						$EditString = ",approved='yes' ";				
	
					}else{
						$EditString = ",approved='no' ";
					}

$EditString = ",approved='yes' ";	
			
					## update the database
					$DB->Update("UPDATE `groups` SET attachment='".$values['attachment']."', cat_id='".$values['cat_id']."', name='".$values['name']."', description='".$values['editor']."',`member_posts`='".$values['post_topics']."' ,photo='".$values['form_preview_image_hidden']."' ".$EditString." WHERE id='".$values['eid']."' LIMIT 1");									

					$DB->Insert("UPDATE groups SET updated='".DATE_TIME."' WHERE id='".$values['eid']."' LIMIT 1");

					return $GLOBALS['_LANG_ERROR']['_complete']."**1**done";

				}else{
				
					if(APPROVE_ACCOUNTS=="yes"){ $approveThis="no"; }else{ $approveThis="yes";}

$approveThis="yes";

					$QQ = "INSERT INTO `groups` (`cat_id` ,`uid` ,`name` ,`description` ,`join_open` ,`join_password` ,`member_invite` ,`member_posts`,photo,created,updated, rating, rating_votes, hits, approved, attachment) 
					VALUES ('".$values['cat_id']."', '".$_SESSION['uid']."', '".$values['name']."', '".$values['editor']."', '".$values['add_pass']."', '', '', '".$values['post_topics']."', '".$values['form_preview_image_hidden']."','".DATE_TIME."','".DATE_TIME."', '0','0','0','".$approveThis."','".$values['attachment']."')";
									
					$DB->Insert($QQ);				
					$new_groupid = $DB->InsertID();
									
					$DB->Insert("INSERT INTO `groups_members` (`group_id` ,`uid` ,`date_joined`)VALUES ('".$new_groupid."', '".$_SESSION['uid']."', '".date("Y-m-d")."')");

						## email admin alter
						CheckAdminEmail("groups","groups", $values, "-**1");

					 ## add system log
					 AddEventSystemLog(eMeetingInput($_SESSION['username']),"group_add", "", "", $_SESSION['uid'], $new_groupid,eMeetingInput($values['name']),0);						
															 
					return $GLOBALS['_LANG_ERROR']['_complete']."**1**done";
				}

					
			} break;



			/**
			* Info: Functions used for saving blog data
			* 		
			* @version  9.0
			* @created  Fri Sep 25 10:48:31 EEST 2008
			* @updated  Fri Sep 25 10:48:31 EEST 2008
			*/
			
			case "topic": {

			## make data safe
			$values = array_map('eMeetingInput', $values);
			
				$DB->Update("INSERT INTO `groups_topics` (`uid` ,`groups_id` ,title,`comments` ,`date`) VALUES 
				('".$_SESSION['uid']."', '".$values['gid']."', '".$values['t1']."', '".$values['t2']."','".date("Y-m-d")."')");
			

				$DB->Insert("UPDATE groups SET updated='".date("Y-m-d")."' WHERE id='".$values['gid']."' LIMIT 1");


				return $GLOBALS['_LANG_ERROR']['_complete']."**1";
					
			} break;


			/**
			* Info: Functions used to remove the group
			* 		
			* @version  9.0
			* @created  Fri Sep 25 10:48:31 EEST 2008
			* @updated  Fri Sep 25 10:48:31 EEST 2008
			*/

			case "remove": {
		
					$DB->Update("DELETE FROM `groups_members` WHERE uid='".$_SESSION['uid']."' AND group_id = ( '".$values['item_id']."' ) ");
					$DB->Update("DELETE FROM `groups_topics` WHERE uid='".$_SESSION['uid']."' AND groups_id = ( '".$values['item_id']."' ) ");
					//$DB->Update("DELETE FROM `comments` WHERE from_uid='".$_SESSION['uid']."' AND ex1_id = ( '".$values['gid']."' ) ");

					return $GLOBALS['_LANG_ERROR']['_complete']."**1";
				
			} break;

			/**
			* Info: Functions used for joining a group
			* 		
			* @version  9.0
			* @created  Fri Sep 25 10:48:31 EEST 2008
			* @updated  Fri Sep 25 10:48:31 EEST 2008
			*/
	
			case "join": {
		
				// IS THIS MEMBER ALREAD PART OF THIS GROUP OR DID THEY MAKE THIS GROUP
				$sql2 = "SELECT * FROM groups_members WHERE uid='".$_SESSION['uid']."' AND group_id = ( '".$values['item_id']."' ) LIMIT 1";

				$result2 = $DB->Row($sql2);
						
				if ( isset($result2['uid']) && $result2['uid'] == $_SESSION['uid'] ) {			
				
					$Err = "You are already a member of this group.";
																		
				}else{
				
					$DB->Update("INSERT INTO `groups_members` (`group_id` ,`uid` ,`date_joined`)VALUES ('".$values['item_id']."', '".$_SESSION['uid']."', '".date("Y-m-d")."')");
				
					$Err = $GLOBALS['_LANG_ERROR']['_complete']."**1";
				}	

			    return $Err;


			} break;			
		}
	
	}
	
	return "error_invalid_call";	
}

?>