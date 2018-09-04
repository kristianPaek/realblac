<?
/**
* Page: MEMBER SETTINGS AND PRIVACY PAGE
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  inc/func/func_settings_page.php & func_settings.php
*/
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>
<center><font size="2">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">Inbox</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=search&view_page=1">Online Now</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=overview&sub=viewed">Viewed Me</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">Winked Me</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">My Favorites</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">My Photos</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">My Profile</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">Subscription</A> | <a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Settings</a> | <a href="http://www.realblacklove.com/blog">Dating Blog</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font><br /></center>
<? if($show_page =="home"){ 

	 /**
	 * Page: Settings Options
	 *
	 * @version  9.0
	 */

?>


<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"><div style="padding:10px;font-weight:bold;"> <h3 style="padding:0px; margin:0px;"></h3>
</div>
<b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="margin-left:0px;">


<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>


<br><br>
</div>
<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>


<div class="ClearAll"></div>



<? }elseif($show_page=="settings"){ 

	 /**
	 * Page: Match Settings
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>



<? if(!empty($match_settings_array)){ ?>


<form method="POST" name="MemberSearch1" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1">               
<input name="do" type="hidden" value="add" class="hidden">            
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">
<div id="OldMatch"><ul class="form"><div class="CapBody"> 
		<? foreach($match_settings_array as $Match){ ?>		
			<li><label><?=$Match['caption'] ?></label><input type="input" value="<?=$Match['value'] ?>" disabled></li>
		<? } ?>	
	 <li> <?=MatchCount() ?> <?=$GLOBALS['_LANG']['_results'] ?></li>	
      <li> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/menu.gif" align="absmiddle"> <a href="#" onclick="toggleLayer('NewMatch'); toggleLayer('OldMatch'); return false;"><?=$GLOBALS['_LANG']['_edit'] ?></a> </li>
	  <li><input  class="MainBtn" type="submit" value="<?=$GLOBALS['_LANG']['_search'] ?>"></li>
	</div>
	</ul>
</div>
<input type="hidden" name="Extra[match]" value="1">
</form>

<? } ?>

<div style="<? if(empty($match_settings_array)){ ?><? }else{ ?>display:none<? } ?>" id="NewMatch">

<div class="menu_box_title1"><?=$GLOBALS['LANG_MATCH']['a1'] ?></div>
<div class="menu_box_body1">
<form method="post" action="<?=DB_DOMAIN ?>index.php" name="MemberSearch">               
<input name="do" type="hidden" value="settings" class="hidden">            
<input name="do_page" type="hidden" value="settings" class="hidden">
<input name="sub" type="hidden" value="settings" class="hidden">
	<ul class="form">   
	<div class="CapBody"> 
		<?=DisplayExtraFields() ?>
		<li><input  class="MainBtn"  type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>"></li>
		<li> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/alert.gif" align="absmiddle"> <a href="javascript:void(0);" onclick="toggleLayer('NewMatch'); toggleLayer('OldMatch'); return false;"><?=$GLOBALS['_LANG']['_cancel'] ?></a> </li>
	</div>
	</ul>
</form>
</div>
</div>




<? }elseif($show_page=="privacy"){ 

	 /**
	 * Page: Settings Privacy Page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<form method="post" action="<?=DB_DOMAIN ?>index.php">
<input name="do" type="hidden" value="privacy" class="hidden">
<input name="time" type="hidden" value="0" class="hidden"> 
<input name="counter" type="hidden" value="no" class="hidden">
<input name="lang" type="hidden" value="english" class="hidden"> 
<input name="do_page" type="hidden" value="settings" class="hidden">
<input name="sub" type="hidden" value="privacy" class="hidden">
<input name="pView" type="hidden" value="all" class="hidden">

<ul class="form"><div class="CapBody">

<li><label><?=$GLOBALS['LANG_SETTINGS']['a34'] ?></label> 
		<select name="im">
		<option value="yes" <? if($privacy_data['IM'] == "yes"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_yes'] ?></option>
		<option value="no" <? if($privacy_data['IM'] == "no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option>
		</select>
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a37'] ?></div>
	</li>
	

	<li><label><?=$GLOBALS['LANG_COMMON']['34'] ?></label>
<?

$access_data = explode("*",$privacy_data['Time Zone']);
$access_array = array();
	foreach($access_data as $value){		
		array_push($access_array,$value);
	}


?>
<select name="access[]" size="1"  multiple class="input" style="height:150px; width:350px">
<option value="0" <? if( in_array(0,$access_array) ){ print "selected"; } ?>>------</option>
 <?
	$gg = $DB->Query("SELECT fvCaption, fvid FROM `field_list_value` WHERE fvFid =28 AND lang='".D_LANG."'");
	if(empty($gg)){	$gg = $DB->Query("SELECT fvCaption, fvid FROM `field_list_value` WHERE fvFid =28");	}
	while( $G = $DB->NextRow($gg) ){
	
?>
          <option value="<?=$G['fvid'] ?>" <? if( in_array($G['fvid'],$access_array) ){ print "selected"; } ?>><?=$G['fvCaption'] ?></option>
          <? } ?>
        </select>
<div class="tip"><?=$GLOBALS['LANG_COMMON']['35'] ?></div>
	</li>

<li><input type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>
</div>
</ul>	

<? if(D_SKYPE ==1){ ?>
<ul class="form"><div class="CapBody">
	<li><label><?=$GLOBALS['_LANG']['_skype1'] ?></label> 

 
	<input name="skype" type="text" value="<?=$privacy_data['skype'] ?>" size="40" class="input" maxlength="200">	 
			<div class="tip"><?=$GLOBALS['_LANG']['_skype2'] ?></div>	
	</li>

</div>

<li><input type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>

</ul>	
<? } ?>









<? }elseif($show_page=="alerts"){ 

	 /**
	 * Page: Settings Email Alerts Page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<form method="post" action="<?=DB_DOMAIN ?>index.php">
<input name="do" type="hidden" value="email_alerts" class="hidden">
<input name="do_page" type="hidden" value="settings" class="hidden">
<input name="sub" type="hidden" value="alerts" class="hidden">

<ul class="form"><div class="CapBody">
<li>	
	<label><?=$GLOBALS['LANG_SETTINGS']['a17'] ?></label> 
    <input name="email" type="text" value="<?=$privacy_data['email'] ?>" size="40" class="input" maxlength="200">
	<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a18'] ?></div>
</li>
<li>	
		<label><?=$GLOBALS['LANG_SETTINGS']['a19'] ?></label>
		<select name="alert1"><option value="yes"><?=$GLOBALS['_LANG']['_yes'] ?></option><option value="no" <? if($privacy_data['email_msg'] =="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option></select> 
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a20'] ?></div>
</li>	

<? if (D_WINK == 1) { ?>
<li>
		<label><?=$GLOBALS['LANG_SETTINGS']['a21'] ?></label> <select name="alert2"><option value="yes"><?=$GLOBALS['_LANG']['_yes'] ?></option><option value="no" <? if($privacy_data['email_winks'] =="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option></select> 
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a22'] ?></div>
</li>
<? } ?>

<? if (D_FRIENDS == 1) { ?>
<li>
		<label><?=$GLOBALS['LANG_SETTINGS']['a23'] ?></label> <select name="alert3"><option value="yes"><?=$GLOBALS['_LANG']['_yes'] ?></option><option value="no" <? if($privacy_data['email_friends'] =="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option></select>
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a24'] ?></div>
</li>
<? } ?>




	<li><input type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>
</div>
</ul>
</form>




<form method="post" action="<?=DB_DOMAIN ?>index.php"  onSubmit="return CheckNulls2('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');">
<? if(ADMIN_DEMO !="yes"){ ?>
<input name="do" type="hidden" value="password" class="hidden">
<input name="do_page" type="hidden" value="settings" class="hidden">
<input name="sub" type="hidden" value="password" class="hidden">
<? }else{ ?>
Disabled in demo mode.
<? } ?>
	<ul class="form"><div class="CapBody">	                        
		<li><label><?=$GLOBALS['_LANG']['_current']." ".$GLOBALS['_LANG']['_password'] ?>: </label><input class="input" name="cpassword" type="password" id="b1">
		</li>
		<li><label><?=$GLOBALS['_LANG']['_new']." ".$GLOBALS['_LANG']['_password']; ?>: </label><input class="input" name="npassword" type="password" id="b2">
		</li>
		<li><input type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>
	</div>
	</ul>

</form>














<? }elseif($show_page=="password"){ 

	 /**
	 * Page: Settings Change Password Page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>





<form method="post" action="<?=DB_DOMAIN ?>index.php"  onSubmit="return CheckNulls2('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');">
<? if(ADMIN_DEMO !="yes"){ ?>
<input name="do" type="hidden" value="password" class="hidden">
<input name="do_page" type="hidden" value="settings" class="hidden">
<input name="sub" type="hidden" value="password" class="hidden">
<? }else{ ?>
Disabled in demo mode.
<? } ?>
	<ul class="form"><div class="CapBody">	                        
		<li><label><?=$GLOBALS['_LANG']['_current']." ".$GLOBALS['_LANG']['_password'] ?>: </label><input class="input" name="cpassword" type="password" id="b1">
		</li>
		<li><label><?=$GLOBALS['_LANG']['_new']." ".$GLOBALS['_LANG']['_password']; ?>: </label><input class="input" name="npassword" type="password" id="b2">
		</li>
		<li><input type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>
	</div>
	</ul>

</form>





















<? }elseif($show_page=="sms" && UPGRADE_SMS =="yes"){ 

	 /**
	 * Page: Settings SMS Alerts Page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<form method="post" action="<?=DB_DOMAIN ?>index.php">
<input name="do" type="hidden" value="sms_alerts" class="hidden">
<input name="do_page" type="hidden" value="settings" class="hidden">
<input name="sub" type="hidden" value="sms" class="hidden">

<ul class="form">

<div class="CapBody">
<li>	
		<label><?=$GLOBALS['LANG_SETTINGS']['a2'] ?></label> 
      	<input name="smsnum" type="text" value="<?=$privacy_data['SMS_number'] ?>" size="40" maxlength="20">
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a3'] ?></div>
</li>

<li>	
		<label><?=$GLOBALS['_LANG']['_country'] ?></label><SELECT name="sms_country"><?=DisplayCountries($privacy_data['SMS_country']) ?> 
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a5'] ?></div>
</li>
<li>	
		<label><?=$GLOBALS['LANG_SETTINGS']['a6'] ?></label> 
		<select name="sms_msg_alert">
		<option value="on"><?=$GLOBALS['_LANG']['_yes'] ?></option>
		<option value="off" <? if($privacy_data['SMS_email'] =="off"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option>
		</select>
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a9'] ?></div>
</li>	

<? if (D_WINK == 1) { ?>
<li>	
		<label><?=$GLOBALS['LANG_SETTINGS']['a10'] ?></label> 
		<select name="sms_wink_alert">
		<option value="on"><?=$GLOBALS['_LANG']['_yes'] ?></option>
		<option value="off" <? if($privacy_data['SMS_wink'] =="off"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option>
		</select>
		<div class="tip"><?=$GLOBALS['LANG_SETTINGS']['a11'] ?></div>
</li>
<? } ?>

<li> 
		<strong> <?=$GLOBALS['LANG_SETTINGS']['a12'] ?> <?=$privacy_data['SMS_credits'] ?> <?=$GLOBALS['LANG_SETTINGS']['a13'] ?> </strong> 
		<? if(D_FREE =="no"){ ?><br><a href="<?=DB_DOMAIN ?>index.php?dll=subscribe"><?=$GLOBALS['LANG_SETTINGS']['a14'] ?></a> <? } ?>
</li>
<li><input type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>
</div>
</ul>
</form>

<? } ?>


