<?php

 

// no direct access

defined( 'KEY_ID' ) or die( 'Restricted access' );





function DisplayMatchSettings(){

		

	global $DB;

	$Counter =1;

	$DataArray = array();

		

	$MData = $DB->Row("SELECT match_array FROM members_privacy WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");	

	$get_myarray = unserialize($MData['match_array']);

	

	if($get_myarray !="" && is_array($get_myarray)){

	

			foreach($get_myarray as $Match){



				$MA2 = $DB->Row("SELECT caption FROM field_caption, field WHERE field_caption.cid = field.fid AND fname = '". $Match['name'] ."' AND lang='".D_LANG."' AND `match` = 'yes' ORDER BY caption LIMIT 1");		
				$DataArray[$Counter]['caption'] = $MA2['caption'];

			

				// $DataArray[$Counter]['caption'] = eMeetingOutput($Match['caption']);

				

				if(is_numeric($Match['value'])){

			

					$MA = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid = '". $Match['value'] ."' AND lang='".D_LANG."' ORDER BY fvOrder LIMIT 1");		

					$DataArray[$Counter]['value'] = $MA['fvCaption'];

				

				}else{

					$DataArray[$Counter]['value'] =$Match['value'];

				}

				$DataArray[$Counter]['caption'] = $MA2['caption'];


				$Counter++;	

			}	

			return $DataArray;

	}else{

		return "";

	}



}



function GetPrivacy($id){



	global $DB;

	

	$result = $DB->Row("SELECT * FROM members_privacy, members WHERE members.id = members_privacy.uid AND members.id='".$id."' LIMIT 1");



	$result['skype'] = eMeetingOutput($result['skype']);



	return $result;



}

function GetEmail($id){



	global $DB;

	

	$result = $DB->Row("SELECT email FROM members WHERE id='".eMeetingInput($id)."' LIMIT 1");

	

	return $result['email'];



}

function cancel(){



	global $DB;

	

	$result = $DB->Row("SELECT active FROM members WHERE id='".$_SESSION['uid']."' LIMIT 1");

	

	if($result['active'] == "cancel"){

		return "checked";

	}

}

