<?php
session_start();    

//-- Config file and DB connection
//date_default_timezone_set('EST');

include '../config.php';
include '../config_db.php';
include_once('../API/api_functions.php');
include_once('../func/func_forums.php');
include_once('../func/globals.php');
//include_once('../../newadmin/inc/func/admin_globals.php');
include_once('../func/func_mobile_profile_page.php');
//-- Get action to be performed

$action = $_POST['action'];
//die('action');
if($action == "LOGIN"){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $deviceUDID = $_POST['UDID'];
    $OS = $_POST['os'];

    include_once("fun_login.php");
    $user_date = checkUserLogin($username, $password);

    include_once("fun_push_notification.php");
    setUDID($username, $deviceUDID, $OS);

    echo json_encode($user_date); exit();
}
else if ($action == "REG_UUID") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $deviceUDID = $_POST['UDID'];
    $OS = $_POST['os'];

    include_once("fun_push_notification.php");
    setUDID($username, $deviceUDID, $OS);
}
elseif($action == "REFRESH_HOME_PAGE") {
    $user_id = $_POST['user_id'];

    include_once("fun_login.php");
    $user_date = getLoggedInUserDetails($user_id);
    echo json_encode(array("message" => "SUCCESS", "overviewData" => $user_date, "method" => "REFRESH_HOME_PAGE"));exit();
}
elseif($action == "SIGNUP_FORM"){

    include_once("fun_sign_form_data.php");
    $result = DisplaySignupFieldsNew(0);
    echo json_encode($result);
}
elseif($action == "GET_MAIL"){
    $user_id    = $_POST['user_id'];
    $box        = $_POST['box_type'];
    $sort_by    = $_POST['sort_by'];
    $start      = $_POST['start'];
    $end        = $_POST['end'];

    include_once("fun_message.php");
    $messages = GetMessage($user_id, $box, $sort_by, $start, $end);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_MAIL", "mail_records"=>$messages));
}
elseif($action == "GET_MAIL_NEW"){
    $user_id    = $_POST['user_id'];
    $box        = $_POST['box_type'];
    $sort_by    = $_POST['sort_by'];
    $start      = $_POST['start'];
    $end        = $_POST['end'];
 
    include_once("fun_message_new.php");
    $messages = GetMessage($user_id, $box, $sort_by, $start, $end);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_MAIL", "mail_records"=>$messages));
}
elseif($action == "WHO_VIEWED_MY_PROFILE"){
    $user_id = $_POST['user_id'];
    include_once("fun_profile.php");
    $arryHistory = whoViewMyProfile($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "WHO_VIEWED_MY_PROFILE", "history"=>$arryHistory));
}
elseif($action == "WHOS_ONLINE"){

    $user_id = $_POST['user_id'];
    $page = $_POST['page'];
    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");
    $users = GetProfiles($user_id, array(), $page, array("dll" => "search", "view_page" => 1  ),"WHOS_ONLINE");
    echo json_encode(array("message" => "SUCCESS", "method" => "WHOS_ONLINE", "users"=>$users));
}
elseif($action == "WHOS_ONLINE_NEW"){

    $user_id = $_POST['user_id'];
    $page = $_POST['page'];
    if($page == ''){
        $page = 1;
    }
    include_once("fun_search_new.php");
    $users = GetProfiles($user_id, array(), $page, array("dll" => "search", "view_page" => 1  ),"WHOS_ONLINE");
    echo json_encode(array("message" => "SUCCESS", "method" => "WHOS_ONLINE", "users"=>$users));
}
elseif($action == "SEARCH_BY_BASIC_INFO"){
    $user_id = $_POST['user_id'];
    $state  = $_POST['state_code'];
    $age1  = $_POST['age1'];
    $age2  = $_POST['age2'];
    $has_photos  = $_POST['has_photos'];
    $Online_Now  = $_POST['Online_Now'];
    $Joined_Today = $_POST['Joined_Today'];
    $joined_in_last = $_POST['joined_in_last'];
    $sort_by = $_POST['sort_by'];
    $page = $_POST['page'];
    if($page == ''){
        $page = 1;
    }

    include_once("fun_search.php");
    $Extra = array("zero"=>1, "age1"=>$age1, "age2"=>$age2,"pics"=>$has_photos,"newtoday"=>$Joined_Today,"online"=>$Online_Now, "period"=>$joined_in_last, "sort"=>$sort_by);

    $pageGet = array(
        "do_page"=>"search", "page"=>$page,
        "Extra"=>$Extra,
        "SeV"=>array("1"=>$state),
        "SeT"=>array("1"=>3, "2"=>7),
        "SeN"=>array("1"=>"em_85820081128", "2"=>"age"),
        "TotalNumberOfRows"=>3,
        "submit"=>"Search"
    );

    $users = GetProfiles($user_id, $pageGet, $page, array("dll" => "search", "view_page" => 1));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH_BY_BASIC_INFO", "users"=>$users));
}
else if ($action == "SEARCH_BASIC_INFO") {
    $user_id        = $_POST['user_id'];   
    $state          = $_POST['state'];
    $min_age        = $_POST['min_age'];
    $max_age        = $_POST['max_age'];
    $has_photo      = $_POST['has_photo'];
    $online         = $_POST['online'];
    $join_today     = $_POST['join_today'];
    $last_join      = $_POST['last_join'];
    $sort_member    = $_POST['sort_member'];
    $distance       = $_POST['distance'];
    $zipcode        = $_POST['zipcode'];
    $race           = $_POST['race'];
    $height_short   = $_POST['height_short'];
    $height_high    = $_POST['height_high'];
    $body_type      = $_POST['body_type'];
    $education      = $_POST['education'];
    $religion       = $_POST['religion'];
    $kids           = $_POST['kids'];
    $marriage       = $_POST['marriage'];
    $smoking        = $_POST['smoking'];
    $drinking       = $_POST['drinking'];
    $page           = $_POST['page'];
    if ($page == '')
        $page = 1;

    include_once("fun_search_new.php");
    $Extra = array("zero"=>1, "age1"=>$min_age, "age2"=>$max_age,"pics"=>$has_photo,"newtoday"=>$join_today,"online"=>$online, "period"=>$last_join, "sort"=>$sort_member,
                    "state"=>$state, "distance"=>$distance, "zipcode"=>$zipcode, "race"=>$race, "height_short"=>$height_short, "height_high"=>$height_high, "body_type"=>$body_type, "education"=>$education,
                    "religion"=>$religion, "kids"=>$kids, "marriage"=>$marriage, "smoking"=>$smoking, "drinking"=>$drinking);

    $pageGet = array(
        "do_page"=>"search", "page"=>$page,
        "Extra"=>$Extra,
        "SeV"=>array("1"=>$state),
        "SeT"=>array("1"=>3, "2"=>7),
        "SeN"=>array("1"=>"em_85820081128", "2"=>"age"),
        "TotalNumberOfRows"=>3,
        "submit"=>"Search"
    );

    $users = GetProfiles($user_id, $pageGet, $page, array("dll" => "search", "view_page" => 1));

    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH_BASIC_INFO", "users"=>$users));
}
elseif($action == "SEARCH_BY_USERNAME"){
    $user_id = $_POST['user_id'];
    $username  = $_POST['username'];
    $page = $_POST['page'];

    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");
    $Extra = array("zero"=>1, "keyword"=>$username, "keyword_username"=>1);

    $pageGet = array(
        "do_page"=>"search",
        "page"=>$page,
        "Extra"=>$Extra,
        "submit"=>"Search"
    );

    $users = GetProfiles($user_id, $pageGet, $page, array("dll" => "search", "view_page" => 1));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH_BY_USERNAME", "users"=>$users));
}
elseif($action == "SEARCH_BY_USERNAME_NEW"){
    $user_id = $_POST['user_id'];
    $username  = $_POST['username'];
    $page = $_POST['page'];

    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");
    $Extra = array("zero"=>1, "keyword"=>$username, "keyword_username"=>1);

    $pageGet = array(
        "do_page"=>"search",
        "page"=>$page,
        "Extra"=>$Extra,
        "submit"=>"Search"
    );

    $users = GetProfiles($user_id, $pageGet, $page, array("dll" => "search", "view_page" => 1));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH_BY_USERNAME", "users"=>$users));
}
elseif($action == "SEARCH_BY_KEYWORD"){
    $user_id = trim(strip_tags($_POST['user_id']));
    $username  = $_POST['keyword'];
    $page = $_POST['page'];

    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");
    $Extra = array("zero"=>1, "keyword"=>$username, "keyword_description"=>1, "keyword_headline"=>1);

    $pageGet = array(
        "do_page"=>"search",
        "page"=>$page,
        "Extra"=>$Extra,
        "submit"=>"Search"
    );

    $users = GetProfiles($user_id, $pageGet, $page, array("dll" => "search", "view_page" => 1));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH_BY_KEYWORD", "users"=>$users));
}
elseif($action == "GET_PHOTO_ALBUM"){
    $user_id 	= $_POST['userID'];

    include_once("fun_gallery.php");
    $albums = showAlbums($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_PHOTO_ALBUM", "albums"=>$albums));
}
elseif($action == "GET_PHOTO_FROM_ALBUM"){
    $userID 	= $_POST['user_id'];
    $albumOwnerID = $_POST['album_owner_id'];
    $albumID    = $_POST['albumID'];
    $albumPass = $_POST['album_password'];
    include_once("fun_gallery.php");
    $albums = showAlbumPhotos($userID,$albumOwnerID, $albumID, $albumPass, true);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_PHOTO_FROM_ALBUM", "photos"=>$albums));
}
elseif($action == "MY_PROFILE"){
    $user_id 	= $_POST['user_id'];
    $userID_Lresult = $DB->Row("SELECT location FROM members_data WHERE uid='".$user_id."' LIMIT 1");
    $UserLocation =  $userID_Lresult['location'];
    $visitor_uid = $_REQUEST['visitor_uid'];
    
    if(!empty($visitor_uid) && $user_id !=$visitor_uid)
    {
       $DB->Insert("INSERT INTO `visited` (uid ,view_uid ,date)VALUES ('".$visitor_uid."', '".$user_id ."', NOW())");
    }
    
    include_once("fun_profile.php");
    $profileData = getMayProfileData($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "MY_PROFILE", "profile"=>$profileData, "LocationName"=>$UserLocation));
}

