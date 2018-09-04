<?php

function DisplayHistory($id,$userID){
    global $DB;
    ## define variables
    $count=0; $todayDate = date("D");	$ReturnString = "";
    $arrHistory = array();
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
			INNER JOIN visited ON (visited.uid = members.id AND visited.uid != ".$userID.")
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

            if($history['cat'] != "public" && $history['id'] != $userID)
            {
                $pimage		= 	"inc/tb.php?src=nophoto.jpg&x=48&y=48&x=48&y=48";
            }
            else
            {
                $pimage = ReturnDeImage($history,"small");
            }


            $ReturnString .= '<div style="float:left; width:100px;height:70px;font-size:11px">

					<a href="index.php?dll=profile&pId='.$history['uid'].'"><img src="'.$pimage.'" align="absmiddle" width="92" height="92" alt="'.$history['date'].'"><br>

					'.$history['username'].'</a> <br>



					</div> ';


            $arrHistory[] = array("pid"=>$history['uid'], "image"=>$pimage, "date"=>$history['date'],"username"=>$history['username']);
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

    return $arrHistory;

}

//-- upload photo
function UploadFileOnServer($FILE, $logid, $title, $desc, $default_image, $type, $aid, $adult_file, $package , $userName){

    global $DB;

    /**
     * First things first, lets make sure the user has enough priviliages to add new files
     */

    if($logid != 0 && D_FREE =="no"){

        $sp = $DB->Row("SELECT sum(maxFiles) AS space FROM package WHERE pid=( '".$package."' )");
        $usedimagespace = $DB->Row("SELECT count(id) AS space FROM files WHERE uid=( '".$logid."' ) AND type=( '".$type."' )");
        // die($usedimagespace['space']." > ".$sp['space']);
        if($usedimagespace['space'] > $sp['space']){
            return "**"."space";
        }
    }

    /**
     * Lets validate the file and make sure all the paths are correct
     */

    if($type == 'music'){

        $CanContinue = PhotoPathsCheckForServer(PATH_MUSIC);
        $UploadPath = PATH_MUSIC;
        $CanContinue = MusicValidationForServer($FILE);
        $eType="error_musc";

    }elseif($type=='video'){

        $CanContinue = PhotoPathsCheckForServer(PATH_VIDEO);
        $UploadPath = PATH_VIDEO;
        $CanContinue = VideoValidationForServer($FILE);
        $eType="error_vdeo";

    }else{ /* Defaults to the photo type if no other type is found */

        $CanContinue = PhotoPathsCheckForServer(PATH_IMAGE);
        $CanContinue = PhotoPathsCheckForServer(PATH_IMAGE_THUMBS);
        $UploadPath = PATH_IMAGE;
        $CanContinue = PhotoValidationForServer($FILE);
        $sizes = @getimagesize($FILE['tmp_name']);
        $eType="error_photo";
    }

    if($CanContinue !='1'){
        return $CanContinue."**".$eType;
    }

    /**
     *  Now we have to prepare the file
     */

    $file_name = $FILE['name'];
    $file_name = stripslashes($file_name);
    $file_name = str_replace("'","",$file_name);

    /**
     * Now we save the file to our uploads folder
     */


    $copy = copy($FILE['tmp_name'], $UploadPath.$FILE['name']);

    if($copy){

        /**
         *  We like to keep tidy photos, so if the photo is too big, then lets resize it.
         */

        if($sizes[0] > 350 && $type=="photo"){

            $new_height = $sizes[1];
            $CanContinue = PhotoThumbNailForServer($FILE['name'],$FILE,0, 1, $new_height);
        }

        /**
         *  Now, we must rename the file to ensure its safe and no two files are alike
         */

        $newname = RandomFileNameForServer();
        $img_array= explode('.', $FILE['name']);

        if(rename_win($UploadPath.$FILE['name'],$UploadPath."v9_".$newname.".".strtolower($img_array[1])) == FALSE) {

            $image_name = $FILE['name'];

        }else{

            $image_name = "v9_".$newname.".".strtolower($img_array[1]);

        }

        /**
         *  Now, lets update the database
         */

        if(APPROVE_FILES =="yes"){ $appValue = "no"; }else{ $appValue = "yes";	}

        $user=""; // USER NOW USED FOR IMAGES PROCESSED WITH MESSAGES

        ## NO ALBUM SELECTED SO WE MUST ADD ONE
        if($aid =="new"){
            $DB->Insert("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a`,password )
											VALUES (NULL , '".$logid."', '".$userName." Photo Album', '', '0', 'public', '1', '1', '1', '1','')");
            $aid = $DB->InsertID();
        }

        ## PHOTO ADDED WITH A MESSAGE
        ## NEW SYSTEM ADDED APRIL 2008
        ## aid IS NOW THE MESSAGE ID
        if($aid =="none"){
            $aid=0;
            $user=$default_image;
        }

        ## INSERT VALUES INTO THE DATABASE
        $DB->Insert("INSERT INTO `files` ( `id` , aid, `user` , `uid` , `date` , `title` , `description` , `bigimage` , `width` , `height` , `filesize` , `views` , `medwidth` , `medheight` ,  `approved` , `rating` , `default` , `featured` , `type` , rating_votes, adult_content)
									VALUES (NULL , '".$aid."', '".$user."', '$logid', '".DATE_NOW."', '$title', '$desc' , '$image_name', '".$sizes[0]."' , '".$sizes[1]."' , '".filesize($UploadPath.$image_name)."', '0', '0', '0', '".$appValue."', '0.00', '0', 'no', '".$type."','0','".$adult_file."')");
        $photo_id = $DB->InsertID();

        /// Changes Made By NTT - 2014-09-22 >>
        $has_default_image = $DB->Row("SELECT COUNT(*) AS has_default_album_image FROM files WHERE `uid`='".$logid."' AND `default`=1");
        $has_default_image = $has_default_image['has_default_album_image'];

        if($has_default_image < 1) {
            $DB->Update("UPDATE files SET `default`=1 WHERE uid= ( '".$logid."' ) AND id= ( '".$photo_id."' ) LIMIT 1");
        }
        /// Changes Made By NTT - 2014-09-22 <<

        // UPDATE ALBUM FILE COUNT
        if($aid > 0){
            $DB->Update("UPDATE album SET filecount=filecount+1 WHERE aid= ( '".$aid."' ) LIMIT 1");
        }

        include_once("../func/globals.php");
        /* CREATE THUMBNAIL */
        if($type =='photo'){
            $CanContinue = PhotoThumbNailForServer($image_name,$FILE,$photo_id,0);

            ## ADD LOGIN TO SYSTEM LOG

            ## add system log
//AddEventSystemLog($_SESSION['username'],"comment_".$page, $page, $sub, $id1, $id2,$id3);
            AddEventSystemLog(eMeetingInput($userName),"file_add", "", "", $logid, $photo_id,$image_name, 0);

        }

        /* UPDATE AS DEFAULT FILE */
        if($default_image ==1 && $type =='photo'){
            $DB->Update("UPDATE files SET `default` =0 WHERE uid= ( '".$logid."' )");
            $DB->Update("UPDATE files SET `default` =1 WHERE uid= ( '".$logid."' ) AND id= ( '".$photo_id."' ) LIMIT 1");
        }
        ## SEND ADMIN EMAIL FOR APPROVAL
        if(APPROVE_FILES == "yes"){

            $Data['email'] = ADMIN_EMAIL;
            $Data['custom'] = $_SESSION['username'];
            $Data['username'] = $_SESSION['username'];
            SendTemplateMail($Data, 6);
        }

    }else{

        /**
         *  The file couldnt be copied to the uploads folder, so lets return an error message
         */

        return "**failed"; // image didnt upload
    }

    return "**complete"; // file uploaded successfully

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function PhotoThumbNailForServer($image_name, $photo_upload,$photo_id, $ResizeLarge, $LH=''){

    global $DB;

    require_once(str_replace("func","classes",dirname(__FILE__))."/class_thumbnail.php");

    $image_stats = getimagesize(PATH_IMAGE.$image_name);
    //////////////////////////////////////////////
    if($ResizeLarge == 0){

        $thumb = new eMeeting_Thumbnail(PATH_IMAGE.$image_name);
        $thumb->resize(280,280);
        $thumb->save(PATH_IMAGE_THUMBS.$image_name,100);

    }else{

        $thumb = new eMeeting_Thumbnail(PATH_IMAGE.$image_name);
        $thumb->resize(400,400);
        $thumb->save(PATH_IMAGE.$image_name,100);

    }
    $thumb->destruct();
    //////////////////////////////////////////////////
    if($ResizeLarge == 0){
        ## GET THUMNAIL IMAGE DIMENTIONS AND UPDATE THE DATABASE
        $DB->Insert("UPDATE files SET medwidth='".$image_stats[0]."', medheight='".$image_stats[1]."' WHERE id='$photo_id'");
    }
    return ;
}

function PhotoPathsCheckForServer($Path){
    /* ERROR HANDELING AND VALIDATION */
    if(!is_writable($Path) || !is_writable($Path))
    {
        return "The path <p> ".$Path." </p> is not writeable. Please check that the server has access to upload files to this directory. (CHMOD 777)";
    }
    return 1;
}

function PhotoValidationForServer($Photo_Upload){

    $exts = array('gif' => IMAGETYPE_GIF, 'jpg' => IMAGETYPE_JPEG, 'jpeg' => IMAGETYPE_JPEG, 'png' => IMAGETYPE_PNG);
    $uptypes=array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/x-png', 'image/gif');

    // Start Validation
    if ( isset($Photo_Upload['error']) && $Photo_Upload['error'] > 0 ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE1'];
    }


    /* image sizes */
    if (!$temp = @getimagesize($Photo_Upload['tmp_name'])) {
        $error = $GLOBALS['_LANG_ERROR']['_fileE2'];
    }
    /*  A non-empty file will pass this test. */
    elseif ( $Photo_Upload['size'] ==0 ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE3'];
    }
    /* A correct MIME category will pass this test. Full types are not consistent across browsers. */
    elseif ( ! 'image/' == substr($Photo_Upload['type'], 0, 6) ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE4'];
    }
    /* An acceptable file extension will pass this test. */
    elseif ( ! ( ( 0 !== preg_match('#\.?([^\.]*)$#', $Photo_Upload['name'], $matches) ) && ( $ext = strtolower($matches[1]) ) && array_key_exists($ext, $exts) ) ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE5'];
    }
    /* Extra Image type validation */
    elseif(!in_array($Photo_Upload['type'], $uptypes)){

        $error = str_replace("%s",$Photo_Upload['type'],$GLOBALS['_LANG_ERROR']['_fileE6']);
    }

    /* A valid uploaded file will pass this test.
    elseif ( ! is_uploaded_file($Photo_Upload['tmp_name']) ){
            $error =  $GLOBALS['_LANG_ERROR']['_fileE7'];;
    }
    elseif ( function_exists('exif_imagetype') && $exts[$ext] != $imagetype = exif_imagetype($Photo_Upload['tmp_name']) ){
            $error =  $GLOBALS['_LANG_ERROR']['_fileE8'];
    }	 */
    /* An image with at least one pixel will pass this test. */
    elseif ( ! ( ( $imagesize = getimagesize($Photo_Upload['tmp_name']) ) && $imagesize[0] > 1 && $imagesize[1] > 1 ) ){
        $error =  $GLOBALS['_LANG_ERROR']['_fileE9'];
    }
    else{
        $error ='1';
    }

    $periodcount=substr_count($Photo_Upload['name'],".");
    if ($periodcount > 1) {
        $error = $GLOBALS['_LANG_ERROR']['_fileE5'];
    }

    return $error;
}

function VideoValidationForServer($Video_Upload){
//die(print_r($Video_Upload));
    $uptype=array('mpeg','mpg','mpe','qt','mov','mxu','avi', 'movie','divx','3gp');
    $uptypes=array('video/mpeg', 'video/quicktime', 'video/vnd.mpegurl', 'video/x-msvideo', 'video/x-sgi-movie', 'video/avi','video/mpeg','video/mpg','video/x-ms-wmv','video/3gpp');

    // Start Validation
    if ( $Video_Upload['error'] > 0 ){

        $error = $GLOBALS['_LANG_ERROR']['_fileE1'];
        /*  A non-empty file will pass this test. */
    }elseif ( $Video_Upload['size'] == 0 || $Video_Upload['size']  == ""){
        $error = $GLOBALS['_LANG_ERROR']['_fileE3'];
    }
    /* Extra Image type validation */
    /*	elseif(!in_array($Video_Upload['type'], $uptypes)){
             $error =str_replace("%s",$Photo_Upload['type'],$GLOBALS['_LANG_ERROR']['_fileE6']);
        }
    */
    elseif ( ! is_uploaded_file($Video_Upload['tmp_name']) ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE3'];
    }
    else{
        $error = "1";
    }
    return $error;
}

function MusicValidationForServer($Music_Upload){

    $check_type = "mp3|mpeg|mid|mp4";
    $uptypes=array('audio/mpeg','audio/mid', 'audio/mp3', 'audio/x-mp3');
    // Start Validation
    if ( $Music_Upload['error'] > 0 ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE1'];
    }
    /*  music files cannot be less than 100 KB. */
    elseif ( $Music_Upload['size']  < 100000){
        $error = $GLOBALS['_LANG_ERROR']['_fileE8'];
    }
    /*  A non-empty file will pass this test. */
    elseif ( $Music_Upload['size']  == 0 || $Music_Upload['size']  == ""){
        $error = $GLOBALS['_LANG_ERROR']['_fileE8'];
    }
    /* Extra Image type validation */
    /*	elseif(!in_array($Music_Upload['type'], $uptypes)){

             $error = str_replace("%s",$Photo_Upload['type'],$GLOBALS['_LANG_ERROR']['_fileE6']);

        }
    */
    /* An acceptable file extension will pass this test. */
    elseif(!preg_match("/\.($check_type)$/i",$Music_Upload['name'])){

        $error="File type error : Not a valid file";

    }
    elseif ( ! is_uploaded_file($Music_Upload['tmp_name']) ){
        $error = $GLOBALS['_LANG_ERROR']['_fileE3'];
    }
    else{
        return 1;
    }
    return $error;
}

function RandomFileNameForServer($Lenght = 25) {
    $name="";
    $salt = "abchefghjkmnpqrstuvwxyz0123456789ABCDEFGH1JKLMNOPQRSTUVWXYZ";
    srand((double)microtime()*1000000);
    $i = 0;
    while ($i <= $Lenght) {
        $num = rand() % 33;
        $tmp = substr($salt, $num, 1);
        $name = $name . $tmp;
        $i++;
    }

    return $name.gmdate("Ymd");;
}

function checkAlbumAccessForUser($aid, $userID, $password){
    global $DB;

    ## check album for password
    $pass = $DB->Row("SELECT allow_f,allow_h,uid,password,cat FROM album WHERE aid='".$aid."' LIMIT 1");

    if($userID != '' && $userID == $pass['uid'] )//user own the album
    {

        return true;
    }
    if( $pass['cat'] == "public" && $pass['password']=="")
    {
        ## no password found
        //$_SESSION['eMeetingAlbum'.$aid] = true;
         return true;
    }
    else
    {

        ## check for password
        if( $pass['password']!="" && $password == $pass['password'])
        {
            ## password is right
            //$_SESSION['eMeetingAlbum'.$aid] = true;
            return true;
        }

        //if no password but friends
        elseif( ($pass['allow_f'] =="y" || $pass['allow_h'] =="y") && ( $pass['password']=="" ) )
        {

            // CHECK FRIENDS AND HOTLIST
            $SQL = "select row_num from
				(
					SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$userID."' AND members_network.uid='".$pass['uid']."' )  AND members_network.type= ( '2' ) )
					union ALL
					SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$userID."' AND members_network.uid='".$pass['uid']."' )  AND members_network.type= ( '1' ) )
				) as derived_table";

            $CheckThis = $DB->Query($SQL);
            ## loop data from query
            $Counter = 1;
            while( $DataArray = $DB->NextRow($CheckThis) ){

                $CheckData[$Counter]['total'] = number_format($DataArray['row_num']);
                $Counter++;
            }

            if( $CheckData[1]['total'] > 0 || $CheckData[2]['total'] > 0 )
            {
                return true;
            }
        }


    }
    return false;
}

/**
 * Info: Funcions used to display all files for one album
 *
 * @version  9.0
 * @created  Fri Sep 25 10:48:31 EEST 2008
 * @updated  Fri Sep 25 10:48:31 EEST 2008
 */

function DisplayGalleryForUser($logInUserID, $password ,$otherUserID, $aid, $profile=false){

    global $DB;

    $Counter =1; $DataArray = array(); $MODdata['type'] ='system'; $CanViewAlbum=1;

    if($logInUserID == $otherUserID){
        $EditString="";
    }else{
        $EditString=" AND files.approved='yes' ";
    }

    $cK = $DB->Row("SELECT album.uid, album.cat, album.allow_f, album.allow_h FROM album WHERE  aid= ( '".$aid."' ) LIMIT 1");

    // CHECK IF THIS MEMBER CAN VIEW THIS ALBUM
    $albumAccess = checkAlbumAccessForUser($aid, $logInUserID, $password);

    if($cK['cat']=="private" && ($albumAccess != true )){

        // IS THIS ALBUM SECURED?
        if($cK['uid'] != $logInUserID){

            // CHECK FRIENDS AND HOTLIST

            $SQL = "select row_num from
					(
						SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$logInUserID."' AND members_network.uid='".$cK['uid']."' )  AND members_network.type= ( '2' ) )

						union ALL

						SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$logInUserID."' AND members_network.uid='".$cK['uid']."' )  AND members_network.type= ( '1' ) )

					) as derived_table";



            $CheckThis = $DB->Query($SQL);
            $checkdone=1;
            ## loop data from query
            while( $DataArray = $DB->NextRow($CheckThis) ){

                $CheckData[$Counter]['total'] = number_format($DataArray['row_num']);
                $Counter++;
            }
        }

        // CHECK VALUE
        if(isset($checkdone))
        {
            if( ($cK['allow_f'] =="y" && $CheckData[1]['total'] == 0) && ($cK['allow_h'] =="y" && $CheckData[2]['total'] == 0) )
            {
                // cannot view
                $CanViewAlbum=0;
                return $DataArray;
            }
        }
    }
    $Counter = 0;


    include_once('../func/globals.php');

    $SQL = "SELECT album.cat, album.allow_f, album.allow_h, files.default, files.description, album.time, album.date, album.title AS atitle, files.adult_content,  files.approved,   files.bigimage,  files.id,  files.uid, files.aid,  files.type,  files.title,  files.views , files.rating,  files.rating_votes
	FROM files
	INNER JOIN album ON ( files.aid = album.aid )
	WHERE  files.aid= ( '".$aid."' ) AND  files.uid=( '".$logInUserID."' )   ".$EditString."
	ORDER BY  files.date DESC";

    $result1 = $DB->Query($SQL);

    while( $Data = $DB->NextRow($result1) )
    {


        // GET THE NUMBER OF COMMENTS LEFT FOR THIS IMAGE
        $re = $DB->Row("SELECT count(id) AS total FROM comments WHERE ex1_id = ( '".$Data['id']."' )");

        //////////////////////////////////////////////////////////////
        if($Data['rating_votes'] !=0 && $Data['rating'] !=0){
            $avg = round($Data['rating']/$Data['rating_votes'],2);
            $perc = round( (100/5)*$avg);
        }else{
            $perc=0;
        }

        //////////////////////////////////////////////////////////////
        $DataArray[$Counter]['id'] 			= $Data['id'];
        $DataArray[$Counter]['aid'] 		= $Data['aid'];
        $DataArray[$Counter]['uid'] 		= $Data['uid'];
        $DataArray[$Counter]['atitle'] 		= eMeetingOutput($Data['atitle']);
        $DataArray[$Counter]['time'] 		= $Data['time'];
        $DataArray[$Counter]['date'] 		= dates_interconv($Data['date']);
        $DataArray[$Counter]['bigimage'] 		= $Data['bigimage'];
        $DataArray[$Counter]['title'] 		= eMeetingOutput($Data['title']);
        $DataArray[$Counter]['description'] 		= eMeetingOutput($Data['description']);
        $DataArray[$Counter]['default']		= $Data['default'];
        $DataArray[$Counter]['approved']	= $Data['approved'];
        $DataArray[$Counter]['rating']		= $perc;
        $DataArray[$Counter]['rating_image']= DisplayFileRating($perc);
        $DataArray[$Counter]['views'] 		= $Data['views'];
        $DataArray[$Counter]['type'] 		= $Data['type'];
        $DataArray[$Counter]['comments'] 	= $re['total'];
        $DataArray[$Counter]['image'] 		= ReturnDeImage($Data,"medium");
        $DataArray[$Counter]['rating_votes']= $Data['rating_votes'];
        $DataArray[$Counter]['adult']		= $Data['adult_content'];
        $DataArray[$Counter]['adult_content']		= $Data['adult_content'];

        # make link
        if($profile){
            $MODdata['page'] ='profile'; $MODdata['sub'] ='viewfile';
        }else{
            $MODdata['page'] ='classads'; $MODdata['sub'] ='manage';
        }

        $MODdata['id1'] = $Data['uid'];
        $MODdata['id2'] = $Data['aid'];
        $MODdata['id3'] = $Data['id'];
        $MODdata['name'] = $DataArray[$Counter]['title'];

        $sql_query = "SELECT * FROM members LEFT JOIN package ON ( members.packageid = package.pid ) WHERE members.id = ".$logInUserID;
        $result_privacy = $DB->Row($sql_query);

        if($result_privacy['view_adult'] !="yes" && $Data['adult_content'] =="yes" && $Data['uid'] != $logInUserID && $result_privacy['moderator'] =='no' && ENABLE_ADULTCONTENT =="yes"){

            $DataArray[$Counter]['link'] = "javascript:alert('".$GLOBALS['_LANG_ERROR']['_noAdultAccess']."')";

        }else{

            $DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);
        }

        $MODdata['page'] ='gallery';
        $MODdata['sub'] ='edit';
        $MODdata['id1'] = $Data['uid'];
        $MODdata['id2'] = $Data['aid'];
        $MODdata['id3'] = $Data['id'];
        $MODdata['name'] = $DataArray[$Counter]['title'];
        $DataArray[$Counter]['edit_link'] = MakeLinkMOD($MODdata);



        $Counter++;

    }

    return $DataArray;
}

?>