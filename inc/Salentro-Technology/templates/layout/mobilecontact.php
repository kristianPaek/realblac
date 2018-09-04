<?
/**
* Page: CONTACT FORM FOR SENDING CONTACT MESSAGES
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  inc/func/func_contact.php
*/
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );


$ipi = getenv("REMOTE_ADDR");


?>
<img src="/mobileheader.png" width="300">
<style>
ul.form li .tip {  border:0px;}

.CapBody { padding: 1px;  margin-bottom:15px; }
ul.form textarea { width:280px;}
ul.form label { display: block; float: left; text-align: left; padding: 0 10px 0 0; width: 280px; margin: 5px 0 0 0; font-size:110%; color:#333333; }

</style>

<div class="TopContact"><div style="float:left;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><p><?=$PageDesc ?></p>


<ul class="form">   
<div class="CapBody">
<form method="post" action="<?=DB_DOMAIN ?>mobile.php" onSubmit="return CheckNullsContact('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');">                
<input name="do" type="hidden" value="send" class="hidden">            
<input name="do_page" type="hidden" value="mobilecontact" class="hidden">

<input type="hidden" name="ipaddress" value="<?php echo $ipi ?>" >

<li><label><?=$GLOBALS['_LANG']['_name'] ?>: </label> <input maxlength="100" id="C1" name="name" type="text" style="width:260px;" value="<? if(isset($_POST['name'])){ print eMeetingOutput($_POST['name']); } ?>" size="40" class="input"></li>
<li><label><?=$GLOBALS['_LANG']['_email'] ?>: </label> <input maxlength="150" id="C2" name="email" type="text" style="width:260px;" value="<? if(isset($_POST['email'])){ print eMeetingOutput($_POST['email']); } ?>" size="40" class="input"></li>
<li><label>Message: </label></li><li> <textarea id="C3" name="message" cols="50" rows="3" class="input" style="width:280px;height:140px;"><? if(isset($_POST['message'])){ print eMeetingOutput($_POST['message']); } ?></textarea></li>      
<? if(D_REGISTER_IMAGE ==1){ ?><li><label><?=$GLOBALS['_LANG']['_verification'] ?>:</label> <input type="text" name="code" id="C4" class="input"><br><img name="Verification Image" src="<?=DB_DOMAIN ?>inc/classes/class_regimg_img.php?regen=y&<? echo time(); ?>"></li><? } ?>
<li><input type="submit" value="<?=$GLOBALS['_LANG']['_submit'] ?>" class="MainBtn" style="margin-left:60px;"></li>          
</form>
</div>
</ul>		