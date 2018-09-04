<?php if(!isset($_REQUEST['p']) || $_REQUEST['p'] == ""){ ?>
 
 
<div id="TableViewer"></div>

 


<?php }elseif($_REQUEST['p'] == "super"){ ?>


	<form method="post" action="admins.php">
	<input name="do" type="hidden" value="super" class="hidden">
	<input name="p" type="hidden" value="super" class="hidden">
     <ul class="form"><div class="box_body">
					
        <li><label><?=$admin_admin[2] ?>:</label><input name="username" class="input" type="text" id="s1" value="<?=ADMIN_USERNAME ?>" size="30" maxlength="100"></li>        
        <li><label><?=$admin_admin[3] ?>:</label><input name="password"  class="input" type="password" id="s2" value="<?=ADMIN_PASSWORD ?>" size="30" maxlength="100"></li>                
        <li><label><?=$admin_admin[4] ?>:</label><input name="email" class="input" type="text" id="s3" value="<?=ADMIN_EMAIL ?>" size="40" maxlength="255"></li>     
        <li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li> 
        
		</div></ul>
</form>
<?php 	$strSql = sprintf("SELECT * FROM authorise WHERE authorise_id = '1' LIMIT 1");
                	$mail_room = $DB->Row($strSql); 
//print_r($mail_room['username']);
?>
<form method="post" action="admins.php">
	<input name="authorise" type="hidden" value="super" class="hidden">
	<input name="p" type="hidden" value="super" class="hidden">
	<div style="text-align: center;font-size: 23px;font-weight: bold;padding-bottom: 7px;">Authorize.Net Details</div>	
        <ul class="form"><div class="box_body">
					
        <li><label>User Name:</label><input name="authusername" class="input" type="text" id="s1" value="<? echo base64_decode($mail_room['username']);  ?>" size="30" maxlength="100"></li>        
        <li><label>Password:</label><input name="authpassword"  class="input" type="password" id="s2" value="<? echo base64_decode($mail_room['password']);  ?>" size="30" maxlength="100"></li>
        <li><input type="submit" value="submit" class="MainBtn"></li> 
		</div></ul>
</form>	  
<?php }elseif($_REQUEST['p'] == "manage"){ ?>
  
<?php if(!isset($_REQUEST['eid'])){ ?> 

<div id="messages">
			  <div class="message-bad" id="main-message-bad">
			  <a class="dismiss-message" href="#" onclick="Effect.Fade('main-message-bad', { duration : 0.5 });; return false;"></a>
			  To add new moderators please first select a member from the <a href="members.php">members list.</a>
			</div>
			
		</div>


 <?php }else{ ?>

<form method="post" action="admins.php">
<input name="page" type="hidden" value="admins" class="hidden">
<input type="hidden" name="fullname" value="<?php if(isset($data)){ print $data['username']; } ?>">
<?php if(isset($_REQUEST['eid'])){ $data = GetAdminEdit($_REQUEST['eid']); ?>
<input type="hidden" name="eid" value="<?=$_REQUEST['eid'] ?>" class="hidden">
<?php } ?>


<input name="do" type="hidden" value="addadmin" class="hidden">        
<ul class="form"><div class="box_body">
<!--
<li><label><?=$admin_admin[2] ?>:</label>
<div class="tip">This is the website username of the moderator. </div>
<input  id="uname" autocomplete="off" class="input" name="fullname" type="text" value="<?php if(isset($_GET['user'])){ print $_GET['user']; } ?><?php if(isset($data)){ print $data['fullname']; } ?>" size="30" maxlength="100">
</li>
-->
<script type="text/javascript">
		new Ajax.Autocompleter('uname','UpdateSearch','<?=subd ?>inc/exe/Responce/response.php', { tokens: ','} );
	</script>
 

<li><div class="tip"><label>Admin Area Access:</label>You can allow moderators to login to your admin area and help manage the admin side of things. If you would like todo this please create a new username and password below otherwise leave them blank.</div>

<label><?=$admin_admin[2] ?>:</label>
<input class="input" name="f1xx" type="text" value="<?php if(isset($data)){ print $data['username']; } ?>" size="30" maxlength="100" disabled style="background:red;"><div class="tip">This cannot be edited, its required as the member uses the same username to login to the admin as they do the members area.</div></li>
<input type="hidden" name="f1" value="<?php if(isset($data)){ print $data['username']; } ?>">
<li><label><?=$admin_admin[3] ?>:</label><input class="input" name="f2" type="text" value="<?php if(isset($data)){ print $data['password']; } ?>" size="30" maxlength="100"></li>
<li><label><?=$admin_admin[7] ?>:</label>
<li><label><?=$admin_admin[4] ?>: </label>
<div class="tip">This email address will be used when sending admin alters or website notifications.</div>
<input class="input" name="f3" type="text" value="<?php if(isset($data)){ print $data['email']; } ?>" size="40" maxlength="255"></li>

<div class="tip">Select the access level you would like this admin to have.HoldCTRL to select more than one.</div>
<?
if(isset($data)){ 

$access_data = explode("*",$data['access_level']);
$access_array = array();
	foreach($access_data as $value){
		
		array_push($access_array,$value);

	}

}
?>
        <select name="access[]" size="1"  multiple class="input" style="height:250px; width:250px">
 
          <option value="2" <?php if(isset($data) && in_array("2",$access_array) ){ print "selected"; } ?>><?=$admin_admin[9] ?></option>
          <option value="3" <?php if(isset($data) && in_array("3",$access_array) ){ print "selected"; } ?>><?=$admin_admin[10] ?></option>
          <option value="4" <?php if(isset($data) && in_array("4",$access_array) ){ print "selected"; } ?>><?=$admin_admin[11] ?></option>
          <option value="5" <?php if(isset($data) && in_array("5",$access_array) ){ print "selected"; } ?>><?=$admin_admin[12] ?></option>
          <option value="6" <?php if(isset($data) && in_array("6",$access_array) ){ print "selected"; } ?>><?=$admin_admin[13] ?></option>
		  <option value="7" <?php if(isset($data) && in_array("7",$access_array) ){ print "selected"; } ?>><?=$admin_admin[14] ?></option>
 <option value="8" <?php if(isset($data) && in_array("8",$access_array) ){ print "selected"; } ?>>Plugins</option>
        </select></li>
<li><label><?=$admin_admin[15] ?></label>
  <table width="500">
    <tr>
      <td><img src="inc/images/avatars/1.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/2.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/3.gif" width="50" height="50"></td>
	   <td><img src="inc/images/avatars/4.gif" width="50" height="50"></td>
	    <td><img src="inc/images/avatars/5.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/6.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/7.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/8.gif" width="50" height="50"></td>
    </tr>
    <tr>
      <td><input name="icon" type="radio" value="1.gif" checked></td>
      <td><input name="icon" type="radio" value="2.gif"></td>
      <td><input name="icon" type="radio" value="3.gif"></td>
	  <td><input name="icon" type="radio" value="4.gif"></td>
	  <td><input name="icon" type="radio" value="5.gif"></td>
      <td><input name="icon" type="radio" value="6.gif"></td>
      <td><input name="icon" type="radio" value="7.gif"></td>
      <td><input name="icon" type="radio" value="8.gif"></td>
    </tr>
    <tr>
      <td><img src="inc/images/avatars/8.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/10.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/11.gif" width="50" height="50"></td>
	   <td><img src="inc/images/avatars/12.gif" width="50" height="50"></td>
	    <td><img src="inc/images/avatars/13.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/14.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/15.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/16.gif" width="50" height="50"></td>
    </tr>
    <tr>
      <td><input name="icon" type="radio" value="9.gif"></td>
      <td><input name="icon" type="radio" value="10.gif"></td>
      <td><input name="icon" type="radio" value="11.gif"></td>
	  <td><input name="icon" type="radio" value="12.gif"></td>
	  <td><input name="icon" type="radio" value="13.gif"></td>
      <td><input name="icon" type="radio" value="14.gif"></td>
      <td><input name="icon" type="radio" value="15.gif"></td>
      <td><input name="icon" type="radio" value="16.gif"></td>
    </tr>
  </table>
</li>
</div></ul><ul class="form"><div class="box_body">



<li><label>Website Moderator Access:</label>
<div class="tip">
Select the options below that you wish this moderator to be able to perform.
</div></li>

<li><label>Live Edit: </label>
<div class="tip">This option allows the moderator to edit member content live on the website.</div>
 
<select class="input"  name="LiveEdit" style="width:100px;"><option value="yes" <?php if(isset($data) && $data['liveEdit'] =="yes"){ print "selected"; } ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(isset($data) && $data['liveEdit'] =="no"){ print "selected"; } ?>><?=$admin_selection[2] ?></option></select>
</li>

<li><label>Live Delete: </label>
<div class="tip">This option allows the moderator to delete profiles, adverts, groups etc live on the website.</div>
<select class="input"  name="LiveDelete" style="width:100px;"><option value="yes" <?php if(isset($data) && $data['liveDelete'] =="yes"){ print "selected"; } ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(isset($data) && $data['liveDelete'] =="no"){ print "selected"; } ?>><?=$admin_selection[2] ?></option></select>

</li>

<li><label>Live Approve: </label>
<div class="tip">This option allows the moderator to approve profiles, adverts, groups etc live on the website.</div>
<select class="input"  name="LiveEmail" style="width:100px;"><option value="yes" <?php if(isset($data) && $data['liveEmail'] =="yes"){ print "selected"; } ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(isset($data) && $data['liveEmail'] =="no"){ print "selected"; } ?>><?=$admin_selection[2] ?></option></select>
 
</li>

</div></ul><ul class="form"><div class="box_body">
<li><label>Moderator Alerts:</label>
<div class="tip">
Select the options below to determin which website alerts the moderator will recieve.
</div></li>
<li><label><?=$admin_admin[17] ?>: </label><select class="input"  name="alerts" style="width:100px;"><option value="yes" <?php if(isset($data) && $data['alerts'] =="yes"){ print "selected"; } ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(isset($data) && $data['alerts'] =="no"){ print "selected"; } ?>><?=$admin_selection[2] ?></option></select></li>
<li><label><?=$admin_admin[18] ?>: </label><select  class="input" name="admin_alerts" style="width:100px;"><option value="yes" <?php if(isset($data) && $data['admin_alerts'] =="yes"){ print "selected"; } ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(isset($data) && $data['admin_alerts'] =="no"){ print "selected"; } ?>><?=$admin_selection[2] ?></option></select></li>

<?php if(isset($_REQUEST['eid'])){ ?> <li><input type="submit" class="MainBtn" id="submit" value="<?=$admin_button_val[8] ?>"></li> <?php } ?>

</div></ul>
</form>
<?php } ?>
<?php }elseif($_REQUEST['p'] == "pref" && isset($_SESSION['admin_id']) ){ ?>

<form method="post" action="admins.php">
<input name="page" type="hidden" value="admins" class="hidden">

<?php $data = GetAdminEdit($_SESSION['admin_id']); ?>
<input type="hidden" name="eid" value="<?=$_SESSION['admin_id'] ?>" class="hidden">

<input name="do" type="hidden" value="addadmin" class="hidden">        
<ul class="form"><div class="box_body">
<li><label><?=$admin_admin[6] ?>:</label><input name="fullname" type="text" value="<?php if(isset($data)){ print $data['fullname']; } ?>" size="30" maxlength="100"></li>
<li><label><?=$admin_admin[2] ?>:</label><input name="f1" type="text" value="<?php if(isset($data)){ print $data['username']; } ?>" size="30" maxlength="100"></li>
<li><label><?=$admin_admin[3] ?>:</label><input name="f2" type="text" value="<?php if(isset($data)){ print $data['password']; } ?>" size="30" maxlength="100"></li>
<li><label><?=$admin_admin[4] ?>: </label><input name="f3" type="text" value="<?php if(isset($data)){ print $data['email']; } ?>" size="40" maxlength="255"></li>
<li><label><?=$admin_admin[7] ?>:</label><input type="hidden" name="access_level" value="<?=$data['access_level'] ?>">
        <select name="gone" disabled>
          <option value="1" <?php if(isset($data) && $data['access_level'] ==1){ print "selected"; } ?>><?=$admin_admin[8] ?></option>
          <option value="2" <?php if(isset($data) && $data['access_level'] ==2){ print "selected"; } ?>><?=$admin_admin[9] ?></option>
          <option value="3" <?php if(isset($data) && $data['access_level'] ==3){ print "selected"; } ?>><?=$admin_admin[10] ?></option>
          <option value="4" <?php if(isset($data) && $data['access_level'] ==4){ print "selected"; } ?>><?=$admin_admin[11] ?></option>
          <option value="5" <?php if(isset($data) && $data['access_level'] ==5){ print "selected"; } ?>><?=$admin_admin[12] ?></option>
          <option value="6" <?php if(isset($data) && $data['access_level'] ==6){ print "selected"; } ?>><?=$admin_admin[13] ?></option>
		  <option value="7" <?php if(isset($data) && $data['access_level'] ==6){ print "selected"; } ?>><?=$admin_admin[14] ?></option>
        </select></li>
<li><label><?=$admin_admin[15] ?></label>
  <table>
    <tr>
      <td><img src="inc/images/avatars/1.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/2.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/3.gif" width="50" height="50"></td>
	   <td><img src="inc/images/avatars/4.gif" width="50" height="50"></td>
	    <td><img src="inc/images/avatars/5.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/6.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/7.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/8.gif" width="50" height="50"></td>
    </tr>
    <tr>
      <td><input name="icon" type="radio" value="1.gif" checked></td>
      <td><input name="icon" type="radio" value="2.gif"></td>
      <td><input name="icon" type="radio" value="3.gif"></td>
	  <td><input name="icon" type="radio" value="4.gif"></td>
	  <td><input name="icon" type="radio" value="5.gif"></td>
      <td><input name="icon" type="radio" value="6.gif"></td>
      <td><input name="icon" type="radio" value="7.gif"></td>
      <td><input name="icon" type="radio" value="8.gif"></td>
    </tr>
    <tr>
      <td><img src="inc/images/avatars/8.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/10.gif" width="50" height="50"></td>
      <td><img src="inc/images/avatars/11.gif" width="50" height="50"></td>
	   <td><img src="inc/images/avatars/12.gif" width="50" height="50"></td>
	    <td><img src="inc/images/avatars/13.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/14.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/15.gif" width="50" height="50"></td>
		<td><img src="inc/images/avatars/16.gif" width="50" height="50"></td>
    </tr>
    <tr>
      <td><input name="icon" type="radio" value="9.gif"></td>
      <td><input name="icon" type="radio" value="10.gif"></td>
      <td><input name="icon" type="radio" value="11.gif"></td>
	  <td><input name="icon" type="radio" value="12.gif"></td>
	  <td><input name="icon" type="radio" value="13.gif"></td>
      <td><input name="icon" type="radio" value="14.gif"></td>
      <td><input name="icon" type="radio" value="15.gif"></td>
      <td><input name="icon" type="radio" value="16.gif"></td>
    </tr>
  </table>
</li>
<li><label><?=$admin_admin[17] ?>: </label><select name="alerts" style="width:100px;"><option value="yes" <?php if(isset($data) && $data['alerts'] =="yes"){ print "selected"; } ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(isset($data) && $data['alerts'] =="no"){ print "selected"; } ?>><?=$admin_selection[2] ?></option></select></li>
<li><label><?=$admin_admin[18] ?>: </label><select name="admin_alerts" style="width:100px;"><option value="yes" <?php if(isset($data) && $data['admin_alerts'] =="yes"){ print "selected"; } ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(isset($data) && $data['admin_alerts'] =="no"){ print "selected"; } ?>><?=$admin_selection[2] ?></option></select></li>

<li><input type="submit" class="MainBtn" id="submit" value="<?=$admin_button_val[8] ?>"></li>

</div></ul>
</form>

<?php }elseif($_REQUEST['p'] == "email"){ ?>

<div id="TableViewer"></div>
 

<?php }elseif($_REQUEST['p'] == "compose"){ ?>
<p></p>
<form method="post" action="admins.php">
<input name="page" type="hidden" value="compose" class="hidden">
<input name="do" type="hidden" value="send" class="hidden">   
<input name="p" type="hidden" value="compose" class="hidden">

<ul class="form"><div class="box_body">
<li><label>Username</label><input name="send_to" type="text" size="40" class="input" value="<?php if(isset($_GET['Username'])){ print $_GET['Username']; } ?>">
<div class="tip">Enter "all" to send to all members.</div></li>
<li><label>Subject</label><input name="subject" type="text" size="65" class="input" value="<?php if(isset($_GET['msg_subject'])){ print $_GET['msg_subject']; } ?>">
</li>
<li><?=displayTextArea() ?></li>

<li><input type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>"></li>
</div></ul>

</form>

<?php }elseif($_REQUEST['p'] == "email_read"){ $msgdata = GetMsgData($_GET['id']); ?>


<table width="600"  border="0">
  <tr>
    <td width="210"><a href="index.php?dll=profile&pId=<?=$msgdata[1]['senderid']; ?>"><img src="<?=$msgdata[1]['image']; ?>" style="border:1px solid #333; padding:5px;"></a></td>
    <td width="380" valign="top"><h2><?=$msgdata[1]['subject']; ?></h2> <p><?=$msgdata[1]['message']; ?></p></td>
  </tr>
</table>

		
			<input value="Reply" type="button" onclick="javascript:location.href='admins.php?p=compose&Username=<?=$msgdata[1]['username']; ?>&msg_subject=RE:<?=str_replace("'", "",$msgdata[1]['subject']); ?>'">
 	
			
<?php } ?>
