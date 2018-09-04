<?

// EMEETING EMAIL CRONJOB
// REQUIRES A KEY FOR AUTH

if(isset($_GET['key']) ){

	include("../config.php");

		## GET EMAIL DATA
		$Data = $DB->Row("SELECT * FROM email_scheduler WHERE send_key= ( '".eMeetingInput($_GET['key'])."') LIMIT 1");
 
		if(!empty($Data)){

		$Extra=""; $i=1;
		// FIX DATA INTO ORDER
		// send_name 	send_gender 	send_account 	send_membership 	send_country
		
		if($Data['send_gender'] != 0){ $Extra .= " AND members_data.gender='".$Data['send_gender']."' "; }
		if($Data['send_account'] != "none"){ $Extra .= " AND members.active='".$Data['send_account']."' "; }
		if($Data['send_membership'] != 0){ $Extra .= " AND members.packageid='".$Data['send_membership']."' "; }
		if($Data['send_country'] != 0){ $Extra .= " AND members_data.country='".$Data['send_country']."' "; }
		//if($Data['send_photo'] == 1){ $Extra .= " AND files.default =1 "; }
		//if($Data['send_photo'] == 1){ $Extra .= " AND files.default =1 "; }

			$SQL = "SELECT members.email, members.username, members_data.* FROM members 
			INNER JOIN members_data ON (members.id = members_data.uid) 
			LEFT JOIN files ON (members.id = files.uid )
			WHERE members.email !='' ".$Extra." GROUP BY members.id ORDER BY members.id DESC";
		 
			$result = $DB->Query($SQL);
			while( $Data = $DB->NextRow($result) ){
	
			//SendTemplateMail($Data, $Data['send_nid']);
			$i++;
	
			}

			// SEND ADMIN EMAIL TO SAY ITS FINISHED
			SendMail(ADMIN_EMAIL, "Email CronJob Finished", "Your email cronjob (".$Data['send_name'].") has finished sending to ".$i." members.");

		}





}

?>