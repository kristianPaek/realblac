<?php
/**
 * api: eMeeting Dating Software
 * title: Admin Area Approval System
 * description: Add google analytics to your website
 * type: functions
 * category: Admin Area Plugins
 * author: eMeeting Ltd 
 * url: http://www.datingscripts.co.uk
 * license: eMeeting 9.11
 * config:
 * provides: Google
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 1th 2009
 * 
 * This plugin allows you to add google analytics code to your website quickly
 * and easily from within the plugins section of the dating software admin area.
 */
 
/*
ADMIN AREA TOP MENU BAR
$admin_layout_page1 = DASHBOARD
$admin_layout_page2 = MEMBERS
$admin_layout_page3 = DESIGN
$admin_layout_page4 = EMAIL
$admin_layout_page5 = BILLING
$admin_layout_page6 = ADVERTISING
$admin_layout_page7 = SETTINGS
$admin_layout_page8 = MANAGEMENT
$admin_layout_page11 = PLUGINS
*/
 
if(defined("A_LANG")){ // only display for admin area pages

	$plugin_admin_approve_menu = array(	
	
		"pluginApprove" => "Member Approval",

	);
	
	array_push($admin_layout_page1,$plugin_admin_approve_menu);

	$Plugin_Title = "Member Approval";

	switch($_REQUEST['p']){ // switch the page call
		
			case "pluginApprove": {
	 
				$LoadAdminPlugin = true; // tell the script to load the plugin and not any default page
	
				$PLUGINS_PAGE_TYPE = "link"; // link or html
				$PLUGINS_PAGE_LINK = "../plugins/plugins/plugin_admin_approve/ApproveList.php";
	
			}
	
	}

}
?>