<?
require_once "../config.php";	
if(SLIDER1_IMAGE ==""){	$Slider_1="inc/templates/".D_TEMP."/images/slide1.jpg";}else{$Slider_1=SLIDER1_IMAGE;}
if(SLIDER2_IMAGE ==""){	$Slider_2="inc/templates/".D_TEMP."/images/slide2.jpg";}else{$Slider_2=SLIDER2_IMAGE;}
header("Content-type: text/xml"); 
print '<?xml version="1.0" encoding="utf-8"?><total bwidth="160" bheight="250">';
    print '<banner>
		<image>'.DB_DOMAIN.$Slider_1.'</image>
		<url>'.SLIDER1_LINK.'</url>
		<time>2.5</time>
    </banner>';
    print '<banner>
		<image>'.DB_DOMAIN.$Slider_2.'</image>
		<url>'.SLIDER2_LINK.'</url>
		<time>2.5</time>
    </banner>';
if(SLIDER3_IMAGE !=""){
    print '<banner>
		<image>'.DB_DOMAIN.SLIDER3_IMAGE.'</image>
		<url>'.SLIDER3_LINK.'</url>
		<time>2.5</time>
    </banner>';
}
if(SLIDER4_IMAGE !=""){
    print '<banner>
		<image>'.DB_DOMAIN.SLIDER4_IMAGE.'</image>
		<url>'.SLIDER4_LINK.'</url>
		<time>2.5</time>
    </banner>';
}
print '</total>';
?>