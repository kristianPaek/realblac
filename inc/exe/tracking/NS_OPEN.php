<?
$subd = "../../../";
require_once $subd . "inc/config_db.php";
require_once $subd . "inc/classes/class_mysql.php";
$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE);
$DB->Connect();
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 6 Jul 2007 05:00:00 GMT");
//////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
$email=strip_tags(trim($_GET['email']));
$newsletter_id=strip_tags(trim($_GET['nid']));
// update newsletter stats
if(strlen($email) > 5 && is_numeric($newsletter_id)){
	$DB->Update("UPDATE email_sendtime SET stats_opened=stats_opened+1, open_date='".date("y-m-d")."' WHERE email= ( '".$email."' ) AND nid= ( '".$newsletter_id."' ) ");
}
header("Location: pixel.jpg");
return;
?>