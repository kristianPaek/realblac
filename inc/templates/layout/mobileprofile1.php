<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

if(isset($BLOCKPAGEACCESS)){ print $GLOBALS['_LANG_ERROR']['_waitingApproval']; }else{ ?>

<? 
## PRIVACY SETTNGS OPTION TO BLOCK MEMBERS / NONE FRIENDS FRM VIEWING PROFILE BLOCKS
if(isset($MyProfileGlobals['profile_viewnonefiends']) || isset($MyProfileGlobals['profile_viewfriends']) ){

// AM I A FRIEND OR NOT?
$whoami = $DB->Row("SELECT DISTINCT count(members.id) AS total FROM members_network,members  WHERE ( ( ( members.id = members_network.to_uid AND members_network.uid='".$_SESSION['uid']."' )  OR  ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' ) ) AND members_network.type= ( '2' ) )");
if($whoami['total'] > 0){
	$ThisArray =$MyProfileGlobals['profile_viewfriends'];
}else{
	$ThisArray =$MyProfileGlobals['profile_viewnonefiends'];
}

$profile1_data = explode("*",$ThisArray);
$profile1_array = array();
	foreach($profile1_data as $value){		
		array_push($profile1_array,$value);
	}
} 

?>


<style>
.marginTop{	 margin-top:15px; } 
.profile_box_body {	padding:5px;	overflow:hidden; }
.profile_box_title { padding:5px; 	font-size:12px;}
.pImage { float:left; width:70px; height:75px; margin-right:23px;}
.pImageBorder { border:3px solid #eee;}
.pImageUsername { font-size:11px; font-weight:bold; text-align:center}

#Profile_MainBar h1 { font-size:13px; font-weight:bold; padding:0px; margin:0px; }
 
</style>
<input type="hidden" name="hiddenProfileStatus" id="hiddenProfileStatus" value="ShowProfileData">

<? if($MyProfileGlobals['ThisApproved'] !='active' && isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes222"){ ?>

	<div id="messages"><div style="" class="message-good">
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png" align="absmiddle"> <?=$GLOBALS['_LANG_ERROR']['_waitingApproval']; ?>
				
		<span id="Approvediv_<?=$profileId ?>"> [ <a href="javascript:void(0)" onClick="AdminLiveApprove('<?=$profileId ?>', 'profile', ''); Effect.Fade('Approvediv_<?=$profileId ?>'); return false;" style="text-decoration:none">
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_on.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_approve'] ?> </a> ] </span>
		
		
		[ <a href="javascript:void(0)" onClick="AdminLiveDelete('<?=$profileId ?>', 'profile', ''); Effect.Fade('ProfileHead'); return false;" style="text-decoration:none">
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_delete'] ?> </a> ]
		

	</div></div>

<?   } ?>

<? if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes222"){ ?>

<div id="messages"><div style="" class="message-good">
<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/wrench.png" align="absmiddle"> <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileaccount&sub=edit&id=<?=$profileId ?>"> [ Edit Profile ] </a>

	<? if($_GET['sub'] =="blogview"){ ?>
	<a href="#" onclick="EditBlogPost('<?=$_GET['item2_id'] ?>'); return false;"> [ Edit Blog ]</a>
	<? } ?>
</div>
</div>
<? } ?>




















<img src="/mobileheader.jpg">

<div id="ProfileHead22">



<table width="310" border="0" cellpadding="0" cellspacing="0"><tr><td width="310" valign="top" style="height:121px;">

		

 


<div class="ClearAll"></div>
<div style="background:white; width:310px; min-height:1px" id="Profile_MainBar">

 

<? if($show_page=="overview"){

/**
* Info: Profile Overview Page 
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/
?>

<div class="profile_box_title marginTop" >
  
		<span class="goL">
		  </span>
		  <div class="ClearAll"></div>
  
</div>


<div class="profile_box_body ">
 <table width="100%"  border="0">


  

  <tr>
    <td width="30%"><strong>Username</strong></td>
    <td width="70%"> <?=substr($profileUsername,0,30) ?> </td>
  </tr>
<? if($MyProfileGlobals['gender'] != 2710){ ?>
  <tr>
    <td><strong><?=$GLOBALS['_LANG']['_details'] ?></strong></td>
    <td> <?=$MyProfileGlobals['age'] ?> <?=$GLOBALS['_LANG']['_yold'] ?> <? if(D_STARSIGN ==1){ ?> (<?=$MyProfileGlobals['starsign'] ?>)<? } ?> <?=$MyProfileGlobals['MyGender'] ?> </td>
  </tr>
<? } ?>
  <tr>
    <td><strong>Reside in</strong></td>
    <td> <?=$MyProfileGlobals['location'] ?>  </td>
  </tr>

 <tr>
    <td><strong><?=$GLOBALS['_LANG']['_membership'] ?></strong></td>
    <td>  <?=$MyProfileGlobals['name'] ?> </td>
  </tr>

  <tr>
    <td colspan=2>  <p style="font-size:11px;"><?=$GLOBALS['_LANG']['_lastLogin']?> <?=showTimeSince($MyProfileGlobals['lastlogin']) ?></p> </td>
  </tr>


  




</table>

</div>










<?


/**
* Info: Displays profile sidebar information
* 		
* @version  9.0
*/

?>


<br>

<div id="Profile_SideBar" style="border:0px;">
<div id="ProfileOptionsBox">
 



	<span id="profile_responce_span"></span>
	<? if(1 != 2){ 
	//if($_SESSION['uid'] !=$profileId){ 
	?>
 
	
	<? if($show_page=="overview"){ ?>


	
	
		<h1><?=$GLOBALS['LANG_GLO_OPTIONS']['1'] ?></h1><br>
		<?php
		//echo "<pre>";
		//print_r($_SESSION);
		?>
		<center>
        <?php
		//echo "<pre>";
		//print_r($_SESSION);
		//die;
		?>
		<p id="winkp"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/eyelash-16.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("wink-messages",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> 
        
        href="javascript:void(0)" onclick="sendwink('<?=$_SESSION['uid']?>','<?=$profileUsername ?>');" 
		
		
		<? }else{ ?> href="<?=DB_DOMAIN ?>mobile.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>mobile.php" <? } ?>  class="pLink"><?=$GLOBALS['LANG_COMMON'][42] ?></a></p><hr>
        
        
        
		<p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/email.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("messages-create",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="<?=DB_DOMAIN ?>mobile.php?dll=mobilemessages&sub=create&n=<?=$profileUsername ?>" <? }else{ ?> href="<?=DB_DOMAIN ?>mobile.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>mobile.php" <? } ?>  class="pLink"><?=$GLOBALS['LANG_COMMON'][9] ?></a></p><hr>
		<? if(D_WINK ==222){ ?><p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/emoticon_smile.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-wink",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="javascript:void(0);" onclick="openQuickWink(<?=$profileId ?>,'<?=$profileUsername ?>','<?=$MyProfileGlobals['image'] ?>'); return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>mobile.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>mobile.php?dll=login" <? } ?>class="pLink"><?=$GLOBALS['LANG_COMMON'][10] ?></a></p><hr>
        </center>
<? } ?>

<? 
if($_SESSION['auth'] =="yes"){
	$myalert = $GLOBALS['_LANG']['_updated'];
}
else {
	$myalert = "You must login to use this feature";
}
?>



		<? if(D_FRIENDS ==1){ ?><p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/female.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,2);alert('<?=$myalert ?>'); return false;"><?=$GLOBALS['LANG_COMMON'][13] ?></a></p><hr><? } ?>
		<? if(D_HOTLIST ==1){ ?><p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/heart.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,1); alert('<?=$myalert ?>');return false;"><?=$GLOBALS['LANG_COMMON'][12] ?></a></p><hr><? } ?>
		<? if(D_PARTNER ==1){ ?><p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,5); alert('<?=$myalert ?>'); return false;"><?=$GLOBALS['LANG_COMMON'][16] ?></a> </p><hr><? } ?>

		<? if(D_FOLLOW ==1 && isset($MyProfileGlobals['follow_approve']) && $MyProfileGlobals['follow_approve'] =="yes"){ ?><p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,8); alert('<?=$myalert ?>'); return false;">Follow Me (<?=GetFriendCounter(8); ?> followers)</a> </p><hr><? } ?>

		<? if(D_RECOMMEND ==222){ ?> <p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/check.gif" width="16" height="16" align="absmiddle"> <a href="index.php?dll=recommend&pid=<?=$profileId ?>" class="pLink">Recommend to a friend</a></p><hr><? } ?>
		<? if(D_FRIENDS ==1){ ?><p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,3); alert('<?=$myalert ?>'); return false;"><?=$GLOBALS['LANG_COMMON'][14] ?></a></p><hr><? } ?>
		<? } ?>

   <? } ?>
		</div>
	
		<div style="min-height:2px; background:white; display:block;">
	
		<? if($show_page !="overview"){ ?>

		<h1 style="margin-top:10px;width:205px;"><?=$GLOBALS['LANG_GLO_OPTIONS']['1'] ?></h1><br>
		<p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$profileId ?>"><?=$GLOBALS['LANG_COMMON'][11] ?> </a></p><hr>
		<p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/email.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("messages-create",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$profileUsername ?>" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>  class="pLink"><?=$GLOBALS['LANG_COMMON'][9] ?></a></p><hr>
		<? if(D_WINK ==1){ ?><p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/emoticon_smile.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-wink",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="javascript:void(0);" onclick="openQuickWink(<?=$profileId ?>,'<?=$profileUsername ?>','<?=$MyProfileGlobals['image'] ?>'); return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?> class="pLink"><?=$GLOBALS['LANG_COMMON'][10] ?></a></p><hr><? } ?>

		<? } ?>

		
	
		<? if(D_SKYPE ==222 && strlen($MyProfileGlobals['skype']) > 3 && $_SESSION['auth'] =="yes" && $show_page=="overview"){ ?>
		<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
		<p align="center"><a href="skype:<?=$MyProfileGlobals['skype'] ?>?call"><img src="http://download.skype.com/share/skypebuttons/buttons/call_green_white_153x63.png" style="border: none;" width="153" height="63" alt="My status" /></a></p><hr>
		<? } ?>
	
	
		

	
	

	<?

	
	if($show_page=="overview"){
	?>

	

	</div>

	<? } ?>


 </div>


















	    <div id="ShowProfileData" >
		<?
		
		/**
		* Info: Displays recent photos
		* 		
		* @version  9.0
		*/
		
		if(!empty($RecentPhotos)) {
		?>
	  <div class="profile_box_title marginTop">		<span class="goL">
		    <h1><?=$GLOBALS['LANG_COMMON'][23] ?></h1>
		  </span>
		  <span class="goR">
		    
		   
		  </span>
		  <div class="ClearAll"></div>
  
    </div>
  
	<div class="profile_box_body">
	  <div>
  
	</div>	  
	  <center>
	<? foreach($RecentPhotos as $value){ ?>	<img src="<?=$value['image'] ?>&x=300&y=450"  width="125" height="200">	<? } ?>	 
  </center>
	</div>
  
	<? } ?>
  

	  <?
	
	/**
	* Info: Displays description and textarea fields
	* 		
	* @version  9.0
	*/
	
	$show_events_array = DisplayRecentEvents(5,$profileId);
	$show_adverts_array = DisplayRecentAdverts(5,$profileId);



	foreach($profile_group_array as $value){

		if(isset($profile1_data) && is_array($profile1_data) ){
 
			if(!in_array($value['groupid'],$profile1_data)){

				print GetProfileData($profileId,$value['groupid'],2);
			}
		}
	 }
 ?>
 


<? if(D_FRIENDS ==1){ ?>

	<? 


	/**
	* Info: Displays member friends
	* 		
	* @version  9.0
	*/

	if(!empty($show_network_array)){ 	?>


	<div class="profile_box_title marginTop">
  
		<span class="goL">
		    <h1><?=$GLOBALS['LANG_COMMON'][3]?></h1>
		  </span>
		  <div class="ClearAll"></div>
  
    </div>

	<div class="profile_box_body">
	<div style="margin-left:10px; margin-top:10px;">

	<? if(!empty($show_network_array)){ foreach($show_network_array as $value){ ?> 
	<div class="pImage"><img src="<?=$value['image']; ?>" border="0" width="48" height="48" class="pImageBorder"><div class="pImageUsername"><?=$value['username']; ?></div></div>
	<? } }  ?>
	  
	<p><br><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&friendid=<?=$profileId ?>"><?=$GLOBALS['_LANG']['_friendsList'] ?></a></p>

	</div>	
	</div>

<? } ?>

	<div class="ClearAll"></div>


	  <? 
	}
	/**
	* Info: Displays description and textarea fields
	* 		
	* @version  9.0
	*/

 	foreach($profile_group_array as $value){

	if(isset($profile1_data) && is_array($profile1_data) ){
 
			if(!in_array($value['groupid'],$profile1_data)){
 ?>
  
	<div class="profile_box_title marginTop" id="DataBoxTitle<?=$value['groupid'] ?>">
  
		<span class="goL">
		    <h1><?=$value['caption'] ?></h1>
		  </span>
		  <span class="goR">
		     <? if($_SESSION['uid'] ==$profileId ){ ?><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileaccount&sub=edit" class="pLink"><?=$GLOBALS['_LANG']['_edit']?> </a> <? } ?>
		  </span>
		  <div class="ClearAll"></div>
  
    </div>
  
	<div class="profile_box_body" id="DataBoxBody<?=$value['groupid'] ?>">
   
   	<?

		 print GetProfileData($profileId,$value['groupid'],1); }

		
	 ?>
  
	</div>

<? }else{ ?>

	<div class="profile_box_title marginTop" id="DataBoxTitle<?=$value['groupid'] ?>">
  
		<span class="goL">
		    <h1><?=$value['caption'] ?></h1>
		  </span>
		  <span class="goR">
		     <? if($_SESSION['uid'] ==$profileId ){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=account&sub=edit" class="pLink"><?=$GLOBALS['_LANG']['_edit']?> </a> <? } ?>
		  </span>
		  <div class="ClearAll"></div>
  
    </div>
  
	<div class="profile_box_body" id="DataBoxBody<?=$value['groupid'] ?>">
   
   	<?
		 print GetProfileData($profileId,$value['groupid'],1); 
		
	 ?>
  
	</div>

  
<? } ?>
  

                 
	<? } ?>


	<?

	/**
	* Info: Displays member quizzes
	* 		
	* @version  9.0
	*/
	
	if((!empty($profile_tests) && D_MATCHTESTS ==222) || $_SESSION['uid'] ==$profileId && D_MATCHTESTS ==222){ 

	?>

	<div class="profile_box_title marginTop">

		<span class="goL">
			<h1><?=$GLOBALS['_LANG']['_quiz'] ?> <? if($_SESSION['uid'] ==$profileId ){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=test" class="pLink"><?=$GLOBALS['_LANG']['_edit']?> </a> <? } ?> </h1>
		</span>

		<div class="ClearAll"></div>

    </div>
 
	<div class="profile_box_body"> 
	<? if(!empty($profile_tests)){ foreach($profile_tests as $value){ ?>

 	<table width="100%"  border="0" align="center" style="border-bottom:1px dashed #999999;  font-size:11px;">
 	  <tr valign="top"><td width="18%" height="51">

	 
	
	<span style="font-weight:bold;display:block;font-size:13px;">
	<a <? if($_SESSION['auth'] =="yes"){ ?>href="javascript:void(0);" onClick="NewpopUpWin('<?=DB_DOMAIN ?>inc/exe/quiz/start.php?item_id=<?=$profileId ?>&item2_id=<?=$value['id'] ?>', 450, 300);return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>  class="pLink">
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_quiz/<?=$value['icon'] ?>.png" width="48" height="48" class="img_border">		</a>
	</span>
	
	</td>
	    <td width="82%" style="line-height:27px;">
		<a <? if($_SESSION['auth'] =="yes"){ ?>href="javascript:void(0);" onClick="NewpopUpWin('<?=DB_DOMAIN ?>inc/exe/quiz/start.php?item_id=<?=$profileId ?>&item2_id=<?=$value['id'] ?>', 450, 300);return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?> class="pLink">
	      <b><?=$value['title'] ?></b><br><?=$value['title'] ?>
	    </a></td>
 	  </tr></table>	
		
	
	<? } } ?>
	</div>
	
	<? } ?>





	<? 

	/**
	* Info: Displays follower updates
	* 		
	* @version  9.0
	*/

	if(D_FOLLOW ==1 && isset($MyProfileGlobals['follow_display']) && $MyProfileGlobals['follow_display'] =="yes"){ 

	?>

	<span id="response_comments" class="responce_alert"></span>


	<div class="profile_box_title marginTop">

		<span class="goL">
			<h1>My Follower Updates</h1>
		</span>
		<div class="ClearAll"></div>

    </div>

	<div class="profile_box_body">

	<?php	displayCommentsBox("310", "follow", "overview", $profileId, $profileId,0,0,false,true);	?>

	</div>

	<? } ?>


	<?
	/**
	* Info: Displays profile commnets
	* 		
	* @version  9.0
	*/
	if(D_COMMENTS ==222){
	?>
	
	<span id="response_comments" class="responce_alert"></span>


	<div class="profile_box_title marginTop">

		<span class="goL">
			<h1><?=$GLOBALS['_LANG']['_comments']?></h1>
		</span>
		<div class="ClearAll"></div>

    </div>

	<div class="profile_box_body">

	<? 
	/*
		PARAMERTS: 
		1: width of display box
		2: page
		3: sub page
		4: user created id
		5: item id
		6: extra id 1
		7: extra id 2
	*/
	displayCommentsBox("310", $page, $show_page, $MyProfileGlobals['uid'], $profileId,0,0) ?>
	
	
			
		</div>
  
	</div>


	<? } ?>


 	    <? }elseif($show_page=="blogview"){
	
	
	/**
	* Info: Profile Profile Details Page
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
	
	 ?>
	<br>
	    <div class="profile_box_title  marginTop">
	  
		<span class="goL">
			    <h1> <?=$BlogData['title']; ?> </h1>
		  </span>
	  
		<div class="ClearAll"></div>
	  
	    </div>
	    <div class="profile_box_body"><div class="ClearAll"></div>
 	  <div style="padding:10px;">
	  
	<img src="<? print $BlogData['photo']; ?>" style="float:left; padding-right:15px; padding-bottom:20px;" width="48" height="48">
  
	<b><?=$BlogData['title']; ?></b>
	<p><?=$GLOBALS['_LANG']['_date'] ?> <?=$BlogData['date']; ?> </p>
	  

	<div style="line-height:30px;"><?=$BlogData['comments']; ?></div>
		  
	<? 

	// ATTACHMENT ALBUM ATA
	if(isset($BlogData['attachment']) && $BlogData['attachment'] !=0){
 
		print GetAttachmentAlbum($BlogData['attachment']);

	}

	/*
		PARAMERTS: 
		1: width of display box
		2: page
		3: sub page
		4: user created id
		5: item id
		6: extra id 1
		7: extra id 2
	*/

	if(D_COMMENTS ==1){ 


	displayCommentsBox("280", $page, $show_page, $profileId, $BlogData['id'],eMeetingOutput($BlogData['title']),0) ?>
  
 	</div>
	<? } ?>
        </div>


	<form method="post" action="<?=DB_DOMAIN ?>index.php" name="EditBlog" id="EditBlog">
	<input type="hidden" id="eid" name="eid" value="0" class="hidden">
	<input type="hidden" id="sub" name="sub" value="add" class="hidden">
	<input name="do_page" type="hidden" value="blog" class="hidden">
	</form>

	<? }elseif($show_page=="manage"){ 
	
	/**
	* Info: Profile View Album Files
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
	
	
	?>
	
		<br>
	    <span id="response_gallery" style="color:red;font-weight:bold;font-size:15px"></span>
	
	    <div class="profile_box_title marginTop">
	  
		<span class="goL">
			    <h1> <?=$album_name ?>  <? if($album_date ==""){?> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> No Access! <? } ?></h1>
		  </span>
	  
		<div class="ClearAll"></div>
	  
	    </div>
	    <div class="profile_box_body">	    <div class="ClearAll"></div>	    <div  style="padding:10px;">
  
		 <? if($album_date ==""){ // album is empty ?>
		
		<p>There are either no photos available in this album or you do not have permission to view them.</p>
		<p><a href="index.php?dll=gallery&sub=search&fcid=<?=$profileId ?>">Click here to return to the album list.</a></p>
		
		<? }else{ ?>
  
	<p><?=$GLOBALS['_LANG']['_created'] ?> <?=$album_date ?> </p>
	  
	<? foreach($gallery_display_albums as $value){ ?>		
	  
	<table width="100%" height="62" border="0"  id="div_<?=$value['id'] ?>"><tr><td width="34%">
	  
	<? if($value['approved'] =="no"){ ?>
	  <img src="<?=$value['image'] ?>" style="max-height:135px; max-width:120px;" width="96" height="96">
	  <? }else{ ?>			
	  <a href="<?=$value['link'] ?>">
		  <img src="<?=$value['image'] ?>" style="max-height:135px; max-width:120px;" width="96" height="96">
	  </a>
	  <? } ?>
	  
	
	  
	
	 </td><td width="66%">
	  
	
	 <h3 style="line-height:40px;"><a href="<?=$value['link'] ?>"><?=$value['title'] ?></a></h3>
	  
	<? if(D_COMMENTS==1){ ?><span class="commentinfo"><a href="<?=$value['link'] ?>"><?=$value['comments'] ?> <?=$GLOBALS['_LANG']['_comments'] ?></a></span><? } ?>
	  
	<? if(D_PROFILERATING ==222){ ?><div id="post-ratings-232" class="post-ratings"><?=$value['rating_image'] ?><span> <?=$value['rating'] ?> % </span></div> <? } ?>		
	  

	<?
	## display delete functions for moderator
	if( ( isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes") || $_SESSION['uid'] ==$value['uid'] ){
				
	print '<br><a href="javascript:void(0)" onClick="DeleteFile(\''.$value['id'].'\');  
	Effect.Fade(\'div_'.$value['id'].'\'); return false;" style="text-decoration:none">
	<img src="'.DB_DOMAIN.'images/DEFAULT/_acc/cancel.png" align="absmiddle"> &nbsp '.$GLOBALS['_LANG']['_delete'].'</a>';

	}
	?>

	</td></tr></table> <hr>

	  <? } ?>		

	<? } ?>
	  
	    </div>
	   <? } ?>








 

	<? if($show_page=="viewfile" && $gallery_file_src !=""){ 
	
	/**
	* Info: Profile View Album File
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
	
	?>
	<script type='text/javascript' src="newadmin/inc/js/silverlight.js"></script>
	<script type='text/javascript' src="newadmin/inc/js/wmvplayer.js"></script>
	
	<script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/swfobject.js"></script>
	<script>
	var numAudioPlayers = 1; 
	
	function loadSWFObject(id, pathToFile, src, w, h, v, bgcolor) {
		var strName = "podcast" + id;
	
		var so = new SWFObject(src, strName, w, h, v, bgcolor);
				 so.addParam("name", strName);
				 so.addParam("allowScriptAccess", "sameDomain");
				 so.addVariable("podcastFile", pathToFile);
				 so.addVariable("id", id);
				 so.addVariable("numAudioPlayers", numAudioPlayers);
				 so.write(strName);
	}
	</script>	

		<div style="padding-top:20px;"><center><?=$gallery_file_src ?></center></div>
	
		<p style="margin-left:10px;font-size:11px;"> <?=$gallery_file_title ?></p>
		<div class="ClearAll"></div>
		<p style="padding:7px; background:#EBFAFB; border:1px solid #cccccc; margin-left:10px; margin-right:20px; font-weight:bold;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/pictures.png" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?>href="javascript:void(0);" onClick="NewpopUpWin('<?=DB_DOMAIN ?>inc/exe/slideshow/slideshow.php?id=<?=$profileId ?>', 550, 500);return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>><?=$GLOBALS['_LANG']['_slideshow'] ?></a></p>


	<?  if(!empty($my_image_array)){ ?>

	<!-- START EXTRA ALBUM IMAGES -->

		<div id="form_car3" style="margin-left:10px; margin-bottom:30px;">
		  <div class="previous_button"></div>  
		  <div class="container">
			<ul>
		   <?  foreach( $my_image_array as $value1){ ?> <li><a href="<?=$value1['link'] ?>"><img src="<?=$value1['image'] ?>" id="<?=$value1['filename'] ?>" width="48" height="48" style="cursor:pointer;"></a></li><? } ?>
			</ul>
		  </div>
		  <div class="next_button"></div>
		</div>
		<div class="ClearAll"></div>
	
	<script>function runTest() {        hCarousel = new UI.Carousel("form_car3");     }      Event.observe(window, "load", runTest); </script>
	<!-- END DISPLAY IMAGE -->
	
	<? } ?>


		<div style="margin-left:10px; margin-bottom:30px;"> 
	 



	<? if(D_COMMENTS ==1){ ?>
	<h3><?=$GLOBALS['_LANG']['_file'] ?> <?=$GLOBALS['_LANG']['_comments'] ?></h3>	
	
	<? 	displayCommentsBox("310", $page, $show_page, $profileId, $gallery_file_id,eMeetingOutput($gallery_file_title),0) ?>
	<br>
	<? } ?>

				  <div class="menu_box_title1">	<?=$GLOBALS['_LANG']['_information'] ?>	 </div>
				  <div class="menu_box_body1" style="line-height:30px;">
 
					
					<?=$GLOBALS['_LANG']['_title'] ?>:	<?=$gallery_file_title ?>					<br>
					<?=$GLOBALS['_LANG']['_description'] ?>					:
					<?=$gallery_file_description ?>					<br>					<?=$GLOBALS['_LANG']['_views'] ?>:		<?=$gallery_file_views ?>
					<br>
					<? if(D_PROFILERATING ==222){ ?> 
					<span id="responce_rating" class="responce_alert"></span>
					<div id="FileRatingStars">
					  <?=$GLOBALS['_LANG']['_rating'] ?>
					  :
					  <?=$gallery_file_rating ?>
					  %
					  <ul class="star-rating">
						<li class="current-rating" style="width:<?=$gallery_file_rating ?>%;"></li>
						<li><a href="#" title="1 star out of 5" class="one-star" onclick="AddRating(1,<?=$profileId ?>,<?=$gallery_file_id ?>); return false;">1</a></li>
						<li><a href="#" title="2 stars out of 5" class="two-stars" onclick="AddRating(2,<?=$profileId ?>,<?=$gallery_file_id ?>); return false;">2</a></li>
						<li><a href="#" title="3 stars out of 5" class="three-stars" onclick="AddRating(3,<?=$profileId ?>,<?=$gallery_file_id ?>); return false;">3</a></li>
						<li><a href="#" title="4 stars out of 5" class="four-stars" onclick="AddRating(4,<?=$profileId ?>,<?=$gallery_file_id ?>); return false;">4</a></li>
						<li><a href="#" title="5 stars out of 5" class="five-stars" onclick="AddRating(5,<?=$profileId ?>,<?=$gallery_file_id ?>); return false;">5</a></li>
					  </ul>
					</div>
<? } ?>
					<p>         
				</div>
	</div>
	
	<? } ?>
















</div>






</td>

</tr>


</table>

</div>



 


 


 


	<? } ?>



	<form method="post" action="<?=DB_DOMAIN ?>index.php" name="TakeTest" id="TakeTest">
	<input type="hidden" id="profileId" name="profileId" value="<?=$profileId ?>" class="hidden">
	<input type="hidden" id="quizid" name="quizid" value="0" class="hidden">
	<input type="hidden" id="sub" name="sub" value="taketest" class="hidden">
	<input name="do_page" type="hidden" value="matches" class="hidden">
	</form>

	<?

	if(isset($myTheme['header_background']) && $myTheme['header_background'] !=""){ $Fbg = str_replace("#","",$myTheme['header_background']); }else{ $Fbg ="eeeeee"; }
	if(isset($myTheme['inner_background']) && $myTheme['inner_background'] !=""){ $F1bg = str_replace("#","",$myTheme['inner_background']); }else{ $F1bg ="CCCCCC"; }
	if(isset($myTheme['header_text']) && $myTheme['header_text'] !=""){ $F2bg = str_replace("#","",$myTheme['header_text']); }else{ $F2bg ="666666"; }

	?>
	<script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/swfobject.js"></script><script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/swfformfix2.js"></script>
	<? if(!isset($BLOCKPAGEACCESS)){ ?>
		
		<script type="text/javascript">
			// <![CDATA[

			var so = new SWFObject(noCacheIE("<?=DB_DOMAIN ?>inc/exe/flash/profile_image.swf"), "ProfileImage", "200", "250", "9", "<?=$F1bg ?>");
			so.addParam("wmode", "opaque");
			so.addParam("scale", "noscale");		
			so.addVariable("xmlSource", "<?=DB_DOMAIN ?>inc/XML/xml_profile_images.php?uid=<?=$profileId ?>");
			so.addVariable("maxArticles", "8");
			so.addVariable("openLinkAs", "_self");
			so.addVariable("dontCache", "false");
			so.addVariable("loopSpeed", "5");
			so.addVariable("fadeSpeed", "5");
			so.addVariable("infoDelay", "1");
			so.addVariable("titleSize", "16");
			so.addVariable("infoSize", "12");
			so.addVariable("maxCharactersInTitle", "30");
			so.addVariable("maxCharactersInInfo", "80");
			so.addVariable("newsButtonFontSize", "11");
			so.addVariable("newsButtonFontColor", "0x<?=$F2bg ?>");
			so.addVariable("selectedNewsButtonFontColor", "0x<?=$F1bg ?>");
			so.addVariable("defaultNewsButtonBgColor", "0x<?=$F1bg ?>");
			so.addVariable("selectedNewsButtonBgColor", "0xffffff");
			so.write("ProfileImage");
			
			// ]]>
		</script>


<? } ?>