elseif($action == "GET_EDIT_PROFILE"){
    $user_id 	= $_REQUEST['user_id'];

    include_once("fun_profile.php");
    $profileData = getMayEditProfileData($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_EDIT_PROFILE", "profile"=>$profileData));
}
elseif($action == "PUT_EDIT_PROFILE"){
    $user_id 	= $_REQUEST['user_id'];
    include_once("fun_profile.php");
    $profileData = putMayEditProfileData($user_id,$_REQUEST);
    echo json_encode(array("message" => "SUCCESS", "method" => "PUT_EDIT_PROFILE", "profile"=>$profileData));
}
elseif($action == "PUT_EDIT_PROFILE_TEST"){
    $user_id    = $_REQUEST['user_id'];
    include_once("fun_profile.php");
    $profileData = putMayEditProfileData_TEST($user_id,$_REQUEST);
    echo json_encode(array("message" => "SUCCESS", "method" => "PUT_EDIT_PROFILE", "profile"=>$profileData));
}
elseif($action == "OPEN_MAIL"){
    $user_id 	= $_POST['user_id'];
    $mail_id    = $_POST['mail_id'];

    include_once("fun_message.php");
    $message = GetMsgDataForUser($user_id, $mail_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "OPEN_MAIL", "mail_data"=>$message));
}
elseif($action == "OPEN_MAIL_NEW"){
    $user_id    = $_POST['user_id'];
    $mail_room_id    = $_POST['mail_id'];

    include_once("fun_message_new.php");
    $message = GetMsgDataForUser($user_id, $mail_room_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "OPEN_MAIL", "mail_data"=>$message));
}
elseif($action == "CHANGE_MY_PHOTO"){
    $user_id = trim(strip_tags($_POST['user_id']));
    $imageName = trim(strip_tags($_POST['imageName']));
    include_once("serviceUploadFile.php");
    $result = changeMainPhoto($user_id, $imageName);
    echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_MY_PHOTO", "history"=>$result));
}
elseif($action == "VISIT_PROFILE"){
    $user_id = $_POST['user_id'];
    include_once("fun_profile.php");
    $result = getMemberProfileData($user_id, 2,1);
    echo json_encode(array("message" => "SUCCESS", "method" => "VISIT_PROFILE", "user"=>$result));
}
elseif($action == "CHANGE_SETTINGS"){
    $user_id = trim(strip_tags($_POST['user_id']));
    $email = trim(strip_tags($_POST['email']));
    $email_msg = trim(strip_tags($_POST['messagealert']));
    $email_winks = trim(strip_tags($_POST['winkalert']));
    include_once("updateInfo.php");
    $result = updateInformation($user_id,$email,$email_msg,$email_winks);
    echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_SETTINGS", "status"=>$result));
}

