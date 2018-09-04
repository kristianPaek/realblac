<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>



<? if($_SESSION['auth'] =="yes"){ 

	 /**
	 * Page: Display Friends Value
	 *
	 * @version  9.0
	 */
	$MyFriends = GetFriendCounter();
?>
<img src="/mobileheader.png" width="300">
<br />
		<div style="margin-left:6px; height:30px; line-height:27px; font-size:16px;">
		<? if(D_FRIENDS ==1){ ?><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&friendid=<?=$_SESSION['uid'] ?>&displaytype=detail"><span><?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_friendsList'] ?> (<?=$MyFriends[1]['total'] ?>)</span></a>   -<? } ?>
		<? if(D_HOTLIST ==1){ ?> <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&friendid=<?=$_SESSION['uid'] ?>&friend_type=1&displaytype=detail"><span><font size="2">View <?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_hotList'] ?> (<?=$MyFriends[2]['total'] ?>)</span></a></font> <? } ?>
		 <? if(D_PARTNER ==222){ ?> - <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&friendid=<?=$_SESSION['uid'] ?>&friend_type=5"><span>My Partner (<?=$MyFriends[4]['total'] ?>)</span></a><? } ?>
		
		
		</div>
<? } ?>


 
 
<? if(isset($show_page) && $show_page=="home"){ 


$search_type="basic";

	 /**
	 * Page: Account Options
	 *
	 * @version  9.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>

<div class="ClearAll"></div>

 <div id="SearchAlert"></div>
 
<style>
.search { float:left; width:160px; height:35px; }
#PageNums{	border: 0px;	border: 0px solid #cccccc; padding: 4px; float:right;}
#PageNums a{	display:block;	padding:3px 6px;	margin:2px 3px 2px 2px;	text-decoration:none;	color: white;	font-size:11px;	font-weight:bold;	float: left;}
#PageNums a.edBump{	margin-left:6px;	}
#PageNums .n {	float: left;	padding:3px 6px;	margin:2px 3px 2px 2px;	color:#666666;	font-size:11px;	font-weight:bold;}
#PageNums a{	border:solid 1px #cccccc;	background-color: #eeeeee; color:#666666;}
#PageNums a:hover, #PageNums .selected {	color:#fff;	background-color:#cccccc; }
</style>
<div id="eMeetingContentBox22" >

	<div id="Results" style="border-top:0px; height:57px;float:left;"> 
				<br><span style="padding-left:1px;float:left;"> <?=$Search_Page_Numbers ?> </span>
	</div>


	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch<? if(isset($_GET['view_page'])){ print "&view_page=".strip_tags($_GET['view_page']); }else{ print "&view_page=1"; } ?>">
	<input name="do_page" type="hidden" value="mobilesearch" class="hidden">
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
<div id="searchblock"><div class="workblock2" style="width:100%;  float:left;">

<? if(!isset($SearchData[1]['TotalResults'])){ ?>

<div style="padding:15px;line-height:30px;"><b>Sorry, this is empty.</b></div>

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
	<!-- GALLERY BASIC VIEW -->
	<? $i=0; foreach($search_data as $Member){ ?>	
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
			<div class="highlighted1<? if($Member['featured'] !="yes"){ print "off"; } ?>" style="height:120px;padding:5px; margin-left:5px;">
			<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileprofile&sub=overview&item_id=<?=$Member['id'] ?>"><div align="center"><img src="<?=$Member['image'] ?>" class="thumb" alt="<?=$Member['username'] ?>" width="96" height="96" style="margin-left:5px;"></div></a>
			</div></div>
			<div class="imagedetails">				
				<ul class="details">
<br />
					<li>I'm <?=$Member['age'] ?> from <?=$Member['location'] ?></</li>
<li><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileprofile&sub=overview&item_id=<?=$Member['id'] ?>"><font color="#cb1f72">VIEW MY PROFILE</font></A></li>
<li><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilemessages&sub=create&n=<?=$Member['username'] ?>"><font color="#877e7e">MESSAGE ME</font></A></li>							<span style="color:#877e7e; font-size:11px;">
							<? if(D_HOTLIST ==1){ ?><a href="#"  style="color:#877e7e" onclick="ProfileAddNet(<?=$Member['id'] ?>,1); alert('<?=$GLOBALS['_LANG']['_updated'] ?>'); return false;">ADD</a>							FAVORITES 							<a href="<?$_SERVER['PHP_SELF']?>" style="color:#877e7e" onclick="DeleteNetwork(<?=$Member['id'] ?>,<?=$NETWORK_ID ?>); <!--alert('<?=$GLOBALS['_LANG']['_updated']?>');--> window.location.reload(); return false;">REMOVE</a><? } ?></span>							

					<li class="last">


					<? if($_SESSION['auth'] =="yes" ){ ?>

						<? if($_SESSION['uid'] !=$Member['id']){ ?>

							<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilemessages&sub=create&n=<?=$Member['username'] ?>"></a>				
							<? if(D_FRIENDS ==1){ ?><a href="#" onclick="ProfileAddNet(<?=$Member['id'] ?>,2);alert('<?=$GLOBALS['_LANG']['_updated'] ?>');return false;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png"></a>	<? } ?>					

				
							
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
	<?    } ?>		
	<!-- END GALLERY BSIC VIEW -->		

</div>
<? } ?>
</div></div>
	</form>
</div> <!-- end main box -->
<div class="clear"></div> 


<div id="Bottom" style="border-top:1px; float:left;">&nbsp;&nbsp;&nbsp;<?=$Search_Page_Numbers ?></div>
	
	<form action="<?=DB_DOMAIN ?>mobile.php" method="POST">
	<input name="do_page" type="hidden" value="mobilesearch" class="hidden">
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
    <td >


<div class="menu_box_body1">


<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&view_page=1">         
<input name="do_page" type="hidden" value="mobilesearch" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">
<? if(isset($_GET['friendid'])){ ?><input type="hidden" name="friendid" 	value="<? if(isset($_GET['friendid'])){ print $_GET['friendid']; }else{ print $_GET['friendid']; } ?>" class="hidden"><? } ?>
<? if(isset($_POST['friendid'])){ ?><input type="hidden" name="friendid" 	value="<? print $_POST['friendid']; ?>" class="hidden"><? } ?>	
<? if(isset($_GET['friend_type'])){ ?><input type="hidden" name="friend_type" 	value="<? print strip_tags($_GET['friend_type']); ?>" class="hidden"><? } ?>
<? if(isset($_POST['friend_type'])){ ?><input type="hidden" name="friend_type" 	value="<? print strip_tags($_POST['friend_type']); ?>" class="hidden"><? } ?>



<div class="menu_box_body" id="s77">

<ul class="SearchOps">
 
 
<?=DisplayBrowse() ?>
<li class="Stop"> <input type="checkbox" name="Extra[online]" value="1"><FONT SIZE="2">Online Now</font> </li>
<li class="Stop"> <input type="checkbox" name="Extra[newtoday]" value="1"><FONT SIZE="2">Joined Today</font> </li>   
<li class="Stop"> <input type="checkbox" name="Extra[pics]" value="1"> Photos Only </li>
	<li class="sub"></li>
<span id="SearchOp1I1" >
	<select name="Extra[period]" style="width:140px;">
	<option value="0"> - Joined in Last -</option>
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

<li><select name="Extra[sort]"  style="width:185px"><option value="1">---> <?=$GLOBALS['_LANG']['_sort'] ?></option><option value="1"><?=$GLOBALS['_LANG']['_menue10'] ?></option>   <option value="2"><?=$GLOBALS['_LANG']['_photos'] ?></option> <option value="7"><?=$GLOBALS['_LANG']['_age'] ?></option>  </select></li><br />
<li style="height:30px;"><div align="left" style="margin-top:2px;"><input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>"></div></li></ul></div></form></div></td></tr>

<tr valign="top"><td>
<div class="menu_box_title1"></div>
<div class="menu_box_body1" style="height:150px;">
<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&view_page=1">         
<input name="do_page" type="hidden" value="mobilesearch" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">
 <p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/user_green.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_username'] ?></p>
<input name="Extra[keyword]"  type="text" class="input" id="QKeyword">
<input name="Extra[keyword_username]" type="hidden" value="1">
<input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_search'] ?>">
</form>
</div></td></tr>

<tr><td>
<div class="menu_box_body1" style="height:150px;">
<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&view_page=1">         
<input name="do_page" type="hidden" value="mobilesearch" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden"></form>
</div></td></tr>

<tr><td>
<? if(D_POSTCODES ==1 || D_ZIPCODES ==1){ ?> 
<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&view_page=1">         
<input name="do_page" type="hidden" value="mobilesearch" class="hidden">
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

</td>
  </tr></table>


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





	<form class="clearfix" action="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&view_page=1" method="POST" name="QuickSearch" id="QuickSearch">          
		<input name="do_page" 	type="hidden" 			value="mobilesearch" class="hidden">
		<input type="hidden" 	name="page" 			value="1" class="hidden">
		<input type="hidden" 	name="Extra[newtoday]" 	value="0" class="hidden"	id="se_newtoday">
		<input type="hidden" 	name="Extra[favorite]" 	value="0" class="hidden"	id="se_favorite">
		<input type="hidden" 	name="Extra[birthday]" 	value="0" class="hidden" 	id="se_birthday">
		<input type="hidden" 	name="Extra[online]" 	value="0" class="hidden" 	id="se_onlinenow">
		<input type="hidden" 	name="Extra[pics]" 		value="0" class="hidden" 	id="se_pics">
		<input type="hidden" 	name="Extra[featured]" 	value="0" class="hidden" 	id="se_featured">
		<input type="hidden" 	name="Extra[highlighted]" value="0" class="hidden" 	id="se_highlight">
		<input type="hidden" 	name="SeN[1]" 	value="0" class="hidden">
		<input type="hidden" 	name="SeV[1]" 	value="0" class="hidden">
		<input type="hidden" 	name="SeT[1]" 	value="0" class="hidden">
	</form>
 

<? } ?>