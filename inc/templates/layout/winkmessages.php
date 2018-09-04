<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );
?>

<? if(isset($show_page) && ( $show_page !="home"  ) ){  ?>


<? } ?>

<? if($show_page=="home"){ 


	 /**
	 * Page: Messages Overview
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>


<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"> <div style="padding:10px;font-weight:bold;"><h3 style="padding:0px; margin:0px;">
</div>
	
<b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="margin-left:00px;">




<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>



<br><br>
</div>
<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>


<div class="ClearAll"></div>






<? }elseif($show_page=="create"){

	 /**
	 * Page: Create Message
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<script src="<?=DB_DOMAIN ?>inc/js/lay/controls.js" type="text/javascript"></script>



	<!-- ****************** UPLOAD WAITING / LOADING SCREEN ************** -->
	<div id="UploadWait"> 
	<ul class="form"> 
	<div class="CapBody">	
		<p><strong><?=$GLOBALS['LANG_MESSAGES']['a3'] ?></strong></p>
		<p><?=$GLOBALS['LANG_MESSAGES']['a4'] ?></p>
		<p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_gal/loading.gif"></p>
	</div>
	</ul>
	</div>
	<!-- **************************************************************** --> 

<div id="SendMsgBoxDiv" style="display:visible;">


 

<script type="text/javascript">
new Ajax.Autocompleter('SendTo','update','<?=DB_DOMAIN ?>inc/exe/Responce/response.php', { tokens: ','} );
</script>












<? }elseif($show_page=="inbox"){ 
?>
<center><font size="2">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">Inbox</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=search&view_page=1">Online Now</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=overview&sub=viewed">Viewed Me</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">Winked Me</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">My Favorites</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">My Photos</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">My Profile</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">Subscription</A> | <a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Settings</a> | <a href="http://www.realblacklove.com/blog">Dating Blog</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font><br /><br /><br /></center>
<div id="eMeetingContentBox">
	<div id="Title">&nbsp;<FONT SIZE="4">Winks are stored for 14 days.</FONT></div>

	<?php 
	echo '<div>';
	//print_r($_SESSION);die;
	$fulldayname = array(
					'Mon'=>'Monday',
					'Tue'=>'Tuesday',
					'Wed'=>'Wednessday',
					'Thu'=>'Thursday',
					'Fri'=>'Friday',
					'Sat'=>'Saturday',
					'Sun'=>'Sunday'
						);
	for($i=0;$i<14;$i++){
	$viewedWink = array();
	$unviewedWink = array();
	$date = date("Y-m-d", strtotime( -$i.' days' ) );
	$SQL = "SELECT members.*,winkmessagessend.read_status as read_status from winkmessagessend inner join members on members.id = winkmessagessend.wink_from WHERE wink_to='".$_SESSION['uid']."' && onlydate = '".$date."'";
	$Data = $DB->Query($SQL);	
	
	if(mysql_num_rows($Data)>0){
	$str=explode('-',$date);
	echo '<div style="clear:both; height:30px;"></div>';
	echo '<div>'.$fulldayname[date('D', strtotime($date))].' ('.$str[2].' '.date("M").')</div>'; ?>
    <?php
	while($row=mysql_fetch_array($Data)){
	if($row['read_status']==0){
		//unviewed
		$unviewedWink[] = array('id'=>$row['id'],'username'=>$row['username'],'view_status'=>$row['read_status']);
	} else if($row['read_status']==1){
		$viewedWink[] = array('id'=>$row['id'],'username'=>$row['username'],'view_status'=>$row['read_status']);
	}
	} 
	$allElements = array_merge($unviewedWink, $viewedWink);
	//echo "<pre>";
	//print_r($allElements);
	
	for($j=0;$j<count($allElements);$j++){
	//echo "<pre>";
	//print_r($allElements);

	if($j%6==0){
		echo '<div style="clear:both; height:10px;"></div>';
	}
	?>
    <div style="float:left; padding:10px; cellspacing:10px; width:150px;">
        <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?php echo $allElements[$j]['id']; ?>"><img src="http://www.realblacklove.com/wink2.jpg" /></a><br />
        <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?php echo $allElements[$j]['id']; ?>"><?php echo $allElements[$j]['username']; ?></a>
        <br /> 
        <?php 
		if($allElements[$j]['view_status']==0){ ?>
       <div style="color:green;font-weight: bold;font-size: 14px;font-style: italic;">NEW WINK</div>
		<?php
        } else { ?>
		<div style="color:#FF0000;font-weight: bold;font-size: 14px;font-style: italic;">VIEWED</div>
		<?php
        }
		?>
	</div>
<?php
	} 
	}
	}
?>
</div>



	</div> <!-- end main box -->

<? }?>