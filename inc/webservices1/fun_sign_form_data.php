<?php

function DisplaySignupFieldsNew($id=0){
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
    $form_data = array();
    $i=1;
    $kids = 1;
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

//        $form_data[$i]['field'] = str_replace("1","",$Caption['caption']);

//        $form_data[str_replace("1","",$Caption['caption'])];

        $fieldValue = str_replace("1","",$Caption['caption']);
        if($fieldValue == "Kid(s)"){
            $fieldValue = "kids".$kids;
            $kids++;
        }

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
                //echo $ListValue['fvCaption']."<br>";
                if($ListValue['fvCaption'] != '') {
                    $cap = str_replace("\r\n","",$ListValue['fvCaption']);
                    $form_data[$fieldValue][] = array("name"=>$cap, "code"=>$ListValue['fvid']);
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
//                    echo $ListValue['fvCaption']."<br>";
                    if($ListValue['fvCaption'] != '') {
                        $cap = str_replace("\r\n","",$ListValue['fvCaption']);
                        $form_data[$fieldValue][] = array("name"=>$cap, "code"=>$ListValue['fvid']);
                    }
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
        $i++;
        //echo $ListValue['fvCaption']."<br>";
    }
    if($id ==0){
        $ReturnValue .= "<input name='LinkedRows' type='hidden' value='".$NumLinkedFields."' class='hidden'>";
    }
    //if($id !=0){ $ReturnValue = str_replace("< li>","<li>",$ReturnValue);   }
//    print_r($form_data);
    return $form_data;
}
?>