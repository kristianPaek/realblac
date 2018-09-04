<?
require_once ( '../class/class_captcha.php' );
$Fonts = array('../images/fonts/solmetra1.ttf', '../images/fonts/solmetra2.ttf', '../images/fonts/solmetra3.ttf');
$makeSecureImg = new eMeetingCap($Fonts, 110, 30);
$makeSecureImg->SetBackgroundImages('../images/fonts/bg.jpg');
$makeSecureImg->Create(); 
?>