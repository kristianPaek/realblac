<?php

//-- Function to get inbox/send/trash/wink message
function GetMessage($id,$box=1, $orderBy="maildate", $Start="0", $Stop="10"){

    global $DB;
    $Start = $Start?$Start:'0';	
    $Stop  = $Stop?$Stop:'10';
    $NumFields=1;
    $ReturnMessageArray = array();

    $orderBy2 = $orderBy;
    if(($orderBy=="maildate" || $orderBy=="messages.maildate")) {
        $orderBy2 = "maildate DESC, mailtime DESC";
    } elseif(($orderBy=="mailnum" ||$orderBy=="messages.mailnum")) {
        $orderBy = "members.username";
        $orderBy2 = "members.username";
    } elseif(($orderBy=="mail_subject" ||$orderBy=="messages.mail_subject")) {
        $orderBy = "messages.mail_subject";
        $orderBy2 = "messages.mail_subject";
    }
    else
    {
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
                WHERE messages.uid= ( '".$id."' ) AND messages.my_box='sent' GROUP BY ".$orderBy.", messages.mailnum ORDER BY ".$orderBy2." LIMIT $Start, $Stop";

        $totalMsg = $DB->Row("SELECT count(mailnum)  AS total FROM messages WHERE uid= ( '".$id."' ) AND my_box='sent'");
    }
    elseif($box == "trash"){
        $SQL = "SELECT members.username, messages.mail_message, messages.mailtime, messages.mailnum, messages.uid, messages.mailstatus, messages.type, messages.maildate, messages.mail_subject, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f
                FROM messages
                LEFT JOIN files ON ( files.uid = messages.uid AND files.approved = 'yes' AND files.title <> 'Message Photo' )
                LEFT JOIN album ON ( album.aid = files.aid )
                LEFT JOIN members ON ( members.id = messages.uid )
                WHERE (messages.mail2id='".$id."') AND (messages.to_box='trash') GROUP BY ".$orderBy.", messages.mailnum ORDER BY ".$orderBy2." LIMIT ".$Start.", ".$Stop."";

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

            $SQL = "SELECT members.*,winkmessagessend.read_status as read_status, winkmessagessend.wsid from winkmessagessend inner join members on members.id = winkmessagessend.wink_from WHERE wink_to='" . $id . "' && onlydate = '" . $date . "' ORDER BY wsid DESC";
            $Data = $DB->Query($SQL);

            if(mysql_num_rows($Data)>0){
                $str=explode('-',$date);
                $date = $fulldayname[date('D', strtotime($date))].' ('.$str[2].' '.date("M").')';

                while($row=mysql_fetch_array($Data)){
                    $messages[] = array("date" => $date,"wink_id"=>$row['wsid'], 'id'=>$row['id'],'username'=>$row['username'],'view_status'=>$row['read_status']);
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
                WHERE messages.mail2id='".$id."' AND messages.to_box='inbox' AND messages.type !='wink' GROUP BY ".$orderBy.", messages.mailnum ORDER BY ".$orderBy2."  LIMIT ".$Start.", ".$Stop."";
         
        
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
            "image"         => ReturnDeImage($msg,"big"),
            "from"          => $msg['username'],
            "totalMsg"      => $totalMsg['total'],
            "status"        => $messagestatus
        );
        $NumFields++;
    }

    return $ReturnMessageArray;
}

//-- Function to get inbox/send/trash/wink message
function GetMessageCount($id,$box=1, $orderBy="maildate", $Start="0", $Stop="10"){

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
function GetMsgDataForUser($userID,$id){

    global $DB;

    ## define variables

    $ReturnMessageArray=array();	$id = strip_tags($id);



    ## build query

    $msg = $DB->Row("SELECT messages.mail2id, messages.mailnum, messages.maildate, mailtime, messages.uid, messages.type, messages.mail_subject, messages.mail_message, members.username, files.bigimage, files.type, album.cat, album.allow_a,	album.allow_n,	album.allow_h,	album.allow_f

	FROM messages

	INNER JOIN members ON ( members.id = messages.uid )

	LEFT JOIN files ON ( files.uid = messages.uid AND files.approved = 'yes' AND files.title <> 'Message Photo' AND files.default=1)

	LEFT JOIN album ON ( album.aid = files.aid )

	WHERE messages.uid = members.id AND messages.mailnum= ( '".$id."' ) AND ( messages.mail2id= ( '".$userID."' ) OR  messages.uid= ( '".$userID."' ) ) LIMIT 1");



    ## clean the members input

    $values = @array_map('eMeetingInput',$msg);



    ## CHECK TO SEE IF THERE ARE ANY IMAGES WITH THIS MESSAGE

    $imageArry = array(); $i=0;

    $msgImage = $DB->Query("SELECT * FROM files WHERE user = ( '".$id."' ) AND type='photo' ");

    while( $img = $DB->NextRow($msgImage) ){



        $imageArry[$i]['name'] = $img['bigimage'];

        $i++;

    }

    //////////////////////////////////////////////////////////

    $ReturnMessageArray['image_array'] 		= $imageArry;

    $ReturnMessageArray['id'] 				= $msg['mailnum'];

    $ReturnMessageArray['senderid'] 		= $msg['uid'];

    $ReturnMessageArray['type'] 			= $msg['type'];

    $ReturnMessageArray['date'] 			= dates_interconv($msg['maildate']);

    $ReturnMessageArray['time'] 			= $msg['mailtime'];

    $ReturnMessageArray['subject'] 			= $msg['mail_subject'];

    $ReturnMessageArray['message'] 			= stripslashes(nl2br($msg['mail_message']));

    $ReturnMessageArray['username'] 		= $msg['username'];

    $ReturnMessageArray['image'] 			= ReturnDeImage($msg,"big");

    //////////////////////////////////////////////////////////////

    //die($_SESSION['uid'] ."==". $msg['mail2id']);

    if($userID == $msg['mail2id']){



        $DB->Update("UPDATE messages SET mailstatus='read' WHERE mailnum=".$id." LIMIT 1");

    }
    ## return array

    return $ReturnMessageArray;
}

function sendMessage($values){

    global $DB;

    include_once("fun_push_notification.php");
    $ToArray = explode(",",$values['to']);
    foreach($ToArray as $sending_to){
        ## get the userid for this user
        $resultID = $DB->Row("SELECT id FROM members WHERE username='".eMeetingInput($sending_to)."' LIMIT 1");

        $TUID = $resultID['id'];

        $UploadMax = 0;
        if($TUID ==""){
            return "Please provide user id to send mail.";
        }
        elseif($TUID == $values['user_id']){
            return "Do not send mail to self.";
        }

        if(strlen($values['subject']) < 2 ){
            return "Subject is minimum of 2 character.";
        }
        
        //echo "SELECT count(uid) AS space FROM messages WHERE uid= ( '".$values['user_id']."' ) AND type = 'normal' AND maildate>='".$olddate."'" ;
        
	//$olddate = date("Y-m-d", strtotime(-2 . 'days')); // Date less than 48 hours or 2 days from today date.
        //$usedimagespace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid= ( '".$values['user_id']."' ) AND type = 'normal' AND maildate>='".$olddate."'"); // DATE_NOW
        
        //echo DATE_NOW ; 
	
	
	$usedimagespace = $DB->Row("SELECT maildate,mailtime FROM messages WHERE uid= '".$values['user_id']."' 
        			    AND type = 'normal' ORDER BY mailnum DESC LIMIT 1 ");
        			    
        $date = $usedimagespace['maildate'];
	$time = $usedimagespace['mailtime'];
	
	$timestamp = strtotime($date.$time); //1373673600	
	// getting current date 
	$cDate = strtotime(date('Y-m-d H:i:s'));	
	// Getting the value of old date + 48 hours
	$oldDate = $timestamp + 604800; // 172800 seconds in 48 hrs and 86400 in 24 hrs 604800 in 7 days 2592000 in 30 days
	
        $sql = "SELECT members_data.gender AS genderD, package.view_adult, package.name, package.wink, members.moderator, package.Highlighted, package.Featured, package.maxMessage, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members
					INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
					LEFT JOIN package ON ( members.packageid = package.pid )
					LEFT JOIN members_data ON ( members.id = members_data.uid )
					WHERE (members.id = '".$values['user_id']."') LIMIT 1";
        $result = $DB->Row($sql);

         if( $oldDate < $cDate && D_FREE =="no" && $result['packageid'] ==3){
		//  && D_FREE =="no" 
            if($result['packageid'] == 3){
                return "Standard members are given one FREE communication every 7 days and it seems you have used yours for the week. Upgrade your account in the my subscription section for unlimited messaging and start really connecting with potential matches!";
            }
            else{
                return "Standard members are given one FREE communication every 7 days and it seems you have used yours for the week. Upgrade your account in the my subscription section for unlimited messaging and start really connecting with potential matches!";
            }

        }
        else{
            ## check the sender isnt blocked
            $blocked = $DB->Row("SELECT count(uid) as total FROM members_network WHERE type=3 AND to_uid= '".$values['user_id']."' AND uid= '".$TUID."'");
            if($blocked['total']>0){

                return "This member is currently not accepting messages.";

            }

            if($blocked['total'] ==0){

                // SEE IF MEMBER IS BLOCKED WITH THEIR PRIVACY
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

                    $values['subject'] = str_replace("\\'","\'",$values['subject']);
                    $values['subject'] = str_replace("\\n","\n",$values['subject']);

                    $BadWords = CreateBadWordFilter();

                    ## make message data safe
                    $iddata = eMeetingInput(filter_str($values['idhidden'], $BadWords));

                    $mail_message = $DB->Row("SELECT mail_message from messages where (mail2id = '".$values['user_id']."' or uid = '".$values['user_id']."') and mail_subject='".$values['subject']."'");
                    $msg = $mail_message['mail_message'];

                    $MessageData = eMeetingInput(filter_str($msg, $BadWords));

                    $MessageData1 = eMeetingInput(filter_str($values['message1'], $BadWords));

                    $MessageData = GetMsgNoteNew($MessageData1,$values['user_id']) . $MessageData;

                    $MessageSubject = eMeetingInput(filter_str($values['subject'], $BadWords));

                    $sqlCheckTrash = "SELECT count(uid) as total FROM  messages WHERE  mail_subject = '".$MessageSubject."' AND uid = '".$values['user_id']."' AND mail2id ='".$TUID."' AND to_box='trash' LIMIT 0 , 30";

                    $checkTrashResult = $DB->Row($sqlCheckTrash);

                    if($checkTrashResult['total'] > 0){
                        return "This member is currently not accepting messages.";
                    }

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
                    if($iddata!='' || $result['total']>0)
                    {

                        if($result['total'] == 1)
                        {
                            $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
                                        VALUES ('".$values['user_id']."', NULL , '".$TUID."', 'unread', '".DATE_NOW."', '".TIME_NOW."', '".$MessageSubject."', '".$MessageData.$CardCode."', '1', 'sent', 'inbox')");
                            $message_id = $DB->InsertID();

                        }
                        else
                        {
                            $b = "UPDATE `messages` SET maildate='".DATE_NOW."', mailtime='".TIME_NOW."', mail_message='".$MessageData.$CardCode."', mailstatus='unread' WHERE mail_subject='".$MessageSubject."' and uid='".$values['user_id']."'   LIMIT 1";
                            $DB->Update($b);
                        }
                        $c = "UPDATE `messages` SET maildate='".DATE_NOW."', mailtime='".TIME_NOW."', mail_message='".$MessageData.$CardCode."' WHERE mail_subject='".$MessageSubject."' and mail2id='".$values['user_id']."' LIMIT 1";
                        $DB->Update($c);
                    }
                    else
                    {
                        $DB->Insert("INSERT INTO `messages` ( `uid` , `mailnum` , `mail2id` , `mailstatus` , `maildate` , `mailtime` , `mail_subject` , `mail_message` , `mail_displayalert`, my_box, to_box )
                                    VALUES ('".$values['user_id']."', NULL , '".$TUID."', 'unread', '".DATE_NOW."', '".TIME_NOW."', '".$MessageSubject."', '".$MessageData.$CardCode."', '1', 'sent', 'inbox')");
                        $message_id = $DB->InsertID();
                    }

                    //-- Send push notification
                    setAppNotification($values['user_id'],$values['message1'], $TUID, "mail");


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
                    return "This member is currently not accepting messages.";
                }

            }
        }
    }

    return "Message Sent!";
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
    for($i=0; $i<count($mailIDsList);$i++){
        $mailID = $mailIDsList[$i];
        if($box_type == "inbox"){
            $DB->Update("UPDATE messages SET to_box='trash' WHERE  mail2id =".$id." AND mailnum='".$mailID."' ");

        }

        if($box_type == "wink"){

            $DB->Insert("UPDATE messages SET to_box='trash' WHERE mail2id =".$id." AND mailnum='".$mailID."' LIMIT 1");
        }

        if($box_type == "trash"){

            $DB->Insert("UPDATE messages SET to_box='none' WHERE  mail2id =".$id." AND mailnum='".$mailID."' LIMIT 1");
        }

        if($box_type =="sent"){

            $DB->Insert("UPDATE messages SET my_box='none' WHERE  uid =".$id." AND mailnum='".$mailID."' LIMIT 1");
        }

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
            //setAppNotification($userID['id'],"winked at you!", $CurrentRel['id'], "wink");
            return "Wink Sent!";

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