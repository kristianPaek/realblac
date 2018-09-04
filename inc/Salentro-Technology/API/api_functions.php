<?php

function GetFriendCounter($id=0,$eid=0){

	global $DB;

	## define variables
	$CheckData = array(); $Counter=1;  $i=1;

	if($id ==0){

		$SQL = "select row_num from 
			(
				SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( ( members.id = members_network.to_uid AND members_network.uid='".$_SESSION['uid']."' )  OR  ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' ) )  AND members.active='active' AND members.visible = 'yes' AND members_network.type= ( '2' ) )
		 
				union ALL	
	
				SELECT DISTINCT count(members.id) AS row_num FROM members_network,members  WHERE ( ( ( members.id = members_network.to_uid AND members_network.uid='".$_SESSION['uid']."' )   )  AND members.active='active' AND members.visible = 'yes' AND members_network.type= ( '1' ) )
		 
				union ALL	
	
				SELECT DISTINCT count(members.id) AS row_num FROM members_network,members  WHERE ( ( ( members.id = members_network.to_uid AND members_network.uid='".$_SESSION['uid']."' )  OR  ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' ) )  AND members.active='active' AND members.visible = 'yes' AND members_network.type= ( '3' ) )
	

		 
				union ALL	
	
				SELECT DISTINCT count(members.id) AS row_num FROM members_network,members  WHERE ( ( ( members.id = members_network.to_uid AND members_network.uid='".$_SESSION['uid']."' )  OR  ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' ) )  AND members.active='active' AND members.visible = 'yes' AND members_network.type= ( '5' ) )

	
			) as derived_table";
		 
		$CheckThis = $DB->Query($SQL);
	 
		## loop data from query
		while( $DataArray = $DB->NextRow($CheckThis) ){
	
			$CheckData[$Counter]['total'] = number_format($DataArray['row_num']); 
			$Counter++;
		}	
	 
	
		while($i < 5){
	
			if(!isset($CheckData[$i]['total'])){ $CheckData[$i]['total'] =0; }
		 
			$i++;
	
		}

	}else{ // count single row only

	if(is_numeric($eid) && $eid !=0){
		$CheckID=$eid;
		$data = $DB->Row("SELECT DISTINCT count(members.id) AS total FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$CheckID."' )   AND members.active='active'  AND members_network.type= ( '8' ) )");

	}else{

		$CheckID=$_SESSION['uid'];
		$data = $DB->Row("SELECT DISTINCT count(members.id) AS total FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.uid='".$CheckID."' )   AND members.active='active'  AND members_network.type= ( '8' ) )");

	}

 
	return $data['total'];
		
	}
	return $CheckData;

}

	function DisplayMyFriendsList($id, $limit=10, $type=2){
	
		global $DB;
		
		$Counter =1; $DataArray = array();
	
		## INFORM ALL MY FRIENDS OF THE NEW EVENT
		$result = $DB->Query("SELECT album.cat, members.username, members.id, files.uid, files.bigimage, files.type, files.approved, files.aid, files.adult_content
		FROM members_network 
		LEFT JOIN members ON ( members.id = members_network.to_uid AND members.active='active' )
		LEFT JOIN files ON ( files.uid = members.id AND files.default=1 AND files.approved='yes')	
		LEFT JOIN album ON ( album.aid = files.aid) 
		WHERE (members_network.uid='".$id."' OR  members_network.to_uid='".$id."') AND members_network.type='".$type."' GROUP BY members.id LIMIT ".$limit);

		while( $Data = $DB->NextRow($result) ){ if( ($id != $Data['id']) && $Data['id'] !="" ){
		
				$DataArray[$Counter]['username'] 	= $Data['username'];
				$DataArray[$Counter]['uid'] 		= $Data['id'];

				if($Data['cat'] == "private" && $_SESSION['uid'] != $Data['id'])
				{
					$DataArray[$Counter]['image'] = "inc/tb.php?src=".DEFAULT_IMAGE."&x=96&y=96&x=48&y=48";	
				}
				else 
				{
					$DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"medium");	
				}

 
				# make link				
				if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['link'] 	= DB_DOMAIN.$Data['username'];
				}else{
					$DataArray[$Counter]['link'] 	=	DB_DOMAIN."index.php?dll=profile&pId=".$Data['id'];
				}	

				$Counter++;
				
		} }
	
		return $DataArray;
	
	}
	 /**
	 * Info: eMeeting display latest members
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */

	function DisplayRecentSignups($Limit=10,$uid=""){
	
		global $DB;
	
		$Counter =1; $DataArray = array(); $MODdata['page'] ='profile';  $MODdata['type'] ='system';
			
		$result = $DB->query("SELECT members.username, members.created, members.id AS memberID, members_data.age, members_data.gender, members_data.country, 
		files.bigimage, files.type, files.approved, files.aid, files.adult_content
		FROM members
		INNER JOIN members_data ON ( members_data.uid = members.id)
		LEFT JOIN files ON ( files.uid = members.id AND files.default=1 AND files.approved='yes' AND files.type ='photo')	
		WHERE members.active='active'
		AND members.visible = 'yes' AND activate_code='OK'
		ORDER by created DESC LIMIT ".$Limit);
	
		while( $Data = $DB->NextRow($result) ){
		
				$DataArray[$Counter]['username'] 	= $Data['username'];
				$DataArray[$Counter]['uid'] 		= $Data['memberID'];
				$DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"medium");
				$DataArray[$Counter]['gender'] 		= $Data['gender'];
				$DataArray[$Counter]['country'] 	= MakeCountry($Data['country']);
	 			$DataArray[$Counter]['created'] 	= $Data['created'];
				$DataArray[$Counter]['age'] 		= MakeAge($Data['age']);
 
				# make link				
				if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['link'] 	= DB_DOMAIN.$Data['username'];
				}else{
					$DataArray[$Counter]['link'] 	=	"index.php?dll=profile&pId=".$Data['memberID'];
				}	

				$Counter++;
				
		}
	
		return $DataArray;
	}
	/**
	* Info: Funcion used to get a list of member quizzes
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
	function DisplayMemberQuizzes($id){
	
		global $DB;
		
		$Counter=1;
		$DataArray = array();
		$result = $DB->Query("SELECT id,  title, description, date , hits, icon FROM `quiz` WHERE uid= ( '".$id."' ) ORDER BY date DESC");
		
		while( $album = $DB->NextRow($result) )
		{
	
			$DataArray[$Counter]['id'] 			= $album['id'];
			$DataArray[$Counter]['title'] 		= eMeetingOutput($album['title']);
			$DataArray[$Counter]['date'] 		= dates_interconv($album['date']);
			$DataArray[$Counter]['description'] = eMeetingOutput($album['description']);
			$DataArray[$Counter]['hits'] 		= $album['hits'];
			$DataArray[$Counter]['icon'] 		= $album['icon'];
			if($DataArray[$Counter]['icon'] =="quiz_1"){ $DataArray[$Counter]['icon']=1; } 

			$Counter++;
		}
		return $DataArray;
	}

	/*
	* Select all wink meesages to show in dropdown
	*/
	function showAllWinkMessages(){
		global $DB;
		$DataArray = array();
		$result = $DB->Query("SELECT winkmessageid, winkmessage FROM `winkmessages` WHERE wm_status= 0");
		$Counter=1;
		while( $wm = $DB->NextRow($result) )
		{
			$DataArray[$Counter]['id'] 			= $wm['winkmessageid'];
			$DataArray[$Counter]['title'] 		= eMeetingOutput($wm['winkmessage']);
			$Counter++;
		}
		return $DataArray;
	}









	/**
	* Info: Funcion used to get the admin message from the database
	* 		
	* @version  9.0
	* @created  Fri Oct 17 2008
	*/
	function DisplayAdminMsg(){
	
		global $DB;
	
		$result = $DB->Row("SELECT * FROM members_admin_message  WHERE id=1");
		$result['content'] = str_replace("<html><head></head><body>","",$result['content']);
		$result['content'] = str_replace("</body></html>","",$result['content']);
		$result['title'] = str_replace("<html><head></head><body>","",$result['title']);
		$result['title'] = str_replace("</body></html>","",$result['title']);

		return $result;
	}
	/**
	* Info: Funcion used to the numbers of members who created within a time period
	* 		
	* @version  9.0
	* @created  Fri Oct 17 2008
	* @param:  MemberCounter(0, 7) - joined within 7 days
	*/
	function MemberCounter($days_from="0", $days_to=""){

		global $DB;

		// created within the last
		$SQL = "SELECT count(id) AS total FROM members WHERE  TO_DAYS( NOW(  'y-m-d h:i:s'  )  )  - TO_DAYS( created )  > ".$days_from;
		
		if($days_to !=""){
			$SQL .=" AND TO_DAYS( NOW(  'y-m-d h:i:s'  )  )  - TO_DAYS( created )  < ".$days_to;
		}
		
		$ff = $DB->Row($SQL);
		
		return $ff['total'];
	
	}

	/**
	* Info: Funcion used to get match results for the member
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
	function MatchResults($limit=12,$mobile){
			
			global $DB; $DataArray=array();

			## define variables			
			$RunExtra=""; $SearchData = array(); $Counter=1;	
			$MData = $DB->Row("SELECT match_array FROM members_privacy WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");	
			$get_myarray = unserialize($MData['match_array']);
			
			if($get_myarray !="" && is_array($get_myarray)){									
				
				foreach($get_myarray as $Match){
					
						if(strlen($Match['value']) > 0 && $Match['value'] !='0'){
								
								// BUILD AGE STRING
								if($Match['name']=="country"){
 
								$RunExtra .= "  AND ( ".$Match['name']." = '".$Match['value']."' OR ".$Match['name']." = '".MakeCountry($Match['value'])."' ) ";

								}elseif($Match['name']=="age"){
									$ageSlipt = explode("-",$Match['value']);			
									if($ageSlipt[0] !=0 || $ageSlipt[1] !=0){			
										$RunExtra .= " AND members_data.age BETWEEN '".GetAgeYear(trim($ageSlipt[1]))."-00-00' AND '".GetAgeYear(trim($ageSlipt[0]))."-".date("m")."-".date("d")."' ";
									}
								}else{
									$RunExtra .= "  AND ".$Match['name']." = '".$Match['value']."' ";
								}
						}
				}
			}
			else {
				Return '';
			}
			

			## ADD EXTRA SEARCH FOR CLEVER IP
			$ExtraString="";

			if(D_GENDERMATCHING ==1 && isset($_SESSION['genderid']) && $_SESSION['genderid'] !=0){ $ExtraString = " AND members_data.gender != ".$_SESSION['genderid']." "; }else { $ExtraString=""; }
 
			## END CLEVER STRING

			$SQL = "SELECT members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.country, members_data.headline, members_data.location
			FROM members
			INNER JOIN members_data ON ( members.id = members_data.uid ) 
			LEFT JOIN files ON ( files.uid = members_data.uid AND files.default LIKE '%1%' ) 
			LEFT JOIN members_online ON ( members_online.logid = members_data.uid )
			WHERE members.id = members_data.uid
			AND members.visible = 'yes' $ExtraString 
			AND members.active ='active' 
			$RunExtra
			GROUP BY members.id ORDER BY members.lastlogin LIMIT $limit";
			//die($SQL);
		$result = $DB->Query($SQL);
		while( $Data = $DB->NextRow($result) )
		{

			if ($mobile == 'yes') {
				$DataArray[$Counter]['link'] 	=	"mobile.php?dll=mobileprofile&pId=".$Data['id'];
				}else{
					$DataArray[$Counter]['link'] 	=	"index.php?dll=profile&pId=".$Data['id'];
				}		
				$DataArray[$Counter]['id'] 			= 	$Data['id'];
				$DataArray[$Counter]['uid'] 		= 	$Data['id'];	
				$DataArray[$Counter]['username'] 	= 	$Data['username'];				
				$DataArray[$Counter]['age'] 		= 	MakeAge($Data['age']);
				$DataArray[$Counter]['gender'] 		= 	MakeGender($Data['gender']);
				$DataArray[$Counter]['headline'] 	= 	eMeetingOutput($Data['headline']);				
				$DataArray[$Counter]['status'] 		= 	eMeetingOutput($Data['msgStatus']);
				$DataArray[$Counter]['country'] 	= 	MakeCountry($Data['country']);
				$DataArray[$Counter]['image'] 		= 	ReturnDeImage($Data,"medium");
				if($DataArray['headline'] =='0'){ $DataArray['headline']=""; }

				// CHOOSE VALUES FOR THE MENU BAR
				$DataArray[$Counter]['description'] = $DataArray[$Counter]['country'];
 				$DataArray[$Counter]['title'] 		= 	$Data['username'];

				$DataArray[$Counter]['location'] 	= 	$Data['location'];


$getline = $DB->Row("Select fvCaption from field_list_value f, members_data d where  d.em_85820081128  = f.fvid and f.fvFid = 54 and uid = ( '".$Data['id']."' ) ");


$DataArray[$Counter]['mystate'] = $getline['fvCaption'];



			$Counter++;
		}
		return $DataArray;		
			
	}

	/**
	* Info: Funcion used to get the number of matches for the user
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/

	function MatchCount(){
			
			global $DB;
			
			$RunExtra="";
			$MData = $DB->Row("SELECT match_array FROM members_privacy WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");	
			$get_myarray = unserialize($MData['match_array']);		
			
			if($get_myarray !="" && is_array($get_myarray)){
			
					foreach($get_myarray as $Match){
						
						if($Match['value'] != "" && $Match['value'] != 0){

							if($Match['name']=="country"){
 
							$RunExtra .= "  AND ( ".$Match['name']." = '".$Match['value']."' OR ".$Match['name']." = '".MakeCountry($Match['value'])."' ) ";

							}elseif($Match['name'] =="age"){ 

							$ageSlipt = explode("-",$Match['value']);							
							$RunExtra .= " AND members_data.age BETWEEN '".GetAgeYear(trim($ageSlipt[1]))."-00-00' AND '".GetAgeYear(trim($ageSlipt[0]))."-".date("m")."-".date("d")."' ";
							
							}else{

							$RunExtra .= "  AND ".$Match['name']." = '".$Match['value']."' ";

							}
	
						}
					}

if(D_GENDERMATCHING ==1 && isset($_SESSION['genderid']) && $_SESSION['genderid'] !=0){ $GenderExtra = " AND members_data.gender != ".$_SESSION['genderid']." "; }else { $GenderExtra=""; }


				$QueryTotal = "SELECT count(members.id) AS total FROM members, members_data WHERE members.id = members_data.uid AND members.active ='active' AND members.visible = 'yes' $RunExtra $GenderExtra ";
		
				$totalResults = $DB->Row($QueryTotal);
			
				return $totalResults['total'];
			}else{
				return 0;
			}		
			
	}


	/**
	* Info: Funcion used to get XX number of match results for a member
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/

	function MyMatchResults($id, $limit=10){
			
			global $DB;
			 
			$RunExtra=""; $DataArray = array(); $Counter=1;


$getgender = $DB->Row("Select gender from members_data where uid = ( '".$id."' ) ");
$genderid = $getgender['gender'];

if(D_GENDERMATCHING ==1  && $genderid !=0){
  $RunExtra .= " AND members_data.gender != ".$genderid." "; 
}

			$MData = $DB->Row("SELECT match_array FROM members_privacy WHERE uid= ( '".$id."' ) LIMIT 1");	
			$get_myarray = unserialize($MData['match_array']);		
			

			if($get_myarray !="" && is_array($get_myarray)){
			
					foreach($get_myarray as $Match){
						
						if($Match['value'] != "" && $Match['value'] != 0){

							if($Match['name']=="country"){
 
							$RunExtra .= "  AND ( ".$Match['name']." = '".$Match['value']."' OR ".$Match['name']." = '".MakeCountry($Match['value'])."' ) ";

							}elseif($Match['name'] =="age"){ 
								$ageSlipt = explode("-",$Match['value']);			
								if($ageSlipt[0] !=0 || $ageSlipt[1] !=0){			
								$RunExtra .= " AND members_data.age BETWEEN '".GetAgeYear(trim($ageSlipt[1]))."-00-00' AND '".GetAgeYear(trim($ageSlipt[0]))."-".date("m")."-".date("d")."' ";
								}


							}else{

							$RunExtra .= "  AND ".$Match['name']." = '".$Match['value']."' ";

							}
	
						}
					}

				 
			}


		// GET TOP TOP

			$SQL = "SELECT members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.location, members_data.country, members_data.headline, members_data.description
			FROM  members 
			INNER JOIN members_data ON ( members.id = members_data.uid )
			INNER JOIN files ON ( files.uid = members_data.uid AND files.type='photo' )		
			WHERE members.id !=0 ".$RunExtra."
			GROUP BY members.id ORDER BY files.featured,RAND() LIMIT ".$limit;

 
			$result = $DB->Query($SQL);
			while( $Data = $DB->NextRow($result) )
			{

				if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['link'] 	= DB_DOMAIN.$Data['username'];
				}else{
					$DataArray[$Counter]['link'] 	=	DB_DOMAIN."index.php?dll=profile&pId=".$Data['id'];
				}		
				$DataArray[$Counter]['id'] 			= 	$Data['id'];
				$DataArray[$Counter]['uid'] 		= 	$Data['id'];	
				$DataArray[$Counter]['username'] 	= 	$Data['username'];				
				$DataArray[$Counter]['age'] 		= 	MakeAge($Data['age']);
				$DataArray[$Counter]['gender'] 		= 	MakeGender($Data['gender']);
				$DataArray[$Counter]['description'] 	= 	substr(eMeetingOutput(strip_tags($Data['description'])),0,120);	


				$DataArray[$Counter]['headline'] 	= 	eMeetingOutput($Data['headline']);				
				$DataArray[$Counter]['status'] 		= 	eMeetingOutput($Data['msgStatus']);
				$DataArray[$Counter]['location'] 		= 	eMeetingOutput($Data['location']);
				$DataArray[$Counter]['country'] 	= 	MakeCountry($Data['country']);
				$DataArray[$Counter]['image'] 		= 	ReturnDeImage($Data,"medium");
				if($DataArray['headline'] =='0'){ $DataArray['headline']=""; }

				// CHOOSE VALUES FOR THE MENU BAR
				//$DataArray[$Counter]['description'] = $DataArray[$Counter]['country'];
 				$DataArray[$Counter]['title'] 		= 	$Data['username'];

				$Counter++;
	
			}

		return $DataArray;
			
	}
	/**
	* Info: Funcion used to display articles
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
	/*
		PARAMERTS: 
		1: width of display box
		2: page
		3: sub page
		4: user created id
		5: item id
		6: extra id 1
		7: extra id 2
	*/
	function DisplayWebsiteComments($page, $sub, $width, $id, $id2, $id3, $id4, $follow=false,$showamount=20){
 
	$ReturnData =""; $Counter =1; $DataArray = array(); $Extra="";

	global $DB;	

	if(!$follow){

		## format for second id such as album id and file id
		//if($id2 !=0){
			$Extra .=" AND ex1_id ='".eMeetingInput($id2)."' ";
		//}
		if($id3 !=0 && $id3 !=""){
			$Extra .=" AND ex2_id ='".eMeetingInput($id3)."' ";
		}
		if($id4 !=0 && $id4 !=""){
			$Extra .=" AND ex3_id ='".eMeetingInput($id4)."' ";
		}


		$SQL = "SELECT comments.ex1_id, comments.ex2_id, comments.ex3_id, comments.id AS CID, comments.from_uid, files.bigimage, files.type, files.approved,files.aid, files.adult_content, members.username, members.id, comments.comments, comments.date, comments.time   FROM 
		members 
		INNER JOIN comments ON ( members.id = comments.from_uid AND comments.approved='yes')
		LEFT JOIN files ON ( files.uid = comments.from_uid AND files.default LIKE '%1%' )
		WHERE page='".eMeetingInput($page)."' AND sub='".eMeetingInput($sub)."' $Extra
		GROUP BY comments.id ORDER BY comments.id DESC LIMIT ".$showamount;

	}else{
// FOLLOW MEMBER UPDATES

		$SQL = "SELECT comments.ex1_id, comments.ex2_id, comments.ex3_id, comments.id AS CID, comments.from_uid, files.bigimage, files.type, files.approved,files.aid, files.adult_content, members.username, members.id, comments.comments, comments.date, comments.time   FROM 
		members 
		INNER JOIN members_network ON ( ( members.id = members_network.to_uid AND members_network.uid='".$id."' )  OR  ( members.id = members_network.to_uid AND members_network.to_uid='".$id."' ) AND members_network.type= ( '8' ) )
		INNER JOIN comments ON ( ( members.id = comments.from_uid ) OR ( members.id = comments.to_uid )  AND comments.approved='yes' )
		LEFT JOIN files ON ( files.uid = comments.from_uid AND files.default LIKE '%1%' )
		WHERE comments.page='follow'  
		GROUP BY comments.id ORDER BY comments.id DESC LIMIT ".$showamount;

 	}
 
//print $SQL;
 
		$result = $DB->query($SQL);
		while( $Data = $DB->NextRow($result) ){

			$DataArray[$Counter]['date'] 		= dates_interconv($Data['date']);
			$DataArray[$Counter]['comments'] 	= eMeetingOutput($Data['comments']); // 
			$DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"small");
			$DataArray[$Counter]['time'] 		= $Data['time'];
			$DataArray[$Counter]['username'] 	= $Data['username'];
			$DataArray[$Counter]['uid'] 		= $Data['from_uid'];
			$DataArray[$Counter]['id'] 			= $Data['CID'];

			$DataArray[$Counter]['ex1_id'] 			= $Data['ex1_id'];
			$DataArray[$Counter]['ex2_id'] 			= $Data['ex2_id'];
			$DataArray[$Counter]['ex3_id'] 			= $Data['ex3_id'];

			if(D_MOD_WRITE ==1){
				$DataArray[$Counter]['link'] 		=	$Data['username'];
			}else{
				$DataArray[$Counter]['link'] 		=	"index.php?dll=profile&pId=".$Data['id'];
			}	

			$Counter++;
		}

		return $DataArray;
	
	} 

	/**
	* Info: Funcion used to get the top 10 articles
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/

	function DisplayTop10Articles($limit=10){
	
		global $DB;
		
		$Counter =1;	$DataArray = array(); $MODdata['page'] ='articles';  $MODdata['type'] ='system';
		
		$result = $DB->query("SELECT articles.*, articles_cat.id AS cat_link_id, articles.id AS artid FROM articles, articles_cat WHERE articles.cat_id = articles_cat.id ORDER BY articles.id DESC LIMIT ".$limit);
		while( $Data = $DB->NextRow($result) ){
		
				$DataArray[$Counter]['date'] 		= $Data['date'];
				$DataArray[$Counter]['title'] 		= $Data['title'];
				if($limit ==1){
				$DataArray[$Counter]['content'] 	= nl2br(eMeetingOutput($Data['short']));
				}else{
				$DataArray[$Counter]['content'] 	= eMeetingOutput($Data['content']);
				}
				
				$DataArray[$Counter]['views'] 		= number_format($Data['views']);
				$DataArray[$Counter]['short'] 		= $Data['short'];
				$DataArray[$Counter]['cat'] 		= $Data['name'];
				if($Data['link'] ==""){

					# make link
					$MODdata['sub'] ='view';
					$MODdata['id1'] = $Data['artid'];

					$Data['title'] = str_replace("?","",$Data['title']);
					$Data['title'] = str_replace(":","",$Data['title']);
					$Data['title'] = str_replace("'","",$Data['title']);
					$MODdata['name'] = $Data['title'];
					$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);

					$DataArray[$Counter]['dontshow'] = true;
				}else{
					$DataArray[$Counter]['link'] = $Data['link'];
					$DataArray[$Counter]['dontshow'] = false;
				}

				# make cat link
				$MODdata1['page'] ='articles';  
				$MODdata1['type'] ='system';
				$MODdata1['id2'] = $Data['cat_link_id'];
				$MODdata1['name'] = $Data['name'];					 
				$DataArray[$Counter]['cat_link'] = MakeLinkMOD($MODdata1);
				$Counter++;
				
		}
			
		return $DataArray;
	}

	/**
	* Info: Funcion used to get a list of recent photos
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/

		function DisplayRecentPhotos($id, $limit=4){
	
		global $DB;
				
		$Counter =1;
		$DataArray = array(); 
		$CheckData = array();
		$MODdata['page'] ='profile'; 
		$MODdata['type'] ='system';  
		$extra="";

		if(!is_numeric($id)){  return ""; }

		## adult images
		if($_SESSION['pack_adult'] !="yes" ){

			$extra = "AND files.adult_content ='no'";
			 
		}
			
		$result = $DB->Query("SELECT files.id, files.adult_content, files.bigimage, files.type,	files.title, files.description, files.uid, files.approved, album.uid, album.aid, album.comment , album.filecount, album.cat, album.allow_a, album.allow_f, album.allow_h, album.allow_n 
		FROM album 
		INNER JOIN files ON ( files.aid = album.aid )
		WHERE album.aid = files.aid AND files.approved='yes' AND files.uid= ( '".$id."' ) AND files.type='photo' AND password='' ".$extra." 
		ORDER BY files.id DESC, album.cat DESC LIMIT ".$limit);

		while( $Data = $DB->NextRow($result) )
		{			

				$viewable = false;

				//do not show if image is located in private album and viewer is not owner
				if($Data['cat'] == "public" )
				{
					$viewable = true;
				}				
				
				elseif( ($Data['cat'] == "private") && ($Data['allow_f'] =="y" || $Data['allow_h'] =="y") && ( $Data['password']=="" ) )
				{
		
					// CHECK FRIENDS AND HOTLIST
					$SQL = "select row_num from 
						(
							SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$Data['uid']."' )  AND members_network.type= ( '2' ) )	 
							union ALL			
							SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$Data['uid']."' )  AND members_network.type= ( '1' ) )
						) as derived_table";	
		 
					$CheckThis = $DB->Query($SQL);
					## loop data from query
					$FriendsCounter = 1;
					while( $FriendsDataArray = $DB->NextRow($CheckThis) ){
				
						$CheckData[$FriendsCounter]['total'] = number_format($FriendsDataArray['row_num']); 
						$FriendsCounter++;
					}						
		
					if( $CheckData[1]['total'] > 0 || $CheckData[2]['total'] > 0 )
					{
						$viewable = true;
					}					
		
				}


				if($viewable)
				{
					// RETURN DATA ARRAY
					$DataArray[$Counter]['image'] 			= ReturnDeImage($Data,"medium");
					$DataArray[$Counter]['bigimage'] 		= $Data['bigimage'];
					$DataArray[$Counter]['title'] 			= eMeetingOutput($Data['title']);
					$DataArray[$Counter]['description'] 	= eMeetingOutput($Data['description']);
					$DataArray[$Counter]['aid'] 			= $Data['aid'];
					$DataArray[$Counter]['id'] 				= $Data['id'];
	
					# make link
					$MODdata['sub'] ='viewfile';
					$MODdata['id1'] = $id;
					$MODdata['id2'] = $Data['aid'];
					$MODdata['id3'] = $Data['id'];
					$MODdata['name'] = $DataArray[$Counter]['title'];
					$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);

					$Counter++;	
				}
		}				
		return $DataArray;
		
	}

	 /**
	 * Info: eMeeting display recent members
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */


	function DisplayFeaturedMembers($limit=5, $type=1){
	
		global $DB;
	
		## define variables
		$Counter=1;	$DataArray = array();	$i=1;

			## ADD EXTRA SEARCH FOR CLEVER IP
			$ExtraString="";
			//if(isset($_SESSION['clever_ip_country']) && $_SESSION['clever_ip_country'] !=""){
				//$ExtraString =" AND members_data.location LIKE '%".$_SESSION['clever_ip_country']."%'";
			//}
			## END CLEVER STRING
			if(D_GENDERMATCHING ==1 && isset($_SESSION['genderid']) && $_SESSION['genderid'] !=0){ $GenderExtra = " AND members_data.gender != ".$_SESSION['genderid']." "; }else { $GenderExtra=""; }

		if($type ==1){	

			// FEATURED MEMBERS
			$SQL = "SELECT album.cat, members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.country, members_data.headline, members_data.location
			FROM  members 
			INNER JOIN members_data ON ( members.id = members_data.uid  [extra] ".$GenderExtra.")
			LEFT JOIN files ON ( files.uid = members_data.uid AND files.default=1)		
			LEFT JOIN album ON ( album.aid = files.aid ) 
			WHERE members.id = files.uid AND files.type='photo' AND files.featured='yes' AND members.id !=0 AND members.visible = 'yes' AND members.active ='active' GROUP BY members.id ORDER BY files.featured,RAND() LIMIT $limit";

		}elseif($type ==2){

			// LATEST MEMBERS	
			$SQL = "SELECT album.cat, members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.country, members_data.headline, members_data.location
			FROM  members 
			INNER JOIN members_data ON ( members.id = members_data.uid  [extra] ".$GenderExtra.")
			LEFT JOIN files ON ( files.uid = members_data.uid AND files.default=1)			
			LEFT JOIN album ON ( album.aid = files.aid ) 
			WHERE members.id = files.uid AND files.type='photo' AND members.id !=0 AND members.visible = 'yes' AND members.active ='active' GROUP BY members.id  ORDER BY files.featured DESC LIMIT $limit";

		}elseif($type ==3){	

			// TOP RATED MEMBERS
			$SQL = "SELECT members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.country, members_data.headline, members_data.location
			FROM  members 
			INNER JOIN members_data ON ( members.id = members_data.uid  [extra] ".$GenderExtra.")
			INNER JOIN member_rating ON (members.id = member_rating.profile_id)
			LEFT JOIN files ON ( files.uid = members_data.uid AND members.id = files.uid AND files.type='photo' AND files.default=1)			
			WHERE members.id = files.uid AND members.id !=0 AND members.visible = 'yes' AND members.active ='active' GROUP BY members.id ORDER BY members.member_rating DESC, RAND() DESC LIMIT $limit";

		}elseif($type ==4){	

			// TOP HITS
			$SQL = "SELECT album.cat, members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.country, members_data.headline, members_data.location
			FROM  members 
			INNER JOIN members_data ON ( members.id = members_data.uid  [extra] ".$GenderExtra.")
			LEFT JOIN files ON ( files.uid = members_data.uid AND members.id = files.uid AND files.type='photo' AND files.default=1)		
			LEFT JOIN album ON ( album.aid = files.aid ) 
			WHERE members.id !=0 AND members.visible = 'yes' AND members.active ='active' GROUP BY members.id ORDER BY members.hits DESC LIMIT $limit";	
 
		}elseif($type ==5){	

			// FEATURED MEMBERS - Package is featured
			$SQL = "SELECT members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.country, members_data.headline, members_data.location
			FROM  members 
			INNER JOIN members_data ON ( members.id = members_data.uid  [extra] ".$GenderExtra.")
			INNER JOIN package ON ( members.packageid = package.pid )
			LEFT JOIN files ON ( files.uid = members_data.uid )		
			WHERE members.id = files.uid 
			AND files.type='photo'
			AND files.default = 1
			AND package.Featured = 'yes'
			AND members.id !=0 
			AND members.visible = 'yes'
			AND members.active ='active' 
			GROUP BY members.id 
			ORDER BY RAND() LIMIT $limit";


		}else{

			$SQL = "SELECT album.cat, members.msgStatus, members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content, members_data.gender, members_data.age, members_data.country, members_data.headline, members_data.location
			FROM  members 
			INNER JOIN members_data ON ( members.id = members_data.uid  [extra] ".$GenderExtra.")
			LEFT JOIN files ON ( files.uid = members_data.uid AND files.default=1)			
			LEFT JOIN album ON ( album.aid = files.aid ) 
			WHERE members.id = files.uid AND files.type='photo' AND members.id !=0 AND members.visible = 'yes' GROUP BY members.id ORDER BY files.featured DESC LIMIT $limit";
		}

 		$RUNSQL = str_replace("[extra]",$ExtraString, $SQL);

		$result = $DB->Query($RUNSQL);
		while( $Data = $DB->NextRow($result) )
		{	

				if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['link'] 		=	DB_DOMAIN.$Data['username'];
				}else{
					$DataArray[$Counter]['link'] 		=	"index.php?dll=profile&pId=".$Data['id'];
				}		
				$DataArray[$Counter]['id'] 			=   $Data['id'];
				$DataArray[$Counter]['uid'] 		= 	$Data['id'];	
				$DataArray[$Counter]['username'] 	= 	$Data['username'];
				$DataArray[$Counter]['age'] 		= 	MakeAge($Data['age']);

				$DataArray[$Counter]['gender'] 		= 	MakeGender($Data['gender']);				
				$DataArray[$Counter]['genderID'] 	= 	$Data['gender']; 
				$DataArray[$Counter]['headline'] 	= 	eMeetingOutput($Data['headline']); 
				$DataArray[$Counter]['status'] 		= 	eMeetingOutput($Data['msgStatus']);
				$DataArray[$Counter]['country'] 	= 	MakeCountry($Data['country']);
				$DataArray[$Counter]['location'] 	= 	$Data['location'];


$getline = $DB->Row("Select fvCaption from field_list_value f, members_data d where  d.em_85820081128  = f.fvid and f.fvFid = 54 and uid = ( '".$Data['id']."' ) ");


$DataArray[$Counter]['mystate'] = $getline['fvCaption'];


$getstat = $DB->Row("Select fvCaption from field_list_value f, members_data d where d.location = f.fvid and f.fvFid = 26 and uid = ( '".$Data['id']."' ) ");

$DataArray[$Counter]['location'] = $getstat['fvCaption'];

if ($getstat ==""){
   $DataArray[$Counter]['location'] = eMeetingOutput($Data['location']);
}


				if($Data['cat'] == "private")
				{
					$DataArray[$Counter]['image'] = "inc/tb.php?src=".DEFAULT_IMAGE."&x=96&y=96";
				}
				else
				{
					$DataArray[$Counter]['image'] 		= 	ReturnDeImage($Data,"medium");	
				}

				if($DataArray[$Counter]['headline'] =='0'){ $DataArray[$Counter]['headline']=""; }

				// hide age for couples
				if($Data['gender'] ==2710){ $DataArray[$Counter]['age']=""; }

				// CHOOSE VALUES FOR MENU BAR
				$DataArray[$Counter]['title'] 		= 	$Data['username'];
				//$DataArray[$Counter]['description'] = 	$DataArray[$Counter]['country'];
				//$DataArray[$Counter]['description'] = 	$DataArray[$Counter]['mystate'];
				$DataArray[$Counter]['description'] = 	$DataArray[$Counter]['location'];
				$DataArray[$Counter]['description'] .= 	" ";
				$DataArray[$Counter]['description'] .= 	$DataArray[$Counter]['mystate'];
				$Counter++;
		}
	
		// IF NO MATCHES ARE FOUND
		if($Counter==1){
				$ExtraString1="";

				$RUNSQL1 = str_replace("[extra]",$ExtraString1, $SQL);

				$result = $DB->Query($RUNSQL1);
				while( $Data = $DB->NextRow($result) )
				{	
						if(D_MOD_WRITE ==1){
							$DataArray[$Counter]['link'] 		=	DB_DOMAIN.$Data['username'];
						}else{
							$DataArray[$Counter]['link'] 		=	"index.php?dll=profile&pId=".$Data['id'];
						}		
						$DataArray[$Counter]['id'] 			=   $Data['id'];
						$DataArray[$Counter]['uid'] 		= 	$Data['id'];	
						$DataArray[$Counter]['username'] 	= 	$Data['username'];
						$DataArray[$Counter]['title'] 		= 	$Data['username'];
						$DataArray[$Counter]['age'] 		= 	MakeAge($Data['age']);
						$DataArray[$Counter]['gender'] 		= 	MakeGender($Data['gender']);
						$DataArray[$Counter]['headline'] 	= 	eMeetingOutput($Data['headline']);
						if($DataArray['headline'] =='0'){ $DataArray['headline']=""; }
						$DataArray[$Counter]['status'] 		= 	eMeetingOutput($Data['msgStatus']);
						$DataArray[$Counter]['country'] 	= 	MakeCountry($Data['country']);
						$DataArray[$Counter]['location'] 	= 	$Data['location'];
						$DataArray[$Counter]['image'] 		= 	ReturnDeImage($Data,"medium");
						$DataArray[$Counter]['description'] = 	$Data['location'];
						$DataArray[$Counter]['description'] .= 	$Data['mystate'];

$getline = $DB->Row("Select fvCaption from field_list_value f, members_data d where  d.em_85820081128  = f.fvid and f.fvFid = 54 and uid = ( '".$Data['id']."' ) ");


$DataArray[$Counter]['mystate'] = $getline['fvCaption'];


$getstat = $DB->Row("Select fvCaption from field_list_value f, members_data d where d.location = f.fvid and f.fvFid = 26 and uid = ( '".$Data['id']."' ) ");

$DataArray[$Counter]['location'] = $getstat['fvCaption'];

if ($getstat ==""){
   $DataArray[$Counter]['location'] = eMeetingOutput($Data['location']);
}

						$Counter++;
				}
		}
		## loop through and make default images not blank
		/*while($i != $limit+1){
					
					if(!isset($DataArray[$i]['bigimage'])){
						$DataArray[$i]['id'] 		= 	1;
						$DataArray[$i]['username']	=	"";
						$DataArray[$i]['image'] 	=  DEFAULT_IMAGE;
					}		
			$i++;
		}	*/
		return $DataArray;
	}

	 /**
	 * Info: eMeeting display recent albums
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */

	function DisplayRecentPhotoAlbums($Limit=10, $uid=""){
	
		global $DB;
		
		$Counter =1;
		$DataArray = array(); $MODdata['page'] ='profile'; $MODdata['type'] ='system';$Extra="";

		if($uid !="" && is_numeric($uid) ){ $Extra =" AND album.uid ='".$uid."' "; } 


	if(D_GENDERMATCHING ==1){ 
		$Extra .= "AND members_data.gender !=('".$_SESSION['genderid']."')";
	}


		$result = $DB->Query("SELECT album.cat, album.password, album.aid, album.uid, album.title, album.comment, album.filecount, allow_a, allow_f, allow_h FROM album, members_data  WHERE album.uid = members_data.uid AND album.filecount > 0 $Extra ORDER BY album.title ASC LIMIT ".$Limit);


		while( $Data = $DB->NextRow($result) )
		{						

				$result1 = $DB->Row("SELECT type, adult_content, approved, bigimage FROM files WHERE aid='".$Data['aid']."' AND type='photo' ".CanSeeAdult()." ORDER BY date DESC LIMIT 1");
	
				$DataArray[$Counter]['id'] 				= $Data['aid'];
				$DataArray[$Counter]['uid'] 			= $Data['uid'];
				$DataArray[$Counter]['title'] 			= eMeetingOutput($Data['title']);
				$DataArray[$Counter]['description']		= eMeetingOutput($Data['comment']);
				$DataArray[$Counter]['filecount'] 		= $Data['filecount'];
				$DataArray[$Counter]['adult'] 			= $Data['allow_a'];
				$DataArray[$Counter]['cat'] 			= $Data['cat'];


				if($Data['cat'] == "public" || ((isset($_SESSION['uid']) && $Data['uid']==$_SESSION['uid'])) )
				{
					$DataArray[$Counter]['image'] 			= ReturnDeImage($result1,"medium");
				}
				elseif($Data['password']!="")
				{
					$DataArray[$Counter]['image'] = "inc/tb.php?src=".DEFAULT_IMAGE."&x=96&y=96&x=48&y=48";
				}
				elseif( ($Data['allow_f'] =="y" || $Data['allow_h'] =="y") && ( $Data['password']=="" ))
				{

					//friends allowed, check if friend and if so, display thumbnail otherwise no
					// CHECK FRIENDS AND HOTLIST
					$SQL = "select row_num from 
						(
							SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$Data['uid']."' )  AND members_network.type= ( '2' ) )	 
							union ALL			
							SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$_SESSION['uid']."' AND members_network.uid='".$Data['uid']."' )  AND members_network.type= ( '1' ) )
						) as derived_table";					
						$CheckThis = $DB->Query($SQL);
							
					## loop data from query
					$FHCounter = 1;
					while( $FHDataArray = $DB->NextRow($CheckThis) ){
				
						$CheckData[$FHCounter]['total'] = number_format($FHDataArray['row_num']); 
						$FHCounter++;
					}
						
					if( $CheckData[1]['total'] > 0 || $CheckData[2]['total'] > 0 )
					{
						$DataArray[$Counter]['image'] 			= ReturnDeImage($result1,"medium");
					}					
					else
					{
						$DataArray[$Counter]['image'] = "inc/tb.php?src=".DEFAULT_IMAGE."&x=96&y=96&x=48&y=48";
					}
				}
				else
				{
					$DataArray[$Counter]['image'] 			= $DataArray[$Counter]['image'] = "inc/tb.php?src=".DEFAULT_IMAGE."&x=96&y=96&x=48&y=48";
				}


				if( ($Data['password'] != "")  ){

					$DataArray[$Counter]['link'] 			= 'javascript:void(0);" onClick="CheckAlbumPassword('.$Data['aid'].','.$Data['uid'].');';

				}else{

					# make link
					$MODdata['sub'] ='manage';
					$MODdata['id1'] = $Data['uid'];
					$MODdata['id2'] = $Data['aid'];
					$MODdata['name'] = $DataArray[$Counter]['title'];
					$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
				}
				
				$Counter++;		
		}
		
		return $DataArray;
	}

	 /**
	 * Info: eMeeting display recent blog views
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */

	function DisplayRecentBlogs($Limit=10,$uid=""){
	
		global $DB;
	
		if($uid !="" && is_numeric($uid) ){
			$Extra=" AND members.id=".$uid;
		}else{
			$Extra="";
		}
		$Counter =1; $DataArray = array(); $MODdata['page'] ='profile'; $MODdata['sub'] ='blogview';  $MODdata['type'] ='system';
			
		$result = $DB->query("SELECT blog_posts.*, members.username, members.id AS uid, files.uid, files.bigimage, files.type, files.approved, files.aid, files.adult_content
		FROM blog_posts 
		INNER JOIN members ON ( blog_posts.uid = members.id ".$Extra.")
		LEFT JOIN files ON ( files.uid = members.id AND files.default=1)
		WHERE blog_posts.approved='yes'	
		GROUP BY blog_posts.id ORDER by blog_posts.id DESC LIMIT ".$Limit);
	
		while( $Data = $DB->NextRow($result) ){
		
				$DataArray[$Counter]['title'] 			= eMeetingOutput($Data['title']);
				$DataArray[$Counter]['id'] 				= $Data['id'];
				$DataArray[$Counter]['image'] 			= ReturnDeImage($Data,"medium");
				//$DataArray[$Counter]['description'] 	= eMeetingOutput($Data['comments']);
				$DataArray[$Counter]['description'] 	= eMeetingOutput(strip_tags($Data['comments']),true);
				$DataArray[$Counter]['username'] 		= $Data['username'];
				$DataArray[$Counter]['uid'] 			= $Data['uid'];
	 
				# make link				
				$MODdata['id1'] = $Data['uid'];
				$MODdata['id2'] = $Data['id'];
				$MODdata['name'] = eMeetingOutput($Data['title']);
				$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);

				$Counter++;
				
		}
	
		return $DataArray;
	}

	 /**
	 * Info: eMeeting display recent games
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */

	function DisplayRecentGames($Limit=10){
	
		global $DB;
	
		$Counter =1; $DataArray = array(); $MODdata['page'] ='games'; $MODdata['type'] ='system';
			
		$result = $DB->query("SELECT game_games.Champion_name,game_games.gameid,game_games.id,game_games.game,game_games.Champion_score,game_games.times_played,game_games.about,game_games.game
		FROM game_games 
		ORDER by id DESC LIMIT ".$Limit);
	
		while( $Data = $DB->NextRow($result) ){
		
				$DataArray[$Counter]['title'] 			= $Data['game'];
				$DataArray[$Counter]['id'] 				= $Data['gameid'];
				$DataArray[$Counter]['image'] 			= DB_DOMAIN."inc/exe/Games/pics/".$Data['gameid'].".gif?";
				$DataArray[$Counter]['description'] 	= $Data['about'];
				$DataArray[$Counter]['username'] 		= $Data['Champion_name'];
				$DataArray[$Counter]['score'] 			= $Data['Champion_score'];	
	
				# make link
				$MODdata['sub'] ='play';
				$MODdata['id1'] = $Data['gameid'];
				$MODdata['name'] = $Data['game'];
				$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);

				$Counter++;
				
		}
	
		return $DataArray;
	}


	 /**
	 * Info: eMeeting display recent groups
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */

	function DisplyRecentGroups($limit=10,$uid=""){
	
		global $DB;
	
		$DataArray = array(); $MODdata['page'] ='groups'; $MODdata['sub'] ='show'; $Counter=1;$Extra="";

		if($uid !="" && is_numeric($uid) ){ $Extra =" AND groups.uid ='".$uid."' "; } 
	
		$result = $DB->Query("SELECT files.bigimage, files.adult_content, files.type, files.approved, groups.* 
		FROM `groups` 
		LEFT JOIN files ON (groups.photo = files.bigimage ) 
		WHERE groups.name !='' AND groups.approved='yes' $Extra 
		ORDER BY RAND() DESC LIMIT ".$limit);
		
		while( $Data = $DB->NextRow($result) )
		{
			
			// MAKE IMAGE
			$Data['bigimage'] = $Data['photo'];
			$Data['type'] = "photo";
			$Data['adult_content'] = "no";
	
			$DataArray[$Counter]['id'] 				= $Data['id'];
			$DataArray[$Counter]['uid']			 	= $Data['uid'];
			$DataArray[$Counter]['title'] 			= eMeetingOutput($Data['name']);
			$DataArray[$Counter]['name'] 			= eMeetingOutput($Data['name']);
			$DataArray[$Counter]['join'] 			= $Data['join_open'];
			$DataArray[$Counter]['created'] 		= $Data['created'];
			$DataArray[$Counter]['updated'] 		= $Data['updated'];
			$DataArray[$Counter]['image'] 			= ReturnDeImage($Data,"medium");
			$DataArray[$Counter]['description'] 	= eMeetingOutput($Data['description']);


			$MODdata['id1'] 					= $Data['id'];
			$MODdata['name'] 					= $DataArray[$Counter]['title'];
			$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);

			//$DataArray[$Counter]['link'] 			= "index.php?dll=groups&sub=view&gid=".$Data['id'];

			$Counter++;	
		}
	
		return $DataArray;
	}


	 /**
	 * Info: eMeeting display recent videos
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */

	function DisplayRecentVideos($limit=10){
	
		global $DB;
	
		$Counter =1;$DataArray = array(); $MODdata['page'] ='videos'; $MODdata['sub'] ='view';
		
	//	$result = $DB->Query("SELECT * FROM videos_watched WHERE vid_id !='' ORDER BY RAND() LIMIT ".$limit);

		$result = $DB->Query("SELECT f.id as vid_id, f.uid, f.title, f.description, f.views, f.type, f.bigimage from files f, album a where f.aid = a.aid and f.type in ( 'video','youtube') and f.approved = 'yes' and a.cat = 'public' ORDER BY RAND() LIMIT ".$limit);

	
		while( $Data = $DB->NextRow($result) )
		{

			$DataArray[$Counter]['id'] 			= $Data['vid_id'];	
			$DataArray[$Counter]['title'] 		= eMeetingOutput($Data['title']);
			$DataArray[$Counter]['description'] = eMeetingOutput($Data['description']);
			$DataArray[$Counter]['views'] 		= number_format($Data['views']);

		if ($Data['type'] == 'youtube') {

	//		$DataArray[$Counter]['image'] 		= "http://i4.ytimg.com/vi/".$Data['vid_id']."/default.jpg?e=thm_100";
			$file_part = explode("?v=",$Data['bigimage']); 
			$file_part = explode("&",$file_part[1]);	
			$DataArray[$Counter]['image'] = "http://img.youtube.com/vi/".$file_part[0]."/2.jpg";

		}
		else {
			$result1 = $DB->Row("SELECT type, adult_content, bigimage, approved FROM files WHERE uid='".$Data['uid']."' AND type='photo' and adult_content !='yes' ORDER BY date DESC LIMIT 1");
			$DataArray[$Counter]['image'] 		= ReturnDeImage($result1,"medium");
		}

			$MODdata['id1'] 					= $Data['vid_id'];
			$MODdata['name'] 					= $DataArray[$Counter]['title'];
			$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);
			/////////////////////////////////////////////////////////
			$Counter++;	
		}
		 
		return $DataArray;
	}


	 /**
	 * Info: eMeeting display recent events
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function DisplayRecentEvents($limit=10,$uid=""){
	
		global $DB;
	
		$Counter =1; $DataArray = array(); $MODdata['page'] ='calendar'; $MODdata['sub'] ='view'; $Extra="";

		if($uid !=""){ $Extra =" AND members.id ='".$uid."' "; } 
		
		$result = $DB->Query("SELECT calendar_data.photo, calendar_data.eventdate, files.aid, files.bigimage, files.type,	files.approved,	files.adult_content, members.username, calendar_data.id, calendar_data.uid AS uid, calendar_data.id, calendar_data.eventdate, calendar_data.eventtime, calendar_data.shortevent, calendar_data.longevent, calendar_data.type_1, calendar_data.type_2, calendar_data.country, calendar_data.province, calendar_data.city, calendar_data.street, calendar_data.phone, calendar_data.email, calendar_data.website,calendar_data.vis, calendar_data.approved AS event_approved 
			FROM calendar_data 
			INNER JOIN members ON ( members.id = calendar_data.uid $Extra )		 
			LEFT JOIN files ON ( files.bigimage = calendar_data.photo ) 
			WHERE calendar_data.approved='yes'
			GROUP BY calendar_data.id LIMIT ".$limit);
	
		while( $Data = $DB->NextRow($result) )
		{	
	
			$DataArray[$Counter]['title'] 		= 	eMeetingOutput($Data['shortevent']);
			$DataArray[$Counter]['name'] 		= 	eMeetingOutput($Data['shortevent']);
			$DataArray[$Counter]['description'] = 	$Data['eventdate'];
			$DataArray[$Counter]['id'] 			= 	$Data['id'];

			$MODdata['id1'] 					= $Data['id'];
			$MODdata['name'] 					= $DataArray[$Counter]['title'];
			$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);

			if($Data['photo'] !=""){
						$Data['bigimage'] = $Data['photo'];	
						$DataArray[$Counter]['image'] 	= 	ReturnDeImage($Data,"medium");									
			}else{
					$result1 = $DB->Row("SELECT type, adult_content, bigimage, approved FROM files WHERE uid='".$Data['uid']."' AND type='photo' and adult_content !='yes' ORDER BY date DESC LIMIT 1");
					$DataArray[$Counter]['image'] 		= ReturnDeImage($result1,"medium");
			}	
			$Counter++;	
		}
		
		return $DataArray;
	}

	 /**
	 * Info: eMeeting display recent forum posts
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function DisplayForumPosts($limit=10){
		
		global $DB;
		$DataArray = array(); $MODdata['page'] ='forum'; $MODdata['sub'] ='view';
		$Counter=1;
		
		$result = $DB->Query("SELECT forum_posts.post_id, forum_posts.forum_id,forum_topics.topic_id, forum_posts.post_time, forum_posts.poster_name, forum_topics.topic_title, files.bigimage, files.type, files.approved, forum_posts.post_text, forum_posts.poster_name, forum_posts.poster_id, forum_posts.post_time FROM 
		`forum_posts`
		LEFT JOIN files ON ( files.uid = forum_posts.poster_id AND files.default=1 AND files.type='photo')
		LEFT JOIN forum_topics ON ( forum_topics.topic_id = forum_posts.topic_id)
		GROUP BY forum_posts.post_id
		ORDER BY  forum_posts.post_time DESC limit ".$limit);

		while( $Data = $DB->NextRow($result) )
		{
					
			$DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"small");
			$DataArray[$Counter]['title'] 		= eMeetingOutput($Data['topic_title']);
			$DataArray[$Counter]['description'] = strip_tags($Data['post_text']);
			$DataArray[$Counter]['poster_id'] 	= $Data['poster_id'];	
			$DataArray[$Counter]['time'] 		= dates_interconv($Data['post_time']);
			$DataArray[$Counter]['username'] 	= $Data['poster_name'];
			$DataArray[$Counter]['uid'] 		= $Data['forum_id'];
			$DataArray[$Counter]['id'] 			= $Data['topic_id'];


			//$MODdata['id1'] 					= $Data['forum_id'];
			//$MODdata['id2'] 					= $Data['topic_id'];
			//$MODdata['name'] 					= $DataArray[$Counter]['title'];
			//$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);

			$DataArray[$Counter]['link'] 		= "inc/exe/forum/index.php?&action=vthread&forum=".$Data['forum_id']."&topic=".$Data['topic_id'];

			
			$Counter++;
			
		}
		
		return $DataArray;
			
	}

	/**
	* Info: Displays recent adverts
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
	
	function DisplayRecentAdverts($Limit=5,$uid=""){
	
		global $DB;
	
		$DataArray=array(); $Counter=1; $MODdata['page'] ='classads'; $MODdata['sub'] ='view'; $Extra="";
	
		if($uid !=""){ $Extra =" AND class_adverts.uid ='".$uid."' "; } 

		$result = $DB->Query("SELECT class_adverts.uid, files.bigimage,files.type,files.adult_content, files.approved, class_adverts.*,class_cats.name 
		FROM class_adverts 
		INNER JOIN class_cats ON (class_adverts.cat_id = class_cats.id $Extra ) 
		LEFT JOIN files ON ( files.bigimage = class_adverts.pic1 ) 
		ORDER BY RAND() LIMIT ".$Limit);	
	
		while( $Data = $DB->NextRow($result) )	{
	
			$DataArray[$Counter]['id'] 			= $Data['id'];
			$DataArray[$Counter]['uid'] 		= $Data['uid'];
			$DataArray[$Counter]['date'] 		= dates_interconv($Data['date_added']);
			$DataArray[$Counter]['title'] 		= eMeetingOutput($Data['title']);
			$DataArray[$Counter]['description'] = eMeetingOutput($Data['sub_title']);


			$MODdata['id1'] 					= $Data['id'];
			$MODdata['name'] 					= $DataArray[$Counter]['title'];
			$DataArray[$Counter]['link'] 		= MakeLinkMOD($MODdata);


			if($Data['pic1'] ==""){
			
				$result1 = $DB->Row("SELECT type, adult_content, bigimage, files.approved FROM files WHERE uid='".$Data['uid']."' AND type='photo' and adult_content !='yes' ORDER BY date DESC LIMIT 1");
				$DataArray[$Counter]['image']		= ReturnDeImage($result1,"medium");
			
			}else{
				$DataArray[$Counter]['image']		= ReturnDeImage($Data,"medium");
			}

			$Counter++;
		}

		return $DataArray;
	}




/*
	GETS A MEMBERS USERNAME FROM
	THEIR USERID
*/
if(!function_exists('GetUsername')){
function GetUsername($id){

	global $DB;
	
	$result = $DB->Row("SELECT username FROM members WHERE id='".eMeetingInput($id)."' LIMIT 1");
 
	return $result['username'];
}}
/*
	GETS A MEMBERS USERID FROM THEIR
	MEMBER USERNAME
*/
function GetUserID($username){

	global $DB;
	
	$result = $DB->Row("SELECT id FROM members WHERE username='".eMeetingInput($username)."' LIMIT 1");
	
	return $result['id'];
}

/*
	DISPLAY A NUMBER TO REPRESENT 
	THE TOTAL NUMBER OF USERS ONLINE
*/
function CountOnline(){

	global $DB;

	$OnlineCounter=0;
 	$CurrentTime = strtotime("now");

	if(!isset($_SESSION['countonline_time'])){
		
		$_SESSION['countonline_time'] = $CurrentTime;
	}
	// find the difference between the two times
	$TimeDifference = $CurrentTime - $_SESSION['countonline_time'];


	if(defined('AUTO_LOGIN') && AUTO_LOGIN =="yes" && $_SESSION['countonline_total'] < AUTO_MINIMUM_ONLINE){
		Build_AutoUsersOnline(AUTO_AMOUNT);
	}	


	if(D_GENDERMATCHING ==1 && isset($_SESSION['genderid']) && $_SESSION['genderid'] !=0){ $GenderExtra = " AND members_data.gender != ".$_SESSION['genderid']." "; }else { $GenderExtra=""; }

	$SQL = "SELECT count(DISTINCT members_online.logid) AS total FROM members
	INNER JOIN members_data ON ( members.id = members_data.uid ) 
	INNER JOIN members_online ON ( members_online.logid = members_data.uid ) 
	WHERE members.email !='' AND members.visible = 'yes' AND members.active ='active' AND activate_code='OK'";	
 
	$re = $DB->Query($SQL);
	$class = $DB->NextRow($re);
	$OnlineCounter = $class['total'];

	//$OnlineCounter--;
	if($OnlineCounter < 1){ $OnlineCounter =0; }

	// reset counters
	$_SESSION['countonline_time']	= $CurrentTime ;
	$_SESSION['countonline_total'] 	= $OnlineCounter;

	return number_format($OnlineCounter);

		
}
/*
	DISPLAY A NUMBER TO REPRESENT 
	THE TOTAL NUMBER OF USERS ONLINE
*/
function CountAllMembers(){

	global $DB;
	

	$re = $DB->Row("SELECT count(id) AS total FROM members WHERE id !=0");	

	return number_format($re['total']);
	
}
if(!function_exists('MakeAge')){
function MakeAge($birthday){

        $birth = explode("-", $birthday);
if(isset($birth[1])){
		switch($birth[1]){
			case "JAN": { $MM = "01"; } break;
			case "FEB": { $MM = "02"; } break;
			case "MAR": { $MM = "03"; } break;
			case "APR": { $MM = "04"; } break;
			case "MAY": { $MM = "05"; } break;
			case "JUN": { $MM = "06"; } break;
			case "JUL": { $MM = "07"; } break;
			case "AUG": { $MM = "08"; } break;
			case "SEP": { $MM = "09"; } break;
			case "OCT": { $MM = "10"; } break;
			case "NOV": { $MM = "11"; } break;
			case "DEC": { $MM = "12"; } break;
			default: { return 21; }
		}
}else{
$MM = "12";
}

	$day =$birth[2];
	$month =$MM;
	$year =$birth[0];

	$year_diff  = date("Y") - $year;   
    $month_diff = date("m") - $month;   
    $day_diff   = date("d") - $day;   
    
	if ($month_diff < 0) $year_diff--;   
        elseif (($month_diff==0) && ($day_diff < 0))$year_diff--;
##        elseif (($month_diff==0) && ($day_diff >= 0))$year_diff++;
        return $year_diff; 

}
}
if(!function_exists('GetAgeYear')){
function GetAgeYear($number){
	$year = date("Y");
	for($i=$number; $i != 0; $i--){
		$year--;
	}
	return $year;
}
}
/*
	DISPLAY THE GENDER FOR THE SELECTED USER
*/
function MakeCountryID($value){

	global $DB;

	if(is_numeric($value)){ return $value; }
 
	$re3 = $DB->Row("SELECT fvid FROM field_list_value WHERE fvCaption LIKE ('%".eMeetingInput(strip_tags($value))."%')  LIMIT 1");
	return  $re3['fvid'];
	
}
if(!function_exists('MakeCountry')){
function MakeCountry($id, $fvFid=""){

	global $DB;
	
	if(!is_numeric($id)){

	return $id;

	}elseif($id == 0 || $id == ""){
	
		return "na";
		
	}else{
		
		if(is_numeric($fvFid)){ $SaveID = $id."0".$fvFid; }else{ $SaveID =$id; }

		if(isset($_SESSION['country'][$SaveID]['name'])){

		return $_SESSION['country'][$SaveID]['name'];
		
		}else{
		
			if(is_numeric($fvFid)){ $Extra ="AND fvFid='".$fvFid."'"; }else{ $Extra =""; }

			$re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."'  ".$Extra." AND lang='".D_LANG."' LIMIT 1");

			if(empty($re3)){
			$re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."' ".$Extra." LIMIT 1");
			}

			$_SESSION['country'][$SaveID]['name'] = $re3['fvCaption'];
			return $re3['fvCaption'];
		}
	}
	
}}

