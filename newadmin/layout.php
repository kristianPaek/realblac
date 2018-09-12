<?php $tdata = array(); ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
<title><?=$admin_layout_header['title'] ?> - <?=$_SESSION['admin_name'] ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$admin_layout_header['charset'] ?>">
<script src="inc/js/Ajax.js" type="text/javascript"></script>
<?php print Header_LoadScripts($_REQUEST['n'], $_GET['p']) ?>

<?php  print Header_LoadCSS($_REQUEST['n'], $_GET['p']) ?>

 
</head>

<body onLoad="<?php print Header_LoadOn($_REQUEST['n'], $_GET['p']) ?>">


<div id="container">

 <div id="wrapper">
 
  <div id="header">

 <?php

	## define variables
	$CheckData = array(); $Counter=1; 

	$SQL = "select row_num from 
		(
			SELECT count(id) AS row_num FROM members WHERE ( active='unapproved' )
	 
			union ALL	

			SELECT count(uid) AS found FROM files WHERE ( approved='no' AND type='photo' )

			union ALL	

			SELECT count(uid) AS found FROM files WHERE ( approved='no' AND (type='video' or type='youtube'))
	 
			union ALL	

			SELECT count(uid) AS found FROM files WHERE ( approved='no' AND type='music' )

			union ALL	

			SELECT count(id) AS found FROM calendar_data  WHERE ( approved='no' )			

			union ALL	

			SELECT count(id) AS found FROM class_adverts  WHERE ( approved='no' )	

		) as derived_table";
	 
	$CheckThis = $DB->Query($SQL);
 
	## loop data from query
 	while( $DataArray = $DB->NextRow($CheckThis) ){

		$CheckData[$Counter]['total'] = number_format($DataArray['row_num']); 
		$Counter++;
	}	
