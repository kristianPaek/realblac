<?
/***************************************************************************
 *
 *	 PROJECT: eMeeting Dating Software
 *	 VERSION: 9
 *	 LISENSE: OWN / LEASED (http://www.datingscripts.co.uk/license.php)
 *
 *	 This program is a commercial software product and any kind of usage
 *	 means agreement to the eMeeting software License Agreement.
 *
 *	 This notice MUST NOT be removed from the code.   
 *
 *   Copyright 2006-2007 eMeeting Ltd.
 *   http://www.datingscripts.co.uk/
 *
 ***************************************************************************/
## START SESSIONS
if(!session_id())session_start();


// Send headers to prevent IE cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/html; charset=".$_SESSION['lang_charset']."");

if(!isset($_GET['action']) &&  !isset($_POST['action'])){	return "";	}
require_once "../config.php";

Build_BankChecker();
if($_SERVER['argv'][1] || $_SERVER['argv'][2]){
	die( 'Restricted access' );
}

$action     	= isset($_GET['action']) 	?	trim(strip_tags($_GET['action']))	:'';
$post_action   	= isset($_POST['action'])			?	trim(strip_tags($_POST['action']))			:'';
 
############################################################
#################### OPERATIONS ############################

if($post_action !=""){

	switch ( $post_action ){
 
	case "ChangeSaveSearch": {

	if($_SESSION['auth'] =="yes" && is_numeric($_POST['id'])){

		$message = trim(strip_tags($_POST['msg']));
	
		$DB->Update("UPDATE member_searches SET search_name = ('".eMeetingInput($message)."') WHERE search_id= ('".$_POST['id']."') AND uid='".$_SESSION['uid']."' LIMIT 1"); 

		print eMeetingOutput($message);
 
	}
	
	} break;

		/**
		* Info: Add new comment for the calendar page
		* 		
		* @version  9.0	*/
	
	
		case "ChangeStatusMsg": {
		
			$message = trim(strip_tags($_POST['msg']));
		
			$DB->Update("UPDATE members SET msgStatus='".$message."' WHERE id='".$_SESSION['uid']."' LIMIT 1");

			## add system log
			AddEventSystemLog($_SESSION['username'],"status", "", "", $_SESSION['uid'], $message,0);
		
			print eMeetingOutput($message);
	
		} break;
	}
}
if($action !=""){

switch ( $action ){

	case "ChangeRelationship":{
	 
		$id1 		= trim(strip_tags($_GET['id1'])); 		// friend type
		$id2 		= trim(strip_tags($_GET['id2'])); 		// user id
		$spandiv 	= trim(strip_tags($_GET['spandiv'])); 	// span id

if (D_FRIENDS == 1) {
   $friendlist = "<option value='2'>Add to Friends</option>";
}else {
   $friendlist = "";
}

		print "<select onChange=\"ChangeRelationshipDiv(this.value,".$id1." ,".$id2." ,'".$spandiv."');\"> <option value='0'>No Change</option>    <option value='1'>Add to Favorites</option> $friendlist  <option value='3'>Add to Blocked</option> </select>";
	
	} break;

	case "SendWink": {
	
		$sendfrom 	= trim(strip_tags($_GET['sendfrom'])); 	// user id
		$sendto 	= trim(strip_tags($_GET['sendto'])); 	// user id 
		
		$CurrentRel = $DB->Row("SELECT id,email FROM members WHERE username='".$sendto."' LIMIT 1");
		
		$Total = $DB->Row("SELECT count(wsid) AS countwink FROM winkmessagessend WHERE wink_from='".$_SESSION['uid']."' && wink_to='".$CurrentRel['id']."'");
		if($Total['countwink']==0){
			$DB->Update("INSERT into winkmessagessend (wink_from, wink_to, sentondate, onlydate) values ('".$_SESSION['uid']."', '".$CurrentRel['id']."', NOW(), '".date("Y-m-d")."')");
			
			$to = $CurrentRel['email'];
	
			$subject = 'New Wink Message';
			
			$headers = "From: RealBlackLove.com <noreply@realbacklove.com>" . "\r\n";
			//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
			//$headers .= "CC: siddharth.mishra85@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$message = '<html><body>';
			$message .= '<div>You have been winked at by '.$_SESSION['username'].', login now to start a conversation.</div>';
			$message .= '<br><br><br>';
			$message .= '<div>Good Luck,</div>';
			$message .= '<div>RBL TEAM</div>';
			$message .= '<div>http://www.realbacklove.com</div>';
			$message .= '</body></html>';	
			
			
			if(mail($to, $subject, $message, $headers)){
				print('Wink Sent');
			}
		} else {
				print('<span style="color:red;font-size:10px;">Already Winked</span>');
		}
	} break;




	case "UpdateRelationship":{

		$oid 	= trim(strip_tags($_GET['oid'])); 	// user id
		$nid 	= trim(strip_tags($_GET['nid'])); 	// user id 
		$muid 	= trim(strip_tags($_GET['muid'])); 	// user id 
 
		$CurrentRel = $DB->Row("SELECT uid, to_uid, type FROM members_network WHERE uid='".$_SESSION['uid']."' AND to_uid='".$muid."' LIMIT 1");

		if($CurrentRel['uid'] == $_SESSION['uid']){

			$DB->Update("UPDATE members_network SET members_network.type='".$nid."' WHERE uid='".$_SESSION['uid']."' AND to_uid='".$muid."' LIMIT 1");
		}
		else {

			$DB->Update("UPDATE members_network SET members_network.type='".$nid."' WHERE to_uid='".$_SESSION['uid']."' AND uid='".$muid."' LIMIT 1");

			$DB->Update("INSERT into members_network (uid, to_uid, date, type, approved) values ('".$_SESSION['uid']."', '".$muid."', NOW( ), '".$nid."', 'yes')");


		}

		print $GLOBALS['_LANG_ERROR']['_complete'];
	
	} break;

	case "GenderChanger":{

	$id = trim(strip_tags($_GET['id']));
	if(is_numeric($id) && $id !=0){

	print "<br>";
	print DisplaySignupFields($id);

	}
	
	} break;

	case "DeleteSaveSearch":{

	$id = trim(strip_tags($_GET['id']));
 
	if(is_numeric($id)){
	
		$DB->Update("DELETE FROM member_searches WHERE search_id= ('".$id."') AND uid='".$_SESSION['uid']."' LIMIT 1");


	}

	print $GLOBALS['_LANG_ERROR']['_complete'];


	} break;

	case "PopClassSubCats": {

	$id = trim(strip_tags($_GET['value']));
	$def = trim(strip_tags($_GET['def']));

	$result1 = $DB->Query("SELECT id, name, icon FROM class_cats WHERE subId= ('".$id."') ORDER BY name DESC");

	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
	print '<select name="sub_catid"><option value="0">--------------</option>';
    while( $Data = $DB->NextRow($result1) )
    {
	if($def ==$Data['id']){ $extra="selected"; }else{ $extra="";}
	print "<option value='".$Data['id']."' ".$extra.">".$Data['name']."</option>";

	}
	print '</select>';
	} break;

	case "eMeetingProfileRating":{
	
	$rating = trim(strip_tags($_GET['rating']));
	$id = trim(strip_tags($_GET['profileID']));

	$DB->Insert("INSERT INTO `member_rating` (`uid` ,`date` ,`vote_amount` ,`ip`, profile_id) VALUES ('".$_SESSION['uid']."', NOW( ) , '".$rating."', '".$ip."','".$id."')");

	// LETS UPDATE THE MEMBERS TABLE VOTE COUNTER
	$Total = $DB->Row("SELECT sum(vote_amount) AS total FROM member_rating WHERE profile_id='".eMeetingInput($id)."'");
	$Total1 = $DB->Row("SELECT count(id) AS total FROM member_rating WHERE profile_id='".eMeetingInput($id)."'");

	// WORK OUT THE PERCENTAGE
	$avg = @round($Total['total']/$Total1['total'],2);							
	$perc = @round( (100/5)*$avg);

	$DB->Row("UPDATE members SET member_rating='".$perc."' WHERE members.id='".eMeetingInput($id)."' LIMIT 1");
 
	print "<span style='font-size:16px;margin-left:10px'>Vote saved!!</span>";

	} break;


	case 'RejectIM': {

		$requestUID = trim(strip_tags($_GET['uid']));
	
		$DB->Update("UPDATE im SET `read`='yes' WHERE to_uid=".$_SESSION['uid']." and from_uid=".$requestUID.""); // makr as read
	
		//if IM rejection not to self then send a message to chat initiater
		if($_SESSION['uid'] != $requestUID)
		{
			$DB->Insert("INSERT INTO `im` ( `dataid`, `from_uid` , `to_uid` , `date` , `message` , `read` ,avartar) VALUES (NULL , '".$_SESSION['uid']."', '".$requestUID."', NOW( ) , 'Chat Request Rejected!', 'no','system.gif')");
		}
	
	} break;

	case 'ChangeIMLive': {
	
		$uid = trim(strip_tags($_GET['uid']));

		if(!is_numeric($uid)){ return ""; }

		$CurrentStatus = $DB->Row("SELECT video_live FROM members WHERE id= ('".$uid."') LIMIT 1");

		if($CurrentStatus['video_live'] =="yes"){

			$DB->Update("UPDATE members SET video_live ='no' WHERE id= ('".$uid."') LIMIT 1");
		}else{
			$DB->Update("UPDATE members SET video_live ='yes' WHERE id= ('".$uid."') LIMIT 1");
		}		

	} break;

	/**
	* Info: Moderator Live Approval
	* 		
	* @version  9.0
	*/
	case 'ModLiveRemoveFeatured': {
				
		$id = trim(strip_tags($_GET['id']));
		$page = trim(strip_tags($_GET['page']));
		$subpage = trim(strip_tags($_GET['subpage']));
		if($page =="search"){ $page="profile"; }

		if(isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes") {
		
			switch($page){

					case "classads": { 

						## switch comments page

						$DB->Update("UPDATE `class_adverts` SET featured='no' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "calendar": { 

						## switch comments page

						$DB->Update("UPDATE `calendar_data` SET featured='no' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "profile": { 

						## switch comments page

						$DB->Update("UPDATE files  SET featured='no' WHERE uid=('".$id."') AND type='photo' AND featured='yes'");						

					} break;

			}

		}

		print $GLOBALS['_LANG_ERROR']['_complete'];

	} break;

	/**
	* Info: Moderator Live Approval
	* 		
	* @version  9.0
	*/
	case 'ModLiveFeatured': {
				
		$id = trim(strip_tags($_GET['id']));
		$page = trim(strip_tags($_GET['page']));
		$subpage = trim(strip_tags($_GET['subpage']));
		if($page =="search"){ $page="profile"; }

		if(isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes") {
		
			switch($page){

					case "classads": { 

						## switch comments page

						$DB->Update("UPDATE `class_adverts` SET featured='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "calendar": { 

						## switch comments page

						$DB->Update("UPDATE `calendar_data` SET featured='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "profile": { 

						## switch comments page
 
						$DB->Update("UPDATE files  SET featured='yes' WHERE uid=('".$id."')AND type='photo'");						

					} break;

			}

		}

		print $GLOBALS['_LANG_ERROR']['_complete'];

	} break;
	/**
	* Info: Moderator Live Approval
	* 		
	* @version  9.0
	*/
	case 'ModLiveApprove': {
				
		$id = trim(strip_tags($_GET['id']));
		$page = trim(strip_tags($_GET['page']));
		$subpage = trim(strip_tags($_GET['subpage']));
		if($page =="search"){ $page="profile"; }
		if(isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes") {
		
			switch($page){

					case "classads": { 

						## switch comments page

						$DB->Update("UPDATE `class_adverts` SET approved='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "calendar": { 

						## switch comments page

						$DB->Update("UPDATE `calendar_data` SET approved='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "blog": { 

						## switch comments page
 
						$DB->Update("UPDATE `blog_posts` SET approved='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;
	
					case "music": { 

						## switch comments page

						$DB->Update("UPDATE `files` SET approved='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "video": { 

						## switch comments page

						$DB->Update("UPDATE `files` SET approved='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "groups": { 

						## switch comments page

						$DB->Update("UPDATE `groups` SET approved='yes' WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "profile": { 

						## switch comments page
 
						$DB->Update("UPDATE `members` SET active='active', activate_code ='OK' WHERE id=('".$id."') LIMIT 1");						

					} break;
 
			
					case "comments": { 

					} break;

			}

		}

		print $GLOBALS['_LANG_ERROR']['_complete'];

	} break;

	/**
	* Info: DELETE VIDEO GREETINGS
	* 		
	* @version  9.0
	*/

	case "VideoDelete":{
	
		$DB->Update("UPDATE members SET video_duration=0 WHERE id=('".$_SESSION['uid']."') LIMIT 1");
		
		print $GLOBALS['_LANG_ERROR']['_complete'];

	} break;

	/**
	* Info: Moderator Live Delete
	* 		
	* @version  9.0
	*/
	case 'ModLiveDelete': {
				
		$id = trim(strip_tags($_GET['id']));
		$page = trim(strip_tags($_GET['page']));
		$subpage = trim(strip_tags($_GET['subpage']));
 
		if(isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes") {
		if($page =="search"){ $page="profile"; }
			switch($page){
				
					case "comments": { 

						## switch comments page

						$DB->Update("DELETE FROM `comments` WHERE id=('".$id."') LIMIT 1");
					
					} break;

					case "groups": { 

						## switch comments page

						$DB->Update("DELETE FROM `groups` WHERE id=('".$id."') LIMIT 1");
						$DB->Update("DELETE FROM `groups_members` WHERE group_id =('".$id."') LIMIT 1");

					} break;

					case "blog": { 

						## switch comments page

						$DB->Update("DELETE FROM `blog_posts` WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "classads": { 

						## switch comments page

						$DB->Update("DELETE FROM `class_adverts` WHERE id=('".$id."') LIMIT 1");						

					} break;

					case "calendar": { 

						## switch comments page

						$DB->Update("DELETE FROM `calendar_data` WHERE id=('".$id."') LIMIT 1");						
						$DB->Update("DELETE FROM `calendar_attending` WHERE event_id =('".$id."') LIMIT 1");

					} break;

					case "music": { 

						## switch comments page
						$data = $DB->Row("SELECT aid,  bigimage, type, id FROM files WHERE id=('".$id."') LIMIT 1");
						@unlink(PATH_MUSIC.$data['bigimage']);					
						$DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid=('".$data['aid']."') LIMIT 1");
						$DB->Update("DELETE FROM files WHERE id=('".$id."') LIMIT 1");

					} break;

					case "photo": { 

						## switch comments page
						$data = $DB->Row("SELECT aid,  bigimage, type, id FROM files WHERE id=('".$id."') LIMIT 1");
						@unlink(PATH_IMAGE.$data['bigimage']);
						@unlink(PATH_IMAGE_THUMBS.$data['bigimage']);						
						$DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid=('".$data['aid']."') LIMIT 1");
						$DB->Update("DELETE FROM files WHERE id=('".$id."') LIMIT 1");

					} break;

					case "video": { 

						## switch comments page
						$data = $DB->Row("SELECT aid,  bigimage, type, id FROM files WHERE id=('".$id."') LIMIT 1");
						@unlink(PATH_VIDEO.$data['bigimage']);					
						$DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid=('".$data['aid']."') LIMIT 1");
						$DB->Update("DELETE FROM files WHERE id=('".$id."') LIMIT 1");

					} break;

					case "profile": { 

						## switch comments page
							$val = $DB->Row("SELECT members_privacy.Notifications, members.email, members.username FROM members_privacy, members WHERE members_privacy.uid = members.id AND members_privacy.uid=".$id." LIMIT 1");
							$DB->Update("DELETE FROM members WHERE id=".$id." LIMIT 1");
							$DB->Update("DELETE FROM members_data WHERE uid=".$id." LIMIT 1");
							
							    $result = $DB->Query("SELECT bigimage, type, id FROM files WHERE uid=".$id." LIMIT 1");

								while( $file = $DB->NextRow($result) )
								{
									///////////////////////////////////////////////////////
									///	CHECK FILE PATHS
									//////////////////////////////////////////////////////
									if( $file['type'] == 'music'){

										@unlink(PATH_MUSIC.$file['bigimage']);
												
									}elseif($file['type'] =='video'){
									
										@unlink(PATH_VIDEO.$file['bigimage']);
										
									}else{
									
										@unlink(PATH_IMAGE.$file['bigimage']);
										@unlink(PATH_IMAGE_THUMBS.$file['bigimage']);
													
									}
									$DB->Update("DELETE FROM files WHERE uid=".$id." AND id=".$file['id']." LIMIT 1");
								}

							$DB->Update("DELETE FROM album WHERE uid =".$id." LIMIT 1");							
							$DB->Update("DELETE FROM forum_posts WHERE poster_id =".$id." LIMIT 1");
							$DB->Update("DELETE FROM forum_topics WHERE topic_poster =".$id." LIMIT 1");
							$DB->Update("DELETE FROM members_network WHERE uid=".$id." LIMIT 1");
							$DB->Update("DELETE FROM members_network WHERE to_uid=".$id." LIMIT 1");							
							$DB->Update("DELETE FROM poll_check WHERE uid =".$id." LIMIT 1"); 									
							$DB->Update("DELETE FROM members_template WHERE uid =".$id." LIMIT 1");
							$DB->Update("DELETE FROM member_scores WHERE uid =".$id." LIMIT 1");							
							$DB->Update("DELETE FROM members_billing WHERE uid =".$id." LIMIT 1");
							$DB->Update("DELETE FROM comments WHERE from_uid =".$id." LIMIT 1");							
							$DB->Update("DELETE FROM quiz WHERE uid =".$id." LIMIT 1");
							$DB->Update("DELETE FROM quiz_questions WHERE uid =".$id." LIMIT 1");
							$DB->Update("DELETE FROM quiz_results WHERE uid =".$id." LIMIT 1");							
							$DB->Update("DELETE FROM visited WHERE uid =".$id." LIMIT 1");
							$DB->Update("DELETE FROM poll_check WHERE uid =".$id." LIMIT 1");
							$DB->Update("DELETE FROM members_online WHERE logid =".$id." LIMIT 1");
							$DB->Update("DELETE FROM messages WHERE uid =".$id." LIMIT 1");

							/////////////////////////////////////////
							// SEND MEMBER AN EMAIL TO CONFIRM APPROVAL
							//////////////////////////////////////////
							$DB->Update("DELETE FROM members_privacy WHERE uid=".$id." LIMIT 1");
							if($val['Notifications'] =="yes"){
													
								$Data['email'] =  $val['email'];
								$Data['username'] =  $val['username'];																	
								SendTemplateMail($Data, 8);
							}

					} break;

				
			}		
				
			// DELETE COMMENTS
			$DB->Update("DELETE FROM `comments` WHERE ex1_id=('".$id."') LIMIT 1");

			print $GLOBALS['_LANG_ERROR']['_complete'];

		}

	} break;
	/**
	* Info: Displays the package features on the upgrade page
	* 		
	* @version  9.0
	*/

				case "displayPackageFea":{
				
					$id	= trim(strip_tags($_GET['id']));  // package id
					## GET PACKAGE DETAILS
					$result = $DB->Row("SELECT * FROM package WHERE pid=".$id." LIMIT 1");
		
					$PACKARRAY[0]['id'] 	=	$id;
					$PACKARRAY[0]['name'] 	=	$result['name'];
 

					print "<div class='box_title' style='width:100%'>".$result['name'].'</div>
					<ul class="benifits">
					<li style="border-top:1px dotted #999;"><a href="#" onclick="return false;">'.$result['comments'].'</a></li>';
				 	
					
					if($result['icon'] !="SMS"){

						print '<li style="border-top:1px dotted #999;"><a href="#" onclick="return false;" style="color:#666;">'.$lang_ajax[40].' '.$result['maxFiles'].' '.$GLOBALS['_LANG']['_album']." ".$GLOBALS['_LANG']['_files'].'</a></li>
						<li><a href="#" onclick="return false;" style="color:#666;">'.$lang_ajax[39].' '.$result['maxMessage'].' '.$lang_ajax[37].'</a></li>
						<li><a href="#" onclick="return false;" style="color:#666;">'.$lang_ajax[39].' '.$result['wink'].' '.$lang_ajax[38].'</a></li>';					
						
						if($result['Highlighted'] =="yes"){
							print  '<li><a href="#" onclick="return false;" style="color:#666;">'.$lang_ajax[41].'</a></li>';
						}
																
						if($result['Featured'] =="yes"){
							print  '<li><a href="#" onclick="return false;" style="color:#666;">'.$lang_ajax[42].'</a></li>';
						}
						
						if($result['SMS_credits'] > 0){
							print  '<li><a href="#" onclick="return false;" style="color:#666;">'.$result['SMS_credits'].' '.$lang_ajax[43].'</a></li>';
						}					
	
						 $inner=1;

					foreach($PAGE_ARRAY as  $PAGENAME => $TOP_MENU){

						foreach( $TOP_MENU as $key => $value){ 
		 
							if(substr($key,-1,1) !="?" && substr($key,1,3) !="dll" && ( $key !="view" && $key !="" && $key !="inbox" && $key !="sent" && $key !="trash" && $key !="manage"  && $key !="albums" && $key !="password" && $key !="cancel"  && $key !="taken" && $key !="test") && $value !=""){ ## hide value if its a help value 
		
								if($inner==1){ $InnerSymbol="<img src='inc/images/icons/flag_blue.png'>"; 
								}else{ $InnerSymbol="&nbsp;&nbsp;&nbsp;&nbsp;<img src='inc/images/icons/resultset_next.png'>"; }
		 
		
								foreach($PACKARRAY as $pValue){	 
								
										$PackageString="";
										$PackageString = $PAGENAME."-".$key; 
								
										if(is_array($PACKAGEACCESS[$pValue['id']]) && in_array($PackageString,$PACKAGEACCESS[$pValue['id']])){ 
											
										}else{

											print  '<li><a href="#" onclick="return false;" style="color:#666;">'.$TOP_MENU[$key].'</a></li>';

										 }										
										
								}
							
								$i++; 
								$inner++;
							} 
								
						} 
						}

					}else{
						print '<li><a href="#" onclick="return false;">Extra '.$result['SMS_credits'].' '.$lang_ajax[43].'</a></li>';
					}						
					print '</ul>';
					
				} break;

	/**
	* Info: Delete Classified Adverts
	* 		
	* @version  9.0
	*/
	case 'ClassAdDelete': {
				
				$id= trim(strip_tags($_GET['id']));

				$DB->Update("DELETE FROM class_adverts  WHERE id='".$id."' AND uid='".$_SESSION['uid']."' LIMIT 1");

				// DELETE COMMENTS
				$DB->Update("DELETE FROM `comments` WHERE ex1_id=('".$id."') LIMIT 1");
							
				print $GLOBALS['_LANG_ERROR']['_complete'];
	} break;

	/**
	* Info: Approve Network Friends
	* 		
	* @version  9.0
	*/
	case "ApproveNetwork": {
				
		$del_uid 	= trim(strip_tags($_GET['uid']));
		$netid		= trim(strip_tags($_GET['netid']));
				
		$DB->Update("UPDATE members_network SET approved ='yes' WHERE (uid='".$del_uid."' OR to_uid='".$del_uid."')  AND (uid=".$_SESSION['uid']." OR to_uid=".$_SESSION['uid'].") AND type='".$netid."'"); //AND to_uid=".$_SESSION['uid']."
		
		print $GLOBALS['_LANG_ERROR']['_complete'];

	} break;
	
	/**
	* Info: Delete Network Friends
	* 		
	* @version  9.0
	*/
	case "DeleteNetwork": {
				
		$del_uid	= trim(strip_tags($_GET['uid']));
		$netid		= trim(strip_tags($_GET['netid']));
 
		$DB->Update("DELETE FROM members_network WHERE (uid='".$del_uid."' OR to_uid='".$del_uid."')  AND (uid=".$_SESSION['uid']." OR to_uid=".$_SESSION['uid'].") AND type='".$netid."'");
				
		print $GLOBALS['_LANG_ERROR']['_complete'];
				
	} break;

	/**
	* Info: Change Online Status
	* 		
	* @version  9.0
	*/
	case "ChangeOnlineStatus": {

		$status = trim(strip_tags($_GET['status'])); // ONLINE STATUS

		$DB->Update("UPDATE members SET `visible` ='".$status."' WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");
	
		print $GLOBALS['_LANG_ERROR']['_complete'];
	
	} break;
	/**
	* Info: Make Default Music File
	* 		
	* @version  9.0
	*/
	case "MakeDefaultMusic": {

						$fid = trim(strip_tags($_GET['fid'])); // SELECT LIST VALUE
						$whichway = trim(strip_tags($_GET['whichway']));
  
						// FIRST LETS MAKE SURE WHOS FILE THIS IS
 
						$MyFile = $DB->Row("SELECT uid, bigimage FROM files WHERE id= ( '".$fid."' ) LIMIT 1");
 
						if($MyFile['uid'] ==$_SESSION['uid']){
 
							if($whichway==1){
	
								$DB->Update("UPDATE files SET `default` =0 WHERE uid= ( '".$_SESSION['uid']."' ) AND type='music'");
								$DB->Update("UPDATE files SET `default` =1 WHERE uid= ( '".$_SESSION['uid']."' ) AND type='music' AND id= ( '".$fid."' ) LIMIT 1");
	
							}elseif($whichway ==0){
 
								$DB->Update("UPDATE files SET `default` =0 WHERE uid= ( '".$_SESSION['uid']."' ) AND type='music'");
					
							}

						}else{

						// ITS NOT MY FILE, BUT LETS CREATE A LINK
						if($whichway ==0){
    
								$ThisFile = $DB->Row("SELECT bigimage FROM files WHERE id= ( '".$fid."' ) LIMIT 1");
								$DB->Update("DELETE FROM files WHERE uid= ( '".$_SESSION['uid']."' ) AND type='music' AND description='".$ThisFile ['bigimage']."' LIMIT 1");
					
						}else{
						// DELETE ANY OF MY OLD MUSIC ALBUMS
						$DB->Update("DELETE FROM files WHERE uid='".$_SESSION['uid']."' AND aid='0' AND type='music'");
						$DB->Update("UPDATE files SET `default` =0 WHERE uid= ( '".$_SESSION['uid']."' ) AND type='music'");
						$DB->Insert("INSERT INTO `files` (`aid` ,`user` ,`uid` ,`date` ,`title` ,`description` ,`bigimage` ,`width` ,`height` ,`filesize` ,`views` ,`medwidth` ,`medheight` ,`medsize` ,`approved` ,`rating` ,`default` ,`featured` ,`type` ,`rating_votes` ,`adult_content`)
						VALUES ( '0', '0', '".$_SESSION['uid']."', '0000-00-00', '', '".$MyFile['bigimage']."' , '".$MyFile['bigimage']."', '' , '' , '0', '0', '0', '0', '0', 'yes', '0.00', '1', 'no', 'music', '0', 'no')");
						}
					}

					// DELETE COMMENTS
					$DB->Update("DELETE FROM `comments` WHERE ex1_id=('".$fid."') LIMIT 1");


					print $GLOBALS['_LANG_ERROR']['_complete'];

	} break;

/**
* Info: Send a wink
* 		
* @version  9.0
*/
				case "SendWink":{
						
						
						$id = trim(strip_tags($_GET['id']));
						$winkmsg = trim(strip_tags($_GET['winkmsg']));
						$username_wink = trim(strip_tags($_GET['username']));

						if(!isset($_SESSION['pack_winks'])){

							print $lang_ajax[35];			
				
						}elseif($id == $_SESSION['uid']){

							print $lang_messages_page['2'];	

						}else{					
							
							if(isset($_GET['username'])){ $username_wink = trim(strip_tags($_GET['username'])); }
							
								$usedimagespace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid=".$_SESSION['uid']." AND maildate='".DATE_NOW."' and type='wink'");		
								if($usedimagespace['space'] >= $_SESSION['pack_winks']){
														
								print $lang_ajax[3];
																			
							}else{
												
								// CHECK IF THEY ARE BLOCKED
								$blocked = $DB->Row("SELECT count(uid) AS total FROM members_network WHERE type=3 AND to_uid= ( '".$_SESSION['uid']."' ) AND uid= ( '".$id."' ) ");


								if($blocked['total'] ==0){
	
									// SEE IF MEMBER IS BLOCKED WITH THEIR PROVACY
									$PrivacyBlock = $DB->Row("SELECT `Time Zone` AS total FROM members_privacy WHERE uid= ( '".$id."' ) LIMIT 1");
		
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

										$message = eMeetingInput($WINK_MESSAGE_ARRAY[$winkmsg]." - ".$_SESSION['username']); // WINK MESSAGE
										$subject = $lang_ajax[33]." ".$_SESSION['username'];							
										
										$DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box, type )
										VALUES ('".$_SESSION['uid']."', NULL , '".$id."', 'unread', '".DATE_NOW."', '".TIME_NOW."', '".eMeetingInput($subject)."', '".eMeetingInput($message)."', '1', 'sent', 'inbox','wink')");
										
										## add system log
										//AddEventSystemLog($_SESSION['username'],"wink", $id);

										/////////////////////////////////////////
										// SEND MEMBER AN EMAIL TO CONFIRM NEW MSG
										//////////////////////////////////////////					
										DoEmailSMS($id,5,'email_winks',$message);
														
										if(isset($username_wink)){
											print $lang_ajax[4]." ".$username_wink;
										}else{						
											print $lang_ajax[5];
										}
								}else{
									print $GLOBALS['_LANG_ERROR']['_userBlocked'];
								}
							}
						}

				} break;

/**
* Info: Add new comment for the calendar page
* 		
* @version  9.0
*/

	case "QuickMessage": {
		

		## define variables
		$CardCode ="";

		$Subject = $GLOBALS['LANG_SETTINGS']['a19']." - ".$_SESSION['username'];

		$TUID = trim(strip_tags($_GET['uid'])); // SELECT LIST VALUE

		$message = trim(strip_tags($_GET['message'])); // SELECT LIST VALUE

		## find members msg space
		$usedimagespace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid= ( '".$_SESSION['uid']."' ) AND maildate='".DATE_NOW."'");	
			
		if( ($usedimagespace['space'] > $_SESSION['pack_messages']) && D_FREE =="no"){
							
			print $GLOBALS['LANG_MESSAGES'][4];
											
		}else{

			## check if this member is blocked
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
									
				## locate word censor array
				$BadWords = CreateBadWordFilter();
													
				## STRIP CONTENT OF MESSAGES FOR HIDDEN EMAILS AND BADWORDS
				$MessageData = eMeetingInput(filter_str($message,$BadWords));									

						## ADD THE SMILES ICONS
						$MessageData  = str_replace(":)","<img src=\"images/DEFAULT/_msg/grin.gif\" align=\"absmiddle\">", CheckAddSlashes($MessageData));											
						$MessageData  = str_replace(":P","<img src=\"images/DEFAULT/_msg/tongue.gif\" align=\"absmiddle\">", $MessageData);
						$MessageData  = str_replace(":>","<img src=\"images/DEFAULT/_msg/wink.gif\" align=\"absmiddle\">", $MessageData);
						$MessageData  = str_replace(":(","<img src=\"images/DEFAULT/_msg/sad.gif\" align=\"absmiddle\">", $MessageData);
						//$MessageData  = str_replace("'","", $MessageData);
						//$Subject  	  = str_replace("'","", $Subject);
	
						$DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
						VALUES ('".$_SESSION['uid']."', NULL , '".$TUID."', 'unread', NOW(), NOW(), '".eMeetingInput($Subject)."', '".eMeetingInput($message)."', '1', 'sent', 'inbox')");
						$message_id = $DB->InsertID();

						## send SMS and email notification
						DoEmailSMS($TUID,5,'email_msg',substr(strip_tags(filter_str($message,$BadWords)),0,30));

			} else{
				print $GLOBALS['_LANG_ERROR']['_userBlocked'];
			} 
									
		}

	
	} break;

 

/**
* Info: Add new comment for the calendar page
* 		
* @version  9.0
*/
		case "eMeetingCommentsApprove": {	
			
			$id= trim(strip_tags($_GET['id']));
			
			$DB->Update("UPDATE comments SET approved='yes' WHERE id='".$id."' AND to_uid='".$_SESSION['uid']."' LIMIT 1");
			
			print $lang_ajax[17];
	
		} break;

/**
* Info: Add new comment for the calendar page
* 		
* @version  9.0
*/

	case "eMeetingCommentsDeleteAjax": {

	## define variables
	$page= trim(strip_tags($_GET['p'])); 
	$id1= trim(strip_tags($_GET['id1']));
	$sub = trim(strip_tags($_GET['sub']));
 

	// delete all following comments
	//if($page =="follow"){
 
		//$DB->Update("DELETE FROM `comments` WHERE ex3_id='99' AND ex2_id= '".$id1."' AND page='follow'");
	//}
	## switch comments page
	$DB->Update("DELETE FROM `comments` WHERE id=('".$id1."') LIMIT 1");

	print $GLOBALS['_LANG_ERROR']['_complete'];

	} break;


	case "eMeetingCommentsAjax": {
	
	## define variables
 
	$comment= trim(strip_tags($_GET['comment']));	
	$page= trim(strip_tags($_GET['p'])); 
	$id1= trim(strip_tags($_GET['id1'])); // SHOULD BE THE TO USER ID
	$id2= trim(strip_tags($_GET['id2'])); 
	$id3= trim(strip_tags($_GET['id3'])); 
	$id4= trim(strip_tags($_GET['id4'])); 
 
	$img = trim(strip_tags($_GET['img']));
	$width = trim(strip_tags($_GET['width']));
	$sub = trim(strip_tags($_GET['sub']));

	$Complete=0;
		
	## create word filter
	$BadWords = CreateBadWordFilter();

	## clean the content of the message
	$comment = eMeetingInput(filter_str($comment,$BadWords));

	## check before starting
	if(isset($_SESSION['uid']) && $_SESSION['uid'] != 0 && strlen($comment) > 2){ 
	## switch comments page
 
		## check if comments are auto approved by member settings
		if($id1 !="" && is_numeric($id1) ){

			if($id1 == $_SESSION['uid']){

				$val['comments']="yes";

			}elseif($sub=="viewfile" && $page=="profile" && is_numeric($id1) ){
			
				$val = $DB->Row("SELECT comments FROM members_privacy WHERE uid=".$id1." LIMIT 1");
			
			}elseif( is_numeric($id1) ){
			
				$val = $DB->Row("SELECT comments FROM members_privacy WHERE uid=".$id1." LIMIT 1");
			
			} 

		}else{

			$val['comments']="yes";

		}
		
		if($val['comments'] !== "yes" && $val['comments'] !="no"){
		$val['comments']="yes";
		}

		if(!isset($val['comments']) || $page=="games" || $page=="articles"){ $val['comments']="yes"; }		

		// FOLLOWER SETTINGS
 
		if($page =="follow" && $_SESSION['uid'] != $id2){

			// CHECK IF THEY ARE ALREADY FRIENDS?
			$ff1 = $DB->Row("SELECT count(members_network.to_uid) AS total FROM members_network  WHERE ( ( members_network.uid='".$_SESSION['uid']."' AND members_network.to_uid='".$id2."' )  OR  ( members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$id2."'  ) ) AND members_network.type= ( '8' ) ");
	 
			if($ff1['total'] ==0){

				// DOES THIS MEMBER ALLOW ANYONE TO ADD THEM AND POST?
				//$fa = $DB->Row("SELECT follow_friends, follow_autoadd FROM members_follow WHERE uid='".$id1."' LIMIT 1");
					
				// MUST YOU BE MY FRIEND?
				//if($fa['follow_friends'] =="no"){
					// ADD MEMBER TO FRIENDS
					$DB->Insert("INSERT INTO `members_network` (`uid`, `to_uid`, `date`, `comments`, `type`, `approved`) VALUES ('".$_SESSION['uid']."', '".$id2."', '', '', 8, 'yes')");
					$DB->Insert("INSERT INTO `members_network` (`uid`, `to_uid`, `date`, `comments`, `type`, `approved`) VALUES ('".$id2."', '".$_SESSION['uid']."', '', '', 8, 'yes')");
					
				//}
			
			}
			 
		}
	
		## save comments
		$DB->Insert("INSERT INTO `comments` (to_uid, `from_uid` ,`ex1_id` ,`ex2_id` ,`ex3_id` ,`comments` ,`date` ,`time` ,`approved` ,`page` ,`sub` ) 
		VALUES ('".$id1."', '".$_SESSION['uid']."' , '".$id2."' , '".$id3."' , '".$id4."' , '".$comment."' , '".DATE_NOW."' , '".TIME_NOW."', '".trim($val['comments'])."', '".$page."', '".$sub."')");
		$COMMENT_ADD_ID = $DB->InsertID();

		// UPDATE IF IS FOLLOW COMMENT
		if($page =="follow" && $id4==99){
			$DB->Update("UPDATE comments SET ex2_id='".$COMMENT_ADD_ID."' WHERE id='".$COMMENT_ADD_ID."' LIMIT 1");
		}

		## add system log
		AddEventSystemLog($_SESSION['username'],"comment_".$page, $page, $sub, $id1, $id2,$id3);

		## Send Message to the user
		if( (isset($id1) && is_numeric($id1) && $id1 !=0)  && ( $id1 != $_SESSION['uid'])  ){
		$val = $DB->Row("SELECT members_privacy.Notifications, members.email, members.username FROM members_privacy, members WHERE members_privacy.uid = members.id AND members_privacy.uid=".$id1);
		//if($val['Notifications'] =="yes"){
													
							$Data['email'] 			=  $val['email'];
							
							$Data['username'] =  $val['username'];
							$Data['from_username'] =  $_SESSION['username'];


							$Data['custom'] 			=  "<a href='".DB_DOMAIN."index.php?dll=account&sub=comments'>".DB_DOMAIN."</a>";													
							SendTemplateMail($Data, 20);							
			//}
		}
		## display comments
		print '<div class="topic_reply"><div class="topic_reply_av">
		<div class="pic50"><a class="photo_50" href="index.php?dll=profile&pId='.$_SESSION['uid'].'"><img src="'.DB_DOMAIN."inc/tb.php?src=".$img.'&x=48&y=48" alt="'.$_SESSION['username'].'"  class="img_border" width="48" height="48"/></a></div>
		</div>
		<div class="topic_reply_info" style="width:'.$width.'px;">
		<div class="reply_topic"><strong>'.nl2br(eMeetingOutput($comment)).'</strong><br />
		</div>
		<div class="margin5 grey12">
		<div class="floatl" style="font-size:11px"><a href="#">'.$_SESSION['username'].'</a> posted on '.DATE_NOW.' @ '.TIME_NOW.'</div>
		<div class="floatr"></div><div class="clear"></div></div></div><div class="clear"></div></div>';

	}
	
	} break;






case "CheckAlbumPassword": {

	$pid = trim(strip_tags($_GET['pid']));
	$aid = trim(strip_tags($_GET['aid']));
	$password = trim(strip_tags($_GET['password']));

	require_once('../func/func_galllery_page.php');

	if(CheckAlbumAccess($aid, $password)){

		print "Thank you. <a href='index.php?dll=profile&sub=manage&item_id=".$pid."&item2_id=".$aid."' style='color:red;font-weight:bold;font-size:15px'>Please click here to view the album </a>";

	}else{

		print "The password is wrong!";

	}

} break;


//////////////////// LINKED LIST BOXES ///////////////////////


				case "ChangePreviewPhoto": {

						$fid = trim(strip_tags($_GET['fid'])); // SELECT LIST VALUE
						
						print '<img src="inc/tb.php?src='.$fid.'&w=45&h=45" style="padding-left:9px;">';

				} break;

				case "grouprate": {
				
					$rate = trim(strip_tags($_GET['rating']));					
					$fid = trim(strip_tags($_GET['cid']));
					
					## GET CURRENT RATING
					$result = $DB->Row("SELECT rating_votes, rating FROM groups  WHERE id ='".$fid."' LIMIT 1");
					
					if(!empty($result)){ 
						
						$rem=$result['rating']+$rate;
						## UPDATE THE DATABASE

						$result = $DB->Insert("UPDATE groups  SET rating_votes=rating_votes+1, rating='".$rem."' WHERE id ='".$fid."' LIMIT 1");			
					
					}
					
					print $lang_ajax[2];

					
				} break;

				case "calrate": {
				
					$rate = trim(strip_tags($_GET['rating']));					
					$fid = trim(strip_tags($_GET['cid']));
					
					## GET CURRENT RATING
					$result = $DB->Row("SELECT rating_votes, rating FROM calendar_data  WHERE id ='".$fid."' LIMIT 1");
					
					if(!empty($result)){ 
						
						$rem=$result['rating']+$rate;
						## UPDATE THE DATABASE

						$result = $DB->Insert("UPDATE calendar_data  SET rating_votes=rating_votes+1, rating='".$rem."' WHERE id ='".$fid."' LIMIT 1");			
					
					}
					
					print $lang_ajax[2];

					
				} break;

				case "gamerate": {
				
					$rate = trim(strip_tags($_GET['rating']));					
					$fid = trim(strip_tags($_GET['cid']));
					
					## GET CURRENT RATING
					$result = $DB->Row("SELECT rating_votes, rating FROM game_games WHERE gameid  ='".$fid."' LIMIT 1");
					
					if(!empty($result)){ 
						
						$rem=$result['rating']+$rate;
						## UPDATE THE DATABASE

						$result = $DB->Insert("UPDATE game_games SET rating_votes=rating_votes+1, rating='".$rem."' WHERE gameid ='".$fid."' LIMIT 1");			
					
					}
					
					print $lang_ajax[2];

					
				} break;	

				case "classrate": {
				
					$rate = trim(strip_tags($_GET['rating']));					
					$fid = trim(strip_tags($_GET['cid']));
					
					## GET CURRENT RATING
					$result = $DB->Row("SELECT rating_votes, rating FROM class_adverts WHERE id=".$fid." LIMIT 1");
					
					if(!empty($result)){ 
						
						$rem=$result['rating']+$rate;
						## UPDATE THE DATABASE
						$result = $DB->Insert("UPDATE class_adverts SET rating_votes=rating_votes+1, rating='".$rem."' WHERE id=".$fid." LIMIT 1");			
					
					}
					
					print $lang_ajax[2];

					
				} break;		

				case "overmakedefault": {

						$fid = trim(strip_tags($_GET['fid'])); // SELECT LIST VALUE
						$uid = trim(strip_tags($_GET['uid'])); // SELECT LIST VALUE
						
						$DB->Update("UPDATE files SET `default` =0 WHERE uid= ( '".$uid."' )");
						$DB->Update("UPDATE files SET `default` =1 WHERE uid= ( '".$uid."' ) AND bigimage= ( '".$fid."' ) LIMIT 1");

						## add system log
						AddEventSystemLog($_SESSION['username'],"file_default", "", "", $uid, $fid, 0);

						print '<img src="inc/tb.php?src='.$fid.'&x=58&y=58" border="0">';

				} break;

							
				case "delete_group_topic": {					

					$gid = trim(strip_tags($_GET['gid']));
					
					if(isset($_SESSION['site_moderator']) && $_SESSION['site_moderator']=="yes"){
						$extra="";
					}else{
						$extra="AND uid='".$_SESSION['uid']."'";
					}
					$DB->Update("DELETE FROM groups_topics  WHERE id = ( '".$gid."' ) $extra LIMIT 1");
					$DB->Update("DELETE FROM comments  WHERE ex1_id  = ( '".$gid."' ) AND from_uid='".$_SESSION['uid']."' ");
					print "DELETE FROM groups_topics  WHERE id = ( '".$gid."' ) $extra LIMIT 1";
					print "topic deleted";
				
				} break;
				
				case "delete_group": {
				
					$gid = trim(strip_tags($_GET['gid']));

					if(isset($_SESSION['site_moderator']) && $_SESSION['site_moderator']=="yes"){
						$extra="";
					}else{
						$extra="AND uid='".$_SESSION['uid']."'";
					}
										
					$DB->Update("DELETE FROM groups WHERE id = ( '".$gid."' ) $extra LIMIT 1");
					$DB->Update("DELETE FROM groups_topics  WHERE groups_id = ( '".$gid."' ) $extra LIMIT 1");
					$DB->Update("DELETE FROM comments  WHERE ex1_id  = ( '".$gid."' ) AND from_uid='".$_SESSION['uid']."' ");
					$DB->Update("DELETE FROM groups_members WHERE group_id=( '".$gid."' )");
					
					print $GLOBALS['_LANG_ERROR']['_complete'];
			
				} break;				


				case "Admin_Approve_File": {
					
					$fid = trim(strip_tags($_GET['fid']));
					
					$result = $DB->Insert("UPDATE files SET approved='yes' WHERE id='".$fid."' LIMIT 1");

					/////////////////////////////////////////
					// SEND MEMBER AN EMAIL TO CONFIRM APPROVAL
					//////////////////////////////////////////
					$f = $DB->Row("SELECT uid FROM files WHERE id='".$fid."' LIMIT 1");
					$val = $DB->Row("SELECT members_privacy.Notifications, members.email, members.username FROM members_privacy, members WHERE members_privacy.uid = members.id AND members_privacy.uid=".$f['uid']);
					if($val['Notifications'] =="yes"){
													
							$Data['email'] =  $val['email'];
							$Data['username'] =  $val['username'];																	
							SendTemplateMail($Data, 10);
							print $GLOBALS['_LANG_ERROR']['_complete'];
							
					}else{
							print $GLOBALS['_LANG_ERROR']['_complete'];
					}					
					
				
				} break;
				
				case "Admin_Delete_File": {

					$fid = trim(strip_tags($_GET['fid']));
					
					$result = $DB->Row("SELECT * FROM files WHERE id='".$fid."' LIMIT 1");
									
					$DB->Update("DELETE FROM files WHERE id='".$fid."' LIMIT 1");
					///////////////////////////////////////////////////////
					///	CHECK FILE PATHS
					//////////////////////////////////////////////////////
					if( $result['type'] == 'music'){
	
						@unlink(PATH_MUSIC.$result['bigimage']);
													
					}elseif($result['type'] =='video'){
										
						@unlink(PATH_VIDEO.$result['bigimage']);
											
					}else{
						
						@unlink(PATH_IMAGE.$result['bigimage']);
						@unlink(PATH_IMAGE_THUMBS.$result['bigimage']);			
					}
									
				$DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid=".$result['aid']);			
				
				/////////////////////////////////////////
				// SEND MEMBER AN EMAIL TO CONFIRM APPROVAL
				//////////////////////////////////////////
				$val = $DB->Row("SELECT members_privacy.Notifications, members.email, members.username FROM members_privacy, members WHERE members_privacy.uid = members.id AND members_privacy.uid=".$result['uid']);
				if($val['Notifications'] =="yes"){
													
					$Data['email'] =  $val['email'];
					$Data['username'] =  $val['username'];																	
					SendTemplateMail($Data, 15);
					
					print $GLOBALS['_LANG_ERROR']['_complete'];
				}else{
					print $GLOBALS['_LANG_ERROR']['_complete'];
				}			    	
				
				
				} break;			
				
				/////////////////////////////////////////////////////////////////
				case "UpdateEvent": {
				
					$eid = trim(strip_tags($_GET['eid']));
					$uid = trim(strip_tags($_GET['uid']));
					
					if(is_numeric($eid) && is_numeric($uid)){
					
						$DB->Update("DELETE FROM `calendar_attending` WHERE uid=( '".$uid."' ) AND event_id= ( '".$eid."' ) LIMIT 1");
						if ($DB->Affected() == 0)
						{

							$result = $DB->Insert("INSERT INTO`calendar_attending` (`id` ,`uid` ,`event_id` ,`date`)VALUES (NULL , '".$uid."', '".$eid."', '')");

							$name = $DB->Row("SELECT shortevent  FROM calendar_data WHERE id='".$eid."' LIMIT 1");

							 ## add system log
							 AddEventSystemLog(eMeetingInput($_SESSION['username']),"event_attending", "", "", $_SESSION['uid'], $eid,$name['shortevent'],0);


						}						
						print $lang_ajax[47];
					
					}				
				
				} break;
				
				case "DeleteEvent": {
				
					$eid = trim(strip_tags($_GET['id']));
					
					$result = $DB->Insert("DELETE FROM calendar_data WHERE id= ('".$eid."') LIMIT 1");
					
					print $lang_ajax[48];				
				
				} break;
								
				case "profilerate": {
				
					$rate = trim(strip_tags($_GET['rating']));
					$pid = trim(strip_tags($_GET['pid']));
					$fid = trim(strip_tags($_GET['fid']));
					
					## GET CURRENT RATING
					$result = $DB->Row("SELECT rating_votes, rating FROM files WHERE id=".$fid." AND uid='".$pid."' LIMIT 1");
					
					if(!empty($result)){ 
						
						$rem=$result['rating']+$rate;
						## UPDATE THE DATABASE
						$result = $DB->Insert("UPDATE files SET rating_votes=rating_votes+1, rating='".$rem."' WHERE id=".$fid." AND uid='".$pid."' LIMIT 1");			
					
					}

				
					print $lang_ajax[2];

					
				} break;	
		

				
				case "ProfileNetwork":{
				
				$netid	= trim(strip_tags($_GET['nid']));  // package id
				$id = trim(strip_tags($_GET['uid']));  // package id
				if(!is_numeric($id)){ return; }


				if($_SESSION['auth'] != "yes"){
				
					print $lang_ajax[6];
					
				}else{
				
				// MEMBERS CAN ONLY HAVE ONE PROFILE
				
				$result = $DB->Row("SELECT count(id) AS found FROM members_network WHERE uid='".$_SESSION['uid']."' AND to_uid='".$id."'  AND TYPE <> 5 LIMIT 1");			
	
				if($result['found']  > 0){

					print $lang_ajax[34];
					return;

				}else{


						$val = $DB->Row("SELECT members.username, members.email, members_privacy.friends FROM members_privacy 
						INNER JOIN members ON (members_privacy.uid = members.id )
						WHERE members_privacy.uid=('".$id."') LIMIT 1");
 
						
						// MAKE BLOCKED AND HOTLIST MEMBERS AUTO APPROVED
						if($netid ==1 || $netid ==3){
							$app = "yes";
							
						}else{
							// CHECK IF THIS MEMBER HAS SET THEIR PRIVACY
							// TO AUTO ACCEPT NEW FRIEND REQUESTS
							$app = $val['friends'];
						}

						// FIX FOR CHECKING IF THE MEMBER ALREADY IS LISTED ON THE NETWORK
						$fix = $DB->Row("SELECT approved FROM members_network WHERE to_uid='".$_SESSION['uid']."' AND uid='".$id."' LIMIT 1");
						if(!empty($fix)){	$app="yes";		}
 
						// IF BLOCKING MEMBER REMOVE THEM FROM FRIENDS LISTS
						if($netid ==3){
							$DB->Insert("DELETE FROM members_network WHERE uid='".$_SESSION['uid']."' AND to_uid='".$id."' ");
							$DB->Insert("DELETE FROM members_network WHERE uid='".$id."' AND to_uid='".$_SESSION['uid']."' ");
						}	

						// ADD DATABASE ITEM
						$DB->Update("INSERT INTO `members_network` ( `id` , `uid` , `to_uid` , `date` , `comments` , `type`, approved )
						VALUES (NULL , '".$_SESSION['uid']."', '".$id."', NOW(), '', '".$netid."', '".$app."')");			
  
						// SEND THEM AN EMAIL
						if($netid ==2){ // dont send if its a block list value

							$val['custom']  = "<a href='".DB_DOMAIN."index.php?dll=friends'>".DB_DOMAIN."index.php?dll=friends</a>"; // Must be above the admin_email
						
							$val['username'] =  $val['username'];
							$val['from_username'] =  $_SESSION['username'];
							SendTemplateMail($val, 33);		

						}	

						print $lang_ajax[7];



					}
					
				}
				
				} break;
				

				
				
				case "deleteAlbum":{
				
				$id	= trim(strip_tags($_GET['id']));  // profile id
				
				$DB->Update("DELETE FROM album WHERE aid  = '".$id."' AND uid=".$_SESSION['uid']." LIMIT 1");
				$result = $DB->Query("SELECT bigimage, type, id FROM files WHERE uid=".$_SESSION['uid']." AND aid=".$id);
								
				while( $file = $DB->NextRow($result) ){
				
				///////////////////////////////////////////////////////
				///	CHECK FILE PATHS
				//////////////////////////////////////////////////////
				if( $file['type'] == 'music'){

							@unlink(PATH_MUSIC.$file['bigimage']);
									
				}elseif($file['type'] =='video'){
								
						@unlink(PATH_VIDEO.$file['bigimage']);
							
				}else{
							
						@unlink(PATH_IMAGE.$file['bigimage']);
						@unlink(PATH_IMAGE_THUMBS.$file['bigimage']);
													
				}
						$DB->Update("DELETE FROM files WHERE uid=".$_SESSION['uid']." AND id=".$file['id']);
						$DB->Update("DELETE FROM comments WHERE from_uid=".$_SESSION['uid']." AND ex1_id =".$file['id']);
									
				}				
				print $lang_ajax[8];
} break;
				
 

						
		case "MakeDefaultImage": {
		
			$id= trim(strip_tags($_GET['id']));

			$DB->Update("UPDATE files SET `default`='0' WHERE uid='".$_SESSION['uid']."'");
			$DB->Update("UPDATE files SET `default`='1' WHERE id='".$id."' AND uid='".$_SESSION['uid']."' LIMIT 1");

			## add system log
			AddEventSystemLog($_SESSION['username'],"file_default", "");
						
			print $lang_ajax[12];
					
		} break;
				
		case "deleteMatchTestResult": {
		
			$id= trim(strip_tags($_GET['id']));
			
			$DB->Update("DELETE FROM quiz_results WHERE uid='".$_SESSION['uid']."' AND id='".$id."' ");
			
			print $lang_ajax[13];
								
		} break;
		
		case "deleteQuestion": {
		
			$id= trim(strip_tags($_GET['id']));
			
			$DB->Update("DELETE FROM quiz_questions WHERE uid='".$_SESSION['uid']."' AND id='".$id."' ");
			
			print $GLOBALS['_LANG_ERROR']['_complete'];
					
		} break;
		
		case "deleteMatch":{
			
			$id= trim(strip_tags($_GET['id']));
			
			$DB->Update("DELETE FROM quiz WHERE id='".$id."' LIMIT 1");
			$DB->Update("DELETE FROM quiz_questions WHERE parent_id='".$id."' ");
			
			print $GLOBALS['_LANG_ERROR']['_complete'];
					
		} break;
		
 
	case 'DeleteBlogPost': {
				
				$id= trim(strip_tags($_GET['blogid']));

				$DB->Update("DELETE FROM blog_posts WHERE id='".$id."' AND uid='".$_SESSION['uid']."' LIMIT 1");

				// DELETE COMMENTS
				$DB->Update("DELETE FROM `comments` WHERE ex1_id=('".$id."') LIMIT 1");
							
				print $lang_ajax[19];
	} break;	
	
	
	case 'addFavs': {
				
				if($_SESSION['auth'] != "yes"){
				
					print $lang_ajax[46];
					
				}else{
					$id= trim(strip_tags($_GET['id']));
					
						$DB->Insert("INSERT INTO `members_network` ( `id` , `uid` , `to_uid` , `date` , `comments` , `type`, approved )
								VALUES (NULL , '".$_SESSION['uid']."', '".$id."', NOW(), '', '20', 'yes')");
															
					print $GLOBALS['_LANG_ERROR']['_complete'];
				}
	} break;
	
	case 'removeFavs': {
				
				$id= trim(strip_tags($_GET['id']));

				$DB->Update("DELETE FROM members_network WHERE to_uid='".$id."' AND uid='".$_SESSION['uid']."'");
							
				print $GLOBALS['_LANG_ERROR']['_complete'];
	} break;
		


case "DeleteFile": {
			
				$FileID= trim(strip_tags($_GET['fileid']));

				if( isset($FileID) && is_numeric($FileID) ){
	
				$file = $DB->Row("SELECT bigimage, aid, type FROM files WHERE id = '".$FileID."'  LIMIT 1");
				
				$DB->Insert("DELETE FROM files WHERE id  = '".$FileID."' LIMIT 1");
				///////////////////////////////////////////////////////
				///	CHECK FILE PATHS
				//////////////////////////////////////////////////////
				if( $file['type'] == 'music'){
						@unlink(PATH_MUSIC.$file['bigimage']);
										
				}elseif($file['type'] =='video'){
									
						@unlink(PATH_VIDEO.$file['bigimage']);
										
				}else{
						@unlink(PATH_IMAGE.$file['bigimage']);
						@unlink(PATH_IMAGE_THUMBS.$file['bigimage']);			
				}
				///////////////////////////////////////////////////////
				///	UPDATE ALBUM COUNT
				//////////////////////////////////////////////////////
				$DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid=".$file['aid']);
				$DB->Update("DELETE FROM comments WHERE ex1_id='".$FileID."'");
	
				print $GLOBALS['_LANG_ERROR']['_complete'];

			}
									
} break;

        case "RotateImg":{


            foreach (new DirectoryIterator('../../uploads/cache') as $fileInfo) {
                if(!$fileInfo->isDot()) {
                    unlink($fileInfo->getPathname());
                }
            }


            $FileID= trim(strip_tags($_GET['fileid']));
            $degrees = -90; //change this to be whatever degree of rotation you want


            $filenameimg = '../../uploads/images/'.$FileID; //this is the original file
            $sourceimg = imagecreatefromjpeg($filenameimg) or notfound();
            $rotateimg = imagerotate($sourceimg,$degrees,0);
            imagejpeg($rotateimg,$filenameimg); //save the new image
            imagedestroy($sourceimg); //free up the memory
            imagedestroy($rotateimg); //free up the memory -


            $filename = '../../uploads/thumbs/'.$FileID; //this is the original file
            $source = imagecreatefromjpeg($filename) or notfound();
            $rotate = imagerotate($source,$degrees,0);
            imagejpeg($rotate,$filename); //save the new image
            imagedestroy($source); //free up the memory
            imagedestroy($rotate); //free up the memory -
            print "success";
        }
            break;
 case "DeleteMessage": {
 
 				$mailid = trim(strip_tags($_GET['mailid']));
				$box = trim(strip_tags($_GET['box']));
				$senderID = trim(strip_tags($_GET['senderid']));

				if(is_numeric($mailid)){
				
					// LETS GET THE MESSAGE DETAILS SO SORT THIS OUT
					$mDATA = $DB->Row("SELECT * FROM messages WHERE mailnum =".$mailid." LIMIT 1");
						
						if($box == "inbox"){ 
									if($mDATA['mail2id'] == $_SESSION['uid']){
										// THIS IS THE RECIEPTS BOX
										$DB->Insert("UPDATE messages SET to_box='trash' WHERE mailnum =".$mailid." LIMIT 1");
									}else{
										// THIS IS THE SENDERS BOX
										$DB->Insert("UPDATE messages SET my_box='trash' WHERE mailnum =".$mailid." LIMIT 1");
									}														
						}
						
						if($box == "wink"){ 
									if($mDATA['mail2id'] == $_SESSION['uid']){
										// THIS IS THE RECIEPTS BOX
										$DB->Insert("UPDATE messages SET to_box='trash' WHERE mailnum =".$mailid." LIMIT 1");
									}else{
										// THIS IS THE SENDERS BOX
										$DB->Insert("UPDATE messages SET my_box='trash' WHERE mailnum =".$mailid." LIMIT 1");
									}														
						}
						
						if($box == "trash"){
									//die($mDATA['mail2id'] ."==". $_SESSION['uid']);				
									if($mDATA['mail2id'] == $_SESSION['uid']){													
										$DB->Update("UPDATE messages SET  to_box='none' WHERE mailnum =".$mailid." LIMIT 1");								
									}else{							
										$DB->Update("UPDATE messages SET my_box='none' WHERE mailnum =".$mailid." LIMIT 1");
									}
						}
										
						if($box == "sent"){				
							$DB->Insert("UPDATE messages SET my_box='trash' WHERE mailnum =".$mailid." LIMIT 1");									
						}
						
						
						print $lang_ajax[25];
				
				}
 
 } break;
 
 case 'validateUsername': {
 
		   $username1 = trim(strip_tags($_GET['username']));
		   $username1 =  addslashes($username1);
		   
			## First lets check this user name isnt already taken
			$check = $DB->Row("select count(username) AS result from members where username='".$username1."' LIMIT 1");
					   
			## Check the username lenght
			if(strlen($username1) < 5){
				print $lang_ajax[26];
			}	
			
			## Check the username characters
			elseif (!preg_match('/^[\w-]+$/', $username1)){
				print $lang_ajax[27];	
			}

			elseif ($check['result'] > 0){
			
			
				print "<br><small>".$lang_ajax[28]."</small>";
				
				// CREATE LIST OF NEW USERNAMES
				print '<table width="100%" border="0" cellspacing="0" cellpadding="0" >';
				
				print '<tr> 
					  <td width=25><input name="regNewName" type="radio" value="'.$username1.date('Y').'" onclick="SetNewName(this.value);"> </td>
					  <td height="25">'.$username1.''.date('Y').'</td>
					  </tr>';
					  
				print '<tr> 
					  <td width=25><input name="regNewName" type="radio" value="'.$username1.'123" onclick="SetNewName(this.value);"> </td>
					  <td height="25">'.$username1.'123</td>
					  </tr>';
					  
				print '<tr> 
					  <td width=25><input name="regNewName" type="radio" value="123'.$username1.'" onclick="SetNewName(this.value);"> </td>
					  <td height="25">123'.$username1.'</td>
					  </tr>';
					  				
				print '</table>';		
					
			}else{
			  
				print "<img src='images/DEFAULT/_acc/emoticon_smile.png' align='absmiddle'> ".$lang_register_page['32']." ".$username1; 
				
			}  
 	} break;
	
	case 'validateEmail': {
	
		 $email = trim(strip_tags($_GET['email']));
		   
		## First lets check this user name isnt already taken
		$check = $DB->Row("select count(username) AS result from members where email='".$email."' LIMIT 1");
				
			## Check the username lenght
			if($check['result'] > 0){
					print $lang_ajax[45];
			}else{		
		
		
					if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/i", $email)) {
					
					  print "<img src='images/DEFAULT/_acc/emoticon_smile.png' align='absmiddle'>"; 
					  
					}else {
					
					  print "<img src='images/DEFAULT/_icons/16/alert.gif' align='absmiddle'> ".$lang_ajax[29]."";
					}
		
			}
		
	} break;
	
	case 'validatePassword': {
	
		$password = trim(strip_tags($_GET['password']));
		
		## Check the username lenght
		if(strlen($password) < 4){
				print "<img src='images/DEFAULT/_icons/16/alert.gif' align='absmiddle'> ".$lang_ajax[30];
		}
				
		// password must have letters
		elseif(preg_match("/(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $password)){
		
			print "<img src='images/DEFAULT/_icons/16/alert.gif' align='absmiddle'> ".$lang_ajax[31];
		
		}else{
			 print "<img src='images/DEFAULT/_acc/emoticon_smile.png' align='absmiddle'>"; 
		}		
	
	} break;
	
	case 'EditField': {

		$NumFields=0;
		
		$Value = $DB->Row("SELECT ".$_GET['name']." FROM members_data WHERE uid =".$_SESSION['uid']." limit 1");
		
		if($_GET['type'] == 1){
					
			print "<input name='FieldValue".$NumFields."' type='text' maxlength='255' width='100%' value='".$Value[$_GET['name']]."' onChange=\"EditBox_Change('".$_GET['name']."',this.value,'".$_GET['divid']."');\">";
					
									
		}elseif($_GET['type'] == 4){
						if($Value[$_GET['name']] ==1){ $ex = "checked"; }else{ $ex="";}
						print "<input type='checkbox' name='FieldValue".$NumFields."' value='1' $ex>";
		}elseif($_GET['type'] == 2){
						print "<textarea name='FieldValue".$NumFields."' cols='' rows='7' style='width:93%' onChange=\"EditBox_Change('".$_GET['name']."',this.value,'".$_GET['divid']."');\">".$Value[$_GET['name']]."</textarea>";
		}elseif($_GET['type'] == 3){
								/* This is a list box */
					
					////////////////////////////
					// STOP NULL CAPTION VALUES
					/////////////////////////////
					if(D_LANG !="english"){
					// check see if there is a caption
					
						$test = $DB->Row("SELECT * FROM field_list_value WHERE fvFid = '". $_GET['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");
	
						if(empty($test)){
							// no caption found, load english caption
							$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $_GET['fid'] ."' Order by fvOrder");
							
						}else{
						
							$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $_GET['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");
						
						}
						
					}else{
						$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $_GET['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");
					}
			
					////////////////////////////
					/////////////////////////////
							
		
									print "<select name='FieldValue".$NumFields."' onChange=\"EditBox_Change('".$_GET['name']."',this.value,'".$_GET['divid']."');\">";
									while( $ListValue = $DB->NextRow($result2) )  
									{ 			
										if($Value[$_GET['name']] == $ListValue['fvid']){
											print "<option value='".$ListValue['fvid']."' selected>".$ListValue['fvCaption']."</option>";
										}else{
											print "<option value='".$ListValue['fvid']."'>".$ListValue['fvCaption']."</option>";
										}					
										
									}	
									print "</select>";
												
		}elseif($_GET['type'] == 5){
			
							$c=0;
							$CheckParts = explode("**", $Value[$_GET['name']]);
							$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $_GET['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

							while( $ListValue = $DB->NextRow($result2) )  
							{ 	
											
								if($CheckParts[$c] ==1){
									print "<input type='checkbox' name='FieldValue".$NumFields."' value='1'' class=radio checked>".$ListValue['fvCaption'];
								}else{
									print "<input type='checkbox' name='FieldValue".$NumFields."' value='1' class=radio>".$ListValue['fvCaption'];
								}
								
								print "<input type='hidden' class='hidden' name='FieldName".$NumFields."' value='".$_GET['name']."'>";
								print "<input type='hidden' class='hidden' name='FieldType".$NumFields."' value='".$_GET['type']."'>";					
								print "<br>";
								$NumFields++;
								$c++;
							}
			
			}
	
	} break;



	/**
	* Info: Delete Classified Adverts
	* 		
	* @version  9.0
	*/
	case 'ResendActivationCode': {
				
				$id= trim(strip_tags($_GET['id']));
				$email= trim(strip_tags($_GET['email']));

				if(strlen($email) < 5){

					print "Please enter a valid email address";
					return;
				}
  
				$newcode = $DB->Row("SELECT username, activate_code FROM members WHERE id=".$id." LIMIT 1");				

				if(!empty($newcode)){					
					
					// SEND VALIDATE EMAIL AGAIN TO USER
					if($newcode['activate_code'] =="OK"){

						print "This account has already been activated";	
						return;

					}else{

						$DB->Update("UPDATE members SET email='".$email."' WHERE id=".$id." LIMIT 1");
						$values['email'] = $email;
						$values['custom'] = $newcode['activate_code'];
						$values['username'] = $newcode['username'];
						$values['password'] = "(hidden)";

						$D1 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_email' LIMIT 1");
						SendTemplateMail($values, $D1['value1']);
						
						print "Your new email address has been updated. A confirmation email has been sent to you.";
						return;
					}

					
					
				}else{
							
					print "We could not find your account details, please try again later.";
	
				}

	} break;

	
	case "PopLinkedField" : {
	
		$value = trim(strip_tags($_GET['value']));
		$LinkID= trim(strip_tags($_GET['lid']));
		$sp = trim(strip_tags($_GET['rownum']));
		 
		if (strpos(strtoupper($value),'UNION') !== FALSE) {   die( 'Restricted access' ); }
		if (strpos(strtoupper($LinkID),'UNION') !== FALSE) {   die( 'Restricted access' ); }
		if (strpos(strtoupper($sp),'UNION') !== FALSE) {   die( 'Restricted access' ); }

		if(substr($sp,0,5) =='10000'){
			$ff = explode("0000",$sp);
			$FieldNameString= "SeV[".$ff[1]."]";
		}else{
			$FieldNameString= "FieldValue".$LinkID."";
		}


		$ReturnString="";

		// check if there is a field linked to this one
		$Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$LinkID." limit 1");						

		if(!empty($Linked)){

		if(substr($sp,0,5) =='10000'){
			$nID=  $ff[1]+1;
			$LinkedCode ="onChange='eMeetingLinkedField(this.value, ".$Linked['fid'].",10000".$nID.");'";
		}else{
					$LinkedCode ="onChange='eMeetingLinkedField(this.value, ".$Linked['fid'].",".$Linked['fid'].");'";
		}
		}else{ $LinkedCode =""; }

		$ReturnString .= "<select name='".$FieldNameString."'  style='width:185px; overflow: hidden' ".$LinkedCode.">";							
		$ReturnString .= "<option value='0'>------</option>";

		if($value =="" || $value ==0){

			$ReturnString .="</select>";
			print $ReturnString;
			return;

		}		

		$result2 = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE linked_cap_id = '". $value ."' Order by fvOrder"); // AND lang='".D_LANG."'
		if(!empty($result2)){$tc=1;
		while( $ListValue = $DB->NextRow($result2) ){ 
			
				if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }
				$ReturnString .= "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";					
				$tc++;
		}
		}

		if(empty($result2) || $tc==1){
		$result3 = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE linked_cap_id = '". $value ."' Order by fvOrder");//fvCaption
		
		while( $ListValue = $DB->NextRow($result3) ){ 
			
				if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }
				$ReturnString .= "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";					
								
		}
		}

		$ReturnString .="</select>";
		print $ReturnString;

	} break;

	case "UpdateField" : {
	
		$DB->Update("UPDATE members_data SET ".$_GET['name']."='".strip_tags($_GET['value'])."' WHERE uid=".$_SESSION['uid']." LIMIT 1");
		
		$re = $DB->Row("SELECT fType, fid FROM field WHERE fName='".$_GET['name']."' LIMIT 1");
		
		if($re['fType'] == 1 || $re['fType'] == 2){
			print strip_tags($_GET['value']);
		}elseif($re['fType'] == 3){
		
			$re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($_GET['value'])."' LIMIT 1");
			print $re3['fvCaption'];
			
		}elseif($re['fType'] == 4){
		
			$re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($_GET['value'])."' LIMIT 1");
			print $re3['fvCaption'];
					
		}else{
		
		}
				
		return;
		
	} break;

        case "GetCoupon":
        {
            $code = trim(strip_tags($_GET['id']));
            $HasP = $DB->Row("SELECT per AS total FROM coupon WHERE code='".$code."' and enable ='yes' LIMIT 1");
            if($HasP['total'] > 0){
                print "Successful : Percentage Off ".$HasP['total'].'%'."<input type='hidden' name='priceOff' id='priceOff' value='".$HasP['total']."'>";
            }
            else print "Sorry that code is invalid";
        }
            break;
 
 	default;
}
}
?>