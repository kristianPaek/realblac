<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Funcion use to check if a user can access a album
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function CheckAlbumAccess($aid,$password=""){

	global $DB;

	if(isset($_SESSION['eMeetingAlbum'.$aid]) && $_SESSION['eMeetingAlbum'.$aid] == true ){
		//return $_SESSION['eMeetingAlbum'.$aid];
		return true;
	}


	## check album for password
	$pass = $DB->Row("SELECT allow_f,allow_h,uid,password,cat FROM album WHERE aid='".$aid."' LIMIT 1");
	if(isset($_SESSION['uid']) && $_SESSION['uid'] == $pass['uid'] )//user own the album
	{
		return true;
	}	
	if( $pass['cat'] == "public" && $pass['password']=="")
	{
		## no password found
		$_SESSION['eMeetingAlbum'.$aid] = true;
		return true;
	}
	else
	{

		## check for password
		if( $pass['password']!="" && $password == $pass['password'])
		{
			## password is right
			$_SESSION['eMeetingAlbum'.$aid] = true;
			return true;
		}
		
		//if no password but friends
		elseif( ($pass['allow_f'] =="y" || $pass['allow_h'] =="y") && ( $pass['password']=="" ) )
		{		

			// CHECK FRIENDS AND HOTLIST
			$SQL = "select row_num from 
				(
					SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$pass['uid']."' )  AND members_network.type= ( '2' ) )	 
					union ALL			
					SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$pass['uid']."' )  AND members_network.type= ( '1' ) )
				) as derived_table";	
 
			$CheckThis = $DB->Query($SQL);
			## loop data from query
			$Counter = 1;
			while( $DataArray = $DB->NextRow($CheckThis) ){
		
				$CheckData[$Counter]['total'] = number_format($DataArray['row_num']); 
				$Counter++;
			}						

			if( $CheckData[1]['total'] > 0 || $CheckData[2]['total'] > 0 )
			{
				return true;
			}
		}


	}
	return false;
}		

