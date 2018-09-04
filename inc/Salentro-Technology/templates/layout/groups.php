<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<div class="TopGroups" style="margin:0px;"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>





<? if(isset($show_page) && (  $show_page=="manage" ||  $show_page=="add" ) ){  ?>

<link rel="stylesheet" href="<?=DB_DOMAIN ?>inc/css/_profile.css" type="text/css">
<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
	 	<li <? if($show_page=="manage"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=groups&sub=manage"><span><?=$LANG_GROUPS_MENU['manage'] ?></span></a></li>
		<li <? if($show_page=="add"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=groups&sub=add"><span><?=$LANG_GROUPS_MENU['add'] ?></span></a></li>
    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br>
<? } ?>

<? if($show_page=="home"){ 


	 /**
	 * Page: Group Options
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>





<style>
.s1,.s2,.s3,.s4,.s5 { background: url(images/DEFAULT/_icons/new/help.png) no-repeat; background-position: 0% 50%}
</style>
<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>







<? }elseif($show_page=="search"){ 


	 /**
	 * Page: Search Groups
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>





	<span id="response_group" class="responce_alert"></span>
	 
<div class="clear"></div>
 
	<? $i=1; foreach($group_cats as $gro){ ?>

	<? if($i ==2){ ?><div class="gcatright"> <? }else{ ?> <div class="gcatleft"><? } ?>	

		<div class="groupAggregateDiv"><div class="groupAggregateDivTop">
		<div class="groupProfileImage">
			<a class="media-thumb" style="background-image: url('<?=$gro['photo'] ?>'); background-position:top left; z-index: 100; overflow:hidden;" href="<?=$gro['link'] ?>">
			<span></span>
			</a>
		</div>
		
		<div class="groupInfoContainer">
			<b><a href="<?=$gro['link'] ?>"><?=$gro['name'] ?></a> </b>
			<span class="groupInfoText groupInfoNumText"><?=$gro['total'] ?> <?=$GLOBALS['_LANG']['_groups'] ?></span>
			<span class="groupInfoText groupInfoCatText"><?=$GLOBALS['_LANG']['_updated'] ?>: <? if($gro['last_updated'] ==""){ print $GLOBALS['LANG_COMMON'][25];}else{ print showTimeSince($gro['last_updated']); } ?></span>
			<span class="groupInfoText groupInfoDescText"><a href="<?=$gro['link'] ?>"><?=$gro['last_name'] ?></a> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/10/view.gif" width="10" height="10" align="absmiddle"></span>
		</div>
		
		<div class="spreader"></div>
		</div>
		
		</div>
		
			
		</div>	
	<? $i++; if($i==3){$i=1;} } ?>
	
	<div class="ClearAll"></div>



<br>



<? }elseif($show_page=="view"){ 

	 /**
	 * Page: Groups View
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
<style>
.search_display_featured { background:#FFF8DD url('images/DEFAULT/featured.jpg') no-repeat bottom right; }
</style>

	<div id="eMeetingContentBox">

	<form method="GET" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
	<input name="dll" type="hidden" value="groups" class="hidden">
	<input name="sub" type="hidden" value="view" class="hidden">
	<? if(is_numeric($item_id)){ ?><input name="item_id" type="hidden" value="<?=$item_id ?>" class="hidden"> <? } ?>
	<? if(is_numeric($search_uid)){ ?><input name="fcid" type="hidden" value="<?=$search_uid ?>" class="hidden"> <? } ?>
	
	<div id="Title">
		<div class="AddIcon"><br><a href="<?=DB_DOMAIN ?>index.php?dll=groups&sub=add&item_id=<?=$item_id ?>" class="MainBtn">  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_createNew'] ?></a></div>
		<span class="a1"><?=$PageSubTitle ?></span>
		<span class="a2"><?=$PageDesc ?></span>
	</div>

	<?=$ThisPersonsNetworkBar ?>

	<div id="Search">
		<span class="a1"><input name="keyword" type="text" class="input"> <input type="submit" value="<?=$GLOBALS['_LANG']['_search'] ?>" class="NormBtn"></span>
		<span class="a2"><?=$Search_Page_Numbers ?></span>
	</div>

	<div id="Results"> 
		<span class="a1"> <b><?=$search_total_results ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
		<span class="a2"><?=$GLOBALS['_LANG']['_sort'] ?>: <a href="#" onclick="ChangeSort(1); return false;"><?=$GLOBALS['_LANG']['_sort3'] ?></a> | <a href="#" onclick="ChangeSort('2'); return false;"><?=$GLOBALS['_LANG']['_sort4'] ?></a> | <a href="#" onclick="ChangeSort('3'); return false;"><?=$GLOBALS['_LANG']['_sort5'] ?></a></span>
	</div>
	
	</form> 


	<span id="response_event" class="responce_alert"></span>
	<span id="response_group" class="responce_alert"></span>
  
	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>index.php?dll=groups&sub=view&gid=<? if(isset($_GET['gid']) && is_numeric($_GET['gid'])){ print $_GET['gid']; } ?>">
	<input name="do_page" type="hidden" value="groups" class="hidden">
	<input type="hidden" name="sub" value="view">
	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">
	<input name="displaytype" type="hidden" value="<? if(isset($_POST['displaytype'])){ print strip_tags($_POST['displaytype']); }else{ print '1'; } ?>" id="displaytype" class="hidden">
	<input name="page" type="hidden" value="<? if(isset($search_page) && is_numeric($search_page) ){ print strip_tags($search_page); }else{ print "1"; } ?>" class="hidden" id="Spage">
	<input type="hidden" name="sort" value="1" class="hidden" id="SSort">
	<? if(is_numeric($item_id)){ ?><input name="item_id" type="hidden" value="<?=$item_id ?>" class="hidden"> <? } ?>
	<? if(is_numeric($search_uid)){ ?><input name="fcid" type="hidden" value="<?=$search_uid ?>" class="hidden"> <? } ?>

	<? if($search_total_results ==0){ ?>
	
	<div style="padding:50px;line-height:30px;"><h1><a href="<?=DB_DOMAIN ?>index.php?dll=groups&sub=view"> <?=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>
	
	<? } ?>

	<? if(!empty($search_data)){ $i=1; foreach($search_data as $value){  ?>


	<div class="Acc_ListBox <? if($value['featured']=="yes"){ ?>search_display_featured <? } if($value['ThisApproved']=="no"){ ?>search_display_unapproved<? }else{ if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } } ?>" id="div_<?=$value['id'] ?>">
	<div class="Acc_ListBox_left" style="width:100px;"><div class="pic75"><a href="<?=$value['link'] ?>" title="<?=$event['shortevent'] ?>"><img src="<?=$value['image'] ?>" width="96" height="96"></a> <div align="center"><?=$value['username'] ?></div>  </div></div>
	<div class="Acc_ListBox_right">	
	<div class="Acc_ListBox_right1">
	<div class="Acc_ListBox_title_break"><a href="<?=$value['link'] ?>"><?=$value['name'] ?></a>  </div>
	<?=substr($value['description'],0,180) ?>..
	<div class="Acc_ListBox_margin5">
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/acc/<?=$value['attending_icon']; ?>" align="absmiddle">
	<?=$value['attending']; ?> <?=$GLOBALS['_LANG']['_members'] ?> 
	 - <?=$GLOBALS['_LANG']['_rating'] ?> <?=$value['rating_image'] ?> <br>
	<?=$GLOBALS['_LANG']['_updated'] ?> <?=showTimeSince($value['updated']) ?>

	</div></div><div class="Acc_ListBox_right2"><div>
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="<?=$value['link'] ?>"><?=$GLOBALS['_LANG']['_view'] ?></a><br>

	<? if($_SESSION['uid'] == $value['uid'] && $_SESSION['auth'] =="yes"){ ?>
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/pencil.png" width="16" height="16" align="absmiddle"> <a href="<?=DB_DOMAIN ?>index.php?dll=groups&sub=add&eid=<?=$value['id'] ?>"> <?=$GLOBALS['_LANG']['_edit'] ?> </a> <br>
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_no.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0);" onclick="Effect.Fade('div_<?=$value['id'] ?>'); delete_group('<?=$value['id'] ?>');" ><?=$GLOBALS['_LANG']['_delete'] ?></a>
	<? } ?>


	<?=ModeratorOptions($page, $show_page, $value) ?>

	</div>
	</div>
	<div class="clear"></div></div><div class="clear"></div>
	</div>

	<? $i++; } ?>
	
	<? } ?>


	<div id="Bottom"><?=$Search_Page_Numbers ?></div>
	
	</form>

	</div> <!-- end main box -->











<? }elseif($show_page=="show"){ 

	 /**
	 * Page: Show group page information
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */
?>

<div class="content sidebar"><div class="gradient">
<span id="response_group" class="responce_alert"></span>

<table width="650"  border="0"> <tr valign="top"><td width="344" id="Profile_MainBar">

<div style="width:430px;"> 
<? $FoundMe = DisplayMainPageInfo($info_array, $page, $show_page, $PageTitle, $member_array); ?>
</div>

 
</td><td width="5"></td><td width="291" id="Profile_SideBar">

	<div class="menu_box_title1">
	<span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span>
	<?=$GLOBALS['_LANG']['_searchQ'] ?> </div>
	<div class="menu_box_body1">

	<form method="GET" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
	<input name="dll" type="hidden" value="groups" class="hidden">
	<input name="sub" type="hidden" value="view" class="hidden">
	<input name="keyword" type="text" class="input"> <input type="submit" value="<?=$GLOBALS['_LANG']['_search'] ?>" class="NormBtn">
	<input name="item_id" type="hidden" value="<?=$info_array['cat_id'] ?>" class="hidden">
		
			
		</form> 
</div>
 
<h1><?=$GLOBALS['_LANG']['_information'] ?></h1><br>

<p> 
<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/acc/<? if(count($member_array) > 1){ print "user_1.png";}elseif(count($member_array) > 0){	 print "user_0.png";}else{ print "user_2.png";	} ?>" align="absmiddle"> <? print count($member_array); ?> <strong><?=$GLOBALS['_LANG']['_members'] ?></strong></p><hr>
<p><strong><?=$GLOBALS['_LANG']['_created'] ?>:</strong><span> <?=$info_array['created'] ?></span></p><hr>
<p><strong><?=$GLOBALS['_LANG']['_username'] ?>:</strong><span> <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$info_array['uid'] ?>"><?=$info_array['username'] ?></a></span></p><hr>
<p><strong><?=$GLOBALS['_LANG']['_updated'] ?>:</strong><span> <?=showTimeSince($info_array['updated']) ?></span></p><hr>
<p><strong><?=$GLOBALS['_LANG']['_category'] ?>:</strong><span> <?=GroupDetails($info_array['cat_id']) ?></span></p><hr>

<h1><?=$GLOBALS['LANG_GLO_OPTIONS']['1'] ?></h1><br>


<? if($info_array['joined']=="no"){  ?>
		
	<p><span><a href="javascript:void(0);" onClick="document.JoinGroupForm.submit();" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['LANG_GLO_OPTIONS']['9'] ?></a></span></p><hr>
		 
<? }else{ ?>
	
	<p><span><a href="javascript:void(0);" onClick="document.RemoveGroupForm.submit();" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> <?=$GLOBALS['LANG_GLO_OPTIONS']['8'] ?></a></span></p><hr>
		
<? } ?>

<?=PageOptionsBox($info_array, $page, $sub_page, $info_array['id']) ?>

 

 
<form  method="post" action="<?=DB_DOMAIN ?>index.php" name="JoinGroupForm">
<input name="do" type="hidden" value="join">
<input name="do_page" type="hidden" value="groups" class="hidden">
<input name="sub" type="hidden" value="show" class="hidden">
<input name="item_id" type="hidden" value="<?=$info_array['id'] ?>">
</form>

<form  method="post" action="<?=DB_DOMAIN ?>index.php" name="RemoveGroupForm">
<input name="do" type="hidden" value="remove">
<input name="do_page" type="hidden" value="groups" class="hidden">
<input name="sub" type="hidden" value="show" class="hidden">
<input name="item_id" type="hidden" value="<?=$info_array['id'] ?>">
</form>


<h1><?=$GLOBALS['LANG_GLO_OPTIONS']['36'] ?></h1>
 <div style="margin-left:30px;">
	<span id="responce_rating" class="responce_alert"></span>

	<div id="FileRatingStars">
	<ul class="star-rating">		
			<li class="current-rating" style="width:<?=$value['percent'] ?>%;"></li>						
			  <li><a href="#" title="1 star out of 5" class="one-star" onclick="AddGroupRating(1,<?=$info_array['id'] ?>); return false;">1</a></li>			
			  <li><a href="#" title="2 stars out of 5" class="two-stars" onclick="AddGroupRating(2,<?=$info_array['id'] ?>); return false;">2</a></li>			
			  <li><a href="#" title="3 stars out of 5" class="three-stars" onclick="AddGroupRating(3,<?=$info_array['id'] ?>); return false;">3</a></li>			
			  <li><a href="#" title="4 stars out of 5" class="four-stars" onclick="AddGroupRating(4,<?=$info_array['id'] ?>); return false;">4</a></li>			
			  <li><a href="#" title="5 stars out of 5" class="five-stars" onclick="AddGroupRating(5,<?=$info_array['id'] ?>); return false;">5</a></li>
	</ul></div>
</div>

			
 <?=PageLinkBox() ?>
 

</td></tr></table>

</div></div>











<? }elseif($show_page=="add"){ 


	 /**
	 * Page: Create group page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */
?>

<br>
<span id="response_group" class="responce_alert"></span>
<!-- END BOX -->




<? if(!empty($my_image_array)){ ?>
<div id="su">
	<!-- START DISPLAY IMAGE -->
	<div class="menu_box_title1">
	<span><a onclick="Effect.toggle('su','blind', {queue: 'end'}); return false;"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'su'); return false;" class="menu_expand"></a></span>
	<?=$GLOBALS['LANG_GLO_OPTIONS']['37'] ?>
	</div>
	<div class="menu_box_body1" >	
		<div id="form_car1">
		  <div class="previous_button"></div>  
		  <div class="container" id="PhotoContainer">
			<ul>
		   <?  foreach( $my_image_array as $value1){ ?> <li><img src="<?=$value1['image'] ?>" id="<?=$value1['filename'] ?>" width="48" height="48" onClick="Acc_ChangePreviewPhoto('<?=$value1['filename'] ?>','form_preview_image_hidden');" style="cursor:pointer;"></li><? } ?>
			</ul>
		  </div>
		  <div class="next_button"></div>
	</div>
	<div class="ClearAll"></div>
	</div>
	<script>function runTest() {        hCarousel = new UI.Carousel("form_car1");     }      Event.observe(window, "load", runTest); Effect.toggle('su','blind', {queue: 'end'});</script>
	<!-- END DISPLAY IMAGE -->
</div>
<? } ?>




	<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php" <? if(U_EDITOR =="yes"){ ?>onsubmit="return CheckGroupNulls('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');"<? } ?>>                        
	<input name="do" type="hidden" value="add" class='hidden'>
	<input name="do_page" type="hidden" value="groups" class="hidden">
	<input name="sub" type="hidden" value="add" class="hidden">
	<? if(isset($data['id'])){ ?>
	<input name="eid" type="hidden" value="<?=$data['id'] ?>" class="hidden">
	<? } ?> 
      
	<ul class="form">   
 
		<div class="CapBody">

			<li><label><?=$GLOBALS['_LANG']['_category'] ?></label><select name="cat_id"  class="input"> 
<? 
   if(isset($_GET['item_id'])) {
	DisplayCatsList($_GET['item_id']);
   }else{
	DisplayCatsList($data['cat_id']);
   }
?>		
    </select>      </li>


<li><label><?=$GLOBALS['_LANG']['_displayPhoto'] ?></label> 
  <span id="form_preview_image"><? if(isset($data['photo']) && strlen($data['photo']) > 5){ ?><img src="<?=$data['photo']; ?>" style="width:45px; height:45px;" align="absmiddle"><? } ?></span> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0)" onClick="Effect.toggle('su','blind', {queue: 'end'}); return false;" style="text-decoration:none;"><?=$GLOBALS['LANG_GLO_OPTIONS']['37'] ?></a>  
  <input type="hidden" value="<? if(isset($data)){ print $data['photo_name']; } ?>" name="form_preview_image_hidden" id="form_preview_image_hidden"></li>
	

			<li><label><?=$GLOBALS['_LANG']['_title'] ?></label><input type="text" id="name" name="name" size="40" value="<? if(isset($data['name']) && strlen($data['name'])){ print $data['name']; } ?>" class="input"></li>
			<li><label><?=$GLOBALS['LANG_GLO_OPTIONS']['39'] ?></label><select name="post_topics"  class="input"> <option value="yes" <? if(isset($data['member_posts']) && $data['member_posts']=="yes"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_yes'] ?></option>  <option value="no" <? if(isset($data['member_posts']) && $data['member_posts']=="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option> </select></li>
			<li><? if(!isset($data)){ $data['description']=""; } ?> 
            <textarea name="editor" id="editor" cols=32 rows=7 style="width:590px; height:150px;"><? if(isset($data)){ print $data['description']; } ?></textarea>
			</li>

	<? if($AlbumList !=""){ ?><li><label><?=$GLOBALS['_LANG']['_atTitle'] ?></label><select name="attachment"><option value="0"><?=$GLOBALS['_LANG']['_atNo'] ?></option><?=$AlbumList ?></select> 
	<div class="tip"><?=$GLOBALS['_LANG']['_atSub'] ?></div>
	</li><? }else{ ?><input type="hidden" name="attachment" value="0"> <? } ?>

			<li><input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>
		</div>
	</ul>
	</form>




<? } ?>