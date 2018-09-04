<?php

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Funcions used to display video pages
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function GetVideos($pageGET, $getData="", $This_Page, $uid=""){

	global $DB;

	## define variables
	$Counter=1; $DataArray = array();

 
	## keyword search
	if(isset($pageGET['keyword']) || isset($getData['keyword']) ){
		$SearchTerm    = (isset($pageGET['keyword']))		?	strip_tags($pageGET['keyword'])		:$getData['keyword'];
		$SearchTerm = str_replace(" ","+",$SearchTerm);
		$SearchTerm = eMeetingOutput($SearchTerm);
 		$SearchTermMyFiles=$SearchTerm;
		## add tag for tag cloud
		if(isset($getData['keyword'])){ AddTag("videos", $SearchTerm); }


	}else{
		 srand((float) microtime() * 10000000);
		$input = array("Music", "Food", "Shopping", "News", "New", "Dance", "Top", "Dark", "Funny", "Live", "Movie");
		$rand_keys = array_rand($input, 2);		
		$SearchTermMyFiles="";
		$SearchTerm = $input[$rand_keys[1]];

	}
	
	## do search
	if(isset($uid) && is_numeric($uid) && $uid != 0){

		$DataArray = GetMemberVideos($SearchTerm,$uid, $This_Page);
 
	}else{


		## build extra strings
		$stoplimit=SEARCH_PAGE_ROWS;
	
		## page numbers
		if(!isset($This_Page)){$This_Page=1; }
		$startlimit = $stoplimit*($This_Page-1);
		if($startlimit <0) $startlimit =0;

		## find member videos first
		$DataArray = GetMemberVideos($SearchTermMyFiles,$uid, $This_Page);
	  

		
		## create query string for youtube API
		$QueryData['startlimit'] = $startlimit;
		$QueryData['stoplimit'] = $stoplimit;
		$QueryData['SearchTag'] = $SearchTerm;
		
		 
		## push youtube array ontop of member videos
		if(YOUTUBE_API_ID !="" && strlen(YOUTUBE_API_ID) > 2){
		$DataArray = YOUTUBEFEEDS($QueryData,$DataArray);
		}
 

	}

	## return videos
	return $DataArray;

}


