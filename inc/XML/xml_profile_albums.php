<?
if(isset($_GET['uid']) && is_numeric($_GET['uid'])){
	require_once "../config.php";
	require_once('../func/func_galllery_page.php');
	$dd = DisplayGalleryFiles($_GET['uid']);

	header("Content-type: text/xml"); 

	print '<menu ProfileUID="2" menuTitle="Recent Albums" headingColor="00CCFF" linkColor="00CCFF" width="250" height="380" thumbWidth="50" thumbHeight="50" imageWidth="200" imageHeight="200">';
	
	foreach($dd as $value){
	
		print '<item thumb="'.DB_DOMAIN."".$value['image']."".'" image="2"> 
		<title>'.htmlspecialchars($value['title']).'</title>
		<introCaption>'.htmlspecialchars($value['comment']).'</introCaption>
		<fullCaption>'.htmlspecialchars($value['comment']).'</fullCaption>
		</item>';
	}	

	print '</menu>';
}
?>