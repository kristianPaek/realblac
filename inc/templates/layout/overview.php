<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );
if($GLOBALS['MyProfile']['status'] ==""){ $GLOBALS['MyProfile']['status'] = D_STATUSMSG; }
?>
<? if($show_page=="home"){ ?>

<center><font size="2">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">Inbox</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=search&view_page=1">Online Now</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=overview&sub=viewed">Viewed Me</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">Winked Me</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">My Favorites</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">My Photos</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">My Profile</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">Subscription</A> | <a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Settings</a> | <a href="http://www.realblacklove.com/blog">Dating Blog</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font><br /></center>

<table width="1100" height="600" border="0" cellspacing="20"><tr><td width="10" align="left" style="font-size:12px;line-height:15px;">

</td><td width="325" valign="top">

<center><img src="http://www.realblacklove.com/sitetop.png"></center><BR />

 <center> <div style="font-size:18px; color:#F00056; margin-top:1px;">Hello and welcome back <?=$_SESSION['username'] ?> <? if(D_MESSAGES ==1){ ?> <a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=inbox" style="text-decoration:none;font-size:20px;"> <br />You have <u>
 <?=$MyAlertsArray[1]['total'] ?></u> new email(s) and</a> <? } ?>
 <?
 $SQL = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$_SESSION['uid']."' AND read_status='0'";
 $Data = $DB->Query($SQL); 
 $DataArray = $DB->NextRow($Data);
 if(D_WINK ==1){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=winkmessages&sub=inbox" style="text-decoration:none;font-size:20px;"><span style="text-decoration:underline;"><?php echo $DataArray['row_num']; ?></span> new wink(s)</a><? } ?></center>
	</B>

</div>

<div style="font-size:14px;height:100px;line-height:25px;"><br />
<b>Site Announcements:</b> <BR />We are celebrating our launch by extending a 50% discount on VIP upgrades to all members. Just enter the coupon code "BlackLove" to reserve your savings today. Limited-time only offer! <br /><br />
<b>Site Updates:</b> <br />- The RBL Android and IPhone apps are very close to launch. Stay tuned!<BR />- We have implemented an auto-rotate feature to align your photos correctly, Visit (My Photos). <BR />-Fixed the photo size issue. Previously uploaded photos may be distorted. Please upload new photos if your profile has been affected. <BR />-New email messaging system for a better user experience.<BR /></dt>


 <div id="ProfileComplete" style="margin-left:10px;">






	  <dl>

</div>
	
			  
		  </dd>				
	  </dl>
    </div>

</td>


<td width="305" valign="top" style="font-size:14px;">




<div style="margin-top:15px;"></div>
<center>
<img src="<?=$GLOBALS['MyProfile']['image'] ?>&x=180&y=200" border="1" width="180" height="200" style="margin-left:17px;border:2px solid #dddddd;">
<br /><br />
<div style="margin-left:15px;">
<a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=display" style="text-decoration:none;"><u><font size="3">Change Main Photo</font></u></a></center>


<ul style="line-height:26px; margin-left:30px;margin-top:8px;font-size:16px;">

    
    
	<? 
	$SQL = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$_SESSION['uid']."' AND read_status='0'";
	$Data = $DB->Query($SQL);	
	$DataArray = $DB->NextRow($Data);
    ?>

</ul>   
<CENTER><a href="/meet"><img src="/logo250.png" width="150"></a></CENTER>
</td></tr></table>


<div class="ClearAll"></div>
</div>
</div>

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

<center><font size="2">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">Inbox</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=search&view_page=1">Online Now</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=overview&sub=viewed">Viewed Me</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">Winked Me</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">My Favorites</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">My Photos</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">My Profile</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">Subscription</A> | <a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Settings</a> | <a href="http://www.realblacklove.com/blog">Dating Blog</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font><br /></center>
<BR /><CENTER><font size="4" color="#F00056">Who Viewed My Profile</font></CENTER>
<hr>
  <table width=800  border=0 align="center" cellpadding=4 cellspacing=5 bgcolor=#999999>
    <?=$table_view; ?>
</table>
</form>


<? } ?>