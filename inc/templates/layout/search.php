<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<center><font size="2">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">Inbox</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=search&view_page=1">Online Now</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=overview&sub=viewed">Viewed Me</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">Winked Me</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">My Favorites</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">My Photos</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">My Profile</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">Subscription</A> | <a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Settings</a> | <a href="http://www.realblacklove.com/blog">Dating Blog</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font><br /><br /></center>
 
<? if(isset($show_page) && $show_page=="home"){ 


	 /**
	 * Page: Account Options
	 *
	 * @version  9.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
<div style="float:left;height:10px;">
&nbsp;<a <? if($_SESSION['auth'] =="yes"){ ?> onclick="javascript:SavePage();" href="#" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=login" <? } ?> style="text-decoration:none;"><img src="/savebutton.jpg" width="120"></a><br /><br />
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
		
		<? if(D_HOTLIST ==1){ ?> <a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$_SESSION['uid'] ?>&friend_type=1&displaytype=detail"><span><FONT SIZE="4"> MY FAVORITES</FONT> (<?=$MyFriends[2]['total'] ?>)</span></a> &nbsp;&nbsp;&nbsp;&nbsp;<? } ?>
		 <a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$_SESSION['uid'] ?>&friend_type=3&displaytype=detail"><span><font size="4"> MEMBERS I HAVE BLOCKED</FONT> (<?=$MyFriends[3]['total'] ?>)</span></a> 
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



<?
//=$ThisPersonsNetworkBar 
?>

	<div id="Results" style="border-top:1px; height:35px;"> 
		
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

		 if(isset($_POST['CeK']) && !empty($_POST['CeK'])){
		  foreach ($_POST['CeK'] as $key => $value ){
			 print "<input type='hidden' name='CeK[".$key."]' value='".$value."' class='hidden'>";	
		  }
		 }


		 if(isset($_POST['Extra']) && !empty($_POST['Extra'])){
		  foreach ($_POST['Extra'] as $key => $value ){
			 print "<input type='hidden' name='Extra[".$key."]' value='".$value."' class='hidden'>";	
		  }	
		 }  
	 


		  foreach ($_POST as $key => $value ){
			if(substr($key,0,5) == 'Field') {
			   print "<input type='hidden' name='".$key."' value='".$value."' class='hidden'>";
			}elseif(substr($key,0,5) == 'Multi') {
			   print "<input type='hidden' name='".$key."' value='".$value."' class='hidden'>";
			}elseif(substr($key,0,5) == 'Total') {
			   print "<input type='hidden' name='".$key."' value='".$value."' class='hidden'>";
			}
		  }	 
	 
	?>

<span id="profile_responce_span"></span>
<div id="searchblock"><div class="workblock">





<? if(!isset($SearchData[1]['TotalResults'])){ ?>

<div style="padding:50px;line-height:30px;"><font size="3">Sorry, seems as if this is empty. Start a new <a href="<?=DB_DOMAIN ?>index.php?dll=search"> <U>search</U></a></font></div>

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
        &nbsp;&nbsp;<?=$Member['username'] ?> <? if($Member['onlinenow']){ ?> - <font color="#1FA8D1"><strong><?=$GLOBALS['_LANG']['_online'] ?> <?=$GLOBALS['_LANG']['_now'] ?></strong></font> <? } ?> 
         
        </span>
			
		</div>
	<!-- END DISPLAY -->
	
		<div id="basic_search">
			<div class="imageframe">
			<div class="highlighted1<? if($Member['featured'] !="no"){ print "off"; } ?>" style="height:120px;padding:5px; margin-left:5px;">
			<a href="<?=$Member['link'] ?>"><div align="center"><img src="<?=$Member['image'] ?>" class="thumb" alt="<?=$Member['username'] ?>" width="96" height="96" style="margin-left:5px;"></div></a>
			</div></div>
<div class="imagedetails">				
				<ul class="details">



	<li>I'm <?=$Member['age'] ?> in <?=$Member['location'] ?></</li>
<li><a href="<?=DB_DOMAIN ?>index.php?dll=profile&sub=overview&item_id=<?=$Member['id'] ?>"><font color="#cb1f72">VIEW MY PROFILE</font></A></li>
<li><a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$Member['username'] ?>"><font color="#877e7e">MESSAGE ME</font></A></li>
							<li><? if(D_WINK ==1){ ?><a href="#" onclick="openQuickWink(<?=$Member['id'] ?>,'<?=$Member['username'] ?>','<?=$Member['image'] ?>')"><FONT COLOR="#877e7e">SEND A FLIRT</FONT></a><? } ?></li>
<li><? if(D_HOTLIST ==1){ ?><a href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,1); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;"><font color="#877e7e">ADD TO FAVORITES</FONT></a><? } ?></li>

					<li class="last">


					<? if($_SESSION['auth'] =="yes" ){ ?>

						<a href="<?=$Member['link'] ?>"></a>
						<? if($_SESSION['uid'] !=$Member['id']){ ?>

<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$Member['username'] ?>"></a>				
												
							<? if(D_WINK ==1){ ?><a href="#" onclick="openQuickWink(<?=$Member['id'] ?>,'<?=$Member['username'] ?>','<?=$Member['image'] ?>')"></a><? } ?>
							<? if(D_HOTLIST ==1){ ?><a href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,1); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;"></a><? } ?>
				
							<? if($Member['onlinenow'] && $Member['CanChat']=="yes" && D_IM ==1){ ?>
							<a href="javascript:void(0)" onclick="openIMWin(<?=$Member['id'] ?>, '<?=$_SESSION['uid'] ?>','<?=DB_DOMAIN ?>','<?=$IMRoomArray['path'] ?>','<?=$IMRoomArray['width'] ?>','<?=$IMRoomArray['height'] ?>'); return false;"></a>
							<? } ?>
							<? if($Member['video']){ ?>
							<a href="<?=$Member['link'] ?>"></a>
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
	<div style="text-align:center;"><b><?=$Member['username'] ?></b> <?=$MyProfileGlobals['name']; ?><br> <?=$Member['age'] ?> / <?=$Member['gender'] ?></div>
	
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

        <div align="left" style="font-size:11px; margin-left:-15px;">

        <a class="photo_75" href="<?=$Member['link'] ?>"><img src="<?=$Member['image'] ?>" alt="<?=$Member['username'] ?>"  width="140" height="140 style="margin-top:10px;"></a><? if(D_FRIENDS==1222){ ?><br><a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=<?=$Member['id'] ?>"><?=$GLOBALS['_LANG']['_friendsList'] ?></a> <? } ?></div>

    </div></div>


    <div class="Acc_ListBox_right">    

    <div class="Acc_ListBox_right1">


    <b style="font-size:13px;">


	<b><?=$Member['username'] ?></b> is <? if($Member['genderID'] != 2710){ print $Member['age']." ".$GLOBALS['_LANG']['_yold']; } ?>
   <? if(D_STARSIGN ==1){ ?>(<?=$Member['starsign'] ?>)<? } ?> <? if($Member['genderID'] == 2710){?> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/couple.gif" align="absmiddle"><? } ?> <br /> Lives in <?=$Member['location'] ?>  <? if($Member['mystate']){ ?> <?=$Member['mystate'] ?> <? } ?> 
	
	<br />
	</b>
	<font size="4"><?=$Member['description'] ?>&nbsp;...</font>


	<div class="Acc_ListBox_margin5"> <? if($Member['status'] !=""){ ?>* <?=$Member['username'] ?> last login:  <?=ShowTimeSince($Member['lastlogin']); ?> <? } ?> </div></div><div class="Acc_ListBox_right2"><div>

	<? if(!isset($NETWORKD_FRIEND_ID)){ if($_SESSION['uid'] !=$Member['id']){  ?>
	<? if($Member['onlinenow'] && $_SESSION['uid'] !=$Member['id'] && D_IM ==1 && $_SESSION['auth'] =="yes" ){ ?> <a <? if(isset($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("chatroom-im",$PACKAGEACCESS[$_SESSION['packageid']])){ ?> href="javascript:void(0);" onclick="openIMWin(<?=$Member['id'] ?>, '<?=$_SESSION['uid'] ?>','<?=DB_DOMAIN ?>','<?=$IMRoomArray['path'] ?>','<?=$IMRoomArray['width'] ?>','<?=$IMRoomArray['height'] ?>'); return false;" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?>><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/comments.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_pChat'] ?> </a> <br> <? } ?> 
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/email.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?> <? if(is_array($PACKAGEACCESS[$_SESSION['packageid']]) && !in_array("messages-create",$PACKAGEACCESS[$_SESSION['packageid']])){ ?>href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$Member['username'] ?>" <? }else{ ?> href="<?=DB_DOMAIN ?>index.php?dll=subscribe" <? } ?> <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>><?=$GLOBALS['LANG_COMMON'][9] ?></a><br>
			<? if(D_HOTLIST ==1){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/heart.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?>href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,1); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;" <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>> Add to <?=$GLOBALS['_LANG']['_hotList'] ?></a><br><? } ?>
	<? if($Member['onlinenow']){ ?><font color="#ed0058"><strong>Online Now</strong></font><BR />  <? } ?> 
<a href="<?=$Member['link'] ?>"><font size="3"><U>Visit Profile</U></font></a><br />
			<? if(D_FRIENDS ==1){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png" width="16" height="16" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?>href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,2);alert('<?=$GLOBALS['_LANG']['_updated'] ?>');return false;" <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>><?=$GLOBALS['_LANG']['_friendsList'] ?></a><br><? } ?>
			
			<? if(D_FOLLOW ==1){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <a <? if($_SESSION['auth'] =="yes"){ ?>href="#"  onclick="ProfileAddNet(<?=$Member['id'] ?>,8); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;" <? }else{ ?>href="<?=DB_DOMAIN ?>index.php?dll=login"<? } ?>>Follow Me</a><br> <? } ?>
	

	<? } }else{ ?>

			<? if(($_SESSION['uid'] !=$Member['id']) && ($_SESSION['uid'] == $NETWORKD_FRIEND_ID)){  ?>
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> <a href="#" onclick="Effect.Fade('div_<?=$Member['id'] ?>'); DeleteNetwork(<?=$Member['id'] ?>,<?=$NETWORK_ID ?>); return false;">Remove from List</a><br>
 
			<? } ?>
			<? if(isset($Member['networkApprove']) && $Member['networkApprove'] =="no"){ ?>			
				<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/thumb_up.png" align="absmiddle"> <a href="#" onclick="ApproveNetwork(<?=$Member['id'] ?>,<?=$NETWORK_ID ?>); return false;"><?=$GLOBALS['_LANG']['_approve'] ?></a><br> 
			<? } ?>
		
			

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
<table width="100%"  border="0" padding="5">
 
  <tr valign="top">

    <td colspan="2">
<img src="/searchcouple.jpg" width="400" height="350" align="left">
<div class="menu_box_body1" style="width:310px">
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

<li class="Stop"> <input type="checkbox" name="Extra[pics]" value="1"><FONT SIZE="2">Has Photos</font> </li>
<li class="Stop"> <input type="checkbox" name="Extra[online]" value="1"><FONT SIZE="2">Online Now</font> </li>
<li class="Stop"> <input type="checkbox" name="Extra[newtoday]" value="1"><FONT SIZE="2">Joined Today</font> </li>   
<? if(FLASH_VIDEO =="yes"){ ?><li class="Stop"> <input type="checkbox" name="Extra[livevideo]" value="1"> <strong><?=$LANG_ACCOUNT_MENU['video'] ?></strong> </li>  <? } ?>
	
	<span id="SearchOp1I1" >
	<select name="Extra[period]" style="width:140px;">
	<option value="0"> - Joined in Last - </option>
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

<li><select name="Extra[sort]" class="input" style="width:185px">		<option value="1">- Sort Members By - </option>	<option value="1"><?=$GLOBALS['_LANG']['_menue10'] ?></option>  <option value="4"><font size="5">Last Updated</font></option> <option value="5"><?=$GLOBALS['_LANG']['_username'] ?></option>  <option value="7"><?=$GLOBALS['_LANG']['_age'] ?></option>  </select></li>

<li style="height:30px;"><div align="center" style="margin-top:10px;"><input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>"></div></li>

</ul>

</form>

<td>
<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1">         
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">

<p><font size="2">Username</font></p>
<input name="Extra[keyword]"  type="text" class="input" id="QKeyword">
<input name="Extra[keyword_username]" type="hidden" value="1">

<input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>">
</form>
</td>
<td>
<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php?dll=search&view_page=1">         
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">

<p> <font size="2">Keyword</font></p>
<input name="Extra[keyword]"  type="text" class="input" id="QKeyword">
<input name="Extra[keyword_description]" type="hidden" value="1">
<input name="Extra[keyword_headline]" type="hidden" value="1">
 
<input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>">
</form>

</div></td>
    
</tr>

 <tr valign="top">
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
<? } ?>
</div></form>
<? } ?>
</td></tr>


</table>


<script>
function MakeSearchOptions(newtoday, birthday, fav, onlinenow, highlight, featured, pics){

	if(newtoday ==1){
		document.getElementById('se_newtoday').value='1';
	}
	if(birthday ==1){
		document.getElementById('se_birthday').value='1';
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
		<input type="hidden" 	name="Extra[online]" 	value="0" class="hidden" 	id="se_onlinenow">
		<input type="hidden" 	name="Extra[pics]" 		value="0" class="hidden" 	id="se_pics">
		<input type="hidden" 	name="Extra[highlighted]" value="0" class="hidden" 	id="se_highlight">
		<input type="hidden" 	name="SeN[1]" 	value="0" class="hidden">
		<input type="hidden" 	name="SeV[1]" 	value="0" class="hidden">
		<input type="hidden" 	name="SeT[1]" 	value="0" class="hidden">
	</form>

<? } ?>