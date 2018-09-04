<?php

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Funcions used to display blog data
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function DisplayBlogs($pageGET,  $getData="", $This_Page, $ThisMemberId=0){

	global $DB;
	
	## define variables
	$Counter =1;	$DataArray = array();	$ExtraString=""; $MODdata['page'] ='profile'; $MODdata['type'] ='system';

	$ExtraString="WHERE blog_posts.id !=0 ";

	## keyword search
	if(isset($pageGET['keyword']) || isset($getData['keyword']) ){
			$SearchTerm    = (isset($pageGET['keyword']))		?	strip_tags($pageGET['keyword'])		:$getData['keyword'];
			if($SearchTerm !=""){
				$ExtraString .=  " AND ( blog_posts.title LIKE '%".$SearchTerm."%' )";
			}			
	}
 
	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" ){
	$ExtraString .="";
	}else{

		if($ThisMemberId ==0){

			$ExtraString .=" AND blog_posts.approved='yes' ";

		}
	}

	## find member album only
	if(is_numeric($ThisMemberId) && $ThisMemberId !=0){
		$ExtraString .=  " AND ( blog_posts.uid = '".$ThisMemberId."' )";		
	}

	## build search  numbers
	$stoplimit=SEARCH_PAGE_ROWS;

	if(!isset($This_Page)){$This_Page=1; }
	$startlimit = $stoplimit*($This_Page-1);
	if($startlimit <0) $startlimit =0;

		if(!isset($pageGET['displaytype'])){ $pageGET['displaytype']=4; }
		## BUILDING SORT STRING
 
		switch(trim($pageGET['displaytype'])){
				
				case "3": {
					$OrderByThis = "blog_posts.id DESC";
				}break;
				
				case "4": {	
					$OrderByThis = "blog_posts.date DESC";			
				}break;
	
				case "5": {	
					$OrderByThis = "blog_posts.hits DESC";
				}break;
				
				default: { $OrderByThis = "blog_posts.id DESC"; }
		}

	// WORK OUT PAGE TOTAL FOR PAGE NUMBERS
	$QueryTotal = "SELECT count(id) AS total FROM blog_posts $ExtraString";

	$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
	$totalResults = $DB->Row($QueryTotal);

	## make search query
    $result = $DB->Query("SELECT DISTINCT blog_posts.*, blog_posts.approved AS ThisApproved, files.bigimage, files.adult_content, files.approved, files.type, members.username  
	FROM members 
	INNER JOIN blog_posts ON (blog_posts.uid = members.id)
	LEFT JOIN files ON files.bigimage = blog_posts.photo
	$ExtraString AND blog_posts.uid = members.id 
	GROUP BY ".$OrderByThis." LIMIT ".$startlimit.",".$stoplimit);
	
    while( $Data = $DB->NextRow($result) )
    {

		$DataArray[$Counter]['id'] 		= $Data['id'];
		$DataArray[$Counter]['uid'] 		= $Data['uid'];
		$DataArray[$Counter]['date'] 		= $Data['date'];
		$DataArray[$Counter]['title'] 		= eMeetingOutput($Data['title']);
		$DataArray[$Counter]['comments'] 	= eMeetingOutput(strip_tags($Data['comments']));
		$DataArray[$Counter]['username'] 	= $Data['username'];		
		$DataArray[$Counter]['ThisApproved'] 	= $Data['ThisApproved'];		
		
		if($Data['photo'] ==""){
			
			$result1 = $DB->Row("SELECT type, adult_content, approved, bigimage FROM files WHERE uid='".$Data['uid']."' AND type='photo' and adult_content !='yes' AND title != 'Message Photo' ORDER BY date DESC LIMIT 1");
			$DataArray[$Counter]['image']		= ReturnDeImage($result1,"medium");
			
		}else{

			$DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"medium");

		}			
		
		## count comments
		$result2 = $DB->Row("SELECT count(id) AS total FROM comments WHERE ex1_id ='".$Data['id']."' AND approved='yes' AND `sub` LIKE 'blogview' ");
		$DataArray[$Counter]['comments'] = $result2['total'];

		$DataArray[$Counter]['TotalResults'] = $totalResults['total']; 			// TOTAL SEARCH RESULTS COUNTER		

		## RATING SYSTEM
		if($Data['rating_votes'] !=0 && $Data['rating'] !=0){
			$avg = round($Data['rating']/$Data['rating_votes'],2);							
			$perc = round( (100/5)*$avg);
		}else{
			$perc=0;
		}	
		$DataArray[$Counter]['percent'] 				= $perc;
		$DataArray[$Counter]['rating_image']			= DisplayFileRating($perc);


		# make link
		$MODdata['sub'] ='blogview';
		$MODdata['id1'] = $Data['uid'];
		$MODdata['id2'] = $Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['title'];
		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);


		if(D_MOD_WRITE ==1){
			$DataArray[$Counter]['user_link'] 		=	DB_DOMAIN.$Data['username'];
		}else{
			$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pId=".$Data['uid'];
		}

		$Counter++;	
	}
	
	## return array
	return $DataArray;
}


