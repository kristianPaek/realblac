<?php
session_start();
//echo "Posted data received : ".json_encode($_POST);die;
//date_default_timezone_set('EST');
include '../config.php';
include '../config_db.php';
//include '../func/globals-16-02-2014.php';

$action = $_POST['action'];


if($action == "LOGIN")
{
        $username = $_POST['username'];
        $password = $_POST['password'];

        global $DB;
        $sql = "SELECT * FROM members WHERE username = '".$username."'";
        if(D_MD5 ==1){
            define('OW_PASSWORD_SALT', '4f94930cd4ff3');
            $myhash = hash('sha256', OW_PASSWORD_SALT . $password);
            $sql .="AND password = '".$myhash."' LIMIT 1";

        }else{
            $sql .="AND password = '".$password."' LIMIT 1";
        }
        $result = $DB->Query($sql);
        $row = $DB->NextRow($result);
        $num = $DB->NumRows($result);
        
        if($num > 0)
        {
            //Get total number of emails

            $emails_result = $DB->Row("SELECT COUNT( mailstatus ) AS totalCount FROM messages WHERE mail2id = ".$row['id']." AND mailstatus = 'unread' AND to_box =  'inbox'");

            //Get total number of winks
//            $winks_sql = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$row['uid']."' AND read_status='0'";
//            $winks_result = $DB->Query($winks_sql);
//            $winks_row = $DB->NextRow($winks_result);
            

            $total_profile_views = $row['hits'];

            include_once("../func/globals.php");

            $result1 = $DB->Row("SELECT * FROM files WHERE uid='".$row['uid']."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");

            $adult_result = $DB->Row("select view_adult from package where pid =". $row['packageid']);

            $image = ReturnDeImageNew($result1,"medium",$row['id'],$adult_result['view_adult']);

            $_SESSION['sessionid'] = session_id();
            $overviewData = array(
                "total_new_emails"    => $emails_result['totalCount'],
                "total_new_winks"     => getWinkCount($row['id']),
                "total_profile_views" => $total_profile_views,
                "sessionID"           => $_SESSION['sessionid'],
                "user_id"             => $row['id'],
                "user_name"           => $row['username'],
                "image"               => $image
            );
            
            echo json_encode(array("message" => "SUCCESS", "overviewData" => $overviewData, "method" => "LOGIN"));
        }
         else {
            echo json_encode(array("message" => "FAIL", "method" => "LOGIN", "status"=> "Wrong user name or password."));
        }
}
elseif($action == "REFRESH_HOME_PAGE"){
    $user_id = $_POST['user_id'];

    global $DB;
    $sql = "SELECT * FROM members WHERE id = ".$user_id;

    $result = $DB->Query($sql);
    $row = $DB->NextRow($result);
    $num = $DB->NumRows($result);

    if($num > 0)
    {
        $emails_result = $DB->Row("SELECT COUNT( mailstatus ) AS totalCount FROM messages WHERE mail2id = $user_id AND mailstatus = 'unread' AND to_box =  'inbox'");

        //Get total number of winks
//            $winks_sql = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$row['uid']."' AND read_status='0'";
//            $winks_result = $DB->Query($winks_sql);
//            $winks_row = $DB->NextRow($winks_result);


        $total_profile_views = $row['hits'];

        include_once("../func/globals.php");

        $result1 = $DB->Row("SELECT * FROM files WHERE uid='".$row['uid']."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");

        $adult_result = $DB->Row("select view_adult from package where pid =". $row['packageid']);

        $image = ReturnDeImageNew($result1,"medium",$row['id'],$adult_result['view_adult']);

        //$_SESSION['sessionid'] = session_id();
        $overviewData = array(
            "total_new_emails"    => $emails_result['totalCount'],
            "total_new_winks"     => getWinkCount($user_id),
            "total_profile_views" => $total_profile_views,
            "sessionID"           => $_SESSION['sessionid'],
            "user_id"             => $row['id'],
            "user_name"           => $row['username'],
            "image"               => $image
        );

        echo json_encode(array("message" => "SUCCESS", "overviewData" => $overviewData, "method" => "REFRESH_HOME_PAGE"));
    }
    else {
        echo json_encode(array("message" => "FAIL", "method" => "REFRESH_HOME_PAGE"));
    }

}
elseif ($action == "SIGNUP") {
    $SwitchValue = ValidateAccount($_POST);
    $errorMessage = "";
    switch($SwitchValue) {

        case "username": {

            $errorMessage = "Sorry, username is not available.";

        }
            break;

        case "email": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][2];

        }
            break;

        case "invalid_email": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][3];

        }
            break;

        case "password": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][4];

        }
            break;

        case "username_short": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][5];

        }
            break;

        case "username_chars": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][6];

        }
            break;

        case "password_lenght": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][7];

        }
            break;

        case "field_empty": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][8];

        }
            break;

        case "verification": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][9];

        }
            break;

        case "photo": {

            $errorMessage = $GLOBALS['LANG_REGISTER'][10];

        }
            break;


        case "terms": {

            $errorMessage = "You must agree to the terms and conditions";

        }
            break;

        case "photo_invalid": {

            $errorMessage = "The photo you have selected is invalid. We only accept .jpg,.png and .bmp image types. Please select a different photo and try again.";

        }
    }

    if($errorMessage != ""){
        echo json_encode(array("message" => "FAIL", "method" => "SIGNUP", "status"=>$errorMessage)); exit;
    }

    $title = trim(strip_tags($_POST['title']));
    $comments = trim(strip_tags($_POST['comments']));
    $username = trim(strip_tags($_POST['username']));
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $robotest = trim(strip_tags($_POST['robotest']));
    $LinkedRows = trim(strip_tags($_POST['LinkedRows']));
    $uploadNeed = trim(strip_tags($_POST['uploadNeed']));
    $default = trim(strip_tags($_POST['default']));
    $notify = trim(strip_tags($_POST['notify']));
    $news = trim(strip_tags($_POST['news']));

    $country = trim(strip_tags($_POST['FieldValue25']));            //Country
    $em_85820081128 = trim(strip_tags($_POST['FieldValue54']));     //State
    $location = trim(strip_tags($_POST['FieldValue26']));           //location
    $postcode = trim(strip_tags($_POST['FieldValue21']));           //postcode
    $gender = trim(strip_tags($_POST['FieldValue28']));             //gender
    $em_m5z20131006 = trim(strip_tags($_POST['FieldValue87']));     // Interest
    $em_5jb20131011 = trim(strip_tags($_POST['FieldValue92']));     // Prefer
    $em_1k820080113 = trim(strip_tags($_POST['FieldValue31']));     // Height
    $em_heh20080113 = trim(strip_tags($_POST['FieldValue32']));     // BodyType
    $em_s1620080113 = trim(strip_tags($_POST['FieldValue48']));     // Education
    $em_kjc20080113 = trim(strip_tags($_POST['FieldValue49']));     // Income
    $em_v9620131005 = trim(strip_tags($_POST['FieldValue86']));     // 

    $em_yh020080113 = trim(strip_tags($_POST['race']));
    $em_hrh20080113 = trim(strip_tags($_POST['MaritalStatus']));
    $em_txg20080113 = trim(strip_tags($_POST['Religion']));
    $em_72220080113 = trim(strip_tags($_POST['Work']));
    $em_7s920130723 = trim(strip_tags($_POST['kids2']));
    $em_s5j20080113 = trim(strip_tags($_POST['Marriage']));
    $em_wvh20080113 = trim(strip_tags($_POST['Personality']));
    $em_hes20130723 = trim(strip_tags($_POST['Politics']));
    $em_r9720080113 = trim(strip_tags($_POST['Romantic']));
    $em_ja520130723 = trim(strip_tags($_POST['Cooking']));
    $em_1cz20131006 = trim(strip_tags($_POST['Smoking']));
    $em_7gb20131006 = trim(strip_tags($_POST['Drinking']));

    $year = trim(strip_tags($_POST['FieldValue23a']));              // Year
    $month = trim(strip_tags($_POST['FieldValue23b']));             // Month
    $date = trim(strip_tags($_POST['FieldValue23c']));              // Day
    $age = $year."-".$month."-".$date;
    $default_CC ="United States";
    $member_Package_id = DEFAULT_PACKAGE;


    global $DB;
    ////////////////////////////////
    ## FIRST LETS GET THE DATA FROM THE PACKAGES
    $packageData = $DB->Row("SELECT * FROM package WHERE pid='".$member_Package_id."' LIMIT 1");

    // DETERMIN ACCOUNT STATUS
    if(APPROVE_ACCOUNTS == "yes"){
        $status = "unapproved";
    }else{
        $status = "active";
    }

    ////////////////////////////////////////////
    //  	EMEETING GOIP SYSTEM DETECTION    //
    $reg_long=""; $reg_lat=""; $reg_country=""; $reg_code="";
    $reg_country = $country;
    $default_CC = $country;
    $MSGSTATUS= D_STATUSMSG;

    $ip = "";
    $session = "";

    if(D_MD5 ==1){
        //$passcode = md5($pass);
        define('OW_PASSWORD_SALT', '4f94930cd4ff3');
        $passcode = hash('sha256', OW_PASSWORD_SALT . $password);

    }else{
        $passcode = $password;
    }

    $DB->Insert("INSERT INTO `members` ( `id` , `username` , `password` , `email` , `session` , `ip` , `lastlogin` , `visible` , active, `created`, packageid, hits, profile_complete, templateid, updated, moderator, activate_code, highlight, ip_long, ip_lat, ip_country, ip_code,member_rating,  msgStatus,  video_duration,  video_live )
				VALUES (NULL , '".$username."', '".$passcode."', '".$email."', '".$session."', '".$ip."', '".DATE_TIME."', 'yes', '".$status."', '".DATE_TIME."', '".$member_Package_id."','0','0','1','".DATE_TIME."', 'no', 'OK','off','".$reg_long."','".$reg_lat."','".$reg_country."','".$reg_code."', '0','".eMeetingInput($MSGSTATUS)."','0','no')");
    $userid = $DB->InsertID();

    if($userid == ''){
        echo json_encode(array("message" => "FAIL", "method" => "SIGNUP", "status"=>"There is an internal server error.")); exit;
    }

    $query = sprintf("Insert Into members_mymatch (`user_id`, `race`, `min_height`, `max_height`, `body_type`, `education`, `kids`) Values(%d, '', '', '', '', '', '')", $userid);
    $DB->Insert($query);

    $query = sprintf("Insert Into member_setting (`user_id`, `push_setting`) Values(%d, 1)", $userid);
    $DB->Insert($query);
    
    if(VALIDATE_EMAIL ==1){
        // GENERATE ACTIVATE CODE
        $ACTIVATION_CODE = makeRandomPassword(9);
        if($ACTIVATION_CODE ==""){ $ACTIVATION_CODE = makeRandomPassword(9); }
        $DB->Insert("UPDATE members SET activate_code ='".$ACTIVATION_CODE."' WHERE id= ( '".$userid."' ) LIMIT 1");
        //---------------------
    }

    $DB->Insert("INSERT INTO `members_data` ( `uid` ) values ( '$userid' )");
    $DB->Update("UPDATE `members_data` SET age='1974-JAN-15', country='".eMeetingInput($default_CC)."', headline='' WHERE uid='".$userid."' LIMIT 1"); // make default values

    $DB->Insert("UPDATE members_data SET uid= ( '".$userid."') ,postcode = '$postcode', age = '$age', headline='', country = '$country', location = '$location', description = '', gender = '$gender', em_m5z20131006='$em_m5z20131006', em_5jb20131011 = '$em_5jb20131011',em_kjc20080113 = '$em_kjc20080113', em_1k820080113='$em_1k820080113',em_heh20080113='$em_heh20080113', em_s1620080113='$em_s1620080113', em_v9620131005='$em_v9620131005', em_85820081128='$em_85820081128', em_yh020080113='$em_yh020080113', em_hrh20080113='$em_hrh20080113', em_txg20080113='$em_txg20080113', em_72220080113='$em_72220080113', em_7s920130723='$em_7s920130723', em_s5j20080113='$em_s5j20080113', em_wvh20080113='$em_wvh20080113', em_hes20130723='$em_hes20130723', em_r9720080113='$em_r9720080113',em_ja520130723='$em_ja520130723', em_1cz20131006='$em_1cz20131006', em_7gb20131006='$em_7gb20131006' WHERE uid= ( '".$userid."' ) LIMIT 1");

    $D2 = $DB->Row("SELECT country FROM members_data WHERE uid='".$userid."' LIMIT 1");
    $mycountry = $D2['country'];


    if(isset($_POST['news']) && $_POST['news'] =="yes"){ $nw ="yes"; }else{ $nw ="no";}
    if(isset($_POST['notify']) && $_POST['notify'] =="yes"){ $nn ="yes"; }else{ $nn ="no";}


    if(UPGRADE_SMS =="yes"){
        $SMS_NUM=$data['smsnum'];
        $SMS_MSG=$data['sms_msg_alert'];
        $SMS_EMAIL=$data['sms_wink_alert'];
    }else{
        $SMS_NUM="";
        $SMS_MSG="";
        $SMS_EMAIL="";
    }

    $DB->Insert("INSERT INTO `members_privacy` (`uid` ,`Newsletters` ,`Notifications` ,`IM` ,`Language` ,`Time Zone` ,`friends` ,`comments` ,`profile_view` ,`im_window` ,`SMS_email` ,`SMS_wink` , SMS_number ,`SMS_credits` ,`SMS_country` ,`match_array` ,`email_winks` ,`email_msg` ,`email_friends` ,`email_match`, `profileview_friends`, `profileview_nonfriend`)
	VALUES ('".$userid."', '".$nw."', '".$nn."', 'yes', 'english', '', 'no', 'no', 'all', 'off', '".$SMS_MSG."', '".$SMS_EMAIL."', '".$SMS_NUM."', '".$packageData['SMS_credits']."', '".$mycountry."', '', 'yes', 'yes', 'yes', 'yes','','')");

    $Str = "".$userid."**".$password."**".$ACTIVATION_CODE;

    $ComData = $Str;
    $ComParts = explode("**",$ComData);

    //-- TODO: Monu CheckAdminMail not working
    CheckAdminEmail("register","register", $values, "-**1");
    //***************************

    $sql = "SELECT members.id, members.email, members_privacy.SMS_number, members_data.gender AS genderD, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members
									INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
									LEFT JOIN members_data ON ( members.id = members_data.uid )
									LEFT JOIN package ON ( members.packageid = package.pid )
									WHERE members.id = '".$ComParts[0]."' LIMIT 1";
    $values = $DB->Row($sql);
    // MEMBER ACCOUNT PACKAGE DATA
    $values['id'] = $ComParts[0];
    $values['password'] = $ComParts[1];
    $values['packageid'] = DEFAULT_PACKAGE;
    $values['custom'] = $ComParts[2];

    ////////////////////////
    // SEND WELCOME EMAIL
    ////////////////////////
    $D1 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_email' LIMIT 1");
    SendTemplateMail($values, $D1['value1']);

    $DB->Insert("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a`,password, 	time, 	date )
									VALUES (NULL , '".$userid."', '".$username." Album', '', '0', 'public', '0', '0', '0', '0','',now(),now())");
    $albumID = $DB->InsertID();


    include_once("../webservices1/fun_upload_file.php");
    $UploadMax = 0;
    while($UploadMax < 13){
        $photoFile  = $_FILES["uploadFile0".$UploadMax];
        // IF THE USER DOESNT HAVE AN ALBUM, CREATE ONE
        if(!isset($values['aid'])){ $values['aid']="new";}
        if($photoFile['error'] !=4 && is_array($_FILES["uploadFile0".$UploadMax]) && $_FILES["uploadFile0".$UploadMax]['type'] !="" ){ // error 4 = empty file

            $imgStatus = UploadFileNew($_FILES["uploadFile0".$UploadMax], $userid, strip_tags($title), strip_tags($comments), $default, "photo", $albumID,@"no");

        }

        $UploadMax++;
    }

    ## insert message into the database
    $D2 = $DB->Row("SELECT value2 FROM system_settings WHERE name='welcome_message' LIMIT 1");
    $D3 = $DB->Row("SELECT value1 FROM system_settings WHERE name='welcome_subject' LIMIT 1");

    ## make replacements
    $Subject = str_replace("(username)",$username,$D3['value1']);
    $Subject = str_replace("(password)",$ComParts[1],$Subject);
    $Subject = str_replace("(code)",$ComParts[2],$Subject);

    $Message = str_replace("(username)",$username,$D2['value2']);
    $Message = str_replace("(password)",$ComParts[1],$Message);
    $Message = str_replace("(code)",$ComParts[2],$Message);

    $query = sprintf("INSERT INTO message_room (`owner_id`, `partner_id`, `subject`, `timestamp`) VALUES(%d, %d, '%s', '%s')", 0, $userid, eMeetingInput($Subject), date('Y-m-d H:i:s'));
    $DB->Insert($query);
    $mail_room_id = $DB->InsertID();

    $query = sprintf("INSERT INTO messages (`uid`, `mail_room_id`, `mail2id`, `mailstatus`, `maildate`, `mailtime`, `mail_subject`, `mail_message`, `mail_displayalert`, `my_box`, `to_box`) 
                            VALUES(%d, %d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
                            0, $mail_room_id, $userid, 'unread', date('Y-m-d'), date('H:i:s'), eMeetingInput($Subject), eMeetingInput($Message), '1', 'sent', 'inbox');
    
    $DB->Insert($query);
    // $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
				// 					VALUES ('0', NULL , '".$userid."', 'unread', NOW(), NOW(), '".eMeetingInput($Subject)."', '".eMeetingInput($Message)."', '1', 'sent', 'inbox')");

    echo json_encode(array("message" => "SUCCESS", "method" => "SIGNUP", "status"=>"activateAccount", "image_status"=>$imgStatus));

}
elseif($action == "GET_MAIL"){
    $user_id = trim(strip_tags($_POST['user_id']));
    $box = trim(strip_tags($_POST['box_type']));
    $sort_by = trim(strip_tags($_POST['sort_by']));
    $start = trim(strip_tags($_POST['start']));
    $end = trim(strip_tags($_POST['end']));
    include_once("../func/func_messages_page.php");
    $mail_box = DisplayMessages($user_id,$box,$sort_by,$start,$end);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_MAIL", "mail_records"=>$mail_box));
}
elseif($action == "WHO_VIEWED_MY_PROFILE"){
    $user_id = trim(strip_tags($_POST['user_id']));
    include_once("webservices_methods.php");
    $arryHistory = DisplayHistory($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "WHO_VIEWED_MY_PROFILE", "history"=>$arryHistory));
}
elseif($action == "GET_USER_PROFILE"){
    $user_id = trim(strip_tags($_POST['user_id']));
    include_once("../func/func_profile_page.php");
    include_once("../API/api_functions.php");
    $arryHistory = GetProfileData($user_id,2,3);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_USER_PROFILE", "history"=>$arryHistory));
}
elseif($action == "SEND_MESSAGE"){
    $values = array();
    $values['to'] = $_POST["to"];
    $values['do'] = "add";
    $values['do_page'] = "messages";
    $values['sub'] = "create";
    $values['addCardID'] = "0";
    $values['subject'] = $_POST["subject"];
    $values['message1'] = $_POST["message1"];
    $values['idhidden'] = "";
    $values['message'] = $_POST["message"];
    $values['user_id'] = $_POST["user_id"];

    $send_mail = sendMailService($values);
    echo json_encode(array("message" => "SUCCESS", "method" => "SEND_MESSAGE", "status"=>$send_mail));
}
elseif($action == "SEND_WINK"){
    $sendfrom 	= trim(strip_tags($_POST['sendfrom_username'])); 	    // user id
    $sendto 	= trim(strip_tags($_POST['sendto_username'])); 	    // user id
    $result = SendWinkMessage($sendfrom,$sendto);
    echo json_encode(array("message" => "SUCCESS", "method" => "SEND_WINK", "status"=>$result));
}
elseif($action == "ADD_TO_FAVORITE"){
    $userID 	= $_POST['userID']; 	    // user id
    $fav_id 	= $_POST['fav_id']; 	    // user id
    $netID 	= trim(strip_tags($_POST['netID']));
    $result = addToNetworkForFavorite($userID, $fav_id, $netID);
    echo json_encode(array("message" => "SUCCESS", "method" => "ADD_TO_FAVORITE", "status"=>$result));
}
elseif($action == "GET_PHOTO_ALBUM**"){
    $userID 	= $_POST['userID']; 	    // user id
    include_once("../func/func_galllery_page.php");
    $album = DisplayAlbums($userID);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_PHOTO_ALBUM", "albums"=>$album));
}
elseif($action == "GET_PHOTO_FROM_ALBUM**"){
    $userID 	= $_POST['userID']; 	    // user id
    $other_userID = $_POST['other_user_id'];
    $password   = $_POST['password'];
    $albumID    = $_POST['albumID'];
    include_once("webservices_methods.php");
    $photos = DisplayGalleryForUser($userID,$password,$other_userID,$albumID, true);//DisplayGallery($userID, $albumID,true);

    echo json_encode(array("message" => "SUCCESS", "method" => "GET_PHOTO_FROM_ALBUM", "albums"=>$photos));
}
elseif($action == "UPLOAD_FILE***"){
    $userID 	= $_POST['userID'];
    $albumID    = $_POST['albumID'];
    $type       = $_POST['type'];
    $url        = $_POST['url'];
    $title      = $_POST['title'];
    $comments   = $_POST['comments'];
    $default    = 0;
    $upAdult    = "no";
    $photoFile  = $_FILES;
    if($type == "youtube"){
        $values = array("type"=>$type, "aid"=>$albumID, "url"=>$url, "title"=>$title, "comments"=>$comments);
    }
    else{
        $values = array("type"=>$type, "aid"=>$albumID, "default"=>$default, "title"=>$title, "comments"=>$comments, "upAdult"=>$upAdult, "error"=>1);
    }

    $photos = uploadFileData($userID,$values,$photoFile);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_PHOTO_FROM_ALBUM", "albums"=>$photos));
}
elseif($action == "USER_LOGOUT"){
    $userID 	= $_POST['userID']; 	    // user id
    $logout =logoutUser($userID);
    echo json_encode(array("message" => "SUCCESS", "method" => "USER_LOGOUT", "result"=>$logout));
}
else {
        echo json_encode(array("message" => "NO ACTION", "method" => "CHECK ACTION"));
}


//------ **************************************************************
//------ **************************************************************
//------ **************************************************************

function logoutUser($userID){
    global $DB;
    $DB->Insert("DELETE FROM members_online WHERE logid= ('".$userID."')");
    $DB->Insert("UPDATE members SET video_live ='no' WHERE id= ('".$userID."')");
    $DB->Row("update notification set udid='', os='' where uid='".$userID."'");

    @session_unset($_SESSION['auth']);
    @session_unset($_SESSION['uid']);
    @session_unset($_SESSION['username']);
    @session_unset($_SESSION['packageid']);
    @session_unset($_SESSION['genderid']);
    @session_unset($_SESSION['site_moderator']);
    @session_unset($_SESSION['banned_check']);
    @session_unset($_SESSION['lastlogin']);
    @session_unset($_SESSION['site_moderator_email']);
    @session_unset($_SESSION['site_moderator_edit']);
    @session_unset($_SESSION['site_moderator_delete']);
    @session_unset($_SESSION['pack_name']);
    @session_unset($_SESSION['pack_winks']);
    @session_unset($_SESSION['pack_highlight']);
    @session_unset($_SESSION['pack_messages']);
    @session_unset($_SESSION['pack_files']);
    @session_unset($_SESSION['pack_featured']);

//    setcookie("PHPSESSID", "", time()-3600);
    return "Logout success";
}

function PhotoFormatValidation($Photo_Upload){

    $exts = array('gif' => IMAGETYPE_GIF, 'jpg' => IMAGETYPE_JPEG,  'jpeg' => IMAGETYPE_JPEG, 'png' => IMAGETYPE_PNG);
    $uptypes=array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/x-png', 'image/gif');

    // Start Validation
    if ( isset($Photo_Upload['error']) && $Photo_Upload['error'] > 0 ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE1'];
    }
    /* image sizes */
    if (!$temp = @getimagesize($Photo_Upload['tmp_name'])) {
        $error = $GLOBALS['_LANG_ERROR']['_fileE2'];
    }
    /*  A non-empty file will pass this test. */
    elseif ( $Photo_Upload['size'] ==0 ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE3'];
    }
    /* A correct MIME category will pass this test. Full types are not consistent across browsers. */
    elseif ( ! 'image/' == substr($Photo_Upload['type'], 0, 6) ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE4'];
    }
    /* An acceptable file extension will pass this test. */
    elseif ( ! ( ( 0 !== preg_match('#\.?([^\.]*)$#', $Photo_Upload['name'], $matches) ) && ( $ext = strtolower($matches[1]) ) && array_key_exists($ext, $exts) ) ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE5'];
    }
    /* Extra Image type validation */
    elseif(!in_array($Photo_Upload['type'], $uptypes)){

        $error = str_replace("%s",$Photo_Upload['type'],$GLOBALS['_LANG_ERROR']['_fileE6']);
    }
    /* A valid uploaded file will pass this test. */
    elseif ( ! is_uploaded_file($Photo_Upload['tmp_name']) ){
        $error =  $GLOBALS['_LANG_ERROR']['_fileE7'];;
    }
    elseif ( function_exists('exif_imagetype') && $exts[$ext] != $imagetype = exif_imagetype($Photo_Upload['tmp_name']) ){
        $error =  $GLOBALS['_LANG_ERROR']['_fileE8'];
    }
    /* An image with at least one pixel will pass this test. */
    elseif ( ! ( ( $imagesize = getimagesize($Photo_Upload['tmp_name']) ) && $imagesize[0] > 1 && $imagesize[1] > 1 ) ){
        $error =  $GLOBALS['_LANG_ERROR']['_fileE9'];
    }
    else{
        $error ='1';
    }

    $periodcount=substr_count($Photo_Upload['name'],".");
    if ($periodcount > 1) {
        $error = $GLOBALS['_LANG_ERROR']['_fileE5'];
    }

    return $error;
}

function uploadFileData($userID,$values,$Files){
    global $DB;
    $userID_result = $DB->Row("SELECT username,email,packageid FROM members WHERE id='".$userID."' LIMIT 1");
    $userName = $userID_result['username'];
    ## Define Upload for YouTube Files
    if($values['type'] =="youtube"){

        ## CHECK THIS IS A SAFE LINK AND NOT A HACK FILE
        $YouTubeLinks = array('youtube.com');
        $pos = strpos($values['url'], "youtube.com");
        if ($pos === false) {
            return $GLOBALS['LANG_GALLERY'][5];
        }
        $filter = array(".txt", ".php", ".xml", ".php4", ".net", ".co.uk");
        $values['url'] = str_replace($filter, "", $values['url']);

        ############  ADD YOUTUBE FILE ############
        $url = str_replace('"', '', $values['url']);	## STRIP UNWANTED LINES
        $url = str_replace('\\', '', $values['url']);
        $url = strip_tags($url);
        ############  INSERT DATABASE ENTRY ############
        $today=DATE_NOW;
        ## MAKE APPROVED IF USING AUTO APPROVE
        if(APPROVE_FILES =="yes"){
            $appValue = "no";
        }else{
            $appValue = "yes";
        }
        ##################
        $DB->Insert("INSERT INTO `files` (`id` ,`aid` ,`user` ,`uid` ,`date` ,`title` ,`description` ,`bigimage` ,`width` ,`height` ,`filesize` ,`views` ,`medwidth` ,`medheight` ,`medsize` ,`approved` ,`rating` ,`default` ,`featured` ,`type`)VALUES (NULL , '".$values['aid']."', '".$userName."', '".$userID."', '".$today."', '".strip_tags($values['title'])."', '".strip_tags($values['comments'])."' , '".$url."', NULL , NULL , '0', '0', '0', '0', '0', '".$appValue."', '0.00', '1', 'no', 'youtube')");

        // UPDATE ALBUM FILE COUNT
        $DB->Update("UPDATE album SET filecount=filecount+1 WHERE aid='".$values['aid']."' LIMIT 1");

        $Status = "**complete";

    }else{
        ## Define Upload for Other Media
        include("serviceUpload.php");

        $UploadMax = 0;
        while($UploadMax < 13){

            // IF THE USER DOESNT HAVE AN ALBUM, CREATE ONE
            if(!isset($values['aid'])){ $values['aid']="new";}
            if($values['error'] !=4 && is_array($Files["uploadFile0".$UploadMax]) && $Files["uploadFile0".$UploadMax]['type'] !="" ){ // error 4 = empty file

                $Status = UploadFileService($Files["uploadFile0".$UploadMax], $userID,$userName, strip_tags($values['title']), strip_tags($values['comments']), $values['default'], $values['type'], $values['aid'],$values['upAdult'],$userID_result['packageid']);

            }

            $UploadMax++;
        }


    }

    ############  MANAGE ERROR RESPONCE ############

    $error = explode('**',$Status);
    switch($error[1]){

        case "failed":{

            return "Failed to upload.";

        }break;


        case "complete":{

            ## email admin alter
            sendGalleryMailToAdmin("gallery","gallery", $values, "-**1", $userName);

            return "Complete";

        }break;

        case "space":{

            return "Insufficient space on server";

        }break;

        case "error_musc":{

            return "Error to upload.";

        }break;

        case "error_vdeo":{

            return "Error to upload video.";

        }break;

        case "error_photo":{

            return "Error to upload photo.";

        }break;

        default: {
        return "Invalid";
        } break;
    }
}

function sendGalleryMailToAdmin($page, $subpage, $data, $error="", $userName){
    if(substr($error,-3) !="**1"){
        return;
    }
    if(is_array($data)){
        $CUSTOM="";
        foreach($data as $name => $value){ if(!is_numeric($name) && name !="custom"){
            $CUSTOM .= "<p><strong>".$name."</strong> ".$value."</p>";
        } }
    }
    $SendEmail=0; $data['custom']="";
    if(SEMAIL_FILES =="yes"){
        $data['custom'] .="<h1>".$userName." Uploaded A New File </h1>";
        $EmailID=16;
        $SendEmail=1;
    }
    if($SendEmail ==1){
        include_once("../func/globals.php");
        // lets email the admin to let them know they have a new signup
        $data['email'] = ADMIN_EMAIL;
        $data['custom'] .= $CUSTOM;
        $data['custom'] .= "IP: ".$_SERVER['REMOTE_ADDR'];
        $data['custom'] .="<p></p><p></p><p style='font-size:11px;'>You are receiving this email because you have selected to in the admin settings. </p><p  style='font-size:11px;'> If you dont wish to recieve these emails please login to your admin area and disable this setting under Settings  -> Email Settings.</p>";
        SendTemplateMail($data, SEMAIL_TEMPLATE);


        global $DB;

        $data2 = $DB->Query("SELECT liveEmail, liveEdit, liveDelete, alerts, email FROM members_admin WHERE alerts = 'yes' ");
        while( $mydata = $DB->NextRow($data2) )
        {
            $data['email'] = $mydata['email'];
            $data['custom'] .= $CUSTOM;
            $data['custom'] .= "IP: ".$_SERVER['REMOTE_ADDR'];
            $data['custom'] .="<p></p><p></p><p style='font-size:11px;'>You are receiving this email because you have selected to in the admin settings. </p><p  style='font-size:11px;'> If you dont wish to recieve these emails please login to your admin area and disable this setting under Settings  -> Email Settings.</p>";
            SendTemplateMail($data, SEMAIL_TEMPLATE);
        }
    }
}

//-- Favorite: 1, Block Member: 3
function addToNetworkForFavorite($userID, $favID, $netID){
    global $DB;
    $result = $DB->Row("SELECT count(id) AS found FROM members_network WHERE uid='".$userID."' AND to_uid='".$favID."'  AND TYPE <> 5 LIMIT 1");
    if($result['found']  > 0){
        echo json_encode(array("message" => "FAIL", "method" => "ADD_TO_FAVORITE", "status"=>"This members is already a favorite.")); exit;
    }
    else{
        $val = $DB->Row("SELECT members.username, members.email, members_privacy.friends FROM members_privacy
						INNER JOIN members ON (members_privacy.uid = members.id )
						WHERE members_privacy.uid=('".$favID."') LIMIT 1");
        // MAKE BLOCKED AND HOTLIST MEMBERS AUTO APPROVED
        if($netID ==1 || $netID ==3){
            $app = "yes";

        }else{
            // CHECK IF THIS MEMBER HAS SET THEIR PRIVACY
            // TO AUTO ACCEPT NEW FRIEND REQUESTS
            $app = $val['friends'];
        }

        // FIX FOR CHECKING IF THE MEMBER ALREADY IS LISTED ON THE NETWORK
        $fix = $DB->Row("SELECT approved FROM members_network WHERE to_uid='".$userID."' AND uid='".$favID."' LIMIT 1");
        if(!empty($fix)){	$app="yes";		}

        // IF BLOCKING MEMBER REMOVE THEM FROM FRIENDS LISTS
        if($netID ==3){
            $DB->Insert("DELETE FROM members_network WHERE uid='".$userID."' AND to_uid='".$favID."' ");
            $DB->Insert("DELETE FROM members_network WHERE uid='".$favID."' AND to_uid='".$userID."' ");
        }

        // ADD DATABASE ITEM
        $DB->Update("INSERT INTO `members_network` ( `id` , `uid` , `to_uid` , `date` , `comments` , `type`, approved )
						VALUES (NULL , '".$userID."', '".$favID."', NOW(), '', '".$netID."', '".$app."')");

        // SEND THEM AN EMAIL
        if($netID ==2){ // dont send if its a block list value
            include_once("../func/globals.php");
            $userID_result = $DB->Row("SELECT username,email FROM members WHERE id='".$userID."' LIMIT 1");
            $val['custom']  = "<a href='".DB_DOMAIN."index.php?dll=friends'>".DB_DOMAIN."index.php?dll=friends</a>"; // Must be above the admin_email
            $val['username'] =  $val['username'];
            $val['from_username'] =  $userID_result['username'];
            SendTemplateMail($val, 33);

        }
        if($netID == 3){
            return "You have successfully blocked this member.";
        }
        else{
            return "Member added to your list.";
        }


    }
}

function SendWinkMessage($sendfrom,$sendto){
    global $DB;
    $CurrentRel = $DB->Row("SELECT id,email FROM members WHERE username='".$sendto."' LIMIT 1");

    $userID = $DB->Row("SELECT id,email FROM members WHERE username='".$sendfrom."' LIMIT 1");

    $Total = $DB->Row("SELECT count(wsid) AS countwink FROM winkmessagessend WHERE wink_from='".$userID['id']."' && wink_to='".$CurrentRel['id']."'");
    if($Total['countwink']==0){
        $DB->Update("INSERT into winkmessagessend (wink_from, wink_to, sentondate, onlydate) values ('".$userID['id']."', '".$CurrentRel['id']."', NOW(), '".date("Y-m-d")."')");

        $to = $CurrentRel['email'];

        $subject = 'New Wink Message';

        $headers = "From: RealBlackLove.com <noreply@realbacklove.com>" . "\r\n";
        //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
        //$headers .= "CC: realblacklovellc@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message .= '<div>You have been winked at by '.$sendfrom.', login now to start a conversation.</div>';
        $message .= '<br><br><br>';
        $message .= '<div>Good Luck,</div>';
        $message .= '<div>RBL TEAM</div>';
        $message .= '<div>http://www.realbacklove.com</div>';
        $message .= '</body></html>';

        if(mail($to, $subject, $message, $headers)){
            return "Successfully wink.";
        }
        else{
            return "Error to send wink mail..";
        }
    }
    else{
        return "Allready wink.";
    }

}

function ValidateAccount($data){
    /*
        THIS FUNCTION VALIDATE THE NEW MEMBERS INPUT
        FROM THE REGISTER FORM
    */
    global $DB;

    $bad_username_array = explode(",",BLOCK_USERNAMES);



    ## First lets check this user name isnt already taken
    $check = $DB->Row("select count(username) AS result from members where username='".$data['username']."'");
    if($check['result'] != 0){ return "username"; }

    if(in_array($data['username'], $bad_username_array)){
        return "username";
    }

    ## Check the username characters
    if (!preg_match('/^[\w-]+$/', $data['username'])){
        return "username_chars";
    }

    ## Check the username lenght
    if ( strlen($data['username']) < 5 ) {
        return "username_short";
    }

    ## Lets check the email addresss
    $check2 = $DB->Row("select count(email) AS result from members where email ='".$data['email']."'");
    if($check2['result'] != 0){ return "email"; }

    ## Check the email length
    if ( strlen( $data['email'] ) < 7 ){
        return "invalid_email";
    }


    ## Check the password lenght
    if ( strlen( $data['password'] ) < 4 ){
        return "password_lenght";
    }

    ## CHECK ALL THE FIELDS HAVE BEEN COMPLETED
    //$Exptions =  $data['LinkedRows'];
    $Exptions = 0;
    for($i = 1; $i < 200; $i++) {

        if($data['FieldName'.$i] == "age"){

            if(  ( isset($data['FieldValue'.$i]) && $data['FieldValue'.$i] =="1990-JAN-01" ) ||
                ( isset($data['FieldValue'.$i.'a']) && $data['FieldValue'.$i.'a'] == "0" ) ||
                ( isset($data['FieldValue'.$i.'b']) && $data['FieldValue'.$i.'b'] == "0" ) ||
                ( isset($data['FieldValue'.$i.'c']) && $data['FieldValue'.$i.'c'] == "0" ) )

            {

                return "field_empty";

            }
        }



        if($data['FieldName'.$i] == "headline"){

            if( $data['FieldValue'.$i] == "" ){
                return "field_empty";
            }
        }


        if($data['FieldName'.$i] == "description"){

            if( $data['FieldValue'.$i] == "" ){
                return "field_empty";
            }
        }


        if(isset($data['FieldName'.$i]) && $data['FieldName'.$i] != "" && $data['FieldName'.$i] != "location" && $data['FieldName'.$i] != "em_85820081128"){ // && $data['FieldName'.$i] != "country"

            if(isset($data['FieldValue'.$i]) && ( ( $data['FieldValue'.$i] == "" ) || ( $data['FieldValue'.$i] == '0' ) )  ){
                if($Exptions ==0){
                    return "field_empty";
                }else{
                    $Exptions--;
                }
            }
        }
    }

    // NO ERRORS
    return "complete";
}

function sendMailService($values){

    global $DB;

//    $values = array();
//    $values['to'] = "female1";
//    $values['do'] = "add";
//    $values['do_page'] = "messages";
//    $values['sub'] = "create";
//    $values['addCardID'] = "0";
//    $values['subject'] = "Sample Mail * * *";
//    $values['message1'] = "Hello, this is a sample message ***** ** ** ";
//    $values['idhidden'] = "";
//    $values['message'] = "999999999 ** ";
//    $values['user_id'] = "2860";

    include_once("../func/globals.php");
    include_once("../func/func_messages.php");
    include_once("../API/api_functions.php");


    $ToArray = explode(",",$values['to']);
    foreach($ToArray as $sending_to){
        ## get the userid for this user
        $resultID = $DB->Row("SELECT id FROM members WHERE username='".eMeetingInput($sending_to)."' LIMIT 1");

        $TUID = $resultID['id'];

        //$TUID = GetUserID($sending_to);
        $UploadMax = 0;
        if($TUID ==""){
            return "Please provide user id to send mail.";
        }
        elseif($TUID == $values['user_id']){

            return "Do not send mail to self.";
        }

        if(strlen($values['subject']) < 2 ){

            return "Subject is maximuf of 2 character.";
        }

        $usedimagespace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid= ( '".$values['user_id']."' ) AND type = 'normal' AND maildate='".DATE_NOW."'");

        $sql = "SELECT members_data.gender AS genderD, package.view_adult, package.name, package.wink, members.moderator, package.Highlighted, package.Featured, package.maxMessage, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members
					INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
					LEFT JOIN package ON ( members.packageid = package.pid )
					LEFT JOIN members_data ON ( members.id = members_data.uid )
					WHERE (members.id = '".$TUID."') LIMIT 1";
        $result = $DB->Row($sql);

        if( ($usedimagespace['space'] >= $result['maxMessage']) && D_FREE =="no"){

            return "Your can not send more mail.";

        }
        else{
            ## check the sender isnt blocked
            $blocked = $DB->Row("SELECT count(uid) AS total FROM members_network WHERE type=3 AND to_uid= ( '".$values['user_id']."' ) AND uid= ( '".$TUID."' ) ");
            if($blocked['total'] ==0){

                // SEE IF MEMBER IS BLOCKED WITH THEIR PROVACY
                $PrivacyBlock = $DB->Row("SELECT `Time Zone` AS total FROM members_privacy WHERE uid= ( '".$TUID."' ) LIMIT 1");

                $access_data = explode("*",$PrivacyBlock['total']);
                $access_array = array();
                foreach($access_data as $value){
                    array_push($access_array,$value);
                }

                if( in_array($result['genderD'],$access_array) ){

                    $blocked['total']=1;

                }

                if($blocked['total'] ==0){


                    $BadWords=CreateBadWordFilter();

                    ## make message data safe
                    $iddata = eMeetingInput(filter_str($values['idhidden'],$BadWords));

                    $MessageData 	= eMeetingInput(filter_str($values['message'],$BadWords));

                    $MessageData1 	= eMeetingInput(filter_str($values['message1'],$BadWords));

                    $MessageData =GetMsgNote($MessageData1,$values['user_id']).$MessageData;

                    $MessageSubject = eMeetingInput(filter_str($values['subject'],$BadWords));

                    ## add ecard to message
                    if(isset($values['addCardID']) && $values['addCardID'] != 0){
                        $CardCode ="<p><img src=\"".DB_DOMAIN."images/DEFAULT/_msg/cards/".$values['addCardID'].".jpg\"></p>";
                    }else{
                        $CardCode ="";
                    }

                    ## add smile icons
                    $MessageData  = str_replace(":)","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/grin.gif\" align=\"absmiddle\">", $MessageData);
                    $MessageData  = str_replace(":P","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/tongue.gif\" align=\"absmiddle\">", $MessageData);
                    $MessageData  = str_replace(":>","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/wink.gif\" align=\"absmiddle\">", $MessageData);
                    $MessageData  = str_replace(":(","<img src=\"".DB_DOMAIN."images/DEFAULT/_msg/sad.gif\" align=\"absmiddle\">", $MessageData);


                    $SQL = "SELECT count(*) as total from messages where (mail2id = '".$values['user_id']."' or uid = '".$values['user_id']."') and mail_subject='".$MessageSubject."' ";
                    $result = $DB->Row($SQL);
                    if($iddata!='')
                    {
                        if($result['total'] == 1)
                        {
                            $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
                                        VALUES ('".$values['user_id']."', NULL , '".$TUID."', 'unread', '".DATE_NOW."', '".TIME_NOW."', '".$MessageSubject."', '".$MessageData.$CardCode."', '1', 'sent', 'inbox')");
                            $message_id = $DB->InsertID();

                        }
                        else if($result['total'] == 2)
                        {
                            $b = "UPDATE `messages` SET maildate='".DATE_NOW."', mailtime='".TIME_NOW."', mail_message='".$MessageData.$CardCode."', mailstatus='unread' WHERE mail_subject='".$MessageSubject."' and uid='".$values['user_id']."'   LIMIT 1";
                            $DB->Update($b);
                        }
                        $c = "UPDATE `messages` SET maildate='".DATE_NOW."', mailtime='".TIME_NOW."', mail_message='".$MessageData.$CardCode."' WHERE mail_subject='".$MessageSubject."' and mail2id='".$values['user_id']."' LIMIT 1";
                        $DB->Update($c);
                        ## insert message into the database

                    }
                    else
                    {
                        $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
                                    VALUES ('".$values['user_id']."', NULL , '".$TUID."', 'unread', '".DATE_NOW."', '".TIME_NOW."', '".$MessageSubject."', '".$MessageData.$CardCode."', '1', 'sent', 'inbox')");
                        $message_id = $DB->InsertID();
                    }

                    ## add images to the message
                    if(!empty($Files)){

                        while($UploadMax < 5){

                            ## if no album is selected, create a new one
                            if(!isset($values['aid'])){ $values['aid']="new";}

                            ## check for file error before uploading
                            if( ( $values['error'] !=4 )  && is_array($Files["uploadFile0".$UploadMax]) && $Files["uploadFile0".$UploadMax]['type'] !="" ){ // error 4 = empty file

                                $Status = UploadFile($Files["uploadFile0".$UploadMax], $values['user_id'], "Message Photo", "Message Photo", $message_id, "photo", "none","no");

                            }

                            $UploadMax++;

                        }
                    }
                    ## Send Alert Message
                    DoEmailSMS($TUID,5,'email_msg',substr($MessageData,0,30));


                }
                else{

                    return "User Block";

                }

            }
        }
    }
    return "Success Send message";
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

        $SQL = "SELECT members.*,winkmessagessend.read_status as read_status from winkmessagessend inner join members on members.id = winkmessagessend.wink_from WHERE wink_to='" . $id . "' && onlydate = '" . $date . "'";
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

?>