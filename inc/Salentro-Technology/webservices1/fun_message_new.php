<?php

//-- Function to get inbox/send/trash/wink message
function GetMessage($id,$box=1, $orderBy="maildate", $start="0", $stop="10"){

    global $DB;

    $NumFields=1;
    $ReturnMessageArray = array();

    $query = sprintf("SELECT * FROM message_room WHERE owner_id = %d OR partner_id = %d ORDER BY timestamp DESC LIMIT %d, %d", $id, $id, $start, $stop);    
    $mail_rooms = $DB->Query($query);

    $message_room_query = sprintf("SELECT * FROM message_room WHERE owner_id = %d OR partner_id = %d", $id, $id);

    if ($box == "sent") {
        $query = sprintf("SELECT count(*) as total FROM messages A, (%s) B WHERE A.uid = %d AND A.mail_room_id = B.id AND B.room_my_status = 'open' AND B.room_partner_status = 'open'", $message_room_query, $id);
    }
    else if ($box == "trash") {
        $query = sprintf("SELECT count(*) as total FROM messages A, (%s) B WHERE A.uid = %d AND A.mail_room_id = B.id AND ((B.owner_id = %d AND B.room_my_status = 'close') OR (B.partner_id = %d AND B.room_partner_status = 'close'))", $message_room_query, $id, $id, $id);
    }
    else if ($box == "inbox") {
        $query = sprintf("SELECT count(*) as total FROM messages A, (%s) B WHERE A.mail2id = %d AND A.type != 'wink' AND A.mail_room_id = B.id AND B.room_my_status = 'open' AND B.room_partner_status = 'open'", $message_room_query, $id);
    }

    $total = $DB->Row($query);
 
    $total_count = $DB->Count($query);

    while ($mail_room = $DB->NextRow($mail_rooms)) {
    	if ($box == "sent") {
            if ($mail_room['room_my_status'] == 'close' || $mail_room['room_partner_status'] == 'close')
                continue;

    		$SQL = "SELECT members.username, messages.mailnum, messages.mailtime, messages.mail_message, messages.mail2id, messages.uid, messages.mailstatus, messages.type, messages.maildate, messages.mail_subject, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f
                FROM messages
                LEFT JOIN files ON ( files.uid = messages.mail2id AND files.approved = 'yes' AND files.title != 'Message Photo' AND files.default=1)
                LEFT JOIN album ON ( album.aid = files.aid )
                LEFT JOIN members ON ( members.id = messages.mail2id )
                WHERE messages.uid = ( '" . $id . "' ) AND messages.mail_room_id = ( '". $mail_room['id'] ."' ) ORDER BY mailnum DESC LIMIT 1";
    	}
    	else if ($box == "trash") {
    		if ($mail_room['owner_id'] == $id) {
    			if ($mail_room['room_my_status'] != "close")
                    continue;
    		}
    		else {
    			if ($mail_room['room_partner_status'] != "close")
                    continue;
    		}

    		$SQL = "SELECT members.username, messages.mail_message, messages.mailtime, messages.mailnum, messages.mail2id, messages.uid, messages.mailstatus, messages.type, messages.maildate, messages.mail_subject, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f
                FROM messages
                LEFT JOIN files ON ( files.uid = messages.mail2id AND files.approved = 'yes' AND files.title != 'Message Photo' )
                LEFT JOIN album ON ( album.aid = files.aid )
                LEFT JOIN members ON ( members.id = messages.mail2id )
                WHERE messages.uid = " . $id . " AND messages.mail_room_id = ". $mail_room['id'] . " ORDER BY mailnum DESC LIMIT 1";
    	}
    	else if ($box == "inbox") {
            if ($mail_room['room_my_status'] == 'close' || $mail_room['room_partner_status'] == 'close')
                continue;

    		$SQL = "SELECT members.username, messages.mailnum, messages.mailtime, messages.mail_message, messages.mail2id, messages.uid, messages.mailstatus, messages.type, messages.maildate, messages.mail_subject, files.bigimage, files.type, album.cat, album.allow_a, album.allow_n,	album.allow_h,	album.allow_f
                FROM messages
                LEFT JOIN files ON ( files.uid = messages.uid AND files.approved = 'yes' AND files.title != 'Message Photo')
                LEFT JOIN album ON ( album.aid = files.aid )
                LEFT JOIN members ON ( members.id = messages.uid )
                WHERE messages.mail2id = ( '" . $id . "' ) AND messages.type != 'wink' AND messages.mail_room_id = ( '". $mail_room['id'] ."' ) ORDER BY mailnum DESC LIMIT 1";
    	}	
    
    	
    	$msg = $DB->Row($SQL);
    	if (!isset($msg['username']))
    		continue;

    	$totalAttacments = $DB->Row("SELECT count(id) AS total FROM files WHERE user = '".$msg['mailnum']."' AND title='Message Photo' LIMIT 1");
        if($totalAttacments['total'] > 0){
            $attach="yes";
        }else{
            $attach="no";
        }

        if($msg['username']==""){
            $username_result = $DB->Row("SELECT username,email FROM members WHERE id='".$id."' LIMIT 1");
            $msg['username'] = $username_result['username'];
        }
        
        if($box =="sent" || $box == "trash"){
            $senderid = $msg['mail2id'];
        }else{
            $senderid = $msg['uid'];
        }

        if($msg['maildate'] == DATE_NOW){
            $messagedate = $GLOBALS['LANG_MESSAGES']['today'];
        }else{
            $messagedate = dates_interconv($msg['maildate']);
        }

        if($msg['mailstatus'] =="unread"){
            $messagestatus = "New";
        }else{
            $messagestatus = "Read";
        }

        $ReturnMessageArray[] = array(
            "attachment"    => $attach,
            "senderid"      => $senderid,
            "date"          => dates_interconv($msg['maildate']),
            "time"          => $msg['mailtime'],
            "id"            => $mail_room['id'],
            "type"          => $msg['type'],
            "subject"       => $mail_room['subject'],
            "message"       => strip_tags(substr(eMeetingOutput(strip_tags($msg['mail_message'])),0,50)) . "...",
            "total"         => $NumFields,
            "image"         => ReturnDeImage($msg,"big"),
            "from"          => $msg['username'],
            "totalMsg"      => $total['total'],
            "status"        => $messagestatus
        );
        $NumFields++;
    }

    return $ReturnMessageArray;        
}

