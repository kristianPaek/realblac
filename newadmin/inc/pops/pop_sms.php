<?
$con_dir = "../../"; 
$_REQUEST['n'] =3;
require_once "../config.php";
require_once subd . "../../inc/config.php";

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


require_once "../func/admin_globals.php";
require_once "../../layout.php";


## MAKE START AND STOP LIMITS
if(!isset($_REQUEST['sta'])){ $_REQUEST['sta'] = 1; }


if($_REQUEST['option'] ==1){
					
## send all members

$Query="SELECT members.username, members_privacy.SMS_number, members_privacy.SMS_country , members_data.country
FROM members_privacy 
INNER JOIN members_data ON ( members_data.uid = members_privacy.uid)
INNER JOIN members ON ( members.id = members_privacy.uid )
WHERE members_privacy.SMS_number !=''  
AND members_privacy.SMS_country  !=''  
LIMIT ".($_REQUEST['sta']-1).",10";


$Query1="SELECT count(members.username) AS total 
FROM  members_privacy 
INNER JOIN members_data ON ( members_data.uid = members_privacy.uid)
INNER JOIN members ON ( members.id = members_privacy.uid )
WHERE members_privacy.SMS_number !=''
AND members_privacy.SMS_country  !=''  ";
						
}elseif($_REQUEST['option'] ==2){


## package id
$Query="SELECT members.username, members_privacy.SMS_number, members_privacy.SMS_country, members_data.country
FROM  members_privacy 
INNER JOIN members_data ON ( members_data.uid = members_privacy.uid)
INNER JOIN members ON ( members.id = members_privacy.uid )
WHERE members_privacy.SMS_number !=''   AND members.packageid='".$_REQUEST['packid']."'  LIMIT ".($_REQUEST['sta']-1).",10";

$Query1="SELECT count(members.username) AS total
FROM  members_privacy 
INNER JOIN members_data ON ( members_data.uid = members_privacy.uid)
INNER JOIN members ON ( members.id = members_privacy.uid )
WHERE members_privacy.SMS_number !=''  AND members.packageid='".$_REQUEST['packid']."'";
		

}elseif($_REQUEST['option'] ==3){


## account type
$Query="SELECT members.username, members_privacy.SMS_number, members_privacy.SMS_country, members_data.country 
FROM  members_privacy 
INNER JOIN members_data ON ( members_data.uid = members_privacy.uid)
INNER JOIN members ON ( members.id = members_privacy.uid )
WHERE members_privacy.SMS_number !=''  AND members.active='".$_REQUEST['status']."'  LIMIT ".($_REQUEST['sta']-1).",10";

$Query1="SELECT count(members.username) AS total 
FROM  members_privacy 
INNER JOIN members_data ON ( members_data.uid = members_privacy.uid)
INNER JOIN members ON ( members.id = members_privacy.uid )
WHERE members_privacy.SMS_number !=''  AND members.active='".$_REQUEST['status']."'";


}
 
## INCREMTN THE START LIMIT
$NEXT50 = $_REQUEST['sta']+10;
if(!isset($Query)){ die("There was an error processing this request, please close the window and try again."); }

$total = $DB->Row($Query1);

$result = $DB->Query($Query); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=DB_DOMAIN ?>/newadmin/inc/css/content.css" type="text/css" media="screen">
<style>
body {
	margin: 0;
	padding: 0;
	font-family: sans-serif; 
	font-size: 100%;
	margin-top: 10px;
}
</style>

<?

	## stop refresh if its all sent
	if($NEXT50 < $total['total']){
?>
<meta http-equiv="refresh" content="10;url=pop_sms.php?option=<?=$_REQUEST['option'] ?>&newid=<?=$_REQUEST['newid']?>&packid=<?=$_REQUEST['packid'] ?>&status=<?=$_REQUEST['status'] ?>&sta=<?=$NEXT50 ?>" />
<?php } ?>
</head>

<body style="background-color:white; padding:5px;margin:0px;">


<table class="widefat">
     <thead>
      <tr bgcolor="#0A8BC9"> 
		 <th colspan="2">Sending <span id="CDTimer1">???</span> of <?=$total['total'] ?> SMS</th>
 		<th colspan="2">Remaining: <span id="CDTimer">???</span> SMS</th>
       </tr>
      <tr> 
		 <th style="width:20px;">Count</th>
		 <th>Username</th>
         <th>Country</th>
          <th>Status</th>
       </tr>
  </thead>
      <tbody>

</tbody>
</table>
<div style="padding:5px; height:200px; overflow:auto; background:#eeeeee; border:1px solid #999999;">

<?

$Tcount =1;
$count =1;					
if (ob_get_level() == 0) ob_start();

	while($sms = $DB->NextRow($result)) {	

if($sms['SMS_country'] ==""){ $sms['SMS_country'] = $sms['country']; }
 //
	
	print "<table class='widefat' id='emailid_".($Tcount+$_REQUEST['sta']-1)."' style='display:none;'><tr> 
		 	<td>".($Tcount+$_REQUEST['sta']-1)."</td>
			<td>".$sms['username']."</td>
         	<td>".MakeCountry($sms['SMS_country'])."</td>
          	<td>Sent</td>
        </tr></table>";					
	SendSMS($sms['username'], $sms['SMS_number'], $_REQUEST['newid'], MakeCountry($sms['SMS_country']), KEY_ID);
	$count++;
	$Tcount++;
	
	if($count ==50){
			ob_flush();
			flush();
			usleep(50000);// delay minimum of .05 seconds to allow ie to flush to screen
			sleep(2);							
			$count=1;
	}				
}			
ob_end_flush();
?>

</div>
<div id="finishedSend" style="display:none;">
<table class="widefat"><thead>
<tr>
<th colspan="4" align="center">*** Sending Completed.</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
<?php 

$UpT = ($total['total']-$_REQUEST['sta']); if($UpT <0){$UpT=0; } 
$UpS = ($_REQUEST['sta']-1); if($UpS <0){ $UpS=0; } 
 ?>
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/

	var TimerVal = <?=$UpT ?>;
	var TimerUp = <?=$UpS ?>;
	var TimerSPan = document.getElementById("CDTimer");
	var TimerSPan1 = document.getElementById("CDTimer1");

	function CountDown(){
	   setTimeout( "CountDown()", 1000 );
	   TimerSPan.innerHTML=TimerVal;
	   TimerVal=TimerVal-1;
	   if (TimerVal<0) { TimerVal=0 } 

	}
	function CountUp(){

		setTimeout( "CountUp()", 1000 );
		TimerSPan1.innerHTML=TimerUp;
		if (TimerUp < <?=$total['total'] ?>) {	  
			   TimerUp=TimerUp+1;		
				idShowHide('emailid_'+TimerUp);
		} else {
		idShowHide('finishedSend');
		}

	}

	function idShowHide(obj) {
		 var el = document.getElementById(obj);
		 if ( el.style.display != "none" ) {
		 el.style.display = 'none';
		 } else {
		 el.style.display = 'block';
		 }
	}
	CountDown()
	CountUp()
/*]]>*/
</script>
</body>
</html>