/*
	DISPLAY THE GENDER FOR THE SELECTED USER
*/
function MakeGender($id){

	global $DB;
	
	if(!is_numeric($id)){

	return $id;

	}elseif($id == 0 || $id == ""){
	
		return "na";
		
	}else{
		
		if(isset($_SESSION['gender'][$id]['name'])){

		return $_SESSION['gender'][$id]['name'];
		
		}else{
		
			$re3 = $DB->Row("SELECT id,fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."'  AND lang='".$_SESSION['lang']."' LIMIT 1");
			$_SESSION['gender'][$re3['id']]['name'] = $re3['fvCaption'];
			return $re3['fvCaption'];
		}
	}
	
}

/*
	DISPLAY MEMBER ACCOUNT ROAMING DETAILS
*/
function MemberAccountDetails($id,$extra=true,$page=""){

		global $DB;

		if(!is_numeric($id)){ return; }
		
		$DataArray = array();
		
			$result = $DB->Row("SELECT profileview_friends, profileview_nonfriend, members_privacy.skype, members_privacy.IM, members_billing.date_expire, members.active AS ThisApproved, members_privacy.SMS_credits AS sms_remaining, members.*, files.type, files.adult_content, files.approved, files.bigimage, package.name, package.maxFiles, package.SMS_credits, package.maxMessage, package.icon
			FROM members
			INNER JOIN members_privacy ON ( members_privacy.uid = members.id AND members.id=".$id." )
			LEFT JOIN files ON ( files.uid = members.id AND files.default=1 AND files.type='photo')
			LEFT JOIN package ON (members.packageid = package.pid)
			LEFT JOIN members_billing ON (members_billing.uid = members.id)
			LIMIT 1");

			// MEMBER IMAGE DATA
			$DataArray['image'] = ReturnDeImage($result,"medium");
			$DataArray['image_small'] = $DataArray['image']."x=48&y=48";//ReturnDeImage($result,"small");

			// MEMBER PACKAGE DATA

			if($extra){
				$usedMsgSpace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid= ( '".$id."' ) AND maildate='".date("Y-m-d")."'");	
				$DataArray['msg_total'] = $result['maxMessage'];
				$DataArray['msg_used'] = $usedMsgSpace['space'];
	
				$usedImageSpace = $DB->Row("SELECT count(uid) AS space FROM files WHERE uid= ( '".$id."' )");	
				$DataArray['img_total'] = $result['maxFiles'];
				$DataArray['img_used'] = $usedImageSpace['space'];
			}

			// headline for profile
			if($page =="profile"){

			// FOLLOW FUNCTION ENABLED
			if(D_FOLLOW ==1){

				$follow = $DB->Row("SELECT follow_display, allow_approve FROM members_follow WHERE uid = ( '".$id."' ) LIMIT 1");
				$DataArray['follow_display'] = $follow['follow_display'];
				$DataArray['follow_approve'] = $follow['allow_approve'];
			}
 	
			// PROFILE VIEW GROUP DATA
			$DataArray['profile_viewfriends'] 					= $result['profileview_friends'];	// privacy settings for viewing profile blocks
			$DataArray['profile_viewnonefiends'] 				= $result['profileview_nonfriend'];

				$profile = $DB->Row("SELECT members_online.logid AS onlinenow, members_data.headline, members_data.description, members_data.age, members_data.gender, members_data.country, members_data.location, members_data.postcode FROM members_data 
				LEFT JOIN members_online ON ( members_data.uid = members_online.logid ) 
				WHERE uid= ( '".$id."' ) LIMIT 1");

				$DataArray['headline'] 			= eMeetingOutput($profile['headline']);
				if($DataArray['headline'] =='0'){$DataArray['headline']=""; }
				$DataArray['MyGender'] 			= MakeGender($profile['gender']);
				$DataArray['gender'] 			= $profile['gender'];
				$DataArray['country'] 			= MakeCountry($profile['country']);
				$DataArray['location'] 			= eMeetingOutput($profile['location']);
				$DataArray['description'] 		= eMeetingOutput($profile['description']);
				$DataArray['age'] 				= MakeAge($profile['age']);
				$DataArray['starsign'] 			= getsign($profile['age']);
				$DataArray['birthday'] 			= $profile['age'];
				//$DataArray['zipcode'] 			= eMeetingOutput($profile['zipcode']);
				$DataArray['postcode'] 			= eMeetingOutput($profile['postcode']);

				if(isset($profile['onlinenow']) && $profile['onlinenow'] !=""){
						$DataArray['onlinenow'] 			= true;
				}else{
						$DataArray['onlinenow'] 			= false;
				}



$getstat = $DB->Row("Select fvCaption from field_list_value f, members_data d where d.location = f.fvid and f.fvFid = 26 and uid = ( '".$id."' ) ");

$DataArray['mycity'] = $getstat['fvCaption'];

if ($getstat ==""){
   $DataArray['mycity'] = eMeetingOutput($profile['location']);
}


$getline = $DB->Row("Select fvCaption from field_list_value f, members_data d where  d.em_85820081128  = f.fvid and f.fvFid = 54 and uid = ( '".$id."' ) ");

$DataArray['mystate'] = $getline['fvCaption'];


			}

			$DataArray['skype'] 			= eMeetingOutput($result['skype']);
			$DataArray['status'] 			= eMeetingOutput($result['msgStatus']);
			$DataArray['SMS_credits'] 		= $result['sms_remaining'];
			$DataArray['name'] 				= $result['name'];
			$DataArray['showIM'] 			= $result['IM'];
			$DataArray['username'] 			= substr($result['username'],0,15);
			$DataArray['ThisApproved'] 		= $result['ThisApproved'];
			$DataArray['highlight'] 		= $result['highlight'];
			$DataArray['active'] 			= $result['active']; //active, 'suspended', 'unapproved', 'cancel'
			$DataArray['video_duration']	= $result['video_duration']; 
			$DataArray['created'] 			= $result['created'];
			$DataArray['hits'] 				= number_format($result['hits']);
			$DataArray['icon'] 				= $result['icon'];
			$DataArray['uid'] 				= $result['id'];
			$DataArray['visible'] 			= $result['visible'];
			$DataArray['lastlogin'] 		= $result['lastlogin'];
			$DataArray['updated'] 			= $result['updated'];
			$DataArray['expire'] 			= dates_interconv($result['date_expire']);
			$DataArray['profile_complete'] 	= $result['profile_complete'];
			if($DataArray['profile_complete'] =='99'){$DataArray['profile_complete']="100"; }
			$DataArray['updated'] 			= $result['updated'];


			return $DataArray;
}

function DisplayRecentMembers($limit=10){

	global $DB;

	$Counter =1;
	$DataArray = array();
	
		// LATEST MEMBERS	
		$result = $DB->Query("SELECT members.id, members_data.age, members_data.gender, members_data.location, members.username, album.cat, files.bigimage, files.type, files.approved, files.aid, album.cat		
		FROM  members 
		INNER JOIN members_data ON ( members.id = members_data.uid AND members.id !=0 )
		LEFT JOIN files ON ( files.uid = members_data.uid AND files.type='photo' )
		LEFT JOIN album ON ( album.aid = files.aid )
		GROUP BY members.id
		ORDER BY members.lastlogin DESC LIMIT $limit");

	while( $Data = $DB->NextRow($result) )
	{
		$Uimage 							= ReturnDeImage($Data,"small",1);
		$DataArray[$Counter]['image'] 		= $Uimage;					// MEMBERS PHOTO
		$DataArray[$Counter]['id'] 			= "index.php?dll=profile&pId=".$Data['id'];
		$DataArray[$Counter]['username'] 	= $Data['username'];
		$DataArray[$Counter]['age']			= MakeAge($Data['age']);
		$DataArray[$Counter]['gender'] 		= MakeGender($data['gender']);
		$DataArray[$Counter]['location'] 	= $Data['location'];
		/////////////////////////////////////////////////////////
		$Counter++;	
	}
	
	return $DataArray;
}

function MyLastVisitedProfile($id, $limit=1){

		global $DB;
		$Counter =1;
		$DataArray = array();
		
		$result = $DB->Query("SELECT max(visited.autoid), members.id, members.username, members_data.age, members_data.gender,  members_data.country, members_data.location, album.cat, files.type, files.adult_content, files.approved, files.bigimage 
		FROM visited
		INNER JOIN members ON ( visited.view_uid = members.id)
		INNER JOIN members_data ON (members.id = members_data.uid )
		LEFT JOIN files ON (files.uid = visited.view_uid AND files.type='photo' AND  files.default='1')
		LEFT JOIN album ON (files.aid = album.aid )
		WHERE visited.uid= ( '".$id."' )
GROUP BY members.id, members.username, members_data.age, members_data.gender,  members_data.country, album.cat, files.type, files.adult_content, files.approved, files.bigimage 
ORDER BY 1 DESC LIMIT ".$limit);
		
		while( $Data = $DB->NextRow($result) ){
			
				if($Data['cat'] == "private")
				{
					$DataArray[$Counter]['image'] = "inc/tb.php?src=".DEFAULT_IMAGE."&x=96&y=96";
				}
				else
				{
					$DataArray[$Counter]['image'] 		= 	ReturnDeImage($Data,"medium");	
				}

				$DataArray[$Counter]['id'] 			= 	$Data['id'];
				$DataArray[$Counter]['username'] 	= 	$Data['username'];
				$DataArray[$Counter]['country'] 	= 	MakeCountry($Data['country']);
				$DataArray[$Counter]['age'] 		= 	MakeAge($Data['age']);
				$DataArray[$Counter]['gender'] 		= 	MakeGender($Data['gender']);
				$DataArray[$Counter]['date'] 		= 	ShowTimeSince($Data['date']);

				$DataArray[$Counter]['location'] 	= 	$Data['location'];


$getline = $DB->Row("Select fvCaption from field_list_value f, members_data d where  d.em_85820081128  = f.fvid and f.fvFid = 54 and uid = ( '".$Data['id']."' ) ");


$DataArray[$Counter]['mystate'] = $getline['fvCaption'];

$getstat = $DB->Row("Select fvCaption from field_list_value f, members_data d where d.location = f.fvid and f.fvFid = 26 and uid = ( '".$Data['id']."' ) ");

$DataArray[$Counter]['location'] = $getstat['fvCaption'];

if ($getstat ==""){
   $DataArray[$Counter]['location'] = $Data['location'];
}



				if(D_MOD_WRITE ==1){
					$DataArray[$Counter]['link'] 	= DB_DOMAIN.$Data['username'];
				}else{
					$DataArray[$Counter]['link'] 	=	"index.php?dll=profile&pId=".$Data['id'];
				}		
				$Counter++;
		}		
		
		return $DataArray;

}


function VisitorHistory($id){

		global $DB;
		$Counter =1;
		$DataArray = array();
		
		$result = $DB->Query("SELECT members.id, members.username, visited.date FROM visited
		INNER JOIN members ON ( visited.uid = members.id)
		 WHERE visited.view_uid= ( '".$id."' )
		 GROUP BY visited.uid");
		
		while( $Data = $DB->NextRow($result) ){
				
				$DataArray[$Counter]['id'] 			= 	$Data['id'];
				$DataArray[$Counter]['username'] 	= 	$Data['username'];
				$DataArray[$Counter]['date'] 		= 	dates_interconv($Data['date']);
				$Counter++;
		}		
		
		return $DataArray;

}

function DisplayLastVisited($id){

	global $DB;
	
	$Counter =1;
	$DataArray = array();
	
	$result1 = $DB->Query("SELECT album.cat, members.id, files.bigimage,files.type,	files.approved,	files.aid,	album.cat,	album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f FROM visited
	INNER JOIN members ON ( members.id = visited.view_uid ) 
	LEFT JOIN files ON ( files.uid = visited.view_uid )
	LEFT JOIN album ON ( album.aid = files.aid ) 
	WHERE visited.uid= ('".$id."') 
	GROUP BY visited.view_uid
	ORDER BY visited.autoid DESC LIMIT 2");
	while( $Data = $DB->NextRow($result1) )
	{
		if($Data['cat'] != "public" && $Data['id'] != $_SESSION['uid'])
		{
			$Uimage		= 	"inc/tb.php?src=nophoto.jpg&x=48&y=48&x=48&y=48";
		}
		else 
		{
			$Uimage = ReturnDeImage($Data,"small",1);
		}
		$DataArray[$Counter]['bigimage'] 		= $Uimage;					// MEMBERS PHOTO
		$DataArray[$Counter]['id'] = "index.php?dll=profile&pId=".$Data['id'];
		/////////////////////////////////////////////////////////
		$Counter++;	
	}
	
	if(!isset($DataArray[1]['bigimage'])){ $DataArray[1]['bigimage']=DEFAULT_IMAGE; $DataArray[1]['id']="index.php?dll=browse";}
	if(!isset($DataArray[2]['bigimage'])){ $DataArray[2]['bigimage']=DEFAULT_IMAGE; $DataArray[2]['id']="index.php?dll=browse";}
	
	return $DataArray;
}

function DisplayMyPhotos($id,$aid=0){

	global $DB;
	
	$Counter =1;
	$DataArray = array();
	$ExtraRun="";


		if($aid != 0){
		$ExtraRun = " AND files.aid='".$aid."' ";
		}
		// LATEST MEMBERS	
		$result = $DB->Query("SELECT files.default, files.adult_content, album.cat, files.title, files.bigimage, files.type, files.approved, files.aid, files.id AS fid, files.uid, album.cat		
		FROM  members 
		INNER JOIN files ON ( files.uid = members.id AND files.type='photo' AND files.uid= ( ".$id." ) AND files.approved = 'yes'  $ExtraRun )
		INNER JOIN album ON ( album.aid = files.aid )
		ORDER BY files.id DESC");

	while( $Data = $DB->NextRow($result) )
	{

		$Uimage = ReturnDeImage($Data,"small",1);
		$DataArray[$Counter]['image'] 		= $Uimage;					// MEMBERS PHOTO
		$DataArray[$Counter]['id'] = "index.php?dll=profile&pId=".$Data['uid'];
		$DataArray[$Counter]['default'] = $Data['default'];
		$DataArray[$Counter]['aid'] = $Data['aid'];
		$DataArray[$Counter]['fid'] = $Data['fid'];
		$DataArray[$Counter]['filename'] = $Data['bigimage'];
		$DataArray[$Counter]['title'] = eMeetingOutput($Data['bigimage']);
		/////////////////////////////////////////////////////////


		# make link
		$MODdata['page'] ='profile'; 
		$MODdata['sub'] ='viewfile';				
		$MODdata['id1'] = $Data['uid'];
		$MODdata['id2'] = $Data['aid'];
		$MODdata['id3'] = $Data['fid'];
		$MODdata['name'] = $DataArray[$Counter]['title'];

		if($_SESSION['pack_adult'] !="yes" && $Data['adult_content'] =="yes" && $Data['uid'] != $_SESSION['uid'] && $_SESSION['site_moderator'] =='no' && ENABLE_ADULTCONTENT =="yes"){

		$DataArray[$Counter]['link'] = "javascript:alert('".$GLOBALS['_LANG_ERROR']['_noAdultAccess']."')";

		}else{

		$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
		}


 
		$Counter++;	
	}
	
	return $DataArray;
}

function MemberDisplayPhotos(){

	global $DB;
	
	$Counter =1;
	$DataArray = array();
			
	$result1 = $DB->Query("SELECT bigimage,aid FROM files WHERE uid= ( '".$_SESSION['uid']."' ) AND type='photo' AND files.default LIKE '%1%' LIMIT 1");
						
			while( $Data = $DB->NextRow($result1) )
			{										
				
				$DataArray[$Counter]['aid'] 		= $Data['aid'];
				$DataArray[$Counter]['image'] 		=  WEB_PATH_IMAGE_THUMBS.$Data['bigimage'];
				$Counter++;				
						
			}
	
	/// LOOP THE ARRAY SO WE HAVE AT LEAST 5 IMAGES
	$i=1;
	while($i != 2){
				
				if(!isset($DataArray[$i]['image'])){
					$DataArray[$i]['aid'] 			= 0;
					$DataArray[$i]['image'] 			= DEFAULT_IMAGE;
				}		
		$i++;
	}
	
	return $DataArray;
}

function displayQuizQuestions($uid,$qid){

	global $DB;
	$Counter =1;
	$DataArray = array();
 
    $result = $DB->Query("SELECT * FROM `quiz_questions` WHERE parent_id='".$qid."' AND uid='".$uid."' ORDER BY orderid ASC");

    while( $quiz = $DB->NextRow($result) )
    {
		$DataArray[$Counter]['id'] 			= $quiz['id'];				
		$DataArray[$Counter]['title'] 		= $quiz['question_title'];
		$DataArray[$Counter]['q1'] 			= $quiz['q1'];
		$DataArray[$Counter]['q2'] 			= $quiz['q2'];
		$DataArray[$Counter]['q3'] 			= $quiz['q3'];
		$DataArray[$Counter]['q4'] 			= $quiz['q4'];
		$DataArray[$Counter]['answer'] 		= $quiz['answer'];
		$DataArray[$Counter]['orderid'] 	= $quiz['orderid'];
		
		$Counter++;	
	}
	
	return $DataArray;
}
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////

if(!function_exists('e_meta')){

	function e_meta() {
	
		return;
	}

}

if(!function_exists('e_head')){

	function e_head() {
	 
		return;		
	}
}

if(!function_exists('e_footer')){
	
	function e_footer() {
	
		return;
	}
}

if(!function_exists('e_sidebar')){

	function e_sidebar() {
	
		return;
	}	
}

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////

	function StopSubscription($TRANS_ID){
	
		global $DB;
		
		$td = $DB->Row("SELECT id, uid FROM members_billing WHERE transaction_id = ( '".$TRANS_ID."' ) LIMIT 1");
			
		if( !empty($td) ){
			// STOP THEIR SUBSCRIPTION ACCESS
			$DB->Insert("UPDATE `members_billing` SET date_expire='".date('Y-m-d H:i:s')."', running='no', subscription='no' WHERE transaction_id = ( '".$TRANS_ID."' ) LIMIT 1"); 
			
			// DOWN GRADE THE USER TO THE DEFAULT PACKAGE
			$DB->Update("UPDATE members SET packageid= ( '".DEFAULT_PACKAGE."' ) WHERE id= ( '".$td['uid']."' ) LIMIT 1");		
		
		}else{
			
			mail(ADMIN_EMAIL,"Stop Subscrption Failed","Stop subscription failed for transaction ID ".$TRANS_ID."");
		
		}
	}
	
	// ADD ORDER TO THE DATABASE
	function AddOrder($UserID, $PackageID, $method, $email, $TRANS_ID){

	global $DB;

		if($TRANS_ID != ""){
		
			$td = $DB->Row("SELECT id FROM members_billing WHERE transaction_id = ( '".$TRANS_ID."' ) LIMIT 1");
			
			if( empty($td) ){
				
				// CHECK PACKAGE DETAILS
				$pak = $DB->Row("SELECT subscription, price, numdays FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");
				if ($pak['numdays'] > 730)
				   {$pak['numdays'] = 3653;
				}

				
				// DELETE OLD ENTRIES TO KEEP THE SYSTEM CLEAN
				$DB->Update("DELETE FROM members_billing WHERE uid = ( '".$UserID."' ) ");
				
				// ADD ENTRY TO DATABASE
				$DB->Insert("INSERT INTO `members_billing` (`id` ,`uid` ,`packageid` ,`date_upgrade` ,`date_expire` ,`pay_method` ,`running` ,`subscription` ,`bill_email` ,`transaction_id`) 
				VALUES (NULL , '".$UserID."', '".$PackageID."', '".date("Y-m-d H:i:s")."', '".date('Y-m-d H:i:s', strtotime('+'.$pak['numdays'].' days'))."', '".$method."', 'yes', '".$pak['subscription']."', '".$email."', '".$TRANS_ID."')");
				
				// UPGRADE MEMBERS ACCOUNT 
				UpgradeMembersAccount($PackageID, $UserID);
				
				// CHECK THE AFFILIATE SYSTEM
				CheckAffiliate($UserID, $pak['price']);
				
				return "success-new";
			
			}else{
			
				// CHECK PACKAGE DETAILS
				$pak = $DB->Row("SELECT subscription, price, numdays FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");

				if ($pak['numdays'] > 730)
				   {$pak['numdays'] = 3653;
				}

				
				// DETAILS ALREADY FOUND, UPDATE THE CURRENT INFORMATION
				$DB->Insert("UPDATE `members_billing` SET date_expire='".date('Y-m-d H:i:s', strtotime('+'.$pak['numdays'].' days'))."', running='yes' WHERE transaction_id = ( '".$TRANS_ID."' ) LIMIT 1"); 
				
				// UPGRADE MEMBERS ACCOUNT 
				UpgradeMembersAccount($PackageID, $UserID);
				
				return "success-update";
				
			}
			
		}
	
	  return "failed";
	}
	
	function UpgradeMembersAccount($PackageID, $UserID){

	global $DB;
	
		if(stristr($PackageID, 'sms') === FALSE) {
			
			// NORMAL PACKAGE UPGRADE USING PACKAGE ID
			$SmsCheck = $DB->Row("SELECT icon, SMS_credits FROM package WHERE pid = ('".$PackageID."') LIMIT 1");
			
			if($SmsCheck['icon'] =="SMS" && is_numeric($SmsCheck['SMS_credits']) ){
			
				$Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$SmsCheck['SMS_credits']." WHERE uid=".$UserID);
				
			}else{
				if(is_numeric($PackageID)){
					$Upgrade_Record = $DB->Row("UPDATE members SET packageid=".$PackageID." WHERE id= ( '".$UserID."' ) LIMIT 1");
				}
				if(is_numeric($SmsCheck['SMS_credits'])){
					$Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$SmsCheck['SMS_credits']." WHERE uid = ( '".$UserID."' ) LIMIT 1");
				}
			}
			
			
		}else{
		
		// SPECIAL PACKAGE UPGRADE
		
			$cc = explode("--",$PackageID);
			// do SMS credits
			if($cc[0] == "sms"){
				if(is_numeric($SmsCheck['SMS_credits'])){
					$Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$cc[1]." WHERE uid = ( '".$UserID."' ) LIMIT 1");
				}
			}elseif($cc[0] == "highlight"){
			
				$Upgrade_Record = $DB->Row("UPDATE members SET highlight='on'  WHERE id= ( '".$UserID."' ) LIMIT 1");
			
			}elseif($cc[0] == "featured"){
			
				$Upgrade_Record = $DB->Row("UPDATE files SET featured='yes'  WHERE id= ( '".$UserID."' ) LIMIT 1");
				
			}
						
		}
	
	
		return $Upgrade_Record;
	}	


	function CheckAffiliate($UserID, $Price){
	
		global $DB;	
		
		// check to see if this user signed up via an affiliate code
		$found = $DB->Row("SELECT affiliate_id FROM aff_signup  WHERE member_id = ( '".$UserID."' ) LIMIT 1");
		
		if(isset($found['affiliate_id'])){
		
			// WORK OUT COMMISION RATE
			
			$result = $DB->Row("SELECT content FROM aff_pages WHERE page='commission' LIMIT 1");
			
			$COMMISSION_RATE = ($result['content']/100 * $Price);
			
			$DB->Insert("INSERT INTO `aff_payment` (`member_id` ,`affiliate_id` ,`total_due` ,`status` ,`date` ) 
			VALUES ('".$UserID."', '".$found['affiliate_id']."', '".$COMMISSION_RATE."', 'unapproved', '".date("Y-m-d")."')");
		
		}
		
		return;
	}


function displayGenders($skip=0){
	
	global $DB;
	$String = "";
	
	$result = $DB->Query("SELECT fvid, fvCaption, fvOrder, lang FROM field_list_value WHERE fvFid =28 AND lang='".D_LANG."' Order by fvOrder");
	if(empty($result)){
		$result = $DB->Query("SELECT fvid, fvCaption, fvOrder, lang FROM field_list_value WHERE fvFid =28 Order by fvOrder");
	}
	while( $list = $DB->NextRow($result) )
	{		
				if($skip ==1 && isset($stopSkip) && !isset($EndSkip)){
					$ListValue['default']="selected";
					$EndSkip=1;
					$stopSkip=1;
				}elseif($skip ==1){
					$ListValue['default']="";
				}
				if($skip ==1 && !isset($stopSkip)){
					$ListValue['default']="";
					$stopSkip=1;
				}
				
				$String .= "<option value='".$list['fvid']."' ".$ListValue['default'].">".$list['fvCaption']."</option>";	
	}
	
	if($String==""){
		
		$result = $DB->Query("SELECT fvid, fvCaption, fvOrder, lang FROM field_list_value WHERE fvFid =28 AND lang='english' Order by fvOrder");
	
		while( $list = $DB->NextRow($result) )
		{

				if($skip ==1 && isset($stopSkip) && !isset($EndSkip)){
					$ListValue['default']="selected";
					$EndSkip=1;
					$stopSkip=1;
				}elseif($skip ==1){
					$ListValue['default']="";
				}
				if($skip ==1 && !isset($stopSkip)){
					$ListValue['default']="";
					$stopSkip=1;
				}
					
					$String .= "<option value='".$list['fvid']."' ".$ListValue['default'].">".$list['fvCaption']."</option>";	
		}	
	}
	return $String;
}	
?>