function DisplayExtraFields(){

	

	/*

		THIS FUNCTION WILL DISPLAY THE EXTRA PROFILE FIELDS

		AS CREATED IN THE ADMIN AREA

	*/

	

	global $DB;

	$NumFields = 1;

	$counter=1;





	$result1 = $DB->Query("SELECT field_groups.id, field_groups.caption FROM field_groups 

	INNER JOIN field ON ( field.groupid = field_groups.id )

	WHERE field_groups.private !=1 AND field.matchpage='yes' GROUP BY field_groups.id ORDER BY field_groups.forder ASC");



    while( $group_find = $DB->NextRow($result1) )

    {



    $result = $DB->Query("SELECT fid,fType,fName FROM field WHERE matchpage='yes' AND groupid='".$group_find['id']."' ORDER BY fOrder ASC");

				   

    while( $groups = $DB->NextRow($result) )

    {	

			$Caption = $DB->Row("SELECT caption FROM field_caption WHERE lang='".D_LANG."' AND Cid= ( '".$groups['fid']."' ) AND `match`='yes'");				

					

			## Display Field Data

			print '<li><label for="'.$groups['fName'].'" class="required">'.$Caption['caption'].": </label>";



				if($groups['fType'] == 1){

									

									// DOB ADDITIONAL CODE

							if($groups['fName'] =="age"){

								print "<br>";
								print DoAge(2);

									

							}else{






	$Val =""; 
	$MData = $DB->Row("SELECT match_array FROM members_privacy WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");	
	$get_myarray = unserialize($MData['match_array']);


	if($get_myarray !="" && is_array($get_myarray)){
		foreach($get_myarray as $Match){

			$Match['caption'] = str_replace("'", "", $Match['caption']);
			$Caption['caption'] = str_replace("'", "", $Caption['caption']);

			if ($Match['caption'] == $Caption['caption']) {
				$Val =$Match['value']; 
			}
		}	
	}


										

								print "<input name='FieldValue".$groups['fid']."' type='text'  value='".$Val."'>";

							}


					}elseif($groups['fType'] == 7){

								print "<br>";						
								print DoAge(2);

	

					}elseif($groups['fType'] == 4){

						

							if($Val ==1){ $Val ="checked"; }else{ $Val ="";  }

							print "<input type='checkbox' name='FieldValue".$groups['fid']."' value='1' ".$Val." class='radio' >";

							

					}elseif($groups['fType'] == 2){

						

							print "<textarea name='FieldValue".$groups['fid']."' rows='3' cols='23' > ".$Val."</textarea>";

							

					}elseif($groups['fType'] == 3){





					// check if there is a field linked to this one

					$Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$groups['fid']." limit 1");						



					if(!empty($Linked)){

					$LinkedCode ="onChange='eMeetingLinkedField(this.value, ".$Linked['fid'].",0);'";

					}else{ $LinkedCode =""; }



									/* This is a list box */

								$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

			

										print "<div id='Link".$groups['fid']."'><select name='FieldValue".$groups['fid']."' ".$LinkedCode.">

										<option value=''>------------</option>

										";

											$tfO =1;

											while( $ListValue = $DB->NextRow($result2) )  

											{ 	








	$Selecteed =""; 
	$MData = $DB->Row("SELECT match_array FROM members_privacy WHERE uid= ( '".$_SESSION['uid']."' ) LIMIT 1");	
	$get_myarray = unserialize($MData['match_array']);


	if($get_myarray !="" && is_array($get_myarray)){
		foreach($get_myarray as $Match){

			$Match['caption'] = str_replace("'", "", $Match['caption']);
			$Caption['caption'] = str_replace("'", "", $Caption['caption']);

			if ($Match['caption'] == $Caption['caption']) {
				if ($ListValue['fvid'] == $Match['value']) {
					$Selecteed ="selected"; 
				}
			}
		}	
	}















		
		//if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }

												print "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";

												$tfO++;

											}	

											// BACKUP INCASE NOT VALUES FOUND

										if($tfO ==1){

											$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='english' Order by fvOrder");

											while( $ListValue = $DB->NextRow($result2) )  

											{ 			

												if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }

												print "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";

											}

										}

											

										print  "</select></div>";

										

				}elseif($groups['fType'] == 5){

						

										

										$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

										print '<table width="100%" border="0" cellspacing="0" cellpadding="0">';

										while( $ListValue = $DB->NextRow($result2) )  

										{ 

											

											if(isset($_POST['FieldValue'.$groups['fid']])){ $Val = $_POST['FieldValue'.$groups['fid']]; }else{ $Val = ""; }

											if($Val ==1){ $Val ="checked"; }else{ $Val ="";  }	

											

											print ' <tr> <td width="25%" height="20px">';	

											print "<input type='checkbox' name='FieldValue".$groups['fid']."' value='1' class=radio $Val>";								

											

											print "<input type='hidden' class='hidden' name='FieldName".$groups['fid']."' value='".$groups['fName']."'>";

											print "<input type='hidden' class='hidden' name='FieldType".$groups['fid']."' value='".$groups['fType']."'>";					

											print '</td><td width="75%">'.$ListValue['fvCaption'].'</td></tr>';

											print "<input type='hidden' class='hidden' name='FieldCap".$groups['fid']."' value='".$Caption['caption']."'>";

											$NumFields++;								

										}

										print '</table>';

						

				}

				

				if($groups['fType'] != 5){

							print "<input type='hidden' class='hidden' name='FieldName".$groups['fid']."' value='".$groups['fName']."'>";

							print "<input type='hidden' class='hidden' name='FieldType".$groups['fid']."' value='".$groups['fType']."'>";

							print "<input type='hidden' class='hidden' name='FieldCap".$groups['fid']."' value='".str_replace("'","",$Caption['caption'])."'>";

							$NumFields++;

				}

			// save caption and validid			

			print '</li>';

			

	$counter++;			

	$NumFields++;	

	}

}

		

	print "<input name='TotalNumberOfRows' type='hidden' value='1000' class='hidden'>";

}

?>