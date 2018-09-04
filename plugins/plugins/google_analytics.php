<?php
/**
 * api: eMeeting Dating Software
 * title: Google Analytics
 * description: Add google analytics to your website
 * type: functions
 * category: Google Plugins
 * author: eMeeting Ltd 
 * url: http://www.google.com/analytics/
 * license: eMeeting 9.0
 * config:<var name="Google_Analytics[Code]" type="text" class="t1" value="0" title="Analytics Account ID" description="Enter your Google analytics Account ID in the space provided. This can be found in your google ( Edit Account and Data Sharing Settings ) page." set="always" />
 * provides: Google
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 5th 2008
 * 
 * This plugin allows you to add google analytics code to your website quickly
 * and easily from within the plugins section of the dating software admin area.
 */
 
function Google_Analytics_plugin() {

   global $Google_Analytics;

   return "<script type=\"text/javascript\">
	var gaJsHost = ((\"https:\" == document.location.protocol) ? \"https://ssl.\" : \"http://www.\");
	document.write(unescape(\"%3Cscript src='\" + gaJsHost + \"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E\"));
	</script>
	<script type=\"text/javascript\">
	try {
	var pageTracker = _gat._getTracker(\"".$Google_Analytics[Code]."\");
	pageTracker._trackPageview();
	} catch(err) {}</script>";
	
}
if(isset($Google_Analytics["Code"]) && $Google_Analytics["Code"] !=""){

	$FOOTER_MENU_TIMER .=Google_Analytics_plugin();
	
}
?>