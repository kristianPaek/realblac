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

if($action == "LOGIN")
{
        $username = trim(strip_tags($_REQUEST['username']));
        $password = trim(strip_tags($_REQUEST['password']));

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
            $emails_sql = "SELECT count(mailnum) AS row_num FROM messages WHERE mail2id='".$row['uid']."' AND mailstatus='unread' AND to_box='inbox' AND messages.type != 'wink'";
            $emails_result = $DB->Query($emails_sql);
            $emails_row = $DB->NextRow($emails_result);

            //Get total number of winks
            $winks_sql = "SELECT count(wsid) AS row_num FROM winkmessagessend WHERE wink_to='".$row['uid']."' AND read_status='0'";
            $winks_result = $DB->Query($winks_sql);
            $winks_row = $DB->NextRow($winks_result);

            $total_new_emails = $emails_row['row_num'];
            $total_new_winks = $winks_row['row_num'];
            $total_profile_views = $row['hits'];

            $_SESSION['sessionid'] = session_id();
            $overviewData = array(
                "total_new_emails"    => $total_new_emails,
                "total_new_winks"     => $total_new_winks,
                "total_profile_views" => $total_profile_views,
                "sessionID"           => $_SESSION['sessionid'],
                "user_id"             => $row['id'],
                "user_name"           => $row['username']
            );

            echo json_encode(array("message" => "SUCCESS", "overviewData" => $overviewData, "method" => "LOGIN"));
        }
         else {
            echo json_encode(array("message" => "FAIL", "method" => "LOGIN"));
        }
}
else if($action == "GET_MAIL"){
    $user_id    = $_REQUEST['user_id'];
    $box        = $_REQUEST['box_type'];
    $sort_by    = $_REQUEST['sort_by'];
    $start      = $_REQUEST['start'];
    $end        = $_REQUEST['end'];

    include_once("fun_message.php");
    $messages = GetMessage($user_id, $box, $sort_by, $start, $end);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_MAIL", "mail_records"=>$messages));
}
elseif($action == "NOTIFICATION"){
    include_once("fun_push_notification.php");
    setAppNotification();
    exit();
}
elseif($action == "WHO_VIEWED_MY_PROFILE"){
    $user_id = trim(strip_tags($_REQUEST['user_id']));
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
    $users = GetProfiles($user_id, array(), 0, array("dll" => "search", "page" => $page ,"online" => 1 ));
    echo json_encode(array("message" => "SUCCESS", "method" => "WHOS_ONLINE", "users"=>$users));
}
elseif($action == "SEARCH_BY_BASIC_INFO"){
    $user_id = trim(strip_tags($_REQUEST['user_id']));
    $state  = $_REQUEST['state_code'];
    $age1  = $_REQUEST['age1'];
    $age2  = $_REQUEST['age2'];
    $has_photos  = $_REQUEST['has_photos'];
    $Online_Now  = $_REQUEST['Online_Now'];
    $Joined_Today = $_REQUEST['Joined_Today'];
    $joined_in_last = $_REQUEST['joined_in_last'];
    $sort_by = $_REQUEST['sort_by'];
    $page = $_REQUEST['page'];
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

    $users = GetProfiles($user_id, $pageGet, 1, array("dll" => "search", "view_page" => 1));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH", "users"=>$users));
}
elseif($action == "SEARCH_BY_USERNAME"){
    $user_id = trim(strip_tags($_REQUEST['user_id']));
    $username  = $_REQUEST['username'];
    $page = $_REQUEST['page'];

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

    $users = GetProfiles($user_id, $pageGet, 1, array("dll" => "search", "view_page" => 1));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH", "users"=>$users));
}
elseif($action == "SEARCH_BY_KEYWORD"){
    $user_id = trim(strip_tags($_REQUEST['user_id']));
    $username  = $_REQUEST['keyword'];
    $page = $_REQUEST['page'];

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

    $users = GetProfiles($user_id, $pageGet, 1, array("dll" => "search", "view_page" => 1));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH", "users"=>$users));
}
elseif($action == "GET_PHOTO_ALBUM"){
    $userID 	= $_REQUEST['userID'];

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

    $user_id 	 = $_REQUEST['user_id'];
    $visitor_uid = $_REQUEST['visitor_uid'];
    include_once("fun_profile.php");
    $profileData = getMayProfileData($user_id,$visitor_uid);
    echo json_encode(array("message" => "SUCCESS", "method" => "MY_PROFILE", "profile"=>$profileData));
}

