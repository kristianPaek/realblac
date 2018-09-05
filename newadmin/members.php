<?php
ob_start();
$_REQUEST['n'] =1;
require_once "inc/config.php";
require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

$PageLink = "members.php";
$PageLang = $admin_layout_page2;

## page access check
if(!in_array("2",$_SESSION['admin_access_level']) ) { header("location:overview.php");}

if(isset($_GET['p'])){ $_REQUEST['p'] = $_GET['p']; }
if(isset($_POST['p'])){ $_REQUEST['p'] = $_POST['p']; }
if(isset($_GET['do']) && $_GET['do'] =="switchpage"){ $_POST['do']="switchedit"; }

############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){

if(isset($_POST['do'])){ 

		switch ($_POST['do']) {


		case "fakemembers": {
		
		
			MakeFakeMembers($_POST);
			$ErrorSend=1;

		} break;
 

		/*
			PERMENTANT BAN MEMBERS
		*/
		
		case "delmonitor": {
				 
				$ErrorSend=0;
				for($i = 1; $i < $_POST['totalrows']+1; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
						
						if(isset($_POST['tid'. $i]) && $_POST['tid'.$i] == "1"){
						
							$DB->Insert("DELETE FROM messages WHERE mailnum = '".$_POST['id'.$i]."' LIMIT 1");	
						
						}
						
						$ErrorSend++;
					}
				}

		}break;

		/*
			UPLOAD FILES FOR MEMBER
		*/
		case "upload": {
						 
			$USERID = GetUseridFromUsername($_POST['uname']);
			 
			if($USERID ==""){
			
							$Err = "The Username you entered is not recognized. Please check and try again.";	
			}else{
			
			// LETS FIND AN ALBUM ID FOR THIS USER
			$cData = $DB->Row("SELECT aid FROM album WHERE uid=".$USERID." AND cat != 'private' LIMIT 1");
			
			if(empty($cData)){			
			
				// CREATE NEW ALBUM
				$DB->Insert("INSERT INTO `album` ( `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a` )
				VALUES ('".$cData['uid']."', 'My Album', '', '0', 'public', 'y', 'n', 'n', 'n')");
				$AlbumID = $DB->InsertID();
				
			}else{
			
				$AlbumID = $cData['aid'];
			
			}
					
					require_once(subd.'inc/func/func_uploads.php');
					
					foreach($_FILES as $value){
								
						// IF THE USER DOESNT HAVE AN ALBUM, CREATE ONE
							$_POST['aid']=$AlbumID;												
							
							if($value['error'] !=4){ // error 4 = empty file								
								$Err = UploadFile($value, $USERID, strip_tags($_POST['title']), strip_tags($_POST['comment']), $_POST['default'], "photo", $AlbumID,"no");
															  
								}
							}		
					}					
			
			$ErrorSend=1;
			
			} break;

 
 
		/*
			PERMENTANT BAN MEMBERS
		*/
		
		case "peban": {
				
				$ErrorSend=0;
				for($i = 1; $i < $_POST['totalrows']+1; $i++) { 
					
					$filename = subd.".htaccess";
	
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
						
						$DB->Insert("DELETE FROM members_banned WHERE autoid = '".$_POST['id'.$i]."' LIMIT 1");	
						
						if (is_writable($filename) && $_POST['id'.$i] !=""){
						
									$fp = @fopen($filename,'a+');
									@fwrite($fp,"\r\ndeny from ".$_POST['ip'. $i]."");
									@fclose($fp);
						}
						$ErrorSend++;
					}
				}

		}break;

		/*
			SUSPEND MEMBERS
		*/
		
		case "affiliatsignupedelete": {
				
				$ErrorSend=0;
				for($i = 1; $i < $_POST['totalrows']+1; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
					
						$DB->Update("DELETE FROM aff_signup WHERE autoid='".$_POST['id'.$i]."' LIMIT 1");
						$DB->Update("UPDATE aff_members SET total_registered=total_registered-1 WHERE id='".$_POST['aid'.$i]."' LIMIT 1");
						
						$ErrorSend++;
					}
				}

		}break;
		
 
 
		
		/*
			ADD WEBSITE AFFILIATES
		*/		
				
		case "addaff": {
										
				if(isset($_POST['eid'])){				

					$DB->Update("UPDATE aff_members SET
					`username` ='".strip_tags($_POST['j1'])."',
					`password` ='".strip_tags($_POST['j2'])."',
					`firstname` ='".strip_tags($_POST['j3'])."',
					`lastname` ='".strip_tags($_POST['j4'])."',
					`businessname` ='".strip_tags($_POST['j5'])."',
					`address` ='".strip_tags($_POST['j6'])."',
					`street` ='".strip_tags($_POST['j7'])."',
					`town_city` ='".strip_tags($_POST['j8'])."',
					`state_county` ='".strip_tags($_POST['j9'])."',
					`zip_post` ='".strip_tags($_POST['j10'])."',
					`country` ='".strip_tags($_POST['j11'])."',
					`telephone` ='".strip_tags($_POST['j12'])."',
					`fax` ='".strip_tags($_POST['j13'])."',
					`email` ='".strip_tags($_POST['j14'])."',
					`website` ='".strip_tags($_POST['j15'])."',
					`payment_to`='".strip_tags($_POST['j16'])."' WHERE id=".$_POST['eid']);
												
				}else{
				
				
					$DB->Insert("INSERT INTO `aff_members` (`joined` , `username` , `password` ,`firstname` , `lastname` , `businessname` ,	`address` ,	`street` ,	`town_city` ,`state_county` ,`zip_post` ,`country` ,`telephone` ,`fax` ,												`email` ,												`website` ,												`payment_to` 												)
					VALUES ('".date("Y-m-d")."', '".strip_tags($_POST['j1'])."',  '".strip_tags($_POST['j2'])."', '".strip_tags($_POST['j3'])."', '".strip_tags(trim($_POST['j4']))."', '".strip_tags(trim($_POST['j5']))."', '".strip_tags(trim($_POST['j6']))."', '".strip_tags(trim($_POST['j7']))."', '".strip_tags(trim($_POST['j8']))."', '".strip_tags(trim($_POST['j9']))."', '".strip_tags(trim($_POST['j10']))."', '".strip_tags(trim($_POST['j11']))."', '".strip_tags(trim($_POST['j12']))."', '".strip_tags(trim($_POST['j13']))."', '".strip_tags(trim($_POST['j14']))."', 
'".strip_tags($_POST['j16'])."',
'".strip_tags(trim($_POST['j15']))."')");
												
					// SEND THEM AN EMAIL TO CONFIRM THEIR REGISTRATION DETAILS
					$data['email'] = strip_tags(trim($_POST['j13']));
					$data['username'] = strip_tags(trim($_POST['j1']));
					$data['password'] = strip_tags(trim($_POST['j16']));
					SendTemplateMail($data, 32);
					// SEND THE ADMIN AN EMAIL TO CONFIRM SIGNUP
					$data['email'] = ADMIN_EMAIL;	
					SendTemplateMail($data, 31);
				
				}
				
				$ErrorSend=1;
				
		}break;

		/*
			MEMBER ACTIVITY LOG
		*/		
	
		case "dellog": {
			
				$DB->Update("DELETE FROM system_log");
				
				$ErrorSend=1;
				
		} break;
 
		/*
			EDIT MEMBERS
		*/
							
			case "edit": {
			
					## Define Variables
					$BuiltArray="";	$RunExtra="";$SQLStringExtra ="";		
			
					## retrieve censor words for filter
					$BadWords = CreateBadWordFilter();
					 
					## create a counter for the number of fields we have completed
					$CompleteFields =($_POST['TotalNumberOfRows']-1);
					 
					## loop through all the entered field data
					for($i = 1; $i < $_POST['TotalNumberOfRows']; $i++) {  if(isset($_POST['FieldType'.$i]) ){
 
						// RESTORE GENDER ID
						if($_POST['FieldName'.$i] == "gender" && $_POST['eid'] == $_SESSION['uid']){
	 
						$_SESSION['genderid'] = $_POST['FieldValue'.$i];

						}

						## clean our data		
						if(isset($_POST['FieldValue'.$i])){
							$_POST['FieldValue'.$i] = eMeetingInput(filter_str($_POST['FieldValue'.$i],$BadWords));
						}
						## create blank value incase user hasnt create a value via the admin
						if(!isset($_POST['FieldValue'.$i])){$_POST['FieldValue'.$i]="";}

						## dont create counter for the checkboxes within a multiple checkbox list
						if($_POST['FieldValue'.$i] =="" && $_POST['FieldType'.$i] !=4 && $_POST['FieldType'.$i] !=5){
								$CompleteFields--;
						}

						## 5 = multiple checkbox data
						if($_POST['FieldType'.$i] ==5){		
									 
							$x=0;												
							while(isset($_POST['FieldMulti'.$x.$i])){
	
									// MAKE SAVE
									if($_POST['Multi'.$x.$i] == 1){
										$BuiltArray .="1**";
									}else{
										$BuiltArray .="0**";
									}
	
							$x++;  
							 
							}
 
							$RunExtra .= ", ".$_POST['FieldName'.$i] ."='".$BuiltArray."'";								
							$BuiltArray="";
						}				

						## if its not a checkout then do this
						if($_POST['FieldType'.$i] !=5){
							
							## AGE CAANOT BE LESS THAN 18 AND OCER 110
							if($_POST['FieldName'.$i] == "age"){

								$MyAgeIs = MakeAge($_POST['FieldValue'.$i]);
								
								if( $MyAgeIs < 16 || $MyAgeIs > 110){

										$RunExtra.= ", ".$_POST['FieldName'.$i] ."='".$_POST['FieldValue'.$i.'a']."-".$_POST['FieldValue'.$i.'b']."-".$_POST['FieldValue'.$i.'c']."'";

								}else{
								
									$RunExtra.= ", ".$_POST['FieldName'.$i] ."='".$_POST['FieldValue'.$i]."'";
								
								}
								
						## if the data is a text box
						}elseif($_POST['FieldType'.$i] == 2){

							## this data is stored from the html editor
							$RunExtra.= ", ".$_POST['FieldName'.$i] ."='".$_POST['FieldValue'.$i]."'";

						## AGE FIELD
						}elseif($_POST['FieldType'.$i] == 7){
 
						$RunExtra.= ", ".$_POST['FieldName'.$i] ."='".$_POST['FieldValue'.$i.'a']."-".$_POST['FieldValue'.$i.'b']."-".$_POST['FieldValue'.$i.'c']."'";
						
						 
						
						## finally just filter text from select boxes and input fields
						}else{

								$RunExtra.= ", ".$_POST['FieldName'.$i] ."='".$_POST['FieldValue'.$i]."'";

						}

					}	
														
				} }						


 
					if($_POST['TotalNumberOfRows'] > 1){
					$percent = @floor(($CompleteFields / ($_POST['TotalNumberOfRows']-1))* 100);
					}else{
					$percent=100;
					}



					$extra="";
					if(isset($_POST['epass']) && $_POST['epass'] ==1){

						if(D_MD5 ==1){
							$extra = " password='".md5($_POST['upass'])."',";
						}else{
							$extra = " password='".$_POST['upass']."',";
						}
											
					}

					$DB->Update("UPDATE members SET active='".$_POST['acc_status']."', updated=NOW(), profile_complete='$percent', packageid='".$_POST['pid']."', highlight='".$_POST['hightlight']."',  $extra username='".$_POST['uname']."', email='".$_POST['uemail']."' WHERE id=".$_POST['uid']);
					$DB->Update("UPDATE members_data SET uid=".$_POST['uid']." $RunExtra  WHERE uid =".$_POST['uid']);
					$DB->Update("UPDATE members_privacy SET SMS_number='".$_POST['smsN']."' ,SMS_credits='".$_POST['smsC']."'  WHERE uid =".$_POST['uid']);
										
					if(isset($_POST['upgradeEmail']) && $_POST['upgradeEmail'] ==1){
						// SEND UPRADE EMAIL
						$Data['email'] =  $_POST['uemail'];
						$Data['username'] =  $_POST['uname'];
						$Data['custom'] =  GetPackageName($_POST['pid']);																	
						SendTemplateMail($Data, 2);
						
					}
					
					// ADD TO BILLING SYSTEM
					if(isset($_POST['upgradeBill']) && $_POST['upgradeBill'] ==1){
						$Upgrade_Period = $DB->Row("SELECT numdays_new AS result FROM package WHERE pid=".$_POST['pid']);
						$DB->Insert("INSERT INTO `members_billing` ( `id` , `uid` , `packageid` , `date_upgrade` , `date_expire` , `pay_method` , `running` , `subscription` , `bill_email` )
						VALUES (NULL , '".$_POST['uid']."', '".$_POST['pid']."', '".date("Y-m-d H:i:s")."', '".date('Y-m-d H:i:s', strtotime('+'.$Upgrade_Period['result'].' days'))."', 'ADMIN UPDATED', 'yes', 'no', '".$_POST['uemail']."')");
					}					
					//die("manish");
					header("location: members.php?p=edit&id=".$_POST['uid']."&updated=1");
					exit();
					//$ErrorSend=1;
				 //echo '<script>window.location.href = "http://realblacklove.com/Rbl2/meet/newadmin/index_updating.php";</script>';
	    	//echo '<script>window.location.href ="http://realblacklove.com/Rbl2/meet/newadmin/members.php?p=edit&id='".$_POST['uid']."'&updated=1";</script>';
										//	exit();
								
			} break;

		/*
			AFFILIATE COMMISSION
		*/
		
			case "com": {		
					
						$DB->Update("UPDATE aff_pages SET content='".$_POST['commission']."' WHERE page='commission' LIMIT 1");
						
						$ErrorSend=1;
						
			} break;	
		
		/*
			AFFILIATE PAGES
		*/		
			
			case "editaffiliatepage": {
					
					
						$DB->Update("UPDATE aff_pages SET content='".CheckAddSlashes($_POST['p1'])."' WHERE page='home' LIMIT 1");
						$DB->Update("UPDATE aff_pages SET content='".CheckAddSlashes($_POST['p2'])."' WHERE page='code' LIMIT 1");
						$DB->Update("UPDATE aff_pages SET content='".CheckAddSlashes($_POST['p3'])."' WHERE page='payment' LIMIT 1");
						$DB->Update("UPDATE aff_pages SET content='".CheckAddSlashes($_POST['p4'])."' WHERE page='summary' LIMIT 1");
						$DB->Update("UPDATE aff_pages SET content='".CheckAddSlashes($_POST['p5'])."' WHERE page='edit' LIMIT 1");
						
						$ErrorSend=1;

						
			} break;

		/*
			IMPORT MEMBERS
		*/								
			case "import": {					
		
				if($_POST['type']=="cvs"){
				
					if(strlen($_FILES['import']['tmp_name']) > 0){
							
								$numB = parse_csv_file($_FILES['import']['tmp_name'], $_POST['heading'], $_POST['del'], $_POST['enc'], $_POST['dpass']);
								
								$Err = $numB." Members Imported Successfully**1";
								
					}else{
								$Err = "Please select a file";
					}
				
				}elseif($_POST['type']=="database"){
				
				
					// BUILD GENDER ARRAY
					$Gen_Array = array();
					$gCount=1;
					$Gen = $DB->Query("SELECT fvid,fvCaption FROM field_list_value WHERE fvFid=28");
					while( $gen = $DB->NextRow($Gen) )
					{
								$Gen_Array[$gCount]['name'] =	$gen['fvCaption'];
								$Gen_Array[$gCount]['id'] 	=	$gen['fvid'];
								$gCount++;
					}						
					// CHECK THE NEW SQL SETTINGS WORK
					$dblink=@mysql_connect($_POST['emeeting_dbhost'], $_POST['emeeting_dbuser'], $_POST['emeeting_dbpass']);
					$dbsel=@mysql_select_db($_POST['emeeting_db']);
					if (!$dblink) { $error="Error: MySQL could not connect to the database.<br>"; }
					if (!$dbsel) { $error.="Error: MySQL could not select the database.<br>"; }
					
					if (trim($error)==""){
						
						$ComText="";
						$cOne['host']		= $_POST['emeeting_dbhost'];
						$cOne['username']	= $_POST['emeeting_dbuser'];
						$cOne['password']	= $_POST['emeeting_dbpass'];
						$cOne['database']	= $_POST['emeeting_db'];
						
						$cTwo['host']		= DB_HOST;
						$cTwo['username']	= DB_USER;
						$cTwo['password']	= DB_PASS;
						$cTwo['database']	= DB_BASE;						
								
					if($_POST['software'] !="emeeting6"){
						
						// NONE EMEETING DATABASE
						require_once('inc/class/database_transfer.php');						
						
						$ComText .= TransferMembersData($cOne, $cTwo, $_POST['software'],$Gen_Array,$_POST['emeeting_prefix']);
						
					}else{
						
						// EMEETING MEMBER TRANSFER TOOLS
						require_once('inc/class/database_transfer_emeeting.php');
						
						$ComText .= TransferMembersData($cOne, $cTwo, 2);
						$ComText .= TransferForumData($cOne, $cTwo, 2);
						$ComText .= TransferPackageData($cOne, $cTwo, 2);						
							
						
					}
						
						
					}else{
						$Err = $error."**0";
					}
					/////////////////////////////////////////////////////////////////
				
				}
						
			} break;			
														
	}
}

// REDIRECT TO THE SAME PAGE
	if(isset($ErrorSend)){
		if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1"; ResetSession(); }else{$Err = $lang_members_code['no_update']."**0";}
	}
	if (!headers_sent()){
		if(isset($Err) && !isset($_REQUEST['d'])){	


			if(isset($DontForward)){
				if( isset($_POST['p']) || isset($RedirectPage) ){		 $page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];	$_REQUEST['p']=$page; }
				$_REQUEST['Err']=$Err;
			}else{					
				

				if( isset($_POST['p']) || isset($RedirectPage) ){			
					$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];				
					header('location: members.php?p='.$page.'&Err='.$Err.'&d=1');
					exit();					
				}else{				
					header('location: members.php?Err='.$Err.'&d=1');
					exit();
				}
			}
		}
	}
}
############################################################
#################### FUNCTIONS #############################
function GetEditDetails($id){

	global $DB;
	
	if($id==""){$id=0; }
    $result = $DB->Row("SELECT * FROM members, members_privacy WHERE members.id = members_privacy.uid AND id=('".$id."') LIMIT 1");

    return $result;

}

 
function EditMember($id){

	global $DB;
	$NumFields = 1;
	$divCount =1;
	$divString="";
	$ReturnString="";
	// FIRST EGT FIELD GROUPS
	
	$result = $DB->Query("SELECT id, caption FROM field_groups ORDER BY forder ASC");

    while( $groups = $DB->NextRow($result) ){

		## start output display
		$ReturnString .= '<div class="boxx1"><img src="inc/images/icons/edit.gif" align="absmiddle"> '.$groups['caption'].'</div>';

		$ReturnString .= '<ul class="form"><div class="box_body">';
		
		## select group fields
		$SQL = "SELECT field.fid,field.fType, field.fName,field.linked_id FROM field 
		INNER JOIN field_groups ON ( ( field_groups.id = field.groupid  || field_groups.id = field.groupid_1 || field_groups.id = field.groupid_2 )  )
		WHERE ( field.groupid = '".$groups['id']."' OR field.groupid_1 = '".$groups['id']."' OR field.groupid_2 = '".$groups['id']."')
		GROUP BY field.fid ORDER BY field.fOrder ASC";
	
		$result1 = $DB->Query($SQL);

		while( $field = $DB->NextRow($result1) ){
					
			## determin field caption based on language
			if(D_LANG !="english"){

				## check see if there is a caption
				$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' AND lang= ( '".D_LANG."' ) limit 1");						
				if(empty($Caption)){
					## no caption found, load english caption
					$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' limit 1");
				}
						
			}else{
				## check for english value						
				$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' AND lang='".D_LANG."' limit 1");
			}

			## select data value
			$Value = $DB->Row("SELECT ".$field['fName']." FROM members_data WHERE  uid= ('".$id."') limit 1");

			## build output
			$ReturnString .= '<li><label>'.$Caption['caption'].'</label>';					
					
			## clean the value for output
			if($field['fType'] == 2){ $Value[$field['fName']] = eMeetingOutput($Value[$field['fName']],true); }else{ $Value[$field['fName']] = eMeetingOutput($Value[$field['fName']]); }

			## choose our field type, 1 = input box
			if($field['fType'] == 1){	

				if($field['fName'] =="age"){

								if($Value[$field['fName']] == ""){ $Value[$field['fName']]="0000-00-00"; }								
								$ReturnString .= MakeAge($Value[$field['fName']])." ".$GLOBALS['_LANG']['_yold']." <script>DateInput('FieldValue".$field['fid']."', true, 'YYYY-MON-DD','".$Value[$field['fName']]."')</script>";

							}else{

								$ReturnString .= "<input name='FieldValue".$field['fid']."' class='input' type='text' maxlength='255' size='42' value=\"".$Value[$field['fName']]."\">";

							}					


					## checkbox input
					}elseif($field['fType'] == 4){

							if($Value[$field['fName']] ==1){ $ex = "checked"; }else{ $ex="";}
							$ReturnString .= "<input type='checkbox' name='FieldValue".$field['fid']."' value='1' $ex>";

					## textarea input
					}elseif($field['fType'] == 2){

							$ReturnString .= "<div class='ClearAll'></div><textarea name='FieldValue".$field['fid']."' class='input' cols='5' rows='7' id='editor' style='width:600px;'>".$Value[$field['fName']]."</textarea>";

					## selection list box
					}elseif($field['fType'] == 3){



							// check if there is a field linked to this one
							$Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$field['fid']." limit 1");						
		
							if(!empty($Linked)){

							$storeLastLinked = $Linked['fid'];
							$LinkedCode ="onClick='eMeetingLinkedField(this.value, ".$Linked['fid'].",0);'";

							}else{ $LinkedCode =""; }



							## find caption
							if(D_LANG !="english"){

								## check see if there is a caption					
								$test = $DB->Row("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");	
								if(empty($test)){

									## no caption found, load english caption
									$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='english' Order by fvOrder");
						
								}else{				
		
									$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");	
					
								}
								
							}else{
								$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");
							}		


	
					## build output

					if(isset($storeLastLinked) && $storeLastLinked == $field['fid']){

						if(isset($StoreCountry) && is_numeric($StoreCountry)){
							$ReturnString .= "<div id='Link".$field['fid']."'> <a href='javascript:void(0);' onclick=\"eMeetingLinkedField(".$StoreCountry.", 54,0);\">".MakeCountry($Value[$field['fName']],$field['fid'])." </a> <input type='hidden' class='hidden' name='FieldValue".$field['fid']."' value='".$Value[$field['fName']]."'> </div>";
						
						}else{
							$ReturnString .= "<div id='Link".$field['fid']."'>".MakeCountry($Value[$field['fName']],$field['fid'])." </div>";						
						}

					}else{

							if($field['fid'] =="25"){ $StoreCountry = $Value[$field['fName']]; } // country box fix

							$ReturnString .= "<div id='Link".$field['fid']."'><select name='FieldValue".$field['fid']."' class='input' style='width:250px;' ".$LinkedCode.">";
							$ReturnString .= "<option value='0'>------------------</option>";
							while( $ListValue = $DB->NextRow($result2) )  
							{ 			
								if($Value[$field['fName']] == $ListValue['fvid']){
									$ReturnString .= "<option value='".$ListValue['fvid']."' selected>".$ListValue['fvCaption']."</option>";
								}else{
									$ReturnString .= "<option value='".$ListValue['fvid']."'>".$ListValue['fvCaption']."</option>";
								}
													
										
							}	
							$ReturnString .= "</select></div>";
					}


				## multiple checkbox											
				}elseif($field['fType'] == 5){

							$ReturnString .= "<div class='ClearAll'></div><br><table width='100%'  border=0><tr> ";

							$c=0; $tdC =2;
							$CheckParts = explode("**", $Value[$field['fName']]);
							$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");			
							while( $ListValue = $DB->NextRow($result2) )  
							{ 	
								$ReturnString .= "<td width='25%'><span>";
								if($CheckParts[$c] ==1){
										$ReturnString .= "<input type='checkbox' name='Multi".$c.$field['fid']."' value='1' class=radio checked>&nbsp;&nbsp;".$ListValue['fvCaption'];
								}else{
										$ReturnString .= "<input type='checkbox' name='Multi".$c.$field['fid']."' value='1' class=radio>&nbsp;&nbsp;".$ListValue['fvCaption'];
								}
								
								## include hidden fields for saving data
								$ReturnString .= "<input type='hidden' class='hidden' name='FieldValue".$field['fid']."' value='".$field['fName']."'>";
								$ReturnString .= "<input type='hidden' class='hidden' name='FieldName".$field['fid']."' value='".$field['fName']."'>";
								$ReturnString .= "<input type='hidden' class='hidden' name='FieldType".$field['fid']."' value='".$field['fType']."'>";					
								$ReturnString .= "<input type='hidden' class='hidden' name='FieldMulti".$c.$field['fid']."' value='".$c."'>";
								$ReturnString .= "</span></td>";
								$c++;
								if($tdC ==5){ $ReturnString .= '</tr><tr>'; $tdC=1; }
								$tdC++;

							}
						$ReturnString .= "</tr></table>";			

				## input field
				}elseif($field['fType'] == 6){

							if($Value[$field['fName']] ==1){ $ex = "checked"; }else{ $ex="";}
							$ReturnString .= "<input type='file' name='FieldValue".$field['fid']."' $ex>";

				## age field
				}elseif($field['fType'] == 7){

 
						if($Value[$field['fName']] == ""){ $Value[$field['fName']]="0000-00-00"; }								
						$ReturnString .= MakeAge($Value[$field['fName']])." ".$GLOBALS['_LANG']['_yold']."";
							
						$ReturnString .= "<br>".MakeAgeListField($Value[$field['fName']],$field['fid']);




				## include hidden fields				
				}



				// ADD CUSTOM HIDDEN FIELDS FOR DATABASE NAME VALUES
				if($field['fType'] != 5){
					$ReturnString .= "<input type='hidden' class='hidden' name='FieldName".$field['fid']."' value='".$field['fName']."'>";
					$ReturnString .= "<input type='hidden' class='hidden' name='FieldType".$field['fid']."' value='".$field['fType']."'>";
					//$field['fid']++;
				}
					/////////////////////////////////////////////////////////////////////////////////////////////////////////////	
					if(!isset($value)){ $value="<br>"; }
					$ReturnString .= $value."</li>";				

			}
			//$ReturnString .='<input type="submit" value="Quick Update" class="button">';
			$ReturnString .="</div></ul>";
			
		$divCount++;
	}	
	$ReturnString .= '</div>';
	$ReturnString .= "<input name='TotalNumberOfRows' type='hidden' value='1000' class='hidden'>";
	
	return $ReturnString;

}


