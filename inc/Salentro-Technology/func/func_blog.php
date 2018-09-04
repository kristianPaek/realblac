<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Functions used for saving blog data
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function ChangeDo($DoCall, $values = false, $Files = false){

	global $DB;

	$DoArray = array('edit','addpost','editpost', 'design','comments'); // list of acceptable calls

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
		

			 /**
			 * Info: Add new blog post
			 * 		
			 * @version  9.0
			 * @created  Fri Sep 25 10:48:31 EEST 2008
			 * @updated  Fri Sep 25 10:48:31 EEST 2008
			 */
			
			case "addpost":{
				
				$BadWords = CreateBadWordFilter();

				if($values['title'] =="" || $values['editor']==""){
					return $GLOBALS['_LANG_ERROR']["_incomplete"];
				}

				//if(APPROVE_ACCOUNTS=="yes"){ $approveThis="no"; }else{ $approveThis="yes";}
						
				$DB->Insert("INSERT INTO `blog_posts` (`uid` ,`title` , comments, `date` ,`time` ,`photo` ,`rating` ,`rating_votes` ,`hits` ,`approved`, attachment )VALUES ( '".$_SESSION['uid']."', '".eMeetingInput(filter_str($values['title'],$BadWords))."', '".eMeetingInput(filter_str($values['editor'],$BadWords))."', '".DATE_TIME."', '".TIME_NOW."','".$values['form_preview_image_hidden']."' '','',   '', '0', 'yes', '".$values['attachment']."')");
 	
				## email admin alter
				CheckAdminEmail("blog","blog", $values, "-**1");
				
				return $GLOBALS['_LANG_ERROR']["_complete"]."**1";
				
			} break;


			 /**
			 * Info: Edit Existing Blog Post
			 * 		
			 * @version  9.0
			 * @created  Fri Sep 25 10:48:31 EEST 2008
			 * @updated  Fri Sep 25 10:48:31 EEST 2008
			 */

			case "editpost":{
	
				$BadWords = CreateBadWordFilter();		
	
				if($values['title'] =="" || $values['editor']==""){
					return $GLOBALS['_LANG_ERROR']["_incomplete"];
				}

				## edit options for moderator
				if( ( isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes") || APPROVE_ACCOUNTS =="no" ){

					$EditString = ",approved='yes' ";				
	
				}else{
					$EditString = ",approved='no' ";
				}

				$DB->Insert("UPDATE blog_posts SET attachment='".$values['attachment']."', title='".eMeetingInput(filter_str($values['title'],$BadWords,$bw))."', comments='".eMeetingInput(filter_str($values['editor'],$BadWords,$bw))."', date='".DATE_TIME."', photo='".$values['form_preview_image_hidden']."' ".$EditString." WHERE id='".$values['eid']."' LIMIT 1");			
				
				return $GLOBALS['_LANG_ERROR']["_complete"]."**1";
				
			} break;
		
					
		}
	
	}
	
	return "error_invalid_call";	
}

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
?>