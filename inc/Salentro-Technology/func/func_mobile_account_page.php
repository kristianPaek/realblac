<?php 



// no direct access

defined( 'KEY_ID' ) or die( 'Restricted access' );





/**

* Info: Display profile data for edit

* 		

* @version  9.0

* @created  Fri Sep 25 10:48:31 EEST 2008

* @updated  Fri Sep 25 10:48:31 EEST 2008

*/





function EditMember($id){



	global $DB;



	## define variables

	$NumFields = 1;	$divCount =1; $divString=""; $ReturnString=""; $HideBox=1;



	## assign value for gender ID if not assigned

	if(!isset($_SESSION['genderid'])){ $_SESSION['genderid']=0; }



	## TOTAL GROUPS

	$Total = $DB->Row("SELECT count(id) AS total FROM field_groups WHERE ( private = 0 || private = 2 || private = ".strip_tags($_SESSION['genderid']).")");



	## search for all fields for this member

	$result = $DB->Query("SELECT id, caption FROM field_groups WHERE ( private = 0 || private = 2 || private = ".strip_tags($_SESSION['genderid']).") ORDER BY forder ASC");

 

    while( $groups = $DB->NextRow($result) ){



		if($HideBox > 1){ $tT = "style='display:none'"; }else{ $tT = "style='display:visible'"; }



		## start output display

		$ReturnString .= '<div id="bod_'.$HideBox.'"  '.$tT.'>';



		$ReturnString .= '<div class="menu_box_title1"><span><a onclick="new Effect.toggle(\'bod_'.$groups['id'].'\',\'blind\', {queue: \'end\'}); "> <img src="'.DB_DOMAIN.'images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,\'bod_'.$groups['id'].'\')" class="menu_expand"></a></span>

		'.$groups['caption'].'</div><div class="CapBody">';

		

		## select group fields

		$SQL = "SELECT field.fid,field.fType, field.fName,field.linked_id FROM field 

		INNER JOIN field_groups ON ( ( field_groups.id = field.groupid  || field_groups.id = field.groupid_1 || field_groups.id = field.groupid_2 )  )

		WHERE ( field.groupid = '".$groups['id']."' OR field.groupid_1 = '".$groups['id']."' OR field.groupid_2 = '".$groups['id']."')

		GROUP BY field.fid ORDER BY field.fOrder ASC";

	

		$result1 = $DB->Query($SQL);



		while( $field = $DB->NextRow($result1) ){

					

			## determin field caption based on language

			if(D_LANG !="english"){



				## check see if there is a caption

				$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' AND lang= ( '".D_LANG."' ) limit 1");						

				if(empty($Caption)){

					## no caption found, load english caption

					$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' limit 1");

				}

						

			}else{

				## check for english value						

				$Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' AND lang='".D_LANG."' limit 1");

			}



			## select data value

			$Value = $DB->Row("SELECT ".$field['fName']." FROM members_data WHERE  uid= ('".$id."') limit 1");



			## build output

			$ReturnString .= '<li><label>'.$Caption['caption'].'</label>';					

					

			## clean the value for output

			if($field['fType'] == 2){ $Value[$field['fName']] = eMeetingOutput($Value[$field['fName']],true); }else{ $Value[$field['fName']] = eMeetingOutput($Value[$field['fName']]); }



			## choose our field type, 1 = input box

			if($field['fType'] == 1){	



				if($field['fName'] =="age"){



								if($Value[$field['fName']] == ""){ $Value[$field['fName']]="0000-00-00"; }								

								$ReturnString .= MakeAge($Value[$field['fName']])." ".$GLOBALS['_LANG']['_yold']." <script>DateInput('FieldValue".$field['fid']."', true, 'YYYY-MON-DD','".$Value[$field['fName']]."')</script>";



							}else{



								$ReturnString .= "<input name='FieldValue".$field['fid']."' class='input' type='text' maxlength='255' size='42' style='width:270px'  value=\"".$Value[$field['fName']]."\">";



							}					





					## checkbox input

					}elseif($field['fType'] == 4){



							if($Value[$field['fName']] ==1){ $ex = "checked"; }else{ $ex="";}

							$ReturnString .= "<input type='checkbox' name='FieldValue".$field['fid']."' value='1' $ex>";



					## textarea input

					}elseif($field['fType'] == 2){



							$ReturnString .= "<div class='ClearAll'></div><textarea name='FieldValue".$field['fid']."' class='input' cols='5' rows='7' id='editor' style='width:280px;'>".$Value[$field['fName']]."</textarea>";



					## selection list box

					}elseif($field['fType'] == 3){







							// check if there is a field linked to this one

							$Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$field['fid']." limit 1");						

		

							if(!empty($Linked)){



							$storeLastLinked = $Linked['fid'];

							$LinkedCode ="onClick='eMeetingLinkedField(this.value, ".$Linked['fid'].",0);'";



							}else{ $LinkedCode =""; }







							## find caption

							if(D_LANG !="english"){



								## check see if there is a caption					

								$test = $DB->Row("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");	

								if(empty($test)){



									## no caption found, load english caption

									$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='english' Order by fvOrder");

						

								}else{				

		

									$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");	

					

								}

								

							}else{

								$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

							}		





	

					## build output



					if(isset($storeLastLinked) && $storeLastLinked == $field['fid']){



						if(isset($StoreCountry) && is_numeric($StoreCountry)){

							$ReturnString .= "<div id='Link".$field['fid']."'> <a href='javascript:void(0);' onclick=\"eMeetingLinkedField(".$StoreCountry.", 54,0);\">".MakeCountry($Value[$field['fName']],$field['fid'])." <input type='hidden' class='hidden' name='FieldValue".$field['fid']."' value='".$Value[$field['fName']]."'></a> </div>";

							 

						}else{

							$ReturnString .= "<div id='Link".$field['fid']."'>".MakeCountry($Value[$field['fName']],$field['fid'])." </div>";						

						}

						

					}else{



							if($field['fid'] =="25"){ $StoreCountry = $Value[$field['fName']]; } // country box fix



							$ReturnString .= "<div id='Link".$field['fid']."'><select name='FieldValue".$field['fid']."' class='input' style='width:250px;' ".$LinkedCode.">";

							$ReturnString .= "<option value='0'>------------------</option>";

							while( $ListValue = $DB->NextRow($result2) )  

							{ 			

								if($Value[$field['fName']] == $ListValue['fvid']){

									$ReturnString .= "<option value='".$ListValue['fvid']."' selected>".$ListValue['fvCaption']."</option>";

								}else{

									$ReturnString .= "<option value='".$ListValue['fvid']."'>".$ListValue['fvCaption']."</option>";

								}

													

										

							}	

							$ReturnString .= "</select></div>";

					}





				## multiple checkbox											

				}elseif($field['fType'] == 5){



							$ReturnString .= "<div class='ClearAll'></div><br><table width='100%'  border=0><tr> ";



							$c=0; $tdC =2;

							$CheckParts = explode("**", $Value[$field['fName']]);

							$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");			
							if( mysql_num_rows($result2)==0 ) 
							{								
								## no values found, load english values
								$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."'  Order by fvOrder");
							}							


							while( $ListValue = $DB->NextRow($result2) )  

							{ 	

								$ReturnString .= "<td width='80%'><span>";

								if($CheckParts[$c] ==1){

										$ReturnString .= "<input type='checkbox' name='Multi".$c.$field['fid']."' value='1' class=radio checked><font size=1>&nbsp;&nbsp;".$ListValue['fvCaption'];

								}else{

										$ReturnString .= "<input type='checkbox' name='Multi".$c.$field['fid']."' value='1' class=radio><font size=1>&nbsp;&nbsp;".$ListValue['fvCaption'];

								}

								$ReturnString .= "</font>";					

								## include hidden fields for saving data

								$ReturnString .= "<input type='hidden' class='hidden' name='FieldValue".$field['fid']."' value='".$field['fName']."'>";

								$ReturnString .= "<input type='hidden' class='hidden' name='FieldName".$field['fid']."' value='".$field['fName']."'>";

								$ReturnString .= "<input type='hidden' class='hidden' name='FieldType".$field['fid']."' value='".$field['fType']."'>";					

								$ReturnString .= "<input type='hidden' class='hidden' name='FieldMulti".$c.$field['fid']."' value='".$c."'>";

								$ReturnString .= "</span></td>";

								$c++;

								if($tdC ==2){ $ReturnString .= '</tr><tr>'; $tdC=1; }

								$tdC++;



							}

						$ReturnString .= "</tr></table>";			



				## input field

				}elseif($field['fType'] == 6){



							if($Value[$field['fName']] ==1){ $ex = "checked"; }else{ $ex="";}

							$ReturnString .= "<input type='file' name='FieldValue".$field['fid']."' $ex>";



				## age field

				}elseif($field['fType'] == 7){



 

						if($Value[$field['fName']] == ""){ $Value[$field['fName']]="0000-00-00"; }								

						$ReturnString .= MakeAge($Value[$field['fName']])." ".$GLOBALS['_LANG']['_yold']."";

							

						$ReturnString .= "<br>".MakeAgeListField($Value[$field['fName']],$field['fid']);









				## include hidden fields				

				}







				// ADD CUSTOM HIDDEN FIELDS FOR DATABASE NAME VALUES

				if($field['fType'] != 5){

					$ReturnString .= "<input type='hidden' class='hidden' name='FieldName".$field['fid']."' value='".$field['fName']."'>";

					$ReturnString .= "<input type='hidden' class='hidden' name='FieldType".$field['fid']."' value='".$field['fType']."'>";

					//$field['fid']++;

				}





					if(!isset($value)){ $value="<br>"; }

					

					if(isset($Caption['description']) && $Caption['description'] != ""){

						$ReturnString .= '<div class="tip">'.$Caption['description'].'</div>';

					}

					$ReturnString .= $value."</li>";				

			}

			 $LastFID = $field['fid'];

			$ThisBox=$HideBox;

			$NextBox=$HideBox+1;

			$PrevBox=$HideBox-1;



			$ReturnString .='<li>';



			if($HideBox !=1){

				$ReturnString .=' <a href="#top" class="NormBtn" onClick="toggleLayer(\'bod_'.$PrevBox.'\'); toggleLayer(\'bod_'.$ThisBox.'\');" style="padding:8px;">'.$GLOBALS['_LANG']['_previous'].'</a>';

			}



			if($Total['total'] ==$HideBox){

				$ReturnString .='<input type="submit" value="'.$GLOBALS['_LANG']['_save'].'" class="MainBtn"></li>';

			}else{

				$ReturnString .='<a href="#top" class="NormBtn" onClick="toggleLayer(\'bod_'.$ThisBox.'\'); toggleLayer(\'bod_'.$NextBox.'\');" style="padding:8px;">'.$GLOBALS['_LANG']['_next'].'</a></li>';

			}



			

			$ReturnString .="</div>";

			$ReturnString .="</div>";



		$divCount++; $HideBox++;

	}	

	

	## build total field number output

	$ReturnString .= "<input name='TotalNumberOfRows' type='hidden' value='1000' class='hidden'>";

	

	return $ReturnString;



}





