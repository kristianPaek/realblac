<?php
include 'library.php'; // include the library file
include "classes/class.phpmailer.php"; // include the class name

	$email = 'php.manishsalentro@gmail.com';
	$email = 'iqbal.salentro@gmail.com';
	$mail	= new PHPMailer; 
	$mail->IsSMTP(); 
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "s5.fcomet.com"; 
	$mail->Port = 465; 
	$mail->SMTPAuth = true; 
	$mail->Username = "fctest@salentroblogs.com"; 
	$mail->Password = "pass123hygfty"; 
	$mail->AddReplyTo("no-reply@workrockers.com", "Workrockers Team"); //reply-to address
	$mail->SetFrom("no-reply@workrockers.com", "WorkRockers Team"); 
	$mail->Subject = "Salentro SMTP Mail"; 
	//$mail->AddAttachment("images/asif18-logo.png"); //Attach a file here if any or comment this line, 
	$mail->AddAddress($email, "WorkRockers"); //To address who will receive this email
	$mail->MsgHTML('<!DOCTYPE html>
					 <html xmlns="http://www.w3.org/1999/xhtml">
					 <head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
					 <title>conformation mail</title>
					 </head>
					 <body><table border="0" cellpadding="0" cellspacing="0" width="590" class="m_-171776263396577492templateContainer" style="border-spacing:0px;max-width:590px!important;width:590px!important">
<tbody>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width m_-171776263396577492rnb-tmpl-width" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_0" id="m_-171776263396577492Layout_0" style="border-spacing:0px;min-width:0px!important;width:100%!important">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-del-min-width" valign="top" align="center" style="background-color:#f5f3ee;min-width:0px!important"><br>
</td></tr></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_1" id="m_-171776263396577492Layout_1" style="border-spacing:0px;min-width:0px!important">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-del-min-width" align="center" valign="top" bgcolor="#ffffff" style="min-width:0px!important">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-171776263396577492rnb-container" bgcolor="#ffffff" style="border-spacing:0px;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;border-bottom-left-radius:0px;padding-left:20px;padding-right:20px">
<tbody>
<tr>
<td height="50" style="font-size:1px;line-height:1px">&nbsp;</td></tr>
<tr>
<td valign="top" class="m_-171776263396577492rnb-container-padding" bgcolor="#ffffff" align="left">
<table width="100%" cellpadding="0" border="0" align="center" cellspacing="0" style="border-spacing:0px">
<tbody>
<tr>
<td valign="top" align="center">
<table cellpadding="0" border="0" align="center" cellspacing="0" class="m_-171776263396577492logo-img-center" style="border-spacing:0px">
<tbody>
<tr>
<td valign="middle" align="center">
<div style="border:0px none #000000;display:inline-block"><img width="500" vspace="0" hspace="0" border="0" alt="[" class="m_-171776263396577492rnb-logo-img CToWUd" src="https://ci3.googleusercontent.com/proxy/N6O4NI05j57QatdHc4Tz8FOpmeEmCIFXFlG6Holkb9tCf8sEBVrgG_WdrlbXGIfO8e5Pl-27B1VOjT3q88woAQI=s0-d-e1-ft#http://www.realblacklove.com/Logoblack2.png" style="max-width:500px;display:block"></div></td></tr></tbody></table></td></tr></tbody></table></td></tr>
<tr>
<td height="50" style="font-size:1px;line-height:1px"></td></tr></tbody></table></td></tr></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_7" style="border-spacing:0px;min-width:0px!important">
<tbody></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_8" id="m_-171776263396577492Layout_8" style="border-spacing:0px;min-width:0px!important">
<tbody></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_9" style="border-spacing:0px;min-width:0px!important">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-del-min-width" align="center" valign="top" bgcolor="#ffffff" style="min-width:0px!important">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-171776263396577492rnb-container" bgcolor="#000000" style="border-spacing:0px;border-bottom-width:0px;border-bottom-style:none;border-bottom-color:#c8c8c8;background-color:#000000;padding-left:20px;padding-right:20px;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;border-bottom-left-radius:0px">
<tbody>
<tr>
<td height="20" style="font-size:1px;line-height:1px">&nbsp;</td></tr>
<tr>
<td valign="top" class="m_-171776263396577492rnb-container-padding" bgcolor="#000000" align="left">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-171776263396577492rnb-columns-container" style="border-spacing:0px">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-force-col" valign="top" style="padding-right:0px">
<table border="0" valign="top" cellspacing="0" cellpadding="0" width="100%" align="left" class="m_-171776263396577492rnb-col-1" style="border-spacing:0px">
<tbody>
<tr>
<td style="font-size:29px;font-family:Arial,Helvetica,sans-serif,sans-serif;color:#ffffff">
<div style="line-height:29px;text-align:center"><span style="font-size:22px">Real Singles. Real Connections.</span></div></td></tr></tbody></table></td></tr></tbody></table></td></tr>
<tr>
<td height="20" style="border-bottom-width:0px;font-size:1px;line-height:1px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_10" style="border-spacing:0px;min-width:0px!important">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-del-min-width" align="center" valign="top" bgcolor="#ffffff" style="min-width:0px!important">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-171776263396577492rnb-container" bgcolor="#ffffff" style="border-spacing:0px;border-bottom-width:0px;border-bottom-style:none;border-bottom-color:#c8c8c8;padding-left:20px;padding-right:20px;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;border-bottom-left-radius:0px">
<tbody>
<tr>
<td height="0" style="border-bottom-width:0px;font-size:1px;line-height:1px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_11" id="m_-171776263396577492Layout_11" style="border-spacing:0px;min-width:0px!important">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-del-min-width" align="center" valign="top" bgcolor="#ffffff" style="min-width:0px!important">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-171776263396577492rnb-container" bgcolor="#ffffff" style="border-spacing:0px;border-bottom-style:solid;border-bottom-color:#efefef;border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-right-radius:0px;border-bottom-left-radius:0px;padding-left:20px;padding-right:20px">
<tbody>
<tr>
<td height="30" style="font-size:1px;line-height:1px"><br>
</td></tr>
<tr>
<td valign="top" class="m_-171776263396577492rnb-container-padding" bgcolor="#ffffff" align="left">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="m_-171776263396577492rnb-columns-container" style="border-spacing:0px">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-force-col" valign="top">
<table border="0" valign="top" cellspacing="0" cellpadding="0" width="350" align="left" class="m_-171776263396577492rnb-last-col-2" style="border-spacing:0px">
<tbody>
<tr>
<td style="color:#666666;font-weight:bold">START CONNECTING TODAY<br>
<br></td></tr>
<tr>
<td height="10" style="font-size:1px;line-height:1px"><font size="3">&nbsp;</font></td></tr>
<tr>
<td class="m_-171776263396577492rnb-mbl-float-none" style="float:left;width:350px">
<div style="line-height:24px">
<p>Hello '.$username.',</p>
<p>YOUR PROFILE IS PENDING APPROVAL!<br />
To ensure the best online dating experience, all new accounts are subject to our verification process and are given within 24 hours. We will send you an email once your profile has been approved. If you do not see the email in your inbox, please check your junk/spam folders.<br /><br />

Every member goes through our verification process to ensure that our community is only comprised of authentic users. This is just another reason why RBL is the best dating app for black singles.<br /><br />
Check out some of our success stories from RealBlackLove App while you wait for approval.&nbsp;</p>
&nbsp;
<a class="button" href="https://www.realblacklove.com/testimonials" style="color: #ffffff !important;display: inline-block;font-weight: 500;font-size: 16px;line-height: 42px;font-family: Helvetica, Arial, sans-serif;width: auto;white-space: nowrap;height: 42px;margin: 12px 5px 12px 0;padding: 0 22px;text-decoration: none;text-align: center;cursor: pointer;border: 0;border-radius: 3px;vertical-align: top;background-color: #5d5d5d !important;"><span style="display: inline;font-family: Helvetica, Arial, sans-serif;text-decoration: none;font-weight: 500;font-style: normal;font-size: 16px;line-height: 42px;cursor: pointer;border: none;background-color: #5d5d5d !important;color: #ffffff !important;">RBL Testimonials</span></a>
&nbsp;
<p>Happy dating!</p>
<p>RBL Team&nbsp;</p>
<div align="left">
<p style="margin:0px!important;color:#999999;font-size:13px"><font size="3">&nbsp;</font></p></div></div></td></tr></tbody></table></td>
<td class="m_-171776263396577492msib-right-img m_-171776263396577492rnb-force-col" width="178" valign="top" style="padding-left:20px"><br>
</td></tr></tbody></table></td></tr>
<tr>
<td height="30" style="font-size:1px;line-height:1px">&nbsp;</td></tr></tbody></table></td></tr></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff">
<table class="m_-171776263396577492rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#ffffff" name="Layout_12" id="m_-171776263396577492Layout_12" style="border-spacing:0px;min-width:0px!important">
<tbody>
<tr>
<td class="m_-171776263396577492rnb-del-min-width" align="center" valign="top" bgcolor="#ffffff" style="min-width:0px!important"></td></tr></tbody></table></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff"></td></tr>
<tr>
<td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff"><br>
</td></tr></tbody></table></body>
						</html>
						'); 

	$send = $mail->Send(); //Send the mails
var_dump($send);
?>
 
