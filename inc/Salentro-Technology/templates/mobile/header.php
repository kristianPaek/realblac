<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title><?=$HEADER_META_TITLE ?></title>
	<meta name="keywords" content="<?=$HEADER_META_KEYWORDS ?>" />
	<meta name="description" content="<?=$HEADER_META_DESCRIPTION ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=<?=$HEADER_META_CHARSET ?>">
	<meta name="viewport" content="width=325; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<?=$HEADER_META_BASE ?>
	<?php e_meta(); ?>

<script language="javascript" type="text/javascript">
<!--
function menu_goto( menuform )
{

var baseurl = "<?=DB_DOMAIN ?>" ;
selecteditem = menuform.newurl.selectedIndex ;
newurl = menuform.newurl.options[ selecteditem ].value ;
if (newurl.length != 0) {
location.href = baseurl + newurl ;
}
}
//-->
</script>
</head>
<? if(isset($HEADER_SINGLE_COLUMN)){ ?>
<body id="splitpage" <?=$HEADER_ON_LOAD ?>>
<? }else{ ?>
<body id="splitpage" <?=$HEADER_ON_LOAD ?>>
<? } ?>
<?php e_head(); ?>
<div id="MainPageBackground">
<div class="page_header2" id="PageHeader">



<table width="300" border=0 cellpadding="2" cellspacing="2"><tr>

<? if($_SESSION['auth'] !="yes") { ?>
   <td width="20%" bgcolor="#0296c0" align="center">
<a href="<?=DB_DOMAIN ?>mobile.php" style="text-decoration: none;color:#ffffff;font-size:12px;">Login</a></td>
<? }else { ?>
<td width="20%" bgcolor="#0296c0" align="center">
<a href="<?=DB_DOMAIN ?>mobile.php?dll=logout" style="text-decoration: none;color:#ffffff;font-size:12px;">Logout</a></td>
<? } ?>
<center>
<td width="20%" bgcolor="#0296c0" align="center">
<a href="http://www.realblacklove.com/meet/mobile.php"  style="text-decoration: none;color:#ffffff;font-size:12px;">Home</a></td>
<td width="20%" bgcolor="#0296c0" align="center">
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilemessages&sub=inbox" style="text-decoration: none;color:#ffffff;font-size:12px;">Mail</a></td>
<td width="20%" bgcolor="#0296c0" align="center">
<a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilewink&sub=inbox" style="text-decoration: none;color:#ffffff;font-size:12px;">Winks</a></td>
<td width="20%" bgcolor="#0296c0" align="center">
<a href="http://www.realblacklove.com/meet/mobile.php?dll=mobilesearch&sub=advanced"  style="text-decoration: none;color:#ffffff;font-size:12px;">&nbsp;&nbsp;Search&nbsp;</a></td></center>


</tr></table>
	

		
		
</div>

<div id="page_container2">

			<div id="main">			
			<div id="main_content_wrapper">		
		
		
	<? if(!isset($HEADER_SINGLE_COLUMN)){ ?><div style="padding:8px;"> <? } ?>	
		
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