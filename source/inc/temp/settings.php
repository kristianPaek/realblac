<?php if(!isset($_REQUEST['p'])|| $_REQUEST['p']==""){ ?>

 
<form method="post" action="settings.php">
<input type="hidden" name="do" value="pagedisplay" class="hidden">
 

      <table class="widefat">
		<thead>
        <tr>               
          <td width="370">&nbsp;</td>
          <td width="110" align="center" style="color:#fff;"><strong><?=$admin_settings[2] ?></strong></td>
          <td width="114" align="center" style="color:#fff;"><strong>&nbsp;<?=$admin_settings[3] ?></strong></td>
        </tr>
	    </thead>
 
     
        <tr>
          <td ><strong><?=$admin_settings_extra[2] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff16" value="1" <?php if(D_CONTACT ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff16" value="0" <?php if(D_CONTACT ==0){ print "checked"; } ?>></td>
        </tr>
     
        <tr>
          <td ><strong><?=$admin_settings_extra[3] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff14" value="1" <?php if(D_TOUR ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff14" value="0" <?php if(D_TOUR ==0){ print "checked"; } ?>></td>
        </tr>               
              
        <tr>            
          <td ><strong><?=$admin_settings_extra[4] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff15" value="1" <?php if(D_FAQ ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff15" value="0" <?php if(D_FAQ ==0){ print "checked"; } ?>></td>
        </tr>

		
        <tr>
         <td ><strong><?=$admin_settings_extra[6] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff8" value="1" <?php if(D_GROUPS ==1){ print "checked"; } ?>></td>
           <td align="center" bgcolor="#efefef"><input type="radio" name="ff8" value="0" <?php if(D_GROUPS ==0){ print "checked"; } ?>></td>
        </tr>
			
		<tr>
          <td ><strong><?=$admin_settings_extra[7] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff1" value="1" <?php if(D_FORUM ==1){ print "checked"; } ?>> </td>
          <td align="center" bgcolor="#efefef"><input name="ff1" type="radio" value="0" <?php if(D_FORUM ==0){ print "checked"; } ?>> </td>
        </tr>

                <tr>                  
                  <td ><strong>Display Quizzes </strong></td>
                  <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff5" value="1" <?php if(D_MATCHTESTS ==1){ print "checked"; } ?>></td>
                  <td align="center" bgcolor="#efefef"><input type="radio" name="ff5" value="0" <?php if(D_MATCHTESTS ==0){ print "checked"; } ?>></td>
                </tr>
				
		<tr>                  
              <td ><strong><?=$admin_settings_extra[9] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff9" value="1" <?php if(D_NETWORK ==1){ print "checked"; } ?>></td>
                  <td align="center" bgcolor="#efefef"><input type="radio" name="ff9" value="0" <?php if(D_NETWORK ==0){ print "checked"; } ?>></td>
        </tr>
						
	    <tr>
          <td ><strong><?=$admin_settings_extra[10] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff12" value="yes" <?php if(AFF_ENABLED =="yes"){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff12" value="no" <?php if(AFF_ENABLED =="no"){ print "checked"; } ?>></td>
        </tr>
	    <tr>
	      <td ><strong><?=$admin_settings_extra[11] ?></strong></td>
	      <td align="center" bgcolor="#E4FED6"><input type="radio" name="fsms" value="yes" <?php if(UPGRADE_SMS =="yes"){ print "checked"; } ?>></td>
	      <td align="center" bgcolor="#efefef"><input type="radio" name="fsms" value="no" <?php if(UPGRADE_SMS =="no"){ print "checked"; } ?>></td>
        </tr>		
	    <tr>
	      <td ><strong><?=$admin_settings_extra[58] ?></strong></td>
	      <td align="center" bgcolor="#E4FED6"><input type="radio" name="fart" value="1" <?php if(D_ARTICLES ==1){ print "checked"; } ?>></td>
	      <td align="center" bgcolor="#efefef"><input type="radio" name="fart" value="0" <?php if(D_ARTICLES ==0){ print "checked"; } ?>></td>
        </tr>			
       <tr>
                  
         <td ><strong><?=$admin_settings_extra[12] ?></strong></td>
          <td align="center" bgcolor="#E4FED6">
<input type="radio" name="ff2" value="1" <?php if(D_BLOG ==1){ print "checked"; } ?>></td>
                  <td align="center" bgcolor="#efefef">
<input type="radio" name="ff2" value="0" <?php if(D_BLOG ==0){ print "checked"; } ?>></td>
        </tr>           

        <tr>
    
          <td ><strong><?=$admin_settings_extra[13] ?></strong></td>
          <td align="center" bgcolor="#E4FED6">
<input type="radio" name="ff3" value="1" <?php if(D_CHATROOM ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef">
<input type="radio" name="ff3" value="0" <?php if(D_CHATROOM ==0){ print "checked"; } ?>></td>
        </tr>

        <tr>

          <td ><strong><?=$admin_settings_extra[14] ?> (IM)</strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff4" value="1" <?php if(D_IM ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff4" value="0" <?php if(D_IM ==0){ print "checked"; } ?>></td>
        </tr>

        <tr>

          <td ><strong><?=$admin_settings_extra[14] ?> (IM) Popup</strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff4p" value="1" <?php if(D_IM_POPUP ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff4p" value="0" <?php if(D_IM_POPUP ==0){ print "checked"; } ?>></td>
        </tr>


        <tr>
          <td ><strong>Display Videos Page</strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dvid" value="1" <?php if(D_VIDEOS ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dvid" value="0" <?php if(D_VIDEOS ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td ><strong>Display Music Page </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dmusic" value="1" <?php if(D_MUSIC ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dmusic" value="0" <?php if(D_MUSIC ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td ><strong>Display Messages Page </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dmsg" value="1" <?php if(D_MESSAGES ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dmsg" value="0" <?php if(D_MESSAGES ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td ><strong>Display Photo Albums and File uploads </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dgal" value="1" <?php if(D_GALLERY ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dgal" value="0" <?php if(D_GALLERY ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><strong>Display Events Page </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="devents" value="1" <?php if(D_EVENTS ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="devents" value="0" <?php if(D_EVENTS ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><strong>Display Settings Page </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dsettings" value="1" <?php if(D_SETTINGS ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dsettings" value="0" <?php if(D_SETTINGS ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><strong>Display My Account Page </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dacc" value="1" <?php if(D_ACCOUNT ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dacc" value="0" <?php if(D_ACCOUNT ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><strong><?=$admin_settings_extra[1] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dsearch" value="1" <?php if(D_SEARCH ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dsearch" value="0" <?php if(D_SEARCH ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><strong>Display Classified Ads Page </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dclass" value="1" <?php if(D_CLASSADS ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dclass" value="0" <?php if(D_CLASSADS ==0){ print "checked"; } ?>></td>
        </tr>    
 
        <tr>
          <td><strong>Display Games Page </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dgames" value="1" <?php if(D_GAMES ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dgames" value="0" <?php if(D_GAMES ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><b>Display Profile Designer</b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ddesign" value="1" <?php if(D_DESIGNER ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ddesign" value="0" <?php if(D_DESIGNER ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><b>Display Profile Rating Box</b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="dprating" value="1" <?php if(D_PROFILERATING ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="dprating" value="0" <?php if(D_PROFILERATING ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><b>Display Add ProfilePartner </b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="pp1" value="1" <?php if(D_PARTNER ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="pp1" value="0" <?php if(D_PARTNER ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><b>Display Add Profile Friends </b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="pp2" value="1" <?php if(D_FRIENDS ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="pp2" value="0" <?php if(D_FRIENDS ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><b>Display Add Profile Hotlist </b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="pp3" value="1" <?php if(D_HOTLIST ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="pp3" value="0" <?php if(D_HOTLIST ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td><b>Display Send Wink </b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="pp4" value="1" <?php if(D_WINK ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="pp4" value="0" <?php if(D_WINK ==0){ print "checked"; } ?>></td>
        </tr>   

        <tr>
          <td><b>Display Skype Field in Member Settings </b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="pskype" value="1" <?php if(D_SKYPE ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="pskype" value="0" <?php if(D_SKYPE ==0){ print "checked"; } ?>></td>
        </tr> 

       <!-- <tr>
          <td><b>Display Follow Feature </b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="pfollow" value="1" <?php if(D_FOLLOW ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="pfollow" value="0" <?php if(D_FOLLOW ==0){ print "checked"; } ?>></td>
        </tr> 
-->
        <tr>
          <td><b>Display Member Starsign's </b></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="pstar" value="1" <?php if(D_STARSIGN ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="pstar" value="0" <?php if(D_STARSIGN ==0){ print "checked"; } ?>></td>
        </tr> 



  </table>
<br class="clear">

      <table class="widefat">
        <thead><tr>               
          <td width="370" >&nbsp;</td>
          <td width="110"  align="center" style="color:#fff;"><strong><?=$admin_settings[2] ?></strong></td>
          <td width="114"  align="center" style="color:#fff;"><strong>&nbsp;<?=$admin_settings[3] ?></strong></td>
        </tr></thead>
		

                
               
              
 
                
              


  
        <tr>
    
          <td ><strong><?=$admin_settings_extra[15] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff17" value="1" <?php if(D_REGISTER_IMAGE ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff17" value="0" <?php if(D_REGISTER_IMAGE ==0){ print "checked"; } ?>></td>
        </tr>
  
        <tr>
   
        <tr>
   
          <td ><strong><?=$admin_settings_extra[16] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff6" value="1" <?php if(D_POSTCODES ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff6" value="0" <?php if(D_POSTCODES ==0){ print "checked"; } ?>></td>
        </tr>
 
        <tr>
  
          <td ><strong><?=$admin_settings_extra[17] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ff7" value="1" <?php if(D_ZIPCODES ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ff7" value="0" <?php if(D_ZIPCODES ==0){ print "checked"; } ?>></td>
        </tr>
                

                

           <tr>                  
             <!--     <td ><strong>Display Games</strong></td>
             <td align="center" bgcolor="#DCE4EB"><input type="radio" name="ff10" value="yes" <?php if(D_GAMES =="yes"){ print "checked"; } ?>></td>
                  <td align="center" bgcolor="#FFDFDF"><input type="radio" name="ff10" value="no" <?php if(D_GAMES =="no"){ print "checked"; } ?>></td>
        </tr>-->
  
      
        <tr>
          <td ><strong>Display Comments</strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ffcomments" value="1" <?php if(D_COMMENTS =="1"){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ffcomments" value="0" <?php if(D_COMMENTS =="0"){ print "checked"; } ?>></td>
        </tr>

        <tr>
          <td ><strong>Display Mobile Version</strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="ffmobile" value="1" <?php if(D_MOBILE =="1"){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="ffmobile" value="0" <?php if(D_MOBILE =="0"){ print "checked"; } ?>></td>
        </tr>

  </table>

<br class="clear">

      <table class="widefat">
        <thead><tr>
          <td width="370" >&nbsp;</td>
          <td width="110"  align="center" style="color:#fff;"><strong> <?=$admin_settings[2] ?>          </strong></td>
          <td width="114"  align="center" style="color:#fff;"><strong>&nbsp;   <?=$admin_settings[3] ?>          </strong></td>
        </tr></thead>
        <tr>
          <td ><strong><?=$admin_set_extra1[1] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="U1" value="1" <?php if(UP_PHOTO ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="U1" value="0" <?php if(UP_PHOTO ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td ><strong><?=$admin_set_extra1[2] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="U2" value="1" <?php if(UP_VIDEO ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="U2" value="0" <?php if(UP_VIDEO ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td ><strong><?=$admin_set_extra1[3] ?></strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="U3" value="1" <?php if(UP_MUSIC ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="U3" value="0" <?php if(UP_MUSIC ==0){ print "checked"; } ?>></td>
        </tr>
        <tr>
          <td ><strong><?=$admin_set_extra1[4] ?> </strong></td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="U4" value="1" <?php if(UP_YOUTUBE ==1){ print "checked"; } ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="U4" value="0" <?php if(UP_YOUTUBE ==0){ print "checked"; } ?>></td>
        </tr>
  </table>
  <br class="clear">
<input name="submit" type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn">
</form>
 
<?php }elseif($_REQUEST['p'] == "email"){ ?>
	


   <form method="post" action="settings.php">
   <input type="hidden" name="do" value="ops" class="hidden">
   <input type="hidden" name="p" value="email" class="hidden">

	<ul class="form">    
	<div class="box_body">

    <li><label>Email Client </label><select name="emailclient" class="input"><option value="no" <?php if(USE_SMTP=="no"){ print "selected";} ?>>PHP Mail() Client (recommended)</option><option value="yes" <?php if(USE_SMTP=="yes"){ print "selected";} ?>>SMTP Server Client</option></select><div class="tip">It is recommend to use the servers default PHP mail client however if you wish to use the SMTP client you can enable it here.</div></li>
	<?php if(USE_SMTP=="yes"){ ?>
	<li><label>SMTP Server </label> <input name="smtp1" type="text" value="<?=SMTP_SERVER ?>" class="input"></li>
	<li><label>SMTP Server Port </label> <input name="smtp2" type="text" value="<?=SMTP_PORT ?>" class="input"></li>
 	<li><label>SMTP From Sender </label> <input name="smtp3" type="text" value="<?=SMTP_FROM_NAME ?>" class="input"></li>	
	<li><label>SMTP Username </label> <input name="smtp4" type="text" value="<?=SMTP_USERNAME ?>" class="input"></li>
	<li><label>SMTP Password </label> <input name="smtp5" type="text" value="<?=SMTP_PASSWORD ?>" class="input"></li>
	<?php } ?>
 	<input type="submit" id="but5" value="<?=$admin_button_val[8] ?>" class="MainBtn">
	</div></ul>	
</form>


	<p id='TopCommentsBox'><img src='inc/images/icons/help.png' align='absmiddle' />  Listed below are a list of website events, you can select which events you would like the system to send you an email notification. Email notifications will be sent to all system admins who have acces to system settings.</p>
		
		

	<form method="post" action="settings.php" name="form1">
    <input name="do" type="hidden" value="email" class="hidden">
	<input name="page" type="hidden" value="email" class="hidden">		
	<input name="p" type="hidden" value="email" class="hidden">	

	<ul class="form">    
	<div class="box_body">

	<table class="widefat">
		<thead>
        <tr>               
          <td width="370">The system should email me when; </td>
          <td width="110" align="center" style="color:#fff;"><strong>Send</strong></td>
          <td width="114" align="center" style="color:#fff;"><strong>Dont Send </strong></td>
        </tr>
	    </thead>
 
     
        <tr>
          <td >A member joins the website </td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="sjoin" value="yes" <?php if(SEMAIL_JOIN=="yes"){ print "checked";} ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="sjoin" value="no" <?php if(SEMAIL_JOIN=="no"){ print "checked";} ?>></td>
        </tr>
     
        <tr>
          <td >A member updates their account </td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="supdate" value="yes" <?php if(SEMAIL_UPDATE=="yes"){ print "checked";} ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="supdate" value="no" <?php if(SEMAIL_UPDATE=="no"){ print "checked";} ?>></td>
        </tr>
        <tr>
          <td >A member uploads a new photo </td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="sfiles" value="yes" <?php if(SEMAIL_FILES=="yes"){ print "checked";} ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="sfiles" value="no" <?php if(SEMAIL_FILES=="no"){ print "checked";} ?>></td>
        </tr>
        <tr>
          <td >A member creates a new group </td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="sgroups" value="yes" <?php if(SEMAIL_GROUPS=="yes"){ print "checked";} ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="sgroups" value="no" <?php if(SEMAIL_GROUPS=="no"){ print "checked";} ?>></td>
        </tr>
        <tr>
          <td >A member creates a new blog </td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="sblog" value="yes" <?php if(SEMAIL_BLOG=="yes"){ print "checked";} ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="sblog" value="no" <?php if(SEMAIL_BLOG=="no"){ print "checked";} ?>></td>
        </tr>
        <tr>
          <td >A member create a new classified advert </td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="sclassads" value="yes" <?php if(SEMAIL_CLASSADS=="yes"){ print "checked";} ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="sclassads" value="no" <?php if(SEMAIL_CLASSADS=="no"){ print "checked";} ?>></td>
        </tr>
        <tr>
          <td >A member logs into their account </td>
          <td align="center" bgcolor="#E4FED6"><input type="radio" name="slogin" value="yes" <?php if(SEMAIL_LOGIN=="yes"){ print "checked";} ?>></td>
          <td align="center" bgcolor="#efefef"><input type="radio" name="slogin" value="no" <?php if(SEMAIL_LOGIN=="no"){ print "checked";} ?>></td>
        </tr>   
  </table>

    <br>
    <li><label>Send this email </label> <select class="input" name="newid"><?=DisplayNewsletters(SEMAIL_TEMPLATE) ?></select> <div class="tip">Select the email you wish to recieve when any of the above events happen. Add the code (custom) to any email to recieve the alter text.</div></li>

 
 <input type="submit" id="but5" value="<?=$admin_button_val[8] ?>" class="MainBtn">
	</div></ul>
	</form>

<?php }elseif($_REQUEST['p'] == "watermark"){ ?>
	
	<form method="post" action="settings.php" name="form1" enctype="multipart/form-data">
    <input name="do" type="hidden" value="water" class="hidden">
	<input name="p" type="hidden" value="watermark" class="hidden">		

	<ul class="form"><div class="box_body">	

 	<li><label>Upload File</label> <input name="WatermarkUpload" type="file" class="input"><div class="tip">You must select a .PNG file for the watermark process to work.</div></li>		
	<?php if(WATERMARK_FILE !=""){ ?>
	<li><label>File Path: </label><input name="waterm" type="text" class="input" id="s1"  style="width:500px;" value="<?=WEB_PATH_FILES.WATERMARK_FILE ?>"size="40"><div class="tip">The file path refers to the location of the watermark image on your server.</div> </li>
	<li><label>Remove Watermark</label><input name="removeWatermark" type="checkbox" value="1"></li>
	<?php } ?>
    <li><input type="submit" id="but5" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li> 
	</div></ul>
	</form>

<?php }elseif($_REQUEST['p'] == "paths"){ 


?>


 

 
		<br class="clear">
		<p><b><?=$admin_settings[4] ?></b></p>
	
		<form method="post" action="settings.php">
		<input name="do" type="hidden" value="paths" class="hidden">
		<input name="p" type="hidden" value="paths" class="hidden">	
		<ul class="form">  
		<div class="box_body">        
		 <li><label>File Storage Web Path </label>  <input name="p0" type="text" class="input" value="<?=WEB_PATH_FILES ?>" size="60"></li>
		 <li><label>Photo Storage WebPath  </label> <input name="p1"  type="text" class="input" value="<?=WEB_PATH_IMAGE ?>" size="60"> </li>        
		 <li><label>Thumbs Storage Web Path </label> <input name="p2" type="text" class="input" value="<?=WEB_PATH_IMAGE_THUMBS ?>" size="60"></li>	 
		 <li><label>Video Storage Web Path </label> <input name="p3"  type="text" class="input" value="<?=WEB_PATH_VIDEO ?>" size="60"> </li>       
		 <li><label>Music Storage Web Path </label>  <input name="p4" type="text" class="input" value="<?=WEB_PATH_MUSIC ?>" size="60"></li>	
		 <li> <input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn" ></li>      
		 </div></ul>		
	 
	
		<br class="clear">
		<p><b><?=$admin_settings[5] ?></b></p>	
		 
		<ul class="form"><div class="box_body">		
		<li><label>File Storage Server Path:</label> <input name="pa0" type="text" class="input" value="<?=PATH_FILES ?>" size="60" > <div class="tip">Space Used: <?=GetFolderSize(PATH_FILES); ?></div> </li> 
		<li><label>Photo Storage Server Path:</label> <input name="pa1" type="text" class="input" value="<?=PATH_IMAGE ?>" size="60" > <div class="tip">Space Used: <?=GetFolderSize(PATH_IMAGE); ?></div></li>   
		<li><label>Thumbs Storage Server Path:</label><input name="pa2" type="text" class="input" value="<?=PATH_IMAGE_THUMBS ?>" size="60" > <div class="tip">Space Used: <?=GetFolderSize(PATH_IMAGE_THUMBS); ?></div></li>    
		<li><label>Video Storage Server Path:</label><input name="pa3" type="text" class="input" value="<?=PATH_VIDEO ?>" size="60" > <div class="tip">Space Used: <?=GetFolderSize(PATH_VIDEO); ?></div></li> 	  
		<li><label>Music Storage Server Path:</label><input name="pa4" type="text" class="input" value="<?=PATH_MUSIC ?>" size="60" > <div class="tip">Space Used: <?=GetFolderSize(PATH_MUSIC); ?></div></li>    
		<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn" ></li>	  
		</div></ul> 	  
		</form>
	
 




<?php }elseif($_REQUEST['p'] == "thumbnails"){ 
// search settings

?>
	<p id='TopCommentsBox'><img src='inc/images/icons/help.png' align='absmiddle' />  The thumbnails below are used to replace member photos if they havent yet added a photo to their account. Thumbnails MUST be .JPG format and 96x96 in dimentions.</p>

		<form action="settings.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="do" value="thumbs" class="hidden">
		<input type="hidden" name="p" value="thumbnails" class="hidden">	
		<ul class="form">     
		<div class="box_body">	

             
		<li><label>Default No Image:  </label>

		<table width="600px"  border="0">
		  <tr>
			<td width="161" rowspan="2"><img src="<?=WEB_PATH_FILES.DEFAULT_IMAGE ?>" width="96" height="96"></td>
			<td width="429"><input type="text" class="input" value="<?=WEB_PATH_FILES.DEFAULT_IMAGE ?>"size="60" disabled style="background:#FFC8D0"></td>
		  </tr>
		  <tr>
			<td><small>Upload a new image to replace the existing one.</small>
			  <input type="file" name="t3_file"></td>
		  </tr>
		</table><hr noshade>
		</li>
		<li><label>Adult Default Image:  </label>

		<table width="600px"  border="0">
		  <tr>
			<td width="161" rowspan="2"><img src="<?=WEB_PATH_FILES.DEFAULT_IMAGE_ADULT ?>" width="96" height="96"></td>
			<td width="429"><input type="text" class="input" value="<?=WEB_PATH_FILES.DEFAULT_IMAGE_ADULT ?>"size="60" disabled style="background:#FFC8D0"></td>
		  </tr>
		  <tr>
			<td><small>Upload a new image to replace the existing one.</small>
			  <input type="file" name="t4_file"></td>
		  </tr>
		</table><hr noshade>
        </li>

		</div></ul>


		<ul class="form"><div class="box_body">


		<?php $tc=1; foreach($_SESSION['g_array'] as $value){ if($value['id'] !=""){ ?>

		<li><label> <?=$value['caption'] ?> Default Image:  </label>

		<table width="600px"  border="0">
		  <tr>
			<td width="161" rowspan="2"><img src="<?=WEB_PATH_FILES."nophoto_".$value['id'] ?>.jpg" width="96" height="96"></td>
			<td width="429"><input type="text" class="input" value="<?=WEB_PATH_FILES."nophoto_".$value['id'] ?>.jpg"size="60" disabled style="background:#FFC8D0"></td>
		  </tr>
		  <tr>
			<td><small>Upload a new JPG image to replace the existing one.</small>
			  <input type="file" name="main_file_<?=$tc ?>"></td>
		  </tr>
		</table><hr noshade>
        </li><input type="hidden" name="default_<?=$tc ?>" value="<?=$value['id'] ?>">

		<?php $tc++; } } ?><input type="hidden" name="TotalDe" value="<?=$tc ?>">

		</div></ul>


		<ul class="form"><div class="box_body">

		<li><label>Music Default Image: </label>

		<table width="600px"  border="0">
		  <tr>
			<td width="161" rowspan="2"><img src="<?=WEB_PATH_FILES.DEFAULT_MUSIC ?>" width="96" height="96"></td>
			<td width="429"><input type="text" class="input" value="<?=WEB_PATH_FILES.DEFAULT_MUSIC ?>"size="60" disabled style="background:#FFC8D0"></td>
		  </tr>
		  <tr>
			<td><small>Upload a new image to replace the existing one.</small>
			  <input type="file" name="t5_file"></td>
		  </tr>
		</table><hr noshade>
        </li>
		<li><label>Video Default Image: </label>

		<table width="600px"  border="0">
		  <tr>
			<td width="161" rowspan="2"><img src="<?=WEB_PATH_FILES.DEFAULT_VIDEO ?>" width="96" height="96"></td>
			<td width="429"><input  type="text" class="input" value="<?=WEB_PATH_FILES.DEFAULT_VIDEO ?>"size="60" disabled style="background:#FFC8D0"></td>
		  </tr>
		  <tr>
			<td><small>Upload a new image to replace the existing one.</small>
			  <input type="file" name="t6_file"></td>
		  </tr>
		</table><hr noshade>
        </li>
		<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn" ></li>   
		</div></ul>
</form>


<?php }elseif($_REQUEST['p'] == "op1"){ 
// search settings

?>

   <form method="post" action="settings.php">
   <input type="hidden" name="do" value="ops" class="hidden">
   <input type="hidden" name="p" value="op1" class="hidden">


  	<ul class="form"><div class="box_body">

		<li><label>Default Search View</label>
		<select name="search_view" class="input">
		
		<option value="basic" <?php if(SEARCH_PAGE_DISPLAY =='basic'){ print "selected"; } ?>>Basic View</option>
		<option value="detail" <?php if(SEARCH_PAGE_DISPLAY =='detail'){ print "selected"; } ?>>Detailed View</option>
		<option value="gallery" <?php if(SEARCH_PAGE_DISPLAY =='gallery'){ print "selected"; } ?>>Gallery View</option>		
					
		</select>
		</li>

	<li><label ><?=$admin_settings_extra[27] ?></label>
		      <select name="searchrows" style="width:100px;" class="input">
					<option value="2"<?php if(SEARCH_PAGE_ROWS =='2'){ print "selected"; } ?>>2</option>
					<option value="4" <?php if(SEARCH_PAGE_ROWS =='4'){ print "selected"; } ?>>4</option>
					<option value="6" <?php if(SEARCH_PAGE_ROWS =='6'){ print "selected"; } ?>>6</option>
					<option value="8" <?php if(SEARCH_PAGE_ROWS =='8'){ print "selected"; } ?>>8</option>
					<option value="10" <?php if(SEARCH_PAGE_ROWS =='10'){ print "selected"; } ?>>10</option>
					<option value="12" <?php if(SEARCH_PAGE_ROWS =='12'){ print "selected"; } ?>>12</option>
					<option value="14" <?php if(SEARCH_PAGE_ROWS =='14'){ print "selected"; } ?>>14</option>
					<option value="16" <?php if(SEARCH_PAGE_ROWS =='16'){ print "selected"; } ?>>16</option>
					<option value="18"<?php if(SEARCH_PAGE_ROWS =='18'){ print "selected"; } ?>>18</option>
					<option value="20" <?php if(SEARCH_PAGE_ROWS =='20'){ print "selected"; } ?>>20</option>
					<option value="22" <?php if(SEARCH_PAGE_ROWS =='22'){ print "selected"; } ?>>22</option>
					<option value="24" <?php if(SEARCH_PAGE_ROWS =='24'){ print "selected"; } ?>>24</option>
					<option value="26" <?php if(SEARCH_PAGE_ROWS =='26'){ print "selected"; } ?>>26</option>
					<option value="28" <?php if(SEARCH_PAGE_ROWS =='28'){ print "selected"; } ?>>28</option>
					<option value="30" <?php if(SEARCH_PAGE_ROWS =='30'){ print "selected"; } ?>>30</option>
					<option value="32" <?php if(SEARCH_PAGE_ROWS =='32'){ print "selected"; } ?>>32</option>
					<option value="34" <?php if(SEARCH_PAGE_ROWS =='34'){ print "selected"; } ?>>34</option>
					<option value="36" <?php if(SEARCH_PAGE_ROWS =='36'){ print "selected"; } ?>>36</option>
					<option value="38" <?php if(SEARCH_PAGE_ROWS =='38'){ print "selected"; } ?>>38</option>
					<option value="40" <?php if(SEARCH_PAGE_ROWS =='40'){ print "selected"; } ?>>40</option>
					<option value="42" <?php if(SEARCH_PAGE_ROWS =='42'){ print "selected"; } ?>>42</option>
					<option value="44" <?php if(SEARCH_PAGE_ROWS =='44'){ print "selected"; } ?>>44</option>
					<option value="46" <?php if(SEARCH_PAGE_ROWS =='46'){ print "selected"; } ?>>46</option>
					<option value="48" <?php if(SEARCH_PAGE_ROWS =='48'){ print "selected"; } ?>>48</option>
					<option value="50" <?php if(SEARCH_PAGE_ROWS =='50'){ print "selected"; } ?>>50</option>					
		</select>
		<div class="tip"><?=$admin_settings_extra[28] ?></div>
	</li>	  

		<li><label>Show Incomplete Profiles?</label><select name="nophoto" style="width:100px;" class="input"><option value="yes" <?php if(SEARCH_WITHOUT_PICS=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(SEARCH_WITHOUT_PICS=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[52] ?>.</div></li>

	<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">				
 	</div></ul>

 	



<ul class="form"><div class="box_body">

	<li><label ><?=$admin_settings_extra[29] ?></label>
		      <select name="matchrows" style="width:100px;" class="input">
					<option value="2"<?php if(MATCH_PAGE_ROWS =='2'){ print "selected"; } ?>>2</option>
					<option value="4" <?php if(MATCH_PAGE_ROWS =='4'){ print "selected"; } ?>>4</option>
					<option value="6" <?php if(MATCH_PAGE_ROWS =='6'){ print "selected"; } ?>>6</option>
					<option value="8" <?php if(MATCH_PAGE_ROWS =='8'){ print "selected"; } ?>>8</option>
					<option value="10" <?php if(MATCH_PAGE_ROWS =='10'){ print "selected"; } ?>>10</option>
					<option value="12" <?php if(MATCH_PAGE_ROWS =='12'){ print "selected"; } ?>>12</option>
					<option value="14" <?php if(MATCH_PAGE_ROWS =='14'){ print "selected"; } ?>>14</option>
					<option value="16" <?php if(MATCH_PAGE_ROWS =='16'){ print "selected"; } ?>>16</option>
					<option value="18"<?php if(MATCH_PAGE_ROWS =='18'){ print "selected"; } ?>>18</option>
					<option value="20" <?php if(MATCH_PAGE_ROWS =='20'){ print "selected"; } ?>>20</option>
					<option value="22" <?php if(MATCH_PAGE_ROWS =='22'){ print "selected"; } ?>>22</option>
					<option value="24" <?php if(MATCH_PAGE_ROWS =='24'){ print "selected"; } ?>>24</option>
					<option value="26" <?php if(MATCH_PAGE_ROWS =='26'){ print "selected"; } ?>>26</option>
					<option value="28" <?php if(MATCH_PAGE_ROWS =='28'){ print "selected"; } ?>>28</option>
					<option value="30" <?php if(MATCH_PAGE_ROWS =='30'){ print "selected"; } ?>>30</option>
					<option value="32" <?php if(MATCH_PAGE_ROWS =='32'){ print "selected"; } ?>>32</option>
					<option value="34" <?php if(MATCH_PAGE_ROWS =='34'){ print "selected"; } ?>>34</option>
					<option value="36" <?php if(MATCH_PAGE_ROWS =='36'){ print "selected"; } ?>>36</option>
					<option value="38" <?php if(MATCH_PAGE_ROWS =='38'){ print "selected"; } ?>>38</option>
					<option value="40" <?php if(MATCH_PAGE_ROWS =='40'){ print "selected"; } ?>>40</option>
					<option value="42" <?php if(MATCH_PAGE_ROWS =='42'){ print "selected"; } ?>>42</option>
					<option value="44" <?php if(MATCH_PAGE_ROWS =='44'){ print "selected"; } ?>>44</option>
					<option value="46" <?php if(MATCH_PAGE_ROWS =='46'){ print "selected"; } ?>>46</option>
					<option value="48" <?php if(MATCH_PAGE_ROWS =='48'){ print "selected"; } ?>>48</option>
					<option value="50" <?php if(MATCH_PAGE_ROWS =='50'){ print "selected"; } ?>>50</option>					
		</select>
		<div class="tip"><?=$admin_settings_extra[30] ?></div>	</li>
<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">
</div></ul>
</form>



<?php }elseif($_REQUEST['p'] == "op2"){

// membership settings

 ?>

   <form method="post" action="settings.php">
   <input type="hidden" name="do" value="ops" class="hidden">
   <input type="hidden" name="p" value="op2" class="hidden">

	<ul class="form"><div class="box_body">

	<li><label>Default Status Message</label>
	<input type="text" name="ssmsg" value="<?=D_STATUSMSG ?>" class="input">
	<div class="tip">This is the member status message used by members to describe what they are doing or looking for today! This value is added to their account during registration.</div></li>
		
  
 	<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">

	</div></ul>


  	<ul class="form"><div class="box_body">

	<li><label ><?=$admin_settings_extra[23] ?></label><select name="free" style="width:100px;" class="input"><option value="yes" <?php if(D_FREE=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(D_FREE=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[24] ?></div></li>		
	<?php if(D_FREE=="no"){ ?>

	<li style="background:#FDE8CF;"><label><?=$admin_settings_extra[19] ?>: </label><select name="mid" style="width:250px;" class="input"><?=DisplayPackage(DEFAULT_PACKAGE) ?></select><div class="tip"><?=$admin_settings_extra[20] ?></div></li>       

	<li style="background:#FDE8CF;"><label>Must Upgrade After Registration: </label><select name="mustupgrade" style="width:150px;" class="input"><option value="yes" <?php if(D_MUST_UPGRADE=="yes"){ print "selected";} ?>>Yes</option><option value="no" <?php if(D_MUST_UPGRADE=="no"){ print "selected";} ?>>No</option></select><div class="tip">You if select yes then the member will always be redirected to the upgrade page until they upgrade their account from the default membership package.</div></li>       

	<li  style="background:#FDE8CF;"><label >Enable Adult Content</label><select name="eadult" style="width:100px;" class="input"><option value="yes" <?php if(ENABLE_ADULTCONTENT=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(ENABLE_ADULTCONTENT=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">If you would like to run your website so that members can upload adult content files, please select yes otherwise the website will accept all content.</div></li>		
	<?php } ?>

	<li><label>Display My Gender</label><select name="egender" style="width:100px;" class="input"><option value="0" <?php if(D_GENDERMATCHING=="0"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="1" <?php if(D_GENDERMATCHING=="1"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">If you disable this then members who login will not see other members with the same gender as them in the search results.</div></li>		


 	<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">
 
	</div></ul>



  	<ul class="form"><div class="box_body">

   <li><label ><?=$admin_settings_extra[21] ?> </label><select name="must" style="width:100px;" class="input"><option value="1" <?php if(MUST_HAVE_IMAGE==1){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="0" <?php if(MUST_HAVE_IMAGE==0){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[22] ?></div></li>


	<li><label><?=$admin_settings_extra[31] ?></label><select name="valemail" style="width:100px;" class="input"><option value="1" <?php if(VALIDATE_EMAIL==1){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="0" <?php if(VALIDATE_EMAIL==0){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[32] ?> </div></li>

 	<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">

	</div></ul>
	
	<ul class="form"><div class="box_body">

	<li><label>Manually Approve Content</label><select name="appmem" style="width:100px;" class="input"><option value="yes" <?php if(APPROVE_ACCOUNTS=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(APPROVE_ACCOUNTS=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">Everytime a member updates their profile, creates a new blog post, group or classified ad you can decide to manually approve this content before its displayed live on your website. An email will be emailed to each of the website administrators to inform them new content is waiting approval.</div></li>
		
    <li><label><?=$admin_settings_extra[35] ?></label><select name="files" style="width:100px;" class="input"><option value="yes" <?php if(APPROVE_FILES=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(APPROVE_FILES=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[36] ?></div></li>

 	<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">

	</div></ul>


	<ul class="form"><div class="box_body">

	<li><label>Reset Member Ratings</label>
	<input name="ratingreset" type="checkbox" value="1">
	<div class="tip">Check this box if you wish to reset all the member profile ratings.</div></li>
			

 	<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">

	</div></ul>

</form>



<?php }elseif($_REQUEST['p'] == "op3"){ 

// flash server
?>

   <form method="post" action="settings.php">
   <input type="hidden" name="do" value="ops" class="hidden">
   <input type="hidden" name="p" value="op3" class="hidden">

  	<ul class="form"><div class="box_body">

    <li><label><?=$admin_settings_extra[37] ?></label><select name="live" style="width:100px;" class="input"><option value="yes" <?php if(APPROVE_LIVEFEEDS=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(APPROVE_LIVEFEEDS=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[38] ?></div></li>


	<li><label>Display Flash Content</label><select name="grec" style="width:100px;" class="input"><option value="yes" <?php if(FLASH_VIDEO=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(FLASH_VIDEO=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">Turn on or off flash based applications (such as the IM video, video greetings and video chat) if you do not have a flash server.</div>
	</li>	  

	<?php if(FLASH_VIDEO=="yes"){ ?>

	<li style="background:#FDE8CF;"><label ><?=$admin_settings_extra[41] ?></label><input name="rtmpPath" type="text" class="input" value="<?=FLASH_DOMAIN ?>"><div class="tip">This is the connection string to your flash server, it looks something like this: rtmp://******.com/your_app_name</div>	</li>

	<?php } ?>		
 	</div></ul>	

 	<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">

</form>


<?php }elseif($_REQUEST['p'] == "op4"){ 

// api settings
?>

   <form method="post" action="settings.php">
   <input type="hidden" name="do" value="ops" class="hidden">
   <input type="hidden" name="p" value="op4" class="hidden">



	<p id='TopCommentsBox'><img src='inc/images/icons/help.png' align='absmiddle' />  Use the <b>Facebook API</b> to allow members to "Register with Facebook" and "Login with Facebook". You will need to go the Facebook Developers site to register your website 
<a href="http://developers.facebook.com/">http://developers.facebook.com/</a></p>
	
	<ul class="form"><div class="box_body">
	
	
		<li><label>Facebook APP ID</label><input name="fbappid" type="text" class="input" value="<?=FACEBOOK_APP_ID ?>"></li>

		<li><label>Facebook APP Secret</label><input name="fbsecret" type="text" class="input" value="<?=FACEBOOK_SECRET ?>"></li>
	
		<li><label>Use Facebook Photo: </label>
		<select name="fbphoto" style="width:100px;" class="input"><option value="yes" <?php if(FACEBOOK_PHOTO=="yes"){ print "selected";} ?>>Yes</option><option value="no" <?php if(FACEBOOK_PHOTO=="no"){ print "selected";} ?>>No</option></select><div class="tip">Copy the Facebook photo to be the members default photo</div></li>       

		<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">

	</div></ul>	




	<p id='TopCommentsBox'><img src='inc/images/icons/help.png' align='absmiddle' />  The <b>Youtube API</b> built into the software allows you to display thousands of youtube videos on your video page making your website appear more busy. You can get a free API ID from the website below; <a href="http://code.google.com/apis/youtube/dashboard/" target="_blank">http://code.google.com/apis/youtube/dashboard/</a></p>
	
	<ul class="form"><div class="box_body">
	
	
		<li><label>YouTube ID</label><input name="Ykey" type="text" class="input" value="<?=YOUTUBE_API_ID ?>"></li>
		<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">
	
	</div></ul>	
	
	
	<p id='TopCommentsBox'><img src='inc/images/icons/help.png' align='absmiddle' />  The <b>Eventful API</b> is a large database of local and internation events that you can add to your website. For more information on this API please refer to their website at: http://api.eventful.com/. By enabling this system you will have extra options within the admin area to import and search for events to add to your website. Please note, you must contact <a href="mailto:bizdev@eventful.com">bizdev@eventful.com</a> to arrange terms to use the data. </p>
		
	
	<ul class="form"><div class="box_body">
	
		<div style="float:right;">
		<div class="eventful-badge eventful-large">
		  <img src="http://api.eventful.com/images/powered/eventful_139x44.gif"
			alt="Local Events, Concerts, Tickets">
		  <p><a href="http://eventful.com/">Events</a> by Eventful</p>
		</div>
		</div>

		<li><label>Eventful API Username</label><input name="eu" type="text" class="input" value="<?=EVENTFUL_USERNAME ?>"></li>
		<li><label>Eventful API Password</label><input name="ep" type="text" class="input" value="<?=EVENTFUL_PASSWORD ?>"></li>
		<li><label>Eventful API Key</label><input name="ek" type="text" class="input" value="<?=EVENTFUL_KEY ?>"></li>
		<input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">
	
	</div></ul>	
 


</form>



<?php }elseif($_REQUEST['p'] == "op"){ ?>


   <form method="post" action="settings.php">
   <input type="hidden" name="do" value="ops" class="hidden">
   <input type="hidden" name="p" value="op" class="hidden">	

	<ul class="form"><div class="box_body">
	
 
 	<li><label><?=$admin_settings_extra[25] ?></label><select name="maintenance" style="width:100px;" class="input"><option value="yes" <?php if(WEBSITE_DEMO=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(WEBSITE_DEMO=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[26] ?></div></li>		
 

 	</div></ul>
 

 
	<ul class="form"><div class="box_body">


	<li><label>Unaccepted Usernames</label><input name="blockusernames" type="text" value="<?=BLOCK_USERNAMES?>" class="input" size="80"><div class="tip">Seperate usernames that you dont want members to use with a comma.</div></li>


		<li><label><?=$admin_settings_extra[43] ?>:</label><select name="zdate" style="width:100px;" class="input">
		<option value="d-m-Y" <?php if(DATE_DISPLAY_FORMAT== "d-m-Y"){ print "selected";} ?>>d-m-Y</option>
		<option value="d-Y-m" <?php if(DATE_DISPLAY_FORMAT== "d-Y-m"){ print "selected";} ?>>d-Y-m</option>
		<option value="Y-m-d" <?php if(DATE_DISPLAY_FORMAT== "Y-m-d"){ print "selected";} ?>>Y-m-d</option>
		<option value="m-d-Y" <?php if(DATE_DISPLAY_FORMAT== "m-d-Y"){ print "selected";} ?>>m-d-Y</option>
		</select>
		<div class="tip"><?=$admin_settings_extra[44] ?></div></li>
	
 
		<!-- <li><label ><?=$admin_settings_extra[47] ?>:</label><select name="popwin" style="width:100px;" class="input"><option value="1" <?php if(POPUP_WINDOW==1){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="0" <?php if(POPUP_WINDOW==0){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[48] ?>.</div></li>-->
	
	
	<li><label ><?=$admin_settings_extra[49] ?>:</label><select name="seof" style="width:100px;" class="input"><option value="1" <?php if(D_MOD_WRITE==1){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="0" <?php if(D_MOD_WRITE==0){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[50] ?>.</div></li>
		
        
	<li><label><?=$admin_settings_extra[53] ?></label><select name="flag" style="width:100px;" class="input"><option value="1" <?php if(D_FLAGS=="1"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="0" <?php if(D_FLAGS=="0"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip"><?=$admin_settings_extra[54] ?>.</div></li>
		

	<li><label><?=$admin_settings_extra[55] ?></label>
		      <select name="affcurrency" class="input">
                <option value="&#163;" <?php if(AFF_CURRENCY=="£"){print "selected";} ?>>&pound;</option>
				<option value="EUR" <?php if(AFF_CURRENCY=="EUR"){print "selected";} ?>>&euro;</option>
				<option value="$" <?php if(AFF_CURRENCY=="$"){print "selected";} ?>>$</option>
				<option value="&cent;" <?php if(AFF_CURRENCY=="¢"){print "selected";} ?>>&cent;</option>
				<option value="&curren;" <?php if(AFF_CURRENCY=="¤"){print "selected";} ?>>&curren;</option>
				<option value="&yen;" <?php if(AFF_CURRENCY=="¥"){print "selected";} ?>>&yen</option>
				<option value="&fnof;" <?php if(AFF_CURRENCY=="&fnof;"){print "selected";} ?>>&fnof;</option>
                <option value="R" <?php if(AFF_CURRENCY=="R"){print "selected";} ?>>R (South African Rand Currency)</option>
				<option value="ZL" <?php if(AFF_CURRENCY=="ZL"){print "selected";} ?>>ZL (Polish Currency)</option>	
				<option value="RMB" <?php if(AFF_CURRENCY=="RMB"){print "selected";} ?>>RMB (Chinese Currency)</option>
				<option value="HK" <?php if(AFF_CURRENCY=="HK"){print "selected";} ?>>HK (Hong Kong Currency)</option>	
				<option value="CHF" <?php if(AFF_CURRENCY=="CHF"){print "selected";} ?>>CHF</option>			
		      </select>
	</li>		



    <li><label><?=$admin_settings_extra[56] ?></label><select name="ieditor"  style="width:100px;" class="input"><option value="yes" <?php if(U_EDITOR=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(U_EDITOR=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">Disable this if you are having problems with the HTML editor.</div></li>

					    		
	<!--<li><label >Enable Profile 'Viewing My Profile' Alerts</label><select name="ipop" style="width:100px;" class="input"><option value="1" <?php if(D_POP_UP_ALERT=="1"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="0" <?php if(D_POP_UP_ALERT=="0"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">When members are viewing online member profiles, a pop-up box will appear to the member informing them that someone is viewing their profile. You can disable this here.</div></li>-->
	
    </div></ul>

  	<ul class="form"><div class="box_body">

	
	<li><label >Enable Ghost Login</label><select name="auto_login" style="width:100px;" class="input"><option value="yes" <?php if(AUTO_LOGIN=="yes"){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="no" <?php if(AUTO_LOGIN=="no"){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">Enable this is you would like members to automatically appear online if there is noone on your website.</div></li>
	
	<li><label >Ghost Login Amount</label>
		      <select name="auto_amount" style="width:100px;" class="input">
					<option value="2"<?php if(AUTO_AMOUNT =='2'){ print "selected"; } ?>>2</option>
					<option value="4" <?php if(AUTO_AMOUNT =='4'){ print "selected"; } ?>>4</option>
					<option value="6" <?php if(AUTO_AMOUNT =='6'){ print "selected"; } ?>>6</option>
					<option value="8" <?php if(AUTO_AMOUNT =='8'){ print "selected"; } ?>>8</option>
					<option value="10" <?php if(AUTO_AMOUNT =='10'){ print "selected"; } ?>>10</option>
					<option value="12" <?php if(AUTO_AMOUNT =='12'){ print "selected"; } ?>>12</option>
					<option value="14" <?php if(AUTO_AMOUNT =='14'){ print "selected"; } ?>>14</option>
					<option value="16" <?php if(AUTO_AMOUNT =='16'){ print "selected"; } ?>>16</option>
					<option value="18"<?php if(AUTO_AMOUNT =='18'){ print "selected"; } ?>>18</option>
					<option value="20" <?php if(AUTO_AMOUNT =='20'){ print "selected"; } ?>>20</option>
					<option value="22" <?php if(AUTO_AMOUNT =='22'){ print "selected"; } ?>>22</option>
					<option value="24" <?php if(AUTO_AMOUNT =='24'){ print "selected"; } ?>>24</option>
					<option value="26" <?php if(AUTO_AMOUNT =='26'){ print "selected"; } ?>>26</option>
					<option value="28" <?php if(AUTO_AMOUNT =='28'){ print "selected"; } ?>>28</option>
					<option value="30" <?php if(AUTO_AMOUNT =='30'){ print "selected"; } ?>>30</option>
					<option value="32" <?php if(AUTO_AMOUNT =='32'){ print "selected"; } ?>>32</option>
					<option value="34" <?php if(AUTO_AMOUNT =='34'){ print "selected"; } ?>>34</option>
					<option value="36" <?php if(AUTO_AMOUNT =='36'){ print "selected"; } ?>>36</option>
					<option value="38" <?php if(AUTO_AMOUNT =='38'){ print "selected"; } ?>>38</option>
					<option value="40" <?php if(AUTO_AMOUNT =='40'){ print "selected"; } ?>>40</option>
					<option value="42" <?php if(AUTO_AMOUNT =='42'){ print "selected"; } ?>>42</option>
					<option value="44" <?php if(AUTO_AMOUNT =='44'){ print "selected"; } ?>>44</option>
					<option value="46" <?php if(AUTO_AMOUNT =='46'){ print "selected"; } ?>>46</option>
					<option value="48" <?php if(AUTO_AMOUNT =='48'){ print "selected"; } ?>>48</option>
					<option value="50" <?php if(AUTO_AMOUNT =='50'){ print "selected"; } ?>>50</option>		
					<option value="100" <?php if(AUTO_AMOUNT =='100'){ print "selected"; } ?>>100</option>
					<option value="150" <?php if(AUTO_AMOUNT =='150'){ print "selected"; } ?>>150</option>
					<option value="200" <?php if(AUTO_AMOUNT =='200'){ print "selected"; } ?>>200</option>			
		</select>
		<div class="tip">Select the amount of members you wish to appear online when someone views the website and noone is actually online.</div>	</li>
	
	</div></ul>
	<br> 

  	<ul class="form"><div class="box_body">

	
	<li><label>Copyright Text</label><input type="text" value="<?=D_CCTEXT ?>" name="cctext" class="input" style="width:550px;"><div class="tip">Enter your copyright text above to display on your website footer.</div></li>
 
	
	</div></ul>
	<br> 

	<ul class="form"><div class="box_body">
	
 
 	<li><label> MD5 Member Passwords</label><select name="md5" style="width:100px;" class="input"><option value="1" <?php if(D_MD5 ==1){ print "selected";} ?>><?=$admin_selection[1] ?></option><option value="0" <?php if(D_MD5 ==0){ print "selected";} ?>><?=$admin_selection[2] ?></option></select><div class="tip">If you would prefer to run your website without md5 passwords then disable this option here. NOTE. You must do this before any members join your website otherwise if you change it half way through all members who have signup will NOT be able to login.</div></li>		
 

 	</div></ul>

      <input name="submit2" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">
	 
</form>
  	  
<?php } ?>