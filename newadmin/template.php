<?
$_REQUEST['n'] =2;
$_POST["do_page"] ="browse"; // stops config from using thepost function.
require_once "inc/config.php";
require_once subd . "inc/config.php";
require_once "inc/func/admin_globals.php";
require_once("../plugins/config_plugins.php" );

## page access check
if(!in_array("3",$_SESSION['admin_access_level']) ) { header("location:overview.php");}


$PageLink = "template.php";
$PageLang = $admin_layout_page3;

require_once "layout.php";
############################################################
#################### OPERATIONS ############################
if(ADMIN_DEMO != "yes"){

if(isset($_POST['do'])){ 

		switch ($_POST['do']) {

		case "terms": {

			$DB->Update("UPDATE system_settings SET value2 = ('".$_POST['details']."') WHERE id=5 LIMIT 1");			

			
			$ErrorSend=1;
		
		} break;

		case "installtemplate": {

				for($i = 1; $i < $_POST['totalrows']+1; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){				
						
						$tarfile=$_POST['id'.$i];	
						$tarfile_name=str_replace(".tar", "", $tarfile);
						$tarfile_name=str_replace(".zip", "", $tarfile);
						$tarfile_name=str_replace("emeeting_", "", $tarfile_name);

						@mkdir(TEMPLATE_PATH_TARS."/".$tarfile_name, 0777);

						// untar ALL the crap 
						//untar(TEMPLATE_PATH_TARS.$tarfile, TEMPLATE_PATH_TARS.$tarfile_name);						
						unzip(TEMPLATE_PATH_TARS.$tarfile, TEMPLATE_PATH_TARS.$tarfile_name);

						// load the config file
						if(file_exists(TEMPLATE_PATH_TARS.$tarfile_name."/config.php")){

							require_once(TEMPLATE_PATH_TARS.$tarfile_name."/config.php");

							// DATA FROM CONFIG FILE
							$name = $template_config['tname'];
							$description = htmlspecialchars($template_config['tdesc'], ENT_QUOTES);
							$category = $template_config['tcategory'];
							$image = $template_config['timage'];		
							$tid = $template_config['tid'];

							// delete the files								
							@unlink(TEMPLATE_PATH_TARS.$tarfile);
							//@unlink(TEMPLATE_PATH_TARS.$tarfile_name."/config.php");
							//chmod new files for editing
							@chmod(TEMPLATE_PATH_TARS.$name."/images/", 755);
							@chmod(TEMPLATE_PATH_TARS.$name."/header.php", 755);
							@chmod(TEMPLATE_PATH_TARS.$name."/footer.php", 755);
							@chmod(TEMPLATE_PATH_TARS.$name."/template.css", 755);


							$DB->Insert("INSERT INTO `system_templates` (template_id,`cat` ,`name` ,`preview` ,`description`)VALUES ('".$tid."', '".$category."', '".$name."', '".$image."', '".$description."')");
							
						}else{

							die("The config file for the template is missing! Template installation has failed. Please delete this template and try again.");

						}
					

					}
				}
			
				$ErrorSend=1;

		} break;


case "imgslider": {

$i=1; $Save_Array = array();

while($i < 5){

	$Save_Array[$i]['title'] = $_POST['st'.$i];
	$Save_Array[$i]['desc'] = $_POST['sd'.$i];
	$Save_Array[$i]['link'] = $_POST['sl'.$i];
	$Save_Array[$i]['image']="";

	if($_FILES['file'.$i]['tmp_name'] !=""){
	
			## validate file
			 
			if($CanContinue !='1'){

					## save image to files directory
					$copy = copy($_FILES['file'.$i]['tmp_name'], PATH_FILES.$_FILES['file'.$i]['name']);
							
					if($copy){

						$RandFileID = makeRandomPassword(5);
						$img_array= explode('.', $_FILES['file'.$i]['name'],2);						 
						if(rename_win(PATH_FILES.$_FILES['file'.$i]['name'], PATH_FILES.$RandFileID.".".strtolower($img_array[1])) == FALSE){
									
							$image_name = $_FILES['file'.$i]['name'];
									
						}else{
									
							$image_name = $RandFileID.".".strtolower($img_array[1]);
						}

						## save image
						
 						$Save_Array[$i]['image'] = "uploads/files/".$image_name;

					}

			}

	} 
$i++;
}

					## now we have the array of store files, lets store them

						$filename = subd.'inc/config_template.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the includes/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string
														
							  if ( strstr($data[$counter], "'SLIDER1_IMAGE','".SLIDER1_IMAGE."'") && ( $Save_Array[1]['image'] !="" ) ) {
							 	
									$filecontent .= str_replace("'SLIDER1_IMAGE','".SLIDER1_IMAGE."'", "'SLIDER1_IMAGE','".$Save_Array[1]['image']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER1_LINK','".SLIDER1_LINK."'") && ( $Save_Array[1]['link'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER1_LINK','".SLIDER1_LINK."'", "'SLIDER1_LINK','".$Save_Array[1]['link']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER1_TITLE','".SLIDER1_TITLE."'") && ( $Save_Array[1]['title'] !=""  ) ) {
							  	
									$filecontent .= str_replace("'SLIDER1_TITLE','".SLIDER1_TITLE."'", "'SLIDER1_TITLE','".$Save_Array[1]['title']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER1_DESC','".SLIDER1_DESC."'") && ( $Save_Array[1]['desc'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER1_DESC','".SLIDER1_DESC."'", "'SLIDER1_DESC','".$Save_Array[1]['desc']."'", $data[$counter]);
							  }

## slider 2
							 elseif ( strstr($data[$counter], "'SLIDER2_IMAGE','".SLIDER2_IMAGE."'") && ( $Save_Array[2]['image'] !="" ) ) {
							 	
									$filecontent .= str_replace("'SLIDER2_IMAGE','".SLIDER2_IMAGE."'", "'SLIDER2_IMAGE','".$Save_Array[2]['image']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER2_LINK','".SLIDER2_LINK."'") && ( $Save_Array[2]['link'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER2_LINK','".SLIDER2_LINK."'", "'SLIDER2_LINK','".$Save_Array[2]['link']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER2_TITLE','".SLIDER2_TITLE."'") && ( $Save_Array[2]['title'] !=""  ) ) {
							  	
									$filecontent .= str_replace("'SLIDER2_TITLE','".SLIDER2_TITLE."'", "'SLIDER2_TITLE','".$Save_Array[2]['title']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER2_DESC','".SLIDER2_DESC."'") && ( $Save_Array[2]['desc'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER2_DESC','".SLIDER2_DESC."'", "'SLIDER2_DESC','".$Save_Array[2]['desc']."'", $data[$counter]);
							  }

## slider 3
							 elseif ( strstr($data[$counter], "'SLIDER3_IMAGE','".SLIDER3_IMAGE."'") && ( $Save_Array[3]['image'] !="" ) ) {
							 	
									$filecontent .= str_replace("'SLIDER3_IMAGE','".SLIDER3_IMAGE."'", "'SLIDER3_IMAGE','".$Save_Array[3]['image']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER3_LINK','".SLIDER3_LINK."'") && ( $Save_Array[3]['link'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER3_LINK','".SLIDER3_LINK."'", "'SLIDER3_LINK','".$Save_Array[3]['link']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER3_TITLE','".SLIDER3_TITLE."'") && ( $Save_Array[3]['title'] !=""  ) ) {
							  	
									$filecontent .= str_replace("'SLIDER3_TITLE','".SLIDER3_TITLE."'", "'SLIDER3_TITLE','".$Save_Array[3]['title']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER3_DESC','".SLIDER3_DESC."'") && ( $Save_Array[3]['desc'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER3_DESC','".SLIDER3_DESC."'", "'SLIDER3_DESC','".$Save_Array[3]['desc']."'", $data[$counter]);
							  }
## slider 4
							 elseif ( strstr($data[$counter], "'SLIDER4_IMAGE','".SLIDER4_IMAGE."'") && ( $Save_Array[4]['image'] !="" ) ) {
							 	
									$filecontent .= str_replace("'SLIDER4_IMAGE','".SLIDER4_IMAGE."'", "'SLIDER4_IMAGE','".$Save_Array[4]['image']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER4_LINK','".SLIDER4_LINK."'") && ( $Save_Array[4]['link'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER4_LINK','".SLIDER4_LINK."'", "'SLIDER4_LINK','".$Save_Array[4]['link']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER4_TITLE','".SLIDER4_TITLE."'") && ( $Save_Array[4]['title'] !=""  ) ) {
							  	
									$filecontent .= str_replace("'SLIDER4_TITLE','".SLIDER4_TITLE."'", "'SLIDER4_TITLE','".$Save_Array[4]['title']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SLIDER4_DESC','".SLIDER4_DESC."'") && ( $Save_Array[4]['desc'] !="" ) ) {
							  	
									$filecontent .= str_replace("'SLIDER4_DESC','".SLIDER4_DESC."'", "'SLIDER4_DESC','".$Save_Array[4]['desc']."'", $data[$counter]);
							  }
			  
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) {echo "Cannot open file ($filename)"; exit;  }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { echo "Cannot write to file ($filename)"; exit; } 
					   fclose($handle);
$ErrorSend=1;
} break;





		case "builder": { 

		if(isset($_FILES['LogoUpload']['name']) && $_FILES['LogoUpload']['tmp_name'] =="" ){
		$_FILES['LogoUpload']['tmp_name'] = $_FILES['LogoUpload']['name'];
		}

		if(isset($_FILES['LogoUpload']['tmp_name']) && strlen($_FILES['LogoUpload']['tmp_name']) > 5){
				
				$UploadPath = PATH_FILES;
				
				$copy = copy($_FILES['LogoUpload']['tmp_name'], $UploadPath.$_FILES['LogoUpload']['name']);

				if($copy){
						
						$_POST['txt_logo_image'] = WEB_PATH_FILES.$_FILES['LogoUpload']['name'];
				}else{
									
						$Err .="File name ( ".$_POST['old_file'.$i]." ) could not be saved.";
								
				}
		}

// hide logo

if(isset($_POST['DontShowLogo']) && $_POST['DontShowLogo'] ==1){

$hidelogo =1;

}else{

$hidelogo=0;

}

// DisplayFooter
if(isset($_POST['DisplayFooter']) && $_POST['DisplayFooter'] ==1){

$hidefooter =1;

}else{

$hidefooter =0;

}

			// MAKE PREDFINED COLOUR SCHEMES
			if($_POST['tmp_reset'] ==1){
			
						$_POST['c1']="";
						$_POST['c2']="";
						$_POST['c3']="";
						$_POST['c4']="";
						$_POST['c5']="";
						$_POST['c6']="";
						$_POST['c7']="";
			}
			if($_POST['p1'] != 1){
			
				$_POST['c1']=$_POST['pa'.$_POST['p1']];//"#5679AC";
				$_POST['c2']=$_POST['pb'.$_POST['p1']];
				$_POST['c3']=$_POST['pc'.$_POST['p1']];
				$_POST['c4']=$_POST['pd'.$_POST['p1']];
				$_POST['c5']=$_POST['pe'.$_POST['p1']];
				$_POST['c6']=$_POST['pf'.$_POST['p1']];
				$_POST['c7']=$_POST['pg'.$_POST['p1']];
			}


						$filename = subd.'inc/config_template.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the includes/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string
														 
							  if ( strstr($data[$counter], "'TMP_BACKGROUND','".TMP_BACKGROUND."'") && ( $_POST['c1'] !="" || $_POST['tmp_reset'] ==1 ) ) {
							 	
									$filecontent .= str_replace("'TMP_BACKGROUND','".TMP_BACKGROUND."'", "'TMP_BACKGROUND','".$_POST['c1']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'TMP_FOR_1','".TMP_FOR_1."'") && ( $_POST['c2'] !="" || $_POST['tmp_reset'] ==1 ) ) {
							  	
									$filecontent .= str_replace("'TMP_FOR_1','".TMP_FOR_1."'", "'TMP_FOR_1','".$_POST['c2']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'TMP_FOR_2','".TMP_FOR_2."'")  && ( $_POST['c3'] !="" || $_POST['tmp_reset'] ==1 )) {
							  	
									$filecontent .= str_replace("'TMP_FOR_2','".TMP_FOR_2."'", "'TMP_FOR_2','".$_POST['c3']."'", $data[$counter]);
							  }
							  elseif ( strstr($data[$counter], "'TMP_FOR_3','".TMP_FOR_3."'") && ( $_POST['c4'] !="" || $_POST['tmp_reset'] ==1 ) ) {
							  	
									$filecontent .= str_replace("'TMP_FOR_3','".TMP_FOR_3."'", "'TMP_FOR_3','".$_POST['c4']."'", $data[$counter]);
							  }		

							  elseif ( strstr($data[$counter], "'TMP_LINK','".TMP_LINK."'")  && ( $_POST['c6'] !="" || $_POST['tmp_reset'] ==1 )) {
							  	
									$filecontent .= str_replace("'TMP_LINK','".TMP_LINK."'", "'TMP_LINK','".$_POST['c6']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'TMP_LINK_MENU','".TMP_LINK_MENU."'") && ( $_POST['c5'] !="" || $_POST['tmp_reset'] ==1 )) {
							  	
									$filecontent .= str_replace("'TMP_LINK_MENU','".TMP_LINK_MENU."'", "'TMP_LINK_MENU','".$_POST['c5']."'", $data[$counter]);
							  }		

							  elseif ( strstr($data[$counter], "'TMP_LINK_MENU','".TMP_LINK_MENU."'") && ( $_POST['c5'] !="" || $_POST['tmp_reset'] ==1 )) {
							  	
									$filecontent .= str_replace("'TMP_LINK_MENU','".TMP_LINK_MENU."'", "'TMP_LINK_MENU','".$_POST['c5']."'", $data[$counter]);
							  }		

							  elseif ( strstr($data[$counter], "'TMP_PAGE_HEAD','".TMP_PAGE_HEAD."'") && isset($_POST['c7']) ) {
							  	
									$filecontent .= str_replace("'TMP_PAGE_HEAD','".TMP_PAGE_HEAD."'", "'TMP_PAGE_HEAD','".$_POST['c7']."'", $data[$counter]);
							  }	

							  elseif ( strstr($data[$counter], "'TMP_LOGO','".TMP_LOGO."'") && isset($_POST['txt_logo']) ) {
							  	
									$filecontent .= str_replace("'TMP_LOGO','".TMP_LOGO."'", "'TMP_LOGO','".$_POST['txt_logo']."'", $data[$counter]);
							  }		

					 		 elseif ( strstr($data[$counter], "'TMP_INDEX_STYLE','".TMP_INDEX_STYLE."'") && isset($_POST['tmp_design']) && ( $_POST['tmp_design'] != TMP_INDEX_STYLE ) ) {
							  	
									$filecontent .= str_replace("'TMP_INDEX_STYLE','".TMP_INDEX_STYLE."'", "'TMP_INDEX_STYLE','".$_POST['tmp_design']."'", $data[$counter]);
							  }	
							  elseif ( strstr($data[$counter], "'TMP_LOGO_SLOGAN','".TMP_LOGO_SLOGAN."'") && isset($_POST['txt_logo_slogan']) ) {
							  	
									$filecontent .= str_replace("'TMP_LOGO_SLOGAN','".TMP_LOGO_SLOGAN."'", "'TMP_LOGO_SLOGAN','".$_POST['txt_logo_slogan']."'", $data[$counter]);
							  }		
							  elseif ( strstr($data[$counter], "'TMP_LOGO_ICON','".TMP_LOGO_ICON."'") && isset($_POST['txt_logo_image']) ) {
							  	
									$filecontent .= str_replace("'TMP_LOGO_ICON','".TMP_LOGO_ICON."'", "'TMP_LOGO_ICON','".$_POST['txt_logo_image']."'", $data[$counter]);
							  }		

							  elseif ( strstr($data[$counter], "'TMP_LOGO_HEIGHT','".TMP_LOGO_HEIGHT."'") && isset($_POST['logoh']) ) {
							  	
									$filecontent .= str_replace("'TMP_LOGO_HEIGHT','".TMP_LOGO_HEIGHT."'", "'TMP_LOGO_HEIGHT','".$_POST['logoh']."'", $data[$counter]);
							  }	

							  elseif ( strstr($data[$counter], "'TMP_LOGO_COLOR','".TMP_LOGO_COLOR."'") && isset($_POST['lc1']) ) {
							  	
									$filecontent .= str_replace("'TMP_LOGO_COLOR','".TMP_LOGO_COLOR."'", "'TMP_LOGO_COLOR','".$_POST['lc1']."'", $data[$counter]);
							  }		

							  elseif ( strstr($data[$counter], "'TMP_LOGO_SLOGAN_COLOR','".TMP_LOGO_SLOGAN_COLOR."'") && isset($_POST['lc2']) ) {
							  	
									$filecontent .= str_replace("'TMP_LOGO_SLOGAN_COLOR','".TMP_LOGO_SLOGAN_COLOR."'", "'TMP_LOGO_SLOGAN_COLOR','".$_POST['lc2']."'", $data[$counter]);
							  }			

							  elseif ( strstr($data[$counter], "'TMP_LOGO_HIDE','".TMP_LOGO_HIDE."'")) {
							  	
									$filecontent .= str_replace("'TMP_LOGO_HIDE','".TMP_LOGO_HIDE."'", "'TMP_LOGO_HIDE','".$hidelogo."'", $data[$counter]);
							  }	


// text 

							  elseif ( strstr($data[$counter], '"TMP_TXT_1"') && isset($_POST['txt1']) ) {
 
$text = "";
$text = StripCR (trim(str_replace('"',"'",$_POST['txt1'])));

							  	 
									$filecontent .= str_replace('"TMP_TXT_1","'.TMP_TXT_1.'"', '"TMP_TXT_1","'.$text.'"', $data[$counter]);
							  }	
								  elseif ( strstr($data[$counter], '"TMP_TXT_2","'.TMP_TXT_2.'"') && isset($_POST['txt2']) ) {

$text = "";
$text = StripCR (trim(str_replace('"',"'",$_POST['txt2'])));
							  	 
									$filecontent .= str_replace('"TMP_TXT_2","'.TMP_TXT_2.'"', '"TMP_TXT_2","'.$text.'"', $data[$counter]);
							  }	
							  elseif ( strstr($data[$counter], '"TMP_TXT_3","'.TMP_TXT_3.'"') && isset($_POST['txt3']) ) {

$text = "";
$text = StripCR (trim(str_replace('"',"'",$_POST['txt3'])));
							  	 
									$filecontent .= str_replace('"TMP_TXT_3","'.TMP_TXT_3.'"', '"TMP_TXT_3","'.$text.'"', $data[$counter]);
							  }	
							  elseif ( strstr($data[$counter], '"TMP_TXT_4","'.TMP_TXT_4.'"') && isset($_POST['txt4']) ) {

$text = "";
$text = StripCR (trim(str_replace('"',"'",$_POST['txt4'])));
							  	 
									$filecontent .= str_replace('"TMP_TXT_4","'.TMP_TXT_4.'"', '"TMP_TXT_4","'.$text.'"', $data[$counter]);
							  }	
							  elseif ( strstr($data[$counter], '"TMP_TXT_5","'.TMP_TXT_5.'"') && isset($_POST['txt5']) ) {

$text = "";
$text = StripCR (trim(str_replace('"',"'",$_POST['txt5'])));
							  	 
									$filecontent .= str_replace('"TMP_TXT_5","'.TMP_TXT_5.'"', '"TMP_TXT_5","'.$text.'"', $data[$counter]);
							  }	
							  elseif ( strstr($data[$counter], '"TMP_TXT_6","'.TMP_TXT_6.'"') && isset($_POST['txt6']) ) {

$text = "";
$text = StripCR (trim(str_replace('"',"'",$_POST['txt6'])));
							  	 
									$filecontent .= str_replace('"TMP_TXT_6","'.TMP_TXT_6.'"', '"TMP_TXT_6","'.$text.'"', $data[$counter]);
							  }	
							 
			  
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					}
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) {echo "Cannot open file ($filename)"; exit;  }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { echo "Cannot write to file ($filename)"; exit; } 
					   fclose($handle);


					if($_POST['UpateTempName'] !="" && $_POST['UpateTempName'] != D_TEMP){
											$filename = subd.'inc/config.php';
											if (!$file = fopen($filename, 'a+b')) {
											
												$Err = "There was an error opening your config.php file. Please make sure it exsits and is located in the includes/ directory.";
											
											} else {
										
											$data = array();
											$counter = 1;
											$filecontent = "";
											while (!feof($file)) {
												$data[$counter] = fgets($file);
												// check line and replace string							
												  if ( strstr($data[$counter], "'D_TEMP','".D_TEMP."'") ) {
													
														$filecontent .= str_replace("'D_TEMP','".D_TEMP."'", "'D_TEMP','".$_POST['UpateTempName']."'", $data[$counter]);
												  }
												  else{
														$filecontent .= $data[$counter];
												  }		 
												 $counter ++;
											}	
											fclose($file);
					
											//now we have to write in all the new data to this file
										   if (!$handle = fopen($filename, 'w')) { 
												 $Err = "Cannot open file ($filename)"; 							
										   }
										   // Write $somecontent to our opened file. 
										   if (fwrite($handle, $filecontent) === FALSE) { 
											   $Err = "Cannot write to file ($filename)"; 
											
										   } 
										   fclose($handle);
					}
					 }  
					   $ErrorSend=1;


		} break;
		/*
			UPDATE WEBSITE WORDING
		*/
		case "domenu": {

				$ErrorSend=0;						

				$filename = '../inc/langs/'.D_LANG.".php";
  
				if (!$file = fopen($filename, 'a+b')) {} else {					
				$data = array(); $AlreadySaved = array();
				$counter = 1;
				$FLAG_THIS=0;
				$filecontent = "";
				
				while (!feof($file)) {
					
					$data[$counter] = fgets($file);
									
					if ( strstr($data[$counter], "$".$_POST['array_name'].' = array(') ) {
		
								$FLAG_THIS = 1; 
								$filecontent .= $data[$counter];
								
					
					}elseif( $FLAG_THIS ==1 && strstr($data[$counter], ');')  ) {
									
									$FLAG_THIS = 0;	  
									$filecontent .= $data[$counter];

					}elseif( $FLAG_THIS == 1  ) {
									
									
									$match_found=0;
									
									 
									for($i = 1; $i < $_POST['totalrows']; $i++) { 					
									
										if( $match_found ==0 && strstr($data[$counter], '"'.$_POST['key'. $i].'" =>') ){											
											
											// FORMAT INPUT
											
											$SAVETHIS = str_replace('"',"'",$_POST['name'. $i]);
											$SAVETHIS = preg_replace('/\s\s+/', ' ', $SAVETHIS);
											$SAVETHIS = trim(strip_tags(str_replace('"',"",$SAVETHIS)));											
											
											if($_POST['d'. $i] !="on" && !in_array($_POST['nkey'. $i],$AlreadySaved) ){
												$filecontent .= '"'.$_POST['nkey'. $i].'" => "'.$SAVETHIS.'",';
												array_push($AlreadySaved,$_POST['nkey'. $i]);
											}else{ 
												$filecontent .="";
											}
																					
											$filecontent .= "\n";
											
											
											
											
											$match_found=1;											
										}
										
									}
									// ARRAYS FINISHED, ARE WE ADDING A NEW MENU ITEM?
									if($i == $_POST['totalrows'] && strlen($_POST['name'. $i]) > 0){
											
												$SAVETHIS = str_replace('"',"'",$_POST['name'. $i]);
												$SAVETHIS = preg_replace('/\s\s+/', ' ', $SAVETHIS);
												$SAVETHIS = trim(strip_tags(str_replace('"',"",$SAVETHIS)));											
												$filecontent .= '"'.$_POST['nkey'. $i].'" => "'.$SAVETHIS.'",';
												$filecontent .= "\n";
									}
									
									if($match_found==0){
										$filecontent .= $data[$counter];
									}
									$match_found=0;
					
					} else{
						$filecontent .= $data[$counter];
					}
										  
					$counter ++;									  
				}
				 fclose($file);
			}
			 
			$handle = fopen($filename, 'w');
			fwrite($handle, $filecontent);
			fclose($handle);
	
			$ErrorSend=1;
			
		} break;	
		
		/*
			UPDATE WEBSITE WORDING
		*/
		case "updatewording": {

				$ErrorSend=0;						

				$filename = '../inc/langs/'.D_LANG.".php";
				if (!$file = fopen($filename, 'a+b')) {} else {					
				$data = array();
				$counter = 1;
				$FLAG_THIS=0;
				$filecontent = "";
				
				while (!feof($file)) {
					
					$data[$counter] = fgets($file);
									
					if ( strstr($data[$counter], "$".$_POST['array_name'].' = array(') ) {
		
								$FLAG_THIS = 1; 
								$filecontent .= $data[$counter];
								
					
					}elseif( $FLAG_THIS ==1 && strstr($data[$counter], ');')  ) {
									
									$FLAG_THIS = 0;	  
									$filecontent .= $data[$counter];

					}elseif( $FLAG_THIS == 1  ) {
									
									
									$match_found=0;
									for($i = 1; $i < $_POST['totalrows']; $i++) { 					
									
										if( $match_found ==0 && strstr($data[$counter], '"'.$_POST['key'. $i].'" =>') ){											
											
											// FORMAT INPUT
											
											$SAVETHIS = str_replace('"',"'",$_POST['val'. $i]);
											$SAVETHIS = preg_replace('/\s\s+/', ' ', $SAVETHIS);
											$SAVETHIS = trim(strip_tags(str_replace('"',"",$SAVETHIS)));											
											//if($_POST['key'. $i]=='15'){ die('"'.$_POST['key'. $i].'" => "'.$SAVETHIS.'",');}
											$filecontent .= '"'.$_POST['key'. $i].'" => "'.$SAVETHIS.'",';											
											$filecontent .= "\n";
											$match_found=1;											
										}
										
									}
									
									if($match_found==0){
										$filecontent .= $data[$counter];
									}
									$match_found=0;
					
					} else{
						$filecontent .= $data[$counter];
					}
										  
					$counter ++;									  
				}
				 fclose($file);
			}
			
			$handle = fopen($filename, 'w');
			fwrite($handle, $filecontent);
			fclose($handle);
	
			$ErrorSend=1;
			
		} break;	
		
		/*
			UPDATE IMAGE FILES
		*/
		case "deletelang": {

				$ErrorSend=0;
				for($i = 1; $i < $_POST['totalrows']; $i++) { 
					
					if(isset($_POST['d'. $i]) && $_POST['d'.$i] == "on"){
					
						unlink(subd."inc/langs/".$_POST['id'.$i]);
						
						$ErrorSend++;
					}
				}		
		
		} break;		
		/*
			UPDATE IMAGE FILES
		*/
		case "changeimages": {				
				
				  
				$UploadPath = str_replace("uploads/images/","",PATH_IMAGE)."inc/templates/".D_TEMP."/images/";
				$UploadPath = str_replace("uploads/images/","",PATH_IMAGE)."inc/templates/".D_TEMP."/images/";
				$UploadPath = str_replace("//","/",$UploadPath);

				for($i = 1; $i < $_POST['totalrows']; $i++) { 
					
					if(isset($_FILES['file'. $i]) && $_FILES['file'.$i]['name'] != ""){
					
						//die("new->".$_FILES['file'.$i]['name']."  old ->".$_POST['old_file'.$i]."<br>");
						@unlink($UploadPath.$_POST['old_file'.$i]);
						$copy = copy($_FILES['file'.$i]['tmp_name'], $UploadPath.$_POST['old_file'.$i]);
						if($copy){
							$Err .="File name ( ".$_POST['old_file'.$i]." ) saved successfully.";
						}else{
							
							$Err .="File name ( ".$_POST['old_file'.$i]." ) could not be saved.";
						
						}						 				
					
					}
				}
			
		}break;	
		
		/*
			CREATE NEW LANGUAGE FILE
		*/		
		
		case "langcreate": {
			
				copy(subd."inc/langs/".$_POST['file'],subd."inc/langs/".$_POST['name'].".php");
				
				if($copy){
				
					$Err="The new language file could not be create because the CHMOD permissions on the folder inc/langs/ is not set to 777";
				
				}else{
				
					$ErrorSend=1;
				}

		} break;

		/*
			SAVE LANUAGE FILE DATA
		*/	
					
		case "langedit": {
								if (!$handle = fopen($_POST['savefile'], 'w')) { 
								 	$Err =  "File NOT Updated - Permission Denied"; break;
						  		 }
								## remove all the post data tags
								if (get_magic_quotes_gpc()) {
									$bodytag = unhtmlspecialchars(stripslashes($_POST['editor']));
								}
								else{
									$bodytag = unhtmlspecialchars($_POST['editor']);
								}
								$bodytag=trim($bodytag);
								if (fwrite($handle, $bodytag) === FALSE) { 
									   $Err =  "File NOT Updated - Permission Denied"; break;
								} 
								fclose($handle);
								
								//$ErrorSend=1;	 <-- caused error	
			} break;

		/*
			SAVE LANUAGE FILE DATA
		*/
		
		case "langupdate": {
			 
						$newlang = str_replace(".php","",$_POST['newlang']);
						$filename = subd.'inc/config.php';
						if (!$file = fopen($filename, 'a+b')) {
						
							$Err = "There was an error opening your config.php file. Please make sure it exsits and is located in the inc/ directory.";
							
						} else {
					
							$data = array();
							$counter = 1;
							$filecontent = "";
							while (!feof($file)) {
								$data[$counter] = fgets($file);
								// check line and replace string							
								  if ( strstr($data[$counter], "'D_LANG','".D_LANG."'") ) {
									
										$filecontent .= str_replace("'D_LANG','".D_LANG."'", "'D_LANG','".$newlang."'", $data[$counter]);
								  }
								  else{
										$filecontent .= $data[$counter];
								  }		 
								 $counter ++;
							}	
							fclose($file);
							
							//now we have to write in all the new data to this file
						   if (!$handle = fopen($filename, 'w')) { 
								 echo "Cannot open file ($filename)"; 
								 exit; 
						   }
						   // Write $somecontent to our opened file. 
						   if (fwrite($handle, $filecontent) === FALSE) { 
							   echo "Cannot write to file ($filename)"; 
							  exit; 
						   } 
						   fclose($handle);
					   							
							$ErrorSend=1;
					}

			}break;

		/*
			CREATE NEW TEMPLATE PAGE
		*/						
		
		case "create": {
 
				$result = $DB->Insert("INSERT INTO `template_pages` (`name` ,`created` ,`content`)VALUES ( '".$_POST['name']."', NOW( ) , '".eMeetingInput($_POST['editor'])."')");				
				$NEWPAGEID = $DB->InsertID();
				
				$Err = "Page Created Successfully.";
				
				if($_POST['tab'] ==2 || $_POST['tab'] ==3){
				
						$filename = subd.'inc/langs/'.D_LANG.'.php';						
						if (!$file = fopen($filename, 'a+b')) {
							
							$Err = "Sorry, We tried to edit your language file and add the new tab but your language file is not writable. <br> Please update the CHMOD settings for the language file at: ( inc/langs/".D_LANG.".php)";
						
						} else {
							
								$data = array();
								$counter = 1;
								$filecontent = "";
								while (!feof($file)) {
								
									$data[$counter] = fgets($file);
									// check line and replace string
									
									
									if($_POST['tab'] ==2){		
											
										$pos = strpos($data[$counter], '$lang_main_menu_logged_in = array(');
									
									}elseif($_POST['tab'] ==3){
									
										$pos = strpos($data[$counter], '$lang_main_menu = array(');
									
									}
									if($pos !== FALSE){
											
											if($_POST['tab'] ==2){
																	
											$filecontent .= str_replace('$lang_main_menu_logged_in = array(', '$lang_main_menu_logged_in = array( "'.$_POST['name'].'" => "'.$_POST['name'].'",', $data[$counter]);
									
											}elseif($_POST['tab'] ==3){
											
											$filecontent .= str_replace('$lang_main_menu = array(', '$lang_main_menu = array( "'.$_POST['name'].'" => "'.$_POST['name'].'",', $data[$counter]);
											
											}
									
									}else{
											$filecontent .= $data[$counter];
									}		 
									 $counter ++;
									 
								}	
								fclose($file);
								
								//now we have to write in all the new data to this file
							   if (!$handle = fopen($filename, 'w')) { 
									 $Err = "Cannot open file ($filename)"; 
									  
							   }
							   // Write $somecontent to our opened file. 
							   if (fwrite($handle, $filecontent) === FALSE) { 
								  $Err = "Cannot write to file ($filename)"; 
								
							   } 
							   fclose($handle);
							}
					   
				}
					 
					 
			} break;

		/*
			UPDATE FILE
		*/	
				
		case "update": {
			
			$pArray = explode("**",$_POST['savefile']);
			 
			if(!isset($pArray[1])){
								
								$bodytag = trim($_POST['editor']);
								if (!$handle = fopen($_POST['savefile'], 'w')) { 
 
								 	$Err  =  "File NOT Updated - Permission Denied **0"; break;
						  		 }

								## remove all the post data tags
								if (get_magic_quotes_gpc()) {
									$bodytag = unhtmlspecialchars($bodytag);
								}
								else{

									$bodytag = unhtmlspecialchars($bodytag);
								}
								if (fwrite($handle, $bodytag) === FALSE) { 
									   $Err  =  "File NOT Updated - Permission Denied **0"; break;
								} 
								fclose($handle);
			}else{
			
								## remove all the post data tags
								if (get_magic_quotes_gpc()) {
									$bodytag = unhtmlspecialchars($_POST['editor']);
								}
								else{
									$bodytag = unhtmlspecialchars($_POST['editor']);
								}

								 $DB->Update("UPDATE template_pages SET content='".eMeetingInput($bodytag)."' WHERE id='".$pArray[0]."'");
				
			}
			
			
			
			} break;
			
			
			/*
				UPDATE META TAGS
			*/		
			
			case "metaedit": {
			
			$_POST['page_update'] = str_replace('.php','', $_POST['page_update']);

			$_POST['m1'] = MetaTagStrip($_POST['m1']);
			$_POST['m2'] = MetaTagStrip($_POST['m2']);
			$_POST['m3'] = MetaTagStrip($_POST['m3']);


						$filename = subd.'inc/config_template.php';
						if (!$file = fopen($filename, 'a+b')) {
							die("There was an error opening your config.php file. Please make sure it exsits and is located in the includes/ directory.");
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string
														
							  if ( strstr($data[$counter], "'SEO_PREFIX_TITLE','".SEO_PREFIX_TITLE."'")  ) {
							 	
									$filecontent .= str_replace("'SEO_PREFIX_TITLE','".SEO_PREFIX_TITLE."'", "'SEO_PREFIX_TITLE','".$_POST['m1']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEO_PREFIX_DESC','".SEO_PREFIX_DESC."'")  ) {
							  	
									$filecontent .= str_replace("'SEO_PREFIX_DESC','".SEO_PREFIX_DESC."'", "'SEO_PREFIX_DESC','".$_POST['m2']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'SEO_PREFIX_KEYWORDS','".SEO_PREFIX_KEYWORDS."'") ) {
							  	
									$filecontent .= str_replace("'SEO_PREFIX_KEYWORDS','".SEO_PREFIX_KEYWORDS."'", "'SEO_PREFIX_KEYWORDS','".$_POST['m3']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'HOME_TITLE','".HOME_TITLE."'")  ) {
							  	
									$filecontent .= str_replace("'HOME_TITLE','".HOME_TITLE."'", "'HOME_TITLE','".$_POST['h1']."'", $data[$counter]);
							  }		

							  elseif ( strstr($data[$counter], "'HOME_DESC','".HOME_DESC."'")  ) {
							  	
									$filecontent .= str_replace("'HOME_DESC','".HOME_DESC."'", "'HOME_DESC','".$_POST['h2']."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'HOME_KEYWORDS','".HOME_KEYWORDS."'") ) {
							  	
									$filecontent .= str_replace("'HOME_KEYWORDS','".HOME_KEYWORDS."'", "'HOME_KEYWORDS','".$_POST['h3']."'", $data[$counter]);
							  }		

		

							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
					 
						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) {echo "Cannot open file ($filename)"; exit;  }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { echo "Cannot write to file ($filename)"; exit; } 
					   fclose($handle);
						
					 }   



				
				$ErrorSend=1;
				
			} break;
					
		}
}
if(isset($_REQUEST['do'])){

	switch ($_REQUEST['do']) {
		
		case "delp": {
		
			$DB->Insert("DELETE FROM template_pages WHERE id  = '".$_REQUEST['id']."' LIMIT 1");
			
header("location: template.php?p=edit&Err=System Updated Successfully**1");
exit();
			$ErrorSend=1;
						
		}break;
		
		
		case "template": {
			
						$filename = subd.'inc/config.php';

						if(file_exists(TEMPLATE_PATH_TARS.$_REQUEST['newtemp']."/config.php")){
						require_once(TEMPLATE_PATH_TARS.$_REQUEST['newtemp']."/config.php");

							// DATA FROM CONFIG FILE
							$name = $template_config['tname'];
							$description = htmlspecialchars($template_config['tdesc'], ENT_QUOTES);
							$category = $template_config['tcategory'];
							$image = $template_config['timage'];		
							$tid = $template_config['tid'];
							 
							$CheckThis = $DB->Row("SELECT count(id) AS total FROM system_templates WHERE template_id='".eMeetingInput($tid)."' LIMIT 1");
							if($CheckThis['total'] ==0){
							$DB->Insert("INSERT INTO `system_templates` (`template_id` ,`cat` ,`name` ,`preview` ,`description`)VALUES ('".$tid."' , '".$category."', '".$name."', '".$image."', '".$description."')");
							}				

						}

						if (!$file = fopen($filename, 'a+b')) {
						
							$Err = "There was an error opening your config.php file. Please make sure it exsits and is located in the includes/ directory.";
						
						} else {
					
						$data = array();
						$counter = 1;
						$filecontent = "";
						while (!feof($file)) {
							$data[$counter] = fgets($file);
							// check line and replace string							
							  if ( strstr($data[$counter], "'D_TEMP','".D_TEMP."'") ) {
							  	
									$filecontent .= str_replace("'D_TEMP','".D_TEMP."'", "'D_TEMP','".$_REQUEST['newtemp']."'", $data[$counter]);
							  }
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);

						//now we have to write in all the new data to this file
					   if (!$handle = fopen($filename, 'w')) { 
							 $Err = "Cannot open file ($filename)"; 							
					   }
					   // Write $somecontent to our opened file. 
					   if (fwrite($handle, $filecontent) === FALSE) { 
						   $Err = "Cannot write to file ($filename)"; 
						
					   } 
					   fclose($handle);
					   
				 		$ErrorSend=1;
						
					}
						
				}break;		
		
	}
		
		
}
// REDIRECT TO THE SAME PAGE
if(isset($ErrorSend)){
	if($ErrorSend > 0){ $Err = $lang_members_code['update']."**1";}else{$Err = $lang_members_code['no_update']."**0";} 
}

if(isset($Err) && !isset($_REQUEST['d'])){

	if( isset($_POST['p']) || isset($RedirectPage) ){
	
		$page    = (isset($RedirectPage))		?	$RedirectPage : $_POST['p'];
		if(isset($_POST['name'])){
			$addThis = "&file=".$NEWPAGEID."**".$_POST['name']; 
		}else{
			$addThis="";
		}		
		if($page =="languages"){ $Err1 = $Err; $Err ="You MUST LOGOUT to see new language changes. ".$Err1; }
		header('location: template.php?p='.$page.'&Err='.$Err.'&d=1'.$addThis);
		exit();	
	}else{
		
		header('location: template.php?Err='.$Err.'&d=1');
		exit();
	}
}
}
############################################################
#################### FUNCTIONS #############################
function MetaTagStrip($in){

	$SAVETHIS = preg_replace('/\s\s+/', ' ', $in);
	$SAVETHIS = trim(strip_tags(str_replace('"',"",$SAVETHIS)));
	$SAVETHIS = str_replace("'"," ",$SAVETHIS);
	$out = str_replace('"'," ",$SAVETHIS);

	return $out;

}
function FileIcon($file){
	$type = substr($file, -3);
	switch($type){
	case "css": { return "<img src='inc/images/icons/filecss.gif'>"; } break;
	case "php": { return "<img src='inc/images/icons/filephp.gif'>";} break;
	case ".js": { return "<img src='inc/images/icons/filejs.gif'>";} break;
	default: { }
	}
}
function DisplayTemplatePages($showWhich, $meta=false,$pp=0){
	
	global $DB;
 	$path = FilterPath();
	$ext = array("php","css");
	$files = array();  
   
   if($showWhich ==0){
   
  	print "<a href='?p=wording&page=menu1'>Menu 1 (not logged in)</a><br>";
    print "<a href='?p=wording&page=menu2'>Menu 2 (logged in) </a><br>";
	print "<a href='?p=wording&page=menu3'>Menu 3 ( sub menu )</a><br>";
	print "<a href='?p=wording&page=menu4'>Menu 4 ( footer )</a><br>";
	
   }
   
   if($showWhich ==1){	
	

	  
	   $HandlePath =subd."inc/templates/".D_TEMP."/";
	   
	 if($handle1 = opendir($HandlePath)) {
      
	  	while(false !== ($file = readdir($handle1))){
           		for($i=0;$i<sizeof($ext);$i++){
               		if(strstr($file, ".".$ext[$i])){
					if($meta){
						if($file=="index.php"){
							$file = str_replace('.php','', $file);
							if($pp ==0){
								print "<option value='".$file."'>".$file."</option>";
							}
						}
					}else{							
if($file !="config.php"){
						print "<tr>";
						print "<td>".FileIcon($file)."</td>";	
						print "<td>".$file."</td>";
						print "<td>".date("F d Y H:i:s",filemtime("$HandlePath$file"))."</td>";
						print "<td><a href='#' onclick=\"ChangeEditFile('$file');\">".icon_edit.$GLOBALS['lang_admin_edit']."</a></td>";						 
						
						print "</tr>";
						 }
						
					}
					}
				}
		}
					
	}
			

}elseif($showWhich==2){

	$HandlePath =subd."inc/templates/layout/";
	   
	 if($handle1 = opendir($HandlePath)) {
      
	  	while(false !== ($file = readdir($handle1))){
           		for($i=0;$i<sizeof($ext);$i++){
               		if(strstr($file, ".".$ext[$i])){
					
						if($meta){
							$file = str_replace('.php','', $file);
							
							print "<option value='".$file."'>".$file."</option>";
							
						}else{

						 
						print "<tr>";
						print "<td>".FileIcon($file)."</td>";	
						print "<td>".$file."</td>";
						print "<td>".date("F d Y H:i:s",filemtime("$HandlePath$file"))."</td>";
						print "<td><a href='#' onclick=\"ChangeEditFile('/layout/$file');\">".icon_edit.$GLOBALS['lang_admin_edit']."</a></td>";						 
						
						print "</tr>";			 		
}

					}
				}
		}
					
	}
	
}elseif($showWhich==3){

    $result = $DB->Query("SELECT id, name, created FROM template_pages");
    while( $page = $DB->NextRow($result) )
    {
		if($meta){
			print "<option value='".$page['id']."**".$page['name']."'>".$page['name']."</option>";
			
		}else{
						print "<tr>";
						print "<td><a href='template.php?do=delp&id=".$page['id']."'><img src='inc/images/icons/no.png'></a></td>";	
						print "<td>".$page['name']."</td>";
						print "<td><img src='inc/images/16x16/search.png' align='absmiddle'><a href='".DB_DOMAIN."index.php?dll=".$page['name']."' target='_blank'>".DB_DOMAIN."index.php?dll=".$page['name']."</a></td>";
						print "<td><a href='#' onclick=\"ChangeEditFile('".$page['id']."**".$page['name']."');\">".icon_edit.$GLOBALS['lang_admin_edit']."</a></td>";						 
						
						print "</tr>";
}
	}

}elseif($showWhich==5){

	   $HandlePath =subd."inc/css/";
	   
	 if($handle1 = opendir($HandlePath)) {
      
	  	while(false !== ($file = readdir($handle1))){
           		for($i=0;$i<sizeof($ext);$i++){
               		if(strstr($file, ".".$ext[$i])){
								 
						print "<tr>";
						print "<td>".FileIcon($file)."</td>";	
						print "<td>".$file."</td>";
						print "<td>".date("F d Y H:i:s",filemtime("$HandlePath$file"))."</td>";
						print "<td><a href='#' onclick=\"ChangeEditFile('inc/css/$file');\">".icon_edit.$GLOBALS['lang_admin_edit']."</a></td>";						 
						
						print "</tr>";
					}
				}
		}
					
	}

}elseif($showWhich==6){

	   $HandlePath =subd."inc/";
	   
	 if($handle1 = opendir($HandlePath)) {
      
	  	while(false !== ($file = readdir($handle1))){
           		for($i=0;$i<sizeof($ext);$i++){
               		if(strstr($file, ".".$ext[$i]) && $file !="config_db.php"){
								
							//print "<img src='inc/images/menu_icons/";
							//if(date("Y-d-m",filemtime("$HandlePath$file")) == date("Y-d-m")){ print "p24.png"; }else{ print "p25.png"; }
							//print "'><a href='?p=edit&file=inc/$file&dd=1' title='Lasted Edited ".date("F d Y H:i:s",filemtime("$HandlePath$file"))."'> ".$file."</a><br>";						
							//print "<option value='inc/".$file."&dd=1'>".str_replace(".php"," Page",$file)."</option>";	
						print "<tr>";
						print "<td>".FileIcon($file)."</td>";	
						print "<td>".$file."</td>";
						print "<td>".date("F d Y H:i:s",filemtime("$HandlePath$file"))."</td>";
						print "<td><a href='#' onclick=\"ChangeEditFile('inc/$file');\">".icon_edit.$GLOBALS['lang_admin_edit']."</a></td>";						 
						
						print "</tr>";
					}
				}
		}
					
	}

}
}
function FilterPath(){
	$path=dirname(realpath($_SERVER['SCRIPT_FILENAME']));
	$path_parts = pathinfo($path);
	$path = str_replace("NEW", "", $path);
	$path = str_replace("newadmin", "", $path);
	return $path;
}

function DisplayTemplateFile($UpdateFile, $template, $dd=0){
		
		if($UpdateFile ==""){ $UpdateFile="header.php"; }
		$isCSS = substr($_REQUEST['file'], -3, 3);
			
		  
		 if( $dd ==1 ){

					$path = FilterPath();
					$filename = $path."/".$UpdateFile;
					$filename = str_replace("//","/",$filename);

					## Open the file for display
					if (!$file = fopen($filename, 'r')) {
						return "There was a problem opening this file for reading. CHMOD(0755 - $filename";
					}
					$data = array();
					$counter = 1;
					$buffer="";
						while (!feof($file)) {
							$buffer .= fgets($file);
						$counter++;	
						}
					fclose($file);
 

		}elseif(substr($_REQUEST['file'], 0, 7) == "inc/css"){
		  
					$path = FilterPath();
					$filename = $path."/".$UpdateFile;
					$filename = str_replace("//","/",$filename);

					## Open the file for display
					if (!$file = fopen($filename, 'r')) {
						return "There was a problem opening this file for reading. CHMOD(0755 - $filename";
					}
					$data = array();
					$counter = 1;
					$buffer="";
						while (!feof($file)) {
							$buffer .= fgets($file);
						$counter++;	
						}
					fclose($file);

		}elseif($UpdateFile == "index.php"){
		  
					$path = FilterPath();
					$filename = $path."/inc/templates/$template/".$UpdateFile;
					$filename = str_replace("//","/",$filename);

					## Open the file for display
					if (!$file = fopen($filename, 'r')) {
						return "There was a problem opening this file for reading. CHMOD(0755 - $filename";
					}
					$data = array();
					$counter = 1;
					$buffer="";
						while (!feof($file)) {
							$buffer .= fgets($file);
						$counter++;	
						}
					fclose($file);
		  
		  }elseif($UpdateFile == "header.php" || $UpdateFile == "footer.php" || $UpdateFile == "menu.php" || $isCSS =="css"){
		  
					$path = FilterPath();
					$filename = $path."/inc/templates/$template/".$UpdateFile;
					$filename = str_replace("//","/",$filename);

					## Open the file for display
					if (!$file = fopen($filename, 'r')) {
						return "There was a problem opening this file for reading. CHMOD(0755 - $filename";
					}
					$data = array();
					$counter = 1;
					$buffer="";
						while (!feof($file)) {
							$buffer .= fgets($file);
						$counter++;	
						}
					fclose($file);
			
		  }else{
		  
					$path = FilterPath();
					$filename = $path."/inc/templates/".$UpdateFile;
					$filename = str_replace("//","/",$filename);

					## Open the file for display
					if (!$file = fopen($filename, 'r')) {
						return "There was a problem opening this file for reading. CHMOD(0755 - $filename";
					}
					$data = array();
					$counter = 1;
					$buffer="";
						while (!feof($file)) {
							$buffer .= fgets($file);
						$counter++;	
						}
					fclose($file);
			
		  }	
		
		return htmlentities($buffer);
}
function displayETextArea($content=''){
	
	if(ADMIN_DEMO != "yes"){
	
		print "<textarea id='editor' name='editor' cols='70' rows='25' tabindex='1' style='height: 550px; width:95%; font-size:11px;'>".$content."</textarea>";
	
	}else{
	
		print "<textarea name='editor' cols='70' rows='25' tabindex='1' style='height: 550px; width:95%; font-size:11px;'>Disabled in demo mode</textarea>";
		
	}
	
}
function GetPageContent($page){

	global $DB;
	
    $result = $DB->Row("SELECT content FROM template_pages WHERE id='".$page."' LIMIT 1");

	return eMeetingOutput($result['content'],true);
}
function DisplayLangs($currentLang){

	   $currentLang = $currentLang.".php";
	   $path = FilterPath();
	   $ext = array("php");
	   $files = array();
	   $HandlePath =subd."/inc/langs/";
		$HandlePath = str_replace("//","/",$HandlePath);

	   $count=1;
	 if($handle1 = opendir($HandlePath)) {
      
	  	while(false !== ($file = readdir($handle1))){
           		for($i=0;$i<sizeof($ext);$i++){
               		if(strstr($file, ".".$ext[$i])){
					$flasg_icon = str_replace(".php","",$file);
						print "<tr>";
						print "<td><input name='d".$count."' type='checkbox' value='on'><input type=hidden value='".$file."' name=id".$count." class='hidden'></td>";	
						print "<td><img src='".subd."images/language/flag_".$flasg_icon.".gif' align='absmiddle'> ".$file."</td>";
						print "<td>".date("F d Y H:i:s",filemtime("$HandlePath$file"))."</td>";
						print "<td><a href='?p=editlanguage&file=".$file."'>".icon_edit.$GLOBALS['lang_admin_edit']."</a></td>";
						print "<td><input type='radio' name='newlang' value='$file'";
						if($currentLang == $file){ print" checked"; }
						print "></td>";
						
						print "</tr>";
						$count++;
					}
				}
		}
					
	}
	
	return $count;
}

function DisplayMenus($page="1"){
	
	$i=1;
	global $DB;

	//include("../inc/langs/english.php");
	include("../inc/langs/".D_LANG.".php");
	
	if($page==""){ $page="1"; }
		switch($page){
		
		
			case "1": { $ThisArray = $lang_main_menu; $ThisArrayName= "lang_main_menu";} break;
			case "2": { $ThisArray = $lang_main_menu_sub; $ThisArrayName= "lang_main_menu_sub";} break;
			case "3": { $ThisArray = $lang_main_footer; $ThisArrayName= "lang_main_footer";} break;
			
		}
	
	
	foreach($ThisArray as $key => $value){
		print '<tr>
			<td><input name="nkey'.$i.'" value="'.$key.'" type="text" class="mgrey" id="nkey'.$i.'"> =></td>
			<td><input name="name'.$i.'" type="text" value="'.$value.'" class="mgreen" id="name'.$i.'"> <a href="javascript:void(0);" onClick="ChangeMenuItem('.$i.');"><img src="inc/images/16x16/add.png"></a></td>
			<td><input name="order'.$i.'" type="hidden" value="'.$i.'"> Delete? <input name="d'.$i.'" type="checkbox" value="on"></td>
		  </tr>';
		  print '<input type="hidden" name="key'.$i.'" value="'.$key.'" class="hidden">';
		  $i++;
	 }
	 $i++;
	 		print '<tr>
			<td><input name="nkey'.$i.'" value="" type="text" class="mngrey"> =></td>
			<td><input name="name'.$i.'" type="text" value="" class="mngreen" id="name'.$i.'"></td>
			<td>Add New Menu</td>			
		  </tr>';
		  
	print '<input type="hidden" name="array_name" value="'.$ThisArrayName.'" class="hidden">';
	print '<input type="hidden" name="totalrows" value="'.$i.'" class="hidden">';
	
	
}

function DisplayLAnguageFile($UpdateFile){

		$path = FilterPath();
		$filename = $path."/inc/langs/".$UpdateFile;
$HandlePath = str_replace("//","/",$HandlePath);
		## Open the file for display
		if (!$file = fopen($filename, 'r')) {
			return "There was a problem opening this file for reading. CHMOD(0755 - $filename";
		}
		$data = array();
		$counter = 1;
		$buffer="";
			while (!feof($file)) {
				$buffer .= fgets($file);
			$counter++;	
			}
		fclose($file);
		
		##return htmlentities($buffer);
		return $buffer;
}

function DisplayLangFile(){

	 $path = FilterPath();
	 $ext = array("php");
	 $files = array();
	 $HandlePath =subd."/inc/langs/";
	 $HandlePath = str_replace("//","/",$HandlePath);

	 if($handle1 = opendir($HandlePath)) {
	 
	  while(false !== ($file = readdir($handle1))){
	 
	    for($i=0;$i<sizeof($ext);$i++){
              
			  if(strstr($file, ".".$ext[$i])){
			  
			  	print "<option value='$file'>$file</option>";
				
			  }
		}
	  }
	 
	 }
}

function DisplayFolderImages(){

	 $imglist='';
	  //$img_folder is the variable that holds the path to the banner images. Mine is images/tutorials/
	// see that you don't forget about the "/" at the end 

	 $img_folder = str_replace("uploads/images/","",PATH_IMAGE)."inc/templates/".D_TEMP."/images/";
	 $img_folder = str_replace("uploads/images/","",PATH_IMAGE)."inc/templates/".D_TEMP."/images/";
	$img_folder = str_replace("//","/",$img_folder);
	 
	 $img_folder_web = str_replace("uploads/images/","",WEB_PATH_IMAGE)."inc/templates/".D_TEMP."/images/";
	 $img_folder_web = str_replace("uploads/images/","",WEB_PATH_IMAGE)."inc/templates/".D_TEMP."/images/";
	$img_folder_web = str_replace("//","/",$img_folder_web);
	$img_folder_web = str_replace("http:/","http://",$img_folder_web);
 
	  mt_srand((double)microtime()*1000);
	
	  //use the directory class
	 $imgs = dir($img_folder);
	
	  //read all files from the  directory, checks if are images and ads them to a list (see below how to display flash banners)
	 while ($file = $imgs->read()) {
	   if (preg_match("/gif/i", $file) || preg_match("/jpg/i", $file) || preg_match("/png/i", $file))
		 if($file !="" && $file !="design.gif"){
		 $imglist .= "$file ";
		 }
	
	 } closedir($imgs->handle);
	
	  //put all images into an array
	 $imglist = explode(" ", $imglist);
	 $no = sizeof($imglist)-2;
	$count=1;
	
	foreach($imglist as $Value){		
		if($Value !=""){

    print "<tr>
      <td><a href='#' onClick=\"PreviewWin('".$img_folder_web.$Value."')\"><img src='".$img_folder_web.$Value."' style='width:60px; height:70px;'></a></td>
      <td><table width='100%'  border=0>
        <tr>
          <td class='b1'>File Name</td>
          <td><b>".$Value."</b></td>
        </tr>
        <tr>
          <td class='b1'>Last Modified</td>
          <td>".date("F d Y H:i:s",filemtime("$img_folder$file"))."</td>
        </tr>
        <tr>
          <td class='b1'>Change Image</td>
          <td><input name='file".$count."' type='file' class='input'><input type=hidden value='".$Value."' name=old_file".$count." class='hidden'></td>
        </tr>
      </table></td>
    </tr>";

		$count++;
		}
	}
	return $count;
}
function DisplayMeta($page){

	global $DB;
	
	$result = $DB->Row("SELECT * FROM template_meta WHERE page='".$page."' LIMIT 1");
	
	return $result;
}

function DisplayWording($page){

	global $DB;
	include("../inc/langs/".D_LANG.".php");
	$i=1;
	
	
	
	switch($page){
		
		
		case "menu1": { $ThisArray = $lang_main_menu; $ThisArrayName= "lang_main_menu";} break;
		case "menu2": { $ThisArray = $lang_main_menu_logged_in; $ThisArrayName= "lang_main_menu_logged_in";} break;
		case "menu3": { $ThisArray = $lang_main_sub; $ThisArrayName= "lang_main_sub";} break;
		case "menu4": { $ThisArray = $lang_main_footer; $ThisArrayName= "lang_main_footer";} break;
		
		case "index1": { $ThisArray = $$lang_index_page_extra; $ThisArrayName= "lang_index_page_extra";} break;
		case "index": { $ThisArray = $lang_index_page; $ThisArrayName= "lang_index_page";} break;
		case "tour": { $ThisArray = $lang_tour_page; $ThisArrayName= "lang_tour_page";} break;
		case "login": { $ThisArray = $lang_login_page; $ThisArrayName= "lang_login_page";} break;
		
		case "register": { $ThisArray = $lang_register_page; $ThisArrayName= "lang_register_page";} break;
		case "browse": { $ThisArray = $lang_browse_page; $ThisArrayName= "lang_browse_page";} break;
		case "search": { $ThisArray = $lang_search_page; $ThisArrayName= "lang_search_page";} break;
		case "faq": { $ThisArray = $lang_faq_page; $ThisArrayName= "lang_faq_page";} break;
		case "contact": { $ThisArray = $lang_login_page; $ThisArrayName= "lang_contact_page";} break;
		case "profile": { $ThisArray = $lang_profile_page; $ThisArrayName= "lang_profile_page";} break;
		case "overview": { $ThisArray = $lang_login_page; $ThisArrayName= "lang_overview_page";} break;
		case "account": { $ThisArray = $lang_account_page; $ThisArrayName= "lang_account_page";} break;
		case "messages": { $ThisArray = $lang_messages_page; $ThisArrayName= "lang_messages_page";} break;
		case "contact": { $ThisArray = $lang_contact_page; $ThisArrayName= "lang_contact_page";} break;

		case "network": { $ThisArray = $lang_network_page; $ThisArrayName= "lang_network_page";} break;
		case "gallery": { $ThisArray = $lang_gallery_page; $ThisArrayName= "lang_gallery_page";} break;
		case "settings": { $ThisArray = $lang_settings_page; $ThisArrayName= "lang_settings_page";} break;

		case "matches": { $ThisArray = $lang_match_page; $ThisArrayName= "lang_match_page";} break;
		case "subscribe": { $ThisArray = $lang_order_page; $ThisArrayName= "lang_order_page";} break;
		case "forum": { $ThisArray = $lang_forum_page; $ThisArrayName= "lang_forum_page";} break;		


		case "affiliate": { $ThisArray = $lang_affiliate_page; $ThisArrayName= "lang_affiliate_page";} break;
		case "articles": { $ThisArray = $lang_articles_page; $ThisArrayName= "lang_articles_page";} break;
		case "groups": { $ThisArray = $lang_groups_page; $ThisArrayName= "lang_groups_page";} break;	

		case "calendar": { $ThisArray = $lang_caledar_page; $ThisArrayName= "lang_caledar_page";} break;

		default: { $ThisArray = $lang_main_menu;  $ThisArrayName= "lang_main_menu"; } break ;
		
	};
	
	
	
	
	
	
	
	foreach($ThisArray as $key => $value){
		
		if(strlen($value) > 100){
			print '<li><textarea name="val'.$i.'" style="height:60px;width:400px;">'.trim($value).'</textarea></li>';
		}else{
			print '<li><input name="val'.$i.'" type="text" size="40" value="'.trim($value).'" style="width:480px;"><div class="tip">'.trim($value).'</div></li>';
		}
		print '<input type="hidden" name="key'.$i.'" value="'.$key.'" class="hidden">';
		$i++;
	}
	print '<input type="hidden" name="array_name" value="'.$ThisArrayName.'" class="hidden">';
	return $i;
}


function FindTemplates(){

	$count=1;
	$ext = array("tar","zip");
	$files = array();
	$dir =  TEMPLATE_PATH_TARS;	

// Open a known directory, and proceed to read its contents
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
				for($i=0;$i<sizeof($ext);$i++){
					if(strstr($file, ".".$ext[$i])){

						print "<tr>
							<td><input name='d".$count."' type='checkbox' value='on'><input type=hidden value='".$file."' name=id".$count." class='hidden'></td>			
							<td>".$file."</td>
							<td></td>
						</tr>";
						$count++;

					}
				}}
		
				closedir($dh);
			}
		}else{
			print "Directory not set";
		}

	
	return $count;
}

function DisplayTerms(){

	global $DB;

    $result = $DB->Row("SELECT value2 FROM system_settings  WHERE id=5");
	return $result;
}


// V9 EDITED
function GetSQLPageContent($page){

	global $DB;
	
    $result = $DB->Row("SELECT content FROM template_pages WHERE id='".$page."' LIMIT 1");

	return eMeetingOutput($result['content'],true);
}
function StripCR ($str)
{
$str = str_replace(chr(13),'',$str);
$str = str_replace(chr(10),'',$str);
return $str;
}
############################################################
#################### TEMPLATE   ############################
print $tdata[1]["contents"];
if($LoadAdminPlugin ==0){

		require_once "inc/temp/template.php";

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