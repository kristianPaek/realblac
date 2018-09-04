<?php

$forumsList='';
$keyAr=0;

if($viewTopicsIfOnlyOneForum!=1 and $row=db_simpleSelect(0,$Tf,'forum_id, forum_name, forum_group','','','','forum_order')){
$i=0;
$listForums='';
$tpl=makeUp('main_forums_list');
do {

if($user_id!=1 and isset($clForums) and in_array($row[0],$clForums) and isset($clForumsUsers[$row[0]]) and !in_array($user_id,$clForumsUsers[$row[0]])) $show=FALSE; else $show=TRUE;

if($show){

$sel='';

if ($row[2]!=''){
$listForums.="<option value={$row[0]}>{$row[2]}</option>";
$keyAr++;
}
if ($keyAr>0) $sp='&nbsp;&nbsp;&nbsp;'; else $sp='';

if (isset($st)&&$st==1) {
if($row[0]!=$frm) $listForums.="<option value={$row[0]}>{$sp}{$row[1]}</option>\n";
}
else {
if ($row[0]==$frm) $sel=' selected';
$listForums.="<option value={$row[0]}{$sel}>{$sp}{$row[1]}</option>\n";
}

$i++;
}

}
while($row=db_simpleSelect(1));
unset($result);unset($countRes);

if ($i>1) $forumsList=ParseTpl($tpl);
}
?>