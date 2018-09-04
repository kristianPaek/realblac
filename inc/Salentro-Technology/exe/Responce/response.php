<?
if(isset($_POST)){

if(isset($_POST['uname'])){
$String=$_POST['uname'];
}else{
$String=$_POST['to'];
}
if($String !=""){

	include_once("../../../inc/config.php");
	$queryThis = "SELECT username FROM members WHERE ( username LIKE ('%".mysql_real_escape_string(trim($String))."%') OR email LIKE ('%".mysql_real_escape_string(trim($String))."%') ) LIMIT 10";
		
		print "<ul>";	
			$result2 = $DB->Query($queryThis);
			while( $member = $DB->NextRow($result2) )  
			{ 
				print "<li>".eMeetingOutput(substr($member['username'],0,15))."</li>";
			}
		print "</ul>";
	}
}
?>