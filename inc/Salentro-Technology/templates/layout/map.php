<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<div class="TopMap"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>
<p><?=$PageDesc ?></p>

 
<style>
h3 { font-size:20px; height:40px; margin-top:10px;}
ul.Acc_Heading_List { padding:5px;}
.Acc_Heading_List li a { margin-left:0px;}
</style>









<br>
<table width="650"  border="0" align="center">
  <tr valign="top" bgcolor="#999999">
    <td height="28" colspan="2">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td width="329" height="44">

<? if(D_ACCOUNT ==1){ ?>
<h3><?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_account'] ?></h3>
<?=BuildPageHomeMenu($LANG_ACCOUNT_MENU, "account") ?>
 <? } ?>

<h3><?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_settings'] ?> </h3>
<?=BuildPageHomeMenu($LANG_SETTINGS_MENU, "settings") ?>
 

<? if(D_MATCHTESTS ==1){ ?>
<h3><?=$LANG_SETTINGS_MENU['settings'] ?> </h3>
<?=BuildPageHomeMenu($LANG_MATCH_MENU, "matches") ?> 
 <? } ?>

<? if(D_GROUPS ==1){ ?>
<h3><?=$GLOBALS['_LANG']['_groups'] ?> </h3>
<?=BuildPageHomeMenu($LANG_GROUPS_MENU, "groups") ?>
<? } ?>

</td><td width="261">

<? if(D_MESSAGES ==1){ ?>
<h3><?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_messages'] ?> </h3>
<?=BuildPageHomeMenu($LANG_MESSAGES_MENU, "messages") ?>
 <? } ?>

<? if(UP_PHOTO ==1){ ?>
<h3><?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_albums'] ?> </h3>
<?=BuildPageHomeMenu($LANG_GALLERY_MENU, "gallery") ?> 
<? } ?>

<? if(D_EVENTS ==1){ ?>
<h3><?=$GLOBALS['_LANG']['_events'] ?> </h3>
<?=BuildPageHomeMenu($LANG_EVENTS_MENU, "events") ?> 
<? } ?>

<? if(D_GAMES ==1){ ?>
<h3><?=$lang_main_menu['games&sub=search'] ?> </h3>
<?=BuildPageHomeMenu($LANG_1GAME_MENU, "games") ?>
 <? } ?>



</td></tr><tr valign="top" bgcolor="#999999"><td height="28" colspan="2">&nbsp;</td></tr><tr valign="top"><td height="44">


<? if(D_CLASSADS ==1){ ?>
<h3><?=$lang_main_menu['classads'] ?></h3>
<?=BuildPageHomeMenu($LANG_CLASSADS_MENU, "classads") ?>
<? } ?>

<? if(D_MUSIC ==1){ ?>
<h3><?=$GLOBALS['_LANG']['_music'] ?></h3>
<?=BuildPageHomeMenu($LANG_MUSIC_MENU, "music") ?> 
<? } ?>

</td><td>
<? if(D_VIDEOS ==1){ ?>
<h3><?=$GLOBALS['_LANG']['_videos'] ?></h3>
<?=BuildPageHomeMenu($LANG_VIDEO_MENU, "videos") ?> 
<? } ?>

<? if(D_BLOG ==1){ ?>
<h3><?=$lang_main_menu['blog&sub=search'] ?></h3>
<?=BuildPageHomeMenu($LANG_BLOG_MENU, "blog") ?> 
<? } ?>

</td>  </tr></table>