elseif($action == "GET_EDIT_PROFILE"){
    $user_id 	= $_REQUEST['user_id'];

    include_once("fun_profile.php");
    $profileData = getMayEditProfileData($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "MY_PROFILE", "profile"=>$profileData));
}
elseif($action == "PUT_EDIT_PROFILE"){

    $_REQUEST= Array
(
    "Multi364" => 0,
    "Multi3864" => 0,
    "Multi2264" => 0,
    "FieldMulti3164" => 31,
    "FieldMulti1364" => 13,
    "FieldMulti1864" => 18,
    "FieldMulti574" => 5,
    "FieldMulti3664" => 36,
    "FieldType44" => 3,
    "FieldType40" => 3,
    "FieldMulti474" => 4,
    "Multi453" => 1,
    "Multi852" => 0,
    "FieldMulti1553" => 15,
    "FieldMulti064" => 0,
    "Multi2674" => 0,
    "Multi1074" => 0,
    "FieldName51" => "em_txg20080113",
    "FieldMulti1974" => 19,
    "FieldType52" => 5,
    "Multi2464" => 0,
    "Multi1152" => 0,
    "FieldValue38" => 214,
    "Multi5164" => 0,
    "FieldMulti1552" => 15,
    "FieldMulti974" => 9,
    "FieldValue36" => 0,
    "FieldName63" => "em_7s920130723",
    "Multi774" => 0,
    "FieldMulti4264" => 42,
    "FieldMulti2464" => 24,
    "FieldType64" => 5,
    "Multi2874" => 0,
    "FieldMulti4764" => 47,
    "FieldMulti2964" => 29,
    "FieldValue34" => 0,
    "FieldMulti564" => 5,
    "Multi1274" => 0,
    "FieldMulti464" => 4,
    "Multi2664" => 0,
    "Multi1064" => 0,
    "FieldValue32" => 104,
    "Multi464" => 0,
    "FieldValue92" => 5796,
    "Multi952" => 0,
    "Multi1352" => 0,
    "Multi5364" => 0,
    "FieldName71" => "em_q1420130723",
    "Multi553" => 0,
    "FieldType72" => 3,
    "FieldMulti053" => 0,
    "Multi1474" => 0,
    "FieldMulti052" => 0,
    "FieldType88" => 3,
    "Multi2864" => 0,
    "Multi1264" => 0,
    "FieldMulti964" => 9,
    "FieldMulti3064" => 30,
    "FieldMulti1264" => 12,
    "Multi1552" => 0,
    "FieldMulti5364" => 53,
    "FieldMulti3564" => 35,
    "FieldMulti1764" => 17,
    "FieldMulti1074" => 10,
    "FieldType29" => 3,
    "Multi874" => 0,
    "FieldMulti553" => 5,
    "Multi1674" => 0,
    "FieldMulti453" => 4,
    "FieldMulti552" => 5,
    "Multi1464" => 0,
    "Multi1752" => 0,
    "FieldType92" => 3,
    "FieldMulti452" => 4,
    "Multi564" => 0,
    "FieldName36" => "em_jhb20080113",
    "Multi4164" => 0,
    "FieldName32" => "em_heh20080113",
    "FieldMulti1952" => 19,
    "FieldValue49" => 317,
    "FieldType33" => 3,
    "Multi653" => 0,
    "FieldMulti4164" => 41,
    "Multi1874" => 0,
    "FieldMulti174" => 1,
    "FieldMulti2364" => 23,
    "FieldMulti4664" => 46,
    "FieldMulti2864" => 28,
    "FieldMulti2174" => 21,
    "FieldName48" => "em_s1620080113",
    "FieldMulti953" => 9,
    "Multi1664" => 0,
    "Multi052" => 0,
    "FieldType49" => 3,
    "Multi1952" => 0,
    "FieldName44" => "em_s5j20080113",
    "FieldMulti952" => 9,
    "Multi4364" => 0,
    "FieldName40" => "em_wvh20080113",
    "FieldValue43" => 266,
    "FieldType41" => 3,
    "Multi974" => 0,
    "FieldValue41" => 0,
    "FieldMulti674" => 6,
    "FieldValue71" => 0,
    "Multi1864" => 0,
    "Multi3174" => 0,
    "FieldName52" => "em_y8520080116",
    "FieldMulti1164" => 11,
    "Multi4564" => 0,
    "FieldMulti5264" => 52,
    "Multi664" => 0,
    "FieldMulti3464" => 34,
    "FieldMulti164" => 1,
    "FieldMulti1664" => 16,
    "FieldMulti3964" => 39,
    "FieldType53" => 5,
    "FieldMulti1474" => 14,
    "FieldMulti1053" => 10,
    "Multi753" => 0,
    "FieldName64" => "em_52f20130723",
    "Multi152" => 0,
    "FieldMulti1052" => 10,
    "Multi4764" => 0,
    "Multi3164" => 0,
    "Multi1053" => 0,
    "FieldMulti664" => 6,
    "FieldName72" => "em_ja520130723",
    "FieldMulti4064" => 40,
    "FieldMulti2264" => 22,
    "FieldMulti4564" => 45,
    "FieldMulti2764" => 27,
    "FieldMulti2074" => 20,
    "Multi074" => 0,
    "FieldMulti2574" => 25,
    "FieldName88" => "em_1cz20131006",
    "Multi4964" => 0,
    "FieldType89" => 3,
    "Multi3364" => 0,
    "FieldMulti153" => 1,
    "FieldValue88" => 5784,
    "Multi1253" => 0,
    "Multi764" => 0,
    "Multi2052" => 0,
    "FieldMulti152" => 1,
    "FieldName29" => "em_hrh20080113",
    "FieldValue86" => 5772,
    "Multi853" => 1,
    "Multi252" => 0,
    "FieldValue54" => 5512,
    "Multi2174" => 0,
    "Multi3564" => 0,
    "FieldName92" => "em_5jb20131011",
    "FieldMulti653" => 6,
    "Multi1453" => 0,
    "FieldMulti5164" => 51,
    "FieldMulti3364" => 33,
    "FieldMulti1564" => 15,
    "FieldMulti1453" => 14,
    "FieldMulti3864" => 38,
    "FieldValue50" => 5921,
    "FieldMulti1374" => 13,
    "FieldMulti3174" => 31,
    "FieldType38" => 3,
    "FieldMulti652" => 6,
    "FieldMulti1874" => 18,
    "FieldName33" => "em_93n20080113",
    "FieldType34" => 3,
    "Multi2374" => 0,
    "FieldName49" => "em_kjc20080113",
    "Multi174" => 0,
    "Multi3764" => 0,
    "Multi2164" => 0,
    "Multi1653" => 0,
    "FieldMulti1452" => 14,
    "FieldMulti274" => 2,
    "Multi864" => 0,
    "FieldName41" => "em_vqf20080113",
    "Multi953" => 0,
    "Multi2574" => 0,
    "Multi352" => 0,
    "FieldMulti4464" => 44,
    "FieldMulti2664" => 26,
    "FieldMulti4964" => 49,
    "FieldMulti2474" => 24,
    "Multi3964" => 0,
    "Multi2364" => 0,
    "FieldMulti2974" => 29,
    "displayText" => "36 years old",
    "FieldName53" => "em_grm20080116",
    "Multi1052" => 0,
    "FieldMulti774" => 7,
    "Multi5064" => 0,
    "FieldType54" => 3,
    "FieldMulti2052" => 20,
    "FieldType50" => 3,
    "Multi2774" => 0,
    "Multi1174" => 0,
    "FieldMulti264" => 2,
    "FieldValue23c" => 25,
    "Multi2564" => 0,
    "FieldValue23b" => "JUL",
    "Multi274" => 0,
    "Multi1252" => 0,
    "Multi5264" => 0,
    "FieldMulti1353" => 13,
    "FieldValue33" => 0,
    "FieldValue63" => 5715,
    "FieldMulti1274" => 12,
    "FieldMulti1964" => 19,
    "Multi964" => 0,
    "FieldValue23a" => 1978,
    "FieldMulti1774" => 17,
    "FieldMulti3074" => 30,
    "Multi2974" => 0,
    "FieldValue31" => 83,
    "Multi1374" => 0,
    "FieldMulti3764" => 37,
    "FieldMulti764" => 7,
    "FieldType74" => 5,
    "Multi452" => 0,
    "Multi2764" => 0,
    "Multi1164" => 0,
    "FieldMulti1352" => 13,
    "FieldType70" => 3,
    "Multi053" => 1,
    "FieldName89" => "em_7gb20131006",
    "Multi1452" => 0,
    "FieldMulti1852" => 18,
    "FieldType86" => 3,
    "FieldMulti253" => 2,
    "Multi1574" => 0,
    "Multi2964" => 0,
    "Multi1364" => 0,
    "FieldMulti4864" => 48,
    "FieldType27" => 2,
    "FieldMulti2374" => 23,
    "FieldMulti252" => 2,
    "Multi1652" => 0,
    "Multi374" => 0,
    "FieldMulti2874" => 28,
    "Multi4064" => 0,
    "FieldType23" => 7,
    "FieldName38" => "em_yh020080113",
    "Multi1774" => 0,
    "FieldMulti753" => 7,
    "FieldName34" => "em_jsh20080113",
    "Multi064" => 0,
    "FieldMulti1064" => 10,
    "Multi552" => 0,
    "Multi1564" => 0,
    "Multi1852" => 0,
    "FieldMulti752" => 7,
    "FieldType31" => 3,
    "FieldValue48" => 312,
    "Multi4264" => 0,
    "Multi153" => 1,
    "FieldMulti1253" => 12,
    "FieldMulti1174" => 11,
    "Multi1974" => 0,
    "FieldMulti1674" => 16,
    "FieldValue44" => 272,
    "FieldMulti374" => 3,
    "FieldType43" => 3,
    "Multi1764" => 0,
    "Multi3074" => 0,
    "FieldValue72" => 5676,
    "FieldMulti1252" => 12,
    "Multi4464" => 0,
    "Multi474" => 0,
    "FieldMulti1752" => 17,
    "FieldName54" => "em_85820081128",
    "FieldValue70" => 5668,
    "FieldMulti2164" => 21,
    "FieldValue40" => 225,
    "FieldName50" => "em_72220080113",
    "user_id" => 3348,
    "FieldType51" => 3,
    "Multi1964" => 0,
    "FieldMulti874" => 8,
    "Multi164" => 0,
    "Multi652" => 0,
    "FieldMulti2274" => 22,
    "Multi4664" => 0,
    "Multi3064" => 0,
    "FieldMulti2774" => 27,
    "Multi253" => 0,
    "FieldMulti364" => 3,
    "FieldType63" => 3,
    "action" => "PUT_EDIT_PROFILE",
    "FieldName74" => "em_8hs20130723",
    "FieldMulti5064" => 50,
    "FieldMulti3264" => 32,
    "FieldMulti1464" => 14,
    "Multi4864" => 0,
    "Multi3264" => 0,
    "FieldName70" => "em_hes20130723",
    "Multi1153" => 0,
    "FieldType71" => 3,
    "Multi574" => 0,
    "FieldMulti864" => 8,
    "FieldMulti1153" => 11,
    "FieldValue29" => 65,
    "FieldValue89" => 5787,
    "FieldName86" => "em_v9620131005",
    "FieldMulti1653" => 16,
    "FieldMulti1574" => 15,
    "FieldValue27" => "",
    "Multi2074" => 0,
    "Multi264" => 0,
    "Multi752" => 0,
    "Multi3464" => 0,
    "FieldName27" => "description",
    "Multi1353" => 0,
    "FieldMulti353" => 3,
    "FieldMulti1152" => 11,
    "FieldMulti1652" => 16,
    "FieldName23" => "age",
    "Multi353" => 0,
    "FieldMulti2064" => 20,
    "FieldMulti352" => 3,
    "FieldMulti4364" => 43,
    "FieldMulti2564" => 25,
    "FieldValue51" => 5603,
    "Multi2274" => 0,
    "Multi3664" => 0,
    "Multi2064" => 0,
    "FieldMulti074" => 0,
    "FieldType36" => 3,
    "Multi1553" => 0,
    "FieldName31" => "em_1k820080113",
    "FieldMulti2674" => 26,
    "FieldMulti853" => 8,
    "FieldType32" => 3,
    "Multi674" => 0,
    "FieldMulti852" => 8,
    "Multi2474" => 0,
    "FieldType48" => 3,
    "FieldName43" => "em_r9720080113"
);

    $user_id 	= $_REQUEST['user_id'];

    include_once("fun_profile.php");
    $profileData = putMayEditProfileData($user_id,$_REQUEST);
    echo json_encode(array("message" => "SUCCESS", "method" => "PUT_EDIT_PROFILE", "profile"=>$profileData));
}
elseif($action == "OPEN_MAIL"){
    $user_id 	= $_REQUEST['user_id'];
    $mail_id    = $_REQUEST['mail_id'];

    include_once("fun_message.php");
    $message = GetMsgDataForUser($user_id, $mail_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "OPEN_MAIL", "mail_data"=>$message));
}
elseif($action == "CHANGE_MY_PHOTO"){
    $user_id = trim(strip_tags($_REQUEST['user_id']));
    $imageName = trim(strip_tags($_REQUEST['imageName']));
    include_once("serviceUploadFile.php");
    $result = changeMainPhoto($user_id, $imageName);
    echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_MY_PHOTO", "history"=>$result));
}

