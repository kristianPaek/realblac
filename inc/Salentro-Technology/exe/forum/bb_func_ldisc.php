<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

if (!isset($user_sort) or $user_sort=='') $user_sort=$sortingTopics; // Sort messages default by last answer (0) desc OR 1 - by last new topics

if(isset($lastOut) and is_array($lastOut)){
foreach($lastOut as $l){
if(!in_array($l,$clForums)) $clForums[]=$l;
if(!isset($clForumsUsers[$l])) $clForumsUsers[$l]=array();
}
}

if (isset($clForumsUsers)) $closedForums=getAccess($clForums, $clForumsUsers, $user_id); else $closedForums='n';
if ($closedForums!='n') $xtr=getClForums($closedForums,'where','','forum_id','and','!='); else $xtr='';

$lPosts=array();
if ($user_sort==1) $orderBy='topic_id DESC'; else $orderBy='topic_last_post_id DESC';

if($cols=db_simpleSelect(0, $Tt, 'topic_id, topic_title, topic_poster, topic_poster_name, topic_time, forum_id, posts_count, topic_last_post_id','','','',$orderBy,$viewlastdiscussions)){
do $lPosts[]=$cols[7]; while($cols=db_simpleSelect(1));
}

$xtr1=$xtr;
if(sizeof($lPosts)>0) $xtr=getClForums($lPosts,'where','','post_id','or','='); else $xtr='';

if(isset($textLd)) $textLdSql=', post_text'; else $textLdSql='';

if($row=db_simpleSelect(0, $Tp, 'poster_id, poster_name, post_time, topic_id'.$textLdSql)) do {
$pVals[$row[3]]=array($row[0],$row[1],$row[2]);
if(isset($textLd)) $pVals[$row[3]][]=$row[4];
}
while($row=db_simpleSelect(1));

$xtr=$xtr1;

$list_topics='';

if($cols=db_simpleSelect(0, $Tt, 'topic_id, topic_title, topic_poster, topic_poster_name, topic_time, forum_id, posts_count, topic_last_post_id, topic_views','','','',$orderBy,$viewlastdiscussions)){

$i=1;
$tpl=makeUp('main_last_discuss_cell');

do{
$topic=$cols[0];
$topic_views=$cols[8];
$topic_reverse='';
if(isset($themeDesc) and in_array($topic,$themeDesc)) $topic_reverse="<img src=\"{$main_url}/img/topic_reverse.gif\" align=middle border=0 alt=\"\">&nbsp;";

if(!isset($preModerationType) or $preModerationType==0) $topic_title=$cols[1]; elseif($preModerationType>0 and isset($premodTopics) and in_array($cols[0], $premodTopics)) $topic_title=$l_topicQueued; else $topic_title=$cols[1];
if($topic_title=='') $topic_title=$l_emptyTopic;

if(isset($pVals[$topic][0])) $lastPosterID=$pVals[$topic][0]; else $lastPosterID='N/A';
if(isset($pVals[$topic][1])) $lastPoster=$pVals[$topic][1]; else $lastPoster='N/A';
if(isset($pVals[$topic][2])) $lastPostDate=convert_date($pVals[$topic][2]); else $lastPostDate='N/A';

if(isset($textLd) and isset($pVals[$topic][3])) {
$lptxt=($textLd==1?$pVals[$topic][3]:strip_tags($pVals[$topic][3]));
if(!isset($preModerationType) or $preModerationType==0) $lastPostText=$lptxt;
elseif($preModerationType>0 and isset($premodTopics) and in_array($cols[0], $premodTopics)) $lastPostText=($textLd==1?$l_postQueued:strip_tags($l_postQueued));
else $lastPostText=$lptxt;
}
else $lastPostText='N/A';

if($cols[3]=='') $cols[3]=$l_anonymous;
$topicAuthor=$cols[3];

$forum=$cols[5];
$numReplies=$cols[6]; if($numReplies>=1) $numReplies-=1;

if($i>0) $bg='tbCel1'; else $bg='tbCel2';

if(isset($mod_rewrite) and $mod_rewrite) $urlp="{$main_url}/{$forum}_{$topic}_"; else $urlp="{$main_url}/{$indexphp}action=vthread&amp;forum=$forum&amp;topic=$topic&amp;page=";
$pageNavCell=pageNav(0,$numReplies+1,$urlp,$viewmaxreplys,TRUE);

$whenPosted=convert_date($cols[4]);
if(trim($cols[1])=='') $cols[1]=$l_emptyTopic;

//Forum icon
if(isset($fIcon[$forum])) $forumIcon=$fIcon[$forum]; else $forumIcon='default.gif';

if(isset($mod_rewrite) and $mod_rewrite) $linkToTopic="{$main_url}/{$forum}_{$topic}_0.html"; else $linkToTopic="{$main_url}/{$indexphp}action=vthread&amp;forum={$forum}&amp;topic={$topic}";

$list_topics.=ParseTpl($tpl);

$i=-$i;
}
while($cols=db_simpleSelect(1));
unset($result);
}
?>