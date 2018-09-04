<?php
//-- Config file and DB connection
include '../config.php';
include '../config_db.php';
include_once('../API/api_functions.php');
include_once('../func/func_forums.php');
include_once('../func/globals.php');
//include_once('../../newadmin/inc/func/admin_globals.php');
include_once('../func/func_mobile_profile_page.php');
//-- Get action to be performed
$action = $_REQUEST['action'];

if($action == "LOGIN"){

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    include_once("fun_login.php");
    $user_date = checkUserLogin($username, $password);
    echo json_encode($user_date); exit();
}
elseif($action == "PUSH"){
    include_once("fun_push_notification.php");
    setAppNotification("3348","New wink message", "3347","mail");
    echo "Success";
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
elseif($action == "WHO_VIEWED_MY_PROFILE"){
    $user_id = $_POST['user_id'];
    include_once("fun_profile.php");
    $arryHistory = whoViewMyProfile($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "WHO_VIEWED_MY_PROFILE", "history"=>$arryHistory));
}
elseif($action == "WHOS_ONLINE"){
    $user_id = $_REQUEST['user_id'];
    $page = $_REQUEST['page'];
    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");
    $users = GetProfiles($user_id, array(), $page, array("dll" => "search", "view_page" => 1  ));
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
    $userID 	= $_REQUEST['user_id'];
    $albumOwnerID = $_REQUEST['album_owner_id'];
    $albumID    = $_REQUEST['albumID'];
    $albumPass = $_REQUEST['album_password'];
    include_once("fun_gallery.php");
    $albums = showAlbumPhotos($userID,$albumOwnerID, $albumID, $albumPass, true);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_PHOTO_FROM_ALBUM", "photos"=>$albums));
}
elseif($action == "MY_PROFILE"){
    $user_id 	= $_POST['user_id'];

    include_once("fun_profile.php");
    $profileData = getMayProfileData($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "MY_PROFILE", "profile"=>$profileData));
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
elseif($action == "OPEN_MAIL"){
    $user_id 	= $_POST['user_id'];
    $mail_id    = $_POST['mail_id'];

    include_once("fun_message.php");
    $message = GetMsgDataForUser($user_id, $mail_id);
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
    $user_id = trim(strip_tags($_REQUEST['user_id']));
    $email = trim(strip_tags($_REQUEST['email']));
    $email_msg = trim(strip_tags($_REQUEST['messagealert']));
    $email_winks = trim(strip_tags($_REQUEST['winkalert']));
    include_once("updateInfo.php");
    $result = updateInformation($user_id,$email,$email_msg,$email_winks);
    echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_SETTINGS", "status"=>$result));
}

