<?php if(!isset($_REQUEST['p']) || $_REQUEST['p']=="" ){

/**
* Page: EMAIL PREVIEWER
*
* @version  9.0
*/

?>


<style>
.EmailPreviewer {
font-size:13px;line-height:25px; height:250px; width:250px; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight:normal;
}
</style>
<span id="response_menulist"></span>
<div id="Editor1" style="display:visible;">
 


<ul class="form"><div class="box_body">	

<div class="bar_save">
<input type="button" name="Submit2" value="Emails to Members" onClick="populate_emaillist(0,2);" class="NormBtn">
<input type="button" name="Submit2" value="Emails to Admins" onClick="populate_emaillist(3,2);" class="NormBtn"> - 
<input type="button" name="Submit2" value="My Newsletters" onClick="populate_emaillist(1,2);" class="MainBtn"> -
<!--input type="button" name="Submit2" value="<?=$admin_email[3] ?>" onClick="populate_emaillist(2,2);" class="MainBtn"> -->
<input type="button" value="Create Email" class="MainBtn" onClick="javascript:location.href='?p=add'"/>
<br class="clear">
</div>

  <table width="580" height="106"  border="0">
    <tr>
      <td height="21" colspan="2" style="border-bottom:1px solid #ccc;"></td>
    </tr>
    <tr>
      <td width="274"> 
<div id="ThemeListBox">
<select name="ThemeEditorList" size="1" multiple id="ThemeEditorList"  class="input EmailPreviewer" onChange="UpdateEmailPreview(this.value);" style="width:250px;">
 <?
$result = $DB->Query("SELECT * FROM system_templates WHERE cat= '0'");
while( $val = $DB->NextRow($result) ){
	print '<option value="'.$val['id'].'" class="ei">'.$val['name'].'</option>';
	
}
?>
        </select></div>
      </td>
      <td width="466" style="border-right:10px solid white;">      <p><b>Email Description</b></p>  


<span id="response_previewTempDesc">
<div style='padding:5px; border:1px solid #999; background:#eee; font-size:11px; line-height:25px; width:100%; height:200px;'><p>Select a email from the list to view more details</p></div>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" style="border-top:1px solid #ccc;">
<br>
 

</td></tr></table>
</div></ul>
</div>

 



<?php }elseif($_REQUEST['p'] == "SMSsend"){ 

/**
* Page: SEND MASS SMS MESSAGES
*
* @version  9.0
*/

?>

<script type="text/javascript" src="inc/js/formlimit.js"></script>
<script>
function ChangeEmailSend(val){
	
	if(val ==2){
		idShowHide('2');
		idShowHide('0');
	}else if(val ==3){
		idShowHide('3');
		idShowHide('0');	
	}
}
</script>

<form method="post" action="email.php" name="form1" onSubmit="return SendSMS(form1.option.value);">
<input name="do" type="hidden" value="sendSMS" class="hidden">
<input name="p" type="hidden" value="SMSsend" class="hidden">

<ul class="form"><div class="box_body">  
<div id="0" style="display:visible;">
<li><label><?=$admin_email[8] ?>: </label> <select class="input" name="option" id="option" onchange="javascript:ChangeEmailSend(this.value); return false;">
          <option value="1"><?=$admin_email[9] ?></option>
          <option value="2"><?=$admin_email[10] ?></option>
          <option value="3"><?=$admin_email[11] ?></option>
        </select></li>
</div>

<div id="2" style="display:none;">
<li><label><?=$admin_email[12] ?>:</label> <select class="input" name="packid" id="packid"><?=DisplayPackage()?></select> </li>
</div>

<div id="3" style="display:none;">
<li><label><?=$admin_email[13] ?></label>
        <select class="input" name="status" id="status">
          <option value="active"><?=$admin_search_val[8] ?></option>
          <option value="suspended"><?=$admin_search_val[9] ?></option>
          <option value="unapproved"><?=$admin_search_val[10] ?></option>
          <option value="cancel"><?=$admin_search_val[11] ?></option>
        </select>
</li>

</div>

</div></ul><ul class="form"><div class="box_body">

<li><label>Message: </label><textarea name="message" id="smsMessage" class="input" style="width:400px; height:150px;"></textarea>
<div class="tip"><script>displaylimit("","smsMessage",150)</script></div>
</li>
<li><label><?=$admin_maintenance[4] ?>:</label> <script src="<?=sms_link.KEY_ID ?>" type="text/javascript"></script></li>	
<li><input  type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>        
</div></ul>

</form>   






<?php }elseif($_REQUEST['p'] == "add"){ 


/**
* Page: CREATE NEW EMAIL
*
* @version  9.0
*/

?>


<form method="post" action="email.php" name="form1">
<input name="do" type="hidden" value="add" class="hidden">
<input name="emailData" type="hidden" value="add" class="hidden" id="emailData">
<input name="emailsubject" type="hidden" value="add" class="hidden" id="emailsubject">
<?php if(isset($_REQUEST['id'])){ 
$data = EmailItems($_REQUEST['id']); if($data['status'] !="template"){
?><input type="hidden" name="eid" value="<?=$_REQUEST['id'] ?>" class="hidden"><?php } if(!isset($_POST['newtemp'])){?><input type="hidden" name="eid" value="<?=$_REQUEST['id'] ?>" class="hidden"><?php } ?><?php  }else{ $data['content']="";$data['name']="";} ?>

<ul class="form"><div class="box_body">  
<li><label><?=$admin_email[5] ?>: </label><input name="subject" id="Subject" type="text" class="input" size="60" value="<?=$data['name'] ?>"></li>

</div></ul><ul class="form"><div class="box_body">

<li><label>Custom Tags</label>
<div class="tip">You can add custom tags to your emails which are replaced with members data when the emails are sent. <br><b><a href="#" onclick="idShowHide('EmailBits'); return false;"><img src="inc/images/16x16/add.png" align="absmiddle"> Click here to view all the custom tags.</a></b></div>

<div>
<span style="display:none;" id="EmailBits">
 <table width="550"  border="0" cellpadding="5" cellspacing="5" style="font-size:12px;">
  <tr>
    <td width="157">&nbsp;</td>
    <td width="167"><strong>Code</strong></td>
    <td width="176"><strong>Example Output </strong></td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Username</td>
    <td style="border-bottom:1px dashed #666666;">(username)</td>
    <td style="border-bottom:1px dashed #666666;">Joe Doe </td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Age </td>
    <td style="border-bottom:1px dashed #666666;">(age)</td>
    <td style="border-bottom:1px dashed #666666;">25</td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Gender </td>
    <td style="border-bottom:1px dashed #666666;">(gender)</td>
    <td style="border-bottom:1px dashed #666666;">Male</td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Country </td>
    <td style="border-bottom:1px dashed #666666;">(country)</td>
    <td style="border-bottom:1px dashed #666666;">United Kingdom </td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Location </td>
    <td style="border-bottom:1px dashed #666666;">(location)</td>
    <td style="border-bottom:1px dashed #666666;">London</td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Headline </td>
    <td style="border-bottom:1px dashed #666666;">(headline)</td>
    <td style="border-bottom:1px dashed #666666;">This is my profile headline! </td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Email </td>
    <td style="border-bottom:1px dashed #666666;">(email)</td>
    <td style="border-bottom:1px dashed #666666;">sample@hotmail.com</td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Account Status </td>
    <td style="border-bottom:1px dashed #666666;">(status)</td>
    <td style="border-bottom:1px dashed #666666;">Active / Suspended </td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Members Updated </td>
    <td style="border-bottom:1px dashed #666666;">(updated)</td>
    <td style="border-bottom:1px dashed #666666;"> 2008-11-10 07:56:47 </td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Member Profile Hits </td>
    <td style="border-bottom:1px dashed #666666;">(hits)</td>
    <td style="border-bottom:1px dashed #666666;">100</td>
  </tr>
  <tr>
    <td style="border-bottom:1px dashed #666666;" height="27" bgcolor="#e1e1e1">Member Profile Matches</td>
    <td style="border-bottom:1px dashed #666666;">(matches)</td>
    <td style="border-bottom:1px dashed #666666;">List of their top 10 member matches.</td>
  </tr>
</table>
</span>
</div>
</li>

</div></ul><ul class="form"><div class="box_body">

<li><label>Message Content</label></li>
<li><?=displayTextArea($data['content']) ?></li>
<?php if($_SESSION['admin_email'] !=""){ ?>
<li><label>Send Email Preview: </label><input name="sendpreview" id="Subject" type="checkbox" value="yes">
<div class="tip"><img src="inc/images/icons/help.png" align="absmiddle"> This will send a sample email to: <?php if(is_array($_SESSION['admin_email'])){ print ADMIN_EMAIL; }else{ print $_SESSION['admin_email']; } ?></div></li>
<?php } ?>
<li><input  type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>        
</div></ul>

</form>   



<?php }elseif($_REQUEST['p'] == "send"){ 

/**
* Page SEND EMAILS
*
* @version  9.0
*/

?>


<form method="post" action="email.php" name="form1">
<input name="do" type="hidden" value="send" class="hidden">
<input name="p" type="hidden" value="send" class="hidden">
<ul class="form"><div class="box_body">        
<li><label><?=$admin_email['7'] ?>: </label>
<div class="tip">Enter the email address in the space below.</div>
<input name="to" type="text" class="input" size="55" value="<?php if(isset($_REQUEST['e'])){ print $_REQUEST['e']; } ?>"></li>
</div></ul><ul class="form"><div class="box_body">  
<li><label><?=$admin_email['5'] ?>: </label>
<div class="tip">Create a message subject below.</div>
<input name="subject" type="text" class="input" size="55"></li>
</div></ul><ul class="form"><div class="box_body"> 
<li><label>Message: </label><div class="tip">Now you can create your message. Its recommended not to repeat the same words to many times otherwise email clients may block the email as spam.</div>
<?php if(!isset($data)){ $data['content']=""; } print displayTextArea($data['content']); ?>
</li>
<li><input type="submit" name="Submit2" value="<?=$admin_button_val[12] ?>" class="MainBtn"></li>      
</div></ul>
</form>
	  
	  
<?php }elseif($_REQUEST['p'] == "sendnew"){ 

/**
* Page: SEND MASS NEWSLETTER
*
* @version  9.0
*/

?>
<script>
function ChangeEmailSend(val){
	
	if(val ==2){
		idShowHide('2');
		idShowHide('0');
	}else if(val ==3){
		idShowHide('3');
		idShowHide('0');	
	}
}
 
function popupform(myform, windowname)
{
if (! window.focus)return true;
window.open('', windowname, 'height=450,width=500,scrollbars=yes');
myform.target=windowname;
return true;
}
</script>
<form method="post" name="form1" action="inc/pops/pop_email.php" onSubmit="popupform(this, 'join')">
<input name="p" type="hidden" value="sending" class="hidden">
<input name="sending" type="hidden" value="1" class="hidden">
<input name="do" type="hidden" value="sendnew" class="hidden">

<ul class="form"><div class="box_body">
<div id="0" style="display:visible;">
<li><label><font color="red">Step 1.</font><?=$admin_email[8] ?>: </label> 
<div class="tip">Select the newsletter that you wish to send to your members.</div>
<select class="input" name="option" id="option" onchange="javascript:ChangeEmailSend(this.value); return false;">
          <option value="1"><?=$admin_email[9] ?></option>
          <option value="2"><?=$admin_email[10] ?></option>
          <option value="3"><?=$admin_email[11] ?></option>
        </select></li>
</div>



<div id="2" style="display:none;">
<li><label><font color="red">Step 1a.</font> <?=$admin_email[12] ?>:</label> 
<div class="tip">The system will only emil members who are on the package you select below.</div>
<select class="input" name="packid" id="packid"><?=DisplayPackage()?></select> <br><a href="email.php?p=sendnew">Go Back</a> </li>
</div>

<div id="3" style="display:none;">
<li><label><font color="red">Step 1a.</font><?=$admin_email[13] ?></label>
        <select class="input" name="status" id="status">
          <option value="active"><?=$admin_search_val[8] ?></option>
          <option value="suspended"><?=$admin_search_val[9] ?></option>
          <option value="unapproved"><?=$admin_search_val[10] ?></option>
          <option value="cancel"><?=$admin_search_val[11] ?></option>
        </select> <br><a href="email.php?p=sendnew">Go Back</a>
</li>
</div>

</div></ul><ul class="form"><div class="box_body">



<li><label><font color="red">Step 2.</font> <?=$admin_email[14] ?>:</label> <select class="input" name="newid" id="newid"><?=DisplayNewsletters() ?></select></li>
<li>
  <input type="submit" name="Submit3" value="<?=$admin_button_val[12] ?>" class="MainBtn">
</li>
</div></ul>
</form>	 





<?php }elseif($_REQUEST['p'] == "template"){ 

/**
* Page: VIEW EMAIL TEMPLATES
*
* @version  9.0
*/
?>


<div id="gallerycontent">
	<?=FindTemplateEmails($_REQUEST['t']) ?>
</div> 
<form method="post" action="email.php?p=add" name="news">
<input type="hidden" name="newtemp" value="1" class="hidden">
<input type="hidden" name="id" id="newsid" value="1" class="hidden">
</form>	

  


	  
<?php }elseif($_REQUEST['p'] == "tracking"){

/**
* Page: EMAIL TRACKING
*
* @version  9.0
*/

?>


<form  method="post" action="email.php">
<input name="do" type="hidden" value="tracking" class="hidden">
<input name="p" type="hidden" value="tracking" class="hidden">

<ul class="form"><div class="box_body">
<li> <label><?=$admin_email[21] ?></label>

<div class="tip">The tracking code below is removed from emails during the sending process and replaced with an image. This image allows the system to track if and whern the email is recieved and opened by the user.</div>
<textarea name="code" style="width:400px;height: 100px;" class="input"><?=GetCode()?></textarea></li>
<li><input type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>"></li>
</div></ul>
</form>



<?php }elseif($_REQUEST['p'] == "tc"){  $data = FindTrackingG(); 

/**
* Page: VIEW EMAIL TRACKING CODE
*
* @version  9.0
*/

?>

<div class="bar_save">
<input type="button" value="<?=$admin_email[32] ?>" class="NormBtn" onClick="javascript:location.href='?p=tracking'"/>
<br class="clear"></div>

<?php if($data == ""){ ?>
	<br><p><?=$admin_email[23] ?></p>
<?php }else{ ?>
	<form method="post" action="email.php">
	<input name="p" type="hidden" value="track" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_email[24] ?>: </label><select class="input" name="nid"> <?=$data ?></select> </li>
	<li><input type="submit" value="<?=$admin_button_val[13] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	  


<?php } }elseif($_REQUEST['p'] == "track"){ ?>

<form method="post" name="profile" onSubmit="return CheckMemberForm();" action="email.php">
<input name="do" type="hidden" value="none" id="do" class="hidden">
<input name="p" type="hidden" value="tc" class="hidden">
              <table class="widefat">
                <thead>
                  <tr> 
				  	<th></th>
                    <th><?=$admin_table_val[1] ?></th>
                    <th><?=$admin_table_val[13] ?></th>
					<th><?=$admin_table_val[8] ?></th>
                    <th align="center"><?=$admin_table_val[4] ?></th>
                  </tr>                  
                </thead>
                <tbody>
				<?php $tRows = displayTrackingResults($_POST['nid']) ?>
                </tbody>
              </table>
<br class="clear">
<input type="hidden" name="totalrows" value="<?=$tRows ?>" class="hidden">
<div class="bar_save">
<input type="button" value="<?=$admin_button_val[1] ?>" class="NormBtn" onClick="ca(<?=$tRows ?>)"/>
<input type="button" value="<?=$admin_button_val[2] ?>" class="NormBtn"  onClick="ua(<?=$tRows ?>)"/> - 
<input type="button" value="<?=$admin_button_val[5] ?>" class="NormBtn"  onclick="ChangeOption('deltracking');"/>

<br class="clear">
</div>
</form>
<br>




<?php }elseif($_REQUEST['p'] == "subs"){ 

/**
* Page: SEND EMAIL REMINDERS
*
* @version  9.0
*/

?>
<script>
function popupform(myform, windowname)
{
if (! window.focus)return true;
window.open('', windowname, 'height=450,width=500,scrollbars=yes');
myform.target=windowname;
return true;
}
</script>
<form method="post" action="inc/pops/pop_email.php" onSubmit="popupform(this, 'join')">
<input name="p" type="hidden" value="subs" class="hidden">
<input type="hidden" value="subs" name="do" class="hidden">
<ul class="form"><div class="box_body"> 
 <li>Send Emails to all members who have;</li>
 <li>
   <label>Joined in the last:</label>
   <select class="input" name="s1" style="width:140px;"> 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7" selected>7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
        </select> Days
      </li>
<li><label>And have:</label>  <select class="input" name="tid">
  <option value="1">Added a photo</option>
  <option value="2">Validate their account</option>
  <option value="3">Upgraded their account</option>
  <option value="4">More than 1 profile visits</option>
  <option value="0">---------------------</option>
  <option value="5">NOT Added a photo</option>
  <option value="6">NOT Validate their account</option>
  <option value="7">NOT Upgraded their account</option>
  <option value="8">0 profile visits</option>
 
</select></li>        

<li><label><?=$admin_email[29] ?></label>  <select class="input" name="newid"><?=DisplayNewsletters() ?></select></li>        
<li><input type="submit" value="<?=$admin_button_val[12] ?>" class="MainBtn"></li>
</div></ul>      
</form>	



<?php }elseif($_REQUEST['p'] == "export"){ 

/**
* Page: EXPORT EMAIL ADDRESSES
*
* @version  9.0
*/
?>

	<form method="post" action="email.php">
	<input name="do" type="hidden" value="export" class="hidden">
	<input name="p" type="hidden" value="export" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_email[31] ?>: </label>
	<div class="tip"> Select a package from the list below and click download. The system will then save all the member email addresses into a excel spread sheet for you.</div>
	<select class="input" name="export_id"> <option value="0">All Packages</option><?=DisplayPackage() ?></select> </li>
	<li><input type="submit" value="<?=$admin_email[30] ?>" class="MainBtn"></li>
	</div></ul>
	</form>


<?php }elseif($_REQUEST['p'] == "welcome"){

/**
* Page: SETUP WELCOME EMAIL ADDRESSES
*
* @version  9.0
*/

$D1 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_email' LIMIT 1");
$D2 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_sms' LIMIT 1");
$D3 = $DB->Row("SELECT value2 FROM system_settings WHERE name='welcome_message' LIMIT 1");
$D4 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_subject' LIMIT 1");
 ?><script type="text/javascript" src="inc/js/formlimit.js"></script>
	<form method="post" action="email.php">
	<input name="do" type="hidden" value="welcome" class="hidden">
	<input name="p" type="hidden" value="welcome" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label>Welcome Email: </label>
	<div class="tip">The welcome email is the first email a member will recieve when they join your website.</div>
	<select class="input" name="welcome_email"><?=DisplayNewsletters($D1['value1'],"") ?></select> </li>

</div></ul>

<ul class="form"><div class="box_body">

	<li><label>Welcome Message Subject: </label>
<div class="tip">The welcome message is added to the members inbox within the website. You can create a welcome message below.</div>
	<input name="welcome_subject" type="text" class="input" value="<?=$D4['value1'] ?>" size="40"> </li>
	<li><label>Welcome Message:</label> <textarea name="welcome_message" style="width:500px; height:200px;" class="input"><?=$D3['value2'] ?></textarea> </li>

</div></ul>


 
	<ul class="form"><div class="box_body">
		<li><label>Welcome SMS: </label>
		<div class="tip">If you would like to send a welcome SMS to members when they join enter a welcome message below. SMS are sent after the user has clicked on the link to validate their email address. If your customer account doesnt have any SMS credits the message will not be sent.</div>
		<textarea name="welcome_sms"  style="width:500px; height:200px;" class="input"><?=$D2['value1'] ?></textarea> 
		<div class="tip"><script>displaylimit("","welcome_sms",150)</script></div>
		
		<div class="tip">
		You can use the following values which will be replaced by the system when the message is sent;
		<ul>
		<li></li>
		<li>Username: (username)</li>
	</ul>
	</div>
	 

</li>
	<li><input type="submit" value="Update" class="MainBtn"></li>
	</div></ul>
	</form>

<?php }elseif($_REQUEST['p'] == "auto"){

if(isset($_GET['id']) && is_numeric($_GET['id']) ){
$data = $DB->Row("SELECT * FROM email_scheduler WHERE send_id ='".$_GET['id']."' LIMIT 1");
 
}

?> 


<div id="AddDiv" <?php if(!isset($_GET['id']) ){ ?> style="display:none;" <?php } ?>>
	<form method="post" action="email.php">
	<input name="do" type="hidden" value="autoemail" class="hidden">
	<input name="p" type="hidden" value="auto" class="hidden">
	<?php if(isset($_GET['id']) && is_numeric($_GET['id']) ){ ?>
	<input name="eid" type="hidden" value="<?=$_GET['id'] ?>" class="hidden">
	<?php } ?>

	<ul class="form"><div class="box_body">
	<li><label>Scheduler Name: </label> <input name="sname" type="text" class="input" value="<?=$data['send_name'] ?>" size="40">
	<div class="tip">This is only used to help you identify the email scheduler</div>
	</li>
	<?php if(isset($_GET['id']) && is_numeric($_GET['id']) ){ ?>

	<li><label>Pass Key: </label> <input name="skey" type="text" class="input" value="<?=$data['send_key'] ?>" size="40"></li>
	<div class="tip">The pass key is used within your cronjob string to identify each of your emails. It is also a security ID that stops people sending emails without the correct permissions.</div>
<br> <li><label>Cron Job String</label>

<textarea name="" cols="" rows="" style="width:610px; height:50px;">

php -q  <?=str_replace("/uploads/images/","",PATH_IMAGE); ?>inc/cronjobs/cron_email.php?key=<?=$data['send_key'] ?> 
</textarea>
<div class="tip">NOTE: The software does not have permissions to setup the actual cronjob automatically, you must login to your hosting control panel and manually setup the cronjob yourself. Use the path above to get the correct server path.</div>
</li>
	<?php } ?>
  	 
 
	</div></ul>

	<ul class="form"><div class="box_body">

	<li><label>Gender: </label>  <select name="sgender" class="input"><?php foreach($_SESSION['g_array'] as $item){ ?><option value="<?=$item['id'] ?>" <?php if($data['send_gender'] == $item['id']){ print "selected"; } ?>><?=$item['caption'] ?></option> <?php } ?></select>
 </li>
	<li><label>Have Photos: </label> <select name="sphoto" class="input">
	<option value="0" <?php if($data['send_photo'] =='0'){ print "selected"; } ?>>Any</option>
	<option value="1" <?php if($data['send_photo'] =='1'){ print "selected"; } ?>>Yes</option>
	<option value="2" <?php if($data['send_photo'] =='2'){ print "selected"; } ?>>No</option>
	</select> </li>
	<li><label>Account Status: </label> 	<select name="sstatus" class="input">
	<option value="none" <?php if($data['send_account'] =="none"){ print "selected"; } ?>>Any</option>
	<option value="active" <?php if($data['send_account'] =="active"){ print "selected"; } ?>>Active</option>
	<option value="suspended" <?php if($data['send_account'] =="suspended"){ print "selected"; } ?>>Suspended</option>
	<option value="unapproved" <?php if($data['send_account'] =="unapproved"){ print "selected"; } ?>>Unapproved</option>
	<option value="cancel" <?php if($data['send_account'] =="cancel"){ print "selected"; } ?>>Cancel Account</option>
	</select> </li>
	<li><label>Membership: </label>  <select name="spid" style="width:200px;" class="input"><?=DisplayPackage($data['send_membership']) ?></select></li>
	<li><label>Country: </label> <select name="scountry" size="1" class="input"><?=DisplayCountries($data['send_country']) ?></select> </li>

	</div></ul>
	
	<ul class="form"><div class="box_body">
	<li><label>Email to send: </label> <select class="input" name="snewid"><?=DisplayNewsletters($data['send_nid']) ?></select> </li>
	<li><input type="submit" value="Save" class="MainBtn"></li>
	</div></ul>



	</form>
 
</div>

<div class="bar_save">
	<input type="button" value="Add Email Scheduler" class="MainBtn" onClick="javascript:idShowHide('AddDiv');"/>
	<br class="clear">
	</div>
<div id="TableViewer"></div>


<?php } ?>