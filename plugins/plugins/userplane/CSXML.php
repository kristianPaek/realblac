<?php
/***************************************************************************/
$subd = "../../../";
require_once $subd."inc/config.php";
require_once $subd."inc/API/api_functions.php";
require_once ( 'functions.php' );
/***************************************************************************/
?>
<?php
	header( "Content-Type: text/xml; charset=utf-8" );

	echo( "<?xml version='1.0' encoding='utf-8'?>" );
	echo( "<!-- COPYRIGHT Userplane 2004 (http://www.userplane.com) -->" );
	echo( "<!-- CS version 2.0.2 -->" );
	echo( "<communicationsuite>" );

	echo( "<time>" . date("F d, Y h:i:s A") . "</time>" );

	$strDomainID = isset($_GET['domainID']) ? $_GET['domainID'] : null;
	$strInstanceID = isset($_GET['instanceID']) ? $_GET['instanceID'] : null;
	$strFunction = isset($_GET['function']) ? $_GET['function'] : (isset($_GET['action']) ? $_GET['action'] : null);
	$strCallID = isset($_GET['callID']) ? $_GET['callID'] : null;

	if( $strFunction != null && $strDomainID != null )
	{
		$strSessionGUID = isset($_GET['sessionGUID']) ? $_GET['sessionGUID'] : null;
		$strKey = isset($_GET['key']) ? $_GET['key'] : null;
		$strUserID = isset($_GET['userID']) ? $_GET['userID'] : null;
		$strApp = isset($_GET['app']) ? $_GET['app'] : null;
		$strIpAddress = isset($_GET['ip']) ? $_GET['ip'] : null;
		$strRoomName = isset($_GET['roomName']) ? $_GET['roomName'] : null;
		$strBlockedUserID = isset($_GET['blockedUserID']) ? $_GET['blockedUserID'] : null;
		$strFriendUserID = isset($_GET['friendUserID']) ? $_GET['friendUserID'] : null;
		$bConnected = isset($_GET['connected']) ? $_GET['connected'] : null;
		$bConnected = $bConnected == "true" || $bConnected == "1";
		$bAdmin = isset($_GET['admin']) ? $_GET['admin'] : null;
		$bAdmin = $bAdmin == "true" || $bAdmin == "1";
		$bExists = isset($_GET['exists']) ? $_GET['exists'] : null;
		$bExists = $bExists == "true" || $bExists == "1";
		$bInRoom = isset($_GET['inRoom']) ? $_GET['inRoom'] : null;
		$bInRoom = $bInRoom == "true" || $bInRoom == "1";
		$bBlocked = isset($_GET['blocked']) ? $_GET['blocked'] : null;
		$bBlocked = $bBlocked == "true" || $bBlocked == "1";
		$bBanned = isset($_GET['banned']) ? $_GET['banned'] : null;
		$bBanned = $bBanned == "true" || $bBanned == "1";
		$bFriend = isset($_GET['friend']) ? $_GET['friend'] : null;
		$bFriend = $bFriend == "true" || $bFriend == "1";


		switch( $strFunction )
		{
			case "getDomainPreferences":

				$bStartup = isset($_GET['startup']) ? $_GET['startup'] : null;
				$bStartup = $bStartup == "true" || $bStartup == "1";

				echo( "<domain>" );
					echo( "<maxxmlretries>5</maxxmlretries>" );
					echo( "<avenabled>true</avenabled>" );
					echo( "<forbiddenwordslist>crap,shit</forbiddenwordslist>" );
					echo( "<allowCalls>setBannedStatus,setBlockedStatus,setFriendStatus</allowCalls>" );
					echo( "<domainPrefReloadInterval>-1</domainPrefReloadInterval>" );
					echo( "<maxUsers includeAdmins=\"false\" includeSpeakers=\"false\">-1</maxUsers>" );
					echo( "<domainInvalid>false</domainInvalid>" );
					echo( "<adminsRequired>false</adminsRequired>" );
					echo( "<textColors>000000,ff0000,f0037f,4c004a,000275,26429b,00a0c6,005100,6dc000,ff3f00,ff8600,542c06,905b34,787878,7ea5ba</textColors>" );
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
					echo( "<chat>" );
						echo( "<allowModeratedRooms autoOn=\"false\">truee</allowModeratedRooms>" );
						echo( "<floodControlResetTime>5</floodControlResetTime>" );
						echo( "<floodControlInterval>5</floodControlInterval>" );
						echo( "<floodControlMaxMessages>10</floodControlMaxMessages>" );
						echo( "<labels>" );
							echo( "<userdata initiallines=\"0\">" );
								//echo( "<line>Age</line>" );
								//echo( "<line>Sex</line>" );
								//echo( "<line>Location</line>" );
							echo( "</userdata>" );
							echo( "<lobby><name>Waiting Room</name><description>Lobby Description</description></lobby>" );
						echo( "</labels>" );
						echo( "<maxroomusers>20</maxroomusers>" );
						// Allowing multiple dock items could result in bandwidth overage fees.
						// Please contact a userplane representative for details on overage rates and billing questions.
						// http://www.userplane.com/contact.cfm
						echo( "<maxdockitems>5</maxdockitems>" );
						echo( "<characterlimit>200</characterlimit>" );
						echo( "<userroomcreate>true</userroomcreate>" );
						echo( "<roomemptytimeout>60000</roomemptytimeout>" );
						echo( "<maxhistorymessages>20</maxhistorymessages>" );
						echo( "<showJoinLeaveMessages>true</showJoinLeaveMessages>" );
						echo( "<gui>" );
							echo( "<viewprofile>true</viewprofile>" );
							echo( "<instantcommunicator>true</instantcommunicator>" );
							echo( "<addfriend>true</addfriend>" );
							echo( "<block>true</block>" );
							echo( "<reportabuse textLines=\"0\" avEnabled=\"false\" avWebAccessible=\"true\" avSeconds=\"30\" avUserID=\"\">false</reportabuse>" );
							echo( "<titleBarColor></titleBarColor>" );
							echo( "<scrollTrackColor></scrollTrackColor>" );
							echo( "<outerBackgroundColor></outerBackgroundColor>" );
							echo( "<innerBackgroundColor></innerBackgroundColor>" );
							echo( "<uiFontColor></uiFontColor>" );
							echo( "<buttonColor></buttonColor>" );
							echo( "<leftPaneMinimized>false</leftPaneMinimized>" );
							echo( "<dockMinimized>true</dockMinimized>" );
							echo( "<images>" );
								echo( "<watermark alpha=\"5\"></watermark>" );
							echo( "</images>" );
							echo( "<initialinputlines>1</initialinputlines>" );
							echo( "<help>false</help>" );
						echo( "</gui>" );
						echo( "<roomlist>" );
						/* EMEETING CHAT ROOM INTEGRATION */
							echo GetUserplaneRooms();
						/* -----------  */
						echo( "</roomlist>" );
						echo( "<getannouncementsinterval>-1</getannouncementsinterval>" );
						echo( "<sendarchive>false</sendarchive>" );
						echo( "<banNotification><![CDATA[<b>[[NAME]] was banned</b>]]></banNotification>" );
						echo( "<sendConnectionListInterval>-1</sendConnectionListInterval>" );
						echo( "<conferenceCallEnabled>false</conferenceCallEnabled>" );
						echo( "<conferenceCallText></conferenceCallText>" );
					echo( "</chat>" );
				echo( "</domain>" );
				break;

			case "getUser":
				if( $strSessionGUID != null || $strUserID != null )
				{
					if( $strUserID == null || strlen(trim($strUserID)) == 0 )
					{
						// Need to look up the userID from strSessionGUID and strKey.  If valid, set the value as so...
						$strUserID = $strSessionGUID; 	/* EDITED FOR EMEETING INTEGRATION */
					}

					if( $strUserID != null || strlen(trim($strUserID)) > 0 )
					{
						## EMEETING INTEGRATION
						$data = GetUserplaneIMData($strUserID);
						
						// Need to look up data for the specified userID
						echo( "<user>" );
							echo( "<userid>" . $strUserID . "</userid>" );
							echo( "<disconnectApps></disconnectApps>" );
							echo( "<admin>".$data['admin']."</admin>" );
							echo( "<speaker>false</speaker>" );
							echo( "<displayname>".$data['username']."</displayname>" );
							echo( "<allowcommapiaccess>false</allowcommapiaccess>" );
							echo( "<avsettings>" );
								echo( "<avenabled>true</avenabled>" );
								echo( "<audioSend>true</audioSend>" );
								echo( "<videoSend>true</videoSend>" );
								echo( "<audioReceive>true</audioReceive>" );
								echo( "<videoReceive>true</videoReceive>" );
								echo( "<audiokbps>16</audiokbps>" ); 		// acceptable values: 10,16,22,44,88
								echo( "<videokbps>100</videokbps>" );		// recommended range: 10 - 200
								echo( "<videofps>15</videofps>" );			// acceptable range: 1 - 30
								echo( "<videosize>1</videosize>" );			// acceptable values: 1, 2, 3
								echo( "<videoDisplaySize>2</videoDisplaySize>" );
							echo( "</avsettings>" );

							echo( "<buddylist>" );
								GetUserplaneBuddyList($strUserID);							
							echo( "</buddylist>" );							
							
							echo( "<blocklist>" );
								GetUserplaneBlockedList($strUserID);
							echo( "</blocklist>" );

							echo( "<images>" );
								echo( "<icon></icon>" );
								echo( "<thumbnail>".$data['thumbs_image']."</thumbnail>" );
								echo( "<fullsize>".$data['big_image']."</fullsize>" );
							echo( "</images>" );
							
							echo( "<chat>" );
								echo( "<userdatavalues>" );
									//echo( "<line>Milpitas, CA</line>" );
									//echo( "<line>Honda of Milpitas</line>" );
									//echo( "<line>2003 CBR F4</line>" );
								echo( "</userdatavalues>" );
								echo( "<gui>" );
									echo( "<viewprofile>true</viewprofile>" );
									echo( "<instantcommunicator>true</instantcommunicator>" );
								echo( "</gui>" );
								echo( "<notextentry>false</notextentry>" );
								echo( "<invisible>false</invisible>" );
								echo( "<userroomcreate>true</userroomcreate>" );
								
								
								echo( "<adminrooms>" );
								/*
									echo( "<room createOnLogin='true'><name>Joe's Room</name><description>A rooom just for Joe</description></room>" );
									echo( "<room createOnLogin='false'><name>Singles</name><description>Singles Description</description></room>" );
									echo( "<room createOnLogin='false'><name>18-24</name></room>" );
								*/	
								echo( "</adminrooms>" );
								
								echo( "<restrictedRooms allowRestricted='false'>" );
									echo( "<room createOnLogin='true' creatorID='4377'><name>Only Site Admins</name><description>Only Site admins can get into this room</description></room>" );
								echo( "</restrictedRooms>" );
								
								//echo( "<initialroom createOnLogin='true'>Lazy People</initialroom>" );
								echo( "<maxdockitems>3</maxdockitems>" );
								echo( "<permitCopy>true</permitCopy>" );
								echo( "<sessionTimeout>-1</sessionTimeout>" );
								echo( "<sessionTimeoutMessage>Your session has expired.</sessionTimeoutMessage>" );
								echo( "<selecteduser>123</selecteduser>" );
								echo( "<inactivityTimeout>20</inactivityTimeout>" );
								echo( "<inactivityTimeoutMessage>You were timed out due to inactivity.</inactivityTimeoutMessage>" );
								echo( "<permitWhisper>true</permitWhisper>" );
								
								echo( "<banOptions>" );
									echo( "<message>How long would you like to ban this user?</message>" );
									echo( "<list>" );
										echo( "<option>One Hour</option>" );
										echo( "<option>One Day</option>" );
										echo( "<option>One Week</option>" );
										echo( "<option>One Month</option>" );
										echo( "<option>Forever</option>" );
									echo( "</list>" );
								echo( "</banOptions>" );
								echo( "<userConnectGreeting></userConnectGreeting>" );
							echo( "</chat>" );
							echo( "<userlist>" );
								echo( "<gui>" );
									echo( "<modulelist>miniprofile,onlineusers,buddylist</modulelist>" );
									echo( "<viewprofile>false</viewprofile>" );
									echo( "<instantcommunicator>false</instantcommunicator>" );
									echo( "<addfriend>true</addfriend>" );
									echo( "<search>true</search>" );
								echo( "</gui>" );
								echo( "<buddyviewableonly>false</buddyviewableonly>" );
							echo( "</userlist>" );
							echo( "<minichat>" );
								echo( "<useAnonymousScreenNames>false</useAnonymousScreenNames>" );
								echo( "<showUserCount>true</showUserCount>" );
								echo( "<showWatcherUserCount>true</showWatcherUserCount>" );
								echo( "<allowTextInput>false</allowTextInput>" );
								echo( "<allowRoomUserlist>false</allowRoomUserlist>" );
							echo( "</minichat>" );
						echo( "</user>" );
					}
					else
					{
						// This means we weren't able to find it so they are invalid
						echo( "<user>" );
							echo( "<userid>INVALID</userid>" );
						echo( "</user>" );
					}
				}
				break;

			case "onRoomStatusChange":
				// This function is not on by default, use allowCalls in getDomainPreferences to turn it on
				if( $strRoomName != null && $strUserID != null )
				{
					// bExists is the true or false boolean that specifies whether the room exists or not
					// bAdmin is also available (see docs)
					if( $bExists )
					{
					}
					else
					{
					}
					// Handle this event, no need to return anything else
				}
				break;

			case "onUserConnectionChange":
				// This function is not on by default, use allowCalls in getDomainPreferences to turn it on
				if( $strUserID != null )
				{
					// $bConnected is whether they are currently connected
					if( $bConnected )
					{
					}
					else
					{
					}
					// Handle this event, no need to return anything else
				}
				break;

			case "onUserRoomChange":
				// This function is not on by default, use allowCalls in getDomainPreferences to turn it on
				if( $strRoomName != null && $strUserID != null )
				{
					// bInRoom is the true or false boolean that specifies whether they are in the room
					if( $bInRoom )
					{
					}
					else
					{
					}
					// Handle this event, no need to return anything else
				}
				break;

			case "setBannedStatus":
				$strInfo = isset($_GET['info']) ? $_GET['info'] : null;

				if( $strUserID != null )
				{
					// bBanned is true or false whether userID has been banned by an admin
					if( $bBanned )
					{
						if( $strInfo != null && $strInfo != "" )
						{
							//if you're using a banOptions list (see getDomainPreferences), strInfo will contain the text of the <option> tag (i.e "One Day")
						}
					}
					else
					{
					}
					// Handle this event, no need to return anything else
				}
				break;

			case "setBlockedStatus":
				if( $strUserID != null && $strBlockedUserID != null )
				{
					// bBlocked is the true or false boolean that specifies whether they are blocked
					if( $bBlocked )
					{
						$DB->Insert("INSERT INTO `members_network` ( `id` , `uid` , `to_uid` , `date` , `comments` , `type`, approved )
							VALUES (NULL , '".$strUserID."', '".$strBlockedUserID."', NOW(), '', '3', 'yes')");
					}
					else
					{
					}
					// Handle thisevent, no need to return anything else
				}
				break;

			case "setFriendStatus":
				if( $strUserID != null && $strFriendUserID != null )
				{
					// bFriend is a boolean true or false whether strUserID is adding or removing strFriendUserID from friend list
					if( $bFriend )
					{
						$DB->Insert("INSERT INTO `members_network` ( `id` , `uid` , `to_uid` , `date` , `comments` , `type`, approved )
								VALUES (NULL , '".$strUserID."', '".$strBlockedUserID."', NOW(), '', '2', 'yes')");
					}
					else
					{
					}
					// Handle this event, no need to return anything else
				}
				break;

			case "getAnnouncements":
				// This function is not on by default, use getAnnouncementsInterval in getDomainPreferences to turn it on
				echo( "<announcementList>" );
					echo( "<announcement><![CDATA[<b>Site Notification:</b> There will be limbo in the leto lounge at 0200]]></announcement>" );
					echo( "<announcement><![CDATA[Check out our new <a href='newsPage.html' target='_blank'>news section</a>]]></announcement>" );
				echo( "</announcementList>" );
				break;

			case "reportAbuse":
				// This function is not on by default, use reportAbuse in getDomainPreferences to turn it on
				$strXmlData = isset($_POST['xmlData']) ? $_POST['xmlData'] : null;
				/*
				//the incoming POST xmlData will look like this:
				<?xml version='1.0' encoding='iso-8859-1'?>
				<abuse>
					<reportingUserID>12345</reportingUserID>
					<abuserUserID>23456</abuserUserID>
					<abuserIPAddress></abuserIPAddress>
					<recordingName>DE291953-5004-C272-9A6A9ABCC3031B35</recordingName>
					<recordingWebAccessibleURL></recordingWebAccessibleURL>
					<description>Said awful things to me accused me of being a "pimp"</description>
					<room>
						<name><![CDATA[asfd]]></name>
						<messages>
							<entry type="msg">
								<timestamp>1126551127685</timestamp>
								<displayName><![CDATA[tom]]></displayName>
								<userID invisible="false">1</userID>
								<content><![CDATA[this is my message]]></content>
							</entry>
						</messages>
					</room>
				</abuse>
				*/
				break;

			case "sendArchive":
				// This function is not on by default, use sendArchive in getDomainPreferences to turn it on
				$strXmlData = isset($_POST['xmlData']) ? $_POST['xmlData'] : null;
				/*
				//the incoming POST xmlData will look like this:
				<?xml version='1.0' encoding='iso-8859-1'?>
				<messageArchive>
					<room>
						<name><![CDATA[asfd]]></name>
						<messages>
							<entry type="announcement">
								<timestamp>1126551016075</timestamp>
								<displayName><![CDATA[]]></displayName>
							</entry>
							<entry type="leave">
								<timestamp>1126551110781</timestamp>
								<displayName><![CDATA[tom]]></displayName>
								<userID invisible="false">1</userID>
							</entry>
							<entry type="join">
								<timestamp>1126551112343</timestamp>
								<displayName><![CDATA[tom]]></displayName>
								<userID invisible="false">1</userID>
							</entry>
							<entry type="msg">
								<timestamp>1126551127685</timestamp>
								<displayName><![CDATA[tom]]></displayName>
								<userID invisible="false">1</userID>
								<content><![CDATA[this is my message]]></content>
							</entry>
						</messages>
					</room>
				</messageArchive>
				*/
				break;

			case "sendConnectionList":
				// This function is not on by default, use sendConnectionListInterval in getDomainPreferences to turn it on
				$strXmlData = isset($_POST['xmlData']) ? $_POST['xmlData'] : null;
				/*
				//the incoming POST xmlData will look like this:
				<?xml version='1.0' encoding='iso-8859-1'?>
				<rooms>
					<room>
						<name><![CDATA[Lobby]]></name>
						<users>
							<user id="1"/>
							<user id="2"/>
							<user id="3"/>
						</users>
					</room>
					<room>
						<name><![CDATA[My Empty Room]]></name>
						<users></users>
					</room>
				</rooms>
				*/
				break;

			default:
				break;
		}
	}

	echo( "</communicationsuite>" );
?>