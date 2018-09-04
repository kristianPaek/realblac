<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

$list_topics='';
$pageNav='';
$forumsList='';

if ($forum==0 or !($rowf=db_simpleSelect(0,$Tf,'forum_name, forum_id, forum_icon, topics_count, forum_desc','forum_id','=',$forum))) {
$errorMSG=$l_forumnotexists; $correctErr=$backErrorLink;
$title=$title.$l_forumnotexists;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
}

$forumName=$rowf[0]; $forumIcon=$rowf[2]; $forum_desc=$rowf[4];
$description=substr($forum_desc,0,1000);

if($user_sort=='') $user_sort=$sortingTopics; /* Sort messages default by last answer (0) desc OR 1 - by last new topics */

$warn='';
if(!isset($_GET['showSep'])){

$numRows=$rowf[3];

if($numRows==0){
$errorMSG=$l_noTopicsInForum; $correctErr='';
$title=$title.$l_noTopicsInForum;
$warn=ParseTpl(makeUp('main_warning'));
}

else {

//if at least one topic exists in this forum

if(isset($mod_rewrite) and $mod_rewrite) $urlp="{$main_url}/{$forum}_"; else $urlp="{$main_url}/{$indexphp}action=vtopic&amp;forum=$forum&amp;sortBy={$user_sort}&amp;page=";

$pageNav=pageNav($page,$numRows,$urlp,$viewmaxtopic,FALSE);
$makeLim=makeLim($page,$numRows,$viewmaxtopic);

if ($user_sort==1) $orderBy='sticky DESC,topic_id DESC'; else {
$orderBy='sticky DESC,topic_last_post_id DESC';
}
$lPosts=array();
if($cols=db_simpleSelect(0,$Tt,'topic_last_post_id','forum_id','=',$forum,$orderBy,$makeLim)) {
do $lPosts[]=$cols[0]; while($cols=db_simpleSelect(1));
}
if(sizeof($lPosts)>0) $xtr=getClForums($lPosts,'where','','post_id','or','='); else $xtr='';

if(isset($textLd)) $textLdSql=', post_text'; else $textLdSql=', topic_id';

if($row=db_simpleSelect(0, $Tp, 'poster_id, poster_name, post_time, topic_id'.$textLdSql)) do $pVals[$row[3]]=array($row[0],$row[1],$row[2],$row[4]); while($row=db_simpleSelect(1));
unset($xtr);

if($cols=db_simpleSelect(0,$Tt,'topic_id, topic_title, topic_poster, topic_poster_name, topic_time, topic_status, posts_count, sticky, topic_views','forum_id','=',$forum,$orderBy,$makeLim)) {

$i=1;
$tpl=makeUp('main_topics_cell');

do{
if($i>0) $bg='tbCel1';else $bg='tbCel2';
$topic=$cols[0];

$topic_reverse='';
$topic_views=$cols[8];
if(isset($themeDesc) and in_array($topic,$themeDesc)) $topic_reverse="<img src=\"{$main_url}/img/topic_reverse.gif\" align=middle border=0 alt=\"\">&nbsp;";

if(!isset($preModerationType) or $preModerationType==0) $topicTitle=$cols[1]; elseif($preModerationType>0 and isset($premodTopics) and in_array($cols[0], $premodTopics)) $topicTitle=$l_topicQueued; else $topicTitle=$cols[1];







if(trim($topicTitle)=='') $topicTitle=$l_emptyTopic;
if(isset($_GET['h']) and $_GET['h']==$topic) $topicTitle='&raquo; '.$topicTitle;

$numReplies=$cols[6]; if($numReplies>=1) $numReplies-=1;
if ($cols[3]=='') $cols[3]=$l_anonymous; $topicAuthor=$cols[3];
$whenPosted=convert_date($cols[4]);

if(isset($pVals[$topic][0])) $lastPosterID=$pVals[$topic][0]; else $lastPosterID='N/A';
if(isset($pVals[$topic][1])) $lastPoster=$pVals[$topic][1]; else $lastPoster='N/A';
if(isset($pVals[$topic][2])) $lastPostDate=showTimeSince($pVals[$topic][2]); else $lastPostDate='N/A';

if(isset($textLd) and isset($pVals[$topic][3])){
$lptxt=($textLd==1?$pVals[$topic][3]:strip_tags($pVals[$topic][3]));
if(!isset($preModerationType) or $preModerationType==0) $lastPostText=$lptxt;
elseif($preModerationType>0 and isset($premodTopics) and in_array($cols[0], $premodTopics)) $lastPostText=($textLd==1?$l_postQueued:strip_tags($l_postQueued));
else $lastPostText=$lptxt;
}

if(isset($mod_rewrite) and $mod_rewrite) $urlp="{$main_url}/{$forum}_{$topic}_"; else $urlp="{$main_url}/{$indexphp}action=vthread&amp;forum=$forum&amp;topic=$topic&amp;page=";

$pageNavCell=pageNav(0,$numReplies+1,$urlp,$viewmaxreplys,TRUE);

if ($cols[7]==1 and $cols[5]==1) $tpcIcon='stlock';
elseif ($cols[7]==1) $tpcIcon='sticky';
elseif ($cols[5]==1) $tpcIcon='locked';
elseif ($numReplies<=0) $tpcIcon='empty';
elseif ($numReplies>=$viewmaxreplys) $tpcIcon='hot';
else $tpcIcon='default';
//die(print_r($cols));
//$topicTitle = substr($topicTitle,0,100);

$TopicText = substr(GetTopicData($cols[0]),0,100)."...";

//$TopicText = @stripslashes(mb_convert_encoding(strip_tags($TopicText,'<p><b><strong>'),"HTML-ENTITIES","auto"));

$poster_id=$cols[2];
$posterImage = GetPhoto($cols[2], 2);

if(isset($mod_rewrite) and $mod_rewrite) $linkToTopic="{$main_url}/{$forum}_{$topic}_0.html"; else $linkToTopic="{$main_url}/{$indexphp}action=vthread&amp;forum={$forum}&amp;topic={$topic}";

/*
emeeting delete topics
$logged_admin==1 or $isMod==1 or (isset($userDeleteMsgs) and $userDeleteMsgs==2 and $user_id!=0 and $user_id==$topicPoster and ($useredit==0 or time()-strtotime($topicTime)<$useredit) )
*/
if ( ( $_SESSION['auth'] =="yes" && $_SESSION['username'] == $cols[3]) || (isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes" ) ) {
$deleteThisTopic = " <img src='img/cancel.png' align='absmiddle'> <a href=\"JavaScript:confirmDelete({$topic},1)\" onMouseOver=\"window.status='{$l_deleteTopic}'; return true;\" onMouseOut=\"window.status=''; return true;\">$l_deleteTopic</a>";
}else{
$deleteThisTopic ="";
}

$list_topics.=ParseTpl($tpl);
$i=-$i;
}
while($cols=$cols=db_simpleSelect(1));
}
//if topics are in this forum
}//request ok

$newTopicLink='<a href="'.$main_url.'/'.$indexphp.'action=vtopic&forum='.$forum.'&amp;showSep=1">'.$l_new_topic.'</a>';
}//if not showsep

$st=1; $frm=$forum;
include ($pathToFiles.'bb_func_forums.php');

$l_messageABC=$l_message;

$emailCheckBox=emailCheckBox();

$mainPostForm=ParseTpl(makeUp('main_post_form'));

$title=$forumName.' - '.str_replace(' - ','',$title);

// EMEETING INTEGRATION
if($_SESSION['uid'] > 0 && $_SESSION['auth'] =="yes"){
$myId = "<a href='javascript:void(0)' onClick=\"toggleLayer('MakePost');\" class='MainBtn'><img src='img/new.png' border=0></a>";
}else{
$myId = "";
}



if(!isset($_GET['showSep'])) $main=makeUp('main_topics');
else $main=makeUp('main_newtopicform');

$nTop=1;
$allowForm=($user_id==1 or $isMod==1);
$c1=(in_array($forum,$clForums) and isset($clForumsUsers[$forum]) and !in_array($user_id,$clForumsUsers[$forum]) and !$allowForm);
$c3=(isset($poForums) and in_array($forum, $poForums) and !$allowForm);
$c4=(isset($roForums) and in_array($forum, $roForums) and !$allowForm);

if ($c1 or $c3 or $c4) {
$main=preg_replace("/(<form.*<\/form>)/Uis", '', $main);
$nTop=0;
$newTopicLink='';
}

if($user_id==0) $l_sub_post_tpc=$l_enterforums.'/'.$l_sub_post_tpc;
echo load_header($layout[1]["contents"]); echo $warn; echo ParseTpl($main);
?>