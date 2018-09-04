<? if (!isset($loginSet) && ( !isset($_SESSION['admin_auth'])  || $_SESSION['admin_auth'] != "yes" ) )  {	die( 'Restricted access' ); } 


include("functions.php");
?>

<script src="../plugins/plugins/plugin_admin_approve/ApproveList.js" type="text/javascript"></script>
<?

if(isset($_GET['sort'])){
	if($_GET['sort']==1){
	$SortThis=" AND members_edit_temp.created = members_edit_temp.updated";
	}else{
		$SortThis=" AND members_edit_temp.created != members_edit_temp.updated";
	}
}else{
$SortThis="";
}

$SQL ="SELECT count(members_edit_temp.id) AS total FROM members_edit_temp 
INNER JOIN members_data_edit_temp ON ( members_edit_temp.id = members_data_edit_temp.uid) 
LEFT JOIN files ON (files.uid = members_edit_temp.id ) 
WHERE members_edit_temp.active='unapproved' ".$SortThis." GROUP BY members_edit_temp.id ORDER BY members_edit_temp.id";
//$tt = $DB->Row($SQL);
?>

<p style="padding:5px; background:#cccccc; text-align:left; font-weight:bold;">CURRENT MEMBER PROFILES THAT HAVE BEEN UPDATED TO APPROVE</p>

<div id="ApproveListDisplay"></div>

<div style="display:none;" id="EmailThis">
<table width="100%"  border="0" style="background:red; padding:4px;"><tr><td style="color:white;">
<form action="" name="SearchForm" method="post" onSubmit="SendNotify(SearchForm.welcome_email.value, SearchForm.MID.value); return false;">
Give a reason? 
<input name="MID" value="" id="MID" type="hidden">
<select class="input" name="welcome_email"><option value="0">No Reason</option> <?=DisplayNS() ?></select> 
<input name="Go" type="submit"> 
</form>
</td></tr></table>
</div>
<br>
<?
$counter=1;
$SQL ="SELECT members_edit_temp.*, members_data_edit_temp.*, members_data_edit_temp.description AS tt, files.bigimage FROM members_edit_temp 
INNER JOIN members_data_edit_temp ON ( members_edit_temp.id = members_data_edit_temp.uid) 
LEFT JOIN files ON (files.uid = members_edit_temp.id ) 
WHERE members_edit_temp.active='unapproved' ".$SortThis." GROUP BY members_edit_temp.id ORDER BY members_edit_temp.id";
$result = $DB->Query($SQL);
while( $Data = $DB->NextRow($result) ){

$image = ReturnDeImage($Data,"medium");

?>


<table width="620"  border="0" style="font-size:12px; border:1px dashed #cccccc; padding:4px;" id="table_<?=$counter ?>" bgcolor="<? if($counter %2){ print "#ffffff"; }else{  print "#eeeeee"; } ?>">
  <tr>
    <td width="16%" height="98" rowspan="3" align="left"><img src="<?=$image ?>" width="96" height="96"><br>
    <br>[ <a href="members.php?p=files&u=<?=$Data['username'] ?>" target="_blank">View Files</a> ] 
    </td>
    <td width="42%"><b style="font-size:15px;"><?=$Data['username'] ?></b> / <?=$_SESSION['g_array'][$value['gender']]['icon'] ?> <?=$_SESSION['g_array'][$Data['gender']]['caption'] ?> / <?=MakeAge($Data['age']) ?> / <?=MakeCountry($Data['country']) ?> </td>
    <td width="42%" align="right">[<img src="../plugins/plugins/plugin_admin_approve/yes.png" width="16" height="16" align="absmiddle"> <a href="#" onClick="AcceptMember('table_<?=$counter ?>',<?=$Data['uid'] ?>);">accept</a> ] [ <img src="../plugins/plugins/plugin_admin_approve/no.png" width="16" height="16" align="absmiddle"> <a href="#" onClick="DeclineMember('table_<?=$counter ?>',<?=$Data['uid'] ?>)">decline</a> ] [<img src="../plugins/plugins/plugin_admin_approve/edit.gif" width="16" height="16" align="absmiddle"><a href="members.php?p=edit&id=<?=$Data['uid'] ?>" target="_blank">edit</a>]</td>
  </tr>
  <tr>
    <td height="55" colspan="2" valign="top">
<form action="" method="post">
<p><b>Headline:</b><br> <input type="text" name="" value="<?=strip_tags($Data['headline']) ?>" style="font-size:13px; width:450px;" onChange="updatethis(2,this.value,<?=$Data['uid'] ?>);"></p>

<p><b>Description:</b> <br><textarea style="font-size:13px; width:450px;" onChange="updatethis(1,this.value,<?=$Data['uid'] ?>);"><?=strip_tags($Data['tt']) ?></textarea></p>

</form> 
</td>
  </tr>
  <tr>
    <td height="26" colspan="2" valign="top" style="font-size:11px;">[<?=$Data['ip'] ?>] [<img src="../plugins/plugins/plugin_admin_approve/email.gif" width="16" height="16" align="absmiddle"> <a href="email.php?p=send&e=<?=$Data['email'] ?>"><?=$Data['email'] ?></a>] <? if( $Data['created'] == $Data['updated'] ){ ?> <img src="../plugins/plugins/plugin_admin_approve/flag_green.png" width="16" height="16" align="absmiddle"> (New Signup!) <? }else{ ?> <img src="../plugins/plugins/plugin_admin_approve/flag_blue.png" width="16" height="16" align="absmiddle"> (Profile Update)  <? } ?>
[ <a href="#" onClick="updatethis(4,'yes',<?=$Data['uid'] ?>);">Make Featured</a> ]
</td>
  </tr>
</table><br>

<? $counter++; } ?>