<?php
/***************************************************************************/
$subd = "../../../";
require_once $subd."inc/config.php";
require_once $subd."inc/API/api_functions.php";
require_once ( 'functions.php' );
/***************************************************************************/

	header( "Content-Type: text/xml; charset=utf-8" );
	
	echo( "<?xml version='1.0' encoding='utf-8'?>" );
	echo( "<!-- COPYRIGHT Userplane 2006 (http://www.userplane.com) -->" );
	echo( "<!-- WM version 1.8.13 -->" );
	echo( "<icappserverxml>" );

	$strDomainID = isset($_GET['domainID']) ? $_GET['domainID'] : null;
	$strFunction = isset($_GET['function']) ? $_GET['function'] : (isset($_GET['action']) ? $_GET['action'] : null);
	$strCallID = isset($_GET['callID']) ? $_GET['callID'] : null;

	if( $strFunction != null && $strDomainID != null )
	{
		$strSessionGUID = isset($_GET['sessionGUID']) ? $_GET['sessionGUID'] : null;
		$strKey = isset($_GET['key']) ? $_GET['key'] : null;
		$strUserID = isset($_GET['memberID']) ? $_GET['memberID'] : null;
		$strTargetUserID = isset($_GET['targetMemberID']) ? $_GET['targetMemberID'] : null;
		
		if( $strFunction == "getDomainPreferences" )
		{
			// get the value from your database
			echo( "<allowCalls>setBlockedStatus,sendConnectionList,startConversation</allowCalls>" );
			echo( "<characterlimit>200</characterlimit>" );
			echo( "<forbiddenwordslist>ass,bitch</forbiddenwordslist>" );
			echo( "<smileys>" );
				echo( "<smiley>" );
					echo( "<name>Ultra Angry</name>" );
					echo( "<image>http://images.yourCompany.userplane.com/images/smiley/UltraAngry.jpg</image>" );
					echo( "<codes>" );
						echo( "<code><![CDATA[>>:O]]></code>" );
						echo( "<code><![CDATA[>>:-O]]></code>" );
					echo( "</codes>" );
				echo( "</smiley>" );
				echo( "<smiley>" );
					echo( "<name>Angry</name>" );
					echo( "<image>DELETE</image>" );
				echo( "</smiley>" );
			echo( "</smileys>" );
			echo( "<maxvideobandwidth>20000</maxvideobandwidth>" );
			echo( "<domainlogolarge></domainlogolarge>" );
			
			echo( "<line1>Country: </line1>" );
			echo( "<line2>Town/City: </line2>" );
			echo( "<line3>Member Level: </line3>" );
						
			echo( "<avEnabled>true</avEnabled>" );
			echo( "<clickableUserName>true</clickableUserName>" );
			echo( "<clickableTextUserName>false</clickableTextUserName>" );
			echo( "<gameButton>true</gameButton>" );
			echo( "<buddyListButton>false</buddyListButton>" );
			echo( "<preferencesButton>false</preferencesButton>" );
			echo( "<smileyButton>true</smileyButton>" );
			echo( "<blockButton>false</blockButton>" );
			echo( "<addBuddyEnabled>false</addBuddyEnabled>" );
			echo( "<connectionTimeout>60</connectionTimeout>" );
			echo( "<sendConnectionListInterval>0</sendConnectionListInterval>" );
			echo( "<sendArchive>false</sendArchive>" );
			echo( "<sendTextToImages>false</sendTextToImages>" );
			echo( "<buttonBarColor></buttonBarColor>" );
			echo( "<hideDropShadows>false</hideDropShadows>" );
			echo( "<hideHelp>true</hideHelp>" );
			echo( "<showLocalUserIcon>false</showLocalUserIcon>" );
			echo( "<conferenceCallEnabled>false</conferenceCallEnabled>" );
			echo( "<maxxmlretries>5</maxxmlretries>" );
			echo( "<buttonIcons>" );
				echo( "<action></action>" );
				echo( "<add></add>" );
				echo( "<block></block>" );
				echo( "<bold></bold>" );
				echo( "<buddyList></buddyList>" );
				echo( "<italic></italic>" );
				echo( "<preferences></preferences>" );
				echo( "<print></print>" );
				echo( "<smiley></smiley>" );
				echo( "<soundOn></soundOn>" );
				echo( "<soundOff></soundOff>" );
				echo( "<underline></underline>" );
			echo( "</buttonIcons>" );
			echo( "<systemMessages>" );
				echo( "<waiting>true</waiting>" );
				echo( "<open>true</open>" );
				echo( "<closed>true</closed>" );
				echo( "<blocked>true</blocked>" );
				echo( "<away>true</away>" );
				echo( "<nonDeliveryMessage timeout='30' sendOnClose='true' sendOnTimeout='false' promptUser='false'>[[DISPLAYNAME]] may have gone offline and cannot recieve this message.</nonDeliveryMessage>" );
				echo( "<nonDeliveryConfirm></nonDeliveryConfirm>" );
				echo( "<conferenceCallInvitation></conferenceCallInvitation>" );
				echo( "<conferenceCallReminder></conferenceCallReminder>" );
				echo( "<conferenceCallRetrievingNumber>Creating a private anonymous phone number...</conferenceCallRetrievingNumber>" );				
			echo( "</systemMessages>" );
			echo( "<quickMessageList>" );
				echo( "<message>" );
					echo( "<title>Standard greeting</title>" );
					echo( "<body>Welcome! How can I help you today?</body>" );
				echo( "</message>" );
			echo( "</quickMessageList>" );
		}
		else if( $strFunction == "getMemberID" )
		{
			if( $strSessionGUID != null && $strSessionGUID != "" )
			{
				// get the value from your database
				
				echo( "<memberid>" . $strSessionGUID . "</memberid>" );
			}
		}
		else if( $strFunction == "startIC" )
		{
			if( $strUserID != null && $strUserID != "" && $strTargetUserID != null && $strTargetUserID != "" )
			{
				// now that the target user's window is open, we can remove the request from the db
				// the values are reversed because this call happens from the other direction
				//$query = "DELETE FROM userplane_pending_wm WHERE originatingUserID = $strTargetUserID AND destinationUserID = $strUserID";	
				//mysql_query( $query );
				
				echo( "<member>" );
				$data = GetUserplaneIMData($strUserID);
					echo( "<displayname>".$data['username']."</displayname>" );
					echo( "<imagepath>".$data['big_image']."</imagepath>" );
					
					echo( "<avEnabled>true</avEnabled>" );
					echo( "<kissSmackEnabled>true</kissSmackEnabled>" );					
					echo( "<showerrors>true</showerrors>" );
					echo( "<sound>true</sound>" );
					echo( "<focus>true</focus>" );
					echo( "<autoOpenAV>true</autoOpenAV>" );
					echo( "<autoStartAudio>true</autoStartAudio>" );
					echo( "<autoStartVideo>true</autoStartVideo>" );
					echo( "<backgroundColor></backgroundColor>" );
					echo( "<fontColor></fontColor>" );
					echo( "<quickMessageList ignoreNoTextEntry='false'>" );
						echo( "<message>" );
							echo( "<title>Standard Greeting</title>" );
							echo( "<body>I'm happy to be here!</body>" );
						echo( "</message>" );
					echo( "</quickMessageList>" );
					echo( "<noTextEntry>false</noTextEntry>" );
					echo( "<sessionTimeout>-1</sessionTimeout>" );
					echo( "<sessionTimeoutMessage>Your session has timed out</sessionTimeoutMessage>" );			
				echo( "</member>" );
				echo( "<targetMember>" );
				
				$data = GetUserplaneIMData($strTargetUserID);
				
					echo( "<displayname>".$data['username']."</displayname>" );
					
					echo( "<line1>".MakeCountry($data['country'])."</line1>" );
					echo( "<line2>".$data['location']."</line2>" );
					echo( "<line3>".$data['package']."</line3>" );
					
					echo( "<imagepath>".$data['big_image']."</imagepath>" );
					
					echo( "<avEnabled>true</avEnabled>" );
					echo( "<blocked>false</blocked>" );
					echo( "<backgroundColor></backgroundColor>" );
					echo( "<fontColor></fontColor>" );
				echo( "</targetMember>" );
			}
		}
		else if( $strFunction == "addFriend" )
		{
			if( $strUserID != null && $strUserID != "" && $strTargetUserID != null && $strTargetUserID != "" )
			{
				// handle the request, no response required
			}
		}
		else if( $strFunction == "sendConnectionList" )
		{
			$strXmlData = isset($_POST['xmlData']) ? $_POST['xmlData'] : null;
		
			if( $strXmlData != null )
			{
				/*
				EXAMPLE:
			
				<?xml version='1.0' encoding='iso-8859-1'?>
					<connectionList>
					<server>flashcom.yourserver.userplane.com</server>
					<c><f type="m">21</f><t>1</t></c>
					<c><f type="m">1</f><t>8</t></c>
					<c><f type="s">a6d5fe44</f><t>1</t></c>
					<c><f type="m">1</f><t>21</t></c>
				</connectionList>
				*/
			
				// update your database and no need to return anything
			}
		}
		else if( $strFunction == "setBlockedStatus" )
		{
			if( $strUserID != null && $strUserID != "" && $strTargetUserID != null && $strTargetUserID != "" )
			{
				$bBlocked = isset($_GET['trueFalse']) ? $_GET['trueFalse'] : null;
				$bBlocked = $bBlocked == "true" || $bBlocked == "1";
				
			// handle the request, no response required
			}
		}
		else if( $strFunction == "startConversation" )
		{
			if( $strUserID != null && $strUserID != "" && $strTargetUserID != null && $strTargetUserID != "" )
			{
				// check to see if there is already a request to open a window in the db
				$query = "SELECT count(*) AS rowExists FROM userplane_pending_wm WHERE originatingUserID = $strUserID AND destinationUserID = $strTargetUserID";
				$rsArray = mysql_fetch_array( mysql_query( $query ) );
				if( $rsArray["originatingUserID"] == 0 )
				{
					// if not, insert a request to have a window opened up on the target user's machine
					$query = "INSERT INTO userplane_pending_wm ( originatingUserID, destinationUserID, openedWindowAt, insertedAt ) VALUES ( $strUserID, $strTargetUserID, NULL, Now() )";
					mysql_query( $query );
				}
			}
		}
		else if( $strFunction == "notifyConnectionClosed" )
		{
			if( $strUserID != null && $strUserID != "" && $strTargetUserID != null && $strTargetUserID != "" )
			{
				// since the orginating user is closing their window, don't open a window on the target user anymore
				$query = "DELETE FROM userplane_pending_wm WHERE originatingUserID = $strUserID AND destinationUserID = $strTargetUserID";	
				mysql_query( $query );
				
				// in addition, you can also use the strXmlData variable to get any messages that were never delivered to the targetUser.
				$strXmlData = isset($_POST['xmlData']) ? $_POST['xmlData'] : null;	
			}
		}
		else if( $strFunction == "sendPendingMessages" )
		{
			if( $strUserID != null && $strUserID != "" && $strTargetUserID != null && $strTargetUserID != "" )
			{				
				// you can use the strXmlData variable to get any messages that were never delivered to the targetUser.
				$strXmlData = isset($_POST['xmlData']) ? $_POST['xmlData'] : null;	
			}
		}
		else if( $strFunction == "sendArchive" )
		{
			$strXmlData = isset($_POST['xmlData']) ? $_POST['xmlData'] : null;
		}			
	}
	
	echo( "</icappserverxml>" );
?>