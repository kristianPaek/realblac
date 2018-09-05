<?
ob_start();
$_REQUEST['n'] =3;
$_POST["do_page"] ="browse"; // stops config from using thepost function.
require_once "inc/config.php";

require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

## page access check
if(!in_array("4",$_SESSION['admin_access_level']) ) { header("location:overview.php");}

$PageLink = "email.php";
$PageLang = $admin_layout_page4;


require_once "layout.php";
############################################################
#################### OPERATIONS ############################



if(ADMIN_DEMO != "yes"){

if(isset($_GET['delete'])){

	$DB->Update("DELETE FROM email_newsletters WHERE nid=".$_GET['id']." LIMIT 1");
	$ErrorSend=1;
}
if(isset($_POST['do'])){ 

		switch ($_POST['do']) {

		case "autoemail":{
		
		$key=makeRandomPassword(20);

		if(isset($_POST['eid'])){

			$DB->Update("UPDATE `email_scheduler` SET 
			`send_name` ='".eMeetingInput($_POST['sname'])."',`send_gender`='".$_POST['sgender']."' ,send_photo='".$_POST['sphoto']."', `send_account`='".$_POST['sstatus']."' ,`send_membership`='".$_POST['spid']."' 
			,`send_country`='".$_POST['scountry']."' ,`send_nid` ='".$_POST['snewid']."',`send_key`='".$_POST['skey']."'
			WHERE send_id='".$_POST['eid']."' LIMIT 1");

		}else{

			$DB->Insert("INSERT INTO `email_scheduler` (`send_id` ,`send_name` ,`send_gender` ,send_photo, `send_account` ,`send_membership` ,`send_country` ,`send_nid` ,`send_time` ,`send_key`) 
			VALUES (NULL , '".eMeetingInput($_POST['sname'])."', '".$_POST['sgender']."', '".$_POST['sphoto']."', '".$_POST['sstatus']."', '".$_POST['spid']."', '".$_POST['scountry']."', '".$_POST['snewid']."', '', '".$key."')");
		}

		$ErrorSend=1;
		} break;


		case "welcome": {
		
			$DB->Update("UPDATE system_settings SET value1='".$_POST['welcome_email']."' WHERE name='welcome_email' LIMIT 1");
			$DB->Update("UPDATE system_settings SET value1='".$_POST['welcome_sms']."' WHERE name='welcome_sms' LIMIT 1");
			$DB->Update("UPDATE system_settings SET value2='".$_POST['welcome_message']."' WHERE name='welcome_message' LIMIT 1");
			$DB->Update("UPDATE system_settings SET value1='".$_POST['welcome_subject']."' WHERE name='welcome_subject' LIMIT 1");
			$ErrorSend=1;

		} break;


		/*
			DELETE GROUP
		*/	
		case "deltracking": {
				
				$ErrorSend=0;
				for($i = 1; $i < $_POST['totalrows']; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
					
						$DB->Update("DELETE FROM email_sendtime WHERE id='".$_POST['id'.$i]."' LIMIT 1");
					}
					$ErrorSend++;
				}

		}break;
				
		/*
			DELETE BANNED MEMBERS
		*/
		case "emaildelete": {
				
				$ErrorSend=0;
				for($i = 1; $i < $_POST['totalrows']; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
								
						$DB->Update("DELETE FROM email_newsletters WHERE nid='".$_POST['id'.$i]."' LIMIT 1");
					}
					$ErrorSend++;
				}
			
		}break;	

		/*
			SAVE / ADD NEWSLETTER
		*/
		
		case "add": {
					

						$SaveThisContent = $_POST['editor'];
						
						$_POST['emailsubject'] = $_POST['subject'];				
					

					if(!isset($_POST['eid'])){
						
						$DB->Insert("INSERT INTO `email_newsletters` ( `nid` , `name` , `status` , `content` )
						VALUES (NULL , '".myAddSlashes($_POST['emailsubject'])."', 'custom', '".$SaveThisContent."')");
						
					}else{
						
						$DB->Update("UPDATE email_newsletters SET name='".myAddSlashes($_POST['emailsubject'])."', content='".$SaveThisContent."'  WHERE nid=".$_POST['eid']);
						
					}

					if($_POST['sendpreview'] =="yes" && $_SESSION['admin_email'] !=""){
					
						if(is_array($_SESSION['admin_email'])){ $ThisEmail1 = ADMIN_EMAIL; }else{ $ThisEmail1 = $_SESSION['admin_email']; }

						## send sample email
						SendMail($ThisEmail1, stripslashes($_POST['emailsubject']),$SaveThisContent);
					}
					
					$ErrorSend=1;
					
			} break;

		/*
			SAVE TRACKING CODE
		*/
		
			case "tracking": {
			
				$DB->Update("UPDATE email_newsletters SET content='".myAddSlashes($_POST['code'])."'  WHERE name='tracking' LIMIT 1");
				
				$ErrorSend=1;
			
			} break;

 
			
		/*
			SEND SINGLE EMAIL
		*/
											
			case "send": {
				
				$to_people = explode(",",$_POST['to']);
				foreach($to_people as $email){
					
					SendMail($email, stripslashes($_POST['subject']), $_POST['editor']);

				}
				$ErrorSend=1;
		
			} break;

		/*
			DOWNLOAD MEMBER EMAILS
		*/
					
			case "export": {
			
					Export($_POST['export_id']);
					
					exit();
			
			} break;
		}
}

// REDIRECT TO THE SAME PAGE

if(isset($ErrorSend)){
	if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1"; ResetSession(); }else{$Err = $lang_members_code['no_update']."**0";}
}

if(isset($Err) && !isset($_REQUEST['d'])){

	if( isset($_POST['p']) || isset($RedirectPage) ){
	
		$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];
		
		header('location: email.php?p='.$page.'&Err='.$Err.'&d=1');
		exit();	
	}else{
		
		header('location: email.php?Err='.$Err.'&d=1');
		exit();
	}
}
}
############################################################
#################### FUNCTIONS #############################
function DisplayEmails($system){

	global $DB;

	$count=1;
	if(!isset($system)){$Extra="WHERE status='system' AND name !='tracking'";}elseif($system ==1){$Extra="WHERE status='custom' AND name !='tracking'"; }elseif($system ==2){$Extra="WHERE status='template' AND name !='tracking'"; }
    $result = $DB->Query("SELECT name, status, nid FROM email_newsletters $Extra ORDER BY nid ASC");


    while( $email = $DB->NextRow($result) )
    {
		print "	
			<tr>";
			if($email['status'] != 'system'){
			print "<td><input name='d".$count."' type='checkbox' value='on'><input type=hidden value='".$email['nid']."' name=id".$count." class='hidden'>";
			}else{
			print "<td><input name='d".$count."' type='checkbox' style='border:0px;' value='on' disabled>";
			}
			print "</td>
			<td>".$email['name']."</td>
			<td>".$email['status']."</td>
			<td><a href='?p=add&id=".$email['nid']."'>".icon_edit.$GLOBALS['lang_admin_edit']."</a></td>";
			// do not delete system newsletters


		print "</tr>";
		$count++;
	}
	
	return $count;
}

