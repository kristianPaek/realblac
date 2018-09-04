<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Funcions used by the gallery page
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function ChangeDo($DoCall, $values = false, $Files = false){

	global $DB;
	
	$DoArray = array('upload','addalbum','edit','changeAlbum'); // list of acceptable calls

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){

			case "changeAlbum": {

					/**
					* Info: Change Album files
					* 		
					* @version  9.0
					* @created  Fri Sep 25 10:48:31 EEST 2008
					* @updated  Fri Sep 25 10:48:31 EEST 2008
					*/

					$DB->Update("UPDATE files SET aid='".$values['new_aid']."' WHERE id='".$values['lid']."' LIMIT 1");
					//Disable by Request
					//$DB->Update("UPDATE album SET filecount=filecount+1 WHERE aid='".$values['new_aid']."' LIMIT 1");
					
					//$DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid='".$values['aid']."' LIMIT 1");

					return $GLOBALS['_LANG_ERROR']['_complete']."**1";

			} break;

			case "upload": {

				/**
				* Info: File Upload
				* 		
				* @version  9.0
				* @created  Fri Sep 25 10:48:31 EEST 2008
				* @updated  Fri Sep 25 10:48:31 EEST 2008
				*/

						## Define Upload for YouTube Files
						if($values['type'] =="youtube"){
							
							## CHECK THIS IS A SAFE LINK AND NOT A HACK FILE
							$YouTubeLinks = array('youtube.com');
							$pos = strpos($values['url'], "youtube.com");
							if ($pos === false) {
								return $GLOBALS['LANG_GALLERY'][5];
							}
							$filter = array(".txt", ".php", ".xml", ".php4", ".net", ".co.uk");
							$values['url'] = str_replace($filter, "", $values['url']);
						
							############  ADD YOUTUBE FILE ############
							$url = str_replace('"', '', $values['url']);	## STRIP UNWANTED LINES
							$url = str_replace('\\', '', $values['url']);
							$url = strip_tags($url);
							############  INSERT DATABASE ENTRY ############
							$today=DATE_NOW;
							## MAKE APPROVED IF USING AUTO APPROVE
							if(APPROVE_FILES =="yes"){
								$appValue = "no";
							}else{
								$appValue = "yes";
							}
							##################
							$DB->Insert("INSERT INTO `files` (`id` ,`aid` ,`user` ,`uid` ,`date` ,`title` ,`description` ,`bigimage` ,`width` ,`height` ,`filesize` ,`views` ,`medwidth` ,`medheight` ,`medsize` ,`approved` ,`rating` ,`default` ,`featured` ,`type`)VALUES (NULL , '".$values['aid']."', '".$_SESSION['username']."', '".$_SESSION['uid']."', '".$today."', '".strip_tags($values['title'])."', '".strip_tags($values['comments'])."' , '".$url."', NULL , NULL , '0', '0', '0', '0', '0', '".$appValue."', '0.00', '1', 'no', 'youtube')");
							
							// UPDATE ALBUM FILE COUNT
							$DB->Update("UPDATE album SET filecount=filecount+1 WHERE aid='".$values['aid']."' LIMIT 1");
									
							$Status = "**complete";							
							
						}else{
							## Define Upload for Other Media
							include(dirname(__FILE__)."/func_uploads.php");

						$UploadMax = 0;
						while($UploadMax < 13){							
								
								// IF THE USER DOESNT HAVE AN ALBUM, CREATE ONE
								if(!isset($values['aid'])){ $values['aid']="new";}																
								if($value['error'] !=4 && is_array($Files["uploadFile0".$UploadMax]) && $Files["uploadFile0".$UploadMax]['type'] !="" ){ // error 4 = empty file			
                        		
									$Status = UploadFile($Files["uploadFile0".$UploadMax], $_SESSION['uid'], strip_tags($values['title']), strip_tags($values['comments']), $values['default'], $values['type'], $values['aid'],$values['upAdult']);
								
								}
							
						$UploadMax++; }
						

						}
						
						############  MANAGE ERROR RESPONCE ############

						$error = explode('**',$Status);
						switch($error[1]){
						
							case "failed":{

								return $GLOBALS['LANG_GALLERY'][1];
							
							}break;
							

							case "complete":{							
								
								## email admin alter
								CheckAdminEmail("gallery","gallery", $values, "-**1");

								return $GLOBALS['LANG_GALLERY'][2]."**1**done";
							
							}break;
							
							case "space":{
							
								return $GLOBALS['LANG_GALLERY'][3];
							
							}break;
							
							case "error_musc":{
							
								return $GLOBALS['LANG_GALLERY'][4];
							
							}break;
							
							case "error_vdeo":{
							
								return $GLOBALS['LANG_GALLERY'][5];
							
							}break;
							
							case "error_photo":{
							
								return $GLOBALS['LANG_GALLERY'][6];
							
							}break;
												
							default: { 	
								return $GLOBALS['LANG_GALLERY'][10];
							} break;						
						}
										
														
			} break;
			
		case "edit": {
		 
			$oldID = $DB->Row("SELECT aid FROM files WHERE id='".strip_tags($values['eid'])."' AND uid='".$_SESSION['uid']."' LIMIT 1");

			$DB->Update("UPDATE files SET title='".strip_tags($values['title'])."', aid='".$values['aid']."', description='".strip_tags($values['comments'])."', adult_content='".$values['upAdult']."' WHERE id='".strip_tags($values['eid'])."' AND uid='".$_SESSION['uid']."' LIMIT 1");
			
			// Disable by Request
			//$DB->Update("UPDATE album SET filecount=filecount+1 WHERE aid='".$values['aid']."' LIMIT 1");
					
			//$DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid='".$oldID['aid']."' LIMIT 1");

			AddEventSystemLog($_SESSION['username'],"file", "edit_".strip_tags($values['eid']));
			
			return $GLOBALS['LANG_GALLERY'][7]."**1";


		} break; 
			
		case "addalbum": {

				##################################
				##	ADD NEW MEMBER ALBUM
				##################################			
				if(!isset($values['af'])){$values['af'] = 'n';}
				if(!isset($values['ah'])){$values['ah'] = 'n';}
				if(!isset($values['an'])){$values['an'] = 'n';}
				if(!isset($values['aa'])){$values['aa'] = 'n';}
				
				if(!isset($values['aid'])){

					$DB->Insert("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a` ,password, time, date)
					VALUES (NULL , '".$_SESSION['uid']."', '".$values['title']."', '".$values['commentsBox']."', '0', '".$values['catid']."', '".$values['af']."', '".$values['ah']."', '".$values['an']."', '".$values['aa']."', '".$values['password']."', '".TIME_NOW."','".DATE_NOW."')");

					AddEventSystemLog($_SESSION['username'],"album", "create");

					return $GLOBALS['LANG_GALLERY'][8];
									
				}else{
					
					$DB->Update("UPDATE album SET  title='".$values['title']."', album.comment='".$values['commentsBox']."', cat='".$values['catid']."', allow_f='".$values['af']."' , allow_h='".$values['ah']."' , allow_n='".$values['an']."' , allow_a='".$values['aa']."', password='".$values['password']."' WHERE aid= ( '".$values['aid']."' ) LIMIT 1");			

					AddEventSystemLog($_SESSION['username'],"album", "edit_".$values['aid']);
					
					return $GLOBALS['LANG_GALLERY'][9];				
				}

				
		} break;
				
					
		}
	
	}
	
	return "error_invalid_call";	
}
?>