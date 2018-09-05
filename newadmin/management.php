<?
ob_start();
$_REQUEST['n'] =7;
require_once "inc/config.php";
require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

## page access check
if(!in_array("7",$_SESSION['admin_access_level']) ) { header("location:overview.php");}

$PageLink = "management.php";
$PageLang = $admin_layout_page8;

require_once "layout.php";
############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){

if(isset($_POST['do'])){ 
 
switch ($_POST['do']) {


case "callrssData":{

 

				for($i = 1; $i < $_POST['totalFound']+1; $i++) { 
					
					if(isset($_POST['eb'. $i]) && $_POST['eb'.$i] == "on"){
					
						$EventDate = explode(" ",$_POST['st'.$i]);

						 $DB->Row("INSERT INTO `calendar_data` (`uid` ,`eventdate` ,`eventtime` ,`shortevent` , `longevent`, `type_1` ,`type_2` ,`country` ,`province` ,`city` ,`street` ,`phone` ,`email` ,`website` ,`vis` ,`approved` ,`featured` ,`recurring` ,`photo` ,`hits`)
								VALUES ('0' , '".$EventDate[0]."', '".$EventDate[1]."', '".eMeetingInput($_POST['title'.$i])."' , '".$_POST['desc'.$i]."', '".$_POST['category']."' , NULL , '".eMeetingInput($_POST['country'.$i])."' , '".eMeetingInput($_POST['reg'.$i])."' , '".eMeetingInput($_POST['city'.$i])."' , '".eMeetingInput($_POST['address'.$i])." ".$_POST['zip'.$i]."' , NULL , NULL , '".eMeetingInput($_POST['url'.$i])."' , 'all', 'yes', 'no', 'no', '', '')");
	 

					}
				}
			
				$ErrorSend=1;

} break;
		/*
			DELETE FORUM POSTS
		*/	
		case "calrss": {
				
			require_once('inc/class/EVDB.php');
			require_once('inc/rss/rss_fetch.inc');
			
			$url = $_POST['rss'];
			
			if ( $url ) {
				$rss = fetch_rss( $url );
				//echo "Channel: " . $rss->channel['title'] . "<p>";
				
				foreach ($rss->items as $item) {

				## break up the id and get the item id
				$thisLink = explode("/",$item['id']);

				// NOW LETS GET ALL THE DATA FROM EVENTFUL.COM		
		
				$app_key = EVENTFUL_KEY;
				$user     = EVENTFUL_USERNAME;
				$password = EVENTFUL_PASSWORD;
			
				//$evdb = &new Services_EVDB($app_key);
				$evdb = new Services_EVDB($app_key);
				
				if ($user and $password)
				{
				  $l = $evdb->login($user, $password);
				  
				  if ( PEAR::isError($l) )
				  {
					  print("Can't log in: " . $l->getMessage() . "\n");
				  }
				}

				//
				$THISEVENTID = $thisLink[count($thisLink)-1];

				$FF = $DB->Row("SELECT count(*) AS total FROM system_update WHERE value1='".$THISEVENTID."' LIMIT 1 ");
				
				// All method calls other than login() go through call().
				if($THISEVENTID !="" && $FF['total'] != 1){
				
								$args = array(
								  'id' => $THISEVENTID,
								);
								$event = $evdb->call('events/get', $args);
								
								if ( PEAR::isError($event) )
								{
									print("An error occurred: " . $event->getMessage() . "\n");
									print_r( $evdb );
								}
								
								// DEFINE VARIABLES
				
								$EventDate = explode(" ",$event['start_time']);
								// if(isset($event['links']['link'][0]['url'])){ $link = $event['links']['link'][0]['url']; }else{  };
								$link =$event['url'];

								// DESCRIPTION AND SHORT DESCRIPTION
								$desc = str_replace("[title]",$event['title'],$_POST['description']);
								$desc = str_replace("[url]",$event['url'],$desc);
								$desc = str_replace("[description]",$event['description'],$desc);
								$desc = str_replace("[start_time]",$event['start_time'],$desc);
								$desc = str_replace("[stop_time]",$event['stop_time'],$desc);
								$desc = str_replace("[venue_name]",$event['venue_name'],$desc);
								$desc = str_replace("[address]",$event['address'],$desc);
								$desc = str_replace("[city]",$event['city'],$desc);
								$desc = str_replace("[region]",$event['region'],$desc);
								$desc = str_replace("[postal_code]",$event['postal_code'],$desc);
								$desc = str_replace("[country]",$event['country'],$desc);
								$desc = str_replace("[country_abbr2]",$event['country_abbr2'],$desc);
								$desc = str_replace("[free]",$event['free'],$desc);
								$desc = str_replace("[price]",$event['price'],$desc);
				
								// DESCRIPTION AND SHORT DESCRIPTION
								$short = str_replace("[title]",$event['title'],$_POST['short']);
								$short = str_replace("[url]",$event['url'],$short);
								$short = str_replace("[description]",$event['description'],$short);
								$short = str_replace("[start_time]",$event['start_time'],$short);
								$short = str_replace("[stop_time]",$event['stop_time'],$short);
								$short = str_replace("[venue_name]",$event['venue_name'],$short);
								$short = str_replace("[address]",$event['address'],$short);
								$short = str_replace("[city]",$event['city'],$short);
								$short = str_replace("[region]",$event['region'],$short);
								$short = str_replace("[postal_code]",$event['postal_code'],$short);
								$short = str_replace("[country]",$event['country'],$short);
								$short = str_replace("[country_abbr2]",$event['country_abbr2'],$short);
								$short = str_replace("[free]",$event['free'],$short);
								$short = str_replace("[price]",$event['price'],$short);
				
								$DB->Row("INSERT INTO `calendar_data` (`uid` ,`eventdate` ,`eventtime` ,`shortevent` , `longevent`, `type_1` ,`type_2` ,`country` ,`province` ,`city` ,`street` ,`phone` ,`email` ,`website` ,`vis` ,`approved` ,`featured` ,`recurring` ,`photo` ,`hits`)
								VALUES ('0' , '".$EventDate[0]."', '".$EventDate[1]."', '".eMeetingInput($short)."' , '".eMeetingInput($desc)."', '".$_POST['catid']."' , NULL , '".eMeetingInput($event['country'])."' , '".eMeetingInput($event['region'])."' , '".eMeetingInput($event['city'])."' , '".eMeetingInput($event['address'])." ".$event['postal_code']."' , NULL , NULL , NULL , 'all', 'no', 'no', 'no', '', '')");
				
								// add the id to the database
								$DB->Insert("INSERT INTO `system_update` (`date` ,`value1` ,`value2` )VALUES ('".DATE_TIME."', '".$event['id']."', '')");


					}

				}
				
			}


			if(isset($_POST['calfeed']) && $_POST['calfeed'] ==1){
			
				$DB->Insert("INSERT INTO `system_settings` (`id` ,`name` ,`value1`, value2) VALUES (NULL , 'feed_calendar', '".$url."', '".$_POST['feedname']."')");
			}

			
			$ErrorSend=1;

		}break;
 


		case "installgame": {

				for($i = 1; $i < $_POST['totalrows']+1; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){				
						

						$tarfile=$_POST['id'.$i];	
						$tarfile_name=str_replace(".tar", "", $tarfile);
						$tarfile_name=str_replace("game_", "", $tarfile_name);
					
					
						// untar ALL the crap
						untar(GAME_PATH_TARS."$tarfile", GAME_PATH_TARS);
						
						@rename(GAME_PATH_TARS."$tarfile_name.swf",GAME_PATH_SWF."$tarfile_name.swf");
						@rename(GAME_PATH_TARS."{$tarfile_name}1.gif",GAME_PATH_PICS."{$tarfile_name}.gif");
						@unlink(GAME_PATH_TARS."{$tarfile_name}2.gif");
						
						if(file_exists(GAME_PATH_TARS."$tarfile_name.php")) {require(GAME_PATH_TARS."$tarfile_name.php");} else {print "The tar file is corrupted or invalid, and the game cannot be added, sorry.";}
						
						// FILE CLEANING
						if(file_exists(GAME_PATH_TARS."gamedata/$tarfile_name/$tarfile_name.txt")) {
							@mkdir(GAME_PATH_SWF."gamedata/$tarfile_name", 0777);
							@rename(GAME_PATH_TARS."gamedata/{$tarfile_name}/$tarfile_name.txt",GAME_PATH_SWF."gamedata/{$tarfile_name}/$tarfile_name.txt");
							@unlink(GAME_PATH_TARS."gamedata/$tarfile_name/v3game.txt");
							@unlink(GAME_PATH_TARS."gamedata/$tarfile_name/v32game.txt");
							@unlink(GAME_PATH_TARS."gamedata/$tarfile_name/index.html");
							@rmdir(GAME_PATH_TARS."gamedata/$tarfile_name/");
							@rmdir(GAME_PATH_TARS."gamedata/");
						}
					
					
						@unlink(GAME_PATH_TARS."{$tarfile_name}.php");
						
						
						// DATA FROM CONFIG FILE
						$gamename = $config['gtitle'];
						$about = htmlspecialchars($config['gwords'], ENT_QUOTES);
						$idname = htmlspecialchars($config['gname'], ENT_QUOTES);
						$gameheight = $config['gheight'];
						$gamewidth = $config['gwidth'];
						
						
						$addedalready = $DB->Row("SELECT count(game) AS total FROM game_games WHERE gameid= ('".$idname."') LIMIT 1");
						
						if($addedalready['total'] ==0){
						
							$DB->Insert("INSERT INTO game_games (game,gameid,gameheight,gamewidth,about,gamecat,remotelink,Champion_name,Champion_score,times_played) 
							VALUES ('".$gamename."','".$idname."','".$gameheight."','$gamewidth','$about','$thecat','$remoteurl','$champ','$champs','')");
						
						}



					}
				}
			
				$ErrorSend=1;

		} break;


		/*
			ADD CLASS CATS
		*/	
		case "calcatadd": {
				

if(strlen($_FILES['LogoUpload']['tmp_name']) > 5){
		

		$copy = copy($_FILES['LogoUpload']['tmp_name'], PATH_FILES.$_FILES['LogoUpload']['name']);

		if($copy){
				
				
				require_once(str_replace("newadmin","",dirname(__FILE__))."inc/classes/class_thumbnail.php");

				$image_stats = getimagesize(PATH_FILES.$_FILES['LogoUpload']['name']);
				$thumb = new eMeeting_Thumbnail(PATH_FILES.$_FILES['LogoUpload']['name']);
				$thumb->resize("120","120");
				//$thumb->cropFromCenter(170);
				//$thumb->crop(21,0,115,153);
				$thumb->save(PATH_FILES.$_FILES['LogoUpload']['name'],100);	
				$thumb->destruct();

				$ThisPhoto = " , icon='".$_FILES['LogoUpload']['name']."' ";
		}else{
							
				$ThisPhoto="";
						
		}

}

	if($_POST['removeicon'] ==1){
		$ThisPhoto= " , icon='' ";
	}

				if(!isset($_POST['editid'])){
				$ThisPhoto = $_FILES['LogoUpload']['name'];
					$DB->Update("INSERT INTO `calendar_types` (`name` ,`lang`,icon) VALUES ('".$_POST['name']."', '0','".$ThisPhoto."')");
					
					
				}else{
				
					$DB->Update("UPDATE `calendar_types` SET name='".$_POST['name']."', lang='".$_POST['count']."' $ThisPhoto WHERE id='".$_POST['editid']."' LIMIT 1");

				}
			
				$ErrorSend=1;
				
		}break;

		/*
			ADD CLASS CATS
		*/	
		case "classcatadd": {
				

		if(strlen($_FILES['LogoUpload']['tmp_name']) > 5){
		

		$copy = copy($_FILES['LogoUpload']['tmp_name'], PATH_FILES.$_FILES['LogoUpload']['name']);

			if($copy){
					
					
					require_once(str_replace("newadmin","",dirname(__FILE__))."inc/classes/class_thumbnail.php");
	
					$image_stats = getimagesize(PATH_FILES.$_FILES['LogoUpload']['name']);
					$thumb = new eMeeting_Thumbnail(PATH_FILES.$_FILES['LogoUpload']['name']);
					$thumb->resize("120","120");
					//$thumb->cropFromCenter(170);
					//$thumb->crop(21,0,115,153);
					$thumb->save(PATH_FILES.$_FILES['LogoUpload']['name'],100);	
					$thumb->destruct();
	
					$ThisPhoto = " , icon='".$_FILES['LogoUpload']['name']."' ";
			}else{
								
					$ThisPhoto="";
							
			}
		}

		if($_POST['removeicon'] ==1){
			$ThisPhoto= " , icon='' ";
		}

				if(!isset($_POST['editid'])){
				$ThisPhoto = $_FILES['LogoUpload']['name'];


				$CaptionArray = explode(",",$_POST['name']);
				foreach($CaptionArray as $Caption){

					if(isset($_POST['subcat'])){
					$DB->Update("INSERT INTO `class_cats` (`name` ,`lang`,icon,subId) VALUES ('".$Caption."', '0','".$ThisPhoto."','".$_POST['subcat']."')");
					}else{
					$DB->Update("INSERT INTO `class_cats` (`name` ,`lang`,icon,subId) VALUES ('".$Caption."', '0','".$ThisPhoto."','0')");
					}

				}
					
					
					
				}else{

					if(!isset($_POST['subcat'])){ $_POST['subcat']=0; }

					$DB->Update("UPDATE `class_cats` SET name='".$_POST['name']."', lang='".$_POST['count']."' $ThisPhoto WHERE id='".$_POST['editid']."' LIMIT 1");

				}
			
				$ErrorSend=1;
				
		}break;

 

		/*
			DELETE FORUM POSTS
		*/	
		case "calcatdelete": {
				
				for($i = 1; $i < $_POST['totalrows']+1; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
					
						$DB->Update("DELETE FROM class_cats WHERE id=".$_POST['id'.$i]." LIMIT 1");
						$DB->Update("DELETE FROM class_adverts WHERE cat_id=".$_POST['id'.$i]."");
					}
				}
			
				$ErrorSend=1;
		}break;
 


		case "addclass": {



if(isset($_POST['eid'])){

				if(isset($pic1) && $pic1 !=""){ $runExtra = " pic1='".$pic1."', "; }else{ $runExtra =""; }
				$DB->Update("UPDATE `class_adverts` SET pic5='".$_POST['sub_catid']."', $runExtra `cat_id` =  '".$_POST['ad_catid']."',	`title` ='".$_POST['ad_title']."',	`sub_title` ='".$_POST['ad_subtitle']."', `comments` ='".$_POST['editor']."', pic2='".$_POST['pic2']."', `date_updated` ='".DATE_NOW."' WHERE id= ('".$_POST['eid']."') LIMIT 1");

}else{

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
				`recommends`) VALUES ( 0 , '".$_POST['ad_catid']."', '".$_POST['ad_title']."', '".$_POST['ad_subtitle']."', '".$_POST['editor']."', '".DATE_NOW."', '".DATE_NOW."', '0', '".$pic1."', '".$_POST['pic2']."', '', '', '".$_POST['sub_catid']."', '', '', '', '')");


}
	$ErrorSend=1;

		} break;


		/*
			CHANGE DEFAULT FORUM
		*/	
		case "changeforum": {
										
						/* DISPLAY OTHER BOARDS IF ONE IS SELECTED*/
						if(!isset($_POST['type'])){
							return "Nothing Selected";
						}
						switch($_POST['type']){
						
							case "default": {
								$FORUM_DEFAULT 	= "yes";
								$FORUM_VB 		= "no";
								$FORUM_PHPBB 	= "no";
							} break;

							case "phpbb": {
								$FORUM_DEFAULT 	= "no";
								$FORUM_VB 		= "no";
								$FORUM_PHPBB 	= "yes";
							} break;
							
							case "vbull": {
								$FORUM_DEFAULT 	= "no";
								$FORUM_VB 		= "yes";
								$FORUM_PHPBB 	= "no";
							} break;
							
						}
						
							//die("DEFAULT:".$FORUM_DEFAULT." VB:".$FORUM_VB." PHPBB:".$FORUM_PHPBB);
							//die(print_r($_POST));
						$filename = str_replace("newadmin","",dirname(__FILE__)).'inc/config.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the includes/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string
														
							  if ( strstr($data[$counter], "'FORUM_VB_ENABLED','".FORUM_VB_ENABLED."'") ) {
							 	
									$filecontent .= str_replace("'FORUM_VB_ENABLED','".FORUM_VB_ENABLED."'", "'FORUM_VB_ENABLED','".$FORUM_VB."'", $data[$counter]);
							  }							  
							  elseif ( strstr($data[$counter], "'FORUM_VB_LINK','".FORUM_VB_LINK."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_VB_LINK','".FORUM_VB_LINK."'", "'FORUM_VB_LINK','".$_POST['vb_url']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'FORUM_VB_DATABASE','".FORUM_VB_DATABASE."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_VB_DATABASE','".FORUM_VB_DATABASE."'", "'FORUM_VB_DATABASE','".$_POST['vb_database']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'FORUM_VB_ROOTPATH','".FORUM_VB_ROOTPATH."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_VB_ROOTPATH','".FORUM_VB_ROOTPATH."'", "'FORUM_VB_ROOTPATH','".$_POST['vb_path']."'", $data[$counter]);
							  }	
							  
							  elseif ( strstr($data[$counter], "'FORUM_PHPBB_DATABASE','".FORUM_PHPBB_DATABASE."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_PHPBB_DATABASE','".FORUM_PHPBB_DATABASE."'", "'FORUM_PHPBB_DATABASE','".$_POST['phpbb_database']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'FORUM_PHPBB_ENABLED','".FORUM_PHPBB_ENABLED."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_PHPBB_ENABLED'','".FORUM_PHPBB_ENABLED."'", "'FORUM_PHPBB_ENABLED','".$FORUM_PHPBB."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'FORUM_PHPBB_LINK','".FORUM_PHPBB_LINK."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_PHPBB_LINK','".FORUM_PHPBB_LINK."'", "'FORUM_PHPBB_LINK','".$_POST['pbpbb_url']."'", $data[$counter]);
							  }		
							  elseif ( strstr($data[$counter], "'FORUM_PHPBB_ROOTPATH','".FORUM_PHPBB_ROOTPATH."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_PHPBB_ROOTPATH','".FORUM_PHPBB_ROOTPATH."'", "'FORUM_PHPBB_ROOTPATH','".$_POST['phpbb_path']."'", $data[$counter]);
							  }	
							  
							  elseif ( strstr($data[$counter], "'FORUM_DEFAULT_ENABLED','".FORUM_DEFAULT_ENABLED."'") ) {
							  	
									$filecontent .= str_replace("'FORUM_DEFAULT_ENABLED','".FORUM_DEFAULT_ENABLED."'", "'FORUM_DEFAULT_ENABLED','".$FORUM_DEFAULT."'", $data[$counter]);
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
			DELETE FORUM POSTS
		*/	
		case "articlerss": {
				
				include "inc/class/lastRSS.php";
				$rss = new lastRSS;
				$rss->cache_dir = '';
				$rss->cache_time = 0;
				$rss->cp = 'US-ASCII';
				$rss->date_format = 'l';
				
				$count=1;
				
				if ($rs = $rss->get($_POST['rss'])) {
				
				
						foreach($rs['items'] as $item) {		
						
							$item['title'] = str_replace("&#60;","<",$item['title']);
							$item['link'] = str_replace("&#60;","<",$item['link']);
							$item['description'] = str_replace("&#60;","<",$item['description']);
							$item['description'] = str_replace('clear="all"',"",$item['description']);
							
							$DB->Insert("INSERT INTO `articles` (`id` ,`cat_id` ,`date` ,`title` ,`content` ,`views` ,`short`, link ) VALUES (NULL , '".$_POST['catid']."', '".date("Y-m-d")."', '".eMeetingInput($item['title'])."', '".eMeetingInput($item['description'])."', '0', '".eMeetingInput($item['description'])."', '".eMeetingInput($item['link'])."')");
						
							$DB->Update("UPDATE `articles_cat` SET count=count+1 WHERE id='".$_POST['catid']."'");	
							$count++;
						}
				
				}else {    
				
					$Err = "It's not possible to reach RSS file..";
					
				} 
			
				$ErrorSend=1;
		}break;
 
		
 

 
		
 
		/*
			GROUP ADD CAT
		*/	
		case "groupaddcat": {


if(strlen($_FILES['LogoUpload']['tmp_name']) > 5){
		

		$copy = copy($_FILES['LogoUpload']['tmp_name'], PATH_FILES.$_FILES['LogoUpload']['name']);

		if($copy){
				
				
				require_once(str_replace("newadmin","",dirname(__FILE__))."inc/classes/class_thumbnail.php");

				$image_stats = getimagesize(PATH_FILES.$_FILES['LogoUpload']['name']);
				$thumb = new eMeeting_Thumbnail(PATH_FILES.$_FILES['LogoUpload']['name']);
				$thumb->resize("120","120");
				$thumb->cropFromCenter(170);
				$thumb->crop(21,0,115,153);
				$thumb->save(PATH_FILES.$_FILES['LogoUpload']['name'],100);	
				$thumb->destruct();

				$ThisPhoto= $_FILES['LogoUpload']['name'];
		}else{
							
				$ThisPhoto="";
						
		}
}
				
				if(isset($_POST['editid'])){
				
					$DB->Update("UPDATE groups_cats SET name='".$_POST['title']."', photo='".$ThisPhoto."', lang='".$_POST['lang']."' WHERE id=".$_POST['editid']);
					
				}else{
				
					$DB->Update("INSERT INTO `groups_cats` (`name` ,`lang`,photo)VALUES ('".$_POST['title']."', '".$_POST['lang']."','".$ThisPhoto."')");
					
				}	
					
				$ErrorSend=1;
				
		} break;

 

		/*
			DELETE FORUM POSTS
		*/	
		case "articleadd": {

				if(isset($_POST['editid'])){
							
						// UPDATE CAT TOTALS
						$oldCat = $tt = $DB->Row("SELECT cat_id FROM articles WHERE id='".$_POST['editid']."'");
						$DB->Update("UPDATE `articles_cat` SET count=count-1 WHERE id='".$oldCat['cat_id']."'");
						
						$DB->Update("UPDATE articles SET link='".$_POST['link']."', cat_id='".$_POST['catid']."', date='".date("Y-m-d")."', title='".eMeetingInput($_POST['title'])."', content='".eMeetingInput($_POST['editor'],true)."', views='".$_POST['views']."', short='".eMeetingInput($_POST['short'])."' WHERE id='".$_POST['editid']."' LIMIT 1");					
						$DB->Update("UPDATE `articles_cat` SET count=count+1 WHERE id='".$_POST['catid']."'");
				}else{
						
						$DB->Insert("INSERT INTO `articles` (`id` ,`cat_id` ,`date` ,`title` ,`content` ,`views` ,`short`, link) VALUES (NULL , '".$_POST['catid']."', '".date("Y-m-d")."', '".eMeetingInput($_POST['title'])."', '".eMeetingInput($_POST['editor'],true)."', '0', '".eMeetingInput($_POST['short'])."', '".$_POST['link']."')");
						
						$DB->Update("UPDATE `articles_cat` SET count=count+1 WHERE id='".$_POST['catid']."'");			

				}
									
				$ErrorSend=1;
				
		}break;
				
		/*
			DELETE FORUM POSTS
		*/	
		case "catadd": {
				
				if(!isset($_POST['editid'])){
				
					$DB->Update("INSERT INTO `articles_cat` (`name` ,`count`) VALUES ('".$_POST['name']."', '0');");
					
					
				}else{
				
					$DB->Update("UPDATE `articles_cat` SET name='".$_POST['name']."', count='".$_POST['count']."' WHERE id='".$_POST['editid']."' LIMIT 1");

				}
			
				$ErrorSend=1;
				
		}break;
 
 
				
		/*
			DELETE FORUM POSTS
		*/	
		case "caldelete": {
				
				for($i = 1; $i < $_POST['NumRows']; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
					
						$DB->Update("DELETE FROM calendar_data WHERE id='".$_POST['id'.$i]."' LIMIT 1");
						$DB->Update("DELETE FROM calendar_attending WHERE event_id='".$_POST['id'.$i]."'");
								
					
					}
				}
			
				$ErrorSend=1;
		}break;
				
 
		 
		case "updatelistorder": {
				
				for($i = 1; $i < $_POST['TotalOrder']; $i++) { 
					
					
					if(isset($_POST['b'. $i]) && $_POST['b'.$i] == "on"){
					
						$DB->Insert("UPDATE field_list_value SET fvOrder= '".$_POST['order'.$i]."', `default` = 'selected' WHERE id=".$_POST['orderid'.$i] ." LIMIT 1");
						
					}else{		
								
			    		$DB->Insert("UPDATE field_list_value SET fvOrder= '".$_POST['order'.$i]."', `default` = 'no' WHERE id=".$_POST['orderid'.$i] ." LIMIT 1");
					}
				}
			
				header("location:management.php?p=fieldlist&id=".$_POST['editid']."&list=1&Err=".$lang_members_code['update']);
				exit();
			
		}break;

 
		
		case "fieldpages": {
				
				for($i = 1; $i < $_POST['TotalOrder']; $i++) { 
		
			    	if(isset($_POST['b'. $i]) && $_POST['b'.$i] == "on"){
						$DB->Update("UPDATE field SET browsepage='yes' WHERE fid=".$_POST['bid'.$i]);			
                	}else{
						$DB->Update("UPDATE field SET browsepage='no' WHERE fid=".$_POST['bid'.$i]);	
					}
				}

				for($i = 1; $i < $_POST['TotalOrder']; $i++) { 
		
			    	if(isset($_POST['r'. $i]) && $_POST['r'.$i] == "on"){
						$DB->Update("UPDATE field SET required=1 WHERE fid=".$_POST['rid'.$i]);			
                	}else{
						$DB->Update("UPDATE field SET required=0 WHERE fid=".$_POST['rid'.$i]);	
					}
				}
				
				for($i = 1; $i < $_POST['TotalOrder']; $i++) { 
		
			    	if(isset($_POST['m'. $i]) && $_POST['m'.$i] == "on"){
						$DB->Update("UPDATE field SET matchpage='yes' WHERE fid=".$_POST['mid'.$i]);			
                	}else{
						$DB->Update("UPDATE field SET matchpage='no' WHERE fid=".$_POST['mid'.$i]);	
					}
				}			
			
				$ErrorSend=1;
			
		}break;
		
		case "fielddelete": {
				
				for($i = 1; $i < $_POST['TotalOrder']; $i++) { 
		
			    	if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){

					$fT = $DB->Row("SELECT fName FROM field WHERE fid  = '".$_POST['id'.$i]."' LIMIT 1");
					$DB->Insert("ALTER TABLE `members_data` DROP ".$fT['fName']);
					$DB->Insert("DELETE FROM field WHERE fid  = '".$_POST['id'.$i]."' LIMIT 1");
					$DB->Insert("DELETE FROM field_caption WHERE Cid  = '".$_POST['id'.$i]."' LIMIT 1");
					$DB->Insert("DELETE FROM field_list_value WHERE fvFid  = '".$_POST['id'.$i]."'");		

					// RESET EVERYONES MATCH RESULTS
					$DB->Insert("UPDATE members_privacy SET match_array=''");
										
                	}
				}
			
				$ErrorSend=1;
			
		}break;
		
		case "fieldchangecaption": {
				
				$DB->Update("UPDATE field SET groupid='".$_POST['groupid']."' WHERE fid=".$_POST['cid']);
				
				$DB->Update("UPDATE field SET groupid_1='".$_POST['groupid1']."', groupid_2='".$_POST['groupid2']."'  WHERE fid=".$_POST['cid']);
				$ErrorSend=1;
					
		} break;
			
			case "fieldadd": {


					if(isset($_POST['editid'])){ // update field row

					$DB->Update("UPDATE field SET fType='".$_POST['f3']."', groupid='".$_POST['groupid']."' WHERE fid='".$_POST['editid']."' LIMIT 1");
					
					}else{


							// ADD AN ARRANGE OF FIELDS THAT ARE ACCEPTED AS IS
							$fieldNames = array("postcode", "age", "gender", "location", "headline", "description","lookingfor", "country");
							if (in_array($_POST['f2'], $fieldNames)) {
								
								$newfield = $_POST['f2'];
							
							}else{
							
								/* Lets strip all the spaces from the field entry */
								if(strlen($_POST['f1']) > 1){							
									$newfield = $_POST['f1'];
								}else{
									$newfield = "em_".CreateRowName();
								}
							}							
							/* Alter the users table for the new table row */
							if($_POST['f3'] == 1)
							{
								$AlterTable ="ALTER TABLE `members_data` ADD `".$newfield."` VARCHAR( 255 )";
							}elseif($_POST['f3'] == 2){							
								$AlterTable ="ALTER TABLE `members_data` ADD `".$newfield."` TEXT ";
							}elseif($_POST['f3'] == 3){
								$AlterTable ="ALTER TABLE `members_data` ADD `".$newfield."` INT( 3 )";

							}elseif($_POST['f3'] == 9){
								$AlterTable ="ALTER TABLE `members_data` ADD `".$newfield."` INT( 3 )";	
							}elseif($_POST['f3'] == 10){
								$AlterTable ="ALTER TABLE `members_data` ADD `".$newfield."` INT( 3 )";	
								
							}elseif($_POST['f3'] == 4){
								$AlterTable ="ALTER TABLE `members_data` ADD `".$newfield."` INT( 1 )";
							}
							// MULTIPLE CHECK BOX AND AGE FIELD
							elseif($_POST['f3'] == 5 || $_POST['f3'] == 7){
								$AlterTable ="ALTER TABLE `members_data` ADD `".$newfield."` VARCHAR( 100 )";
							}
							$DB->Update($AlterTable);
							
							// PLACE UNDER GROUP TITLE
							if($_POST['groupid'] ==0){
								$newtype = $DB->Row("SELECT id FROM field_groups LIMIT 1");
								$_POST['groupid'] = $newtype['id'];
							}
							
							/* Add a new Row into the database */
							if(!isset($_POST['req'])){ $_POST['req'] =0; }
							$DB->Insert("INSERT INTO `field` (`fName` , `fType` , `fOrder` , `fGender`, groupid, required ) VALUES ('".$newfield."', '".$_POST['f3']."', '1', '".$_POST['f4']."', '".$_POST['groupid']."', '".$_POST['req']."')");
							$GenerateID = $DB->InsertID();
							/*  Remove Row from database*/
							$capnewlang = str_replace(".php","",$_POST['lang']);
							$DB->Insert("INSERT INTO `field_caption` (`Cid` , `lang` , `caption`, `description`, `match` )	VALUES ('".$GenerateID."', '$capnewlang', '".$_POST['f2']."','','no')");
							$DB->Insert("INSERT INTO `field_caption` (`Cid` , `lang` , `caption`, `description`, `match` )	VALUES ('".$GenerateID."', '$capnewlang', '".$_POST['f2']."','','yes')");
							
							//ADD LINKED LIST 
							/*if($_POST['f3'] == 10){
								$DB->Row("INSERT INTO `field_linked` (`fid1` ,`fid2`) VALUES ('".$GenerateID."', '".$_POST['linkedID']."')");
							}*/
							
					}

							$ErrorSend=1;		
							
			}break;
			case "fieldaddgroup":	  {	
								
								if($_POST['private'] == ""){
										$_POST['private'] =0;
									}		
							
							if(!isset($_POST['eid'])){
									$DB->Insert("INSERT INTO `field_groups` ( caption , private)VALUES ('".$_POST['caption']."', '".$_POST['private']."')");
									
								}else{
									$DB->Update("UPDATE field_groups SET caption='".$_POST['caption']."' , private='".$_POST['private']."' WHERE id=".$_POST['eid']);
									
								}
								
								$ErrorSend=1;
								
			}break;
			case "fieldaddlist":	{ 


							
					$capnewlang = str_replace(".php","",$_POST['lang']);

					if(isset($_POST['linked_id'])){$linkedID = $_POST['linked_id']; $LinkURL="&linkID=".$_POST['LASTLINKEDID']; }else{ $linkedID=""; $LinkURL=""; }
							
							
					if($_POST['capEdit'] != 0){
								
								$DB->Insert("INSERT INTO `field_list_value` (fvid, `fvFid` , `fvCaption`, fvOrder, lang ) 
								VALUES ('".$_POST['capEdit']."', '".$_POST['editid']."', '".$_POST['caption']."', '".$_POST['order']."', '".$capnewlang."')");

							
					}else{						

							$CaptionArray = explode(",",$_POST['caption']);
							foreach($CaptionArray as $Caption){
							
								$DB->Insert("INSERT INTO `field_list_value` (`fvid` ,`fvFid` ,`fvCaption` ,`fvOrder` ,`lang` ,`default`,linked_cap_id) 
								VALUES ('', '".$_POST['editid']."', '".trim($Caption)."', '".$_POST['order']."', '".trim($capnewlang)."', 'no','".$linkedID."')");
								$userid = $DB->InsertID();
								$DB->Update("UPDATE field_list_value SET fvid='".$userid."' WHERE id='".$userid."' LIMIT 1"); // FIX FOR OLD DATABASE
							}

						 	
		 
					}
							
					header("location: management.php?p=fieldlist&id=".$_POST['editid']."&list=1&se=1".$LinkURL);	exit();	

			} break;
			
			/*case "fieldupdatelinked":	{
			
				$DB->Update("UPDATE field_linked SET fid2 ='".$_POST['linkedID']."' WHERE fid1='".$_POST['fid']."' LIMIT 1");
				$ErrorSend=1;
				
			} break;*/
			
			case "fieldaddcaption":	{

							/*  Remove Row from database*/
							$capnewlang = str_replace(".php","",$_POST['lang']);
							$DB->Insert("INSERT INTO `field_caption` (`Cid` , `lang` , `caption`, `description`, `match` )
							VALUES ('".$_POST['cid']."', '$capnewlang', '".$_POST['caption']."', '".$_POST['description']."', 'yes')");

							$capnewlang = str_replace(".php","",$_POST['lang']);
							$DB->Insert("INSERT INTO `field_caption` (`Cid` , `lang` , `caption`, `description`, `match` )
							VALUES ('".$_POST['cid']."', '$capnewlang', '".$_POST['caption']."', '".$_POST['description']."', 'no')");
							
							header("location: management.php?p=fieldedit&id=".$_POST['cid']."&se=1"); 
								
			} break;
			case "fieldupdateorder":	{ 
							/*  Update database*/
								for($i = 1; $i < $_POST['TotalOrder']; $i++) { 
									if(isset($_POST['checkvalue'.$i])){
										$_POST['checkvalue'.$i] =1;
									}else{
										$_POST['checkvalue'.$i] =0;
									}
									//die("UPDATE field SET fOrder = ".$_POST['ordervalue'.$i].", required=".$_POST['checkvalue'.$i]." WHERE fid = ".$_POST['orderid'.$i]."");								
									$DB->Insert("UPDATE field SET fOrder = ".$_POST['ordervalue'.$i].", required=".$_POST['checkvalue'.$i]." WHERE fid = ".$_POST['orderid'.$i]."");
									
									//print $RunThisQuery."<p>".$_POST['TotalOrder'];
								}
								
								$ErrorSend=1;
			} break;
 
					
			case "wordadd":	  {
							## UPDATE DATABASE
							$DB->Insert("INSERT INTO `badwords` (`word` )VALUES ('".$_POST['word']."')");
							
							$ErrorSend=1;													
														
			 }  break;
			 		
			case "faqadd":	  {
							/* Add a new Row into the database */
							## remove all the post data tag
							$today_date=date("y-m-d");
							$DB->Insert("INSERT INTO `faq` ( `date` , `subject` , `content` )VALUES ('".$today_date."', '".$_POST['n1']."', '".$_POST['editor']."')");

							$ErrorSend=1;
						
			 }  break;

			case "faqedit":	{ 
							/*  Update database*/## remove all the post data tags
							$today_date=date("y-m-d");
							$DB->Update("UPDATE faq SET `subject` = '".$_POST['n1']."' , date='".$today_date."', `content` = '".$_POST['editor']."' WHERE id  = ".$_POST['eid']);
							
							$ErrorSend=1;		
			} break;
			
 
			
		case "chatadd": {
			
				if(isset($_POST['editid'])){
					
					$DB->Update("UPDATE chatroom_rooms SET room_name='".$_POST['r1']."', room_pass='".$_POST['r3']."' WHERE room_id=".$_POST['editid']);
					
				
				}else{
					$DB->Update("INSERT INTO `chatroom_rooms` (`room_name` ,`room_count` ,`room_pass`)VALUES ('".$_POST['r1']."', '0', '".$_POST['r3']."')");
					
					
				}
				
				$ErrorSend=1;
					
				
		} break;
				
				case "forumedit":	  { 


						if(strlen($_FILES['LogoUpload']['tmp_name']) > 5){
								
						
								$copy = copy($_FILES['LogoUpload']['tmp_name'], PATH_FILES.$_FILES['LogoUpload']['name']);
						
								if($copy){
										
										
										require_once(str_replace("newadmin","",dirname(__FILE__))."inc/classes/class_thumbnail.php");
						
										$image_stats = getimagesize(PATH_FILES.$_FILES['LogoUpload']['name']);
										$thumb = new eMeeting_Thumbnail(PATH_FILES.$_FILES['LogoUpload']['name']);
										$thumb->resize("80","80");
										$thumb->cropFromCenter(170);
										$thumb->crop(21,0,115,153);
										$thumb->save(PATH_FILES.$_FILES['LogoUpload']['name'],100);	
										$thumb->destruct();
						
										$ThisPhoto= WEB_PATH_FILES.$_FILES['LogoUpload']['name'];
$extra="forum_icon='".$ThisPhoto."',";
								}else{
													
										
$extra="";
												
								}
						}

							/*  Update database*/
							$RunThisQuery = "UPDATE forum_forums SET $extra `forum_name` = '".$_POST['f1']."',
							`forum_desc` = '".$_POST['f2']."'
							WHERE `forum_id` =".$_POST['fid']." LIMIT 1";
							$DB->Insert($RunThisQuery);
							
							$ErrorSend=1;
							
				}break;
				case "forumadd":	  { 

						if(strlen($_FILES['LogoUpload']['tmp_name']) > 5){
								
						
								$copy = copy($_FILES['LogoUpload']['tmp_name'], PATH_FILES.$_FILES['LogoUpload']['name']);
						
								if($copy){
										
										
										require_once(str_replace("newadmin","",dirname(__FILE__))."inc/classes/class_thumbnail.php");
						
										$image_stats = getimagesize(PATH_FILES.$_FILES['LogoUpload']['name']);
										$thumb = new eMeeting_Thumbnail(PATH_FILES.$_FILES['LogoUpload']['name']);
										$thumb->resize("80","80");
										$thumb->cropFromCenter(170);
										$thumb->crop(21,0,115,153);
										$thumb->save(PATH_FILES.$_FILES['LogoUpload']['name'],100);	
										$thumb->destruct();
						
										$ThisPhoto= WEB_PATH_FILES.$_FILES['LogoUpload']['name'];
								}else{
													
										$ThisPhoto="";
												
								}
						}



							if (get_magic_quotes_gpc()==1) {
									 $Message = $_POST['f1'];
									 $Description = $_POST['f2'];							
									} else {
									 $Message = addslashes($_POST['f1']);
									 $Description = addslashes($_POST['f2']);														
								}


							$RunThisQuery = "INSERT INTO `forum_forums` ( `forum_id` , `forum_name` , `forum_desc` , `forum_order` , `forum_icon` , `topics_count` , `posts_count` , `forum_group` )
							VALUES (
							'', '".$Message."', '".$Description."', '0', '".$ThisPhoto."', '0', '0', '')";
							$DB->Insert($RunThisQuery);
							
							$ErrorSend=1;


				}break;
			 
				
				case "forumeditpost": {
				
					$DB->Update("UPDATE forum_posts SET post_text='".$_POST['text']."' WHERE post_id=".$_POST['post_id']);
					
					$ErrorSend=1;
				
				} break;
				
				case "forumaddcat": {
				
				if(isset($_POST['editid'])){
				
					$DB->Update("UPDATE groups_cats SET name='".$_POST['title']."', lang='".$_POST['lang']."' WHERE id=".$_POST['editid']);
										
				}else{
					$DB->Update("INSERT INTO `groups_cats` (`name` ,`lang`)VALUES ('".$_POST['title']."', '".$_POST['lang']."')");
					

				}	
					$ErrorSend=1;
				
				} break;	
				
							
			case "polladd": {
			
				if($_POST['active'] == 'on'){	$status = 'active';				}else{					$status = 'disabled';				}
				
				
				if(isset($_POST['eid'])){
					$DB->Update("UPDATE poll_desc SET polltitle='".$_POST['pollname']."' WHERE pollid='".$_POST['eid']."' LIMIT 1");
					for ($i = 1; $i <= $_POST['total']; $i ++) {
						$DB->Update("UPDATE poll_data SET polltext='".$_POST['q'. $i]."' WHERE pollid='".$_POST['eid']."' AND voteid='".$i."' LIMIT 1");
					}				
				}else{
					$DB->Update("INSERT INTO poll_desc(  polltitle, timestamp, votecount, STATUS) VALUES (  '".$_POST['pollname']."', now(), '', '".$status."')");
					$PollID = $DB->InsertID();
					for ($i = 1; $i <= $_POST['total']; $i ++) {
						$DB->Update("INSERT INTO poll_data(pollid, polltext, voteid) VALUES ('$PollID', '".$_POST['q'. $i]."', '$i')");
					}
				}
				
				$ErrorSend=1;
				
			} break;
			
			case "pollvote": {
			
				$DB->Update("UPDATE poll_data SET votecount = votecount + 1 WHERE voteid = '".$_POST['voteid']."' AND pollid = '".$_POST['pollid']."'");
				
				$ErrorSend=1;
				
			} break;
			
			case "editpost": {
				
					$DB->Update("UPDATE forum_posts SET post_text='".$_POST['text']."' WHERE post_id=".$_POST['post_id']);
					
					$ErrorSend=1;
				
			} break;
				
			
			case "addcal": {

					if ($_POST['time'] == ''){ $eventtime = '25:00:00'; }else{$eventtime = $_POST['time'].':00';}
					  
					$eventdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
					  
					$query = "INSERT INTO `calendar_data` (`uid` ,`eventdate` ,`eventtime` ,`shortevent` ,`longevent` ,`type_1` ,`type_2` ,`country` ,`province` ,`city` ,`street` ,`phone` ,`email` ,`website` ,`vis` ,`approved`)VALUES ('".$_POST['mem_uid']."', '".$eventdate."', '".$eventtime."', '".$_POST['name']."', '".$_POST['comment']."', '".$_POST['category']."', '', '".$_POST['country']."', '".$_POST['state']."', '".$_POST['town']."', '".$_POST['street']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['website']."', '".$_POST['vis']."', 'no')";
					
					$DB->Update($query);
					
					$ErrorSend=1;
					
			} break;
					
			case "editcal": {


			if(strlen($_FILES['LogoUpload']['tmp_name']) > 5){
					
			
					$copy = copy($_FILES['LogoUpload']['tmp_name'], PATH_FILES.$_FILES['LogoUpload']['name']);
			
					if($copy){
							
							
							require_once(str_replace("newadmin","",dirname(__FILE__))."inc/classes/class_thumbnail.php");
			
							$image_stats = getimagesize(PATH_FILES.$_FILES['LogoUpload']['name']);
							$thumb = new eMeeting_Thumbnail(PATH_FILES.$_FILES['LogoUpload']['name']);
							$thumb->resize("120","120");
							//$thumb->cropFromCenter(170);
							//$thumb->crop(21,0,115,153);
							$thumb->save(PATH_FILES.$_FILES['LogoUpload']['name'],100);	
							$thumb->destruct();
			
							$ThisPhoto = " , photo='".$_FILES['LogoUpload']['name']."&t=f' ";
					}else{
										
							$ThisPhoto="";
									
					}
			
			}
 
			if($_POST['removeicon'] ==1){
				$ThisPhoto= " , photo='' ";
			}

					if ($_POST['time'] == ''){ $eventtime = '25:00:00'; }else{$eventtime = $_POST['time'].':00';}
					
					$eventdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
					  
					$query = "UPDATE `calendar_data` SET `uid`='".$_POST['mem_uid']."' , `eventdate`='".$eventdate."' ,`eventtime`='".$eventtime."' ,`shortevent`='".$_POST['name']."' ,`longevent`='".$_POST['comment']."' ,`type_1`='".$_POST['category']."' ,`type_2`='".$_POST['subcategory']."' ,`country` ='".$_POST['country']."' ,`province` = '".$_POST['state']."' ,`city`='".$_POST['town']."' ,`street` ='".$_POST['street']."',`phone`='".$_POST['phone']."' ,`email`='".$_POST['email']."' ,`website` ='".$_POST['website']."',`vis` ='".$_POST['vis']."',`approved`='yes' ".$ThisPhoto." WHERE id='".$_POST['eid']."' LIMIT 1";
					
					$result = $DB->Insert($query);
					
					$ErrorSend=1;
								
			} break;
		}
}
// REDIRECT TO THE SAME PAGE
if(isset($_GET['se'])){
//$ErrorSend=1;
}
if(isset($ErrorSend)){
	if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1";}else{$Err = $lang_members_code['no_update']."**0";}
}
if(isset($Err) && !isset($_REQUEST['d'])){

	if( isset($_POST['p']) || isset($RedirectPage) ){
	
		$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];
		
		header('location: management.php?p='.$page.'&Err='.$Err.'&d=1');
		exit();	
	}else{
		
		header('location: management.php?Err='.$Err.'&d=1');
		exit();
	}
}
}
############################################################
#################### FUNCTIONS #############################
function GetGamesInstall(){

	$count=1;
$ext = array("tar");
	$files = array();
	$dir =  GAME_PATH_TARS;
	print GAME_PATH_TARS;

// Open a known directory, and proceed to read its contents
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
				for($i=0;$i<sizeof($ext);$i++){
					if(strstr($file, ".".$ext[$i])){

						print "<tr>
							<td><input name='d".$count."' type='checkbox' value='on'><input type=hidden value='".$file."' name=id".$count." class='hidden'></td>			
							<td>".$file."</td>
							<td></td>
						</tr>";
						$count++;

					}
				}}
		
				closedir($dh);
			}
		}else{
			print "Directory not set";
		}

	
	return $count;

}
function GetGames(){

	global $DB;
	$count=1;

    $result = $DB->Query("SELECT * FROM game_games ORDER BY times_played DESC");

    while( $group = $DB->NextRow($result) )
    {
	
		print "<tr>
				<td><input name='d".$count."' type='checkbox' value='on'><input type=hidden value='".$group['gameid']."' name=id".$count." class='hidden'></td>			
				<td><img src='".GAME_PATH_PICS.$group['gameid'].".gif' align='absmiddle'>".$group['game']."</td>
				<td>".$group['about']."</td>
<td>".$group['times_played']."</td>
			</tr>";
		$count++;
	}
	
	return $count;

}


function EditThisClass($id){
	
	 global $DB;
	
	 $result = $DB->Row("SELECT class_adverts.*,class_cats.name AS cat_name FROM class_adverts INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) WHERE class_adverts.id= ( '".$id."' ) ORDER BY class_adverts.date_added LIMIT 1");
	 
	 return $result;
}
function EditThisClassCat($id){
	
	 global $DB;
	
	 $result = $DB->Row("SELECT class_cats.name  FROM class_cats  WHERE class_cats.id= ( '".$id."' )  LIMIT 1");
	 
	 return $result;
}
 
function CreateRowName($Lenght = 2) { 
		  $name="";
		  $salt = "abchefghjkmnpqrstuvwxyz0123456789ABCDEFGH1JKLMNOPQRSTUVWXYZ"; 
		  srand((double)microtime()*1000000); 
			  $i = 0; 
			  while ($i <= $Lenght) { 
					$num = rand() % 33; 
					$tmp = substr($salt, $num, 1); 
					$name = $name . $tmp; 
					$i++; 
			  }
			  
			  return $name.gmdate("Ymd");
}


function EditThis($id){
	
	 global $DB;
	
	 $result = $DB->Row("SELECT * FROM calendar_data WHERE id='".$id."' LIMIT 1");
	 
	 return $result;
}

function activatePoll($pollid) {

	global $DB;
	
	$deactivate_poll = $DB->Update("UPDATE poll_desc SET status = '' WHERE status = 'active'");
	$activate_poll = $DB->Update("UPDATE poll_desc SET status = 'active' WHERE pollid = '$pollid'");
}
 
function pollResults($id) {

		global $DB;
		$count =1;
		$pollt = $DB->Row("SELECT polltitle FROM poll_desc WHERE pollid = '$id'");
		$pollvote = $DB->Row("SELECT SUM(votecount) AS votecount FROM poll_data WHERE pollid = '$id'");
		$result = $DB->Query("SELECT polltext, votecount FROM poll_data WHERE pollid = '$id' AND polltext <> '' ORDER BY votecount DESC");
		
		echo "<li><b>".$pollt['polltitle']."</b></li>";
   		 while( $poll = $DB->NextRow($result) )
    	{
		
			if ($poll['votecount'] == 0) {
			
					$tmp_votecount = 1;
			
			}else {
					$tmp_votecount = $pollvote['votecount']; // ?
			}
			$vote_percents = number_format(($poll['votecount'] / $tmp_votecount * 100), 2);
			$image_width = intval($vote_percents * 3);
			print "<li><label>".$poll['polltext']."</label> ".$poll['votecount']." votes. ($vote_percents %)</li>";
			$count++;
		}
		if ($count > 1) {
		
			
			echo "<li><label>Total votes:</label> ".$pollvote['votecount']."</li>";
		}	
}

function DisplayPollForm($id) {
		
		global $DB;
		$pollt = $DB->Row("SELECT polltitle FROM poll_desc WHERE pollid = '$id'");
		print "<legend>".$pollt['polltitle']."</legend>";
		$result = $DB->Query("SELECT pollid, polltext, voteid FROM poll_data WHERE pollid = '$id' ORDER BY voteid");

   		 while( $poll = $DB->NextRow($result) )
    	{
				if (!empty($poll['polltext'])) {
					print "<lable><input type=\"radio\" class='radio' name=\"voteid\" value=\"".$poll['voteid']."\" /> ".$poll['polltext']." ";
					print "<input type=\"hidden\" class='hidden' name=\"pollid\" id=\"pollid\" value=\"".$poll['pollid']."\" /></label><br><br>";
				}
		}
		
}
 

 

function GetForumData($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM forum_posts WHERE post_id=".$id);
	
	return $result;

}

function GetPollData($id){

	global $DB;
	
	$poll_array=array();
	$count=1;
    $result = $DB->Query("SELECT polltitle, polltext FROM poll_data, poll_desc WHERE poll_desc.pollid = poll_data.pollid AND  poll_data.pollid= ( '".$id."' ) ORDER BY voteid");
	
	while( $poll = $DB->NextRow($result) )
    {
		
		$poll_array[$count]['title'] = $poll['polltitle'];
		$poll_array[$count]['caption'] = $poll['polltext'];
		$count++;
	}
	return $poll_array;
}
function GetForum($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM forum_forums WHERE forum_id=".$id);
	
	return $result;
}

 
function Getcrn($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM chatroom_rooms WHERE room_id=".$id." LIMIT 1");
	
	return $result;
}

function GetFile($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM faq WHERE id=".$id." LIMIT 1");
	
	return $result;
}


function DisplayFieldGroups(){

	global $DB;
	$count=1;

	$fieldArray = array('age','location','headline','country','description','gender','postcode','zipcode','em_85820081128');

		
    $result = $DB->Query("SELECT * FROM field_groups ORDER BY forder ASC");

    while( $groups = $DB->NextRow($result) )
    {	
		print '<div id="response_fieldupdate" class="responce_alert"></div><div class="bar_save" style="padding:5px;  background:#efefef;  font-size:14px; color:#666666; cursor:pointer;" onClick="javascript:idShowHide(\'group_'.$groups['id'].'\');idShowHide(\'options\')" >
 ';
		print '<b><img src="inc/images/icons/resultset_next.png" align="absmiddle"> '.$groups['caption'].'</b> </div>';
		
 	   
		   	print '<table class="widefat" style="display:none; width:600px; background:#eeeeee;" id="group_'.$groups['id'].'">
					<thead>
					  <tr> 
					    <th style="width:15px;"></th>
						<th style="width:250px;">Field Name</th>						
						<th>Browse</th>
						<th>Register</th>
						<th>Match</th>							
						<th>Order</th>
					  </tr>
					</thead><tbody>';
					
			    $result1 = $DB->Query("SELECT * FROM field WHERE groupid='".$groups['id']."' ORDER BY fOrder ASC"); //LEFT JOIN field_linked ON (field.fid = field_linked.fid1) 
		   		while( $groups = $DB->NextRow($result1) ){


		  	 	if($groups['linked_id'] != 0 && $groups['linked_id'] > 0){  $LinkedThis ="&linkID=".$groups['linked_id'];}else{ $LinkedThis =""; }
		   		if($groups['fType'] == 1){$type =" "; $tname ="<img src='inc/images/icons/xhtml.png' align='absmiddle'> Text Field"; /*text field */
}elseif($groups['fType'] == 7){$type =""; $tname ="<img src='inc/images/icons/text_lowercase.png' align='absmiddle'> Age Input Field";/* */
				}elseif($groups['fType'] == 2){$type =""; $tname ="<img src='inc/images/icons/text_lowercase.png' align='absmiddle'> Text Area";/* */
				}elseif($groups['fType'] == 3){$tname ="<img src='inc/images/icons/text_padding_left.png' align='absmiddle'> List Box"; $type ="<img src='inc/images/icons/resultset_next.png'>  <a href='?p=fieldlist&id=".$groups['fid']."&list=1".$LinkedThis."'> List Box Items </a> <br>";
				}elseif($groups['fType'] == 4){$tname ="<img src='inc/images/icons/savelist.png' align='absmiddle'> Check Box"; $type =" "; /* check area */
				}elseif($groups['fType'] == 5){$tname ="<img src='inc/images/icons/text_list_bullets.png' align='absmiddle'> Multiple Checkbox"; $type ="<img src='inc/images/icons/resultset_next.png'>  <a href='?p=fieldlist&id=".$groups['fid']."&list=1'>Check Box Items </a> <br>";}
				
 
$tname .= "<a href='management.php?p=addfields&id=".$groups['fid']."'>( Edit )</a>";
					print "<tr>";
					if(!in_array($groups['fName'], $fieldArray)){ $CC=""; }else{ $CC="disabled";}
					print "<td><input name='d".$count."' type='checkbox' value='on' ".$CC."><input type=hidden value='".$groups['fid']."' name=id".$count." class='hidden'></td>";
					
					/* PROFILE FIELD NAME */
					print "<td>";
					$result2 = $DB->Row("select id, lang, caption from field_caption where Cid='".$groups['fid']."' AND lang = 'english' LIMIT 1");
					if(empty($result2)){
					$result2 = $DB->Row("select id, lang, caption from field_caption where Cid='".$groups['fid']."' ORDER BY lang LIMIT 1");
					}
					//$extraText ="Database Name: ".;			
					//
 
					if(isset($result2['fid2'])){ $FieldName="123"; }else{ $FieldName="none";}
if($groups['groupid_1'] != 0 || $groups['groupid_2'] != 0){
$shared ="<img src='inc/images/16x16/150.png' alt='This group is shared' align='absmiddle'>";
}else{
$shared ="";
}
					print "<img src='../images/language/flag_".$result2['lang'].".gif'> 

					<a href='javascript:void(0);' onClick=\"javascript:idShowHide('extra1_".$count."')\";'>".$result2['caption']." ".$elink." ".$shared."</a> 
					
					<div id='extra1_".$count."' style='display:none;line-height:30px;'><div style='padding:5px;'>".$tname."</div>
					<img src='inc/images/icons/resultset_next.png'> <a href='?p=fieldedit&id=".$groups['fid']."'> Edit Caption </a> <br>					
					".$type."
					<img src='inc/images/16x16/150.png' alt='This group is shared' align='absmiddle'> <a href='?p=fieldeditmove&id=".$groups['fid']."&G1=".$groups['groupid']."&G2=".$groups['groupid_1']."&G3=".$groups['groupid_2']."'>  Move to another group </a> <br>";

					if(  $groups['fType'] == 3){
					print "<img src='inc/images/icons/resultset_next.png'> Linked With: <b><div id='FLink".$groups['fid']."'><a href='#' onClick=\"eMeetingShowLinkList('".$groups['fid']."','FLink".$groups['fid']."');\"> <img src='inc/images/icons/monitor_lightning.png' align='absmiddle'> ".GetLinkedName($groups['linked_id'])."</a></div></b>";
					}
					print "</div>";
 
					
					
					print "</td>";
					
					
					/* PROFILE BROWSE TYPE */
					print "<td style='background:#DEFFDA;' align=center>";
					if($groups['browsepage'] =="yes"){$img="yes.png"; $nVal ="no";}else{ $img="no.png"; $nVal ="yes";}

					print "<div id='f1_".$groups['fid']."'><img src='inc/images/icons/".$img."' onClick=\"UpdateFieldPage('".$nVal."','".$groups['fid']."','f1_".$groups['fid']."',1)\" style='cursor:pointer;'> </div> ";											

					print "</td>";

					/* PROFILE REGISTER MATCH */
					print "<td  style='background:#DEFFDA;' align=center>";
					if($groups['required'] ==1){$img="yes.png"; $nVal ="0";}else{ $img="no.png"; $nVal ="1";}
					print "<div id='f2_".$groups['fid']."'><img src='inc/images/icons/".$img."' onClick=\"UpdateFieldPage('".$nVal."','".$groups['fid']."','f2_".$groups['fid']."',2)\" style='cursor:pointer;'> </div> ";		
					print "</td>";
										
					/* PROFILE REGISTER MATCH */
					print "<td  style='background:#DEFFDA;' align=center>";	
					if($groups['matchpage'] =="yes"){$img="yes.png"; $nVal ="no";}else{ $img="no.png"; $nVal ="yes";}
					if( ($groups['fName'] =="country" || $groups['fName'] =="location" || $groups['fName'] =="age") || $groups['fType'] != 5 && $groups['fType'] != 1 && $groups['fType'] != 2 && $groups['fType'] != 4){ 

					print "<div id='f3_".$groups['fid']."'><img src='inc/images/icons/".$img."' onClick=\"UpdateFieldPage('".$nVal."','".$groups['fid']."','f3_".$groups['fid']."',3)\" style='cursor:pointer;'> </div> ";		
	
					}else{  }
					 
					print "</td>"; 
 

					print "<td style='background:#eeeeee;'><input onChange=\"UpdateFieldOrderBit(this.value,'".$groups['fid']."')\" name='ordervalue".$count."' type='text' value='".$groups['fOrder']."' size=3> </td>";

					
					print "</tr>";

					$count++;
				 }
		   
			print "</tbody>  </table><br>";
			
	}

	print "<input name='TotalOrder' type='hidden' class='hidden' value='".$count."'>";	
	
	return $count;
}
function DisplayGroups($id){

	global $DB;

	$result = $DB->Query("SELECT id, caption FROM field_groups ORDER BY forder ASC");

		if($id == 0){
		print "<option value='0' selected>Not Selected</option>";
		
		}else{
		print "<option value='0'>Not Selected</option>";
		
		}

    while( $groups = $DB->NextRow($result) )
    {

		if($id == $groups['id']){
		print "<option value='".$groups['id']."' selected>".$groups['caption']."</option>";
		
		}else{
		print "<option value='".$groups['id']."'>".$groups['caption']."</option>";
		
		}
	}
	
	return;
}

function DisplayArtCats($default=0){

	global $DB;

	$result = $DB->Query("SELECT id, name FROM articles_cat ORDER BY id ASC");

    while( $groups = $DB->NextRow($result) )
    {
		if($default == $groups['id']){		
			print "<option value='".$groups['id']."' selected>".$groups['name']."</option>";
		}else{		
			print "<option value='".$groups['id']."'>".$groups['name']."</option>";
		}		
	}
	
	return;
}

function DisplayCalCatsID($default=0){

	global $DB;

	$result = $DB->Query("SELECT id, name FROM calendar_types ORDER BY id ASC");

    while( $groups = $DB->NextRow($result) )
    {
		if($default == $groups['id']){		
			print "<option value='".$groups['id']."' selected>".$groups['name']."</option>";
		}else{		
			print "<option value='".$groups['id']."'>".$groups['name']."</option>";
		}		
	}
	
	return;
}

function FieldCapp($id){
	global $DB;

	$result = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE fvFid='".strip_tags($id)."' AND lang='english' ORDER BY fvOrder ASC");

    while( $groups = $DB->NextRow($result) )
    {
		if($groups['default']=="selected"){		
			print "<option value='".$groups['fvid']."' selected>".$groups['fvCaption']."</option>";
		}else{		
			print "<option value='".$groups['fvid']."'>".$groups['fvCaption']."</option>";
		}		
	}
	
	return;
}

function LinkedWith($id){

	global $DB;

	//$result = $DB->Row("SELECT fid2 AS id FROM field_linked WHERE fid1='".$id."' LIMIT 1 ");
	
	return $result;
}

function FieldLinks($id){

	global $DB;

	$result = $DB->Query("SELECT DISTINCT fvid, fvCaption FROM field_list_value, field WHERE fvFid='".$id."'");

    while( $groups = $DB->NextRow($result) )
    {
		if($def == $groups['id']){		
			print "<option value='".$groups['fvid']."' selected>".$groups['fvCaption']."</option>";
		}else{		
			print "<option value='".$groups['fvid']."'>".$groups['fvCaption']."</option>";
		}		
	}
	
	return;

}

function ShowLinkedFields($def=0){

	global $DB;

	$result = $DB->Query("SELECT DISTINCT field.fid, field_caption.caption FROM field, field_caption WHERE field_caption.Cid = field.fid AND (field.fType=3 OR field.fid=25) AND lang='english' GROUP BY field.fid");

    while( $groups = $DB->NextRow($result) )
    {
		if($def == $groups['id']){		
			print "<option value='".$groups['fid']."' selected>".$groups['caption']."</option>";
		}else{		
			print "<option value='".$groups['fid']."'>".$groups['caption']."</option>";
		}		
	}
	
	return;

}


function GetArticleData($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM articles WHERE id=".$id);
	
	return $result;
}

function GetGroup($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM field_groups WHERE id=".$id);
	
	return $result;
}
function FieldLangs(){
   
	$ext = array("php");
    $files = array();
    ## Find files in root directory
   	$checkthisone = D_LANG.".php";
   if($handle = opendir(subd."inc/langs/")) {{
       while(false !== ($file = readdir($handle))){
           for($i=0;$i<sizeof($ext);$i++){


				if(strstr($file, ".".$ext[$i])){
					
					$pos = strpos($checkthisone, $file);  			   
					if($file != "english.php"){
							echo "<option value='$file'>$file</option>";
					}else{
							echo "<option value='$file' selected >$file - Default</option>";
					}
				  }		   
              		   
		   }
		 }					                      
       closedir($handle);
	} }
}

 
function Getcatd($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM groups_cats WHERE id=".$id." LIMIT 1");
	if($result['photo'] ==""){
		$result['photo'] =DEFAULT_GROUP_CAT;
	}
	return $result;
}

function GetClassCats($default){

	global $DB;
	$count=1;

    $result = $DB->Query("SELECT id,name FROM class_cats WHERE subId=0 ORDER BY id ASC");

    while( $cat = $DB->NextRow($result) )
    {
	
		if($default == $cat['name']){
			print "<option value=".$cat['id']." selected>".$cat['name']."</option>";
		}else{
			print "<option value=".$cat['id'].">".$cat['name']."</option>";
		}
	 	
	}

}
############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/management.php";

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