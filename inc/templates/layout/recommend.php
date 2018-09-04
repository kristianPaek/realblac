<?
/**
* Page: INVITE A FRIEND
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  inc/func/func_invite.php
*/
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );
if(D_RECOMMEND !=1){ die( 'Restricted access' ); }
?>

<div class="TopInvite"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span>Recommend Me</span></div><p>Recommend this member to your friends. Simply complete the fields below and we will notify your friends about this member.</p>

 

<? if(!isset($show_page)){ 


	 /**
	 * Page: Invite Friend
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<div id="eMeeting" class="user">

  <div class="header account_tabs">

	<ul>
	 	<li class="selected"><a href="javascript:void(0)" onclick="toggleLayer('step_2'); toggleLayer('step_1');"><span>Recommend Member</span></a></li>
    </ul>

    <div class="ClearAll"></div>
 </div>
</div>


<div style="display:visible;" id="step_1">


<ul class="form"><div class="CapBody">
<form method="post" action="<?=DB_DOMAIN ?>index.php" onSubmit="return CheckNullsContact('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');">                
<input name="do" type="hidden" value="send" class="hidden">  
<input type="hidden" value="<?=$GLOBALS['_LANG_ERROR']['_inviteMsg'] ?> <?=DB_DOMAIN ?> " id="C3" name="message">          
<input name="do_page" type="hidden" value="recommend" class="hidden">
<? if(isset($_GET['pid']) && is_numeric($_GET['pid'])){ ?>
<input name="pid" type="hidden" value="<?=strip_tags($_GET['pid']) ?>" class="hidden">
<? } ?>
<input type="hidden" name="SendMessage" value="I have found this interesting member profile that i thought you would be interested in.">
<li><label>Your Name: </label> <input id="C1" name="name" type="text" value="<? if(isset($_POST['name'])){ print eMeetingOutput($_POST['name']); } ?>" size="40" class="input"></li>
<li><label>Your Email: </label> <input id="C2" name="email" type="text" value="<? if(isset($_POST['email'])){ print eMeetingOutput($_POST['email']); } ?>" size="40" class="input">		</li>

<? if(is_array($msg_friends)){ ?>
<li><label>Send to my friend:</label>
 <div style="padding-left: 250px;line-height:40px;">
	<? $i=1; foreach($msg_friends as $value){  ?>
 <input type="hidden" name="di<?=$i ?>" value="<?=$value['uid'] ?>">
         <input name="d<?=$i ?>" type="checkbox" value="on" style="margin-right:20px;border:0px;"> <img src="<?=$value['image'] ?>" width="40" height="40" align="absmiddle">   <?=$value['username'] ?><br />
     <? $i++;} ?>    
	</div>
</li>
<input type="hidden" name="total" value="<?=$i ?>">
<? } ?>

<li><label><?=$GLOBALS['_LANG']['_message'] ?>: </label></li><li> <textarea  disabled cols="50" rows="3" class="input" style="width:576px;height:100px;">I have found this interesting member profile that i thought you would be interested in. </textarea></li>      




<? if(D_REGISTER_IMAGE ==1){ ?><li><label><?=$GLOBALS['_LANG']['_verification'] ?>:</label> <input type="text" id="C4" name="code" class="input"><br>
<img name="Verification Image" src="<?=DB_DOMAIN ?>inc/classes/class_regimg_img.php?regen=y&<? echo time(); ?>"></li><? } ?>
<li><input type="submit" value="Send Recommendation" class="MainBtn" style="margin-left:230px;"></li>          
</form>
</div>
</ul>	








</div>









 
<? } ?>