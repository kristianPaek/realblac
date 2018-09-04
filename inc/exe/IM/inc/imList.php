<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Send headers to prevent IE cache
@session_start();

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/html; charset=".$_SESSION['lang_charset']."");




if(!isset($_SESSION['uid'])){ die(); }

// DEFAULT IM LOADING SETTINGS
$IMRoomArray = array(
	"width" => "415",
	"height" => "470",
	"path" => "inc/exe/IM/window.php?pId=",
);
// DATABASE AND FUNCTION SETUP
$subd = "../../../../";
require_once( $subd."inc/config_db.php" );
require_once( $subd."inc/classes/class_mysql.php" );
$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE, false, false, $_SESSION['lang_charset']); $DB->Connect();
require_once( $subd."plugins/config_plugins.php" );
require_once( $subd."inc/API/api_functions.php" );

require_once( $subd."inc/config.php" );


// MAKE GENDER ARRAY
if(!isset($_SESSION['IM_GEN_ARRAY'])){
	$gender_array1 = array();
	$gender_array1[0]['caption'] = "n/a";
	$gg = $DB->Query("SELECT fvCaption, fvid FROM `field_list_value` WHERE fvFid =28 AND lang='".D_LANG."' ");
	while( $G = $DB->NextRow($gg) )
	{
			$gender_array1[$G['fvid']]['caption'] = $G['fvCaption'];
			$gender_array1[$G['fvid']]['id'] = $G['fvid'];
		
	}
	$_SESSION['IM_GEN_ARRAY'] = $gender_array1;
}

$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));


$QueryExtra = "";
if(D_GENDERMATCHING ==1){ 
	$QueryExtra .= "AND members_data.gender !=('".$_SESSION['genderid']."')";
}



$foundIM = $DB->Row("SELECT count(members.id) AS total FROM im, members WHERE im.from_uid = members.id AND im.to_uid= ( '".$_SESSION['uid']."' ) AND im.read ='no' AND members.active ='active' AND im.date LIKE '%".$SearchDate."%' GROUP BY im.from_uid LIMIT 1");

// get chat messages
$RunImQuery = $DB->Query("SELECT members.video_live, members.msgStatus, members_data.location, members_data.age, members_data.gender, members_online.page, members.id,  members.username, files.bigimage, files.approved, files.title, files.description, files.adult_content 
FROM members
INNER JOIN members_online ON ( members_online.logid = members.id AND members_online.logid !=0 AND members_online.logid != ('".$_SESSION['uid']."' ) )
INNER JOIN members_data ON ( members_data.uid = members.id )
INNER JOIN members_privacy ON (members.id = members_privacy.uid AND members_privacy.IM ='yes' )
LEFT JOIN files ON ( files.uid = members.id AND files.default=1 AND files.approved='yes')
WHERE members.visible = 'yes' AND members.active ='active' $QueryExtra
GROUP BY members.id
ORDER BY members.lastlogin DESC LIMIT 30");

$i=1; 

while( $IMData = $DB->NextRow($RunImQuery) ){ 

?>
<div class="imspan <?php if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } ?>" id="div_<?=$value['id'] ?>" style="margin-top:10px; overflow:hidden; width:200px; ">

	<span class="fleft">

		<a href="#" onclick="openIMWin(<?=$IMData['id'] ?>, '<?=$_SESSION['uid'] ?>','<?=DB_DOMAIN ?>','<?=$IMRoomArray['path'] ?>','<?=$IMRoomArray['width'] ?>','<?=$IMRoomArray['height'] ?>');return false;">
			<img src="<?=DB_DOMAIN ?>inc/tb.php?src=<?=$IMData['bigimage'] ?>" alt="<?=$IMData['username'] ?>" width="43" height="51" class="thumb" style="cursor:pointer; border:0px; padding:2px; background:white;" />
		</a>

	</span>

	<span class="fright">

	<div class="username"><a href="#" onclick="openIMWin(<?=$IMData['id'] ?>, '<?=$_SESSION['uid'] ?>','<?=DB_DOMAIN ?>','<?=$IMRoomArray['path'] ?>','<?=$IMRoomArray['width'] ?>','<?=$IMRoomArray['height'] ?>');return false;"  style="font-size:12px;"><?=substr($IMData['username'],0,15) ?></a>

	<? if($IMData['video_live'] == "yes"){ ?>	
		<img src="inc/images/livevid.gif" align="absmiddle">
	<? } ?>

</div>

	<div class="info" style="margin-top:10px;font-size:11px;">  <?=$_SESSION['IM_GEN_ARRAY'][$IMData['gender']]['caption'] ?> / <?=MakeAge($IMData['age']) ?> </div>
 	
	<div style="font-size:10px; color:#666666; font-style:italic;"><?=$IMData['msgStatus'] ?></div>	 

	</span>

</div>

		<?
		## get to see if this user has sent any PMs 
		## hide this value is there is a PM
		## otherwise display it so it will start a PM chat
		if( $foundIM['total'] > 0 ){
		?>
		<div style="visibility:hidden">npm__3a65x__x806g</div>
		<? } ?>

<? 
	$i++; 

}

if($i ==1){
?>
<div style="margin-top:150px; margin-left:60px;">No one is online!</div>
<? } ?>
