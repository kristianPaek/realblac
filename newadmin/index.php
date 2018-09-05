<?
$loginSet=1;
require_once "inc/config.php";
require_once subd . "inc/config.php";

$_SESSION['trial_startdate'] = DATESETUP;

############################################################
#################### OPERATIONS ############################
if(isset($_POST['do'])){ 

	switch ($_POST['do']) {
		
			case "login":	  {
			
							## CHECK ADMIN LOGIN DETAILS
							$lerror=0;			

								if(isset($_POST['license'])){
									
									// CHECK NEWSLY ENTERED LICENSE KEY
									$CanContinue = CheckLicense($_POST['license']);									
										
								}else{
									
									// CHECK EXISTING LICENSE KEY
									$CanContinue = CheckLicense(KEY_ID);
										
								}
				
							## stop blank logins
							if( ($_POST['username'] =="" || $_POST['password'] =="") && ($_POST['username'] !=ADMIN_USERNAME && $_POST['password'] !=ADMIN_PASSWORD) ){

								$CanContinue="no";

							}


							if( (!isset($CanContinue) || $CanContinue !="no") && ($_POST['username'] ==ADMIN_USERNAME && $_POST['password'] ==ADMIN_PASSWORD) || (CheckAdmin($_POST) ==1) ){							
							
							if($_POST['username'] ==ADMIN_USERNAME && $_POST['password'] ==ADMIN_PASSWORD){
							
								// SUPER USER SESSION DETAILS
								$_SESSION['admin_lang'] = $_POST['language'];
								$_SESSION['admin_super_user'] = "yes";
								$_SESSION['admin_alerts'] ="yes";
								$_SESSION['admin_name'] = "Admin";
								$_SESSION['admin_email'] = ADMIN_EMAIL;
								$_SESSION['admin_access_level']=array('1','2','3','4','5','6','7','8','9');
							}
									
									
									
									## CHECK THE LOGIN DETAILS
									$lerror =1;
									
									
									
									if($CanContinue =="ok" && isset($_POST['license']) ){
											
											if(KEY_ID != $_POST['license']){
											
												UpdateLicense(KEY_ID, $_POST['license']); 
												
											}
											
									}elseif($CanContinue =="ok"){
									
										// LOGIN WAS GOOD
										
										//die("login good!".$CanContinue);
									
									}else{
											// LICENSE IS INCORRECT, RESET THE CONFIG AND ASK FOR A NEW KEY
											ResetConfig();											
									}
									
									
									///////////////////////////////////////////////////////

									## ADMIN LOGIN
									if($CanContinue =="ok"){
										 
											## MAKE ADMIN SESSIONS
											if(!isset($_SESSION['admin_level'])){ $_SESSION['admin_level']=1; }
											$_SESSION['admin_auth']	="yes";
										    
											// echo '<script>window.location.href = "http://realblacklove.com/Rbl2/meet/newadmin/index_updating.php";</script>';
											echo '<script>window.location.href = "http://localhost/realblac/newadmin/index_updating.php";</script>';
											exit();
									}
								
							}else{
							
								$CanContinue = "login details incorrect, please try again";
								
							}				
																				
														
			 }  break;
			 
			 case "password": {
			 
				 require_once ( 'inc/class/class_captcha.php' );
				 
				 if (eMeetingCap::Validate($_POST['sec_code'])) {
				 
								
								$ff = $DB->Row("SELECT * FROM members_admin WHERE email = ( '".strip_tags($_POST['email'])."' ) LIMIT 1"); 
								if( ( !empty($ff) ) || ( $_POST['email'] ==ADMIN_EMAIL) ){
								
									if($_POST['email'] ==ADMIN_EMAIL){
										$em_user = ADMIN_USERNAME;
										$em_pass = ADMIN_PASSWORD;
									}else{								
										$em_user = $ff['username'];
										$em_pass = $ff['password'];			
									}
									## send email 
									$message = "Your admin area login details are: <br>";
									$message .= "<p> Username: ".$em_user."</p>";
									$message .= "<p> Password: ".$em_pass."</p>";
									$subject = "eMeeting Admin Details";
									SendMail(strip_tags($_POST['email']), $subject, $message);

									$CanContinue = "Your login details have been sent.";
								
							}else{
								
								$CanContinue = "The email address you entered is invalid";
							
							}			
							
				} else { $CanContinue = 'Invalid code entered';	}
			 $_REQUEST['p']=1;
			 } break;
		}
}
############################################################
#################### FUNCTIONS #############################


