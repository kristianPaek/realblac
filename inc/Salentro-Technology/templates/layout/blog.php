<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<? if(isset($show_page) && ( $show_page=="add" ||   $show_page=="view"  ) ){  ?>

<link rel="stylesheet" href="<?=DB_DOMAIN ?>inc/css/_profile.css" type="text/css">
<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
	 	<li <? if($show_page=="view"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=blog&sub=view"><span><?=$LANG_BLOG_MENU['view'] ?></span></a></li>
		<li <? if($show_page=="add"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=blog&sub=add"><span><?=$GLOBALS['_LANG']['_createNew'] ?></span></a></li>
    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br>
<? } ?>



<? if($show_page =="home"){ 

	 /**
	 * Page: Settings Options
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>




<style>
.s1,.s2,.s3,.s4,.s5 { background: url(images/DEFAULT/_icons/new/help.png) no-repeat; background-position: 0% 50%;}
</style>
<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>






<? }elseif($show_page =="search" || ( $sub_page =="view" && $_SESSION['auth'] =="yes") ){ 

	 /**
	 * Page: Settings Options
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>


	<div id="eMeetingContentBox">

	<form method="GET" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
	<input name="dll" type="hidden" value="blog" class="hidden">
	<input name="sub" type="hidden" value="search" class="hidden">
	
	<div id="Title">
		<div class="AddIcon"><br><a href="<?=DB_DOMAIN ?>index.php?dll=blog&sub=add" class="MainBtn">  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_createNew'] ?></a></div>
		<span class="a1"><?=$PageTitle ?></span>
		<span class="a2"><?=$PageDesc ?></span>
	</div>

	<div id="Search">
		<span class="a1"><input name="keyword" type="text" class="input"> <input type="submit"  value="<?=$GLOBALS['_LANG']['_search'] ?>" class="NormBtn"></span>
		<span class="a2"><?=$Search_Page_Numbers ?></span>
	</div>
	<div id="Results"> 
		<span class="a1"> <b><?=$search_total_results ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
		<span class="a2"><?=$GLOBALS['_LANG']['_sort'] ?>: <?=$GLOBALS['_LANG']['_sort3'] ?> 

<a href="#" onclick="ChangeInnserSort('3'); return false;"><FONT color="#693333">Recently Added</font></a> | 
<a href="#" onclick="ChangeInnserSort('4'); return false;"><FONT color="#693333">Recently Updated</font></a> | 
<a href="#" onclick="ChangeInnserSort('5'); return false;"><FONT color="#693333">Most Popular</font></a>

</span>
	</div>
	
	</form> 


	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>index.php?dll=<?=$page ?><? if(isset($search_page)){ print "&view_page=".strip_tags($search_page); }else{ print "&view_page=1"; } ?>">
	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">
	<input name="displaytype" type="hidden" value="<? if(isset($_POST['displaytype'])){ print strip_tags($_POST['displaytype']); }else{ print '1'; } ?>" id="displaytype" class="hidden">
	<input name="page" type="hidden" value="<? if(isset($search_page) && is_numeric($search_page) ){ print strip_tags($search_page); }else{ print "1"; } ?>" class="hidden" id="Spage">
	<input name="sub" type="hidden" value="<?=$sub_page ?>" class="hidden">
	<input name="do_page" type="hidden" value="<?=$page ?>" class="hidden">
	<input type="hidden" name="sort" value="1" class="hidden" id="SSort">
	<? if(is_numeric($search_uid)){ ?><input name="fcid" type="hidden" value="<?=$search_uid ?>" class="hidden"> <? } ?>

	<? if($search_total_results ==0){ ?>
	
	<div style="padding:50px;line-height:30px;"><h1><a href="<?=DB_DOMAIN ?>index.php?dll=blog&sub=search"> <?=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>
	
	<? } ?>
	 
	<? $i=1; foreach($search_data as $value){?>
	
	
		<div class="Acc_ListBox <? if($value['ThisApproved']=="no"){ ?>search_display_unapproved<? }else{ if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } } ?>" id="div_<?=$value['id'] ?>">
		<div class="Acc_ListBox_left" style="width:150px"><div class="pic75"><a class="photo_75" href="<?=$value['link'] ?>"><img src="<?=$value['image'] ?>" width="96" height="96"></a></div></div>
		<div class="Acc_ListBox_right" style="float:left">	
		<div class="Acc_ListBox_right1">
		<div class="Acc_ListBox_title_break"><a href="<?=$value['link'] ?>" title="<?=$value['title'] ?>"><?=substr($value['title'],0,40) ?>..</a>  </div>
		<b><?=$GLOBALS['_LANG']['_username'] ?>: <a href="<?=$value['user_link'] ?>"><?=$value['username'] ?></a> &nbsp; 
		<div class="Acc_ListBox_margin5">
<br>

		</div></div><div class="Acc_ListBox_right2" style="float:left"><div>
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" width="16" height="16" align="absmiddle"> <a href="<?=$value['link'] ?>"><?=$GLOBALS['_LANG']['_view'] ?></a>		<br>
		<? if($_SESSION['uid'] == $value['uid'] && $_SESSION['auth'] =="yes"){ ?>
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/pencil.png" width="16" height="16" align="absmiddle"> <a href="#" onclick="EditBlogPost('<?=$value['id'] ?>'); return false;"> <?=$GLOBALS['_LANG']['_edit'] ?> </a> <br>
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_off.png" width="16" height="16" align="absmiddle"> <a href="#" onclick="DeleteBlogPost('<?=$value['id'] ?>'); Effect.Fade('div_<?=$value['id'] ?>'); return false;"> <?=$GLOBALS['_LANG']['_delete'] ?></a>   
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




<? }elseif($show_page=="add"){ 

	 /**
	 * Page: Settings Privacy Page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
<B>What better way for someone to get to know you than by writing a blog? So many things you can blog about! Your dating life, movie reviews, recent trips, a night out, dating & relationship advice and much more!<br />
<? if(!empty($my_image_array)){ ?><br>
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

<span id="response_blog1" class="responce_alert"></span>
 
<form method="post" action="<?=DB_DOMAIN ?>index.php" onSubmit="return CheckNullsBlog('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');">
<input name="do_page" type="hidden" value="blog" class="hidden">
<input name="sub" type="hidden" value="view" class="hidden">
<? if(!isset($edit_array)){ ?><input name="do" type="hidden" value="addpost" class='hidden'><? }else{ ?><input name="do" type="hidden" value="editpost" class='hidden'><input name="eid" type="hidden" value="<?=$edit_array['id']; ?>" class='hidden'><? } ?>
<ul class="form"> 
 
<div class="CapBody">
	<li><label><?=$GLOBALS['_LANG']['_blog'] ?> <?=$GLOBALS['_LANG']['_title'] ?>: </label><input name="title" class="input" type="text" size="40" id="BlogTitle" value="<? if(isset($edit_array)){ print $edit_array['title']; } ?>">
</li>
	<? if(!empty($my_image_array)){ ?><li><label><?=$GLOBALS['_LANG']['_displayPhoto'] ?></label> 
	<span id="form_preview_image"><? if(isset($edit_array['photo']) && strlen($edit_array['photo']) > 5){ ?><img src="<?=$edit_array['photo']; ?>" style="width:45px; height:45px;" align="absmiddle"><? } ?></span> <a href="javascript:void(0)" onClick="Effect.toggle('su','blind', {queue: 'end'}); return false;" style="text-decoration:none;"><?=$GLOBALS['LANG_GLO_OPTIONS']['37'] ?></a>  
	<input type="hidden" value="<? if(isset($edit_array)){ print $edit_array['photo_name']; } ?>" name="form_preview_image_hidden" id="form_preview_image_hidden">
</li> <? } ?>


	<li> <div class="ClearAll"></div><textarea name="editor" id="editor" cols=32 rows=7 <? if(U_EDITOR =="no"){ ?>style="width:590px; height:250px;"<? } ?>><? if(isset($edit_array)){ print $edit_array['comments']; } ?></textarea></li>

	<? if($AlbumList !=""){ ?><li><label><?=$GLOBALS['_LANG']['_atTitle'] ?></label>
	<div class="tip"><?=$GLOBALS['_LANG']['_atSub'] ?></div>
	</li><? }else{ ?><input type="hidden" name="attachment" value="0"> <? } ?>


	<li><input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>
</div>
</ul>
</form>





<? } ?>
<form method="post" action="<?=DB_DOMAIN ?>index.php" name="UpdateBlog" id="UpdateBlog">
<input type="hidden" id="ChangeOrder" name="ChangeOrder" value="date" class="hidden">
<input type="hidden" id="sub" name="sub" value="blog" class="hidden">
<input name="do_page" type="hidden" value="blog" class="hidden">
</form>

<form method="post" action="<?=DB_DOMAIN ?>index.php" name="EditBlog" id="EditBlog">
<input type="hidden" id="eid" name="eid" value="0" class="hidden">
<input type="hidden" id="sub" name="sub" value="add" class="hidden">
<input name="do_page" type="hidden" value="blog" class="hidden">
</form>