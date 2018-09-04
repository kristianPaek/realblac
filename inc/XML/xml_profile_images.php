<?
if(isset($_GET['uid']) && is_numeric($_GET['uid'])){
	require_once "../config.php";
	require_once "../API/api_functions.php";
	$dd = DisplayRecentPhotos($_GET['uid'],8); 
	
	header("Content-type: text/xml"); 
	print '<?xml version="1.0" encoding="utf-8"?>
	<content>';
	if(!empty($dd)){foreach($dd as $value){
 
		print '<item>
			<title>'.htmlspecialchars($value['title']."*").'</title>
			<image_path>'.DB_DOMAIN."uploads/images/".htmlspecialchars($value['bigimage']).'</image_path>
			<target_url>'.htmlspecialchars(DB_DOMAIN.'index.php?dll=profile&sub=viewfile&item_id='.$_GET['uid'].'&item2_id='.$value['aid'].'&item3_id='.$value['id']).'</target_url>
			<description>'.htmlspecialchars($value['description']."Like what you see? Message me.").'</description>
		</item>';
	} }

	## display a default image
	if(empty($dd)){
			print '<item>
				<title>- ASK ME FOR A PHOTO</title>
				<image_path>'.DB_DOMAIN."inc/tb.php?src=".DEFAULT_IMAGE.'</image_path>
				<target_url>index.php</target_url>
				<description>&nbsp;</description>
			</item>';
	}
	print '</content>';
}
?>