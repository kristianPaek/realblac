<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );
if($_SERVER['HTTP_REFERER']!='' && $_SERVER['HTTP_REFERER']=='http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox'){
	$SQL = "update winkmessagessend set read_status = 1 where wink_to='".$_SESSION['uid']."'";
	$Data = $DB->Query($SQL);	
}
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
.marginTop{	 margin-top:2px; } 
.profile_box_body {	padding:5px;	overflow:hidden; }
.profile_box_title { padding:2px; 	font-size:12px;}
.pImage { float:left; width:70px; height:75px; margin-right:23px;}
.pImageBorder { border:3px solid #eee;}
.pImageUsername { font-size:11px; font-weight:bold; text-align:center}

</style>

<input type="hidden" name="hiddenProfileStatus" id="hiddenProfileStatus" value="ShowProfileData">

<? if($MyProfileGlobals['ThisApproved'] !='active' && isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes"){ ?>
	<div id="messages"><div style="" class="message-good">
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png" align="absmiddle"> <?=$GLOBALS['_LANG_ERROR']['_waitingApproval']; ?>
		<span id="Approvediv_<?=$profileId ?>"> [ <a href="javascript:void(0)" onClick="AdminLiveApprove('<?=$profileId ?>', 'profile', ''); Effect.Fade('Approvediv_<?=$profileId ?>'); return false;" style="text-decoration:none">
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_on.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_approve'] ?> </a> ] </span>

		[ <a href="javascript:void(0)" onClick="AdminLiveDelete('<?=$profileId ?>', 'profile', ''); Effect.Fade('ProfileHead'); return false;" style="text-decoration:none">
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_delete'] ?> </a> ]
	</div></div>
<?   } ?>


<? if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes"){ ?>
<div id="messages"><div style="" class="message-good">
<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/wrench.png" align="absmiddle"> <a href="<?=DB_DOMAIN ?>index.php?dll=account&sub=edit&id=<?=$profileId ?>"> [ Edit Profile ] </a>

	<? if($_GET['sub'] =="blogview"){ ?>
	<a href="#" onclick="EditBlogPost('<?=$_GET['item2_id'] ?>'); return false;"> [ Edit Blog ]</a>
	<? } ?>
</div>
</div>

<? } ?>


<div id="ProfileHead">
<table width="930" border="0" cellpadding="0" cellspacing="0"><tr><td width="700" valign="top">
		<div id="ProfileUsernameBox" style="height:50px;">
			<? if($MyProfileGlobals['onlinenow'] && $profileId != $_SESSION['uid'] && $MyProfileGlobals['showIM'] =="yes" && D_IM ==1 && $MyProfileGlobals['visible'] == 'yes'){  ?>
			<a <? if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-im",$PACKAGEACCESS[$_SESSION['packageid']])){ ?>href="javascript:void(0);"  onclick="openIMWin(<?=$profileId ?>, '<?=$_SESSION['uid'] ?>','<?=DB_DOMAIN ?>','<?=$IMRoomArray['path'] ?>','<?=$IMRoomArray['width'] ?>','<?=$IMRoomArray['height'] ?>'); return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?>  style="float:right; margin-right:10px;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/onlinenow_big.png"></a>
			<? } ?>

		</div>
<div class="ClearAll"></div>
<div style="margin-left:20px; margin-top:4px;">
</div>
<div style="background:white;  min-height:500px" id="Profile_MainBar">


<? if($show_page=="overview"){



/**
* Info: Profile Overview Page 
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/
?>

<div class="profile_box_body marginTop">
<table width="100%"  border="0"> 
<tr>
<td width="100%"><p><strong><font size="4"><?=substr($profileUsername,0,30) ?> </font></strong><br />
<font size="2">Last login was <?=showTimeSince($MyProfileGlobals['lastlogin']) ?></font><br />


 <div id="ProfileImage"></div>

<? if($MyProfileGlobals['video_duration'] > 0 && $show_page == "overview"){ ?> 




<h1 style="margin-top:1px;width:405px;"><?=$LANG_ACCOUNT_MENU['video'] ?></h1>


  <div id='preview'></div>


  <script type='text/javascript' src='<?=DB_DOMAIN ?>inc/js/swfobject.js'></script>


    <script type='text/javascript'>


    var s1 = new SWFObject('<?=DB_DOMAIN ?>inc/exe/flash/video_player_rtmp.swf','ply','215','170','9','#ffffff');


    s1.addParam('allowfullscreen','true');


    s1.addParam('allowscriptaccess','always');


    s1.addParam('wmode','transparent');


    s1.addParam('flashvars','file=eMeetingVideo_<?=$profileId ?>.flv&streamer=<?=FLASH_DOMAIN?>&autostart=false&controlbar=none');


    s1.write('preview');


  </script>




  <? } ?>

  


	</div>	  



  



	</div>



  

</p>
</td>
</tr>
<? if(D_MOD_WRITE ==1){ ?>
 <tr>
  <td><strong><?=$GLOBALS['_LANG']['_pLink'] ?></strong></td>
    <td><a href="<?=DB_DOMAIN.$MyProfileGlobals['username'] ?>" target="_blank" style="color:#666666"><strong><?=DB_DOMAIN.$MyProfileGlobals['username'] ?></strong></a>
</td>
  </tr>
<? } ?>
</table>
</div>

<div id="ShowProfileData" style="display:none;">

		

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


<? if(D_FRIENDS ==1222){ ?>

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
	<div class="pImage"><a href="<?=$value['link']; ?>"><img src="<?=$value['image']; ?>" border="0" width="48" height="48" class="pImageBorder"></a>
    <div class="pImageUsername"><?=$value['username']; ?></div></div>
	<? } }  ?>

	<p><br><a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$profileId ?>"><?=$GLOBALS['_LANG']['_friendsList'] ?></a></p>
	</div>	
	</div><br /><br />

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
		   <h1> <?=$value['caption'] ?></h1>
		  </span>
		  <span class="goR">

<? if($_SESSION['uid'] ==$profileId ){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=account&sub=edit" class="pLink"><?=$GLOBALS['_LANG']['_edit']?> </a> <? } ?>

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
		     <? if($_SESSION['uid'] ==$profileId ){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=account&sub=edit" class="pLink"> <?=$GLOBALS['_LANG']['_edit']?> </a> <? } ?>
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
		* Info: Displays recent photos
		* 		
		* @version  9.0
		*/

		if(!empty($RecentPhotos)) {
		?>


	  <div class="profile_box_title marginTop">		<span class="goL">
  


	</div>	  



  <br /><br />



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



	if(D_COMMENTS ==1){



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



	    <span id="response_gallery" style="color:red;font-weight:bold;font-size:18px"></span>



	



	    <div class="profile_box_title marginTop">



	  



		<span class="goL">



			    <h1> <?=$album_name ?> <? if($album_date ==""){?>  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> No Access! <? } ?></h1>



		  </span>



	  



		<div class="ClearAll"></div>



	  



	    </div>



	    <div class="profile_box_body">	    <div class="ClearAll"></div>	    <div  style="padding:10px;">



  



		 <? if($album_date ==""){ // album is empty ?>



		



		<p>This member has no photos available to view.</p>



		<p><a href="index.php?dll=gallery&sub=search&fcid=<?=$profileId ?>">Click here to return to the list of photos.</a></p>



		



		<? }else{ ?>



  



		  



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



	  



	<? if(D_PROFILERATING ==1){ ?><div id="post-ratings-232" class="post-ratings"><?=$value['rating_image'] ?><span> <?=$value['rating'] ?> % </span></div> <? } ?>		



	  







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



		<p style="padding:7px; background:#0088cc; border:0px solid #ffffff; margin-left:10px; margin-right:20px; font-weight:bold; color:white"> My Photo Scroll<a <? if($_SESSION['auth'] =="yes"){ ?>href="javascript:void(0);" onClick="NewpopUpWin('<?=DB_DOMAIN ?>inc/exe/slideshow/slideshow.php?id=<?=$profileId ?>', 550, 500);return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>><?=$GLOBALS['_LANG']['_slideshow'] ?></a></p>











	<?  if(!empty($my_image_array)){ ?>







	<!-- START EXTRA ALBUM IMAGES -->







		<div id="form_car3" style="margin-left:150px; margin-bottom:10px;">



		  <div class="previous_button"></div>  



		  <div class="container">



			<ul>



		   <?  foreach( $my_image_array as $value1){ ?> <li><a href="<?=$value1['link'] ?>"><img src="<?=$value1['image'] ?>" id="<?=$value1['filename'] ?>" width="65" height="70" style="cursor:pointer;"></a></li><? } ?>



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







		



 



					



					



					<? if(D_PROFILERATING ==1){ ?> 



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















































































<?











/**



* Info: Displays profile sidebar information



* 		



* @version  9.0



*/







?>




</div></td><td width="217" valign="top">







<div id="Profile_SideBar" style="border:0px;">


<div id="ProfileOptionsBox"><br /><center>Finally find what you<br /> Deserve. </center>



<? if(1 != 2){ 



	//if($_SESSION['uid'] !=$profileId){ 



	?>







	 



	



	<? if($show_page=="overview"){ ?>











		<?=DisplayProfileRatingSystem($profileId) ?>



	



		<h1><?=$GLOBALS['LANG_GLO_OPTIONS']['1'] ?></h1>







		







<? if($MyProfileGlobals['onlinenow'] && $profileId != $_SESSION['uid'] && D_IM ==1 && $MyProfileGlobals['visible'] == 'yes'){  ?>



		
		<? } ?>
		<? if($_SESSION['uid'] !=$profileId){ ?><p align="center"><a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("messages-create",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$profileUsername ?>" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>  class="pLink"><?=$GLOBALS['LANG_COMMON'][9] ?></a></p><hr><? } ?>

		<? if(D_WINKMESSAGES ==1 && $_SESSION['uid'] !=$profileId){ ?><p align="center" id="winkp"> <a <? if($_SESSION['auth'] =="yes"){ if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-wink",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="javascript:void(0)" onclick="sendwink('<?=$_SESSION['uid']?>','<?=$profileUsername ?>');" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>class="pLink"><?=$GLOBALS['LANG_COMMON'][42] ?></a></p><hr><? } ?>

        

        







<? 



if($_SESSION['auth'] =="yes"){



	$myalert = $GLOBALS['_LANG']['_updated'];



}



else {



	$myalert = "You must login to use this feature";



}



?>















		



		<? if(D_HOTLIST ==1 && $_SESSION['uid'] !=$profileId){ ?><p align="center"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,1); alert('<?=$myalert ?>');return false;"><?=$GLOBALS['LANG_COMMON'][12] ?></a></p><hr><? } ?>



		<? if(D_PARTNER ==1 && $_SESSION['uid'] !=$profileId){ ?><p align="center"><a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,5); alert('<?=$myalert ?>'); return false;"><?=$GLOBALS['LANG_COMMON'][16] ?></a> </p><hr><? } ?>







		<? if(D_FOLLOW ==1 && isset($MyProfileGlobals['follow_approve']) && $MyProfileGlobals['follow_approve'] =="yes"){ ?><p align="center"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,8); alert('<?=$myalert ?>'); return false;">Follow Me (<?=GetFriendCounter(8); ?> followers)</a> </p><hr><? } ?>







		<? if(D_RECOMMEND ==1){ ?> <p align="center"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/check.gif" width="16" height="16" align="absmiddle"> <a href="index.php?dll=recommend&pid=<?=$profileId ?>" class="pLink">Recommend to a friend</a></p><hr><? } ?>







		<? if($_SESSION['uid'] !=$profileId){ ?><p align="center"> <a href="javascript:void(0);" class="pLink" onclick="ProfileAddNet(<?=$profileId ?>,3); alert('<?=$myalert ?>'); return false;"><?=$GLOBALS['LANG_COMMON'][14] ?></a></p><hr><? } ?>



		<? } ?>



<center><a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("messages-create",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=Admin&msg_subject=I want to report <?=$profileUsername ?>" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>  class="pLink">Report Member</a></center><hr>



   <? } ?>



		</div>



	



		<div style="background:white; display:block;">



	



		<? if($show_page !="overview"){ ?>



<center>



		<h1 style="margin-top:10px;width:205px;"><?=$GLOBALS['LANG_GLO_OPTIONS']['1'] ?></h1><br>



		<p> <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$profileId ?>"><?=$GLOBALS['LANG_COMMON'][11] ?> </a></p><hr>



		<? if($_SESSION['uid'] !=$profileId){ ?><p><a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("messages-create",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$profileUsername ?>" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?>  class="pLink"><?=$GLOBALS['LANG_COMMON'][9] ?></a></p><hr><? } ?>



	<!--	<? if(D_WINK ==1 && $_SESSION['uid'] !=$profileId){ ?><p><a <? if($_SESSION['auth'] =="yes"){  if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-wink",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="javascript:void(0);" onclick="openQuickWink(<?=$profileId ?>,'<?=$profileUsername ?>','<?=$MyProfileGlobals['image'] ?>'); return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?> class="pLink"><?=$GLOBALS['LANG_COMMON'][10] ?></a></p><? } ?><hr>--></center>







		<? } ?>







		



	



		<? if(D_SKYPE ==1 && strlen($MyProfileGlobals['skype']) > 3 && $_SESSION['auth'] =="yes" && $show_page=="overview"){ ?>



		<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>



		<p align="center"><a href="skype:<?=$MyProfileGlobals['skype'] ?>?call"><img src="http://download.skype.com/share/skypebuttons/buttons/call_green_white_153x63.png" style="border: none;" width="153" height="63" alt="My status" /></a></p><hr>



		<? } ?>



	



	



		





	











	<? print $MusicFile; ?>











	<?







	/**



	* Info: Displays member adverts



	* 		



	* @version  9.0



	*/



	







	if(!empty($show_album_array) && $show_page !="blogview"){ 







	?>







 






	<div id="response_gallery" style="color:red;font-weight:bold;font-size:15px"></div>



	<ul class="profile_menu_right_small">







	<? if(!empty($show_album_array)){ foreach($show_album_array as $value){ ?>







 	<li style="height:65px;margin-top:7px;">





	</li><div class="ClearAll"></div>



	







	<? } } ?>







	 </ul>







	<?







	}







	/**



	* Info: Displays member events



	* 		



	* @version  9.0



	*/



	







	if(!empty($show_events_array) && $show_page=="overview"){ 







	?>







 



	<h1 style="width:205px; margin-top:10px;"><?=$GLOBALS['LANG_COMMON']['8a'] ?></h1>



	<ul class="profile_menu_right_small">







	<? if(!empty($show_events_array)){ foreach($show_events_array as $value){ ?>



 	<li style="padding-top:6px;">



		<div style="float:left; padding-right:10px;">



			<a href="<?=$value['link'] ?>"><img src="<?=$value['image']; ?>&x=48&y=48" width="48" height="48"></a>



		</div>	



		<a href="<?=$value['link'] ?>"><b><?=$value['title'] ?></b><br><?=substr($value['description'],0,100); ?></a>



	</li>



	<? } } ?>



 



 



			<br><b> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/zoom_in.png" align="absmiddle"> <a href='index.php?dll=calendar&sub=search&fcid=<?=$profileId ?>'><?=$GLOBALS['_LANG']['_viewAll'] ?> <?=$GLOBALS['LANG_COMMON']['8a'] ?></a></b>



		







	</ul>











	<div class="ClearAll"></div>















	<?







	}







	/**



	* Info: Displays member adverts



	* 		



	* @version  9.0



	*/



	







	if(!empty($show_adverts_array) && $show_page=="overview"){ 







	?>







 



	<h1 style="width:205px; margin-top:10px;"><?=$GLOBALS['LANG_OVERVIEW']['81'] ?></h1>



	<ul class="profile_menu_right_small">







	<? if(!empty($show_adverts_array)){ foreach($show_adverts_array as $value){ ?>







 	<li style="height:65px;margin-top:7px;">



		<div style="float:left; padding-right:10px;">



			<a href="<?=$value['link'] ?>"><img src="<?=$value['image']; ?>&x=48&y=48" width="48" height="48"></a>



		</div>	



		<a href="<?=$value['link'] ?>"><b><?=strip_tags($value['title']) ?></b><br><?=strip_tags(substr($value['description'],0,100)); ?></a>



	</li><div class="ClearAll"></div>

	<? } } ?>


	<br><b> 
<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/zoom_in.png" align="absmiddle"> <a href='index.php?dll=classads&sub=search&fcid=<?=$profileId ?>'><?=$GLOBALS['_LANG']['_viewAll'] ?> </a> </b>

	</ul>
	<div class="ClearAll"></div>
	<?
	}

	/**
	* Info: Displays member adverts
	* 
	* @version  9.0
	*/

	if(!empty($show_blog_array) ){ 
	?>
	<h1 style="width:205px; margin-top:10px;"><?=$GLOBALS['LANG_COMMON'][7] ?></h1>
	<ul class="profile_menu_right_small">
	<? if(!empty($show_blog_array)){ foreach($show_blog_array as $value){ ?>
 	<li style="height:65px;margin-top:10px;">
		<div style="float:left; padding-right:5px;">
		</div>	
		<a href="<?=$value['link'] ?>"><?=strip_tags(substr($value['title'],0,40)); ?></a>
	</li><div class="ClearAll"></div>

	<? } } ?>

	</ul>
	<div class="ClearAll"></div>


	<?
	}

	if($show_page=="overview"){

	?>




	</ul>
	<div class="ClearAll"></div>
	</div>
	<? } ?>


 </div>
</td><td width="16" valign="top" style="height:121px;"></td>
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
			var so = new SWFObject(noCacheIE("<?=DB_DOMAIN ?>inc/exe/flash/profile_image.swf"), "ProfileImage", "700", "450", "12", "<?=$F1bg ?>");
			so.addParam("wmode", "opaque");
			so.addParam("scale", "noscale");		
			so.addVariable("xmlSource", "<?=DB_DOMAIN ?>inc/XML/xml_profile_images.php?uid=<?=$profileId ?>");
			so.addVariable("maxArticles", "1");
			so.addVariable("openLinkAs", "_self");
			so.addVariable("dontCache", "false");
			so.addVariable("loopSpeed", "5");
			so.addVariable("fadeSpeed", "3");
			so.addVariable("infoDelay", "1000");
			so.addVariable("titleSize", "0");
			so.addVariable("infoSize", "0");
			so.addVariable("maxCharactersInTitle", "0");
			so.addVariable("maxCharactersInInfo", "0");
			so.addVariable("newsButtonFontSize", "0");
			so.addVariable("newsButtonFontColor", "0x<?=$F2bg ?>");
			so.addVariable("selectedNewsButtonFontColor", "0x<?=$F1bg ?>");
			so.addVariable("defaultNewsButtonBgColor", "0x<?=$F1bg ?>");
			so.addVariable("selectedNewsButtonBgColor", "0x66666");
			so.write("ProfileImage");
			// ]]>
		</script>
<? } ?>