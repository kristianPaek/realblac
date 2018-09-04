<?
@session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Send headers to prevent IE cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/html; charset=iso-8859-1");

if(!isset($_SESSION['uid']) || !isset($_REQUEST['pId']) ){ die("Please login first!"); }


$subd = "../../../";
require_once $subd."inc/config.php";
require_once $subd."inc/config_db.php";
require_once $subd."inc/config_packageaccess.php";
require_once $subd."inc/classes/class_mysql.php";
require_once $subd."inc/func/globals.php";
require_once $subd."inc/API/api_functions.php";
$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE);
$DB->Connect();



// CHECK WE HAVE ACCESS

if(isset($PACKAGEACCESS[$_SESSION['packageid']]) && in_array("chatroom-im",$PACKAGEACCESS[$_SESSION['packageid']])){ die("PLEASE UPGRADE YOUR ACCOUNT TO USE THIS FEATURE"); }
 

############################################################

#################### OPERATIONS ############################

$_SESSION['chat']['id']			= $_REQUEST['pId'];

//register window IM as open
RegisterIMWindow($_REQUEST['pId']);

$MyData = MemberAccountDetails($_REQUEST['pId'],1,"profile");

$_SESSION['chat']['username'] = $MyData['username'];


// LETS CHECK WE ARE ALLOWED TO CHAT WITH THIS USER

$MYIMSTATUS = $DB->Row("SELECT video_live FROM members WHERE id='".$_SESSION['uid']."' LIMIT 1");

if($MYIMSTATUS['video_live'] =="yes"){ $DisplayOpenCamBox ="yes"; }else{  $DisplayOpenCamBox ="no";}

$result = $DB->Row("SELECT count(id) AS total FROM members_network WHERE to_uid='".$_REQUEST['pId']."' AND uid='".$_SESSION['uid']."' AND type=3");

if($result['total'] ==1){



	// THIS USER HAS BLOCKED

	die("SORRY YOU ARE RESTRICTED FROM CHATTING WITH THIS MEMBER");

}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html>

<head>
<title>Instant Messenger</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$_SESSION['lang_charset'] ?>">
<link rel="stylesheet" type="text/css" href="inc/css/im_window.css" />
<base href="<?=DB_DOMAIN ?>inc/exe/IM/">
<script type="text/javascript" src="inc/js/swfobject.js"></script>
<script src="<?=DB_DOMAIN ?>inc/js/_eMeetingAjax.js" type="text/javascript"></script>
<head>



<style type="text/css">

