<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

if($user_id==0) $l_sub_post_msg=$l_enterforums.'/'.$l_sub_post_msg;

$listPosts=''; $deleteTopic='';

/*** CHECK ***/
if($topicData and $topicData[4]==$forum){

if(!isset($preModerationType) or $preModerationType==0) $topicName=$topicData[0]; elseif($preModerationType>0 and isset($premodTopics) and in_array($topic, $premodTopics)) $topicName=$l_topicQueued; else $topicName=$topicData[0];

if ($topicName=='') $topicName=$l_emptyTopic;
$topicStatus=$topicData[1];
$topicSticky=$topicData[6];
$topicPoster=$topicData[2];
$topicPosterName=$topicData[3];
$topic_views=$topicData[7]+1;
$topicTime=$topicData[8];
}
else {
$errorMSG=$l_topicnotexists; $correctErr='';
$title=$title.$l_topicnotexists;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
}

if(!$row=db_simpleSelect(0,$Tf,'forum_name, forum_icon, topics_count, posts_count, forum_desc','forum_id','=',$forum)){
$errorMSG=$l_forumnotexists; $correctErr=$backErrorLink;
$title=$title.$l_forumnotexists;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
}
unset($result);unset($countRes);

$forumName=$row[0]; $forumIcon=$row[1]; $forum_desc=$row[4];

/* actual */

$numRows=$topicData[5];

$topicDesc=0;
$topic_reverse='';
if(isset($themeDesc) and in_array($topic,$themeDesc)) {
$topicDesc=1;
$topic_reverse="<img src=\"{$main_url}/img/topic_reverse.gif\" align=middle border=0 alt=\"\">&nbsp;";
}

if($page==-1 and $topicDesc==0) $page=pageChk($page,$numRows,$viewmaxreplys);
elseif($page==-1 and $topicDesc==1) $page=0;

if(isset($mod_rewrite) and $mod_rewrite) $urlp="{$main_url}/{$forum}_{$topic}_"; else $urlp="{$main_url}/{$indexphp}action=vthread&amp;forum=$forum&amp;topic=$topic&amp;page=";

$pageNav=pageNav($page,$numRows,$urlp,$viewmaxreplys,FALSE);
$makeLim=makeLim($page,$numRows,$viewmaxreplys);

$anchor=1;
$i=1;
$ii=0;
$SendIt=0;
if(isset($themeDesc) and in_array($topic,$themeDesc)) $srt='DESC'; else $srt='ASC';

/* User info in posts */
if(isset($GLOBALS['userInfoInPosts']) and is_array($GLOBALS['userInfoInPosts'])){
$userInfo=array();
if($cols=db_simpleSelect(0,$Tp,'poster_id','topic_id','=',$topic,'post_id '.$srt,$makeLim)){
do{
if(!in_array($cols[0],$userInfo)) $userInfo[]=$cols[0];
}
while($cols=db_simpleSelect(1));
}
$xtr=getClForums($userInfo,'where','',$dbUserId,'or','=');
unset($userInfo);
if($cols=db_simpleSelect(0,$Tu,$dbUserId.','.implode(',',$userInfoInPosts))){
for($i=0;$i<sizeof($userInfoInPosts);$i++) ${'userInfo_'.$userInfoInPosts[$i]}=array();
do for($i=0;$i<sizeof($userInfoInPosts);$i++) {
if(function_exists('parseUserInfo_'.$userInfoInPosts[$i])) $cols[$i+1]=call_user_func('parseUserInfo_'.$userInfoInPosts[$i],$cols[$i+1]);
${'userInfo_'.$userInfoInPosts[$i]}[$cols[0]]=$cols[$i+1];
}
while($cols=db_simpleSelect(1));
}
unset($xtr);
}
/* --User info in posts */

