<?php
/**
 * api: eMeeting Dating Software
 * title: Authorize.net Payment Plugin
 * description: This plugin will setup Authorize.net postback logic to your website.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd
 * url: http://www.authorize.net
 * license: eMeeting 9.0
 * provides: paypal
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: October 1st 2011
 */



///////////////////////////////////////////////////////////////////////////////////////////
// PYMENT CALLBACK (AFTER PAYMENT IS MADE)
///////////////////////////////////////////////////////////////////////////////////////////
function makeSubscriptionTransaction($responce_code, $responce_data, $userID,$packageID, $email, $transID){
	
    if($responce_code == 1){
        $data = str_replace("**",":",$responce_data);
        $data = explode(",",$data);

        $string="";
        foreach($data as $value){
            $string .= $value." <br>";
        }

        // SEND POSTBACK DATA TO ADMIN FOR STORING
        include_once ("../classes/class_email.php");
        $text = "";
        $html = $string;
        $DB_MAIL = new htmlMimeMail();
        $DB_MAIL->setHtml($html, $text);
        $DB_MAIL->setReturnPath(ADMIN_EMAIL);
        $DB_MAIL->setFrom('"'.ADMIN_EMAIL.'" <'.ADMIN_EMAIL.'>');
        $DB_MAIL->setSubject("Authorize.net POSTBACK DATA");
        $DB_MAIL->setHeader('X-Mailer', 'eMeeting Dating Software');
        $result = $DB_MAIL->send(array(ADMIN_EMAIL));
        //$result = $DB_MAIL->send(array('contact@realblacklove.com'));
        @ini_restore(sendmail_from);

        AddOrderNew($userID, $packageID, "AuthorizeNet", $email, $transID);

        return "success";

    }
    else{
        return "failed";
    }
}

