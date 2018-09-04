<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<div class="TopAdverts" style="margin:0px;"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>









<? if(isset($show_page) && ( $show_page=="add" ||  isset($_GET['fcid']) ) ){  ?>

<link rel="stylesheet" href="<?=DB_DOMAIN ?>inc/css/_profile.css" type="text/css">
<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
	 	<li <? if(isset($_GET['fcid'])){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=classads&sub=search&fcid=0"><span><?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_advert'] ?></span></a></li>
		<li <? if($show_page=="add"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=classads&sub=add"><span><?=$GLOBALS['_LANG']['_createNew'] ?></span></a></li>
    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br>
<? } ?>





<? if($show_page =="home"){

	 /**
	 * Page: Classified Options
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */
?>
 
 
 
<p style="padding:7px; background:#EBFAFB; border:1px solid #cccccc; margin-left:5px; margin-right:10px; font-weight:bold;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/book_open.png" align="absmiddle"> <a href="<?=DB_DOMAIN ?>index.php?dll=classads&sub=search"><?=$GLOBALS['LANG_GLO_OPTIONS']['35'] ?></a></p>

<div class="inner_nav_body">	
<div class="category-list clearfix">
<div class="inner_nav_bar" style="padding:5px;"><?=$lang_main_menu['classads'] ?> <?=$GLOBALS['_LANG']['_category'] ?></div>
 

<? $i=1; foreach($cList as $Category){ ?>										

<? if($i==1){ ?><div class="column clearfix">	 <? } ?>										
									 
<!-- TOP -->
<div class="category <? if($i==1){ ?>first-category<? } ?>">
	<div class="title" style="line-height:27px;">
		<div><a href="<?=$Category['link'] ?>" style="text-decoration:none;"> <? if($Category['icon'] !=""){ ?> <img src="<?=WEB_PATH_FILES.$Category['icon'] ?>" align="absmiddle"> <? } ?> <?=$Category['name'] ?></a> </div>
		<div class="count"> <a href="<?=DB_DOMAIN ?>index.php?dll=classads&sub=add&item_id=<?=$Category['id'] ?>"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/10/view.gif" align="absmiddle"> <?=$LANG_CLASSADS_MENU['add'] ?></a> <span class="todaycount">(<?=$Category['total'] ?> <?=$GLOBALS['_LANG']['_results'] ?>)</span></div>
	</div>
	<div class="body">
	<ul>
		<? foreach(ListCatsItems($Category['id']) as $Item){ ?><li><a href="<?=$Item['link'] ?>"><?=$Item['name'] ?></a></li> <? } ?>
		<li><a href="<?=$Category['link'] ?>" style="text-decoration:none; font-weight:bold;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/10/manage.gif" align="absmiddle"> <?=$GLOBALS['_LANG']['_viewAll'] ?> </a></li>
	</ul>
	</div>
</div>
<!-- BOTTOM -->
													
<? if($i==3){ ?></div><? $i=0; } ?>

<?  $i++; } ?>
		<? if($i !=1){ ?></div><?  } ?>
 </div>
</div>

 
 







<? }elseif($show_page=="add"){ 


	 /**
	 * Page: Classified Create
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>



<form method="post" action="<?=DB_DOMAIN ?>index.php" <? if(U_EDITOR =="yes"){ ?>onSubmit="return CheckClassadsNulls('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');"<? } ?>>
<input name="do" type="hidden" value="add" class="hidden">
<input name="do_page" type="hidden" value="classads" class="hidden">
<input name="sub" type="hidden" value="add" class="hidden">
<input name="pic2" type="hidden"  value="" class="hidden"> 
<? if(isset($_GET['eid'])){ $data = EditThisClass($_GET['eid']);  ?>
<input type="hidden" name="eid" value="<?=$_GET['eid']?>" class=hidden>
<? } ?>


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

<div class="ClearAll"></div>	
<ul class="form">
<div class="CapBody">

	<li><label><?=$GLOBALS['_LANG']['_category'] ?></label><select name="ad_catid" onChange="eMeetingClassCats(this.value, 'subcats',0); return false;"><? if(!isset($data)){ $data['cat_id']=0; } if(isset($item_id) && is_numeric($item_id)){ $data['cat_id']=$item_id;} print GetClassCats($data['cat_id']); ?></select> </li>
	<li><label>Sub <?=$GLOBALS['_LANG']['_category'] ?></label><div id="subcats"><select name="sub_catid"><option value="0">----------</option></select></div></li>

	<li><label><?=$GLOBALS['_LANG']['_title'] ?></label><input class="input" name="ad_title" id="ad_title" type="text" size="40" value="<? if(!isset($data)){ $data['title']=""; } print $data['title']; ?>"></li>

	<li><label>Sub <?=$GLOBALS['_LANG']['_title'] ?></label><input class="input" name="ad_subtitle" type="text" size="40" value="<? if(!isset($data)){ $data['sub_title']=""; } print $data['sub_title']; ?>">
	<? if(!empty($my_image_array)){ ?><li><label><?=$GLOBALS['_LANG']['_displayPhoto'] ?></label> <span id="form_preview_image"><? if(isset($data['pic1']) && strlen($data['pic1']) > 5){ ?><img src="<?=$data['photo']; ?>" style="width:45px; height:45px;" align="absmiddle"><? } ?></span> <a href="javascript:void(0)" onClick="Effect.toggle('su','blind', {queue: 'end'}); return false;"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" width="16" height="16" align="absmiddle"> <?=$GLOBALS['LANG_GLO_OPTIONS']['37'] ?> </a>  <input type="hidden" value="<? if(isset($data)){ print $data['photo_name']; } ?>" name="form_preview_image_hidden" id="form_preview_image_hidden"></li><? } ?>
	</li><? if(!isset($data)){ $data['content']=""; } ?><li><textarea name="editor" id="editor" <? if(U_EDITOR =="no"){ ?>style="width:590px; height:250px;"<? } ?>><?=$data['comments'] ?></textarea></li>

	<? if($AlbumList !=""){ ?><li><label><?=$GLOBALS['_LANG']['_atTitle'] ?></label><select name="attachment"><option value="0"><?=$GLOBALS['_LANG']['_atNo'] ?></option><?=$AlbumList ?></select> 
	<div class="tip"><?=$GLOBALS['_LANG']['_atSub'] ?></div>
	</li><? }else{ ?><input type="hidden" name="attachment" value="0"> <? } ?>

	<li><input type="submit" class="MainBtn" value="<?=$GLOBALS['_LANG']['_save'] ?>"> </li>

</div>
</ul>
</form>

<script type="text/javascript">
   function runTest() { hCarousel = new UI.Carousel("form_car1");      }
   Event.observe(window, "load", runTest);
<?  if(isset($item_id) && is_numeric($item_id)){ ?> eMeetingClassCats(<?=$item_id ?>, 'subcats',0); <? } ?>
 <? if(isset($data) && is_numeric($data['pic5'])){ ?>eMeetingClassCats(<?=$data['cat_id'] ?>, 'subcats',<?=$data['pic5'] ?>); <? } ?>
</script>













<? }elseif($show_page=="search"){ 


	 /**
	 * Page: Classified Create
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
	<input name="dll" type="hidden" value="classads" class="hidden">
	<input name="sub" type="hidden" value="search" class="hidden">
	
		<div id="Title">
			<div class="AddIcon"><br><a href="<?=DB_DOMAIN ?>index.php?dll=classads&sub=add" class="MainBtn">  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_createNew'] ?></a></div>
			<span class="a1"><?=$PageSubTitle ?></span>
			<span class="a2"><?=$PageDesc ?></span>
		</div>

		<?=$ThisPersonsNetworkBar ?>

		<div id="Search">
			<span class="a1"><select class="input" name="item_id"><? foreach($cList as $cList1){ ?><option value="<?=$cList1['id'] ?>"><?=$cList1['name'] ?> (<?=$cList1['total'] ?>)</option> <? foreach(ListCatsItems($cList1['id']) as $Item){ ?><option value="<?=$Item['id'] ?>"> ------> <?=$Item['name'] ?></option> <? } ?> <? } ?></select> <input name="" type="submit" class="NormBtn" value="<?=$GLOBALS['_LANG']['_search'] ?>"></span>
			<span class="a2"><?=$Search_Page_Numbers ?></span>
		</div>
		<div id="Results"> 
			<span class="a1"> <b><?=$search_total_results ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
			<span class="a2"><?=$GLOBALS['_LANG']['_sort'] ?>: <a href="#" OnClick="ChangeSort('1');"><?=$GLOBALS['_LANG']['_sort3'] ?></a> | <a href="#" OnClick="ChangeSort('2');"><?=$GLOBALS['_LANG']['_sort4'] ?></a>| <a href="#" OnClick="ChangeSort('3');"><?=$GLOBALS['_LANG']['_sort5'] ?></a></span>
		</div>
	
	</form> 
 
	<span id="response_class" class="responce_alert"></span>
	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>index.php?dll=<?=$page ?><? if(isset($search_page)){ print "&view_page=".strip_tags($search_page); }else{ print "&view_page=1"; } ?>">
	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">
	<input name="page" type="hidden" value="<? if(isset($search_page) && is_numeric($search_page) ){ print strip_tags($search_page); }else{ print "1"; } ?>" class="hidden" id="Spage">
	<input name="sub" type="hidden" value="<?=$sub_page ?>" class="hidden">
	<input name="do_page" type="hidden" value="<?=$page ?>" class="hidden">
	<input type="hidden" name="sort" value="1" class="hidden" id="SSort">
	<? if(is_numeric($item_id)){ ?><input name="item_id" type="hidden" value="<?=$item_id ?>" class="hidden"> <? } ?>
	<? if(is_numeric($search_uid)){ ?><input name="fcid" type="hidden" value="<?=$search_uid ?>" class="hidden"> <? } ?>

	<? if($search_total_results ==0){ ?>
	
	<div style="padding:50px;line-height:30px;"><h1><a href="<?=DB_DOMAIN ?>index.php?dll=classads"> <?=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>
	
	<? } ?>
	
	<? $i=1; foreach($search_data as $value){ ?>	
	
		<div class="Acc_ListBox <? if($value['featured']=="yes"){ ?>search_display_featured <? } if($value['ThisApproved']=="no"){ ?>search_display_unapproved<? }else{ if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } } ?>" id="div_<?=$value['id'] ?>">
		<div class="Acc_ListBox_left"  style="width:100px;"><div class="pic75"><a class="photo_75" href="<?=$value['link'] ?>" title="<?=$value['title'] ?>"><img src="<?=$value['image'] ?>" width="96" height="96"></a> <div align="center"><a href="<?=$value['user_link'] ?>" style="font-size:10px;"><?=$value['username'] ?></a></div> </div></div>
		<div class="Acc_ListBox_right">	
		<div class="Acc_ListBox_right1">
		<div class="Acc_ListBox_title_break"><a href="<?=$value['link'] ?>" title="<?=$value['title'] ?>"><?=$value['title'] ?></a></div>
	
		<b><?=$value['sub_title'] ?></b>
		<div>
		<?=$GLOBALS['_LANG']['_updated'] ?> : <?=showTimeSince($value['date_updated']); ?>, &nbsp;&nbsp; 
		<?=$GLOBALS['_LANG']['_rating'] ?> <?=$value['rating_image'] ?> <br>
		<?=$GLOBALS['_LANG']['_category'] ?>: <a href="<?=$value['cat_link'] ?>"><?=$value['cat_name'] ?></a>, &nbsp;&nbsp; 
		<?=$GLOBALS['_LANG']['_comments'] ?>: (<?=$value['comments'] ?>) &nbsp;&nbsp;
		<?=$GLOBALS['_LANG']['_views'] ?>: (<?=number_format($value['hits']) ?>)
		 <br>
	
		</div>
		</div><div class="Acc_ListBox_right2"><div>
	
			<a href="<?=$value['link'] ?>"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> &nbsp;&nbsp; <?=$GLOBALS['_LANG']['_view'] ?></a>	 <br>
	
			<? if($_SESSION['uid'] == $value['uid']){ ?> 
				<a href="<?=DB_DOMAIN ?>index.php?dll=classads&sub=add&eid=<?=$value['id'] ?>"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/pencil.png" width="16" height="16" align="absmiddle">  &nbsp;&nbsp; <?=$GLOBALS['_LANG']['_edit'] ?> &nbsp;&nbsp; </a> <br>
				<a href="javascript:void(0)" onclick="DeleteClassAd('<?=$value['id'] ?>', 'div_<?=$value['id'] ?>'); return false;"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_off.png" width="16" height="16" align="absmiddle">  &nbsp;&nbsp; <?=$GLOBALS['_LANG']['_delete'] ?> &nbsp;&nbsp; </a>  
			<? } ?> 		

			<?=ModeratorOptions($page, $show_page, $value) ?>
	
		</div>
		</div>
		<div class="clear"></div></div><div class="clear"></div>
		</div>
	
	<? $i++; } ?>
	
	<div id="Bottom"><?=$Search_Page_Numbers ?></div>
	</form>


</div> <!-- end main box -->









<? }elseif($show_page=="view"){ 

	 /**
	 * Page: Calendar Overview
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
 

 

<div class="content sidebar"><div class="gradient">

<table width="650"  border="0"><tr valign="top"><td width="420" id="Profile_MainBar">


<?=DisplayMainPageInfo($data, $page, $show_page, $PageTitle) ?>


</td><td width="10">&nbsp;</td><td width="206" id="Profile_SideBar">

	<div class="menu_box_title1">
	<span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span>
	<?=$GLOBALS['_LANG']['_searchQ'] ?> </div>
	<div class="menu_box_body1">
	<form method="GET" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
	<input name="dll" type="hidden" value="classads" class="hidden">
	<input name="sub" type="hidden" value="search" class="hidden">
		
	<select class="input" name="item_id" style="width:185px;"><? foreach($cList as $cList1){ ?><option value="<?=$cList1['id'] ?>"><?=$cList1['name'] ?> ( <?=$cList1['total'] ?>)</option><? } ?></select> 

	<input type="submit" class="NormBtn" value="<?=$GLOBALS['_LANG']['_search'] ?>">
		
		</form> 
	</div>

<h1><?=$GLOBALS['_LANG']['_information'] ?></h1><br>
  
<p><strong><?=$GLOBALS['_LANG']['_username'] ?>:</strong><span> <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pUsername=<?=$data['username'] ?>">  <?=$data['username'] ?>  </a></span></p><hr>
<p><strong><?=$GLOBALS['_LANG']['_date'] ?>:</strong><span> <?=ShowTimeSince($data['date_added']) ?></span></p><hr>
 
<h1><?=$GLOBALS['LANG_GLO_OPTIONS']['1'] ?></h1><br>

<?=PageOptionsBox($data, $page, $show_page ) ?>

<h1><?=$GLOBALS['LANG_GLO_OPTIONS']['36'] ?></h1>
 <div style="margin-left:30px;">
	<span id="responce_rating" class="responce_alert"></span>

	<div id="FileRatingStars">
	<ul class="star-rating">		
			<li class="current-rating" style="width:<?=$value['percent'] ?>%;"></li>						
			  <li><a href="#" title="1 star out of 5" class="one-star" onclick="AddClassRating(1,<?=$data['id'] ?>); return false;">1</a></li>			
			  <li><a href="#" title="2 stars out of 5" class="two-stars" onclick="AddClassRating(2,<?=$data['id'] ?>); return false;">2</a></li>			
			  <li><a href="#" title="3 stars out of 5" class="three-stars" onclick="AddClassRating(3,<?=$data['id'] ?>); return false;">3</a></li>			
			  <li><a href="#" title="4 stars out of 5" class="four-stars" onclick="AddClassRating(4,<?=$data['id'] ?>); return false;">4</a></li>			
			  <li><a href="#" title="5 stars out of 5" class="five-stars" onclick="AddClassRating(5,<?=$data['id'] ?>); return false;">5</a></li>
	</ul></div>
</div>

<?=PageLinkBox() ?>






</td></tr></table>

</div></div>

<? } ?>
