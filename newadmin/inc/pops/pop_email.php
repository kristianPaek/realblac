<?
$con_dir = "../../"; 
$_GET['n'] =3;


if(isset($_POST) && !isset($_GET['sta']) ){ $_GET = $_POST; } // 

require_once "../config.php";
require_once subd . "../../inc/config.php";
require_once "../func/admin_globals.php";
require_once subd . "../../inc/API/api_functions.php";
require_once "../../layout.php";

if(ADMIN_DEMO == "yes"){ die("Disabled in demo mode"); }
if(!isset($_GET['sta'])){ $_GET['sta']=1; }

// print_r($_GET);
switch($_GET['do']){


	case "sendnew":{
	
	
		if($_GET['option'] ==1){

			$Query1="SELECT count(members.username) AS total FROM members, members_privacy WHERE members.id = members_privacy.uid AND members_privacy.Newsletters ='yes' AND members.email !=''";
							
			$Query="SELECT members.id, members.username, members.email, members.password, members.profile_complete, members.hits, members.updated, members.active, members_data.location, members_data.headline, members_data.age, members_data.gender, members_data.country FROM members, members_privacy, members_data WHERE members.id = members_data.uid AND members.id = members_privacy.uid AND members_privacy.Newsletters ='yes' AND members.email !='' LIMIT ".($_GET['sta']-1).",10";
								
		}elseif($_GET['option'] ==2){
		
			$Query1="SELECT count(members.username) AS total  FROM members, package, members_privacy WHERE members.id = members_privacy.uid AND members_privacy.Newsletters ='yes' AND members.packageid = package.pid AND package.pid = ".$_GET['packid']." AND email !=''";
						
			$Query="SELECT members.id, members.username, members.email, members.password, members.profile_complete, members.hits, members.updated, members.active, members_data.location, members_data.headline, members_data.age, members_data.gender, members_data.country FROM members, package, members_privacy, members_data WHERE members.id = members_data.uid AND members.id = members_privacy.uid AND members_privacy.Newsletters ='yes' AND members.packageid = package.pid AND package.pid = ".$_GET['packid']." AND email !='' LIMIT ".($_GET['sta']-1).",10";
							
		}elseif($_GET['option'] ==3){
		
			
			$Query1 ="SELECT count(members.username) AS total FROM members, members_privacy WHERE members.email !='' AND members.active='".$_GET['status']."' AND members.id = members_privacy.uid AND members_privacy.Newsletters ='yes'";
							
			$Query = "SELECT members.id, members.username, members.email, members.password, members.profile_complete, members.hits, members.updated, members.active, members_data.location, members_data.headline, members_data.age, members_data.gender, members_data.country FROM members, members_privacy, members_data WHERE members.id = members_data.uid AND members.email !='' AND members.active='".$_GET['status']."' AND members.id = members_privacy.uid AND members_privacy.Newsletters ='yes'  LIMIT ".($_GET['sta']-1).",10";
							
		}
	
	} break;


	case"subs":{
	
					$Count=0;
					$aTime = " AND TO_DAYS( NOW( 'y-m-d h:i:s' ) ) - TO_DAYS( members.created ) >= 0 AND TO_DAYS( NOW( 'y-m-d h:i:s' ) ) - TO_DAYS( members.created ) < ".($_GET['s1']+1)."";
	
					$qqe = "SELECT %s FROM members";
					//members.email, members.username, members_billing.date_expire AS custom
					$noWhere=0;
					$noAnd=0;
					// WHICH TYPE
					switch($_GET['tid']){
						
						case "1": {
								// HAVE PHOTO
								$qqe .=" LEFT JOIN members_billing ON ( members.id = members_billing.uid ) INNER JOIN files ON ( files.uid = members.id ) ";							
								$qqe .= " WHERE members.id !=0 ";
								$qqe .= $aTime;
						} break;
	
						case "2": {
								// VALIDATE THEIR ACCOUNT
								$qqe .="  LEFT JOIN members_billing ON ( members.id = members_billing.uid ) ";							
								$qqe .= "WHERE members.activate_code ='OK'";
								$qqe .= $aTime;
								$qqe .= " AND members.id !=0 ";
						} break;	
	
						case "3": {
								//  UPGRADED THEIR ACCOUNT
								$qqe .=" INNER JOIN members_billing ON ( members.id = members_billing.uid )";
								$qqe .= " WHERE members.id !=0 ";		
								$qqe .= $aTime;				
						} break;
	
						case "4": {
								//  UPGRADED THEIR ACCOUNT
								$qqe .=" LEFT JOIN members_billing ON ( members.id = members_billing.uid ) ";							
								$qqe .= "WHERE members.hits > 0";
								$qqe .= $aTime;
								$qqe .= " AND members.id !=0 ";
						} break;
	
				///////////////////
	
						case "5": {
								// HAVE NO PHOTO
								$qqe .=" LEFT JOIN members_billing ON ( members.id = members_billing.uid ) LEFT JOIN files ON ( files.uid = members.id ) ";							
								$qqe .= " WHERE members.id !=0 and files.bigimage IS NULL";
								$qqe .= $aTime;
						} break;
	
						case "6": {
								// VALIDATE THEIR ACCOUNT
								$qqe .="  LEFT JOIN members_billing ON ( members.id = members_billing.uid ) ";							
								$qqe .= "WHERE members.activate_code !='OK'";
								$qqe .= $aTime;
								$qqe .= " AND members.id !=0 ";
						} break;	
	
						case "7": {
								//  UPGRADED THEIR ACCOUNT
								$qqe .=" LEFT JOIN members_billing ON ( members.id = members_billing.uid )";
								$qqe .= " WHERE members.id !=0 ";		
								$qqe .= $aTime;				
						} break;
	
						case "8": {
								//  UPGRADED THEIR ACCOUNT
								$qqe .=" LEFT JOIN members_billing ON ( members.id = members_billing.uid ) ";							
								$qqe .= "WHERE members.hits = 0";
								$qqe .= $aTime;
								$qqe .= " AND members.id !=0 ";
						} break;
					}
 
					 $Query1 = str_replace("%s"," count(members.id) AS total ",$qqe);
					 $Query = str_replace("%s"," members.email, members.username, members_billing.date_expire AS custom ",$qqe)." LIMIT ".($_GET['sta']-1).",10";
						
					$ErrorSend=1;
	}

}