elseif($action == "CHANGE_PASSWORD"){
    $user_id = trim(strip_tags($_REQUEST['user_id']));
    $cpassword = trim(strip_tags($_REQUEST['cpassword']));
    $npassword = trim(strip_tags($_REQUEST['npassword']));
    include_once("updateInfo.php");
    $result = updatePassword($user_id, $cpassword, $npassword);
    echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_PASSWORD", "status"=>$result));
}
elseif($action == "SEND_MESSAGE"){
    //$user_id = trim(strip_tags($_POST['user_id']));
    $values = array();
    $values['to'] = $_REQUEST["to"];
    $values['do'] = "add";
    $values['do_page'] = "messages";
    $values['sub'] = "create";
    $values['addCardID'] = 0;
    $values['idhidden'] = $_REQUEST['idhidden'];
    if($values['idhidden'] != ''){
        $values['StopConfigStrip'] = 1;
    }
    $values['subject'] = $_REQUEST["subject"];
    $values['message1'] = $_REQUEST["message1"];

    $values['message'] = "";//$_POST["message"];
    $values['user_id'] = $_REQUEST["user_id"];
    include_once("fun_message.php");
    $send_mail = sendMessage($values);

    if($send_mail == "Your message has been sent."){
        echo json_encode(array("message" => "SUCCESS", "method" => "SEND_MESSAGE", "status"=>$send_mail));
    }
    else{
        echo json_encode(array("message" => "FAIL", "method" => "SEND_MESSAGE", "status"=>$send_mail));
    }
}
elseif($action == "GETTING_FAVORITE_LIST"){
    $user_id = $_REQUEST['user_id'];
    $page = $_REQUEST['page'];

    if($page == ''){
        $page = 1;
    }
    include_once("fun_search.php");

    $users = GetProfiles($user_id, array(), $page, array("dll" => "search", "friendid" => $user_id, "friend_type"=>1, "displaytype"=>"detail"));
    echo json_encode(array("message" => "SUCCESS", "method" => "GETTING_FAVORITE_LIST", "users"=>$users));
}
elseif($action == "GETTING_BLOCKED_MEMBERS"){
    $user_id = $_REQUEST['user_id'];
    $page = $_REQUEST['page'];

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
    //$netid		= trim(strip_tags($_GET['netid']));

    include_once("fun_common_api.php");
    $result = deleteNetworkFromFavorite($uid,$del_uid,1);
    echo json_encode(array("message" => "SUCCESS", "method" => "REMOVE_FROM_FAVORITE", "status"=>$result));
}
elseif($action == "DELETE_MAIL"){
    $uid	    = trim(strip_tags($_POST['user_id']));
    $del_meil_ids	= trim(strip_tags($_POST['mail_ids']));
    $box_type       = trim(strip_tags($_POST['box_type']));

    include_once("fun_message.php");
    $result = deleteMessageFromBox($uid, $del_meil_ids,$box_type);
    echo json_encode(array("message" => "SUCCESS", "method" => "DELETE_MAIL", "status"=>$result));
}
elseif($action == "VISIT_PROFILE_HIT_COUNT"){
    $$user_id	    = trim(strip_tags($_POST['user_id']));
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
    while($UploadMax < 13){
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

    $sub_page = "";
    $SubSub_Lang = $LANG_UPGRADE_MENU;
    $PageDesc = $SubSub_Lang[$sub_page."_?"];

    $PageDesc = str_replace("<br />","**",$PageDesc);
    $PageDesc = str_replace("<BR />","**",$PageDesc);
    $PageDesc = str_replace("</b>","",$PageDesc);
    $PageDesc = str_replace("<b>","",$PageDesc);
    $PageDesc = str_replace("<i>","",$PageDesc);
    $PageDesc = str_replace("</i>","",$PageDesc);
    $PageDesc = str_replace("<center>","",$PageDesc);
    $PageDesc = str_replace("</center>","",$PageDesc);
    $PageDesc = str_replace("<hr>","**",$PageDesc);
    $PageDesc = str_replace("</center>","",$PageDesc);

    $PageDesc = str_replace("************","**",$PageDesc);
    $PageDesc = str_replace("**********","**",$PageDesc);
    $PageDesc = str_replace("********","**",$PageDesc);
    $PageDesc = str_replace("******","**",$PageDesc);
    $PageDesc = str_replace("****","**",$PageDesc);
    $PageDesc = str_replace("\n","",$PageDesc);

    $PageDesc = explode("**",$PageDesc);

    $show_page = 'home';
    $show_packages = DisplayPackages();
    $show_payment_types = DisplayPaymentCode();

    $package_responce = array();
    $package_responce['details'] = $PageDesc;
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
        echo json_encode(array("message" => "FAILED", "method" => "SUBSCRIPTION_DATA_SAVED_ON_SERVER", "status"=>"Your transaction is not valid, Please contact us"));
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
elseif($action == "DELETE_USER"){
    $userID = $_REQUEST['user_id'];

    include_once("fun_login.php");
    $result = deleteUserProfile($userID);

    if($result == "Email send to admin for delete your profile."){
        echo json_encode(array("message" => "SUCCESS", "method" => "DELETE_USER", "status"=>$result));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "DELETE_USER", "status"=>$result));
    }
}
elseif($action == "FORGOT_PASSWORD"){
    $email = $_REQUEST['email'];

    include_once("fun_login.php");
    $result = ForgottenUserPassword($email);

    if($result == "complete"){
        echo json_encode(array("message" => "SUCCESS", "method" => "FORGOT_PASSWORD", "status"=>"Thank You. We have sent a new password to your email. Please check your spam or junk folder if you do not see our email."));
    }
    else{
        echo json_encode(array("message" => "FAILED", "method" => "FORGOT_PASSWORD", "status"=>$result));
    }
}
else{
    echo json_encode(array("message" => "NO ACTION", "method" => "CHECK ACTION"));
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