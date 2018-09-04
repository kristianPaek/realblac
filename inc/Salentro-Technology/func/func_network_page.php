<?php 

function DisplayNetwork($id, $netid, $isProfile = false, $StopUsername="", $Limit=100){

	// removed in version 9
}

function DisplayContacts($FoundMember){

	global $DB;
	$ReturnString ="";
	
	
	foreach($FoundMember as $value){
	
			$result1 = $DB->Row("SELECT files.bigimage, members.id, members.username FROM members 
			LEFT JOIN files ON ( files.uid = members.id )			
			WHERE members.email LIKE '%".$value['email']."%' LIMIT 1");
			
			if($result1['bigimage'] != ""){
				$Uimage = WEB_PATH_IMAGE_THUMBS.$result1['bigimage'];
			}else{
				$Uimage = DEFAULT_IMAGE;
			}
			
			$ReturnString .="<li><a href='index.php?dll=profile&pId=".$result1['id']."'><img src='".$Uimage."' style='float:left; padding-right:30px;'></a> <strong>".$result1['username']."</strong> <br><br> ".$value['email']." <div class='ClearAll'></div></li>";		
	}
	return	$ReturnString;
}
?>