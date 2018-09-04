<?php
session_start();

function checkUserLogin($username, $password){

$CheckPassword = "SELECT * FROM `members` WHERE username='".$username."'";
$ShowPassword = mysql_fetch_assoc( mysql_query($CheckPassword) );
$CheckLength= strlen($ShowPassword['password']);

	global $DB;
    $username = trim(strip_tags($username));
    $password = trim(strip_tags($password));
	
    $sql = "SELECT members.activate_code, members.active,members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid,members.email,members.verify_status,members.firstname,members.phone, members.lastlogin, members_privacy.Language,members.hits, members.visible FROM members
				INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
				LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid )
				LEFT JOIN members_data ON ( members.id = members_data.uid )
				LEFT JOIN package ON ( members.packageid = package.pid )
		  		WHERE ( members.username = '".$username."' OR members.email='".$username."' ) ";
    if((D_MD5 ==1) && ($CheckLength !==32)){
		define('OW_PASSWORD_SALT', '4f94930cd4ff3');
        $myhash = hash('sha256', OW_PASSWORD_SALT . $password);
        $sql .="AND members.password = '".$myhash."' LIMIT 1";

    }
	elseif((D_MD5 ==1) && ($CheckLength == 32)){
		$myhash = md5($password);
        $sql .="AND members.password = '".$myhash."' LIMIT 1";

    }
	
	else{
        $sql .="AND members.password = '".$password."' LIMIT 1";
    }

    $result = $DB->Row($sql);
    
define('OW_PASSWORD_SALT', '4f94930cd4ff3');
	 $verify_status = hash('sha256', OW_PASSWORD_SALT . $password);
$verify = "SELECT * FROM `members` WHERE username='".$username."' AND password='".$myhash."'";
$verify11 = mysql_fetch_assoc( mysql_query($verify) );
	
    if ( is_array($result) ) {

        if($result['active'] =="suspended"){

            return array("message" => "FAIL", "method" => "LOGIN", "status"=> "suspended");


        }elseif($result['activate_code'] != "OK" && VALIDATE_EMAIL ==1){

            CheckUpgradeNew($result['id'], $result['packageid']);
            $users_date = setSessionNew($result, 1);
            return array("message" => "SUCCESS","verify_status"=>$result['verify_status'],"user_id"=>$result['id'],"overviewData" => $users_date, "overviewData" => $users_date, "method" => "LOGIN", "status"=> "SUCCESS");

        }elseif($result['active'] =="unapproved" && $result['activate_code'] = "OK"){
            $result['active'] = $result['active'];
            CheckUpgradeNew($result['id'], $result['packageid']);
            $users_date = setSessionNew($result, 1);
            return array("message" => "SUCCESS","status"=> "unapproved","verify_status"=>$result['verify_status'],"user_id"=>$result['id'],"overviewData" => $users_date, "method" => "LOGIN");

        }else{

            CheckUpgradeNew($result['id'], $result['packageid']);
            $users_date = setSessionNew($result, 1);
            return array("message" => "SUCCESS","status"=> "SUCCESS","verify_status"=>$result['verify_status'],"user_id"=>$result['id'], "overviewData" => $users_date, "method" => "LOGIN");
        }

    } else {
        return array("message" => "FAIL", "method" => "LOGIN", "status"=> "Incorrect login information.");
    }
}