/**

* Info: Display profile commnets

* 		

* @version  9.0

* @created  Fri Sep 25 10:48:31 EEST 2008

* @updated  Fri Sep 25 10:48:31 EEST 2008

*/





function DisplayComments($id, $order, $start, $stop, $type="profile"){



		global $DB;

		$Counter =1;

		$DataArray = array(); $extra="";

		$TypeArray = array('profile','blog','video','calendar','comments','groups','classads');

		

		if(!in_array($type,$TypeArray)){ return $DataArray; }



		if($type=="blog"){ $type="profile"; $extra="AND comments.sub='blogview'";}



//comments.page = ('".$type."') $extra AND

		$SQL = "SELECT comments.*, files.bigimage, files.type, files.adult_content, files.approved AS fileApprove, members.username

		FROM comments 

		INNER JOIN members ON ( members.id = comments.from_uid  )

		LEFT JOIN files ON ( files.uid = comments.from_uid AND files.default LIKE '%1%' AND files.type = 'photo' )

		WHERE  comments.to_uid = ( '".$_SESSION['uid']."' )

		ORDER BY ".$order." DESC LIMIT $start,$stop";

 

		$result = $DB->query($SQL);



		## get total count for page numbers

		$totalMsg = $DB->Row("SELECT count(comments.id) AS total FROM comments, members WHERE comments.to_uid = members.id AND comments.to_uid = ( '".$id."' ) ");

 

		while( $Data = $DB->NextRow($result) )

		{

			$DataArray[$Counter]['approved'] 		= $Data['approved'];

			$DataArray[$Counter]['fromid'] 			= $Data['from_uid'];

			$DataArray[$Counter]['id'] 				= $Data['id'];

			$DataArray[$Counter]['comments'] 		= eMeetingOutput($Data['comments']);

			$Data['approved'] = $Data['fileApprove'];

			$DataArray[$Counter]['date'] 			= dates_interconv($Data['date']);

			$DataArray[$Counter]['image'] 			= ReturnDeImage($Data,"small");		

			$DataArray[$Counter]['time'] 			= $Data['time'];		

			$DataArray[$Counter]['page'] 			= $Data['page'];	

			$DataArray[$Counter]['subpage'] 		= $Data['sub'];	

			$DataArray[$Counter]['username'] 		= $Data['username'];	





			if(D_MOD_WRITE ==1){

					$DataArray[$Counter]['user_link'] 		=	$Data['username'];

			}else{

					$DataArray[$Counter]['user_link'] 		=	"index.php?dll=profile&pId=".$Data['from_uid'];

			}	

			//$DataArray[$Counter]['subpage'] 		= $Data['ex2_id'];	

			//$DataArray[$Counter]['subpage'] 		= $Data['ex3_id'];	     





			if($Data['sub'] =="viewfile"){ 	

						

				$DataArray[$Counter]['link'] =  "index.php?dll=profile&sub=viewfile&item_id=".$Data['to_uid']."&item2_id=1&item3_id=".$Data['ex1_id']."#commentsbox";

									

			}elseif($Data['sub'] == "blogview"){

									

				$DataArray[$Counter]['link'] = "index.php?dll=profile&sub=blogview&item_id=".$Data['to_uid']."&item2_id=".$Data['ex1_id']."#commentsbox";



			}else{



				$DataArray[$Counter]['link'] = "index.php?dll=".$Data['page']."&sub=".$Data['sub']."&item_id=".$Data['ex1_id']."#commentsbox";				



			}



			$DataArray[$Counter]['totalMsg'] 		= $totalMsg['total'];

			/////////////////////////////////////////////////////////		

			$Counter++;

			

		}

		

		return $DataArray;

}





