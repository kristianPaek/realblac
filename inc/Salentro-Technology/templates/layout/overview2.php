<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );
if($GLOBALS['MyProfile']['status'] ==""){ $GLOBALS['MyProfile']['status'] = D_STATUSMSG; }
?>

<? if($show_page=="home"){ ?>
<br /><table width="1000"  border="10"><tr><td width="10" valign="right" style="font-size:12px;line-height:10px;">

<font size="4">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a> <br /> <br /><A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">Inbox</a> <br /><br /> <A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search</a> <br /><br /> <a href="http://www.realblacklove.com/meet/index.php?dll=search&view_page=1">Who's Online</a> <br /><br /> <a href="http://www.realblacklove.com/meet/index.php?dll=overview&sub=viewed">Viewed Me</a> <br /><br /> <a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">Winked Me</a> <br /> <br /><A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">Favorites</a> <br /><br /> <A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">Photos</a> <br /><br /> <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">Profile</a> <br /><br /> <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> <br /><br /> <a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">Subscription</A> <br /><br /> <a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Settings</a><br /> <br /> <a href="http://www.realblacklove.com/blog">Dating Blog</a> <br /><br />
<a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font>

</td><td width="364" valign="top">

 <center> <div style="font-size:18px; color:#F00056; margin-top:1px;">Hello and Welcome Back <?=$_SESSION['username'] ?> <? if(D_MESSAGES ==1){ ?> <a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=inbox" style="text-decoration:none;font-size:20px;"> <br />You have <u>
 <?=$MyAlertsArray[1]['total'] ?></u> New Email(s) and</a> <? } ?>
 <?
 $SQL = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$_SESSION['uid']."' AND read_status='0'";
 $Data = $DB->Query($SQL); 
 $DataArray = $DB->NextRow($Data);
 if(D_WINK ==1){ ?><a href="<?=DB_DOMAIN ?>index.php?dll=winkmessages&sub=inbox" style="text-decoration:none;font-size:20px;"><span style="text-decoration:underline;"><?php echo $DataArray['row_num']; ?></span> New Wink(s)</a><? } ?></center>
	</B>


</div><br />
<div style="font-size:14px;height:100px;line-height:25px;"><b>Site Updates:</b> <BR />(1) We have implemented an auto-rotate feature to align your photos correctly, Visit (My Photos). <BR />(2) Fixed the photo size issue. Previously uploaded photos may be distorted. Please upload new photos if your profile has been affected. <BR />(3) New email messaging system for a better user experience.<BR /></dt>


 <div id="ProfileComplete" style="margin-left:10px;">






	  <dl>

</div>
	
			  
		  </dd>				
	  </dl>
    </div>


</td>


<td width="205" valign="top" style="font-size:14px;">




<div style="margin-top:15px;"></div>

<img src="<?=$GLOBALS['MyProfile']['image'] ?>&x=180&y=200" border="1" width="180" height="200" style="margin-left:17px;border:2px solid #dddddd;">
<br /><br />
<div style="margin-left:15px;">
<a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=display" style="text-decoration:none;"><u><font size="4">Change Main Photo</font></u></a>


<ul style="line-height:26px; margin-left:30px;margin-top:8px;font-size:16px;">

    
    
	<? 
	$SQL = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$_SESSION['uid']."' AND read_status='0'";
	$Data = $DB->Query($SQL);	
	$DataArray = $DB->NextRow($Data);
    ?>
<br />Completed profiles have a 85% better success rate!<br />

</ul>   
<a href="/meet"><img src="/logo250.png" width="120"></a>
</td></tr></table>


<div class="ClearAll"></div>
</div>
</div>


<? } ?>