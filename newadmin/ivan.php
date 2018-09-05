<?php
require_once "inc/config.php";
require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );
require_once("../inc/func/func_settings_page.php");

$uid = $_GET['id'];

$DB->Update("UPDATE members SET active='active'
,packageid = 3
WHERE id =$uid
limit 1");

$Data['email'] =  GetEmail($uid);
$Data['username'] =  GetUsername($uid);
$Data['custom'] =  GetPackageName(3);
SendTemplateMail($Data, 2);
