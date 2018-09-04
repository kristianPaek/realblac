<?php
/**
 * api: eMeeting Dating Software
 * title: Live Support Plugin
 * description: Add a live help button to your website. Requires Customer Account.
 * type: functions
 * category: Support Plugins
 * author: eMeeting Ltd 
 * url: http://www.providesupport.com/partner/emeeting
 * license: eMeeting 9.0
 * config:<var name="ProvideSupport_Username[ID]" type="text" class="t1" value="0" title="Analytics Account ID" description="Enter your providesupport.com Account ID in the space provided. This is often the same as your website login username" set="always" /><const name="ProvideSupport_Username[type]" description="Select which monitoring type you would like to use, either hidden or display button" title="Monitoring Type" type="multi" multi="1=Graphics Chat Button|0=Hidden Code for Visitor Monitoring" value="0" />
 * provides: Google
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: March 5th 2009
 * 
 * This plugin allows you to add your providesupport.com live help button to your website.
 */
 
function ProvideSupport_Username_plugin($type) {

   global $ProvideSupport_Username;


	if($type ==1){

	return "<!-- BEGIN ProvideSupport.com Graphics Chat Button Code -->
	<div id=\"ci0Sty\" style=\"z-index:100;position:absolute\"></div><div id=\"sc0Sty\" style=\"display:inline\"></div><div id=\"sd0Sty\" style=\"display:none\"></div><script type=\"text/javascript\">var se0Sty=document.createElement(\"script\");se0Sty.type=\"text/javascript\";var se0Stys=(location.protocol.indexOf(\"https\")==0?\"https\":\"http\")+\"://image.providesupport.com/js/".$ProvideSupport_Username[ID]."/safe-standard.js?ps_h=0Sty\u0026ps_t=\"+new Date().getTime();setTimeout(\"se0Sty.src=se0Stys;document.getElementById('sd0Sty').appendChild(se0Sty)\",1)</script><noscript><div style=\"display:inline\"><a href=\"http://www.providesupport.com?messenger=".$ProvideSupport_Username[ID]."\">Online Customer Support</a></div></noscript>
	<!-- END ProvideSupport.com Graphics Chat Button Code -->";
	
	}else{

	return "<!-- BEGIN ProvideSupport.com Visitor Monitoring Code -->
	<div id=\"ci9Mlu\" style=\"z-index:100;position:absolute\"></div><div id=\"sd9Mlu\" style=\"display:none\"></div><script type=\"text/javascript\">var se9Mlu=document.createElement(\"script\");se9Mlu.type=\"text/javascript\";var se9Mlus=(location.protocol.indexOf(\"https\")==0?\"https\":\"http\")+\"://image.providesupport.com/js/".$ProvideSupport_Username[ID]."/safe-monitor.js?ps_h=9Mlu\u0026ps_t=\"+new Date().getTime();setTimeout(\"se9Mlu.src=se9Mlus;document.getElementById('sd9Mlu').appendChild(se9Mlu)\",1)</script><noscript><div style=\"display:inline\"><a href=\"http://www.providesupport.com?monitor=".$ProvideSupport_Username[ID]."\"><img src=\"image.providesupport.com/image/".$ProvideSupport_Username[ID].".gif\" border=\"0\"></a></div></noscript>
	<!-- END ProvideSupport.com Visitor Monitoring Code -->";

	}
	 
	
}
if(isset($ProvideSupport_Username["ID"]) && $ProvideSupport_Username["ID"] !=""){

	if($ProvideSupport_Username["type"] ==1){
	$PLUGINS_MENU_BAR .=ProvideSupport_Username_plugin(1);
	}else{
	$FOOTER_MENU_TIMER .=ProvideSupport_Username_plugin(0);
	}
	
	
}
?>