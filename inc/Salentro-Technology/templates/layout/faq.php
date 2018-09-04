<?
/**
* Page: WEBSITE FAQ PAGE
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  inc/func/func_faq_page.php
*/
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<ul class="form">   
 
<div class="CapBody">

	<div style="padding:20px;">
	FAQ
		<div style="line-height:30px;">
		<? if(isset($faq_links)){ foreach($faq_links as $value){ ?>
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/comments.png" align="absmiddle"> <a href='index.php?dll=faq#<?=$value['id'] ?>' title="<?=$value['subject'] ?>"><?=$value['subject'] ?></a><br>
		<? } } ?>

	</div>
		
		<ul style="margin-top:50px;">
		<? if(isset($faq_rows)){ foreach($faq_rows as $value){ ?>
			<a name="<?=$value['id'] ?>"></a>
			<li><h3><?=$value['subject'] ?></h3>
			<?=nl2br($value['content']) ?>
			</li>
		<? } } ?>
		</ul>
	</div>
	</div>
	</ul>