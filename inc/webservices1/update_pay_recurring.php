<?php
include '../config.php';
include '../config_db.php';
$billing_id = $_POST['x_subscription_id'];
$transaction_id = $_POST['x_trans_id'];
$amount =  $_POST['x_amount'];
$payment_date = $_POST['x_date']; 

$CheckUser = "SELECT * FROM `members` WHERE subscription_id = '".$billing_id."' LIMIT 1";
$CheckUserId = mysql_fetch_assoc( mysql_query($CheckUser) );
$UserID = $CheckUserId['id'];
$PackageID = $CheckUserId['packageid'];
$email = $CheckUserId['email'];
$method = "AuthorizeNet";

$CheckDay = "SELECT subscription, price, numdays_new FROM package WHERE pid= '".$PackageID."' LIMIT 1";
$CheckUserDay = mysql_fetch_assoc( mysql_query($CheckDay) );
$Price = $CheckUserDay['price'];

$to = "iqbal.salentro@gmail.com";
$subject = "Test Recurring Payment";
$txt = json_encode($_POST);
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: php.manishsalentro@gmail.com";
mail($to,$subject,$txt,$headers); 

	if(!empty($CheckUserId['subscription_id']))
	{	
		
		
// ADD ENTRY TO DATABASE
				$DB->Insert("INSERT INTO `members_billing` (`id` ,`uid` ,`packageid` ,`date_upgrade` ,`date_expire` ,`pay_method` ,`running` ,`subscription` ,`bill_email` ,`transaction_id`) 
				VALUES (NULL , '".$UserID."', '".$PackageID."', '".$payment_date."', '".date('Y-m-d H:i:s', strtotime($payment_date.' +'.$CheckUserDay['numdays_new'].' days'))."', '".$method."', 'yes', '".$CheckUserDay['subscription']."', '".$email."', '".$transaction_id."')");


 }
else
{
    echo "nooooo";
}




