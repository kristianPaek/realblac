<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title><?=$HEADER_META_TITLE ?></title>
	<meta name="keywords" content="<?=$HEADER_META_KEYWORDS ?>" />
	<meta name="description" content="<?=$HEADER_META_DESCRIPTION ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=<?=$HEADER_META_CHARSET ?>">
	<?=$HEADER_META_BASE ?>
	<?php e_meta(); ?>
</head>







<? if(isset($HEADER_SINGLE_COLUMN)){ ?>
<body id="splitpage" <?=$HEADER_ON_LOAD ?>>
<? }else{ ?>
<body id="fullpage" <?=$HEADER_ON_LOAD ?>>
<? } ?>
<?php e_head(); ?>


<div id="MainPageBackground">

<div class="page_header" id="PageHeader">

		<div class="logo_height">
			
				<a href="<?=DB_DOMAIN ?>index.php" title="<?=$HEADER_META_TITLE ?>"><div id="ImageLogo">					
					<p class="<? if( TMP_LOGO_ICON =="images/DEFAULT/LOGOS/none.png"){ print "p3"; }else{ print "p1"; } ?>"><? if(TMP_LOGO_HIDE ==0){ ?><?=TMP_LOGO ?><? } ?></p>					
					<p class="p2"><? if(TMP_LOGO_HIDE ==0){ ?><?=TMP_LOGO_SLOGAN ?><? } ?></p>
			
				</div></a>
		
	<div id="top_banner"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="top"){ print $banner['display'];}} ?></div>
		
		</div>

		<div class="menu" id="MenuBar">
		<? if(my_logged_in){ ?>  <? } ?>
			<ul class="tabs">
				<?=$HEADER_MENU_BAR_TOP ?>
			</ul>			
		</div>
	
		<div class="sub_menu"> 
			<ul class="sub_tabs" style="float:left;">
				<?=$HEADER_MENU_BAR_SUB ?>	
			</ul>

			<span style="float:right;padding:4px;">
				<span class="onlinenow"><a href="<?=DB_DOMAIN ?>index.php?dll=search&page=1&online=1"><?=CountOnline() ?> <?=$GLOBALS['_LANG']['_members']." ".$GLOBALS['_LANG']['_online'] ?></a></span>
			</span>

	
		</div>
		
</div>

<div id="page_container">

			<div id="main">			
			<div id="main_content_wrapper">		
		
		
	<? if(!isset($HEADER_SINGLE_COLUMN)){ ?><div style="padding:20px;"> <? } ?>	
		
<div class="clear"></div>

		<? if(isset($ERROR_MESSAGE) && strlen($ERROR_MESSAGE) > 3){ ?>
		<div id="messages">
			  <div style="" class="message-<?=$ERROR_TYPE ?>" id="main-message-<?=$ERROR_TYPE ?>">
			  <a class="dismiss-message" href="#" onclick="Effect.Fade('main-message-<?=$ERROR_TYPE ?>', { duration : 0.5 });; return false;"><img src="images/DEFAULT/_icons/16/menu.gif"></a>
			  <?=$ERROR_MESSAGE ?>
			</div>
			<script type="text/javascript" language="javascript">Effect.Pulsate('main-message-<?=$ERROR_TYPE ?>', { pulses : 2, duration : 1, from : 0.7 });</script>
		</div>
		<? } ?>