<?
header("Content-type: text/xml"); 
print '<?xml version="1.0" encoding="utf-8"?>
<?xml version="1.0" encoding="utf-8"?>
<graph>
	<general_settings bg_color="FFFFFF" />
	<header text="" font="Verdana" color="000000" size="1" />
	<subheader text="" font="Verdana" color="000000" size="1" />
	<legend font="Verdana" font_color="000000" font_size="11" bgcolor="FFFFFF" alternate_bg_color="FFF9E1" border_color="BFBFBF" />
	<legend_popup font="Verdana" bgcolor="FFFFE3" font_size="10"  display="none"/>
	<pie_chart radius="60" height="35" angle_slope="45" alpha_sides="60" alpha_lines="20" />';
	$graphVal = explode("**", strip_tags(trim($_REQUEST['d1'])));
	
	foreach($graphVal as $value){
	
		 $ff = explode("--", strip_tags(trim($value)));
		 if($ff[0] !="" && $ff[1] !=""){
			 print '<data name="'.$ff[0].'" value="'.$ff[1].'" color="333333" />';
		 }
	}

print '</graph>';
?>