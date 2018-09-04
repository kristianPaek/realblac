<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function ChangeDo($DoCall, $values = false, $Files = false){

	global $DB;

	$DoArray = array('edit','addpost','editpost', 'design'); // list of acceptable calls

	if(in_array($DoCall, $DoArray)){
	
		switch($DoCall){
		

			case "design":{		

			if(isset($values['reset'])){
			
				$DB->Update("UPDATE `members_template` SET `font1` = 'Andale Mono',
				`font2` = 'Andale Mono',
				`background` = '',
				`background_image` = '',
				`background_image_display` = '',
				`inner_background` = '',
				`header_text` = '',
				`header_background` = '',
				`header_image` = '',
				`header_image_display` = '',
				`subheader_title` = '',
				`subheader_background` = '',
				`color_text` = '',
				`color_link` = '' WHERE `uid` = ('".$_SESSION['uid']."') LIMIT 1");
				
				return $GLOBALS['_LANG_ERROR']['_complete']."**1";

			}
	
			## clean the members input
			$values = array_map('eMeetingInput',$values);

			## update the CSS file
			if(isset($values['ThemeCss'])){
					
						$DB->Update("UPDATE `members_template` SET 	`css_file` = '".$values['ThemeCss']."'	WHERE `uid` = ('".$_SESSION['uid']."') LIMIT 1");
					
					}else{
					
						## remove the back images if selected
						if(isset($values['bremove']) && $values['bremove'] =='1'){
							@unlink(PATH_FILES."theme_bg_".$_SESSION['uid'].".jpg");	$background_image_name ="1";
						}
						if(isset($values['hremove']) && $values['hremove'] == '1'){
							@unlink(PATH_FILES."theme_header_".$_SESSION['uid'].".jpg");$header_image_name ="1";
						}

						## upload new background image
						$background_image_name="";
						if(isset($Files['b2']['tmp_name']) && strlen($Files['b2']['tmp_name']) > 10){
									

							## validate file
							$CanContinue = PhotoPathsCheck(PATH_FILES);
							$CanContinue = PhotoValidation($Files['b2']);
							if($CanContinue !='1'){
									return $CanContinue;
							}	
							
							## save image to files directory
							$copy = copy($Files['b2']['tmp_name'], PATH_FILES.$Files['b2']['name']);
							
							if($copy){
									
									$img_array= explode('.', $Files['b2']['name'],2);
									@unlink(PATH_FILES."theme_bg_".$_SESSION['uid'].".".strtolower($img_array[1]));
									if(rename_win(PATH_FILES.$Files['b2']['name'], PATH_FILES."theme_bg_".$_SESSION['uid'].".".strtolower($img_array[1])) == FALSE){
									
											$background_image_name = $Files['b2']['name'];
									
									}else{
									
											$background_image_name = "theme_bg_".$_SESSION['uid'].".".strtolower($img_array[1]);
									}

							}
									
						}

						
						## upload new header image
						$header_image_name="";

						if(isset($Files['h2']['tmp_name']) && strlen($Files['h2']['tmp_name']) > 10){


							## validate file
							$CanContinue = PhotoPathsCheck(PATH_FILES);
							$CanContinue = PhotoValidation($Files['h2']);
							if($CanContinue !='1'){
									return $CanContinue;
							}	
									
							## copy image to files directory							
							$copy = copy($Files['h2']['tmp_name'], PATH_FILES.$Files['h2']['name']);
							
							if($copy){
									
											$img_array= explode('.', $Files['h2']['name'],2);
											@unlink(PATH_FILES."theme_header_".$_SESSION['uid'].".".strtolower($img_array[1]));
											if(rename_win(PATH_FILES.$Files['h2']['name'], PATH_FILES."theme_header_".$_SESSION['uid'].".".strtolower($img_array[1])) == FALSE){
									
												$header_image_name = $Files['h2']['name'];
									
											}else{
									
												$header_image_name = "theme_header_".$_SESSION['uid'].".".strtolower($img_array[1]);
											}
							 }
									
							}

							## create SQL query
							 $UpDateString = 'UPDATE `members_template` SET 
									`updated` = "'.DATE_NOW.'",
									`font1` = "'.$values['f1'].'",
									`font2` = "'.$values['f2'].'",
									`background` = "'.$values['b1'].'",';
									 if($background_image_name !=""){$UpDateString .='`background_image` = "'.$background_image_name.'",';}
									if(isset($values['bremove']) && $values['bremove'] == '1'){ $UpDateString .="`background_image` ='',"; }
									 $UpDateString .='
									`background_image_display` = "'.$values['b3'].'",
									`inner_background` ="'.$values['i2'].'",
									`header_text` ="'.$values['h0'].'",';

									 if($header_image_name !=""){ $UpDateString .='`header_image` ="'.$header_image_name.'",'; }
									if(isset($values['hremove']) && $values['hremove'] == '1'){ $UpDateString .='`header_image` ="",'; }

									 $UpDateString .='
									`header_background` ="'.$values['h1'].'",
									`header_image_display` ="'.$values['h3'].'",
									`subheader_title` ="'.$values['s1'].'",
									`subheader_background` ="'.$values['s2'].'",
									`color_text` = "'.$values['t1'].'",
									`color_link` = "'.$values['t2'].'"
									WHERE `uid` = ("'.$_SESSION['uid'].'") LIMIT 1';

					$DB->Update($UpDateString);

					## if the record wasnt saved, create one!
					if ($DB->Affected() == 0){
					
							$FoundValue = $DB->Row("SELECT uid FROM members_template WHERE `uid` = ('".$_SESSION['uid']."') LIMIT 1");
							if(!isset($FoundValue['uid'])){
							$DB->Insert('INSERT INTO `members_template` (
							`uid` ,
							`updated` ,
							`font1` ,
							`font2` ,
							`background` ,
							`background_image` ,
							`background_image_display` ,
							`inner_background` ,
							`header_text` ,
							`header_background` ,
							`header_image` ,
							`header_image_display` ,
							`subheader_title` ,
							`subheader_background` ,
							`color_text` ,
							`color_link` 
							)
							VALUES ("'.$_SESSION['uid'].'", "'.DATE_NOW.'", "'.$values['f1'].'", "'.$values['f2'].'", "'.$values['b1'].'", "'.$background_image_name.'", "'.$values['b3'].'", "'.$values['i2'].'", "'.$values['h0'].'", "'.$values['h1'].'", "'.$header_image_name.'", "'.$values['h3'].'", "'.$values['s1'].'", "'.$values['s2'].'", "'.$values['t1'].'", "'.$values['t2'].'")');
							}
					}



					}

			 ## update sessions for displaying my colours throughout the website
			  if($values['h1'] != ""){  $_SESSION['color_background'] 	= $values['h1']; }else{ $_SESSION['color_background'] 	= "#FFFFFF";}
			  if($values['h0'] != ""){  $_SESSION['color_text'] 		= $values['h0']; }else{ $_SESSION['color_text'] 	= "#333333";}

			 ## add system log
			 AddEventSystemLog(eMeetingInput($_SESSION['username']),"updated", "profile", "design", 0,0,0);

			 return $GLOBALS['_LANG_ERROR']['_complete']."**1";


			} break;





			 /**
			 * Info: Edit Profile Function
			 * 		
			 * @version  9.0
			 * @created  Fri Sep 25 10:48:31 EEST 2008
			 * @updated  Fri Sep 25 10:48:31 EEST 2008
			 */

			case "edit": {
  
					## Define Variables
					$BuiltArray="";	$RunExtra="";$SQLStringExtra ="";		
			
					## retrieve censor words for filter
					$BadWords = CreateBadWordFilter();
					
					## create a counter for the number of fields we have completed
					$CompleteFields =($values['TotalNumberOfRows']-1);

					$mycount = 0;	
					$myentered = 0;	
			 
					## loop through all the entered field data
					for($i = 1; $i < $values['TotalNumberOfRows']; $i++) {  if(isset($values['FieldType'.$i]) ){
 
						$mycount = $mycount +1;

						// RESTORE GENDER ID
						if($values['FieldName'.$i] == "gender" && $values['eid'] == $_SESSION['uid']){
	 
						$_SESSION['genderid'] = $values['FieldValue'.$i];

						}

						## clean our data		
						if(isset($values['FieldValue'.$i])){
							$values['FieldValue'.$i] = eMeetingInput(filter_str($values['FieldValue'.$i],$BadWords));

							if (($values['FieldValue'.$i]) != "" && $values['FieldType'.$i] !=3 && $values['FieldType'.$i] !=7) {
							  $myentered = $myentered +1;
							}
							elseif (($values['FieldValue'.$i]) != 0 && $values['FieldType'.$i] =3) {
							  $myentered = $myentered +1;
							}
						}


						if($values['FieldType'.$i] == 7){
							if(isset($values['FieldValue'.$i.'a'])){
						 		$myentered = $myentered +1;
							}
						}						



						## create blank value incase user hasnt create a value via the admin
						if(!isset($values['FieldValue'.$i])){$values['FieldValue'.$i]="";}

						$myname = $values['FieldName'.$i];
						$mytype = $values['FieldType'.$i];
						$myvalue = $values['FieldValue'.$i];
						//print "i$i $mycount $myentered $CompleteFields $mytype $myname $myvalue <br>";



						## dont create counter for the checkboxes within a multiple checkbox list
						if($values['FieldValue'.$i] =="" && $values['FieldType'.$i] !=4 && $values['FieldType'.$i] !=5){
								$CompleteFields--;
						}

						## 5 = multiple checkbox data
						if($values['FieldType'.$i] ==5){		
									 
							$x=0;												
							while(isset($values['FieldMulti'.$x.$i])){
	
									// MAKE SAVE
									if($values['Multi'.$x.$i] == 1){
										$BuiltArray .="1**";
									}else{
										$BuiltArray .="0**";
									}
	
							$x++;  
							 
							}
 
							$RunExtra .= ", ".$values['FieldName'.$i] ."='".$BuiltArray."'";								
							$BuiltArray="";
						}				

						## if its not a checkout then do this
						if($values['FieldType'.$i] !=5){
							
							## AGE CAANOT BE LESS THAN 18 AND OCER 110
							if($values['FieldName'.$i] == "age" && $values['FieldType'.$i] != 7){

								$MyAgeIs = MakeAge($values['FieldValue'.$i]);
								
								if( $MyAgeIs < 16 || $MyAgeIs > 110){

										$RunExtra.= ", ".$values['FieldName'.$i] ."='1950-01-01'";

								}else{
								
									$RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";
								
								}
								
						## if the data is a text box
						}elseif($values['FieldType'.$i] == 2){

							## this data is stored from the html editor
							$RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

						## AGE FIELD
						}elseif($values['FieldType'.$i] == 7){
 
						$RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i.'a']."-".$values['FieldValue'.$i.'b']."-".$values['FieldValue'.$i.'c']."'";
						
						 
						
						## finally just filter text from select boxes and input fields
						}else{

								$RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

						}

					}	
														
				} }
 
				## now lets work out if they have completed all their profile
				//$percent = floor(($CompleteFields / ($values['TotalNumberOfRows']-1))* 100);
				$percent = floor(($myentered / $mycount)* 100);


				#set the profile for admin approval				
				if(APPROVE_ACCOUNTS =="yes" && !isset($_SESSION['site_moderator_edit'])){

						$SQLStringExtra =", active='unapproved' ";
				}

				## update members tables
				$FoundEditTemp = $DB->Row("SELECT id FROM members_edit_temp WHERE `id` = ('".$_SESSION['uid']."') LIMIT 1");
				if(!isset($FoundEditTemp['id'])){
					$DB->Insert("INSERT INTO members_edit_temp SELECT * FROM members WHERE id= ( '".$values['eid']."' ) LIMIT 1");
					$DB->Insert("INSERT INTO members_data_edit_temp SELECT * FROM members_data WHERE uid = ( '".$values['eid']."' ) LIMIT 1");
				}
				$DB->Update("UPDATE members_edit_temp SET profile_complete='$percent', updated='".DATE_TIME."' ".$SQLStringExtra." WHERE id= ( '".$values['eid']."' ) LIMIT 1");
				$DB->Update("UPDATE members_data_edit_temp SET uid= ( '".$values['eid']."' ) ".$RunExtra."  WHERE uid = ( '".$values['eid']."' ) LIMIT 1");				
				
 
				## add system log
				AddEventSystemLog(eMeetingInput($_SESSION['username']),"updated", "profile", "details", 0,0,0);
				
				## email admin alter
				CheckAdminEmail("account","account", $values, "-**1");

				## return message
				if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes" && $values['eid'] != $_SESSION['uid'] ){ 
				 
					return $values['eid'];

				}else{

					
					
					return $GLOBALS['_LANG_ERROR']['_complete']."**1";

				}
																			
			} break;
			
					
		}
	
	}
	
	return "error_invalid_call";	
}
?>