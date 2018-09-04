<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>


<div class="TopCalendar" style="margin:0px;"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>






<?
$mytime=time();
$LinkString .= '&ts=';
$LinkString .= $mytime;
?>







<? if(isset($show_page) && ( $show_page=="manage" ||  $show_page=="add"  ) ){  ?>

<link rel="stylesheet" href="<?=DB_DOMAIN ?>inc/css/_profile.css" type="text/css">
<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
	 	<li <? if($show_page=="manage"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=calendar&sub=manage"><span><?=$LANG_EVENTS_MENU['manage'] ?></span></a></li>
		<li <? if($show_page=="add"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=calendar&sub=add<?=$LinkString ?>"><span><?=$LANG_EVENTS_MENU['add'] ?></span></a></li>
    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br>
<? } ?>





<? if($show_page=="home"){ 

	 /**
	 * Page: Calendar Overview
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

	$b1 = DisplayOverviewBoxes(4);
	$b2 = DisplayOverviewBoxes(2);
	$b3 = DisplayOverviewBoxes(3);
?>


 

 <table width="100%"  border="0" cellpadding="0" cellspacing="5">
<tr><td   height="35"><table width="100%" height="105"  border="0" cellpadding="0" cellspacing="0">
<tr><td   height="35" class="inner_nav_bar">&nbsp;&nbsp;<?=$GLOBALS['LANG_GLO_OPTIONS']['40'] ?></td>
</tr><tr> <td height="150" valign="top" style="padding:10px;" class="inner_nav_body">


                <ul>
                  <? foreach($cList as $cList1){ ?>
                  <li style="margin-top:10px; width:180px; background:white; float:left; margin-right:10px; padding:2px;border:1px dashed #cccccc; height:50px; valign:top;cursor:pointer;"> <a href="<?=$cList1['link'] ?>" style="text-decoration:none;">
                    <div style="background: url('<?=DB_DOMAIN ?>inc/tb.php?src=<?=$cList1['icon'] ?>&t=f&x=48&y=48') no-repeat; height:50px; width:190px; overflow:hidden; text-align:left">
                      <div style="font-size:12px; margin-left:55px;"><b>
                        <?=$cList1['name'] ?>
                      </b> </div>
                      <div style="font-size:11px; margin-left:55px;">
                        <?=$cList1['total'] ?> <?=$GLOBALS['_LANG']['_events'] ?> </div>
                    </div>
                  </a> </li>
                  <? } ?>
                  </ul>
 
</td>
            </tr>
        </table></td>
      </tr>
    </table>
 
<p style="padding:7px; background:#EBFAFB; border:1px solid #cccccc; margin-left:5px; margin-right:10px; font-weight:bold;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/book_open.png" align="absmiddle"> <a href="<?=DB_DOMAIN ?>index.php?dll=calendar&sub=search"><?=$GLOBALS['LANG_GLO_OPTIONS']['35'] ?></a></p>

 
<div class="clear"></div>

<div class="inner_nav_bar" style="padding:5px;"><?=$GLOBALS['_LANG']['_featured'] ?></div>
<br>
<? foreach(DisplayFeaturedOverview(5) as $item){   

$order   = array('\r\n', '\n', '\r', 'rn');
$replace = '';
$item['longevent'] = str_replace($order, $replace, $item['longevent']);
$item['longevent'] = striphtml($item['longevent']);


?>

<div style="border:3px solid #cccccc; padding:10px; margin-bottom:20px;">
	
	<div style="width:150px; float:left;"><a href="<?=$item['link'] ?>"><img src="<?=$item['image'] ?>"></a></div>
	<div style="width:400px; float:left;"> 
	<h2><?=$item['title'] ?></h2>
	<p style="font-weight:bold;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/date.png" width="16" height="16" align="absmiddle"> <?=$item['date'] ?> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/acc/<?=$item['attending_icon']; ?>" align="absmiddle"> <?=$item['attending']; ?>  <?=$GLOBALS['_LANG']['_attending'] ?></p>
	<p style="font-size:12px;"><?=substr($item['longevent'],0,200); ?> - <a href="<?=$item['link'] ?>"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/comments.png" align="absmiddle"><b> Read More</b></a></p>  <? if(isset($item['website']) && strlen($item['website']) > 5){ ?> <a href="<?=$item['website'] ?>" target="_blank"> <?=$GLOBALS['_LANG']['_website'] ?> </a> <? } ?></div>
	<div class="clear"></div>
</div>
<? } ?>

<div class="clear"></div>


<? if(EVENTFUL_USERNAME !="" && EVENTFUL_PASSWORD !=""){ ?>
<div style="float:right;">
<div class="eventful-badge eventful-small">
  <img src="http://api.eventful.com/images/powered/eventful_58x20.gif"
    alt="Local Events, Concerts, Tickets">
  <p><a href="http://eventful.com/">Events</a> by Eventful</p>
</div>
</div><br>
<? } ?>


<? }elseif($show_page=="search" || ( $sub_page =="manage" && $_SESSION['auth'] =="yes") ){ 

	 /**
	 * Page: Calendar Overview
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
	<input name="dll" type="hidden" value="calendar" class="hidden">
	<input name="sub" type="hidden" value="search" class="hidden">
	<input name="gid" type="hidden" value="<? if(isset($_GET['gid']) && is_numeric($_GET['gid'])){ print $_GET['gid']; } ?>" class="hidden">	
	
	<div id="Title">
		<div class="AddIcon"><br><a href="<?=DB_DOMAIN ?>index.php?dll=calendar&sub=add<?=$LinkString ?>" class="MainBtn">  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_createNew'] ?></a></div>
		<span class="a1"><?=$PageTitle ?></span>
		<span class="a2"><?=$PageDesc ?></span>
	</div>

	<?=$ThisPersonsNetworkBar ?>

	<div id="Search">
		<span class="a1"><input name="keyword" type="text" class="input" style="width:100px;"> <select name="item_id"><? foreach($cList as $cList1){ ?><option value="<?=$cList1['id'] ?>"><?=$cList1['name'] ?> ( <?=$cList1['total'] ?>)</option><? } ?></select> <input name="" type="submit" value="<?=$GLOBALS['_LANG']['_search'] ?>" class="NormBtn"> 

<? if($_SESSION['auth'] =="yes"){ ?>
<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/date.png" align="absmiddle" onClick="toggleLayer('CalHide'); return false" style="cursor:pointer;">
<? } ?>

</span>
		<span class="a2"><?=$Search_Page_Numbers ?></span>
	</div>
	<div id="Results"> 
		<span class="a1"> <b><?=$search_total_results ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
		<span class="a2"><?=$GLOBALS['_LANG']['_sort'] ?>: 
<a href="#" onclick="ChangeInnserSort('3'); return false;"><?=$GLOBALS['_LANG']['_sort3'] ?></a> | 
<a href="#" onclick="ChangeInnserSort('4'); return false;"><?=$GLOBALS['_LANG']['_sort4'] ?></a> | 
<a href="#" onclick="ChangeInnserSort('5'); return false;"><?=$GLOBALS['_LANG']['_sort5'] ?></a>

</span>
	</div>
	
	</form> 

	<span id="response_event" class="responce_alert"></span>

 
	<? if($_SESSION['auth'] =="yes"){ ?><div style="display:none;" id="CalHide"><iframe id="ListFrame" name="ListFrame" style="background:#eee; width:700px; margin-left:-50px; min-height:600px;border:0px" src="<?=DB_DOMAIN ?>inc/exe/calendar/calendar.php" scrolling="no" frameborder="0"></iframe>
	</div><? } ?>


	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>index.php?dll=<?=$page ?><? if(isset($search_page)){ print "&view_page=".strip_tags($search_page); }else{ print "&view_page=1"; } ?>">
	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">
	<input name="displaytype" type="hidden" value="<? if(isset($_POST['displaytype'])){ print strip_tags($_POST['displaytype']); }else{ print '1'; } ?>" id="displaytype" class="hidden">
	<input type="hidden" name="sort" value="1" class="hidden" id="SSort">
	<input name="page" type="hidden" value="<? if(isset($search_page) && is_numeric($search_page) ){ print strip_tags($search_page); }else{ print "1"; } ?>" class="hidden" id="Spage">
	<input name="sub" type="hidden" value="search" class="hidden">
	<input name="do_page" type="hidden" value="calendar" class="hidden">
	<? if(is_numeric($item_id)){ ?><input name="item_id" type="hidden" value="<?=$item_id ?>" class="hidden"> <? } ?>
	<? if(is_numeric($search_uid)){ ?><input name="fcid" type="hidden" value="<?=$search_uid ?>" class="hidden"> <? } ?>

	<? $i=1; foreach($search_data as $value){ 


$order   = array('\r\n', '\n', '\r', 'rn');
$replace = '';
$value['longevent'] = str_replace($order, $replace, $value['longevent']);
$value['longevent'] = striphtml($value['longevent']);


?>	
	
	
	
		<div class="Acc_ListBox <? if($value['featured']=="yes"){ ?>search_display_featured <? } if($value['ThisApproved']=="no"){ ?>search_display_unapproved<? }else{ if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } } ?>" id="div_<?=$value['id'] ?>">
		<div class="Acc_ListBox_left"><div class="pic75"><a class="photo_75" href="<?=$value['link'] ?>"><img src="<?=$value['image'] ?>" class="img_border" width="96" height="96"></a></div></div>
		<div class="Acc_ListBox_right">	
		<div class="Acc_ListBox_right1">
		<div class="Acc_ListBox_title_break"><a href="<?=$value['link'] ?>" title="<?=$value['shortevent'] ?>"><?=substr($value['shortevent'],0,50) ?>..</a>  </div>

		<?=substr($value['longevent'],0,350) ?>..<div class="Acc_ListBox_margin5">
		 <?=$GLOBALS['_LANG']['_createdBy'] ?>: <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$value['uid'] ?>"><?=$value['username'] ?></a> &nbsp;&nbsp;
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/acc/<?=$value['attending_icon']; ?>" align="absmiddle"> <?=$value['attending']; ?> <?=$GLOBALS['_LANG']['_attending'] ?>  -  <?=$value['hits']; ?> <?=$GLOBALS['_LANG']['_views'] ?>
		
		 
		
		</div></div><div class="Acc_ListBox_right2"><div>
 
		<div class="datetime">
			<div class="btm">
			<p class="mon"><?=$value['event_month'] ?></p>
			<p class="day"><?=$value['event_day'] ?></p>			
			<p class="yr"><?=$value['event_year'] ?></p>
			</div> 
		</div> 

	<? if($value['website'] !=""){ ?> <p><a href="<?=$value['website'] ?>" target="_blank"><?=$GLOBALS['_LANG']['_website'] ?></a></p><? } ?>


		<br>
	
		<? if($_SESSION['uid'] == $value['uid'] && $_SESSION['auth'] =="yes"){ ?>

		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/pencil.png" width="16" height="16" align="absmiddle"> <a href="<?=DB_DOMAIN ?>index.php?dll=calendar&sub=add&eid=<?=$value['id'] ?>"> <?=$GLOBALS['_LANG']['_edit'] ?>  </a> <br>
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_off.png" width="16" height="16" align="absmiddle"> <a href="#" onclick="DeleteEventId('<?=$value['id'] ?>','','<?=$value['senderid'] ?>'); Effect.Fade('div_<?=$value['id'] ?>'); return false;"> <?=$GLOBALS['_LANG']['_delete'] ?> </a>  
		
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


<? if(EVENTFUL_USERNAME !="" && EVENTFUL_PASSWORD !=""){ ?>
<div style="float:right;">
<div class="eventful-badge eventful-small">
  <img src="http://api.eventful.com/images/powered/eventful_58x20.gif"
    alt="Local Events, Concerts, Tickets">
  <p><a href="http://eventful.com/">Events</a> by Eventful</p>
</div>
</div><br>
<? } ?>






<? }elseif($show_page=="view"){ 

	 /**
	 * Page: Calendar Event View
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>
 



<? foreach($today_events as $value){ 

	$value_members = GetAttending($value['true_date'],$value['id']); 

?>

 
<div class="content sidebar"><div class="gradient">
<span id="response_event" class="responce_alert"></span>

<table width="850"  border="0"><tr valign="top"><td width="850" id="Profile_MainBar">

<?=DisplayMainPageInfo($value, $page, $show_page, $value['title'],$event_members) ?>

</td><td width="16">&nbsp;</td><td width="207" id="Profile_SideBar">

<h1>MINGLE INFORMATION</h1>
<div id="AttendBut_<?=$value['id'] ?>">  <a href="javascript:void(0);"  onclick="Effect.Fade('AttendBut_<?=$value['id'] ?>'); UpdateEvent('<?=$_SESSION['uid'] ?>','<?=$value['id'] ?>'); return false;"><span>* Join Mingle Guest list</span></a> <br /><br />
<a href="javascript:void(0);" onclick="Effect.Fade('AttendBut_<?=$value['id'] ?>'); UpdateEvent('<?=$_SESSION['uid'] ?>','<?=$value['id'] ?>'); return false;return false;"><span>* Remove from Guest list</span></a></div><hr>
<? if($value['eventdate'] !=""){ ?><p><strong><?=$GLOBALS['_LANG']['_date'] ?>Mingle Information<br /></strong><span> Date: <?=$value['eventdate'] ?> <br /><BR /> </span></p> <? if($value['street'] !=""){ ?><p>Address:<span> <?=$value['street'] ?> <?=$value['city'] ?>, <?=$value['province'] ?><br /><br />
<? if($value['website'] !=""){ ?><p><span> <a href="<?=$value['website'] ?>" target="_blank">Visit Venue Website</a></span></p>
</span></p><hr><? } ?><? } ?>
<? if($value['phone'] !=""){ ?><p><strong>Matchmaker Phone<br /></strong><span> <?=$value['phone'] ?></span><? } ?><hr>
<? if($value['email'] !=""){ ?><p><strong><?=$GLOBALS['_LANG']['_email'] ?>:</strong><span> <?=$value['email'] ?></span></p><? } ?><hr>
 </p><hr>
<? } ?>

<h1><?=$GLOBALS['LANG_GLO_OPTIONS']['1'] ?></h1><br>


	

	


<?=PageOptionsBox($value, $page, $show_page) ?>
 

<?=PageLinkBox() ?>
 


</td></tr></table>

</div></div>


<? if(EVENTFUL_USERNAME !="" && EVENTFUL_PASSWORD !=""){ ?>
<div style="float:right;">
<div class="eventful-badge eventful-small">
  <img src="http://api.eventful.com/images/powered/eventful_58x20.gif"
    alt="Local Events, Concerts, Tickets">
  <p><a href="http://eventful.com/">Events</a> by Eventful</p>
</div>
</div><br>
<? } ?>









<? } ?>		







<? }elseif($show_page=="add"){ 

	 /**
	 * Page: Calendar Add Event
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<br>
<form method="post" name="MemberSearch" action="<?=DB_DOMAIN ?>index.php" onsubmit="return CheckNullEvent();">                        
<input name="do_page" type="hidden" value="calendar" class="hidden">
<input name="sub" type="hidden" value="add" class="hidden">
<? if(isset($_REQUEST['eid'])){ ?>
<input name="do" type="hidden" value="edit" class="hidden">
<input name="eid" type="hidden" value="<?=strip_tags($_REQUEST['eid']) ?>" class="hidden">
<? }else{ ?>
<input name="do" type="hidden" value="add" class="hidden">
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




<span id="response_event" class="responce_alert"></span>

<div id="OldMatch">
	<ul class="form">   
 
	<div class="CapBody">
	
		<li><label><?=$GLOBALS['_LANG']['_event'] ?> <?=$GLOBALS['_LANG']['_name'] ?></label>
          <input type="text" class="input" name="name" id="name" size="40" maxlength="255" value="<? if(isset($data)){ print $data['shortevent']; } ?>">
        </li>

		<li><label><?=$GLOBALS['_LANG']['_category'] ?></label>
          <select name="catid" class="input"><? foreach($cList as $cList1){ ?><option value="<?=$cList1['id'] ?>"><?=$cList1['name'] ?> ( <?=$cList1['total'] ?>)</option><? } ?></select>
        </li>

		<? if(!empty($my_image_array)){ ?><li><label><?=$GLOBALS['_LANG']['_displayPhoto'] ?></label> 
		<span id="form_preview_image"><? if(isset($data['photo']) && strlen($data['photo']) > 5){ ?><img src="<?=$data['photo']; ?>" style="width:45px; height:45px;" align="absmiddle"><? } ?></span> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" width="16" height="16" align="absmiddle"> <a href="javascript:void(0)" onClick="Effect.toggle('su','blind', {queue: 'end'}); return false;" style="text-decoration:none;"><?=$GLOBALS['LANG_GLO_OPTIONS']['37'] ?></a><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=upload&redirect=calendar"  style="text-decoration:none;"></a>  
		<input type="hidden" value="<? if(isset($data)){ print $data['photo_name']; } ?>" name="form_preview_image_hidden" id="form_preview_image_hidden"></li>
			<? } ?>
		<li><label><?=$GLOBALS['_LANG']['_event'] ?> <?=$GLOBALS['_LANG']['_information'] ?></label><div class="clear"></div><textarea name="editor" id="editor" style="height: 30em; width: 100%;"><? if(isset($data)){ print $data['longevent']; } ?></textarea></li>


		<li><label><?=$GLOBALS['_LANG']['_event'] ?> <?=$GLOBALS['_LANG']['_time'] ?> (24:00)</label><input name="time" type="text" class="input" id="time" maxlength="10" value="<? if(isset($data)){ print $data['eventtime']; } ?>"></li>
		      <li>
                <label><?=$GLOBALS['_LANG']['_event'] ?> <?=$GLOBALS['_LANG']['_date'] ?></label>
                 <?=$GLOBALS['_LANG']['_month'] ?>: 
				 <? 
				 if(isset($data)){
					 $ee = explode("-",$data['eventdate']);
					 $data['month'] = $ee[1];
					 $data['day'] = $ee[2];
					 $data['yes'] = $ee[0];
				 }
				  ?>
                <select name="month" class="input">
                  <option value=1 <? if(isset($data)){ if($data['month']=="1"){ print"selected";} } ?>>Jan
                  <option value=2 <? if(isset($data)){ if($data['month']=="2"){ print"selected";} } ?>>Feb
                  <option value=3 <? if(isset($data)){ if($data['month']=="3"){ print"selected";} } ?>>Mar
                  <option value=4 <? if(isset($data)){ if($data['month']=="4"){ print"selected";} } ?>>Apr
                  <option value=5 <? if(isset($data)){ if($data['month']=="5"){ print"selected";} } ?>>May
                  <option value=6 <? if(isset($data)){ if($data['month']=="6"){ print"selected";} } ?>>Jun
                  <option value=7 <? if(isset($data)){ if($data['month']=="7"){ print"selected";} } ?>>Jul
                  <option value=8 <? if(isset($data)){ if($data['month']=="8"){ print"selected";} } ?>>Aug
                  <option value=9 <? if(isset($data)){ if($data['month']=="9"){ print"selected";} } ?>>Sep
                  <option value=10 <? if(isset($data)){ if($data['month']=="10"){ print"selected";} } ?>>Oct
                  <option value=11 <? if(isset($data)){ if($data['month']=="11"){ print"selected";} } ?>>Nov
                  <option value=12 <? if(isset($data)){ if($data['month']=="12"){ print"selected";} } ?>>Dec
                </select>
                &nbsp;<?=$GLOBALS['_LANG']['_day'] ?>: 
                <select name="day" class="input">
                  <option value="01" <? if(isset($data)){ if($data['day']=="01"){ print"selected";} } ?>>01</option>
                  <option value="02" <? if(isset($data)){ if($data['day']=="02"){ print"selected";} } ?>>02</option>
                  <option value="03" <? if(isset($data)){ if($data['day']=="03"){ print"selected";} } ?>>03</option>
                  <option value="04" <? if(isset($data)){ if($data['day']=="04"){ print"selected";} } ?>>04</option>
                  <option value="05" <? if(isset($data)){ if($data['day']=="05"){ print"selected";} } ?>>05</option>
                  <option value="06" <? if(isset($data)){ if($data['day']=="06"){ print"selected";} } ?>>06</option>
                  <option value="07" <? if(isset($data)){ if($data['day']=="07"){ print"selected";} } ?>>07</option>
                  <option value="08" <? if(isset($data)){ if($data['day']=="08"){ print"selected";} } ?>>08</option>
                  <option value="09" <? if(isset($data)){ if($data['day']=="09"){ print"selected";} } ?>>09</option>
                  <option value="10" <? if(isset($data)){ if($data['day']=="10"){ print"selected";} } ?>>10</option>
                  <option value="11" <? if(isset($data)){ if($data['day']=="11"){ print"selected";} } ?>>11</option>
                  <option value="12" <? if(isset($data)){ if($data['day']=="12"){ print"selected";} } ?>>12</option>
                  <option value="13" <? if(isset($data)){ if($data['day']=="13"){ print"selected";} } ?>>13</option>
                  <option value="14" <? if(isset($data)){ if($data['day']=="14"){ print"selected";} } ?>>14</option>
                  <option value="15" <? if(isset($data)){ if($data['day']=="15"){ print"selected";} } ?>>15</option>
                  <option value="16" <? if(isset($data)){ if($data['day']=="16"){ print"selected";} } ?>>16</option>
                  <option value="17" <? if(isset($data)){ if($data['day']=="17"){ print"selected";} } ?>>17</option>
                  <option value="18" <? if(isset($data)){ if($data['day']=="18"){ print"selected";} } ?>>18</option>
                  <option value="19" <? if(isset($data)){ if($data['day']=="19"){ print"selected";} } ?>>19</option>
                  <option value="20" <? if(isset($data)){ if($data['day']=="20"){ print"selected";} } ?>>20</option>
                  <option value="21" <? if(isset($data)){ if($data['day']=="21"){ print"selected";} } ?>>21</option>
                  <option value="22" <? if(isset($data)){ if($data['day']=="22"){ print"selected";} } ?>>22</option>
                  <option value="23" <? if(isset($data)){ if($data['day']=="23"){ print"selected";} } ?>>23</option>
                  <option value="24" <? if(isset($data)){ if($data['day']=="24"){ print"selected";} } ?>>24</option>
                  <option value="25" <? if(isset($data)){ if($data['day']=="25"){ print"selected";} } ?>>25</option>
                  <option value="26" <? if(isset($data)){ if($data['day']=="26"){ print"selected";} } ?>>26</option>
                  <option value="27" <? if(isset($data)){ if($data['day']=="27"){ print"selected";} } ?>>27</option>
                  <option value="28" <? if(isset($data)){ if($data['day']=="28"){ print"selected";} } ?>>28</option>
                  <option value="29" <? if(isset($data)){ if($data['day']=="29"){ print"selected";} } ?>>29</option>
                  <option value="30" <? if(isset($data)){ if($data['day']=="30"){ print"selected";} } ?>>30</option>
                  <option value="31" <? if(isset($data)){ if($data['day']=="31"){ print"selected";} } ?>>31</option>
                </select>
                &nbsp;<?=$GLOBALS['_LANG']['_year'] ?>: 
                <select name="year" class="input">
                   
                  <option value=2012 <? if(isset($data)){ if($data['yes']=="2012"){ print"selected";} } ?>>2012
                  <option value=2013 <? if(isset($data)){ if($data['yes']=="2013"){ print"selected";} } ?>>2013
                  <option value=2014 <? if(isset($data)){ if($data['yes']=="2014"){ print"selected";} } ?>>2014
                  <option value=2015 <? if(isset($data)){ if($data['yes']=="2015"){ print"selected";} } ?>>2015
                  <option value=2016 <? if(isset($data)){ if($data['yes']=="2016"){ print"selected";} } ?>>2016
                  <option value=2017 <? if(isset($data)){ if($data['yes']=="20017"){ print"selected";} } ?>>2017
                </select>

		</li>

		
		<li><label><?=$GLOBALS['_LANG']['_country'] ?></label><? print '<SELECT name="country" style="width:200px;" onchange="statedropdown(MemberSearch)" id=country class="input">';  if(isset($data)){ print DisplayCountries($data['country']); }else{ print DisplayCountries(); } ?></li>
		<li><label><?=$GLOBALS['_LANG']['_province'] ?></label>

		<input name="state" type="text" class="input" id="state" size="40" maxlength="255" value="<? if(isset($data)){ print $data['province']; } ?>"> </li>
        
        </select></li>
		<li><label><?=$GLOBALS['_LANG']['_street'] ?></label>
          <input name="street" type="text" class="input" id="street" size="40" maxlength="255" value="<? if(isset($data)){ print $data['street']; } ?>">
        </li>
		<li><label><?=$GLOBALS['_LANG']['_city'] ?></label>
          <input name="town" type="text" class="input" id="town" size="40" maxlength="255" value="<? if(isset($data)){ print $data['city']; } ?>">
        </li>
		<li><label><?=$GLOBALS['_LANG']['_phone'] ?></label>
          <input name="phone" type="text" class="input" id="phone" size="40" maxlength="255" value="<? if(isset($data)){ print $data['phone']; } ?>">
        </li>
		<li><label><?=$GLOBALS['_LANG']['_email'] ?></label>
          <input name="email" type="text" class="input" id="email" size="40" maxlength="255" value="<? if(isset($data)){ print $data['email']; } ?>">
        </li>
		<li><label><?=$GLOBALS['_LANG']['_website'] ?></label>
          <input name="website" type="text" class="input" id="website" size="40" maxlength="255" value="<? if(isset($data)){ print $data['website']; } ?>">
        </li>
		
		<li><label><?=$GLOBALS['_LANG']['_event'] ?> <?=$GLOBALS['_LANG']['_visibility'] ?>: </label><?=$GLOBALS['_LANG']['_everyone'] ?> <input name="vis" type="radio" value="all" <? if(isset($data)){ if($data['vis']=="all"){ print"checked";} }else{ print "checked"; } ?>> <?=$GLOBALS['_LANG']['_friends'] ?> <input name="vis" type="radio" value="friends" <? if(isset($data)){ if($data['vis']=="friends"){ print"checked";} } ?>>
		<div class="tip"><?=$GLOBALS['_LANG']['_eventWho'] ?></div>
		</li>

	<? if($AlbumList !=""){ ?><li><label><?=$GLOBALS['_LANG']['_atTitle'] ?></label><select name="attachment"><option value="0"><?=$GLOBALS['_LANG']['_atNo'] ?></option><?=$AlbumList ?></select> 
	<div class="tip"><?=$GLOBALS['_LANG']['_atSub'] ?></div>
	</li><? }else{ ?><input type="hidden" name="attachment" value="0"> <? } ?>
		
		<li><input  type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>
	</div>
	</ul>
</div>	
</form>


<? } ?>