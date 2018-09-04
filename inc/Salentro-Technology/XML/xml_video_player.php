<?
include_once("../../inc/config_db.php");
header("Content-type: text/xml"); 
print '<?xml version="1.0" encoding="utf-8"?>
<CONFIG>
	<SETTINGS>
		<PLAYER_SETTINGS Name="RTMP" Value="'.FLASH_DOMAIN.'"/> 	
	</SETTINGS>
</CONFIG>';
?>