if($cols=db_simpleSelect(0,$Tp,'poster_id, poster_name, post_time, post_text, poster_ip, post_status, post_id, topic_id','topic_id','=',$topic,'post_id '.$srt,$makeLim)){

if($page==0 and isset($enableViews) and $enableViews) updateArray(array('topic_views'),$Tt,'topic_id',$topic);
$tpl=makeUp('main_posts_cell');
do{
if($i>0) $bg='tbCel1'; else $bg='tbCel2';



$tTitle="";

$tOwner = GetTopicOwner($cols[7]);
//die($tOwner."==".$cols[0]);
if($tOwner == $cols[0] && $SendIt==0){ // dont show the topic title for people who have made comments on this topic
$tTitle = GetTopicTitle($cols[7]);
$SendIt=1;
}

$poster_id=$cols[0];
$posterImage = GetPhoto($cols[0], 2);
$postDate=convert_date($cols[2]);





if(!($user_id==1 or $isMod==1 or $user_id==0)) $availEditMes=( (time()-strtotime($cols[2]))<$useredit OR $useredit==0 );
else $availEditMes=TRUE;

if($availEditMes) $allowedEdit="<img src='img/wrench.png' align='absmiddle'> <a href=\"{$main_url}/{$indexphp}action=editmsg&amp;topic=$topic&amp;forum=$forum&amp;post={$cols[6]}&amp;page=$page&amp;anchor=$anchor\">$l_edit</a>";
else $allowedEdit='';

if ($logged_admin==1 or $isMod==1) $viewIP=' '.$l_sepr.' IP: '.$cols[4]; else $viewIP='';

if ($logged_admin==1 or $isMod==1 or (isset($userDeleteMsgs) and $userDeleteMsgs>0 and $user_id!=0 and $user_id==$cols[0] and $availEditMes) ){

if(($ii==0 and $page==0 and $topicDesc==0) or ($topicDesc==1 and $numRows==$viewmaxreplys*$page+$i+1)){

}else{
if ( ( $_SESSION['auth'] =="yes" && $cols[0] == $_SESSION['uid'])  || (isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes" )  ) {
 $deleteM=<<<out
<a href="JavaScript:confirmDelete({$cols[6]},0)" onMouseOver="window.status='{$l_deletePost}'; return true;" onMouseOut="window.status=''; return true;">$l_deletePost</a>
out;
}
}
$allowed=$allowedEdit." ".$deleteM;


} 
else {
$cols[4]='';
if ($topicData[1]==0 and $user_id==$cols[0] and $user_id !=0 and $cols[5]!=2 and $cols[5]!=3) {
$allowed=$allowedEdit;
}
else {
$allowed='';
}
}

/*
emeeting delete topics
$logged_admin==1 or $isMod==1 or (isset($userDeleteMsgs) and $userDeleteMsgs==2 and $user_id!=0 and $user_id==$topicPoster and ($useredit==0 or time()-strtotime($topicTime)<$useredit) )
*/
if ( ( $_SESSION['auth'] =="yes" && $cols[0] == $_SESSION['uid'])  || (isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes" )  ) {
$deleteM = " <img src='img/cancel.png' align='absmiddle'> <a href=\"JavaScript:confirmDelete({$cols[6]},0)\" onMouseOver=\"window.status='{$l_deletePost}'; return true;\" onMouseOut=\"window.status=''; return true;\">$l_deletePost</a> ";
$allowed .= $deleteM;
}



# post_status: 0-clear (available for edit), 1-edited by author, 2-edited by admin (available only for admin), 3 - edited by mod
if ($cols[5]==0) {
$editedBy='';
}
else {
$editedBy=" $l_sepr $l_editedBy";
if($cols[5]==2) $we="<a href=\"{$main_url}/{$indexphp}action=userinfo&amp;user=1\">{$l_admin}</a>";
elseif($cols[5]==1) $we=$cols[1];
elseif($cols[5]==3) $we="<a href=\"{$main_url}/{$indexphp}action=stats#mods\">{$l_moderator}</a>";
else $we='N/A';
$editedBy.=$we;
}

if ($cols[0]!=0) {
$cc=$cols[0];
if (isset($userRanks[$cc])) $ins=$userRanks[$cc];
elseif (isset($mods[$forum]) and is_array($mods[$forum]) and in_array($cc,$mods[$forum])) $ins=$l_moderator;
else { $ins=($cc==1?$l_admin:$l_member); }
if(!defined('NOFOLLOW')) $nof=' rel="nofollow"'; else $nof='';
$viewReg="<a href=\"{$main_url}/{$indexphp}action=userinfo&amp;user={$cc}\"{$nof}>$ins</a>";
}
else $viewReg='';

$posterName=$cols[1];

if(!isset($preModerationType) or $preModerationType==0) $posterText=nl2br($cols[3]); elseif($preModerationType>0 and isset($premodPosts) and in_array($cols[6], $premodPosts)) $posterText=$l_postQueued; else $posterText=$cols[3];

$listPosts.=ParseTpl($tpl);

if(function_exists('parseMessage')) $listPosts.=parseMessage();

$i=-$i;
if($ii==0) {
$ii++;
$description=substr(strip_tags(str_replace(array("\r\n","\r","\n",'"'),' ',$cols[3])),0,1000);
}
$anchor++;
}
while($cols=db_simpleSelect(1));
unset($result);unset($countRes);

$l_messageABC=$l_sub_answer;
if ($topicStatus!=1) {
$emailCheckBox=emailCheckBox();

$allowForm=($user_id==1 or $isMod==1);
$c1=(in_array($forum,$clForums) and isset($clForumsUsers[$forum]) and !in_array($user_id,$clForumsUsers[$forum]) and !$allowForm);
$c4=(isset($roForums) and in_array($forum, $roForums) and !($user_id==1 or $isMod==1));


// EMEETING INTEGRATION 
if ($_SESSION['auth'] =="no"){
$mainPostForm='';$mainPostArea='';
$nTop=0;
$listPosts=str_replace('getQuotation();','',$listPosts);
}else{
$mainPostForm=ParseTpl(makeUp('main_post_form'));
$mainPostArea=makeUp('main_post_area');
$nTop=1;
}
}
else {
$mainPostArea=makeUp('main_post_closed');
$listPosts=str_replace('getQuotation();','',$listPosts);
}
$mainPostArea=ParseTpl($mainPostArea);


/*
emeeting delete topics
$logged_admin==1 or $isMod==1 or (isset($userDeleteMsgs) and $userDeleteMsgs==2 and $user_id!=0 and $user_id==$topicPoster and ($useredit==0 or time()-strtotime($topicTime)<$useredit) )
*/
if ( ( $_SESSION['auth'] =="yes" && $topicPoster == $_SESSION['uid'])  || (isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes" ) ) {
$deleteTopic="$l_sepr <a href=\"JavaScript:confirmDelete({$topic},1)\" onMouseOver=\"window.status='{$l_deleteTopic}'; return true;\" onMouseOut=\"window.status=''; return true;\">$l_deleteTopic </a>";
}

if ($logged_admin==1 or $isMod==1) {

$moveTopic="$l_sepr <a href=\"{$main_url}/{$indexphp}action=movetopic&amp;forum=$forum&amp;topic=$topic&amp;page=$page\">$l_moveTopic</a>";

if ($topicStatus==0) { $chstat=1; $cT=$l_closeTopic; }
else { $chstat=0; $cT=$l_unlockTopic; }
$closeTopic="<a href=\"{$main_url}/{$indexphp}action=locktopic&amp;forum=$forum&amp;topic=$topic&amp;chstat=$chstat\">$cT</a>";

if ($topicSticky==0) { $chstat=1; $cT=$l_makeSticky; }
else { $chstat=0; $cT=$l_makeUnsticky; }
$stickyTopic="$l_sepr <a href=\"{$main_url}/{$indexphp}action=unsticky&amp;forum=$forum&amp;topic=$topic&amp;chstat=$chstat\">$cT</a>";

$extra=1;
if ($logged_admin==1 and $cnt=db_simpleSelect(0,$Ts,'count(*)','topic_id','=',$topic) and $cnt[0]>0) $subsTopic="$l_sepr <a href=\"{$bb_admin}action=viewsubs&amp;topic=$topic\">$l_subscriptions</a>"; else $subsTopic='';
}

elseif (($user_id==$topicPoster and $user_id!=0 and $user_id!=1) and $topicSticky!=1) {
if ($topicStatus==0 and $userUnlock!=2) $closeTopic="<a href=\"{$main_url}/{$indexphp}action=locktopic&amp;forum=$forum&amp;topic=$topic&amp;chstat=1\">$l_closeTopic</a>";
elseif($topicStatus==1 and $userUnlock==1 and $userUnlock!=2) $closeTopic="<a href=\"{$main_url}/{$indexphp}action=locktopic&amp;forum=$forum&amp;topic=$topic&amp;chstat=0\">$l_unlockTopic</a>";
else $closeTopic='';
}

$title=strip_tags($topicName).' - '.str_replace(' - ','',$title);

}//if posts

$st=0; $frm=$forum;
include ($pathToFiles.'bb_func_forums.php');

if(isset($mod_rewrite) and $mod_rewrite) $linkToForums="{$main_url}/{$forum}_0.html"; else $linkToForums="{$main_url}/{$indexphp}action=vtopic&amp;forum={$forum}";

echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_posts'));
?>