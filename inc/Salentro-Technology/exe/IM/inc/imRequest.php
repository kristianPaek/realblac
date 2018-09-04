<?php

@session_start();
// Send headers to prevent IE cache
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/html; charset=".$_SESSION['lang_charset']."");


if(!isset($_SESSION['uid'])){ die(); }

// DEFAULT IM LOADING SETTINGS
$IMRoomArray = array(
	"width" => "415",
	"height" => "470",
	"path" => "inc/exe/IM/window.php?pId=",
);


$subd = "../../../../";

require_once $subd."inc/config_db.php";
require_once $subd."inc/classes/class_mysql.php";
$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE, false, false, $_SESSION['lang_charset']); // $GLOBALS['_META']['_charset']
$DB->Connect();
require_once( $subd."plugins/config_plugins.php" );

// private chat request



$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));

				

$result = $DB->Row("SELECT members.id FROM im, members WHERE im.from_uid = members.id AND im.to_uid= ( '".$_SESSION['uid']."' ) AND im.read ='no' AND im.date LIKE '%".$SearchDate."%' GROUP BY im.from_uid LIMIT 1");

	

if(!empty($result)){

?>



<script language="javascript">

<!--

function popUp(URL) {

var Win = window.open(URL, '1', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=<?=$IMRoomArray['width'] ?>,height=<?=$IMRoomArray['height'] ?>,left=212,top=134');

}

popUp("../window.php?pId=<?=$result['id'] ?>");

// -->

</script>



<?php } ?>