/**
* Info: Funcions used by the software gallery pages
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/


function DisplayRecentAlbums($pageGET, $getData="", $This_Page,  $ThisMemberId=0){

	global $DB;


	## define variables	
	$Counter =1;	$DataArray = array();	$ExtraString =" WHERE album.aid !=0 AND album.filecount > 0 "; $SmallPics = array(); $run=1; $MODdata['page'] ='profile'; $MODdata['type'] ='system';

	## keyword search
	if(isset($pageGET['keyword']) || isset($getData['keyword']) ){

			$SearchTerm    = (isset($pageGET['keyword']))		?	strip_tags($pageGET['keyword'])		: $getData['keyword'];
			$SearchTerm = eMeetingInput($SearchTerm); 
			$ExtraString .=  " AND ( album.comment LIKE '%".$SearchTerm."%' OR album.title LIKE '%".$SearchTerm."%' )";			

		## add tag for tag cloud
		if(isset($getData['keyword'])){ AddTag("gallery", $SearchTerm); }
	}

	## find member album only
	if($ThisMemberId !=0){
		$ExtraString .=  " AND ( album.uid = '".$ThisMemberId."' )";		
	}

	## only public albums
	$ExtraString .=  " AND ( album.cat='public' )";

	$ExtraString .=  " AND members.active = 'active' ";


	if(D_GENDERMATCHING ==1){ 
		$ExtraString .= "AND members_data.gender !=('".$_SESSION['genderid']."')";
	}

	## build extra strings
	$stoplimit=SEARCH_PAGE_ROWS;

	## make page limits
	if(!isset($This_Page)){$This_Page=1; }
	$startlimit = $stoplimit*($This_Page-1);
	if($startlimit <0) $startlimit =0;

	## calculate total pages
	$QueryTotal  ="SELECT count(DISTINCT album.uid) AS total FROM album ";
	$QueryTotal .="INNER JOIN members ON ( members.id = album.uid ) ";
	$QueryTotal .="INNER JOIN members_data ON ( members.id = members_data.uid ) ";
	$QueryTotal .="INNER JOIN files ON ( files.aid = album.aid AND files.type='photo') ";
	$QueryTotal .= $ExtraString ;
	$totalResults = $DB->Row($QueryTotal);


	$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY

    $result = $DB->Query("SELECT members.username, members.id AS userid, members.id AS uid, album.uid, album.aid, album.title, album.comment, album.filecount, album.allow_a , album.password, album.date, album.time
	FROM members
	INNER JOIN album ON ( album.uid = members.id AND album.cat='public' )
	INNER JOIN members_data ON ( members.id = members_data.uid )
	INNER JOIN files ON ( files.aid = album.aid AND files.type='photo')	 $ExtraString
	GROUP BY album.aid ORDER BY album.date DESC LIMIT ".$startlimit.",".$stoplimit);

    while( $Data = $DB->NextRow($result) )
    {						
		$run=1;


		## make small image icons 
		if($Data['password'] != ""){ $fLimit = 1; }else{ $fLimit = 6; }
		$result1 = $DB->Query("SELECT files.id AS fid, `default`, type, title, files.uid, files.approved, adult_content, bigimage FROM files WHERE aid='".$Data['aid']."' AND type='photo' ORDER BY `default` DESC LIMIT ".$fLimit);
			
			if(!empty($result1)){		
				
				while( $pics = $DB->NextRow($result1) ){	
		
					if($run ==1){
						$SmallPics[$run]['image'] = ReturnDeImage($pics,"medium");
					}else{
						$SmallPics[$run]['image'] = ReturnDeImage($pics,"xsmall");
					}

					# small pic link
					$MODdata['sub'] ='viewfile';
					$MODdata['id1'] = $Data['userid'];
					$MODdata['id2'] = $Data['aid'];
					$MODdata['id3'] = $pics['fid'];
					$MODdata['name'] = $Data['title'];
					$SmallPics[$run]['link'] = MakeLinkMOD($MODdata);
					$run++;
				}

	
				// RETURN DATA ARRAY
				$DataArray[$Counter]['aid'] 			= $Data['aid'];
				$DataArray[$Counter]['title'] 			= eMeetingOutput($Data['title']);
				$DataArray[$Counter]['comment']			= eMeetingOutput($Data['comment']);
				$DataArray[$Counter]['filecount'] 		= $Data['filecount'];
				$DataArray[$Counter]['adult'] 			= $Data['allow_a'];
				$DataArray[$Counter]['username'] 		= $Data['username'];
				$DataArray[$Counter]['uid'] 			= $Data['uid'];
				$DataArray[$Counter]['images'] 			= $SmallPics;
				$DataArray[$Counter]['TotalResults'] 	= $totalResults['total']; 			// TOTAL SEARCH RESULTS COUNTER
				$DataArray[$Counter]['password'] 		= $Data['password'];
				
				# make link
				if($Data['password'] != ""){

					$DataArray[$Counter]['link'] 			= 'javascript:void(0);" onClick="CheckAlbumPassword('.$Data['aid'].','.$Data['uid'].');';

				}else{

					# make link
					$MODdata['sub'] ='manage';
					$MODdata['id1'] = $Data['userid'];
					$MODdata['id2'] = $Data['aid'];
					$MODdata['name'] = $DataArray[$Counter]['title'];
					$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);

				}


				if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['user_link'] 		=	DB_DOMAIN.$Data['username'];
				}else{
					$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pId=".$Data['userid'];
				}

				$DataArray[$Counter]['date'] 		= $Data['date'];
				$DataArray[$Counter]['time'] 		= $Data['time'];
				$Counter++;
				$SmallPics = array();
			}	


	}

	## return array	
	return $DataArray;
}

/**
* Info: Funcions used to display all files for one album
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayAlbums($id){

	global $DB;


	$Counter =1;
	$DataArray = array();
    $result = $DB->Query("SELECT album.password, album.aid, album.title, album.comment, album.filecount, allow_a FROM album WHERE album.uid='".$id."' ORDER BY album.title ASC");

    while( $Data = $DB->NextRow($result) )
    {						
			$result1 = $DB->Row("SELECT type, files.approved, adult_content, bigimage FROM files WHERE aid='".$Data['aid']."' AND type='photo' ORDER BY date DESC LIMIT 1");

			$DataArray[$Counter]['aid'] 			= $Data['aid'];
			$DataArray[$Counter]['title'] 			= eMeetingOutput($Data['title']);
			$DataArray[$Counter]['comment']			= eMeetingOutput($Data['comment']);
			$DataArray[$Counter]['filecount'] 		= $Data['filecount'];
			$DataArray[$Counter]['adult'] 			= $Data['allow_a'];
			$DataArray[$Counter]['password'] 		= $Data['password'];
			
			$DataArray[$Counter]['image'] 			= ReturnDeImage($result1,"medium");
		
			$Counter++;		
	}
	
	return $DataArray;
}


/**
* Info: Funcions used to display all files for one album
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayGallery($id, $aid, $profile=false){

	global $DB;
	
	$Counter =1; $DataArray = array(); $MODdata['type'] ='system'; $CanViewAlbum=1;
		
	if($id == $_SESSION['uid']){
		$EditString="";
	}else{
// $EditString="AND files.type='photo' ";
		$EditString=" AND files.approved='yes' ";
	}



	$cK = $DB->Row("SELECT album.uid, album.cat, album.allow_f, album.allow_h FROM album WHERE  aid= ( '".$aid."' ) LIMIT 1");

	// CHECK IF THIS MEMBER CAN VIEW THIS ALBUM
	if($_SESSION['auth'] =="yes" && $cK['cat']=="private" && (!isset($_SESSION['eMeetingAlbum'.$aid]) || $_SESSION['eMeetingAlbum'.$aid] != true )){
	
		// IS THIS ALBUM SECURED?
		if($cK['uid'] != $_SESSION['uid']){
		
				// CHECK FRIENDS AND HOTLIST
		
				$SQL = "select row_num from 
					(
						SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$cK['uid']."' )  AND members_network.type= ( '2' ) )
				 
						union ALL	
			
						SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$cK['uid']."' )  AND members_network.type= ( '1' ) )
								
					) as derived_table";
	
	
	
				$CheckThis = $DB->Query($SQL);
				$checkdone=1;
				## loop data from query
				while( $DataArray = $DB->NextRow($CheckThis) ){
			
					$CheckData[$Counter]['total'] = number_format($DataArray['row_num']); 
					$Counter++;
				}		
		}

		// CHECK VALUE
		if(isset($checkdone))
		{
			if( ($cK['allow_f'] =="y" && $CheckData[1]['total'] == 0) && ($cK['allow_h'] =="y" && $CheckData[2]['total'] == 0) )
			{
				// cannot view
				$CanViewAlbum=0;
				return $DataArray;	
			}		
		}
	}
	$Counter = 0;


	$SQL = "SELECT album.cat, album.allow_f, album.allow_h, files.default, files.description, album.time, album.date, album.title AS atitle, files.adult_content,  files.approved,   files.bigimage,  files.id,  files.uid, files.aid,  files.type,  files.title,  files.views , files.rating,  files.rating_votes 
	FROM files 
	INNER JOIN album ON ( files.aid = album.aid )
	WHERE  files.aid= ( '".$aid."' ) AND  files.uid=( '".$id."' )   ".$EditString."
	ORDER BY  files.date DESC";
 
	$result1 = $DB->Query($SQL);
			
			while( $Data = $DB->NextRow($result1) )
			{	

				 
				// GET THE NUMBER OF COMMENTS LEFT FOR THIS IMAGE
				$re = $DB->Row("SELECT count(id) AS total FROM comments WHERE ex1_id = ( '".$Data['id']."' )");
				
				//////////////////////////////////////////////////////////////
				if($Data['rating_votes'] !=0 && $Data['rating'] !=0){
						$avg = round($Data['rating']/$Data['rating_votes'],2);							
						$perc = round( (100/5)*$avg);
				}else{
						$perc=0;
				}								

				//////////////////////////////////////////////////////////////				
				$DataArray[$Counter]['id'] 			= $Data['id'];
				$DataArray[$Counter]['aid'] 		= $Data['aid'];
				$DataArray[$Counter]['uid'] 		= $Data['uid'];
				$DataArray[$Counter]['atitle'] 		= eMeetingOutput($Data['atitle']);
				$DataArray[$Counter]['time'] 		= $Data['time'];
				$DataArray[$Counter]['date'] 		= dates_interconv($Data['date']);
				$DataArray[$Counter]['bigimage'] 		= $Data['bigimage'];
				$DataArray[$Counter]['title'] 		= eMeetingOutput($Data['title']);
				$DataArray[$Counter]['description'] 		= eMeetingOutput($Data['description']); 
				$DataArray[$Counter]['default']		= $Data['default'];
				$DataArray[$Counter]['approved']	= $Data['approved'];
				$DataArray[$Counter]['rating']		= $perc;
				$DataArray[$Counter]['rating_image']= DisplayFileRating($perc);
				$DataArray[$Counter]['views'] 		= $Data['views'];
				$DataArray[$Counter]['type'] 		= $Data['type'];
				$DataArray[$Counter]['comments'] 	= $re['total'];
				$DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"medium");			
				$DataArray[$Counter]['rating_votes']= $Data['rating_votes'];
				$DataArray[$Counter]['adult']		= $Data['adult_content'];
				$DataArray[$Counter]['adult_content']		= $Data['adult_content'];

			# make link
			if($profile){
				$MODdata['page'] ='profile'; $MODdata['sub'] ='viewfile';
			}else{
				$MODdata['page'] ='classads'; $MODdata['sub'] ='manage';
			} 

			$MODdata['id1'] = $Data['uid'];
			$MODdata['id2'] = $Data['aid'];
			$MODdata['id3'] = $Data['id'];
			$MODdata['name'] = $DataArray[$Counter]['title'];

			if($_SESSION['pack_adult'] !="yes" && $Data['adult_content'] =="yes" && $Data['uid'] != $_SESSION['uid'] && $_SESSION['site_moderator'] =='no' && ENABLE_ADULTCONTENT =="yes"){

			$DataArray[$Counter]['link'] = "javascript:alert('".$GLOBALS['_LANG_ERROR']['_noAdultAccess']."')";

			}else{

			$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
			}

			$MODdata['page'] ='gallery';
			$MODdata['sub'] ='edit';
			$MODdata['id1'] = $Data['uid'];
			$MODdata['id2'] = $Data['aid'];
			$MODdata['id3'] = $Data['id'];
			$MODdata['name'] = $DataArray[$Counter]['title'];
			$DataArray[$Counter]['edit_link'] = MakeLinkMOD($MODdata);



			$Counter++;				
						
	}
	
	return $DataArray;
}

/**
* Info: Funcions used to display albums files on the profile page
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayGalleryFiles($id){

	global $DB;

	$Counter =1;	$DataArray = array(); $MODdata['type'] ='system';

	$result = $DB->Query("SELECT files.bigimage, files.type,album.uid, files.approved, files.adult_content, album.password, album.aid, album.title, album.comment , album.filecount, album.cat, album.allow_a, album.allow_f, album.allow_h, album.allow_n 
	FROM album 
	INNER JOIN files ON ( files.aid = album.aid )
	WHERE album.uid='".$id."' 
	AND album.cat = 'public' 
	GROUP BY album.aid ORDER BY album.filecount DESC");   
    while( $Data = $DB->NextRow($result) )
    {	
	
			// RETURN DATA ARRAY
			$DataArray[$Counter]['id'] 				= $Data['uid'];
			$DataArray[$Counter]['aid'] 			= $Data['aid'];
			$DataArray[$Counter]['title'] 			= $Data['title'];
			$DataArray[$Counter]['comment']			= eMeetingOutput($Data['comment']);
			$DataArray[$Counter]['filecount'] 		= $Data['filecount'];
			$DataArray[$Counter]['approved'] 		= $Data['approved'];
			$DataArray[$Counter]['adult_content'] 	= $Data['adult_content'];
			$DataArray[$Counter]['uid'] 			= $Data['uid'];

			## turn off the password lock if the user has already entered the password
			if(isset($_SESSION['eMeetingAlbum'.$Data['aid']]) && $_SESSION['eMeetingAlbum'.$Data['aid']] == true ){
				$DataArray[$Counter]['password'] 		= "";
			}else{
				$DataArray[$Counter]['password'] 		= $Data['password'];
			}

			$DataArray[$Counter]['upgrade'] 		= 0;			
			$DataArray[$Counter]['image'] 			= 			ReturnDeImage($Data,"small");			
			$DataArray[$Counter]['canView'] 		= 1;
			$DataArray[$Counter]['canDisplay'] 		= 'a70';


			$MODdata['id1'] = $Data['uid'];
			$MODdata['id2'] = $Data['aid'];
			$MODdata['id3'] = $Data['id'];
			$MODdata['name'] = $DataArray[$Counter]['title'];
			$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
			
			
			$Counter++;		
	}
	
	return $DataArray;
	
}

/**
* Info: Funcions used to display a single file
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

function DisplayLarge($id){


	global $DB;

	$FileData = array(); $perc=0;

	if(!is_numeric($id)){ return ""; }
	
	$Data = $DB->Row("SELECT files.*, album.title AS album_title
	FROM files 
	LEFT JOIN album ON ( files.aid = album.aid )
	WHERE files.id= ( '".$id."' ) LIMIT 1");
	
	$FileData['album_title'] 	= $Data['album_title'];
	$FileData['title'] 			= $Data['title'];
	$FileData['desc'] 			= $Data['description'];
	$FileData['description'] 	= $Data['description'];
	$FileData['type'] 			= $Data['type'];
	$FileData['rating'] 		= $Data['rating'];
	$FileData['rating_votes'] 	= $Data['rating_votes'];
	$FileData['views'] 			= $Data['views'];
	$FileData['adult_content'] 	= $Data['adult_content'];
	$FileData['rating_image']	= DisplayFileRating($perc);
	$FileData['id']					= $Data['id'];
	$FileData['bigimage']					= $Data['bigimage'];
 
	if($Data['rating_votes'] !=0 && $Data['rating'] !=0){
		$avg = round($Data['rating']/$Data['rating_votes'],2);							
		$perc = round( (100/5)*$avg);
	}else{
		$perc=0;
	}	


	$FileData['percent'] 	= $perc;

	if($_SESSION['pack_adult'] !="yes" && $FileData['adult_content'] =="yes" && $Data['uid'] != $_SESSION['uid'] && $_SESSION['site_moderator'] =='no' && ENABLE_ADULTCONTENT =="yes")
	{
	
		
	 	$FileData['src'] = MakeDisplayFile($Data);
	 
		$FilS = @getimagesize(PATH_IMAGE.DEFAULT_IMAGE_ADULT);
	
		$Data['bigimage'] = str_replace(DB_DOMAIN,"",DEFAULT_IMAGE_ADULT);
	 
		if($FileData['type'] =="photo"){ $ImageString = "<img src='".DB_DOMAIN."inc/tb.php?src=".DEFAULT_IMAGE_ADULT."&t=f'>"; $FileData['src'] = $ImageString; }

	}
	else
	{
		
	 	$FileData['src'] = MakeDisplayFile($Data);
	 
		$FilS = @getimagesize(PATH_IMAGE.$Data['bigimage']);
	
		$Data['bigimage'] = str_replace(DB_DOMAIN,"",$Data['bigimage']);
	 
		if($FileData['type'] =="photo"){ $ImageString = "<img src='".DB_DOMAIN."inc/tb.php?src=".$Data['bigimage']."&t=i&x=".$FilS[0]."&y=".$FilS[1]."'>"; $FileData['src'] = $ImageString; }

	}
	return $FileData;
}


function GetFileetails($id){

	global $DB;

    $result = $DB->Row("SELECT adult_content, approved,  title, description, aid FROM files WHERE uid='".$_SESSION['uid']."' AND id='".strip_tags($id)."' LIMIT 1");
	$result = array_map('eMeetingOutput', $result);
	return $result;
}

function GetAlbumDetails($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM album WHERE uid='".$_SESSION['uid']."' AND aid='".strip_tags($id)."' LIMIT 1");
	$result = array_map('eMeetingOutput', $result);
	return $result;
}


?>