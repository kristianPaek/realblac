<?php
session_start();

function checkUserLogin($username, $password){

    global $DB;

    $username = trim(strip_tags($username));
    $password = trim(strip_tags($password));

    $sql = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid,members.email, members.lastlogin, members_privacy.Language,members.hits, members.visible FROM members
				INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
				LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid )
				LEFT JOIN members_data ON ( members.id = members_data.uid )
				LEFT JOIN package ON ( members.packageid = package.pid )
		  		WHERE ( members.username = '".$username."' OR members.email='".$username."' ) ";
    if(D_MD5 ==1){
        define('OW_PASSWORD_SALT', '4f94930cd4ff3');
        $myhash = hash('sha256', OW_PASSWORD_SALT . $password);
        $sql .="AND members.password = '".$myhash."' LIMIT 1";

    }else{
        $sql .="AND members.password = '".$password."' LIMIT 1";
    }

    $result = $DB->Row($sql);

    if ( is_array($result) ) {

        if($result['active'] =="suspended"){

            return array("message" => "FAIL", "method" => "LOGIN", "status"=> "Your account has been suspended. Please email us at contact@realblacklove.com.");


        }elseif($result['activate_code'] != "OK" && VALIDATE_EMAIL ==1){

            CheckUpgradeNew($result['id'], $result['packageid']);
            $users_date = setSessionNew($result, 1);
            return array("message" => "SUCCESS", "overviewData" => $users_date, "method" => "LOGIN");

        }elseif($result['active'] =="unapproved" && $result['activate_code'] = "OK"){
            $result['active'] = 'active';
            CheckUpgradeNew($result['id'], $result['packageid']);
            $users_date = setSessionNew($result, 1);
            return array("message" => "SUCCESS", "overviewData" => $users_date, "method" => "LOGIN");

        }else{

            CheckUpgradeNew($result['id'], $result['packageid']);
            $users_date = setSessionNew($result, 1);
            return array("message" => "SUCCESS", "overviewData" => $users_date, "method" => "LOGIN");
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
    $result1 = $DB->Row("SELECT * FROM files WHERE uid='".$values['id']."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");
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

    $notifications = $DB->Query("select content from notification_board");
    $notification = array();
    while ($Data = $DB->NextRow($notifications)) {
        $notification[] = array("content"=>$Data['content']);
    }


    $overviewData = array(
        "sessionID"             => $_SESSION['sessionid'],
        "user_id"               => $values['id'],
        "user_name"             => eMeetingOutput($values['username']),
        "email"                 => $values['email'],
        "auth"                  => $_SESSION['auth'],
        "image"                 => ReturnDeImageNew($result1,"medium",$_SESSION['uid'],$adult_result['view_adult']),
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
        "total_new_emails"      => $emails_result['totalCount'],
        "total_new_winks"       => getWinkCount($_SESSION['uid']),
        "visible"               => $_SESSION['visible'],
        "albums"                => $albums,
        "notification"          => $notification
    );
    return $overviewData;
}

function getLoggedInUserDetails($userid){

    global $DB;

    $userid = trim(strip_tags($userid));

    $sql = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username,members.hits, members.packageid,members.session,members.email , members.lastlogin, members_privacy.Language, members.visible FROM members
				INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
				LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid )
				LEFT JOIN members_data ON ( members.id = members_data.uid )
				LEFT JOIN package ON ( members.packageid = package.pid )
		  		WHERE ( members.id = '".$userid."') ";

    $values = $DB->Row($sql);

    $emails_result = $DB->Row("SELECT COUNT( mailstatus ) AS totalCount FROM messages WHERE mail2id = '".$values['id']."' AND mailstatus = 'unread' AND to_box =  'inbox'");

    $result1 = $DB->Row("SELECT * FROM files WHERE uid='".$values['id']."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");

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

    $notifications = $DB->Query("select content from notification_board");
    $notification = array();
    while ($Data = $DB->NextRow($notifications)) {
        $notification[] = array("content"=>$Data['content']);
    }
    
    $overviewData = array(
        "sessionID"             => $values['session'],
        "user_id"               => $values['id'],
        "user_name"             => eMeetingOutput($values['username']),
        "email"                 => $values['email'],
        "auth"                  => "yes",
        "image"                 => ReturnDeImageNew($result1,"medium",$values['id'],$adult_result['view_adult']),
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
        "visible"               => $values['visible'],
        "total_new_emails"      => $emails_result['totalCount'],
        "total_new_winks"       => getWinkCount($values['id']),
        "albums"                => $albums,
        "notification"          => $notification
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