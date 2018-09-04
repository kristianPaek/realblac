<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

error_reporting(E_ALL);
ini_set('display_errors', '1');


// Send some headers to keep the user's browser from caching the response.

@session_start();

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 

header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 

header("Cache-Control: no-cache, must-revalidate" ); 

header("Pragma: no-cache" );

header("Content-Type: text/xml; charset=".$_SESSION['lang_charset']."");


if(!isset($_SESSION['uid'])){ die("Please login first"); }


$subd = "../../../../";

require_once "imFunctions.php";

require_once $subd."inc/config.php";

require_once $subd."inc/config_db.php";

require_once $subd."inc/classes/class_mysql.php";

require_once $subd."inc/func/globals.php";

$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE, false, false, $_SESSION['lang_charset']); //, false, false, $GLOBALS['_META']['_charset']

$DB->Connect();



//modifications
//update online timeout each time a user sends a message to keep them online on the page
$ip=$_SERVER['REMOTE_ADDR'];
require_once( $subd."inc/func/globals.php" ); 		## loads the main functions file
Build_UserOnline(time(), $ip, "IM", $_SESSION['uid'], 900, $_SERVER['REQUEST_URI']);


// send message

$im_to 		= $_POST['chat_toid'];

$im_from 	= $_POST['chat_fromid'];

$chat_icon 	= $_POST['chat_icon'];


if(isset($_POST['endchat']))
{
	//remove IMWindow from session
	RemoveIMWindow($im_to);
}


// make message icons

$message = str_replace(":)","<img src=inc/images/smiles/emoticon_smile.png>",$_POST['message']);

$message = str_replace(":x","<img src=inc/images/smiles/emoticon_grin.png>",$message);

$message = str_replace(":d","<img src=inc/images/smiles/emoticon_happy.png>",$message);

$message = str_replace(":o","<img src=inc/images/smiles/emoticon_surprised.png>",$message);

$message = str_replace(":p","<img src=inc/images/smiles/emoticon_tongue.png>",$message);

$message = str_replace(":(","<img src=inc/images/smiles/emoticon_unhappy.png>",$message);

$message = str_replace(":s","<img src=inc/images/smiles/emoticon_waii.png>",$message);



$message = str_replace("&amp;","&", $message);

//$message = str_replace("</p>","",$message);

$message =  mysql_real_escape_string($message);
//$message =  addslashes($message);



if($chat_icon ==""){ $chat_icon="user.png"; }


## strip message
$message  = $message;
$message  = str_replace("["," *",$message);
$message  = str_replace("]","* ",$message);
$message  = StripMessage($message);


## build the sound string

$ring_bell = MakeEffect($message);

if($ring_bell !=1){ $ring_bell = "win/".$ring_bell.".mp3"; }

$xml = '<?xml version="1.0" encoding="utf-8" ?>';

$xml .= '<root>';


if(isset($message) && strlen($message) > 0) {

	// do message	

	//$message = substr($message, 0, 100); 

	$read = "no";
	if(isset($_POST['read']) && $_POST['read'] == 1)
	{
		$read = "no";
	}

	//message sent to one self then do not store in db
	if($im_from != $im_to)
	{

		$dbq = $DB->Row("SELECT now( ) as curtime FROM `system_settings` LIMIT 1 ");


$MyDate = date("Y-m-d H:i:s");


		$res = $DB->Insert("INSERT INTO `im` ( `dataid` , `from_uid` , `to_uid` , `date` , `message` , `read` ,avartar) VALUES (NULL , '".$im_from."', '".$im_to."', '".$MyDate."' , '".$message."', '".$read."','".$chat_icon."')");
	}

	//modification 
	//return message sent

	$xml .= "<message id=''>";
	
	$xml .= "<sound>".$ring_bell."</sound>"; // test ring bell function
	
	$xml .= "<avatar_img>".htmlspecialchars("<img src='inc/images/avartar/".$chat_icon."' align='absmiddle'>") . "</avatar_img>";
	
	$xml .= "<user>".$_SESSION['username']."</user>";
	
	$xml .= "<text>".htmlspecialchars($message)."</text>";
	
	$xml .= "<time>".DATE_TIME."</time>";
	
	$xml .= "<webcam>yes</webcam>";
	
	$xml .= "<lastID>0</lastID>";
	
	//$xml .= "<MyID>".$_SESSION['uid']."</MyID>"; // used only for making background a different colours in the chat window
	
	$xml .= "</message>";	
}
else
{
	//modification 
	//return message sent

	$xml .= "<message id=''>";
	
	$xml .= "<sound>0</sound>"; // test ring bell function
	
	$xml .= "<avatar_img>".htmlspecialchars("<img src='inc/images/avartar/system.gif' align='absmiddle'>") . "</avatar_img>";
	
	$xml .= "<user>".$_SESSION['username']."</user>";
	
	$xml .= "<text>Message could not be delivered. Try again...</text>";
	
	$xml .= "<time>".date("Y:m:d h:i:s")."</time>";
	
	$xml .= "<webcam>yes</webcam>";
	
	$xml .= "<lastID>0</lastID>";
	
	//$xml .= "<MyID>".$_SESSION['uid']."</MyID>"; // used only for making background a different colours in the chat window
	
	$xml .= "</message>";
}
$xml .= '</root>';
echo $xml;


?>