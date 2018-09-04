<?
$_REQUEST['n'] =16;
require_once "inc/config.php";

require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

$PageLink = "maintenance.php";
$PageLang = $admin_layout_page10;

require_once "layout.php";
############################################################
#################### OPERATIONS ############################

if(ADMIN_DEMO != "yes"){

if(isset($_REQUEST['do'])){ 

		switch ($_REQUEST['do']) {

			case "backup": {
		
					$lstTables=$_POST['lstTables'];
					if (!count($lstTables)) die("Please select a database table to be backup.");
												
					switch ($_POST['arcType']) {
							case "gzip":
										$fName=DB_BASE."-".date("Y-m-d").".sql.gz";
										$command="mysqldump --opt -h ".DB_HOST." -u ".DB_USER." -p".DB_PASS." ".DB_BASE." ".implode(" ",$lstTables)." | gzip -c";
										break;
								default:
										$fName=DB_BASE."-".date("Y-m-d").".sql";
										$command="mysqldump --opt -h ".DB_HOST." -u ".DB_USER." -p".DB_PASS." ".DB_BASE." ".implode(" ",$lstTables);
					}
						header("Content-type: application/octet-stream");
						header("Content-Disposition:inline; filename=\"".$fName."\"");
						passthru($command);
						exit;					
			}break;
						
			case "key": {
			 
						$filename = str_replace("newadmin","",dirname(__FILE__)).'inc/config_db.php';

						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your sv_config.php file. Please make sure it exsits and is located in the inc/ directory.");
						} else {
					 
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string							
							  if ( strstr($data[$counter], "'KEY_ID','".KEY_ID."'") ) {
							  	
									$filecontent .= str_replace("'KEY_ID','".KEY_ID."'", "'KEY_ID','".$_POST['key']."'", $data[$counter]);
							  }
							  
							  elseif ( strstr($data[$counter], "'BRAND_ID','".BRAND_ID."'" ) ) {
							  	
									$filecontent .= str_replace("'BRAND_ID','".BRAND_ID."'", "'BRAND_ID','".$_POST['bkey']."'", $data[$counter]);
							  }
							  
							  elseif ( strstr($data[$counter], "'MAPS_ID','".MAPS_ID."'") ) {
							  	
									$filecontent .= str_replace("'MAPS_ID','".MAPS_ID."'", "'MAPS_ID','".$_POST['pkey']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'GOOGLE_MAPS_KEY','".GOOGLE_MAPS_KEY."'") ) {
							  	
									$filecontent .= str_replace("'GOOGLE_MAPS_KEY','".GOOGLE_MAPS_KEY."'", "'GOOGLE_MAPS_KEY','".$_POST['gkey']."'", $data[$counter]);
							  }

							  
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 return "Cannot open file ($filename)"; 
							 
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   return "Cannot write to file ($filename)"; 
						 
					   } 
					   fclose($handle);
					   
					   $ErrorSend=1;

				}break;
			
		}
}
}
// REDIRECT TO THE SAME PAGE
if(isset($ErrorSend)){
	if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1";}else{$Err = $lang_members_code['no_update']."**0";}
}

if(isset($Err) && !isset($_REQUEST['d'])){

	if( isset($_POST['page']) || isset($RedirectPage) ){
	
		$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['page'];
		
		header('location: maintenance.php?p='.$page.'&Err='.$Err.'&d=1');
		exit();	
	}else{
		
		header('location: maintenance.php?Err='.$Err.'&d=1');
		exit();
	}
}
############################################################
#################### FUNCTIONS #############################

############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/maintenance.php";

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