elseif($action == "CHANGE_PASSWORD"){
    $user_id = $_POST['user_id'];
    $cpassword = $_POST['cpassword'];
    $npassword = $_POST['npassword'];
    include_once("updateInfo.php");
    $result = updatePassword($user_id, $cpassword, $npassword);
    if($result == "Password Updated"){
        echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_PASSWORD", "status"=>$result));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "CHANGE_PASSWORD", "status"=>$result));
    }

}
elseif($action == "SEND_MESSAGE"){
    //$user_id = trim(strip_tags($_POST['user_id']));
    $values = array();
    $values['to'] = $_POST["to"];
    $values['do'] = "add";
    $values['do_page'] = "messages";
    $values['sub'] = "create";
    $values['addCardID'] = 0;
    $values['idhidden'] = $_POST['idhidden'];
    if($values['idhidden'] != ''){
        $values['StopConfigStrip'] = 1;
    }
    $values['subject'] = $_POST["subject"];
    $values['message1'] = $_POST["message1"];

    $values['message'] = "";//$_POST["message"];
    $values['user_id'] = $_POST["user_id"];    

    include_once("fun_message.php");
    $send_mail = sendMessage($values);

    if($send_mail == "Your message has been sent."){
        echo json_encode(array("message" => "SUCCESS", "method" => "SEND_MESSAGE", "status"=>$send_mail));
    }
    else{
        echo json_encode(array("message" => "FAIL", "method" => "SEND_MESSAGE", "status"=>$send_mail));
    }
}
elseif($action == "SEND_MESSAGE_NEW"){
    
    $values = array();
    $values['to'] = $_POST["to"];
    $values['do'] = "add";
    $values['do_page'] = "messages";
    $values['sub'] = "create";
    $values['addCardID'] = 0;
    $values['idhidden'] = $_POST['idhidden'];
    if($values['idhidden'] != ''){
        $values['StopConfigStrip'] = 1;
    }
    $values['subject'] = $_POST["subject"];
    $values['message1'] = $_POST["message1"];

    $values['message'] = "";
    $values['user_id'] = $_POST["user_id"];    

    include_once("fun_message_new.php");
    $send_mail = sendMessage($values);

    if($send_mail == "Your message has been sent."){
        echo json_encode(array("message" => "SUCCESS", "method" => "SEND_MESSAGE", "status"=>$send_mail));
    }
    else{
        echo json_encode(array("message" => "FAIL", "method" => "SEND_MESSAGE", "status"=>$send_mail));
    }
}
elseif($action == "SEND_MESSAGE_NEW1"){
    
    $values = array();
    $values['to'] = $_POST["to"];
    $values['do'] = "add";
    $values['do_page'] = "messages";
    $values['sub'] = "create";
    $values['addCardID'] = 0;
    $values['idhidden'] = $_POST['idhidden'];
    if($values['idhidden'] != ''){
        $values['StopConfigStrip'] = 1;
    }
    $values['subject'] = $_POST["subject"];
    $values['message1'] = $_POST["message1"];

    $values['message'] = "";
    $values['user_id'] = $_POST["user_id"];    

    include_once("fun_message_new.php");
    $send_mail = sendMessage1($values);

//    if($send_mail == "Your message has been sent."){
        echo json_encode(array("message" => "SUCCESS", "method" => "SEND_MESSAGE", "status"=>$send_mail));
//    }
//    else{
//        echo json_encode(array("message" => "FAIL", "method" => "SEND_MESSAGE", "status"=>$send_mail));
//    }
}
elseif($action == "SEND_WINK"){
    $sendfrom 	= $_POST['sendfrom_username']; 	    // user id
    $sendto 	= $_POST['sendto_username']; 	    // user id

    include_once("fun_message.php");
    $result = SendWinkMessageNew($sendfrom,$sendto);
    echo json_encode(array("message" => "SUCCESS", "method" => "SEND_WINK", "status"=>$result));
}
elseif($action == "GETTING_FAVORITE_LIST"){
    $user_id = $_POST['user_id'];
    $page = $_POST['page'];

    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");

    $users = GetProfiles($user_id, array(), $page, array("dll" => "search", "friendid" => $user_id, "friend_type"=>1, "displaytype"=>"detail"));
    echo json_encode(array("message" => "SUCCESS", "method" => "GETTING_FAVORITE_LIST", "users"=>$users));
}
elseif($action == "GETTING_BLOCKED_MEMBERS"){
    $user_id = $_POST['user_id'];
    $page = $_POST['page'];

    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");

    $users = GetProfiles($user_id, array(), $page, array("dll" => "search", "friendid" => $user_id, "friend_type"=>3, "displaytype"=>"detail"));
    echo json_encode(array("message" => "SUCCESS", "method" => "GETTING_BLOCKED_MEMBERS", "users"=>$users));
}
elseif($action == "REMOVE_FROM_FAVORITE"){
    $uid	    = $_POST['user_id'];
    $del_uid	= $_POST['remove_uid'];
    $netID 	= trim(strip_tags($_POST['netID']));
    //$netid		= trim(strip_tags($_GET['netid']));

    include_once("fun_common_api.php");
    $result = deleteNetworkFromFavorite($uid,$del_uid,1);
    echo json_encode(array("message" => "SUCCESS", "method" => "REMOVE_FROM_FAVORITE", "status"=>$result));
}
elseif($action == "REMOVE_FROM_BLOCKED"){
    $uid	    = $_POST['user_id'];
    $del_uid	= $_POST['remove_uid'];

    include_once("fun_common_api.php");
    $result = deleteNetworkFromFavorite($uid,$del_uid,3);

    echo json_encode(array("message" => "SUCCESS", "method" => "REMOVE_FROM_BLOCKED", "status"=>"You have unblocked this member."));
}
elseif($action == "DELETE_MAIL"){
    $uid	    = trim(strip_tags($_POST['user_id']));
    $del_meil_ids	= trim(strip_tags($_POST['mail_ids']));
    $box_type       = trim(strip_tags($_POST['box_type']));

    include_once("fun_message.php");
    $result = deleteMessageFromBox($uid, $del_meil_ids,$box_type);
    echo json_encode(array("message" => "SUCCESS", "method" => "DELETE_MAIL", "status"=>$result));
}
elseif($action == "DELETE_MAIL_NEW"){
    $uid        = trim(strip_tags($_POST['user_id']));
    $del_meil_ids   = trim(strip_tags($_POST['mail_ids']));
    $box_type       = trim(strip_tags($_POST['box_type']));

    include_once("fun_message_new.php");
    $result = deleteMessageFromBox($uid, $del_meil_ids,$box_type);
    echo json_encode(array("message" => "SUCCESS", "method" => "DELETE_MAIL", "status"=>$result));
}
elseif($action == "VISIT_PROFILE_HIT_COUNT"){
    $user_id	    = trim(strip_tags($_POST['user_id']));
    $visit_user_id	= trim(strip_tags($_POST['visit_user_id']));

    include_once("fun_profile.php");
    $hitResult = AddVisitorCountForUser($user_id, $visit_user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "VISIT_PROFILE_HIT_COUNT", "status"=>$hitResult));

}
elseif($action == "UPLOAD_PHOTO_ON_SERVER"){

    $userID 	= $_POST['user_id'];
    $albumID    = $_POST['albumID'];
    $type       = $_POST['type'];
    $url        = $_POST['url'];
    $title      = $_POST['title'];
    $comments   = $_POST['comments'];
    $default    = 0;
    $upAdult    = "no";

    include_once("fun_upload_file.php");
    $UploadMax = 0;
    while($UploadMax < 25){
        $photoFile  = $_FILES["uploadFile0".$UploadMax];
        // IF THE USER DOESNT HAVE AN ALBUM, CREATE ONE
        if(!isset($values['aid'])){ $values['aid']="new";}
        if($photoFile['error'] !=4 && is_array($_FILES["uploadFile0".$UploadMax]) && $_FILES["uploadFile0".$UploadMax]['type'] !="" ){ // error 4 = empty file

            $Status = UploadFileNew($_FILES["uploadFile0".$UploadMax], $userID, strip_tags($title), strip_tags($comments), $default, $type, $albumID,$upAdult);

        }

        $UploadMax++;
    }

    if($Status == "**complete"){
        //CheckAdminEmail("gallery","gallery", $values, "-**1");
        echo json_encode(array("message" => "SUCCESS", "method" => "UPLOAD_PHOTO_ON_SERVER", "status"=>"Photo uploaded successfully."));
    }
    else{
        echo json_encode(array("message" => "FAIL", "method" => "UPLOAD_PHOTO_ON_SERVER", "status"=>$Status));
    }
}
elseif($action == "SUBSCRIPTION_DETAILS"){
    include_once("../langs/english.php");
    include_once("fun_upgrade.php");

    $show_page = 'home';
    $show_payment_types = DisplayPaymentCode();
    $show_packages = DisplayPackages();

    $PageDesc = array();
    $PageDesc[] = "Become a VIP Member now to send Unlimited Messages & Upload 25 photos.";
    $PageDesc[] = "Choose your VIP upgrade below.";
    $PageDesc[] = "";
    $PageDesc[] = "";
    $PageDesc[] = "USE COUPON CODE: BlackLove";
    $PageDesc[] = "Offer Expires Soon!";

    $package_responce = array();
    $package_responce['details'] = $PageDesc;
    $package_responce['code'] = "BlackLove";
    $package_responce['packages'] = $show_packages;
    $package_responce['payment_type'] = $show_payment_types;

    echo json_encode(array("message" => "SUCCESS", "method" => "SUBSCRIPTION_DETAILS", "details"=>$package_responce));
}
elseif($action == "SUBSCRIPTION_DATA_SAVED_ON_SERVER"){
    $responce_code = $_POST['responce_code'];
    $responce_data = $_POST['responce_data'];
    $userID = $_POST['userID'];
    $packageID = $_POST['packageID'];
    $email = $_POST['email'];
    $transID = $_POST['transID'];

    include_once('fun_authorize.php');
    $res = makeSubscriptionTransaction($responce_code, $responce_data, $userID,$packageID, $email, $transID);
    if($res == "success"){
        echo json_encode(array("message" => "SUCCESS", "method" => "SUBSCRIPTION_DATA_SAVED_ON_SERVER", "details"=>"Subscription complete"));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "SUBSCRIPTION_DATA_SAVED_ON_SERVER", "status"=>"Your transaction is not valid, Please contact to admin"));
    }
}
elseif($action == "DELETE_PHOTO"){
    $photoID = $_POST['photo_id'];

    include_once("fun_gallery.php");
    if(DelateUserFile($photoID)){
        echo json_encode(array("message" => "SUCCESS", "method" => "DELETE_PHOTO", "status"=>"Photo successfully deleted."));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "DELETE_PHOTO", "status"=>"Photo not available."));
    }
}
elseif($action == "ROTATE_PHOTO"){
    $photo_name = $_POST['image_name'];

    include_once("fun_gallery.php");
    if(rotateImageWith90($photo_name)){
        echo json_encode(array("message" => "SUCCESS", "method" => "ROTATE_PHOTO", "status"=>"Photo successfully rotated."));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "ROTATE_PHOTO", "status"=>"Your photo not available."));
    }
}
elseif($action == "OPEN_WINK"){
    global $DB;
    $SQL = "update winkmessagessend set read_status = 1 where wsid='".$_POST['wink_id']."'";
    $Data = $DB->Query($SQL);
    echo json_encode(array("message" => "SUCCESS", "method" => "OPEN_WINK", "status"=>"Your wink successfully read."));
}
elseif($action == "APPLY_CODE"){
    $code 	= $_POST['code'];
    echo json_encode(applyCode($code));
}
elseif($action == "DELETE_USER"){
    $userID = $_POST['user_id'];

    include_once("fun_login.php");
    $result = deleteUserProfile($userID);

    if($result == "complete"){
        echo json_encode(array("message" => "SUCCESS", "method" => "DELETE_USER", "status"=>"We are sorry to see you go. Your request has been sent to member services and your profile will be deleted within 24-72 hours."));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "DELETE_USER", "status"=>$result));
    }
}
elseif ($action == "DEACTIVE_ACCOUNT") {
    $user_id = $_POST['user_id'];

    include_once("fun_login.php");
    $result = deactiveAccount($user_id);

    if ($result == "complete") {
        echo json_encode(array("message" => "SUCCESS", "method"=>"DEACTIVE_ACCOUNT"));
    } 
    else {
        echo json_encode(array("message" => "FAILED", "method"=>"DEACTIVE_ACCOUNT"));
    }
}
elseif ($action == "ACTIVE_ACCOUNT") {
    $user_id = $_POST['user_id'];

    include_once("fun_login.php");
    $result = activeAccount($user_id);

    if ($result == "complete") {
        echo json_encode(array("message" => "SUCCESS"));
    } 
    else {
        echo json_encode(array("message" => "FAILED"));
    }
}
elseif($action == "FORGOT_PASSWORD"){
    $email = $_POST['email'];

    include_once("fun_login.php");
    $result = ForgottenUserPassword($email);

    if($result == "complete"){
        echo json_encode(array("message" => "SUCCESS", "method" => "FORGOT_PASSWORD", "status"=>"Thank You. We have sent a new password to your email. Check your junk/spam folder if you do not see our email in your inbox."));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "FORGOT_PASSWORD", "status"=>$result));
    }
}
elseif($action == "ADD_TO_FAVORITE"){
    $userID 	= $_POST['userID']; 	    // user id
    $fav_id 	= $_POST['fav_id']; 	    // user id
    $netID 	= trim(strip_tags($_POST['netID']));
    $result = addToNetworkForFavorite($userID, $fav_id, $netID);
    echo json_encode(array("message" => "SUCCESS", "method" => "ADD_TO_FAVORITE", "status"=>$result));
}
elseif($action == "USER_LOGOUT"){
    $userID 	= $_POST['userID']; 	    // user id
    $logout =logoutUser($userID);
    echo json_encode(array("message" => "SUCCESS", "method" => "USER_LOGOUT", "result"=>$logout));
}
elseif($action == "IN_APP_PURCHASE"){
    include_once "../../plugins/plugins/payment_authorize.php";
    echo json_encode(array("message" => "SUCCESS", "method" => "IN_APP_PURCHASE", "status"=>""));
}
else if ($action == "GEO_SEARCH") {
    $zip_code = $_POST['zip_code'];
    $distance = $_POST['distance'];

    include_once("zipcode.php");
    $portland = new ZipCode($zip_code);

    foreach ($portland->getZipsInRange(0, $distance) as $miles => $zip) {    
        $miles = round($miles, 1);
        echo "Zip code : $zip is $miles miles away from "
            ." $portland ({$zip->getCounty()} county)<br/>";
    }
}
else if ($action == "GET_MYMATCH_INFO") {
    $user_id = $_POST['user_id'];

    include_once("fun_mymatch.php");
    $result = GetMyMatchInfo($user_id);

    echo json_encode(array("response" => "SUCCESS", "result"=>$result));
}
else if ($action == "SAVE_MYMATCH_INFO") {
    $user_id = $_POST['user_id'];
    $min_age = $_POST['min_age'];
    $max_age = $_POST['max_age'];
    $race = $_POST['race'];
    $min_height = $_POST['height_min'];
    $max_height = $_POST['height_max'];
    $body_type = $_POST['body_type'];
    $education = $_POST['education'];
    $kids = $_POST['kids'];

    include_once("fun_mymatch.php");
    $result = SaveMyMatchInfo($user_id, $min_age, $max_age, $race, $min_height, $max_height, $body_type, $education, $kids);

    echo json_encode(array("response" => "SUCCESS", "result"=>$result));
}
else if ($action == "SAVE_PUSH_SETTING") {
    $user_id = $_POST['user_id'];
    $push_setting = $_POST['PushSetting'];

    include_once("fun_push_notification.php");
    setPushSetting($user_id, $push_setting);

    echo json_encode(array("response"=>"SUCCESS"));
}
else if ($action == "GET_PUSH_SETTING") {
    $user_id = $_POST['user_id'];

    include_once("fun_push_notification.php");
    $push_setting = getPushSetting($user_id);

    echo json_encode(array("response"=>"SUCCESS", "message"=>$push_setting));
}
else if ($action == "TEST") {
    $user_id = $_POST['user_id'];

    include_once("fun_test.php");
    $result = test($user_id);
    echo json_encode($result);
}
else{
    echo json_encode(array("message" => "NO ACTION", "method" => "CHECK ACTION"));
}



