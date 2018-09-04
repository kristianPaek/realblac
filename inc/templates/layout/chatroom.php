<?
/**
* Page: MEMBER CHAT ROOM
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  inc/exe/ChatRoom/
*/
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>
<div class="TopChatRoom"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div>
<p><?=$PageDesc ?></p>


<script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/_flash.js"></script>

<? if($ChatRoomArray['path'] == "inc/exe/ChatRoom/chat.php"){ ?>

	<SCRIPT language="JavaScript">
		displayeMeeting("inc/exe/ChatRoom/ChatRoom.swf?user=<? print $_SESSION['username']; ?>&wURL=<?=DB_DOMAIN ?>inc/exe/","650","400",{menu:"true",bgcolor:"#E4E6DA",version:"6,0,47,0",align:"middle",wURL:"<?=DB_DOMAIN ?>inc/exe/"});
	</SCRIPT>
<p style="padding:7px; background:#400000; border:1px solid #400000"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <font color="white">Welcome to the chat room. Enjoy yourself and make new friends.</font> </p>
	

<? }elseif(file_exists($ChatRoomArray['path'])){ require_once($ChatRoomArray['path'])  ?>
<p style="padding:7px; background:#E4E6DA; border:1px solid #cccccc"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> Welcome to RealBlackLove.com's Chat Room, Enjoy yourself and make new friends. </p>

<? } ?>