function EmailItems($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM email_newsletters WHERE nid=".$id." AND name !='tracking' LIMIT 1");
	
	return $result;
}

function DisplayNewsletters($default="",$type="custom"){

	global $DB;
	$Extra="";

	if($type !=""){
		$Extra ="status='".$type."' AND";
	}

    $result = $DB->Query("SELECT nid, name FROM email_newsletters WHERE $Extra name !='tracking'");

    while( $new = $DB->NextRow($result) )
    {

		if($new['nid'] == $default){
			print "<option value='".$new['nid']."' selected>".$new['name']."</option>";
		}else{
			print "<option value='".$new['nid']."'>".$new['name']."</option>";
		}
		
	}
}

function FindTemplateEmails($type=0){

	global $DB;
	
	if($type ==1){
	
		$result = $DB->Query("SELECT nid, name, image FROM email_newsletters WHERE status='custom' AND name !='tracking'");
	
	}else{

		$result = $DB->Query("SELECT nid, name, image FROM email_newsletters WHERE status='template' AND name !='tracking'");
			
	}
	
	$count=1;
	while( $tmp = $DB->NextRow($result) )
    {
		print '<div class="thumb" style="height:170px;">';
		print '<a href="#" onclick="javascript:ChangeNewsletter('.$tmp['nid'].');" rel="bookmark"><img src="inc/'.$tmp['image'].'"></a>';
		print '<p class="themelabel" style="overflow:hidden;text-align:center; width:150px;"><a href="#" onclick="return false;"><b>'.$tmp['name'].'</b></a></p>';
		print '</div>';
	
	}
}
function GetCode(){

	global $DB;
	
	$result = $DB->Row("SELECT content FROM email_newsletters WHERE name='tracking'");

	return $result['content'];
}

