<?php
###############################################################################
/*
	THE BELOW FUNCTIONS ARE USED DURING THE INITAL SYSTEM LOAD
*/
###############################################################################
function StripModLinkBad($value){
$value = str_replace("!","",$value);
$value = str_replace("/","-",$value);
$value = str_replace(" ","-",str_replace("\'","",$value));
$value = str_replace(".","",str_replace("#","",str_replace("?","",strip_tags($value))));
return $value;
}
function MakeAgeListField($value="", $id, $tabcounter=6){
	$ReturnValue="";

	if ($value == "") {

		if(isset($_POST['FieldValue23a'])){ $ValYY = eMeetingOutput($_POST['FieldValue23a']); }else{ $ValYY = ""; }
		if(isset($_POST['FieldValue23b'])){ $ValMM = eMeetingOutput($_POST['FieldValue23b']); }else{ $ValMM = ""; }
		if(isset($_POST['FieldValue23c'])){ $ValDD = eMeetingOutput($_POST['FieldValue23c']); }else{ $ValDD = ""; }

		if(isset($_POST['FieldValue23a']) &&  strlen($_POST['FieldValue23a']) < 2){ $ValStyleYY="border: 2px solid #990000; padding: 2px; background:#FAB6B8;";  }else{ $ValStyleYY="";}
		if(isset($_POST['FieldValue23b']) &&  strlen($_POST['FieldValue23b']) < 2){ $ValStyleMM="border: 2px solid #990000; padding: 2px; background:#FAB6B8;";  }else{ $ValStyleMM="";}
		if(isset($_POST['FieldValue23c']) &&  strlen($_POST['FieldValue23c']) < 2){ $ValStyleDD="border: 2px solid #990000; padding: 2px; background:#FAB6B8;";  }else{ $ValStyleDD="";}
	}
	else {
		$cv = explode("-",$value);
		$ValYY = $cv[0];
		$ValMM = $cv[1];
		$ValDD = $cv[2];
	}


	$ReturnValue .='<select name="FieldValue'.$id.'a" tabindex="'.$tabcounter.'" style="'.$ValStyleYY.'"><option value="0">'.$GLOBALS['_LANG']['_year'].'</option>';



	## MAKE AGE ARRAY
	$YY=date('Y')-18;
	for($i=0; $i<80; $i++){
	if($YY ==$ValYY){ $sel ="selected"; }else{ $sel =""; }
		$ReturnValue .='<option value="'.$YY.'" '.$sel.'>'.$YY.'</option>';
		$YY--;
	}
	$ReturnValue .='</select>';
	## MONTH
	$ms1="";$ms2="";$ms3="";$ms4="";$ms5="";$ms6="";$ms17="";$ms8="";$ms9="";$ms10="";$ms11="";$ms12="";
	switch($ValMM){
	case "JAN": { $ms1="selected";} break;
	case "FEB": { $ms2="selected";} break;
	case "MAR": { $ms3="selected";} break;
	case "APR": { $ms4="selected";} break;
	case "MAY": { $ms5="selected";} break;
	case "JUN": { $ms6="selected";} break;
	case "JUL": { $ms7="selected";} break;
	case "AUG": { $ms8="selected";} break;
	case "SEP": { $ms9="selected";} break;
	case "OCT": { $ms10="selected";} break;
	case "NOV": { $ms11="selected";} break;
	case "DEC": { $ms12="selected";} break;
	}
	$ReturnValue .='<select name="FieldValue'.$id.'b" tabindex="'.$tabcounter.'" style="'.$ValStyleMM.'">
	<option value="0" '.$ms1.'>'.$GLOBALS['_LANG']['_month'].'</option>
	<option value="JAN" '.$ms1.'>'.MakeCalendarMonth(01,true).'</option>
	<option value="FEB" '.$ms2.'>'.MakeCalendarMonth(02,true).'</option>
	<option value="MAR" '.$ms3.'>'.MakeCalendarMonth(03,true).'</option>
	<option value="APR" '.$ms4.'>'.MakeCalendarMonth(04,true).'</option>
	<option value="MAY" '.$ms5.'>'.MakeCalendarMonth(05,true).'</option>
	<option value="JUN" '.$ms6.'>'.MakeCalendarMonth(06,true).'</option>
	<option value="JUL" '.$ms7.'>'.MakeCalendarMonth(07,true).'</option>
	<option value="AUG" '.$ms8.'>'.$GLOBALS['_LANG']['_august'].'</option>
	<option value="SEP" '.$ms9.'>'.$GLOBALS['_LANG']['_september'].'</option>
	<option value="OCT" '.$ms10.'>'.MakeCalendarMonth(10,true).'</option>
	<option value="NOV" '.$ms11.'>'.MakeCalendarMonth(11,true).'</option>
	<option value="DEC" '.$ms12.'>'.MakeCalendarMonth(12,true).'</option>
	</select>';
	## DAY
	$ReturnValue .='<select name="FieldValue'.$id.'c" tabindex="'.$tabcounter.'" style="'.$ValStyleDD.'"><option value="0">'.$GLOBALS['_LANG']['_day'].'</option>';
	$DD=31;
	for($i=0; $i<31; $i++){
	if($DD ==$ValDD){ $sel ="selected"; }else{ $sel =""; }
		$ReturnValue .='<option value="'.$DD.'" '.$sel.'>'.$DD.'</option>';
		$DD--;
	} 
	$ReturnValue .='</select>';
	return $ReturnValue;
}
function DisplaySignupFields($id=0){
	/*
		THIS FUNCTION WILL DISPLAY THE EXTRA PROFILE FIELDS
		AS CREATED IN THE ADMIN AREA
	*/
	global $DB;
	$NumFields = 1;
	$NumLinkedFields = 1;
	$counter=1;
	$tabcounter=4;
	$ReturnValue =" ";
	if(!is_numeric($id)){ return; }
	if($id ==0){ $extraID =" OR field_groups.private =1 OR field_groups.private = 2 "; }else{ $extraID =""; }
    $SQL = "SELECT field.fid,field.fType,field.fName,field.linked_id FROM field 
	INNER JOIN field_groups ON ( ( field_groups.id = field.groupid  || field_groups.id = field.groupid_1 || field_groups.id = field.groupid_2 ) AND ( field_groups.private = ".$id." ".$extraID." ) )
	WHERE field.required = 1
	ORDER BY field.fOrder ASC";
	$result = $DB->Query($SQL);   
    while( $groups = $DB->NextRow($result) )
    {
			////////////////////////////
			// STOP NULL CAPTION VALUES
			/////////////////////////////
			if(D_LANG !="english"){
					// check see if there is a caption
					$Caption = $DB->Row("SELECT caption, description FROM field_caption WHERE Cid=".$groups['fid']." AND lang='".D_LANG."' AND `match`='no' limit 1");
						if(empty($Caption)){
							// no caption found, load english caption
							$Caption = $DB->Row("SELECT description, caption FROM field_caption WHERE Cid=".$groups['fid']." AND `match`='no' limit 1");
						}						
			}else{
				$Caption = $DB->Row("SELECT caption, description FROM field_caption WHERE Cid=".$groups['fid']." AND lang='".D_LANG."' AND `match`='no' limit 1");
			}			
			////////////////////////////
			/////////////////////////////
			// ADD CODE INCASE THE FORM IS SUBMITTED AND DATA IS ENTERED INTO THE BOX
			if(isset($_POST['FieldValue'.$groups['fid']])){ $Val = eMeetingOutput($_POST['FieldValue'.$groups['fid']]); }else{ $Val = ""; }



			if(isset($_POST['FieldValue'.$groups['fid']]) &&  strlen($_POST['FieldValue'.$groups['fid']]) < 2){ $ValStyle="border: 2px solid #990000; padding: 2px; background:#FAB6B8;";  }else{ $ValStyle="";}
			/////////////////////////////////////////////////////////////////////////
			## Display Field Data
			//if($id ==0){ $ReturnValue .="<li>";  }else{ $ReturnValue .="<br>"; }
			if($id ==0){ $ReturnValue .="<li>";  }else{ $ReturnValue .="<li>"; }
			$ReturnValue .= "<label class='required'>".$Caption['caption'].": </label>";
				if(!isset($_POST['FieldValue'.$groups['fid']])){ $_POST['FieldValue'.$groups['fid']]=""; }
				if($groups['fType'] == 1){
									// DOB ADDITIONAL CODE
									if($groups['fName'] =="age"){			
										if($id !=0){
										$ReturnValue .='<select name="birthdatey" tabindex="'.$tabcounter.'">
										<option value="1990">'.$GLOBALS['_LANG']['_year'].'</option>
										<option value="1990">1990</option>
										<option value="1989">1989</option>
										<option value="1988">1988</option>
										<option value="1987">1987</option>
										<option value="1986">1986</option>
										<option value="1985">1985</option>
										<option value="1984">1984</option>
										<option value="1983">1983</option>
										<option value="1982">1982</option>
										<option value="1981">1981</option>
										<option value="1980">1980</option>
										<option value="1979">1979</option>
										<option value="1978">1978</option>
										<option value="1977">1977</option>
										<option value="1976">1976</option>
										<option value="1975">1975</option>
										<option value="1974">1974</option>
										<option value="1973">1973</option>
										<option value="1972">1972</option>
										<option value="1971">1971</option>
										<option value="1970">1970</option>
										<option value="1969">1969</option>
										<option value="1968">1968</option>
										<option value="1967">1967</option>
										<option value="1966">1966</option>
										<option value="1965">1965</option>
										<option value="1964">1964</option>
										<option value="1963">1963</option>
										<option value="1962">1962</option>
										<option value="1961">1961</option>
										<option value="1960">1960</option>
										<option value="1959">1959</option>
										<option value="1958">1958</option>
										<option value="1957">1957</option>
										<option value="1956">1956</option>
										<option value="1955">1955</option>
										<option value="1954">1954</option>
										<option value="1953">1953</option>
										<option value="1952">1952</option>
										<option value="1951">1951</option>
										<option value="1950">1950</option>
										<option value="1949">1949</option>
										<option value="1948">1948</option>
										<option value="1947">1947</option>
										<option value="1946">1946</option>
										<option value="1945">1945</option>
										<option value="1944">1944</option>
										<option value="1943">1943</option>
										<option value="1942">1942</option>
										<option value="1941">1941</option>
										<option value="1940">1940</option>
										<option value="1939">1939</option>
										<option value="1938">1938</option>
										<option value="1937">1937</option>
										<option value="1936">1936</option>
										<option value="1935">1935</option>
										<option value="1934">1934</option>
										<option value="1933">1933</option>
										<option value="1932">1932</option>
										<option value="1931">1931</option>
										<option value="1930">1930</option>
										<option value="1929">1929</option>
										<option value="1928">1928</option>
										<option value="1927">1927</option>
										<option value="1926">1926</option>
										<option value="1925">1925</option>
										<option value="1924">1924</option>
										<option value="1923">1923</option>
										<option value="1922">1922</option>
										<option value="1921">1921</option>
										<option value="1920">1920</option>
										<option value="1919">1919</option>
										<option value="1918">1918</option>
										<option value="1917">1917</option>
										<option value="1916">1916</option>
										<option value="1915">1915</option>
										<option value="1914">1914</option>
										<option value="1913">1913</option>
										<option value="1912">1912</option>
										<option value="1911">1911</option>
										<option value="1910">1910</option>
										</select>
										<select name="birthdatem" tabindex="'.$tabcounter.'">
										<option value="JAN">'.$GLOBALS['_LANG']['_month'].'</option>
										<option value="JAN">'.MakeCalendarMonth(01,true).'</option>
										<option value="FEB">'.MakeCalendarMonth(02,true).'</option>
										<option value="MAR">'.MakeCalendarMonth(03,true).'</option>
										<option value="APR">'.MakeCalendarMonth(04,true).'</option>
										<option value="MAY">'.MakeCalendarMonth(05,true).'</option>
										<option value="JUN">'.MakeCalendarMonth(06,true).'</option>
										<option value="JUL">'.MakeCalendarMonth(07,true).'</option>
										<option value="AUG">'.$GLOBALS['_LANG']['_august'].'</option>
										<option value="SEP">'.$GLOBALS['_LANG']['_september'].'</option>
										<option value="OCT">'.MakeCalendarMonth(10,true).'</option>
										<option value="NOV">'.MakeCalendarMonth(11,true).'</option>
										<option value="DEC">'.MakeCalendarMonth(12,true).'</option>
										</select>
										<select name="birthdated" tabindex="'.$tabcounter.'">
										<option value="01">'.$GLOBALS['_LANG']['_day'].'</option>
										<option value="01">1</option>
										<option value="02">2</option>
										<option value="03">3</option>
										<option value="04">4</option>
										<option value="05">5</option>
										<option value="06">6</option>
										<option value="07">7</option>
										<option value="08">8</option>
										<option value="09">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
										</select>';
										$ReturnValue .= "<input name='FieldValue".$groups['fid']."' class='hidden' type='hidden' value='0'>";
										}else{					
											if(isset($_POST['FieldValue'.$groups['fid']])){ $dAge =strip_tags($_POST['FieldValue'.$groups['fid']]); }else{ $dAge ="1990-01-01"; }
											if($dAge ==""){ $dAge ="1990-01-01"; }
											$ReturnValue .= "<script>DateInput('FieldValue".$groups['fid']."', true, 'YYYY-MON-DD','".$dAge."')</script>";
										}
									}else{
										$ReturnValue .= "<input name='FieldValue".$groups['fid']."' class='input' type='text' style='width:280px;".$ValStyle."' value='".$Val."' tabindex='".$tabcounter."' size='40'>";
									}
					}elseif($groups['fType'] == 4){
							## turn of styling for checkbox if value is 1
							if(isset($_POST['do']) &&  $_POST['FieldValue'.$groups['fid']] != 1){ $ValStyle="border: 2px solid #990000; padding: 2px; background:#FAB6B8;"; }else { $ValStyle=""; }
							if($Val ==1){ $Val ="checked"; }else{ $Val ="";  }
							$ReturnValue .= "<span style='".$ValStyle."'><input type='checkbox' name='FieldValue".$groups['fid']."' value='1' ".$Val." tabindex='".$counter."'></span>";
					}elseif($groups['fType'] == 2){
							$ReturnValue .= "<textarea name='FieldValue".$groups['fid']."' rows='3' cols='23' class='input' style='".$ValStyle."' tabindex='".$tabcounter."'>".$Val."</textarea>";
					## age field
					}elseif($groups['fType'] == 7){
						$ReturnValue .= " ".MakeAgeListField("",$groups['fid'],$tabcounter);
					}elseif($groups['fType'] == 3){


$linkcode = "";
if($groups['fName'] == "em_85820081128" && $_POST['FieldValue25'] !="0"){
  $linkcode = " AND linked_cap_id = '".$_POST['FieldValue25']."'  ";
}


										// check if there is a field linked to this one
										$Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$groups['fid']." limit 1");	
										if(!empty($Linked) && $groups['fName'] !="gender"){
										$LinkedCode ="onChange='eMeetingLinkedField(this.value, ".$Linked['fid'].",0);'"; $NumLinkedFields++;
										}elseif($groups['fName'] =="gender"){		
										$LinkedCode ="onChange='eMeetingGenderChange(this.value)'";
										}else{ $LinkedCode =""; }
										/* This is a list box */									
										$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='".D_LANG."' ".$linkcode." Order by fvOrder");									
										if($groups['linked_id'] !=0){
											if( $groups['fName'] =="em_85820081128"){
											//$DisplayedLink ="disabled";//
											$DisplayedLink ="";//disabled
											}else{
											$DisplayedLink ="";//disabled
											}
										}else{
											$DisplayedLink ="";
										}
										$ReturnValue .= "<div id='Link".$groups['fid']."'><select name='FieldValue".$groups['fid']."' style='".$ValStyle."' tabindex='".$tabcounter."' class='input222' ".$LinkedCode." $DisplayedLink>";
										$ReturnValue .= "<option value='0' selected>------------------</option>";
										$tfO =1;
										while( $ListValue = $DB->NextRow($result2) )  
										{ 			
											if($Val == $ListValue['fvid']){
												$ReturnValue .= "<option value='".$ListValue['fvid']."' selected>".$ListValue['fvCaption']."</option>";
											}else{
												if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }
												$ReturnValue .= "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";
											}					
											$tfO++;
										}
										// BACKUP INCASE NOT VALUES FOUND
										if($tfO ==1){
											$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='english' Order by fvOrder");
											while( $ListValue = $DB->NextRow($result2) )  
											{ 			
												if($ListValue['default'] =="yes"){ $Selecteed ="selected"; }else{$Selecteed ="";  }
												$ReturnValue .= "<option value='".$ListValue['fvid']."' ".$Selecteed.">".$ListValue['fvCaption']."</option>";					
												$tfO++;
											}
										}
										$ReturnValue .= "</select></div>";										
										if($groups['fName'] =="gender"){
										$ReturnValue .= "<div id='GenderChanger'></div>";
										}
				}elseif($groups['fType'] == 5){
										$tdC=2;
										$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");
										$ReturnValue .= "<div class='ClearAll'></div><br><table width='100%'  border=0><tr> ";
										while( $ListValue = $DB->NextRow($result2) )  
										{ 





$newname = $groups['fid']."_".$ListValue['id'];



											if(isset($_POST['FieldValue'.$groups['fid']])){ $Val = $_POST['FieldValue'.$newname]; }else{ $Val = ""; }
											if($Val ==1){ $Val ="checked"; }else{ $Val ="";  }	
											$ReturnValue .= "<td width='25%'><span>";


											$ReturnValue .= "<input type='checkbox' name='FieldValue".$newname."' value='1' class=radio ".$Val." tabindex='".$tabcounter."'>";								
											$ReturnValue .= "<input type='hidden' class='hidden' name='FieldName".$groups['fid']."' value='".$groups['fName']."'>";
											$ReturnValue .= "<input type='hidden' class='hidden' name='FieldType".$groups['fid']."' value='".$groups['fType']."'>";					
											$ReturnValue .= ''.$ListValue['fvCaption'].'';
											if($tdC ==5){ $ReturnValue .= '</tr><tr>'; $tdC=1; }
											$tdC++;
											$NumFields++;								
										}
										$ReturnValue .= "</tr></table>";
				}
				if($groups['fType'] != 5){
							$ReturnValue .= "<input type='hidden' class='hidden' name='FieldName".$groups['fid']."' value='".$groups['fName']."'>";
							$ReturnValue .= "<input type='hidden' class='hidden' name='FieldType".$groups['fid']."' value='".$groups['fType']."'>";
							$NumFields++;
				}
			if(isset($Caption['description']) && $Caption['description'] != ""){
				$ReturnValue .= '<div class="tip">'.$Caption['description'].'</div>';
			}
			$ReturnValue .= '</li>';
	$counter++;
	$tabcounter++;			
	$NumFields++;	
	}
		if($id ==0){
		$ReturnValue .= "<input name='LinkedRows' type='hidden' value='".$NumLinkedFields."' class='hidden'>";
		}	 
	//if($id !=0){ $ReturnValue = str_replace("< li>","<li>",$ReturnValue);   }
	return $ReturnValue;
}
function MakeDisplayFile($Values){
	global $DB;
	// define variables
	$ReturnValue="";
	$supportedWMVideoTypes = array('wmv','wma');
	switch($Values['type']){	
	case "photo": { $ReturnValue= ReturnDeImage($Values,'full'); } break;
	case "music": {
			$ReturnValue =	'<div id="podcast'.$Values['id'].'">Please install flash.</div>
			<script type="text/javascript">	loadSWFObject('.$Values['id'].', "'.WEB_PATH_MUSIC.$Values['bigimage'].'", "'.DB_DOMAIN.'inc/exe/flash/mp3_player.swf", "400", "200", "6", "#ffffff"); </script>';
			} break;
	case "video": {
		$MINEType= returnMIMEType($Values['bigimage']);
		if(in_array(substr($Values['bigimage'], -3),$supportedWMVideoTypes)){
			$ReturnValue= '<span id="'.$Values['id'].'"></span><script type="text/javascript">	var cnt = document.getElementById("'.$Values['id'].'");	var src = \'newadmin/inc/js/wmvplayer.xaml\';	var cfg = {	file:\''.WEB_PATH_VIDEO.$Values['bigimage'].'\',	height:\'320\',width:\'420\'};	var ply = new jeroenwijering.Player(cnt,src,cfg);</script>';
							//image:\'images/DEFAULT/video_icon.png\',
		}else{

$ReturnValue= '<object id="MediaPlayer" width="420" height="460" classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701">
    <param name="AudioStream" value="-1">
    <param name="AutoSize" value="0">
    <param name="AutoStart" value="-1">
    <param name="AnimationAtStart" value="0">
    <param name="AllowScan" value="-1">
    <param name="AllowChangeDisplaySize" value="-1">
    <param name="AutoRewind" value="0">
    <param name="Balance" value="0">
    <param name="BaseURL" value="">
    <param name="BufferingTime" value="5">
    <param name="CaptioningID" value="">
    <param name="ClickToPlay" value="-1">
    <param name="CursorType" value="0">
    <param name="CurrentPosition" value="-1">
    <param name="CurrentMarker" value="0">
    <param name="DefaultFrame" value="">
    <param name="DisplayBackColor" value="0">
    <param name="DisplayForeColor" value="16777215">
    <param name="DisplayMode" value="0">
    <param name="DisplaySize" value="4">
    <param name="Enabled" value="-1">
    <param name="EnableContextMenu" value="-1">
    <param name="EnablePositionControls" value="-1">
    <param name="EnableFullScreenControls" value="0">
    <param name="EnableTracker" value="-1">
    <param name="Filename" value="'.WEB_PATH_VIDEO.$Values['bigimage'].'">
    <param name="InvokeURLs" value="-1">
    <param name="Language" value="-1">
    <param name="Mute" value="0">
    <param name="PlayCount" value="1">
    <param name="PreviewMode" value="0">
    <param name="Rate" value="1">
    <param name="SAMILang" value="">
    <param name="SAMIStyle" value="">
    <param name="SAMIFileName" value="">
    <param name="SelectionStart" value="-1">
    <param name="SelectionEnd" value="-1">
    <param name="SendOpenStateChangeEvents" value="-1">
    <param name="SendWarningEvents" value="-1">
    <param name="SendErrorEvents" value="-1">
    <param name="SendKeyboardEvents" value="0">
    <param name="SendMouseClickEvents" value="0">
    <param name="SendMouseMoveEvents" value="0">
    <param name="SendPlayStateChangeEvents" value="-1">
    <param name="ShowCaptioning" value="0">
    <param name="ShowControls" value="-1">
    <param name="ShowAudioControls" value="-1">
    <param name="ShowDisplay" value="0">
    <param name="ShowGotoBar" value="0">
    <param name="ShowPositionControls" value="0">
    <param name="ShowStatusBar" value="-1">
    <param name="ShowTracker" value="0">
    <param name="TransparentAtStart" value="0">
    <param name="VideoBorderWidth" value="0">
    <param name="VideoBorderColor" value="0">
    <param name="VideoBorder3D" value="0">
    <param name="Volume" value="-600">
    <param name="WindowlessVideo" value="0">
    <embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" name="MediaPlayer" src="'.WEB_PATH_VIDEO.$Values['bigimage'].'" showcontrols="1" showpositioncontrols="0" showaudiocontrols="1" showtracker="0" showdisplay="0" showstatusbar="1" showgotobar="0" showcaptioning="0" autostart="1" autorewind="0" animationatstart="0" transparentatstart="0" allowchangedisplaysize="0" allowscan="0" enablecontextmenu="0" clicktoplay="0" width="610" height="500"></embed>
				</object>';
		}
	} break;
	case "youtube": {
			$file_part = explode("?v=",$Values['bigimage']); $file_part = explode("&",$file_part[1]);	
			$UImage = "http://img.youtube.com/vi/".$file_part[0]."/2.jpg";
				if( file_exists('Zend/Loader.php') ){		
					include 'Zend/Loader.php';
					Zend_Loader::loadClass('Zend_Gdata_YouTube');
					$yt = new Zend_Gdata_YouTube();
					$videoEntry = $yt->getVideoEntry($file_part[0]);	
					$videoThumbnails 		=	$videoEntry->getVideoThumbnails();
					$ReturnValue= '<object width="425" height="344"><param name="movie" value="'.$videoEntry->getFlashPlayerUrl().'"></param><param name="allowFullScreen" value="true"></param><embed src="'.$videoEntry->getFlashPlayerUrl().'" type="application/x-shockwave-flash" allowfullscreen="true" width="425" height="344"></embed></object>';
				}		
				else {		
					 // $ReturnValue= '<embed id="Player1240123385742" width="420" height="320" flashvars="width=420&height=320&file=http://www.youtube.com/watch?v='.$file_part[0].'&autoplay=true&image=http://i.ytimg.com/vi/'.$file_part[0].'/0.jpg&autostart=true" allowfullscreen="true" allowscriptaccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" mediawrapchecked="true" src="newadmin/inc/js/mediaplayer.swf" type="application/x-shockwave-flash" splayername="SWF" tplayername="SWF"/>';


$ReturnValue= '<object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/'.$file_part[0].'"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/'.$file_part[0].'" type="application/x-shockwave-flash" allowfullscreen="true" width="425" height="344"></embed></object>';



				}
	} break;
	default: { $ReturnValue= "File Type Not Found"; } break;
	}
 	if(isset($Values['bigimage'])){
	$DB->Update("UPDATE files SET views=views+1 WHERE bigimage='".$Values['bigimage']."' LIMIT 1");
	}
	return $ReturnValue;
}
/**
* Info: Funcions used to get the mime type of a file
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/
    function returnMIMEType($filename)
    {
        preg_match("|\.([a-z0-9]{2,4})$|i", $filename, $fileSuffix);
        switch(strtolower($fileSuffix[1]))
        {
            case "js" :
                return "application/x-javascript";
            case "json" :
                return "application/json";
            case "jpg" :
            case "jpeg" :
            case "jpe" :
                return "image/jpg";
            case "png" :
            case "gif" :
            case "bmp" :
            case "tiff" :
                return "image/".strtolower($fileSuffix[1]);
            case "css" :
                return "text/css";
            case "xml" :
                return "application/xml";
            case "doc" :
            case "docx" :
                return "application/msword";
            case "xls" :
            case "xlt" :
            case "xlm" :
            case "xld" :
            case "xla" :
            case "xlc" :
            case "xlw" :
            case "xll" :
                return "application/vnd.ms-excel";
            case "ppt" :
            case "pps" :
                return "application/vnd.ms-powerpoint";
            case "rtf" :
                return "application/rtf";
            case "pdf" :
                return "application/pdf";
            case "html" :
            case "htm" :
            case "php" :
                return "text/html";
            case "txt" :
                return "text/plain";
            case "mpeg" :
            case "mpg" :
            case "mpe" :
                return "video/mpeg";
            case "mp3" :
                return "audio/mpeg3";
            case "wav" :
                return "audio/wav";
            case "aiff" :
            case "aif" :
                return "audio/aiff";
            case "avi" :
                return "video/msvideo";
            case "wmv" :
                return "video/x-ms-wmv";
            case "mov" :
                return "video/quicktime";
            case "zip" :
                return "application/zip";
            case "tar" :
                return "application/x-tar";
            case "swf" :
                return "application/x-shockwave-flash";
            default :
            if(function_exists("mime_content_type"))
            {
                $fileSuffix = mime_content_type($filename);
            }
            return "unknown/" . trim($fileSuffix[0], ".");
        }
    }
function BuilderFooterBottom(){
if(TMP_PAGE_FOOTER !=1){ return ""; }  
$TopArticles = DisplayTop10Articles(6);
$TopSignups = DisplayRecentSignups(5);
$TopChanges = RecentMemberActivity(5);
$ReturnValue ="";
$ReturnValue .= '<div id="bottomBar"><div class="col1"><h4>'.$GLOBALS['LANG_COMMON']['24'].'</h4><table width="95%"  border="0" align="center" style="margin-top:10px;">';
foreach($TopChanges as $value){	
$ReturnValue .= '<tr valign="top"  style="font-size:11px;"><td width="5%" height="51"><a href="'.$value['link'].'"><img src="'.$value['image'].'&x=48&y=48" width="48" height="48" style="float:left; padding-right:10px;"></a>
<td width="95%" valign="top"  style="border-bottom:1px dashed #ffffff; font-size:11px;"><span style="font-weight:bold;display:block;font-size:13px;">'.$value['msg'].'</span>
'.ShowTimeSince($value['date']).'</td>';
} 
$ReturnValue .= '</table></div><div class="col2"><h4>'.$GLOBALS['LANG_COMMON'][22].'</h4><ul id="links">';
foreach($TopArticles as $value){	
$ReturnValue .= "<li><a href='".$value['link']."'>".$value['title']."</a></li>";
}
$ReturnValue .= '</ul></div><div class="col3"><h4>'.$GLOBALS['_LANG']['_new'].' '.$GLOBALS['_LANG']['_members'].'</h4><table width="95%"  border="0" align="center" style="margin-top:10px;">';
foreach($TopSignups as $value){	
$ReturnValue .= '<tr valign="top"  style="font-size:11px;"><td width="5%" height="51"><a href="'.$value['link'].'"><img src="'.$value['image'].'&x=48&y=48" width="48" height="48" style="float:left; padding-right:10px;"></a>
<td width="95%" valign="top"  style="border-bottom:1px dashed #ffffff; font-size:11px;"><span style="font-weight:bold;display:block;font-size:13px;">'.$value['username'].' - '.ShowTimeSince($value['created']).'</span>
'.$value['age'].' '.$GLOBALS['_LANG']['_yold'].' / '.$value['country'].'</td>';
} 
$ReturnValue .= '</table></div><div class="clear"></div></div><div class="clear"></div>';
return $ReturnValue;
}
function BuildExtraReturnString($values){
					$ExtraSendData="";
					if(isset($values['eid'])){
					$ExtraSendData .="&eid=".$values['eid'];
					}
					if(isset($values['id'])){
					$ExtraSendData .="&id=".$values['id'];
					}
					if(isset($values['item_id'])){
					$ExtraSendData .="&item_id=".$values['item_id'];
					}
return $ExtraSendData;
}
function GetAttachmentAlbum($aid){
	if(!is_numeric($aid)){ return ""; }
	global $DB;
	$SmallPics=array(); $run=1; $ReturnValue="";
	$SQL = "SELECT files.id AS fid, `default`, type, title, files.uid, files.approved, adult_content, bigimage FROM files WHERE aid='".$aid."' AND type='photo' AND approved='yes' ORDER BY RAND()";
	$result1 = $DB->Query($SQL);
	if(!empty($result1)){		
		while( $pics = $DB->NextRow($result1) ){	
			$SmallPics[$run]['image'] 		= ReturnDeImage($pics,"medium");
			$SmallPics[$run]['bigimage'] 	= $pics['bigimage'];
			$SmallPics[$run]['title'] 		= $pics['title'];
			$run++;
		}
	}
	// build output
	if(!empty($SmallPics)){
		// load lightbox popups
		$ReturnValue.= '<link rel="stylesheet" href="inc/js/lightbox2/css/lightbox.css" type="text/css" media="screen" />	
		<script src="inc/js/lightbox2/js/lightbox.js" type="text/javascript"></script>';
		$ReturnValue.= "<ul class='ItemGallery'>";
			foreach($SmallPics as $Value){
				$ReturnValue.= '<li><a href="'.WEB_PATH_IMAGE.$Value['bigimage'].'" rel="lightbox[gallery]" title="'.eMeetingOutput($Value['title']).'"><img src="'.$Value['image'].'" width="75" height="75" /></a></li>';
			}
		$ReturnValue.= "</ul>";
		}	
	return $ReturnValue;
}
/**
* Info: Funcions used to display a members albums
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/
function GetAlbums($id, $selected=""){
	global $DB;
	$ReturnValue="";
    $result = $DB->Query("SELECT aid, title FROM album WHERE uid='".$id."'");
    while( $Data = $DB->NextRow($result) )
    {
		if($Data['aid'] == $selected){
			$ReturnValue .= "<option name='".$Data['aid']."' value='".$Data['aid']."' selected>".eMeetingOutput($Data['title'])."</option>";
		}else{
			$ReturnValue .= "<option name='".$Data['aid']."' value='".$Data['aid']."'>".eMeetingOutput($Data['title'])."</option>";
		}
	}
	## return array
	return $ReturnValue;
}
function CanSeeAdult(){
	if(isset($_SESSION['pack_adult']) && $_SESSION['pack_adult'] =="yes"){
		return "";
	}else{
		return "and adult_content !='yes'";
	}
}
function ModeratorOptions($page, $subpage, $value){
	$FeaturedArray = array('classads','search','calendar');
	## display edit functions for moderators
	if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes"){
	if($page=="blog"){
		print '<br><a href="#" onclick="EditBlogPost(\''.$value['id'].'\'); return false;">';
	}elseif($page=="search"){
		print '<br><a href="'.DB_DOMAIN.'index.php?dll=account&sub=edit&id='.$value['id'].'" style="text-decoration:none">';
	}else{
		print '<br><a href="'.DB_DOMAIN.'index.php?dll='.$page.'&sub=add&eid='.$value['id'].'" style="text-decoration:none">';
	}
	print '<img src="'.DB_DOMAIN.'images/DEFAULT/_acc/wrench.png" align="absmiddle"> &nbsp; '.$GLOBALS['_LANG']['_edit'].' </a>';
	} 
	## display delete functions for moderator
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" && $value['ThisApproved']=="no"){
	print '<span id="Approvediv_'.$value['id'].'"><br><a href="javascript:void(0)" 
	onClick="AdminLiveApprove(\''.$value['id'].'\', \''.$page.'\', \''.$subpage.'\'); 
	Effect.Shake(\'div_'.$value['id'].'\'); Effect.Fade(\'Approvediv_'.$value['id'].'\'); return false;" style="text-decoration:none">
	<img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/chk_on.png"> &nbsp; '.$GLOBALS['_LANG']['_approve'].' </a></span>';
	 } 
	## display delete functions for moderator
	if( isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes" ){
	print '<br><a href="javascript:void(0)" onClick="AdminLiveDelete(\''.$value['id'].'\', \''.$page.'\', \''.$subpage.'\');  
	Effect.Fade(\'div_'.$value['id'].'\'); return false;" style="text-decoration:none">
	<img src="'.DB_DOMAIN.'images/DEFAULT/_acc/cancel.png" align="absmiddle"> &nbsp '.$GLOBALS['_LANG']['_delete'].'</a>';
	}
	## display make featured
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" && in_array($page,$FeaturedArray) ){
	if($value['featured'] =="no"){
		print '<br><a href="javascript:void(0)" onClick="AdminLiveFeatured(\''.$value['id'].'\', \''.$page.'\', \''.$subpage.'\');
		Effect.Shake(\'div_'.$value['id'].'\'); return false;" style="text-decoration:none">
		<img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/thumb_up.png"> &nbsp '.$GLOBALS['_LANG']['_featured'].'</a>';
	}elseif($value['featured'] =="yes"){
		print '<br><a href="javascript:void(0)" onClick="AdminLiveRFeatured(\''.$value['id'].'\', \''.$page.'\', \''.$subpage.'\');
		Effect.Shake(\'div_'.$value['id'].'\'); return false;" style="text-decoration:none">
		<img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/thumb_down.png"> &nbsp '.$GLOBALS['_LANG']['_remove']." ".$GLOBALS['_LANG']['_featured'].'</a>';	
	}
	}
}
function CheckAdminEmail($page, $subpage, $data, $error=""){
	if(substr($error,-3) !="**1"){
		return;
	}
		if(is_array($data)){
			$CUSTOM="";
			foreach($data as $name => $value){ if(!is_numeric($name) && name !="custom"){
				$CUSTOM .= "<p><strong>".$name."</strong> ".$value."</p>";
			} }
		}
	$SendEmail=0; $data['custom']="";
	switch($page){
		case "register": { 
			if(SEMAIL_JOIN =="yes"){
				$data['custom'] .="<h1>".$_SESSION['username']." just created a new account</h1>";

				$CUSTOM = "You can view their updated profile by visiting this link<br>";
				$CUSTOM .= "<a href=".DB_DOMAIN."index.php?dll=profile&pId=".$_SESSION['uid'].">".DB_DOMAIN."index.php?dll=profile&pId=".$_SESSION['uid']."</a><br><br>";

				$EmailID=16; 
				$SendEmail=1;
			} 
		} break;
		case "account": {
			if(SEMAIL_UPDATE =="yes"){
				$data['custom'] .="<h1>".$_SESSION['username']." has updated their account</h1>";

				$CUSTOM = "You can view their updated profile by visiting this link<br>";
				$CUSTOM .= "<a href=".DB_DOMAIN."index.php?dll=profile&pId=".$_SESSION['uid'].">".DB_DOMAIN."index.php?dll=profile&pId=".$_SESSION['uid']."</a><br><br>";

				$EmailID=16; 
				$SendEmail=1;
			}
		} break;
		case "blog": {
			if(SEMAIL_BLOG =="yes"){
				$data['custom'] .="<h1>".$_SESSION['username']." Added A New Blog </h1>";
				$EmailID=16; 
				$SendEmail=1;
			}
		} break;
		case "groups": {
			if(SEMAIL_GROUPS =="yes"){
				$data['custom'] .="<h1>".$_SESSION['username']." Added A New Group </h1>";
				$EmailID=16; 
				$SendEmail=1;
			}
		} break;
		case "classads": {
			if(SEMAIL_CLASSADS =="yes"){
				$data['custom'] .="<h1>".$_SESSION['username']." Added A New Classifed Advert </h1>";
				$EmailID=16; 
				$SendEmail=1;
			}
		} break;
		case "calendar": {
			if(SEMAIL_CALENDAR =="yes"){
				$EmailID=16; 
				$SendEmail=1;
			}
		} break;
		case "gallery": {
			if(SEMAIL_FILES =="yes"){
				$data['custom'] .="<h1>".$_SESSION['username']." Uploaded A New File </h1>";
				$EmailID=16; 
				$SendEmail=1;
			}
		} break;
		case "login": {
			if(SEMAIL_LOGIN =="yes"){
				$data['custom'] .="<h1>".$_SESSION['username']." Just Logged In</h1>";
				$EmailID=16; 
				$SendEmail=1;
			}
		} break;
	}
	if($SendEmail ==1){
		// lets email the admin to let them know they have a new signup
		$data['email'] = ADMIN_EMAIL;
		$data['custom'] .= $CUSTOM;
 		$data['custom'] .= "IP: ".$_SERVER['REMOTE_ADDR'];
	 	$data['custom'] .="<p></p><p></p><p style='font-size:11px;'>You are recieving this email because you have selected to in the admin settings. </p><p  style='font-size:11px;'> If you dont wish to recieve these emails please login to your admin area and disable this setting under Settings  -> Email Settings.</p>";
//die(print_r($data).SEMAIL_TEMPLATE);
		SendTemplateMail($data, SEMAIL_TEMPLATE);





	global $DB;
	
	$data2 = $DB->Query("SELECT liveEmail, liveEdit, liveDelete, alerts, email FROM members_admin WHERE alerts = 'yes' ");
		
	while( $mydata = $DB->NextRow($data2) )
	{

		$data['email'] = $mydata['email'];
		$data['custom'] .= $CUSTOM;
 		$data['custom'] .= "IP: ".$_SERVER['REMOTE_ADDR'];
	 	$data['custom'] .="<p></p><p></p><p style='font-size:11px;'>You are recieving this email because you have selected to in the admin settings. </p><p  style='font-size:11px;'> If you dont wish to recieve these emails please login to your admin area and disable this setting under Settings  -> Email Settings.</p>";
//die(print_r($data).SEMAIL_TEMPLATE);
		SendTemplateMail($data, SEMAIL_TEMPLATE);


	}





	}
}
function ShowFCIDMEmber($id){
	$ReturnValue ="";
	if(!is_numeric($id)){ return ""; }
	if($id == $_SESSION['uid']){
		$ThisPersonsNetwork = $GLOBALS['MyProfile'];
	}else{
		$ThisPersonsNetwork = MemberAccountDetails($id,false);
	}	
	if(!empty($ThisPersonsNetwork)){
		$ReturnValue = '<div style="background:#E7FDCC; height:70px; border-bottom:1px solid #cccccc;">
		<table width="660"  border="0" style="margin-left:10px;">
		  <tr>
			<td width="77"><img src="'.$ThisPersonsNetwork['image'].'&x=48&y=48" width="48" height="48" class="img_border"  style="float:left;"> </td>
			<td width="437" style="line-height:30px;">
				<b>'.$ThisPersonsNetwork['username'].'</b> '.$ThisPersonsNetwork['status'].' 
				<br>'.$GLOBALS['_LANG']['_joined'].': '.ShowTimeSince($ThisPersonsNetwork['created']).', '.$GLOBALS['_LANG']['_updated'].': '.ShowTimeSince($ThisPersonsNetwork['updated']).'</td>
			<td width="132">
			<a href="'.DB_DOMAIN.'index.php?dll=profile&pId='.$ThisPersonsNetwork['uid'].'" class="NormBtn">  <img src="'.DB_DOMAIN.'images/DEFAULT/_acc/add.png" align="absmiddle">'.$GLOBALS['LANG_COMMON'][11].'</a>
		</td></tr></table></div>';
	}
	return $ReturnValue;
}
function BuildPageHomeMenu($SubSub_Lang, $page, $mobile="no"){
	if(!empty($SubSub_Lang)){
		print '<ul class="Acc_Heading_List">';
			$i=1; 
			foreach( $SubSub_Lang as $key => $value){ 
					if($page =="account" && $key =="video" && FLASH_VIDEO =="no"){ }
					elseif($page =="account" && $key =="comments" && D_COMMENTS =="0"){ }
					elseif($page =="account" && $key =="design" && D_DESIGNER =="0"){ }
					elseif($page =="settings" && $key =="sms" && UPGRADE_SMS !="yes"){ }
					elseif($page =="mobilesettings" && $key =="sms" && UPGRADE_SMS !="yes"){ }
					elseif($page =="messages" && $key =="wink" && D_WINK ==0){ }
					elseif($page =="mobilemessages" && $key =="wink" && D_WINK ==0){ }
					else{
						if(substr($key,-1,1) !="?" && $SubSub_Lang[$key.'_?'] !="" && $value !=""){ ## hide value if its a help value 

		$mytime=time();

							// print '<li class="s'.$i.'"><a href="index.php?dll='.$page.'&sub='.$key.'&ts='.$mytime.'">'.$value.'<span>'.$SubSub_Lang[$key.'_?'].'</span></a></li>';

if ($mobile == "yes") {
		print '<li class="s'.$i.'"><a href="mobile.php?dll='.$page.'&sub='.$key.'">'.$value.'<span>'.$SubSub_Lang[$key.'_?'].'</span></a></li>';	
}else{
		print '<li class="s'.$i.'"><a href="index.php?dll='.$page.'&sub='.$key.'">'.$value.'<span>'.$SubSub_Lang[$key.'_?'].'</span></a></li>';	
}
				


							$i++;
						}
				}
			}
		print '</ul>';
	}
}
function MakeCalendarMonth($month,$full=false){
	switch($month){
		case "01": { $ThisMonth = $GLOBALS['_LANG']['_january']; } break;
		case "02": { $ThisMonth =$GLOBALS['_LANG']['_febuary']; } break;
		case "03": { $ThisMonth =$GLOBALS['_LANG']['_march']; } break;
		case "04": { $ThisMonth =$GLOBALS['_LANG']['_april']; } break;
		case "05": { $ThisMonth =$GLOBALS['_LANG']['_may']; } break;
		case "06": { $ThisMonth =$GLOBALS['_LANG']['_june'];} break;
		case "07": { $ThisMonth =$GLOBALS['_LANG']['_july'];} break;
		case "08": { $ThisMonth =$GLOBALS['_LANG']['_august'];} break;
		case "09": { $ThisMonth =$GLOBALS['_LANG']['_september'];} break;
		case "10": { $ThisMonth =$GLOBALS['_LANG']['_october'];} break;
		case "11": { $ThisMonth =$GLOBALS['_LANG']['_november'];} break;
		case "12": { $ThisMonth =$GLOBALS['_LANG']['_december'];} break;
	}
	## language check
	if(isset($_SESSION['lang']) && $_SESSION['lang'] =="chinese"){
		return $ThisMonth;
	}else{
		if($full){
			return $ThisMonth;
		}else{
			return substr($ThisMonth,0,3);
		}
	}
}
function MakePageNumerDisplay($searchData, $CurrentPage, $videopage=false){
	## count total search data array
	$DataCounter = count($searchData); $totalRows=0;
	## find the total search result value
	if($videopage){
	if(isset($searchData[0]['TotalResults'])){ $totalRows = $searchData[0]['TotalResults']; }
	if(isset($searchData[1]['TotalResults'])){ $totalRows = $searchData[1]['TotalResults']; }
	if(isset($searchData[2]['TotalResults'])){ $totalRows = $searchData[2]['TotalResults']; }
	}else{
		if(!isset($searchData[$DataCounter]['TotalResults'])){ $searchData[$DataCounter]['TotalResults']=0; }
		$totalRows = $searchData[$DataCounter]['TotalResults'];
	}	
	## SEARCH NEXT / LAST BUTTONS					
	if($totalRows == SEARCH_PAGE_ROWS){ 
		$GLOBALS['total_pages']=1; 
	}else{
		$GLOBALS['total_pages'] = ceil($totalRows/SEARCH_PAGE_ROWS); 
	}
	## return page numbers
	if($totalRows < SEARCH_PAGE_ROWS){		
		return "<div id='PageNums'><a href='#' class='selected'> ".$GLOBALS['_LANG']['_page']." 1 ".$GLOBALS['_LANG']['_of']." 1 </a></div>";
	}else{
		return PageNumbers($totalRows, $CurrentPage,true);
	}
}	
	function StripDomain($var)
	{
		// COMPARE THE DOMAIN STRING AND REMOVE ANY URL DEPENDENCIES
		$LeftOvers = str_replace("http:","",str_replace("/","",str_replace($_SERVER['HTTP_HOST'],"",DB_DOMAIN)));
		if($var !=$LeftOvers){ return $var; }
	}
	function MakeLinkMOD($PageData, $which_way="out",$override=0){
	global $DB;
	$PageData= array_filter($PageData);
	$LinkString = "";
	$LinkSeperator = "/";
	$LinkExt = "/index.html";
	$clearMOD=array();
	$cleanMOD=array();
	$page="";
	$sub="";
	$Val1="";
	$Val2="";
	if(empty($PageData)){ return ""; }
	if(D_MOD_WRITE ==0 ||$override ==1){
		// BUILD NORMAL LINK STYLE
		// REQUIES THREE VARIABLES
		// PAGE
		// SUB PAGE
		// ITEM ID
		$LinkString    .= (isset($PageData['page']))	?	"index.php?dll=".strip_tags($PageData['page'])		:'';
		$LinkString    .= (isset($PageData['sub']))		?	"&sub=".strip_tags($PageData['sub'])				:'';
		$LinkString    .= (isset($PageData['id1']))		?	"&item_id=".strip_tags($PageData['id1'])			:'';
		$LinkString    .= (isset($PageData['id2']))		?	"&item2_id=".strip_tags($PageData['id2'])			:'';
		$LinkString    .= (isset($PageData['id3']))		?	"&item3_id=".strip_tags($PageData['id3'])			:''; // view files
		// PATCH FOR ADMIN WITH 0 ID
		if(!isset($PageData['id1']) && isset($PageData['id2'])){
		$LinkString    .= "&item_id=0"; 
		}
		$mytime=time();
		//$LinkString .= '&ts=';
		//$LinkString .= $mytime;
		return $LinkString;
	}else{
		if($which_way =="in"){
			// THIS IS TAKING AN ARRAY FROM THE URL REQUEST
			// LETS CLEAN THE STRINGS
			$PageData = array_filter($PageData,StripDomain);
			$StoreArray = $PageData;
 			sort($PageData); // reindex the array
			if ( count($PageData) == 1 && strpos($PageData[0], "&") === false) {
				// this is a main ddl page only, no subpage included in the string
				if(strpos($PageData[0], ".") === false && ( $PageData[0] !="index.php" && $PageData[0] != "index.html" ) ){
					// check for username string
					$RSQL = "SELECT id FROM members WHERE username = ('".eMeetingInput(trim($PageData[0]))."') LIMIT 1"; 
					$Found = $DB->Row($RSQL);
					if (!empty($Found)){ 
					$PageData['page']="profile";
					$PageData['item_id']=$Found['id'];
					}else{ $PageData['page']="index"; }
				}else{
					$PageData['page'] = str_replace("index.php?dll=","",array_shift($PageData));
					$PageData['page'] = str_replace("index.html","",$PageData['page']);
				}
				return $PageData;
			}elseif( count($PageData) == 1 ){
			}else{			
			$PageData = $StoreArray;
				foreach($PageData as $value){
					$innerBits = explode("&",$value);		 
					if($value !="" && $innerBits[0] !=""){
						if($innerBits[1] !=""){
							$innerBits[0] =  str_replace("index.php?dll=","",$innerBits[0]);
							array_push($clearMOD,$innerBits[0]);
							$innerBits[1] = str_replace("sub=","",$innerBits[1]); 
							array_push($clearMOD,$innerBits[1]);
						}else{
							array_push($clearMOD,$value);
						}
					}
				}
				// NOW WE HAVE A CLEAN STRING ARRAY
				if(isset($clearMOD[0]) && strlen($clearMOD[0]) > 1 && $clearMOD[0] !="index.php"){ $cleanMOD['page'] = $clearMOD[0]; }
				if(isset($clearMOD[1]) && $clearMOD[1] !=""){ $cleanMOD['sub'] = $clearMOD[1]; }
				if(isset($clearMOD[2]) && $clearMOD[2] !="" && $clearMOD[2] != str_replace("/","",$LinkExt) ){ $cleanMOD['item_id'] = $clearMOD[2]; }
				return $cleanMOD;
			}
		}else{
			// LETS MAKE A NEW LINK 
			if(isset($PageData['system'])){ // skip auto checker
				if(isset($PageData['sub'])){ $sub.= DB_DOMAIN.$LinkSeperator.$PageData['sub']; }

				if(isset($PageData['id1'])){ $sub.= $LinkSeperator.$PageData['id1']; }
				else { 
					$PageData['id1']  = 1; 
					$sub.= $LinkSeperator.$PageData['id1']; }


				if(isset($PageData['name'])){ $sub.= $LinkSeperator.str_replace(" ","-",str_replace("\'","",$PageData['name'])); }
				## build string
				$LinkString = $PageData['page'].$sub;
				return str_replace("//","/",$LinkString).$LinkExt;
			}	
				$page = str_replace("index.php?dll=","",$PageData['page']);
				$page = str_replace("index","",$page);
				## does the page contain links?
				$pageBits = explode("&sub=",$page);
				if(!empty($pageBits) && $pageBits[0] !=""){					
					if(isset($pageBits[0]) && strlen($pageBits[0]) > 1){ $page = $pageBits[0];  }
					if(isset($pageBits[1]) && strlen($pageBits[1]) > 1){ $sub = $pageBits[1];   $page .=$LinkSeperator;}
				}
				if(isset($PageData['sub'])){ $sub.= $LinkSeperator.$PageData['sub']; }

				if(isset($PageData['id1'])){ $sub.= $LinkSeperator.$PageData['id1']; }
				else { 
					$PageData['id1']  = 0; 
					$sub.= $LinkSeperator.$PageData['id1']; }


				if(isset($PageData['id2'])){ $sub.= $LinkSeperator.$PageData['id2']; }
				if(isset($PageData['id3'])){ $sub.= $LinkSeperator.$PageData['id3']; }
				if(isset($PageData['name'])){ $sub.= $LinkSeperator.StripModLinkBad($PageData['name']); }
				## build string
				$LinkString = $page.$sub;
			 	$FinalLink = DB_DOMAIN.$LinkString.$LinkExt;
				//$mytime=time();
				//$FinalLink .= '?ts=';
				//$FinalLink .= $mytime;
				$FinalLink = str_replace("/&dll=account","/view",$FinalLink);
				$FinalLink = str_replace("//0","/",$FinalLink);
				$FinalLink = str_replace("account/&dll=gallery","gallery/manage",$FinalLink);
				return str_replace("//index.html","/",str_replace("read","inbox",$FinalLink));
		}
	}
	}
 /**
	 * Info: eMeeting clever settings
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function session_clever_defaults() {
		if(MAPS_ID !="" && $_SERVER['REMOTE_ADDR'] !="127.0.0.1" && !isset($_SESSION['clever_ip_country']) ){
			$exe_data = explode(",",ValidateExternalCountry($_SERVER['REMOTE_ADDR']));
			if(isset($exe_data[4])){
			$reg_long=$exe_data[4]; 
			$reg_lat=$exe_data[3]; 
			$reg_country=$exe_data[2]; 
			$reg_code=$exe_data[0];
			$_SESSION['clever_ip_long']	 	= $reg_long;
			$_SESSION['clever_ip_lat'] 		= $reg_lat;
			$_SESSION['clever_ip_country'] 	= $reg_country;
			$_SESSION['clever_ip_country_name'] = GetCountryFromCode($reg_code);
			$_SESSION['clever_ip_code'] 	= $reg_code;
			}else{
			$_SESSION['clever_ip_country'] ="";
			}
		}
	}
	function GetCountryFromCode($Code){
		switch(strtoupper(trim($Code))){
			case "GB": { return "United Kingdom"; } break;
			case "US": { return "United States"; } break;
			case "CA": { return "Canada"; } break;
			case "MX": { return "Mexico"; } break;
			case "SE": { return "Sweden"; } break;
			case "IT": { return "Italy"; } break;
			case "PR": { return "Puerto Rico"; } break;
			case "VI": { return "Virgin Islands, U.S."; } break;
			case "DE": { return "Germany"; } break;
			case "IR": { return "Iran, Islamic Republic of"; } break;
			case "BO": { return "Bolivia"; } break;
			case "FR": { return "France"; } break;
			case "IL": { return "Israel"; } break;
			case "ES": { return "Spain"; } break;
			case "A2": { return "Satellite Provider"; } break;
			case "AR": { return "Argentina"; } break;
			case "BS": { return "Bahamas"; } break;
			case "DM": { return "Dominica"; } break;
			case "BZ": { return "Belize"; } break;
			case "GA": { return "Gabon"; } break;
			case "ZA": { return "South Africa"; } break;
			case "EG": { return "Egypt"; } break;
			case "NA": { return "Namibia"; } break;
			case "ZW": { return "Zimbabwe"; } break;
			case "GH": { return "Ghana"; } break;
			case "CG": { return "Congo"; } break;
			case "MW": { return "Malawi"; } break;
			case "KE": { return "Kenya"; } break;
			case "AO": { return "Angola"; } break;
			case "SL": { return "Sierra Leone"; } break;
			case "LS": { return "Lesotho"; } break;
			case "SC": { return "Seychelles"; } break;
			case "KM": { return "Comoros"; } break;
			case "TZ": { return "Tanzania, United Republic of"; } break;
			case "RW": { return "Rwanda"; } break;
			case "CI": { return "Cote D'Ivoire"; } break;
			case "UG": { return "Uganda"; } break;
			case "SZ": { return "Swaziland"; } break;
			case "BF": { return "Burkina Faso"; } break;
			case "TG": { return "Togo"; } break;
			case "LY": { return "Libyan Arab Jamahiriya"; } break;
			case "SN": { return "Senegal"; } break;
			case "IN": { return "India"; } break;
			case "JP": { return "Japan"; } break;
			case "CN": { return "China"; } break;
			case "VN": { return "Vietnam"; } break;
			case "TH": { return "Thailand"; } break;
		} 
		return $Code;
	}
	 /**
	 * Info: eMeeting default sessions
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function session_defaults() {
		$_SESSION['auth'] = "no";
		$_SESSION['uid'] = -1;
		$_SESSION['username'] = 'Guest';
		$_SESSION['cookie'] = 0;
		$_SESSION['remember'] = false;
		$_SESSION['packageid'] = 7;
		$_SESSION['genderid'] = 0;
		$_SESSION['site_moderator']='no';
		$_SESSION['pack_adult']='no';
		return ;
	}
	function setSession(&$values, $remember, $visible, $init = true) {
		/*
			THIS FUNCTION SETS THE MEMBERS SESSIONS
			ALSO THE MEMBERS IP IS LOGGED WITH DATE AND TIME
		*/
		global $DB;
	   $_SESSION['uid'] 			= $values['id'];
	   $_SESSION['username'] 		= eMeetingOutput($values['username']);
	   $_SESSION['auth'] 			= "yes";
	   $_SESSION['packageid'] 		= $values['packageid'];
	   $_SESSION['lastlogin'] 		= $values['lastlogin'];
	   $_SESSION['lang'] 			= $values['Language'];   
	   $_SESSION['remember']		= $remember;
	   $_SESSION['site_moderator'] 	= $values['moderator'];	   
		if($values['moderator'] =="yes"){
		## ADD EXTRA SESSIONS FOR ADMIN MODERATOR
			$data = $DB->Row("SELECT liveEmail, liveEdit, liveDelete FROM members_admin WHERE username='".eMeetingOutput($values['username'])."' LIMIT 1");
			$_SESSION['site_moderator_approve'] = $data['liveEmail'];
			$_SESSION['site_moderator_edit'] 	= $data['liveEdit'];
			$_SESSION['site_moderator_delete'] 	= $data['liveDelete'];
		}
	   // MEMBER ACCOUNT PACKAGE DATA
	   $_SESSION['pack_adult'] 			= $values['view_adult'];
	   $_SESSION['pack_name'] 			= $values['name'];
	   $_SESSION['pack_winks'] 			= $values['wink'];
	   $_SESSION['pack_highlight'] 		= $values['Highlighted'];
	   $_SESSION['pack_messages'] 		= $values['maxMessage'];
	   $_SESSION['pack_files'] 			= $values['maxFiles'];
	   $_SESSION['pack_featured'] 		= $values['Featured']; 
	   $_SESSION['genderid'] 			= $values['genderD'];   
	   if ($init) {
		  $session = session_id();	 
	  		if($visible==1){$nv ="no";}else{$nv ="yes";}
			if(is_numeric($values['id']) && $values['id'] !=0){
				$sql = "UPDATE members SET session = '$session', ip = '".$_SERVER['REMOTE_ADDR']."' , lastlogin='".DATE_TIME."' WHERE id = ( '".$values['id']."' ) LIMIT 1";
				$DB->Update($sql);
			}
	   	}
		return;
	}
	function checkRemembered($cookie) {
		global $DB;
		if(!isset($cookie['username']) || !isset($cookie['uid'])){
			return;
		}
		$cookie_username = strip_tags(trim($cookie['username']));
		$cookie_userid = strip_tags(trim($cookie['uid']));	
		if (!$cookie_username or !$cookie_userid) return;
		$sql = "SELECT members_data.gender AS genderD, package.view_adult, package.name, package.wink, members.moderator, package.Highlighted, package.Featured, package.maxMessage, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members
					INNER JOIN members_privacy ON ( members.id = members_privacy.uid ) 
					LEFT JOIN package ON ( members.packageid = package.pid )
					LEFT JOIN members_data ON ( members.id = members_data.uid )		
					WHERE (members.username = '".$cookie_username."') LIMIT 1";
		$result = $DB->Row($sql);
		if (!empty($result) ) {
			// update sessions
			   $_SESSION['uid'] 				= $cookie_userid;
			   $_SESSION['username'] 			= eMeetingOutput($result['username']);
			   $_SESSION['auth'] 				= "yes";
			   $_SESSION['remember'] 			= true;
			   $_SESSION['packageid'] 			= $result['packageid'];
			   $_SESSION['lastlogin'] 			= $result['lastlogin'];
			   $_SESSION['lang'] 				= $result['Language']; 
			   $_SESSION['site_moderator'] 		= $result['moderator'];
			   // MEMBER ACCOUNT PACKAGE DATA
				if($values['moderator'] =="yes"){
				## ADD EXTRA SESSIONS FOR ADMIN MODERATOR
					$data = $DB->Row("SELECT liveEmail, liveEdit, liveDelete FROM members_admin WHERE username='".eMeetingOutput($values['username'])."' LIMIT 1");
					$_SESSION['site_moderator_approve'] = $data['liveEmail'];
					$_SESSION['site_moderator_edit'] 	= $data['liveEdit'];
					$_SESSION['site_moderator_delete'] 	= $data['liveDelete'];
				}
 			   $_SESSION['pack_adult'] 			= $result['view_adult'];
			   $_SESSION['pack_name'] 			= $result['name'];
			   $_SESSION['pack_winks'] 			= $result['wink'];
			   $_SESSION['pack_highlight'] 		= $result['Highlighted'];
			   $_SESSION['pack_messages'] 		= $result['maxMessage'];
			   $_SESSION['pack_files'] 			= $result['maxFiles'];
			   $_SESSION['pack_featured'] 		= $result['Featured']; 
			   $_SESSION['genderid'] 			= $result['genderD']; 
		}
		return;
	}
	 /**
	 * Info: eMeeting Strip HTML
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function striphtml ($text) {
		$search = array ("'<script[^>]*?>.*?</script>'si",  // Strip out javascript
						 "'<[\/\!]*?[^<>]*?>'si",           // Strip out HTML tags
						 "'([\r\n])[\s]+'",                 // Strip out white space
						 "'&(quot|#34);'i",                 // Replace HTML entities
						 "'&(amp|#38);'i",
						 "'&(lt|#60);'i",
						 "'&(gt|#62);'i",
						 "'&(nbsp|#160);'i",
						 "'&(iexcl|#161);'i",
						 "'&(cent|#162);'i",
						 "'&(pound|#163);'i",
						 "'&(copy|#169);'i",
						 "'&#(\d+);'e");                    // evaluate as php
		$replace = array ("",
						  "",
						  "\\1",
						  "\"",
						  "&",
						  "<",
						  ">",
						  " ",
						  chr(161),
						  chr(162),
						  chr(163),
						  chr(169),
						  "chr(\\1)");
		$text = preg_replace($search, $replace, $text);
		return $text;
	}
	 /**
	 * Info: eMeeting Input and Output checking
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function eMeetingOutput($output, $forceInt = false) 
	{
		 if (is_numeric($output)) 
		  { 
			  return $output; 
		  }	
		if($forceInt){
			$order = array("\r\n", "\n", "\r", "\\r\\n", "\\n", "\\r");
			$replace ="\n";
			$output = str_replace($order, $replace, $output); 
			$haupt = stripslashes(stripslashes($output));
			return $haupt;
		}else{
			$output = striphtml($output);
			if ( function_exists('mb_convert_encoding') ) {
				return @stripslashes(stripslashes($output)); //return @stripslashes(mb_convert_encoding($output,$GLOBALS['_META']['_charset'],"auto"));//"UTF-8"
			}else{
				return @stripslashes(stripslashes($output));
			}
		}			
	}
	function eMeetingInput($input, $forceInt = false) 
	{ 
		  if (is_numeric($input)) 
		  { 
			  return $input; 
		  } 
		## convert the input variable into a MySQL safe string. 
		if (phpversion() >= '4.3.0') {
			if(DB_BASE ==""){ // dont use mysql connection if no mysql is set
						$input = trim(strip_tags($input));
			}else{
					$input = is_array($input) ? array_map('mysql_real_escape_string', $input) : mysql_real_escape_string($input);
			}			
		} else {
			$input = mysql_escape_string($input); 
		} 	  
	return $input; 
	} 
	 /**
	 * Info: eMeeting Menu Bar Dynamic Content
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */ 
	function MenuDisplayBox($page,$sub="",$Limit=MATCH_PAGE_ROWS){
		global $DB;
		## define page functions
		$DataArray = array(); $i=1; $DoData=array();
		if($_SESSION['auth'] !="yes"){ return $DataArray; }
		## call page function	
		switch($page){
			case "groups": { // groups page
				$DoData = DisplyRecentGroups($Limit);
				//$linkStr = "index.php?dll=groups&sub=show&gid=[id]";
			} break;
			case "videos": { // videos page
				$DoData = DisplayRecentVideos($Limit);
				//$linkStr = "index.php?dll=videos&sub=view&id=[id]";
			} break;
			case "blog": {
				$DoData =DisplayRecentBlogs($Limit);
			} break;
			case "overview": {  $DoData = DisplayFeaturedMembers(10,4); } break;  
			case "search": { $DoData = DisplayFeaturedMembers(12,4); } break;
			case "music": { }
			case "account": {  		
			 // search page
				$DoData = DisplayFeaturedMembers($Limit,1);
				//$linkStr = "index.php?dll=profile&pId=[uid]";
			} break;
			case "calendar": { // events page
				$DoData = DisplayRecentEvents($Limit);
				//$linkStr = "index.php?dll=calendar&sub=view&eventid=[id]";
			} break;
			case "games": { // games page
				$DoData = DisplayRecentGames($Limit); 
				//$linkStr = "index.php?dll=games&sub=play&play=[id]";
			} break;
			case "forum": { // forum page
				$DoData = DisplayForumPosts($Limit);
				//$linkStr = 'inc/exe/forum/index.php?&action=vthread&forum=[uid]&topic=[id]" target="ListFrame';
			} break;
			case "gallery": { // photos page
				$DoData = DisplayRecentPhotoAlbums($Limit);
				//$linkStr = "index.php?dll=profile&sub=manage&aid=[id]&pId=[uid]";
			} break;
			case "classads": { // photos page
				$DoData = DisplayRecentAdverts($Limit);
				//$linkStr = "index.php?dll=classads&id=[id]";
			} break;
			case "profile": { // profile page
				switch($sub){
					case "blogview":{ $DoData =DisplayRecentBlogs($Limit); } break;
					case "manage":{ $DoData = DisplayRecentPhotoAlbums($Limit); } break;
					case "viewfile":{ $DoData = DisplayRecentPhotoAlbums($Limit); } break;
					default : { 
						//if(isset($_GET['item_id']) && is_numeric($_GET['item_id'])){			
							if(D_PROFILERATING ==1){
							$DoData = DisplayFeaturedMembers($Limit,3);	
							}else{		
							$DoData = DisplayFeaturedMembers($Limit,1);	
							}
						//}
					} break;
				}
			} break;
			default: {  } break;
		}
		## make data
		if(is_array($DoData)){
			foreach( $DoData as $value){
				//$DoData = @array_map('eMeetingOutput',strip_tags($value));
				$DataArray[$i]['id']  = $value['id'];
				if(isset($value['uid'])){ $DataArray[$i]['uid'] = $value['uid']; }
				if(isset($value['title'])){ $DataArray[$i]['title'] = strip_tags($value['title']); }
				$DataArray[$i]['description'] = substr(strip_tags($value['description']),0,50)."..";
				$DataArray[$i]['image'] = $value['image'];
				if(isset($value['link'])){ $DataArray[$i]['link'] = $value['link']; }
				//$DataArray[$i]['link'] = str_replace("[id]",$value['id'],$linkStr);
				//$DataArray[$i]['link'] = str_replace("[uid]",$value['uid'],$DataArray[$i]['link']);
				$i++;
			}
		}
		## return data
		return $DataArray;
	}
	 /**
	 * Info: eMeeting Comments Box
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	/*
		PARAMERTS: 
		1: width of display box
		2: page
		3: sub page
		4: user created id
		5: item id
		6: extra id 1
		7: extra id 2
	*/
	function displayCommentsBox($width, $page, $sub, $id1, $id2, $id3, $id4, $show = true, $follow=false, $showamount=20){
	if(D_COMMENTS ==1){
		if($id1 ==""){ $id1=0; }
		if($id2 ==""){ $id2=0; }
		global $DB;
		$i=1; $ReturnData="";
		## get comments data
		$CommentsData = DisplayWebsiteComments($page, $sub ,$width, $id1, $id2, $id3, $id4, $follow,$showamount);
		if($follow){
			print '<div id="eMeetingCommentsBox"  style="display:visible;"></div><span id="response_eMeetingComments" class="response_alert"></span>';
		}
		if(!$follow){
				print '<div style="font-size:12px; padding:4px; border-bottom:1px solid #ccc; margin-bottom:20px;"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/comments.png" align="absmiddle"> '.count($CommentsData).' '.$GLOBALS['_LANG']['_comments'].'</div>';
		}else{
			print "<br>";
		}
		 if(!empty($CommentsData)){ 
				$i=1;	
				foreach($CommentsData as $comment){ 	if(!isset($comment['id'])){ $comment['id']=$i; }
						print '<div class="topic_reply" id="delCom_'.$comment['id'].'" style="';
						if($follow && $comment['ex3_id'] !=0){ print 'margin-left:0px;'; }else{ print 'margin-left:-10px;'; }
						print '"><div class="topic_reply_av">
						<div class="pic50"><a href="'.$comment['link'].'"><img src="'.$comment['image'].'" alt="'.$comment['username'].'"  class="img_border" width="48" height="48"/></a></div>
						</div>
						<div class="topic_reply_info" style="width:'.$width.'px;">
						<div class="reply_topic"';
						if($follow && $comment['ex3_id'] !=0){ print 'style="background:#FFDCE0;"'; }
						print '><strong>'.nl2br($comment['comments']).'</strong><br />
						</div>
						<div class="margin5 grey12">
						<div class="floatl" style="font-size:11px"><a href="'.$comment['link'].'">'.$comment['username'].'</a> posted on '.$comment['date'].' @ '.$comment['time'].' </div>
						<div class="floatr">';
						## display delete functions for owner
						if($_SESSION['uid'] == $comment['uid']){
							print '<a href="javascript:void(0)" onClick="eMeetingCommentsDelete(\''.$page.'\', \''.$comment['id'].'\',\''.$sub.'\'); Effect.Fade(\'delCom_'.$comment['id'].'\'); return false;" style="text-decoration:none"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/cancel.png" align="absmiddle"> '.$GLOBALS['_LANG']['_delete'].' </a>';
						}
						## display delete functions for moderator
						if( isset($_SESSION['site_moderator_delete']) && $_SESSION['site_moderator_delete']=="yes" ){
							print '<a href="javascript:void(0)" onClick="AdminLiveDelete(\''.$comment['id'].'\', \'comments\', \''.$sub.'\'); Effect.Fade(\'delCom_'.$comment['id'].'\'); return false;" style="text-decoration:none"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/cancel.png" align="absmiddle"> '.$GLOBALS['_LANG']['_delete'].' </a>';
						}	
						// DISPLAY FOLLOW BOX
						if($follow && $_SESSION['auth'] =="yes"){
						print '<a href="javascript:void(0)" onClick="Effect.toggle(\'FollowDiv'.$i.'\'); ChangeFollowId('.$comment['uid'].',\'followID'.$i.'\'); return false;">Reply to follow</a>';
						}
						print '</div><div class="clear"></div></div></div><div class="clear"></div></div>';
						if($follow){
						print "<div style='display:none;' id='FollowDiv".$i."'><div align='center' style='padding:5px; background:#cccccc;'>
						<form method=\"post\" action=\"index.php\" onsubmit=\"eMeetingComments('@".$comment['username'].": '+eMeetingCommentsForm".$i.".comments.value, 'follow','".$_SESSION['uid']."',eMeetingCommentsForm".$i.".followID".$i.".value,'".str_replace("&x=48&y=48","",str_replace(DB_DOMAIN."inc/tb.php?src=","",$GLOBALS['MyProfile']['image']))."','500','overview','0','99','Please complete all the fields'); return false;\" target=\"_MakeComments\" name=\"eMeetingCommentsForm".$i."\">
						<input type='hidden' name='followID".$i."' id='followID".$i."' value=''>
						<b>Enter Reply:</b></a> <input type='text' name='comments' id='ThisComment".$i."' class='input' style='width:300px;'><input name='' value='Save' type='submit' class='NormBtn'></form> </div> </div>";
						}
					$i++; } 		
		 } 
					if($follow){
					print "<input type='hidden' name='comments' id='ThisComment' value='not used only for value checking' class='hidden'>";
					}
					print '<span id="response_eMeetingCommentsDelete" class="response_alert"></span>';
		## make comments box
		if($_SESSION['auth'] =="yes" && $show == true){
		print '
		<iframe id="_MakeComments" name="_MakeComments" style="background:#ffffff; height:1px;border:0px" scrolling="no" frameborder="0"></iframe>
		<div id="eMeetingCommentsBox"  style="display:visible;">
		<form method="post" action="index.php" onsubmit="eMeetingComments(eMeetingCommentsForm.comments.value, \''.$page.'\',\''.$id1.'\',\''.$id2.'\',\''.get_string_between($GLOBALS['MyProfile']['image'],"src=","&").'\',\''.$width.'\',\''.$sub.'\',\''.$id3.'\',\''.$id4.'\',\''.$GLOBALS['_LANG_ERROR']['_incomplete'].'\'); return false;" target="_MakeComments" name="eMeetingCommentsForm">
		<!--<input name="id1" type="hidden" value="'.$id1.'" class="hidden">
		<input name="id2" type="hidden" value="'.$id2.'" class="hidden">
		<input name="id3" type="hidden" value="'.$id3.'" class="hidden">
		<input name="id4" type="hidden" value="'.$id4.'" class="hidden">-->
		';
			$bwidth = $width+60;
			print '<a name="#commentsbox"></a><textarea name="comments" id="ThisComment" style="width:'.$bwidth.'px;height:80px;" class="input"></textarea><br><br>
			<input name="" type="submit" class="NormBtn" value="'.$GLOBALS['_LANG']['_submit'].'"> 
			</form><div class="ClearAll"></div><br> <hr>
		</div><span id="response_eMeetingComments" class="response_alert"></span>';
		}
		## display comments code
		print $ReturnData;
		}
	}
