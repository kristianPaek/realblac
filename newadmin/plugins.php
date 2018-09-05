<?
$_REQUEST['n'] =14;
require_once "inc/config.php";
require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";

#-- load admin functions

## page access check
if(!in_array("8",$_SESSION['admin_access_level']) ) { header("location:overview.php");}

$PageLink = "plugins.php";
$PageLang = $admin_layout_page11;

if ( !function_exists('file_put_contents') && !defined('FILE_APPEND') ) {

	define('FILE_APPEND', 1);
	function file_put_contents($n, $d, $flag = false) {
		$mode = ($flag == FILE_APPEND || strtoupper($flag) == 'FILE_APPEND') ? 'a' : 'w';
		$f = @fopen($n, $mode);
		if ($f === false) {
			return 0;
		} else {
			if (is_array($d)) $d = implode($d);
			$bytes_written = fwrite($f, $d);
			fclose($f);
			return $bytes_written;
		}
	}

}
include_once("inc/plugins/p_1.php");
include_once("inc/plugins/p_2.php");
include_once("inc/plugins/p_3.php");
include_once(subd."plugins/config_plugins.php");

#-- prepare for configuration editing
define("CONFIG_DIR", subd."plugins");
define("CONFIG_FILE", "config_plugins.php");
$conf = new generic_config_html(CONFIG_DIR, CONFIG_FILE);


////////////////////////
	$PH = $admin_layout_nav[9];
/////////////////////////////////
require_once "layout.php";
############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){
if ($_POST["save"]) {

	$conf->form_receive();
	
	$Err = "Plugin Changes Made Successfully";
	
}
// REDIRECT TO THE SAME PAGE
if(isset($Err) && !isset($_REQUEST['d'])){

	if( isset($_POST['page']) || isset($RedirectPage) ){
	
		$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['page'];
		
		header('location: plugins.php?p='.$page.'&Err='.$Err.'&d=1');
		exit();	
	}else{
		
		header('location: plugins.php?Err='.$Err.'&d=1');
		exit();
	}
}
}
############################################################
#################### FUNCTIONS #############################

############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/plugins.php";

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