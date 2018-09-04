<?php



error_reporting(E_ERROR | E_WARNING | E_PARSE);



// Send headers to prevent IE cache
@session_start();


header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 

header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 

header("Cache-Control: no-cache, must-revalidate" ); 

header("Pragma: no-cache" );

header("Content-Type: text/xml; charset=".$_SESSION['lang_charset']."");







if(!isset($_SESSION['uid'])){ die("Please login first"); }



$subd = "../../../../";

require_once "imFunctions.php";

require_once $subd."inc/config_db.php";

require_once $subd."inc/classes/class_mysql.php";

$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE, false, false, $_SESSION['lang_charset']); //, 

$DB->Connect();





$last 			= (isset($_GET['last']) && $_GET['last'] != '') ? $_GET['last'] : 0;

$chat_fromid  	= (isset($_GET['chat_fromid']) && $_GET['chat_fromid'] != '') ? $_GET['chat_fromid'] : 0;

$chat_toid  	= (isset($_GET['chat_toid']) && $_GET['chat_toid'] != '') ? $_GET['chat_toid'] : 0;





// get chat messages

$showcam = $DB->Row("SELECT video_live AS found FROM members WHERE id='".$chat_toid."' LIMIT 1");



$SQL = "SELECT members.username, im.dataid, im.date, im.message, im.avartar FROM 

im

INNER JOIN members ON ( members.id = im.from_uid )

WHERE (im.from_uid='".$chat_toid."' AND im.to_uid='".$_SESSION['uid']."' AND im.read='no') 

ORDER by im.dataid ASC";

$xml = '<?xml version="1.0" encoding="utf-8" ?><root>';

$result = $DB->Query($SQL);   
while( $im = $DB->NextRow($result) )
{

	if( $im['dataid'] != "" )
	{
		## update message status to read
		$DB->Update("UPDATE im SET `read`='yes' WHERE im.from_uid='".$chat_toid."' AND im.to_uid='".$_SESSION['uid']."' AND dataid='".$im['dataid']."'"); // makr as read
	}
	
	
	
	## strip message
	
	$IM_MSG  = $im['message'];
	
	$IM_MSG  = str_replace("["," *",$IM_MSG);
	
	$IM_MSG  = str_replace("]","* ",$IM_MSG);
	
	$IM_MSG  = StripMessage($IM_MSG);

	$IM_MSG  =  stripslashes($IM_MSG);
	
	
	
	## make user icon
	
	if($im['avartar'] ==""){ $im['avartar']="user.png"; }
	
	
	## build the sound string
	
	$ring_bell = MakeEffect($im['message']);

	if($ring_bell !=1){ $ring_bell = "win/".$ring_bell.".mp3"; }
	
	
	if( strlen($IM_MSG ) > 0 ){
	
		$xml .= "<message id='".$im['dataid']."'>";
	
		$xml .= "<sound>".htmlspecialchars($ring_bell)."</sound>"; // test ring bell function
	
		$xml .= "<avatar_img>".htmlspecialchars("<img src='inc/images/avartar/".$im['avartar']."' align='absmiddle'>") . "</avatar_img>";
	
		$xml .= "<user>".$im['username']."</user>";
	
		$xml .= "<text>".htmlspecialchars($IM_MSG)."</text>";
	
		$xml .= "<time>".$im['date']."</time>";
	
		$xml .= "<webcam>yes</webcam>";
	
		$xml .= "<lastID>".$im['dataid']."</lastID>";
	
		//$xml .= "<MyID>".$_SESSION['uid']."</MyID>"; // used only for making background a different colours in the chat window
	
		$xml .= "</message>";	
	
	}
	
}

$xml .= '</root>';

echo $xml;

?>