// ADD ORDER TO THE DATABASE
function AddOrderNew($UserID, $PackageID, $method, $email, $TRANS_ID){

    global $DB;

    if($TRANS_ID != ""){

        $td = $DB->Row("SELECT id FROM members_billing WHERE transaction_id = ( '".$TRANS_ID."' ) LIMIT 1");

        if( empty($td) ){
            // CHECK PACKAGE DETAILS
            $pak = $DB->Row("SELECT subscription, price_new, numdays_new FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");
            if ($pak['numdays_new'] > 730)
            {$pak['numdays_new'] = 3653;
            }


            // DELETE OLD ENTRIES TO KEEP THE SYSTEM CLEAN
            $DB->Update("DELETE FROM members_billing WHERE uid = ( '".$UserID."' ) ");

            // ADD ENTRY TO DATABASE
            $DB->Insert("INSERT INTO `members_billing` (`id` ,`uid` ,`packageid` ,`date_upgrade` ,`date_expire` ,`pay_method` ,`running` ,`subscription` ,`bill_email` ,`transaction_id`)
				VALUES (NULL , '".$UserID."', '".$PackageID."', '".date("Y-m-d H:i:s")."', '".date('Y-m-d H:i:s', strtotime('+'.$pak['numdays_new'].' days'))."', '".$method."', 'yes', '".$pak['subscription']."', '".$email."', '".$TRANS_ID."')");

            // UPGRADE MEMBERS ACCOUNT
            UpgradeMembersAccountNew($PackageID, $UserID);

            // CHECK THE AFFILIATE SYSTEM
            CheckAffiliateNew($UserID, $pak['price_new']);

            $_POST['username'] = "Member"; // no username postback is available so to save an extra SQL we just user member
            SendTemplateMail($_POST, 2);

            return "success-new";

        }else{
            // CHECK PACKAGE DETAILS
            $pak = $DB->Row("SELECT subscription, price_new, numdays_new FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");

            if ($pak['numdays_new'] > 730)
            {$pak['numdays_new'] = 3653;
            }


            // DETAILS ALREADY FOUND, UPDATE THE CURRENT INFORMATION
            $DB->Insert("UPDATE `members_billing` SET date_expire='".date('Y-m-d H:i:s', strtotime('+'.$pak['numdays_new'].' days'))."', running='yes' WHERE transaction_id = ( '".$TRANS_ID."' ) LIMIT 1");

            // UPGRADE MEMBERS ACCOUNT
            UpgradeMembersAccount($PackageID, $UserID);

            return "success-update";

        }

    }

    return "failed";
}

function UpgradeMembersAccountNew($PackageID, $UserID){
    /*
        This function updates the package Id on the members database record
    */
    global $DB;

    if(stristr($PackageID, 'sms') === FALSE) {

        $Upgrade_Record = $DB->Row("UPDATE members SET packageid= ( '".$PackageID."' ) WHERE id= ( '".$UserID."' ) LIMIT 1");

    }else{
        $cc = explode("--",$PackageID);
        // do SMS credits
        if($cc[0] == "sms"){

            $Upgrade_Record = $DB->Row("UPDATE members_privacy SET SMS_credits=SMS_credits+".$cc[1]." WHERE uid='".$UserID."' LIMIT 1");

        }elseif($cc[0] == "highlight"){

            $Upgrade_Record = $DB->Row("UPDATE members SET highlight='on' WHERE id='".$UserID."' LIMIT 1");

        }elseif($cc[0] == "featured"){

            $Upgrade_Record = $DB->Row("UPDATE files SET featured='yes' WHERE uid='".$UserID."' LIMIT 1");

        }else{
            $Upgrade_Record = $DB->Row("UPDATE members SET packageid = ".$PackageID);
        }

    }

    return $Upgrade_Record;
}


function CheckAffiliateNew($UserID, $Price){

    global $DB;

    // check to see if this user signed up via an affiliate code
    $found = $DB->Row("SELECT affiliate_id FROM aff_signup  WHERE member_id = ( '".$UserID."' ) LIMIT 1");

    if(isset($found['affiliate_id'])){

        // WORK OUT COMMISION RATE

        $result = $DB->Row("SELECT content FROM aff_pages WHERE page='commission' LIMIT 1");

        $COMMISSION_RATE = ($result['content']/100 * $Price);

        $DB->Insert("INSERT INTO `aff_payment` (`member_id` ,`affiliate_id` ,`total_due` ,`status` ,`date` )
			VALUES ('".$UserID."', '".$found['affiliate_id']."', '".$COMMISSION_RATE."', 'unapproved', '".date("Y-m-d")."')");

    }

    return;
}

//function transaction(){
//    $string="";
//    foreach($_POST as $key => $value){
//        $string .= $key." == ".$value." <br>";
//    }
//
//    // SEND POSTBACK DATA TO ADMIN FOR STORING
//    $text = "";
//    $html = $string;
//    $DB_MAIL = new htmlMimeMail();
//    $DB_MAIL->setHtml($html, $text);
//    $DB_MAIL->setReturnPath(ADMIN_EMAIL);
//    $DB_MAIL->setFrom('"'.ADMIN_EMAIL.'" <'.ADMIN_EMAIL.'>');
//    $DB_MAIL->setSubject("CCBill POSTBACK DATA");
//    $DB_MAIL->setHeader('X-Mailer', 'eMeeting Dating Software');
//    $result = $DB_MAIL->send(array(ADMIN_EMAIL));
//
//    @ini_restore(sendmail_from);
//
//    //<!-- email sent --
//
//
//    $OrderID 	= trim($_POST['custom']);
//    $ORDER_PARTS = explode("**", $OrderID);
//    $PackageID 	=  $ORDER_PARTS[1];
//    $UserID 	=  $ORDER_PARTS[0];
//
//    $Email = $_POST['email'];
//    $TransID = $_POST['subscription_id'];
//    if($_POST['testMode'] ==100){ $_POST['transId']=100;}
//
//    if($Email==""){ $Email="email@email.com"; }
//    if($TransID ==""){ $TransID="123".date('d'); }
//
//    if($PackageID !="" && $UserID !="" ){
//
//        $td = $DB->Row("SELECT id FROM members_billing WHERE transaction_id = ( '".$TransID."' ) LIMIT 1");
//
//        if( empty($td) ){
//
//            // CHECK PACKAGE DETAILS
//            $pak = $DB->Row("SELECT subscription, price, numdays FROM package WHERE pid= ( '".$PackageID."' ) LIMIT 1");
//
//            // DELETE OLD ENTRIES TO KEEP THE SYSTEM CLEAN
//            $DB->Update("DELETE FROM members_billing WHERE uid = ( '".$UserID."' ) ");
//
//            // ADD ENTRY TO DATABASE
//            $DB->Insert("INSERT INTO `members_billing` (`id` ,`uid` ,`packageid` ,`date_upgrade` ,`date_expire` ,`pay_method` ,`running` ,`subscription` ,`bill_email` ,`transaction_id`)
//					VALUES (NULL , '".$UserID."', '".$PackageID."', '".date("Y-m-d H:i:s")."', '".date('Y-m-d H:i:s', strtotime('+'.$pak['numdays'].' days'))."', 'CCBill', 'yes', '".$pak['subscription']."', '".$email."', '".$TransID."')");
//
//            // UPGRADE MEMBERS ACCOUNT
//            UpgradeMembersAccount($PackageID, $UserID);
//
//            // EMAIL UPGRADE EMAIL TO MEMBER
//            $_POST['username'] = "Member"; // no username postback is available so to save an extra SQL we just user member
//            SendTemplateMail($_POST, 2);
//
//            // CHECK THE AFFILIATE SYSTEM
//            //CheckAffiliate($UserID, $pak['price']);
//
//
//        }
//
//
//    }
//}

?>