//-- Function to get inbox/send/trash/wink message
function GetMessageCount($id,$box=1, $orderBy="maildate", $start="0", $stop="10"){

    global $DB;

    $NumFields=1;
    $ReturnMessageArray=array();

    $orderBy2 = $orderBy;
    if(($orderBy=="maildate" ||$orderBy=="messages.maildate")) {
        $orderBy2 = "maildate DESC, mailtime DESC";
    } elseif(($orderBy=="mailnum" ||$orderBy=="messages.mailnum")) {
        $orderBy = "members.username";
        $orderBy2 = "members.username";
    } elseif(($orderBy=="mail_subject" ||$orderBy=="messages.mail_subject")) {
        $orderBy = "messages.mail_subject";
        $orderBy2 = "messages.mail_subject";
    }

    //-- Get data from server acording to box type
    if($box == "sent"){
        $SQL = "SELECT members.username, messages.mailnum, messages.mailtime, messages.mail_message, messages.mail2id, messages.uid, messages.mailstatus, messages.type, messages.maildate, messages.mail_subject, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f
                FROM messages
                LEFT JOIN files ON ( files.uid = messages.mail2id AND files.approved = 'yes' AND files.title <> 'Message Photo' AND files.default=1)
                LEFT JOIN album ON ( album.aid = files.aid )
                LEFT JOIN members ON ( members.id = messages.mail2id )
                WHERE messages.uid= ( '".$id."' ) AND messages.my_box='sent' GROUP BY ".$orderBy.", messages.mailnum ";

        $totalMsg = $DB->Row("SELECT count(mailnum)  AS total FROM messages WHERE uid= ( '".$id."' ) AND my_box='sent'");
    }
    elseif($box == "trash"){
        $SQL = "SELECT members.username, messages.mail_message, messages.mailtime, messages.mailnum, messages.uid, messages.mailstatus, messages.type, messages.maildate, messages.mail_subject, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f
                FROM messages
                LEFT JOIN files ON ( files.uid = messages.uid AND files.approved = 'yes' AND files.title <> 'Message Photo' )
                LEFT JOIN album ON ( album.aid = files.aid )
                LEFT JOIN members ON ( members.id = messages.uid )
                WHERE (messages.mail2id='".$id."') AND (messages.to_box='trash') GROUP BY ".$orderBy.", messages.mailnum ";

        $totalMsg = $DB->Row("SELECT count(mailnum) AS total FROM messages WHERE messages.mail2id='".$id."' AND messages.to_box='trash' ");
    }
    elseif($box =="wink"){
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
            $viewedWink = array();
            $unviewedWink = array();
            $date = date("Y-m-d", strtotime(-$i . ' days'));

            $SQL = "SELECT members.*,winkmessagessend.read_status as read_status, winkmessagessend.wsid from winkmessagessend inner join members on members.id = winkmessagessend.wink_from WHERE wink_to='" . $id . "' && onlydate = '" . $date . "'";
            $Data = $DB->Query($SQL);

            if(mysql_num_rows($Data)>0){
                $str=explode('-',$date);
                $date = $fulldayname[date('D', strtotime($date))].' ('.$str[2].' '.date("M").')';

                while($row=mysql_fetch_array($Data)){
                    $messages[] = array("date" => $date, 'id'=>$row['id'],'username'=>$row['username'],'view_status'=>$row['read_status'], 'wink_id'=>$row['wsid']);
                }
            }
        }
        return $messages;
    }
    else{
        $SQL = "SELECT members.username, messages.mail_message, messages.mailtime, messages.mailnum, messages.uid, messages.mailstatus, messages.type, messages.maildate, messages.mail_subject, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f
                FROM messages
                LEFT JOIN files ON ( files.uid = messages.uid AND files.approved = 'yes' AND files.title <> 'Message Photo' )
                LEFT JOIN album ON ( album.aid = files.aid )
                LEFT JOIN members ON ( members.id = messages.uid)
                WHERE messages.mail2id='".$id."' AND messages.to_box='inbox' AND messages.type !='wink' GROUP BY ".$orderBy.", messages.mailnum ";

        $totalMsg = $DB->Row("SELECT count(mailnum) AS total FROM messages WHERE mail2id= '".$id."' AND to_box='".$box."' AND messages.type !='wink'");

    }

    $result = $DB->Query($SQL);
    while( $msg = $DB->NextRow($result) ){

        // CHECK FOR FILE ATTACHMNET
        $totalAttacments = $DB->Row("SELECT count(id) AS total FROM files WHERE user = '".$msg['mailnum']."' AND title='Message Photo' LIMIT 1");
        if($totalAttacments['total'] > 0){
            $attach="yes";
        }else{
            $attach="no";
        }

        //-- Set username in message
        if($msg['username']==""){
            $username_result = $DB->Row("SELECT username,email FROM members WHERE id='".$id."' LIMIT 1");
            $msg['username'] = $username_result['username'];
        }

        //-- Set sender id
        if($box =="sent"){
            $senderid = $msg['mail2id'];
        }else{
            $senderid = $msg['uid'];
        }

        if($msg['maildate'] == DATE_NOW){
            $messagedate = $GLOBALS['LANG_MESSAGES']['today'];
        }else{
            $messagedate = dates_interconv($msg['maildate']);
        }

        if($msg['mailstatus'] =="unread"){
            $messagestatus = "New";
        }else{
            $messagestatus = "Read";
        }

        $ReturnMessageArray[] = array(
            "attachment"    => $attach,
            "senderid"      => $senderid,
            "date"          => $messagedate,
            "time"          => $msg['mailtime'],
            "id"            => $msg['mailnum'],
            "type"          => $msg['type'],
            "subject"       => substr(eMeetingOutput($msg['mail_subject']),0,200),
            "message"       => strip_tags(substr(eMeetingOutput(strip_tags($msg['mail_message'])),0,50))."...",
            "total"         => $NumFields,
            "image"         => ReturnDeImage($msg,"small"),
            "from"          => $msg['username'],
            "totalMsg"      => $totalMsg['total'],
            "status"        => $messagestatus
        );
        $NumFields++;
    }

    return $ReturnMessageArray;
}

