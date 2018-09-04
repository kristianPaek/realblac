<?

function GetForumListCats(){

	global $DB;
	
	$RunningCount =1;
	$DataArray = array();
	
	$result = $DB->query("SELECT forum_id, forum_name FROM forum_forums ORDER BY forum_name ASC");

	while( $com = $DB->NextRow($result) ){
	
			$DataArray[$RunningCount]['name'] 	= $com['forum_name'];		
			$DataArray[$RunningCount]['id'] 	= $com['forum_id'];
			$RunningCount++;
			
	}

	return $DataArray;

}
?>