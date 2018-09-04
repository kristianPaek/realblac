<?php
############################################################
#   		eMeeting Dating / Community Software   
############################################################
$imgsWidth=150; //static width for shrinking images

function enCodeBB($msg,$admin) {

$pattern=array(); $replacement=array();

$pattern[]="/\[url[=]?\](.+?)\[\/url\]/i";
$replacement[]="<a href=\"\\1\" target=\"_blank\" rel=\"nofollow\">\\1</a>";

$pattern[]="/\[url]((f|ht)tp[s]?:\/\/[^<> \n]+?)\](.+?)\[\/url\]/i";
$replacement[]="<a href=\"\\1\" target=\"_blank\" rel=\"nofollow\">\\3</a>";

/* New [IMG] tag code - with fixed width */
$pattern[]="/\[imgs(left|right)?\](http:\/\/([^<> \n]+?)\.?(gif|jpg|jpeg|png)?)\[\/imgs\]/i";
$replacement[]='<a href="\\2" target="_blank" rel="nofollow"><img src="\\2" border="0" align="\\1" alt="" width='.$GLOBALS['imgsWidth'].'></a>';

/* Old [IMG] tag code - without fixed width. */
$pattern[]="/\[img(left|right)?\](http:\/\/([^<> \n]+?)\.?(gif|jpg|jpeg|png)?)\[\/img\]/i";
$replacement[]='<img src="\\2" border="0" align="\\1" alt="">';

$pattern[]="/\[[bB]\](.+?)\[\/[bB]\]/s";
$replacement[]='<b>\\1</b>';

$pattern[]="/\[[iI]\](.+?)\[\/[iI]\]/s";
$replacement[]='<i>\\1</i>';

$pattern[]="/\[[uU]\](.+?)\[\/[uU]\]/s";
$replacement[]='<u>\\1</u>';

if($admin==1) {
$pattern[]="/\[font(#[A-F0-9]{6})\](.+?)\[\/font\]/is";
$replacement[]='<font color="\\1">\\2</font>';
}

$msg=preg_replace($pattern, $replacement, $msg);
if(substr_count($msg,'<img')>0) $msg=str_replace('align=""', '', $msg);

return $msg;
}

//--------------->
function deCodeBB($msg) {

$pattern=array(); $replacement=array();

/* New [IMGs] tag code - with fixed width */
$pattern[]="/<a href=\"(.+?)\" target=\"_blank\" rel=\"nofollow\"> <img src=\"(.+?)\" border=\"0\" (align=\"(left|right)?\")? alt=\"\" width=[0-9]+><\/a>/i";
$replacement[]="[imgs\\3]\\1[/imgs]";

/* Old [IMG] tag code - without fixed width. */
$pattern[]="/<img src=\"(.+?)\" border=\"0\" (align=\"(left|right)?\")? alt=\"\">/i";
$replacement[]="[img\\3]\\1[/img]";

$pattern[]="/<a href=\"mailto:(.+?)\">(.+?)<\/a>/i";
$replacement[]="[email=\\1]\\2[/email]";

$pattern[]="/<a href=\"(.+?)\" target=\"(_new|_blank)\"( rel=\"nofollow\")?>(.+?)<\/a>/i";
$replacement[]="[url]\\4[/url]";

$pattern[]="/<[bB]>(.+?)<\/[bB]>/s";
$replacement[]="[b]\\1[/b]";

$pattern[]="/<[iI]>(.+?)<\/[iI]>/s";
$replacement[]="[i]\\1[/i]";

$pattern[]="/<[uU]>(.+?)<\/[uU]>/s";
$replacement[]="[u]\\1[/u]";

$pattern[]="/<font color=\"(#[A-F0-9]{6})\">(.+?)<\/font>/is";
$replacement[]='[font\\1]\\2[/font]';

$msg=preg_replace($pattern, $replacement, $msg);
$msg=str_replace ('<br>', "\n", $msg);
if(substr_count($msg, '[img\\2]')>0) $msg=str_replace('[img\\2]', '[img]', $msg);

if(function_exists('smileThis') and function_exists('getSmilies')) $msg=smileThis(FALSE,TRUE,$msg);

return $msg;
}
?>