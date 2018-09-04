<?
header('Content-Type: text/html; charset=utf-8');
$action = trim(strip_tags($HTTP_GET_VARS['action']));
############################################################
#################### OPERATIONS ############################
switch ( $action ){

				//////////////////// ADMIN AREA AJAX CALLS ///////////////////////
				case "photo": {
					
					$fid = trim(strip_tags($HTTP_GET_VARS['fid']));
					$ff = dirname(__FILE__);
					$dir = str_replace("plugins/plugins/plugin_mgal","",$ff);
					$dir = str_replace("plugins\plugins\plugin_mgal","",$dir);
					$FilS = getimagesize($dir."uploads/images/".$fid);
					$ThisImg = "inc/tb.php?src=".$fid."&t=i&x=".$FilS[0]."&y=".$FilS[1].""; 

					print "<img src='".$ThisImg."' style='border:1px solid #666;padding:8px;'>";
					
				} break;
}
?>