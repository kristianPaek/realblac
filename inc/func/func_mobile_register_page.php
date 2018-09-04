<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );




function DisplayTerms(){

	global $DB;

    $result = $DB->Row("SELECT value2 FROM system_settings  WHERE id=5");
	return $result['value2'];
}

function DisplayRegPhoto($id=0){

	global $DB;
	$ShowArray = array();
	
	## CHECK FOR NULL VALUE
	if($id ==0){
		$ExtraString = "WHERE files.type='photo' ORDER BY RAND() LIMIT 1";
	}else{
		$ExtraString = "WHERE files.type='photo' AND files.default=1 AND members.id='".strip_tags($id)."' ORDER BY files.id DESC LIMIT 1";
	}
	
    $result = $DB->Row("SELECT members_online.logid AS onlinenow, album.cat, files.approved, files.bigimage, members.id, members.username, members_data.age, members_data.gender , members_data.headline, members_data.description, members_data.location, members_data.country
		FROM members
		INNER JOIN members_data ON ( members.id = members_data.uid ) 
		LEFT JOIN files ON ( files.uid = members_data.uid )
		LEFT JOIN album ON ( album.aid = files.aid ) 
		LEFT JOIN members_online ON ( members_online.logid = members_data.uid ) $ExtraString");
	 
	 	$ShowArray['username'] =  $result['username'];
		$ShowArray['gender'] =  MakeGender($result['gender']);
		$ShowArray['age'] =  MakeAge($result['age']);
		$ShowArray['headline'] =  $result['headline'];
		$ShowArray['description'] =  $result['description'];
		$ShowArray['location'] =  $result['location'];
		$ShowArray['country'] =  $result['country'];
		///////////////////////////////////////////////////////////////////////////////////////////////////
		if($result['bigimage'] != ""){
		
				if($result['approved'] =="no"){
						$Uimage = WATINGAPPROVAL_IMAGE;
						
				}elseif($result['cat'] =="private"){
										
								$Uimage = DEFAULT_IMAGE_ADULT;								
				}else{						
					$Uimage = WEB_PATH_IMAGE.$result['bigimage'];
				}		
		}else{
			$Uimage = DEFAULT_IMAGE;
		}
		$ShowArray['image'] 		= $Uimage;					// MEMBERS PHOTO
		/////////////////////////////////////////////////////////
		if(isset($result['onlinenow']) && $result['onlinenow'] !=""){
					$OnlineM = true;
		}else{
					$OnlineM = false;
		}	 
		$ShowArray['onlinenow'] 			= $result['onlinenow'];				// MEMBERS ONLINE NO
		
		
	return $ShowArray;

}
?>