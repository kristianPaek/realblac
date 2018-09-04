<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

if($GLOBALS['MyProfile']['status'] ==""){ $GLOBALS['MyProfile']['status'] = D_STATUSMSG; }

?>
<img src="/mobileheader.png" width="300">

<? if($show_page=="home"){ ?>


<div class="menu_box_body1" id="s1"> 



<table width="300"  border="0">
<tr><td width="300" valign="top" style="font-size:12px;line-height:24px;">
<center>
<div>
<img src="<?=$GLOBALS['MyProfile']['image'] ?>&x=150&y=150" border="2" width="175" height="200" style="margin-top:17px;border:4px solid #dddddd;">
</div></center></td>

<b><div style="font-size:16px; color:#000000; margin-top:20px;" ><center>Hello <?=$_SESSION['username'] ?> you have<br /> <? if(D_MESSAGES ==1){ ?><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilemessages&sub=inbox" style="text-decoration:none;font-size:17px;"><u>
 <?=$MyAlertsArray[1]['total'] ?></u> <?=$GLOBALS['LANG_COMMON'][39] ?></a><? } ?>
 <?
 $SQL = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$_SESSION['uid']."' AND read_status='0'";
 $Data = $DB->Query($SQL); 
 $DataArray = $DB->NextRow($Data);
 if(D_WINK ==1){ ?><a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilewink&sub=inbox" style="text-decoration:none;font-size:17px;">and<br /> <span style="text-decoration:underline;"><?php echo $DataArray['row_num']; ?></span> New Wink(s)</a><? } ?>
	</B></div>

</center>
    </dt>
<dd style="margin-top:5px;">
		  </dd>				
	  </dl>
    </div>

</tr><center>
<tr>

<td colspan="2" width="295" valign="top" style="font-size:14px;">


<div style="margin-top:15px;"></div>

<ul style="line-height:26px; margin-left:15px;margin-top:5px;font-size:11.5px;">
<center>

    
    
	<? if(D_COMMENTS ==222){ ?><li><a href="<?=DB_DOMAIN ?>mobile.php?dll=account&sub=comments" class="MainBtn" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/m_2.png" align="absmiddle"> <?=$MyAlertsArray[3]['total'] ?> <?=$GLOBALS['LANG_COMMON'][41] ?></a></li><? } ?>
	<? if(D_FRIENDS ==222){ ?><li><a href="<?=DB_DOMAIN ?>mobile.php?dll=friends" class="MainBtn" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/m_4.png" align="absmiddle"> <?=$MyAlertsArray[2]['total'] ?> <?=$GLOBALS['LANG_COMMON'][40] ?></a></li><? } ?>
	<? if(UPGRADE_SMS =="yes222"){ ?><li><a href="<?=DB_DOMAIN ?>mobile.php?dll=settings&sub=sms" class="MainBtn" style="text-decoration:none;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/m_5.png" align="absmiddle"> <?=$GLOBALS['MyProfile']['SMS_credits'] ?> <?=$LANG_SETTINGS['a13'] ?></a></li> <? } ?>
</center>
</ul>   


<? if(D_FREE =="no"){ ?>
<center>
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilemessages&sub=inbox" class="MainBtn" style="font-size:16px;color:#0296c0;padding-middle:70px;"><b>Go to my Inbox</b></font></a> | <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilewink&sub=inbox" class="MainBtn" style="font-size:16px;color:#0296c0;padding-middle:70px;"><b>Check my Winks</B></font></a><br /><? if(D_HOTLIST ==1){ ?> <br /> 
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&friendid=<?=$_SESSION['uid'] ?>&friend_type=1&displaytype=detail" class="MainBtn" style="font-size:16px;color:#0296c0;padding-middle:70px;"> <B>View Favorites</B> </a> <? } ?> &nbsp;| <a href="http://www.realblacklove.com/meet/mobile.php?dll=mobilesearch&sub=advanced" class="MainBtn" style="font-size:16px;color:#0296c0;padding-middle:70px;"><B>Member Search</B> </a> <br /><br /> 
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileoverview&sub=viewed" class="MainBtn" style="font-size:16px;padding-middle:70px;"><font color="#0296c0"><b>Who's Viewed</b></a></font> | <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesearch&view_page=1" class="MainBtn" style="font-size:16px;padding-middle:70px;"><font color="#0296c0"><b>Who is Online</b></font></a>&nbsp;&nbsp;<br /><br />
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilegallery&sub=albums" class="MainBtn" style="font-size:16px;padding-middle:70px;"><font color="#0296c0"><b>All my Photos</b></font></a> | <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileaccount&sub=view" class="MainBtn" style="font-size:16px;padding-middle:70px;"><font color="#0296c0"><b>View my Profile</b></font></a><br /><br /> 
&nbsp;<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobileaccount&sub=edit" class="MainBtn" style="font-size:16px;padding-middle:70px;"><font color="#0296c0"><b>Edit my Profile</b></font></a> | <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesubscribe" class="MainBtn" style="font-size:16px;padding-middle:70px;"><font color="#0296c0"><b>My Subscription</b></font></a><br /><br /><br />
<? } ?>
<? if(D_FRIENDS ==1){ ?>
<br><br>
<a href="<?=DB_DOMAIN ?>mobile.php?dll=friends&sub=edit" class="MainBtn" style="font-size:16px;padding-left:30px;">  
<?=$GLOBALS['_LANG']['_my'] ?> <?=$GLOBALS['_LANG']['_friendsList'] ?></a></center>
<? } ?>

</center>
</td></tr></table>

<div class="ClearAll"></div>
</div>
<center><font color="#F00056">We are happy to announce that the new RBL Android and IPhone apps will be launching very soon. Stay tuned!</font></center>
<br />
<br />
Studies reveal that completed profiles receive 85% more feedback than profiles that are incomplete. Make sure your profile stays updated. <br /> 
<br />

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
<BR /><CENTER><font size="4" color="#F00056">Who Viewed My Profile</font></CENTER>
<hr>
  <table width=660  border=0 align="center" cellpadding=4 cellspacing=1 bgcolor=#999999>
    <?=$table_view; ?>
</table>
</form>




<? } ?>
