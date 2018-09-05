<?
$con_dir = "../../"; 
$_REQUEST['n'] =3;
require_once "../config.php";
require_once subd . "../../inc/config.php";

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );
if(!is_numeric($_GET['id'])){ die();}
$result = $DB->Row("SELECT nid, name, description, image, content FROM email_newsletters WHERE nid= '". $_GET['id'] ."' LIMIT 1");

print $result['content'];
?>
