<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function GetMusic($pageGET, $getData="", $This_Page, $showMy = false){

	global $DB;
	
	$Counter =1;
	$DataArray = array();
	$ExtraString="";


		if(isset($pageGET['keyword']) || isset($getData['keyword']) ){
			$SearchTerm    = (isset($pageGET['keyword']))		?	strip_tags($pageGET['keyword'])		:$getData['keyword'];
			$ExtraString .=  " AND ( files.title LIKE '%".$SearchTerm."%' )";
			
			## add tag for tag cloud
			if(isset($getData['keyword'])){ AddTag("music", $SearchTerm); }

		}else{
			
		}

		## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED
		if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" ){
		$ExtraString .="";
		}else{
		$ExtraString .=" AND files.approved='yes' ";
		}

		if($showMy){
		
			$ExtraString .=  " AND ( files.uid = '".$_SESSION['uid']."' )";
		
		}

		## build extra strings
		$stoplimit=SEARCH_PAGE_ROWS;

		if(!isset($This_Page)){$This_Page=1; }
		$startlimit = $stoplimit*($This_Page-1);
		if($startlimit <0) $startlimit =0;


		// WORK OUT PAGE TOTAL FOR PAGE NUMBERS
		$QueryTotal ="SELECT DISTINCT count(files.aid) AS total FROM files WHERE files.type = 'music' ".$ExtraString ;
		$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
		$totalResults = $DB->Row($QueryTotal);

		// SEE IF I HAVE A DEFAULT MUSIC FILE;
		$myde = $DB->Row("SELECT description FROM files WHERE files.type = 'music' AND files.aid =0 AND uid='".$_SESSION['uid']."' LIMIT 1");
 
    $result = $DB->Query("SELECT files.default, files.approved, files.adult_content, files.approved AS ThisApproved, files.id, members.username, files.uid, files.aid, files.title, files.description, files.bigimage 
	FROM members
	INNER JOIN files ON ( files.uid = members.id AND files.type = 'music' AND files.aid !=0 )	".$ExtraString." 
	ORDER BY files.id DESC LIMIT ".$startlimit.",".$stoplimit);

    while( $Data = $DB->NextRow($result) )
    {						

			// RETURN DATA ARRAY
			$DataArray[$Counter]['id'] 				= $Data['id'];
			$DataArray[$Counter]['aid'] 			= $Data['aid'];
			$DataArray[$Counter]['title'] 			= $Data['title'];
			$DataArray[$Counter]['comment']			= eMeetingOutput($Data['description']);
			$DataArray[$Counter]['ThisApproved'] 	= $Data['ThisApproved'];
			$DataArray[$Counter]['adult'] 			= $Data['adult_content'];
			$DataArray[$Counter]['default'] 		= $Data['default'];
			if($Data['default'] ==0 && $Data['bigimage'] == $myde['description']){
			$DataArray[$Counter]['default'] =1;
			}

			$DataArray[$Counter]['username'] 		= $Data['username'];
			$DataArray[$Counter]['bigimage'] 		= $Data['bigimage'];
			$DataArray[$Counter]['uid'] 			= $Data['uid'];
			$DataArray[$Counter]['TotalResults'] 	= $totalResults['total']; 			// TOTAL SEARCH RESULTS COUNTER	
		
			if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['user_link'] 		=	$Data['username'];
			}else{
					$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pId=".$Data['uid'];
			}	

			$Counter++;		
	}
	
	return $DataArray;
}
?>