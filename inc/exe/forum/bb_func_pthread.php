<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

$allowForm=($user_id==1 or $isMod==1);
$c1=(in_array($forum,$clForums) and isset($clForumsUsers[$forum]) and !in_array($user_id,$clForumsUsers[$forum]) and !$allowForm);
$c2=(isset($allForumsReg) and $allForumsReg and $user_id==-1);
$c4=(isset($roForums) and in_array($forum, $roForums) and !$allowForm);
$c5=(isset($regUsrForums) and in_array($forum, $regUsrForums) and $user_id==0);

if ($c1 or $c2 or $c4 or $c5) {
$errorMSG=$l_forbidden; $correctErr=$backErrorLink;
$title=$title.$l_forbidden;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
}

if(!$user_usr) $user_usr=$l_anonymous;
if(!isset($TT)) $TT='';
if(trim($_POST['postText'])=='') $postText=$TT; else $postText=trim($_POST['postText']);

//Check if topic is not locked
if($topic_d=db_simpleSelect(0,$Tt,'topic_status,topic_title','forum_id','=',$forum,'','','topic_id','=',$topic)) { $lckt=$topic_d[0]; $topicTitle=$topic_d[1]; } else $lckt=1;
if((((sizeof($regUsrForums)>0 and in_array($forum,$regUsrForums)) OR (isset($allForumsReg) and $allForumsReg)) and $user_id==0) or $lckt==1 or $lckt==8) {
$errorMSG=$l_forbidden; $correctErr=$backErrorLink;
$title=$title.$l_forbidden;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
}
else {

if ($postText=='') {
//Insert user into email notifies if allowed
if (isset($emptySubscribe) and $emptySubscribe and $user_id!=0 and isset($_POST['CheckSendMail']) and emailCheckBox()!='' and substr(emailCheckBox(),0,8)!='<!--U-->') {
$ae=db_simpleSelect(0,$Ts,'count(*)','user_id','=',$user_id,'','','topic_id','=',$topic); $ae=$ae[0];
if($ae==0) { $topic_id=$topic; insertArray(array('user_id','topic_id'),$Ts); }
}
return;
}

if(!isset($_POST['disbbcode'])) $disbbcode=FALSE; else $disbbcode=TRUE;
$postText=textFilter($postText,$post_text_maxlength,$post_word_maxlength,1,$disbbcode,1,$user_id);
$poster_ip=$thisIp;

//Posting query with anti-spam protection

if($postRange==0) $antiSpam=0; else {
if($DB=='mysql') $cond="unix_timestamp(now())-unix_timestamp(post_time)";
if($user_id==0) $fields=array('poster_ip',$poster_ip); else $fields=array('poster_id',$user_id);
if($antiSpam=db_simpleSelect(0,$Tp,'count(*)',$fields[0],'=',$fields[1],'','',$cond,'<',$postRange)) $antiSpam=$antiSpam[0]; else $antiSpam=1;
}

if($user_id==1 or $antiSpam==0) {

$forum_id=$forum;
$topic_id=$topic;
$poster_id=$user_id;
$poster_name=$user_usr;
$post_text=$postText;

$BadWords = array();					
// retrieve censor words for filter
function filter_str1($text,$BadWords,$bw) {

	global $DB;
	
	$output = $text; 
		
	for($i=0; $i <= $bw; $i++){		
		
		if(isset($BadWords['word'][$i])){
			$output = str_replace($BadWords['word'][$i]," ***** ",$output);
		}		
	}
	return $output;
}
$bw = 1;
$result = mysql_query("SELECT * FROM badwords");
while ($row = mysql_fetch_assoc($result)) {
		$BadWords['word'][$bw] = $row['word'];  
		$bw ++;
}
$order   = array('\r\n', '\n', '\r');
$replace = '<br>';
$post_text = filter_str1(str_replace($order, $replace,$post_text),$BadWords,$bw);
$post_time='now()';
$post_status=0;

$inss=insertArray(array('forum_id', 'topic_id', 'poster_id', 'poster_name', 'post_text', 'post_time', 'poster_ip', 'post_status'),$Tp);

if($inss==0){
$topic_last_post_id=$insres;
$topic_last_post_time='now()';
if(updateArray(array('topic_last_post_id','topic_last_post_time'),$Tt,'topic_id',$topic)>0){
db_calcAmount($Tp,'forum_id',$forum,$Tf,'posts_count');
db_calcAmount($Tp,'topic_id',$topic,$Tt,'posts_count');
if($user_id!=0) db_calcAmount($Tp,'poster_id',$user_id,$Tu,$dbUserSheme['num_posts'][1],$dbUserId);
}

if ($genEmailDisable!=1 and ($emailusers>0 or (isset($emailadmposts) and $emailadmposts==1))) {
if($fn=db_simpleSelect(0,$Tf,'forum_name','forum_id','=',$forum)) $forum_title=$fn[0]; else $forum_title='';
$setTpls=array();
$postTextSmall=strip_tags(substr(str_replace(array('<br>','&#039;','&quot;','&amp;','&#036;'), array("\r\n","'",'"','&','$'), $postText), 0, 200)).'...';
$setTpls[$langOrig]=ParseTpl(makeUp('email_reply_notify_'.$langOrig));
$msg=$setTpls[$langOrig];
$sub=explode('SUBJECT>>', $msg); $sub=explode('<<', $sub[1]); $msg=trim($sub[1]); $sub=$sub[0];
}

//Email all users about this reply if allowed
if($genEmailDisable!=1 and $emailusers>0) {

$allUsers=array();
if($row=db_simpleSelect(0,$Ts,'user_id','topic_id','=',$topic)) do $allUsers[]=$row[0]; while($row=db_simpleSelect(1));
$xtr=getClForums($allUsers,'where','','user_id','OR','=');
$allUsers=array();
if($row=db_simpleSelect(0,$Tu,"{$dbUserId}, {$dbUserSheme['user_email'][1]}, {$dbUserSheme['language'][1]}")) do $allUsers[$row[0]]=array($row[1], $row[2]); while($row=db_simpleSelect(1));
unset($xtr);

foreach($allUsers as $k=>$v){
if($emailusers==2){
/* Send email on user's language */
$eFile='email_reply_notify_'.$v[1];
if(file_exists($pathToFiles.'templates/'.$eFile.'.txt')) {
if(!isset($setTpls[$v[1]])) $setTpls[$v[1]]=ParseTpl(makeUp($eFile));
$msg=$setTpls[$v[1]];
} else $msg=$setTpls[$langOrig];
}
sendMail($v[0], $sub, $msg, $admin_email, $admin_email);
}
unset($setTpls);

}//email users

//Email admin if allowed
if ($genEmailDisable!=1 and isset($emailadmposts) and $emailadmposts==1 and $user_id!=1) {
sendMail($admin_email, $sub, $msg, $admin_email, $admin_email);
}

//Insert user into email notifies if allowed
if (isset($_POST['CheckSendMail']) and emailCheckBox()!='' and substr(emailCheckBox(),0,8)!='<!--U-->') {
$ae=db_simpleSelect(0,$Ts,'count(*)','user_id','=',$user_id,'','','topic_id','=',$topic); $ae=$ae[0];
if($ae==0) { $topic_id=$topic; insertArray(array('user_id','topic_id'),$Ts); }
}

}//inserted post successfully

}
else {
$errorMSG=$l_antiSpam; $correctErr=$backErrorLink;
$title.=$l_antiSpam;
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
}

if(isset($themeDesc) and in_array($topic,$themeDesc)) $anchor=1;
else{
$totalPosts=db_simpleSelect(0,$Tt,'posts_count','topic_id','=',$topic);
$vmax=$viewmaxreplys;
$anchor=$totalPosts[0];
if ($anchor>$vmax) { $anchor=$totalPosts[0]-((floor($totalPosts[0]/$vmax))*$vmax); if ($anchor==0) $anchor=$vmax;}
}
}
?>