/**
* Info: Functions used for display the blog posts on the profile page
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function DisplayBlogPosts($id, $order, $start, $stop){

	global $DB;
	$Counter =1;
	$DataArray = array(); $MODdata['page'] ='profile'; $MODdata['type'] ='system';

	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" ){
	$runThis ="";
	}else{
	$runThis =" AND blog_posts.approved='yes' ";
	}
	
   	$query= "SELECT members.id AS uid, blog_posts.id, blog_posts.title, blog_posts.approved AS ThisApproved, blog_posts.date, blog_posts.comments, files.bigimage,	files.type,	files.approved,	files.aid 
	FROM blog_posts
	INNER JOIN members ON ( members.id = blog_posts.uid ) 
	LEFT JOIN files ON ( files.bigimage = blog_posts.photo ) 
	WHERE blog_posts.uid= ( '".$id."' ) ".$runThis." GROUP BY blog_posts.id ORDER BY blog_posts.".$order." DESC LIMIT $start,$stop";

	$result = $DB->Query($query);
	$totalMsg = $DB->Row("SELECT count(id) AS total FROM blog_posts WHERE uid= ( '".$id."' )");

    while( $Data = $DB->NextRow($result) )
    {

		$DataArray[$Counter]['id'] 			= $Data['id'];
		$DataArray[$Counter]['uid'] 		= $Data['uid'];
		$DataArray[$Counter]['ThisApproved'] =  $Data['ThisApproved'];
		$DataArray[$Counter]['date'] 		= dates_interconv($Data['date']);
		$DataArray[$Counter]['title'] 		= substr(eMeetingOutput(strip_tags($Data['title'])),0,100);
		$DataArray[$Counter]['comments'] 	= substr(eMeetingOutput(strip_tags($Data['comments'])),0,150);
		$DataArray[$Counter]['totalMsg'] 	= $totalMsg['total'];

		$DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"small");

		# make link
		$MODdata['sub'] ='blogview';
		$MODdata['id1'] = $Data['uid'];
		$MODdata['id2'] = $Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['title'];
		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
			
		$Counter++;	
	}
	
	return $DataArray;
}

/**
* Info: Functions used to get a single blog data
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function GetBlogPostDetails($id, $uid){

	global $DB;

	$Blog = array();
	if(!is_numeric($id)){ return ""; }

    $result = $DB->Row("SELECT blog_posts.*, files.bigimage, blog_posts.approved AS ThisApproved, files.adult_content, files.approved, files.type 
	 FROM blog_posts
	 LEFT JOIN files ON (blog_posts.photo = files.bigimage )
	 WHERE blog_posts.id='".eMeetingInput($id)."' ".$runThis." LIMIT 1");

	$Blog['ThisApproved'] =  $Data['ThisApproved'];
	$Blog['photo'] 			= ReturnDeImage($result,"small");
	$Blog['photo_name']   	= $result['photo'];
 
	if($Blog['photo_name'] ==""){
			// no photo found lets make the members icon as the main photo, looks nicer :)
			$result1 = $DB->Row("SELECT type, adult_content, bigimage, files.approved FROM files WHERE uid='".$result['uid']."' AND type='photo' AND files.default LIKE '%1%' LIMIT 1");
			$Blog['photo_name'] 		= ReturnDeImage($result1,"medium");
	}

	$Blog['comments']   	= eMeetingOutput($result['comments'],true);
	$Blog['title']   		= eMeetingOutput($result['title']);

	$Blog['attachment']   	= $result['attachment'];
	$Blog['id']   			= $id;

	## update the hit counter
	$DB->Update("UPDATE blog_posts SET hits=hits+1 WHERE blog_posts.id=('".$id."') LIMIT 1");

	## return array
	return $Blog;

}

?>