<?php 

function DisplayTopMembers($limit=5, $gender_id){

	global $DB;

		$count=1;
		$fea = array();

		// FEATURED MEMBERS
		$result = $DB->Query("SELECT members.id, members.username, files.bigimage, files.type, files.approved, files.aid, files.adult_content	
		FROM  members 
		INNER JOIN members_data ON ( members.id = members_data.uid AND members_data.gender=".$gender_id.")
		INNER JOIN files ON ( files.uid = members_data.uid )	
		WHERE members.id = files.uid AND files.type='photo' AND files.featured='yes' 
		GROUP BY members.id
		ORDER BY members.updated LIMIT $limit");
		while( $user = $DB->NextRow($result) )
		{	
				if(D_MOD_WRITE ==1){
					$fea[$count]['id'] 			=	$user['username'];
				}else{
					$fea[$count]['id'] 			=	"index.php?dll=profile&pId=".$user['id'];
				}			
				$fea[$count]['username'] 	= 	$user['username'];
			
	
			$fea[$count]['image'] = ReturnDeImage($user,"xsmall");
				$count++;
		}

	return $fea;
}
?>