/*
 * ****************************************
 * ****************************************
 * ************ Local Methods *************
 * ****************************************
 * ****************************************
 */

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

    return "Logout success";
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

//-- Favorite: 1, Block Member: 3
function addToNetworkForFavorite($userID, $favID, $netID){
    global $DB;
    $result = $DB->Row("SELECT count(id) AS found FROM members_network WHERE uid='".$userID."' AND to_uid='".$favID."'  AND TYPE <> 5 LIMIT 1");
    if($result['found']  > 0){
        if($netID == 3){
            echo json_encode(array("message" => "FAIL", "method" => "ADD_TO_FAVORITE", "status"=>"This member is either on your favorites list or is already blocked.")); exit;
        }
        else{
            echo json_encode(array("message" => "FAIL", "method" => "ADD_TO_FAVORITE", "status"=>"This member is already a favorite.")); exit;
        }


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
            return "Member added as a favorite.";
        }

    }
}

function applyCode($code){
    if($code == ''){
        return array("message" => "FAILED", "status"=>"Please enter coupon code.");
    }
    global $DB;
    $HasP = $DB->Row("SELECT per AS total FROM coupon WHERE code='".$code."' and enable ='yes' LIMIT 1");
    if($HasP['total'] > 0){
        return array("message" => "SUCCESS", "discount_per"=>$HasP['total'], "status"=>"This code is successfully applied.");
    }
    else{
        return array("message" => "FAILED", "status"=>"Please enter a valid code.");
    }
}

//-- Method to check user
function checkUserID($id){
    global $DB;
    $username_result = $DB->Row("SELECT username,email,id FROM members WHERE id='".$id."' LIMIT 1");
    if($username_result['id'] != ''){
        return true;
    }
    else{
        return false;
    }
}

?>