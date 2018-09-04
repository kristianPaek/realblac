<?
session_start();
@session_unset();
@session_destroy();
## DIRECT USER TO THE HOME PAGE
header("location: index.php");
?>