function GetMemberVideos($keyword, $uid=false, $This_Page){

		global $DB;

		$DataArray= array(); $Counter=1; $MODdata['page'] ='videos'; $MODdata['type'] ='system';
 
		if(isset($uid) && is_numeric($uid) && $uid != 0){

			$FileSea = "files.uid='".$uid."' ";

		}else{

			//$FileSea = "files.title LIKE '%".$keyword."%' OR files.description LIKE '%".$keyword."%'";
			$FileSea = "files.title LIKE '%%' OR files.description LIKE '%%'";

		}

		## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
		if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" ){
		$FileSea .="";
		}else{
		$FileSea .=" AND files.approved='yes' ";
		}


		// WORK OUT PAGE TOTAL FOR PAGE NUMBERS
		$QueryTotal ="SELECT DISTINCT count(files.aid) AS total FROM members
		INNER JOIN album ON ( album.uid = members.id AND album.cat='public' )
		INNER JOIN files ON ( files.aid = album.aid AND ( files.type='video' OR files.type='youtube' ) AND ( ".$FileSea." ) )
		WHERE files.approved = 'yes' 
		AND members.active = 'active'" ;

		$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
		$totalResults = $DB->Row($QueryTotal);

		## build extra strings
		$stoplimit=SEARCH_PAGE_ROWS;
	
		## page numbers
		if(!isset($This_Page)){$This_Page=1; }
		$startlimit = $stoplimit*($This_Page-1);
		if($startlimit <0) $startlimit =0;

		$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
	
		$SQL = "SELECT members.username,  files.approved AS ThisApproved, files.*
		FROM members
		INNER JOIN album ON ( album.uid = members.id AND album.cat='public' )
		INNER JOIN files ON ( files.aid = album.aid AND ( files.type='video' OR files.type='youtube' ) AND ( ".$FileSea." ) )
		WHERE files.approved = 'yes'
		AND members.active = 'active'
		GROUP BY files.id ORDER BY files.id DESC 
		LIMIT ".$startlimit.",".$stoplimit."  ";
 
		$result = $DB->Query($SQL);
		while( $Data = $DB->NextRow($result) )
		{	

			$result1 = $DB->Row("SELECT type, adult_content, approved, bigimage FROM files WHERE aid='".$Data['aid']."' AND type='photo' ORDER BY `default` DESC LIMIT 1");

			$DataArray[$Counter]['id'] 				= $Data['id'];



		if ($Data['type'] == 'youtube') {
			$file_part = explode("?v=",$Data['bigimage']); 
			$file_part = explode("&",$file_part[1]);	
			$DataArray[$Counter]['image'] = "http://img.youtube.com/vi/".$file_part[0]."/2.jpg";
		}
		else {
			$DataArray[$Counter]['image'] 		= ReturnDeImage($result1,"medium");
		}


		if ($Data['adult_content'] == 'yes') {
			$DataArray[$Counter]['image_alt'] 		= "Adult Content: ".$Data['title'];
		}		
		else {
			$DataArray[$Counter]['image_alt'] 		= $Data['title'];
		}


			$DataArray[$Counter]['youtube_username'] 	= $Data['username'];
			$DataArray[$Counter]['ThisApproved'] 	= $Data['ThisApproved'];
			$DataArray[$Counter]['lenght'] 			= "";
			$DataArray[$Counter]['uid'] 			= $Data['uid'];
			$DataArray[$Counter]['tags'] 				= $Data['title'];
			$DataArray[$Counter]['views'] 			= $Data['views'];
			//$DataArray[$Counter]['date'] 				= date("Y-m-d");//showTimeSince(date("Y-m-d",$upload_time[1]));
			$DataArray[$Counter]['date'] = $Data['date'];
			$DataArray[$Counter]['TotalResults'] 		= $totalResults['total']; 

			## Dynamic Link
			$MODdata['sub'] ='view';
			$MODdata['id1'] 					= $Data['id'];
			$MODdata['name'] 					= $DataArray[$Counter]['image_alt'];




			if($_SESSION['pack_adult'] !="yes" && $Data['adult_content'] =="yes" && $Data['uid'] != $_SESSION['uid'] && $_SESSION['site_moderator'] =='no' && ENABLE_ADULTCONTENT =="yes"){

			$DataArray[$Counter]['link'] = "javascript:alert('".$GLOBALS['_LANG_ERROR']['_noAdultAccess']."')";

			}else{

			$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
			}




			## Dynamic user link
			$MODdata['sub'] ='search';
			$MODdata['id1'] 					= $DataArray[$Counter]['youtube_username'];
			$MODdata['name'] 					= $DataArray[$Counter]['youtube_username'];
			$DataArray[$Counter]['user_link'] 		= MakeLinkMOD($MODdata);


			$Counter++;

		}
		 
		return $DataArray;
}

