<?
if(isset($_POST)){
require_once "../../config.php";

//_root.item_id+"**"+_root.item2_id+"**"+n_right+"**"+Math.round((n_right/n_questions)*100)

$scoreData = explode("**",$_POST['Score']);
$ThisUID = $scoreData[0];
$ThisQID = $scoreData[1];
$ThisScore = $scoreData[2];
$ThisPerc = $scoreData[3];

// insert into datat
$DB->Insert("INSERT INTO `quiz_results` (`uid` ,`percentage` ,`quiz_id` ,`comments` ,`date`)VALUES ('".$_SESSION['uid']."', '".$ThisPerc."', '".$ThisQID."', '".$ThisScore."', '".DATE_TIME."');");			
$DB->Update("UPDATE `quiz` SET hits=hits+1 WHERE id= ('".$ThisQID."') LIMIT 1");


sleep(20);

// REDIRECT BACK
header('location: start.php?item_id='.$ThisUID.'&item2_id='.$ThisQID);
exit();

}
?>