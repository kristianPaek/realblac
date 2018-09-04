<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

if($GLOBALS['MyProfile']['status'] ==""){ $GLOBALS['MyProfile']['status'] = D_STATUSMSG; }

?>
 <div class="TopLogin"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>

<? if($show_page=="home"){ ?>


<div class="menu_box_body1" id="s1"> 

<div class="overviewBox22">

<table width="320"  border="0">

<tr><td width="110" valign="top" style="font-size:12px;line-height:24px;">
<center>
<div>
<img src="<?=$GLOBALS['MyProfile']['image'] ?>&x=150&y=150" border="2" width="150" height="150" style="margin-top:17px;border:4px solid #dddddd;">

</div>

</td>
<center><div style="font-size:16px; margin-top:20px;"><?=$GLOBALS['LANG_OVERVIEW']['92'] ?> <?=$_SESSION['username'] ?></div>
  <div style="font-size:12px;height:40px;line-height:15px;"><BR />Studies reveal that completed profiles receive 85% more feedback than profiles that are incomplete. Make sure your profile is updated!</div>
  <br />
   </dt>
		  <dd style="margin-top:10px;">
		

		  </dd>				
	  </dl>
    </div>

</tr><center>
<tr>

<td colspan="2" width="295" valign="top" style="font-size:14px;">


<div style="margin-top:15px;"></div>


<ul style="line-height:26px; margin-left:15px;margin-top:5px;font-size:11.5px;">
<center>

	<? if(D_MESSAGES ==1){ ?><li><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilemessages&sub=inbox" style="text-decoration:none;font-size:14px;">You have <u><?=$MyAlertsArray[1]['total'] ?></u> <?=$GLOBALS['LANG_COMMON'][39] ?></a></li><? } ?>
	<? if(D_COMMENTS ==222){ ?><li><a href="<?=DB_DOMAIN ?>mobile.php?dll=account&sub=comments" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/m_2.png" align="absmiddle"> <?=$MyAlertsArray[3]['total'] ?> <?=$GLOBALS['LANG_COMMON'][41] ?></a></li><? } ?>
	<? if(D_FRIENDS ==222){ ?><li><a href="<?=DB_DOMAIN ?>mobile.php?dll=friends" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/m_4.png" align="absmiddle"> <?=$MyAlertsArray[2]['total'] ?> <?=$GLOBALS['LANG_COMMON'][40] ?></a></li><? } ?>
	<? if(UPGRADE_SMS =="yes222"){ ?><li><a href="<?=DB_DOMAIN ?>mobile.php?dll=settings&sub=sms" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/m_5.png" align="absmiddle"> <?=$GLOBALS['MyProfile']['SMS_credits'] ?> <?=$LANG_SETTINGS['a13'] ?></a></li> <? } ?>

</ul>   


<? if(D_FREE =="no"){ ?>
<br><center>
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileaccount&sub=edit" class="MainBtn" style="font-size:16px;padding-middle:70px;">Edit My Profile</a>

<BR /><BR />
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesubscribe" class="MainBtn" style="font-size:16px;padding-middle:70px;">My Membership</a>
<? } ?>

<br><br>
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileoverview&sub=viewed" class="MainBtn" style="font-size:16px;padding-middle:70px;">Who's Viewed Me</a>

<br><br>
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileaccount&sub=view" class="MainBtn" style="font-size:16px;padding-middle:70px;">View My Profile</a>

<? if(D_FRIENDS ==1){ ?>
<br><br>
<a href="<?=DB_DOMAIN ?>mobile.php?dll=friends&sub=edit" class="MainBtn" style="font-size:16px;padding-left:30px;">  
<?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_friendsList'] ?></a>
<? } ?>

<br><br></center>

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











<? }elseif($show_page=="viewed"){

	 /**
	 * Page: Whos viewed my profile
	 *
	 * @version  9.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

 ?>



<form method="post" action="<?=DB_DOMAIN ?>mobile.php" name="box">
<input name="do" type="hidden" value="history" class='hidden'>
  <table width=660  border=0 align="center" cellpadding=4 cellspacing=1 bgcolor=#999999>
    <?=$table_view; ?>
</table>
</form>




<? } ?>
