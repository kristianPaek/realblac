<?php

$_REQUEST['n'] =0;
require_once "inc/config.php";

$FLAG_FULLPAGE =1;

$PageLink = "overview.php";
$PageLang = $admin_layout_page1;
if(!isset($_REQUEST['p'])){ $DontShowTitle=1;}
require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );
 
GetVisitorSignupGraphData();

require_once "layout.php";
include "inc/class/lastRSS.php";
$rss = new lastRSS;
$rss->cache_dir = '';
$rss->cache_time = 0;
$rss->cp = 'US-ASCII';
$rss->date_format = 'l';
if(isset($_REQUEST['p']) && $_REQUEST['p']=="maps"){$do_maps=1; }
############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){
if(isset($_REQUEST['do'])){ 

		switch ($_REQUEST['do']) {
		
					case "msg":	  {
					
						
	
						$DB->Update("UPDATE members_admin_message SET title='".$_POST['subject']."', content='".$_POST['editor']."', display='".$_POST['hidebox']."' WHERE id=1 LIMIT 1");
						$ErrorSend=1;

					} break;

					case "update":	  { 
					
						$filename = subd.'inc/config_db.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string							
							  if ( strstr($data[$counter], "'GOOGLE_MAPS_KEY','".GOOGLE_MAPS_KEY."'") ) {
							  	
									$filecontent .= str_replace("'GOOGLE_MAPS_KEY','".GOOGLE_MAPS_KEY."'", "'GOOGLE_MAPS_KEY','".$_POST['google_key']."'", $data[$counter]);
							  }
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 echo "Cannot open file ($filename)"; 
							 exit; 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   echo "Cannot write to file ($filename)"; 
						  exit; 
					   } 
					   fclose($handle);

$ErrorSend=1;
					
					} break;
			
		}
}
}
if(isset($ErrorSend)){
	if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1";}else{$Err = $lang_members_code['no_update']."**0";}
}
if(isset($Err) && !isset($_REQUEST['d'])){

	if( isset($_POST['page']) || isset($RedirectPage) ){
	
		$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['page'];
		
		header('location: overview.php?p='.$page.'&Err='.$Err.'&d=1');
		exit();	
	}else{
		
		header('location: overview.php?Err='.$Err.'&d=1');
		exit();
	}
}
############################################################
#################### FUNCTIONS #############################
function RecentEvents(){

	global $DB;
	$dd=array();
	$count=1;
    $result = $DB->Query("SELECT * FROM system_log WHERE username !='' ORDER BY id DESC LIMIT 15");

    while( $log = $DB->NextRow($result) )
    {
	
		$dd[$count]['username'] 	= $log['username'];
		$dd[$count]['date'] 		= $log['date'];
		$dd[$count]['ip'] 			= $log['ip'];
		$dd[$count]['value'] 		= $log['value'];
		$dd[$count]['type'] 		= $log['type'];
		$count++;
	}
	
	return $dd;
}

function DisplayMessage(){

	global $DB;
	
    $result = $DB->Query("SELECT * FROM system_log ORDER BY id DESC LIMIT 100");

    while( $log = $DB->NextRow($result) )
    {
		print "	<tr class='table_array'>
                    <th>".$log['username']."</th>
                    <th>".$log['date']." / ".$log['time']."</th>
                    <th>".$log['ip']."</th>
                    <th>".$log['value']."</th>
                  </tr>";
	}	
	
}
function GetMemberGenderGraphData(){
	
	global $DB;
	
	$total_members = $DB->Row("SELECT count(uid) AS total FROM members_data");
	
	
	$count=1;
	$string="";
	$g_array = array();
	$Gen = $DB->Query("SELECT fvid,fvCaption FROM field_list_value WHERE fvFid=28");
	while( $gen = $DB->NextRow($Gen) )
    {
			$result = $DB->Row("SELECT count(uid) AS total FROM members_data WHERE gender=".$gen['fvid']);
			$g_array[$count]['name'] = $gen['fvCaption'];
			$g_array[$count]['total'] = round( ($result['total']/$total_members['total'] ) *100,0);
			$count++;
	}
	foreach($g_array as $value){
			
			$string .= $value['name']."--".$value['total']."**";		
	}		
	
	return $string;
}

