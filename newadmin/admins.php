<?
$_REQUEST['n'] =15;
require_once "inc/config.php";

require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

$PageLink = "admins.php";
$PageLang = $admin_layout_page9;

require_once "layout.php";
############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){
	

	
if(isset($_REQUEST['do'])){ 

		switch ($_REQUEST['do']) {
 
		case "send": {
			$to_people = explode(",",$_POST['send_to']);

			if($_POST['send_to'] != "all"){

				foreach($to_people as $uuu){

					$TUID = GetUid($uuu);

					$query = sprintf("SELECT count(id) as total FROM message_room WHERE owner_id = %d AND partner_id = %d LIMIT 1", 0, $TUID);
                	$result = $DB->Row($query);
                	if ($result['total'] == 0) {
                		$query = sprintf("INSERT INTO message_room (`owner_id`, `partner_id`, `subject`, `timestamp`) VALUES(%d, %d, '%s', '%s')", 0, $TUID, $_POST['subject'], date('Y-m-d H:i:s'));
                		$DB->Insert($query);
                	}

                	$query = sprintf("SELECT id FROM message_room WHERE owner_id = %d AND partner_id = %d LIMIT 1", 0, $TUID);
                	$result = $DB->Row($query);

                	$query = sprintf("INSERT INTO messages (`uid`, `mail_room_id`, `mail2id`, `mailstatus`, `maildate`, `mailtime`, `mail_subject`, `mail_message`, `mail_displayalert`, `my_box`, `to_box`) 
            									VALUES(%d, %d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
            											0, $result['id'], $TUID, 'unread', DATE_NOW, TIME_NOW, $_POST['subject'], $_POST['editor'], '1', 'sent', 'inbox');


            		$DB->Insert($query);
				}		

			}else{
				$i=1;

				$query = sprintf("SELECT id FROM members WHERE id != 0 ORDER BY id ASC");
				$members = $DB->Query($query);

				$unregistered_ids = array();
				while ($user = $DB->NextRow($members)) {
					$query = sprintf("SELECT id FROM message_room WHERE owner_id = %d AND partner_id = %d LIMIT 1", 0, $user['id']);
                	$result = $DB->Row($query);
                	if (!isset($result['id'])) {
                		$unregistered_ids[] = $user['id'];
                	}
				}

				$query = "";
				foreach ($unregistered_ids as $id) {
					if ($query == "") {
						$query = "(" . sprintf("%d, %d, '%s', '%s'", 0, $id, $_POST['subject'], date('Y-m-d H:i:s')) . ")";
					}
					else {
						$subquery = sprintf("%d, %d, '%s', '%s'", 0, $id, $_POST['subject'], date('Y-m-d H:i:s'));
						$query = $query . ", (" . $subquery . ")";
					}
				}

				if ($query != "") {
					$query = sprintf("INSERT INTO message_room (`owner_id`, `partner_id`, `subject`, `timestamp`) VALUES %s", $query);
					$DB->Insert($query);	
				}				

				$query = "";
				$DB->Seek($members, 0);
				while ($user = $DB->NextRow($members)) {
					$strSql = sprintf("SELECT id FROM message_room WHERE owner_id = %d AND partner_id = %d LIMIT 1", 0, $user['id']);
                	$mail_room = $DB->Row($strSql);

                	if ($query == "") {
                		$query = "(" . sprintf("%d, %d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'", 
                								0, $mail_room['id'], $user['id'], 'unread', DATE_NOW, TIME_NOW, $_POST['subject'], $_POST['editor'], '1', 'sent', 'inbox') . ")";
                	}
                	else {
                		$subquery = sprintf("%d, %d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'", 
                								0, $mail_room['id'], $user['id'], 'unread', DATE_NOW, TIME_NOW, $_POST['subject'], $_POST['editor'], '1', 'sent', 'inbox');

						$query = $query . ", (" . $subquery . ")";
                	}

                	$i++;
				}

				$fp = fopen('query.txt', 'w');
			    fwrite($fp, $query);
			    fclose($fp);

			    if ($query != "") {
			    	$query = sprintf("INSERT INTO messages (`uid`, `mail_room_id`, `mail2id`, `mailstatus`, `maildate`, `mailtime`, `mail_subject`, `mail_message`, `mail_displayalert`, `my_box`, `to_box`) 
            									VALUES %s", $query);
            		$DB->Insert($query);	
			    }			
			}

			$ErrorSend=1;
		} 
		break;

		case "super": {


					if ($_SESSION['admin_super_user'] == "yes") {

			 			
					
								$filename = str_replace("newadmin","",dirname(__FILE__)).'inc/config.php';
								if (!$file = fopen($filename, 'a+b')) { die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
								} else {
							
								$data = array();
								$counter = 1;
								$filecontent = "";
									
								while (!feof($file)) {
									$data[$counter] = fgets($file);
								
									// check line and replace string							
									  if ( strstr($data[$counter], "'ADMIN_EMAIL','".ADMIN_EMAIL."'") ) {
										
											$filecontent .= str_replace("'ADMIN_EMAIL','".ADMIN_EMAIL."'", "'ADMIN_EMAIL','".$_POST['email']."'", $data[$counter]);
									  }
									  elseif ( strstr($data[$counter], "'ADMIN_USERNAME','".ADMIN_USERNAME."'") ) {
										
											$filecontent .= str_replace("'ADMIN_USERNAME','".ADMIN_USERNAME."'", "'ADMIN_USERNAME','".$_POST['username']."'", $data[$counter]);
									  }
									  elseif ( strstr($data[$counter], "'ADMIN_PASSWORD','".ADMIN_PASSWORD."'") ) {
										
											$filecontent .= str_replace("'ADMIN_PASSWORD','".ADMIN_PASSWORD."'", "'ADMIN_PASSWORD','".$_POST['password']."'", $data[$counter]);
									  }
									  else{
											$filecontent .= $data[$counter];
									  }		 
									 $counter ++;
								}	
								fclose($file);
							}
								//now we have to write in all the new data to this file
							   if (!$handle = fopen($filename, 'w')) { 	 echo "Cannot open file ($filename)"; 	 exit; 		   }
							   // Write $somecontent to our opened file. 
							   if (fwrite($handle, $filecontent) === FALSE) {   echo "Cannot write to file ($filename)";   exit;    } 
							   fclose($handle);
					   
					   $ErrorSend=1;		

					}
	

				}break;
 
				
				case "addadmin":	  { 
	

							if (get_magic_quotes_gpc()==1) {
									 $username = $_POST['f1'];
									 $password = $_POST['f2'];
									 $email= $_POST['f3'];							
							} else {
									 $username = addslashes($_POST['f1']);
									 $password = addslashes($_POST['f2']);
									 $email= addslashes($_POST['f3']);														
							}
							

							$AccessLevel="";

							for($i=0;$i<sizeof($_POST["access"]);$i++) {
							
								$AccessLevel .=  "*".$_POST["access"][$i];
							}

							
							if(isset($_POST['eid']) && is_numeric($_POST['eid'])){ 	
 
								$RunThisQuery = "UPDATE members_admin SET `username` = '".$username."',	liveEmail='".$_POST['LiveEmail']."',  liveEdit='".$_POST['LiveEdit']."',  liveDelete='".$_POST['LiveDelete']."',  password='".$password."', email='". $email."', access_level ='".$AccessLevel."', fullname='".$_POST['fullname']."', icon='".$_POST['icon']."', alerts='".$_POST['alerts']."', admin_alerts='".$_POST['admin_alerts']."' WHERE `id` =".$_POST['eid']." LIMIT 1";
								 
								$DB->Update($RunThisQuery);
								
								$ErrorSend=1;
							
							}else{
							 
								$data = $DB->Row("SELECT id FROM members WHERE username='".$_POST['fullname']."' LIMIT 1");
	
								if(empty($data)){
									return "The username entered is invalid";
								}
	
								## update members table
								$DB->Update("UPDATE members SET moderator='yes' WHERE username='".$_POST['fullname']."' LIMIT 1");
	
								## insert database entry
								$RunThisQuery = "INSERT INTO `members_admin` (id, `access_level` ,`last_login` ,`username` ,`password` ,`email` ,`icon` ,`logincount` ,`ip` ,`pass_reset` ,`fullname`, language, alerts, admin_alerts, `liveEmail` , `liveEdit` ,`liveDelete` ) 
								VALUES ('".$data['id']."', '".$AccessLevel."' , NOW( ) , '".$_POST['fullname']."', '".$password."', '".$email."', '".$_POST['icon']."', '0', '', 'no', '".$_POST['fullname']."','','".$_POST['alerts']."', '".$_POST['admin_alerts']."','".$_POST['LiveEmail']."','".$_POST['LiveEdit']."','".$_POST['LiveDelete']."')";
									 
									 
								$DB->Update($RunThisQuery);
								
								$ErrorSend=1;							
							}						
			}break;
			
		}
	switch ($_REQUEST['authorise']) {
 
				
			}break;
	
}
if(isset($_REQUEST['authorise'])){ 
	
	
//$query = sprintf("INSERT INTO authorise (`username`, `password`) VALUES('".$_POST['authusername']."','".$_POST['authpassword']."')");
//$DB->Insert($query);	 
$DB->Update("UPDATE authorise SET username='".base64_encode($_POST['authusername'])."',password='".base64_encode($_POST['authpassword'])."' WHERE authorise_id='1' LIMIT 1");
}
}
// REDIRECT TO THE SAME PAGE
	if(isset($ErrorSend)){
		if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1";}else{$Err = $lang_members_code['no_update']."**0";}
	}
	if (!headers_sent()){
		if(isset($Err) && !isset($_REQUEST['d'])){
		
			if( isset($_POST['p']) || isset($RedirectPage) ){
			
				$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];
				
				header('location: admins.php?p='.$page.'&Err='.$Err.'&d=1');
				exit();	
			}else{
				
				header('location: admins.php?Err='.$Err.'&d=1');
				exit();
			}
		}
	}

