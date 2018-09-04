<?
$_REQUEST['n'] =6;
require_once "inc/config.php";

require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

## page access check
if(!in_array("6",$_SESSION['admin_access_level']) ) { header("location:overview.php");}


$PageLink = "settings.php";
$PageLang = $admin_layout_page7;

require_once "layout.php";
############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){
if(isset($_POST['do'])){

		switch ($_POST['do']) {


				case "email": {
			 
						$filename = subd.'inc/config.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string			
				
							  if ( strstr($data[$counter], "'SEMAIL_JOIN','".SEMAIL_JOIN."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_JOIN','".SEMAIL_JOIN."'", "'SEMAIL_JOIN','".$_POST['sjoin']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_UPDATE','".SEMAIL_UPDATE."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_UPDATE','".SEMAIL_UPDATE."'", "'SEMAIL_UPDATE','".$_POST['supdate']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_FILES','".SEMAIL_FILES."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_FILES','".SEMAIL_FILES."'", "'SEMAIL_FILES','".$_POST['sfiles']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_GROUPS','".SEMAIL_GROUPS."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_GROUPS','".SEMAIL_GROUPS."'", "'SEMAIL_GROUPS','".$_POST['sgroups']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_CLASSADS','".SEMAIL_CLASSADS."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_CLASSADS','".SEMAIL_CLASSADS."'", "'SEMAIL_CLASSADS','".$_POST['sclassads']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_BLOG','".SEMAIL_BLOG."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_BLOG','".SEMAIL_BLOG."'", "'SEMAIL_BLOG','".$_POST['sblog']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_FORUM','".SEMAIL_FORUM."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_FORUM','".SEMAIL_FORUM."'", "'SEMAIL_FORUM','".$_POST['sforum']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_LOGIN','".SEMAIL_LOGIN."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_LOGIN','".SEMAIL_LOGIN."'", "'SEMAIL_LOGIN','".$_POST['slogin']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEMAIL_TEMPLATE','".SEMAIL_TEMPLATE."'") ) {
							  	
									$filecontent .= str_replace("'SEMAIL_TEMPLATE','".SEMAIL_TEMPLATE."'", "'SEMAIL_TEMPLATE','".$_POST['newid']."'", $data[$counter]);
							  }




							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);
					   
					   $ErrorSend=1;

				}break;
		/*
			WATER MARK
		*/					
				case "water": {

				
				if(isset($_POST['removeWatermark']) && $_POST['removeWatermark']==1){ $ThisPhoto="123"; }else{ $ThisPhoto=""; }

				if(strlen($_FILES['WatermarkUpload']['tmp_name']) > 5){
						
				
						$copy = copy($_FILES['WatermarkUpload']['tmp_name'], PATH_FILES.$_FILES['WatermarkUpload']['name']);
				
						if($copy){
				
								$ThisPhoto = $_FILES['WatermarkUpload']['name'];
						}
				
				}
			
						

				if($ThisPhoto !=""){

 						if(isset($_POST['removeWatermark']) && $_POST['removeWatermark']==1){ $ThisPhoto=""; }
						$filename = subd.'inc/config_db.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string							
							  if ( strstr($data[$counter], "'WATERMARK_FILE','".WATERMARK_FILE."'") ) {
							  	
									$filecontent .= str_replace("'WATERMARK_FILE','".WATERMARK_FILE."'", "'WATERMARK_FILE','".$ThisPhoto."'", $data[$counter]);
							  }
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);

				}
					   
					   $ErrorSend=1;

				}break;
															
				case "pagedisplay": {
			 
						$filename = subd.'inc/config.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string
														
							  if ( strstr($data[$counter], "'D_FORUM','".D_FORUM."'") ) {
							 	
									$filecontent .= str_replace("'D_FORUM','".D_FORUM."'", "'D_FORUM','".$_POST['ff1']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_EVENTS','".D_EVENTS."'") ) {
							  	
									$filecontent .= str_replace("'D_EVENTS','".D_EVENTS."'", "'D_EVENTS','".$_POST['devents']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_BLOG','".D_BLOG."'") ) {
							  	
									$filecontent .= str_replace("'D_BLOG','".D_BLOG."'", "'D_BLOG','".$_POST['ff2']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_CHATROOM','".D_CHATROOM."'") ) {
							  	
									$filecontent .= str_replace("'D_CHATROOM','".D_CHATROOM."'", "'D_CHATROOM','".$_POST['ff3']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_IM','".D_IM."'") ) {
							  	
									$filecontent .= str_replace("'D_IM','".D_IM."'", "'D_IM','".$_POST['ff4']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_IM_POPUP','".D_IM_POPUP."'") ) {
							  	
									$filecontent .= str_replace("'D_IM_POPUP','".D_IM_POPUP."'", "'D_IM_POPUP','".$_POST['ff4p']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'D_MATCHTESTS','".D_MATCHTESTS."'") ) {
							  	
									$filecontent .= str_replace("'D_MATCHTESTS','".D_MATCHTESTS."'", "'D_MATCHTESTS','".$_POST['ff5']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_POSTCODES','".D_POSTCODES."'") ) {
							  	
									$filecontent .= str_replace("'D_POSTCODES','".D_POSTCODES."'", "'D_POSTCODES','".$_POST['ff6']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_ZIPCODES','".D_ZIPCODES."'") ) {
							  	
									$filecontent .= str_replace("'D_ZIPCODES','".D_ZIPCODES."'", "'D_ZIPCODES','".$_POST['ff7']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_GROUPS','".D_GROUPS."'") ) {
							  	
									$filecontent .= str_replace("'D_GROUPS','".D_GROUPS."'", "'D_GROUPS','".$_POST['ff8']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_NETWORK','".D_NETWORK."'") ) {
							  	
									$filecontent .= str_replace("'D_NETWORK','".D_NETWORK."'", "'D_NETWORK','".$_POST['ff9']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_GAMES','".D_GAMES."'") ) {
							  	
									$filecontent .= str_replace("'D_GAMES','".D_GAMES."'", "'D_GAMES','".$_POST['dgames']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_DESIGNER','".D_DESIGNER."'") ) {
							  	
									$filecontent .= str_replace("'D_DESIGNER','".D_DESIGNER."'", "'D_DESIGNER','".$_POST['ddesign']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'MSN_INCLUDE','".MSN_INCLUDE."'") ) {
							  	
									$filecontent .= str_replace("'MSN_INCLUDE','".MSN_INCLUDE."'", "'MSN_INCLUDE','".$_POST['ff11']."'", $data[$counter]);
							  }


  // UPLOAD TYPES
							  
							  
							elseif ( strstr($data[$counter], "'D_PARTNER','".D_PARTNER."'") && isset($_POST['pp1']) ) {
							  	
									$filecontent .= str_replace("'D_PARTNER','".D_PARTNER."'", "'D_PARTNER','".$_POST['pp1']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_FRIENDS','".D_FRIENDS."'") && isset($_POST['pp2'])) {
							  	
									$filecontent .= str_replace("'D_FRIENDS','".D_FRIENDS."'", "'D_FRIENDS','".$_POST['pp2']."'", $data[$counter]);
							  }
 							 elseif ( strstr($data[$counter], "'D_SKYPE','".D_SKYPE."'") && isset($_POST['pskype'])) {
							  	
									$filecontent .= str_replace("'D_SKYPE','".D_SKYPE."'", "'D_SKYPE','".$_POST['pskype']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_HOTLIST','".D_HOTLIST."'") && isset($_POST['pp3'])) {
							  	
									$filecontent .= str_replace("'D_HOTLIST','".D_HOTLIST."'", "'D_HOTLIST','".$_POST['pp3']."'", $data[$counter]);
							  }
							   elseif ( strstr($data[$counter], "'D_WINK','".D_WINK."'") && isset($_POST['pp4'])) {
							  	
									$filecontent .= str_replace("'D_WINK','".D_WINK."'", "'D_WINK','".$_POST['pp4']."'", $data[$counter]);
							  }

 							 elseif ( strstr($data[$counter], "'D_FOLLOW','".D_FOLLOW."'") && isset($_POST['pfollow'])) {
							  	
									$filecontent .= str_replace("'D_FOLLOW','".D_FOLLOW."'", "'D_FOLLOW','".$_POST['pfollow']."'", $data[$counter]);
							  }

 							 elseif ( strstr($data[$counter], "'D_STARSIGN','".D_STARSIGN."'") && isset($_POST['pstar'])) {
							  	
									$filecontent .= str_replace("'D_STARSIGN','".D_STARSIGN."'", "'D_STARSIGN','".$_POST['pstar']."'", $data[$counter]);
							  }


					  		elseif ( strstr($data[$counter], "'D_COMMENTS','".D_COMMENTS."'") ) {
							  	
									$filecontent .= str_replace("'D_COMMENTS','".D_COMMENTS."'", "'D_COMMENTS','".$_POST['ffcomments']."'", $data[$counter]);
							  }
					  		elseif ( strstr($data[$counter], "'D_MOBILE','".D_MOBILE."'") ) {
							  	
									$filecontent .= str_replace("'D_MOBILE','".D_MOBILE."'", "'D_MOBILE','".$_POST['ffmobile']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'AFF_ENABLED','".AFF_ENABLED."'") ) {
							  	
									$filecontent .= str_replace("'AFF_ENABLED','".AFF_ENABLED."'", "'AFF_ENABLED','".$_POST['ff12']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'UPGRADE_SMS','".UPGRADE_SMS."'") ) {
							  	
									$filecontent .= str_replace("'UPGRADE_SMS','".UPGRADE_SMS."'", "'UPGRADE_SMS','".$_POST['fsms']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'D_SEARCH','".D_SEARCH."'") ) {
							  	
									$filecontent .= str_replace("'D_SEARCH','".D_SEARCH."'", "'D_SEARCH','".$_POST['dsearch']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_TOUR','".D_TOUR."'") ) {
							  	
									$filecontent .= str_replace("'D_TOUR','".D_TOUR."'", "'D_TOUR','".$_POST['ff14']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_FAQ','".D_FAQ."'") ) {
							  	
									$filecontent .= str_replace("'D_FAQ','".D_FAQ."'", "'D_FAQ','".$_POST['ff15']."'", $data[$counter]);
							  }
							   elseif ( strstr($data[$counter], "'D_CONTACT','".D_CONTACT."'") ) {
							  	
									$filecontent .= str_replace("'D_CONTACT','".D_CONTACT."'", "'D_CONTACT','".$_POST['ff16']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_REGISTER_IMAGE','".D_REGISTER_IMAGE."'") ) {
							  	
									$filecontent .= str_replace("'D_REGISTER_IMAGE','".D_REGISTER_IMAGE."'", "'D_REGISTER_IMAGE','".$_POST['ff17']."'", $data[$counter]);
							  }
//
							  elseif ( strstr($data[$counter], "'D_CLASSADS','".D_CLASSADS."'") ) {
							  	
									$filecontent .= str_replace("'D_CLASSADS','".D_CLASSADS."'", "'D_CLASSADS','".$_POST['dclass']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'D_VIDEOS','".D_VIDEOS."'") ) {
							  	
									$filecontent .= str_replace("'D_VIDEOS','".D_VIDEOS."'", "'D_VIDEOS','".$_POST['dvid']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_MUSIC','".D_MUSIC."'") ) {
							  	
									$filecontent .= str_replace("'D_MUSIC','".D_MUSIC."'", "'D_MUSIC','".$_POST['dmusic']."'", $data[$counter]);
							  }
							   elseif ( strstr($data[$counter], "'D_MESSAGES','".D_MESSAGES."'") ) {
							  	
									$filecontent .= str_replace("'D_MESSAGES','".D_MESSAGES."'", "'D_MESSAGES','".$_POST['dmsg']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_GALLERY','".D_GALLERY."'") ) {
							  	
									$filecontent .= str_replace("'D_GALLERY','".D_GALLERY."'", "'D_GALLERY','".$_POST['dgal']."'", $data[$counter]);
							  }
//
							 
							   elseif ( strstr($data[$counter], "'D_SETTINGS','".D_SETTINGS."'") ) {
							  	
									$filecontent .= str_replace("'D_SETTINGS','".D_SETTINGS."'", "'D_SETTINGS','".$_POST['dsettings']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_ACCOUNT','".D_ACCOUNT."'") ) {
							  	
									$filecontent .= str_replace("'D_ACCOUNT','".D_ACCOUNT."'", "'D_ACCOUNT','".$_POST['dacc']."'", $data[$counter]);
							  }

							  
							  elseif ( strstr($data[$counter], "'D_ARTICLES','".D_ARTICLES."'") ) {
							  	
									$filecontent .= str_replace("'D_ARTICLES','".D_ARTICLES."'", "'D_ARTICLES','".$_POST['fart']."'", $data[$counter]);
							  }
							  
							  
							  // UPLOAD TYPES
							  
							  
							elseif ( strstr($data[$counter], "'UP_PHOTO','".UP_PHOTO."'") ) {
							  	
									$filecontent .= str_replace("'UP_PHOTO','".UP_PHOTO."'", "'UP_PHOTO','".$_POST['U1']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'UP_VIDEO','".UP_VIDEO."'") ) {
							  	
									$filecontent .= str_replace("'UP_VIDEO','".UP_VIDEO."'", "'UP_VIDEO','".$_POST['U2']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'UP_MUSIC','".UP_MUSIC."'") ) {
							  	
									$filecontent .= str_replace("'UP_MUSIC','".UP_MUSIC."'", "'UP_MUSIC','".$_POST['U3']."'", $data[$counter]);
							  }
							   elseif ( strstr($data[$counter], "'UP_YOUTUBE','".UP_YOUTUBE."'") ) {
							  	
									$filecontent .= str_replace("'UP_YOUTUBE','".UP_YOUTUBE."'", "'UP_YOUTUBE','".$_POST['U4']."'", $data[$counter]);
							  }

							   elseif ( strstr($data[$counter], "'D_PROFILERATING','".D_PROFILERATING."'") ) {
							  	
									$filecontent .= str_replace("'D_PROFILERATING','".D_PROFILERATING."'", "'D_PROFILERATING','".$_POST['dprating']."'", $data[$counter]);
							  }
 
  
							  
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);
					   
					  $ErrorSend=1;
					  
				}break;
								

				
				case "paths": {
			 
						$filename = subd.'inc/config.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);


							// check line and replace string							

							 if ( strstr($data[$counter], "'PATH_FILES','".PATH_FILES."'")  ) {
							  
									$filecontent .= str_replace("'PATH_FILES','".PATH_FILES."'", "'PATH_FILES','".$_POST['pa0']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'PATH_IMAGE','".PATH_IMAGE."'") ) {
							 	
									$filecontent .= str_replace("'PATH_IMAGE','".PATH_IMAGE."'", "'PATH_IMAGE','".$_POST['pa1']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'PATH_IMAGE_THUMBS','".PATH_IMAGE_THUMBS."'") ) {
							  	
									$filecontent .= str_replace("'PATH_IMAGE_THUMBS','".PATH_IMAGE_THUMBS."'", "'PATH_IMAGE_THUMBS','".$_POST['pa2']."'", $data[$counter]);
							  }							  
							  elseif ( strstr($data[$counter], "'PATH_VIDEO','".PATH_VIDEO."'") ) {
							  	
									$filecontent .= str_replace("'PATH_VIDEO','".PATH_VIDEO."'", "'PATH_VIDEO','".$_POST['pa3']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'PATH_MUSIC','".PATH_MUSIC."'") ) {
							  	
									$filecontent .= str_replace("'PATH_MUSIC','".PATH_MUSIC."'", "'PATH_MUSIC','".$_POST['pa4']."'", $data[$counter]);
							  }		
							 elseif ( strstr($data[$counter], "'WEB_PATH_IMAGE','".WEB_PATH_IMAGE."'") ) {
							  	
									$filecontent .= str_replace("'WEB_PATH_IMAGE','".WEB_PATH_IMAGE."'", "'WEB_PATH_IMAGE','".$_POST['p1']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'WEB_PATH_IMAGE_THUMBS','".WEB_PATH_IMAGE_THUMBS."'") ) {
							  	
									$filecontent .= str_replace("'WEB_PATH_IMAGE_THUMBS','".WEB_PATH_IMAGE_THUMBS."'", "'WEB_PATH_IMAGE_THUMBS','".$_POST['p2']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'WEB_PATH_VIDEO','".WEB_PATH_VIDEO."'") ) {
							  	
									$filecontent .= str_replace("'WEB_PATH_VIDEO','".WEB_PATH_VIDEO."'", "'WEB_PATH_VIDEO','".$_POST['p3']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'WEB_PATH_MUSIC','".WEB_PATH_MUSIC."'") ) {
							  	
									$filecontent .= str_replace("'WEB_PATH_MUSIC','".WEB_PATH_MUSIC."'", "'WEB_PATH_MUSIC','".$_POST['p4']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'WEB_PATH_FILES','".WEB_PATH_FILES."'") ) {
							  	
									$filecontent .= str_replace("'WEB_PATH_FILES','".WEB_PATH_FILES."'", "'WEB_PATH_FILES','".$_POST['p0']."'", $data[$counter]);
							  }

							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);
					   
					   $ErrorSend=1;

				}break;
				
				
				case "thumbs": {
			 

				// CHECK FOR UPLOADS
				if(strlen($_FILES['t3_file']['tmp_name']) > 5){					
					$copy = copy($_FILES['t3_file']['tmp_name'], PATH_FILES.$_FILES['t3_file']['name']);			
					if($copy){$T3=$_FILES['t3_file']['name'];}else{	$T3="";	}
				}
				if(strlen($_FILES['t4_file']['tmp_name']) > 5){					
					$copy = copy($_FILES['t4_file']['tmp_name'], PATH_FILES.$_FILES['t4_file']['name']);			
					if($copy){$T4=$_FILES['t4_file']['name'];}else{	$T4="";	}
				}
				if(strlen($_FILES['t5_file']['tmp_name']) > 5){					
					$copy = copy($_FILES['t5_file']['tmp_name'], PATH_FILES.$_FILES['t5_file']['name']);			
					if($copy){$T5=$_FILES['t5_file']['name'];}else{	$T5="";	}
				}

				if(strlen($_FILES['t6_file']['tmp_name']) > 5){					
					$copy = copy($_FILES['t6_file']['tmp_name'], PATH_FILES.$_FILES['t6_file']['name']);			
					if($copy){$T6=$_FILES['t6_file']['name'];}else{	$T6="";	}
				}
 

						$filename = subd.'inc/config_db.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string
														
							
							 if ( strstr($data[$counter], "'DEFAULT_IMAGE','".DEFAULT_IMAGE."'") && $T3 !="") {
							  	
									$filecontent .= str_replace("'DEFAULT_IMAGE','".DEFAULT_IMAGE."'", "'DEFAULT_IMAGE','".$T3."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'DEFAULT_IMAGE_ADULT','".DEFAULT_IMAGE_ADULT."'") && $T4 !="" ) {
							  	
									$filecontent .= str_replace("'DEFAULT_IMAGE_ADULT','".DEFAULT_IMAGE_ADULT."'", "'DEFAULT_IMAGE_ADULT','".$T4."'", $data[$counter]);
							  }


							  elseif ( strstr($data[$counter], "'DEFAULT_MUSIC','".DEFAULT_MUSIC."'") && $T5 !="" ) {
							  	
									$filecontent .= str_replace("'DEFAULT_MUSIC','".DEFAULT_MUSIC."'", "'DEFAULT_MUSIC','".$T5."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'DEFAULT_VIDEO','".DEFAULT_VIDEO."'") && $T6 !="" ) {
							  	
									$filecontent .= str_replace("'DEFAULT_VIDEO','".DEFAULT_VIDEO."'", "'DEFAULT_VIDEO','".$T6."'", $data[$counter]);
							  }

							  

							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);
					   

						// UPLOAD DEFAULT IMAGES FOR NEW GENDERS
 
						$FF = $_POST['TotalDe'];
						while($FF > 0){

							if(isset($_FILES['main_file_'.$FF]['tmp_name']) && strlen($_FILES['main_file_'.$FF]['tmp_name']) > 5){

								// delete the old image
								@unlink(PATH_FILES."nophoto_".$_POST['default_'.$FF].".jpg");
	
								// upload the new
								$copy = copy($_FILES['main_file_'.$FF]['tmp_name'], PATH_FILES.$_FILES['main_file_'.$FF]['name']);	
								// rename the new
								
								if(rename_win(PATH_FILES.$_FILES['main_file_'.$FF]['name'],PATH_FILES."nophoto_".$_POST['default_'.$FF].".jpg") == FALSE) { }
		
								 
							}

						
						$FF--;
						}


					   $ErrorSend=1;				   
					   

				}break;
				
				case "ops": {
			 
						$filename = subd.'inc/config.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string
														
							  if ( strstr($data[$counter], "'VALIDATE_EMAIL','".VALIDATE_EMAIL."'") && isset($_POST['valemail']) ) {
							  	
									$filecontent .= str_replace("'VALIDATE_EMAIL','".VALIDATE_EMAIL."'", "'VALIDATE_EMAIL','".$_POST['valemail']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_MOD_WRITE','".D_MOD_WRITE."'") && isset($_POST['seof']) ) {
							  	
									$filecontent .= str_replace("'D_MOD_WRITE','".D_MOD_WRITE."'", "'D_MOD_WRITE','".$_POST['seof']."'", $data[$counter]);
							  }							  
							  elseif ( strstr($data[$counter], "'DEFAULT_PACKAGE','".DEFAULT_PACKAGE."'") && isset($_POST['mid']) ) {
							  	
									$filecontent .= str_replace("'DEFAULT_PACKAGE','".DEFAULT_PACKAGE."'", "'DEFAULT_PACKAGE','".$_POST['mid']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_MUST_UPGRADE','".D_MUST_UPGRADE."'") && isset($_POST['mustupgrade']) ) {
							  	
									$filecontent .= str_replace("'D_MUST_UPGRADE','".D_MUST_UPGRADE."'", "'D_MUST_UPGRADE','".$_POST['mustupgrade']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'MUST_HAVE_IMAGE','".MUST_HAVE_IMAGE."'") && isset($_POST['must']) ) {
							  	
									$filecontent .= str_replace("'MUST_HAVE_IMAGE','".MUST_HAVE_IMAGE."'", "'MUST_HAVE_IMAGE','".$_POST['must']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'APPROVE_FILES','".APPROVE_FILES."'") && isset($_POST['files']) ) {
							  	
									$filecontent .= str_replace("'APPROVE_FILES','".APPROVE_FILES."'", "'APPROVE_FILES','".$_POST['files']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'D_FLAGS','".D_FLAGS."'") && isset($_POST['flag']) ) {
							  	
									$filecontent .= str_replace("'D_FLAGS','".D_FLAGS."'", "'D_FLAGS','".$_POST['flag']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_FREE','".D_FREE."'") && isset($_POST['free']) ) {
							  	
									$filecontent .= str_replace("'D_FREE','".D_FREE."'", "'D_FREE','".$_POST['free']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'WEBSITE_DEMO','".WEBSITE_DEMO."'") && isset($_POST['maintenance']) ) {
							  	
									$filecontent .= str_replace("'WEBSITE_DEMO','".WEBSITE_DEMO."'", "'WEBSITE_DEMO','".$_POST['maintenance']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'APPROVE_ACCOUNTS','".APPROVE_ACCOUNTS."'") && isset($_POST['appmem']) ) {
							  	
									$filecontent .= str_replace("'APPROVE_ACCOUNTS','".APPROVE_ACCOUNTS."'", "'APPROVE_ACCOUNTS','".$_POST['appmem']."'", $data[$counter]);
							  }				
							  elseif ( strstr($data[$counter], "'AFF_CURRENCY','".AFF_CURRENCY."'") && isset($_POST['affcurrency']) ) {
							  	
									$filecontent .= str_replace("'AFF_CURRENCY','".AFF_CURRENCY."'", "'AFF_CURRENCY','".$_POST['affcurrency']."'", $data[$counter]);
							  }	
							  elseif ( strstr($data[$counter], "'SEARCH_PAGE_ROWS','".SEARCH_PAGE_ROWS."'") && isset($_POST['searchrows']) ) {
							  	
									$filecontent .= str_replace("'SEARCH_PAGE_ROWS','".SEARCH_PAGE_ROWS."'", "'SEARCH_PAGE_ROWS','".$_POST['searchrows']."'", $data[$counter]);
							  }	  
							  elseif ( strstr($data[$counter], "'MATCH_PAGE_ROWS','".MATCH_PAGE_ROWS."'") && isset($_POST['matchrows']) ) {
							  	
									$filecontent .= str_replace("'MATCH_PAGE_ROWS','".MATCH_PAGE_ROWS."'", "'MATCH_PAGE_ROWS','".$_POST['matchrows']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'SEARCH_WITHOUT_PICS','".SEARCH_WITHOUT_PICS."'") && isset($_POST['nophoto']) ) {
							  	
									$filecontent .= str_replace("'SEARCH_WITHOUT_PICS','".SEARCH_WITHOUT_PICS."'", "'SEARCH_WITHOUT_PICS','".$_POST['nophoto']."'", $data[$counter]);
							  }	

							  elseif ( strstr($data[$counter], "'POPUP_WINDOW','".POPUP_WINDOW."'") && isset($_POST['popwin']) ) {
							  	
									$filecontent .= str_replace("'POPUP_WINDOW','".POPUP_WINDOW."'", "'POPUP_WINDOW','".$_POST['popwin']."'", $data[$counter]);
							  }						  
							 elseif ( strstr($data[$counter], "'D_COMMENTS','".D_COMMENTS."'") && isset($_POST['zcomments'])  ) {
							  	
									$filecontent .= str_replace("'D_COMMENTS','".D_COMMENTS."'", "'D_COMMENTS','".$_POST['zcomments']."'", $data[$counter]);
							  }		
							 elseif ( strstr($data[$counter], "'DATE_DISPLAY_FORMAT','".DATE_DISPLAY_FORMAT."'") && isset($_POST['zdate'])  ) {
							  	
									$filecontent .= str_replace("'DATE_DISPLAY_FORMAT','".DATE_DISPLAY_FORMAT."'", "'DATE_DISPLAY_FORMAT','".$_POST['zdate']."'", $data[$counter]);
							  }					  							 
							  elseif ( strstr($data[$counter], "'U_EDITOR','".U_EDITOR."'") && isset($_POST['ieditor']) ) {
							  	
									$filecontent .= str_replace("'U_EDITOR','".U_EDITOR."'", "'U_EDITOR','".$_POST['ieditor']."'", $data[$counter]);
							  }	

							  elseif ( strstr($data[$counter], "'D_POP_UP_ALERT','".D_POP_UP_ALERT."'") && isset($_POST['ipop']) ) {
							  	
									$filecontent .= str_replace("'D_POP_UP_ALERT','".D_POP_UP_ALERT."'", "'D_POP_UP_ALERT','".$_POST['ipop']."'", $data[$counter]);
							  }

							 elseif ( strstr($data[$counter], "'AUTO_LOGIN','".AUTO_LOGIN."'") && isset($_POST['auto_login']) ) {
							  	
									$filecontent .= str_replace("'AUTO_LOGIN','".AUTO_LOGIN."'", "'AUTO_LOGIN','".$_POST['auto_login']."'", $data[$counter]);
							  }					  							 
							  elseif ( strstr($data[$counter], "'AUTO_AMOUNT','".AUTO_AMOUNT."'") && isset($_POST['auto_amount']) ) {
							  	
									$filecontent .= str_replace("'AUTO_AMOUNT','".AUTO_AMOUNT."'", "'AUTO_AMOUNT','".$_POST['auto_amount']."'", $data[$counter]);
							  }			

							  elseif ( strstr($data[$counter], "'D_CCTEXT','".D_CCTEXT."'") && isset($_POST['cctext']) ) {
							  		$_POST['cctext'] = str_replace("'","",$_POST['cctext']);
									$filecontent .= str_replace("'D_CCTEXT','".D_CCTEXT."'", "'D_CCTEXT','".$_POST['cctext']."'", $data[$counter]);
							  }			

							  elseif ( strstr($data[$counter], "'D_MD5','".D_MD5."'") && isset($_POST['md5']) ) {
							  		 
									$filecontent .= str_replace("'D_MD5','".D_MD5."'", "'D_MD5','".$_POST['md5']."'", $data[$counter]);
							  }						  						  
					  						  

							  elseif ( strstr($data[$counter], "'SEARCH_PAGE_DISPLAY','".SEARCH_PAGE_DISPLAY."'") && isset($_POST['search_view']) ) {
							  	
									$filecontent .= str_replace("'SEARCH_PAGE_DISPLAY','".SEARCH_PAGE_DISPLAY."'", "'SEARCH_PAGE_DISPLAY','".$_POST['search_view']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'ENABLE_ADULTCONTENT','".ENABLE_ADULTCONTENT."'") && isset($_POST['eadult']) ) {
							  	
									$filecontent .= str_replace("'ENABLE_ADULTCONTENT','".ENABLE_ADULTCONTENT."'", "'ENABLE_ADULTCONTENT','".$_POST['eadult']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'D_GENDERMATCHING','".D_GENDERMATCHING."'") && isset($_POST['egender']) ) {
							  	
									$filecontent .= str_replace("'D_GENDERMATCHING','".D_GENDERMATCHING."'", "'D_GENDERMATCHING','".$_POST['egender']."'", $data[$counter]);
							  }

							 elseif ( strstr($data[$counter], "'BLOCK_USERNAMES','".BLOCK_USERNAMES."'") && isset($_POST['blockusernames']) ) {
							  	
									$filecontent .= str_replace("'BLOCK_USERNAMES','".BLOCK_USERNAMES."'", "'BLOCK_USERNAMES','".$_POST['blockusernames']."'", $data[$counter]);
							  }

// email smtp
							 elseif ( strstr($data[$counter], "'USE_SMTP','".USE_SMTP."'") && isset($_POST['emailclient']) ) {
							  	
									$filecontent .= str_replace("'USE_SMTP','".USE_SMTP."'", "'USE_SMTP','".$_POST['emailclient']."'", $data[$counter]);
							  }
							 elseif ( strstr($data[$counter], "'SMTP_FROM_NAME','".SMTP_FROM_NAME."'") && isset($_POST['smtp3']) ) {
							  	
									$filecontent .= str_replace("'SMTP_FROM_NAME','".SMTP_FROM_NAME."'", "'SMTP_FROM_NAME','".$_POST['smtp3']."'", $data[$counter]);
							  }
							 elseif ( strstr($data[$counter], "'SMTP_SERVER','".SMTP_SERVER."'") && isset($_POST['smtp1']) ) {
							  	
									$filecontent .= str_replace("'SMTP_SERVER','".SMTP_SERVER."'", "'SMTP_SERVER','".$_POST['smtp1']."'", $data[$counter]);
							  }
							 elseif ( strstr($data[$counter], "'SMTP_PORT','".SMTP_PORT."'") && isset($_POST['smtp2']) ) {
							  	
									$filecontent .= str_replace("'SMTP_PORT','".SMTP_PORT."'", "'SMTP_PORT','".$_POST['smtp2']."'", $data[$counter]);
							  }
							elseif ( strstr($data[$counter], "'SMTP_USERNAME','".SMTP_USERNAME."'") && isset($_POST['smtp4']) ) {
							  	
									$filecontent .= str_replace("'SMTP_USERNAME','".SMTP_USERNAME."'", "'SMTP_USERNAME','".$_POST['smtp4']."'", $data[$counter]);
							  }
							elseif ( strstr($data[$counter], "'SMTP_PASSWORD','".SMTP_PASSWORD."'") && isset($_POST['smtp5']) ) {
							  	
									$filecontent .= str_replace("'SMTP_PASSWORD','".SMTP_PASSWORD."'", "'SMTP_PASSWORD','".$_POST['smtp5']."'", $data[$counter]);
							  }

// api data


							 elseif ( strstr($data[$counter], "'FACEBOOK_APP_ID','".FACEBOOK_APP_ID."'") && isset($_POST['fbappid']) ) {
							  	
									$filecontent .= str_replace("'FACEBOOK_APP_ID','".FACEBOOK_APP_ID."'", "'FACEBOOK_APP_ID','".$_POST['fbappid']."'", $data[$counter]);

							  }
							 elseif ( strstr($data[$counter], "'FACEBOOK_SECRET','".FACEBOOK_SECRET."'") && isset($_POST['fbsecret']) ) {
							  	
									$filecontent .= str_replace("'FACEBOOK_SECRET','".FACEBOOK_SECRET."'", "'FACEBOOK_SECRET','".$_POST['fbsecret']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'FACEBOOK_PHOTO','".FACEBOOK_PHOTO."'") && isset($_POST['fbphoto']) ) {
							  	
									$filecontent .= str_replace("'FACEBOOK_PHOTO','".FACEBOOK_PHOTO."'", "'FACEBOOK_PHOTO','".$_POST['fbphoto']."'", $data[$counter]);
							  }



							 elseif ( strstr($data[$counter], "'YOUTUBE_API_ID','".YOUTUBE_API_ID."'") && isset($_POST['Ykey']) ) {
							  	
									$filecontent .= str_replace("'YOUTUBE_API_ID','".YOUTUBE_API_ID."'", "'YOUTUBE_API_ID','".$_POST['Ykey']."'", $data[$counter]);
							  }

							 elseif ( strstr($data[$counter], "'EVENTFUL_USERNAME','".EVENTFUL_USERNAME."'") && isset($_POST['eu']) ) {
							  	
									$filecontent .= str_replace("'EVENTFUL_USERNAME','".EVENTFUL_USERNAME."'", "'EVENTFUL_USERNAME','".$_POST['eu']."'", $data[$counter]);
							  }
							 elseif ( strstr($data[$counter], "'EVENTFUL_PASSWORD','".EVENTFUL_PASSWORD."'") && isset($_POST['ep']) ) {
							  	
									$filecontent .= str_replace("'EVENTFUL_PASSWORD','".EVENTFUL_PASSWORD."'", "'EVENTFUL_PASSWORD','".$_POST['ep']."'", $data[$counter]);
							  }
							elseif ( strstr($data[$counter], "'EVENTFUL_KEY','".EVENTFUL_KEY."'") && isset($_POST['ek']) ) {
							  	
									$filecontent .= str_replace("'EVENTFUL_KEY','".EVENTFUL_KEY."'", "'EVENTFUL_KEY','".$_POST['ek']."'", $data[$counter]);
							  }
								elseif ( strstr($data[$counter], "'D_STATUSMSG','".D_STATUSMSG."'") && isset($_POST['ssmsg']) ) {
							  	
									$filecontent .= str_replace("'D_STATUSMSG','".D_STATUSMSG."'", "'D_STATUSMSG','".$_POST['ssmsg']."'", $data[$counter]);
							  }						

								  
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);
					   
					   
					   
					   
					   	$filename = subd.'inc/config_db.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string							
							  if ( strstr($data[$counter], "'FLASH_DOMAIN','".FLASH_DOMAIN."'") && isset($_POST['rtmpPath']) ) {
							  	
									$filecontent .= str_replace("'FLASH_DOMAIN','".FLASH_DOMAIN."'", "'FLASH_DOMAIN','".$_POST['rtmpPath']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'FLASH_VIDEO','".FLASH_VIDEO."'") && isset($_POST['grec'])) {
							  	
									$filecontent .= str_replace("'FLASH_VIDEO','".FLASH_VIDEO."'", "'FLASH_VIDEO','".$_POST['grec']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'APPROVE_LIVEFEEDS','".APPROVE_LIVEFEEDS."'") && isset($_POST['live']) ) {
							  	
									$filecontent .= str_replace("'APPROVE_LIVEFEEDS','".APPROVE_LIVEFEEDS."'", "'APPROVE_LIVEFEEDS','".$_POST['live']."'", $data[$counter]);
							  }
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);
					   
					   $ErrorSend=1;


					// RESET MEMBER PROFILE RATINGS
					if(isset($_POST['ratingreset']) && $_POST['ratingreset'] ==1){
					
					$DB->Update("UPDATE members SET member_rating =0");
					$DB->Update("TRUNCATE TABLE `member_rating`");

					}



				}break;		
		}
}

// REDIRECT TO THE SAME PAGE
if(isset($ErrorSend)){
	if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1";}else{$Err = $lang_members_code['no_update']."**0";}
}

if(isset($Err) && !isset($_REQUEST['d'])){

	if( isset($_POST['p']) || isset($RedirectPage) ){
	
		$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];
		
		header('location: settings.php?p='.$page.'&Err='.$Err.'&d=1');
		exit();	
	}else{
		
		header('location: settings.php?Err='.$Err.'&d=1');
		exit();
	}
}
}
function DisplayNewsletters($default="",$type="custom"){

	global $DB;
	$Extra="";

	if($type !=""){
		$Extra ="status='".$type."' AND";
	}

    $result = $DB->Query("SELECT nid, name FROM email_newsletters WHERE $Extra name !='tracking'");

    while( $new = $DB->NextRow($result) )
    {

		if($new['nid'] == $default){
			print "<option value='".$new['nid']."' selected>".$new['name']."</option>";
		}else{
			print "<option value='".$new['nid']."'>".$new['name']."</option>";
		}
		
	}
}
////////////////////////////////////////////////
############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/settings.php";

}else{

		if($PLUGINS_PAGE_TYPE =="html"){
			
			print $PLUGINS_PAGE_LINK;
			
		}elseif($PLUGINS_PAGE_TYPE =="link"){
			
			require_once (	$PLUGINS_PAGE_LINK 	);	
		}
}
print $tdata[2]["contents"]; 
$DB->Disconnect();
?>