.username { font-size:12px; color:#999999;}

.user_message { font-size:12px; }

</style>

<script>



function unescapeHTML(html) {

 	var string;

	string = html;

	string = string.replace("&amp;", escape("&"));

	return string;

}


			var _refreshRate = 6000;

			var sendReq = getXmlHttpRequestObject();

			var _sendReqTimeout;

			var receiveReq = getXmlHttpRequestObject();

			var _recieveReqTimeout;

			var _errorMessagesTimeout;

			var _timeoutMillSec = _refreshRate - 3000;

			var lastMessage = 0;

            var chat_toid = '<?=$_GET['pId'] ?>';

            var chat_fromid = '<?=$_SESSION['uid'] ?>';

			var chat_avartar ='user.png';

			var mTimer;

			var chatClosed = "Chat Session Closed!";

			var imRejected = "Chat Request Rejected!";

			//in situations where user closes IM and close message if retrieved when reciever logges in
			//and closes IM again, the sender will recieve chatClosed message again and so on..
			var sendChatClosed = true; //determines if to send chat closed message again


			//*
			// Initialises and HTTPObject and returns it.
			// If windows activeXObject is enabled, it returns an instance of XMLHTTP.
			// otherwise XMLHttpRequest
			//*
			function getXmlHttpRequestObject() {
			  var xhr = false;
			  if (window.ActiveXObject) {
			    try {
			      xhr = new ActiveXObject("Msxml2.XMLHTTP");
			    } catch(e) {
			      try {
			        xhr = new ActiveXObject("Microsoft.XMLHTTP");
			      } catch(e) {
			        xhr = false;
			      }
			    }
			  } else if (window.XMLHttpRequest) {
			    try {
			      xhr = new XMLHttpRequest();
			    } catch(e) {
			      xhr = false;
			    }
			  }
			  else
	          {
				  document.getElementById('im_error').innerHTML = 'Status: Cound not create XmlHttpRequest Object.  Consider upgrading your browser.';
			  }	
			  return xhr;
			}


			function endChat()
			{
				//clear timeouts
				clearTimeout(_recieveReqTimeout);
				clearTimeout(_sendReqTimeout);

				//aborts requests
				sendReq.abort();
				receiveReq.abort();

				if(sendChatClosed)
				{
					//prevent infinit looping
					if(chat_toid != chat_fromid)
					{
						if (sendReq.readyState == 4 || sendReq.readyState == 0 ) {
		
							sendReq.open("POST", 'inc/imSend.php?chat=1&chat_fromid=' + chat_fromid + '&chat_toid=' + chat_toid + '&last=' + lastMessage + '&read=1', true);
							sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
							//sendReq.onreadystatechange = handleSendChat; 
		
							var param = 'message=' + unescapeHTML(chatClosed);
							param += '&chat_fromid=' + chat_fromid;
							param += '&chat_toid=' + chat_toid;
							param += '&chat_icon='+ "system.gif";
							sendReq.send(param);
						}
					}
				}
			}

			//Function for initializating the page.
			function startChat() {

				//Start Recieving Messages.

				getChatText();				

			}


			function hideErrorMessages()
			{
				document.getElementById('im_error').innerHTML = "";
				clearTimeout(_errorMessagesTimeout);
			}

			function reqTimeout(req)
			{
				if(req == "in")
				{
					receiveReq.abort();
					document.getElementById('im_error').innerHTML = "Error recieving message. Retrying...";
				}
				elseif(req == "out")
				{
					sendReq.abort();
					document.getElementById('im_error').innerHTML = "Error sending message. Retrying...";
				}
			
				_errorMessagesTimeout = setTimeout("hideErrorMessages();",5000); 
			}

			//shows sending... indicator
			function indicator(display)
			{
				document.getElementById("sendIndicator").style.display = display;
			}

	
			//Gets the current messages from the server
			function getChatText() {


				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {					

					receiveReq.open("GET", 'inc/imGet.php?chat=1&chat_fromid=' + chat_fromid + '&chat_toid=' + chat_toid + '&last=' + lastMessage, true);
					receiveReq.onreadystatechange = handleReceiveChat; 
					receiveReq.send(null);

				    // Timeout to abort request
				    _recieveReqTimeout = setTimeout("reqTimeout('in');",_timeoutMillSec);  					
				}


				//Auto scroll to bottom of div
				if(document.getElementById('autoscroll').checked==true)
				{
					var objDiv = document.getElementById("im_content");
					objDiv.scrollTop = objDiv.scrollHeight;
			    }
			}


			//Function for handling the return of chat text
			function handleReceiveChat() {
				if(receiveReq != undefined)
				{
					if (receiveReq.readyState == 4) {
						mTimer = setTimeout('getChatText();',_refreshRate); // refresh rate
	
						//clear recieve request timeout
						clearTimeout(_recieveReqTimeout);
	
						//var xmldoc = receiveReq.responseXML;
						displayMessage(receiveReq.responseXML);
					}
				}
			}


			//Add a message to the chat server.
			function sendChatText() {

				var ed = tinyMCE.get('im_message_send'); 				

				if(!ed.getContent()) {
					//alert("Please enter some text");
					return;
				}

				indicator("block");

				if (sendReq.readyState == 4 || sendReq.readyState == 0) {

					sendReq.open("POST", 'inc/imSend.php?chat=1&chat_fromid=' + chat_fromid + '&chat_toid=' + chat_toid + '&last=' + lastMessage, true);
					sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					sendReq.onreadystatechange = handleSendChat; 

					var param = 'message=' + unescapeHTML(ed.getContent());
					param += '&chat_fromid=' + chat_fromid;
					param += '&chat_toid=' + chat_toid;
					param += '&chat_icon='+ document.getElementById('AvarTarIcon_img').value;
					sendReq.send(param);
					ed.setContent('');
					//tinyMCE.execInstanceCommand("im_message_send", "mceFocus");

				    // Timeout to abort request
				    _sendReqTimeout = setTimeout("reqTimeout('out');",_timeoutMillSec);  					
				}
			}


			//When our message has been sent, update our page.
			function handleSendChat() {

				//Clear out the existing timer so we don't have 
				//multiple timer instances running.

				if(sendReq != undefined)
				{
					if (sendReq.readyState == 4) {
						//clear send request timeout
						clearTimeout(_sendReqTimeout);
	
						displayMessage(sendReq.responseXML);
						indicator("none");
					}
	
					clearInterval(mTimer);
					getChatText();
				}

			}


			function displayMessage(xmldoc)
			{
				if(xmldoc != null)
				{
					var chat_div = document.getElementById('im_content');
	
					var message_nodes = xmldoc.getElementsByTagName("message"); 
	
					var n_messages = message_nodes.length
	
					for (i = 0; i < n_messages; i++) {

						var user_node = message_nodes[i].getElementsByTagName("user");
						var text_node = message_nodes[i].getElementsByTagName("text");
						var time_node = message_nodes[i].getElementsByTagName("time");
						var avatar_node = message_nodes[i].getElementsByTagName("avatar_img");
						var sound_node = message_nodes[i].getElementsByTagName("sound");
						var webcam_node = message_nodes[i].getElementsByTagName("webcam");
	
	
						if(sound_node[0].firstChild.nodeValue != 1 && sound_node[0].firstChild.nodeValue != 0){doSound(sound_node[0].firstChild.nodeValue);}

						chat_div.innerHTML += '&nbsp;<font class="chat_avatar">' + avatar_node[0].firstChild.nodeValue + '</font>&nbsp;';
	
						//check if timestamp is in correct length
						chat_div.innerHTML += '<font class="username">' + user_node[0].firstChild.nodeValue + '</font>&nbsp;';
	
						if(time_node[0].firstChild.nodeValue.length > 15)
						{
							chat_div.innerHTML += '<font class="chat_time">(' + time_node[0].firstChild.nodeValue.substring(11,16) + ')</font>:&nbsp;';
						}
						else
						{
							chat_div.innerHTML += ':&nbsp;';
						}
						
						//set sendChatClosed
						//Chat Rejected! must be declared in 
						if((text_node[0].firstChild.nodeValue == chatClosed || text_node[0].firstChild.nodeValue == imRejected) && sendChatClosed==true)
						{
							sendChatClosed = false;
						}

						chat_div.innerHTML += '<font class="user_message">' + text_node[0].firstChild.nodeValue + '</font><br>';
						lastMessage = (message_nodes[i].getAttribute('id'));

						//This if statement enables/disables auto scroll
	
						if(document.getElementById('autoscroll').checked==true)
						{
							chat_div.scrollTop = chat_div.scrollHeight;
	 			        }
					}
			  	} 
			}




			function toggleLayer( whichLayer )

			{

			  var elem, vis;

			  if( document.getElementById ) 

				elem = document.getElementById( whichLayer );

			  else if( document.all ) 

				  elem = document.all[whichLayer];

			  else if( document.layers ) 

				elem = document.layers[whichLayer];

			  vis = elem.style;

			

			  if(vis.display==''&&elem.offsetWidth!=undefined&&elem.offsetHeight!=undefined)    vis.display = (elem.offsetWidth!=0&&elem.offsetHeight!=0)?'block':'none';  vis.display = (vis.display==''||vis.display=='block')?'none':'block';

			}



			function doSound(playSound){ 

				var flashvars = {};
				flashvars.sndfilename = playSound;
				var params = {};
				params.play = "true";
				params.loop = "false";
				params.menu = "false";
				params.scale = "noscale";
				params.wmode = "transparent";
				var attributes = {};
				attributes.align = "top";
				swfobject.embedSWF("inc/sounds/playSnd.swf", "playSndDiv", "100%", "100%", "9.0.0", "inc/sounds/expressInstall.swf", flashvars, params, attributes);


			}


			function ChangeGalleryPhoto(file){			

				document.getElementById('ViewerImage').src ='../../../inc/tb.php?src='+file+'&x=150&y=150';
			

			}



			function ResizeMeBig(){

				window.resizeTo(685,500)

			}

			function ResizeMeSmall(){

				window.resizeTo(430,500)

			}

</script>
<!--
<script src="<?=$subd ?>inc/js/_scriptaculous/prototype.js" type="text/javascript"></script>
<script src="<?=$subd ?>inc/js/_scriptaculous/effects.js" type="text/javascript"></script>
-->

</head>

<body onload="startChat();" onunload="endChat();">

<div id="im_error"></div>



<!-- IM TOP BAR -->

<div id="im_top_bar">

<span style="float:left; color:white; font-size:13px; padding:5px; font-size:bold;"><img src="<?=$MyData['image'] ?>&x=25&y=25" width="25" height="25" align="absmiddle" style="1px solid white;"> <a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$_REQUEST['pId'] ?>" target="_blank" style="color:white;"><?=$_SESSION['chat']['username'] ?></a> / <?=$MyData['age']?> / <?=$MyData['country']?> </span>

<?php if(FLASH_VIDEO =="yes12"){ ?>

	<span id="SpanOpen" style="display:<?php if($DisplayOpenCamBox =="no"){ ?>visible; <?php }else{ ?>none; <?php } ?>"><img src="inc/images/top_bar_help.jpg" align="absmiddle"  onClick="ResizeMeBig(); ChangeLiveStatus(<?=$_SESSION['uid'] ?>); toggleLayer('SpanOpen');toggleLayer('SpanClose'); return false;"></span>

	<span id="SpanClose" style="display:<?php if($DisplayOpenCamBox =="yes"){ ?>visible; <?php }else{ ?>none; <?php } ?>"><img src="inc/images/top_bar_settings.jpg" align="absmiddle"  onClick="ResizeMeSmall(); ChangeLiveStatus(<?=$_SESSION['uid'] ?>); toggleLayer('SpanOpen');toggleLayer('SpanClose'); return false;"></span>

<?php } ?>

</div>

<!----------------->



<div class="im_wrapper">





 

<table width="650"  border="0" cellpadding="0" cellspacing="0"> 

  <tr>

<td width="406" height="206" valign="top">



<div id="im_content"> 

<div style="margin-left:10px;">

	<div id="im_message_window">	  </div>

</div>

</div>



<!--<div id="isTyping"> Mark is typing a message</div>

<script type="text/javascript" language="javascript">Effect.Pulsate('isTyping', { pulses : 5, duration : 15, from : 0.1 });</script>-->

</td>

<td width="244" rowspan="2" valign="top">



<? if(FLASH_VIDEO =="yes12"){ ?>

<div id="im_sidebar" style="width:225px; overflow:hidden;">









	<div style="margin-left:10px; margin-top:10px; font-size:12px;"><img src="inc/images/user.png" width="16" height="16" align="absmiddle"> <?=$_SESSION['chat']['username'] ?></div>

	

	<div class="panel_caption" style="background:#efefefe; border:1px solid #cccccc; background:white; padding:5px; margin:5px; height:160px; overflow:hidden; display:visible" id="ShowPhoto">



		<div id="ShowWebCam" style="display:none;">

				

				  <div id='preview'></div>

					<script type='text/javascript' src='<?=$subd ?>inc/js/swfobject.js'></script>

					  <script type='text/javascript'>

					  var s1 = new SWFObject('<?=$subd ?>inc/exe/flash/video_player_rtmp.swf','ply','200','150','9','#ffffff');

					  s1.addParam('allowfullscreen','true');

					  s1.addParam('allowscriptaccess','always');

					  s1.addParam('wmode','transparent');

					  s1.addParam('flashvars','file=eMeetingStream_<?=$_GET['pId'] ?>.flv&streamer=<?=FLASH_DOMAIN?>&autostart=true&controlbar=none');

					  s1.write('preview');

					</script>

 

		

		</div>	



		<div align="center" id="panel_webcam_display">&nbsp;</div>

	

	</div>









		





	<div class="panel"><a href="javascript:void(0)" onClick="toggleLayer('p2'); ChangeLiveStatus(<?=$_SESSION['uid'] ?>); return false;">&nbsp;&nbsp;&nbsp;   Enable / Disable Webcam</a></div>

		

		<div id="p2" style="display:visible">



		<script type="text/javascript" src="<?=$subd ?>inc/js/_flash.js"></script>

		<SCRIPT language="JavaScript">

			displayeMeeting("<?=$subd ?>inc/exe/flash/video_streamer.swf?&uid=<?=$_SESSION['uid'] ?>&userid=77","225","175",{ menu:"false",bgcolor:"#FFFFFF",version:"6,0,47,0",align:"middle"});

		</SCRIPT>



		</div><div id="p2_span"></div>



	









</div> <? } ?>

<input name='CheckWebCam' value='off' type='hidden' id="CheckWebCam">





</td></tr><tr><td height="97" valign="top" style="font-size:12px;">





<? include_once("tmp_form.php"); ?>

<div style="margin-top:8px;">

<img src="inc/images/avartar/user.png" width="16" height="16" align="absmiddle" id="AvarTarIcon">

<input type="hidden" id="AvarTarIcon_img" name="AvarTarIcon_img" value="user.png">



Auto Scroll 

<input type="checkbox" id="autoscroll" name="autoscroll" CHECKED /> Sound <input type="checkbox" id="sound" name="sound" CHECKED />

<div id="Layer1" style="position:absolute; width:52px; height:61px; z-index:1; left: 365px; top: 338px;">
<input type="image" value="Save" onclick="javascript:sendChatText();" src="inc/images/chat_button.jpg"/></div>

</div>

<? if(FLASH_VIDEO =="yes12"){ ?>

<? if($DisplayOpenCamBox =="no"){ ?><img src="inc/images/webcam.png" align="absmiddle"> <a href="#" onClick="ResizeMeBig(); toggleLayer('SpanOpen');toggleLayer('SpanClose'); ChangeLiveStatus(<?=$_SESSION['uid'] ?>); return false;">Start Webcam Chat</a> <? } ?>

<? } ?>


</td>

  </tr></table>

</div>





<div id="playSndDiv"></div>



</body>

</html>