/**
* Info: Youtube API Feed function
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function YOUTUBEFEEDS($QueryData, $videoArray){

$Counter = 2; $MODdata['page'] ='videos'; $MODdata['type'] ='system';

## chek if the zhen extension is loaded
if( file_exists('Zend/Loader.php') ){

	include 'Zend/Loader.php';
	Zend_Loader::loadClass('Zend_Gdata_YouTube');

	  $searchTerms = $QueryData['SearchTag'];
	  $yt = new Zend_Gdata_YouTube();

	  // NOW BUILD THE API QUERY
	  $query = $yt->newVideoQuery();
	  $query->setOrderBy('relevance'); //RELEVANCE, VIEW_COUNT, UPDATED, or RATING.
	  $query->setRacy('include'); // INCLUDE ADULT CONTENT?
	  $query->setStartIndex($QueryData['startlimit']);
	  $query->setMaxResults($QueryData['stoplimit']);
 
	  $query->setVideoQuery($QueryData['SearchTag']);
	  $videoFeed = $yt->getVideoFeed($query);

	  foreach ($videoFeed as $videoEntry) {

 		$videoThumbnails = $videoEntry->getVideoThumbnails();
		$DataArray[$Counter]['id'] 				= $videoEntry->getVideoId();
		$DataArray[$Counter]['image'] 			= $videoThumbnails[0]['url'];
		$DataArray[$Counter]['image_alt'] 		= $videoEntry->getVideoTitle();
		$DataArray[$Counter]['youtube_username'] 	= "";//$yukleyen[1];
		$DataArray[$Counter]['lenght'] 			= $videoEntry->getVideoDuration();
		$DataArray[$Counter]['tags'] 				= str_replace(",", " ",implode(", ", $videoEntry->getVideoTags()));
		$DataArray[$Counter]['views'] 			= number_format($videoEntry->getVideoViewCount());
		$DataArray[$Counter]['date'] 				= date("Y-m-d");//showTimeSince(date("Y-m-d",$upload_time[1]));
		$DataArray[$Counter]['TotalResults'] 		= 500;//$to[0];
		$DataArray[$Counter]['uid'] 			= 0;
		$DataArray[$Counter]['ThisApproved'] 	= "yes";
			## Dynamic Link
			$MODdata['sub'] ='view';
			$MODdata['id1'] 					= $DataArray[$Counter]['id'];
			$MODdata['name'] 					= $DataArray[$Counter]['image_alt'];
			$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);

			## Dynamic user link
			$MODdata['sub'] ='search';
			$MODdata['id1'] 					= $DataArray[$Counter]['youtube_username'];
			$MODdata['name'] 					= $DataArray[$Counter]['youtube_username'];
			$DataArray[$Counter]['user_link'] 		= MakeLinkMOD($MODdata);

		array_push($videoArray,$DataArray[$Counter]);
		$Counter++;

	  }
 
	## return array
	return $videoArray;

}else{


	$data= @file_get_contents('http://www.youtube.com/api2_rest?method=youtube.videos.list_by_tag&dev_id='.YOUTUBE_API_ID.'&tag='.$QueryData['SearchTag'].'&page='.$QueryData['startlimit'].'&per_page='.$QueryData['stoplimit'].'');
	
	$to = explode("</total>",$data);
	$bol = explode("<video>",$data); $MODdata['page'] ='videos'; $MODdata['sub'] ='view'; $MODdata['type'] ='system';

	for ($i=1;$i<=count($bol)-1;$i++) {

		preg_match("'<total>(.*?)</total>'si",$bol[$i], $total);
		preg_match("'<author>(.*?)</author>'si",$bol[$i], $yukleyen);
		preg_match("'<id>(.*?)</id>'si",$bol[$i], $id);
		preg_match("'<title>(.*?)</title>'si",$bol[$i], $adi);
		preg_match("'<description>(.*?)</description>'si",$bol[$i], $aciklama);
		preg_match("'<tags>(.*?)</tags>'si",$bol[$i], $tags);
		preg_match("'<thumbnail_url>(.*?)</thumbnail_url>'si",$bol[$i], $tumb);
		preg_match("'<length_seconds>(.*?)</length_seconds>'si",$bol[$i], $lenght);
		preg_match("'<view_count>(.*?)</view_count>'si",$bol[$i], $views);
		preg_match("'<upload_time>(.*?)</upload_time>'si",$bol[$i], $upload_time);

		$DataArray[$Counter]['id'] 				= $id[1];
		$DataArray[$Counter]['image'] 			= $tumb[1];
		$DataArray[$Counter]['image_alt'] 		= $adi[1];
		$DataArray[$Counter]['youtube_username'] 	= $yukleyen[1];
		$DataArray[$Counter]['lenght'] 			= $lenght[1];
		$DataArray[$Counter]['tags'] 				= $tags[1];
		$DataArray[$Counter]['views'] 			= number_format($views[1]);
		$DataArray[$Counter]['date'] 				= showTimeSince(date("Y-m-d",$upload_time[1]));
		$DataArray[$Counter]['TotalResults'] 		= 500;//$to[0];
		$DataArray[$Counter]['uid'] 			= 0;
		$DataArray[$Counter]['ThisApproved'] 	= "yes";
			## Dynamic Link
			$MODdata['sub'] ='view';
			$MODdata['id1'] 					= $DataArray[$Counter]['id'];
			$MODdata['name'] 					= $DataArray[$Counter]['image_alt'];
			$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);

			## Dynamic user link
			$MODdata['sub'] ='search';
			$MODdata['id1'] 					= $DataArray[$Counter]['youtube_username'];
			$MODdata['name'] 					= $DataArray[$Counter]['youtube_username'];
			$DataArray[$Counter]['user_link'] 		= MakeLinkMOD($MODdata);

		$Counter++;
	}

	## return array
	return $DataArray;
  }

}

/**
* Info: Youtube API single file function
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/
function DisplayMemberVideoFule($id){


	global $DB;
	
	$FileData = array();
	
	$afile = $DB->Row("SELECT files.*, album.title AS album_title 
	FROM files 
	LEFT JOIN album ON ( files.aid = album.aid )
	WHERE files.id= ( '".$id."' ) LIMIT 1");
	
	$FileData['album_title'] 	= $afile['album_title'];
	$FileData['title'] 	= $afile['title'];
	$FileData['desc'] 	= $afile['description'];
	$FileData['type'] 	= $afile['type'];
	$FileData['rating'] 	= $afile['rating'];
	$FileData['rating_votes'] 	= $afile['rating_votes'];
	$FileData['views'] 	= $afile['views'];
	$FileData['adult_content'] 	= $afile['adult_content'];
	$FileData['rating_image']= DisplayFileRating($perc);

	if($afile['rating_votes'] !=0 && $afile['rating'] !=0){
		$avg = round($afile['rating']/$afile['rating_votes'],2);							
		$perc = round( (100/5)*$avg);
	}else{
		$perc=0;
	}	


	$FileData['src'] = MakeDisplayFile($afile);

	return $FileData;
}
function GetSingleVideo($id){

		global $DB;

		$ReturnData = array();

		if($id ==""){ return 0; }

		if(is_numeric($id)){ 

		## this is a member video NOT a youtube video

		//include('func_gallery_page.php');
				
		$Data = DisplayMemberVideoFule($id);

		$ReturnData['author'] 	=	""; 
		$ReturnData['title'] 	=	$Data['title'];
		$ReturnData['desc'] 	=	$Data['desc'];
		$ReturnData['id'] 		=	$id;
		$ReturnData['tags'] 	=	"";//implode(", ", $videoEntry->getVideoTags());
		$ReturnData['image'] 	=	"";
		$ReturnData['file'] 	= $Data['src'];
						
		
		}else{
		
				if( file_exists('Zend/Loader.php') ){		
				
						include 'Zend/Loader.php';
						Zend_Loader::loadClass('Zend_Gdata_YouTube');
				
						$yt = new Zend_Gdata_YouTube();
				
						$videoEntry = $yt->getVideoEntry($id);	
						$videoThumbnails 		=	$videoEntry->getVideoThumbnails();
				
						$ReturnData['author'] 	=	"";//$author[1];
						$ReturnData['title'] 	=	$videoEntry->getVideoTitle();
						$ReturnData['desc'] 	=	$videoEntry->getVideoDescription();
						$ReturnData['id'] 		=	$videoEntry->getVideoId();
						$ReturnData['tags'] 	=	implode(", ", $videoEntry->getVideoTags());
						$ReturnData['image'] 	=	$videoThumbnails[3]['url'];
						## load youtube player
						$ReturnData['file'] 	= '<object width="425" height="344"><param name="movie" value="'.$videoEntry->getFlashPlayerUrl().'"></param><param name="allowFullScreen" value="true"></param><embed src="'.$videoEntry->getFlashPlayerUrl().'" type="application/x-shockwave-flash" allowfullscreen="true" width="425" height="344"></embed></object>';
						## load custom player
						// $ReturnData['file']		=	'<embed src="newadmin/inc/js/mediaplayer.swf" width="420" height="320" allowscriptaccess="always" allowfullscreen="true" flashvars="width=420&height=320&file=http://www.youtube.com/watch?v='.$ReturnData['id'].'&autoplay=true&image='.$videoThumbnails[3]['url'].'" />';
				
				}else{
		
					## try and get data using the old youtube API
					$data=file_get_contents('http://www.youtube.com/api2_rest?method=youtube.videos.get_details&dev_id='.YOUTUBE_API_ID.'&video_id='.$id);
			
					preg_match("'<author>(.*?)</author>'si",$data, $author);
					preg_match("'<title>(.*?)</title>'si",$data, $title);
					preg_match("'<description>(.*?)</description>'si",$data, $desc);
					preg_match("'<tags>(.*?)</tags>'si",$data, $tags);
					preg_match("'<thumbnail_url>(.*?)</thumbnail_url>'si",$data, $image);
			
			
					$ReturnData['author'] =$author[1];
					$ReturnData['title'] =$title[1];
					$ReturnData['desc'] =$desc[1];
					$ReturnData['id'] =$id;
					$ReturnData['tags'] =$tags[1];
					$ReturnData['image'] =$image[1];

					$ReturnData['file'] = '<embed src="newadmin/inc/js/mediaplayer.swf" width="420" height="320" allowscriptaccess="always" allowfullscreen="true" flashvars="width=420&height=320&file=http://www.youtube.com/watch?v='.$id.'&fs=1&autoplay=true&image='.$image[1].'" />';
		
		}
				## ADD VIDEO WATCH
				$DB->Update("UPDATE videos_watched SET views=views+1 WHERE vid_id = ( '".$id."' ) LIMIT 1");
				if ($DB->Affected() == 0)
				{
						$DB->Insert("INSERT INTO `videos_watched` (`vid_id` ,`views`, title, description) VALUES ('".$id."', '1','".eMeetingInput($ReturnData['title'])."','".eMeetingInput($ReturnData['desc'])."')");
				}
		
		}
		## return array
		return $ReturnData;

}


function trsil($q) { 
$q = str_replace("ç","c",$q);
$q = str_replace ("ç","c",$q); 
$q = str_replace ("g","g",$q); 
$q = str_replace ("I","I",$q); 
$q = str_replace ("i","i",$q); 
$q = str_replace ("s","s",$q); 
$q = str_replace ("ö","o",$q); 
$q = str_replace ("ü","u",$q); 
$q = str_replace ("Ü","U",$q); 
$q = str_replace ("Ç","c",$q); 
$q = str_replace (".","",$q); 
$q = str_replace ("G","g",$q); 
$q = str_replace ("S","S",$q); 
$q = str_replace ("Ö","O",$q); 
$q = str_replace (" ","-",$q); 
$q = str_replace ("'","",$q); 
$q = str_replace ("/","",$q); 
$q = str_replace ("--","-",$q); 
 return $q; 
}



//////////////// YOUTUBE API CALLS
function echoVideoList($feed) 
{

	$ReturnThis = array();
	$i=1;

    foreach ($feed as $entry) {
      
$ReturnThis[$i]['video_id'] = $entry->getVideoId();


			/*
					$thumbnailUrl = $entry->mediaGroup->thumbnail[0]->url;
					$videoTitle = $entry->mediaGroup->title;
					$videoDescription = $entry->mediaGroup->description;
					print <<<END
					<tr onclick="ytvbp.presentVideo('${videoId}')">
					<td width="130"><img src="${thumbnailUrl}" /></td>
					<td width="100%">
					<a href="#">${videoTitle}</a>
					<p class="videoDescription">${videoDescription}</p>
					</td>
					</tr>
			*/
	$i++;
    }

}
/**
 * Finds the URL for the flash representation of the specified video
 *
 * @param  Zend_Gdata_YouTube_VideoEntry $entry The video entry
 * @return string|null The URL or null, if the URL is not found
 */