?>
 
        <div id="menuTop">

 			 	<ul class="group" id="menu_group_main">
            	<li><a href="members.php?ustatus=unapproved" class="<?php if($CheckData[1]['total'] > 0){ print "alertOn"; }else{ print "alertOff"; } ?>"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/users_<?php if($CheckData[1]['total'] > 0){ print "on"; }else{ print "off"; } ?>.png);">New Members</span></span></a></li>
                <li><a href="members.php?p=files&t=photo" class="<?php if($CheckData[2]['total'] > 0){ print "alertOn"; }else{ print "alertOff"; } ?>"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/image_<?php if($CheckData[2]['total'] > 0){ print "on"; }else{ print "off"; } ?>.png);">Photos</span></span></a></li>
                <li><a href="members.php?p=files&t=video" class="<?php if($CheckData[3]['total'] > 0){ print "alertOn"; }else{ print "alertOff"; } ?>"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/video_<?php if($CheckData[3]['total'] > 0){ print "on"; }else{ print "off"; } ?>.png);">Videos</span></span></a></li>
                <li><a href="members.php?p=files&t=music" class="<?php if($CheckData[4]['total'] > 0){ print "alertOn"; }else{ print "alertOff"; } ?>"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/sound_<?php if($CheckData[4]['total'] > 0){ print "on"; }else{ print "off"; } ?>.png);">Music</span></span></a></li>
            	<li><a href="management.php?p=cal" class="<?php if($CheckData[5]['total'] > 0){ print "alertOn"; }else{ print "alertOff"; } ?>"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/events_<?php if($CheckData[5]['total'] > 0){ print "on"; }else{ print "off"; } ?>.png);">Events</span></span></a></li>
                <li><a href="management.php?p=class" class="<?php if($CheckData[6]['total'] > 0){ print "alertOn"; }else{ print "alertOff"; } ?>"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/adverts_<?php if($CheckData[6]['total'] > 0){ print "on"; }else{ print "off"; } ?>.png);">Adverts</span></span></a></li>
                <li><a href="email.php?p=tc" class="<?php if($CheckData[7]['total'] > 0){ print "alertOn"; }else{ print "alertOff"; } ?>"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/reports_<?php if($CheckData[7]['total'] > 0){ print "on"; }else{ print "off"; } ?>.png);">Reports</span></span></a></li>
                <li><a href="logout.php"><span class="outer"><span class="inner" style="background-image: url(inc/images/24x24/logout.png);">Logout</span></span></a></li>
        		</ul>
		</div>
 

	<!-- SART MAIN MENU -->
	<div id="nav_spacer">
	<div id="nav">	
	
		<ul id="sddm">		
		
			<li><a href="overview.php" onmouseover="mopen('m1')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==0){ print "class='selected mmm'"; } ?>><?=$admin_layout_nav['1'] ?></a>
				<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
				   <?=MakeMenuBar($admin_layout_page1,"top","overview.php") ?>					
			 
				</div>
			</li>
			
			
			
			<?php if( in_array("2",$_SESSION['admin_access_level']) ){ ?>
			
			<li><a href="members.php" onmouseover="mopen('m2')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==1){ print "class='selected mmmm'"; } ?>><?=$admin_layout_nav['2'] ?></a>
				<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<?=MakeMenuBar($admin_layout_page2,"top","members.php") ?>			
				</div>
			</li>
			
			<?php } ?>
			
			<?php if( in_array("3",$_SESSION['admin_access_level']) ){ ?>
			
			<li><a href="template.php" onmouseover="mopen('m3')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==2){ print "class='selected'"; } ?>><?=$admin_layout_nav['3'] ?></a>
				<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<?=MakeMenuBar($admin_layout_page3,"top","template.php") ?>										
				</div>
			</li>
			
			<?php } ?>
			
			<?php if( in_array("4",$_SESSION['admin_access_level']) ){ ?>
			
			<li><a href="email.php" onmouseover="mopen('m4')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==3){ print "class='selected'"; } ?>><?=$admin_layout_nav['4'] ?></a>
				<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<?=MakeMenuBar($admin_layout_page4,"top","email.php") ?>
				</div>
			</li>
			
			<?php } ?>
			
			<?php if( in_array("5",$_SESSION['admin_access_level']) ){ ?>
			
			<li><a href="billing.php" onmouseover="mopen('m5')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==4){ print "class='selected'"; } ?>><?=$admin_layout_nav['5'] ?></a>
				<div id="m5" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<?=MakeMenuBar($admin_layout_page5,"top","billing.php") ?>
					
						
				</div>
			</li>
			
			<?php } ?>
			
			<?php if( in_array("6",$_SESSION['admin_access_level']) ){ ?>
			
				<li><a href="settings.php" onmouseover="mopen('m6')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==6 || $_REQUEST['n'] ==8){ print "class='selected'"; } ?>><?=$admin_layout_nav['6'] ?></a>
				<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
				<?=MakeMenuBar($admin_layout_page6,"top","advertising.php") ?> <?=MakeMenuBar($admin_layout_page7,"top","settings.php") ?>
				</div>
			</li>
			
			
			<?php } ?>
			
			<?php if( in_array("7",$_SESSION['admin_access_level']) ){ ?>
			
			<li><a href="management.php" onmouseover="mopen('m7')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==7){ print "class='selected'"; } ?>><?=$admin_layout_nav['7'] ?></a>
				<div id="m7" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
				<?=MakeMenuBar($admin_layout_page8,"top","management.php",1) ?>
				</div>
			</li>		
			
			<?php } ?>

			<?php if( in_array("8",$_SESSION['admin_access_level']) ){ ?>
			<li><a href="plugins.php" onmouseover="mopen('m9')" onmouseout="mclosetime()" <?php if($_REQUEST['n'] ==14){ print "class='selected'"; } ?>><?=$admin_layout_nav['9'] ?></a>
			<div id="m9" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
				<?=MakeMenuBar($admin_layout_page11,"top","plugins.php") ?>
			</div>
			</li>
				<?php } ?>
		</ul>		
	</div>
	</div>
	<!-- END MAIN MENU -->  
	
  <!-- END HEADER -->
  <div>
 <!-- END WRAPPER -->
</div>   

</div>
<!-- EMEETING CONTENT START -->
 
<div id="content">

<div style="width:870px;  margin:10px;">

 		<div class="shadetabs">
		<ul>
		 		<li style="float:left;">