function parse_csv_file($file, $columnheadings = false, $delimiter = ',', $enclosure = "\"", $pass) {

	global $DB;
       
        $row = 1;
        $rows = array();
        $handle = fopen($file, 'r');
       
        while (($data = fgetcsv($handle, 1000, $delimiter, $enclosure )) !== FALSE) {
       
            if (($columnheadings == "Yes" && $row == 1)) {
                $headingTexts = $data;
				
            } elseif (($columnheadings == "No") || ($columnheadings == "Yes")) {

				$memberID=1;
				$i=1;
                foreach ($data as $key => $value) {
                    unset($data[$key]);
                    $data[$headingTexts[$key]] = $value;
					if($i ==1){
						$imDetails[$memberID]['username'] =$data[$headingTexts[$key]];
					}elseif($i ==2){
						$imDetails[$memberID]['email'] =$data[$headingTexts[$key]];
					}
					elseif($i ==3){
						$imDetails[$memberID]['age'] =$data[$headingTexts[$key]];
					}
					elseif($i ==4){
						$imDetails[$memberID]['gender'] =$data[$headingTexts[$key]];
					}
					elseif($i ==5){
						$imDetails[$memberID]['location'] =$data[$headingTexts[$key]];
					}
					elseif($i ==6){
						$imDetails[$memberID]['country'] =$data[$headingTexts[$key]];
					}

					$i++;
                }
					
					$ip = $_SERVER['REMOTE_ADDR'];
					$datetime = @date("Y-m-d H:i:s");
					$session = session_id();
					//////////////// ADD NEW MEMBER
					$DB->Insert("INSERT INTO `members` ( `id` , `username` , `password` , `email` , `session` , `ip` , `lastlogin` , `visible` , active, `created`, packageid )
								VALUES (NULL , '".$imDetails[$memberID]['username']."', '".md5($pass)."', '".$imDetails[$memberID]['email']."', '".$session."', '".$ip."', '".$datetime."', 'yes', 'active', '".$datetime."', '".DEFAULT_PACKAGE."')");
					$userid = $DB->InsertID();
										
					$DB->Insert("INSERT INTO `members_data` ( `uid`, age, gender, location, country ) values ( '$userid', '".$imDetails[$memberID]['age']."', '".$imDetails[$memberID]['gender']."', '".$imDetails[$memberID]['location']."', '".$imDetails[$memberID]['country']."' )");
					$nw ="yes";
					$nn ="yes"; 
					$DB->Insert("INSERT INTO `members_privacy` ( `uid` , `Newsletters` , `Notifications` , `IM` , `Language` , `Time Zone`, friends, comments ) VALUES ('$userid', '".$nw."', '".$nn."', 'yes', 'english', '', 'yes', 'yes')");
					
					//$DB->Insert("INSERT INTO `members_template` (`uid` ,`background` ,`t1` ,`t2` ,`t3` ,`font` ,`font_inner`)VALUES ('".$userid."', '1', '', '', '', '', '')");
					
				$memberID++;
                $rows[] = $data;
				
            } else {
                $rows[] = $data;
            }
            $row++;
        }
       
        fclose($handle);
        return $memberID;
}
 

function GetAffiliateData($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM aff_members WHERE id=".strip_tags($id));

    return $result;
}

function GetPages($page){

	global $DB;

    $result = $DB->Row("SELECT content FROM aff_pages WHERE page='".$page."' LIMIT 1");

    return $result['content'];
}
 

function DisplayLog(){

	global $DB;
	
    $result = $DB->Query("SELECT * FROM system_log ORDER BY id DESC LIMIT 100");

    while( $log = $DB->NextRow($result) )
    {
		print "	<tr>
                    <td>".$log['username']."</td>
                    <td>".$log['date']." / ".$log['time']."</td>
                    <td>".$log['ip']."</td>
                    <td>".$log['type']."</td>
                  </tr>";
	}
	
}
 

function DisplayAffiliateMembers($id){

	global $DB;
	
	$count=1;
    $result = $DB->Query("SELECT * FROM aff_signup WHERE affiliate_id='".$id."' ORDER BY date DESC");

    while( $log = $DB->NextRow($result) )
    {
		print "	<tr>";
		print "<td><input name='d".$count."' type='checkbox' value='on'><input type=hidden value='".$log['affiliate_id']."' name=aid".$count." class='hidden'><input type=hidden value='".$log['autoid']."' name=id".$count." class='hidden'></td>";	
        print "<td>".GetUsername($log['member_id'])." (ID: ".$log['member_id'].") </td>
               <td>".$log['date']."</td>
        </tr>";
		$count++;
	}
	
	return $count;
	
}

function DisplayMonitor($id){

	global $DB;
	
	$count=1;
    $result = $DB->Query("SELECT members.username, messages.to_box, messages.mail_subject, messages.my_box, messages.mailstatus, messages.maildate, messages.mail2id, messages.mailnum 
	FROM members
	INNER JOIN messages ON (  members.id = messages.uid )
	WHERE members.id LIKE '%".$id."%' OR members.username LIKE '%".$id."%'	");

    while( $msg = $DB->NextRow($result) )
    {
		print "<tr>
				<td><input name='d".$count."' type='checkbox' value='on'>
				<input type=hidden value='1' name=tid".$count." class='hidden'>
				<input type=hidden value='".$msg['mailnum']."' name=id".$count." class='hidden'></td>
				<td>".$msg['username']."</td>
				<td>".GetUsername($msg['mail2id'])."</td>
				<td>".$msg['maildate']."</td>
				<td>".$msg['mailstatus']." ( ".$msg['my_box']." / ".$msg['to_box']." )</td>
				<td><a href=\"javascript:void(0);\" onclick=\"PreviewWin('inc/pops/pop_monitor.php?t=1&id=".$msg['mailnum']."');\"><img src='inc/images/icons/view.gif'></a></td>
			</tr>";
		$count++;
	}


    $result = $DB->Query("SELECT members.username, messages.to_box, messages.mail_subject, messages.my_box, messages.mailstatus, messages.maildate, messages.mail2id, messages.mailnum, messages.uid 
	FROM members
	INNER JOIN messages ON (  members.id = messages.mail2id )
	WHERE members.id LIKE '%".$id."%' OR members.username LIKE '%".$id."%'	");

    while( $msg = $DB->NextRow($result) )
    {
		print "<tr>
				<td><input name='d".$count."' type='checkbox' value='on'>
				<input type=hidden value='1' name=tid".$count." class='hidden'>
				<input type=hidden value='".$msg['mailnum']."' name=id".$count." class='hidden'></td>
				<td>".GetUsername($msg['uid'])."</td>
				<td>".$msg['username']."</td>
				<td>".$msg['maildate']."</td>
				<td>".$msg['mailstatus']." ( ".$msg['my_box']." / ".$msg['to_box']." )</td>
				<td><a href=\"javascript:void(0);\" onclick=\"PreviewWin('inc/pops/pop_monitor.php?t=1&id=".$msg['mailnum']."');\"><img src='inc/images/icons/view.gif'></a></td>
			</tr>";
		$count++;
	}

	
	return $count;
	
}

function MakeFakeMembers($value){

	global $DB;

	include("inc/class/member_generate.php");
GenerateData($value);
	 
}
############################################################
#################### TEMPLATE   ############################
require_once "layout.php";
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/members.php";

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