function GetAffiliateGraphData(){

	global $DB;
	$string="";
	$v_array=array();
	
		for($i=0;$i!=14;$i++){
			
				$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y")));
				
				$QQ = "SELECT count(id) AS total FROM aff_members WHERE joined LIKE '%".$SearchDate."%'";
				$result = $DB->Row($QQ);
				if($result['total'] == ""){
					$v_array[] ="*0";
				}else{
					$v_array[] ="*".$result['total']."";
				}
		}
		// NOW REVERSE FOR NEWEST FIRST
		$v_array = array_reverse($v_array);
		$string="";
		foreach($v_array as $value){
			
			$string .= $value;
		
		}		
		return $string;
}

function GetVisitorGraphData(){

	global $DB;
	$string="";
	$v_array=array();
	
		for($i=0;$i!=14;$i++){
			
				$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y")));
				
				$QQ = "SELECT count(visitor_ip) AS total FROM visitors_table WHERE visitor_date LIKE '%".$SearchDate."%'";
				$result = $DB->Row($QQ);
				if($result['total'] == ""){
					$v_array[] ="*0";
				}else{
					$v_array[] ="*".$result['total']."";
				}
		}
		// NOW REVERSE FOR NEWEST FIRST
		$v_array = array_reverse($v_array);
		$string="";
		foreach($v_array as $value){
			
			$string .= $value;
		
		}		
		return $string;
}

function GetVisitorSignupGraphData(){

	global $DB;
	$string="";
	$v_array=array();
	
		for($i=0;$i!=14;$i++){
			
				$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y")));
				
				$QQ = "SELECT count(id) AS total FROM members WHERE created LIKE '%".$SearchDate."%'";
 
				$result = $DB->Row($QQ);
				if($result['total'] == ""){
					$v_array[] ="*0";
				}else{
					$v_array[] ="*".$result['total']."";
				}
		}
		// NOW REVERSE FOR NEWEST FIRST
		$v_array = array_reverse($v_array);
		$string="";
		foreach($v_array as $value){
			
			$string .= $value;
		
		}		
		return $string;
}

function GetMemberGraphData(){

	global $DB;
	$string="";
	$v_array=array();
	
		for($i=0;$i!=14;$i++){
			
				$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y")));
				
				$QQ = "SELECT count(id) AS total FROM members WHERE created LIKE '%".$SearchDate."%'";
				$result = $DB->Row($QQ);
				if($result['total'] == ""){
					$v_array[] ="*0";
				}else{
					$v_array[] ="*".$result['total']."";
				}
		}
		// NOW REVERSE FOR NEWEST FIRST
		$v_array = array_reverse($v_array);
		$string="";
		foreach($v_array as $value){
			
			$string .= $value;
		
		}		
		return $string;
}

function GetMemberAgeGraphData(){

	global $DB;
	$string="";
	$v_array=array();
	
	$QQ = "SELECT count(id) AS total FROM members WHERE created LIKE '%".$SearchDate."%'";
	$result = $DB->Row($QQ);
	
	return $string;
}

