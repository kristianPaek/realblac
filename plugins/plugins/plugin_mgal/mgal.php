<script type="text/javascript" src="inc/js/prototype.js"></script>
<script type="text/javascript" src="inc/js/effects.js"></script>
<script type="text/javascript" src="plugins/plugins/plugin_mgal/carousel.js"></script>
<script>
function top10changeImage(img){
	Timer_Icon('response_top10');
	eMeetingDo('plugins/plugins/plugin_mgal/_actions.php?action=photo&fid='+img,"response_top10");
}
</script>
<link type="text/css" href="plugins/plugins/plugin_mgal/top10.css" rel="stylesheet">


<div class="TopAccount"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span>Member Photo Gallery</span></div><br>
<p><?=$PageDesc ?></p>

 
<br>

<div id="prev-arrow-container" style="margin-left:10px;"><img alt="Left3-disabled" id="prev-arrow" src="plugins/plugins/plugin_mgal/left3-disabled.gif" /></div>
<div class="carousel-component" id="html-carousel"><div class="carousel-clip-region"><ul class="carousel-list">

<?
$ThisImg="";
$result1 = $DB->Query("SELECT members.id, files.bigimage, files.title, files.description, members.username FROM members
INNER JOIN files ON ( files.uid = members.id AND files.approved='yes')
INNER JOIN album ON ( album.uid = files.uid AND album.cat='public' )
GROUP BY members.id
ORDER BY files.id DESC LIMIT 100");
while( $afile = $DB->NextRow($result1) ){						
?>
	<li><img alt="Image1" class="thumb" onClick="top10changeImage('<?=$afile['bigimage'] ?>');" src="<?=DB_DOMAIN."inc/tb.php?src=".$afile['bigimage'] ?>&x=96&y=96" style="cursor:pointer;" /><a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$afile['id'] ?>" style="text-decoration:none;color:#666;"><?=$afile['username'] ?></a></li>
	
<? 
if($ThisImg ==""){ 

$FilS = @getimagesize(PATH_IMAGE.$afile['bigimage']);
$ThisImg = DB_DOMAIN."inc/tb.php?src=".$afile['bigimage']."&t=i&x=".$FilS[0]."&y=".$FilS[1].""; }
} ?>
</ul></div></div><script type="text/javascript">
//<![CDATA[
function initCarousel_html_carousel() {carousel = new Carousel('html-carousel', {animHandler:animHandler, animParameters:{duration:0.5}, buttonStateHandler:buttonStateHandler, nextElementID:'next-arrow', prevElementID:'prev-arrow', size:31})};Event.observe(window, 'load', initCarousel_html_carousel);
//]]>
</script>
<div id="next-arrow-container"><img alt="Right3-enabled" id="next-arrow" src="plugins/plugins/plugin_mgal/right3-enabled.gif" /></div>

<br style="clear:both"/>

<script type="text/javascript">
function buttonStateHandler(button, enabled) {
if (button == "prev-arrow")
$('prev-arrow').src = enabled ? "plugins/plugins/plugin_mgal/left3-enabled.gif" : "plugins/plugins/plugin_mgal/left3-disabled.gif"
else
$('next-arrow').src = enabled ? "plugins/plugins/plugin_mgal/right3-enabled.gif" : "plugins/plugins/plugin_mgal/right3-disabled.gif"
}

function animHandler(carouselID, status, direction) {
var region = $(carouselID).down(".carousel-clip-region")
if (status == "before") {
Effect.Fade(region, {to: 0.3, queue: { position:'end', scope: "carousel" }, duration: 0.2})
}
if (status == "after") {
Effect.Fade(region, {to: 1, queue: { position:'end', scope: "carousel" }, duration: 0.2})
}
}

</script>

<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="600" height="267" align="center" bgcolor="#eeeeee">
<div id="response_top10"><img src="<?=$ThisImg ?>" style="border:1px solid #666;padding:8px;"></div>

</td>
  </tr>
</table>
<br>
