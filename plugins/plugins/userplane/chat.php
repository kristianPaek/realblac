<?
@session_start();
//////////////////////////////////////////////////////////////////////////////////////////
// DATABASE AND DATA CONNECTION
///////////////////////////////////////////////////////////////////////////////////////////
if(!defined('KEY_ID')){
	include("../../../inc/config_db.php");
	include("../../../inc/config_packageaccess.php");
	include("../../config_plugins.php");
	// CHECK WE HAVE ACCESS
	if(isset($PACKAGEACCESS[$_SESSION['packageid']]) && in_array("chatroom-chatroom",$PACKAGEACCESS[$_SESSION['packageid']])){ die("PLEASE UPGRADE YOUR ACCOUNT TO USE THIS FEATURE"); }

}
///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
?>
<script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/_flash.js"></script>
<script type="text/javascript" src="<?=DB_DOMAIN ?>/plugins/plugins/userplane/_flashobject.js"></script> 
<?php
	/* 
	 *	You need to set these variables to be appropriate for your site and user.
	 */
	$strFlashcomServer = USERPLANE_SET_SERVER;
	$strDomainID = USERPLANE_SET_DOMAIN;
	$strSessionGUID = $_SESSION['uid'];			// The session identifier for the currently logged in user
	$strKey = 1;//$_SESSION['username'];						// Additional login information you may need passed
	$strInitialRoom = "";				// Optional room name of the room the user will start in.  This overrides the similar setting in the XML
?>

	<script language="JavaScript">
	<!--
		function csEvent( strEvent, strParameter1, strParameter2 )
		{
			if( strEvent == "InstantCommunicator.StartConversation" )
			{
				var strUserID = strParameter1;
				var bServer = strParameter2;
				// open up an InstantCommunicator window.  For example:
				launchWM( "<?php echo( $strSessionGUID ); ?>", strUserID );
			}
			else if( strEvent == "User.ViewProfile" )
			{
				var strUserID = strParameter1;
				WindowObjectReference = window.open("<?=DB_DOMAIN ?>/index.php?dll=profile&pId=" + strUserID + "","","");
			}
			else if( strEvent == "User.Block" )
			{
				var strBlockedUserID = strParameter1;
				var bBlocked = strParameter2;
			}
			else if( strEvent == "User.AddFriend" )
			{
				var strFriendUserID = strParameter1;
				var bFriend = strParameter2;
			}
			else if( strEvent == "Chat.Help" )
			{
				WindowObjectReference = window.open("<?=DB_DOMAIN ?>/index.php?dll=faq","","");
			}
			else if( strEvent == "User.NoTextEntry" )
			{
			}
			else if( strEvent == "Connection.Success" )
			{
			}
			else if( strEvent == "Connection.Failure" ) 
			{ 
				if( strParameter1 == "Session.Timeout" ) 
				{ 
					//handle timeout here, both inactivity and session timeouts				
				} 
				if( strParameter1 == "User.Banned" )
				{
					//handle ban event here
				}
			}			
		}
		
		function launchWM( userID, destinationUserID )
		{
			var popupWindowTest = window.open( "<?=DB_DOMAIN ?>/plugins/plugins/userplane/wm.php?strDestinationUserID=" + destinationUserID, "WMWindow_" + replaceAlpha(userID) + "_" + replaceAlpha(destinationUserID), "width=360,height=397,toolbar=0,directories=0,menubar=0,status=0,location=0,scrollbars=0,resizable=1" );
			if( popupWindowTest == null )
			{
				alert( "Your popup blocker stopped an IM window from opening" );
			}
		}
		
		function replaceAlpha( strIn )
		{
			var strOut = "";
			for( var i = 0 ; i < strIn.length ; i++ )
			{
				var cChar = strIn.charAt(i);
				if( ( cChar >= 'A' && cChar <= 'Z' )
					|| ( cChar >= 'a' && cChar <= 'z' )
					|| ( cChar >= '0' && cChar <= '9' ) )
				{
					strOut += cChar;
				}
				else
				{
					strOut += "_";
				}
			}
			
			return strOut;
		}
	//-->
	</script>	
	
	
<?php
	// Do not change anything below here
	$strSwfServer = "swf.userplane.com";
	$strApplicationName = "CommunicationSuite";
	$language_array = array('english','chinese-traditional','chinese-simplified','danish','dutch','french','german','hebrew','italian','japanese','korean','norwegian','polish','portuguese-brazil','spanish','swedish','thai','turkish');
	if( in_array(D_LANG, $language_array)){
		$strLocale = D_LANG;
	}else{
		$strLocale = "english";
	}

	if(D_LANG =="chinese"){
		$strLocale = "chinese-simplified";
	}
	if(D_LANG =="portuguese"){
		$strLocale = "portuguese-brazil";
	}

	


?>
<div id="flashcontent">
	<strong>You need to upgrade your Flash Player by clicking <a href="http://www.macromedia.com/go/getflash/" target="_blank">this link</a>.</strong><br><br><strong>If you see this and have already upgraded we suggest you follow <a href="http://www.adobe.com/cfusion/knowledgebase/index.cfm?id=tn_14157" target="_blank">this link</a> to uninstall Flash and reinstall again.</strong>
</div>
<? if(USERPLANE_FREECHAT==1){  $HHe =500; }else{ $HHe=470; }?>
<script type="text/javascript">
	// <![CDATA[
	
	var fo = new FlashObject("http://<?php echo( $strSwfServer ); ?>/<?php echo( $strApplicationName ); ?>/ch.swf", "ch", "100%", "<?=$HHe ?>px", "6", "#ffffff", false, "best");
	fo.addParam("scale", "noscale");
	fo.addParam("menu", "false");
	fo.addParam("salign", "LT");
	fo.addVariable("strServer", "<?php echo( $strFlashcomServer ); ?>");
	fo.addVariable("strSwfServer", "<?php echo( $strSwfServer ); ?>");
	fo.addVariable("strApplicationName", "<?php echo( $strApplicationName ); ?>");
	fo.addVariable("strDomainID", "<?php echo( $strDomainID ); ?>");
	fo.addVariable("strSessionGUID", "<?php echo( $strSessionGUID ); ?>");
	fo.addVariable("strKey", "<?php echo( $strKey ); ?>");
	fo.addVariable("strLocale", "<?php echo( $strLocale ); ?>");
	fo.addVariable("strInitialRoom", "<?php echo( $strInitialRoom ); ?>");
	fo.addParam( "allowScriptAccess", "always");
	fo.write("flashcontent");
	
	// COPYRIGHT Userplane 2006 (http://www.userplane.com)
	// CS version 1.9.4
	
	// ]]>
</script>
<? if(USERPLANE_FREECHAT==1){  ?>
<iframe src="http://subtracts.userplane.com/mmm/bannerstorage/ch_int_frameset.html?app=wc&zoneID=<?=USERPLANE_SET_FREECODE_WC ?>&textZoneID=<?=USERPLANE_SET_FREECODE_TXT ?>" marginwidth=0 marginheight=0 frameborder="no" name="USERPLANEADVERTS" scroll="no" style="width:100%; overflow:hidden;"></iframe>

<? } ?>