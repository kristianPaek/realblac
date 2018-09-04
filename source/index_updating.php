<?
$loginSet=1;
require_once "inc/config.php";
require_once subd . "inc/config.php";

if (!isset($_SESSION['admin_auth'])  || $_SESSION['admin_auth'] != "yes")  {
	header("location: index.php");
	exit();  
}

$days = (strtotime($_SESSION['trial_startdate']) - strtotime(date("Y-m-d"))) / (60 * 60 * 24);

$pos = strpos(KEY_ID, "TRIAL_");
if ($pos === false) { }else{ $trKey =1; }
if($days < 14400 && isset($trKey)){
 
			$filename = '../inc/config.php';
			if (!$file = fopen($filename, 'a+b')) {
						
							die("THERE IS AN ERROR TRYING TO OPEN YOUR CONFIG FILE. PLEASE CHECK IT EXISTS AND IS WRITABLE. (inc/config.php)");
						
			} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
								
										$data[$counter] = fgets($file);
									
										  if ( strstr($data[$counter], "'DATESETUP','".DATESETUP."'") ) {
										 
												$filecontent .= str_replace("'DATESETUP','".DATESETUP."'", "'DATESETUP','".date('Y-m-d')."'", $data[$counter]);
										  }
										  else{
												$filecontent .= $data[$counter];
										  }
										  
										  $counter ++;									  
									}
									
									fclose($file);
									
			}
			$handle = fopen($filename, 'w');
			fwrite($handle, $filecontent);
			fclose($handle);
 		$_SESSION['trial_startdate'] = DATESETUP;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=$admin_loading[1] ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$admin_layout_header['charset'] ?>">

<META HTTP-EQUIV=Refresh CONTENT="5; URL=overview.php">
</head>

<body>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="100%" align="center"> 

