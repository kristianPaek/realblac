<?
session_start();
if($_SESSION['admin_auth'] =="yes"){
	
	require('../crop/class.cropinterface.php');
	$ci =& new CropInterface(true);
	include_once('../class/class_thumbs.php');
	$thumb = new Thumbnail($_GET['f']);
	$thumb->resize($_GET['w'],$_GET['h']);
	$thumb->show();
	//if you're using the php 4 version:
	$thumb->destruct();
}
?>