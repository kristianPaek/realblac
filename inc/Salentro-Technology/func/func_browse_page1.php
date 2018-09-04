<?php

function DisplayBrowse(){



	global $DB;

	$NumFields = 1;

	$ReturnString ="";

	$FullCounter=1;


	if (isset($_SESSION['site_moderator']) && $_SESSION['site_moderator']=="yes"){
		$extra="field_groups.private !=1 "; 
	} else {
		$extra="field_groups.private !=1 && field_groups.private !=2 ";
	}


	$result1 = $DB->Query("SELECT field_groups.id, field_groups.caption FROM field_groups 

	INNER JOIN field ON ( field.groupid = field_groups.id )

	WHERE $extra AND field.browsepage='yes' GROUP BY field_groups.id ORDER BY field_groups.forder ASC");



    while( $group_find = $DB->NextRow($result1) )

    {

	





	$ReturnString .= '<li class="top"><a href="#" onclick="toggleLayer(\'bod_'.$group_find['id'].'\'); return false;"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/add.png" align="absmiddle"> '.$group_find['caption'].'</a></li>';

	$ReturnString .= '<span id="bod_'.$group_find['id'].'" style="display:block;">';

	

    $result = $DB->Query("SELECT fid,fType,fName,linked_id FROM field WHERE browsepage='yes'  AND fType !=2 AND groupid='".$group_find['id']."' ORDER BY fOrder ASC");



    while( $groups = $DB->NextRow($result) )

    {

			

			////////////////////////////

			// STOP NULL CAPTION VALUES

			/////////////////////////////

			if(D_LANG !="english"){

					// check see if there is a caption

					$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$groups['fid']." AND lang='".D_LANG."' AND `match`='yes' limit 1");

						

						if(empty($Caption)){

							// no caption found, load english caption

							$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$groups['fid']." AND `match`='yes' limit 1");

						}

						

					}else{

						

						$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$groups['fid']." AND lang='".D_LANG."' AND `match`='yes' limit 1");

			}

			////////////////////////////

			/////////////////////////////

			

			$ReturnString .= '<li><img src="'.DB_DOMAIN.'images/DEFAULT/_icons/16/bullet_go.png" align="absmiddle"> <b style="font-size:11px;">'.$Caption['caption']."</b> <br>";

			$ReturnString .= '<span id="bodInner_'.$FullCounter.'">';



			if($groups['fType'] == 1){		

						

					if($groups['fName'] =="age"){

					 

					$ReturnString .= DoAge();

					

					}else{

				

						$ReturnString .= "<input name='SeV[".$NumFields."]' type='text' maxlength='255'  style='width:185px'>";

					}



			}elseif($groups['fType'] == 2){

			

					$ReturnString .= "<input name='SeV[".$NumFields."]' type='text' maxlength='255' style='width:185px'>";



			## age field

			}elseif($groups['fType'] == 7){



				$ReturnString .= DoAge();


		  }elseif($groups['fType'] == 5){ //multiple check boxes
		  	
				// check if there is a field linked to this one
				$Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$groups['fid']." limit 1");						

				$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

				$ReturnString .= "<div id='Link".$groups['fid']."'>";							
				$totalMultipleChoices = $totalMultipleChoices + $groups['fid'];
				
				$tfO =1;
				$c=0;
				$ro = 1;
				$ReturnString .= "<table width='100%'>";
				$ReturnString .= "<tr>";

				while( $ListValue = $DB->NextRow($result2) )  
				{ 			
					if($ListValue['default'] =="yes"){ $Checked ="checked=\"checked\""; }else{$Checked ="";  }
					$ReturnString .= "<td width='25%'>";
				  	$ReturnString .= "<input type='checkbox' name='Multi".$c."".$groups['fid']."' value='1' ".$Checked." />".$ListValue['fvCaption']."<br />";								

					$ReturnString .= "<input type='hidden' class='hidden' name='FieldValue".$groups['fid']."' value='".$groups['fName']."'>";
					$ReturnString .= "<input type='hidden' class='hidden' name='FieldName".$groups['fid']."' value='".$groups['fName']."'>";
					$ReturnString .= "<input type='hidden' class='hidden' name='FieldType".$groups['fid']."' value='".$groups['fType']."'>";					
					$ReturnString .= "<input type='hidden' class='hidden' name='FieldMulti".$c.$groups['fid']."' value='".$c."'>";					  

				  	$ReturnString .= "</td>";	
				  												
					if($ro >= 4)
					{
						$ReturnString .= "</tr>";
						$ReturnString .= "<tr>";
						$ro = 0;
					}


				    $c++;
					$tfO++;
					$ro++;
				}
				$ReturnString .= "</tr>";
				$ReturnString .= "</table>";
				
				// BACKUP INCASE NOT VALUES FOUND
				if($tfO ==1){
					$result2 = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='english' Order by fvOrder");
					while( $ListValue = $DB->NextRow($result2) )  
					{ 			
						$ReturnString .= "<input type='checkbox' name='CeK".$NumFields."[]' value='".$ListValue['fvid']."' />".$ListValue['fvCaption']."<br />";					
						$tfO++;
					}
				}							
				$ReturnString .= "</div>";		  	
				$ReturnString .= "<input type='hidden' name='CeK[".$NumFields."]' value='".$groups['fid']."' class='hidden'>";



			}elseif($groups['fType'] == 3){/* This is a list box */

						

					// check if there is a field linked to this one

					$Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$groups['fid']." limit 1");						



					if(!empty($Linked)){



			// increment value for field box directly under

$NumFields++;

					$LinkedCode ="onChange='eMeetingLinkedField(this.value, ".$Linked['fid'].",10000".$NumFields.");'";

$NumFields--;

					}else{ $LinkedCode =""; }



					$result2 = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");



							$ReturnString .= "<div id='Link".$groups['fid']."'><select name='SeV[".$NumFields."]' style='width:185px; overflow: hidden' ".$LinkedCode.">";							

							$ReturnString .= "<option value='0' selected>------</option>";

							$tfO =1;

							while( $ListValue = $DB->NextRow($result2) )  

							{ 			

								if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }

								$ReturnString .= "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";					

								$tfO++;

							}

							

							// BACKUP INCASE NOT VALUES FOUND

							if($tfO ==1){

								$result2 = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='english' Order by fvOrder");

								while( $ListValue = $DB->NextRow($result2) )  

								{ 			

									if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }

									$ReturnString .= "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";					

									$tfO++;

								}

							}							

								

							$ReturnString .= "</select></div>";

			

			}

			

			

			$ReturnString .= "<input type='hidden' name='SeT[".$NumFields."]' value='".$groups['fType']."' class='hidden'>";			

			$ReturnString .= "<input type='hidden' name='SeN[".$NumFields."]' value='".$groups['fName']."' class='hidden'>";

			

			//if(isset($Caption['description']) && $Caption['description'] != ""){$ReturnString .= '<div class="tip">'.$Caption['description'].'</div>';	}



			$ReturnString .= "</span>";

			$FullCounter++;

			

	$NumFields++;	

	}

		$ReturnString .= "</span>";

		$ReturnString .= "</li>";

		$ReturnString .= '<div class="ClearAll"></div>';

	}

	$ReturnString .= "<input name='TotalNumberOfRows' type='hidden' value='$NumFields' class='hidden'>";

	return $ReturnString;

}



?>