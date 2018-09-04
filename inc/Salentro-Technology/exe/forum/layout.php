<?php 
$layout 				= array(); ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Website Forum</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$_SESSION['lang_charset'] ?>">
<link rel="stylesheet" href="<?=$_SESSION['Css_File'] ?>" type="text/css">
</head>

<body>

<?
$contents = ob_get_contents();
ob_end_clean();
$layout[1]["contents"] = $contents;
$layout[1]["name"] = "Page Header";
ob_start();
?>


</body>
</html>
<?
$contents = ob_get_contents();
ob_end_clean();
$layout[2]["contents"] = $contents;
$layout[2]["name"] = "Page Footer";
ob_start();
?>