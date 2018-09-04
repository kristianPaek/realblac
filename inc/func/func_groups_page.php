<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Functions used for saving group data
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayCats(){

	global $DB;

	## define variables
	$Counter= 1;	$DataArray = array(); $MODdata['page'] ='groups'; $MODdata['sub'] ='view'; $MODdata['type'] ='system';
	
	$result = $DB->Query("SELECT * FROM `groups_cats` order by name");
	while( $Data = $DB->NextRow($result) )
	{

		## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
		if( ( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" ) ){
		$ExtraString ="";
		}else{
		//$ExtraString =" AND groups.approved='yes' ";
		}

		$result1 = $DB->Row("SELECT count(uid) AS totalc FROM groups WHERE cat_id ='".$Data['id']."'".$ExtraString);
		$result2 = $DB->Row("SELECT name, id, updated FROM groups WHERE cat_id ='".$Data['id']."' ORDER BY updated DESC LIMIT 1");

		if($Data['photo'] !=""){
				$DataArray[$Counter]['photo'] 		= DB_DOMAIN."inc/tb.php?src=".$Data['photo']."&x=86&y=86&t=f";
		}else{
			$DataArray[$Counter]['photo'] = DEFAULT_GROUP_CAT;
		}

		$DataArray[$Counter]['name'] 		= $Data['name'];
		$DataArray[$Counter]['id'] 			= $Data['id'];
		$DataArray[$Counter]['total'] 		= $result1['totalc'];
		$DataArray[$Counter]['last_updated'] 	= $result2['updated'];
		$DataArray[$Counter]['last_name'] 	= $result2['name'];
		$DataArray[$Counter]['last_id'] 	= $result2['id'];

		## Dynamic Link
		$MODdata['id1'] = $Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['name'];
		$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);
 

		$Counter++;
	}	
	
	return $DataArray;
}

