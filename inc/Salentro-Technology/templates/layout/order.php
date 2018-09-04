<?
/**
* Page: RETURN PAGE AFTER A PAYMENT HAS BEEN PROCESSED
		THIS PAGE ONLY DISPLAYS THE THANK YOU MESSAGE, 
		NOT PROCESSING IS DONE HERE. PLUGINS DO ALL PROCESSING
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  
*/
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>


<? if($show_page==""){ ?>

<? }elseif($show_page=="thankyou"){ ?>

<div class="TopContact"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>

<p><?=$PageDesc ?></p>
<a class="NormBtn" href="<?=DB_DOMAIN ?>index.php?dll=logout"><span><?=$GLOBALS['_LANG']['_logout'] ?></span></a>


<? }elseif($show_page=="cancel"){ ?>

<div class="TopContact"><span><?=$PageTitle ?></span></div><br>

<p><?=$PageDesc ?></p>
<a class="NormBtn" href="<?=DB_DOMAIN ?>index.php?dll=logout"><span><?=$GLOBALS['_LANG']['_logout'] ?></span></a>


<? }elseif($show_page=="error"){ ?>

<div class="TopContact"><span><?=$PageTitle ?></span></div><br>

<p><?=$PageDesc ?></p>
<a class="NormBtn" href="<?=DB_DOMAIN ?>index.php?dll=logout"><span><?=$GLOBALS['_LANG']['_logout'] ?></span></a>


<? } ?>