<?php
$icon_pic=0;
?>
<style>
.ititle { font-size:12px; background:#eeeeee; clear:both; font-weight:bold;}
 #QuickMenu { width:200px; margin-left:20px;}
</style>

 
 <div id="QuickMenu">

<?
$pos = strpos(KEY_ID, "TRIAL_");
if ($pos === false) { }else{
$days = (strtotime($_SESSION['trial_startdate']) - strtotime(date("Y-m-d"))) / (60 * 60 * 24)+10;
if($days ==0){ $days=10; }
?>
<div style="background:#FFB3B2; margin-bottom:20px; padding:5px;  border:1px solid #900000;">
<b>eMeeting Trial Software</b>
<p><?=$days; ?> Days Remaining: <a href="http://datingscripts.co.uk/buy-dating-software/" target="_blank" style="text-decoration:underline;">Upgrade Now</a></p>
</div>

<? } ?>

 <div class="PaddingBox" style="height:60px;">

<div style="background:#EBFFFF; margin-bottom:20px; padding:5px; height:50px;">
 <span style="float:left; width:55px;"><?php if($_SESSION['admin_super_user'] =="yes"){ ?> <img src="inc/images/avatars/1.gif" width="40" height="40"><?php }else{ ?><img src="inc/images/avatars/<?=$_SESSION['admin_icon'] ?>" width="40" height="40">
	  <?php } ?></span>
<span style="float:left; line-height:25px;">
<b><?=$_SESSION['admin_name'] ?></b><br>
<a href="<?php if($_SESSION['admin_super_user'] !="yes"){ ?>admins.php?p=pref<?php }else{ ?>admins.php?p=super<?php } ?>" ><?=$admin_layout['3'] ?></a>
</span>
</div>
</div>

<?php if(isset($PageLang[$_GET['p'].'_?']) && $PageLang[$_GET['p'].'_?'] !=""){ ?>
<div class="PaddingBox" style="height:30px; background:#FFE1E7;">
<div id='GoBackButton'><a href='javascript:history.go(-1);'><img src="inc/images/24x24/logout.png" align="absmiddle"> Cancel Changes</a></div> 
</div>
<?php } ?>

<div class="PaddingBox"  style="background:#E9FDFF">

 <?php if(isset($AdminPluginMenu) && is_array($AdminPluginMenu)){ ?>
	<ul class="menu_ul">
	<p class="mtitle">Plugin Content</p>
	<?php 	foreach($AdminPluginMenu as $key => $value){ ?>
	
	<li><a href="plugins.php?show=1&dll=<?=$key ?>"><?=$value ?></a></li>
	
	<?php } ?>
<?php } ?>	
	
	</ul><br>
	
	<ul class="menu_ul">
	
	<p class="mtitle">Navigation</p>
	
	<?=MakeMenuBar($PageLang,"side") ?>
	
 

	<?php  if(isset($conf)){ foreach ($conf->categories() as $cat) if ($cat && count($conf->plugins($cat))) {  ?> 
			<li>  <a href="plugins.php?cfg=plugins&amp;cat=<?=$cat ?>" class="p42"> <img src="inc/images/icons/resultset_next.png" align="absmiddle"> <?=$cat ?></a></li>
	<?php } }  ?>
	</ul>
	

 
	

</div>
</div>