<html>
<head>
    <title>RealBlackLove</title>
</head>
<body onLoad="document.PAY.submit()">

<?php
$amount = $_GET['price'];
$description = $_GET['package'];
$user_id = $_GET['user_id'];
$packageID = $_GET['packageID'];

//-- Live
$loginID	= "62Czy4yyVR";
//$transactionKey = "2N37LY52duh7u2sYd";
$transactionKey = "9Nr52gJx8AZ28Q4Q" ; 

//-- Sandbox
//$loginID		= "5uC53FW47z9";
//$transactionKey = "3589cAgBTj2BBt2L";


$sequence	= rand(1, 1000);
$timeStamp	= time ();

if( phpversion() >= '5.1.2' )
{
    $fingerprint = hash_hmac("md5", $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey);
    
}
else
{
    $fingerprint = bin2hex(mhash(MHASH_MD5, $loginID . "^" . $sequence . "^" . $timeStamp . "^" . $amount . "^", $transactionKey));

}


?>
<form method="post" action="https://secure.authorize.net/gateway/transact.dll" name="PAY">
<!--<form method="post" action="https://test.authorize.net/gateway/transact.dll" name="PAY">-->
    <input type="hidden" name="x_amount" value="<?=$amount ?>">
    <input type="hidden" name="x_description" value="<?=$description ?>">
    <input type="hidden" name="x_cust_ID" value="<?php echo $user_id.'**'.$packageID; ?>">
    <input type="hidden" name="x_show_form" value="PAYMENT_FORM">
    <input type="hidden" name="x_fp_sequence" value="<?=$sequence ?>">
    <input type="hidden" name="x_fp_timestamp" value="<?=$timeStamp ?>">
    <input type="hidden" name="x_fp_hash" value="<?=$fingerprint ?>">
    <input type="hidden" name="x_login" value="<?=$loginID ?>">
</form>
</body>
</html>