/**
* Info: Checks the user is logged in
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function get_string_between($string, $start, $end){
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);   
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
}
function MustBeLoggedIn($mobile="no"){
   if($_SESSION['auth'] !="yes"){

     if ($mobile == "yes") {
		header("location: ".DB_DOMAIN."mobile.php");	
     }else{
		header("location: ".DB_DOMAIN."index.php?dll=login&errorid=".$GLOBALS['LANG_AJAX']['6']."**1");	
     }

   }
}
/**
* Info: This function ads new tags to the database
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function AddTag($page, $keyword){
	global $DB;
	## make an array of tags
   // $DB->Insert("INSERT INTO `tag_cloud` (`page`, `keyword`) VALUES ('".eMeetingInput($page)."', '".eMeetingInput($keyword)."')");
	return;
}
/**
* Info: This function makes the tag cloud
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function MakeCloud($page, $limit=25){
	global $DB;	
  	$ReturnValue = "";
	$randomWords = array();
	$tag_cloud_array = array('music','search','groups','calendar','gallery','videos');
	if(!in_array($page,$tag_cloud_array)){ $page="groups"; } // default page
	## make array for sizes
	srand((float) microtime() * 10000000);
	$input = array("1", "2", "3", "4", "5", "6", "7", "8", "0", "1", "2", "3", "4", "5", "6", "7", "8", "0" );
	$rand_keys = array_rand($input, 6); // 6 is the number of words u want to be different sizes
	## make an array of tags
    $result = $DB->Query("SELECT keyword FROM tag_cloud WHERE page = ( '".strip_tags(trim($page))."' ) GROUP BY keyword ORDER BY RAND() LIMIT ".$limit);
	## make sure its not empty
	if(!empty($result)){
		require_once(	str_replace("func","",dirname(__FILE__))."/classes/class_tags.php"			);
		$cloud = new wordCloud();
		## loop tags
		$tagi=0;
		while( $tag = $DB->NextRow($result) )
		{	
			$cloud->addWord($tag['keyword'], $input[$rand_keys[$tagi]]);
			$tagi++;
		}
		$cloud->addWord(" ",1);
		$myCloud = $cloud->showCloud("array");
		foreach ($myCloud as $key => $value) {
			## make page string
			switch($page){
				case "search":{ $ThisLink="href='javascript:void(0);' onClick=\"DoTagSearch('".$value['word']."');return false;\""; } break;
				case "groups":{ $ThisLink="href='index.php?do_page=groups&sub=search&keyword=".$value['word']."'"; } break;
				case "calendar":{ $ThisLink="href='index.php?do_page=calendar&sub=events&keyword=".$value['word']."'"; } break;
				case "gallery":{ $ThisLink="href='index.php?do_page=gallery&sub=search&gid=2&keyword=".$value['word']."'"; } break;
				case "music":{ $ThisLink="href='index.php?do_page=music&sub=search&gid=2&keyword=".$value['word']."'"; } break;
			}
			$ReturnValue .= ' <a '.$ThisLink.' style="font-size: 1.'.$value['sizeRange'].'em">'.$value['word'].'</a> &nbsp;';
		}
	}
	## return string
	return $ReturnValue;
}
/**
* Info: Adds an event log to the database to follow members activities
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function AddEventSystemLog($username,$type, $page="", $sub="", $value1="", $value2="",$value3=""){
	global $DB;	
	if($page !=""){
		$DB->Insert("INSERT INTO `system_log` (`username` , to_uid, `date` ,`time` ,`value` , value2, `ip` ,`type`,page, sub) 
		VALUES ('".eMeetingInput($username)."', '".$value1."', '".DATE_NOW."', '".TIME_NOW."', '".eMeetingInput($value2)."' , '".eMeetingInput($value3)."', '".$_SERVER['REMOTE_ADDR']."', '".eMeetingInput($type)."','".$page."','".$sub."')");
	}
}
/**
* Info: Gets the Meta Tags for the viewing page
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function GetMetaTags($page, $sub, $defaultTitle="", $data="", $homePage=false){
 // die(print_r($data));
	global $DB;
	$Meta_Data =array();
	// home page detection
	if($homePage){
		$Meta_Data['title'] 		= HOME_TITLE;
		$Meta_Data['description'] 	= HOME_DESC;
		$Meta_Data['keywords']		= HOME_KEYWORDS;
		return $Meta_Data;
	}
	//set the length of keywords you like
	$meta['title'] ="";
	$meta['description'] ="";
	$meta['content'] ="";
	$meta['min_word_length'] = 3;  //minimum length of single words
	$meta['min_word_occur'] = 1;  //minimum occur of single words
	$meta['min_2words_length'] = 3;  //minimum length of words for 2 word phrases
	$meta['min_2words_phrase_length'] = 10; //minimum length of 2 word phrases
	$meta['min_2words_phrase_occur'] = 2; //minimum occur of 2 words phrase
	$meta['min_3words_length'] = 3;  //minimum length of words for 3 word phrases
	$meta['min_3words_phrase_length'] = 10; //minimum length of 3 word phrases
	$meta['min_3words_phrase_occur'] = 2; //minimum occur of 3 words phrase
	// AUTO CREATE DESCRIPTION KEYWORDS
	if(isset($data)){
		if(isset($data['username']) && $page !="profile"){			 
			$meta['title'] .= $data['username']." - ";
		}
		if(isset($data['name'])){
			if(strlen($defaultTitle) > 1){ $defaultTitle = $defaultTitle." - "; }
			if($page =="profile"){
			$meta['title'] .= $data['username']." - ";
			}else{
			$meta['title'] .= $data['name']." - ";
			}
		}
		if(isset($data['title'])){
			$defaultTitle="";
			$meta['title'] .= $data['title'];
		}
		if(isset($data['headline'])){
			$meta['title'] .= $data['headline'];
		}
		if(isset($data['comments'])){
			$meta['content'] 	 .= strip_tags($data['comments']);
			$meta['description'] .= strip_tags(substr($data['comments'],0,255));
		}
		if(isset($data['description'])){
			$meta['content'] 		.= strip_tags($data['description']);
			$meta['description'] 	.= strip_tags(substr($data['description'],0,255));
		}		
		if(isset($data['desc']) && strlen($data['desc']) > 10 ){
			$meta['content'] 		.= strip_tags($data['desc']);
			$meta['description'] 	.= strip_tags(substr($data['desc'],0,255));
		}		
		// CREATE TAGS FROM VIDEO TAGS
		if(isset($data['tags']) && strlen($data['tags']) > 10 ){
			$meta['keywords'] = $data['tags'];
		}
	}
	// MAKE  KEYWORD OUTPUT
	if(strlen($meta['content']) > 10 && $Meta_Data['keywords'] ==""){
		if(function_exists('mb_internal_encoding')){
			$keyword = new autokeyword($meta, $GLOBALS['_META']['_charset']);//"utf-8"
			$Meta_Data['keywords'] 		= trim($keyword->get_keywords());
		}
	}else{
	}
	$Meta_Data['keywords']		= SEO_PREFIX_KEYWORDS.$Meta_Data['keywords'];
	$Meta_Data['title'] 		= SEO_PREFIX_TITLE.trim($defaultTitle .$meta['title']);
	$Meta_Data['description'] 	= SEO_PREFIX_DESC.trim($meta['description']);
	// CHECK FOR BLANKS
	if($Meta_Data['title'] ==""){ $Meta_Data['title'] = HOME_TITLE; }
	if($Meta_Data['description'] ==""){ $Meta_Data['description'] = HOME_DESC; }
	if($Meta_Data['keywords'] ==""){ $Meta_Data['keywords'] = HOME_KEYWORDS; }
	return $Meta_Data;
}
/**
* Info: Displays at the top of the member pages, displays the recent activity bar
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function RecentMemberActivity($limit=10,$extra="AND s.type !='logout'",$startsLimit=0){
	global $DB;
	## define variables
	$dd=array(); $count=1; $msgString =array();
	## create array of message strings
	$msgString[1] = $GLOBALS['LANG_GLO_OPTIONS']['23'];
	$msgString[2] = $GLOBALS['LANG_GLO_OPTIONS']['24'];
	$msgString[3] = $GLOBALS['LANG_GLO_OPTIONS']['25'];
	$msgString[4] = $GLOBALS['LANG_GLO_OPTIONS']['26'];
	$msgString[5] = $GLOBALS['LANG_GLO_OPTIONS']['27'];
	$msgString[6] = $GLOBALS['LANG_GLO_OPTIONS']['28'];
	$msgString[7] = $GLOBALS['LANG_GLO_OPTIONS']['29'];
	$msgString[8] = $GLOBALS['LANG_GLO_OPTIONS']['30'];
	$msgString[9] = $GLOBALS['LANG_GLO_OPTIONS']['31'];
	$msgString[10] = $GLOBALS['LANG_GLO_OPTIONS']['32'];
	$msgString[11] = $GLOBALS['LANG_GLO_OPTIONS']['33'];
	$msgString[12] = $GLOBALS['LANG_GLO_OPTIONS']['34'];
    $result = $DB->Query("SELECT s.* FROM system_log s, members m WHERE m.username = s.username AND m.active='active' AND m.visible = 'yes' AND m.activate_code='OK' AND s.username !='' AND s.value !='' $extra GROUP BY s.username,s.type,s.value2 ORDER BY s.id DESC LIMIT ".$startsLimit.",".$limit);
    while( $Data = $DB->NextRow($result) )
    {
		$result1 = $DB->Row("SELECT files.uid, files.adult_content, files.approved, files.bigimage,files.aid, files.type FROM files, members WHERE files.uid = members.id AND members.username= ( '".$Data['username']."' ) AND files.type='photo' AND files.default LIKE '%1%' LIMIT 1");
		$dd[$count]['username'] 	= $Data['username'];
		$dd[$count]['date'] 		= $Data['date']." ".$Data['time'];
		$dd[$count]['time'] 		= $Data['time'];
		$dd[$count]['ip'] 			= $Data['ip'];
		$dd[$count]['to_uid'] 		= $Data['to_uid'];
		$dd[$count]['value'] 		= $Data['value'];
		$dd[$count]['type'] 		= $Data['type'];
		$dd[$count]['id'] 			= $result1['uid'];
		$dd[$count]['page'] 		= $Data['page'];
		$dd[$count]['sub'] 			= $Data['sub'];
		$dd[$count]['image'] 		= ReturnDeImage($result1,"small");
		if(D_MOD_WRITE ==1){
			$dd[$count]['link'] 	=	$Data['username'];
		}else{
			$dd[$count]['link'] 	=	"index.php?dll=profile&pUsername=".$Data['username'];
		}		
		$BuildMsgString = "<a href='".DB_DOMAIN."index.php?dll=profile&pUsername=".$Data['username']."'>".$Data['username']."</a> ";
		if(substr($Data['type'],0,8) =="comment_"){$Data['type']="comment"; } 
		## determin the log type
		switch($Data['type']){
			# comments
			case "comment": { 
				if($Data['sub'] =="viewfile"){ 
						$BuildMsgString .= $msgString[3];
						$BuildMsgString .=  " <a href='index.php?dll=profile&sub=viewfile&item_id=".$Data['to_uid']."&item3_id=".$Data['value']."#commentsbox'> ".GetUsername($Data['to_uid'])."</a>"; //&aid=4
				}elseif($Data['sub'] == "blogview"){
						$BuildMsgString .= $msgString[4];						
						$BuildMsgString .= " <a href='index.php?dll=profile&sub=blogview&item_id=".$Data['to_uid']."&item2_id=".$Data['value']."#commentsbox'><b> ".$Data['value2']."</b></a>";
				}else{
				$BuildMsgString .= $msgString[5];				
				$BuildMsgString .= " <a href='index.php?dll=".$Data['page']."&sub=".$Data['sub']."&item_id=".$Data['value']."#commentsbox'><b> ".GetUsername($Data['to_uid'])."</b></a>";						
				}
			} break;
		## -------------------> END COMMENTS
			case "login": { 
				$BuildMsgString .= $msgString[6]; 
			} break;
			case "updated": { 
				$BuildMsgString .= $msgString[7];
			} break;
			case "file_add": { 
				$BuildMsgString .= $msgString[8];
				if($Data['value2'] !="" ){ 
						$BuildMsgString .= "<a href='index.php?dll=profile&sub=viewfile&pId=".$Data['to_uid']."&lid=".$Data['value']."'><img src='".DB_DOMAIN."inc/tb.php?src=".$Data['value2']."&x=48&y=48' width='48' height='48' align='absmiddle'></a>";
				}
			} break;
			case "file_default": { 
				$BuildMsgString .= $msgString[9];
				if($Data['value'] !="" ){ 
						$BuildMsgString .= "<a href='index.php?dll=profile&pId=".$Data['to_uid']."'><img src='".DB_DOMAIN."inc/tb.php?src=".$Data['value']."&x=48&y=48' width='48' height='48' align='absmiddle'></a>";
				}
			} break;
			case "event_attending": { 
				$BuildMsgString .= $msgString[10]; 
				$BuildMsgString .= "<a href='index.php?dll=calendar&sub=view&eventid=".$Data['value']."'><b>".$Data['value2']."</b></a>";						
			} break;
			case "group_add": { 
				$BuildMsgString .= $msgString[11]; 
				$BuildMsgString .= "<a href='index.php?dll=groups&sub=show&gid=".$Data['value']."'><b>".$Data['value2']."</b></a>";						
			} break;
			case "status": { 
				$BuildMsgString .= $msgString[12]; 
				$BuildMsgString .= "<a href='index.php?dll=profile&pId=".$Data['to_uid']."'><b>".$Data['value']."</b></a>";						
			} break;
		}
		## store string
		$dd[$count]['msg'] = $BuildMsgString;//."-".$dd[$count]['page']." - ".$dd[$count]['sub'];
		$count++;
	}
	return $dd;
}
/**
* Info: Displays on the menu bar
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_HeaderAlertsBar(){
	global $DB;
	if($_SESSION['auth'] !="yes"){
		return "";
	}else{
	## define variables
	$AlertArray = array();	$NewArray=array(); $NoFlashingAlert=0; $Counter=1; $Box3Text=""; $ModeratorBox="";
	$SQL = "select row_num from 
		(
			SELECT count(mailnum) AS row_num FROM messages WHERE mail2id='".$_SESSION['uid']."' AND mailstatus='unread' AND to_box='inbox' AND messages.type != 'wink'
			union ALL
			SELECT count(uid) AS row_num FROM members_network n, members m WHERE m.id = n.uid AND m.active = 'active' AND visible = 'yes' AND n.to_uid='".$_SESSION['uid']."'  AND (n.type=2 OR n.type=4) AND n.approved !='yes'
			union ALL
			SELECT count(from_uid) AS row_num FROM comments WHERE to_uid='".$_SESSION['uid']."' AND approved !='yes'
			union ALL
			SELECT count(mailnum) AS row_num FROM messages WHERE mail2id='".$_SESSION['uid']."' AND mailstatus='unread' AND to_box='inbox' AND messages.type = 'wink'
		) as derived_table";
	$Data = $DB->Query($SQL);
	## loop data from query
 	while( $DataArray = $DB->NextRow($Data) ){
		$AlertArray[$Counter]['total'] = $DataArray['row_num']; 
		$Counter++;
	}		
	## check values
	if($AlertArray[1]['total'] > 0){
			$Box3Text .= "<img src='".DB_DOMAIN."images/DEFAULT/_acc/email.png' align='absmiddle'> <a href='".DB_DOMAIN."index.php?dll=messages&sub=inbox' style='color:white;text-decoration:none;'>".$GLOBALS['LANG_SETTINGS']['a19']."</a> <br>";
	}
	if($AlertArray[2]['total'] > 0){
			$Box3Text .= "<img src='".DB_DOMAIN."images/DEFAULT/_icons/new/user_green.png' align='absmiddle'> <a href='".DB_DOMAIN."index.php?dll=search&friendid=".$_SESSION['uid']."&displaytype=detail'  style='color:white;text-decoration:none;'>".$GLOBALS['LANG_SETTINGS']['a23']."</a> <br>";
	}
	if($AlertArray[3]['total'] > 0){
			$Box3Text .= "<img src='".DB_DOMAIN."images/DEFAULT/_acc/comments.png' align='absmiddle'> <a href='".DB_DOMAIN."index.php?dll=account&sub=comments' style='color:white;text-decoration:none;'>".$GLOBALS['_LANG']['_new']." ".$GLOBALS['_LANG']['_comments']."</a> <br>";
	}
	if($AlertArray[4]['total'] > 0){
			$Box3Text .= "<img src='".DB_DOMAIN."images/DEFAULT/_acc/emoticon_tongue.png' align='absmiddle'> <a href='".DB_DOMAIN."index.php?dll=messages&sub=wink' style='color:white;text-decoration:none;'>".$GLOBALS['_LANG']['_new']." ".$GLOBALS['_LANG']['_wink']."</a> <br>";
	}
	## build alert box
	if($Box3Text !=""){
		$Box3Text =  '<div class="message-bad" id="NewAlertsBar" style="line-height:30px;">'.$Box3Text.'</div> <script type="text/javascript" language="javascript">Effect.Pulsate("NewAlertsBar", { pulses : 0, duration : 5, from : 0 }); </script>';
		if(D_BLINK_SOUND ==1){
			$Box3Text .= '<embed name="Alertsound" src="'.DB_DOMAIN.'inc/exe/IM/inc/sounds/doorbell.mp3" loop="false"hidden="true"autostart="true"></embed>';
		}
	}
	## DISPLAY ADMIN MODERATOR BAR
	if(isset($_SESSION['site_moderator']) && $_SESSION['site_moderator']  =="yes"){
		if(!isset($_SESSION['site_moderator_approve']) || $_SESSION['site_moderator_approve']==""){$_SESSION['site_moderator_approve']="no"; }
		if(!isset($_SESSION['site_moderator_edit']) || $_SESSION['site_moderator_edit']==""){$_SESSION['site_moderator_edit']="no"; }
		if(!isset($_SESSION['site_moderator_delete']) || $_SESSION['site_moderator_delete']==""){$_SESSION['site_moderator_delete']="no"; }
		$ModeratorBox = '<div class="message-good" id="menu-message-good" style="text-align:left;line-height:30px;">
		<ul style="padding:0px; margin:0px; margin-top:0px;">
		<li><img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/user_green.png" align="absmiddle">'.$GLOBALS['_LANG']['_mod1'].'</li>
		<li><img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/chk_'.$_SESSION['site_moderator_approve'].'.png" align="absmiddle">'.$GLOBALS['_LANG']['_mod2'].'</li>
		<li><img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/chk_'.$_SESSION['site_moderator_edit'].'.png" align="absmiddle">'.$GLOBALS['_LANG']['_mod3'].'</li>
		<li><img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/chk_'.$_SESSION['site_moderator_delete'].'.png" align="absmiddle">'.$GLOBALS['_LANG']['_mod4'].'</li>
		</ul>
		</div>';
	}
	$AlertArray[5]['total'] = $Box3Text;
	$AlertArray[5]['admin'] = $ModeratorBox;
	return $AlertArray;
	}
}
/*********************************************************************************
* Info: Displays the footer styles for all templates
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_FooterScripts($page,$WINK_MESSAGE_ARRAY, $ImData, $mobile){
	$ReturnData = "";	
	## display copyright bar

if ($mobile == 'yes') {
		$ReturnData .='<div id="copyright_bar2">&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="'.DB_DOMAIN.'">&copy; '.date('Y').' - '.D_CCTEXT.'</a> </b>';
} else {
		$ReturnData .='<div id="copyright_bar">&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="'.DB_DOMAIN.'">&copy; '.date('Y').' - '.D_CCTEXT.'</a> </b>';

}


		if(BRAND_ID ==""){
			$ReturnData .=' -  RealBlackLove.com does not perform background checks on the members of this site. ';
		}
		$ReturnData .='</div>';
	## displays the quick chat box
	$ReturnData .='<div id="QuickBox1" style="display:none;"><FORM onsubmit="return checkContact(\''.$GLOBALS['_LANG']['_msgSent'].'\');"><input type="hidden" id="MsgIDStore" name="MsgIDStore" value="0"><DIV id=contact-form class=contact-form><a id=cform-hide title="Close Contact Form" href="javascript:void(0);" onclick="new Lightbox.base(\'QuickBox1\', { externalControl : \'cancel_link\' }); return false;" >Close Contact Form</a><DIV class=bg><DIV class=inner><DL><DT><LABEL><span id="MsgImPhoto"></span></LABEL> <DD>'.str_replace("%s",'<span id="MsgNameHere"></span>',$GLOBALS['_LANG_ERROR']['_AlertQuickMsg']).'<DT><LABEL>'.$GLOBALS['_LANG']['_message'].' <span id="MsgIDError" style="color:red;"></span></LABEL><DD>';
	// opera browser fix
	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') ){
	$ReturnData .='<input type="text" name="ImSendMessage" cols=10 rows=3 class="input" id="ImSendMessage" style="width:230px; height:100px;">';
	}else{
	$ReturnData .='<textarea name="ImSendMessage"  class="input" id="ImSendMessage" style="width:230px; height:100px;" cols=10 rows=3></textarea>';
	}
	$ReturnData .='</DD></DL><P class=button><INPUT value="'.$GLOBALS['_LANG']['_send']." ".$GLOBALS['_LANG']['_message'].'"  type="submit" class="MainBtn"></P></DIV></DIV></DIV></FORM></div>';
	## displays the quick wink box
	$ReturnData .='<div id="QuickBox2" style="display:none;"><FORM onsubmit="return checkWink(\''.$GLOBALS['_LANG']['_msgSent'].'\');"><input type="hidden" id="MsgIDStore" name="MsgIDStore" value="0"><DIV id=contact-form class=contact-form><a id=cform-hide title="Close Contact Form" href="javascript:void(0);" onclick="new Lightbox.base(\'QuickBox2\', { externalControl : \'cancel_link\' }); return false;" >Close Contact Form</a> <input type="hidden" id="SendWinkStore" name="SendWinkStore" value="0"><input type="hidden" id="SendWinkStoreUsername" name="SendWinkStoreUsername" value="0"><DIV class=bg1><DIV class=inner><DL><DT><LABEL><span id="WinkImPhoto"></span></LABEL> <DD> '.str_replace("%s",'<span id="WinkNameHere"></span>',$GLOBALS['_LANG_ERROR']['_AlertQuickWink']).'<DT><LABEL>'.$GLOBALS['_LANG']['_message'].' <span id="WinkIDError" style="color:red;"></span></LABEL> <DD><select name="winkmsg" id="winkmsg" class="input">'; 
	foreach($WINK_MESSAGE_ARRAY as $key => $item){ $ReturnData .= "<option value='".$key."'>".$item."</option>";} $ReturnData .= '</select></DD></DL><P class=button><INPUT value="Send Message"  type="submit" class="MainBtn"></P></DIV></DIV></DIV></FORM></div>';
	## opens admin welcome message
	if(isset($_GET['lim']) ){
	$msgAdmin = DisplayAdminMsg();	
		if($msgAdmin['display'] =="yes"){ 
			$ReturnData .='<div id="QuickBox3" style="display:none;"><FORM><DIV id=contact-form class=contact-form><a id=cform-hide title="Close Contact Form" href="javascript:void(0);" onclick="new Lightbox.base(\'QuickBox3\', { externalControl : \'cancel_link\' }); return false;" >Close Window</a> <DIV class=bg><DIV class=inner>  <p><b>'.$msgAdmin['title'].'</b></p> <p>'.$msgAdmin['content'].'</p></DIV></DIV></DIV></FORM></div>';
		}
	}
	## applies javascript for the above
   $ReturnData .='<script src="'.DB_DOMAIN.'inc/js/_eMeetingFooter.js" type="text/javascript"></script>';
	if(!empty($ImData) && D_IM == 1){
	$ReturnData .='<DIV id="floatLayer" style="position: absolute; height:100px; width:250px; left:30px; top:1px;z-index: 100; border:1px solid #cccccc; padding:5px; background:#eeeeee;">
	<a href="'.DB_DOMAIN.'index.php?dll=profile&pId='.$ImData['id'].'"><img src="'.$ImData['image'].'" align="absmiddle" width=48 height=48 style="float:left; padding-right:15px; padding-bottom:50px;" border=0></a>
	<h2 style="font-size:18px;">'.$GLOBALS['_LANG']['_imchat1'].'</h2> 
	<p>'.$ImData['username'].' '.$GLOBALS['_LANG']['_imchat2'].'</p>
	<img src="'.DB_DOMAIN.'images/DEFAULT/_acc/comments.png" align="absmiddle"> <a href="javascript:void();" onClick="openIMWin('.$ImData['id'].','.$_SESSION['uid'].',\''.DB_DOMAIN.'\',\''.$ImData['path'].'\',\''.$ImData['width'].'\',\''.$ImData['height'].'\'); toggleLayer(\'floatLayer\'); return false;">'.$GLOBALS['_LANG']['_imchat3'].'</a>  
	- <img src="'.DB_DOMAIN.'images/DEFAULT/_acc/cancel.png" align="absmiddle"> <a href="#" onClick="RejectIM(\''.$ImData['id'].'\');toggleLayer(\'floatLayer\'); return false;">'.$GLOBALS['_LANG']['_imchat4'].'</a>
	<div id="IMChatId" style="display:none">pid'.$ImData['id'].'</div>
	</DIV>';
	}
	return $ReturnData;
}
/**
* Info: Displays the header styles for all templates
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_HeaderScripts($page, $sub, $CUSTOM_PLUGIN_HEADER="",$mobile){
 	$ReturnData = "";
	$DontDisplayPageBase = array('search','classads','games','gallery','calendar','groups','music','blog','videos','mobilesearch','mobileaccount');
	$DontDisplaySubBase = array('search'); //,'view'
	## include base tag
 	if(in_array($page,$DontDisplayPageBase)){
		## check subpage
		if($page == 'mobileaccount' || $page == 'mobilesearch' || ($sub !="" && in_array($sub,$DontDisplaySubBase))){		
		}else{			
			$ReturnData .='<base href="'.DB_DOMAIN.'">';		
		}
	}else{
		$ReturnData .='<base href="'.DB_DOMAIN.'">';
	}
	if( ( $page=="groups" && $sub=="view" ) || ( $page=="search" ) ){ $ReturnData="";	}
	if( ( $page=="blog" && $sub=="view" ) || ( $page=="search" ) ){ $ReturnData="";	}
	if( ( $page=="account" && $sub=="edit" ) ){ $ReturnData="";	}
	if( ( $page=="mobileaccount" && $sub=="edit" ) ){ $ReturnData="";	}


//////////////////////////////////////////////////////////////////////////////////////////
// CSS INCLUDES
///////////////////////////////////////////////////////////////////////////////////////////
	## include home page css
	if(isset($page) && $page =="index"){
		$ReturnData .='<link rel="stylesheet" href="'.DB_DOMAIN.'inc/css/_homepage.css" type="text/css">';
	}
	## include custom profile css
	if($page =="profile"){
		$ReturnData .='<link rel="stylesheet" href="'.DB_DOMAIN.'inc/css/_profile.css" type="text/css">';
	}
	## build main page css and javascript includes
	$ReturnData .= "\n\n".'<link rel="stylesheet" href="'.DB_DOMAIN.'inc/css/styles.css" type="text/css">'."\n";

if ($mobile == "yes") {
	$ReturnData .= '<link rel="stylesheet" href="'.DB_DOMAIN.'inc/templates/mobile/template.css" type="text/css">'."\n";
}else{
	$ReturnData .= '<link rel="stylesheet" href="'.DB_DOMAIN.'inc/templates/'.D_TEMP.'/template.css" type="text/css">'."\n";
}

	$ReturnData .= '<!--[if IE 6]><link rel="stylesheet" href="'.DB_DOMAIN.'inc/css/_ie6.css" type="text/css"><![endif]-->'."\n";
	$ReturnData .= '<!--[if IE 7]><link rel="stylesheet" href="'.DB_DOMAIN.'inc/css/_ie7.css" type="text/css"><![endif]-->'."\n";
	if($sub =="design"){
		$ReturnData .= '<link href="inc/css/extras/color_selector.css" rel="stylesheet" type="text/css" />'."\n";
		$ReturnData .= '<script src="inc/js/_extras/color_selector.js" type="text/JavaScript"></script>'."\n";
	}
//////////////////////////////////////////////////////////////////////////////////////////
// JAVASCRIPT INCLUDES
///////////////////////////////////////////////////////////////////////////////////////////
	if(D_MOD_WRITE ==1){
	$UseFullURL=DB_DOMAIN;
	}else{
	$UseFullURL="";
	}
	## build javascript input /* MUST BE AT THE TOP */
	if( ( $page =="search" && $_SESSION['auth'] =="yes" ) || ( $page =="profile" && $_SESSION['auth'] =="yes" ) ||  (isset($_GET['lim']) )  ){
		$ReturnData .= '<script type="text/javascript" src="'.$UseFullURL.'inc/js/_extras/prototype_pop.js"></script>'."\n";
		$ReturnData .= '<script type="text/javascript" src="'.$UseFullURL.'inc/js/_extras/lightbox.js"></script>'."\n";
	}
	##  scriptaculous
	$ReturnData .= '<script type="text/javascript" src="'.$UseFullURL.'inc/js/_scriptaculous/prototype.js"></script>'."\n";
	$ReturnData .= '<script type="text/javascript"  src="'.$UseFullURL.'inc/js/_scriptaculous/effects.js"> </script>'."\n";
	if($page !="index"){	
	$ReturnData .= '<script type="text/javascript" src="'.$UseFullURL.'inc/js/_scriptaculous/scriptaculous.js"></script>'."\n";
	}
	## sliding gallery
	if( ( $page=="profile" && $sub=="viewfile" ) || $page =="gallery" || $page =="index" || ($page =="classads" && $sub=="add") || ( $page =="calendar" && $sub=="add" ) ||  ( $page =="groups" && $sub=="add" )  || ( $page =="blog" && $sub=="add" )){
	$ReturnData .= '<script type="text/javascript" src="'.$UseFullURL.'inc/exe/IM/inc/js/carousel.js"></script>'."\n";
	}
	if($page !="index222"){	
		$ReturnData .= '<script type="text/javascript" src="'.$UseFullURL.'inc/js/_eMeetingGlobals.js" ></script>'."\n";	
		## ajax 
		if(D_MOD_WRITE ==1){
		$ReturnData .='<script type="text/javascript" src="'.$UseFullURL.'inc/js/_eMeetingAjax_mod.js" ></script>'."\n";
		}else{
		$ReturnData .='<script type="text/javascript" src="'.$UseFullURL.'inc/js/_eMeetingAjax.js" ></script>'."\n";
		}	
		if(D_BLINK_SOUND ==1){
			$ReturnData .= '<script type="text/javascript" src="'.$UseFullURL.'inc/exe/IM/inc/js/swfobject.js"></script>'."\n";
		}
	}
	## custom plugin headers
	$ReturnData .= $CUSTOM_PLUGIN_HEADER."\n\n";
	$ReturnData .= '<script type="text/javascript">function handleError() {return true;}window.onerror = handleError;</script>'."\n\n\n"; 
 	## build html editor
	if(U_EDITOR =="yes"){
	if(isset($page) && ( ($page =="classads" && $sub=="add") || ( $page =="calendar" && $sub=="add" ) || ( $page =="account"  && $sub=="edit" ) || ( $page =="groups" && $sub=="add" )  || ( $page =="blog" && $sub=="add" ) ) ){
	$ReturnData .= '<script type="text/javascript">_editor_url = "'.DB_DOMAIN.'newadmin/inc/editor08/"; _editor_lang = "en";</script>'."\n";
	$ReturnData .= '<script type="text/javascript" src="'.DB_DOMAIN.'newadmin/inc/editor08/htmlarea.js"></script>'."\n";
	$ReturnData .= '<script type="text/javascript" defer="1">
		function initDocument() {
			var editor1 = new HTMLArea("editor");
			var config = new HTMLArea.Config();
			config.height = "300px";
			config.pageStyle =  "body { background-color: white; color: black; font-family: verdana,sans-serif; border:0px; }";
			config.toolbar = [ [\'fontname\', \'space\', \'fontsize\', \'space\',\'separator\', \'space\', \'bold\', \'italic\', \'underline\', "strikethrough", "separator", "forecolor", "separator", "hilitecolor"]];				
			HTMLArea.replace(\'editor\', config);				
		}
		HTMLArea.onload = initDocument;
	</script>';
	} 
	}
	// RIGHT TO LEFT INCLUDE
	if(D_LANG =="arabic" && $page !="index"){
		$ReturnData .='<link href="'.DB_DOMAIN.'inc/css/_RTL.css" rel="stylesheet" type="text/css" />';
	}
	/**********************************************/
	$ReturnData .=  "<style>";

	if ($mobile == "no") {
	if(TMP_BACKGROUND !="" || TMP_BACKGROUND_IMG !=""){
		$ReturnData .=  " body { background: ";
		if( TMP_BACKGROUND !="" ){ $ReturnData .=  "".TMP_BACKGROUND." "; }
		if( TMP_BACKGROUND_IMG !="" ){ $ReturnData .=  " url('".WEB_PATH_FILES.TMP_BACKGROUND_IMG."') ".TMP_BACKGROUND_PO."; }"; }
	 	$ReturnData .= "} #MainPageBackground { background:none; } "; // #side { margin-left:-8px; }
	}
	}
	if(TMP_FOR_1 !=""){
		$ReturnData .= "#bottomBar h4, .page_header { background: ".TMP_FOR_1.";} #page_footer .footer_menu {	background: ".TMP_FOR_1.";} "; //#page_container,
	}
	if(TMP_FOR_2 !=""){
		$ReturnData .=  " #bottomBar, .b1f, .b2f, .b3f, .b4f, .contentf  { background: ".TMP_FOR_2."; } .menu { background: ".TMP_FOR_2."; }.toph2 { background-color: ".TMP_FOR_2.";}.CapTitle {  background-color: ".TMP_FOR_2."; }#side_box .menu_box_title, .menu_box_title1 {	background: ".TMP_FOR_2.";} .menu_box_title span {display:none;} #side_box .menu_box_title_sub { background: ".TMP_FOR_2.";}
	";
	}
	if(TMP_FOR_3 !=""){
		$ReturnData .=  "#main_wrapper_bottom { display:none;} #main_content_wrapper { width:687px; margin-top:10px;} #main_content_wrapper, #side_box .menu_box_body, .menu_box_body1 { background: ".TMP_FOR_3.";  border:1px solid ".TMP_FOR_2." } ";
	}
	if(TMP_LINK !=""){
		$ReturnData .= "a { color: ".TMP_LINK.";}a:link { color: ".TMP_LINK.";}a:visited {color: ".TMP_LINK.";}a:active {color: ".TMP_LINK.";}a:hover {color: ".TMP_LINK.";} .sub_tabs li a { color: ".TMP_LINK.";}.index { color: ".TMP_LINK.";}.onlinenow a{ color: ".TMP_LINK."; }";
	}
	if(TMP_LINK_MENU !=""){
		$ReturnData .= "#side_box .menu_box_title, .menu_box_title1,.toph2,.CapTitle { color: ".TMP_LINK.";} .tabs li a, .tabs li a:hover, .tabs li .selected,.onlinenow a, #page_footer .footer_tabs li a { 	color: ".TMP_LINK_MENU."; border-right:0px;} ";
	}	
	if(strlen(TMP_LOGO_ICON) > 1 && TMP_LOGO_HIDE != 1){
		//$size = @getimagesize(TMP_LOGO_ICON);
 		if(isset($size[1])){ $extra="height:".$size[1]."px;"; }else{ $extra=""; }
		$ReturnData .= " #ImageLogo { background-image:url('".TMP_LOGO_ICON."'); ".$extra."  } ";
	}else{
		$ReturnData .= " #ImageLogo .p1 { margin-left:0px;} ";
	}
	if(strlen(TMP_LOGO_HEIGHT) > 1 && $mobile=='no'){
		$ReturnData .= " .logo_height {  height:".TMP_LOGO_HEIGHT."} ";
	}
	if(strlen(TMP_PAGE_HEAD) > 1){
		$ReturnData .= ".TopVideos, .TopTour, .TopUpgrade, .TopSettings, .TopRegister, .TopMusic, .TopMessages, .TopMatches, .TopMap, .TopLogin, .TopLinks, .TopInvite, .TopGroups, .TopGames,
		.TopGallery, .TopForum, .TopFAQ, .TopContact, .TopAdverts, .TopChatRoom, .TopCalendar, .TopBlog, .TopArticles, .TopAffiliate, .TopAccount
		 { background: ".TMP_PAGE_HEAD." } .TopVideos, .TopTour, .TopUpgrade, .TopSettings, .TopRegister, .TopMusic, .TopMessages, .TopMatches, .TopMap, .TopLogin, .TopLinks, .TopInvite, .TopGroups, .TopGames,
		.TopGallery, .TopForum, .TopFAQ, .TopContact, .TopAdverts, .TopChatRoom, .TopCalendar, .TopBlog, .TopArticles, .TopAffiliate, .TopAccount
		span { color: ".TMP_LINK_MENU." }";
	}
	$ReturnData .= " #ImageLogo .p1, #ImageLogo .p3 {color: ".TMP_LOGO_COLOR."} #ImageLogo .p2 { color: ".TMP_LOGO_SLOGAN_COLOR."}";
	/*
	logo colours
	*/
	if($mobile=='no'){
		$ReturnData .= "#page_content { width:".TMP_WIDTH_CONTAINER.";}#fullpage #main { 	width: ".TMP_WIDTH_PAGE.";}#side_box { width: ".TMP_WIDTH_MENU."; }";
	}else{
		$ReturnData .= "#page_content { width:320px;}#fullpage #main { 	width: 300px;}#side_box { width: ".TMP_WIDTH_MENU."; }";
	}
	$ReturnData .= "</style>";
	return $ReturnData;
}
/**
* Info: Displays OnLoad Tag for all pages
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_HeaderOnLoad($page, $sub, $PACKAGEACCESS, $WaitingIM=false, $mobile="no"){
	global $DB;
	$ReturnData = 'onLoad="';	
	if($page=="profile"){
	$ReturnData .= "showDefaultProfileDiv();";
	}
	## ADD ONLOAD EVENT FOR IM MESSAGE
	if($WaitingIM){
	$ReturnData .= "start();";

		## update message status to read
		$DB->Update("UPDATE userplane_pending_wm SET openedWindowAt = now() WHERE destinationUserID='".$_SESSION['uid']."'"); 

	}
	## load html editor box
	if(isset($page) && ( ($page =="classads" && $sub=="add") || ( $page =="calendar" && $sub=="add" ) || ( $page =="account"  && $sub=="edit" ) || ( $page =="groups" && $sub=="add" ) || ( $page =="blog" && $sub=="add" ) ) ){
	$ReturnData .="HTMLArea.init();";
	} 


	if ($mobile == 'no') {

	   if(!defined('D_IM_POPUP') || D_IM_POPUP!="0") {
	   ## auto load IM window when user logs in
	      if(isset($page) && $page=="overview" && isset($_GET['lim']) && @!in_array("chatroom-im",$PACKAGEACCESS[$_SESSION['packageid']])){
		$ReturnData .="LauncheMeetingIm('".DB_DOMAIN."');";
	      }
	   }
	   ## opens admin welcome message
	   if(isset($_GET['lim']) && $page=="overview"){
		$GETMSG = $DB->Row("SELECT display FROM members_admin_message WHERE id=1 AND display='yes' LIMIT 1");
		if(isset($GETMSG['display']) && $GETMSG['display']=="yes"){
		   $ReturnData .= "openQuickAdmin();"; 
		}
	   }
	}
	$ReturnData .='return false;"';
	return str_replace('onLoad=""',"",$ReturnData);
}
/**
* Info: Fulder Online Check System
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function IsIMWindowExist($id)
{
	if(!isset($_SESSION['IMWindows']))
	{
		$_SESSION['IMWindows'] = array();
	}
	$imWindowsArray = $_SESSION['IMWindows'];
	for($i = 0; $i < count($imWindowsArray); $i++)
	{
		if($imWindowsArray[$i] == $id)
		{
			return true;
			break;
		}
	}
	return false;
}
function RegisterIMWindow($id)
{
	if(!isset($_SESSION['IMWindows']))
	{
		$_SESSION['IMWindows'] = array();
	}
	$imWindowsArray = $_SESSION['IMWindows'];
	$lastIndex = count($imWindowsArray);	
	$imWindowsArray[$lastIndex] = $id;
	$_SESSION['IMWindows'] = $imWindowsArray;
}
function RemoveIMWindow($id)
{
	if(!isset($_SESSION['IMWindows']))
	{
		$_SESSION['IMWindows'] = array();
	}
	$imWindowsArray = $_SESSION['IMWindows'];
	$imWindowsNewArray = array();
	$ii = 0;
	for($i = 0; $i < count($imWindowsArray); $i++)
	{
		if($imWindowsArray[$i] != $id)
		{
			$imWindowsNewArray[$ii] = $imWindowsArray[$i];
			$ii++;
		}
	}
	$_SESSION['IMWindows'] = $imWindowsNewArray;
}
function Build_IMMessage($IMRoomArray){
	
		if($_SESSION['auth'] =="yes"){
		
				global $DB;				
				
				$SearchDate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
				
				$result = $DB->Row("SELECT members.id, members.username, files.uid, files.bigimage, files.type, files.approved, files.aid, files.adult_content
				FROM im 
				INNER JOIN members ON ( im.from_uid = members.id AND im.to_uid= ( '".$_SESSION['uid']."' ) ) 
				LEFT JOIN files ON ( files.uid = im.from_uid AND files.default LIKE '%1%' AND files.approved='yes') 
				WHERE im.read ='no' AND im.date LIKE '%".$SearchDate."%' 
				GROUP BY im.from_uid LIMIT 1");
					
				if(!empty($result) && !IsIMWindowExist($result['id'])){			

					$result['image'] 	= ReturnDeImage($result,"medium");
					$result['width'] 	= $IMRoomArray['width'];
					$result['height'] 	= $IMRoomArray['height'];
					$result['path'] 	= $IMRoomArray['path'];

					return $result;
				
				}else{

					$result = $DB->Row("SELECT members.id, members.username, files.uid, files.bigimage, files.type, files.approved, files.aid, files.adult_content
					FROM userplane_pending_wm
					INNER JOIN members ON ( originatingUserID = members.id AND destinationUserID = ( '".$_SESSION['uid']."' ) ) 
					LEFT JOIN files ON ( files.uid = originatingUserID AND files.default LIKE '%1%' AND files.approved='yes') 
					WHERE insertedAt LIKE '%".$SearchDate."%' 
					AND openedWindowAt is null
					GROUP BY originatingUserID LIMIT 1");

					if(!empty($result)){		

						$result['image'] 	= ReturnDeImage($result,"medium");
						$result['width'] 	= $IMRoomArray['width'];
						$result['height'] 	= $IMRoomArray['height'];
						$result['path'] 	= $IMRoomArray['path'];

						return $result;

					}else{

						return "";
					}
				}
		}else{
			return "";
		}
}
/**
* Info: Build AutoLogin Function
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_AutoUsersOnline($value=10){
	global $DB;
	$min_online = 10;
	if(defined(AUTO_MINIMUM_ONLINE)){ $min_online = AUTO_MINIMUM_ONLINE;}
 	if(isset($_SESSION['countonline_total']) && $_SESSION['countonline_total'] < $min_online){
		$RandomAmount = rand($min_online,(AUTO_AMOUNT - $_SESSION['countonline_total']));
		if ($RandomAmount < 0) {
			$RandomAmount = 1;
		}
		$AutoOLogin = $DB->Query("SELECT members.id  FROM members WHERE members.visible = 'yes' ORDER BY RAND() LIMIT ".$RandomAmount); 
			// INNER JOIN files ON (members.id = files.uid AND files.default='yes')
		while( $aLogin = $DB->NextRow($AutoOLogin) ){		
			$DB->Insert("INSERT INTO members_online values('".time()."','0','browse', '".$aLogin['id']."')");
			$DB->Insert("UPDATE members SET lastlogin='".DATE_TIME."' WHERE id='".$aLogin['id']."' LIMIT 1");
		}	
		$_SESSION['countonline_total'] = $RandomAmount + $_SESSION['countonline_total'];
	}	
}
/**
* Info: Check for banned users
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_BankChecker(){
	global $DB;
	if( ( (strpos(strtoupper($_SERVER['REQUEST_URI']), ".txt?") !== FALSE)  || ( strpos(strtoupper($_SERVER['REQUEST_URI']), "UNION") !== FALSE) ) && !isset($_SESSION['banned_deny']) && $_SESSION['admin_auth'] !="yes"){
			if(isset($_SESSION['username'])){$BAN_USERNAME=$_SESSION['username'];}else{$BAN_USERNAME="Guest";}
			// HACK ATTEMPT FOUND
			$URI = strip_tags($_SERVER['REQUEST_URI']);
			$URI = str_replace("'", "", $URI);
			$DB->Row("INSERT INTO `members_banned` (`ip` ,`date` ,`string`, username)VALUES ('".$_SERVER['REMOTE_ADDR']."', '".date("Y-m-d H:i:s")."', '".$URI."','".$BAN_USERNAME."')");		
			session_unset($_SESSION['banned_check']);
	}
	if(!isset($_SESSION['banned_check'])){
			if(isset($_SESSION['banned_deny']) && $_SESSION['banned_deny'] == true){
				$_SESSION['banned_deny'] = true;
				require_once (	"inc/templates/layout/banned.php"	);
				die();
			}else{
				$F_Ban = $DB->Row("SELECT count(autoid) AS total FROM members_banned WHERE ip LIKE ('%".$_SERVER['REMOTE_ADDR']."%') LIMIT 1");
				if(!empty($F_Ban) && $F_Ban['total'] > 0){						
					$_SESSION['banned_deny'] = true;
					require_once (	"inc/templates/layout/banned.php"	);
					die();
				}else{
					$_SESSION['banned_check'] = true;
				}
			}
	}
}
/**
* Info: Build the user online tool
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_UserOnline($user_timestamp, $user_ip, $user_page, $user_logid, $timeoutseconds = 1200, $requested){
	global $DB;	
	## define timeout if not already defined
	if(defined(ONLINE_NOW_TIMEOUT)){ $timeoutseconds = ONLINE_NOW_TIMEOUT;}
	$timeout=$user_timestamp-$timeoutseconds;
	$returnThis ="";
	$user_page = eMeetingInput($user_page);
	// CHECK FOR PROFILE VIEWING
	if ($user_page != "profile") {
		if(is_numeric($_SESSION['uid']) && $_SESSION['uid'] != 0){
			$DB->Update("UPDATE members_online SET timestamp= ('".$user_timestamp."'), 	ip= ('".$user_ip."'), 	page= ('".$user_page."') WHERE logid = ( '".$user_logid."' ) LIMIT 1");
			if ($DB->Affected() == 0)
			{
				$DB->Insert("INSERT INTO members_online values('$user_timestamp','$user_ip','$user_page', '$user_logid')");
			}
		}elseif(is_numeric($_SESSION['uid']) && $_SESSION['uid'] == 0){
			$DB->Update("UPDATE members_online SET timestamp= ('".$user_timestamp."'), 	ip= ('".$user_ip."'), 	page= ('".$user_page."') WHERE logid = ( '0' ) AND ip= ('".$user_ip."') LIMIT 1");
			if ($DB->Affected() == 0)
			{
				$DB->Insert("DELETE FROM members_online WHERE ip= ('".$user_ip."') ");
				$DB->Insert("INSERT INTO members_online values('$user_timestamp','$user_ip','$user_page', '$user_logid')");
			}		
		}
	}else{
	} // end if
	$DB->Update("DELETE FROM members_online WHERE timestamp < $timeout");
	return $returnThis;
}
/**
* Info: Build all website menu bars
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Build_DisplayMenu($menu_array, $page="",$addLink = false, $ext_menu=""){
	 $ReturnValue ="";	 $counter=1; $ModArray = array();
	foreach($menu_array as $key => $item) {
		$AddSelected = str_replace("&sub=search","",$key);
		if($addLink){ $key =$page."&sub=".$key;   }		
	 	if($page !="" && ( $page == strtolower($AddSelected) )  ){ $AddSel='class="selected"'; }else{ $AddSel="";}
		if($counter==1){ $Style =$counter."";  }else{ $Style =$counter; }
		if(substr($key,-1,1) !="?" && $item!=""){ ## hide value if its a help value
		$ModArray['page'] =$key;
		if(strtolower($AddSelected) =="logout"){ 
			$PageLink = DB_DOMAIN."index.php?dll=logout";
		}else{
			$PageLink = MakeLinkMOD($ModArray);
		}
		// GENERATE POWERED BY LINK		
		if(strtolower($key) == "copyright" && strlen(BRAND_ID) ==0){ 
  			$eKeys = array("");
			$ReturnValue .= '<li class="i'.$Style.'" style="color:white;"><a href="http://www.datingscripts.com/" '.$AddSel.' title="Dating Software by eMeeting Ltd" style="color:white;">'; //'.$eKeys[rand(0,5)].'
			$ReturnValue .= $item;
			$ReturnValue .=' ( Dating Software by eMeeting Ltd )';
			$ReturnValue .= '</a></li>'; 
		}else{
			if(strtolower($AddSelected) =="tour" && D_TOUR ==0){	
			}elseif(strtolower($AddSelected) =="logout" && $_SESSION['auth'] =="no"){
			}elseif(strtolower($AddSelected) =="account" && D_ACCOUNT ==0){		
			}elseif(strtolower($AddSelected) =="faq" && D_FAQ ==0){			
			}elseif(strtolower($AddSelected) =="follow" && D_FOLLOW ==0){	
			}elseif(strtolower($AddSelected) =="chatroom" && D_CHATROOM ==0){			
			}elseif(strtolower($AddSelected) =="games" && D_GAMES ==0){
			}elseif(strtolower($AddSelected) =="blog" && D_BLOG ==0){			
			}elseif(strtolower($AddSelected) =="classads" && D_CLASSADS ==0){
			}elseif(strtolower($AddSelected) =="videos" && D_VIDEOS ==0){
			}elseif(strtolower($AddSelected) =="music" && D_MUSIC ==0){
			}elseif(strtolower($AddSelected) =="messages" && D_MESSAGES ==0){
			}elseif(strtolower($AddSelected) =="search" && D_SEARCH ==0 ){
			}elseif(strtolower($AddSelected) =="friends" && D_NETWORK ==0 ){
			}elseif(strtolower($AddSelected) =="settings" && D_SETTINGS ==0){
			}elseif(strtolower($AddSelected) =="gallery" && D_GALLERY ==0){
			}elseif(strtolower($AddSelected) =="calendar" && D_EVENTS ==0){
			}elseif(strtolower($AddSelected) =="forum" && D_FORUM ==0){	
			}elseif(strtolower($AddSelected) =="browse" && D_SEARCH ==0){		
			}elseif(strtolower($AddSelected) =="matches" && D_MATCHTESTS ==0){			
			}elseif(strtolower($AddSelected) =="calendar" && D_EVENTS ==0){			
			}elseif(strtolower($AddSelected) =="subscribe" && D_FREE =="yes"){			
			}elseif(strtolower($AddSelected) =="contact" && D_CONTACT ==0){			
			}elseif(strtolower($AddSelected) =="calendar" && D_CALENDAR =="no"){			
			}elseif(strtolower($AddSelected) =="affiliate" && AFF_ENABLED !="yes"){			
			}elseif(strtolower($AddSelected) =="articles" && D_ARTICLES ==0){			
			}elseif(strtolower($AddSelected) =="groups" && D_GROUPS ==0){
			}elseif(strtolower($AddSelected) =="register" && $_SESSION['auth'] =="yes"){
			}elseif(strtolower($AddSelected) =="login" && $_SESSION['auth'] =="yes"){
			}elseif(strtolower($AddSelected) =="tour" && $_SESSION['auth'] =="yes"){
			}else{
				if(strpos($key, "http://") === false){
					if($key =="account&sub=video" && FLASH_VIDEO =="no"){ }
					elseif($key =="account&sub=comments" && D_COMMENTS =="0"){ }
					elseif($key =="account&sub=design" && D_DESIGNER =="0"){ }
					elseif($key =="settings&sub=sms" && UPGRADE_SMS !="yes"){ }
					elseif($key =="messages&sub=wink" && D_WINK ==0){ }
					elseif($key =="messages&sub=read" ){ }
					else{
						$ReturnValue .= '<li class="i'.$Style.'"><a href="'.$PageLink.'" '.$AddSel.'><span>'.$item.'</span></a></li>';
					}
					// draw inner menu
					if(is_array($ext_menu) && $key==$page){ 
					$ReturnValue .= "</ul>";
					$ReturnValue .= "<ul class='menu_side_inner'>";
					foreach($ext_menu as $key => $item) {
						$ReturnValue .= '<li><a href="'.$PageLink.'" '.$AddSel.'><span>'.$item.'</span></a></li>';
					}
					$ReturnValue .= "</ul>";
					$ReturnValue .= "<ul class='menu_side'>";
					}
				}else{
					$ReturnValue .= '<li class="i'.$Style.'"><a href="'.$key.'" '.$AddSel.'><span>'.$item.'</span></a></li>';
				}
			}
		}	 }
		$counter++;
	 }	 
	 return $ReturnValue;
}
/**
* Info: Gets the member template
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function GetMemberTemplate($id){
	global $DB;
	$result = $DB->Row("SELECT * FROM members_template WHERE uid='".$id."' LIMIT 1");
	if(!empty($result)){
		$result = array_map('eMeetingOutput',$result);
	}
	return $result;
}
/**
* Info: Saves the score for the game played
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function SaveScores($score, $game){
	global $DB;
 	$DB->Update("UPDATE `game_games` SET Champion_name ='".$_SESSION['username']."', Champion_score = '".$score."' WHERE gameid='".$game."' AND Champion_score < '".$score."' LIMIT 1");
   $checkscore = $DB->Row("SELECT * FROM game_scores WHERE gamename =( '".$game."' ) AND username=( '".$_SESSION['uid']."' ) ORDER BY thescore DESC LIMIT 1");
   if (!empty($checkscore)) { ## a score already exists by this person.
		if ($checkscore["thescore"] < $score) { ## ONLY SAVE IF THE NEW SCORE IS BETTER THAN OLD
		 $DB->Update("UPDATE `game_scores` SET `thescore` = '".$score."', `gamename` = '".$game."', `phpdate` = '".DATE_NOW."' WHERE gamename=''".$game."'' AND username='".$_SESSION['uid']."' LIMIT 1");
		}
 	} else {
 	 	## First time, submit it in.
   		$DB->Insert("INSERT INTO game_scores (username,thescore,ip,phpdate,gamename) VALUES ('".$_SESSION['username']."','".$score."','".$_SERVER['REMOTE_ADDR']."','".DATE_NOW."','".$game."')");
 	}
}
###############################################################################
/*
	THE ABOVE FUNCTIONS ARE USED DURING THE INITAL SYSTEM LOAD
*/
###############################################################################
function DisplayNewsFeed($limit=5){
	$news = array();
	$count=1;
	require_once( "newadmin/inc/class/lastRSS.php" );
	$rss = new lastRSS;
	$rss->cache_dir = '';
	$rss->cache_time = 0;
	$rss->cp = 'US-ASCII';
	$rss->date_format = 'l';
	if ($rs = $rss->get(DB_DOMAIN."rss.php")) {
		foreach($rs['items'] as $item) {
			$news[$count]['title'] 			= $item['title'];
			$news[$count]['description'] 	= $item['description'];
			$news[$count]['link'] 			= $item['link'];
			$news[$count]['category'] 		= $item['category'];
			if($count==$limit){
				return $news;
			}
			$count++;
		}
	}
	return $news;
}
###############################################################################
/**
* Info: Build Image Display Function
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function ReturnDeImage($array,$size,$OnlyPic=0){
		## photo used on member adverts, groups etc
		if(isset($array['photo']) && $array['photo'] !=""){
			$array['bigimage']=$array['photo']; $array['type'] ="photo";
		}
		## if not file type is set
		if(!isset($array['type'])){ 
			$array['type']="photo"; 
			$array['bigimage'] = DEFAULT_IMAGE;
		}
		## build the image string
		switch($array['type']){
			case "photo": {
				## add gender display pic male/female etc
				if(isset($array['gender'])){ $array['bigimage'] .="&g=".$array['gender']; }
				$UImage = $array['bigimage'];
			} break;
			case "music": { $UImage = DEFAULT_MUSIC."&t=f"; 	} break;
			case "video": { $UImage = DEFAULT_VIDEO."&t=f";		} break;
			case "youtube": { 
				$file_part = explode("?v=",$array['bigimage']); 
				if(isset($file_part[1])){ $file_part = explode("&",$file_part[1]); }
				if(!isset($file_part[0])){
					$UImage = DEFAULT_VIDEO."&t=f";
				}else{
					return "http://img.youtube.com/vi/".$file_part[0]."/2.jpg?";
				}	
			} break;
			// not type found
			default: { 
				$UImage = DEFAULT_IMAGE."&t=f"; 
				if(isset($array['gender'])){ $UImage ="nophoto.jpg&g=".$array['gender']; }
			} break;
		}
		## approval system 
		if(isset($array['approved']) && $array['approved'] =="no" ){
			$UImage = WATINGAPPROVAL_IMAGE."&t=f";
		}
		## adult images
		if(isset($array['adult_content']) && $array['adult_content'] =="yes" && $_SESSION['pack_adult'] !="yes" && ENABLE_ADULTCONTENT =="yes"){ // && $_SESSION['uid'] != $array['uid']
			 if($_SESSION['auth'] != "yes"  && ($array['id'] != $_SESSION['uid']) || ( $array['uid'] != $_SESSION['uid'] ) ){
				$UImage = DEFAULT_IMAGE_ADULT."&t=f";
				//return $UImage;
			}
		}
		## build the query string
		$FilePath = DB_DOMAIN."inc/tb.php?src=";			
		## image sizes
		switch($size){
				case "xsmall":{	$UImage .="&x=40&y=40";			} break;	
				case "small":{	$UImage .="&x=48&y=48";			} break;
				case "medium":{	$UImage .="&x=96&y=96";			} break;
				case "big":{	$UImage .="&x=183&y=183";		} break;
				case "full":{	$FilePath = WEB_PATH_IMAGE; } break;
		}
	$UImage = $FilePath.$UImage;
	return $UImage;
}
/**
* Info: Checks if you can view the selected album
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function CanIViewThisAlbum($albumType, $id){
	global $DB;
	if($albumType =="adult"){
			$VD = $DB->Row("SELECT view_adult FROM package WHERE pid= ( '".$_SESSION['packageid']."' ) LIMIT 1");
			if($VD['view_adult'] =="yes"){		
				return 1;
			}else{
				return 0;
			}
	}elseif($albumType =="hotlist"){
			$hotlist = $DB->Row("SELECT DISTINCT members_network.type FROM members_network WHERE 
					(members_network.uid='".$id."' AND  members_network.to_uid='".$_SESSION['uid']."' AND members_network.type=1) OR  
					(members_network.uid='".$_SESSION['uid']."' AND  members_network.to_uid='".$id."' AND members_network.type=1) 
					AND approved='yes' ORDER BY members_network.type ASC LIMIT 1");
			if(!empty($hotlist)){
				return 1;
			}else{
				return 0;
			}
	}elseif($albumType =="friends"){
			$FriendList = $DB->Row("SELECT DISTINCT members_network.type FROM members_network WHERE 
					(members_network.uid='".$id."' AND  members_network.to_uid='".$_SESSION['uid']."' AND members_network.type=2) OR  
					(members_network.uid='".$_SESSION['uid']."' AND  members_network.to_uid='".$id."' AND members_network.type=2) 
					AND approved='yes' ORDER BY members_network.type ASC LIMIT 1");	
			if(!empty($FriendList)){
				return 1;
			}else{
				return 0;
			}
	}
}
/**
* Info: Displays the file rating stars
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/
function DisplayFileRating($rate){
	$i=1;
	$ReturnValue="";
	$crate = $rate;
	while($i < 6){
		if($crate < 10){
			$ReturnValue .= '<img src="'.DB_DOMAIN.'images/DEFAULT/_stars/rating_off.gif" style="border: 0px none">';
		}elseif($rate > 10 && $rate < 19){
				$ReturnValue .= '<img src="'.DB_DOMAIN.'images/DEFAULT/_stars/rating_half.gif" style="border: 0px none">';
		}else{
			$ReturnValue .= '<img src="'.DB_DOMAIN.'images/DEFAULT/_stars/rating_on.gif" style="border: 0px none">';
		}		
		$crate=$crate-20;
		$i++;
	}
	return $ReturnValue;
}
/**
* Info: Shows the website language flags
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function ShowFlags($mobile="no"){

if ($mobile == 'yes') {
	$string ='<table width="270" border="0" align="center" cellpadding="2" cellspacing="5" style="height:35px;"><tr><td align="center">';
} else {
	$string ='<table width="845" border="0" align="center" cellpadding="1" cellspacing="1" style="height:35px;"><tr><td align="center">';
}

	 $ext = array("php");
	 $files = array();
	 $HandlePath ="inc/langs/";
	 if($handle1 = opendir($HandlePath)) {
	 while(false !== ($file = readdir($handle1))){
	 for($i=0;$i<sizeof($ext);$i++){
	  if(strstr($file, ".".$ext[$i])){
	  $flasg_icon = str_replace(".php","",$file);

		if ($mobile == 'yes') {
			$string .='<a href="'.DB_DOMAIN.'mobile.php?l='.$flasg_icon.'" title="'.$flasg_icon.'"><img src="'.DB_DOMAIN.'images/language/flag_'.$flasg_icon.'.gif" alt="'.$flasg_icon.'" border="0" style="margin-right:8px;margin-bottom:8px;"></a>';
		}else {
			$string .='<a href="'.DB_DOMAIN.'index.php?l='.$flasg_icon.'" title="'.$flasg_icon.'"><img src="'.DB_DOMAIN.'images/language/flag_'.$flasg_icon.'.gif" alt="'.$flasg_icon.'" border="0" style="margin-right:5px;"></a>';
		}
	   }
	   }
	 }
	}
	$string .='</td></tr></table><div class="clear"></div>';
	return $string;
}
/**
* Info: Shows the language dropdown list
* 		
* @version  9.0
* @created  August 2012
*/
function ShowLangList(){


	$string ='<form action="dummyvalue">
<select name="newurl" onchange="menu_goto(this.form)" size="1" style="width:150px;margin-top:8px;">
<option>-- Select Language --</option>';


	$ext = array("php");
	$files = array();
	$fileslist = array(); 
	$HandlePath ="inc/langs/";
	if($handle1 = opendir($HandlePath)) {
	   while(false !== ($file = readdir($handle1))){
	      for($i=0;$i<sizeof($ext);$i++){
	         if(strstr($file, ".".$ext[$i])){
	          $flasg_icon = str_replace(".php","",$file);
	          $lang_name = ucfirst($flasg_icon);
	          //$string .='<option value="mobile.php?l='.$flasg_icon.'" >'.$lang_name.'</option>';
		  $fileslist[] = $flasg_icon;
	         }
	       }
	    }
	}

	sort($fileslist, SORT_LOCALE_STRING);

	foreach ($fileslist as $f) {
	    $lang_name = ucfirst($f);
	    $string .='<option value="mobile.php?l='.$f.'" >'.$lang_name.'</option>';
	} 

	$string .='</select></form>';
	return $string;
}

##########################################################################################
## 								BANNER FUNCTION											##
##########################################################################################
function DisplayBannerCode($Page,$mobile){
	global $DB;
	$NumFields=1;
	$FlagBottom=0;
	$FlagLeft=0; $FlagMid=0;

	if($mobile == "yes"){
		$FlagMid=1;
	}
	$BannerArray=array();
	$FieldString=" AND ( clicks='0' ";
	## DATABASE FIELD 'clicks' NOW REFERS TO THE DISPLAY TYPE
	## IS THIS MEMBER LOGGED IN, IF SO LETS LOOK FOR MEMBERS ONLY BANNERS
	if(isset($_SESSION['auth']) && $_SESSION['auth'] =="yes"){
		$FieldString .="OR clicks='1'";
		if(isset($_SESSION['genderid'])){
			$FieldString .=" OR clicks='".$_SESSION['genderid']."'";
		}
	}
	$Page = str_replace("'","",$Page);
	$Page = str_replace("*","",$Page);
	$FieldString .=" ) ";	
	## We must seelct a random banner for this page from the database and then display it.
	$QQ = "SELECT * FROM banners WHERE (page='".strip_tags($Page).".php' OR page='all') $FieldString AND active='yes' ORDER BY RAND() LIMIT 8";
	$result = $DB->Query($QQ);
	$FlagTop =0;
	while( $row = $DB->NextRow($result) ){
		$BANNER[1]= $row['bid'];
		$BANNER[2]= $row['bName'];
		$BANNER[3]= $row['imglocation'];
		$BANNER[4]= $row['urllocation'];
		$BANNER[5]= $row['width'];
		$BANNER[6]= $row['height'];
		$BANNER[7]= eMeetingOutput($row['code'],true);
		$CanContinue=false;
		##	SET FLAGS IF THIS POSITION HAS BEEN TAKEN
		if($row['position'] =="top" && $FlagTop !=1){
			$CanContinue=true;
			$FlagTop =1;
		}
		if($row['position'] =="left" && $FlagLeft !=1){
			$CanContinue=true;
			$FlagLeft =1;
		}
		if($row['position'] =="middle" && $FlagMid !=1){
			$CanContinue=true;
			$FlagMid =1;
		}
		if($row['position'] =="bottom" && $FlagBottom !=1){
			$CanContinue=true;
			$FlagBottom =1;
		}		
		###############################################
		if($CanContinue){
			## Now lets update the impressions value
			$DB->Update("UPDATE banners SET impressions=impressions+1 WHERE bid= '".$BANNER[1]."' "); 
			##Now lets build the code and pass it back
			if($BANNER[4] != ""){		
				$banner = "<a href='".$BANNER[4]."' target='_blank'>".$BANNER[7]."</a>";
			}else{
				$banner = "".$BANNER[7]."";
			}
			$BannerArray[$NumFields]['display']	= "<div align='center'>".$banner."</div>";			
			$BannerArray[$NumFields]['position']	= $row['position'];
			$NumFields++;
		}
	}
	return $BannerArray;
}
##########################################################################################
## 								EMAIL FUNCTIONS											##
##########################################################################################
function SendMail($to, $subject, $message){
	global $DB;
	$subject = eMeetingOutput($subject,true);
	$message = eMeetingOutput($message,true);
	$DB_MAIL = new htmlMimeMail();
	// ARE WE SENDING VIA SMTP OR SENDMAIL ?
	if(USE_SMTP =="yes"){
		// SEND SMTP
		$text = "";
		$html = $message;
		$DB_MAIL->setHtml($html, $text);
		$DB_MAIL->setSMTPParams(SMTP_SERVER, SMTP_PORT, "",SMTP_FROM_NAME, SMTP_USERNAME,SMTP_PASSWORD);
		$DB_MAIL->setReturnPath(ADMIN_EMAIL);
		$DB_MAIL->setFrom('"'.SEND_ADMIN_NAME.'" <'.ADMIN_EMAIL.'>');
		$DB_MAIL->setSubject($subject);	 
		$result = $DB_MAIL->send(array($to), 'smtp');
	}else{
	# Common Headers
	@ini_set(sendmail_from, ADMIN_EMAIL);	
	$text = "";
	$html = $message;
	$DB_MAIL->setHtml($html, $text);
	$DB_MAIL->setReturnPath(ADMIN_EMAIL);
	$DB_MAIL->setFrom('"'.SEND_ADMIN_NAME.'" <'.ADMIN_EMAIL.'>');
	$DB_MAIL->setSubject($subject);
	$DB_MAIL->setHeader('X-Mailer', 'eMeeting Dating Software');
	$result = $DB_MAIL->send(array($to));
	@ini_restore(sendmail_from);
	}
}
/**
* Info: Makes Request to send SMS
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function DoEmailSMS($uid,$mailid,$type,$message=0, $Data=array()){
	global $DB;
	$val = $DB->Row("SELECT members_privacy.uid, members_privacy.email_winks, members_privacy.email_msg, members_privacy.email_friends,	members_privacy.email_match, members_privacy.Notifications, members.username, members.email, members_privacy.SMS_email, members_privacy.SMS_country, members_privacy.SMS_number, members_privacy.SMS_credits FROM members_privacy, members WHERE members_privacy.uid = members.id AND members_privacy.uid=".$uid);
	if($val[$type] =="yes"){
		$Data['email'] =  $val['email'];
		$Data['username'] =  $val['username'];
		$Data['from_username'] = $_SESSION['username'];																	
		SendTemplateMail($Data, $mailid);
	}
	if(strlen($message) > 1 && $val['SMS_credits'] > 0 && UPGRADE_SMS =="yes"){
		// SEND SMS NOTIFICATION
		$val['message'] = substr($message,0,30);
		//$val['SMS_country'] = MakeCountry($val['SMS_country']);
		DoSMS($val);
	}
}
/**
* Info: Used to send all of the emails
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function ReplaceEmailContent($Data, $EmailContent){
	global $DB;
	## change email content
	$EmailContent = str_replace("(date)", 		date('l jS \of F Y'), 		$EmailContent);	
	if(isset($Data['username'])){ 		$EmailContent = str_replace("(username)", 		$Data['username'], 		$EmailContent); }
	if(isset($Data['from_username'])){	$EmailContent = str_replace("(from_username)", 	$Data['from_username'], $EmailContent); }
	if(isset($Data['password'])){		$EmailContent = str_replace("(password)", 		$Data['password'], 		$EmailContent); }
	if(isset($Data['email'])){			$EmailContent = str_replace("(email)", 			$Data['email'], 		$EmailContent); }
	if(isset($Data['profile_complete'])){	$EmailContent = str_replace("(profile_complete)", $Data['profile_complete'], $EmailContent); }
	if(isset($Data['name'])){			$EmailContent = str_replace("(name)", 			$Data['name'], 			$EmailContent); }
	if(isset($Data['message'])){		$EmailContent = str_replace("(message)", 		$Data['message'], 		$EmailContent); }
	if(isset($Data['custom'])){			$EmailContent = str_replace("(custom)", 		$Data['custom'], 		$EmailContent); }
	if(isset($Data['gender'])){			$EmailContent = str_replace("(gender)", 		MakeGender($Data['gender']), 		$EmailContent); }
	if(isset($Data['country'])){		$EmailContent = str_replace("(country)", 		MakeCountry($Data['country']), 		$EmailContent); }
	if(isset($Data['location'])){		$EmailContent = str_replace("(location)", 		$Data['location'], 		$EmailContent); }
	if(isset($Data['headline'])){		$EmailContent = str_replace("(headline)", 		$Data['headline'], 		$EmailContent); }
	if(isset($Data['active'])){			$EmailContent = str_replace("(status)", 		$Data['active'], 		$EmailContent); }
	if(isset($Data['updated'])){		$EmailContent = str_replace("(updated)", 		$Data['updated'], 		$EmailContent); }
	if(isset($Data['hits'])){		$EmailContent = str_replace("(hits)", 		$Data['hits'], 		$EmailContent); }
	if(isset($Data['age'])){		$EmailContent = str_replace("(age)", 		MakeAge($Data['age']), 		$EmailContent); }
	if(isset($Data['link'])){			$EmailContent = str_replace("(link)", 			$Data['link'], 			$EmailContent); }
	if(isset($Data['ipaddress'])){			$EmailContent = str_replace("(ipaddress)", 			$Data['ipaddress'], 			$EmailContent); }
	if(isset($Data['custom'])){		// ACTIVATION CODE LINK		
		if(VALIDATE_EMAIL ==1){		
				$alink = "<a href='".DB_DOMAIN."index.php?valMe=".$Data['custom']."&email=".$Data['email']."'>".DB_DOMAIN."index.php?valMe=".$Data['custom']."&email=".$Data['email']."</a>";
				$EmailContent = str_replace("(link)", 		$alink, 		$EmailContent); 		
		}else{
			$EmailContent = str_replace("(link)","",$EmailContent); 
		}		
	}
	// MEMBER MATCHES
	$pos = strpos($EmailContent, "(matches)");
	if ($pos === false) {} else {
		$EmailM="";
		require_once(	str_replace("func","",dirname(__FILE__))."/API/api_functions.php" );
		$MatchData = MyMatchResults($Data['id'], 10);
		if(!empty($MatchData) && is_array($MatchData)){
			$i=1;
			$EmailM .="<center>";
			foreach($MatchData as $value){
				if($i % 2){ $bgColor ="#FFF3EE"; }else{ $bgColor ="#FFE9DF"; }
				if($value['location'] ==0){ $value['location']=""; }
				$EmailM .='<table cellspacing="0" cellpadding="0"  bgcolor="'.$bgColor.'" style="border-top:1px solid #FFE0D3;" width="600px"><tr><td width="134"><p align="center"><a href="'.$value['link'].'"><img width="56" height="56" src="'.$value['image'].'" alt="'.$value['username'].'"></a><br><a href="'.$value['link'].'" style="font-size: 12px;font-weight: bold; color:#333333"><strong>'.$value['username'].' </strong></a></p></td><td width="130" align="center" style="font-size:12px;">  <p>'.$value['age'].' years / '.$value['gender'].'<br><strong>'.$value['country'].'</strong><br><strong>'.$value['location'].'</strong> <br></p></td><td width="334" align="center"><p style="font-size:16px;font-weight:bold;">'.$value['headline'].'</p><p style="font-size:12px;">'.$value['description'].'</p></td></tr></table>';
				$i++;
			}
			$EmailM .="</center>";
		}	
		$EmailContent = str_replace("(matches)", 			$EmailM, 			$EmailContent);
	}
	$EmailContent = str_replace("(link)", 			$Data['link'], 			$EmailContent); 
	$EmailContent = str_replace("(website)", "<a href='".DB_DOMAIN."'>".DB_DOMAIN."</a>", $EmailContent);
	return $EmailContent;
}
function SendTemplateMail($Data, $TemplateID){
	global $DB;
	$DB_MAIL = new htmlMimeMail();
	$today_time=TIME_NOW;
	$today_date=DATE_NOW;		
	if(!isset($Data['email'])){ return 2; }
	## Get the email body for the database
	if($TemplateID != ""){
		$row = $DB->Row("SELECT name, content FROM email_newsletters WHERE nid ='".$TemplateID."' LIMIT 1");
		## Show contact message not template message
		$EmailContent = $row['content'];	
		$EmailSubject= $row['name'];
	}else{
		## no template selected
		return;
	}
	// SENDING FROM
	$EmailSender = SEND_ADMIN_NAME;
//if(isset($Data['username'])){ $EmailSender = $Data['username']; }
	// BASIC EMAIL SRTING REPLACE
	$EmailSubject = ReplaceEmailContent($Data, $EmailSubject);	
	$EmailContent = ReplaceEmailContent($Data, $EmailContent);	
	// EMAIL TRACKING CODE
	if(stristr($EmailContent, '(tracking_id)') === FALSE) {}else{		
		$TrackingCode = $DB->Row("SELECT content FROM email_newsletters WHERE name='tracking'");
		$EmailContent = str_replace("(tracking)", $TrackingCode['content'], $EmailContent);		
		// replace the tracking id with the image code
		$ImgTranslate = "<img src='".DB_DOMAIN."inc/exe/tracking/NS_OPEN.php?email=".$Data['email']."&nid=".$TemplateID."' width='0' height='0'>";
		$EmailContent = str_replace("(tracking_id)", $ImgTranslate, $EmailContent);		
		// add database tracking
		$DB->Insert("INSERT INTO `email_sendtime` (`email` ,`send_date` ,`nid` ,`status`)VALUES ('".$Data['email']."', '".DATE_NOW."', '$TemplateID', 'sent')");	
	}	
	// sctrip out R/N
	$EmailSubject = eMeetingOutput($EmailSubject,true);
	$EmailContent = eMeetingOutput($EmailContent,true);
	// ARE WE SENDING VIA SMTP OR SENDMAIL ?
	if(USE_SMTP =="yes"){
		// SEND SMTP
		$text = "";
		$html = $EmailContent;
		$DB_MAIL->setHtml($html, $text);
		$DB_MAIL->setSMTPParams(SMTP_SERVER, SMTP_PORT, "",SMTP_FROM_NAME, SMTP_USERNAME,SMTP_PASSWORD);
		$DB_MAIL->setReturnPath(ADMIN_EMAIL);
		$DB_MAIL->setFrom('"'.$EmailSender.'" <'.ADMIN_EMAIL.'>');
		$DB_MAIL->setSubject($EmailSubject);
		$result = $DB_MAIL->send(array($Data['email']), 'smtp');
	}else{
		@ini_set(sendmail_from, ADMIN_EMAIL);	
		# Common Headers
		$text = "";
		$html = $EmailContent;
		$DB_MAIL->setHtml($html, $text);
		$DB_MAIL->setReturnPath(ADMIN_EMAIL);
		$DB_MAIL->setFrom('"'.$EmailSender.'" <'.ADMIN_EMAIL.'>');
		$DB_MAIL->setSubject($EmailSubject);
		$DB_MAIL->setHeader('X-Mailer', 'eMeeting Dating Software');
		$result = $DB_MAIL->send(array($Data['email']));
		@ini_restore(sendmail_from);
	}
	 return 2;
}
/**
* Info: Displays the Country List
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function DisplayCountries($value="", $ShowID=false){
			global $DB;
			$string = "";
			// MAKE SESSION COUNTRY
			//if($value !="" && !is_numeric($value)){   $value=MakeCountryID($value);  }
			// DISLAY DEFAULT COUNTRY
			if(strlen($value) > 1){
				if(isset($_SESSION['clever_ip_country_name']) && $value == $_SESSION['clever_ip_country_name']){	
				$string .= '<option value="'.MakeCountryID($_SESSION['clever_ip_country_name']).'">'.$_SESSION['clever_ip_country_name'].'</option><option value="0">------------</option>';	
				}else{
				if(is_numeric($value)){ $valueCaption = MakeCountry($value); }else{ $valueCaption=$value; }
				$string .= '<option value="'.$value.'">'.$valueCaption.'</option><option value="0">------------</option>';	
				}
			}else{
				$string .= '<option value="0">------------</option>';			
			}
			// GET DATABASE COUNTRY ROWS
			$FindCountry = $DB->Query("SELECT fvid, fvCaption,`default` FROM field_list_value WHERE fvFid=25 AND lang='".D_LANG."' ORDER BY fvCaption ASC");
			$tfO =1;
			while( $cc = $DB->NextRow($FindCountry) ){			
					if($cc['default'] =="yes"){
					$selected="selected";
					}else{
					$selected="";
					}		
					if($value != ""){
							$string .= '<option value="'.$cc['fvid'].'">'.$cc['fvCaption'].'</option>';
					}else{
							$string .= '<option value="'.$cc['fvid'].'" '.$selected.'>'.$cc['fvCaption'].'</option>';	
					}				
				$tfO++;
			}
			// BACKUP INCASE NOT VALUES FOUND
			if($tfO ==1){
					$FindCountry = $DB->Query("SELECT fvid, fvCaption,`default` FROM field_list_value WHERE fvFid=25 ORDER BY fvOrder ASC");
					while( $cc = $DB->NextRow($FindCountry) ){
						if($value != ""){
							$string .= '<option value="'.$cc['fvid'].'">'.$cc['fvCaption'].'</option>';
						}else{
							$string .= '<option value="'.$cc['fvid'].'" '.$cc['default'].'>'.$cc['fvCaption'].'</option>';	
						}
						$tfO++;
					}
			}
			// COMPLETE SELECT
			 $string .= '</select>';
			// DEFAULT SELECTION
			if($value !=""){
				$SelectCountry = $value;
			}else{
				$FindC = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvFid=25 ORDER BY `default` ASC LIMIT 1");
				$SelectCountry = $FindC['fvCaption'];				
			}
			return $string;
}
/**
* Info: Displays the States List
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function DisplayStates($value="", $ShowID=false){
			global $DB;
			$string = "";
			$string .= '<option value="0">------------</option>';			

			
			// GET DATABASE STATES ROWS
			$FindState = $DB->Query("SELECT fvid, fvCaption,`default` FROM field_list_value WHERE fvFid=54 AND linked_cap_id=569 AND lang='".D_LANG."' ORDER BY fvCaption ASC");
			$tfO =1;
			while( $cc = $DB->NextRow($FindState) ){			
					if($cc['default'] =="yes"){
					$selected="selected";
					}else{
					$selected="";
					}		
					if($value != ""){
							$string .= '<option value="'.$cc['fvid'].'">'.$cc['fvCaption'].'</option>';
					}else{
							$string .= '<option value="'.$cc['fvid'].'" '.$selected.'>'.$cc['fvCaption'].'</option>';	
					}				
				$tfO++;
			}
			// COMPLETE SELECT
			 $string .= '</select>';
			return $string;
}

/**
* Info: Displays the location for the country
* 		
* @version  9.0
* @created  Fri Sep 25 , 2008
* @updated  Fri Sep 25  , 2008
*/
function Displaylocations($value=""){
	/* NOT USED IN V9 */
	return $value;
}
##########################################################################################
## 								SMS FUNCTIONS											##
##########################################################################################
function MakeCountry1($id, $fvFid=""){
	global $DB;
	if(!is_numeric($id)){
	return $id;
	}elseif($id == 0 || $id == ""){
		return "na";
	}else{
		if(is_numeric($fvFid)){ $SaveID = $id."0".$fvFid; }else{ $SaveID =$id; }
		if(isset($_SESSION['country'][$SaveID]['name'])){
		return $_SESSION['country'][$SaveID]['name'];
		}else{
			if(is_numeric($fvFid)){ $Extra ="AND fvFid='".$fvFid."'"; }else{ $Extra =""; }
			$re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."'  ".$Extra." AND lang='".D_LANG."' LIMIT 1");
			if(empty($re3)){
			$re3 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."' ".$Extra." LIMIT 1");
			}
			$_SESSION['country'][$SaveID]['name'] = $re3['fvCaption'];
			return $re3['fvCaption'];
		}
	}
}
function DoSMS($DataArray){
	global $DB;
	if($DataArray['SMS_email'] =="on" && $DataArray['SMS_number'] != "" && $DataArray['SMS_credits'] > 0 && UPGRADE_SMS =="yes"){
		// DOES THE USER HAVE CREDITS ??
		// BUILD SMS MESSAGE
		if(is_numeric($DataArray['SMS_country'])){ $DataArray['SMS_country'] = MakeCountry1($DataArray['SMS_country']); }
		$SMSMsgString = "SMS Message Alert - Message From: ".$_SESSION['username']." - ".$DataArray['message'].".. - Login at: ".DB_DOMAIN." to read the rest.";
		$WhatHappened = SendSMS($_SESSION['username'], $DataArray['SMS_number'], $SMSMsgString, $DataArray['SMS_country'], KEY_ID);									
		// retrieve confirmation from system that message was sent
		$DB->Update("UPDATE members_privacy SET SMS_credits=SMS_credits-1 WHERE uid='".$DataArray['uid']."' LIMIT 1");
		switch($WhatHappened){
				case "1": { // MESSAGE SENT
				// ALL DONE, LETS REMOVE A CREDIT FROM THIS USER
				} break;
				case "2": { // MESSAGE FAILED
				// OPS, TELL THIS USER THE MESSAGE COULDNT BE SENT
				// OR DO NOTHING FOR NOW
				} break;
				case "3": { // SYSTEM DIDNT LIKE THE LOGIN DETAILS
				// OPS, TELL THIS USER TO TRY AGAIN LATER
				SendSMSWarning();
				} break;
		}						
	}
	return 0;
}
 /**
	 * Info: fucntion used to check a members messenger account for their contact list
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
function ContactListChecker($email, $password){
			if (!$curld = curl_init()) {
						return 0;
			}else{
					require_once("inc/classes/class_imfunctions.php");
					$CookiePath = str_replace("/images", "", PATH_IMAGE);
					$RunningCount =1;
					$ContactsDataArray = array();
					if (eregi('yahoo', $email)) {
						$system="yahoo";
					}elseif (eregi('gmail', $email)) {
						$system="gmail";
					}elseif (eregi('googlemail', $email)) {
						$system="gmail";
					}elseif (eregi('aol', $email)) {
						$system="aol";
					}elseif (eregi('hotmail', $email)) {
						$system="hotmail";
					}else{
						return 0;
					}
					$contactemails=eMeeting_Contacts($email,$password, $system,$CookiePath);
					if(is_array($contactemails)){
						// GET EMAIL ADDRESS ARRAY
						//$EmailArray = GetEmailArray();
							foreach($contactemails as $contact){							
									$ContactsDataArray[$RunningCount]['username'] = htmlspecialchars(@$contact[0],ENT_QUOTES);
									$ContactsDataArray[$RunningCount]['email'] = htmlspecialchars(@$contact[1],ENT_QUOTES);									
									$RunningCount++;			
							}							
							return $ContactsDataArray;
					}else{						
						return 0;
					}
			}
}	
##########################################################################################
## 								CALENDAR FUNCTIONS										##
##########################################################################################
function GetFriendIDS(){
		global $DB;
		$myFriends = array();
		$fString=" AND (";
		$run=1;
		$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY
		$result = $DB->Query("SELECT DISTINCT  members.id AS uid
			FROM members_network 
			LEFT JOIN members ON ( members.id = members_network.to_uid OR  members.id = members_network.uid )
			WHERE (members_network.uid='".$_SESSION['uid']."' OR  members_network.to_uid='".$_SESSION['uid']."') AND members.username != ( '".$_SESSION['username']."' ) AND members_network.type= ( '2' ) GROUP BY members.id");
		while( $af = $DB->NextRow($result) ){
			// build string
			$fString .= " calendar_data.uid=('".$af['uid']."')  OR  ";
			$run++;
		}
		$fString .=" calendar_data.uid=('".$_SESSION['uid']."') OR calendar_data.vis='all' ) ";
		return $fString;
}
///////////////////////////////////////////////////////////////////////////////////////////
// DO NOT DELETE THE FUNCTIONS BELOW
///////////////////////////////////////////////////////////////////////////////////////////
function PageNumbers($max_results,$page, $show_next_box=true){
	if($page ==0){$page=1; }
	require_once(	str_replace("func","",dirname(__FILE__))."/classes/class_pagenumbers.php"			);
 	$SearchNav = "<div id='PageNums'>";   
	$SearchNav .= "";
    $pag = new pageNumbers($page, $GLOBALS['total_pages'], 2);
    //the first and the last page number will always be displayed
    //we need a separator between the first/last page number and the middle page numbers
    $separator = "<a href='#' style='background:white;border:0px;color:#666;'>...</a>";
    foreach($pag->numbers as $pageNumber=>$type)
    {
        //each number has a type
        //there are 4 types:
        //  "current" - the curent page number;
        //  "link" - link to other page numbers
        //  "separatorAfter" - first line number when it needs the separator (separator after number)
        //  "separatorBefore" - last line number when it needs the separator (separator before number)  
        switch($type)
        {
            case "current": {
				$SearchNav .= "<a href='#' class='selected'> ".$GLOBALS['_LANG']['_page']." ".$pageNumber." ".$GLOBALS['_LANG']['_of']." ".$GLOBALS['total_pages']." </a>";
             } break;
            case "link": {
				$SearchNav .= "<a href='#' onclick=\"javascript:ChangePage('".$pageNumber."');\">".$pageNumber."</a>";
             } break;
            case "separatorAfter": $SearchNav .= " <a href='#' onclick=\"javascript:ChangePage('".$pageNumber."');\">" . $pageNumber . '</a>' . $separator . '';
                break;
            case "separatorBefore": $SearchNav .= '' . $separator . " <a href='#' onclick=\"javascript:ChangePage('".$pageNumber."');\">" . $pageNumber . '</a>';
                break;
        }
    }
	$SearchNav .= "<div class='ClearAll'></div></div><div class='ClearAll'></div>";
	return $SearchNav;
}
	 /**
	 * Info: Creates an array of bad words to filter
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function CreateBadWordFilter(){
		global $DB;
		$BadWords = array();$bw = 1;
		$result = $DB->Query("SELECT * FROM badwords");
		while( $im = $DB->NextRow($result) ){
			$BadWords['word'][$bw] = $im['word'];  
			$bw ++;
		}
		return $BadWords;
	}
	function filter_str($text,$BadWords) {
		global $DB;
		## define variables
		$output = $text; 
		if(is_numeric($text)){ 
			return $text; 
		}elseif(is_array($BadWords)){			
				for($i=0; $i <= count($BadWords['word']); $i++){		
					if(isset($BadWords['word'][$i])){
						$output = str_replace($BadWords['word'][$i],BADWORD_REPLACE,$output);
					}		
				}	
		}
		return $output;
	}
	 /**
	 * Page: Common Functions for checking data input
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function CheckAddSlashes( $string ) {	
		if (get_magic_quotes_gpc()==1) {
			return $string;	
		} else { 
			return  addslashes ( $string );	
		}	
	}
	 /**
	 * Page: Show the time since event date
	 * 		
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Jan 18 10:48:31 EEST 2008
	 */
	function showTimeSince($date){
	// FORMAT STRING MAKING SURE IT CONTAINS 
	// BOTH DATE AND TIME FOR CALCULATIONS
	if(defined(DATE_DISPLAY_FORMAT) && DATE_DISPLAY_FORMAT == "m-d-Y"){ // Y-m-d
		$dd = explode(" ",$date);
		$regs = explode("-",$dd[0]);
		$ThisDate = $regs[2]."-".$regs[0]."-".$regs[1]. " ".$dd[1];
	}elseif(defined(DATE_DISPLAY_FORMAT) && DATE_DISPLAY_FORMAT == "m-Y-d"){
		$dd = explode(" ",$date);
		$regs = explode("-",$dd[0]);
		$ThisDate = $regs[1]."-".$regs[0]."-".$regs[2]. " ".$dd[1];
	}else{
		$ThisDate = $date;
	}
		$timedate = date("Y-m-d H:i:s");
		$elapsed = round(get_elapsed_time( $ThisDate, $timedate, 'seconds', 3 ) );	
		$distanceInMinutes = round($elapsed / 60);
		if ( $distanceInMinutes <= 1 ) {             
                return str_replace("%1",$elapsed,$GLOBALS['LANG_COMMON'][26]);           
        }
        if ( $distanceInMinutes < 45 ) {
			return str_replace("%1",$distanceInMinutes,$GLOBALS['LANG_COMMON'][27]); 
        }
        if ( $distanceInMinutes < 90 ) {
           return str_replace("%1","1",$GLOBALS['LANG_COMMON'][32]);
        }
        if ( $distanceInMinutes < 1440 ) {
			return str_replace("%1",round(floatval($distanceInMinutes) / 60.0),$GLOBALS['LANG_COMMON'][32]);
        }
        if ( $distanceInMinutes < 2880 ) {
            return '1 '.$GLOBALS['_LANG']['_days'] . " ".$GLOBALS['_LANG']['_ago'];
        }
        if ( $distanceInMinutes < 43200 ) {
			return str_replace("%1",round(floatval($distanceInMinutes) / 1440),$GLOBALS['LANG_COMMON'][28]);
        }
        if ( $distanceInMinutes < 86400 ) {
            return $GLOBALS['_LANG']['_about'].' 1 '.$GLOBALS['_LANG']['_month']." ".$GLOBALS['_LANG']['_ago'];
        }
        if ( $distanceInMinutes < 525600 ) {
			return str_replace("%1",round(floatval($distanceInMinutes) / 43200),$GLOBALS['LANG_COMMON'][30]); 
        }
        if ( $distanceInMinutes < 1051199 ) {
            return $GLOBALS['_LANG']['_about'].' 1 '.$GLOBALS['_LANG']['_year']." ".$GLOBALS['_LANG']['_ago'];
        }
        return substr($ThisDate,0,10);  
	}
	function get_elapsed_time(
		$time_start,
		$time_end,
		$units = "seconds",
		$decimals = 2
	)
	{
		$divider['years']   = ( 60 * 60 * 24 * 365 );
		$divider['months']  = ( 60 * 60 * 24 * 365 / 12 );
		$divider['weeks']   = ( 60 * 60 * 24 * 7 );
		$divider['days']    = ( 60 * 60 * 24 );
		$divider['hours']   = ( 60 * 60 );
		$divider['minutes'] = ( 60 );
		$divider['seconds'] = 1;
		$elapsed_time = ( ( get_mysql_to_epoch( $time_end )
						- get_mysql_to_epoch( $time_start ) )
						/ $divider[$units] );
		$elapsed_time = sprintf( "%0.{$decimals}f", $elapsed_time );
		return $elapsed_time;
	}
	function get_mysql_to_epoch( $date )
	{
		list( $year, $month, $day, $hour, $minute, $second )
			= preg_split( '([^0-9])', $date );
		return date( 'U', @mktime( $hour, $minute, $second, $month, $day,
			$year ) );
	}
