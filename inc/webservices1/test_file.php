<?php
//-- Config file and DB connection
 $timeStamp	= time ();

 echo date_default_timezone_get();

die('aaaaa');



include '../config.php';
include '../config_db.php';
include_once('../API/api_functions.php');
include_once('../func/func_forums.php');
include_once('../func/globals.php');
//include_once('../../newadmin/inc/func/admin_globals.php');
include_once('../func/func_mobile_profile_page.php');
//-- Get action to be performed

$action = 'SEND_MESSAGE_NEW';


if($action == "SEND_MESSAGE_NEW"){
    //$user_id = trim(strip_tags($_REQUEST['user_id']));
    $values = array();
    $values['to'] = '123456';
    $values['do'] = "add";
    $values['do_page'] = "messages";
    $values['sub'] = "create";
    $values['addCardID'] = "0";
    $values['subject'] = $_REQUEST["subject"];
    $values['message1'] = $_REQUEST["message1"];
    $values['idhidden'] = "";
    $values['message'] = $_REQUEST["message"];
    $values['user_id'] = '15862';
    include_once("fun_message_new.php");
    $send_mail = sendMessage($values);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_USER_PROFILE", "status"=>$send_mail));
}







elseif($action == "WHO_VIEWED_MY_PROFILE"){
    $user_id = trim(strip_tags('15862'));
    include_once("fun_profile.php");
    $arryHistory = whoViewMyProfile($user_id);
    echo json_encode(array("message" => "SUCCESS", "method" => "WHO_VIEWED_MY_PROFILE", "history"=>$arryHistory));
}


elseif($action == "SEND_WINK"){
    $sendfrom 	= 'lisa3'; 	    // user id
    $sendto 	= 'jaye14'; 	    // user id

    include_once("fun_message.php");
    $result = SendWinkMessageNew($sendfrom,$sendto);
    echo json_encode(array("message" => "SUCCESS", "method" => "SEND_WINK", "status"=>$result));
}


elseif($action == "MY_PROFILE"){
    $user_id 	= '6618';
    $visitor_uid = '2000';
    include_once("fun_profile.php");
    $profileData = getMayProfileData($user_id,$visitor_uid);
    echo json_encode(array("message" => "SUCCESS", "method" => "MY_PROFILE", "profile"=>$profileData));
}


else if($action == "GET_MAIL"){
    $user_id    = '6954';
    $box        = '';
    $sort_by    = $_REQUEST['sort_by'];
    $start      = 0;
    $end        = 10;

    include_once("fun_message.php");
    $messages = GetMessage($user_id, $box, $sort_by, $start, $end);
    echo json_encode(array("message" => "SUCCESS", "method" => "GET_MAIL", "mail_records"=>$messages));
}


?>