<?php if(isset($PageLang[$_GET['p'].'_*'])){ 	print '<b style="color: #3E8A8B; font-size:20px; float:left">'.$PageLang[$_GET['p'].'_*'].'</b>'; } ?>
<?php if(isset($Plugin_Title) && !isset($PageLang[$_GET['p'].'_*']) ){ print '<b style="color: #3E8A8B; font-size:20px; float:left">'.$Plugin_Title.'</b>'; } ?>
</li>
				<?php if($_SESSION['admin_level'] ==1 || ( isset($_SESSION['admin_super_user']) && $_SESSION['admin_super_user'] == "yes" ) ){ ?>	
				<li><a href="javascript:ReactiveAll();" class="home"><?=$admin_layout_nav['12'] ?></a></li>				
				<li><a href="maintenance.php"  class="home"><?=$admin_layout_nav['11'] ?></a></li>				
				<? if(isset($_SESSION['admin_super_user']) && $_SESSION['admin_super_user'] =="yes"){ ?><li><a href="admins.php"><?=$admin_layout_nav['10'] ?></a></li><? } ?>
				<?php } ?>		 
		</ul>
		</div>
 <!---->
 
<div style="background:#E9FDFF;"> 
 
<div id="TopCommentsMainBox">


<div id="contentwrapper">
<div id="contentcolumn">


	<?php if(isset($PageLang[$_GET['p'].'_?']) && $PageLang[$_GET['p'].'_?'] !=""){ print "<p id='TopCommentsBox'><img src='inc/images/icons/help.png' align='absmiddle' />  ".$PageLang[$_GET['p'].'_?']."</p>";} ?>

		<?php if(isset($_REQUEST['Err']) || ( ADMIN_DEMO=="yes" ) ){ 
		
		if(ADMIN_DEMO=="yes"){
			$msg[0] ="Demo Mode Enabled, many features are disabled in this demo."; 
			$msg[1] ="0";
		}else{
			$msg = explode("**",$_REQUEST['Err']); 
		}
		if(!isset($msg[1])){$msgType="good";}elseif($msg[1] ==0){ $msgType="bad";}elseif($msg[1] ==1){$msgType="good";}else{ $msgType="good";} ?>  
  		
		<div id="messages">
			  <div class="message-<?=$msgType ?>" id="main-message-<?=$msgType ?>">
			  <a class="dismiss-message" href="#" onclick="Effect.Fade('main-message-<?=$msgType ?>', { duration : 0.5 });; return false;"></a>
			  <?=$msg[0] ?>
			</div>
			
		</div>
		
		<?php } ?>

		<?php $contents = ob_get_contents();ob_end_clean();$tdata[1]["contents"] = $contents;ob_start();?>
	
</div>
</div>
<div id="rightcolumn">
 
		<?php include('layout_menu.php'); ?>

</div>
<br class="clear" />

</div>
 
		
 
	</div>
 
<br class="clear" />
 
<!-- EMEETING CONTENT END -->

</div>
</div>

<!-- EMEETING FOOTER START -->
<div id="bodyBottom" style="display:visible;">

<div id="footer" style="display:visible;">
<?php if(BRAND_ID ==""){ ?>
<div style="float:left; margin-left:30px; display:visible;">
<a href="<?=powered_link ?>" target="_blank" style="display:visible;"><img src="inc/images/lay/footer.jpg" style="margin-top:5px;" alt="Powered by eMeeting Dating Software"></a>
</div>
<div style="float:right; margin-right:40px; display:visible;">
	<span> eMeeting Software Version <?=VERSION ?> </span>
		<ul>
		<li></li>
			<li style="font-size:12px;">Page Loaded in: 
			<?
			$StopTimer = time()+microtime();
			$EndTimer = round($StopTimer-$StartTimer,4);
			
			print $EndTimer;
			?> Seconds
			</li>
		</ul>
</div>
<?php } ?>
</div>
</div>
<!-- EMEETING FOOTER END -->
<script type="text/javascript" language="javascript">Effect.Pulsate('main-message-good', { pulses : 5, duration : 3, from : 0.1 });</script>
</body>
</html>
<?php $contents = ob_get_contents();ob_end_clean();$tdata[2]["contents"] = $contents;ob_start();?>