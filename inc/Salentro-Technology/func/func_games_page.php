<?php

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function GamesList($pageGET, $getData, $This_Page ){

	global $DB;
	
	$Counter =1;
	$DataArray = array(); $MODdata['page'] ='games'; $MODdata['type'] ='system';
	$ExtraString=" WHERE game_games.id !=0 ";

	if(isset($pageGET['keyword']) || isset($getData['keyword']) ){

			$SearchTerm    = (isset($pageGET['keyword']))		?	strip_tags($pageGET['keyword'])		:$getData['keyword'];
			$ExtraString .=  " AND ( game_games.game LIKE '%".$SearchTerm."%' OR game_games.about LIKE '%".$SearchTerm."%' )";
			
	}

	if(!isset($pageGET['sort'])){ $pageGET['sort']=4; }
	// BUILDING SORT STRING
	switch(trim($pageGET['sort'])){
			
			case "1": {
				$OrderByThis = "game_games.id DESC";
			}break;
			
			case "2": {	
				$OrderByThis = "game_games.times_played  DESC";			
			}break;

			case "3": {	
				$OrderByThis = "game_games.Champion_score DESC";
			}break;
			
			default: { $OrderByThis = "RAND()"; }
	}


		// build extra strings
		if(isset($pageGET['Extra']['view']) && $pageGET['Extra']['view'] != "" ){ // CHANGE LAYOUT VIEW
			
			$DisplayType	=	$pageGET['Extra']['view'];
			if($DisplayType ==2){
				$stoplimit=6;
			}else{
				$stoplimit=SEARCH_PAGE_ROWS;
			}
				
		}else{
			$stoplimit=SEARCH_PAGE_ROWS;
		}

		if(!isset($This_Page)){$This_Page=1; }
		$startlimit = $stoplimit*($This_Page-1);
		if($startlimit <0) $startlimit =0;
	

	$QueryTotal ="SELECT count(id) AS total FROM game_games $ExtraString";

	$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
	$totalResults = $DB->Row($QueryTotal);

	$result = $DB->query("SELECT * FROM game_games $ExtraString ORDER BY ".$OrderByThis." LIMIT ".$startlimit.",".$stoplimit);

	while( $Data = $DB->NextRow($result) ){
	
		$DataArray[$Counter]['game'] 			= $Data['game'];
		$DataArray[$Counter]['gameid'] 			= $Data['gameid'];
		$DataArray[$Counter]['id'] 				= $Data['id'];
		$DataArray[$Counter]['image'] 			= DB_DOMAIN."inc/exe/Games/pics/".$Data['gameid'].".gif";
		$DataArray[$Counter]['about'] 			= substr($Data['about'],0,100)."...";
		$DataArray[$Counter]['Champion_name'] 	= $Data['Champion_name'];
		$DataArray[$Counter]['Champion_score'] 	= $Data['Champion_score'];
		$DataArray[$Counter]['times_played'] 	= $Data['times_played'];
		$DataArray[$Counter]['last_played'] 	= $Data['last_played'];
		$DataArray[$Counter]['TotalResults'] 	= $totalResults['total']; 			// TOTAL SEARCH RESULTS COUNTER	

		# make link
		$MODdata['sub'] ='play';
		$MODdata['id1'] = $Data['gameid'];
		$MODdata['name'] = $Data['game'];
		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);


		if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['user_link'] 		=	$Data['Champion_name'];
		}else{
					$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pUsername=".$Data['Champion_name'];
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
		
	return $DataArray;
}

function PlayGame($id){

	global $DB;
		
	$result = $DB->Row("SELECT * FROM game_games WHERE gameid='".$id."' ORDER by id DESC");

				if(D_MOD_WRITE ==1){
							$result['user_link'] 		=	$result['Champion_name'];
				}else{
							$result['user_link'] 		=	"index.php?dll=profile&pUsername=".$result['Champion_name'];
				}
	
	// UPDATE TIMES PLAYED
	$DB->Row("UPDATE game_games SET times_played=times_played+1 WHERE gameid='".$id."'");

	return $result;
}

function LeaderBoard(){

	global $DB;

	$Counter =1;
	$DataArray = array();
		
	$result = $DB->query("SELECT Champion_name,gameid,id,game,Champion_score,times_played,about FROM game_games WHERE Champion_name !='' AND Champion_score !='' ORDER by id DESC");

	while( $Data = $DB->NextRow($result) ){
	
			$DataArray[$Counter]['game'] 			= $Data['game'];
			$DataArray[$Counter]['gameid'] 		= $Data['gameid'];
			$DataArray[$Counter]['id'] 			= $Data['id'];
			$DataArray[$Counter]['icon'] 			= "inc/exe/Games/pics/".$Data['gameid'].".gif";
			$DataArray[$Counter]['about'] 			= substr($Data['about'],0,20)."...";
			$DataArray[$Counter]['Champion_name'] 	= $Data['Champion_name'];
			$DataArray[$Counter]['Champion_score'] = $Data['Champion_score'];

				if(D_MOD_WRITE ==1){
							$DataArray[$Counter]['user_link'] 		=	$Data['Champion_name'];
				}else{
							$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pUsername=".$Data['Champion_name'];
				}
			// FIND SECOND AND THIRD
			$NNN =1;
			$result1 = $DB->query("SELECT username, thescore FROM game_scores  
			WHERE gamename ='".$Data['gameid']."' AND username !='".$Data['Champion_name']."' GROUP BY username ORDER by thescore DESC LIMIT 2");
			while( $Data1 = $DB->NextRow($result1) ){
			
				$DataArray[$Counter]['Champion_name'.$NNN] 	= $Data1['username'];
				$DataArray[$Counter]['Champion_score'.$NNN] 	= $Data1['thescore'];

				$NNN++;
			}

			$Counter++;
			
	}

	return $DataArray;
}

?>