if(GOOGLE_MAPS_KEY !="" && $_REQUEST['p'] =="maps"){
	
	$ExtraString="";
	if(isset($_POST['do']) && !empty($_POST)){
	
		if($_POST['susername'] !="Username" && $_POST['susername'] !="" && $_POST['susername'] != $_POST['u_value']){$ExtraString .=" AND members.username LIKE '".$_POST['susername']."' "; }
		if($_POST['sgender'] !="0"){ $ExtraString .=" AND members_data.gender ='".$_POST['sgender']."' "; }
		if($_POST['spackage'] !="0"){ $ExtraString .=" AND members.packageid ='".$_POST['spackage']."' "; }
		if($_POST['sstatus'] !="0"){ $ExtraString .=" AND members.active ='".$_POST['sstatus']."' "; }
		if($_POST['sjoin'] !="0"){
		
			switch($_POST['sjoin']){
			
				case "1": {
					$ExtraString .=" AND members.created LIKE '".date("Y-m-d")."%' ";
				} break;
				case "2": {
					$ExtraString .=" AND TO_DAYS( NOW(  'y-m-d'  )  )  - TO_DAYS( members.created )  <= 7";
				} break;
				case "3": {
					$ExtraString .=" AND TO_DAYS( NOW(  'y-m-d'  )  )  - TO_DAYS( members.created )  <= 30";
				} break;
				case "4": {
					$ExtraString .=" AND TO_DAYS( NOW(  'y-m-d'  )  )  - TO_DAYS( members.created )  <= 365";
				} break;
			}	
		}
				
	
	}	
	// CREATE TWO ARRAYS, ONE FOR TOTALS AND ONE FOR COUNTRY
	$re_a_array = array(); $array_counter =0;
	$re_b_array = array();
	///customization options are here
	$foundData=0;
	$ReturnData="";
	
	$RnThis = "SELECT package.name AS packname, members_data.gender, members.ip_long,members.ip_lat,members.ip_country ,members.ip_code, members_data.country, members_data.gender, members.id, files.bigimage, files.type, files.approved, members_data.country, members.username, members.ip FROM members
			INNER JOIN members_data ON ( members.id = members_data.uid )
			LEFT JOIN files ON ( files.uid = members_data.uid )
			LEFT JOIN members_online ON ( members_online.logid = members_data.uid )
			LEFT JOIN package ON ( members.packageid = package.pid)
			WHERE members.ip !='00.000.00.00' AND members.ip != '127.0.0.1' AND members.ip !='' AND members.ip_long !='' AND members.ip_lat !='' $ExtraString
			GROUP BY members.username
			ORDER BY members.id DESC LIMIT 100";
	//print $_POST['u_value'];
	$result = $DB->Query($RnThis);
	while( $row = $DB->NextRow($result) )
	{		
	if(!isset($row['gender'])){$row['gender']=0; }
		$gend = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid=".$row['gender']." LIMIT 1");
		
		if($row['bigimage'] ==""){
		$UImage =DEFAULT_IMAGE;
		}else{	
		$UImage = WEB_PATH_IMAGE_THUMBS.$row['bigimage'];
		}
		$BuildHTML = "<table width=200 border=0><tr><td><img src=\"".$UImage."\" class=\"popbox_img\"></td><td valign=\"top\" class=\"popbox_text\"><b>Username: ".$row['username']."</b><br>Package: ".$row['packname']." <br> Gender: ".$gend['fvCaption']." <br> <b><a href=\"".DB_DOMAIN."index.php?dll=profile&pId=".$row['id']."\" target=\"_blank\">View ".$row['username']."\'s Profile</a></b></td></tr></table>";
		$ReturnData .= "{'code': '".$row['ip_code']."', 'name': '".$row['username']."', 'latitude':".$row['ip_lat'].", 'longitude':".$row['ip_long'].",'html':'".$BuildHTML."'},";
			
	}

}
function DisplayAdminMsg(){

	global $DB;

    $result = $DB->Row("SELECT * FROM members_admin_message  WHERE id=1");
	return $result;
}
function DisplayGenders($id=0){

	global $DB;

    $result = $DB->Query("SELECT fvCaption,fvid FROM field_list_value WHERE fvFid=28");

    while( $pack = $DB->NextRow($result) )
    {

			print "<option value='".$pack['fvid']."'>".$pack['fvCaption']."</option>";
		
	}
}
function DisplayPackages($id=0){

	global $DB;

    $result = $DB->Query("SELECT pid, name FROM package");

    while( $pack = $DB->NextRow($result) )
    {

			print "<option value='".$pack['pid']."'>".$pack['name']."</option>";
		
	}
}
############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/overview.php";

}else{

		if($PLUGINS_PAGE_TYPE =="html"){
			
	    	print $PLUGINS_PAGE_LINK;
			
		}elseif($PLUGINS_PAGE_TYPE =="link"){
			
		 	require_once (	$PLUGINS_PAGE_LINK 	);	
		}
}
print $tdata[2]["contents"]; 
$DB->Disconnect();
?>