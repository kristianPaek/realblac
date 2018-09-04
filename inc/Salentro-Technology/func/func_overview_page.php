<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function GetAccountCountSettings($id){

	global $DB;

	$i=1; $DataArray=array();
	
	$SQL = "select row_num from 
		(
			select count(groups.id) AS row_num from groups WHERE groups.uid ='".$id."'
	 
			union all
	
			select count(calendar_data.id) as row_num from calendar_data WHERE calendar_data.uid ='".$id."'
	
			union all
	
			select count(class_adverts.id) as row_num from class_adverts WHERE class_adverts.uid ='".$id."'
	
			union all
	
			select count(blog_posts.id) as row_num from blog_posts WHERE blog_posts.uid ='".$id."'

			union all
	
			SELECT count(mailnum) AS row_num FROM messages WHERE mail2id='".$id."' AND to_box='inbox' AND mailstatus='unread' AND type='type'

			union all
	
			SELECT count(uid) AS row_num FROM members_network WHERE to_uid='".$id."'  AND (type=2 OR type=4) AND approved !='yes'

			union all
	
			SELECT count(id) AS row_num FROM comments WHERE to_uid='".$id."' AND from_uid !='".$id."'

		) as derived_table";
 
	/*
	
	DATA ARRAY
	1. groups
	2. events
	3. classified
	4. blog
	5. messages
	6. friends
	7. comments
	
	*/
	$result = $DB->Query($SQL);
	while( $Data = $DB->NextRow($result) ){	

		$DataArray[$i]['total'] = $Data['row_num'];
		$i++;
	}

	return $DataArray;

};



function html2txt($html){

	$html = str_replace('<html>','',$html);
	$html = str_replace('</html>','',$html);
	$html = str_replace('<head>','',$html);
	$html = str_replace('</head>','',$html);
	$html = str_replace('<body style="visibility: visible;">','',$html);
	$html = str_replace('<body>','',$html);
	$html = str_replace('</body>','',$html);
	$html = str_replace('<body style=','',$html);

	return $html;

}



function AccPoll($id=0) {
		
		global $DB;
		$RunningCount =1;
		$PollDataArray = array();
		
		
		$p = $DB->Row("SELECT pollid FROM poll_desc WHERE STATUS = 'active' ORDER BY RAND() LIMIT 1"); // active poll
		
		if(empty($p)){ return; }
		
		//////////////////////////////////////
		/// CHECK THE USER HASNT ALREADY VOTED
		//////////////////////////////////////
		$foundpoll = $DB->Row("SELECT count(poll_check.pollid) AS found FROM poll_data, poll_check WHERE poll_check.pollid = poll_data.pollid AND poll_check.uid= ( '".$id."' ) AND poll_check.pollid=".$p['pollid']);		
		if($foundpoll['found'] ==0){
			//////////////////////////////////////
			/// DISPLAY POLL QUESTIONS
			//////////////////////////////////////
					
				$result = $DB->Query("SELECT poll_desc.polltitle, poll_data.pollid, poll_data.polltext, poll_data.voteid FROM poll_data, poll_desc 
				WHERE poll_data.pollid = poll_desc.pollid  AND poll_data.pollid= ( '".$p['pollid']."' ) 
				AND poll_desc.STATUS='active' 
				AND poll_data.polltext != ''");
				 while( $poll = $DB->NextRow($result) )
				{				

						$PollDataArray[$RunningCount]['title'] 		= 	$poll['polltitle'];
						$PollDataArray[$RunningCount]['voteid'] 	= 	$poll['voteid'];
						$PollDataArray[$RunningCount]['id'] 		= 	$poll['pollid'];
						$PollDataArray[$RunningCount]['caption'] 	= 	$poll['polltext'];
						$RunningCount++;
				}
				
				return $PollDataArray;
							
		}else{
			//////////////////////////////////////
			/// DISPLAY POLL RESULTS
			//////////////////////////////////////	
					
			$id= $p['pollid'];
			$pollvote = $DB->Row("SELECT SUM(votecount) AS votecount FROM poll_data WHERE pollid = '$id'");
			$result = $DB->Query("SELECT poll_data.polltext, poll_data.votecount, poll_desc.polltitle FROM poll_data 
			INNER JOIN poll_desc ON ( poll_desc.pollid = poll_data.pollid)
			WHERE poll_data.pollid = '$id' AND poll_data.polltext <> ''			
			ORDER BY poll_data.votecount DESC");
		
			 while( $poll = $DB->NextRow($result) )
			{
			
				if ($poll['votecount'] == 0) {	$tmp_votecount = 1;	}else {$tmp_votecount = $pollvote['votecount']; }		
				$vote_percents = number_format(($poll['votecount'] / $tmp_votecount * 100), 2);
				
				$PollDataArray[$RunningCount]['votes'] 			= 	$tmp_votecount;
				$PollDataArray[$RunningCount]['votes_percent'] 	= 	$vote_percents;
				$PollDataArray[$RunningCount]['votes_total'] 	= 	$poll['votecount'];
				$PollDataArray[$RunningCount]['caption'] 		= 	$poll['polltext'];
				$PollDataArray[$RunningCount]['title'] 			= 	$poll['polltitle'];
				$RunningCount++;
			}
			
			return $PollDataArray;		
	}		
}
?>