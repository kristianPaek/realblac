<?php


/*
	DISPLAY THE GENDER FOR THE SELECTED USER
*/
function MakeGenderNew($id)
{
    if ($id == 0 || $id == "") {
        return "na";
    } else {
        global $DB;
        $re3 = $DB->Row("SELECT id,fvCaption FROM field_list_value WHERE fvid='" . strip_tags($id) . "'  AND lang='" . $_SESSION['lang'] . "' LIMIT 1");
        return $re3['fvCaption'];
    }
}

function MakeCountryNew($id, $fvFid=""){
    global $DB;

    if($id == 0 || $id == ""){

        return "na";

    }else{

        if(is_numeric($fvFid)){ $Extra ="AND fvFid='".$fvFid."'"; }else{ $Extra =""; }

        $re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."'  ".$Extra." AND lang='".D_LANG."' LIMIT 1");

        if(empty($re3)){
            $re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."' ".$Extra." LIMIT 1");
        }

        return $re3['fvCaption'];
    }

}

function MakeAgeNew($birthday){
    $birth = explode("-", $birthday);
    if(isset($birth[1])){
        switch($birth[1]){
            case "JAN": { $MM = "01"; } break;
            case "FEB": { $MM = "02"; } break;
            case "MAR": { $MM = "03"; } break;
            case "APR": { $MM = "04"; } break;
            case "MAY": { $MM = "05"; } break;
            case "JUN": { $MM = "06"; } break;
            case "JUL": { $MM = "07"; } break;
            case "AUG": { $MM = "08"; } break;
            case "SEP": { $MM = "09"; } break;
            case "OCT": { $MM = "10"; } break;
            case "NOV": { $MM = "11"; } break;
            case "DEC": { $MM = "12"; } break;
            default: { return 21; }
        }
    }else{
        $MM = "12";
    }

    $day =$birth[2];
    $month =$MM;
    $year =$birth[0];

    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;

    if ($month_diff < 0) $year_diff--;
    elseif (($month_diff==0) && ($day_diff < 0))$year_diff--;
##        elseif (($month_diff==0) && ($day_diff >= 0))$year_diff++;
    return $year_diff;

}

function GetAgeYearNew($number){
    $year = date("Y");
    for($i=$number; $i != 0; $i--){
        $year--;
    }
    return $year;
}

function deleteNetworkFromFavorite($userID,$del_uid,$netid){
    global $DB;
    $DB->Update("DELETE FROM members_network WHERE (uid='".$del_uid."' OR to_uid='".$del_uid."')  AND (uid=".$userID." OR to_uid=".$userID.") AND type='".$netid."'");

    return "Member removed successfully!";
}

?>