function DisplayMainPageInfo($data, $page, $show_page,  $title, $extra1=""){
	if(!array($data)){ return ""; }
	print '
	<style>
	.topTitle { font-size:14px; font-weight:bold; padding-bottom:0px; margin-bottom:0px;}
	 .speadlist li {  float:left; }
	.speadlist li a { text-decoration:none;}
	.TopAdverts { display:none;}
	.TopGroups { display:none;}
	.TopCalendar { display:none;}
	</style>
	<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"><div style="padding:10px;font-weight:bold;"> <h3 style="padding:0px; margin:0px;"></h3>
	</div><b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="padding:10px;">
	<img src="'.$data['image'].'" style="float:left; margin-right:20px;" width="96" height="96"> 
	<h2 style="line-height:35px; font-size:18px;">'.$data['title'].'</h2><p>'.$data['sub_title'].'';
	print '<div class="ClearAll"></div>
	<p class="topTitle"> '.$GLOBALS['_LANG']['_information'].' <p>
	<hr>
	<p>'.$data['comments'].'</p>';
	if(isset($data['website']) && strlen($data['website']) > 5){
	print '<p> <a href="'.$data['website'].'" style="text-decoration:none;" target="_blank"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/add.png" align="absmiddle"> '.$GLOBALS['_LANG']['_visit'].' '.$GLOBALS['_LANG']['_website'].'</a> <p>';
	}
	// ATTACHMENT ALBUM ATA
	if(isset($data['attachment']) && $data['attachment'] !=0){
		print GetAttachmentAlbum($data['attachment']);
	}
	if(isset($data['image'])){   
	if(isset($data['user_image'])){$data['image'] = $data['user_image']; }
	print '<div style="padding:3px; background:#eee;color:#444444;line-height:31px; font-size:12px;">
	<a href="'.$data['user_link'].'"><img src="'.$data['image'].'" width="56" height="56" align="absmiddle" style="float:left; padding-right:20px;"></a>
	<span>';
	print $GLOBALS['_LANG']['_createdBy'].': <b style="font-size:16px;"><a href="'.$data['user_link'].'">'.$data['username'].'</a></b> ';
	if(isset($data['hits'])){ 
		 print $GLOBALS['_LANG']['_views'].': <b style="font-size:16px;">'.number_format($data['hits']).'</b> '; 
	}
	print '<span style="display:block; font-size:11px; color:#666666;">';
	if(isset($data['date_updated'])){
	print ' '.$GLOBALS['_LANG']['_updated'].' @ '.$data['date_updated'].' '; 
	} 
	if(isset($data['rating'])){ 
		 print $GLOBALS['_LANG']['_rating'].': <b style="font-size:16px;">'.$data['percent'].'</b>%'; 
		if(round($data['percent']) > 50){
			print ' <img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/thumb_up.png" align="absmiddle">';
		}else{
			print ' <img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/thumb_down.png" align="absmiddle">';
		}
	}
	print '</span> <div class="ClearAll"></div></div>';
	}
	 $BlogTitle = str_replace(" ","-",$title);
if($page !="groups"){
	print '<p class="topTitle">'.$GLOBALS['_LANG']['_speadWord'].'<p>
	<hr>
	<ul class="speadlist"><li>
	<a target="_blank" href="http://del.icio.us/post?title='.$BlogTitle.'&amp;url='.curPageURL().'" style="background: transparent url(images/DEFAULT/_acc/delicious.gif) no-repeat scroll left center; padding-left: 20px; margin-left: 10px;">&nbsp;</a> 
	</li><li>
	<a target="_blank" href="http://digg.com/submit?phase=2&amp;title='.$BlogTitle.'&amp;url='.curPageURL().'&amp;bodytext=This+is+documentation+for+the+Interspire+Email+Marketer+XML+API.+This+includes+descriptions+of+the+various+functions+and+how+they+are+used+showing+examples." style="background: transparent url(images/DEFAULT/_acc/digg.gif) no-repeat scroll left center; padding-left: 20px; margin-left: 10px;">&nbsp;</a> 
	</li><li>
	<a target="_blank" href="http://www.furl.net/storeIt.jsp?t='.$BlogTitle.'&amp;u='.curPageURL().'" style="background: transparent url(images/DEFAULT/_acc/furl.gif) no-repeat scroll left center; padding-left: 20px; margin-left: 10px;">&nbsp;</a> 
	</li><li>
	<a target="_blank" href="http://reddit.com/submit?title='.$BlogTitle.'&amp;url='.curPageURL().'" style="background: transparent url(images/DEFAULT/_acc/reddit.gif) no-repeat scroll left center; padding-left: 20px; margin-left: 10px;">&nbsp;</a> 
	</li><li>
	<a target="_blank" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?title='.$BlogTitle.'&amp;u='.curPageURL().'&amp;popup=true" style="background: transparent url(images/DEFAULT/_acc/yahoo.gif) no-repeat scroll left center; padding-left: 20px;margin-left: 10px; ">&nbsp;</a> 
	</li>
	<li><a target="_blank" href="http://www.stumbleupon.com/submit?url='.curPageURL().'&title='.$BlogTitle.'" style="background: transparent url(images/DEFAULT/_acc/stumbleupon.gif) no-repeat scroll left center; padding-left: 20px;margin-left: 10px; ">&nbsp;</a> 
	</li>
	<li><a target="_blank" href="http://www.google.com/bookmarks/mark?op=edit&bkmk='.curPageURL().'&title='.$BlogTitle.'" style="background: transparent url(images/DEFAULT/_acc/google.gif) no-repeat scroll left center; padding-left: 20px;margin-left: 10px; ">&nbsp;</a> 
	</li>
	<li><a target="_blank" href="https://favorites.live.com/quickadd.aspx?marklet=1&mkt=en-us&url='.curPageURL().'&title='.$BlogTitle.'&top=1" style="background: transparent url(images/DEFAULT/_acc/live.gif) no-repeat scroll left center; padding-left: 20px;margin-left: 10px; ">&nbsp;</a> 
	</li><li>
	<a target="_blank" href="http://www.technorati.com/faves?add='.curPageURL().'" style="background: transparent url(images/DEFAULT/_acc/technorati.gif) no-repeat scroll left center; padding-left: 20px;margin-left: 10px; ">&nbsp;</a> 
	</li></ul><div class="ClearAll"></div><br>
';
}
	if($page =="calendar" && is_array($extra1) && !empty($extra1)){ 
		print '<p class="topTitle">'.$GLOBALS['LANG_GLO_OPTIONS']['10'].'<p><hr>';
	//$FoundMe=0; 
		foreach($extra1 as $value){ 
		//if($value['id'] ==$_SESSION['uid']){ $FoundMe=1; } 
		print '<a href="index.php?dll=profile&pId='.$value['uid'].'"><img src="'.$value['image'].'" class="img_border" style="float:left; margin-right:20px;" width="48" height="48"></a>';
		}
	}
	if($page =="groups" && is_array($extra1) && !empty($extra1)){ 
		print '<p class="topTitle">'.$GLOBALS['_LANG']['_members'].'<p><hr>';
		$FoundMe=0; 
		foreach($extra1 as $value){ 
		if($value['id'] ==$_SESSION['uid']){ $FoundMe=1; } 
		print '<a href="index.php?dll=profile&pId='.$value['id'].'"><img src="'.$value['image'].'" class="img_border" style="float:left; margin-right:20px;" width="48" height="48"></a>';
		}
	}
	if(!isset($PageTitle)){ $PageTitle=""; }
	if($page =="groups" && $data['joined'] =="no"){
	}else{
	print '<div class="clear"></div><p class="topTitle">'.$GLOBALS['_LANG']['_comments'].'<p>';
	displayCommentsBox("290", $page, $show_page, $data['uid'], $data['id'],$title,0);
	}
	print '<br><br></div><b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>';
	if($page =="groups"){
	 return $FoundMe;
	}
}
function PageOptionsBox($data, $page, $sub){
	if(!isset($data['title'])){ $data['title']=DB_DOMAIN; }
	 if($_SESSION['uid'] == $data['uid']){
		print '<p><a href="index.php?dll='.$page.'&sub=add&eid='.$data['id'].'" style="text-decoration:none;"> <img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/pencil.png" width="16" height="16" align="absmiddle">  &nbsp;&nbsp '.$GLOBALS['_LANG']['_edit'].'</a></p><hr>';
	}
	## display delete functions for moderator
	if( isset($_SESSION['site_moderator_approve']) && $_SESSION['site_moderator_approve']=="yes" && $data['ThisApproved']=="no"){ 
		print '<p><span><span id="Approvediv_'.$data['id'].'"><br><a href="javascript:void(0)" onClick="AdminLiveApprove(\''.$data['id'].'\', \''.$page.'\', \''.$sub.'\'); Effect.Fade(\'Approvediv_'.$data['id'].'\'); return false;" style="text-decoration:none">
		<img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/chk_on.png" align="absmiddle"> &nbsp;&nbsp '.$GLOBALS['_LANG']['_approve'].'</a></span></span></p><hr>';
	}
	print '	
	<p><span><a href="javascript:void(0);" onclick="window.print ()" style="text-decoration:none;"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/IconPrint.gif"> '.$GLOBALS['LANG_GLO_OPTIONS']['2'].'</a></span></p><hr>
	<p><span><a href="index.php?dll=invite" style="text-decoration:none;"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/IconEmail.gif"> '.$GLOBALS['LANG_GLO_OPTIONS']['3'].'</a></span></p><hr>
	<p><span><a href="index.php?dll=messages&sub=create&n='.$data['username'].'" style="text-decoration:none;"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/IconComment.gif"> '.$GLOBALS['LANG_GLO_OPTIONS']['5'].'</a></span></p><hr>
	<p><span><a href="javascript:void(0);" onClick="javascript:bookmark(\''.curPageURL().'\', \''.$data['title'].'\');" style="text-decoration:none;"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/IconFav.gif"> '.$GLOBALS['LANG_GLO_OPTIONS']['6'].'</a></span></p><hr>
	<p><span><a href="javascript:void(0);" onclick="javascript:popPDF(\''.$page.'\','.$data['id'].', \''.DB_DOMAIN.'\');" style="text-decoration:none;"><img src="'.DB_DOMAIN.'images/DEFAULT/_acc/pdf.gif"> '.$GLOBALS['LANG_GLO_OPTIONS']['7'].' </a></span></p><hr>
	';
}
function PageLinkBox(){
	print ' 
	<h1>'.$GLOBALS['_LANG']['_page'].' '.$GLOBALS['_LANG']['_link'].'</h1><br>
	<form id="page_link_form" name="page_link_form" style="padding:0px; margin:0px;">
	<TEXTAREA id="page_link"  style="width:195px; text-align:left;" 
	onclick=javascript:document.page_link_form.page_link.focus();document.page_link_form.page_link.select(); name="page_link" readOnly class="input">'.curPageURL().'
	</TEXTAREA> 
	</form>';
}
function curPageURL() {
 $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].htmlspecialchars($_SERVER['REQUEST_URI']) : "http://".$_SERVER['SERVER_NAME'].htmlspecialchars($_SERVER['REQUEST_URI']);
 return $url;
}
function myCheckDNSRR($hostName, $recType = 'MX')
{
 if(!empty($hostName)) {
   exec("nslookup -type=$recType $hostName", $result);
   // check each line to find the one that starts with the host
   // name. If it exists then the function succeeded.
	if(!empty($result)){
		return false;
	}
   // otherwise there was no mail handler for the domain
   return true;
 }
 return true;
}
function rename_win($oldfile,$newfile) { if (@!rename($oldfile,$newfile)) { if (copy ($oldfile,$newfile)) { unlink($oldfile); return TRUE; } return FALSE; } return TRUE; }
function dates_interconv( $date_str ) { 
$dd = explode(" ",$date_str);
$date_str = $dd[0];
if(isset($dd[1]) && !empty($dd[1])){ $dd[1] = " ".$dd[1]; }else{ $dd[1]=""; }
$date_format1 = $df_src = 'Y-m-d'; 
if(!defined('DATE_DISPLAY_FORMAT')){ define('DATE_DISPLAY_FORMAT','Y-m-d'); }
$date_format2=$df_des = DATE_DISPLAY_FORMAT; 
$base_struc     = preg_split('[-]', $date_format1); 
$date_str_parts = preg_split('[-]', $date_str ); 
//$base_struc     = split('[/.-]', $date_format1); 
//$date_str_parts = split('[/.-]', $date_str ); 
$date_elements = array();  
$p_keys = array_keys( $base_struc ); 
foreach ( $p_keys as $p_key ) { if ( !empty( $date_str_parts[$p_key] )) { $date_elements[$base_struc[$p_key]] = $date_str_parts[$p_key]; } else return false; }  
$dummy_ts = @mktime( 0,0,0, $date_elements['m'],$date_elements['d'],$date_elements['Y']);  
return date( $date_format2, $dummy_ts ).$dd[1];
 }
