<?php 
 
// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function DisplayMatchTests($id,$ThisOrder,$start,$stop){

	global $DB;
	
	$Counter =1;
	$DataArray = array();

    $result = $DB->Query("SELECT id,  title, description, date , hits, icon FROM `quiz` WHERE uid= ( '".$id."' ) ORDER BY ".$ThisOrder." DESC LIMIT $start,$stop");
	$totalMsg = $DB->Row("SELECT count(id) AS total FROM `quiz` WHERE uid= ( '".$id."' ) ORDER BY date DESC");
    while( $quiz = $DB->NextRow($result) )
    {
		$que = $DB->Row("SELECT count(id) AS total FROM quiz_questions WHERE parent_id= ( '".$quiz['id']."' ) LIMIT 1");
		$rec = $DB->Row("SELECT count(uid) AS total FROM quiz_results WHERE quiz_id= ( '".$quiz['id']."' ) LIMIT 1");
		
		$DataArray[$Counter]['total_questions'] =  $que['total'];
		$DataArray[$Counter]['total_results'] =  $rec['total'];
		$DataArray[$Counter]['icon'] = $quiz['icon'];
		$DataArray[$Counter]['title'] = eMeetingOutput($quiz['title']);
		$DataArray[$Counter]['id'] = $quiz['id'];
		$DataArray[$Counter]['description'] = eMeetingOutput($quiz['description']);
		$DataArray[$Counter]['date'] = dates_interconv($quiz['date']);
		$DataArray[$Counter]['totalMsg'] = $totalMsg['total'];				
		
		$Counter++;
	}
	
	return $DataArray;
}
function GetMatchTitle($id){

	global $DB;

    $result = $DB->Row("SELECT title FROM `quiz` WHERE  id='".strip_tags(trim($id))."' LIMIT 1");
	
	return $result['title'];

}
function GetMatchDetails($id, $uid){

	global $DB;

    $result = $DB->Row("SELECT * FROM `quiz` WHERE uid='".$uid."' AND id='".strip_tags(trim($id))."' LIMIT 1");
	
	return $result;

}
function GetQuestion($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM `quiz_questions` WHERE id= ( '".$id."' ) AND  uid= ( '".$_SESSION['uid']."' ) LIMIT 1");

    return $result;
}

function displayTestQuestions($qid, $uid){

	global $DB;
	$Counter=1;

    $result = $DB->Query("SELECT * FROM `quiz_questions` WHERE parent_id='".$qid."' AND uid='".$uid."' ORDER BY orderid ASC");

    while( $quiz = $DB->NextRow($result) )
    {
	
			print '<br><table width="100%" height="137" border=0 align="center" cellpadding=0 cellspacing=0>
			  <tr> 
				<td height="23" align="center" ><strong>'.$Counter.'.</strong></td>
				<td width="473" height="23" colspan="2" ><strong>'.$quiz['question_title'].'</strong></td>
			  </tr>
			  <tr> 
				<td width="43" align="center"> <input name="qqid'.$quiz['id'].'" type=radio value=1 checked></td>
				<td height="19" colspan="2">'.$quiz['q1'].'</td>
			  </tr>
			  <tr> 
				<td align="center" > <input type=radio name="qqid'.$quiz['id'].'" value=2></td>
				<td height="19" colspan="2">'.$quiz['q2'].'</td>
			  </tr>
			  <tr> 
				<td align="center" > <input type=radio name="qqid'.$quiz['id'].'" value=3></td>
				<td height="19" colspan="2">'.$quiz['q3'].'</td>
			  </tr>
			  <tr> 
				<td align="center" ><input type=radio name="qqid'.$quiz['id'].'" value=4></td>
				<td height="19" colspan="2">'.$quiz['q4'].'</td>
			  </tr>
			  <tr> 
				<td align="center" ><input type=radio name="qqid'.$quiz['id'].'" value=5></td>
				<td height="19" colspan="2">'.$quiz['q5'].'</td>
			  </tr>
			  <tr></tr></table>';
			  
			  $Counter++;
	}
	
	print "<input type='hidden' value='".$Counter."' name='TotalResults' class='hidden'>";
}



