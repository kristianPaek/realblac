<?php
 /****************************************************************************/
$subd = "../../../";
require_once $subd . "inc/config.php";
include("../../config_plugins.php");
require_once ( 'functions.php' );
/***************************************************************************/
	$strFlashcomServer = USERPLANE_SET_SERVER;
/*	The flashcom server: flashcom.yourcompany.userplane.com (from Userplane)
*/
	$strDomainID = USERPLANE_SET_DOMAIN;		
/*	The domain ID of this site: yourdomain.com (from Userplane)
*/			
	$strUserID = $_SESSION['uid'];		 
/*	The session identifier for the currently logged in user
*/	
	$strKey = "";								
/*	Additional login information you may need passed
*/
	$strSessionGUID = $_SESSION['uid'];										// The session identifier for the currently logged in user

	$strPassword = USERPLANE_PASSWORD;
/*	Your presence password
*/
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
/*	This selects what language the interface is in.
*/	
	$strEncryptedUserID = up_getEncrypted($strPassword, $strUserID);
	$strDestinationUserID = $_GET["strDestinationUserID"];
/*	These lines encrypt the userID and get the destination userID from the query string
*/
  if(USERPLANE_FREECHAT ==1){
 	$IM_WIDTH = "80%";
  }else{
 	 $IM_WIDTH = "100%";
  }

	$strInstanceID = "";											// The instance that you want this user to join.  If you are using the Webmessenger
																	// with the Webchat or Userlist you will need to make sure the instanceID matches
																	// that of the Webchat or the Userlist for the IM windows to open automatically.
?>
 
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;  charset=ISO-8859-1">
	<title>Instant Messenger</title>

	<script language="JavaScript">
	<!--
		function sendCommand( commandIn, valueIn )
		{
			if( commandIn == "focus" )
			{
				// DO NOT EDIT
			
				var wmObject = getWMObject();
				// only do the focus if we are sure it is not going remove focus from typing area
				if( wmObject != null && ( wmObject.focus != undefined || ( navigator.userAgent.indexOf( "MSIE" ) >= 0 && navigator.userAgent.indexOf( "Mac" ) >= 0 ) ) )
				{
					window.focus();
					wmObject.focus();
				}
			}
			else
			{
				// EDIT HERE: you will need to handle the following commands from the wm client
				if( commandIn == "viewProfile" )
				{
					if( valueIn == "-1" )
					{
						// view their own profile
WindowObjectReference = window.open("<?=DB_DOMAIN ?>/index.php?dll=account&sub=&dll=account&sub=view","","");

					}
					else
					{
						var userID = valueIn;
						// view userID's profile
WindowObjectReference = window.open("<?=DB_DOMAIN ?>/index.php?dll=profile&pId=" + userID + "","","");

					}
				}
				else if( commandIn == "help" )
				{
					// view the help
				}
				else if( commandIn == "buddyList" )
				{
					// view their buddy list
				}
				else if( commandIn == "preferences" )
				{
					// view the preferences
				}
				else if( commandIn == "addBuddy" )
				{
					var userID = valueIn;
					// respond to an add buddy click (XML has also been notified)
				}
				else if( commandIn == "block" )
				{
					// they blocked the user
				}
				else if( commandIn == "unblock" )
				{
					// they unblocked the user
				}
				else if( commandIn == "Connection.Success" )
				{
					// client successfully connected to server
				}
				else if( commandIn == "Connection.Failure" )
				{
					// client was disconnected from server
				}				
			}
		}
		
		function focusIt()
		{
			window.focus();
		
			var wmObject = getWMObject();
			
			if( wmObject != null && wmObject.focus != undefined )
			{
				wmObject.focus();
			}
		}
		
		function getWMObject()
		{
			if(document.all)
			{
				return document.all["wm"];
			}
			else if(document.layers)
			{
				return document.wm;
			}
			else if(document.getElementById)
			{
				return document.getElementById("wm");
			}
			
			return null;
		}
		
		function wm_DoFSCommand( command, args ) 
		{
		}
	//-->
	</script>
	
	<script language="VBScript">
	<!-- 
		//  Map VB script events to the JavaScript method - Netscape will ignore this... 
		//  Since FSCommand fires a VB event under ActiveX, we respond here 
		Sub wm_FSCommand(ByVal command, ByVal args)
	  		call wm_DoFSCommand(command, args)
		end sub
	-->
	</script>
</head>
<body onLoad="javascript: focusIt();" bgcolor="#ffffff" bottommargin="0" leftmargin="0" marginheight="0" marginwidth="0" rightmargin="0" topmargin="0">
 
	<?php
		if( $strDestinationUserID != "" )
		{
			$strSwfServer = "swf.userplane.com";
			$strApplicationName = "Webmessenger";
			?>
		
			<script type="text/javascript" src="<?=DB_DOMAIN ?>/plugins/plugins/userplane/_flashobject.js"></script>
			<div id="flashcontent">
				<strong>You need to upgrade your Flash Player by clicking <a href="http://www.macromedia.com/go/getflash/" target="_blank">this link</a>.</strong><br><br><strong>If you see this and have already upgraded we suggest you follow <a href="http://www.adobe.com/cfusion/knowledgebase/index.cfm?id=tn_14157" target="_blank">this link</a> to uninstall Flash and reinstall again.</strong>
			</div>
			
			<script type="text/javascript">
				// <![CDATA[
				
				var fo = new FlashObject("http://<?php echo( $strSwfServer ); ?>/<?php echo( $strApplicationName ); ?>/ic.swf", "wm", "100%", "<?=$IM_WIDTH ?>", "6", "#ffffff", false, "best");
				fo.addParam("scale", "noscale");
				fo.addParam("menu", "false");
				fo.addParam("salign", "LT");
				fo.addParam("allowScriptAccess", "always");
				fo.addVariable("server", "<?php echo( $strFlashcomServer ); ?>");
				fo.addVariable("swfServer", "<?php echo( $strSwfServer ); ?>");
				fo.addVariable("applicationName", "<?php echo( $strApplicationName ); ?>");
				fo.addVariable("domainID", "<?php echo( $strDomainID ); ?>");
				fo.addVariable("instanceID", "<?php echo( $strInstanceID ); ?>");
				fo.addVariable("sessionGUID", "<?php echo( $strSessionGUID ); ?>");
				fo.addVariable("key", "<?php echo( $strKey ); ?>");
				fo.addVariable("locale", "<?php echo( $strLocale ); ?>");
				fo.addVariable("destinationMemberID", "<?php echo( $strDestinationUserID ); ?>");
				fo.addVariable("resizable", "true");
				fo.write("flashcontent");
				
				// COPYRIGHT Userplane 2006 (http://www.userplane.com)
				// WM version 1.8.13
				
				// ]]>
			</script>
			
			<?php
		}
		else
		{
			print "Error: Please contact ".ADMIN_EMAIL;//echo( "<b>Error:</b> strSessionGUID is not set, for the Webmessenger to connect you must set the destination users ID in your code. <br /><br /> <i>Typically this is passed in the query string as '.../wm.php?strDestinationUserID=12345'</i>" );
		}
	?>		 
	
</div>
<? if(USERPLANE_FREECHAT ==1){ ?>
 <iframe src="http://subtracts.userplane.com/mmm/bannerstorage/ch_int_frameset.html?app=wm&zoneID=<?=USERPLANE_SET_FREECODE_WM ?>&textZoneID=<?=USERPLANE_SET_FREECODE_TXT ?>" marginwidth=0 marginheight=0 frameborder="no" name="USERPLANEADVERTS" scroll="no" style="width:100%"></iframe>
<? } ?>	
</body>
</html>