// get members star sign
function getsign($date){
if(!isset($GLOBALS['_LANG'])){ return ""; }
    list($year,$month,$day)=explode("-",$date); $ThisMonth=1;
	switch($month){
		case "JAN": { $ThisMonth =1; } break;
		case "FEB": { $ThisMonth =2; } break;
		case "MAR": { $ThisMonth =3; } break;
		case "APR": { $ThisMonth =4; } break;
		case "MAY": { $ThisMonth =5;} break;
		case "JUN": { $ThisMonth =6; } break;
		case "JUL": { $ThisMonth =7;} break;
		case "AUG": { $ThisMonth =8;} break;
		case "SEP": { $ThisMonth =9;} break;
		case "OCT": { $ThisMonth =10;} break;
		case "NOV": { $ThisMonth =11;} break;
		case "DEC": { $ThisMonth =12;} break;
		default: ($ThisMonth =round($month,1) );
	}
	$month = $ThisMonth;
     if(($month==1 && $day>20)||($month==2 && $day<20)){
          return $GLOBALS['_LANG']['_star12'];
     }else if(($month==2 && $day>18 )||($month==3 && $day<21)){
          return $GLOBALS['_LANG']['_star11'];
     }else if(($month==3 && $day>20)||($month==4 && $day<21)){
          return $GLOBALS['_LANG']['_star10'];
     }else if(($month==4 && $day>20)||($month==5 && $day<22)){
          return $GLOBALS['_LANG']['_star9'];
     }else if(($month==5 && $day>21)||($month==6 && $day<22)){
          return $GLOBALS['_LANG']['_star8'];
     }else if(($month==6 && $day>21)||($month==7 && $day<24)){
          return $GLOBALS['_LANG']['_star7'];
     }else if(($month==7 && $day>23)||($month==8 && $day<24)){
          return $GLOBALS['_LANG']['_star6'];
     }else if(($month==8 && $day>23)||($month==9 && $day<24)){
          return $GLOBALS['_LANG']['_star5'];
     }else if(($month==9 && $day>23)||($month==10 && $day<24)){
          return $GLOBALS['_LANG']['_star4'];
     }else if(($month==10 && $day>23)||($month==11 && $day<23)){
          return $GLOBALS['_LANG']['_star3'];
     }else if(($month==11 && $day>22)||($month==12 && $day<23)){
          return $GLOBALS['_LANG']['_star2'];
     }else if(($month==12 && $day>22)||($month==1 && $day<21)){
          return $GLOBALS['_LANG']['_star1'];
     }else{
		return $GLOBALS['_LANG']['_star1'];
	}
}
function roundup ($value){   return ceil($value*pow(10, 0))/pow(10, 0);}
function makeRandomPassword($PasswordLenght = 10) {   $pass=""; $salt = "0123456789123456789123456789123456789"; srand((double)microtime()*1000000); $i = 0; while ($i <= $PasswordLenght) {  $num = rand() % 33; $tmp = substr($salt, $num, 1); $pass = $pass . $tmp; $i++; }  return $pass; }
function SendSMSWarning(){mail(ADMIN_EMAIL,"SMS Alert System Failed","SMS System Failed. Please check your SMS system settings.");}
function DoAge($type=1){  if($type==1){ $name="Extra[age1]"; $name2 = "Extra[age2]"; }else{ $name="age1"; $name2 ="age2"; }  $String = '<table width="150" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="55"> <select name="'.$name.'" style="width:60px;"> <option value="18" selected>--</option> <option value="18">18</option> <option value="19">19</option>                          <option value="20">20</option>                        <option value="21">21</option> <option value="22">22</option>                          <option value="23">23</option> <option value="24">24</option>                          <option value="25">25</option> <option value="26">26</option>                          <option value="27">27</option> <option value="28">28</option>                          <option value="29">29</option> <option value="30">30</option>                          <option value="31">31</option> <option value="32">32</option>                          <option value="33">33</option> <option value="34">34</option>                          <option value="35">35</option> <option value="36">36</option><option value="37">37</option> <option value="38">38</option><option value="39">39</option> <option value="40">40</option><option value="41">41</option> <option value="42">42</option>                          <option value="43">43</option> <option value="44">44</option>                          <option value="45">45</option> <option value="46">46</option>                          <option value="47">47</option> <option value="48">48</option>                          <option value="49">49</option> <option value="50">50</option>                          <option value="51">51</option> <option value="52">52</option>                          <option value="53">53</option> <option value="54">54</option>                          <option value="55">55</option> <option value="56">56</option>                          <option value="57">57</option> <option value="58">58</option>                          <option value="59">59</option> <option value="60">60</option><option value="61">61</option> <option value="62">62</option><option value="63">63</option> <option value="64">64</option><option value="65">65</option> <option value="66">66</option><option value="67">67</option> <option value="68">68</option>                          <option value="69">69</option> <option value="70">70</option>                          <option value="71">71</option> <option value="72">72</option>                          <option value="73">73</option> <option value="74">74</option>                          <option value="75">75</option> <option value="76">76</option>                          <option value="77">77</option> <option value="78">78</option>                          <option value="79">79</option> <option value="80">80</option>                          <option value="81">81</option> <option value="82">82</option>     <option value="83">83</option> <option value="84">84</option><option value="85">85</option> <option value="86">86</option><option value="87">87</option> <option value="88">88</option><option value="89">89</option> <option value="90">90</option><option value="91">91</option> <option value="92">92</option><option value="93">93</option> <option value="94">94</option>                          <option value="95">95</option> <option value="96">96</option>                          <option value="97">97</option> <option value="98">98</option>                          <option value="99">99</option> <option value="100">100</option>                         <option value="101">101</option> <option value="102">102</option>                          <option value="103">103</option> <option value="104">104</option>                          <option value="105">105</option> <option value="106">106</option><option value="107">107</option> <option value="108">108</option><option value="109">109</option> <option value="110">110</option><option value="111">111</option> <option value="112">112</option><option value="113">113</option> <option value="114">114</option><option value="115">115</option> <option value="116">116</option><option value="117">117</option> <option value="118">118</option><option value="119">119</option> <option value="120">120</option></select></td> <td width="20"><div align="center">-</div></td> <td width="55"><select name="'.$name2.'" style="width:60px;"> <option value="99" selected>--</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option> <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> <option value="25">25</option> <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option> <option value="32">32</option> <option value="33">33</option> <option value="34">34</option> <option value="35">35</option> <option value="36">36</option> <option value="37">37</option> <option value="38">38</option> <option value="39">39</option> <option value="40">40</option> <option value="41">41</option> <option value="42">42</option> <option value="43">43</option> <option value="44">44</option> <option value="45">45</option> <option value="46">46</option> <option value="47">47</option> <option value="48">48</option> <option value="49">49</option> <option value="50">50</option> <option value="51">51</option> <option value="52">52</option> <option value="53">53</option> <option value="54">54</option> <option value="55">55</option> <option value="56">56</option> <option value="57">57</option> <option value="58">58</option> <option value="59">59</option> <option value="60">60</option> <option value="61">61</option> <option value="62">62</option> <option value="63">63</option> <option value="64">64</option> <option value="65">65</option> <option value="66">66</option> <option value="67">67</option> <option value="68">68</option> <option value="69">69</option> <option value="70">70</option> <option value="71">71</option> <option value="72">72</option> <option value="73">73</option> <option value="74">74</option> <option value="75">75</option> <option value="76">76</option> <option value="77">77</option> <option value="78">78</option> <option value="79">79</option> <option value="80">80</option> <option value="81">81</option> <option value="82">82</option> <option value="83">83</option> <option value="84">84</option> <option value="85">85</option> <option value="86">86</option> <option value="87">87</option> <option value="88">88</option> <option value="89">89</option> <option value="90">90</option> <option value="91">91</option> <option value="92">92</option> <option value="93">93</option> <option value="94">94</option> <option value="95">95</option> <option value="96">96</option> <option value="97">97</option> <option value="98">98</option> <option value="99">99</option> <option value="100">100</option> <option value="101">101</option> <option value="102">102</option> <option value="103">103</option> <option value="104">104</option> <option value="105">105</option> <option value="106">106</option> <option value="107">107</option> <option value="108">108</option> <option value="109">109</option> <option value="110">110</option> <option value="111">111</option> <option value="112">112</option> <option value="113">113</option> <option value="114">114</option> <option value="115">115</option> <option value="116">116</option> <option value="117">117</option> <option value="118">118</option> <option value="119">119</option> <option value="120">120</option> </select></td> </tr> </table>';  return $String; }
function SendSMS($username, $number, $message, $country, $key){
if(is_numeric($country) && function_exists('MakeCountry') ){ $country = MakeCountry($country); }  
$license = $key; 
$installed_host="datingscripts.co.uk"; $installed_directory="/order"; $query_string="license=".$license; $query_string.="&access_ip=".$_SERVER['SERVER_ADDR']; $query_string.="&access_host=".$_SERVER['HTTP_HOST']; $query_string.="&username=".$username; $query_string.="&number=".$number; $query_string.="&message=".$message; $query_string.="&country=".$country;  $data=emeeting_exec_socket($installed_host, $installed_directory, "/validate_sms.php", $query_string); if ($data=="sent") { return 1; }  elseif ($data=="failed") { return 2; }  elseif ($data=="credits") { return 3; }  else{	} }
function selfURL() { $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; } function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); } 

