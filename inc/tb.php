<?php
/***************************************************************************
 *
 *	 PROJECT: eMeeting Dating Software
 *	 VERSION: 9
 *	 LISENSE: OWN / LEASED (http://www.datingscripts.co.uk/license.php)
 *
 *	 This program is a commercial software product and any kind of usage
 *	 means agreement to the eMeeting software License Agreement.
 *
 *	 This notice MUST NOT be removed from the code.   
 *
 *   Copyright 2006-2009 eMeeting Ltd.
 *   http://www.datingscripts.co.uk/
 *
 ***************************************************************************/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// ini_set('memory_limit', '-1');
// Send headers to prevent IE cache

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/html; charset=utf-8");

require_once("config_db.php");
//////////////////////////////////////////////////////////////////////////////////////////
// SETUP THUMB VALUES
///////////////////////////////////////////////////////////////////////////////////////////
define('PATH_THUMBS','../uploads/thumbs/'); 
define('PATH_IMAGES','../uploads/images/'); 
define('PATH_FILES','../uploads/files/'); 
define('PATH_CACHE','../uploads/cache/'); 
define('PATH_THIS',dirname(__FILE__)."/");
define('PATH_DEFAULT','../uploads/files/nophoto.jpg');

$img_array = array('jpeg', 'jpg','png','gif','bmp');
$WaterMarkAdd = WATERMARK_FILE;

//////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////              DO NOT EDIT BELOW        ////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_REQUEST['src'])){  $from_name = urldecode($_REQUEST['src']); } else {  $from_name = PATH_DEFAULT; }
if (isset($_REQUEST['t']))  {  $image_type = intval($_REQUEST['t']);	 }
if (isset($_REQUEST['x']))  {  $max_x = intval($_REQUEST['x']);			 }
if (isset($_REQUEST['y']))  {  $max_y = intval($_REQUEST['y']);			 }

if($max_x < 1){ $max_x = 50; }
if($max_y < 1){ $max_y = 50; }
switch($_GET['t']){
	case "n": {	$src_path=""; 			} break; // same directory
	case "i": {	$src_path=PATH_IMAGES;	} break; // image directory
	case "f": {	$src_path=PATH_FILES;	$WaterMarkAdd=""; } break; // image directory
	default : { $src_path=PATH_THUMBS;	$WaterMarkAdd=""; } break; // thumb directory
}

$ext = pathinfo($from_name, PATHINFO_EXTENSION);

if( !file_exists($src_path.$from_name) || !in_array($ext,$img_array) ) { 

if (isset($_REQUEST['g']) && is_numeric($_REQUEST['g']) )  {   $from_name = str_replace(".jpg","_".$_REQUEST['g'].".jpg",PATH_DEFAULT); readfile( $from_name );exit;
}else{ $from_name = PATH_DEFAULT; readfile( $from_name );exit;}
 $src_path="";

}

require_once('classes/class_thumbnail_preview.php');
$thumb = new eMeeting_Thumbnail_Preview(PATH_THIS.PATH_CACHE, PATH_THIS.$src_path, $from_name , $max_x , $max_y,$WaterMarkAdd);

?>