<?
// DATABASES TO COPY INCLUDES

// 1. BANNERS
// 2. MEMBERS
// 3  MEMBERS_DATA
// 4. MEMBERS_PRIVACY
// 5. ALBUMS
// 6. FILES
// 7. FILES_COMMENTS
// 8. BLOGS
// 9. BLOG COMMENTS
// 10. AFFILIATES

function GetMemberTableString($software){

	switch($software){

		case "bestdatingscript":{

			return "Select member_id AS id, 
			picture AS PicID,
			user_name AS username, 
			password, 
			member_name, 
			headline, 
			member_des as description, 
			gender as gender, 
			dob, 
			add_date as created,
			member_email AS email, 
			member_zip  as zipcode,
			member_country AS country,
			member_city AS location
			FROM (prefix)member";
		
		
		} break;

		case "aedating": {
		
			return "Select ID AS id, 
			ID AS PicID,
			NickName AS username, 
			Password AS password, 
			RealName, 
			Headline as headline, 
			DescriptionMe as description, 
			Sex as gender, 
			DateOfBirth as dob, 
			LastReg as created,
			Email AS email, 
			zip  as zipcode
			FROM (prefix)Profiles";
		
		} break;

		case "osdate": {
		
			return "Select osdate_user.username, 
			osdate_user.id,
			osdate_user.email, 
			osdate_user.password, 
			osdate_user.gender, 			
			osdate_userpreference.answer as description, 
			osdate_user.city, 
			osdate_user.zip as zipcode,
			osdate_user.birth_date as dob, 
			osdate_user.regdate as created,
			osdate_user.zip 
			FROM osdate_user LEFT JOIN osdate_userpreference ON (osdate_userpreference.userid = osdate_user.id AND questionid =4) ";
		
		} break;

		case "vld": {
		
			return "Select 
			vld_members.username, 
			vld_members.ipaddress AS ip,
			vld_members.member_id AS id,
			vld_members.email, 
			vld_members.password, 
			vld_members_data.data_gender1 AS gender, 
			vld_members_data.data_inmyownwords as description, 
			vld_members_data.data_city as city, 
			vld_members_data.data_age as dob,  
			vld_members.joindate as created
			FROM vld_members, vld_members_data WHERE vld_members.member_id = vld_members_data.data_id";
		
		} break;

		case "boonex5": {
		
			return "Select NickName as username, 
			id,
			Email as email, 
			Password as password, 
			Sex as gender, 
			Headline as headline, 
			DescriptionMe as description, 
			City as city, 
			DateOfBirth as dob, 
			Featured as highlighted, 
			DateReg as created, 
			zip 
			FROM Profiles";
		
		} break;
	
		case "boonex": {
		
			return "Select NickName as username, 
			id,
			Email as email, 
			Password as password, 
			Sex as gender, 
			Headline as headline, 
			DescriptionMe as description, 
			City as city, 
			DateOfBirth as dob, 
			Featured as highlighted, 
			DateReg as created, 
			zip 
			FROM profiles";
		
		} break;

		case "joomla": {
		
			return "Select 	username,
			email,
			password,
			registerDate as created
			FROM (prefix)users";
		
		} break;

		case "abledating24": {
		
			return "SELECT
			user.user_id AS id, 
			user.name AS username, 
			user.gender,
			user.mail AS email,			
			user.password,
			user.country_id,
			user.state_id as city,
			user.zip,
			user.birth as dob,
			user.register as created,
			user.last_visit,
			user.essay AS description,
			user.headline	 
			FROM `user` ";
		
		} break;
		
		case "abledating": {
		
			return "SELECT
			user.user_id AS id, 
			user.name AS username, 
			user.gender,
			user.mail AS email,			
			user.password,
			user.country,
			user.state as city,
			user.zip,
			user.birth as dob,
			user.register as created,
			user.last_visit,
			userinfo.headline,	
			userinfo.essay AS description
			FROM `user`, userinfo 
			WHERE 
			user.user_id = userinfo.user_id";
		
		} break;

		case "webscribble": {
		
			return "SELECT
			 dt_members.id, 
			 dt_members.login as username, 
			 dt_members.pswd as password, 
			 dt_members.email, 
			 dt_members.gender, 
			 dt_members.age,			 
			 dt_profile.birth_day,
			 dt_profile.birth_month,
			 dt_profile.birth_year,			 
			 dt_profile.general_info as description,
			 dt_profile.state as city	 
			 FROM `dt_members`,dt_profile 
			 WHERE dt_members.id = dt_profile.member_id ";
		
		} break;

		case "wordpress": {
		
			return "SELECT
			ID,
			user_login as username,
			user_pass as password,
			user_nicename,
			user_email 	as email,
			user_registered as created
			FROM wp_users";
		
		} break;

		case "ska": {
		
			return "SELECT
			profile_id AS id,
		 	email,
			username,
			password,
			sex AS gender,
		 	birthdate as dob,
			headline,
			general_description AS description,
		 	custom_location AS location,
			country_id AS country,
			zip as zipcode
			FROM skadate_profile";
		
		} break;
							
	}
}

