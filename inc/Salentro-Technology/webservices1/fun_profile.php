<?php

/*
	DISPLAY MEMBER ACCOUNT ROAMING DETAILS
*/
function getMemberProfileData($id,$extra=true,$page="",$VistorID) {
    include_once("../func/globals.php");
    global $DB;

    $DataArray = array();
    
    
     
     
    $result = $DB->Row("SELECT profileview_friends, profileview_nonfriend, members_privacy.skype, members_privacy.IM, members_billing.date_expire, members.active AS ThisApproved, members_privacy.SMS_credits AS sms_remaining, members.*, files.type, files.adult_content, files.approved, files.bigimage, package.name, package.maxFiles, package.SMS_credits, package.maxMessage, package.icon FROM members INNER JOIN members_privacy ON ( members_privacy.uid = members.id AND members.id=$id ) LEFT JOIN files ON ( files.uid = members.id AND files.default=1 AND files.type='photo') LEFT JOIN package ON (members.packageid = package.pid) LEFT JOIN members_billing ON (members_billing.uid = members.id) LIMIT 1");

    // MEMBER IMAGE DATA
    $DataArray['image'] = ReturnDeImage($result,"medium");
    $DataArray['image_small'] = $DataArray['image']."x=48&y=48";//ReturnDeImage($result,"small");

    // MEMBER PACKAGE DATA

    if($extra) {
        $usedMsgSpace = $DB->Row("SELECT count(uid) AS space FROM messages WHERE uid= ( '".$id."' ) AND maildate='".date("Y-m-d")."'");
        $DataArray['msg_total'] = $result['maxMessage'];
        $DataArray['msg_used'] = $usedMsgSpace['space'];

        $usedImageSpace = $DB->Row("SELECT count(uid) AS space FROM files WHERE uid= ( '".$id."' )");
        $DataArray['img_total'] = $result['maxFiles'];
        $DataArray['img_used'] = $usedImageSpace['space'];



    }

    // headline for profile
    if($page =="profile") {

        // FOLLOW FUNCTION ENABLED
        if(D_FOLLOW ==1) {

            $follow = $DB->Row("SELECT follow_display, allow_approve FROM members_follow WHERE uid = ( '".$id."' ) LIMIT 1");
            $DataArray['follow_display'] = $follow['follow_display'];
            $DataArray['follow_approve'] = $follow['allow_approve'];

        }

        // PROFILE VIEW GROUP DATA
        $DataArray['profile_viewfriends'] = $result['profileview_friends'];	// privacy settings for viewing profile blocks
        $DataArray['profile_viewnonefiends'] = $result['profileview_nonfriend'];

        $profile = $DB->Row("SELECT members_online.logid AS onlinenow, members_data.headline, members_data.description, members_data.age, members_data.gender, members_data.country, members_data.location, members_data.postcode FROM members_data
				LEFT JOIN members_online ON ( members_data.uid = members_online.logid )
				WHERE uid= ( '".$id."' ) LIMIT 1");

        $DataArray['headline'] 			= eMeetingOutput($profile['headline']);

        if($DataArray['headline'] =='0') {
            $DataArray['headline']="";
        }
        include_once("fun_common_api.php");
        $DataArray['MyGender'] 			= MakeGender($profile['gender']);
        $DataArray['gender'] 			= $profile['gender'];
        $DataArray['country'] 			= MakeCountry($profile['country']);
        $DataArray['location'] 			= eMeetingOutput($profile['location']);
        $DataArray['description'] 		= eMeetingOutput($profile['description']);
        $DataArray['age'] 			= MakeAge($profile['age']);
        $DataArray['starsign'] 			= getsign($profile['age']);
        $DataArray['birthday'] 			= $profile['age'];
        //$DataArray['zipcode'] 		= eMeetingOutput($profile['zipcode']);
        $DataArray['postcode'] 			= eMeetingOutput($profile['postcode']);

        if(isset($profile['onlinenow']) && $profile['onlinenow'] !="") {
            $DataArray['onlinenow'] 			= true;
        }else {
            $DataArray['onlinenow'] 			= false;
        }



        $getstat = $DB->Row("Select fvCaption from field_list_value f, members_data d where d.location = f.fvid and f.fvFid = 26 and uid = ( '".$id."' ) ");

        $DataArray['mycity'] = $getstat['fvCaption'];

        if ($getstat =="") {
            $DataArray['mycity'] = eMeetingOutput($profile['location']);
        }


        $getline = $DB->Row("Select fvCaption from field_list_value f, members_data d where  d.em_85820081128  = f.fvid and f.fvFid = 54 and uid = ( '".$id."' ) ");

        $DataArray['mystate'] = $getline['fvCaption'];


    }

    $DataArray['skype'] 			= eMeetingOutput($result['skype']);
    $DataArray['status'] 			= eMeetingOutput($result['msgStatus']);
    $DataArray['SMS_credits'] 		= $result['sms_remaining'];
    $DataArray['name'] 				= $result['name'];
    $DataArray['showIM'] 			= $result['IM'];
    $DataArray['username'] 			= substr($result['username'],0,15);
    $DataArray['ThisApproved'] 		= $result['ThisApproved'];
    $DataArray['highlight'] 		= $result['highlight'];
    $DataArray['active'] 			= $result['active']; //active, 'suspended', 'unapproved', 'cancel'
    $DataArray['video_duration']	= $result['video_duration'];
    $DataArray['created'] 			= $result['created'];
    $DataArray['hits'] 				= number_format($result['hits']);
    $DataArray['icon'] 				= $result['icon'];
    $DataArray['uid'] 				= $result['id'];
    $DataArray['visible'] 			= $result['visible'];
    $DataArray['lastlogin'] 		= $result['lastlogin'];
    $DataArray['updated'] 			= $result['updated'];
    $DataArray['expire'] 			= dates_interconv($result['date_expire']);
    $DataArray['profile_complete'] 	= $result['profile_complete'];
    if($DataArray['profile_complete'] =='99') {
        $DataArray['profile_complete']="100";
    }
    $DataArray['updated'] 			= $result['updated'];


    return $DataArray;
}

function whoViewMyProfile($id) {



    global $DB;



    ## define variables

    $count=0;
    $todayDate = date("D");
    $ReturnString = "";




    $users = array();
    for($i=0;$i!=30;$i++) {


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
			INNER JOIN visited ON (visited.uid = members.id AND visited.uid != ".$id.")
			LEFT JOIN files ON (files.uid = members.id AND files.default=1)
			LEFT JOIN album ON (album.aid = files.aid)
			WHERE visited.view_uid='".$id."' AND visited.date LIKE '%".$SearchDate."%' GROUP BY visited.uid ORDER BY visited.date DESC LIMIT 200");


        ## display output

        $ReturnString .= '';
        


        $RunCount=0;
        $numberOfUser = array();
        while( $history = $DB->NextRow($result) ) {
            $RunCount++;
            if($history['cat'] != "public" && $history['id'] != $id) {
                $pimage		= 	DB_DOMAIN."inc/tb.php?src=nophoto.jpg&x=48&y=48&x=48&y=48";
            }
            else {
                $pimage = ReturnDeImage($history,"big");
            }

            $numberOfUser[] = array(
                    "pimage" =>$pimage,
                    "history_id" => $history['uid'],
                    "history_date" => $history['date'],
                    "history_username" => $history['username']
            );

        }
        if(count($numberOfUser)>0) {
            $users[] = array(
                    "date" => $DisplayDate,
                    "count" => $RunCount,
                    "members" => $numberOfUser
            );
        }

    }

    ## return output for display


    return $users;



}


function getMayEditProfileData($id) {
    global $DB;



    ## define variables

    $NumFields = 1;
    $divCount =1;
    $divString="";
    $ReturnString="";
    $HideBox=1;



    ## assign value for gender ID if not assigned
    $genderid=0;


    ## TOTAL GROUPS

    $Total = $DB->Row("SELECT count(id) AS total FROM field_groups WHERE ( private = 0 || private = 2 || private = ".strip_tags($genderid).") ");



    ## search for all fields for this member

    $result = $DB->Query("SELECT id, caption,forder FROM field_groups WHERE ( private = 0 || private = 2 || private = ".strip_tags($genderid).") ORDER BY forder ASC");


    $EditProfile=array();
    while( $groups = $DB->NextRow($result) ) {

        ## select group fields

        $SQL = "SELECT field.fid,field.fType, field.fName,field.linked_id,field.fOrder FROM field

		INNER JOIN field_groups ON ( ( field_groups.id = field.groupid  || field_groups.id = field.groupid_1 || field_groups.id = field.groupid_2 )  )

		WHERE ( field.groupid = '".$groups['id']."' OR field.groupid_1 = '".$groups['id']."' OR field.groupid_2 = '".$groups['id']."')

		GROUP BY field.fid ORDER BY field_groups.forder ASC, field.fOrder ASC";



        $result1 = $DB->Query($SQL);



        while( $field = $DB->NextRow($result1) ) {

            ## determin field caption based on language
            if(D_LANG !="english") {

                ## check see if there is a caption
                $Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' AND lang= ( '".D_LANG."' ) limit 1");

                if(empty($Caption)) {

                    ## no caption found, load english caption
                    $Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' limit 1");
                }

            }else {
                ## check for english value
                $Caption = $DB->Row("SELECT caption, `description` FROM field_caption WHERE Cid=".$field['fid']." AND `match` != 'yes' AND lang='".D_LANG."' limit 1");
            }

            ## select data value
            $Value = $DB->Row("SELECT ".$field['fName']." FROM members_data WHERE  uid= ('".$id."') limit 1");

            ## clean the value for output
            if($field['fType'] == 2) {
                $Value[$field['fName']] = eMeetingOutput($Value[$field['fName']],true);

            }else {
                $Value[$field['fName']] = eMeetingOutput($Value[$field['fName']]);
            }

            ## choose our field type, 1 = input box
            if($field['fType'] == 1) {

                if($field['fName'] =="age") {

                    if($Value[$field['fName']] == "") {
                        $Value[$field['fName']]="0000-00-00";
                    }

                    $EditProfile[$groups['forder']][$groups['caption']][$field['fOrder']][$Caption['caption']]=
                            array("FieldValue".$field['fid']=>MakeAge($Value[$field['fName']])." ".$GLOBALS['_LANG']['_yold'],
                            "Type"=>"Label",
                            "FieldType".$field['fid']=>$field['fType'],
                            "FieldName".$field['fid']=>$field['fName']);

                }else {

                    $EditProfile[$groups['forder']][$groups['caption']][$field['fOrder']][$Caption['caption']]=
                            array("FieldValue".$field['fid']=>$Value[$field['fName']],
                            "Type"=>"Text",
                            "FieldType".$field['fid']=>$field['fType'],
                            "FieldName".$field['fid']=>$field['fName']);
                }

                ## checkbox input
            }elseif($field['fType'] == 4) {

                if($Value[$field['fName']] ==1) {
                    $ex = "1";
                }else {
                    $ex="0";
                }

                $EditProfile[$groups['forder']][$groups['caption']][$field['fOrder']][$Caption['caption']] = 

                        array("FieldValue".$field['fid']=>$ex,
                        "Type"=>"CheckBox",
                        "FieldType".$field['fid']=>$field['fType'],
                        "FieldName".$field['fid']=>$field['fName']);

                ## textarea input
            }elseif($field['fType'] == 2) {

                if(isset($Caption['description']) && $Caption['description'] != "") {
                    $tip =$Caption['description'];
                }

                $EditProfile[$groups['forder']][$groups['caption']][$field['fOrder']][$Caption['caption']]=
                        array("FieldValue".$field['fid']=>$Value[$field['fName']],
                        "Type"=>"TextArea",
                        "FieldType".$field['fid']=>$field['fType'],
                        "FieldName".$field['fid']=>$field['fName'],"tip"=>$tip);


                ## selection list box

            }elseif($field['fType'] == 3) {

                // check if there is a field linked to this one
                $Linked = $DB->Row("SELECT fid FROM field WHERE linked_id=".$field['fid']." limit 1");

                if(!empty($Linked)) {

                    $storeLastLinked = $Linked['fid'];
                    $LinkedCode ="onClick='eMeetingLinkedField(this.value, ".$Linked['fid'].",0);'";

                }else {
                    $LinkedCode ="";
                }

                ## find caption

                if(D_LANG !="english") {

                    ## check see if there is a caption
                    $test = $DB->Row("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

                    if(empty($test)) {
                        ## no caption found, load english caption
                        $result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='english' Order by fvOrder");
                    }else {

                        $result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

                    }

                }else {

                    $result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");

                }

                ## build output
                if(isset($storeLastLinked) && $storeLastLinked == $field['fid']) {

                }else {

                    if($field['fid'] =="25") {
                        $StoreCountry = $Value[$field['fName']];
                    } // country box fix

                    $listarray=array();
                    $listarray[0]="-----------------";

                    while( $ListValue = $DB->NextRow($result2) ) {
                        $listarray[$ListValue['fvid']]=$ListValue['fvCaption'];
                    }

                    $xlistArray=array();
                    foreach ($listarray as $key33 => $value33) {
                        if($key33==0) $key33="x";
                        $xlistArray[][$key33]=$value33;
                    }

                    $EditProfile[$groups['forder']][$groups['caption']][$field['fOrder']][$Caption['caption']]=
                            array("FieldValue".$field['fid']=>$Value[$field['fName']],
                            "Type"=>"DropDown",
                            "FieldType".$field['fid']=>$field['fType'],
                            "FieldName".$field['fid']=>$field['fName'],"Values"=>$xlistArray);
                }

                ## multiple checkbox
            }elseif($field['fType'] == 5) {


                $c=0;
                $tdC =2;

                $CheckParts = explode("**", $Value[$field['fName']]);

                $result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");
                if( mysql_num_rows($result2)==0 ) {
                    ## no values found, load english values
                    $result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."'  Order by fvOrder");
                }

                $checkarray=array();
                while( $ListValue = $DB->NextRow($result2) ) {

                    $ck=0;
                    
                    if($CheckParts[$c] ==1) {
                        $ck=1;
                    }
                    $checkarray[]=array("Multi".$c.$field['fid']=>$ck,"chkText"=>$ListValue['fvCaption'],"FieldValue".$field['fid']=>$field['fName'],
                            "Type"=>"CheckBox","FieldType".$field['fid']=>$field['fType'],"FieldName".$field['fid']=>$field['fName'],"FieldMulti".$c.$field['fid']=>$c);

                    $c++;

                }

                $EditProfile[$groups['forder']][$groups['caption']][$field['fOrder']][$Caption['caption']]=
                        array(
                        "Type"=>"CheckBoxs",
                        "Values"=>$checkarray);

                ## input field

            }elseif($field['fType'] == 6) {

                ## age field

            }elseif($field['fType'] == 7) {

                if($Value[$field['fName']] == "") {
                    $Value[$field['fName']]="0000-00-00";
                }

                $ReturnAge=GetAgeListField($Value[$field['fName']],$field['fid']);


                $EditProfile[$groups['forder']][$groups['caption']][$field['fOrder']][$Caption['caption']]=
                        array("displayText"=>MakeAge($Value[$field['fName']])." ".$GLOBALS['_LANG']['_yold'],
                        "Type"=>"Age",
                        "FieldType".$field['fid']=>$field['fType'],
                        "FieldName".$field['fid']=>$field['fName'],"DropDowns"=>$ReturnAge);

                ## include hidden fields
            }

            // ADD CUSTOM HIDDEN FIELDS FOR DATABASE NAME VALUES

            if($field['fType'] != 5) {                

            }
        }

        $LastFID = $field['fid'];

        $ThisBox=$HideBox;

        $NextBox=$HideBox+1;

        $PrevBox=$HideBox-1;

        $divCount++;
        $HideBox++;

    }


    $EditProfile['TotalNumberOfRows']=1000;
    if(isset($_GET['t']) && $_GET['t']==1) {
        echo "</BR>+++++<pre>";
        print_r($EditProfile);

        echo "<pre>+++++</br>";
    }

    return $EditProfile;
}

function GetAgeListField($value="", $id, $tabcounter=6) {
    $checkarray=array();

    if ($value == "") {

        $ValYY = "";
        $ValMM = "";
        $ValDD = "";
    }
    else {
        $cv = explode("-",$value);
        $ValYY = $cv[0];
        $ValMM = $cv[1];
        $ValDD = $cv[2];
    }


    //$ReturnValue .='<select name="FieldValue'.$id.'a" tabindex="'.$tabcounter.'" style="'.$ValStyleYY.'"><option value="0">'.$GLOBALS['_LANG']['_year'].'</option>';

    $listarray=array();
    $listarray[0]=$GLOBALS['_LANG']['_year'];

    ## MAKE AGE ARRAY
    $YY=date('Y')-18;
    for($i=0; $i<80; $i++) {
        $listarray[$YY]=$YY;
        $YY--;
    }
    $xlistArray=array();
    foreach ($listarray as $key33 => $value33) {
        if($key33==0) $key33="x";
        $xlistArray[][$key33]=$value33;
    }
    $checkarray["Year"]=array("FieldValue".$id."a"=>$ValYY,
            "Type"=>"DropDown","Values"=>$xlistArray);

## MONTH
//	$ms1="";$ms2="";$ms3="";$ms4="";$ms5="";$ms6="";$ms17="";$ms8="";$ms9="";$ms10="";$ms11="";$ms12="";
//	switch($ValMM){
//	case "JAN": { $ms1="selected";} break;
//	case "FEB": { $ms2="selected";} break;
//	case "MAR": { $ms3="selected";} break;
//	case "APR": { $ms4="selected";} break;
//	case "MAY": { $ms5="selected";} break;
//	case "JUN": { $ms6="selected";} break;
//	case "JUL": { $ms7="selected";} break;
//	case "AUG": { $ms8="selected";} break;
//	case "SEP": { $ms9="selected";} break;
//
//	case "OCT": { $ms10="selected";} break;
//	case "NOV": { $ms11="selected";} break;
//	case "DEC": { $ms12="selected";} break;
//	}
//	$ReturnValue .='<select name="FieldValue'.$id.'b" tabindex="'.$tabcounter.'" style="'.$ValStyleMM.'">
//	<option value="0" '.$ms1.'>'.$GLOBALS['_LANG']['_month'].'</option>
//	<option value="JAN" '.$ms1.'>'.MakeCalendarMonth(01,true).'</option>
//	<option value="FEB" '.$ms2.'>'.MakeCalendarMonth(02,true).'</option>
//	<option value="MAR" '.$ms3.'>'.MakeCalendarMonth(03,true).'</option>
//	<option value="APR" '.$ms4.'>'.MakeCalendarMonth(04,true).'</option>
//	<option value="MAY" '.$ms5.'>'.MakeCalendarMonth(05,true).'</option>
//	<option value="JUN" '.$ms6.'>'.MakeCalendarMonth(06,true).'</option>
//	<option value="JUL" '.$ms7.'>'.MakeCalendarMonth(07,true).'</option>
//	<option value="AUG" '.$ms8.'>'.$GLOBALS['_LANG']['_august'].'</option>
//	<option value="SEP" '.$ms9.'>'.$GLOBALS['_LANG']['_september'].'</option>
//	<option value="OCT" '.$ms10.'>'.MakeCalendarMonth(10,true).'</option>
//	<option value="NOV" '.$ms11.'>'.MakeCalendarMonth(11,true).'</option>
//	<option value="DEC" '.$ms12.'>'.MakeCalendarMonth(12,true).'</option>
//	</select>';

    $listarray=array();
    $listarray["x"]=$GLOBALS['_LANG']['_month'];
    $listarray["JAN"]=MakeCalendarMonth(01,true);
    $listarray["FEB"]=MakeCalendarMonth(02,true);
    $listarray["MAR"]=MakeCalendarMonth(03,true);
    $listarray["APR"]=MakeCalendarMonth(04,true);
    $listarray["MAY"]=MakeCalendarMonth(05,true);
    $listarray["JUN"]=MakeCalendarMonth(06,true);
    $listarray["JUL"]=MakeCalendarMonth(07,true);
    $listarray["AUG"]=$GLOBALS['_LANG']['_august'];
    $listarray["SEP"]=$GLOBALS['_LANG']['_september'];
    $listarray["OCT"]=MakeCalendarMonth(10,true);
    $listarray["NOV"]=MakeCalendarMonth(11,true);
    $listarray["DEC"]=MakeCalendarMonth(12,true);

    $xlistArray=array();

    foreach ($listarray as $key33 => $value33) {
            $xlistArray[][$key33] = $value33;

    }
    $checkarray["Month"]=array("FieldValue".$id."b"=>$ValMM,
            "Type"=>"DropDown","Values"=>$xlistArray);
    ## DAY
    //$ReturnValue .='<select name="FieldValue'.$id.'c" tabindex="'.$tabcounter.'" style="'.$ValStyleDD.'"><option value="0">'.$GLOBALS['_LANG']['_day'].'</option>';
    $DD=31;
    $listarray=array();
    $listarray[0]=$GLOBALS['_LANG']['_day'];
    for($i=0; $i<31; $i++) {
        //if($DD ==$ValDD){ $sel ="selected"; }else{ $sel =""; }
        //$ReturnValue .='<option value="'.$DD.'" '.$sel.'>'.$DD.'</option>';
        $listarray[$DD]=$DD;
        $DD--;
    }
    $xlistArray=array();
    foreach ($listarray as $key33 => $value33) {
        if($key33==0) $key33="x";
        $xlistArray[][$key33]=$value33;
    }
    $checkarray["Day"]=array("FieldValue".$id."c"=>$ValDD,
            "Type"=>"DropDown","Values"=>$xlistArray);
    //$ReturnValue .='</select>';
    return $checkarray;
}

/**
 * Info: Build Image Display Function
 *
 * @version  9.0
 * @created  Fri Sep 25 , 2008
 * @updated  Fri Sep 25  , 2008
 */
function ReturnDeImageNew($array,$size,$user_id, $viewAdult) {
    ## photo used on member adverts, groups etc
    if(isset($array['photo']) && $array['photo'] !="") {
        $array['bigimage']=$array['photo'];
        $array['type'] ="photo";
    }
    ## if not file type is set
    if(!isset($array['type'])) {
        $array['type']="photo";
        $array['bigimage'] = DEFAULT_IMAGE;
    }
    ## build the image string
    switch($array['type']) {
        case "photo": {
                ## add gender display pic male/female etc
                if(isset($array['gender'])) {
                    $array['bigimage'] .="&g=".$array['gender'];
                }
                $UImage = $array['bigimage'];
            } break
            ;
        case "music": {
                $UImage = DEFAULT_MUSIC."&t=f";
            } break
            ;
        case "video": {
                $UImage = DEFAULT_VIDEO."&t=f";
            } break
            ;
        case "youtube": {
                $file_part = explode("?v=",$array['bigimage']);
                if(isset($file_part[1])) {
                    $file_part = explode("&",$file_part[1]);
                }
                if(!isset($file_part[0])) {
                    $UImage = DEFAULT_VIDEO."&t=f";
                }else {
                    return "http://img.youtube.com/vi/".$file_part[0]."/2.jpg?";
                }
            } break
            ;
        // not type found
        default: {
                $UImage = DEFAULT_IMAGE."&t=f";
                if(isset($array['gender'])) {
                    $UImage ="nophoto.jpg&g=".$array['gender'];
                }
            } break
            ;
    }
    ## approval system
    if(isset($array['approved']) && $array['approved'] =="no" ) {
        $UImage = WATINGAPPROVAL_IMAGE."&t=f";
    }
    ## adult images



    if(isset($array['adult_content']) && $array['adult_content'] =="yes" && $viewAdult !="yes" && ENABLE_ADULTCONTENT =="yes") { // && $_SESSION['uid'] != $array['uid']
        if(($array['id'] != $user_id) || ( $array['uid'] != $user_id ) ) {
            $UImage = DEFAULT_IMAGE_ADULT."&t=f";
            //return $UImage;
        }
    }
    ## build the query string
    $FilePath = DB_DOMAIN."inc/tb.php?src=";
    ## image sizes
    switch($size) {
        case "xsmall": {
                $UImage .="&x=40&y=40";
            } break
            ;
        case "small": {
                $UImage .="&x=48&y=48";
            } break
            ;
        case "medium": {
                $UImage .="&x=96&y=96";
            } break
            ;
        case "big": {
                $UImage .="&x=183&y=183";
            } break
            ;
        case "full": {
                $FilePath = WEB_PATH_IMAGE;
            } break
            ;
    }
    $UImage = $FilePath.$UImage;
    return $UImage;
}

function putMayEditProfileData($id,$values) {
    global $DB;

    $_SESSION['uid']=$id;
    ## Define Variables
    $values['TotalNumberOfRows']=1000;
    $BuiltArray="";
    $RunExtra="";
    $SQLStringExtra ="";

    ## retrieve censor words for filter
    $BadWords = CreateBadWordFilter();

    ## create a counter for the number of fields we have completed
    $CompleteFields =($values['TotalNumberOfRows']-1);

    $mycount = 0;
    $myentered = 0;

    ## loop through all the entered field data
    for($i = 1; $i < $values['TotalNumberOfRows']; $i++) {
        if(isset($values['FieldType'.$i]) ) {

            $mycount = $mycount +1;

            // RESTORE GENDER ID
            if($values['FieldName'.$i] == "gender" && $values['eid'] == $_SESSION['uid']) {

                $_SESSION['genderid'] = $values['FieldValue'.$i];

            }

            ## clean our data
            if(isset($values['FieldValue'.$i])) {
                $values['FieldValue'.$i] = eMeetingInput(filter_str($values['FieldValue'.$i],$BadWords));

                if (($values['FieldValue'.$i]) != "" && $values['FieldType'.$i] !=3 && $values['FieldType'.$i] !=7) {
                    $myentered = $myentered +1;
                }
                elseif (($values['FieldValue'.$i]) != 0 && $values['FieldType'.$i] =3) {
                    $myentered = $myentered +1;
                }
            }


            if($values['FieldType'.$i] == 7) {
                if(isset($values['FieldValue'.$i.'a'])) {
                    $myentered = $myentered +1;
                }
            }



            ## create blank value incase user hasnt create a value via the admin
            if(!isset($values['FieldValue'.$i])) {
                $values['FieldValue'.$i]="";
            }

            $myname = $values['FieldName'.$i];
            $mytype = $values['FieldType'.$i];
            $myvalue = $values['FieldValue'.$i];
            //print "i$i $mycount $myentered $CompleteFields $mytype $myname $myvalue <br>";



            ## dont create counter for the checkboxes within a multiple checkbox list
            if($values['FieldValue'.$i] =="" && $values['FieldType'.$i] !=4 && $values['FieldType'.$i] !=5) {
                $CompleteFields--;
            }

            ## 5 = multiple checkbox data
            if($values['FieldType'.$i] ==5) {

                $x=0;
                while(isset($values['FieldMulti'.$x.$i])) {

                    // MAKE SAVE
                    if($values['Multi'.$x.$i] == 1) {
                        $BuiltArray .="1**";
                    }else {
                        $BuiltArray .="0**";
                    }

                    $x++;

                }

                $RunExtra .= ", ".$values['FieldName'.$i] ."='".$BuiltArray."'";
                $BuiltArray="";
            }

            ## if its not a checkout then do this
            if($values['FieldType'.$i] !=5) {

                ## AGE CAANOT BE LESS THAN 18 AND OCER 110
                if($values['FieldName'.$i] == "age" && $values['FieldType'.$i] != 7) {

                    $MyAgeIs = MakeAge($values['FieldValue'.$i]);

                    if( $MyAgeIs < 16 || $MyAgeIs > 110) {

                        $RunExtra.= ", ".$values['FieldName'.$i] ."='1950-01-01'";

                    }else {

                        $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

                    }

                    ## if the data is a text box
                }elseif($values['FieldType'.$i] == 2) {

                    ## this data is stored from the html editor
                    $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

                    ## AGE FIELD
                }elseif($values['FieldType'.$i] == 7) {

                    $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i.'a']."-".$values['FieldValue'.$i.'b']."-".$values['FieldValue'.$i.'c']."'";



                    ## finally just filter text from select boxes and input fields
                }else {

                    $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

                }

            }

        }
    }


    ## now lets work out if they have completed all their profile
    //$percent = floor(($CompleteFields / ($values['TotalNumberOfRows']-1))* 100);
    $percent = floor(($myentered / $mycount)* 100);


    #set the profile for admin approval
    if(APPROVE_ACCOUNTS =="yes" && !isset($_SESSION['site_moderator_edit'])) {

        $SQLStringExtra =", active='unapproved' ";
    }

    ## update members tables
    //return $_SESSION['uid'];
    
    $FoundEditTemp = $DB->Row("SELECT id FROM members_edit_temp WHERE `id` = ('".$_SESSION['uid']."') LIMIT 1");
    if(!isset($FoundEditTemp['id'])) {
        $DB->Insert("INSERT INTO members_edit_temp SELECT * FROM members WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");
        $DB->Insert("INSERT INTO members_data_edit_temp SELECT * FROM members_data WHERE uid = ( '".$_SESSION['uid']."' ) LIMIT 1");
    }
    
    $DB->Update("UPDATE members_edit_temp SET profile_complete='$percent', updated='".DATE_TIME."' ".$SQLStringExtra." WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");
    $DB->Update("UPDATE members_data_edit_temp SET uid= ( '".$_SESSION['uid']."' ) ".$RunExtra."  WHERE uid = ( '".$_SESSION['uid']."' ) LIMIT 1");

    CheckAdminEmail("account","account", $values, "-**1");

    if(isset($_GET['t']) && $_GET['t']==1) {
        echo '['.$RunExtra."]<br>";
        echo "[".$SQLStringExtra."]";
        echo "[<pre>";
        print_r($FoundEditTemp);
        echo "</pre>]";

    }
    return "Your updated profile has been successfully sent to member services for approval. Please note that if you have not legitimately filled out the About Me section your profile will not be approved.\n\nIf you have divulged personal information such as emails, phone numbers, social media contacts, your profile will be terminated for violation of our personal safety policy.";
    
}

