<?
/***************************************************************************
 *
 *	 PROJECT: eMeeting Dating Software
 *	 VERSION: 8
 *	 LISENSE: OWN / LEASED (http://www.datingscripts.co.uk/license.php)
 *
 *	 This program is a commercial software and any kind of using
 *	 it must agree to eMeeting software License Agreement.
 *
 *	 This notice may not be removed from the code.   
 *
 *   Copyright 2006-2007 eMeeting Ltd.
 *   http://www.datingscripts.co.uk/
 *
 ***************************************************************************/
if(!isset($_POST)){ die(); }
$subd = "../../../";
require_once $subd . "inc/config.php";
$DB->Update("UPDATE  `members` SET video_live='yes' WHERE id='".$_SESSION['uid']."' LIMIT 1");
echo "&message=true";
exit;
?>
