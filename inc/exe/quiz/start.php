<?
if(isset($_GET['item_id']) && is_numeric($_GET['item_id']) && isset($_GET['item2_id']) && is_numeric($_GET['item2_id'])){
require_once "../../config.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Quiz</title>
<script language="javascript">AC_FL_RunContent = 0;</script>
<script src="../../js/AC_RunActiveContent.js" language="javascript"></script>
</head>
<body bgcolor="#eeeeee" style="margin:0px;padding:0px;">
<script language="javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0',
			'width', '400',
			'height', '300',
			'src', '../flash/quiz',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'multi_preview',
			'bgcolor', '#eeeeee',
			'name', 'multi_preview',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', '../flash/quiz?item_id=<?=$item_id ?>&item2_id=<?=$item2_id ?>',
			'salign', ''
			); //end AC code
	}
</script>
<noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="590" height="300" id="multi_preview" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
	<param name="movie" value="../flash/quiz?item_id=<?=$item_id ?>&item2_id=<?=$item2_id ?>" /><param name="quality" value="high" /><param name="bgcolor" value="#cccccc" />	<embed src="../flash/quiz?item_id=<?=$item_id ?>&item2_id=<?=$item2_id ?>" quality="high" bgcolor="#cccccc" width="590" height="300" name="multi_preview" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
</noscript>
<iframe style="width:0px;height:0px;" id="SaveQuizScores"></iframe>
</body>
</html>
<? } ?>