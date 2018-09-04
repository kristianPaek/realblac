<?
if(isset($_GET['id']) && is_numeric($_GET['id']) ){ 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SlideShow</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="../../js/swfobject.js" language="javascript"></script>
</head>

<body style="margin:0px; padding:0px;">
<div id="slideshow_div" class="marginTop" style="text-align:center;"></div>

		<script type="text/javascript">
		var so = new SWFObject("../flash/profile_slideshow.swf?xmlFile=../../XML/xml_slideshow.php?uid=<?=$_GET['id'] ?>", "slideshow", "800", "800", "8", "#000000");
		so.addParam("quality", "high");
		so.addParam("menu", "false");
		so.addParam("loop", "false");
		so.addParam("scale", "noscale");
		so.write("slideshow_div");
		</script>

</body>
</html>
<? } ?>