<?
/**
* Page: DISPLAYS MEMBER VIDEOS MIXED WITH YOUTUBE IF PLUGIN ADDED
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  inc/func/func_videos_page.php
*/
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<div class="TopVideos" style="margin:0px;"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><p><?=$PageDesc ?></p>


 




<? if($show_page =="search"){ 

	 /**
	 * Page: Search Display
	 *
	 * @version  9.0
	 */


?>


	<div id="eMeetingContentBox">

	<form method="GET" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
	<input name="dll" type="hidden" value="videos" class="hidden">
	<input name="sub" type="hidden" value="search" class="hidden">
	
	<div id="Title">
		<div class="AddIcon"><br><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=upload" class="MainBtn">  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_createNew'] ?></a></div>
		<span class="a1"><?=$PageTitle ?></span>
		<span class="a2"><?=$PageDesc ?></span>
	</div>

	<?=$ThisPersonsNetworkBar ?>

	<div id="Search">
		<span class="a1"><input name="keyword" type="text" class="input"> <input name="" type="submit" class="NormBtn" value="<?=$GLOBALS['_LANG']['_search'] ?>"></span>
		<span class="a2"><?=$Search_Page_Numbers ?></span>
	</div>
	<div id="Results"> 
		<span class="a1"> <b><?=$search_total_results ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
		
	</div>
	
	</form> 


	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>index.php?dll=<?=$page ?><? if(isset($search_page)){ print "&view_page=".strip_tags($search_page); }else{ print "&view_page=1"; } ?>">
	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">
	<input name="page" type="hidden" value="<? if(isset($search_page) && is_numeric($search_page) ){ print strip_tags($search_page); }else{ print "1"; } ?>" class="hidden" id="Spage">
	<input name="sub" type="hidden" value="<?=$sub_page ?>" class="hidden">
	<input name="do_page" type="hidden" value="<?=$page ?>" class="hidden">
	<input type="hidden" name="sort" value="1" class="hidden" id="SSort">
	<? if(is_numeric($item_id)){ ?><input name="item_id" type="hidden" value="<?=$item_id ?>" class="hidden"> <? } ?>
	<input name="keyword" type="hidden" value="<? if(isset($_GET['keyword']) ){ print strip_tags($_GET['keyword']); }else{print "music"; } ?>" class="hidden">


	<? if($search_total_results ==0){ ?>
	
	<div style="padding:50px;line-height:30px;"><h1><a href="<?=DB_DOMAIN ?>index.php?dll=videos&sub=search"> <?=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>
	
	<? } ?>
	
	<? $i=1; if(is_array($search_data)){ foreach($search_data as $value){ ?>	
	
		<div class="Acc_ListBox <? if($value['ThisApproved']=="no"){ ?>search_display_unapproved<? }else{ if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } } ?>" id="div_<?=$value['id'] ?>">
		<div class="Acc_ListBox_left"><div><a href="<?=$value['link'] ?>" title="<?=$value['image_alt'] ?>"><img src="<?=$value['image'] ?>" alt="<?=$value['image_alt'] ?>" width="110"></a></div></div>
		<div class="Acc_ListBox_right">	
		<div class="Acc_ListBox_right1">
		<div class="Acc_ListBox_title_break"><a href="<?=$value['link'] ?>" title="<?=$value['title'] ?>"><?=$value['image_alt'] ?></a> </div>
		<b><?=$GLOBALS['_LANG']['_date'] ?>: <?=$value['date'] ?> <br> <?=$GLOBALS['_LANG']['_views'] ?>: <?=$value['views'] ?></b>
		<div class="Acc_ListBox_margin5"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/tpl_icon_tags.png" align="absmiddle">
	<?
			// displays video tags
			$bolx = explode(" ",$value['tags']);
			for ($ix=0;$ix<=count($bolx)-1;$ix++) {
			echo "<a class='tags' href='".DB_DOMAIN."index.php?dll=videos&sub=search&keyword=$bolx[$ix]'>$bolx[$ix]</a> ";
			}
	?>
		</div></div><div class="Acc_ListBox_right2"><div>
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" align="absmiddle"> <a href="<?=$value['link'] ?>"><?=$GLOBALS['LANG_COMMON'][38] ?></a>

		<?
		## display delete functions for moderator
		if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" && $value['ThisApproved']=="no"){ ?>
					
		<span id="Approvediv_<?=$value['id'] ?>"><br><a href="javascript:void(0)" onClick="AdminLiveApprove('<?=$value['id'] ?>', 'video', ''); Effect.Fade('Approvediv_<?=$value['id'] ?>'); return false;" style="text-decoration:none">
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_on.png"> &nbsp;&nbsp; <?=$GLOBALS['_LANG']['_approve'] ?> </a></span>
		<? } ?>

		<?
		## display delete functions for moderator
		if( isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes" && $value['uid'] !=0){ ?>
					
		<br><a href="javascript:void(0)" onClick="AdminLiveDelete('<?=$value['id'] ?>', 'video', ''); Effect.Fade('div_<?=$value['id'] ?>'); return false;" style="text-decoration:none">
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_delete'] ?> </a>
		<? } ?>	

		</div></div><div class="clear"></div></div><div class="clear"></div></div>



	<? $i++; } } ?>

	<div id="Bottom"><?=$Search_Page_Numbers ?></div>

	</form>


	</div> <!-- end main box -->






