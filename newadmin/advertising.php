<?
$_REQUEST['n'] =8;
$_POST["do_page"] ="browse"; // stops config from using thepost function.
require_once "inc/config.php";

require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

## page access check
if(!in_array("6",$_SESSION['admin_access_level']) ) { header("location:overview.php");}

$PageLink = "advertising.php";
$PageLang = $admin_layout_page6;

require_once "layout.php";
############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){

if(isset($_POST['do'])){ 

		switch ($_POST['do']) {

 
		
		/*
			DELETE FORUM POSTS
		*/	
		case "bannerdisable": {
				
				for($i = 1; $i < $_POST['totalrows']; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
					
						$DB->Update("UPDATE banners SET active='disabled' WHERE bid=".$_POST['id'.$i]);
						
					}
				}
			
				$ErrorSend=1;
		}break;
		
		/*
			DELETE FORUM POSTS
		*/	
		case "banneractive": {
				
				for($i = 1; $i < $_POST['totalrows']; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
					
						$DB->Update("UPDATE banners SET active='active' WHERE bid=".$_POST['id'.$i]);
						
					}
				}
			
				$ErrorSend=1;
		}break;
		/*
			DELETE FORUM POSTS
		*/	
		case "deletebanner": {
				
				for($i = 1; $i < $_POST['totalrows']; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on" && isset($_POST['id'.$i]) ){
					
						$DB->Update("DELETE FROM banners WHERE bid=".$_POST['id'.$i]);
						
					}
				}
			
				$ErrorSend=1;
		}break;
				
		case "addbanner": {

				  ## TRY TO GET BANNER SIZE
				  $image_stats = @GetImageSize($_POST['image']);
                  $imagewidth = $image_stats[0];
                  $imageheight = $image_stats[1];
				  
				  if($_POST['active'] ==1){
						$newstatus = "yes";
					}else{
						$newstatus = "no";
					}

					if(!empty($_FILES['uploadFile']) && strlen($_FILES['uploadFile']['tmp_name']) > 5){
						if(copy($_FILES['uploadFile']['tmp_name'], PATH_IMAGE.$_FILES['uploadFile']['name'])){
						
							// MALE HTML FOR THIS BANNER
							$_POST['code'] = '<img src="'.WEB_PATH_IMAGE.$_FILES['uploadFile']['name'].'">';
						}
					}

					// STRIP COMMENT TAGS FROM THE CODE
					//$CODEBITS = explode("/*",$_POST['code']);
					//$CODEBITS1 = explode("*/",$CODEBITS[1]);
					
					//$_POST['code'] = str_replace("<!--","",str_replace("-->","",$CODEBITS[0].$CODEBITS1[1]));


$_POST['code'] = stripslashes2($_POST['code']);



					
					if($_POST['type'] =="affiliate"){
					
						if(!isset($_POST['eaid'])){
						
							$DB->Update("INSERT INTO `aff_banners` (`filename` ,`image_name` ,`image_alt` ,`image_link` ) 
							VALUES ('".$_POST['code']."', '".$_POST['name']."', '".$_POST['name']."', '".$_POST['link']."')");
						
						}else{
						
							$DB->Update("UPDATE `aff_banners` SET filename='".eMeetingInput($_POST['code'])."', `image_name`='".$_POST['name']."' ,`image_alt` ='".$_POST['name']."',`image_link`='".$_POST['link']."' WHERE id=".$_POST['eaid']);
							
						}
					
					}else{				

							if(!isset($_POST['eid'])){
								$DB->Insert("INSERT INTO `banners` ( `bid` , `bName` , `imglocation` , `urllocation` , `page` , `active` , `clicks` , `width` , `height` , `impressions`, code, position )
								VALUES (NULL , '".$_POST['name']."', '".$_POST['image']."', '".$_POST['link']."', '".$_POST['page']."', '".$newstatus."', '".$_POST['showto']."', '$imagewidth', '$imageheight', '0', '".eMeetingInput($_POST['code'])."' ,'".$_POST['bannerpos']."')");
								

								
							}else{



								$DB->Update("UPDATE banners SET bName='".$_POST['name']."', imglocation='".$_POST['image']."', clicks='".$_POST['showto']."', urllocation='".$_POST['link']."', page='".$_POST['page']."', width='".$imagewidth."', height='".$imageheight."', active='".$newstatus."', code='".eMeetingInput($_POST['code'])."', position='".$_POST['bannerpos']."' WHERE bid=".$_POST['eid']);
							

							}
					}
					$ErrorSend=1;
					$SkipThis=1;
					
			} break;
			
		}
}
// REDIRECT TO THE SAME PAGE
	if(isset($ErrorSend)){
		if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1";}else{$Err = $lang_members_code['no_update']."**0";}
	}
	if (!headers_sent()){
		if(isset($Err) && !isset($_REQUEST['d'])){
		
			if( isset($_POST['p']) || isset($RedirectPage) ){
			
				$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];
				
				header('location: advertising.php?p='.$page.'&Err='.$Err.'&d=1');
				exit();	
			}else{
				
				header('location: advertising.php?Err='.$Err.'&d=1');
				exit();
			}
		}
	}
}
############################################################
#################### FUNCTIONS #############################


function stripslashes2($string) {
    $string = str_replace("\\\"", "\"", $string);
    $string = str_replace("\\'", "'", $string);
    $string = str_replace("\\\\", "\\", $string);
    return $string;
}

function BannerItems($id){

	global $DB;
	if(!is_numeric($id)){ return; }
    $result = $DB->Row("SELECT * FROM banners WHERE bid=".$id." LIMIT 1");
	
	return $result;
}

function BannerAffItems($id){

	global $DB;
	
	$ab = array();
	
    $result = $DB->Row("SELECT * FROM aff_banners WHERE id=".$id." LIMIT 1");
	
	$ab['code'] = $result['filename'];
	$ab['urllocation'] = $result['image_link'];
	$ab['bName'] = $result['image_name'];
	
	
	return $ab;
}

function DisplayBannerPages($page){

	 $path = FilterPath();
	 $ext = array("php");
	 $files = array();
	 $HandlePath =subd."inc/templates/layout/";
	   
	 if($handle1 = opendir($HandlePath)) {
	 
	  while(false !== ($file = readdir($handle1))){
	 
	    for($i=0;$i<sizeof($ext);$i++){
              
			  if(strstr($file, ".".$ext[$i])){

				if($page == $file) {
			  
			  		print "<option value='$file' selected>$file</option>";
				}

				else {
					print "<option value='$file'>$file</option>";
				}
				
			  }
		}
	  }
	 
	 }
}
function FilterPath(){
	$path=dirname(realpath($_SERVER['SCRIPT_FILENAME']));
	$path_parts = pathinfo($path);
	$path = str_replace("newadmin", "", $path);
	$path = str_replace("NEW", "", $path);
	return $path;
}
 
############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/advertising.php";

}else{

		if($PLUGINS_PAGE_TYPE =="html"){
			
			print $PLUGINS_PAGE_LINK;
			
		}elseif($PLUGINS_PAGE_TYPE =="link"){
			
			require_once (	$PLUGINS_PAGE_LINK 	);	
		}
}
print $tdata[2]["contents"]; 
$DB->Disconnect();
?>