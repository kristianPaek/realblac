<?php
	function GetMyMatchInfo($user_id) {
		global $DB;

		$query = "Select * From members_mymatch Where user_id = " . $user_id;
		$result = $DB->Query($query);

		if (mysql_num_rows($result) == 0) {
			$query = sprintf("Insert Into members_mymatch (`user_id`, `race`, `min_height`, `max_height`, `body_type`, `education`, `kids`) Values(%d, '', '', '', '', '', '')", $user_id);
			$DB->Insert($query);

			$query = "Select * From members_mymatch Where user_id = " . $user_id;
			$result = $DB->Query($query);
		}

		$response = array();
		while ($row = $DB->NextRow($result)) {
			$response[] = array(
				"user_id"=>$row['user_id'],
				"min_age"=>$row['min_age'],
				"max_age"=>$row['max_age'],
				"race"=>$row['race'],
				"min_height"=>$row['min_height'],
				"max_height"=>$row['max_height'],
				"body_type"=>$row['body_type'],
				"education"=>$row['education'],
				"kids"=>$row['kids']);
		}
		return $response;
	}	

	function SaveMyMatchInfo($user_id, $min_age, $max_age, $race, $min_height, $max_height, $body_type, $education, $kids) {
		global $DB;

		$query = sprintf("Update members_mymatch SET min_age = %d, max_age = %d, race = '%s', min_height = '%s', max_height='%s', body_type = '%s', education = '%s', kids = '%s' Where user_id = %d", $min_age, $max_age, $race, $min_height, $max_height, $body_type, $education, $kids, $user_id);
		$DB->Insert($query);

		return "Success";
	}
?>