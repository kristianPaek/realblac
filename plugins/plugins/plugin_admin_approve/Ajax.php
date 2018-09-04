<?
## START SESSIONS
if(!session_id())session_start();

// Send headers to prevent IE cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/html; charset=".$_SESSION['lang_charset']."");

if(!isset($_GET['action']) &&  !isset($_POST['action'])){	return "";	}

$action     	= isset($_GET['action']) 	?	trim(strip_tags($_GET['action']))	:'';
$post_action   	= isset($_POST['action'])			?	trim(strip_tags($_POST['action']))			:'';
 
if($action !=""){

	switch ( $action ){

	case "updateThis": {
	
 		$ff = dirname(__FILE__);
		$dir = str_replace("plugins/plugins/plugin_admin_approve","",$ff);
		$dir = str_replace("plugins\plugins\plugin_admin_approve","",$dir);
		require_once $dir."inc/config.php";
		//die(print_r($_GET));
		$id = trim(strip_tags($_GET['id']));
		$type = trim(strip_tags($_GET['type']));
		$value = trim(strip_tags($_GET['val']));
		
		if($type ==1){
		$DB->Update("UPDATE members_data SET description = ('".$value."') WHERE uid=(".$id.") LIMIT 1");
		}elseif($type ==3){
		$DB->Update("UPDATE members SET packageid = ('".$value."') WHERE id=".$id." LIMIT 1");
		}elseif($type ==4){
		$DB->Update("UPDATE files SET featured = ('".$value."') WHERE uid=".$id." LIMIT 1");
		print "Member Featured";
		return;
		}else{
		$DB->Update("UPDATE members_data SET headline = ('".$value."') WHERE uid=".$id." LIMIT 1");
		}

		print "Member Updated";
		
	
	
	} break;

		case "delete":{

 					$ff = dirname(__FILE__);
					$dir = str_replace("plugins/plugins/plugin_admin_approve","",$ff);
					$dir = str_replace("plugins\plugins\plugin_admin_approve","",$dir);
					require_once $dir."inc/config.php";

					$id = trim(strip_tags($_GET['id']));
					$nid = trim(strip_tags($_GET['nid']));

					if(is_numeric($id)){

						// SEND MEMBER EMAIL
						$Data = $DB->Row("SELECT * FROM members WHERE id='".$id."' LIMIT 1");
						$DB->Update("UPDATE members set active='active' WHERE id=".$id);
						$DB->Update("DELETE FROM members_edit_temp WHERE id=".$id);
						$DB->Update("DELETE FROM members_data_edit_temp WHERE uid=".$id);
						SendTemplateMail($Data, 67);
						//TODO: recover old profile data
/*	
						$val = $DB->Row("SELECT members_privacy.Notifications, members.email, members.username FROM members_privacy, 
						members WHERE members_privacy.uid = members.id AND members_privacy.uid=".$id);
	
						//$DB->Update("DELETE FROM members WHERE id=".$id);
						//$DB->Update("DELETE FROM members_data WHERE uid=".$id);
											
							$result = $DB->Query("SELECT bigimage, type, id FROM files WHERE uid=".$id);
				
							while( $file = $DB->NextRow($result) ){
				
								if( $file['type'] == 'music'){
				
									@unlink(PATH_MUSIC.$file['bigimage']);
																
								}elseif($file['type'] =='video'){
													
									@unlink(PATH_VIDEO.$file['bigimage']);
														
								}else{
													
									@unlink(PATH_IMAGE.$file['bigimage']);
									@unlink(PATH_IMAGE_THUMBS.$file['bigimage']);
																	
								}
								$DB->Update("DELETE FROM files WHERE uid=".$id." AND id=".$file['id']);
							}
											
									$DB->Update("DELETE FROM album WHERE uid =".$id);							
									$DB->Update("DELETE FROM forum_posts WHERE poster_id =".$id);
									$DB->Update("DELETE FROM forum_topics WHERE topic_poster =".$id);
									$DB->Update("DELETE FROM members_network WHERE uid=".$id);
									$DB->Update("DELETE FROM members_network WHERE to_uid=".$id);							
									$DB->Update("DELETE FROM poll_check WHERE uid =".$id);							
									$DB->Update("DELETE FROM members_template WHERE uid =".$id);
									$DB->Update("DELETE FROM member_scores WHERE uid =".$id);							
									$DB->Update("DELETE FROM members_billing WHERE uid =".$id);
									$DB->Update("DELETE FROM comments WHERE from_uid =".$id);							
									$DB->Update("DELETE FROM quiz WHERE uid =".$id);
									$DB->Update("DELETE FROM quiz_questions WHERE uid =".$id);
									$DB->Update("DELETE FROM quiz_results WHERE uid =".$id);							
									$DB->Update("DELETE FROM visited WHERE uid =".$id);
									$DB->Update("DELETE FROM poll_check WHERE uid =".$id);
									$DB->Update("DELETE FROM members_online WHERE logid =".$id);
									$DB->Update("DELETE FROM messages WHERE uid =".$id);
											
									$DB->Update("DELETE FROM members_privacy WHERE uid=".$id);
									if($val['Notifications'] =="yes"){
																	
												$Data['email'] =  $val['email'];
												$Data['username'] =  $val['username'];																	
												SendTemplateMail($Data, 8);
									}
					*/
			}

			print "Declined mail sent to the Member";


		} break;
	
		case "accept":{

					$ff = dirname(__FILE__);
					$dir = str_replace("plugins/plugins/plugin_admin_approve","",$ff);
					$dir = str_replace("plugins\plugins\plugin_admin_approve","",$dir);
					require_once $dir."inc/config.php";

					$id = trim(strip_tags($_GET['id']));

					$DB->Row("UPDATE members_edit_temp SET active='active', activate_code='OK' WHERE id='".$id."' LIMIT 1");
					$DB->Update("DELETE FROM members WHERE id=".$id);
					$DB->Insert("INSERT INTO members SELECT * FROM members_edit_temp WHERE id='".$id."' LIMIT 1");
					$DB->Update("DELETE FROM members_data WHERE uid=".$id);
					$DB->Insert("INSERT INTO members_data SELECT * FROM members_data_edit_temp WHERE uid='".$id."' LIMIT 1");
					$DB->Update("DELETE FROM members_edit_temp WHERE id=".$id);
					$DB->Update("DELETE FROM members_data_edit_temp WHERE uid=".$id);

					// SEND MEMBER EMAIL
					$Data = $DB->Row("SELECT * FROM members WHERE id='".$id."' LIMIT 1");
					SendTemplateMail($Data, 17);

 
					print "Member Accepted Successfully";

		} break;
	}

}
?>