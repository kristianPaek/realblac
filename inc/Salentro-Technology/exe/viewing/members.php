<?
include_once("../../../inc/config.php");
include_once("../../../inc/func/globals.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$HEADER_META_CHARSET ?>">
</head>
<style>
body {
   font: normal 12px Arial, Verdana, Helvetica, sans-serif; 
   font-size:12px;
   }
</style>
<p style="text-decoration:none; color:#666; font-weight:bold; color:red; font-weight:bold;"><?=$lang_viewing[0] ?></p>
<?

$queryThis = "SELECT 
	members_privacy.IM, 
	members.id AS userid,
	members.updated,
	members.created,
	members.hits, 
	members.lastlogin, 
	members_data.location, 
	members_data.country, 
	members_data.gender, 
	members_data.age, 
	members.username, 
	members.templateid,
	package.icon,
	files.bigimage,
	files.type,
	files.approved,
	files.aid,
	album.cat,
	album.allow_a,
	album.allow_n,
	album.allow_h,
	album.allow_f,
	members_triger.id AS triger_id
	FROM members	
	INNER JOIN members_data ON ( members.id = members_data.uid ) 
	INNER JOIN members_triger ON ( members.id = members_triger.from_uid )
	LEFT JOIN files ON ( files.uid = members_data.uid ) 
	LEFT JOIN album ON ( album.aid = files.aid )
	LEFT JOIN members_privacy ON ( members_privacy.uid = members_data.uid )
	LEFT JOIN package ON ( package.pid = members.packageid )
	WHERE members_triger.uid = ( '".$_SESSION['uid']."' ) GROUP BY members_triger.from_uid DESC LIMIT 1";
	
$result2 = $DB->Query($queryThis);
while( $member = $DB->NextRow($result2) )  
{ 
if($member['bigimage'] ==""){ $ThisUserImg = DEFAULT_IMAGE; }else{ $ThisUserImg =WEB_PATH_IMAGE_THUMBS.$member['bigimage']; }
$DB->Row("UPDATE members_triger SET opened='yes' WHERE id='".$member['triger_id']."' LIMIT 1");
?>
<table width="100%" height="77" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="134" height="77"><a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$member['userid'] ?>" target="_blank"><img src="<?=$ThisUserImg; ?>" width="65" height="64" border="0"></a></td>
    <td width="1115"><strong><?=$lang_profile_page['a9'] ?>: </strong> <?=$member['username'] ?> <br>	
	<strong><?=$lang_profile_page['a10'] ?>:</strong>	<?=MakeAge($member['age']) ?> <?=$lang_profile_page['a13'] ?> , <?=MakeGender($member['gender']) ?> <br>
      	
	<strong>
      <?=$lang_profile_page['a11'] ?>
      :</strong>	
      <?=$member['location'] ?>
      , 
      <?=$member['country'] ?>
    </td>
  </tr>
</table>
<hr noshade>
<? } ?>
</body>
</html>