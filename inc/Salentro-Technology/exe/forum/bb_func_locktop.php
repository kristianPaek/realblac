<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

if(!isset($_GET['chstat'])) die('Fatal error.'); else $topic_status=$_GET['chstat'];
$errorMSG=$l_forbidden; $correctErr=$backErrorLink;
if($userUnlock==2 and !($user_id==1 or $isMod==1)) $topic=-1;

if($tD=db_simpleSelect(0,$Tt,'topic_status, topic_poster, sticky','topic_id','=',$topic)){
if (($tD[1]==$user_id and $tD[2]!=1 and (($topic_status==0 and $userUnlock==1) or $topic_status==1)) OR $logged_admin==1 OR $isMod==1) {
if(updateArray(array('topic_status'),$Tt,'topic_id',$topic)>0) $errorMSG=(($topic_status==1)?$l_topicLocked:$l_topicUnLocked);
else $errorMSG=$l_itseemserror;
$correctErr="<a href=\"{$main_url}/{$indexphp}action=vthread&amp;forum=$forum&amp;topic=$topic\">$l_back</a>";
}
}

$title.=$errorMSG;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
?>