function GetMemberPhotoString($software){

	switch($software){

		case "bestdatingscript":{

		return "SELECT picture AS bigimage FROM tbl_member WHERE member_id='(USER_ID)'";
		
		} break;

		case "aedating": {

		return "SELECT Pic_0_addon AS bigimage FROM Profiles WHERE Picture != 0 AND Pic_0_addon !='' AND ID ='(USER_ID)' ";

		} break;
		
		case "osdate": {

			return "SELECT id AS bigimage FROM osdate_usersnaps WHERE userid ='(USER_ID)' ";

		} break;

		case "vld": {
		
			return "SELECT filename AS bigimage, description AS title, description FROM vld_pictures WHERE member_id ='(USER_ID)' ";
		
		} break;

		case "boonex5": {
		
			return "SELECT med_id, med_title AS description, med_title AS title, med_file AS bigimage FROM media WHERE med_type='photo' AND med_prof_id ='(USER_ID)'";
		
		} break;
	
		case "boonex": {
		
			return "SELECT med_id, med_title AS description, med_title, med_file AS bigimage AS title FROM media WHERE med_type='photo' AND med_prof_id ='(USER_ID)'";
		
		} break;

		case "abledating24": { }
		case "abledating": {
		
			return "SELECT photo_id, user_id, description, photo_name AS title FROM `photo` WHERE user_id ='(USER_ID)' ";
		
		} break;

		case "webscribble": {
		
			return "SELECT member_id, filename_1 as bigimage, description_1 as description FROM dt_photos WHERE member_id ='(USER_ID)' ";
		
		} break;		
	
		case "ska": {
		
			return "SELECT photo_id, profile_id, `index`, description, title FROM `skadate_profile_photo` WHERE profile_id ='(USER_ID)' ";
		
		} break;		
			
	}
}


function contains($str, $content, $ignorecase=true){
    if ($ignorecase){
        $str = strtolower($str);
        $content = strtolower($content);
    }  
    return strpos($content,$str) ? true : false;
}


function SelectGenderID($string, $Gender_array, $software){
	
	if($software =="vld"){

		if($string ==1){ // male
			return "63";
		}else{
			return "64"; // female
		}

	}elseif($software=="bestdatingscript"){

		if($string =="m"){ // male
			return "63";
		}else{
			return "64"; // female
		}

	}elseif($software=="ska"){

		if($string =="2"){ // male
			return "63";
		}else{
			return "64"; // female
		}
	}elseif($software=="abledating" || $software=="abledating24"){

		if($string =="M"){ // male
			return "63";
		}else{
			return "64"; // female
		}

	}elseif($software =="aedating"){

		if($string =="male"){ // male
			return "63";
		}else{
			return "64"; // female
		}

	}elseif($software =="osdate"){

		if($string =="M"){ // male
			return "63";
		}else{
			return "64"; // female
		}

	}else{

		$ReturnID=$Gender_array[1]['id'];
		foreach($Gender_array as $gVal){
			//die($string."<-->".$gVal['name']);
			if(contains($string, $gVal['name'])){
				$ReturnID = $gVal['id'];
			}
		}
	
	}	
//die($ReturnID.">>".$string);
return $ReturnID;
}