<table width="407" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr> 
		<td height="45"> <p align="center"><strong><font color="#999999" size="4" face="Arial, Helvetica, sans-serif"><?=$admin_loading[1] ?></font></strong> </p>
		  </td>
	  </tr>
	  <tr> 
		<td height="42" align="center"><img src="inc/images/loading.gif"> </td>
	  </tr>
	  <tr> 
		  <td height="42" align="center"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif"><strong><?=$admin_loading[2] ?></strong></font></td>
	  </tr>
	</table><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">
	
	<?
	// MAKE GENDER ARRAY
	$gender_array1 = array(); $i_icon =1;
	$gender_array1[0]['caption'] = "n/a";
	$gg = $DB->Query("SELECT fvCaption, fvid FROM `field_list_value` WHERE fvFid =28 AND lang='".A_LANG."'");
	if(empty($gg)){
	$gg = $DB->Query("SELECT fvCaption, fvid FROM `field_list_value` WHERE fvFid =28");
	}
	while( $G = $DB->NextRow($gg) )
    {
		$gender_array1[$G['fvid']]['caption'] = $G['fvCaption'];
		$gender_array1[$G['fvid']]['id'] = $G['fvid'];
		$gender_array1[$G['fvid']]['icon'] = "<img src='inc/images/16x16/".$i_icon.".png'>"; $i_icon++;
	}
	$_SESSION['g_array'] = $gender_array1;

	// CHECK TO MAKE SURE ADMIN PROFILE EXISTS
	$ff = $DB->Row("SELECT count(id) AS total FROM members WHERE id=0");
	if($ff['total'] =='0'){
			
			// GET THE USERNAME OF THE ADMIN

			$DB->Insert("INSERT INTO `members` (`id` ,`username` ,`password` ,`email` ,`session` ,`ip` ,`lastlogin` ,`visible` ,`active` ,`created` ,`packageid` ,`hits` ,`profile_complete` ,`templateid` ,`updated` ,`moderator` ,`activate_code` ,`highlight`
			)VALUES ('0', 'Administrator', '".md5("123456789")."', '".ADMIN_EMAIL."', '', '".$ip."', '".DATE_NOW."', 'no', 'active', '".DATE_NOW."', '3', '0', '100', '1', '".DATE_NOW."', 'yes', 'OK', 'off')");
			$userid = $DB->InsertID();
			$DB->Insert("UPDATE members SET id=0 WHERE id=".$userid." LIMIT 1");
			$DB->Insert("INSERT INTO `members_data` ( `uid` ) values ( '0' )");
			$DB->Update("UPDATE `members_data` SET age='1974-JAN-15', country='United States', gender='63', headline='' WHERE uid=0 LIMIT 1"); // make default values
	
			$DB->Insert("INSERT INTO `members_privacy` ( `uid` , `Newsletters` , `Notifications` , `IM` , `Language` , `Time Zone` ) VALUES ('0', 'yes', 'yes', 'yes', 'english', '')");			
						
			
	}
	// EDIT THE IM HISTORY
	$DB->Update("DELETE FROM visited WHERE TO_DAYS( NOW(  'y-m-d h:i:s'  )  )  - TO_DAYS( date )  >= 30");
	//print "<p>".update_icon." Delete old visitor data</p>";
	// UPDATE OLD MESSAGES
	$DB->Update("DELETE FROM messages WHERE TO_DAYS( NOW(  'y-m-d'  )  )  - TO_DAYS( maildate )  >= 50");

	// UPDATE DEAD MESSAGES
	$DB->Update("DELETE FROM chatroom_messages ORDER BY message_id ASC");
	//print "<p>".update_icon." Delete old message trash data</p>";
	// DELETE EMAIL TRACKING DATABASE ENTIRES
	$DB->Update("DELETE FROM email_sendtime WHERE TO_DAYS( NOW(  'y-m-d'  )  )  - TO_DAYS( send_date )  >= 30");
	//print "<p>".update_icon." Delete email data data</p>";
	// DELETE LOG FILE ENTRIES
	$DB->Update("DELETE FROM system_log WHERE TO_DAYS( NOW(  'y-m-d'  )  )  - TO_DAYS( date )  >= 30");

	// UPDATE Comments
	$DB->Update("DELETE FROM comments WHERE from_uid < 0");

	// UPDATE Messages
	$DB->Update("DELETE FROM messages WHERE uid < 0");

	// UPDATE visited
	$DB->Update("DELETE FROM visited WHERE uid < 0");

	
	// CLOSE DOWN ANY OUT OF DATE SUBSCRIBERS
	$result = $DB->Query("SELECT id, uid FROM members_billing WHERE date_expire < '".date("Y-m-d H:i:s")."'");
	while( $subs = $DB->NextRow($result) )
    {
		## CHECK TO SEE IF THIS MEMBER STILL HAS AN ACTIVE SUBSCRITION, IF NOT DOWNGRADE HIM
		$result1 = $DB->Row("SELECT count(id) as total FROM members_billing WHERE date_expire > '".date("Y-m-d H:i:s")."' AND uid=".$subs['uid']);
		if($result1['total'] > 0){
			## THIS MEMBER STILL HAS AN ACTIVE UPGRADE
		}else{
			## DOWN GRADE THE MEMBER TO THE DEFAULT PACKAGE
			$DB->Update("UPDATE members SET packageid='3' WHERE id=".$subs['uid']);
		}
		
		## NOW DELETE ALL THE OLD FIELDS
		$DB->Update("DELETE FROM members_billing WHERE date_expire < '".date("Y-m-d H:i:s")."' AND uid=".$subs['uid']);
	}
		
	// NOW OPTOMIZE THE DATABASE
	$h = DB_HOST;
	$u = DB_USER;
	$p = DB_PASS;
	$dummy_db = DB_BASE;	
	
	$db_link = mysql_connect($h,$u,$p);
	// $res = mysql_db_query($dummy_db, 'SHOW DATABASES', $db_link) or die('Could not connect: ' . mysql_error());


mysql_select_db($dummy_db,$db_link);
$res = mysql_query('SHOW DATABASES', $db_link);



	$dbs = array();
	while ( $rec = @mysql_fetch_array($res) )
	{
		$dbs [] = $rec [0];
	}
	
	foreach ( $dbs as $db_name )
	{
		//$res = mysql_db_query($dummy_db, "SHOW TABLE STATUS FROM `" . $db_name . "`", $db_link) or die('Query : ' . mysql_error());


$res = mysql_query("SHOW TABLE STATUS FROM `" . $db_name . "`", $db_link);


		$to_optimize = array();
		
			while ( $rec = mysql_fetch_array($res) )
			{
				if ( $rec['Data_free'] > 0 )
				{
				$to_optimize [] = $rec['Name'];
				}
			}
			
			if ( count ( $to_optimize ) > 0 )
			{
				foreach ( $to_optimize as $tbl )
				{
					//mysql_db_query($db_name, "OPTIMIZE TABLE `" . $tbl ."`", $db_link );


$res = mysql_query("OPTIMIZE TABLE `" . $tbl ."`", $db_link);

				}
			}
	}	
	?></font>
    </td>
  </tr>
</table>
</body>
</html>