function displayQuizResults($qid,$ThisOrder,$Start,$Stop){

	global $DB;
	$Counter =1;
	$DataArray = array(); $MODdata['page'] ='profile'; $MODdata['type'] ='system';

    $query ="SELECT members.username,  files.bigimage,files.type,files.adult_content, files.approved, quiz_results.id, quiz_results.uid, quiz_results.percentage, quiz_results.quiz_id, quiz_results.comments, quiz_results.date 
	FROM `quiz_results` 
	INNER JOIN quiz ON ( quiz.id = quiz_results.quiz_id )
	LEFT JOIN members ON ( members.id = quiz_results.uid )
	LEFT JOIN files ON ( members.id = files.uid AND files.default=1 )
	WHERE quiz_results.quiz_id='".$qid."' AND quiz.uid='".$_SESSION['uid']."' ORDER BY $ThisOrder DESC LIMIT ".$Start.",".$Stop."";

	$result = $DB->Query($query);
    while( $quiz = $DB->NextRow($result) )
    {
		$DataArray[$Counter]['id'] 				= $quiz['id'];				
		$DataArray[$Counter]['quiz_taker'] 		= $quiz['uid'];
		$DataArray[$Counter]['percentage'] 		= $quiz['percentage'];
		$DataArray[$Counter]['quiz_id'] 		= $quiz['quiz_id'];
		$DataArray[$Counter]['comments'] 		= $quiz['comments'];
		$DataArray[$Counter]['date'] 			= dates_interconv($quiz['date']);
		$DataArray[$Counter]['username']		= $quiz['username'];
		$DataArray[$Counter]['image']			= ReturnDeImage($quiz,"medium");

		## Dynamic Link
		$MODdata['id1'] = $quiz['uid'];
		$MODdata['name'] = $quiz['username'];
		$DataArray[$Counter]['user_link'] 		= MakeLinkMOD($MODdata);

		$Counter++;	
	}
	
	return $DataArray;
}

function displayQuizTaken($ThisOrder,$Start,$Stop){

	global $DB;
	$Counter =1;
	$DataArray = array();

    $result = $DB->Query("SELECT files.bigimage,files.type,files.adult_content, files.approved, members.username, quiz.uid AS quizuid, quiz_results.id, quiz_results.uid, quiz_results.percentage, quiz.title, quiz_results.quiz_id, quiz_results.comments, quiz_results.date 
	FROM `quiz_results`, quiz 
	LEFT JOIN members ON ( members.id = quiz.uid )
	LEFT JOIN files ON ( quiz.uid = files.uid AND files.default=1 )
	WHERE quiz.id = quiz_results.quiz_id AND quiz_results.uid='".$_SESSION['uid']."' ORDER BY quiz_results.id DESC LIMIT $Start,$Stop");

	$totalMsg = $DB->Row("SELECT count(id) AS total FROM quiz_results WHERE quiz_results.uid='".$_SESSION['uid']."'");

    while( $quiz = $DB->NextRow($result) )
    {
		$DataArray[$Counter]['id'] 					= $quiz['id'];				
		$DataArray[$Counter]['quiz_taker'] 			= $quiz['uid'];
		$DataArray[$Counter]['percentage'] 			= $quiz['percentage'];
		$DataArray[$Counter]['quiz_id'] 			= $quiz['quiz_id'];
		$DataArray[$Counter]['comments'] 			= $quiz['comments'];
		$DataArray[$Counter]['date'] 				= dates_interconv($quiz['date']);
		$DataArray[$Counter]['username']			= $quiz['username'];
		$DataArray[$Counter]['title']				= $quiz['title'];
		$DataArray[$Counter]['quizuid']				= $quiz['quizuid'];
		$DataArray[$Counter]['totalMsg'] 			= $totalMsg['total'];

		$DataArray[$Counter]['image']				= ReturnDeImage($quiz,"medium");

		## Dynamic Link
		$MODdata['id1'] 							= $quiz['uid'];
		$MODdata['name'] 							= $quiz['username'];
		$DataArray[$Counter]['user_link'] 			= MakeLinkMOD($MODdata);

		$Counter++;	
	}
	
	return $DataArray;
}
?>