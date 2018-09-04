<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

if(!isset($_GET['chstat'])) die('Fatal error.'); else $sticky=$_GET['chstat'];

if ($logged_admin==1 or $isMod==1) {

if(updateArray(array('sticky'),$Tt,'topic_id',$topic)>0) $errorMSG=(($sticky==1)?$l_topicSticked:$l_topicUnsticked);
else $errorMSG=$l_itseemserror;
$correctErr="<a href=\"{$main_url}/{$indexphp}action=vthread&amp;forum=$forum&amp;topic=$topic\">$l_back</a>";
}
else {
$errorMSG=$l_forbidden; $correctErr=$backErrorLink;
}

$title.=$errorMSG;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
?>