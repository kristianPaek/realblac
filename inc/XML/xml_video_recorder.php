<?
include_once("../../inc/config_db.php");
header("Content-type: text/xml"); 
print '<?xml version="1.0" encoding="utf-8"?>
<CONFIG>
	<SETTINGS>
		<PLAYER_SETTINGS Name="SiteURL" Value="'.DB_DOMAIN.'inc/exe/Recorder/"/>
		<PLAYER_SETTINGS Name="ServerURL" Value="'.FLASH_DOMAIN.'"/>
		<PLAYER_SETTINGS Name="FPS" Value="10" /> 
		<PLAYER_SETTINGS Name="AudioRate" Value="11"/>
		<PLAYER_SETTINGS Name="VideoWidth" Value="320"/> 
		<PLAYER_SETTINGS Name="VideoHeight" Value="240"/>
		<PLAYER_SETTINGS Name="VideoCompression" Value="85"/>
		<PLAYER_SETTINGS Name="AudioGain" Value="50"/>
		<PLAYER_SETTINGS Name="SaveScript" Value="'.DB_DOMAIN.'inc/exe/Recorder/save.php"/>	
		<PLAYER_SETTINGS Name="AudioActivity" Value="50"/>
		<PLAYER_SETTINGS Name="VideoActivity" Value="50"/>	
		<PLAYER_SETTINGS Name="MaxRecordingTime" Value="300"/>		
		<PLAYER_SETTINGS Name="Color" Value="0x000077"/>
		<PLAYER_SETTINGS Name="EmbedURL" Value="'.DB_DOMAIN.'inc/exe/Recorder/player.swf"/>	
		<PLAYER_SETTINGS Name="ShareURL" Value=""/>	
	
	</SETTINGS>
	<MSG>
		<ERROR Name="Saving" Value="Saving file to the database..."/>
		<ERROR Name="SaveSuccess" Value="The file has been saved successfully"/>
		<ERROR Name="SaveError" Value="There was an error saving the file"/>
	</MSG>
</CONFIG>';
?>