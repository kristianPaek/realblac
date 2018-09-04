<?
$con_dir = "../../"; 
$_REQUEST['n'] =2;
require_once "../config.php";
require_once subd . "../../inc/config.php";
require_once "../func/admin_globals.php";
require_once "../../layout.php";

if($_REQUEST['t'] ==1 && is_numeric($_REQUEST['id']) ){
					
			$Query="SELECT mail_message, mail_subject FROM messages WHERE mailnum= ('".strip_tags($_REQUEST['id'])."') LIMIT 1";
			
}elseif($_REQUEST['t'] ==2 && is_numeric($_REQUEST['id'])){
									
}
if(!isset($Query)){ die("There was an error processing this request, please close the window and try again."); }
$result = $DB->Row($Query); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?=DB_DOMAIN ?>/newadmin/NEW/inc/css/content.css" type="text/css" media="screen">
<style>
body {
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	font-size: 100%;
	margin-top: 10px;
	background-color: #CCCCCC;
}
.style1 {color: #FFFFFF}
</style>
</head>

<body>

<div style="padding:15px;">
<table width="378" height="391" border="0" cellpadding="0" cellspacing="0" class="widefat">
     <thead>
      <tr> 
		 <th height="9" bgcolor="#666666"><span class="style1">Message</span></th>
       </tr>
      <tr>
        <th height="35" bgcolor="#FFFFFF"><?=$result['mail_subject'] ?></th>
      </tr>
      <tr>
        <th height="4" bgcolor="#666666">&nbsp;</th>
      </tr>
    </thead>
      <tbody>
<tr> 
		 	<td>
		 	 <?
			 $message = str_replace("<p>","\n\n",$result['mail_message']);
			 $message = str_replace("</p>","\n",$message);
			 ?>
		 	    <textarea name="textarea" style="width:450px; height:300px;"><?=$message ?></textarea> 	        </td>
			
        </tr>
</tbody>
</table>
	
</div>

</body>
</html>