function putMayEditProfileData_TEST($id,$values) {
    global $DB;

    $_SESSION['uid']=$id;
    ## Define Variables
    $values['TotalNumberOfRows']=1000;
    $BuiltArray="";
    $RunExtra="";
    $SQLStringExtra ="";

    ## retrieve censor words for filter
    $BadWords = CreateBadWordFilter();

    ## create a counter for the number of fields we have completed
    $CompleteFields =($values['TotalNumberOfRows']-1);

    $mycount = 0;
    $myentered = 0;

    ## loop through all the entered field data
    for($i = 1; $i < $values['TotalNumberOfRows']; $i++) {
        if(isset($values['FieldType'.$i]) ) {

            $mycount = $mycount +1;

            // RESTORE GENDER ID
            if($values['FieldName'.$i] == "gender" && $values['eid'] == $_SESSION['uid']) {

                $_SESSION['genderid'] = $values['FieldValue'.$i];

            }

            ## clean our data
            if(isset($values['FieldValue'.$i])) {
                $values['FieldValue'.$i] = eMeetingInput(filter_str($values['FieldValue'.$i],$BadWords));

                if (($values['FieldValue'.$i]) != "" && $values['FieldType'.$i] !=3 && $values['FieldType'.$i] !=7) {
                    $myentered = $myentered +1;
                }
                elseif (($values['FieldValue'.$i]) != 0 && $values['FieldType'.$i] =3) {
                    $myentered = $myentered +1;
                }
            }


            if($values['FieldType'.$i] == 7) {
                if(isset($values['FieldValue'.$i.'a'])) {
                    $myentered = $myentered +1;
                }
            }

            ## create blank value incase user hasnt create a value via the admin
            if(!isset($values['FieldValue'.$i])) {
                $values['FieldValue'.$i]="";
            }

            $myname = $values['FieldName'.$i];
            $mytype = $values['FieldType'.$i];
            $myvalue = $values['FieldValue'.$i];
            //print "i$i $mycount $myentered $CompleteFields $mytype $myname $myvalue <br>";



            ## dont create counter for the checkboxes within a multiple checkbox list
            if($values['FieldValue'.$i] =="" && $values['FieldType'.$i] !=4 && $values['FieldType'.$i] !=5) {
                $CompleteFields--;
            }

            ## 5 = multiple checkbox data
            if($values['FieldType'.$i] ==5) {

                $x=0;
                while(isset($values['FieldMulti'.$x.$i])) {

                    // MAKE SAVE
                    if($values['Multi'.$x.$i] == 1) {
                        $BuiltArray .="1**";
                    }else {
                        $BuiltArray .="0**";
                    }

                    $x++;

                }

                $RunExtra .= ", ".$values['FieldName'.$i] ."='".$BuiltArray."'";
                $BuiltArray="";
            }

            ## if its not a checkout then do this
            if($values['FieldType'.$i] !=5) {

                ## AGE CAANOT BE LESS THAN 18 AND OCER 110
                if($values['FieldName'.$i] == "age" && $values['FieldType'.$i] != 7) {

                    $MyAgeIs = MakeAge($values['FieldValue'.$i]);

                    if( $MyAgeIs < 16 || $MyAgeIs > 110) {

                        $RunExtra.= ", ".$values['FieldName'.$i] ."='1950-01-01'";

                    }else {

                        $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

                    }

                    ## if the data is a text box
                }elseif($values['FieldType'.$i] == 2) {

                    ## this data is stored from the html editor
                    $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

                    ## AGE FIELD
                }elseif($values['FieldType'.$i] == 7) {

                    $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i.'a']."-".$values['FieldValue'.$i.'b']."-".$values['FieldValue'.$i.'c']."'";



                    ## finally just filter text from select boxes and input fields
                }else {

                    $RunExtra.= ", ".$values['FieldName'.$i] ."='".$values['FieldValue'.$i]."'";

                }

            }

        }
    }


    ## now lets work out if they have completed all their profile
    //$percent = floor(($CompleteFields / ($values['TotalNumberOfRows']-1))* 100);
    $percent = floor(($myentered / $mycount)* 100);


    #set the profile for admin approval
    if(APPROVE_ACCOUNTS =="yes" && !isset($_SESSION['site_moderator_edit'])) {

        $SQLStringExtra =", active='unapproved' ";
    }

    ## update members tables
    
    $FoundEditTemp = $DB->Row("SELECT id FROM members_edit_temp WHERE `id` = ('".$_SESSION['uid']."') LIMIT 1");
    if(!isset($FoundEditTemp['id'])) {        
        $DB->Insert("INSERT INTO members_edit_temp SELECT * FROM members WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");
        $DB->Insert("INSERT INTO members_data_edit_temp SELECT * FROM members_data WHERE uid = ( '".$_SESSION['uid']."' ) LIMIT 1");        
    }
    
    $DB->Update("UPDATE members_edit_temp SET profile_complete='$percent', updated='".DATE_TIME."' ".$SQLStringExtra." WHERE id= ( '".$_SESSION['uid']."' ) LIMIT 1");
    $DB->Update("UPDATE members_data_edit_temp SET uid= ( '".$_SESSION['uid']."' ) ".$RunExtra."  WHERE uid = ( '".$_SESSION['uid']."' ) LIMIT 1");

    CheckAdminEmail("account","account", $values, "-**1");

    if(isset($_GET['t']) && $_GET['t']==1) {
        echo '['.$RunExtra."]<br>";
        echo "[".$SQLStringExtra."]";
        echo "[<pre>";
        print_r($FoundEditTemp);
        echo "</pre>]";

    }
    return "Your updated profile has been successfully sent to member services for approval. Please note that if you have not legitimately filled out the About Me section your profile will not be approved.\n\nIf you have divulged personal information such as emails, phone numbers, social media contacts, your profile will be terminated for violation of our personal safety policy.";
    
}



