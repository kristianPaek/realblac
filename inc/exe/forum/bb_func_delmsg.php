<?php
if (!defined('INCLUDED776')) die ('Fatal error.');
$canDelete=TRUE;

if(isset($_POST['post'])) $post=$_POST['post']; elseif(isset($_GET['post'])) $post=$_GET['post']; else $post=0;

$first=db_simpleSelect(0,$Tp,'post_id','topic_id','=',$topic,'post_id ASC',1); $first=$first[0];

//$canDelete=TRUE;
if($rw=db_simpleSelect(0,$Tp,'poster_id,post_time','post_id','=',$post)) {
$poster_id=$rw[0];
$time_diff=strtotime('now')-strtotime($rw[1]);
if($useredit!=0 and $time_diff>$useredit) $canDelete=FALSE;
} else {
$poster_id=-1;
//$canDelete=FALSE;
}

if($_SESSION['auth'] =='yes') {

if(db_delete($Tp,'post_id','=',$post) and $pp=db_simpleSelect(0,$Tp,'post_id, post_time','topic_id','=',$topic,'post_id DESC',1)){
$topic_last_post_id=$pp[0];
$topic_last_post_time=$pp[1];
updateArray(array('topic_last_post_id', 'topic_last_post_time'),$Tt,'topic_id',$topic);
db_calcAmount($Tp,'forum_id',$forum,$Tf,'posts_count');
db_calcAmount($Tp,'topic_id',$topic,$Tt,'posts_count');
if($poster_id!=0) db_calcAmount($Tp,'poster_id',$poster_id,$Tu,$dbUserSheme['num_posts'][1],$dbUserId);

if(file_exists($pathToFiles.'bb_plugins2.php')) require_once($pathToFiles.'bb_plugins2.php');

if (defined('DELETE_PREMOD')) return;

if(isset($metaLocation)) { $meta_relocate="{$main_url}/{$indexphp}action=vthread&forum={$forum}&topic={$topic}&page={$page}"; echo ParseTpl(makeUp($metaLocation)); exit; } else { header("Location: {$main_url}/{$indexphp}action=vthread&forum={$forum}&topic={$topic}&page={$page}"); exit; }

}
else {
$errorMSG=$l_itseemserror; $correctErr=$backErrorLink;
}

}
else {
$errorMSG=$l_forbidden; $correctErr=$backErrorLink;
}

$title.=$errorMSG;
echo load_header($tdata[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
?>