<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>


<div class="TopLogin"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>

 
 
<? if(isset($show_page) && $show_page=="home"){ 


	 /**
	 * Page: Account Options
	 *
	 * @version  9.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>

 
<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
		<li <? if(!isset($NETWORKD_FRIEND_ID) && !isset($_POST['displaytype'])){ ?> class="selected" <? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=search"><span><?=$GLOBALS['LANG_COMMON'][2] ?> </span></a> </li>
		<li <? if(isset($_POST['displaytype']) && $_POST['displaytype']=="basic"){?>class="selected" <? } ?> > <a href="#" onclick="ChangeSearchDisplay('basic'); return false;"> <span><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/s2.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_sort0'] ?></span></a></li>
	<li <? if(isset($_POST['displaytype']) && $_POST['displaytype']=="gallery"){?>class="selected" <? } ?>> <a href="#" onclick="ChangeSearchDisplay('gallery'); return false;"><span><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/s4.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_sort1'] ?></span></a> </li>
		<li <? if(isset($_POST['displaytype']) && $_POST['displaytype']=="detail"){?>class="selected" <? } ?>> <a href="#" onclick="ChangeSearchDisplay('detail'); return false;"><span><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/s3.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_sort2'] ?></span></a></li>
   </ul>
	
    <div class="ClearAll"></div>
 </div>
</div>
 <br>

<div style="float:left;height:40px;">
<a href="<?=DB_DOMAIN ?>index.php?dll=search&sub=advanced" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/search.gif" align="absmiddle"> <?=$GLOBALS['LANG_COMMON'][15] ?></a>
<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/vcard_edit.png" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?> onclick="javascript:SavePage();" href="#" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?> style="text-decoration:none;"><?=$LANG_ERROR['_t12'] ?> </a>
</div>

<? if($_SESSION['auth'] =="yes"){ 

	 /**
	 * Page: Display Friends Value
	 *
	 * @version  9.0
	 */
	$MyFriends = GetFriendCounter();
?>


		<div style="float:right; height:30px; line-height:27px; font-size:12px;">
		
		<? if(D_HOTLIST ==1){ ?> <a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$_SESSION['uid'] ?>&friend_type=1&displaytype=detail"><span><?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_hotList'] ?> (<?=$MyFriends[2]['total'] ?>)</span></a> -<? } ?>
		 <a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$_SESSION['uid'] ?>&friend_type=3&displaytype=detail"><span><?=$GLOBALS['_LANG']['_blockList'] ?> (<?=$MyFriends[3]['total'] ?>)</span></a> -
		 <? if(D_PARTNER ==1){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$_SESSION['uid'] ?>&friend_type=5"><span>My Partner (<?=$MyFriends[4]['total'] ?>)</span></a><? } ?>
		<? if(D_FOLLOW ==1){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$_SESSION['uid'] ?>&friend_type=8"><span>Followers</span></a><? } ?>
		
</div>
<? } ?>


<div class="ClearAll"></div>

 <div id="SearchAlert"></div>
 
<style>
.search { float:left; width:160px; height:35px; }
</style>
<div id="eMeetingContentBox">



<?=$ThisPersonsNetworkBar ?>

	<div id="Results" style="border-top:1px; height:35px;"> 
		<span class="a1" style="font-size:14px;line-height:35px;"> <b><?=number_format($search_data[$DataCounter]['TotalResults']) ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
		 <?=$Search_Page_Numbers ?> 
	</div>
	
	



	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>index.php?dll=search<? if(isset($_GET['view_page'])){ print "&view_page=".strip_tags($_GET['view_page']); }else{ print "&view_page=1"; } ?>">
	<input name="do_page" type="hidden" value="search" class="hidden">
	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">
	<input name="SavePage" type="hidden" id="SavePage" value="0" class="hidden">
	<input name="displaytype" type="hidden" value="<? if(isset($_POST['displaytype'])){ print strip_tags($_POST['displaytype']); }else{ print SEARCH_PAGE_DISPLAY; } ?>" id="displaytype" class="hidden">
	<input name="page" type="hidden" value="<? if(isset($_GET['view_page']) && is_numeric($_GET['view_page']) ){ print strip_tags($_GET['view_page']); }else{print "1"; } ?>" class="hidden" id="Spage">
	<? if(isset($_POST['postcode_value'])){ ?><input name="postcode_value" type="hidden" value="<?=$_POST['postcode_value'] ?>" class="hidden"><? } ?>
	<? if(isset($_POST['zipcode_value'])){ ?><input name="zipcode_value" type="hidden" value="<?=$_POST['zipcode_value'] ?>" class="hidden"><? } ?>
	<? if(isset($_POST['postcode_distance']) && is_numeric($_POST['postcode_distance'])){ ?><input name="postcode_distance" type="hidden" value="<?=$_POST['postcode_distance'] ?>" class="hidden"><? } ?>
	<? if(isset($_POST['uk_postcode_distance']) && is_numeric($_POST['uk_postcode_distance'])){ ?><input name="uk_postcode_distance" type="hidden" value="<?=$_POST['uk_postcode_distance'] ?>" class="hidden"><? } ?>
	<? if(isset($_GET['online'])){ ?><input type="hidden" 	name="Extra[online]" 	value="1" class="hidden" ><? } ?>
	<? if(isset($_GET['friendid'])){ ?><input type="hidden" name="friendid" 	value="<? if(isset($_GET['friendid'])){ print $_GET['friendid']; }else{ print $_GET['friendid']; } ?>" class="hidden"><? } ?>
	<? if(isset($_POST['friendid'])){ ?><input type="hidden" name="friendid" 	value="<? print $_POST['friendid']; ?>" class="hidden"><? } ?>	
	<? if(isset($_GET['friend_type'])){ ?><input type="hidden" name="friend_type" 	value="<? print strip_tags($_GET['friend_type']); ?>" class="hidden"><? } ?>
	<? if(isset($_POST['friend_type'])){ ?><input type="hidden" name="friend_type" 	value="<? print strip_tags($_POST['friend_type']); ?>" class="hidden"><? } ?>

	<?
	
		if(isset($_POST['SeN']) && !empty($_POST['SeN']) ){	
		 foreach ($_POST['SeN'] as $key => $value ){
		   print "<input type='hidden' name='SeN[".$key."]' value='".$value."' class='hidden'>";	
		 }
		}
		 if(isset($_POST['SeV']) && !empty($_POST['SeV'])){
		  foreach ($_POST['SeV'] as $key => $value ){
			 print "<input type='hidden' name='SeV[".$key."]' value='".$value."' class='hidden'>";	
		  }
		 }
		 if(isset($_POST['SeT']) && !empty($_POST['SeT'])){
		  foreach ($_POST['SeT'] as $key => $value ){
			 print "<input type='hidden' name='SeT[".$key."]' value='".$value."' class='hidden'>";	
		  }
		 }
		 if(isset($_POST['Extra']) && !empty($_POST['Extra'])){
		  foreach ($_POST['Extra'] as $key => $value ){
			 print "<input type='hidden' name='Extra[".$key."]' value='".$value."' class='hidden'>";	
		  }	
		 }  
	 
	?>

<span id="response_search" class="responce_alert"></span>
<span id="profile_responce_span"></span>
<div id="searchblock"><div class="workblock">





<? if(!isset($SearchData[1]['TotalResults'])){ ?>

<div style="padding:50px;line-height:30px;"><h1><a href="<?=DB_DOMAIN ?>index.php?dll=search"> <?=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>

<? } ?>




<? if($search_type=="basic" && $SearchData[1]['TotalResults'] > 0){ 

	 /**
	 * Page: Search Basic View
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
<div style="padding:10px;">
	<!-- GALLERY BSIC VIEW -->
	<? $i=1; foreach($search_data as $Member){ ?>	
	<? if($i == 1){ ?><div class="workblockright" id="div_<?=$Member['id'] ?>" style="margin-right:15px;"> <? }else{ ?> <div class="workblockleft" id="div_<?=$Member['id'] ?>"><? } ?>		
	<!-- END BLOCK TOPS -->
	
	<!-- DISPLAY PROFILE TOP AND PACKAGE ICON -->	
      <div id="basic_search_nav">			
	  <span class="username">
        &nbsp;&nbsp;<?=$Member['username'] ?> <? if($Member['onlinenow']){ ?> - <font color="#FF0000"><strong><?=$GLOBALS['_LANG']['_online'] ?> <?=$GLOBALS['_LANG']['_now'] ?></strong></font> <? } ?> 
         
        </span>
			
		</div>
	<!-- END DISPLAY -->
	
		<div id="basic_search">
			<div class="imageframe">
			<div class="highlighted1<? if($Member['featured'] !="yes"){ print "off"; } ?>" style="height:120px;padding:5px; margin-left:5px;">
			<a href="<?=$Member['link'] ?>"><div align="center"><img src="<?=$Member['image'] ?>" class="thumb" alt="<?=$Member['username'] ?>" width="96" height="96" style="margin-left:5px;"></div></a>
			</div></div>
			<div class="imagedetails">				
				<ul class="details">
					<li class="first"><?=$Member['username'] ?>  </li>
					<li><?=$GLOBALS['_LANG']['_age']  ?>: <?=$Member['age'] ?> / <?=$Member['gender'] ?></li>
					<li><?=$GLOBALS['_LANG']['_country'] ?>: <?=$Member['country'] ?></li>
					<li><?=$Member['location'] ?></li>
					<li class="last">


					<? if($_SESSION['auth'] =="yes" ){ ?>

						<a href="<?=$Member['link'] ?>"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/search.gif"></a>
						<? if($_SESSION['uid'] !=$Member['id']){ ?>

<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$Member['username'] ?>">
							<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/email.png"></a>				
							<? if(D_FRIENDS ==1){ ?><a href="#" onclick="ProfileAddNet(<?=$Member['id'] ?>,2);alert('<?=$GLOBALS['_LANG']['_updated'] ?>');return false;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png"></a>	<? } ?>					
							<? if(D_WINK ==1){ ?><a href="#" onclick="openQuickWink(<?=$Member['id'] ?>,'<?=$Member['username'] ?>','<?=$Member['image'] ?>')"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_search/wink.png"></a><? } ?>
							<? if(D_HOTLIST ==1){ ?><a href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,1); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/heart.png"></a><? } ?>
				
							<? if($Member['onlinenow'] && $Member['CanChat']=="yes" && D_IM ==1){ ?>
							<a href="javascript:void(0)" onclick="openIMWin(<?=$Member['id'] ?>, '<?=$_SESSION['uid'] ?>','<?=DB_DOMAIN ?>','<?=$IMRoomArray['path'] ?>','<?=$IMRoomArray['width'] ?>','<?=$IMRoomArray['height'] ?>'); return false;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/comment.gif"></a>
							<? } ?>
							<? if($Member['video']){ ?>
							<a href="<?=$Member['link'] ?>"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_search/livevid.gif"></a>
							<? } ?>
						<? } ?>



					<? }else{ ?>

					<a href="<?=DB_DOMAIN ?>index.php?dll=login">

						<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/email.png">
						<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/emoticon_smile.png">
						<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/heart.png">
						<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png">
			
					</a>

					<? } ?>			
					</li>
				</ul>
			</div>
		</div>
			
	</div>
	<?  $i++; if($i==3){$i=1;}  } ?>		
	<!-- END GALLERY BSIC VIEW -->		

</div>





<? }elseif($search_type=="gallery" && $SearchData[1]['TotalResults'] > 0){ 

	 /**
	 * Page: Search Gallery View
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>




	<!-- GALLERY PHOTO VIEW -->
<div style="margin-top:10px; margin-left:10px;margin-bottom:20px;">
	<? $i=1; foreach($search_data as $Member){ ?>	
	<? if($i ==5){ ?><div class="galleryviewright"> <? }else{ ?> <div class="galleryviewleft"  style="background:#eeeeee; margin-bottom:10px; width:150px; margin-right:10px;"><? } ?>
	
		<div id="gallery_search" style="width:140px; height:140px;" <? if($Member['featured']=="yes"){ ?>class="highlighted2"<? } ?>><a href="<?=$Member['link'] ?>"><img src="<?=$Member['image'] ?>&y=135&x=135" class="img_border" width="124" height="135" style="margin-left:0px;"></a></div>
	<div style="text-align:center;"><b><?=$Member['username'] ?></b> <br> <?=$Member['age'] ?> / <?=$Member['gender'] ?></div>
	
	</div>
	<?  $i++; if($i==5){$i=1;}  } ?>	
</div>	
	<!-- END GALLERY PHOTO VIEW -->














<? }elseif($search_type=="detail" && isset($SearchData[1]['TotalResults']) && $SearchData[1]['TotalResults'] > 0 ){ 


	 /**
	 * Page: Search Detailed View
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
	
	<!-- GALLERY BSIC VIEW -->
	<? $i=1; foreach($search_data as $Member){ ?>	


	<div class="Acc_ListBox <? if($Member['ThisApproved'] !="active"){ ?>search_display_unapproved<? }else{ if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } } ?>" id="div_<?=$Member['id'] ?>">
	<div class="Acc_ListBox_left <? if($Member['featured']=="yes"){ ?>highlighted3<? } ?>" style="width:120px;height:150px;"><div class="pic75">
		<div align="center" style="font-size:11px; margin-left:-15px;">
		<a class="photo_75" href="<?=$Member['link'] ?>"><img src="<?=$Member['image'] ?>" alt="<?=$Member['username'] ?>"  width="96" height="96" style="margin-top:10px;"></a> 
		<br><b><?=$Member['username'] ?></b> <? if(D_FRIENDS==1){ ?><br><a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$Member['id'] ?>"><?=$GLOBALS['_LANG']['_friendsList'] ?></a> <? } ?></div>
	</div></div>

	<div class="Acc_ListBox_right">	
	<div class="Acc_ListBox_right1">
	<div class="Acc_ListBox_title_break"><a href="<?=$Member['link'] ?>"><?=$Member['headline'] ?></a></div>
	<b style="font-size:13px;">

	<? if($Member['genderID'] != 2710){ print $Member['age']." ".$GLOBALS['_LANG']['_yold']; } ?>
   <? if(D_STARSIGN ==1){ ?>(<?=$Member['starsign'] ?>)<? } ?> / <? if($Member['genderID'] == 2710){?> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/couple.gif" align="absmiddle"><? } ?><?=$Member['gender'] ?> / <?=$Member['country'] ?> 
	
	
	<? if($Member['onlinenow']){ ?> - <font color="#FF0000"><strong><?=$GLOBALS['_LANG']['_online'] ?></strong></font>  <? } ?> 
	<? if($Member['video_duration'] > 0){ ?> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_search/livevid.gif"> <? } ?>

	</b><br>
	<?=$Member['description'] ?>


	<div class="Acc_ListBox_margin5"> <? if($Member['status'] !=""){ ?>- <?=$Member['username'] ?> <?=$GLOBALS['_LANG']['_pSmsg'] ?> <?=$Member['status'] ?> - <?=ShowTimeSince($Member['lastlogin']); ?> <? } ?> </div></div><div class="Acc_ListBox_right2"><div>

	<? if(!isset($NETWORKD_FRIEND_ID)){ if($_SESSION['uid'] !=$Member['id']){  ?>
	<? if($Member['onlinenow'] && $_SESSION['uid'] !=$Member['id'] && D_IM ==1 && $_SESSION['auth'] =="yes" ){ ?> <a <? if(isset($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-im",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="javascript:void(0);" onclick="openIMWin(<?=$Member['id'] ?>, '<?=$_SESSION['uid'] ?>','<?=DB_DOMAIN ?>','<?=$IMRoomArray['path'] ?>','<?=$IMRoomArray['width'] ?>','<?=$IMRoomArray['height'] ?>'); return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?>><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/comments.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_pChat'] ?> </a> <br> <? } ?> 
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/email.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?> <? if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("messages-create",$PACKAGEACCESS[$_SESSION['packageid']])){ ?>href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$Member['username'] ?>" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>><?=$GLOBALS['LANG_COMMON'][9] ?></a><br>
			<? if(D_HOTLIST ==1){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/heart.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?>href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,1); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;" <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>> <?=$GLOBALS['_LANG']['_hotList'] ?></a><br><? } ?>
			<? if(D_FRIENDS ==1){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?>href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,2);alert('<?=$GLOBALS['_LANG']['_updated'] ?>');return false;" <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>><?=$GLOBALS['_LANG']['_friendsList'] ?></a><br><? } ?>
			<? if(D_WINK ==1){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/emoticon_smile.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?> <? if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-wink",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="#" onclick="openQuickWink(<?=$Member['id'] ?>,'<?=$Member['username'] ?>','<?=$Member['image'] ?>'); return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>><?=$GLOBALS['LANG_COMMON'][10] ?></a> <br><? } ?>
			<? if(D_FOLLOW ==1){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?>href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,8); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;" <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>>Follow Me</a><br> <? } ?>
	

	<? } }else{ ?>

			<? if(($_SESSION['uid'] !=$Member['id']) && ($_SESSION['uid'] == $NETWORKD_FRIEND_ID)){  ?>
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> <a href="#" onclick="Effect.Fade('div_<?=$Member['id'] ?>'); DeleteNetwork(<?=$Member['id'] ?>,<?=$NETWORK_ID ?>); return false;"><?=$GLOBALS['_LANG']['_remove'] ?></a><br>
 
			<? } ?>
			<? if(isset($Member['networkApprove']) && $Member['networkApprove'] =="no"){ ?>			
				<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/thumb_up.png" align="absmiddle"> <a href="#" onclick="ApproveNetwork(<?=$Member['id'] ?>,<?=$NETWORK_ID ?>); return false;"><?=$GLOBALS['_LANG']['_approve'] ?></a><br> 
			<? } ?>
		
			<? if(($_SESSION['uid'] !=$Member['id']) && ($_SESSION['uid'] == $NETWORKD_FRIEND_ID)){  ?><span id="ChangeType<?=$i ?>"><img src="images/DEFAULT/_acc/plugin.png" align="absmiddle"> <a href="#" id="" onClick="ChangeRelationship('ChangeType<?=$i ?>',<?=$NETWORK_ID ?>,<?=$Member['id'] ?>,'div_<?=$Member['id'] ?>');return false;">Change Relationship</a></span><? } ?>

	<? } ?>

	<?=ModeratorOptions($page, $show_page, $Member) ?>
						
	</div>
	</div>
	<div class="clear"></div></div><div class="clear"></div>
	</div>


	<div class="ClearAll"></div>
	<?  $i++; } ?>		
	<!-- END GALLERY BSIC VIEW -->

<? } ?>



















</div></div>

	<div id="Bottom"><?=$Search_Page_Numbers ?></div>
	
	</form>

</div> <!-- end main box -->
		
	
	<form action="<?=DB_DOMAIN ?>index.php" method="POST">
	<input name="do_page" type="hidden" value="search" class="hidden">
	<input type="hidden" name="page" value="1" class="hidden">
	<span id="SearchHiddenField"></span>
	
	</form>


<? }elseif($show_page=="advanced"){ 

	 /**
	 * Page: Video Message
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
<table width="100%"  border="0">
  <tr valign="top">
    <td>

<div class="menu_box_title1"><?=$GLOBALS['_LANG']['_username'] ?> <?=$GLOBALS['_LANG']['_search'] ?></div>
<div class="menu_box_body1" style="height:110px;">

<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1">         
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">
 <p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_username'] ?></p>
<input name="Extra[keyword]"  type="text" class="input" id="QKeyword">
<input name="Extra[keyword_username]" type="hidden" value="1"><br><br>

<input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>">
</form>

</div></td>
    <td>
<div class="menu_box_title1"><?=$GLOBALS['_LANG']['_menue4'] ?></div>
<div class="menu_box_body1" style="height:110px;">

<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1">         
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">

<p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/zoom_in.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_menue4'] ?></p>
<input name="Extra[keyword]"  type="text" class="input" id="QKeyword">
<input name="Extra[keyword_description]" type="hidden" value="1">
<input name="Extra[keyword_headline]" type="hidden" value="1"><br><br>
 
<input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>">
</form>

</div></td>
    <td>

<? if(D_POSTCODES ==1 || D_ZIPCODES ==1){ ?> 
<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1">         
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">
<div class="menu_box_title1">Postcode Search</div>
<div class="menu_box_body1">



<? if(D_POSTCODES ==1){ ?> 

<li>UK Postcode <br><input name="postcode_value" type="text" value="" onfocus="this.value='';" id="Q3"  style="width:125px;"></li>
	 <li> Within a: <br>
	  <select name="uk_postcode_distance" style="width:125px;">
        <option value="10"> 10 km</option>
        <option value="20">20 km</option>
        <option value="30">30 km</option>
        <option value="40">40 km</option>
        <option value="50">50 km</option>
        <option value="60">60 km</option>
        <option value="70">70 km</option>
        <option value="80">80 km</option>
        <option value="90">90 km</option>
        <option value="100">100 km</option>
        <option value="200">200 km</option>
        <option value="300">300 km</option>
      </select>
	  <input value="<?=$GLOBALS['_LANG']['_search'] ?>" type="submit"  class="MainBtn">
	  

<? } ?>
	<? if(D_ZIPCODES ==1){ ?><li>USA Zipcode<br><input name="zipcode_value" type="text" value="" onfocus="this.value='';" id="Q4"  style="width:125px;">
	 </li>
	 <li> Within a: <br>
	  <select name="postcode_distance" style="width:125px;">
        <option value="10"> 10 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="20">20 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="30">30 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="40">40 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="50">50 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="60">60 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="70">70 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="80">80 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="90">90 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="100">100 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="200">200 <?=$GLOBALS['_LANG']['_mile'] ?></option>
        <option value="300">300 <?=$GLOBALS['_LANG']['_mile'] ?></option>
      </select>
<input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>">

<? } ?><br>

</div></form>
<? } ?>

</td>
  </tr>
  <tr>
    <td colspan="2">


</td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="top">
    <td colspan="2">

<div class="menu_box_title1"><?=$GLOBALS['_LANG']['_menue2'] ?></div>
<div class="menu_box_body1">


<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1">         
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">
<? if(isset($_GET['friendid'])){ ?><input type="hidden" name="friendid" 	value="<? if(isset($_GET['friendid'])){ print $_GET['friendid']; }else{ print $_GET['friendid']; } ?>" class="hidden"><? } ?>
<? if(isset($_POST['friendid'])){ ?><input type="hidden" name="friendid" 	value="<? print $_POST['friendid']; ?>" class="hidden"><? } ?>	
<? if(isset($_GET['friend_type'])){ ?><input type="hidden" name="friend_type" 	value="<? print strip_tags($_GET['friend_type']); ?>" class="hidden"><? } ?>
<? if(isset($_POST['friend_type'])){ ?><input type="hidden" name="friend_type" 	value="<? print strip_tags($_POST['friend_type']); ?>" class="hidden"><? } ?>



<div class="menu_box_body" id="s77">

<ul class="SearchOps">
 
 
<?=DisplayBrowse() ?>



<br>
<li class="Stop"> <input type="checkbox" name="Extra[pics]" value="1"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/photo.png" align="absmiddle"> <strong><?=$GLOBALS['_LANG']['_withPics'] ?></strong> </li>
<li class="Stop"> <input type="checkbox" name="Extra[online]" value="1"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_orange.png" align="absmiddle"> <strong><?=$GLOBALS['_LANG']['_online'] ?> <?=$GLOBALS['_LANG']['_now'] ?></strong></li>
<li class="Stop"> <input type="checkbox" name="Extra[newtoday]" value="1"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/thumb_up.png" align="absmiddle"> <strong><?=$GLOBALS['_LANG']['_joinToday'] ?></strong> </li>   
<? if(FLASH_VIDEO =="yes"){ ?><li class="Stop"> <input type="checkbox" name="Extra[livevideo]" value="1"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/webcam.png" align="absmiddle"> <strong><?=$LANG_ACCOUNT_MENU['video'] ?></strong> </li>  <? } ?>

	<li class="sub"><a href="#" onClick="toggleLayer('SearchOp1I1'); return false;"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/bullet_go.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_menue6'] ?></a></li>
	<span id="SearchOp1I1" style="display:none;">
	<select name="Extra[period]" style="width:140px;">
	<option value="0"> -- <?=$GLOBALS['_LANG']['_menue7'] ?> --</option>
	<option value="7">7 <?=$GLOBALS['_LANG']['_days'] ?></option>
	<option value="14">2 <?=$GLOBALS['_LANG']['_weeks'] ?></option>
	<option value="31">1 <?=$GLOBALS['_LANG']['_months'] ?></option>
	<option value="155">5 <?=$GLOBALS['_LANG']['_months'] ?></option>
	<option value="365">1 <?=$GLOBALS['_LANG']['_year'] ?></option>
	</select>
	</span>

	 

<? if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" && $value['ThisApproved'] !="active"){ ?>

<li><input type="checkbox" name="Extra[unapproved]" value="1"><strong> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_orange.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_menue11'] ?></strong></li>
<? } ?>		

<li><select name="Extra[sort]" class="input" style="width:185px">		<option value="1">---> <?=$GLOBALS['_LANG']['_sort'] ?>  </option>	<option value="1"><?=$GLOBALS['_LANG']['_menue10'] ?></option>   <option value="2"><?=$GLOBALS['_LANG']['_photos'] ?></option>	  <option value="3"><?=$GLOBALS['_LANG']['_sort5'] ?></option> <option value="4"><?=$GLOBALS['_LANG']['_updated'] ?></option> <option value="5"><?=$GLOBALS['_LANG']['_username'] ?></option> <option value="6"><?=$GLOBALS['_LANG']['_gender'] ?></option>  <option value="7"><?=$GLOBALS['_LANG']['_age'] ?></option>  </select></li>

<li style="height:30px;"><div align="center" style="margin-top:10px;"><input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>"></div></li>

</ul>


</div>
</form>

</div></td>
    <td>

<div class="menu_box_title1"><?=$GLOBALS['_LANG']['_menue3'] ?></div>
<div class="menu_box_body1">
<ul class="SearchOps">
<li><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="<?=DB_DOMAIN ?>index.php?dll=search&page=1"><?=$GLOBALS['_LANG']['_viewAll'] ?> <?=$GLOBALS['_LANG']['_members'] ?></a></li>
	<li><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="#" onclick="MakeSearchOptions(0,0,0,1,0,0,0); return false;"><?=$GLOBALS['_LANG']['_online'] ?> <?=$GLOBALS['_LANG']['_members'] ?></a></li>
	<li><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="#" onclick="MakeSearchOptions(1,0,0,0,0,0,0); return false;"><?=$GLOBALS['_LANG']['_latest'] ?> <?=$GLOBALS['_LANG']['_members'] ?></a></li>
	<li><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="#" onclick="MakeSearchOptions(0,0,0,0,0,1,0); return false;"><?=$GLOBALS['_LANG']['_featured'] ?> <?=$GLOBALS['_LANG']['_members'] ?></a></li>
	<li><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="#" onclick="MakeSearchOptions(0,0,0,0,0,0,1); return false;"><?=$GLOBALS['_LANG']['_members'] ?> <?=$GLOBALS['_LANG']['_withPics'] ?></a></li>
</ul>
</div></td>
  </tr>
</table>


<script>
function MakeSearchOptions(newtoday, birthday, fav, onlinenow, highlight, featured, pics){

	if(newtoday ==1){
		document.getElementById('se_newtoday').value='1';
	}
	if(featured ==1){
		document.getElementById('se_featured').value='1';
	}
	if(onlinenow ==1){
		document.getElementById('se_onlinenow').value='1';
	}
	if(highlight ==1){
		document.getElementById('se_highlight').value='1';
	}	
	if(fav ==1){
		document.getElementById('se_favorite').value='1';
	}
	if(pics ==1){
		document.getElementById('se_pics').value='1';
	}
	
	document.QuickSearch.submit();	
}
</script>





	<form class="clearfix" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1" method="POST" name="QuickSearch" id="QuickSearch">          
		<input name="do_page" 	type="hidden" 			value="search" class="hidden">
		<input type="hidden" 	name="page" 			value="1" class="hidden">
		<input type="hidden" 	name="Extra[newtoday]" 	value="0" class="hidden"	id="se_newtoday">
		<input type="hidden" 	name="Extra[favorite]" 	value="0" class="hidden"	id="se_favorite">
		<input type="hidden" 	name="Extra[birthday]" 	value="0" class="hidden" 	id="se_birthday">
		<input type="hidden" 	name="Extra[online]" 	value="0" class="hidden" 	id="se_onlinenow">
		<input type="hidden" 	name="Extra[pics]" 		value="0" class="hidden" 	id="se_pics">
		<input type="hidden" 	name="Extra[highlighted]" value="0" class="hidden" 	id="se_highlight">
		<input type="hidden" 	name="SeN[1]" 	value="0" class="hidden">
		<input type="hidden" 	name="SeV[1]" 	value="0" class="hidden">
		<input type="hidden" 	name="SeT[1]" 	value="0" class="hidden">
	</form>
 

<? } ?>
