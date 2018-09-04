<?php 

function ChangeDo($DoCall, $values = false){

global $DB;

	$DoArray = array('new','addquestion','results','settings'); // list of acceptable calls

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
		
         case "new": {
				
				
				if(strlen($values['quizTitle']) > 2){				
				
					## retrieve censor words for filter
					$BadWords = CreateBadWordFilter();			 
		 		
					## edit quiz
					if(!isset($values['eid'])){
					
						 ## add database entry
						 $DB->Insert("INSERT INTO `quiz` (`uid` , `title` , `description` , `date`, hits, icon )
						 VALUES ('".$_SESSION['uid']."', '".eMeetingInput(filter_str($values['quizTitle'],$BadWords,$bw))."', '".eMeetingInput(filter_str($values['description'],$BadWords,$bw))."', '".DATE_NOW."', 0 , '".$values['QuizIcon']."')");
						 $ThisQuizID = $DB->InsertID();					 
						 
						 $GLOBALS['newQuizId'] = $ThisQuizID;					 
						 return $GLOBALS['_LANG_ERROR']['_complete']."**1**done";
					 
					 }else{
					 
					 	$DB->Update("UPDATE quiz SET icon = '".$values['QuizIcon']."', `title` = '".eMeetingInput(filter_str($values['quizTitle'],$BadWords,$bw))."', description='".CheckAddSlashes(strip_tags(filter_str($values['description'],$BadWords,$bw)))."' WHERE id ='".$values['eid']."' AND uid='".$_SESSION['uid']."' LIMIT 1");
						
						return $GLOBALS['_LANG_ERROR']['_complete']."**1";
					 }
					 
				 }else{
				 	
					 return $GLOBALS['LANG_MATCH'][4];
					
				 }		 
				 	 
		 	
		 }break;
		 
		 case "addquestion": {
		 
		 		if(!isset($values['qqeid'])){		
		
		 			$DB->Insert("INSERT INTO quiz_questions (`uid` ,`parent_id` ,`question_title` ,`q1` ,`q2` ,`q3` ,`q4` ,`q5` ,`answer`)VALUES ('".$_SESSION['uid']."', '".strip_tags($values['quizid'])."', '".strip_tags($values['quizQuestion'])."', '".strip_tags($values['q1'])."', '".strip_tags($values['q2'])."', '".strip_tags($values['q3'])."', '".strip_tags($values['q4'])."', '".strip_tags($values['q5'])."', '".$values['quizCorrect']."')");
					$ThisQuestionID = $DB->InsertID();
 
				}else{

					$SQL = "UPDATE quiz_questions SET `question_title` = '".strip_tags($values['quizQuestion'])."', `q1` = '".strip_tags($values['q1'])."',`q2` = '".strip_tags($values['q2'])."',`q3` = '".strip_tags($values['q3'])."',`q4` = '".strip_tags($values['q4'])."',`q5` = '0',`answer` = '".strip_tags($values['quizCorrect'])."' WHERE id ='".$values['qqeid']."' LIMIT 1";
					$DB->Update($SQL);
					$ThisQuestionID = $values['qqeid'];
				}
			$GLOBALS['QuizID'] =$values['quizid'];
			$GLOBALS['QuestionID'] = $ThisQuestionID;
 
			return $GLOBALS['_LANG_ERROR']['_complete']; 
	
		 }break;
		 
 
		} 
			
	}
	
	return "error_invalid_call";	
}

?>