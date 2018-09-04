<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

$cookieexptime=time()+$cookie_expires;

function user_logged_in($userid, $memname, $lang) {
	$GLOBALS['user_sort']=1;
	$GLOBALS['logged_user']=1;  // make 0 for admin
	if(ISSET($_SESSION['site_moderator']) && $_SESSION['site_moderator'] =="yes"){
		$GLOBALS['logged_admin']=1; 
	}else{
		$GLOBALS['logged_user']=0;
	}
	$GLOBALS['user_usr'] = $memname;
	if($lang == ""){$GLOBALS['langu'] = "english";}else{$GLOBALS['langu'] = $lang;}
	$GLOBALS['user_id'] = $userid; 
	$returned=TRUE;
	return $returned;
}

function setMyCookie($userName,$userPass,$userExpTime){
if($userPass!='') $userPass=writeUserPwd($userPass);
setcookie($GLOBALS['cookiename'], $userName.'|'.$userPass.'|'.$userExpTime, $GLOBALS['cookieexptime'], $GLOBALS['cookiepath'], $GLOBALS['cookiedomain'], $GLOBALS['cookiesecure']);
}

function getMyCookie(){
if(isset($_COOKIE[$GLOBALS['cookiename']])) {
$cookievalue=explode ('|', $_COOKIE[$GLOBALS['cookiename']]);
if(!ini_get('magic_quotes_gpc')) $cookievalue[0]=addslashes($cookievalue[0]);
$cookievalue[1]=str_replace("'",'',$cookievalue[1]);
}
else $cookievalue=array('','','');
return $cookievalue;
}

function deleteMyCookie(){
setcookie($GLOBALS['cookiename'], '', (time()-2592000), $GLOBALS['cookiepath'], $GLOBALS['cookiedomain'], $GLOBALS['cookiesecure']);
}

function writeUserPwd($pwd){
return md5($pwd);
}

?>