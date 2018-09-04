<?php

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Functions used for saving calendar pages
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function ChangeDo($DoCall, $values = false, $Files = false){
	
	global $DB;
	
	$DoArray = array('add','edit'); // list of acceptable calls
	
	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){

			 /**
			 * Info: Add new event
			 * 		
			 * @version  9.0
			 * @created  Fri Sep 25 10:48:31 EEST 2008
			 * @updated  Fri Sep 25 10:48:31 EEST 2008
			 */
		
			case "add": {
					
			## make data safe
			$values = array_map('eMeetingInput', $values);

					if($values['name'] =="" || $values['editor']==""){
						return $GLOBALS['_LANG_ERROR']["_incomplete"];
					}

					if ($values['time'] == ''){ $eventtime = '25:00:00'; }else{$eventtime = $values['time'].':00';}

					if(APPROVE_ACCOUNTS=="yes"){ $approveThis="no"; }else{ $approveThis="yes";}

					$eventdate =$values['year']."-".$values['month']."-".$values['day'];
					  
					$query = "INSERT INTO `calendar_data` (`uid` ,`eventdate` ,`eventtime` ,`shortevent` ,`longevent` ,`type_1` ,`type_2` ,`country` ,`province` ,`city` ,`street` ,`phone` ,`email` ,`website` ,`vis` ,`approved`, featured,recurring,photo,hits,rating,rating_votes,attachment)
					VALUES ('".$_SESSION['uid']."', '".$eventdate."', '".$eventtime."', '".$values['name']."', '".$values['editor']."', '".$values['catid']."', '".$values['subcategory']."', '".$values['country']."', '".$values['state']."', '".$values['town']."', '".$values['street']."', '".$values['phone']."', '".$values['email']."', '".$values['website']."', '".$values['vis']."', '".$approveThis."','no','no','".$values['form_preview_image_hidden']."','0','0','0','".$values['attachment']."')";
					
					$DB->Insert($query);
					
					## INFORM ALL MY FRIENDS OF THE NEW EVENT
					$result = $DB->Query("SELECT members_network.id, members_network.uid, members_network.to_uid
					FROM members_network 
					LEFT JOIN members ON ( members.id = members_network.to_uid )
					WHERE (members_network.uid='".$_SESSION['uid']."' OR  members_network.to_uid='".$_SESSION['uid']."') AND members.username != '".$_SESSION['username']."' GROUP BY members.id");
					
					$msgTitle= CheckAddSlashes($_SESSION['username']." ".$GLOBALS['LANG_CALENDAR']['39']);
					$MessageData= CheckAddSlashes($_SESSION['username']." ".$GLOBALS['LANG_CALENDAR']['40']."<a href=\'index.php?dll=calendar&sub=view&day=".$values['day'].":".$values['month'].":".$values['year']."\'>".$GLOBALS['LANG_CALENDAR']['40']."</a>");
					
					while( $member = $DB->NextRow($result) ){
					 		 
							 if($member['uid'] != $_SESSION['uid']){
							 $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
							 VALUES ('".$_SESSION['uid']."', NULL , '".$member['uid']."', 'unread', NOW(), NOW(), '".$msgTitle."', '".$MessageData."', '1', 'sent', 'inbox')");
					 		 }
							 if($member['to_uid'] != $_SESSION['uid']){							
							 $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
							 VALUES ('".$_SESSION['uid']."', NULL , '".$member['to_uid']."', 'unread', NOW(), NOW(), '".$msgTitle."', '".$MessageData."', '1', 'sent', 'inbox')");
					 		 }
					 }
					 
					## SEND ADMIN EMAIL FOR APPROVAL
					if(APPROVE_ACCOUNTS == "yes"){													 
							$Data['email'] = ADMIN_EMAIL;
							$Data['custom'] = $_SESSION['username'];
							$Data['username'] = $_SESSION['username'];																	
							SendTemplateMail($Data, 34);																	 
					}
					
					return $GLOBALS['_LANG_ERROR']["_complete"]."**1";
			
			} break;
			
			 /**
			 * Info: Edit Event
			 * 		
			 * @version  9.0
			 * @created  Fri Sep 25 10:48:31 EEST 2008
			 * @updated  Fri Sep 25 10:48:31 EEST 2008
			 */
			
			case "edit": {
			
				## make the input safe
				$values = array_map('eMeetingInput', $values);
	

				if($values['name'] =="" || $values['editor']==""){

					return $GLOBALS['_LANG_ERROR']["_incomplete"];

				}

				## edit options for moderator
				if( ( isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes") || APPROVE_ACCOUNTS =="no" ){

					$EditString = ",approved='yes' ";				
	
				}else{
					$EditString = ",approved='no' ";
				}

				## get the event time
				if ($values['time'] == ''){ $eventtime = '25:00:00'; }else{$eventtime = $values['time'].':00';}
						
				## make date for database  
				$eventdate =$values['year']."-".$values['month']."-".$values['day'];
						
				## build query
				$query = 'UPDATE `calendar_data` SET photo="'.$values['form_preview_image_hidden'].'", `eventdate`="'.$eventdate.'" ,`eventtime`="'.$eventtime.'" ,`shortevent`="'.$values['name'].'" ,`longevent`="'.$values['editor'].'" ,`type_1`="'.$values['catid'].'" ,`type_2`="'.$values['subcategory'].'" ,`country` ="'.$values['country'].'" ,`province` = "'.$values['state'].'" ,`city`="'.$values['town'].'" ,`street` ="'.$values['street'].'",`phone`="'.$values['phone'].'" ,`email`="'.$values['email'].'" ,`website` ="'.$values['website'].'",`vis` ="'.$values['vis'].'", attachment="'.$values['attachment'].'" '.$EditString.' WHERE id="'.$values['eid'].'" LIMIT 1';
						
				$result = $DB->Insert($query);
				
				## send to admin for approval
				if(APPROVE_ACCOUNTS == "yes"){		
											 
								$Data['email'] = ADMIN_EMAIL;
								$Data['custom'] = $_SESSION['username'];
								$Data['username'] = $_SESSION['username'];																	
								SendTemplateMail($Data, 34);																	 
				}
									
				return $GLOBALS['_LANG_ERROR']["_complete"]."**1";
					
			} break;
		}
	
	}
	
	return "error_invalid_call";	
}

?>