<? }elseif($show_page=="view"){ 

	 /**
	 * Page: View video file
	 *
	 * @version  9.0
	 */

?>

 	
	<div align="center" style="border:3px dashed #999999; background:#eeeeee; margin-bottom:30px; padding:10px;"><? print $video['file']; ?></div>
	
	<div class="content sidebar"><div class="gradient">
	
	<table width="660"  border="0"><tr valign="top"><td width="423" id="Profile_MainBar">
	
	
			<div style="padding-right:10px; float:left; height:120px;"><? if($video['image'] !=""){ ?><img src="<?=$video['image'] ?>"  style="float:left;width:130px; height:100px;" class="img_border"> <? } ?> </div> 		
			<h1 style="line-height:30px;"><?=$PageTitle ?></h1>
			<h2 style="line-height:30px;"><?=substr($video['desc'],0,30) ?></h2>
	<div class="clear"></div>
<? if(D_COMMENTS ==1){ ?>
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
	displayCommentsBox("310", $page, $show_page, $_SESSION['uid'], $video['id'],0,0) ?>
	
	<? } ?>
	</td><td width="16">&nbsp;</td><td width="207" id="Profile_SideBar">
	
	<div class="menu_box_title1">
	<span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span>
	<?=$GLOBALS['_LANG']['_searchQ'] ?> </div>
	<div class="menu_box_body1">
	<form method="GET" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
		<input name="dll" type="hidden" value="videos" class="hidden">
		<input name="sub" type="hidden" value="search" class="hidden">
		
	<input name="keyword" type="text" class="input"> <input type="submit" class="NormBtn" value="<?=$GLOBALS['_LANG']['_search'] ?>">
		
		</form> 
	</div>
	<br>
	<div class="menu_box_title1">
	<span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span>
	 <?=$GLOBALS['_LANG']['_information'] ?> </div>
	<div class="menu_box_body1">
	
	<div style="background:#eee; border:1px solid #ccc; overflow:auto; height:100px;color:#333333;"><? print $video['desc']; ?></div>
	
	<br>
	<span><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/16/tpl_icon_tags.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_tags'] ?>: </span>
	<?
	
			$bolx = explode(" ",$video['tags']);
			for ($ix=0;$ix<=count($bolx)-1;$ix++) {
			echo "<a class='tags' href='".DB_DOMAIN."index.php?dll=videos&sub=search&keyword=$bolx[$ix]'>$bolx[$ix]</a> ";
			}
	?>
	<br><br>
	<?=PageLinkBox() ?>
	</div>
	
	<? if(YOUTUBE_API_ID !=""){ ?><div align="center"><a href="http://www.youtube.com" target="_blank"><img src="<?=DB_DOMAIN ?>images/youtube.gif"></a></div><? } ?>

	</td></tr></table>
	
	</div></div>


<? } ?>