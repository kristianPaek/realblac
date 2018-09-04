<?php

include '../config.php';
include '../config_db.php';
?>


<!--<div style="background-image:url(../../uploads/images/thanks-bg.png); height:100vh;width:100%;float:left;">

<div style="background:rgba(0,0,0,0.5); height:100%;width:100%;position:relative;">-->
	
<?php

// Decode the string
$type=$_REQUEST['type'];
$data1=$_REQUEST['data'];
$update=$_REQUEST['update'];
$decodeString = base64_decode($type);
$data = base64_decode($data1);
//echo $type;
//echo $decodeString;

$result = $DB->Query("SELECT * FROM members WHERE id ='".$decodeString."' and username ='".$data."'");
$result1 = mysql_fetch_assoc($result);

if(($result1['verify_status']=="0") && ($update !="update"))
{?>
	<div style="position:absolute;width:50%;margin:0 auto;font-size:24px;top:100px;left:0; color:#000;font-weight:700px;z-index:999;display:inline-block;right:0;padding:60px 10px;text-align:left;">
		<img src = "http://salentroblogs.com/core/joseph/meet/uploads/images/logo.png">
		
		<h3>YOUR PROFILE IS PENDING APPROVAL!</h3>
		 <h4 style="font-weight: normal;">Thank you for validating your email address. RBL is an invite-only community making it the most reputable dating app for black singles. All new users are subject to our verification process to ensure the best dating experience for our members. No other app cares about their community like we do. Our level of security and monitoring is what sets RBL apart from the rest. <br /><br />
		 
		 Your chances of being accepted on RBL greatly decreases if you failed to upload an authentication selfie during registration. If you failed to submit an authentication selfie photo, we may give you a phone call to verify your identity. If you are not approved for an account on RBL, you can resubit another profile at anytime. We highly suggest to submit an authentication photo when you register.  <br /><br />
		 
We approve all new member accounts within 24 hours. There is a chance that your account will be approved sooner than you think. Be on the look-out for an email we will send once your profile has been approved. If you do not see an approval email in your inbox, please check your junk/spam folders as well for our email.<BR /><BR />

RBL is only comprised of real singles ready to make real connections. We thank you for your patience.<br /><br />

</h4>
<i>Check out some of our success stories from RealBlackLove App while you wait for approval. </i>
		<div style="text-align:center; margin:15px 0;"><a href="http://realblacklove.com/testimonials/" target="_blank"><button style="background: #000;border: 0; color: #fff; padding: 12px 30px;font-size: 16;text-transform: uppercase;cursor: pointer;">View Testimonials</button></a></div>
</div>
	<?php
	$DB->Update("UPDATE members SET verify_status='1' WHERE id='".$decodeString."'");

}
elseif(($result1['verify_status']=="0") && ($update=="update"))
{?>
	<div style="position:absolute;width:50%;margin:0 auto;font-size:24px;top:100px;left:0; color:#000;font-weight:700px;z-index:999;display:inline-block;right:0;padding:60px 10px;text-align:center;">
		<img src = "http://salentroblogs.com/core/joseph/meet/uploads/images/logo.png">
		<h1 style="font-size: 31px;">Thank you for validating your information. By doing so you help RBL become an even safer community.</h1>
<div style="text-align:center; margin:15px 0;"><a href="https://realblacklove.com/" target="_blank"><button style="background: #000;border: 0; color: #fff; padding: 12px 30px;font-size: 16;text-transform: uppercase;cursor: pointer;">Got it</button></a></div>
</div>
	<?php
	$DB->Update("UPDATE members SET verify_status='1' WHERE id='".$decodeString."'");

} 
else
{?>
	<div style="position:absolute;width:50%;margin:0 auto;font-size:24px;top:5px;left:0; color:#000;font-weight:700px;z-index:999;display:inline-block;right:0;padding:60px 10px;text-align:LEFT;">
		<img src = "http://salentroblogs.com/core/joseph/meet/uploads/images/logo.png">
			<h3>YOUR PROFILE IS PENDING APPROVAL!</h3>
		 <h4 style="font-weight: normal;">Thank you for validating your email address. All new users are subject to our verification process to ensure the best dating experience for our members. No other app cares about their community like we do. Our level of security and monitoring is what sets RBL apart from the rest. <br /><br />
		 
		 Your chances of being accepted on RBL greatly decreases if you failed to upload an authentication selfie during registration. If you failed to submit an authentication selfie photo, we may give you a phone call to verify your identity. If you are not approved for an account on RBL, you can resubit another profile at anytime. We highly suggest to submit an authentication photo when you register.  <br /><br />

We approve all new member accounts within 24 hours. There is a chance that your account will be approved sooner than you think. Be on the look-out for an email we will send once your profile has been approved. If you do not see an approval email in your inbox, please check your junk/spam folders as well for our email.<BR /><BR />

RBL is only comprised of real singles ready to make real connections. We thank you for your patience.
 <br /><br />

</h4>
<i>Check out some of our success stories from RealBlackLove App while you wait for approval. </i>
		<div style="text-align:center; margin:15px 0;"><a href="http://realblacklove.com/testimonials/" target="_blank"><button style="background: #000;border: 0; color: #fff; padding: 12px 30px;font-size: 16;text-transform: uppercase;cursor: pointer;">View Testimonials</button></a></div>
</div>
	<?php
} 
?>
</div>
</div>

<?php
//print_r($result1['verify_status']);






//$DB->Update("UPDATE members SET verify_status='1' WHERE id='".$decodeString."'");


 ?>