<?
header("Content-type: text/xml"); 
print '<?xml version="1.0" encoding="utf-8"?>
<graph>
	<general_settings bg_color="F6F6F6" showAnchor="1" showArea="0" type_animation="1">
		<header text="" font="Verdana" color="666666" size="1" />
		<subheader text="" font="Verdana" color="666666" size="1" />
		<legend font="Verdana" color="666666" font_size="11" />
		<legend_popup font="Verdana" bgcolor="FFFFE3" font_size="10" />
		<Xheaders rotate="90" color="cccccc" size="9" title="" title_color="666666" />
		<Yheaders color="000000" size="10" title="" title_rotate="0" title_color="666666" />
		<grid showX="1" showY="1" persent_stepY_from_stepX="175" grid_width="540" grid_height="160" grid_color="eeeeee" grid_alpha="40" grid_thickness="1" bg_color="ffffff" bg_alpha="100" alternate_bg_color="eeeeee" border_color="ffffff" border_thickness="1" />
	</general_settings>
	<abscissa_data>';
	$d_array = array();
	for($i=0;$i!=14;$i++){
			
		$DisplayDate  = date("l jS",mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y")));
		$d_array[] =$DisplayDate;		
	}
	$d_array = array_reverse($d_array);
	foreach($d_array as $value){
		
		print '<x value="'.$value.'" />';
	
	}
	if(!isset($_REQUEST['d1'])){ $_REQUEST['d1']="*0*0*0*0*0*1*1*0*0*0*0*0*1*0";}
	$graphVal = explode("*", strip_tags(trim($_REQUEST['d1'])));
	
print '</abscissa_data>
	<ordinate_data seriesName="This Week" color="3F8C2E" size="3.5">
		<y value="'.$graphVal[1].'" />
		<y value="'.$graphVal[2].'" />
		<y value="'.$graphVal[3].'" />
		<y value="'.$graphVal[4].'" />
		<y value="'.$graphVal[5].'" />
		<y value="'.$graphVal[6].'" />
		<y value="'.$graphVal[7].'" />
		<y value="'.$graphVal[8].'" />
		<y value="'.$graphVal[9].'" />
		<y value="'.$graphVal[10].'" />
		<y value="'.$graphVal[11].'" />
		<y value="'.$graphVal[12].'" />
		<y value="'.$graphVal[13].'" />
		<y value="'.$graphVal[14].'" />
	</ordinate_data>';

	//}
print '</graph>';
?>