function GetPassType($software){

	switch($software){

		case "bestdatingscript": {	return false; } break;
		
		case "aedating": {			} break;

		case "vld": {			return false; } break;
		
		case "boonex5": {				} break;

		case "osdate": {		return false; } break;

		case "boonex": {				} break;

		case "joomla": {				} break;
		
		case "abledating": {			} break;

		case "webscribble": {			} break;		

		case "ska": {			} break;	
			
	}
	
	return true;

}
function SelectAge($data, $software){

	switch($software){

		case "bestdatingscript": {

				$birth = explode("-", $data['dob']); 				
				$DOB = str_replace($birth[1],ReturnBirthMonth($birth[1]),$data['dob']);
		
		} break;
	
		case "aedating": {

				$birth = explode("-", $data['dob']); 				
				$DOB = str_replace($birth[1],ReturnBirthMonth($birth[1]),$data['dob']);

		} break;	

		case "vld": {
			
		// MAKE AGE FROM STRING 19820613
			
			$DOB = substr($data['dob'],0,4)."-".ReturnBirthMonth(substr($data['dob'],4,2))."-".substr($data['dob'],6,2);


		} break;

		case "ska": {

				$birth = explode("-", $data['dob']); 				
				$DOB = str_replace($birth[1],ReturnBirthMonth($birth[1]),$data['dob']);

		} break;

		case "osdate": {

				$birth = explode("-", $data['dob']); 				
				$DOB = str_replace($birth[1],ReturnBirthMonth($birth[1]),$data['dob']);
		
		} break;

		case "boonex": {
		
		} break;

		case "joomla": {
		
			return 0;
		
		} break;
		case "abledating24": {}
		case "abledating": {
		
			$DOB = $data['dob'];
			
		} break;

		case "webscribble": {
		
			$DOB = $data['birth_year']."-".ReturnBirthMonth($data['birth_month'])."-".$data['birth_day'];
			
		} break;		
		
			
	}
	
	return 	$DOB; //$row['dob']

}

function ReturnBirthMonth($birthday, $fullDate=false){

 if($fullDate){ $birth = explode("-", $birthday); $birthday = $birth[1]; }

		switch($birthday){
			case "01": { $MM = "JAN"; } break;
			case "02": { $MM = "FEB"; } break;
			case "03": { $MM = "MAR"; } break;
			case "04": { $MM = "APR"; } break;
			case "05": { $MM = "MAY"; } break;
			case "06": { $MM = "JUN"; } break;
			case "07": { $MM = "JUL"; } break;
			case "08": { $MM = "AUG"; } break;
			case "09": { $MM = "SEP"; } break;
			case "10": { $MM = "OCT"; } break;
			case "11": { $MM = "NOV"; } break;
			case "12": { $MM = "DEC"; } break;
			default: { $MM = $birth[1]; }
		}

return $MM;

}

