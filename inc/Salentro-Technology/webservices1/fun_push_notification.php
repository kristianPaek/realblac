<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function setAppNotification($sender="", $message="", $user_id="", $type=""){

    global $DB;

    $sender = $DB->Row("Select username from members where id='".$sender."' limit 1");

    $username = $DB->Row("Select username from members where id='".$user_id."' limit 1");

    $device = $DB->Row("select * from notification where uid='".$user_id."' limit 1");

    $push_setting = $DB->Row("select push_setting from member_setting where user_id='" . $user_id . "' limit 1");
    if ($push_setting['push_setting'] = "0") {
        return;
    }

    if($sender=="") {
        $device['udid']="APA91bGoAihxi8Sl5H_ALB2713KGUtpZpuVmRxpLMhTmdI7lnn_TetdPJP1ZR-tOoit2usBU9IGucXWSYMq05CtXgJI3mPRk8d-zP06f4s-FID54dzcHIHjs-OpigTcisqx8ZXlBDlfc";
        $message="Hello Testing...";
        $sender['username']="Female 1";
        $user_id="1547";
        $device['os']="android";
        $username['username']="male1";
    }


    if($device['udid'] == ''){
        return;
    }
    $m = str_split($message,50);
    $newMessage = explode("\\n",$m[0]);
    $newMessage = str_replace("\\'","'",$newMessage[0]);

    if($type == 'wink'){
        $message = $sender['username']." ".$newMessage;
    }
    else{
        $message = $sender['username']." : ".$newMessage;
    }

    if($device['os'] == "iOS") {
        $UDID = array("id" => $device['udid']);
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-pro.pem');
        $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 120, STREAM_CLIENT_CONNECT, $ctx);
        if ($fp) {
            //$body = array();
            $body['aps'] = array(
                'alert' => $message,
                'type' => 'push',
                'sound' => 'default',
                'content-available' => 1,
                'user_id' => $user_id,
                'message_type' => $type,
                'user_name' => $username['username'],
                'notification_time' => date('m-d-Y h:m')
            );

            $payload = json_encode($body);
            foreach ($UDID as $k => $token) {
                $msg = chr(0) . pack("n", 32) . pack('H*', str_replace(' ', '', $token)) . pack("n", strlen($payload)) . $payload;

                fwrite($fp, $msg);
            }
            fclose($fp);
            $flag = true;
        }

        $ctx = stream_context_create();
        
    	$passphrase = 'rootroot';

        stream_context_set_option($ctx, 'ssl', 'local_cert', 'RealChat.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        
        $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 120, STREAM_CLIENT_CONNECT, $ctx);
        if ($fp) {
            //$body = array();
            $body['aps'] = array(
                'alert' => $message,
                'type' => 'push',
                'sound' => 'default',
                'content-available' => 1,
                'user_id' => $user_id,
                'message_type' => $type,
                'user_name' => $username['username'],
                'notification_time' => date('m-d-Y h:m')
            );

            $payload = json_encode($body);
            foreach ($UDID as $k => $token) {
                $msg = chr(0) . pack("n", 32) . pack('H*', str_replace(' ', '', $token)) . pack("n", strlen($payload)) . $payload;

                fwrite($fp, $msg);
            }
            fclose($fp);
            $flag = true;
        }
    }else {
        include_once 'GCM.php';

        $gcm = new GCM();

        $registatoin_ids = array($device['udid']);
        $message = array("alert" => $message, "user_id" => $user_id, "user_name" => $username['username'],"type" => $type);
        $result = $gcm->send_notification($registatoin_ids, $message);
        $result = $gcm->send_notification_new($registatoin_ids, $message);
    }
}

function setUDID($username, $UDID, $os){



    global $DB;
    $result = $DB->Row("select id from members where username='$username'");
    $userID = $result['id'];

    $noti = $DB->Row("select count(udid) as total from notification where uid='$userID'");
    if($noti['total']>=1){
        $b = "UPDATE `notification` SET udid='$UDID', os='$os' where uid='".$userID."'";
        $DB->Update($b);
    }
    else{
        $DB->Insert("INSERT INTO `notification` (  `uid` , `udid` , `os` )
                                        VALUES ( '$userID' , '$UDID', '$os')");
        $notiID = $DB->InsertID();
    }

}

function setPushSetting($user_id, $push_setting) {
    global $DB;

    $DB->Update("Update member_setting set push_setting = ". $push_setting . " where user_id = " . $user_id);
}

function getPushSetting($user_id) {
    global $DB;

    $push_setting = $DB->Row("Select push_setting From member_setting Where user_id = " . $user_id);
    return $push_setting['push_setting'];
}

?>