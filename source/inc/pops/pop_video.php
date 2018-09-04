<?php 
require_once "../config.php";
require_once "../../../inc/config.php";
require_once "../langs/".A_LANG.".php";
require_once "../func/admin_globals.php";

$supportedTypes = array('wmv','wma');
// FIND THE FILE TYPE

//return ;
if(isset($_GET['t'])){

	$file_part = explode("?v=",$_GET['file']); $file_part = explode("&",$file_part[1]);
	if($file_part[0] ==""){
		$UImage = DEFAULT_VIDEO;
	}else{
		$UImage = "http://img.youtube.com/vi/".$file_part[0]."/2.jpg";
		$youtubevideo = "http://www.youtube.com/v/".$file_part[0]."";
	}

}
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><meta http-equiv="Content-Type" content="text/html; charset=<?=$admin_layout_header['charset'] ?>"></head>

<div id="definition">
<style>
.box_title { background-color:#eeeeee; padding:8px; color:#666666; font-size:90%;}
.box_body { border:2px solid #eeeeee; padding:8px; font-size:75%;}
h3 { color:#666;}
</style>
<div>

<script type='text/javascript' src="../js/silverlight.js"></script>
<script type='text/javascript' src="../js/wmvplayer.js"></script>

<?php if(isset($_GET['t'])){ ?>

	<?php if($file_part[0] ==""){ ?>


<embed src="../js/mediaplayer.swf" width="420" height="320" 
allowscriptaccess="always" 
allowfullscreen="true" 
flashvars="width=420&height=320&file=<?=$_GET['file'] ?>&image=<?=$UImage ?>" />

	<?php 
		}
		else { ?>

<object width="425" height="344"><param name="movie" value="<?=$youtubevideo ?>"></param><param name="allowFullScreen" value="true"></param><embed src="<?=$youtubevideo ?>" type="application/x-shockwave-flash" allowfullscreen="true" width="425" height="344"></embed></object>

	<?php }  ?>

<?php }else{ ?>

<object id="MediaPlayer" width=380 height=300 classid="CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95" standby="Loading Windows Media Player components..." type="all" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112">
<param name="filename" value="<?=WEB_PATH_VIDEO.$_GET['file'] ?>">
<param name="Showcontrols" value="True">
<param name="autoStart" value="FALSE">
<embed type="all" src="<?=WEB_PATH_VIDEO.$_GET['file'] ?>" width=380 height=300></embed>
</object>
 </div>
</div>
<?php } ?>
</body></html>