function getMayProfileData($id) {

    global $DB;
    $profileId=$id;

    $userID_Lresult = $DB->Row("SELECT location FROM members_data WHERE uid='".$id."' LIMIT 1");
    $UserLocation =  $userID_Lresult['location'];
   

    $profile_gender="";
    if(!isset($profile_gender) || $profile_gender=="") {
        $extra="";
    }else {
        $extra="|| private = ".strip_tags($profile_gender);
    }


    if (isset($_SESSION['site_moderator']) && $_SESSION['site_moderator']== "yes") {
        $extra.="|| private = 2 ";
    }


    $SQL = "SELECT id, caption,forder FROM field_groups WHERE ( private = 0 || private = 2 ) ORDER BY forder ASC";

    $result = $DB->Query($SQL);
    $RunningCount=0;
    while( $groups = $DB->NextRow($result) ) {
        $profile_group_array[$RunningCount]['groupid'] = $groups['id'];
        $profile_group_array[$RunningCount]['caption'] = $groups['caption'];
        $profile_group_array[$RunningCount]['forder'] = $groups['forder'];
        $RunningCount++;
    }

    $sql = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.location AS locationVal, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid,members.session,members.email , members.lastlogin, members_privacy.Language FROM members
				INNER JOIN members_privacy ON ( members.id = members_privacy.uid )
				LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid )
				LEFT JOIN members_data ON ( members.id = members_data.uid )
				LEFT JOIN package ON ( members.packageid = package.pid )
		  		WHERE ( members.id = '".$profileId."') ";

    $values = $DB->Row($sql);

    $result1 = $DB->Row("SELECT * FROM files WHERE uid='".$profileId."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");

    $adult_result = $DB->Row("select view_adult from package where pid =". $values['packageid']);

    $album = $DB->Query("select * from album where uid = ".$profileId);
    $albums = array();
    while( $Data = $DB->NextRow($album) ) {
        $albums[] = array(
                "album_id"=>$Data['aid'],
                "photo_count"=>$Data['filecount'],
                "title"      => $Data['title']
        );
    }
   $locationName = $values['locationVal'];
    $finalProfile=array("profileImage"=> ReturnDeImageNew($result1,"medium",$values['id'],$adult_result['view_adult']), "albums"=>$albums,"LocationName"=>$locationName);


    foreach($profile_group_array as $value1) {
        $id=$profileId;
        $selectedGroup=$value1['groupid'];
        $ShowTextGroupsOnly=1;

        $ReturnString ="";
        $HasFieldConter=0;
        $HasFieldConter1=0;
        $AddExtra = '';

        $SQL = "SELECT field.fid,field.fType,field.fName,field.linked_id,field.fOrder FROM field
	INNER JOIN field_groups ON ( ( field_groups.id = field.groupid  || field_groups.id = field.groupid_1 || field_groups.id = field.groupid_2 )  )
	WHERE ( field.groupid = '".$selectedGroup."' OR field.groupid_1 = '".$selectedGroup."' OR field.groupid_2 = '".$selectedGroup."') ".$AddExtra."
	GROUP BY field.fid ORDER BY field_groups.forder ASC, field.fOrder ASC";

        $result1 = $DB->Query($SQL);


        $DataArray = $DB->Row("SELECT * FROM members_data WHERE uid =( '".$id."' ) LIMIT 1");

        $dataArray=array();

        while( $field = $DB->NextRow($result1) ) {

            if($field['fType'] == 2) {
                if ($DataArray[$field['fName']] == '') {
                    $DataArray[$field['fName']] = ' ';
                }
            }

            $HasFieldConter1++;
            // field display counter
            if($DataArray[$field['fName']] !="" && $DataArray[$field['fName']] !="0") {
                $HasFieldConter++;
            }


            $Caption = $DB->Row("SELECT caption FROM field_caption WHERE Cid=".$field['fid']." AND lang='".D_LANG."' AND `match`='no'  LIMIT 1");

            if(empty($Caption)) { //$Caption['caption']

                $Caption = $DB->Row("SELECT caption FROM field_caption WHERE Cid=".$field['fid']." AND `match`='no'  LIMIT 1");
            }

            if($field['fType'] == 1) {
            
                
                   
                if($field['fName'] =="age" && $DataArray[$field['fName']] != "") {

                    $DataArray[$field['fName']]= MakeAge($DataArray[$field['fName']]);
		    
                }elseif( ($field['fName'] =="postcode" && $DataArray[$field['fName']] != "") || ($field['fName'] =="zipcode" && $DataArray[$field['fName']] != "") ) {

                    $DataArray[$field['fName']]= eMeetingOutput(substr($DataArray[$field['fName']],0,3))."****";

                }else {

                    $DataArray[$field['fName']]= eMeetingOutput($DataArray[$field['fName']]);

                }

            }elseif($field['fType'] == 2) { // will not be used if only calling this field

                $DataArray[$field['fName']] = eMeetingOutput($DataArray[$field['fName']],true);

                if ($DataArray[$field['fName']] == '') {
                    $DataArray[$field['fName']] = ' ';
                }


            }elseif($field['fType'] == 3) { // LIST BOX VALUE

                if($DataArray[$field['fName']] == "") {

                    $DataArray[$field['fName']] = "";

                }elseif(!is_numeric($DataArray[$field['fName']])) {

                }else {

                    $listValue = $DB->Row("SELECT fvCaption AS value FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND fvid = ".$DataArray[$field['fName']]." AND lang='".D_LANG."' Order by fvOrder LIMIT 1");
                    if(empty($listValue)) {
                        $listValue = $DB->Row("SELECT fvCaption AS value FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND fvid = ".$DataArray[$field['fName']]." Order by fvOrder LIMIT 1");
                    }

                    $DataArray[$field['fName']] = $listValue['value'];
                }

            }elseif($field['fType'] == 4) {

                if($DataArray[$field['fName']] ==1) {
                    $value= "yes";
                }else {
                    $value= "no";
                }

            }elseif($field['fType'] == 7) {
                $DataArray[$field['fName']]= MakeAge($DataArray[$field['fName']]);
            }elseif($field['fType'] == 5) {
                $c=0;
                $value=array();
                $CheckParts = explode("**", $DataArray[$field['fName']]);
                $result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='".D_LANG."' Order by fvOrder");
                while( $ListValue = $DB->NextRow($result2) ) {

                    if(isset($CheckParts[$c]) && $CheckParts[$c] ==1) {
                        $value[]=$ListValue['fvCaption'];
                    }

                    $c++;
                }

                // BACKUP INCASE NOT VALUES FOUND
                if($c ==0) {

                    $result3 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $field['fid'] ."' AND lang='english' Order by fvOrder");
                    while( $ListValue = $DB->NextRow($result3) ) {

                        if($CheckParts[$c] ==1) {
                            $value[]=$ListValue['fvCaption'];
                        }

                        $c++;
                    }
                }
                if(sizeof($value)>0) {
                    $DataArray[$field['fName']] = $value;
                } else {
                    $DataArray[$field['fName']] = '';
                }

            }

            if($field['fType'] == 2) {
                $finalProfile1=array($Caption['caption']=>$DataArray[$field['fName']]);
            }
            else {
                if(isset($DataArray[$field['fName']]) && $DataArray[$field['fName']]!="") {

                    $dataArray[$field['fOrder']][$Caption['caption']]=$DataArray[$field['fName']];
                }
                if(isset($dataArray) && sizeof($dataArray)>0) {
                    $finalProfile[$value1['forder']][$value1['caption']]=$dataArray;
                }
            }
            
           
            
        }
    }
    
    array_insert(
        $finalProfile,
        "albums",
        $finalProfile1
    );

    if(isset($_GET['t']) && $_GET['t']==1) {
        echo "<pre>";
        //print_r($finalProfile1);
        print_r($finalProfile);
        echo "</pre>";
    }
    return $finalProfile;
}

function array_insert(&$array, $position, $insert)
{
    if (is_int($position)) {
        array_splice($array, $position, 0, $insert);
    } else {
        $pos   = array_search($position, array_keys($array));
        $array = array_merge(
            array_slice($array, 0, $pos),
            $insert,
            array_slice($array, $pos)
        );
    }
}
/**
 * Info: Funcion used to add visitors
 *
 * @version  9.0
 * @created  Fri Sep 25 10:48:31 EEST 2008
 * @updated  Fri Sep 25 10:48:31 EEST 2008
 */
function AddVisitorCountForUser($uid,$id) {
    // UPDATED FOR VERSION 6.0 //
    global $DB;
    if($id != "" && $id!=0 && $uid !="" && $uid !=0 && $uid != $id) {
        $DB->Update("UPDATE members SET hits=hits+1 WHERE id='".strip_tags($id)."' LIMIT 1");
        
        $DB->Insert("INSERT INTO `visited` (uid ,view_uid ,date)VALUES ('".$uid."', '".$id."', NOW())");
        
        return "Success to increase hit count";
    }
    else {
        return "Failed to increase hit count.";
    }
}

?>