## MAKE START AND STOP LIMITS
if(!isset($_GET['sta'])){ $_GET['sta'] = 1; }

//print $Query."<br><br>".$Query1;

## INCREMTN THE START LIMIT
$NEXT50 = $_GET['sta']+10;
if(!isset($Query)){ die("There was an error processing this GET, please close the window and try again."); }

$total = $DB->Row($Query1);
$result = $DB->Query($Query);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=DB_DOMAIN ?>/newadmin/inc/css/content.css" type="text/css" media="screen">
<script type="text/javascript">function handleError() {return true;}window.onerror = handleError;</script>
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
<meta http-equiv="refresh" content="10;url=<?=DB_DOMAIN ?>newadmin/inc/pops/pop_email.php?option=<?=$_GET['option'] ?>&newid=<?=$_GET['newid']?>&packid=<?=$_GET['packid'] ?>&status=<?=$_GET['status'] ?>&sta=<?=$NEXT50 ?>&do=<?=$_GET['do'] ?>&tid=<?=$_GET['tid'] ?>&s1=<?=$_GET['s1'] ?>" />
<?php } ?>
</head>

<body style="background-color:white; padding:5px;margin:0px;">


<table class="widefat">
     <thead>
      <tr bgcolor="#666666" style="color:white;"> 
		 <th colspan="2">Sending <span id="CDTimer1">???</span> of <?=$total['total'] ?> emails</th>
 		<th colspan="2">Remaining: <span id="CDTimer">???</span> emails</th>
       </tr>
      <tr> 
		 <th style="width:20px;">Count</th>
		 <th>Username</th>
         <th>Email</th>
          <th>Status</th>
       </tr>
  </thead>
      <tbody>

</tbody>
</table>
<div style="padding:5px; height:300px; overflow:auto; background:#eeeeee; border:1px solid #999999;">

<?

$Tcount =1;
$count =1;					
if (ob_get_level() == 0) ob_start();

	while($news = $DB->NextRow($result)) {	 //
	
	print "<table class='widefat' id='emailid_".($Tcount+$_GET['sta']-1)."' style='display:none;'><tr> 
		 	<td>".($Tcount+$_GET['sta']-1)."</td>
			<td>".$news['username']."</td>
         	<td>".$news['email']."</td>
          	<td>Sent</td>
        </tr></table>";					
	SendTemplateMail($news,$_GET['newid']); 
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

$UpT = ($total['total']-$_GET['sta']); if($UpT <0){$UpT=0; } 
$UpS = ($_GET['sta']-1); if($UpS <0){ $UpS=1; } 
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