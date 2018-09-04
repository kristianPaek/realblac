<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Display Mail Box 
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function ChangeDo($DoCall, $values = false, $Files = false){

	global $DB;

	$DoArray = array('add', 'delete'); // list of acceptable calls

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){


			/**
			* Info: Add new message
			* 		
			* @version  9.0
			* @created  Fri Sep 25 10:48:31 EEST 2008
			* @updated  Fri Sep 25 10:48:31 EEST 2008
			*/

			case "add": {
				
				## define variables
				$ThisArrId =0;	$ToArray = explode(",",$values['to']); $UploadMax = 0;
				
				## loop array of senders
				foreach($ToArray as $sending_to){
				
					## get the userid for this user
					$TUID = GetUserID($sending_to);
										
					if($TUID ==""){
											
							return $GLOBALS['LANG_MESSAGES'][1];
						
					}elseif($TUID == $_SESSION['uid']){
						
							return $GLOBALS['LANG_MESSAGES'][2];
					}

					if(strlen($values['subject']) < 2 ){
						
							return $GLOBALS['LANG_MESSAGES'][3];
					}

					## check members account space
					$usedimagespace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid= ( '".$_SESSION['uid']."' ) AND type = 'normal' AND maildate='".DATE_NOW."'");	
		
					if( ($usedimagespace['space'] >= $_SESSION['pack_messages']) && D_FREE =="no"){
						
							return $GLOBALS['LANG_MESSAGES'][4];
										
					}else{
								
							## check the sender isnt blocked
							$blocked = $DB->Row("SELECT count(uid) AS total FROM members_network WHERE type=3 AND to_uid= ( '".$_SESSION['uid']."' ) AND uid= ( '".$TUID."' ) ");					
							
							if($blocked['total'] ==0){

								// SEE IF MEMBER IS BLOCKED WITH THEIR PROVACY
								$PrivacyBlock = $DB->Row("SELECT `Time Zone` AS total FROM members_privacy WHERE uid= ( '".$TUID."' ) LIMIT 1");
	
								$access_data = explode("*",$PrivacyBlock['total']);
								$access_array = array();
								foreach($access_data as $value){		
									array_push($access_array,$value);
								}

								if( in_array($_SESSION['genderid'],$access_array) ){

									$blocked['total']=1;

								}
							}

							if($blocked['total'] ==0){
								
								$BadWords=CreateBadWordFilter();
 
								## make message data safe
                                $iddata = eMeetingInput(filter_str($values['idhidden'],$BadWords));

								$MessageData 	= eMeetingInput(filter_str($values['message'],$BadWords));

                                $MessageData1 	= eMeetingInput(filter_str($values['message1'],$BadWords));

                                $MessageData =GetMsgNote($MessageData1,$_SESSION['uid']).$MessageData;

								$MessageSubject = eMeetingInput(filter_str($values['subject'],$BadWords)); // 

								## add ecard to message
								if(isset($values['addCardID']) && $values['addCardID'] != 0){
										$CardCode ="<p><img src=\"".DB_DOMAIN."images/DEFAULT/_msg/cards/".$values['addCardID'].".jpg\"></p>"; 
								}else{ 
										$CardCode ="";
								}
												 
								## add smile icons
								$MessageData  = str_replace(":)","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/grin.gif\" align=\"absmiddle\">", $MessageData);											
								$MessageData  = str_replace(":P","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/tongue.gif\" align=\"absmiddle\">", $MessageData);
								$MessageData  = str_replace(":>","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/wink.gif\" align=\"absmiddle\">", $MessageData);
								$MessageData  = str_replace(":(","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/sad.gif\" align=\"absmiddle\">", $MessageData);


                                $SQL = "SELECT count(*) as total from messages where (mail2id = '".$_SESSION['uid']."' or uid = '".$_SESSION['uid']."') and mail_subject='".$MessageSubject."' ";
                                $result = $DB->Row($SQL);
                                if($iddata!='')
                                {
                                    if($result['total'] == 1)
                                    {
                                        $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
                                        VALUES ('".$_SESSION['uid']."', NULL , '".$TUID."', 'unread', '".DATE_NOW."', '".TIME_NOW."', '".$MessageSubject."', '".$MessageData.$CardCode."', '1', 'sent', 'inbox')");
                                        $message_id = $DB->InsertID();

                                    }
                                    else if($result['total'] == 2)
                                    {
                                        $b = "UPDATE `messages` SET maildate='".DATE_NOW."', mailtime='".TIME_NOW."', mail_message='".$MessageData.$CardCode."', mailstatus='unread' WHERE mail_subject='".$MessageSubject."' and uid='".$_SESSION['uid']."'   LIMIT 1";
                                        $DB->Update($b);
                                    }
                                    $c = "UPDATE `messages` SET maildate='".DATE_NOW."', mailtime='".TIME_NOW."', mail_message='".$MessageData.$CardCode."' WHERE mail_subject='".$MessageSubject."' and mail2id='".$_SESSION['uid']."' LIMIT 1";
                                    $DB->Update($c);
								## insert message into the database

                                }
                                else
                                {
                                    $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
                                    VALUES ('".$_SESSION['uid']."', NULL , '".$TUID."', 'unread', '".DATE_NOW."', '".TIME_NOW."', '".$MessageSubject."', '".$MessageData.$CardCode."', '1', 'sent', 'inbox')");
								    $message_id = $DB->InsertID();
                                }
								## add images to the message
								if(!empty($Files)){
 
									while($UploadMax < 5){

										## if no album is selected, create a new one
										if(!isset($values['aid'])){ $values['aid']="new";}		
														 
											## check for file error before uploading
											if( ( $values['error'] !=4 )  && is_array($Files["uploadFile0".$UploadMax]) && $Files["uploadFile0".$UploadMax]['type'] !="" ){ // error 4 = empty file			
																	
													$Status = UploadFile($Files["uploadFile0".$UploadMax], $_SESSION['uid'], "Message Photo", "Message Photo", $message_id, "photo", "none","no");														
														
											}

											$UploadMax++;

										}
								}
								
								## Send Alert Message
								DoEmailSMS($TUID,5,'email_msg',substr($MessageData,0,30));																		
									
							
							}else{
							
								return $GLOBALS['_LANG_ERROR']['_userBlocked'];
							
							}
						}			
				} 
				
				return $GLOBALS['_LANG']['_msgSent']."**1";
														
			} break;	


	
			/**
			* Info: Delete Mailbox Messages
			* 		
			* @version  9.0
			* @created  Fri Sep 25 10:48:31 EEST 2008
			* @updated  Fri Sep 25 10:48:31 EEST 2008
			*/

			case "delete": {	
		
				
				for($i = 1; $i < $values['totalMail']+1; $i++) { 
					
					if(isset($values['d'. $i]) && $values['d'.$i] == "on"){
                        $mDATA = $DB->Row("SELECT * FROM messages WHERE mailnum =".$values['di'. $i]." LIMIT 1");
                        $DB->Update("DELETE FROM messages WHERE uid =".$mDATA['uid']." and mail_subject='".$mDATA['mail_subject']."' and mail2id =".$mDATA['mail2id']."  LIMIT 1");
                        $DB->Update("DELETE FROM messages WHERE uid =".$mDATA['mail2id']." and mail_subject='".$mDATA['mail_subject']."' and mail2id =".$mDATA['uid']."  LIMIT 1");
						
						/*if($values['sub'] == "inbox"){
								//$message_user = $DB->Row("SELECT uid, count(uid) FROM messages WHERE mailnum='".$values['di'. $i]."'");
								//$message_user2 = $DB->Row("SELECT mailnum, count(mailnum) FROM messages WHERE  mail2id =".$_SESSION['uid']." AND uid='".$message_user['uid']."'");
								//print_r($message_user2);
							//die('test');

									$DB->Update("UPDATE messages SET to_box='trash' WHERE  mail2id =".$_SESSION['uid']." AND uid='".$message_user['uid']."' ");
							
						}
						
						if($values['sub'] == "wink"){ 

									$DB->Insert("UPDATE messages SET to_box='trash' WHERE mail2id =".$_SESSION['uid']." AND mailnum='".$values['di'. $i]."' LIMIT 1");													
						}
						
						if($values['sub'] == "trash"){

									$DB->Insert("UPDATE messages SET to_box='none' WHERE  mail2id =".$_SESSION['uid']." AND mailnum='".$values['di'. $i]."' LIMIT 1");
							}

						if($values['sub'] =="sent"){		
		
							$DB->Insert("UPDATE messages SET my_box='none' WHERE  uid =".$_SESSION['uid']." AND mailnum='".$values['di'. $i]."' LIMIT 1");
						} */


					}
				}					
						
				return $GLOBALS['_LANG_ERROR']['_complete']."**1";		

			} break;	
		}
	
	}
	
	return "error_invalid_call";	
}



function GetMsgNote($mess,$id)
{
    global $DB;



    if(!is_numeric($id)){ return; }



    ## define variables

    $NumFields=1;	$ReturnMessageArray=array();	$id = strip_tags($id);



    ## build query



    $SQl = "SELECT * FROM members WHERE members.id='".$id."'";
    $msg = $DB->Row($SQl);
    ## create replay chain
    $chaindata="\n\n on ".DATE_NOW." ".date("h:i:s A", strtotime(TIME_NOW)) .", ". $msg['username'] ." wrote: \n\n" .$mess;

    return $chaindata;
}
?>