function displayTrackingResults($nid=0){

	global $DB;
	$num=1;
	if($nid ==0){
    	$result = $DB->Query("SELECT distinct members.username, members.id,  email_sendtime.nid, email_sendtime.open_date, email_sendtime.send_date, email_sendtime.stats_opened, email_sendtime.emailemail_sendtime.id AS delID 
		FROM members, email_sendtime 
		WHERE members.email = email_sendtime.email 
		GROUP BY email_sendtime.email
		ORDER BY email_sendtime.stats_opened desc");	
	}else{
    	$result = $DB->Query("SELECT distinct members.username, members.id,  email_sendtime.nid, email_sendtime.open_date, email_sendtime.send_date, email_sendtime.stats_opened, email_sendtime.email, email_sendtime.id AS delID 
		FROM members, email_sendtime 
		WHERE members.email = email_sendtime.email AND email_sendtime.nid='".$nid."'
		GROUP BY email_sendtime.email
		ORDER BY email_sendtime.stats_opened desc");
	}
	
    while( $new = $DB->NextRow($result) )
    {
		if($new['stats_opened'] > 0){ $bdbg='bgcolor="#FDE5E5"'; }else{ $bdbg=""; }
			print '<tr '.$bdbg.'> 
                    <td '.$bdbg.'><input name="d'.$num.'" type="checkbox" style="border:0px" value="on"><input type=hidden value="'.$new['delID'].'" name="id'.$num.'" class="hidden"></td>
                    <td>'.$new['username'].'</td>
                    <td>'.$new['email'].'</td>
					<td>'.showTimeSince($new['send_date']).'</td>
                    <td>';
					
			if($new['stats_opened'] ==0){	print "Not Opened";	}else{	print "Opened on ".$new['open_date'];	}
			print'</td></tr>';
		$num++;
	}
	
	return $num;
}
function FindTrackingG(){

	global $DB;
	
	$result = $DB->Query("SELECT nid, name FROM email_newsletters WHERE name !='tracking'");	
	$count=1;
	$string ="";
	
	while( $tmp = $DB->NextRow($result) )
    {
		$result1 = $DB->Row("SELECT count(id) AS result FROM email_sendtime WHERE nid='".$tmp['nid']."'");
		if($result1['result'] != 0){
			$string .= "<option value='".$tmp['nid']."'>". $tmp['name'] ." ( ".$result1['result']." reports ) </option>";
		}
	}
	
	return $string;
}

function Export($id){

	global $DB;
	
	$contents="";
	
	if($id ==0){ // EXPORT ALL MEMBERS
    	$result = $DB->Query("SELECT username, email FROM members ORDER BY id ASC");
	}else{
		$result = $DB->Query("SELECT username, email FROM members WHERE packageid =".$id." ORDER BY id ASC");		
	}
    while( $export = $DB->NextRow($result) )
    {
	
		$contents.=$export['username'].",";
		$contents.=$export['email']."";
		$contents.= "\n"; 
	}
	$contents = strip_tags($contents); // remove html and php tags etc.
	Header("Content-Disposition: attachment; filename=export_members.csv");
	print $contents;
}
############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/email.php";

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