/*
 * Get message data from message id
 * */
function GetMsgDataForUser($userID, $mail_room_id){

    global $DB;

    ## define variables
    $ReturnMessageArray = array();	
    $mail_room_id = strip_tags($mail_room_id);


    ## build query
    $result = $DB->Query("SELECT messages.mail2id, messages.mailnum, messages.maildate, mailtime, messages.uid, messages.type, messages.mail_subject, messages.mail_message, members.username, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f

	FROM messages

	INNER JOIN members ON ( members.id = messages.uid )

	LEFT JOIN files ON ( files.uid = messages.uid AND files.approved = 'yes' AND files.title != 'Message Photo' AND files.default=1)

	LEFT JOIN album ON ( album.aid = files.aid )

	WHERE messages.mail_room_id = ". $mail_room_id );


    ## clean the members input
    while ($msg = $DB->NextRow($result)) {
        $values = @array_map('eMeetingInput',$msg);

        $imageArry = array(); 
        $i=0;

        $msgImage = $DB->Query("SELECT * FROM files WHERE user = ( '" . $mail_room_id . "' ) AND type='photo' ");

        while( $img = $DB->NextRow($msgImage) ){
            $imageArry[$i]['name'] = $img['bigimage'];
            $i++;
        }
        
        $ReturnMessageArray[] = array(
            "mail_room_id"      => $mail_room_id,
            "mail_id"           => $msg['mailnum'],
            "sender_id"         => $msg['uid'],
            "receiver_id"       => $msg['mail2id'],
            "type"              => $msg['type'],
            "image_array"       => $imageArry,
            "date"              => dates_interconv($msg['maildate']),
            "time"              => $msg['mailtime'],
            "subject"           => $msg['mail_subject'],
            "message"           => stripslashes(nl2br($msg['mail_message'])),
            "username"          => $msg['username'],
            "image"             => ReturnDeImage($msg,"big")
        );   

        if($userID == $msg['mail2id']){
            $DB->Update("UPDATE messages SET mailstatus='read' WHERE mail_room_id = " . $mail_room_id . " AND mailnum = " . $msg['mailnum']);
        }     
    }    

    return $ReturnMessageArray;
}

function sendMessage($values){

    global $DB;

    include_once("fun_push_notification.php");
	include_once('../func/globals.php');

    $ToArray = explode(",",$values['to']);

    foreach($ToArray as $receiver_name){
        ## get the userid for this user
        $resultID = $DB->Row("SELECT id FROM members WHERE username = '" . eMeetingInput($receiver_name) . "' LIMIT 1");

        $receiver_id = $resultID['id'];

        $UploadMax = 0;
        if($receiver_id ==""){
            return "Please provide user id to send mail.";
        }
        elseif($receiver_id == $values['user_id']){
            return "Do not send mail to self.";
        }

        if(strlen($values['subject']) < 2 ){
            return "Subject is minimum of 2 character.";
        }

        //$usedimagespace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid = ( '" . $values['user_id'] . "' ) AND type = 'normal' AND maildate='" . DATE_NOW . "'");
        
        
       //$olddate = date("Y-m-d", strtotime(-1 . 'days')); // Date less than 48 hours or 2 days from today date.
       //$usedimagespace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid = ( '".$values['user_id']."' ) AND type = 'normal' AND maildate>='".$olddate."'");
        
        
        
        
        $usedimagespace = $DB->Row("SELECT maildate,mailtime FROM messages WHERE uid= '".$values['user_id']."' 
        			    AND type = 'normal' ORDER BY mailnum DESC LIMIT 1 ");
        
        $date = $usedimagespace['maildate'];
	$time = $usedimagespace['mailtime'];
	
	$timestamp = strtotime($date.$time); //1373673600	
	// getting current date 
	$cDate = strtotime(date('Y-m-d H:i:s'));	
	// Getting the value of old date + 48 hours
	$NewDate = $timestamp + 604800; // 259200 secs in 3 days 172800 seconds in 48 hrs and 86400 in 24 hrs 604800 in 7 days 2592000 30 days
	
	$sql = "SELECT members_data.gender AS genderD, package.view_adult, package.name, package.wink, members.moderator, package.Highlighted, package.Featured, package.maxMessage, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members
					INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
					LEFT JOIN package ON ( members.packageid = package.pid )
					LEFT JOIN members_data ON ( members.id = members_data.uid )
					WHERE (members.id = '".$values['user_id']."') LIMIT 1";
        $result = $DB->Row($sql); 

        //if( ($usedimagespace['space'] >= $result['maxMessage']) && D_FREE =="no"){


	if( $cDate < $NewDate &&  D_FREE =="no" && $result['packageid'] == 3 )
	{
            if($result['packageid'] == 3){
                return "Standard members are given one FREE communication every 7 days and it seems you have used yours for the week. Upgrade your account in the my subscription section for unlimited messaging and start really connecting with potential matches!";
            }
            else{
                return "Standard members are given one FREE communication every 7 days and it seems you have used yours for the week. Upgrade your account in the my subscription section for unlimited messaging and start really connecting with potential matches!";
            }
        }
        else{
            ## check the sender isnt blocked
            $blocked = $DB->Row("SELECT count(uid) as total FROM members_network WHERE type=3 AND to_uid = '" . $values['user_id'] . "' AND uid= '" . $receiver_id . "'");
            if($blocked['total']>0){

                return "This member is currently not accepting messages.";
            }

            if($blocked['total'] ==0){

                // SEE IF MEMBER IS BLOCKED WITH THEIR PRIVACY
                $PrivacyBlock = $DB->Row("SELECT `Time Zone` AS total FROM members_privacy WHERE uid= ( '" . $receiver_id . "' ) LIMIT 1");

                $access_data = explode("*",$PrivacyBlock['total']);
                $access_array = array();
                foreach($access_data as $value){
                    array_push($access_array,$value);
                }

                if( in_array($result['genderD'],$access_array) ){
                    $blocked['total']=1;
                }

                if($blocked['total'] ==0){

                	$values['subject'] = str_replace("\\'","\'",$values['subject']);
                    $values['subject'] = str_replace("\\n","\n",$values['subject']);

                	$query = sprintf("SELECT count(id) as total FROM message_room WHERE (owner_id = %d AND partner_id = %d) OR (owner_id = %d AND partner_id = %d) LIMIT 1", $values['user_id'], $receiver_id, $receiver_id, $values['user_id']);
                	$result = $DB->Row($query);
                	if ($result['total'] == 0) {
                		$query = sprintf("INSERT INTO message_room (`owner_id`, `partner_id`, `subject`, `timestamp`) VALUES(%d, %d, '%s', '%s')", $values['user_id'], $receiver_id, $values['subject'], date('Y-m-d H:i:s'));
                		$DB->Insert($query);
                	}


                	$query = sprintf("SELECT * FROM message_room WHERE (owner_id = %d AND partner_id = %d) OR (owner_id = %d AND partner_id = %d) LIMIT 1", $values['user_id'], $receiver_id, $receiver_id, $values['user_id']);
                	$mail_room = $DB->Row($query);

                    if ($mail_room['owner_id'] == $values['user_id'] && $mail_room['room_my_status'] == 'close') {
                        $query = sprintf("UPDATE message_room SET room_my_status = 'open' WHERE owner_id = %d", $values['user_id']);
                        $DB->Update($query);  
                    }

                    if ($mail_room['partner_id'] == $values['user_id'] && $mail_room['room_partner_status'] == 'close') {
                        $query = sprintf("UPDATE message_room SET room_partner_status = 'open' WHERE partner_id = %d", $values['user_id']);
                        $DB->Update($query);  
                    }

                    if ($mail_room['owner_id'] == $values['user_id'] && $mail_room['room_partner_status'] == 'close') {
                        return "This member is currently not accepting messages.";
                    }

                    if ($mail_room['partner_id'] == $values['user_id'] && $mail_room['room_my_status'] == 'close') {
                        return "This member is currently not accepting messages.";
                    }
                    
                    $query = sprintf("UPDATE message_room SET timestamp = '%s' WHERE id = %d", date('Y-m-d H:i:s'), $mail_room['id']);
                    $DB->Update($query);                    

					// SELECT * FROM messages where uid=27595  ORDER BY mailnum DESC LIMIT 2, 1;
					$query = sprintf("SELECT * FROM messages WHERE (uid = %d) ORDER BY mailnum DESC LIMIT 2, 1", $values['user_id']);
					$result = $DB->Row($query);
                	if (!empty($result)) {						
						$date = $result['maildate'];
						$time = $result['mailtime'];
						$seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($date . " " . $time);
						if ($minutes > 3*6) {	// 30min						
							SendMail(ADMIN_EMAIL, "Spammer User", eMeetingInput($receiver_name).'may be a potential spammer. please check messages');
							return "Your email was not sent by Admin.";						}
                	}

                	$query = sprintf("INSERT INTO messages (`uid`, `mail_room_id`, `mail2id`, `mailstatus`, `maildate`, `mailtime`, `mail_subject`, `mail_message`, `mail_displayalert`, `my_box`, `to_box`) 
                									VALUES(%d, %d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
                											$values['user_id'], $mail_room['id'], $receiver_id, 'unread', DATE_NOW, TIME_NOW, $values['subject'], $values['message1'], '1', 'sent', 'inbox');


                	$DB->Insert($query);
                	$message_id = $DB->InsertID();

                    //-- Send push notification
                    setAppNotification($values['user_id'], $values['message1'], $receiver_id, "mail");


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
                    DoEmailSMS($receiver_id, 5, 'email_msg', substr($values['message1'], 0, 30));
                }
                else{
                    return "You have been blocked by this member.";
                }

            }
        }
    }

    return "Your message has been sent.";
}

function GetMsgNoteNew($mess,$id)
{
    global $DB;

    $mess = str_replace("\\n","\n",$mess);

    ## define variables
    $NumFields=1;	$ReturnMessageArray=array();	$id = strip_tags($id);

    ## build query
    $date = new DateTime(null, new DateTimeZone('America/New_York'));
    $DDate = explode(" ",$date->format('m-d-Y h:i:s a P'));

    $SQl = "SELECT * FROM members WHERE members.id='".$id."'";
    $msg = $DB->Row($SQl);

    ## create replay chain
    $chaindata="\n On ".$DDate[0]." ". $msg['username'] ." replied:  \n\"" .$mess."\"\n";

    return $chaindata;
}

function deleteMessageFromBox($id, $mailIDs, $box_type){
    $mailIDsList = explode(",",$mailIDs);
    global $DB;
    
    $mail_id = explode(",", $mailIDs);
    for ($i=0; $i<count($mail_id); $i++) {
        $query = sprintf("SELECT * FROM message_room WHERE id = %d", $mail_id[$i]);        
        $mail_room = $DB->Row($query);

        if (!isset($mail_room['id']))
            continue;

        if ($mail_room['owner_id'] === $id) {
            $query = sprintf("UPDATE message_room SET room_my_status = 'close' WHERE id = %d AND owner_id = %d", $mail_room['id'], $id);
        }
        else {
            $query = sprintf("UPDATE message_room SEt room_partner_status = 'close' WHERE id = %d AND partner_id = %d", $mail_room['id'], $id);
        }

        $DB->Update($query);
    }
    
    return "This conversation has been deleted.";
}

function SendWinkMessageNew($sendfrom,$sendto){
    global $DB;
    $CurrentRel = $DB->Row("SELECT id,email FROM members WHERE username='".$sendto."' LIMIT 1");
    $userID = $DB->Row("SELECT id,email FROM members WHERE username='".$sendfrom."' LIMIT 1");
    $Total = $DB->Row("SELECT count(wsid) AS countwink FROM winkmessagessend WHERE wink_from='".$userID['id']."' && wink_to='".$CurrentRel['id']."'");
    if($Total['countwink']==0){
        $DB->Update("INSERT into winkmessagessend (wink_from, wink_to, sentondate, onlydate) values ('".$userID['id']."', '".$CurrentRel['id']."', NOW(), '".date("Y-m-d")."')");
        $to = $CurrentRel['email'];
        $subject = 'New Wink Message';
        $headers = "From: RealBlackLove.com <noreply@realbacklove.com>" . "\r\n";
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
            //-- Send push notification
            include("fun_push_notification.php");
            setAppNotification($userID['id'],"winked at you!", $CurrentRel['id'], "wink");
            return "Your wink has been sent!";

        }
        else{
            return "Error to send wink mail..";
        }
    }
    else{
        return "Allready wink.";
    }

}


?>