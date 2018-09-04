<?php session_start(); 

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !="yes"){exit();}
$subd = "../../../";
require $subd."inc/config.php";
include($subd."inc/config_packageaccess.php");
// CHECK WE HAVE ACCESS
if(isset($PACKAGEACCESS[$_SESSION['packageid']]) && in_array("chatroom-chatroom",$PACKAGEACCESS[$_SESSION['packageid']])){ die("PLEASE UPGRADE YOUR ACCOUNT TO USE THIS FEATURE"); }

?>
<html>
<head>
<title></title>
<script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/_flash.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<SCRIPT language="JavaScript">
	displayeMeeting("ChatRoom.swf?user=<?php print $_SESSION['username']; ?>&wURL=<?=DB_DOMAIN ?>inc/exe/","550","350",{menu:"true",bgcolor:"#EDEDF0",version:"6,0,47,0",align:"middle",wURL:"<?=DB_DOMAIN ?>inc/exe/"});
</SCRIPT>
</body>
</html>
