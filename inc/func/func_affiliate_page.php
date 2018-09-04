<?php
function GetPages($page){

	global $DB;

    $result = $DB->Row("SELECT content FROM aff_pages WHERE page='".$page."' LIMIT 1");

    return nl2br($result['content']);
}
############################################################
#################### SUMMARY P #############################
function GetCountries($value="-----------"){
	
	$ReturnString="";
	$ReturnString .= '<SELECT name="j10">';
	$ReturnString .= DisplayCountries($value);
	
	return $ReturnString;
	
}
function GetTotals(){

	global $DB;

    $result = $DB->Row("SELECT total_clicks,total_registered,joined FROM aff_members WHERE id= ( '".$_SESSION['aff_uid']."' )");

    return $result;
}
function GetSubs(){

	global $DB;

    $result = $DB->Row("SELECT count(*) AS total FROM aff_payment WHERE affiliate_id = ( '". $_SESSION['aff_uid']."' ) AND status='approved'");

    return $result['total'];
}

function GetSubsAmount(){

	global $DB;

    $result = $DB->Row("SELECT sum(total_due) AS total FROM aff_payment WHERE affiliate_id = ( '". $_SESSION['aff_uid']."' ) AND status='approved'");
	
	if($result['total'] ==""){
		return "0.00";
	}else{
		return $result['total'];
	}
}

function GetSubsAmountPaid(){

	global $DB;

    $result = $DB->Row("SELECT sum(total_due) AS total FROM aff_payment WHERE affiliate_id =  ( '". $_SESSION['aff_uid']."' ) AND status='approved' AND paid='yes'");
	
	if($result['total'] ==""){
		return "0.00";
	}else{
		return $result['total'];
	}
}

function DisplayBanners(){

	global $DB;
	
    $result = $DB->Query("SELECT * FROM aff_banners");

    while( $log = $DB->NextRow($result) )
    {
		print eMeetingOutput($log['filename'],true);
		print "<p>".eMeetingOutput($log['image_alt'])."</p>";
		print "<textarea style='width:300px' cols='50' rows='5'><a href='".DB_DOMAIN."index.php?affid=".$_SESSION['aff_uid']."'>".eMeetingOutput($log['filename'],true)."</a></textarea>";
		print "<p></p>";
	}
		
}
function displayPayments(){

	global $DB;
	
    $result = $DB->Query("SELECT * FROM aff_payment WHERE affiliate_id='".$_SESSION['aff_uid']."'");

    while( $log = $DB->NextRow($result) )
    {
		print "	<tr class='table_array' bgcolor='#FFFFFF' height=30>
                  <td>".dates_interconv($log['date'])."</td>
                  <td>".AFF_CURRENCY.$log['total_due']."</td>
                  <td>".$log['status']."</td>
                  <td>".$log['paid']."</td>
                </tr>";
	}
		
}
function GetData(){

	global $DB;

    $result = $DB->Row("SELECT * FROM aff_members WHERE id=  ( '".$_SESSION['aff_uid']."' ) ");

    return $result;
}
?>