function findFlashUrl($entry) 
{
    foreach ($entry->mediaGroup->content as $content) {
        if ($content->type === 'application/x-shockwave-flash') {
            return $content->url;
        }
    }
    return null;
}

/**
 * Returns a feed of top rated videos for the specified user
 *
 * @param  string $user The username 
 * @return Zend_Gdata_YouTube_VideoFeed The feed of top rated videos
 */
function getTopRatedVideosByUser($user) 
{
    $userVideosUrl = 'http://gdata.youtube.com/feeds/users/' . 
                     $user . '/uploads';
    $yt = new Zend_Gdata_YouTube();
    $ytQuery = $yt->newVideoQuery($userVideosUrl);  
    // order by the rating of the videos
    $ytQuery->setOrderBy('rating');
    // retrieve a maximum of 5 videos
    $ytQuery->setMaxResults(5);
    // retrieve only embeddable videos
    $ytQuery->setFormat(5);
    return $yt->getVideoFeed($ytQuery);
}

/**
 * Returns a feed of videos related to the specified video
 *
 * @param  string $videoId The video
 * @return Zend_Gdata_YouTube_VideoFeed The feed of related videos
 */
function getRelatedVideos($videoId) 
{
    $yt = new Zend_Gdata_YouTube();
    $ytQuery = $yt->newVideoQuery();
    // show videos related to the specified video
    $ytQuery->setFeedType('related', $videoId);
    // order videos by rating
    $ytQuery->setOrderBy('rating');
    // retrieve a maximum of 5 videos
    $ytQuery->setMaxResults(5);
    // retrieve only embeddable videos
    $ytQuery->setFormat(5);
    return $yt->getVideoFeed($ytQuery);
}

?>