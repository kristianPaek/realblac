<?php
/**
 * api: eMeeting Dating Software
 * title: eMeeting Contact Importer
 * description: This plugin will allow your members to import their friends from facebook, myspace and many more websites!
 * type: functions
 * category: Contact Importer
 * author: eMeeting Ltd 
 * url: http://openinviter.com
 * license: eMeeting 9.15
 * config:
 * provides: eMeeting
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: March 16th 2009
 * 
 */
 	
	/*
		TELL THE SCRIPT TO USE
		OUR CUSTOM PLUGIN PAGES
	*/
	$LOAD_PLUGIN_OPTIONS = true;
	

	$PLUGINS_PAGES = array("import","mgal");
	
	switch($page){
	
		case "import": {
			
			MustBeLoggedIn();	// will block none members viewing the page
				/*
					LOADS MAIN PAGE IF NOT INNER PAGES ARE SELECTED
				*/
				$HEADER_META_BASE .= '<link href="plugins/plugins/plugin_importer/styles.css" rel="stylesheet" type="text/css">';
				$PLUGINS_PAGE_TYPE = "link"; // link or html
				$PLUGINS_PAGE_LINK = "plugins/plugins/plugin_importer/import.php";
			
		} break;
		
	
	} // END SWITCH PAGE CALL


?>