function CheckAdmin($data){
	
	global $DB;
	$result = $DB->Row("Select id, email, access_level, fullname, icon, admin_alerts, logincount FROM members_admin WHERE username = ( '".strip_tags($data['username'])."' ) AND password = ( '".strip_tags($data['password'])."' ) LIMIT 1");
	
	if(!empty($result)){
		
		$_SESSION['admin_lang'] = $data['language'];

		
		## BUILD ACCESS LEVEL FOR MODERATORS
		$access_data = explode("*",$result['access_level']);
		$access_array = array();		

		foreach($access_data as $value){	
			if($value !=""){
				array_push($access_array,$value);
			}
		}

		$_SESSION['admin_access_level'] = $access_array;
		$_SESSION['admin_name']	= $result['fullname'];
		$_SESSION['admin_icon']	= $result['icon'];
		$_SESSION['admin_id']	= $result['id'];
		$_SESSION['admin_email']	= $result['email'];
		$_SESSION['admin_alerts']	= $result['admin_alerts'];
		$_SESSION['logincount']	= $result['logincount'];
		$_SESSION['admin_super_user'] = "no";
		$_SESSION['admin_ip'] = substr($_SERVER['REMOTE_ADDR'], 0, strrpos($_SERVER['REMOTE_ADDR'],"."));
		$DB->Insert("UPDATE members_admin SET last_login=NOW(), ip='".$_SESSION['admin_ip']."', logincount=logincount+1 WHERE id=".$result['id']." LIMIT 1");
		// UPDATE LAST LOGGED
		return 1;
	}else{
		return 0;
	}

}

function GetAdminLangs(){

 $ext = array("php");
 $files = array();
 $ReturnString="";
 
 $HandlePath ="inc/langs/";
 if($handle1 = opendir($HandlePath)) {
 while(false !== ($file = readdir($handle1))){
 for($i=0;$i<sizeof($ext);$i++){
  if(strstr($file, ".".$ext[$i])){
  $file = str_replace(".php","",$file);
  if($file =="english"){
  $ReturnString .="<option value='".$file."' selected>".$file."</option>";
  }else{
  	$ReturnString .="<option value='".$file."'>".$file."</option>";
}
  
	}
   }
 }}
 return $ReturnString;
}
############################################################
#################### TEMPLATE   ############################
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><title>Admin Area Login</title>
<link href="inc/css/eMeetingStyles_Login.css" rel="stylesheet" type="text/css">

</head><body>

	
<div class="boxTop"></div>
<div class="boxMain">

	<div class="b1"><img src="inc/images/spacer.gif" alt="" height="1" width="1"></div><div class="b2"><img src="inc/images/spacer.gif" alt="" height="1" width="1"></div><div class="b3"><img src="inc/images/spacer.gif" alt="" height="1" width="1"></div><div class="b4"><img src="inc/images/spacer.gif" alt="" height="1" width="1"></div>
	<div class="bar">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr>
				<td valign="bottom"><h2><?=$admin_login[1] ?></h2></td>
				<td align="right"><img src="inc/images/spacer.gif" alt="" height="35" width="150"></td>
			</tr>
		</tbody></table>
	</div>
	<?php if(isset($CanContinue )){ print "<div id='messages'><span class='message-good'>".$CanContinue."</span></div>" ; } ?>
	<div class="col_left">
		
		<form action="index.php" method="post" name="login_form" class="no_padding">
	  
		
		<?php if(isset($_REQUEST['p'])){ ?>
		<input type="hidden" name="do" value="password" class="hidden">
		<div id="form_forgot">
			<p><?=$admin_login[2] ?></p>
			
			<label for="email"><?=$admin_login[3] ?>:</label><input name="email" id="email" style="width: 170px;" maxlength="255" type="text"><br>
			<label for="email"><?=$admin_login[4] ?>:</label>
			<input name="sec_code" id="sec_code" style="width: 170px;" maxlength="255" type="text"><br>
			<label></label><img src="inc/pops/pop_cap_img.php" width="110" height="30" />
			<label>&nbsp;</label><br>
			<input name="Submit" value="<?=$admin_login[5] ?>" class="submit_but" type="submit">			
			<label>&nbsp;</label>
		</div>

		<?php }else{ ?>
		<input type="hidden" name="do" value="login" class="hidden">
		<div id="form_login" style="display: block;">
			<p><?=$admin_login[6] ?></p>						
			<label for="username"><?=$admin_login[7] ?>:</label><input name="username" id="username" style="width: 170px;" maxlength="50" type="text"><br>			
			<label for="password"><?=$admin_login[8] ?>:</label><input name="password" id="password" style="width: 170px;" maxlength="50" type="password"><br>
			<?php if(KEY_ID =="" || (isset($lerror) && $lerror==1)){ ?>
			<label for="username"><?=$admin_login[9] ?>:</label><input name="license" id="license" style="width: 170px;" maxlength="50" type="text"><br>
			<?php } ?>
			<label for="country"><?=$admin_login[10] ?>:</label> <select name="language" style="margin-left:3px;"><?=GetAdminLangs() ?></select><br>	
			<label>&nbsp;</label>
			<input name="Submit" value="<?=$admin_login[11] ?>" class="submit_but" type="submit"><br>

		  </div>
		
		<?php } ?>
		
		<input name="forgotten" id="forgotten" value="" type="hidden">
		</form>
		
	</div>
	
	<div class="col_right">
		
		<div class="box_secure">
			<img src="inc/images/login/lock.png" alt="" height="19" width="14">
			<?=$admin_login[12] ?>: <?=$_SERVER['REMOTE_ADDR'] ?> <br> <a href="index.php?p=f"><?=$admin_login[13] ?></a>

	  </div>

	</div>
	<br class="clearb">

</div>
<div class="boxBot"></div>
<center style="font-size:12px; padding:20px; color:#cccccc;">Version <?=VERSION ?></center>
	
</body></html>