elseif($action == "VISIT_PROFILE"){
    $user_id = $_REQUEST['user_id'];
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
    echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_SETTINGS", "history"=>$result));
}

elseif($action == "CHANGE_PASSWORD"){
    $user_id = trim(strip_tags($_REQUEST['user_id']));
    $cpassword = trim(strip_tags($_REQUEST['cpassword']));
    $npassword = trim(strip_tags($_REQUEST['npassword']));
    include_once("updateInfo.php");
    $result = updatePassword($user_id, $cpassword, $npassword);
    echo json_encode(array("message" => "SUCCESS", "method" => "CHANGE_PASSWORD", "history"=>$result));
}
elseif($action == "SEND_MESSAGE"){
    //$user_id = trim(strip_tags($_REQUEST['user_id']));
    $values = array();
    $values['to'] = $_REQUEST["to"];
    $values['do'] = "add";
    $values['do_page'] = "messages";
    $values['sub'] = "create";
    $values['addCardID'] = "0";
    $values['subject'] = $_REQUEST["subject"];
    $values['message1'] = $_REQUEST["message1"];
    $values['idhidden'] = "";
    $values['message'] = $_REQUEST["message"];
    $values['user_id'] = $_REQUEST["user_id"];
    include_once("fun_message.php");
    $send_mail = sendMessage($values);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_USER_PROFILE", "status"=>$send_mail));
}
elseif($action == "GETTING_FAVORITE_LIST"){
    $user_id = $_REQUEST['user_id'];

    include_once("fun_search.php");

    $users = GetProfiles($user_id, array(), 1, array("dll" => "search", "friendid" => $user_id, "friend_type"=>1, "displaytype"=>"detail"));
    echo json_encode(array("message" => "SUCCESS", "method" => "SEARCH", "users"=>$users));
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