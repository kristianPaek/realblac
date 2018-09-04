<?php
function DisplayPackages(){

    global $DB;
    $RunningCount=1;
    $PAckageDataArray = array();

    $top = $DB->Query("SELECT SMS_credits, pid, name, price, icon, comments, currency_code, numdays FROM package WHERE visible='1' and type='custom' order by price asc");

    while( $code = $DB->NextRow($top) ){

        ## DISPLAY UPGRADE PERIOD
        if($code['numdays'] < 8){
            $timeCap = "days";
            $timeperiod  = $code['numdays'];
        }elseif($code['numdays'] < 30){
            $timeCap = "weeks";
            $timeperiod = $code['numdays']/7;
        }elseif($code['numdays'] < 900){
            
            $timeperiod = $code['numdays']/30;
            
            if($timeperiod==1)
            {
            	$timeCap = "month";
            }
            else
            {
            	$timeCap = "months";
            }
            

        }elseif($code['numdays'] == "2147483647"){
            $timeCap = "unlimited time";
            $timeperiod="";
        }

        $PAckageDataArray[] = array(
            "id"        => $code['pid'],
            "comments"  => $code['comments'],
            "price"  => $code['price'],
            "currency_code"  => $code['currency_code'],
            "icon"  => $code['icon'],
            "name"  => $code['name'],
            "SMS_credits"  => $code['SMS_credits'],
            "time_type"  => $timeCap,
            "time_period"  => $timeperiod
        );



        $RunningCount++;
    }

    return $PAckageDataArray;
}

function DisplayPaymentCode(){

    global $DB;
    $PAckageDataArray = array();
    $RunningCount=1;
    $top = $DB->Query("SELECT id, action, method, name, icon, comments FROM merchant WHERE active='yes'");

    while( $code = $DB->NextRow($top) ){

//        $PAckageDataArray[$RunningCount]['id'] 			=  	$code['id'];
//        $PAckageDataArray[$RunningCount]['name'] 		=  	$code['name'];
//        $PAckageDataArray[$RunningCount]['action'] 		=  	$code['action'];
//        $RunningCount++;

        $PAckageDataArray[] = array(
            "id" => $code['id'],
            "name" => $code['name'],
            "action" => $code['action']
        );
    }

    return $PAckageDataArray;

}

function DisplayBankPayment(){

    global $DB;
    $PAckageDataArray = array();
    $RunningCount=1;
    $top = $DB->Query("SELECT merchant_data.name, merchant_data.value FROM merchant_data, merchant WHERE merchant_data.mid = merchant.id AND merchant.action='bank'");

    while( $code = $DB->NextRow($top) ){

        $PAckageDataArray[$RunningCount]['name'] 		=  	$code['name'];
        $PAckageDataArray[$RunningCount]['value'] 		=  	$code['value'];
        $RunningCount++;
    }

    return $PAckageDataArray;

}

function DisplayBankPrice($packageID){

    global $DB;

    $top = $DB->Row("SELECT currency_code, price FROM package WHERE pid= ('".$packageID."') LIMIT 1");

    return $top;

}
?>