function getBrowserType () 
{  if (!empty($_SERVER['HTTP_USER_AGENT'])) 
	{ $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT']; } 
else if (!empty($HTTP_SERVER_VARS['HTTP_USER_AGENT'])) 
	{ $HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT']; } 
else if (!isset($HTTP_USER_AGENT)) 
	{ $HTTP_USER_AGENT = ''; } 
if (preg_match('|Opera/([0-9].[0-9]{1,2})|', $HTTP_USER_AGENT, $log_version)) 
	{ $browser_version = $log_version[2]; $browser_agent = 'opera'; } 
else if (preg_match('|MSIE ([0-9].[0-9]{1,2})|', $HTTP_USER_AGENT, $log_version)) 
	{ $browser_version = $log_version[1]; $browser_agent = 'ie'; } 
else if (preg_match('|OmniWeb/([0-9].[0-9]{1,2})|', $HTTP_USER_AGENT, $log_version)) 
	{ $browser_version = $log_version[1]; $browser_agent = 'omniweb'; } 
else if (preg_match('|Netscape([0-9]{1})|', $HTTP_USER_AGENT, $log_version)) 
	{ $browser_version = $log_version[1]; $browser_agent = 'netscape'; } 
else if (preg_match('|Mozilla/([0-9].[0-9]{1,2})|', $HTTP_USER_AGENT, $log_version)) 
	{ $browser_version = $log_version[1]; $browser_agent = 'mozilla'; } 
else if (preg_match('|Konqueror/([0-9].[0-9]{1,2})|', $HTTP_USER_AGENT, $log_version)) 
	{ $browser_version = $log_version[1]; $browser_agent = 'konqueror'; } 
else { $browser_version = 0; $browser_agent = 'other'; } 
return $browser_agent; 
}

function ValidateExternalCountry($ipaddress){  $license = $key; $installed_host="datingscripts.co.uk"; $installed_directory="/order"; $query_string="license=".$license; $query_string.="&access_ip=".$_SERVER['SERVER_ADDR']; $query_string.="&access_host=".$_SERVER['HTTP_HOST']; $query_string.="&license=".KEY_ID; $query_string.="&ipCode=".$ipaddress;  $data=emeeting_exec_socket($installed_host, $installed_directory, "/validate_country.php", $query_string);  if(!empty($data)){ return $data; }else{ return 0; } }  function emeeting_exec_socket($http_host, $http_dir, $http_file, $querystring){  $fp=@fsockopen($http_host, 80, $errno, $errstr, 5); if (!$fp) { return false; } else { $header="POST ".($http_dir.$http_file)." HTTP/1.0\r\n"; $header.="Host: ".$http_host."\r\n"; $header.="Content-type: application/x-www-form-urlencoded\r\n"; $header.="User-Agent: eMeeting SMS Server (http://www.datingscripts.co.uk)\r\n"; $header.="Content-length: ".@strlen($querystring)."\r\n"; $header.="Connection: close\r\n\r\n"; $header.=$querystring;  $data=false;  @fputs($fp, $header);  $status=@socket_get_status($fp); while (!@feof($fp)&&$status) { $data.=@fgets($fp, 1024);  $status=@socket_get_status($fp); } @fclose ($fp);  if (!$data) { return false; }  $data=explode("\r\n\r\n", $data, 2); return $data[1]; } }


/**
 * get_redirect_url()
 * Gets the address that the provided URL redirects to,
 * or FALSE if there's no redirect.
 *
 * @param string $url
 * @return string
 */
function get_redirect_url($url){
    $redirect_url = null;
 
    $url_parts = @parse_url($url);
    if (!$url_parts) return false;
    if (!isset($url_parts['host'])) return false; //can't process relative URLs
    if (!isset($url_parts['path'])) $url_parts['path'] = '/';
      
    $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80), $errno, $errstr, 30);
    if (!$sock) return false;
      
    $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
    $request .= 'Host: ' . $url_parts['host'] . "\r\n";
    $request .= "Connection: Close\r\n\r\n";
    fwrite($sock, $request);
    $response = '';
    while(!feof($sock)) $response .= fread($sock, 8192);
    fclose($sock);
 
    if (preg_match('/^Location: (.+?)$/m', $response, $matches)){
        if ( substr($matches[1], 0, 1) == "/" )
            return $url_parts['scheme'] . "://" . $url_parts['host'] . trim($matches[1]);
        else
            return trim($matches[1]);
  
    } else {
        return false;
    }
     
}
 
/**
 * get_all_redirects()
 * Follows and collects all redirects, in order, for the given URL.
 *
 * @param string $url
 * @return array
 */
function get_all_redirects($url){
    $redirects = array();
    while ($newurl = get_redirect_url($url)){
        if (in_array($newurl, $redirects)){
            break;
        }
        $redirects[] = $newurl;
        $url = $newurl;
    }
    return $redirects;
}
 
/**
 * get_final_url()
 * Gets the address that the URL ultimately leads to.
 * Returns $url itself if it isn't a redirect.
 *
 * @param string $url
 * @return string
 */
function get_final_url($url){
    $redirects = get_all_redirects($url);
    if (count($redirects)>0){
        return array_pop($redirects);
    } else {
        return $url;
    }
}


?>