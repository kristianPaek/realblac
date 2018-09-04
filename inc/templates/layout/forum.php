<?
/**
* Page: COMMUNITY FORUM LINKED VIA AN IFRAME
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  /inc/exe/forum/
*/
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<div id="eMeetingContentBox">

		<div id="Title">
			<span class="a1"><?=$PageTitle ?></span>
			<span class="a2"><?=$PageDesc ?></span>
		</div>
<? if(FORUM_DEFAULT_ENABLED =="yes"){ ?>

		<div id="Search">
			<span class="a1"><form method="GET" action="<?=$forum_link ?>" target="ListFrame"><input type="hidden" name="action" value="vtopic" />
		<select name="forum" class="selectTxt" style="width:150px">
		<? foreach($ForumListArray  as $forum){ ?><option value="<?=$forum['id'] ?>"><?=$forum['name'] ?></option><? } ?>
		</select>
		<input  type="submit" class="NormBtn" value="<?=$GLOBALS['_LANG']['_change'] ?>"></form>


			</span>
			<span class="a2">

			<form name="form1" method="GET" action="<?=$forum_link ?>" target="ListFrame" style="margin-top:3px; margin-right:10px;">
			<input type="hidden" name="posterName" id="posterName" class="textForm" value="" />
			<input type="hidden" name="action" value="search" />
			<input type="hidden" name="searchGo" value="1" />
			<input type="hidden" name="searchType" value="0" />
			<input type="hidden" name="forum" value="" />			
			<input name="phrase" type="text" class="input" id="phrase" style="width:120px">			
			<select name="where" id="where" class="selectTxt"><option value="1" selected="selected"><?=$GLOBALS['_LANG']['_topic'] ?></option><option value="0"><?=$GLOBALS['_LANG']['_message'] ?></option></select>
			
			<input type="submit" name="Submit" value="<?=$GLOBALS['_LANG']['_search'] ?>"class="NormBtn">
			</form>
			</span>
		</div>
<? } ?>
		<iframe id="ListFrame" name="ListFrame" style="background:#ffffff; width:100%; height:600px;border:0px" src="<?=DB_DOMAIN ?><?=$forum_link ?>" scrolling="yes" frameborder="0"></iframe>

	</form>


	</div> <!-- end main box -->