<?php

function GetProfiles($id, $pageGET, $This_Page, $getData="",$request_type = ""){
	echo"hhhhhh";
    include("fun_common_api.php");
    //include_once("../func/globals.php");
    global $DB;

    $query = sprintf("Select * From members_data Where uid = %d", $id);
    $mymatch = $DB->Row($query);

    $match = array(
        "age" => $mymatch['age'],
        "race" => $mymatch['em_yh020080113'],
        "height" => $mymatch['em_1k820080113'],
        "body_type" => $mymatch['em_heh20080113'],
        "education" => $mymatch['em_s1620080113'],
        "kids" => $mymatch['em_7s920130723']
    );

    $query = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members INNER JOIN members_privacy ON ( members.id = members_privacy.uid ) LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid ) LEFT JOIN members_data ON ( members.id = members_data.uid ) LEFT JOIN package ON ( members.packageid = package.pid ) WHERE ( members.id = '".$id."' OR members.email='' AND package.pid !='19' )";
    $privacy = $DB->Row($query);

    if($privacy['moderator'] =="yes"){
        ## ADD EXTRA SESSIONS FOR ADMIN MODERATOR
        $data = $DB->Row("SELECT liveEmail, liveEdit, liveDelete FROM members_admin WHERE username='".eMeetingOutput($privacy['username'])."' LIMIT 1");
        $site_moderator_approve = $data['liveEmail'];
    }


    $RunExtra="";
    $RunExtra1="";
    $RunString="";
    $c=1;
    $count=1;
    $loopcount=1;
    $listFavs="";
    $DisplayType =2; // DEFAULT DISPLAY VIEW
    $SHOW_ONLY_NETWORK =0; $NETWORK_ID=2; $NETWORK_SHOW_SQL=""; $MODdata['page'] ='profile';  $MODdata['sub'] ='overview'; $MODdata['type'] ='system';


    ///////////////////////MATCH OPTIONS //////////////////////////////
    if(isset($pageGET['Extra']['match']) && $pageGET['Extra']['match']==1){

        $MData = $DB->Row("SELECT match_array FROM members_privacy WHERE uid= ( '".$id."' ) LIMIT 1");

        $get_myarray = unserialize($MData['match_array']);

        if(is_array($get_myarray)){
            foreach($get_myarray as $Match){
                if(strlen($Match['value']) > 0 && $Match['value'] !='0'){
                    // BUILD AGE STRING
                    if($Match['name']=="country"){
                        $RunExtra .= " ( ".$Match['name']." = '".$Match['value']."' OR ".$Match['name']." = '".MakeCountryNew($Match['value'])."' ) AND ";
                    }elseif($Match['name']=="age"){
                        $ageSlipt = explode("-",$Match['value']);
                        $RunExtra .= " members_data.age BETWEEN '".GetAgeYearNew(trim($ageSlipt[1]))."-00-00' AND '".GetAgeYearNew(trim($ageSlipt[0]))."-".date("m")."-".date("d")."' AND ";

                    }else{
                        $RunExtra .= "   ".$Match['name']." = '".$Match['value']."' AND ";
                    }
                }
            }   
        }
    }

    ////////////////////// MAKE FAVOURITE ARRAY LIST //////////////////////
    if(isset($pageGET['Extra']['favorite']) && $pageGET['Extra']['favorite']==1){
        $listFavs="AND ( members.id = '-10' ";

        $result55 = $DB->Query("SELECT members_network.to_uid
            FROM members_network
            LEFT JOIN members ON ( members.id = members_network.to_uid )
            LEFT JOIN files ON ( files.uid = members.id )
            WHERE members_network.uid='".$id."' AND members_network.type='20' ORDER BY members_network.id DESC");

        while( $row5 = $DB->NextRow($result55)){
            $listFavs .="  || members.id ='".$row5['to_uid']."'";
        }

        $listFavs.=")";
    }

    #######################################################################
    if(D_ZIPCODES ==1 && isset($pageGET['zipcode_value']) && strlen($pageGET['zipcode_value']) > 2 && $pageGET['zipcode_value'] != $GLOBALS['LANG_SEARCH_INNER']['65']){

        require_once "inc/classes/class_zipcodes.php";

        $zipcode_data = new member_zipcodes;

        $zip_value =        eMeetingInput($pageGET['zipcode_value']);

        $zip_distance =     eMeetingInput($pageGET['postcode_distance']);


        /* RADIUS SEARCH WITHIN XX MILES OF XX ZIP CODE */

        $RunExtra .= " ( members_data.postcode LIKE '%$zip_value%' OR ";

        $zips = $zipcode_data->get_zips_in_range($zip_value, $zip_distance);

        if (!empty($zips)){

            foreach ($zips as $key => $value) {

                $RunExtra .= " members_data.postcode='".$key."' OR";

            }

        }

        $RunExtra .= " members_data.postcode='99999999' ) AND ";

        $RunString .=", members_data.postcode";

    }

    ################## POSTAL CODE DATABASE (UK ONLY)  ####################
    if(D_POSTCODES == 1 && isset($pageGET['postcode_value']) &&  strlen($pageGET['postcode_value']) > 2) {

        $postcode_value =       eMeetingInput($pageGET['postcode_value']);
        $postcode_distance =    eMeetingInput($pageGET['uk_postcode_distance']);
        $postcode_distance = $postcode_distance *1000;

        if(!is_numeric($postcode_distance)){ 
            $postcode_distance=50; 
        }

        /* RADIUS SEARCH WITHIN XX MILES OF XX postcode */
        $str = strtoupper($postcode_value); $pos = strpos($str,' ');

        if(strlen($str)>3){     if($pos){   $str =substr($str,0,strpos($str,' '));  }   }
        // else{        $str = substr($str,0,strlen($str)-3);   }

        $co= $DB->Row("SELECT latitude, longitude FROM postcodescoords WHERE postcode LIKE '$str%' LIMIT 0,1");

        $latitude =$co['latitude'];

        $longitude=$co['longitude'];

        if(!empty($co)){

            $RunExtra .= " ( members_data.postcode LIKe '%$postcode_value%' OR ";

            $codequery = $DB->Query("SELECT dest.postcode, dest.easting, dest.northing
                                        FROM postcodescoords AS source, postcodescoords AS dest
                                        WHERE source.postcode ='$str'
                                        AND ((dest.easting < (source.easting + $postcode_distance)
                                        AND dest.easting > (source.easting - $postcode_distance))
                                        AND (dest.northing < (source.northing + $postcode_distance)
                                        AND dest.northing > (source.northing - $postcode_distance)))
                                        ORDER BY dest.postcode ASC" );


            while( $coRow = $DB->NextRow($codequery) ) {
                $RunExtra .= " members_data.postcode LIKE '".$coRow['postcode']."%' OR";
            }

            $RunExtra .= " members_data.postcode='99999999' ) AND members_data.country = '385' AND ";
            $RunString .=", members_data.postcode";
        }
    }

    ###################### BUILD SEARCH QUERY STRING  #####################
    $BuiltArray = "";
    $addExtra = false;

    if(isset($pageGET['SeN'])){

        $TotalArray = count($pageGET['SeN'])+1;

        for($i = 1; $i < $TotalArray; $i++) {

            if(isset($pageGET['SeV'][$i])){

                if(  isset($pageGET['SeV'][$i]) && (is_numeric($pageGET['SeV'][$i]) && $pageGET['SeV'][$i] !=0) || ( strlen($pageGET['SeV'][$i]) > 1 ) ){

                    if($pageGET['SeT'][$i] ==1 || $pageGET['SeT'][$i] ==2){

                        $RunExtra .= " members_data.".eMeetingInput($pageGET['SeN'][$i]) ." LIKE '%".eMeetingInput($pageGET['SeV'][$i])."%' AND ";

                    }elseif($pageGET['SeT'][$i] ==3 ){ // listbox

                        if($pageGET['SeN'][$i]=="country"){

                            $RunExtra .= " ( members_data.".eMeetingInput($pageGET['SeN'][$i]) ."='".eMeetingInput($pageGET['SeV'][$i])."' OR members_data.".eMeetingInput($pageGET['SeN'][$i]) ."='".MakeCountryNew(eMeetingInput($pageGET['SeV'][$i]))."' ) AND ";

                        }else{

                            //$RunExtra .= " members_data.".eMeetingInput($pageGET['SeN'][$i]) ."='".eMeetingInput($pageGET['SeV'][$i])."' AND ";
						   
						   if (eMeetingInput($pageGET['SeV'][$i]) != '') {
								$state = eMeetingInput($pageGET['SeV'][$i]);
								$states = explode(",", $state);

								$sql = "";
								for ($j=0; $j<count($states); $j++) {
									if ($sql == "")
										$sql = eMeetingInput($pageGET['SeN'][$i]) . "='" . $states[$j] . "' ";
									else 
										$sql = $sql . " OR " . eMeetingInput($pageGET['SeN'][$i]) . "='" . $states[$j] . "' ";
								}

								$RunExtra .= " (" . $sql . ") AND ";
							}
							
						}

                    }elseif($pageGET['SeT'][$i] ==4){ // checkbox

                        if($pageGET['SeV'][$i] == ""){$pageGET['SeV'][$i] =0; }
                        $RunExtra .= " members_data.".eMeetingInput($pageGET['SeN'][$i]) ."='".eMeetingInput($pageGET['SeV'][$i])."' AND";
                    }

                    $RunString .= ", members_data.".eMeetingInput($pageGET['SeN'][$i]);
                }
            }
        }
    }

    if(isset($pageGET['CeK'])){

        for($i = 0; $i < $pageGET['TotalNumberOfRows']+2; $i++) {

            if(isset($pageGET['CeK'][$i])) { //multiple choices

                if($pageGET['SeT'][$i] ==5) { // multiple choices - checkbox

                    $bitArray = array();
                    $bitArrayC = 0;
                    $x = 0;
                    $fieldId = $pageGET['CeK'][$i];

                    for($c = 0; $c < 100; $c++)
                    {
                        // MAKE SAVE
                        if(isset($pageGET['FieldMulti'.$x.$fieldId]))
                        {
                            if(isset($pageGET['Multi'.$x.$fieldId]))
                            {
                                $BuiltArray .="1**";
                                $bitArray[$bitArrayC] = "1**";
                                $addExtra = true;
                            }else{
                                $BuiltArray .="0**";
                                $bitArray[$bitArrayC] = "0**";
                            }
                            $bitArrayC++;
                        }
                        $x++;
                    }
                    if($addExtra)
                    {
                        $CeKExtra = "";
                        for($ix=0; $ix < count($bitArray); $ix++)
                        {
                            if($bitArray[$ix] == "1**")
                            {
                                if($ix == 0)
                                    $startFrom = 1;
                                else
                                    $startFrom = $ix * 3 +1;

                                $CeKExtra .= " SUBSTRING(members_data." . eMeetingInput($pageGET['FieldName'.$fieldId]) .",".$startFrom.",3) = '".$bitArray[$ix]."' OR ";
                            }
                        }
                        if(!empty($CeKExtra))
                        {
                            $RunExtra .= "(".substr(trim($CeKExtra), 0, strlen(trim($CeKExtr))-2).") AND ";
                        }

                    }

                    //reset variables
                    $BuiltArray = "";
                    $CeKExtra = "";
                    $bitArray = array();
                    $addExtra = false;

                }elseif($pageGET['SeT'][$i] ==3){

                    $fieldId = $pageGET['CeK'][$i];

                    $RunExtra .= " ( ";
                    $mycount = 0;

                    for($x = 0; $x < 100; $x++) {
                        $z = $pageGET['FieldMulti'.$x.$fieldId];
                        $y = $pageGET['Multi'.$x.$fieldId];

                        if(isset($pageGET['Multi'.$x.$fieldId]) && $pageGET['Multi'.$x.$fieldId] ==1) {
                            $myvalue = $pageGET['FieldValue'.$x.$fieldId];
                            $RunExtra .= " members_data.".eMeetingInput($pageGET['SeN'][$i]) ."='".$myvalue."' OR ";
                            $mycount++;
                        }
                    }

                    if ($mycount == 0) {
                        $RunExtra .= " 1=1 ) AND ";
                    }else{
                        $RunExtra .= " 1=2 ) AND ";
                    }
                }
            }
        }
    }

    ####################### BUILD EXTRA QUERY STRING  #####################

    // SHOW ONLY NETWORK FRIENDS
    if( ( isset($pageGET['friendid']) && is_numeric($pageGET['friendid']) )  || ( isset($getData['friendid']) && is_numeric($getData['friendid']) )  ){

        $NETWORKD_FRIEND_ID    = (isset($pageGET['friendid']))  ?   $pageGET['friendid']    : $getData['friendid'];
        $SHOW_ONLY_NETWORK =1;
        $NETWORK_SHOW_SQL ='members_network.approved AS networkApprove, members_network.uid AS networkUID, members_network.to_uid AS networkTOUID, ';

        ## find the network type
        if( ( isset($pageGET['friend_type']) && is_numeric($pageGET['friend_type']) )  || ( isset($getData['friend_type']) && is_numeric($getData['friend_type']) )  ){
            $NETWORK_ID    = (isset($pageGET['friend_type']))   ?   $pageGET['friend_type'] : $getData['friend_type'];
        }
    }

    ## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED

    if($site_moderator_approve=="yes" ){
        $RunExtra1 .="";
    }else{
        if( D_GENDERMATCHING ==1 && $SHOW_ONLY_NETWORK !=1  ){
            $RunExtra1 .="members_data.gender != '".$privacy['genderD']."' AND";
        }

        $RunExtra1 .=" members.active ='active' AND (members.packageid !='68' and members.packageid !='70' and members.packageid !='19') AND activate_code='OK' AND";
    }

    // build extra strings
    if(isset($pageGET['Extra']['pics']) && $pageGET['Extra']['pics']==1){
        $RunExtra1 .= " members.id = files.uid AND ";
    }

    // build extra strings
    if( ( isset($pageGET['Extra']['online']) && $pageGET['Extra']['online']==1 ) || ( isset($getData['online']) && $getData['online']== 1 ) ){
        $RunExtra1 .= " members.id = members_online.logid AND ";
    }

    // build extra strings
    if(isset($pageGET['Extra']['keyword']) && strlen($pageGET['Extra']['keyword']) > 1 && $pageGET['Extra']['keyword'] !=$GLOBALS['LANG_SEARCH_INNER']['62']){

        $listFavs .=" AND (";

        if(isset($pageGET['Extra']['keyword_username']) && $pageGET['Extra']['keyword_username']==1){
            $listFavs .=" members.username LIKE ( '%".eMeetingInput($pageGET['Extra']['keyword'])."%' ) OR";
        }

        if(isset($pageGET['Extra']['keyword_headline']) && $pageGET['Extra']['keyword_headline']==1){
            $listFavs .=" members_data.headline LIKE ( '%".eMeetingInput($pageGET['Extra']['keyword'])."%' ) OR";
        }

        if(isset($pageGET['Extra']['keyword_description']) && $pageGET['Extra']['keyword_description']==1){
            $listFavs .=" members_data.description LIKE ( '%".eMeetingInput($pageGET['Extra']['keyword'])."%' ) OR";
        }

        $listFavs .=" members.username LIKE ( '%".eMeetingInput($pageGET['Extra']['keyword'])."%' ) )   ";
    }

    // build extra strings
    if(isset($pageGET['Extra']['birthday']) && $pageGET['Extra']['birthday']==1){
        $agemd = date('M-d');
        $RunExtra1 .= " members_data.age LIKE '%$agemd%' AND ";
    }

    // unapproved members
    if(isset($pageGET['Extra']['unapproved']) && $pageGET['Extra']['unapproved']==1){
        $RunExtra1 .= " members.active !='active' AND ";
    }

    // build extra strings

    if(isset($pageGET['Extra']['period']) && is_numeric($pageGET['Extra']['period']) && $pageGET['Extra']['period'] >= 1){
		 $RunExtra1 .= " TO_DAYS( NOW()  )  - TO_DAYS( members.created )  <= ".$pageGET['Extra']['period']." AND ";
		
    }
//  print_r($RunExtra1);
    // build extra strings
    if(isset($pageGET['Extra']['livevideo']) && $pageGET['Extra']['livevideo']==1){
        $RunExtra1 .= " members.video_duration > 0 AND ";
    }

    // build extra strings

    if(isset($pageGET['Extra']['highlighted']) && $pageGET['Extra']['highlighted']==1){
        $RunExtra1 .= " members.highlight='on' AND ";
    }

    // build extra strings
    if(isset($pageGET['Extra']['newtoday']) && $pageGET['Extra']['newtoday']==1){
        $RunExtra1 .= " TO_DAYS( NOW()  )  - TO_DAYS( members.created )  < 2 AND ";
    }

    // build extra strings
    if(isset($pageGET['Extra']['featured']) && $pageGET['Extra']['featured']==1){
        $RunExtra1 .= " files.featured='yes' AND ";
    }

    // build extra strings
    if(isset($pageGET['Extra']['Username']) && strlen($pageGET['Extra']['Username']) > 1 && $pageGET['Extra']['Username'] !=$GLOBALS['LANG_SEARCH_INNER']['63']){
        $RunExtra1 .= " members.username LIKE ( '%".eMeetingInput($pageGET['Extra']['Username'])."%' ) AND ";
    }

    // BUILDING SORT STRING
    if(isset($pageGET['Extra']['sort'])){

        switch(trim($pageGET['Extra']['sort'])){

            case "1": 
            {
                $OrderByThis = "members.lastlogin DESC";
            }
            break;

            case "2": 
            {   // SORT BY MEMBER PHOTOS
                $OrderByThis = "files.date DESC";
                $RunExtra1 .= " members.id = files.uid AND files.bigimage !='' AND";
            }
            break;

            case "3": 
            {   // MOST POPULAR
                $OrderByThis = "members.hits DESC";
            }
            break;

            case "4": 
            {   // LAST UPDATED
                $OrderByThis = "members.updated DESC";
            }
            break;

            case "5": 
            {   // SORT BY MEMBER NAME
                $OrderByThis = "members.username ASC";
            }
            break;

            case "6": 
            {   // GENDER
                $OrderByThis = "members_data.gender DESC";
            }
            break;

            case "7": 
            {   // AGE
                $OrderByThis = "members_data.age DESC";
            }
            break;

            case "8": 
            {   // SORT BY NEW MEMBERS FIRST
                $OrderByThis = "members.packageid DESC";
            }
            break;

            default: 
            {  
                $OrderByThis = "members.lastlogin DESC"; 
            }
        }


    }else{

        $OrderByThis = "members.lastlogin DESC";

    }

    // build extra strings

    if(isset($pageGET['Extra']['view']) && $pageGET['Extra']['view'] != "" ){ // CHANGE LAYOUT VIEW

        $DisplayType    =   $pageGET['Extra']['view'];

        if($DisplayType ==2){
            $stoplimit=6;
        }else{
            $stoplimit=30;
        }

    }else{
        $stoplimit=30;
    }

    // It is for MyMatch
    $RunExtra1 .= " (members_mymatch.race LIKE '%" . $match['race'] . "%' OR members_mymatch.race = '') AND ";
    $RunExtra1 .= " (members_mymatch.min_height <= '" .$match['height'] . "' OR members_mymatch.min_height = '') AND ";
    $RunExtra1 .= " (members_mymatch.max_height > '" .$match['height'] . "' OR members_mymatch.max_height = '') AND ";
    $RunExtra1 .= " (members_mymatch.education LIKE '%" . $match['education'] . "%' OR members_mymatch.education = '') AND ";   
    $RunExtra1 .= " (members_mymatch.body_type LIKE '%" . $match['body_type'] . "%' OR members_mymatch.body_type = '') AND ";
    $RunExtra1 .= " (members_mymatch.kids LIKE '%" . $match['kids'] . "%' OR members_mymatch.kids = '') AND ";   

    $date = explode("-", $mymatch['age']);
    $birth_year = $date[0];
    $cur_year = date('Y', time());
    $age = $cur_year - $birth_year;

    $RunExtra1 .= " (members_mymatch.min_age <= " . $age . " AND members_mymatch.max_age > " . $age . ") AND ";

    if (isset($pageGET['Extra']['distance']) && isset($pageGET['Extra']['zipcode']) && $pageGET['Extra']['distance'] != '' && $pageGET['Extra']['zipcode'] != '')  {
        include_once("zipcode.php");
        $portland = new ZipCode($pageGET['Extra']['zipcode']);

        $zip_query = "";
        foreach ($portland->getZipsInRange(0, $pageGET['Extra']['distance']) as $miles => $zip) {    
            if ($zip_query == "") {
                $zip_query = "members_data.postcode = '" . $zip . "' ";
            }
            else {
                $zip_query = $zip_query . " OR members_data.postcode = '" . $zip . "' ";
            }
        }

        if ($zip_query != "") {
            $RunExtra1 .= "(" . $zip_query . ")" . " AND ";
        }
    } 

    if (isset($pageGET['Extra']['state']) && $pageGET['Extra']['state'] != '') {
        $state = $pageGET['Extra']['state'];
        $states = explode(",", $state);

        $sql = "";
        for ($i=0; $i<count($states); $i++) {
            if ($sql == "")
                $sql = "members_data.em_85820081128 = '" . $states[$i] . "' ";
            else 
                $sql = $sql . " OR members_data.em_85820081128 = '" . $states[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND ";
    }

    if (isset($pageGET['Extra']['race']) && $pageGET['Extra']['race'] != '') {
        $race = $pageGET['Extra']['race'];
        $races = explode(",", $race);

        $sql = "";
        for ($i=0; $i<count($races); $i++) {
            if ($sql == "")
                $sql = "members_data.em_yh020080113 = '" . $races[$i] . "' ";
            else 
                $sql = $sql . " OR members_data.em_yh020080113 = '" . $races[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND ";
    }
	
    if (isset($pageGET['Extra']['height_short']) && $pageGET['Extra']['height_short'] != '' && isset($pageGET['Extra']['height_high']) && $pageGET['Extra']['height_high'] != '') {
        $RunExtra1 .= " members_data.em_1k820080113 >= '" . $pageGET['Extra']['height_short'] . "' AND members_data.em_1k820080113 < '" . $pageGET['Extra']['height_high'] . "' AND ";   
    }

    if (isset($pageGET['Extra']['body_type']) && $pageGET['Extra']['body_type'] != '') {
        $body_type = $pageGET['Extra']['body_type'];
        $body_types = explode(",", $body_type);

        $sql = "";
        for ($i=0; $i<count($body_types); $i++) {
            if ($sql == "")
                $sql = "members_data.em_heh20080113 = '" . $body_types[$i] . "' ";
            else
                $sql = $sql . " OR members_data.em_heh20080113 = '" . $body_types[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND ";   
    }

    if (isset($pageGET['Extra']['education']) && $pageGET['Extra']['education'] != '') {
        $education = $pageGET['Extra']['education'];
        $educations = explode(",", $education);

        $sql = "";
        for ($i=0; $i<count($educations); $i++) {
            if ($sql == "")
                $sql = "members_data.em_s1620080113 = '" . $educations[$i] . "' ";
            else
                $sql = $sql . " OR members_data.em_s1620080113 = '" . $educations[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND "; 
    }

    if (isset($pageGET['Extra']['religion']) && $pageGET['Extra']['religion'] != '') {
        $religion = $pageGET['Extra']['religion'];
        $religions = explode(",", $religion);

        $sql = "";
        for ($i=0; $i<count($religions); $i++) {
            if ($sql == "")
                $sql = "members_data.em_txg20080113 = '" . $religions[$i] . "' ";
            else
                $sql = $sql . " OR members_data.em_txg20080113 = '" . $religions[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND ";   
    }

    if (isset($pageGET['Extra']['kids']) && $pageGET['Extra']['kids'] != '') {
        $kids = $pageGET['Extra']['kids'];
        $kidsArray = explode(",", $kids);

        $sql = "";
        for ($i=0; $i<count($kidsArray); $i++) {
            if ($sql == "")
                $sql = "members_data.em_7s920130723 = '" . $kidsArray[$i] . "' ";
            else
                $sql = $sql . " OR members_data.em_7s920130723 = '" . $kidsArray[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND ";  
    }

    if (isset($pageGET['Extra']['marriage']) && $pageGET['Extra']['marriage'] != '') {
        $marriage = $pageGET['Extra']['marriage'];
        $marriageArray = explode(",", $marriage);

        $sql = "";
        for ($i=0; $i<count($marriageArray); $i++) {
            if ($sql == "")
                $sql = "members_data.em_s5j20080113 = '" . $marriageArray[$i] . "' ";
            else
                $sql = $sql . " OR members_data.em_s5j20080113 = '" . $marriageArray[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND "; 
    }

    if (isset($pageGET['Extra']['smoking']) && $pageGET['Extra']['smoking'] != '') {
        $smoking = $pageGET['Extra']['smoking'];
        $smokings = explode(",", $smoking);

        $sql = "";
        for ($i=0; $i<count($smokings); $i++) {
            if ($sql == "")
                $sql = "members_data.em_1cz20131006 = '" . $smokings[$i] . "' ";
            else
                $sql = $sql . " OR members_data.em_1cz20131006 = '" . $smokings[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND "; 
    }

    if (isset($pageGET['Extra']['drinking']) && $pageGET['Extra']['drinking'] != '') {
        $drinking = $pageGET['Extra']['drinking'];
        $drinkings = explode(",", $drinking);

        $sql = "";
        for ($i=0; $i<count($drinkings); $i++) {
            if ($sql == "")
                $sql = "members_data.em_7gb20131006 = '" . $drinkings[$i] . "' ";
            else
                $sql = $sql . " OR members_data.em_7gb20131006 = '" . $drinkings[$i] . "' ";
        }

        $RunExtra1 .= " (" . $sql . ") AND "; 
    }
TO_DAYS

    // build age string
    if(isset($pageGET['Extra']['age1']) && is_numeric($pageGET['Extra']['age1']) && isset($pageGET['Extra']['age2']) && $pageGET['Extra']['age2'] !='0' ){

        //die($pageGET['Extra']['age1']."--".$pageGET['Extra']['age2']);

        if($pageGET['Extra']['age1'] > $pageGET['Extra']['age2']){

            $AgeFinder1 = $pageGET['Extra']['age2'];

            $AgeFinder2 = $pageGET['Extra']['age1'];

            $pageGET['Extra']['age1'] = $AgeFinder1;

            $pageGET['Extra']['age2'] = $AgeFinder2;

        }

        $RunExtra .= " members_data.age BETWEEN '".GetAgeYearNew(eMeetingInput($pageGET['Extra']['age2']))."-AAA-01' AND '".GetAgeYearNew(eMeetingInput($pageGET['Extra']['age1']))."-ZZZ-31'  AND ";
    }


    ///////////////// GALLERY VIEW PHOTOS ONLY

    if(!isset($This_Page)){$This_Page=1; }

    $startlimit = $stoplimit*($This_Page-1);

    if($startlimit <0) $startlimit =0;

    #######################################################################

    ###################### BUILD FINISHED QUERY  ##########################

    $QueryTotal = "SELECT count(DISTINCT ";

    if(isset($pageGET['Extra']['online']) && $pageGET['Extra']['online']==1 || ( isset($getData['online']) && $getData['online']== 1 ) ){
        $QueryTotal .= "members_online.logid";
    }else{
        $QueryTotal .= "members.id";
    }

    $QueryTotal .= ") AS total FROM members INNER JOIN members_data ON (  $RunExtra members.id = members_data.uid ";

    if(isset($pageGET['Extra']['birthday']) && $pageGET['Extra']['birthday'] ==1){
        $agemd = date('M-d');
        $QueryTotal .=" AND members_data.age LIKE '%$agemd%' ";
    }


    if( D_GENDERMATCHING ==1 && $SHOW_ONLY_NETWORK !=1 ){ 
        $QueryTotal .= " AND members_data.gender != '".$privacy['genderid']."' "; 
    }

    if(isset($pageGET['Extra']['keyword']) && strlen($pageGET['Extra']['keyword']) > 1 && $pageGET['Extra']['keyword'] !=$GLOBALS['LANG_SEARCH_INNER']['62']){

    }

    $QueryTotal .=")";

    // SHOW ONLY NETWORK FRIENDS

    if( ( isset($pageGET['friendid']) && is_numeric($pageGET['friendid']) )  || ( isset($getData['friendid']) && is_numeric($getData['friendid']) )  ){

        $NETWORKD_FRIEND_ID    = (isset($pageGET['friendid']))  ?   $pageGET['friendid']    : $getData['friendid'];

        if(($NETWORK_ID ==1) || ($NETWORK_ID ==3)){

            $QueryTotal .="INNER JOIN members_network ON ( members.id = members_network.to_uid AND members_network.uid='".$NETWORKD_FRIEND_ID."'  AND members_network.type= ( '".$NETWORK_ID."' ) )";

        }else{

            $QueryTotal .="INNER JOIN members_network ON ( ( (members.id = members_network.to_uid AND members_network.uid='".$NETWORKD_FRIEND_ID."' )  OR  ( members.id = members_network.uid AND members_network.to_uid='".$NETWORKD_FRIEND_ID."' ) )  AND members_network.type= ( '".$NETWORK_ID."' ) )";

        }

    }

    // build extra strings

    if(isset($pageGET['Extra']['featured']) && $pageGET['Extra']['featured']==1){

        $QueryTotal .= " INNER JOIN files ON (files.uid = members.id AND files.featured='yes' ) ";

    }elseif(isset($pageGET['Extra']['pics']) && $pageGET['Extra']['pics']==1 ){

        $QueryTotal .=" INNER JOIN files ON (files.uid = members.id AND files.default LIKE '%1%' ) ";

    }else{

        if(SEARCH_WITHOUT_PICS =="no"){ // dont display profiles without images

            $QueryTotal .= " INNER JOIN files ON ( files.uid = members.id AND files.default LIKE '%1%') ";

        }

    }

    if(isset($pageGET['Extra']['online']) && $pageGET['Extra']['online']==1 || ( isset($getData['online']) && $getData['online']== 1 ) ){

        $QueryTotal .=" INNER JOIN members_online ON ( members_online.logid = members_data.uid ) ";

    }

    $QueryTotal .=" WHERE members.email !='' AND members.visible = 'yes' ";

    if(isset($pageGET['Extra']['highlighted']) && $pageGET['Extra']['highlighted']==1){

        $QueryTotal .=" AND members.highlight='on' ";

    }

    ## ADMIN APPROVAL SYSTEM, SHOW ALL ADVERT TYPES EVENT IF THEY ARE NOT APPROVED

    if($site_moderator_approve=="yes" ){

        $QueryTotal .="";

    }else{

        $QueryTotal .=" AND members.active ='active' AND activate_code='OK' ";

    }

    if(isset($pageGET['Extra']['unapproved']) && $pageGET['Extra']['unapproved']==1){

        $QueryTotal .= " AND  members.active !='active' ";

    }

    // build extra strings 

    if(isset($pageGET['Extra']['period']) && is_numeric($pageGET['Extra']['period']) && $pageGET['Extra']['period'] >= 1){

        $QueryTotal .= " AND TO_DAYS( NOW()  )  - TO_DAYS( members.created )  <= ".$pageGET['Extra']['period']."  ";

    }

    if(isset($pageGET['Extra']['livevideo']) && $pageGET['Extra']['livevideo']==1){

        $QueryTotal .= " AND  members.video_duration > 0";

    }

    if(isset($pageGET['Extra']['newtoday']) && $pageGET['Extra']['newtoday']==1){



        $QueryTotal .= " AND TO_DAYS( NOW()  )  - TO_DAYS( members.created )  < 2 ";

    }

    if(isset($pageGET['Extra']['Username']) && strlen($pageGET['Extra']['Username']) > 1 && $pageGET['Extra']['Username'] !=$GLOBALS['LANG_SEARCH_INNER']['63']){

        $QueryTotal .= " AND members.username LIKE ( '%".eMeetingInput($pageGET['Extra']['Username'])."%' ) ";

    }



    $QueryTotal .=" $listFavs";



    if(isset($pageGET['Extra']['online']) && $pageGET['Extra']['online']==1 || ( isset($getData['online']) && $getData['online']== 1 ) ){

        //$QueryTotal .= "GROUP BY members_online.logid";

    }

    $DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY

//print_r($QueryTotal);


    $totalResults = $DB->Row($QueryTotal);

    if($RunExtra == "" && $totalResults['total'] > 500000){

        // WE NEED TO CUT DOWN THE SIZE OF FULL DATABASE QUERIES TO PREVENT SLOW DATABASE CONNECTIONS

        $HALF_DATABASE_SIZE = $totalResults['total']/2;

        $RunExtra = " ( members_data.description !='' AND members_data.headline !='' ) AND ";

    }

    ## make SQL query

    $QQ ="SELECT $NETWORK_SHOW_SQL package.icon, album.cat, members_data.postcode, files.featured, members.active AS ThisApproved, members.msgStatus, members.video_duration, files.bigimage, files.type, files.approved, files.adult_content, members_online.logid AS onlinenow, members.id, members.packageid, members.username, members.highlight, members.lastlogin, members_data.gender , members_data.headline, members_data.description, members_data.age, members_data.location, members_data.country $RunString

        FROM members

        LEFT JOIN members_mymatch ON (members.id = members_mymatch.user_id ) 

        INNER JOIN members_data ON ( $RunExtra members.id = members_data.uid )";


    if($SHOW_ONLY_NETWORK ==1){


        if(($NETWORK_ID ==1) || ($NETWORK_ID ==3)){

            $QQ .="INNER JOIN members_network ON ( members.id = members_network.to_uid AND members_network.uid='".$NETWORKD_FRIEND_ID."'  AND members_network.type= ( '".$NETWORK_ID."' ) )";

        }else{

            $QQ .="INNER JOIN members_network ON ( ( (members.id = members_network.to_uid AND members_network.uid='".$NETWORKD_FRIEND_ID."' )  OR  ( members.id = members_network.uid AND members_network.to_uid='".$NETWORKD_FRIEND_ID."' ) )  AND members_network.type= ( '".$NETWORK_ID."' ) )";

        }
    }

    if(isset($pageGET['Extra']['online']) && $pageGET['Extra']['online']==1 || ( isset($getData['online']) && $getData['online']== 1 ) ){

        $QQ .=" INNER         JOIN members_online ON ( members_online.logid = members.id ) ";

    }else{

        $QQ .=" LEFT JOIN members_online ON ( members_online.logid = members.id ) ";

    }

    $userData = $DB->Query("select gender, em_m5z20131006,description from members_data where uid='". $id ."' ");
    $otherType = "";
    $otherInterest = "";
    if( $Data = $DB->NextRow($userData) ){
        $otherType = $Data['em_m5z20131006'] == "5776" ? "64" : "63";
        $otherInterest = $Data['gender'] == "64" ? "5776" : "5777";
    }

    $QQ .=" LEFT JOIN package ON ( members.packageid = package.pid ) ";

    if(SEARCH_WITHOUT_PICS =="no"){  // dont display profiles without images

        $QQ .= " INNER JOIN files ON ( files.uid = members.id AND files.default LIKE '%1%' AND title != 'Message Photo') ";

    }else{

        $QQ .= " LEFT JOIN files ON ( files.uid = members.id AND files.default LIKE '%1%' AND files.type='photo' AND title != 'Message Photo')  ";

    }

    $QQ .= " LEFT JOIN album ON ( album.aid = files.aid) ";

    $QQ .="WHERE $RunExtra1 members.email !='' AND members.visible = 'yes' ";
    $QQ .= "AND members_data.gender='$otherType' AND (members_data.em_m5z20131006='$otherInterest' OR members_data.em_m5z20131006 is NULL)";


    if(isset($pageGET['Extra']['online']) && $pageGET['Extra']['online']==1 || ( isset($getData['online']) && $getData['online']== 1 ) ){

        $GroupByThis = "members.id";

    }else{

        $GroupByThis = "members.id";

    }

    $QQ .=" $listFavs GROUP BY ".$GroupByThis." ORDER BY ".$OrderByThis." LIMIT ".$startlimit.",".$stoplimit;


    if($SHOW_ONLY_NETWORK ==1){
        $QQ ="SELECT $NETWORK_SHOW_SQL '' as icon, members_data.postcode, 'no' as featured,  members.active AS ThisApproved, members.msgStatus, members.video_duration, 'x.jpg' as  bigimage, 'photo' as type, 'yes' as approved, 'no' as adult_content, '1' as onlinenow, members.id,  members.packageid, members.username, members.highlight, members.lastlogin,  members_data.gender , members_data.headline, members_data.description, members_data.age,  members_data.location, members_data.country
        FROM members
        INNER JOIN members_data ON ( $RunExtra members.id = members_data.uid )";


        if(($NETWORK_ID ==1) || ($NETWORK_ID ==3)){

            $QQ .="INNER JOIN members_network ON ( members.id = members_network.to_uid AND members_network.uid='".$NETWORKD_FRIEND_ID."'  AND members_network.type= ( '".$NETWORK_ID."' ) )";

        }else{

            $QQ .="INNER JOIN members_network ON ( ( (members.id =  members_network.to_uid AND members_network.uid='".$NETWORKD_FRIEND_ID."' )  OR  (  members.id = members_network.uid AND members_network.to_uid='".$NETWORKD_FRIEND_ID."' )  )  AND members_network.type= ( '".$NETWORK_ID."' ) )";

        }



        $QQ .="WHERE $RunExtra1 members.email !='' AND members.visible = 'yes' ";
        $QQ .= "AND members_data.gender='$otherType' AND (members_data.em_m5z20131006='$otherInterest' OR members_data.em_m5z20131006 is NULL)";

        $QQ .=" $listFavs GROUP BY ".$GroupByThis." ORDER BY members_network.approved DESC, members_network.id DESC  LIMIT ".$startlimit.",".$stoplimit;
    }

    $fp = fopen('query.txt', 'w');
    fwrite($fp, $QQ);
    fclose($fp);


    $result = $DB->Query($QQ);

    $DataArray = array(); $Counter=1;
    $newDataArray = array();
    while( $Data = $DB->NextRow($result) ) {
        
        ///////////////////// FILL OUT BLANKS
        if(strlen($Data['location']) ==1){ $Data['location']=""; }

        if(strlen($Data['country']) ==1){ $Data['country']="n/a"; }

        ////////////////////////////////////////////////////////////////////////////////////////////////////

        $DataArray[$Counter]['id']          = $Data['id'];

        $DataArray[$Counter]['postcode']    = $Data['postcode'];            // MEMBERS HIGHTED OPTION

        $DataArray[$Counter]['username']    = substr($Data['username'],0,15);                   // MEMBERS USERNAME

        $DataArray[$Counter]['genderID']        = $Data['gender'];

        $DataArray[$Counter]['gender']      = MakeGenderNew($Data['gender']);       // MEMBERS GENDER

        $DataArray[$Counter]['lastlogin']   = $Data['lastlogin'];                   // MEMBERS LAST LOGIN TIME

        $DataArray[$Counter]['status']      = eMeetingOutput($Data['msgStatus']);                   // MEMBERS LAST LOGIN TIME

        $DataArray[$Counter]['video_duration']      = $Data['video_duration'];                  // MEMBERS LAST LOGIN TIME

        $DataArray[$Counter]['highlight']       = $Data['highlight'];                   // MEMBERS HIGHTED OPTION

        $DataArray[$Counter]['featured']        = $Data['featured'];                    // MEMBERS HIGHTED OPTION

        $DataArray[$Counter]['packageid']       = $Data['packageid'];                   // MEMBERS PACKAGEID

        $DataArray[$Counter]['headline']        = eMeetingOutput($Data['headline']);                    // MEMBERS HEADLINE

        if($DataArray[$Counter]['headline'] =="0"){ $DataArray[$Counter]['headline']=$DataArray[$Counter]['username']; }

        $DataArray[$Counter]['description']     = substr(eMeetingOutput(strip_tags($Data['description'])),0,120);               // MEMBERS DESCRIPTION

        if($DataArray[$Counter]['description'] =='0'){ $DataArray[$Counter]['description']=""; }


        $DataArray[$Counter]['country']         = MakeCountryNew($Data['country']);                 // MEMBERS COUNTRY

        // $DataArray[$Counter]['location']         = eMeetingOutput($Data['location']);                    // MEMBERS LOCATION
        $getline = $DB->Row("Select fvCaption from field_list_value f, members_data d where  d.em_85820081128  = f.fvid and f.fvFid = 54 and uid = ( '".$Data['id']."' ) ");


        $DataArray[$Counter]['mystate'] = $getline['fvCaption'];



        $getstat = $DB->Row("Select fvCaption from field_list_value f, members_data d where d.location = f.fvid and f.fvFid = 26 and uid = ( '".$Data['id']."' ) ");

        $DataArray[$Counter]['location'] = $getstat['fvCaption'];

        if ($getstat ==""){
            $DataArray[$Counter]['location'] = eMeetingOutput($Data['location']);
        }



        $DataArray[$Counter]['lastlogin']       = $Data['lastlogin'];                   // MEMBERS LOCATION

        $DataArray[$Counter]['age']             = MakeAgeNew($Data['age']);             // MEMBERS AGE

        $DataArray[$Counter]['ThisApproved']    = $Data['ThisApproved'];                // MEMBERS AGE

        $DataArray[$Counter]['starsign']        = getsign($Data['age']);                // MEMBERS AGE

        $DataArray[$Counter]['CanChat']         = "yes";//$Data['CanChat'];                 // CHAT USE IM

        if($Data['icon'] ==""){
            $icon_url  = DB_DOMAIN."images/DEFAULT/blank.gif";
            $DataArray[$Counter]['icon']            = DB_DOMAIN."images/DEFAULT/blank.gif";

        }else{
            $icon_url= $Data['icon'];
            $DataArray[$Counter]['icon']            = $Data['icon'];                        // MEMBERS PACKAGE ICON

        }

        if(isset($Data['duration']) && $Data['duration'] > 0){
            $video = true;
            $DataArray[$Counter]['video']       = true;                                     // VIDEO GREETING DURATION

        }else{
            $video = false;
            $DataArray[$Counter]['video']       = false;

        }


        # make link

        $MODdata['id1'] = $Data['id'];

        $MODdata['name'] = $DataArray[$Counter]['username'];

        $DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);



        if($SHOW_ONLY_NETWORK ==1){

            $result1 = $DB->Row("SELECT type, adult_content, bigimage, files.approved FROM files WHERE uid='".$Data['id']."' AND type='photo' and adult_content !='yes' ORDER BY `default` DESC LIMIT 1");
            $image_url=ReturnDeImage($result1,"medium");
           // $DataArray[$Counter]['image']     = ReturnDeImage($result1,"medium");

            $result2 = $DB->Row("SELECT members_online.logid AS onlinenow  FROM members_online WHERE logid='".$Data['id']."' LIMIT 1");

            $DataArray[$Counter]['onlinenow']   = $result2['onlinenow'];    // MEMBERS ONLINE NOW

        }else{

            $DataArray[$Counter]['onlinenow']   = $Data['onlinenow'];       // MEMBERS ONLINE NOW


            if($Data['cat'] == "public" || (isset($id) && $Data['id']==$id)){
             $image_url = ReturnDeImage($Data,"medium");
                $DataArray[$Counter]['image'] = ReturnDeImage($Data,"medium");}
            else{
              $image_url = ReturnDeImage($Data,"medium");
            $DataArray[$Counter]['image'] = ReturnDeImage($Data,"medium");}
            //  $DataArray[$Counter]['image'] = DB_DOMAIN."inc/tb.php?src=".DEFAULT_IMAGE."&x=96&y=96&x=48&y=48";

        }

        /////////////////////////////////////////////////////////
        if(isset($DataArray[$Counter]['onlinenow']) && $DataArray[$Counter]['onlinenow'] !=""){

            $OnlineM = true;

        }else{

            $OnlineM = false;

        }

        if($request_type == "WHOS_ONLINE"){
            $OnlineM = true;
        }


        ## display approve buttons for friends

        if(isset($Data['networkTOUID']) && $Data['networkTOUID'] == $id ){

            $networkApprove = $Data['networkApprove'];
            $DataArray[$Counter]['networkApprove']  = $Data['networkApprove'];

        }


        $DataArray[$Counter]['TotalResults']        = $totalResults['total'];           // TOTAL SEARCH RESULTS COUNTER

        ////////////////////////////////////////////////////////////////////////////////////////////////////

        $desc = substr(eMeetingOutput(strip_tags($Data['description'])),0,120);
        if($desc == '0'){ $desc = ""; }

        if($Data['id'] != $id){
            $newDataArray[] = array(
                "TotalResults"      => $totalResults['total']/2,
                "networkApprove"    => $networkApprove,
                "onlinenow"         => $OnlineM,
                "image"             => $image_url,
                "video"             => $video,
                "icon"              => $icon_url,
                "lastlogin"         => $Data['lastlogin'],
                "age"               => MakeAgeNew($Data['age']),
                "ThisApproved"      => $Data['ThisApproved'],
                "starsign"          => getsign($Data['age']),
                "CanChat"           =>  "yes",
                "id1"               => $Data['id'],
                "name"              => $DataArray[$Counter]['username'],
                "link"              => MakeLinkMOD($MODdata),
                "mystate"           => $getline['fvCaption'],
                "country"           => MakeCountryNew($Data['country']),
                "postcode"          => $Data['postcode'],
                "username"          => $Data['username'],
                "genderID"          => $Data['gender'],
                "gender"            => MakeGenderNew($Data['gender']),
                "lastlogin"         => $Data['lastlogin'],                  // MEMBERS LAST LOGIN TIME
                "status"            => eMeetingOutput($Data['msgStatus']),
                "video_duration"    => $Data['video_duration'],                 // MEMBERS LAST LOGIN TIME
                "highlight"         => $Data['highlight'],              // MEMBERS HIGHTED OPTION
                "featured"          => $Data['featured'],                   // MEMBERS HIGHTED OPTION
                "packageid"         => $Data['packageid'],              // MEMBERS PACKAGEID
                "headline"          => eMeetingOutput($Data['headline']),
                "id"                => $Data['id'],
                "location"          => $Data['location'],
                "description"       => $desc

            );
        }
    }

    return $newDataArray;

}

?>