function setSessionNew($values, $init = true) {
	
    /*
        THIS FUNCTION SETS THE MEMBERS SESSIONS
        ALSO THE MEMBERS IP IS LOGGED WITH DATE AND TIME
    */
    global $DB;
    $_SESSION['uid'] 			= $values['id'];
    $_SESSION['username'] 		= eMeetingOutput($values['username']);
    $_SESSION['auth'] 			= "yes";
    $_SESSION['packageid'] 		= $values['packageid'];
    $_SESSION['lastlogin'] 		= $values['lastlogin'];
    $_SESSION['lang'] 			= $values['Language'];
    $_SESSION['hits'] 			= $values['hits'];
    $_SESSION['remember']		= "no";
    $_SESSION['site_moderator'] 	= $values['moderator'];
    if($values['moderator'] =="yes"){
        ## ADD EXTRA SESSIONS FOR ADMIN MODERATOR
        $data = $DB->Row("SELECT liveEmail, liveEdit, liveDelete FROM members_admin WHERE username='".eMeetingOutput($values['username'])."' LIMIT 1");
        $_SESSION['site_moderator_approve'] = $data['liveEmail'];
        $_SESSION['site_moderator_edit'] 	= $data['liveEdit'];
        $_SESSION['site_moderator_delete'] 	= $data['liveDelete'];
    }
    // MEMBER ACCOUNT PACKAGE DATA
    $_SESSION['pack_adult'] 			= $values['view_adult'];
    $_SESSION['pack_name'] 			= $values['name'];
    $_SESSION['pack_winks'] 			= $values['wink'];
    $_SESSION['pack_highlight'] 		= $values['Highlighted'];
    $_SESSION['pack_messages'] 		= $values['maxMessage'];
    $_SESSION['pack_files'] 			= $values['maxFiles'];
    $_SESSION['pack_featured'] 		= $values['Featured'];
    $_SESSION['genderid'] 			= $values['genderD'];
    $_SESSION['visible']            = $values['visible'];

    if ($init) {
        $session = session_id();
        $_SESSION['sessionid'] = $session;
        if($values['id'] !=0){
            $currentDate = DATE_TIME;
            $sql = "UPDATE members SET session = '$session', ip = '".$_SERVER['REMOTE_ADDR']."' , lastlogin='$currentDate' WHERE id = ( '".$values['id']."' ) LIMIT 1";
            $DB->Update($sql);

            //-- Set online user
            $DB->Update("UPDATE members_online SET timestamp= ('".time()."'), 	ip= ('".$_SERVER['REMOTE_ADDR']."'), 	page= ('mobile') WHERE logid = ( '".$values['id']."' ) LIMIT 1");
            if ($DB->Affected() == 0)
            {
                $DB->Insert("INSERT INTO members_online values('".time()."','".$_SERVER['REMOTE_ADDR']."','mobile', '".$values['id']."')");
            }
        }
    }

//    setcookie("PHPSESSID", session_id(), time()+1, "/", DB_DOMAIN);

    $emails_result = $DB->Row("SELECT COUNT( mailstatus ) AS totalCount FROM messages WHERE mail2id = '".$values['id']."' AND mailstatus = 'unread' AND to_box =  'inbox'");
   // $result1 = $DB->Row("SELECT * FROM files WHERE uid='".$values['id']."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");
	
    $result1 =("SELECT * FROM files WHERE uid='".$values['id']."' AND adult_content !='yes' AND type='photo' and approved ='yes' AND featured='yes' ORDER BY `default` DESC LIMIT 1");	
	$result12 = mysql_fetch_assoc( mysql_query($result1) );

    $adult_result = $DB->Row("select view_adult from package where pid ='". $values['packageid']."'");
    $album = $DB->Query("select * from album where uid = ".$values['id']);
    $albums = array();
    while( $Data = $DB->NextRow($album) ){
        $albums[] = array(
            "album_id"=>$Data['aid'],
            "photo_count"=>$Data['filecount'],
            "title"      => $Data['title']
        );
    }
	$userid =$values['id'];
	 $checkBlock = "SELECT if(to_uid = '".$userid."', uid, to_uid) as mk FROM members_network WHERE (uid='".$userid."' OR to_uid = '".$userid."') AND approved ='yes'";

	$queryyy = mysql_query($checkBlock);
	
 $UserData1=array();
	while($row = mysql_fetch_array($queryyy)) {
        $UserData1[] = $row['mk'];
    }
	
$UserDataM	= implode("','", $UserData1);
	$CheckGender = "SELECT * FROM `members_data` WHERE uid='".$userid."'";
    $CheckGenderData = mysql_fetch_assoc( mysql_query($CheckGender) );
	if($CheckGenderData['em_m5z20131006'] == "5777")
	{
	$Gender = "63";
	}
	else{
	$Gender = "64";
	}
	
$State = $CheckGenderData['em_85820081128'];
$mainGender= $values['genderD'];
$MyAge = $CheckGenderData['age'];
$startdate=$MyAge-10;
$enddate=$MyAge+10;
	
	if(($values['packageid'] == "68") || ($values['packageid'] == "70"))
	{
		
    $newes_members = $DB->Query("SELECT members.id as user_id,members.username,members.firstname,members.phone,members_data.uid,members_data.age,members_data.em_m5z20131006,members_data.em_85820081128,members_data.gender,members.active,members.packageid,files.aid,files.bigimage,files.approved,files.default FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE members.active ='active' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.em_85820081128 ='".$State."' AND members_data.age <='".$enddate."' AND  members_data.age >='".$startdate."' AND members.id NOT IN('".$UserDataM."') ORDER BY members.id DESC LIMIT 50");
	}
	else{
		
		$newes_members = $DB->Query("SELECT members.id as user_id,members.username,members.firstname,members.phone,members_data.uid,members_data.age,members_data.em_m5z20131006,members_data.em_85820081128,members_data.gender,members.active,members.packageid,files.aid,files.bigimage,files.approved,files.default FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE members.active ='active' AND members.packageid !='70' AND members.packageid !='68' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.em_85820081128 ='".$State."' AND members_data.age <='".$enddate."' AND members.id NOT IN('".$UserDataM."') AND  members_data.age >='".$startdate."' ORDER BY members.id DESC LIMIT 50");
	}	
    $newes_member = array();
    while ($Data1 = $DB->NextRow($newes_members)) {
		
	
			if(($Data1['em_m5z20131006'] == "5776") && ($Data1['gender'] =="63") && ($mainGender == "64") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								 "approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
		
			if(($Data1['em_m5z20131006'] == "5777") && ($Data1['gender'] =="64") && ($mainGender == "63") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								 "approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
		
				if(($Data1['em_m5z20131006'] == "5777") && ($Data1['gender'] =="63") && ($mainGender == "63") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								 "approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
					if(($Data1['em_m5z20131006'] == "5776") && ($Data1['gender'] =="64") && ($mainGender == "64") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								 "approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
		
    }
 
		if(($values['packageid'] == "68") || ($values['packageid'] == "70"))
	{
		
      $popular_membersCount = $DB->Query("SELECT  members.id,members.username,members.packageid,members.firstname,members.popular,members.active,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,files.bigimage,files.uid FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE  members.id !='".$userid."' AND members.popular='yes' AND files.default='1' AND members.id NOT IN('".$UserDataM."') ORDER BY members_data.em_m5z20131006 ASC LIMIT 50");
		
		if(mysql_num_rows($popular_membersCount)>0)
		{
			$limit  = 50;
			$numRows = mysql_num_rows($popular_membersCount);
			$limit = $limit - mysql_num_rows($popular_membersCount);
			
			
		$popular_members1 = $DB->Query("(SELECT  DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid F FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid LEFT JOIN winkmessagessend ON winkmessagessend.wink_to= members.id WHERE  members.id !='".$userid."'  AND members_data.gender ='".$Gender."' AND members.popular='yes' AND files.default='1' AND members.id NOT IN('".$UserDataM."') group by members.username ORDER BY members_data.em_m5z20131006 ASC LIMIT $numRows) UNION (SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.age <='".$enddate."' AND  members_data.age >='1981' AND members.id NOT IN('".$UserDataM."') group by members.username LIMIT $limit)");
			
		}
		else{
			$popular_members1 = $DB->Query("SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.age <='".$enddate."' AND  members_data.age >='".$startdate."' AND members.id NOT IN('".$UserDataM."') GROUP BY winkmessagessend.wink_to ORDER BY winkmessagessend.wsid DESC LIMIT 50");
		  }
	}
	else{
		
		 $popular_membersCount = $DB->Query("SELECT  members.id,members.username,members.packageid,members.firstname,members.popular,members.active,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,files.bigimage,files.uid FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE  members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members.packageid !='70' AND members.packageid !='68' AND members.popular='yes' AND files.default='1' AND members.id NOT IN('".$UserDataM."') ORDER BY members_data.em_m5z20131006 ASC LIMIT 50");
		
		if(mysql_num_rows($popular_membersCount)>0)
		{
			$limit  = 50;
			$numRows = mysql_num_rows($popular_membersCount);
			$limit = $limit - mysql_num_rows($popular_membersCount);
			
			
		 $popular_members1 = $DB->Query("(SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid F FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid LEFT JOIN winkmessagessend ON winkmessagessend.wink_to= members.id WHERE  members.id !='".$userid."' AND members.packageid !='70' AND members_data.gender ='".$Gender."' AND members.packageid !='68' AND members.popular='yes' AND files.default='1' AND members.id NOT IN('".$UserDataM."') group by members.username ORDER BY members_data.em_m5z20131006 ASC LIMIT $numRows) UNION (SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND members.packageid !='70' AND members.packageid !='68' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.age <='".$enddate."' AND  members_data.age >='1981' AND members.id NOT IN('".$UserDataM."') group by members.username LIMIT $limit)");
			
		}
		else{
			$popular_members1 = $DB->Query("SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE (winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND members.packageid !='70' AND members.packageid !='68' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.age <='".$enddate."' AND  members_data.age >='".$startdate."' AND members.id NOT IN('".$UserDataM."')) OR (members.popular ='yes' AND members.packageid !='70' AND members.packageid !='68' AND members.id NOT IN('".$UserDataM."')) GROUP BY winkmessagessend.wink_to ORDER BY winkmessagessend.wsid DESC LIMIT 50");
		  }
	 	}
		
		$popular1 = array();
		while ($Pmebers = $DB->NextRow($popular_members1)) 
		{
			if(($Pmebers['em_m5z20131006'] == "5776") && ($Pmebers['gender'] =="63") && ($mainGender == "64") )
			{
				$date = $Pmebers['age'];
				$timestamp = strtotime($date); 	
				$new_date = date('Y-m-d', $timestamp);	
				//Create a DateTime object using the user's date of birth.
				$dob = new DateTime($new_date);
				//We need to compare the user's date of birth with today's date.
				$now = new DateTime();
				//Calculate the time difference between the two dates.
				$difference = $now->diff($dob);
				//Get the difference in years, as we are looking for the user's age.
				$TotalAge = $difference->y;	
				$popular1[] = array(
								"username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
								"age"=>$TotalAge,
					            "approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
							   );
			}
			if(($Pmebers['em_m5z20131006'] == "5777") && ($Pmebers['gender'] =="64") && ($mainGender == "63") )
			{
				$date = $Pmebers['age'];
				$timestamp = strtotime($date); 	
				$new_date = date('Y-m-d', $timestamp);	
				//Create a DateTime object using the user's date of birth.
				$dob = new DateTime($new_date);
				//We need to compare the user's date of birth with today's date.
				$now = new DateTime();
				//Calculate the time difference between the two dates.
				$difference = $now->diff($dob);
				//Get the difference in years, as we are looking for the user's age.
				$TotalAge = $difference->y;	
				$popular1[] = array(
								"username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
								"age"=>$TotalAge,
				             	 "approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
								);
			}
			if(($Pmebers['em_m5z20131006'] == "5777") && ($Pmebers['gender'] =="63") && ($mainGender == "63") )
			{
				$date = $Pmebers['age'];
				$timestamp = strtotime($date); 	
				$new_date = date('Y-m-d', $timestamp);	
				//Create a DateTime object using the user's date of birth.
				$dob = new DateTime($new_date);
				//We need to compare the user's date of birth with today's date.
				$now = new DateTime();
				//Calculate the time difference between the two dates.
				$difference = $now->diff($dob);
				//Get the difference in years, as we are looking for the user's age.
				$TotalAge = $difference->y;	
				$popular1[] = array("username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
							     "age"=>$TotalAge,
								 "approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
							   );
			}
			if(($Pmebers['em_m5z20131006'] == "5776") && ($Pmebers['gender'] =="64") && ($mainGender == "64") )
			{
			  	$date = $Pmebers['age'];
				$timestamp = strtotime($date); 	
				$new_date = date('Y-m-d', $timestamp);	
				//Create a DateTime object using the user's date of birth.
				$dob = new DateTime($new_date);
				//We need to compare the user's date of birth with today's date.
				$now = new DateTime();
				//Calculate the time difference between the two dates.
				$difference = $now->diff($dob);
				//Get the difference in years, as we are looking for the user's age.
				$TotalAge = $difference->y;	
				$popular1[] = array("username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
							     "age"=>$TotalAge,
								"approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
							   );
			}
		}
	
    $notifications = $DB->Query("select content from notification_board");
    $notification = array();
    while ($Data = $DB->NextRow($notifications)) {
        $notification[] = array("content"=>$Data['content']);
    }

if(!empty($result12['bigimage']))
{
	$ProfilePic = WEB_PATH_IMAGE.$result12['bigimage'];
}
else{
	$ProfilePic = WEB_PATH_IMAGE."waiting.jpg";
}
    $overviewData = array(
        "sessionID"             => $_SESSION['sessionid'],
        "user_id"               => $values['id'],
        "user_name"             => eMeetingOutput($values['username']),
        "email"                 => $values['email'],
        "verify_status"         => $values['verify_status'],
        "firstname"             => !empty($values['firstname'])? $values['firstname'] : "" ,
        "phone"                 => !empty($values['phone'])? $values['phone'] : "" ,
        "auth"                  => $_SESSION['auth'],
        "image"                 => $ProfilePic,
        //"image"                 => ReturnDeImageNew($result1,"medium",$_SESSION['uid'],$adult_result['view_adult']),
        "packageid"             => $_SESSION['packageid'],
        "last_login"            => $_SESSION['lastlogin'],
        "lang"                  => $_SESSION['lang'],
        "total_profile_views"   => $values['hits'],
        "remember"              => $_SESSION['remember'],
        "pack_adult"            => $_SESSION['pack_adult'],
        "pack_name"             => $_SESSION['pack_name'],
        "pack_wink"             => $_SESSION['pack_winks'],
        "pack_highlight"        => $_SESSION['pack_highlight'],
        "pack_message"          => $_SESSION['pack_messages'],
        "pack_files"            => $_SESSION['pack_files'],
        "pack_feature"          => $_SESSION['pack_featured'],
        "gender_id"             => $_SESSION['genderid'],
        "active_status"         => $values['active'],
        "total_new_emails"      => $emails_result['totalCount'],
        "total_new_winks"       => getWinkCount($_SESSION['uid']),
        "visible"               => $_SESSION['visible'],
        "albums"                => $albums,
        "notification"          => $notification,
		"newes_member"          => $newes_member,
		"popular_member"          => $popular1
    );
    return $overviewData;
}

function getLoggedInUserDetails($userid){

    global $DB;

    $userid = trim(strip_tags($userid));

    $sql = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username,members.firstname,members.phone,members.hits, members.packageid,members.session,members.email , members.lastlogin, members_privacy.Language, members.visible FROM members
				INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
				LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid )
				LEFT JOIN members_data ON ( members.id = members_data.uid )
				LEFT JOIN package ON ( members.packageid = package.pid )
		  		WHERE ( members.id = '".$userid."') ";

    $values = $DB->Row($sql);

    $emails_result = $DB->Row("SELECT COUNT( mailstatus ) AS totalCount FROM messages WHERE mail2id = '".$values['id']."' AND mailstatus = 'unread' AND to_box =  'inbox'");

    //$result1 = $DB->Row("SELECT * FROM files WHERE uid='".$values['id']."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");
$result1 =("SELECT * FROM files WHERE uid='".$values['id']."' AND type='photo' and approved ='yes' and adult_content !='yes' AND featured='yes' ORDER BY `default` DESC LIMIT 1");	
	$result12 = mysql_fetch_assoc( mysql_query($result1) );
    $adult_result = $DB->Row("select view_adult from package where pid ='". $values['packageid']."'");
    $album = $DB->Query("select * from album where uid = ".$values['id']);
    $albums = array();
    while( $Data = $DB->NextRow($album) ){
        $albums[] = array(
            "album_id"=>$Data['aid'],
            "photo_count"=>$Data['filecount'],
            "title"      => $Data['title']
        );
    }

	$userid =$values['id'];

	 $checkBlock = "SELECT if(to_uid = '".$userid."', uid, to_uid) as mk FROM members_network WHERE (uid='".$userid."' OR to_uid = '".$userid."') AND approved ='yes'";

	$queryyy = mysql_query($checkBlock);
	
 $UserData1=array();
	while($row = mysql_fetch_array($queryyy)) {
        $UserData1[] = $row['mk'];
    }
	
$UserDataM	= implode("','", $UserData1);
	
	$CheckGender = "SELECT * FROM `members_data` WHERE uid='".$userid."'";
    $CheckGenderData = mysql_fetch_assoc( mysql_query($CheckGender) );
	if($CheckGenderData['em_m5z20131006'] == "5777")
	{
	$Gender = "63";
	}
	else{
	$Gender = "64";
	}
	
$State = $CheckGenderData['em_85820081128'];
$mainGender= $values['genderD'];	
$MyAge = $CheckGenderData['age'];
$startdate=$MyAge-10;
$enddate=$MyAge+10;
	
	
	if(($values['packageid'] == "68") || ($values['packageid'] == "70"))
	{

      $newes_members = $DB->Query("SELECT members.id as user_id,members.username,members.firstname,members.phone,members.packageid,members_data.uid,members_data.age,members_data.em_85820081128,members_data.gender,members_data.em_m5z20131006,members.active,files.aid,files.bigimage,files.approved,files.default FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE members.active ='active' AND files.default='1' AND members.id !='".$userid."' AND  members_data.gender ='".$Gender."' AND members_data.em_85820081128 ='".$State."' AND members_data.age <='".$enddate."' AND  members_data.age >='".$startdate."' AND members.id NOT IN('".$UserDataM."') ORDER BY members.id DESC LIMIT 50");
	}else{
		
		$newes_members = $DB->Query("SELECT members.id as user_id,members.username,members.firstname,members.phone,members.packageid,members_data.uid,members_data.age,members_data.em_85820081128,members_data.gender,members_data.em_m5z20131006,members.active,files.aid,files.bigimage,files.approved,files.default FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE members.active ='active' AND files.default='1' AND members.id !='".$userid."' AND members.packageid !='70' AND members.packageid !='68' AND members_data.gender ='".$Gender."' AND members_data.em_85820081128 ='".$State."' AND members_data.age <='".$enddate."' AND members.id NOT IN('".$UserDataM."') AND  members_data.age >='".$startdate."' ORDER BY members.id DESC LIMIT 50");
	}
	
	
    $newes_member = array();
	 
	
    while ($Data1 = $DB->NextRow($newes_members)) {
		
	
			if(($Data1['em_m5z20131006'] == "5776") && ($Data1['gender'] =="63") && ($mainGender == "64") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								"approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
		
			if(($Data1['em_m5z20131006'] == "5777") && ($Data1['gender'] =="64") && ($mainGender == "63") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								"approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
		
				if(($Data1['em_m5z20131006'] == "5777") && ($Data1['gender'] =="63") && ($mainGender == "63") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								"approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
					if(($Data1['em_m5z20131006'] == "5776") && ($Data1['gender'] =="64") && ($mainGender == "64") )
		 {
$date = $Data1['age'];
$timestamp = strtotime($date); 	
$new_date = date('Y-m-d', $timestamp);	
//Create a DateTime object using the user's date of birth.
$dob = new DateTime($new_date);
//We need to compare the user's date of birth with today's date.
$now = new DateTime();
//Calculate the time difference between the two dates.
$difference = $now->diff($dob);
//Get the difference in years, as we are looking for the user's age.
$TotalAge = $difference->y;	
        $newes_member[] = array("username"=>$Data1['username'],"user_id"=>$Data1['user_id'],
								"firstname"=>!empty($Data1['firstname']) ? $Data1['firstname'] : "",
								"phone"=>!empty($Data1['phone']) ? $Data1['phone'] : "",
								"gender"=>!empty($Data1['gender']) ? $Data1['gender'] : "",
								"em_m5z20131006"=>!empty($Data1['em_m5z20131006']) ? $Data1['em_m5z20131006'] : "",
								"age"=>$TotalAge,
								"approved"=>$Data1['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Data1['bigimage']
							   );
	    }
		
    }
	
		if(($values['packageid'] == "68") || ($values['packageid'] == "70"))
	{
		
      $popular_membersCount = $DB->Query("SELECT  members.id,members.username,members.packageid,members.firstname,members.popular,members.active,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,files.bigimage,files.uid FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE  members.id !='".$userid."'  AND members_data.gender ='".$Gender."' AND members.popular='yes' AND files.default='1'  AND members.id NOT IN('".$UserDataM."') ORDER BY members_data.em_m5z20131006 ASC LIMIT 50");
		
		if(mysql_num_rows($popular_membersCount)>0)
		{
			$limit  = 50;
			$numRows = mysql_num_rows($popular_membersCount);
			$limit = $limit - mysql_num_rows($popular_membersCount);
			
			
		$popular_members1 = $DB->Query("(SELECT  DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid F FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid LEFT JOIN winkmessagessend ON winkmessagessend.wink_to= members.id WHERE  members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members.popular='yes' AND files.default='1'  AND members.id NOT IN('".$UserDataM."') group by members.username  ORDER BY members_data.em_m5z20131006 ASC LIMIT $numRows) UNION (SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.age <='".$enddate."' AND  members_data.age >='1981'  AND members.id NOT IN('".$UserDataM."') group by members.username LIMIT $limit)");
			
		}
		else{
			$popular_members1 = $DB->Query("SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.age <='".$enddate."' AND  members_data.age >='".$startdate."' AND members.id NOT IN('".$UserDataM."') GROUP BY winkmessagessend.wink_to ORDER BY winkmessagessend.wsid DESC LIMIT 50");
		  }
	}
	else{
		
		$popular_membersCount = $DB->Query("SELECT  members.id,members.username,members.packageid,members.firstname,members.popular,members.active,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,files.bigimage,files.uid FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE  members.id !='".$userid."' AND members_data.gender ='".$Gender."'  AND members.packageid !='70' AND members.packageid !='68' AND members.popular='yes' AND files.default='1' AND members.id NOT IN('".$UserDataM."') ORDER BY members_data.em_m5z20131006 ASC LIMIT 50");
		//echo "SELECT members.id,members.username,members.packageid,members.firstname,members.popular,members.active,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,files.bigimage,files.uid FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE  members.id !='".$userid."' AND members_data.gender ='".$Gender."'  AND members.packageid !='70' AND members.packageid !='68' AND members.popular='yes' AND files.default='1' order by members_data.em_m5z20131006 asc LIMIT 50";
		//die;
		
		if(mysql_num_rows($popular_membersCount)>0)
		{
			
			$limit  = 50;
			$numRows = mysql_num_rows($popular_membersCount);
			$limit = $limit - mysql_num_rows($popular_membersCount);
			
			
		 $popular_members1 = $DB->Query("(SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid F FROM `members` LEFT JOIN files ON members.id=files.uid LEFT JOIN members_data ON members.id=members_data.uid LEFT JOIN winkmessagessend ON winkmessagessend.wink_to= members.id WHERE  members.id !='".$userid."' AND members.packageid !='70' AND members_data.gender ='".$Gender."' AND members.packageid !='68' AND members.popular='yes' AND files.default='1' AND members.id NOT IN('".$UserDataM."') group by members.username order by members_data.em_m5z20131006 asc LIMIT $limit) UNION (SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND members.packageid !='70' AND members.packageid !='68' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members.id NOT IN('".$UserDataM."') group by members.username  LIMIT $limit)");
	
		
		}
		else{
			
			$popular_members1 = $DB->Query("SELECT DISTINCT  winkmessagessend.wink_from,winkmessagessend.wink_to,winkmessagessend.onlydate,members.id,members_data.gender,members_data.em_m5z20131006,members_data.em_85820081128,members_data.age,members_data.uid,members.username,members.packageid,members.firstname,members.popular,members.active,files.bigimage,files.approved,files.uid FROM `winkmessagessend` LEFT JOIN members ON winkmessagessend.wink_to= members.id LEFT JOIN files ON winkmessagessend.wink_to=files.uid LEFT JOIN members_data ON members.id=members_data.uid WHERE (winkmessagessend.onlydate >= DATE_SUB(CURDATE(),INTERVAL 14 DAY) AND winkmessagessend.wink_from !='0' AND members.active ='active' AND members.packageid !='70' AND members.packageid !='68' AND files.default='1' AND members.id !='".$userid."' AND members_data.gender ='".$Gender."' AND members_data.age <='".$enddate."' AND  members_data.age >='".$startdate."' AND members.id NOT IN('".$UserDataM."')) OR (members.popular ='yes' AND members.packageid !='70' AND members.packageid !='68' AND members.id NOT IN('".$UserDataM."')) GROUP BY winkmessagessend.wink_to ORDER BY winkmessagessend.wsid DESC LIMIT 50");
		  }
	 	}
	

   $popular1 = array();
    while ($Pmebers = $DB->NextRow($popular_members1)) {
		
		

		if(($Pmebers['em_m5z20131006'] == "5776") && ($Pmebers['gender'] =="63") && ($mainGender == "64") )
		{
			
			$date = $Pmebers['age'];
			$timestamp = strtotime($date); 	
			$new_date = date('Y-m-d', $timestamp);	
			//Create a DateTime object using the user's date of birth.
			$dob = new DateTime($new_date);
			//We need to compare the user's date of birth with today's date.
			$now = new DateTime();
			//Calculate the time difference between the two dates.
			$difference = $now->diff($dob);
			//Get the difference in years, as we are looking for the user's age.
			$TotalAge = $difference->y;	
			$popular1[] = array("username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
							     "age"=>$TotalAge,
								"approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
							   );
		}
		if(($Pmebers['em_m5z20131006'] == "5777") && ($Pmebers['gender'] =="64") && ($mainGender == "63") )
		{
			
		 	$date = $Pmebers['age'];
			$timestamp = strtotime($date); 	
			$new_date = date('Y-m-d', $timestamp);	
			//Create a DateTime object using the user's date of birth.
			$dob = new DateTime($new_date);
			//We need to compare the user's date of birth with today's date.
			$now = new DateTime();
			//Calculate the time difference between the two dates.
			$difference = $now->diff($dob);
			//Get the difference in years, as we are looking for the user's age.
			$TotalAge = $difference->y;	
			$popular1[] = array("username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
							     "age"=>$TotalAge,
								"approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
							   );
		}
		if(($Pmebers['em_m5z20131006'] == "5777") && ($Pmebers['gender'] =="63") && ($mainGender == "63") )
		{
			
		 	$date = $Pmebers['age'];
			$timestamp = strtotime($date); 	
			$new_date = date('Y-m-d', $timestamp);	
			//Create a DateTime object using the user's date of birth.
			$dob = new DateTime($new_date);
			//We need to compare the user's date of birth with today's date.
			$now = new DateTime();
			//Calculate the time difference between the two dates.
			$difference = $now->diff($dob);
			//Get the difference in years, as we are looking for the user's age.
			$TotalAge = $difference->y;	
			$popular1[] = array("username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
							     "age"=>$TotalAge,
								"approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
							   );
		}
		if(($Pmebers['em_m5z20131006'] == "5776") && ($Pmebers['gender'] =="64") && ($mainGender == "64") )
		{
			
			$date = $Pmebers['age'];
			$timestamp = strtotime($date); 	
			$new_date = date('Y-m-d', $timestamp);	
			//Create a DateTime object using the user's date of birth.
			$dob = new DateTime($new_date);
			//We need to compare the user's date of birth with today's date.
			$now = new DateTime();
			//Calculate the time difference between the two dates.
			$difference = $now->diff($dob);
			//Get the difference in years, as we are looking for the user's age.
			$TotalAge = $difference->y;	
			$popular1[] = array("username"=>$Pmebers['username'],"user_id"=>$Pmebers['id'],
								"firstname"=>!empty($Pmebers['firstname']) ? $Pmebers['firstname'] : "",
								"phone"=>!empty($Pmebers['phone']) ? $Pmebers['phone'] : "",
								"gender"=>$Pmebers['gender'],
							     "age"=>$TotalAge,
								"approved"=>$Pmebers['approved'],
								"bigimage"=>WEB_PATH_IMAGE.$Pmebers['bigimage']
							   );
		}
	}
    //die;
	//~ echo count($popular1);
	                                  
	                               
    $notifications = $DB->Query("select content from notification_board");
    $notification = array();
    while ($Data = $DB->NextRow($notifications)) {
        $notification[] = array("content"=>$Data['content']);
    }
	
    if(!empty($result12['bigimage']))
{
	$ProfilePic = WEB_PATH_IMAGE.$result12['bigimage'];
}
else{
	$ProfilePic = WEB_PATH_IMAGE."waiting.jpg";
}
    $overviewData = array(
        "sessionID"             => $values['session'],
        "user_id"               => $values['id'],  
        "firstname"               => !empty($values['firstname']) ? $values['firstname'] : "",
        "phone"               => !empty($values['phone']) ? $values['phone'] : "",  
        "user_name"             => eMeetingOutput($values['username']),
        "email"                 => $values['email'],
        "auth"                  => "yes",
        "image"                 => $ProfilePic,
        //"image"               => ReturnDeImageNew($result1,"medium",$values['id'],$adult_result['view_adult']),
        "packageid"             => $values['packageid'],
        "last_login"            => $values['lastlogin'],
        "lang"                  => $values['Language'],
        "total_profile_views"   => $values['hits'],
        "remember"              => "no",
        "pack_adult"            => $values['view_adult'],
        "pack_name"             => $values['name'],
        "pack_wink"             => $values['wink'],
        "pack_highlight"        => $values['Highlighted'],
        "pack_message"          => $values['maxMessage'],
        "pack_files"            => $values['maxFiles'],
        "pack_feature"          => $values['Featured'],
        "gender_id"             => $values['genderD'],
		"active_status"         => $values['active'],
        "visible"               => $values['visible'],
        "total_new_emails"      => $emails_result['totalCount'],
        "total_new_winks"       => getWinkCount($values['id']),
        "albums"                => $albums,
        "notification"          => $notification,
		"newes_member"          => $newes_member,
		"popular_member"          => $popular1
    );

    return $overviewData;
}

function CheckUpgradeNew($id, $package){

    /*
        THIS FUNCTION CHECKS TO SEE IF THE MEMBER UPGRADE HAS EXPIRED
        THIS IS CHECKED DURING LOGIN AND WILL DOWN GRADE THE MEMBER
        AND SEND AN EMAIL TO CONFIRM THE DOWNGRADE

    */

    global $DB;

    ## UPGRADE CHECK UPDATED
    ## LOOKS FOR ALL ENTRIED BY ONLY FINDS LAST ONE BASED ON DATE (INCASE THEY HAVE UPGRADED SINCE)
    $FoundExpired = $DB->Row("SELECT id, uid, date_expire FROM members_billing WHERE uid= ( '".$id."' ) AND running='yes' AND subscription ='no' ORDER BY date_expire, id DESC LIMIT 1");

    if(!empty($FoundExpired) && $FoundExpired['date_expire'] < date("Y-m-d H:i:s")){

        $DB->Update("UPDATE members_billing SET running='no' WHERE id= ( '".$FoundExpired['id']."' )");
        $DB->Update("UPDATE members SET packageid='".DEFAULT_PACKAGE."' WHERE id= ( '".$FoundExpired['uid']."' ) LIMIT 1");

        /////////////////////////////////////////
        // SEND MEMBER AN EMAIL TO CONFIRM NEW MSG
        //////////////////////////////////////////
        $val = $DB->Row("SELECT members.email, members.username FROM members WHERE members.id = ( '".$FoundExpired['uid']."' ) LIMIT 1");
        if(!empty($val)){

            $Data['email'] =  $val['email'];
            $Data['username'] =  $val['username'];
            SendTemplateMail($Data, 14);
        }

    }
}

/**
 * Info: Build Image Display Function
 *
 * @version  9.0
 * @created  Fri Sep 25 , 2008
 * @updated  Fri Sep 25  , 2008
 */
function ReturnDeImageNew($array,$size,$user_id, $viewAdult){
    ## photo used on member adverts, groups etc
    if(isset($array['photo']) && $array['photo'] !=""){
        $array['bigimage']=$array['photo']; $array['type'] ="photo";
    }
    ## if not file type is set
    if(!isset($array['type'])){
        $array['type']="photo";
        $array['bigimage'] = DEFAULT_IMAGE;
    }
    ## build the image string
    switch($array['type']){
        case "photo": {
            ## add gender display pic male/female etc
            if(isset($array['gender'])){ $array['bigimage'] .="&g=".$array['gender']; }
            $UImage = $array['bigimage'];
        } break;
        case "music": { $UImage = DEFAULT_MUSIC."&t=f"; 	} break;
        case "video": { $UImage = DEFAULT_VIDEO."&t=f";		} break;
        case "youtube": {
            $file_part = explode("?v=",$array['bigimage']);
            if(isset($file_part[1])){ $file_part = explode("&",$file_part[1]); }
            if(!isset($file_part[0])){
                $UImage = DEFAULT_VIDEO."&t=f";
            }else{
                return "http://img.youtube.com/vi/".$file_part[0]."/2.jpg?";
            }
        } break;
        // not type found
        default: {
        $UImage = DEFAULT_IMAGE."&t=f";
        if(isset($array['gender'])){ $UImage ="nophoto.jpg&g=".$array['gender']; }
        } break;
    }
    ## approval system
    if(isset($array['approved']) && $array['approved'] =="no" ){
        $UImage = WATINGAPPROVAL_IMAGE."&t=f";
    }
    ## adult images



    if(isset($array['adult_content']) && $array['adult_content'] =="yes" && $viewAdult !="yes" && ENABLE_ADULTCONTENT =="yes"){ // && $_SESSION['uid'] != $array['uid']
        if(($array['id'] != $user_id) || ( $array['uid'] != $user_id ) ){
            $UImage = DEFAULT_IMAGE_ADULT."&t=f";
            //return $UImage;
        }
    }
    ## build the query string
    $FilePath = DB_DOMAIN."inc/tb.php?src=";
    ## image sizes
    switch($size){
        case "xsmall":{	$UImage .="&x=40&y=40";			} break;
        case "small":{	$UImage .="&x=48&y=48";			} break;
        case "medium":{	$UImage .="&x=96&y=96";			} break;
        case "big":{	$UImage .="&x=183&y=183";		} break;
        case "full":{	$FilePath = WEB_PATH_IMAGE; } break;
    }
    $UImage = $FilePath.$UImage;
    return $UImage;
}

function getWinkCount($id){
    global $DB;
    $fulldayname = array(
        'Mon'=>'Monday',
        'Tue'=>'Tuesday',
        'Wed'=>'Wednessday',
        'Thu'=>'Thursday',
        'Fri'=>'Friday',
        'Sat'=>'Saturday',
        'Sun'=>'Sunday'
    );
    $messages = array();
    for($i=0;$i<14;$i++) {
        $date = date("Y-m-d", strtotime(-$i . ' days'));

        $SQL = "SELECT members.*,winkmessagessend.read_status as read_status from winkmessagessend inner join members on members.id = winkmessagessend.wink_from WHERE wink_to='" . $id . "' && onlydate = '" . $date . "' && winkmessagessend.read_status = 0";
        $Data = $DB->Query($SQL);

        if(mysql_num_rows($Data)>0){
            $str=explode('-',$date);
            $date = $fulldayname[date('D', strtotime($date))].' ('.$str[2].' '.date("M").')';

            while($row=mysql_fetch_array($Data)){
                $messages[] = array("date" => $date, 'id'=>$row['id'],'username'=>$row['username'],'view_status'=>$row['read_status']);
            }
        }
    }
    return count($messages);
}

function deleteUserProfile($userID){
    if($userID != '' || $userID != 0){
        global $DB;
        $DB->Insert("INSERT INTO members_delete_temp VALUES('','$userID','".DATE_TIME."')");

        $sql = "select username from members where id='$userID'";
        $result = $DB->Row($sql);

        if($result['username'] != ''){
            //-- Send mail to admin for delete member profile.
            include_once("../classes/class_email.php");
            $EmailSender = SEND_ADMIN_NAME;
            $EmailSubject = $result['username']." wants their profile deleted.";
            $sendTo = "contact@realblacklove.com";
            $DB_MAIL = new htmlMimeMail();
            @ini_set(sendmail_from, ADMIN_EMAIL);
            # Common Headers
            $text = "";
            $html = "Hello Admin,<br><br>".$result['username']." wants their profile deleted.";
            $DB_MAIL->setHtml($html, $text);
            $DB_MAIL->setReturnPath(ADMIN_EMAIL);
            $DB_MAIL->setFrom('"'.$EmailSender.'" <'.ADMIN_EMAIL.'>');
            $DB_MAIL->setSubject($EmailSubject);
            $DB_MAIL->setHeader('X-Mailer', 'eMeeting Dating Software');
            $result = $DB_MAIL->send(array($sendTo));
            @ini_restore(sendmail_from);
            return "complete";
        }
        else{
            return "User not found.";
        }
    }
    else{
        return "Please send a valid user id.";
    }
}

function deactiveAccount($user_id) {
    if ($user_id == '')
        return "failed";

    global $DB;
    $sql = "Update members SET visible = 'no' WHERE id = '" . $user_id . "' LIMIT 1";

    $DB->Update($sql);  
    return "complete";
}

function activeAccount($user_id) {
    if ($user_id == '')
        return "failed"; 

    global $DB;
    $sql = "Update members SET visible = 'yes' WHERE id = '" . $user_id . "' LIMIT 1";

    $DB->Update($sql);  
    return "complete";
}

function ForgottenUserPassword($CheckThisEmail){

    /*
        THIS FUNCTION SENDS A NEW PASSWORD TO THE MEMBER
        WITH A NEWLY GENERATED PASSWORD

        NOTE: THE PASSWORD STORED IN THE DATABASE IS M5D
        ENCRYPTED, THEREFORE WE CANT JUST SEND THE OLD PASSWORD
        SO WE MUST CREATE A NEW ONE.

    */

    global $DB;

    $today_time=TIME_NOW;
    $today_date=DATE_NOW;

    // First lets check this email address is in the database
    $result = $DB->Row("SELECT username, password FROM members WHERE email ='".$CheckThisEmail."' LIMIT 1");
    if(empty($result)){ return "Please enter your registered email address."; }



    $LostPassword['email'] = $CheckThisEmail;
    $LostPassword['username'] = $result['username'];
    $LostPassword['password'] = makeRandomPassword(); // THE NEW PASSWORD IS GENERATED HERE


    if(D_MD5 ==1){
        //$passcode = md5($LostPassword['password']);
        define('OW_PASSWORD_SALT', '4f94930cd4ff3');
        $passcode = hash('sha256', OW_PASSWORD_SALT . $LostPassword['password']);

    }else{
        $passcode = $LostPassword['password'];
    }

    $DB->Update("UPDATE members SET password='".$passcode."', activate_code ='OK' WHERE email ='".$CheckThisEmail."'");

    // Send the email to the user
    SendTemplateMail($LostPassword, 4);

    return "complete";

}

?>
