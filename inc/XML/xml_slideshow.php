<?

if(isset($_GET['uid']) && is_numeric($_GET['uid'])){

	require_once "../config.php";

	require_once('../func/func_galllery_page.php');

	$dd = DisplayGalleryFiles($_GET['uid']);



	header("Content-type: text/xml"); 



	print '<?xml version="1.0" encoding="utf-8"?><slideshow autoplay="yes" delay="3" scaleImage="yes" centerImage="yes" useThumbnails="yes" thumbTooltips="yes" printFunction="yes" searchFunction="no" textPlacement="bottom">';

	

	foreach($dd as $value){



	print '<category title="'.htmlspecialchars($value['title']).'">';



		$albumFiles = DisplayGallery($_GET['uid'], $value['aid'], $profile=true);



		foreach($albumFiles as $value){

	
				print '<image>
		
					<thumb>'.htmlspecialchars($value['image']."&x=30&y=30").'</thumb>
		
					<tipThumb>'.htmlspecialchars($value['image']."").'</tipThumb>';



			if($_SESSION['pack_adult'] !="yes" && $value['adult_content'] =="yes" && $value['uid'] != $_SESSION['uid'] && $_SESSION['site_moderator'] =='no' && ENABLE_ADULTCONTENT =="yes")
			{
	
					print "<pic>".htmlspecialchars(DB_DOMAIN."".DEFAULT_IMAGE_ADULT."&t=f")."</pic>";

			}
			else
			{
					print "<pic>".htmlspecialchars(DB_DOMAIN."uploads/images/".$value['bigimage'])."</pic>";
			}
					
		
					print '<title>'.htmlspecialchars($value['title']).'</title>
		
					<description>'.htmlspecialchars($value['description']).'</description>
		
					<url></url>
		
					<keywords><![CDATA[]]></keywords>
		
				</image>';	
	

		}

	  

	print '</category>';





	}	



	print '</slideshow>';

}

?>