############################################################
#################### FUNCTIONS #############################
function GetUid($username){

	global $DB;
	
	$result = $DB->Row("SELECT id FROM members WHERE username= ( '".strip_tags(trim($username))."' ) LIMIT 1");
	
	return $result['id'];
}
 

function GetMsgData($id){

	global $DB;
	$NumFields=1;
	$ReturnMessageArray=array();	
	$id = strip_tags($id);
	
	$msg = $DB->Row("SELECT messages.mailnum, messages.maildate, messages.uid, messages.type, messages.mail_subject, messages.mail_message, members.username, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f
	FROM messages
	INNER JOIN members ON ( members.id = messages.uid )
	LEFT JOIN files ON ( files.uid = messages.uid )
	LEFT JOIN album ON ( album.aid = files.aid )
	WHERE messages.uid = members.id AND messages.mailnum= ( '".$id."' ) AND ( messages.mail2id= ( '0' ) OR  messages.uid= ( '0' ) ) LIMIT 1");
	
	// CHECK TO SEE IF THERE ARE ANY IMAGES WITH THIS MESSAGE
	$imageArry = array(); $i=0;
	$msgImage = $DB->Query("SELECT * FROM files WHERE user = ( '".$id."' ) ");
	while( $img = $DB->NextRow($msgImage) ){
			$imageArry[$i]['name'] = $img['bigimage'];
			$i++;
	}
	$ReturnMessageArray[$NumFields]['image_array'] 		= $imageArry;
	//////////////////////////////////////////////////////////
	$ReturnMessageArray[$NumFields]['id'] 		= $msg['mailnum'];
	$ReturnMessageArray[$NumFields]['senderid'] = $msg['uid'];
	$ReturnMessageArray[$NumFields]['type'] 	= $msg['type'];
	$ReturnMessageArray[$NumFields]['date'] 	= dates_interconv($msg['maildate']);
	$ReturnMessageArray[$NumFields]['subject'] 	= $msg['mail_subject'];
	$order   = array("\r\n", "\n", "\r");
	$replace = '<br />';
	$ReturnMessageArray[$NumFields]['message'] 	= str_replace($order, $replace, $msg['mail_message']);
	$ReturnMessageArray[$NumFields]['username'] 	= $msg['username'];		
	//////////////////////////////////////////////////////////////////////////////////////////////////
	$ReturnMessageArray[$NumFields]['image'] 		= ReturnDeImage($msg,"small");					// MEMBERS PHOTO
	///////////////////////////////////////////////////////////////////////////////////////////////////
		
	if(!empty($ReturnMessageArray)){
		
			$DB->Update("UPDATE messages SET mailstatus='read' WHERE mailnum=".$id." AND to_box='inbox' LIMIT 1");
		
		return $ReturnMessageArray;
	}else{
		return 0;
	}
}

function GetAdminEdit($id){

	global $DB;
	if(is_numeric($id)){
    $result = $DB->Row("SELECT * FROM members_admin WHERE id=".$id." LIMIT 1");
	}
	return $result;
}
############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/admins.php";
		//require_once "inc/temp/authorise.php";

}else{

		if($PLUGINS_PAGE_TYPE =="html"){
			
			print $PLUGINS_PAGE_LINK;
			
		}elseif($PLUGINS_PAGE_TYPE =="link"){
			
			require_once (	$PLUGINS_PAGE_LINK 	);	
		}
}
print $tdata[2]["contents"]; 
$DB->Disconnect();
?>

