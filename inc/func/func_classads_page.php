<?php

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );



/**
* Info: Displays the three main page box options
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayOverviewBoxes($type){

	global $DB;

	$DataArray=array();  $MODdata['page'] ='classads'; $MODdata['type'] ='system';

	if($type ==1){

	$item = $DB->Row("SELECT files.bigimage,files.type,files.approved, files.adult_content, class_adverts.*,class_cats.name 
	FROM class_adverts 
	INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) 
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 ) 
	WHERE class_adverts.featured='yes' AND class_adverts.approved='yes'
	ORDER BY RAND() LIMIT 1");

	}elseif($type ==2){

	$item = $DB->Row("SELECT files.bigimage,files.type,files.approved, files.adult_content, class_adverts.*,class_cats.name 
	FROM class_adverts 
	INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) 
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 )
	WHERE class_adverts.approved='yes' 
	ORDER BY class_adverts.hits DESC LIMIT 1");
	
	}elseif($type ==3){

	$item = $DB->Row("SELECT files.bigimage,files.type,files.adult_content, files.approved, class_adverts.*,class_cats.name 
	FROM class_adverts 
	INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) 
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 ) 
	WHERE class_adverts.approved='yes'
	ORDER BY class_adverts.id DESC LIMIT 1");
	
	}elseif($type ==4){

	$item = $DB->Row("SELECT files.uid, files.bigimage,files.type,files.adult_content, class_adverts.*,class_cats.name 
	FROM class_adverts 
	INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) 
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 ) 
	WHERE class_adverts.featured='yes' AND class_adverts.approved='yes'
	ORDER BY RAND() LIMIT 1");
	
	}

		$DataArray['id'] 		= $item['id'];
		$DataArray['date'] 		= dates_interconv($item['date_added']);
		$DataArray['title'] 	= eMeetingOutput($item['title']);
		$DataArray['subtitle'] 	= eMeetingOutput($item['sub_title']);
		$DataArray['comments'] 	= $item['comments'];

		# make link
		$MODdata['sub'] ='view';
		$MODdata['id1'] = $item['id'];
		$MODdata['name'] = $DataArray['title'];
		$DataArray['link'] = MakeLinkMOD($MODdata);

		if($item['pic1'] ==""){
			
				$result1 = $DB->Row("SELECT type, adult_content, bigimage, approved FROM files WHERE uid='".$item['uid']."' AND type='photo' and adult_content !='yes' ORDER BY date DESC LIMIT 1");
				$DataArray['image']		= ReturnDeImage($result1,"medium");
			
		}else{
				$DataArray['image']		= ReturnDeImage($item,"medium");
		}
		

	return $DataArray;
}

/**
* Info: Displays similar adverts to the one displayed
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function FindSimilar($id, $limit=5){

	global $DB;

	## define variables
	$DataArray=array();	$count= 1;

	$result = $DB->Query("SELECT class_adverts.title, class_adverts.id, class_adverts.date_added AS date, members_data.location, members.username, members.id AS uid, files.bigimage,files.type,	files.approved,	files.adult_content
	FROM members
	INNER JOIN members_data ON ( members.id = members_data.uid ) 
	INNER JOIN class_adverts ON (  class_adverts.uid = members_data.uid )
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 )  
	WHERE class_adverts.cat_id = ( '".$id."' ) AND class_adverts.approved='yes' GROUP BY class_adverts.id LIMIT ".$limit);
	
	while( $groups = $DB->NextRow($result) )
	{
		
		$DataArray[$count]['id'] 			= $groups['id'];
		$DataArray[$count]['uid'] 		= $groups['uid'];
		$DataArray[$count]['date'] 		= dates_interconv($groups['date']);
		$DataArray[$count]['title'] 		= eMeetingOutput($groups['title']); // nl2br(

		if($DataArray['pic1'] ==""){
			
			$result1 = $DB->Row("SELECT type, adult_content, bigimage, files.approved FROM files WHERE uid='".$groups['uid']."' AND type='photo' and adult_content !='yes' ORDER BY date DESC LIMIT 1");
			$DataArray[$count]['image']		= ReturnDeImage($result1,"xsmall");
			
		}else{
				$DataArray[$count]['image']		= ReturnDeImage($groups,"xsmall");
		}
 
		$DataArray[$count]['username'] 	= $groups['username'];
		$count++;
	}	
	
	return $DataArray;

}

/**
* Info: Funcions used by the classified ads page
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function GetClassCats($default){

	global $DB;

	$count=1;

    $result = $DB->Query("SELECT id,name FROM class_cats WHERE subId =0 ORDER BY id ASC");

    while( $cat = $DB->NextRow($result) )
    {
	
		if($default == $cat['id']){
			print "<option value=".$cat['id']." selected>".$cat['name']."</option>";
		}else{
			print "<option value=".$cat['id'].">".$cat['name']."</option>";
		}
	 	
	}

}

/**
* Info: Funcions used to get a list of the classified categories
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function ListCats(){

	global $DB;

	# define variables
	$DataArray = array(); $Counter=1;	$runThis="";  $MODdata['page'] ='classads'; $MODdata['sub'] ='search'; $MODdata['type'] ='system';

	$result1 = $DB->Query("SELECT id, name, icon FROM class_cats WHERE subId=0 ORDER BY name");

	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" ){
	$runThis ="";
	}else{
	$runThis =" AND class_adverts.approved='yes' ";
	}

    while( $Data = $DB->NextRow($result1) )
    {
		$TT = $DB->Row("SELECT count(class_adverts.id)  AS total FROM class_adverts WHERE  cat_id=".$Data['id']." ".$runThis);

		$DataArray[$Counter]['total'] 		= $TT['total'];
		$DataArray[$Counter]['name'] 		= eMeetingOutput($Data['name']);	
		$DataArray[$Counter]['id'] 			= $Data['id'];
		$DataArray[$Counter]['icon'] 		= $Data['icon'];

		## Dynamic Link
		$MODdata['id1'] = $Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['name'];
		$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);

		$Counter++;
	}

	## return array
	return $DataArray;

}

/**
* Info: Funcions used to get a list items of the categorie
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function ListCatsItems($id){

	global $DB;
	if(!is_numeric($id)){ return 0;}
	# define variables
	$DataArray = array(); $Counter=1;	$runThis="";  $MODdata['page'] ='classads'; $MODdata['sub'] ='search'; $MODdata['type'] ='system';

	$result1 = $DB->Query("SELECT id, name, icon FROM class_cats WHERE subId= ('".$id."') ORDER BY name ASC");

	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED

    while( $Data = $DB->NextRow($result1) )
    {
		$DataArray[$Counter]['name'] 		= eMeetingOutput($Data['name']);	
		$DataArray[$Counter]['id'] 			="00".$Data['id'];
		$DataArray[$Counter]['icon'] 		= $Data['icon'];

		## Dynamic Link
		$MODdata['id1'] = "00".$Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['name'];
		$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);

		$Counter++;
	}

	## return array
	return $DataArray;

}

/**
* Info: Search Function
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayBrowse($pageGET, $getData="", $This_Page,  $edit=false){

	global $DB;

	## define variables
	$DataArray = array(); 	$Counter=1;	$runThis=""; $MODdata['page'] ='classads'; $MODdata['type'] ='system'; $MyThis="";

	## search by category, select id only
	if(isset($getData['catid'])){ $cat_id =$getData['catid']; }
	if(isset($cat_id)){	

		if(substr($cat_id, 0,2) =="00"){ 
		$runThis = " WHERE class_adverts.pic5 = ('".substr($cat_id, 2)."')";
		}else{
		$runThis = " WHERE class_adverts.cat_id = ('".$cat_id."')";
		}
	}

	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
	if( ( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" )  || is_numeric($edit) ){
	$runThis .="";
	}else{
		if($runThis ==""){ $runThis .=" WHERE class_adverts.approved='yes' "; }else{  $runThis .=" AND class_adverts.approved='yes' ";  }
	}

	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes"  || is_numeric($edit) ){
			$ExtraString .="";
	}else{
			$ExtraString .=" AND class_adverts.approved='yes' ";
	}
 
	if(is_numeric($edit)){ $MyThis = " AND members.id=('".$edit."') "; 	}

	if(!isset($This_Page)){$This_Page=1; }

	## build extra strings
	$stoplimit=SEARCH_PAGE_ROWS;

	if(!isset($This_Page)){$This_Page=1; }
	$startlimit = $stoplimit*($This_Page-1);
	if($startlimit <0) $startlimit =0;

	## create sort
	if(isset($pageGET['sort'])){		
		
		switch(trim($pageGET['sort'])){
			
			case "1": {
				$OrderByThis = "class_adverts.id DESC";
			}break;
			
			case "2": {	
				$OrderByThis = "class_adverts.date_updated DESC";			
			}break;

			case "3": {	
				$OrderByThis = "class_adverts.rating_votes DESC";			
			}break;
			
			default: { $OrderByThis = "class_adverts.id DESC"; }
		}
					
	}else{
		$OrderByThis = "class_adverts.id DESC";
	}


	## create totals for page numbers
	$QueryTotal ="SELECT DISTINCT count(class_adverts.id) AS total FROM class_adverts INNER JOIN members ON ( members.id = class_adverts.uid $MyThis ) INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) $runThis ";

	$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY

	$totalResults = $DB->Row($QueryTotal);

	## do main query
	$SQL = "SELECT DISTINCT members.username, files.approved, files.bigimage,files.type,files.adult_content, class_adverts.*, class_adverts.approved AS ThisApproved, class_cats.name 
	FROM class_adverts 
	INNER JOIN members ON ( members.id = class_adverts.uid $MyThis )
	INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) 
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 ) 
	$runThis 
	ORDER BY ".$OrderByThis." LIMIT ".$startlimit.",".$stoplimit;
 
	$result1 = $DB->Query($SQL);

    while( $Data = $DB->NextRow($result1) ){
		
		$TC = $DB->Row("SELECT count(comments.id) AS total FROM comments WHERE ex1_id =".$Data['id']." AND approved='yes'");

		$DataArray[$Counter]['cat_name'] 			= eMeetingOutput($Data['name']);	
		$DataArray[$Counter]['cat_id'] 				= $Data['cat_id'];
		$DataArray[$Counter]['comments'] 			= $TC['total'];
		$DataArray[$Counter]['date_updated'] 		= $Data['date_updated'];
		$DataArray[$Counter]['title'] 				= eMeetingOutput($Data['title']);						
		$DataArray[$Counter]['sub_title'] 			= eMeetingOutput($Data['sub_title']);					
		$DataArray[$Counter]['id'] 					= $Data['id'];	
		$DataArray[$Counter]['featured'] 			= $Data['featured'];
		$DataArray[$Counter]['hits'] 				= $Data['hits'];	
		$DataArray[$Counter]['uid'] 				= $Data['uid'];
		$DataArray[$Counter]['rating']				= $Data['rating'];
		$DataArray[$Counter]['rating_votes']		= $Data['rating_votes'];
		$DataArray[$Counter]['TotalResults'] 		= $totalResults['total']; 			// TOTAL SEARCH RESULTS COUNTER	
		$DataArray[$Counter]['username']			= $Data['username'];
		$DataArray[$Counter]['ThisApproved']		= $Data['approved'];
		# make link
		$MODdata['sub'] ='view';
		$MODdata['id1'] = $Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['title'];
		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);


		# make cat link
		$MODdata['sub'] ='search';
		$MODdata['id1'] = $Data['cat_id'];
		$MODdata['name'] = $DataArray[$Counter]['cat_name'];
		$DataArray[$Counter]['cat_link'] = MakeLinkMOD($MODdata);
	
		
		if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['user_link'] 		=	$Data['username'];
			}else{
					$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pId=".$Data['uid'];
			}	

		## if no picture is found, display the members photo
		if($Data['pic1'] =="" && $Data['uid'] !=""){		
				$fPic = $DB->Row("SELECT files.bigimage,files.type,files.approved, files.adult_content FROM files WHERE uid= ( '".$Data['uid']."' ) AND type='photo' AND files.default LIKE '%1%' LIMIT 1");
				$DataArray[$Counter]['image'] 			=	ReturnDeImage($fPic,"medium");
		}else{
				
				$DataArray[$Counter]['image'] 			= 	ReturnDeImage($Data,"medium");	
		}

		## RATING SYSTEM
		if($Data['rating_votes'] !=0 && $Data['rating'] !=0){
			$avg = round($Data['rating']/$Data['rating_votes'],2);							
			$perc = round( (100/5)*$avg);
		}else{
			$perc=0;
		}	
		$DataArray[$Counter]['percent'] 				= $perc;
		$DataArray[$Counter]['rating_image']			= DisplayFileRating($perc);

		$Counter++;
	}

	## return data
	return $DataArray;

}


/**
* Info: Functions used for display the classified 
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayClass($cid){

	global $DB;

	if(!is_numeric($cid)){ return ""; }


	$result = $DB->Row("SELECT members.username, class_adverts.*, class_adverts.approved AS ThisApproved,class_cats.name, files.bigimage, files.approved, files.adult_content, files.type
	FROM class_adverts 
	INNER JOIN members ON (members.id = class_adverts.uid ) 
	INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id ) 
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 ) 
	WHERE class_adverts.id=('".$cid."') ".$runThis." ORDER BY class_adverts.id DESC LIMIT 1");

		## user image
		$result0 = $DB->Row("SELECT type, adult_content, bigimage, approved FROM files WHERE uid= ( '".$result['uid']."' ) AND type='photo'  AND files.default LIKE '%1%' ORDER BY date DESC LIMIT 1");
		$result['user_image'] = ReturnDeImage($result0,"medium");


		## if no picture is found, display the members photo
		if($result['pic1'] ==""){		

				$result['image'] 			=	$result['user_image'];
		}else{
				$result['type'] ="photo";
				$result['image'] 			= 	ReturnDeImage($result,"medium");	
		}
 
		if(D_MOD_WRITE ==1){
					$result['user_link'] 		=	$result['username'];
			}else{
					$result['user_link'] 		=	"index.php?dll=profile&pId=".$result['uid'];
			}	

		$result['ThisApproved'] 		=	$result['ThisApproved'];
		## update the hit counter
		$DB->Update("UPDATE class_adverts SET hits=hits+1 WHERE class_adverts.id=('".$cid."') LIMIT 1");

		## RATING SYSTEM
		if($result['rating_votes'] !=0 && $result['rating'] !=0){
			$avg = round($result['rating']/$result['rating_votes'],2);							
			$perc = round( (100/5)*$avg);
		}else{
			$perc=0;
		}	
		$result['percent'] 	= $perc;
		$result['rating_image']= DisplayFileRating($perc);

		$result['comments'] 	= eMeetingOutput($result['comments'],true);

	return $result;
}


/**
* Info: Functions used for display the blog posts on the profile page
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function EditThisClass($id){
	
	 global $DB;
	

	## edit options for moderator
	if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes"){
		$EditString = " class_adverts.id= ( '".$id."' )";
	}else{
		$EditString = " class_adverts.id= ( '".$id."' ) AND class_adverts.uid= ('".$_SESSION['uid']."')";
	}

	$result = $DB->Row("SELECT files.bigimage,files.type,files.adult_content, files.approved, class_adverts.*,class_cats.name AS cat_name 
	FROM class_adverts 
	INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id )
	LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 ) 
	WHERE ".$EditString."
	ORDER BY class_adverts.date_added LIMIT 1");

	$result['title']   		= eMeetingOutput($result['title']);
	$result['comments']   		= eMeetingOutput($result['comments'],true);
	$result['subtitle']   	= eMeetingOutput($result['bigimage']);
	$result['photo'] 		= ReturnDeImage($result,"small");
	$result['photo_name']   = $result['bigimage'];

	## return array
	return $result;
}

function GetTitle($cid){

	global $DB;

	$result = $DB->Row("SELECT name FROM class_cats WHERE id= ('".$cid."') LIMIT 1");

	return $result['name'];

}
?>