/**
* Info: Functions used for display the blog posts on the profile page
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function DisplayGroups($pageGET, $getData="", $This_Page, $edit=false){

	global $DB;

	## define variables
	$Counter=1;	$DataArray = array(); $MODdata['page'] ='groups'; $MODdata['sub'] ='show'; $MODdata['type'] ='system';

	## check for gid, searching for group id only
	if(isset($pageGET['gid'])){ $id=$pageGET['gid']; }else{ $id=$getData['gid']; }

	$ExtraString="WHERE cat_id = ( '".$id."' ) ";
	
	## find groups from a single member	
	if(is_numeric($edit)){ $ExtraString ="WHERE groups.uid=('".$edit."')"; 	}

		## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
		if( ( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" )  || is_numeric($edit) ){
		$ExtraString .="";
		}else{
		//$ExtraString .=" AND groups.approved='yes' ";
		}

	## keyword search
	if(isset($pageGET['keyword']) || isset($getData['keyword']) ){

			$SearchTerm    = (isset($pageGET['keyword']))		?	strip_tags($pageGET['keyword'])		:$getData['keyword'];
			$SearchTerm = eMeetingInput($SearchTerm);
			$ExtraString .=  " AND ( groups.name LIKE '%".$SearchTerm."%'  OR groups.description LIKE '%".$SearchTerm."%' )";
			
			## add tag for tag cloud
			if(isset($getData['keyword'])){ AddTag("groups", $SearchTerm); }
	}

	## build extra strings
	$stoplimit=SEARCH_PAGE_ROWS;

	## start and stop variables
	if(!isset($This_Page)){$This_Page=1; }
	$startlimit = $stoplimit*($This_Page-1);
	if($startlimit <0) $startlimit =0;
 
	if(!isset($pageGET['sort'])){ $pageGET['sort']=""; }
	## BUILDING SORT STRING

	switch(trim($pageGET['sort'])){
			
			case "1": {
				$OrderByThis = "groups.id DESC";
			}break;
			
			case "2": {	
				$OrderByThis = "groups.created  DESC";			
			}break;

			case "3": {	
				$OrderByThis = "groups.updated DESC";
			}break;
			
			default: { $OrderByThis = "groups.id DESC"; }
	}

	## WORK OUT PAGE TOTAL FOR PAGE NUMBERS
	$QueryTotal ="SELECT DISTINCT count(groups.id) AS total FROM groups $ExtraString ";
	$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
	$totalResults = $DB->Row($QueryTotal);

	$SQL = "SELECT DISTINCT members.username, files.bigimage, files.approved, files.adult_content, files.type, groups.approved AS ThisApproved, groups.* FROM `groups` 
	INNER JOIN members ON ( members.id = groups.uid )
	LEFT JOIN files ON (groups.photo = files.bigimage)
 	$ExtraString ORDER BY ".$OrderByThis." LIMIT ".$startlimit.",".$stoplimit;
//print $SQL;
	$result = $DB->Query($SQL);
	while( $Data = $DB->NextRow($result) )
	{

		$result1 = $DB->Row("SELECT count(uid) AS totalc FROM `groups_members` WHERE group_id ='".$Data['id']."'");
		

		$DataArray[$Counter]['username'] 		= $Data['username'];
		$DataArray[$Counter]['id'] 				= $Data['id'];
		$DataArray[$Counter]['uid']			 	= $Data['uid'];
		$DataArray[$Counter]['name'] 			= $Data['name'];
		$DataArray[$Counter]['ThisApproved'] 	= $Data['ThisApproved'];
		$DataArray[$Counter]['featured'] 		= $Data['featured'];
		$DataArray[$Counter]['join'] 			= $Data['join_open'];
		$DataArray[$Counter]['created'] 		= $Data['created'];
		$DataArray[$Counter]['updated'] 		= $Data['updated'];
		$DataArray[$Counter]['image'] 			= ReturnDeImage($Data,"medium");
		$DataArray[$Counter]['description'] 	= eMeetingOutput($Data['description']);

		## get members who joined this event
		$DataArray[$Counter]['attending'] 		= $result1['totalc'];
		if($DataArray[$Counter]['attending'] > 1){
		$DataArray[$Counter]['attending_icon'] 	="user_1.png";
		}elseif($DataArray[$Counter]['attending'] > 0){
		$DataArray[$Counter]['attending_icon'] 	="user_0.png";
		}else{
		$DataArray[$Counter]['attending_icon'] 	="user_2.png";
		}
	
		# make link
		$MODdata['id1'] = $Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['name'];
		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
	
		$DataArray[$Counter]['TotalResults'] 	= $totalResults['total']; 			// TOTAL SEARCH RESULTS COUNTER	


		## RATING SYSTEM			
			if($Data['rating_votes'] !=0 && $Data['rating'] !=0){
				$avg = round($Data['rating']/$Data['rating_votes'],2);							
				$perc = round( (100/5)*$avg);
			}else{
				$perc=0;
			}	
			$DataArray[$Counter]['rating'] 			= $Data['rating'];
			$DataArray[$Counter]['percent'] 		= $perc;
			$DataArray[$Counter]['rating_image']	= DisplayFileRating($perc);

		$Counter++;	
	}

	return $DataArray;
}

/**
* Info: Displays the groups category list
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayCatsList($selected=""){

	global $DB;

	$result = $DB->Query("SELECT * FROM `groups_cats`");
	
	while( $Data = $DB->NextRow($result) )
	{
	if($selected ==$Data['id']){
		print "<option value='".$Data['id']."' selected>".$Data['name']."</option>";		
	}else{
		print "<option value='".$Data['id']."'>".$Data['name']."</option>";		
	}
				
	}			
}

/**
* Info: Functions used for display the members network for each group
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayNetwork($id){

	global $DB;
	
	$Counter= 1;
	$DataArray = array();
	
	$result = $DB->Query("SELECT members_data.location, members_data.age, members_data.gender, members.username, members.id, files.bigimage,	files.type,	files.approved,	files.aid, files.adult_content
	FROM members
	INNER JOIN members_data ON ( members.id = members_data.uid ) 
	INNER JOIN groups_members ON ( groups_members.uid = members_data.uid )
	LEFT JOIN files ON ( files.uid = members_data.uid AND files.default=1 AND files.type='photo') 
	WHERE  groups_members.group_id= ( '".$id."' )  GROUP BY members.id");
	
    while( $album = $DB->NextRow($result) )
    {
		$DataArray[$Counter]['id'] 			=$album['id'];
		$DataArray[$Counter]['username'] 	=$album['username'];
		$DataArray[$Counter]['gender'] 		=$album['gender'];
		$DataArray[$Counter]['age'] 		=$album['age'];		
		$DataArray[$Counter]['image'] 		= ReturnDeImage($album,"small");	

		$Counter++;
	}

	return $DataArray;
	
}



/**
* Info: Functions used for editing group data
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function EditGroupDetails($id){

	global $DB;
	$tid = strip_tags(trim($id));

	## edit options for moderator
	if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes"){
		$EditString = " groups.id='".strip_tags(trim($id))."'";
	}else{
		$EditString = "groups.uid='".$_SESSION['uid']."' AND groups.id='".strip_tags(trim($id))."'";
	}
	
	 $result = $DB->Row("SELECT files.bigimage, files.approved, files.adult_content, files.type, groups.*
	 FROM groups
	 LEFT JOIN files ON (groups.photo = files.bigimage )
	 WHERE ".$EditString." LIMIT 1");

	//$result = array_map('', $result);

	$result['photo'] 		= ReturnDeImage($result,"small");
	$result['photo_name']   = $result['bigimage'];
	$result['description']   = eMeetingOutput($result['description'],true);


	## return array
	return $result;
}

/**
* Info: Functions used for display the name for the group
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function GroupDetails($id){

	global $DB;

	if(!is_numeric($id)){ return ""; }
 
	$result = $DB->Row("SELECT name FROM `groups_cats` WHERE id='".$id."' LIMIT 1");
 	
	return $result['name'];		
}

function GroupInnerDetails($id){

	global $DB;
	$tid = strip_tags(trim($id)); if(!is_numeric($tid)){ return; }
	
	$result = $DB->Row("SELECT files.bigimage, files.approved, files.adult_content, files.type, groups.approved AS ThisApproved, members.username, groups.*, groups_cats.name 
	FROM `groups` 
	INNER JOIN groups_cats ON (groups.cat_id = groups_cats.id)
	LEFT JOIN files ON (groups.photo = files.bigimage ) 
	LEFT JOIN members ON ( members.id = groups.uid ) 
	WHERE groups.id='".$tid."' LIMIT 1");

	$result['image'] 		= ReturnDeImage($result,"medium");
	$result['sub_title'] 	= $result['name'];
	$result['comments'] 	= eMeetingOutput($result['description'],true);
	$result['name'] 		= eMeetingOutput($result['name'],true);
	$result['title'] 		= eMeetingOutput($result[9]);
	$result['hits'] 		= $result['hits'];
	$result['ThisApproved'] = $result['ThisApproved'];


	## user image
	$result0 = $DB->Row("SELECT type, adult_content, bigimage, approved FROM files WHERE uid= ( '".$result['uid']."' ) AND type='photo'  AND files.default =1 ORDER BY date DESC LIMIT 1");
	$result['user_image'] = ReturnDeImage($result0,"medium");

	// am i attending this group?
	$Joined = $DB->Row("SELECT count(uid) AS total FROM groups_members WHERE group_id ='".$result['id']."' AND uid='".$_SESSION['uid']."' LIMIT 1");
	if($Joined['total'] ==0){
		$result['joined'] ="no";
	}else{
		$result['joined'] ="yes";
	}
		if(D_MOD_WRITE ==1){
					$result['user_link'] 		=	GetUsername($result['uid']);
			}else{
					$result['user_link'] 		=	"index.php?dll=profile&pId=".$result['uid'];
			}	

		## RATING SYSTEM			
			if($result['rating_votes'] !=0 && $result['rating'] !=0){
				$avg = round($result['rating']/$result['rating_votes'],2);							
				$perc = round( (100/5)*$avg);
			}else{
				$perc=0;
			}	
 
			$result['percent'] 		= $perc;
			$result['rating_image']	= DisplayFileRating($perc);

	## update the hit counter
	$DB->Update("UPDATE groups SET hits=hits+1 WHERE groups.id=('".$id."') LIMIT 1");

	return $result;		
}

function DisplayGroupsTopicsTotal($id){

	global $DB;

	$tid = strip_tags(trim($id));
	
	$result = $DB->Row("SELECT count(id) AS total FROM groups_topics WHERE groups_id='".$tid."' LIMIT 1");

	$result = array_map('eMeetingOutput', $result);
	
	return $result['total'];	
}

function TopicDetails($id){

	global $DB;

	$tid = strip_tags(trim($id));
	
	$result = $DB->Row("SELECT title, comments FROM `groups_topics` WHERE id='".$tid."' LIMIT 1");
	
	$result = array_map('eMeetingOutput', $result);

	return $result;		
}

?>