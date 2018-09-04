<?
header("Content-type: text/xml"); 
print '<?xml version="1.0" encoding="utf-8"?>
<graph>
<general_settings bg_color="ffffff" type_graph="v"/>
<header text="" font="Verdana" color="000000" size="18"/>
<subheader text="" font="Verdana" color="000000" size="14"/>
<legend font="Verdana" color="000000" font_size="11"/>
<legend_popup font="Verdana" bgcolor="FFFFE3" font_size="10"/>
<Xheaders rotate="0" color="000000" size="10" title="" title_color="000000"/>
<Yheaders color="000000" size="10" title="" title_rotate="90" title_color="000000"/>
<grid grid_width="270" grid_height="150" grid_color="D2D2D2" grid_alpha="30" grid_thickness="1" bg_color="ffffff" bg_alpha="70" alternate_bg_color="F9F9F9" border_color="000000" border_thickness="1"/>
<bars view_value="1" width="45" space="0.5" alpha="100" view_double_bar="1" color_double_bar="999999" pieces_grow_bar="50"/>
	<data name="0 - 18" value="5100" color="FFDE5B"/>
	<data name="18 - 25" value="7900" color="FFD737"/>
	<data name="25 - 35" value="11200" color="FFD012"/>
	<data name="35 - 55" value="6200" color="FFDB49"/>
	<data name="55 +" value="2200" color="FFE992"/>
</graph>';
?>