function TransferMembersData($cOne, $cTwo, $software, $Gender_array, $PREFIX){
			
			//print_r($cOne);
			//print_r($cTwo);
			/////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////
			$db_one = mysql_connect($cOne['host'], $cOne['username'], $cOne['password']);
			mysql_select_db($cOne['database'], $db_one);
			
			$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
			//////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////			
			$count=0;
			$TTcount=0;
			$Query = str_replace("(prefix)",$PREFIX,GetMemberTableString($software));

			$File_Query = str_replace("(prefix)",$PREFIX,GetMemberPhotoString($software));
			$ENCRYPT_PASS = GetPassType($software);
			ob_start();
			
					$result = mysql_query($Query, $db_one);
					while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
						
						mysql_select_db($cTwo['database'], $db_two);
						// GET THE NEXT UID SO WE CAN ADD MEMBERS
						if(!isset($id)){
							$result_get = mysql_query("SELECT id as last FROM members ORDER by id DESC LIMIT 1", $db_two);
							$last_id = mysql_fetch_row($result_get);
							$id = $last_id[0]+1;
						}
						
						if($ENCRYPT_PASS){
							$MY_PASS = md5($row['password']);
						}else{
							$MY_PASS = $row['password'];
						}
						
						mysql_query("INSERT INTO `members` (`id` ,`username` ,`password` ,`email` ,`session` ,`ip` ,`lastlogin` ,`visible` ,`active` ,`created` ,`packageid` ,`hits` ,`profile_complete` ,`templateid` ,`updated` ,`moderator` ,`activate_code` ,`highlight`
						)VALUES ('".$id."', '".$row['username']."', '".$MY_PASS."', '".$row['email']."', '', '".$row['ip']."', '".DATE_TIME."', 'yes', 'active', '".$row['created']."', '".DEFAULT_PACKAGE."', '".$row['hits']."', '50', '1', '".DATE_TIME."', 'no', 'OK', 'off')", $db_two);
						
						mysql_query("INSERT INTO `members_data` ( `uid` ) values ( '".$id."' )", $db_two);
						// UPDATE EXTRA MEMBERS DATA INFO

							if($row['gender'] =="" && $software=="osdate"){
								$row['gender'] ="M";
							}
						//if(isset($row['description'])){
							// sort gender
							
							// WORK OUT GENDER ID
							$GenderID = SelectGenderID($row['gender'], $Gender_array, $software);
							$AgeID = SelectAge($row,$software);

							if($AgeID =="0000-00-00"){
							$AgeID = "1985-01-01";
							}
							
						mysql_query("UPDATE `members_data` SET gender='".$GenderID."', description='".myAddSlashes($row['description'])."', location='".myAddSlashes($row['city'])."', country='".myAddSlashes($row['country'])."', headline='".myAddSlashes($row['headline'])."', age='".$AgeID."', postcode='".$row['zipcode']."' WHERE uid= ( '".$id."' ) LIMIT 1", $db_two);
						//}				
						mysql_query("INSERT INTO `members_privacy` ( `uid` , `Newsletters` , `Notifications` , `IM` , `Language` , `Time Zone` ) VALUES ('".$id."', 'yes', 'yes', 'yes', 'english', '')", $db_two);						
						
						
						if(strlen($File_Query) > 1){
						
								mysql_query("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a` )
								VALUES ('', '".$id."', 'Default Album', '', '0', 'public', 'y', 'y', 'y', 'n')", $db_two);																			
								$albumID = mysql_insert_id();						
								// PHOTO TRANSFER SCRIPT
								mysql_select_db($cOne['database'], $db_one);
								$Query4 = str_replace("(USER_ID)",$row['id'],$File_Query);
								
								$result4 = mysql_query($Query4, $db_one);
								while ($row2 = mysql_fetch_array($result4, MYSQL_BOTH)) {
									
									mysql_select_db($cTwo['database'], $db_two);
									
									if($software=="abledating" || $software=="abledating24"){
									
										$row2['bigimage'] = $row2['user_id']."_".$row2['photo_id']."_b.jpg";
									}

									if($software=="boonex" || $software=="boonex5"){
									
										$row2['bigimage'] = "photo_".$row2['bigimage'];
									}

									if($software=="vld"){

										$row2['bigimage'] = "picture_".$row2['bigimage'];

									}

									if($software=="osdate"){

										$row2['bigimage'] = "getsnapall.php?id=".$row2['bigimage'];

									}

									if($software=="aedating"){
									
										$row2['bigimage'] = $row['PicID']."_0_".$row2['bigimage'].".jpg";
 
									}
									

									if($software=="ska"){
									
										$row2['bigimage'] = "original_".$row2['profile_id']."_".$row2['photo_id']."_".$row2['index'].".jpg";
 
									}
									
									mysql_query("INSERT INTO `files` ( `aid` , `user` , `uid` , `date` , `title` , `description` , `bigimage` , `width` , `height` , `filesize` , `views` , `medwidth` , `medheight` , `medsize` , `approved` , `rating` , `default` , `featured` , `type` , `rating_votes` )
									VALUES ('".$albumID."', '".$row['username']."', '".$id."', now(), '".$row2['title']."', '".$row2['description']."' , '".$row2['bigimage']."', '100' , '100' , '0', '0', '0', '0', '0', 'yes', '0.00', '1', '1', 'photo', '0')", $db_two);
										
									mysql_query("UPDATE `album` SET filecount=filecount+1 WHERE aid='".$albumID."' LIMIT 1");
									
								}
						 }
						
							if($TTcount ==100){
							
								ob_flush();
								flush();
								usleep(50000);// delay minimum of .05 seconds to allow ie to flush to screen
								sleep(2);							
								$TTcount=1;
							}
						
						$TTcount++;
						$count++;
						$id++;
					}
						
			//}
			//ob_end_flush();
			// TRANSFER MEMBER ALBUMS

			return $count;
								
			mysql_close($db_one); 
			mysql_close($db_two);						
}
?>