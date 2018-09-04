<?php

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Funcions used by the classified ads page
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function ChangeDo($DoCall, $values = false){

	global $DB;

	$DoArray = array('add'); // list of acceptable calls
	 
	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){

		/**
		* Info: Adds a new advert
		* 		
		* @version  9.0
		* @created  Fri Sep 25 10:48:31 EEST 2008
		* @updated  Fri Sep 25 10:48:31 EEST 2008
		*/
		
		case "add": {

				if($values['ad_title'] =="" || $values['editor']==""){

					return $GLOBALS['_LANG_ERROR']["_incomplete"];
				}
				
				## is the eid set for editing?
				if(isset($values['eid'])){

					if(isset($values['form_preview_image_hidden']) && $values['form_preview_image_hidden'] !=""){ $runExtra = " pic1='".$values['form_preview_image_hidden']."', "; }else{ $runExtra =""; }

					$SQL = "UPDATE `class_adverts` SET $runExtra attachment='".$values['attachment']."', pic5='".$values['sub_catid']."', `cat_id` =  '".$values['ad_catid']."',	`title` ='".$values['ad_title']."',	`sub_title` ='".$values['ad_subtitle']."', `comments` ='".$values['editor']."', pic2='".$values['pic2']."', `date_updated` ='".DATE_NOW."' WHERE id= ('".$values['eid']."') LIMIT 1";
					
					$DB->Update($SQL);

					return $GLOBALS['_LANG_ERROR']["_complete"]."**1";

				}else{

					if(APPROVE_ACCOUNTS=="yes"){ $approveThis="no"; }else{ $approveThis="yes";}

					$DB->Insert("INSERT INTO `class_adverts` (			
					`uid` ,
					`cat_id` ,
					`title` ,
					`sub_title` ,
					`comments` ,
					`date_added` ,
					`date_updated` ,
					`hits` ,
					`pic1` ,
					`pic2` ,
					`pic3` ,
					`pic4` ,
					`pic5` ,
					`pic6` ,
					`pic7` ,
					`pic8` ,
					`recommends`, rating, rating_votes, featured, approved, attachment) 
					VALUES ( '".$_SESSION['uid']."' , '".$values['ad_catid']."', '".$values['ad_title']."', '".$values['ad_subtitle']."', '".eMeetingInput($values['editor'],true)."', '".DATE_NOW."', '".DATE_NOW."', '0', '".$values['form_preview_image_hidden']."', '".$values['pic2']."', '', '', '".$values['sub_catid']."', '', '', '', '', '0','0','no','".$approveThis."','".$values['attachment']."')");
	
					## email admin alter
					CheckAdminEmail("classads","classads", $values, "-**1");

					return $GLOBALS['_LANG_ERROR']["_complete"]."**1";

				}

		} break;

	  }
	}
}

?>