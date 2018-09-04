<?
session_start();

error_reporting(E_ALL);
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

ini_set('display_errors', '1');


if(!isset($_SESSION['uid'])){ die("Please login!"); }



$subd = "../../../";

require_once $subd."inc/config.php";

require_once $subd."inc/config_packageaccess.php";

$ThisImg="";



// CHECK WE HAVE ACCESS

if(isset($PACKAGEACCESS[$_SESSION['packageid']]) && in_array("chatroom-im",$PACKAGEACCESS[$_SESSION['packageid']])){ die("PLEASE UPGRADE YOUR ACCOUNT TO USE THIS FEATURE"); }



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><title>Instant Messenger</title><head>

<script type="text/javascript" src="inc/js/im_list.js"></script>

<script type="text/javascript" src="<?=$subd ?>inc/js/_eMeetingGlobals.js"></script>

<script type="text/javascript">function handleError() {return true;}window.onerror = handleError;</script>

<link rel="stylesheet" href="inc/css/im_css.css" type="text/css" />

</head>

<body>





<div class="im_window" id="im_window" onResize="NoResize();">

<div id="IMLIST"><span style="margin-top:150px; marginleft:40px;">Loading</span></div>



</div>



<div style="display:block; float:left; width:220px;">



	<input name="Input" type="button" class="disconnect_button" value="Close Window" onClick="javascript:window.close();"/>

</div>



<!-- AJAX COMMANDS -->

<iframe id="pm" name="pm" src="inc/imRequest.php" style="width: 0px; height: 0px; border: 0px;"></iframe>

<script>

showUserList();

</script>

</body></html>