/**

* Info: Display Visitor History

* 		

* @version  9.0

* @created  Fri Sep 25 10:48:31 EEST 2008

* @updated  Fri Sep 25 10:48:31 EEST 2008

*/







function DisplayHistory($id){



	global $DB;



	## define variables

	$count=0; $todayDate = date("D");	$ReturnString = "";



	

	for($i=0;$i!=30;$i++){

			
			$DisplayDate  = date("l (j F)",mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y")));

			$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y")));			

			

			$DisplayDate = str_replace("Monday", $GLOBALS['_LANG']['_monday'], $DisplayDate);

			$DisplayDate = str_replace("Tuesday", $GLOBALS['_LANG']['_tuesday'], $DisplayDate);

			$DisplayDate = str_replace("Wednesday", $GLOBALS['_LANG']['_wednesday'], $DisplayDate);

			$DisplayDate = str_replace("Thursday", $GLOBALS['_LANG']['_thursday'], $DisplayDate);

			$DisplayDate = str_replace("Friday", $GLOBALS['_LANG']['_friday'], $DisplayDate);

			$DisplayDate = str_replace("Saturday", $GLOBALS['_LANG']['_saturday'], $DisplayDate);

			$DisplayDate = str_replace("Sunday", $GLOBALS['_LANG']['_sunday'], $DisplayDate);

			

			$DisplayDate = str_replace("January", $GLOBALS['_LANG']['_january'], $DisplayDate);

			$DisplayDate = str_replace("February", $GLOBALS['_LANG']['_febuary'], $DisplayDate);

			$DisplayDate = str_replace("March", $GLOBALS['_LANG']['_march'], $DisplayDate);

			$DisplayDate = str_replace("April", $GLOBALS['_LANG']['_april'], $DisplayDate);

			$DisplayDate = str_replace("May", $GLOBALS['_LANG']['_may'], $DisplayDate);

			$DisplayDate = str_replace("June", $GLOBALS['_LANG']['_june'], $DisplayDate);

			$DisplayDate = str_replace("July", $GLOBALS['_LANG']['_july'], $DisplayDate);

			$DisplayDate = str_replace("August", $GLOBALS['_LANG']['_august'], $DisplayDate);

			$DisplayDate = str_replace("September", $GLOBALS['_LANG']['_september'], $DisplayDate);

			$DisplayDate = str_replace("October", $GLOBALS['_LANG']['_october'], $DisplayDate);

			$DisplayDate = str_replace("November", $GLOBALS['_LANG']['_november'], $DisplayDate);

			$DisplayDate = str_replace("Decemeber", $GLOBALS['_LANG']['_december'], $DisplayDate);

			

			

			## make query for this date	

			$result = $DB->Query("SELECT album.cat, files.aid, files.type, files.adult_content, files.approved, files.bigimage, members.username, visited.autoid, visited.uid, visited.date 
			FROM 
			members
			INNER JOIN visited ON (visited.uid = members.id AND visited.uid != ".$_SESSION['uid'].") 
			LEFT JOIN files ON (files.uid = members.id AND files.default=1) 
			LEFT JOIN album ON (album.aid = files.aid) 
			WHERE visited.view_uid= ( '".$id."' ) AND visited.date LIKE '%".$SearchDate."%' GROUP BY visited.uid ORDER BY visited.date DESC LIMIT 200");

					

			## display output

			$ReturnString .= '';



				$RunCount=0;

				while( $history = $DB->NextRow($result) ){

					if ($RunCount==0) {
						$ReturnString .= "<div class='ClearAll'></div><div class='menu_box_title1'>".$DisplayDate."</div><div class='menu_box_body1'>";

					}

					if($history['cat'] != "public" && $history['id'] != $_SESSION['uid'])
					{
						$pimage		= 	"inc/tb.php?src=nophoto.jpg&x=48&y=48&x=48&y=48";
					}
					else 
					{
						$pimage = ReturnDeImage($history,"small");
					}		


					$ReturnString .= '<div style="float:left; width:100px;height:70px;font-size:11px">		

					<a href="mobile.php?dll=mobileprofile&pId='.$history['uid'].'"><img src="'.$pimage.'" align="absmiddle" width=48 height=48 alt="'.$history['date'].'"><br>

					'.$history['username'].'</a> <br>

					

					</div> ';

					

					$count++;

					$RunCount ++;					

				}

				

			if($RunCount==0){ 
				$ReturnString .= ''; }
			else {
				$ReturnString .= '<div class="ClearAll"></div></div>';			
			}
			

	}

	

	## return output for display

	return $ReturnString;

	

}



/**

* Info: Get Comments Array

* 		

* @version  9.0

* @created  Fri Sep 25 10:48:31 EEST 2008

* @updated  Fri Sep 25 10:48:31 EEST 2008

*/



function GetCommentTotals(){

return 0;

	global $DB; $Counter=1; $i=1; $ReturnTotal=array();





	$SQL = "select row_num from 

		(

			SELECT count(page) AS row_num FROM comments WHERE comments.to_uid = ( '".$_SESSION['uid']."' ) AND comments.page ='profile'

	 

			union ALL

	

			SELECT count(page) AS row_num FROM comments WHERE comments.to_uid = ( '".$_SESSION['uid']."' ) AND comments.page ='groups'



			union ALL

	

			SELECT count(page) AS row_num FROM comments WHERE comments.to_uid = ( '".$_SESSION['uid']."' ) AND comments.page ='videos'



			union ALL

	

			SELECT count(page) AS row_num FROM comments WHERE comments.to_uid = ( '".$_SESSION['uid']."' ) AND comments.page ='calendar'



			union ALL

	

			SELECT count(page) AS row_num FROM comments WHERE comments.to_uid = ( '".$_SESSION['uid']."' ) AND comments.page ='classads'



			union ALL

	

			SELECT count(page) AS row_num FROM comments WHERE comments.to_uid = ( '".$_SESSION['uid']."' ) AND comments.page ='profile' AND comments.sub ='blogview'



		) as derived_table";



	$Data = $DB->Query($SQL);

 

 	while( $DataArray = $DB->NextRow($Data) ){



		$Total[$Counter]['total'] = $DataArray['row_num']; 

		$Counter++;

	}



	

	while($i < 7){



		if(isset($Total[$i]['total'])){ $ReturnTotal[$i]['total'] =$Total[$i]['total']; }else{ $ReturnTotal[$i]['total'] =0; }

	 

		$i++;



	}



	return $ReturnTotal;



}



?>