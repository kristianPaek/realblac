<?php 
// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Funcions used to get the event type based on the id
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function GetEventType($id){

	global $DB;

	if(!is_numeric($id)){ return ""; }
	$data = $DB->Row("SELECT id, name, icon FROM calendar_types WHERE id='".$id."' LIMIT 1");
	
	return $data['name'];
}

/**
* Info: Funcions used to get a list of the event categories
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function ListCats(){

	global $DB;

	# define variables
	$DataArray = array(); $Counter=1;	$runThis=""; $MODdata['page'] ='calendar'; $MODdata['sub'] ='search'; $MODdata['type'] ='system';

	## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" ){
	$runThis ="";
	}else{
	$runThis =" AND calendar_data.approved='yes' ";
	}

	$result1 = $DB->Query("SELECT id, name, icon FROM calendar_types ORDER BY name ASC");

    while( $Data = $DB->NextRow($result1) )
    {
		$TT = $DB->Row("SELECT count(calendar_data.id) AS total FROM calendar_data WHERE type_1=".$Data['id'].$runThis);
 
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
* Info: Displays the three main page box options
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayFeaturedOverview($limit){

	global $DB;

	$DataArray=array();  $MODdata['page'] ='calendar'; $MODdata['type'] ='system';

	$SQL = "SELECT calendar_data.photo, calendar_data.id, files.aid, files.bigimage,	files.adult_content, files.type,	files.approved,	files.aid,	members.username, calendar_data.id, calendar_data.uid, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved FROM calendar_data 
	INNER JOIN members ON ( members.id = calendar_data.uid )		 
	LEFT JOIN files ON ( calendar_data.photo = files.bigimage ) 
	WHERE calendar_data.featured ='yes'
	GROUP BY calendar_data.id ORDER BY RAND() LIMIT ".$limit;
	
	$result = $DB->Query($SQL);
	while( $data = $DB->NextRow($result) ){
 
		$DataArray[$Counter]['id'] 				= $data['id'];
		$DataArray[$Counter]['date'] 			= dates_interconv($data['eventdate']);
		$DataArray[$Counter]['title'] 			= eMeetingOutput($data['shortevent']);
		$DataArray[$Counter]['longevent'] 		= eMeetingOutput($data['longevent']);
		$DataArray[$Counter]['city'] 			= eMeetingOutput($data['city']);
		$DataArray[$Counter]['website'] 			= eMeetingOutput($data['website']);
		$DataArray[$Counter]['image']			= ReturnDeImage($data,"medium");

		## see if the member is attending
		$ffE = $DB->Row("SELECT count(uid) AS found FROM calendar_attending WHERE event_id='".$data['id']."' LIMIT 1");

 	 	if($ffE['found'] > 0){ $Data['foundattending']=$ffE['found']; }else{ $Data['foundattending']=0; }	
 	 	$DataArray[$Counter]['attending'] 	= $Data['foundattending'];
		if($DataArray[$Counter]['attending'] > 1){
		$DataArray[$Counter]['attending_icon'] 	="user_1.png";
		}elseif($DataArray[$Counter]['attending'] > 0){
		$DataArray[$Counter]['attending_icon'] 	="user_0.png";
		}else{
		$DataArray[$Counter]['attending_icon'] 	="user_2.png";
		}

		# make link
		$MODdata['sub'] ='view';
		$MODdata['id1'] = $data['id'];
		$MODdata['name'] = $DataArray['title'];
		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);

		$Counter++;
		}		

	return $DataArray;
}
/**
* Info: Displays the three main page box options
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayOverviewBoxes($type){

	global $DB;

	$DataArray=array();  $MODdata['page'] ='calendar'; $MODdata['type'] ='system';

	if($type ==1){

	$item = $DB->Row("SELECT calendar_data.photo, calendar_data.id, files.aid, files.bigimage,	files.adult_content, files.type,	files.approved,	files.aid,	album.cat,	album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f, members.username, calendar_data.id, calendar_data.uid, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved FROM calendar_data 
		INNER JOIN members ON ( members.id = calendar_data.uid )		 
		LEFT JOIN files ON ( calendar_data.photo = files.bigimage ) 
		LEFT JOIN album ON ( album.aid = files.aid )
		WHERE calendar_data.approved='yes'
		GROUP BY calendar_data.id ORDER BY calendar_data.eventdate LIMIT 1");

	}elseif($type ==2){

	$item = $DB->Row("SELECT calendar_data.photo, calendar_data.id, files.aid, files.bigimage,	files.adult_content,files.type,	files.approved,	files.aid,	album.cat,	album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f, members.username, calendar_data.id, calendar_data.uid, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved FROM calendar_data 
		INNER JOIN members ON ( members.id = calendar_data.uid )		 
		LEFT JOIN files ON ( calendar_data.photo = files.bigimage ) 
		LEFT JOIN album ON ( album.aid = files.aid )
		WHERE calendar_data.approved='yes'
		GROUP BY calendar_data.id ORDER BY calendar_data.hits DESC LIMIT 1");

	}elseif($type ==3){

	$item = $DB->Row("SELECT calendar_data.photo, calendar_data.id, files.aid, files.bigimage,	files.adult_content, files.type,	files.approved,	files.aid,	album.cat,	album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f, members.username, calendar_data.id, calendar_data.uid, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved FROM calendar_data 
		INNER JOIN members ON ( members.id = calendar_data.uid )		 
		LEFT JOIN files ON ( calendar_data.photo = files.bigimage ) 
		LEFT JOIN album ON ( album.aid = files.aid )
		WHERE calendar_data.approved='yes'
		GROUP BY calendar_data.id ORDER BY calendar_data.id DESC LIMIT 1");
	
	}elseif($type ==4){

	$item = $DB->Row("SELECT calendar_data.photo, calendar_data.id, files.aid, files.bigimage,	files.adult_content, files.type,	files.approved,	files.aid,	members.username, calendar_data.id, calendar_data.uid, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved FROM calendar_data 
		INNER JOIN members ON ( members.id = calendar_data.uid )		 
		LEFT JOIN files ON ( calendar_data.photo = files.bigimage ) 
		WHERE calendar_data.featured ='yes'
		GROUP BY calendar_data.id ORDER BY RAND() LIMIT 1");
	
	}
 
		$DataArray['id'] 			= $item['id'];
		$DataArray['date'] 			= dates_interconv($item['eventdate']);
		$DataArray['title'] 		= eMeetingOutput($item['shortevent']);
		$DataArray['city'] 			= eMeetingOutput($item['city']);
		$DataArray['website'] 			= eMeetingOutput($item['website']);

		if($type  ==4){
			$DataArray['image']		= ReturnDeImage($item,"big");
			$DataArray['comments'] 	= $item['longevent'];
		}else{
			$DataArray['image']		= ReturnDeImage($item,"medium");
		}

		## see if the member is attending
		$ffE = $DB->Row("SELECT count(uid) AS found FROM calendar_attending WHERE event_id='".$item['id']."' LIMIT 1");

 	 	if($ffE['found'] > 0){ $Data['foundattending']=$ffE['found']; }else{ $Data['foundattending']=0; }	
 	 	$DataArray['attending'] 	= $Data['foundattending'];
		if($DataArray['attending'] > 1){
		$DataArray['attending_icon'] 	="user_1.png";
		}elseif($DataArray['attending'] > 0){
		$DataArray['attending_icon'] 	="user_0.png";
		}else{
		$DataArray['attending_icon'] 	="user_2.png";
		}

		# make link
		$MODdata['sub'] ='view';
		$MODdata['id1'] = $item['id'];
		$MODdata['name'] = $DataArray['title'];
		$DataArray['link'] = MakeLinkMOD($MODdata);	

	return $DataArray;
}
 

function GetAttending($eventID){

		global $DB;

		## define variables
		$Counter =1;$DataArray = array();	
		
		$query = "SELECT members.id AS uid, members.username, files.aid, files.bigimage, files.adult_content, files.type,	files.approved,	files.aid,	files.adult_content
		FROM members
		INNER JOIN calendar_attending ON ( members.id = calendar_attending.uid )
		INNER JOIN calendar_data ON ( calendar_data.id = calendar_attending.event_id )		 
		LEFT JOIN files ON ( files.uid = members.id AND files.default LIKE '%1%' ) 
		WHERE  calendar_attending.event_id=('".$eventID."')
		GROUP BY members.id";
		
		$result = $DB->Query($query);
		while( $data = $DB->NextRow($result) ){
				 	 	 	 	 	 	 	 	 	 	 	 	 	 	
				$DataArray[$Counter]['uid'] 		= 	$data['uid'];
				$DataArray[$Counter]['username'] 	= 	$data['username'];				
				$DataArray[$Counter]['image'] 		= ReturnDeImage($data,"small");
	
		$Counter++;
		}		
	
	## update the hit counter
	$DB->Update("UPDATE calendar_data SET hits=hits+1 WHERE calendar_data.id=('".$eventID."') LIMIT 1");
	
	return $DataArray;			
}

/**
* Info: Search Events
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function GetEvents($pageGET, $getData="", $This_Page, $edit=false){ //, $edit=false, $date, $friends, $limit=100
 
		global $DB;

		if(is_array($This_Page)){ $This_Page =1; }
		## define variables
		$Counter =1;$DataArray = array(); $MODdata['page'] ='calendar'; $MODdata['sub'] ='view'; $MODdata['type'] ='system'; $MyThis="";

		$ExtraString=" WHERE calendar_data.id !=0 ";

		## keyword search
		if(isset($pageGET['keyword']) || isset($getData['keyword']) ){
			$SearchTerm    = (isset($pageGET['keyword']))		?	strip_tags($pageGET['keyword'])		:$getData['keyword'];
			$ExtraString .=  " AND ( calendar_data.shortevent LIKE '%".$SearchTerm."%' OR calendar_data.longevent LIKE '%".$SearchTerm."%' )";
			
			## add tag for tag cloud
			if(isset($getData['keyword'])){ AddTag("calendar", $SearchTerm); }	
		}

		## type id search
		if(isset($pageGET['type']) || isset($getData['type']) ){
			$SearchID    = (isset($pageGET['type']))		?	strip_tags($pageGET['type'])		:$getData['type'];

			$ExtraString .=  " AND ( calendar_data.type_1 = '".$SearchID."' )";

		}

		## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
		if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes"  || is_numeric($edit) ){
			$ExtraString .="";
		}else{
			$ExtraString .=" AND calendar_data.approved='yes' ";
		}

		if(is_numeric($edit)){ $MyThis = " AND calendar_data.uid=('".$edit."') "; 	}


		## GET ALL EVENTS ON THIS DATE
		if(isset($getData['date'])){
			$eD = explode(":",$getData['date']);
	
			if(is_numeric($eD[0]) && is_numeric($eD[1]) && is_numeric($eD[2])){
			
				$ExtraString .=  " AND calendar_data.eventdate = ( '".$eD[2]."-".$eD[1]."-".$eD[0]."' ) $friends ";
			}
		}	

		## GET ONLY THIS EVENT
		$EVENTID    = (isset($getData['eventid']))		?	strip_tags($getData['eventid'])		: "";
 
		if(isset($EVENTID) && is_numeric($EVENTID)){
			$ExtraString .= " AND calendar_data.id = ('".$EVENTID."') "; $stoplimit=1;
		}
		
		## GET ONLY THIS EVENT
		if(isset($pageGET['type'])){$getData['type']= $pageGET['type']; }
		if(isset($getData['type']) ){
			if($getData['type'] =="yes"){ $rType="yes"; }else{ $rType="no"; }
			//$ExtraString  .= " AND calendar_data.recurring = ('".$rType."') ";
		}

		## build extra strings
		$stoplimit=SEARCH_PAGE_ROWS;

		if(!isset($pageGET['displaytype'])){ $pageGET['displaytype']="4"; }
		## BUILDING SORT STRING
 
		switch(trim($pageGET['displaytype'])){
				
				case "3": {
					$OrderByThis = "calendar_data.id DESC";
				}break;
				
				case "4": {	
					$OrderByThis = "calendar_data.eventdate ASC";			
				}break;
	
				case "5": {	
					$OrderByThis = "calendar_data.hits DESC";
				}break;
				
				default: { $OrderByThis = "calendar_data.id DESC"; }
		}
		
		## build page start stops
		if(!isset($This_Page)){$This_Page=1; }
		$startlimit = $stoplimit*($This_Page-1);
		if($startlimit <0) $startlimit =0;


		// WORK OUT PAGE TOTAL FOR PAGE NUMBERS
		$QueryTotal ="SELECT DISTINCT count(calendar_data.id) AS total FROM calendar_data ".$ExtraString.$MyThis ;
		$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
		$totalResults = $DB->Row($QueryTotal);
 	
		$query = "SELECT calendar_data.hits, calendar_types.name, calendar_data.attachment, calendar_data.approved AS ThisApproved, calendar_data.photo, calendar_data.rating, calendar_data.rating_votes, calendar_data.photo, calendar_data.featured, files.aid, files.bigimage, files.type,	files.adult_content, files.approved,	files.aid,	album.cat,	album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f, members.username, calendar_data.id, calendar_data.uid AS uid, calendar_data.id, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved 
		FROM calendar_data 
		INNER JOIN members ON ( members.id = calendar_data.uid )		
		INNER JOIN calendar_types ON (calendar_types.id = calendar_data.type_1)
		LEFT JOIN files ON ( calendar_data.uid = files.uid AND files.default=1 ) 
		LEFT JOIN album ON ( album.aid = files.aid ) $ExtraString $MyThis";
		$query .= " GROUP BY calendar_data.id ORDER BY ".$OrderByThis." LIMIT ".$startlimit.",".$stoplimit;
	
		$result = $DB->Query($query);
		while( $Data = $DB->NextRow($result) ){
		
		## make the unsafe data safe
		$DataArray[$Counter]['longevent'] 	= 	eMeetingOutput($Data['longevent']);
		$DataArray[$Counter]['comments'] 	= 	eMeetingOutput($Data['longevent'],true);		 	 	
		$DataArray[$Counter]['shortevent'] 	= 	eMeetingOutput($Data['shortevent']);
		$DataArray[$Counter]['country'] 	= 	eMeetingOutput($Data['country']);
		$DataArray[$Counter]['ThisApproved'] 	= 	$Data['ThisApproved'];
		$DataArray[$Counter]['province'] 	= 	eMeetingOutput($Data['province']);
		$DataArray[$Counter]['city'] 		= 	eMeetingOutput($Data['city']);
		$DataArray[$Counter]['street'] 		= 	eMeetingOutput($Data['street']);
		$DataArray[$Counter]['phone'] 		= 	eMeetingOutput($Data['phone']);
		$DataArray[$Counter]['email'] 		= 	eMeetingOutput($Data['email']);
		$DataArray[$Counter]['website'] 	= 	eMeetingOutput($Data['website']);
		$DataArray[$Counter]['name'] 		= 	$Data['name'];

		## already safe data
		$DataArray[$Counter]['id'] 			= 	$Data['id'];
		$DataArray[$Counter]['eventdate'] 	= 	dates_interconv($Data['eventdate']); $event_date_bits 					= explode("-",$Data['eventdate']);		
		$DataArray[$Counter]['event_day'] 	= 	$event_date_bits[2];
		$DataArray[$Counter]['event_month'] = 	MakeCalendarMonth($event_date_bits[1]);
		$DataArray[$Counter]['event_year'] 	= 	$event_date_bits[0];
		$DataArray[$Counter]['eventdb'] 	= 	$event_date_bits;
		$DataArray[$Counter]['eventtime'] 	= 	$Data['eventtime'];
		$DataArray[$Counter]['type_1'] 		= 	$Data['type_1'];
		$DataArray[$Counter]['hits'] 		= 	$Data['hits'];
		$DataArray[$Counter]['featured'] 	= 	$Data['featured'];
		$DataArray[$Counter]['type_2'] 		= 	$Data['type_2'];
		$DataArray[$Counter]['vis'] 		= 	$Data['vis'];
		$DataArray[$Counter]['event_approved'] 	= 	$Data['event_approved'];
		$DataArray[$Counter]['username'] 	= 	$Data['username'];
		$DataArray[$Counter]['uid'] 		= 	$Data['uid'];
		$DataArray[$Counter]['true_date'] 	= $Data['eventdate']; //$ed = explode("-",$Data['eventdate']);
		$DataArray[$Counter]['TotalResults']= $totalResults['total']; 			// TOTAL SEARCH RESULTS COUNTER	
		$DataArray[$Counter]['attachment'] 	= $Data['attachment'];

		## make global data types
		$DataArray[$Counter]['date_updated'] = $DataArray[$Counter]['eventdate'];
		$DataArray[$Counter]['sub_title'] 	 = $DataArray[$Counter]['shortevent'];

		## see if the member is attending
		$ffE = $DB->Row("SELECT count(uid) AS found FROM calendar_attending WHERE event_id='".$Data['id']."' LIMIT 1");
 	 	if($ffE['found'] > 0){ $Data['foundattending']=$ffE['found']; }else{ $Data['foundattending']=0; }	
 	 	$DataArray[$Counter]['attending'] 	= $Data['foundattending'];
		if($DataArray[$Counter]['attending'] > 1){
		$DataArray[$Counter]['attending_icon'] 	="user_1.png";
		}elseif($DataArray[$Counter]['attending'] > 0){
		$DataArray[$Counter]['attending_icon'] 	="user_0.png";
		}else{
		$DataArray[$Counter]['attending_icon'] 	="user_2.png";
		}

		## make photo icons
		if( $Data['photo'] !=""){
			// use the database icon as the main icon
			$DataArray[$Counter]['image'] 	= 	ReturnDeImage($Data,"medium");
			// then clear the photo array and get user photo
			$Data['photo'] ="";
			$DataArray[$Counter]['user_image'] 	= 	ReturnDeImage($Data,"medium"); 
								
		}else{
			// no photo found lets make the members icon as the main photo, looks nicer :)
			$result1 = $DB->Row("SELECT type, adult_content, bigimage, files.approved FROM files WHERE uid='".$Data['uid']."' AND type='photo'  and adult_content !='yes' ORDER BY date DESC LIMIT 1");
			$DataArray[$Counter]['image'] 		= ReturnDeImage($result1,"medium");
			$DataArray[$Counter]['user_image'] = $DataArray[$Counter]['image'];

		}		
 
		## now make nice clear links
		$MODdata['id1'] = $Data['id'];
		$MODdata['name'] = $DataArray[$Counter]['shortevent'];
		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
		if(D_MOD_WRITE ==1){
				$DataArray[$Counter]['user_link'] 		=	$Data['username'];
		}else{
				$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pId=".$Data['uid'];
		}	

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
* Info: Manage my posts
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function GetList(){

		global $DB;

		## define variables
		$Counter =1;	$DataArray = array(); $MODdata['page'] ='calendar'; $MODdata['sub'] ='view'; 

		$result = $DB->Query("SELECT calendar_data.id, files.aid, files.bigimage,	files.type,	files.approved,	files.aid,	album.cat,	album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f, members.username, calendar_data.id, calendar_data.uid, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved FROM calendar_data 
		INNER JOIN members ON ( members.id = calendar_data.uid )		 
		LEFT JOIN files ON ( calendar_data.photo = files.bigimage ) 
		LEFT JOIN album ON ( album.aid = files.aid )
		WHERE calendar_data.uid='".$_SESSION['uid']."' GROUP BY calendar_data.id");

		while( $data = $DB->NextRow($result) ){

		## make the output safe
		$data = array_map('eMeetingOutput', $data);

				$DataArray[$Counter]['id'] 			= 	$data['id'];
				$DataArray[$Counter]['eventdate'] 	= 	dates_interconv($data['eventdate']);
				$DataArray[$Counter]['eventtime'] 	= 	$data['eventtime'];
				$DataArray[$Counter]['shortevent'] 	= 	strip_tags(substr($data['shortevent'],0,150))."...";
				$DataArray[$Counter]['longevent'] 	= 	strip_tags(substr($data['longevent'],0,150))."...";
				$DataArray[$Counter]['type_1'] 		= 	$data['type_1'];
				$DataArray[$Counter]['type_2'] 		= 	$data['type_2'];
				$DataArray[$Counter]['country'] 	= 	$data['country'];
				$DataArray[$Counter]['province'] 	= 	$data['province'];
				$DataArray[$Counter]['city'] 		= 	$data['city'];
				$DataArray[$Counter]['street'] 		= 	$data['street'];
				$DataArray[$Counter]['phone'] 		= 	$data['phone'];
				$DataArray[$Counter]['email'] 		= 	$data['email'];
				$DataArray[$Counter]['website'] 	= 	$data['website'];
				$DataArray[$Counter]['vis'] 		= 	$data['vis'];
				$DataArray[$Counter]['approved'] 	= 	$data['event_approved'];
				$DataArray[$Counter]['username'] 	= 	$data['username'];
				$DataArray[$Counter]['uid'] 		= 	$data['uid'];
				$DataArray[$Counter]['image'] 		= 	ReturnDeImage($data,"xsmall");
				
				// CREATE LINK
				$MODdata['id1'] 					= $data['id'];
				$MODdata['name'] 					= $DataArray[$Counter]['title'];
				$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);
				
			$Counter++;
		
		}		
		
		return $DataArray;		
}

/**
* Info: Get Calendar data for editing
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function EditThis($id){
	
	global $DB;

	if(!is_numeric($id)){ return ""; }

	## edit options for moderator
	if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes"){
		$EditString = "calendar_data.id= ('".$id."')";
	}else{
		$EditString = "calendar_data.id= ('".$id."') AND calendar_data.uid=('".$_SESSION['uid']."')";
	}

	$result = $DB->Row("SELECT files.bigimage, files.approved, files.adult_content, files.type, files.title, calendar_data.*
	FROM calendar_data 
	LEFT JOIN files ON (calendar_data.photo = files.bigimage AND files.default=1 )
	WHERE ".$EditString." LIMIT 1");

	if(empty($result)){ return 0; }


	$result['photo'] 		= ReturnDeImage($result,"small");
	$result['photo_name']   = $result['bigimage'];
	$result['shortevent ']  = eMeetingOutput($result['shortevent']);
	$result['longevent']    = eMeetingOutput($result['longevent'],true);

	$result['eventdate'] 	= 	dates_interconv($result['eventdate']);
	$result['eventtime'] 	= 	eMeetingOutput($result['eventtime']);
	$result['type_1'] 		= 	eMeetingOutput($result['type_1']);
	$result['type_2'] 		= 	eMeetingOutput($result['type_2']);
	$result['country'] 		= 	eMeetingOutput($result['country']);
	$result['province'] 	= 	eMeetingOutput($result['province']);
	$result['city'] 		= 	eMeetingOutput($result['city']);
	$result['street'] 		= 	eMeetingOutput($result['street']);
	$result['phone'] 		= 	eMeetingOutput($result['phone']);
	$result['email'] 		= 	eMeetingOutput($result['email']);
	$result['website'] 		= 	eMeetingOutput($result['website']);

	$result['title'] 		= 	eMeetingOutput($result['title']);

	return $result;
}
?>