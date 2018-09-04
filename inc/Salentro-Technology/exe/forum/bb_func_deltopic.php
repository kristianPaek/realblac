<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

$canDelete=TRUE;
if($res=db_simpleSelect(0,$Tt,'topic_poster,topic_time','topic_id','=',$topic)) {
$poster_id=$res[0];
$time_diff=strtotime('now')-strtotime($res[1]);
if($useredit!=0 and $time_diff>$useredit) $canDelete=FALSE;
} else {
$poster_id=-1;
$canDelete=FALSE;
}

if($_SESSION['auth'] =='yes') {

if($res=db_simpleSelect(0,$Tt,'topic_id','topic_id','>',$topic,'','','forum_id','=',$forum)) $h=$res[0]; else $h=0;

if($h==0) $return=0; else{
$numRows=$countRes;
$rP=$numRows/$viewmaxtopic;
$rPInt=floor($numRows/$viewmaxtopic);
$return=$rPInt;
if($rP==$rPInt) $return-=1;
}

$pUsers=array();
if($row=db_simpleSelect(0,$Tp,'poster_id','topic_id','=',$topic,'post_id ASC')){
do if(!in_array($row[0], $pUsers) and $row[0]!=0) $pUsers[]=$row[0];
while($row=db_simpleSelect(1));
}

if(file_exists($pathToFiles.'bb_plugins2.php')) require_once($pathToFiles.'bb_plugins2.php');

db_delete($Ts,'topic_id','=',$topic);
$topicsDel=db_delete($Tt,'topic_id','=',$topic,'forum_id','=',$forum);
$postsDel=db_delete($Tp,'topic_id','=',$topic,'forum_id','=',$forum);
$postsDel--;
db_calcAmount($Tp,'forum_id',$forum,$Tf,'posts_count');
db_calcAmount($Tt,'forum_id',$forum,$Tf,'topics_count');

$i=0;
foreach($pUsers as $val){
if($i==0) db_calcAmount($Tt,'topic_poster',$val,$Tu,$dbUserSheme['num_topics'][1],$dbUserId);
db_calcAmount($Tp,'poster_id',$val,$Tu,$dbUserSheme['num_posts'][1],$dbUserId);
$i++;
}

if (defined('DELETE_PREMOD')) return;

if(isset($metaLocation)) { $meta_relocate="{$main_url}/{$indexphp}action=vtopic&forum={$forum}&page={$return}&h={$h}"; echo ParseTpl(makeUp($metaLocation)); exit; } else { header("Location: {$main_url}/{$indexphp}action=vtopic&forum={$forum}&page={$return}&h={$h}"); exit; }

}
else {
$errorMSG=$l_forbidden; $correctErr='';
echo load_header($layout[1]["contents"]); echo ParseTpl(makeUp('main_warning')); return;
}
?>