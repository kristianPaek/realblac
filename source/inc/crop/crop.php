<?php
require_once "../config.php";
require_once subd . "../../inc/config.php";
require('class.cropinterface.php');
$ci = new CropInterface(true);

if (isset($_GET['file'])) {
	
	$dd = explode("images/",$_GET['file']);
	define('EditFileThis',$dd[1]);
    $ci->loadImage(PATH_IMAGE.$dd[1]);
	$ci->cropToDimensions($_GET['sx'], $_GET['sy'], $_GET['ex'], $_GET['ey']);
	$ci->saveImage(PATH_IMAGE.$dd[1]);

	include_once('../class/class_thumbs.php');
	$thumb = new Thumbnail(PATH_IMAGE.$dd[1]);
	$thumb->resize(MAX_HEIGHT,MAX_WIDTH);
	$thumb->cropFromCenter(170);
	$thumb->crop(21,0,115,153);
	$thumb->save(PATH_IMAGE_THUMBS.$dd[1],100);
	$thumb->destruct();	
	
}
?>

<html>

<body>
<?php

if (!isset($_GET['file'])) {
define('EditFileThis',$_GET['file']);
$ci->setCropAllowResize(true);
$ci->setCropTypeDefault(ccRESIZEANY);
$ci->setCropTypeAllowChange(true);
$ci->setCropSizeDefault('2/2');
$ci->setCropPositionDefault(ccCENTRE);
$ci->setCropMinSize(10, 10);
$ci->setExtraParameters(array('test' => '1', 'fake' => 'this_var'));
$ci->setCropSizeList(array(
        '200x200' => '200 x 200 pixels',
        '320x240' => '320 x 240 pixels',
        '3:5'     => '3x5 portrait',
        '5:3'     => '3x5 landscape',
        '8:10'    => '8x10 portrait',
        '10:8'    => '8x10 landscape',
        '4:3'     => 'TV screen',
        '16:9'    => 'Widescreen',
        '2/2'     => 'Half size',
        '4/2'     => 'Quater width and half height'
        ));
$ci->setMaxDisplaySize('300x300');
$ci->loadInterface(PATH_IMAGE.$_GET['f']);

}
?>
<?php if (isset($_GET['file'])) { ?>
<style>
body{
background:#eee;
height: auto;
}
    #cropInterface {
        
        padding: 0;
        margin: 0 auto;
        text-align: center;
		
        color: #000;
		font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif;
		font-size: 10px;
        width: 400px;
		min-width: 300px;
    }
	    .cropSubmitButton {
        font-family: "MS Sans Serif", Geneva, sans-serif;
        border: 0;
        margin: 0;
        padding: 5px;
        width: 100%;	
		border:1px solid #333;
		padding:10px; background:#eeeeee;color:#666; font-size:15px;margin-top:5px;         background-color: #666666; font-weight:bold; color:#FFFFFF
    }    #cropImage {
		border:1px solid #333;
        margin: 0;
        padding: 0;
	    background-color: #fff;
    }
	#messages { margin-top:10px;}
.message-good {  padding: 10px;  margin: 0;  margin-bottom: 5px;  display: block;  border: 1px solid #009B2B;  color: #000;  font-weight:bold; background: #D2FFDE; font-size:12px;}

</style>

<div id="cropInterface">
<div id="messages">
<div class="message-good">Image Updated Successfully</div>
</div>
<img src="<?=WEB_PATH_IMAGE.$dd[1] ?>" id="cropImage"><br><br>
<center><p><a href="#" class="cropSubmitButton" onClick="javascript:window.close();" style="text-decoration:none;">Close Window</a></p></center>
</div>
<?php } ?>
</div>

<?php $ci->loadJavascript(); ?>

</body>
</html>