<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=549139691828384";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );


if($GLOBALS['MyProfile']['status'] ==""){ $GLOBALS['MyProfile']['status'] = D_STATUSMSG; }


?>

 <div class="TopLogin"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div>


<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
	 	<li <? if($show_page=="home"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=overview"><span><?=$GLOBALS['_LANG']['_accountOverview'] ?></span></a></li>
		<? if(D_FREE =="no"){ ?><li <? if($page=="subscribe"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=subscribe"><span><?=$GLOBALS['LANG_OVERVIEW']['51'] ?></span></a></li><? } ?>
		<li <? if($show_page=="viewed"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=overview&sub=viewed"><span><?=$GLOBALS['LANG_OVERVIEW']['a21'] ?></span></a></li>
		 
    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br> 

<? if($show_page=="home"){ ?>


<div class="menu_box_title1"><?=$PageTitle ?></div>
<div class="menu_box_body1" id="s1"> 


<div class="overviewBox">


<table width="650"  border="0"><tr><td width="167" valign="top" style="font-size:12px;line-height:24px;">


<div style="margin-left:30px;">
<img src="<?=$GLOBALS['MyProfile']['image'] ?>&x=160&y=160" border="0" width="160" height="160" style="margin-top:17px;border:4px solid #dddddd;">
<div style="margin-top:20px;">
<a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=display" style="text-decoration:none;">Change Main Photo</a> 
<br><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=albums" style="text-decoration:none;"> View My Photos </a>
</div>
</div>


</td><td width="264" valign="top">


  <div style="font-size:16px; margin-top:20px;"><?=$GLOBALS['LANG_OVERVIEW']['92'] ?> <?=$_SESSION['username'] ?></div>
  <div style="font-size:12px;height:40px;line-height:15px;"><BR />Studies reveal that completed profiles receive 85% more feedback than incompleted profiles.</div>
  <br /><BR />
  <div id="ProfileComplete" style="margin-left:10px;">
	  <dl>
		  <center><a href="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit"><u>Edit My Profile</u></a> | <a href="http://www.realblacklove.com/meet/index.php?dll=Verify"><b><font size="4">Get Verified!</font></b></a></dt>
		  <dd style="margin-top:10px;">
			  
		  </dd>				
	  </dl>
    </div>


</td><td width="205" valign="top" style="font-size:14px;">




<div style="margin-top:15px;"></div>


<span style="margin-left:30px;"><b><?=$GLOBALS['_LANG']['_alert1'] ?></b></span>


<ul style="line-height:26px; margin-left:30px;margin-top:8px;font-size:11.5px;">


	<li><a href="<?=DB_DOMAIN ?>index.php?dll=search&page=1&online=1" style="text-decoration:none;"><?=$HEADER_MEMBERS_ONLINE ?>     <?=$GLOBALS['_LANG']['_members'] ?>  <?=$GLOBALS['_LANG']['_online'] ?></a></li>
	<? if(D_MESSAGES ==1){ ?><li><a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=inbox" style="text-decoration:none;"><?=$MyAlertsArray[1]['total'] ?> <?=$GLOBALS['LANG_COMMON'][39] ?></a></li><? } ?>
	<? if(D_COMMENTS ==1){ ?><li><a href="<?=DB_DOMAIN ?>index.php?dll=account&sub=comments" style="text-decoration:none;"><?=$MyAlertsArray[3]['total'] ?> <?=$GLOBALS['LANG_COMMON'][41] ?></a></li><? } ?>
	<? if(D_FRIENDS ==1){ ?><li><a href="<?=DB_DOMAIN ?>index.php?dll=friends" style="text-decoration:none;"><?=$MyAlertsArray[2]['total'] ?> <?=$GLOBALS['LANG_COMMON'][40] ?></a></li><? } ?>
	<? if(UPGRADE_SMS =="yes"){ ?><li><a href="<?=DB_DOMAIN ?>index.php?dll=settings&sub=sms" style="text-decoration:none;"><?=$GLOBALS['MyProfile']['SMS_credits'] ?> <?=$LANG_SETTINGS['a13'] ?></a></li> <? } ?>
	<li><a href="<?=DB_DOMAIN ?>index.php?dll=overview&sub=viewed" style="text-decoration:none;"><?=$GLOBALS['MyProfile']['hits'] ?> <?=$GLOBALS['_LANG']['_profile'] ?> <?=$GLOBALS['_LANG']['_views'] ?></a></li>


</ul>   


</td></tr></table>


<div class="ClearAll"></div>
</div>
</div>


<? } ?>


 
<? if($show_page=="home"){ 


	 /**
	 * Page: Overview Page
	 *
	 * @version  9.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>


<? if(D_FOLLOW ==1){ ?>


<div class="menu_box_title1">Recent Follower Updates[ <a href="<?=DB_DOMAIN ?>index.php?dll=follow"><?=$GLOBALS['_LANG']['_edit']; ?></a> ]</div>
<div class="menu_box_body1" id="s1">
<div style="margin-left:15px;">
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
		displayCommentsBox("550", "follow", "overview", $_SESSION['uid'], $_SESSION['uid'],0,0,false,true,10) ?>
</div> 
</div>




<? } ?>












<? }elseif($show_page=="viewed"){


	 /**
	 * Page: Whos viewed my profile
	 *
	 * @version  9.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


 ?>






<form method="post" action="<?=DB_DOMAIN ?>index.php" name="box">
<input name="do" type="hidden" value="history" class='hidden'>
  <table width=660  border=0 align="center" cellpadding=4 cellspacing=1 bgcolor=#999999>
    <?=$table_view; ?>
</table>
</form>








<? } ?>


<center><div class="fb-like-box" data-href="http://www.facebook.com/RealBlackLovers" data-width="600" data-height="650" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="true" data-show-border="false"></div></center>