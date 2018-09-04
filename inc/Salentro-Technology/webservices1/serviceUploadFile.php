<?php

/**
 * info: File Uploader, takes the file added by the user and then uploads and saved
 * 		  the file information to the database. A thumbnail copy of the image is
 * 		 also created to speed up the website execution time.
 */
function UploadFileService($FILE, $logid,$logUserName, $title, $desc, $default_image, $type, $aid, $adult_file, $packageID){

    global $DB;

    /**
     * First things first, lets make sure the user has enough priviliages to add new files
     */

    if($logid != 0 && D_FREE =="no" && !isset($_SESSION['admin_access_level']) ){

        $sp = $DB->Row("SELECT sum(maxFiles) AS space FROM package WHERE pid=( '".$packageID."' )");
        $usedimagespace = $DB->Row("SELECT count(id) AS space FROM files WHERE uid=( '".$logid."' ) AND type=( '".$type."' )");

        if( ($usedimagespace['space'] > $sp['space']) && !isset($_SESSION['admin_access_level']) ){
            return "**"."space";
        }
    }

    /**
     * Lets validate the file and make sure all the paths are correct
     */

    if($type == 'music'){

        $CanContinue = PhotoPathsCheckService(PATH_MUSIC);
        $UploadPath = PATH_MUSIC;
        $CanContinue = MusicValidationService($FILE);
        $eType="error_musc";

    }elseif($type=='video'){

        $CanContinue = PhotoPathsCheckService(PATH_VIDEO);
        $UploadPath = PATH_VIDEO;
        $CanContinue = VideoValidationService($FILE);
        $eType="error_vdeo";

    }else{ /* Defaults to the photo type if no other type is found */

        $CanContinue = PhotoPathsCheckService(PATH_IMAGE);
        $CanContinue = PhotoPathsCheckService(PATH_IMAGE_THUMBS);
        $UploadPath = PATH_IMAGE;
        $CanContinue = PhotoValidationService($FILE);
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
            $CanContinue = PhotoThumbNailService($FILE['name'],$FILE,0, 1, $new_height);
        }

        /**
         *  Now, we must rename the file to ensure its safe and no two files are alike
         */

        $newname = RandomFileNameService();
        $img_array= explode('.', $FILE['name']);

        if(rename_win($UploadPath.$FILE['name'],$UploadPath."v9_".$newname.".".strtolower($img_array[1])) == FALSE) {

            $image_name = $FILE['name'];

        }else{

            $image_name = "v9_".$newname.".".strtolower($img_array[1]);

        }

        /**
         *  Now, lets update the database
         */

        if(APPROVE_FILES =="yes"){
            $appValue = "no";
        }else{
            $appValue = "yes";
        }

        $user=""; // USER NOW USED FOR IMAGES PROCESSED WITH MESSAGES

        ## NO ALBUM SELECTED SO WE MUST ADD ONE
        if($aid =="new"){
            $DB->Insert("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a`,password )
											VALUES (NULL , '".$logid."', '".$logUserName." Photo Album', '', '0', 'public', '1', '1', '1', '1','')");
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

        /* CREATE THUMBNAIL */
        if($type =='photo'){
            $CanContinue = PhotoThumbNailService($image_name,$FILE,$photo_id,0);

            ## ADD LOGIN TO SYSTEM LOG

            ## add system log
//AddEventSystemLog($_SESSION['username'],"comment_".$page, $page, $sub, $id1, $id2,$id3);
            AddEventSystemLogService(eMeetingInput($logUserName),"file_add", "", "", $logid, $photo_id,$image_name, 0);

        }

        /* UPDATE AS DEFAULT FILE */
        if($default_image ==1 && $type =='photo'){
            $DB->Update("UPDATE files SET `default` =0 WHERE uid= ( '".$logid."' )");
            $DB->Update("UPDATE files SET `default` =1 WHERE uid= ( '".$logid."' ) AND id= ( '".$photo_id."' ) LIMIT 1");
        }
        ## SEND ADMIN EMAIL FOR APPROVAL
        if(APPROVE_FILES == "yes"){
            include_once("../func/globals.php");
            $Data['email'] = ADMIN_EMAIL;
            $Data['custom'] = $logUserName;
            $Data['username'] = $logUserName;
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

/**
 * Info: Adds an event log to the database to follow members activities
 *
 * @version  9.0
 * @created  Fri Sep 25 , 2008
 * @updated  Fri Sep 25  , 2008
 */
function AddEventSystemLogService($username,$type, $page="", $sub="", $value1="", $value2="",$value3=""){
    global $DB;
    if($page !=""){
        $DB->Insert("INSERT INTO `system_log` (`username` , to_uid, `date` ,`time` ,`value` , value2, `ip` ,`type`,page, sub)
		VALUES ('".eMeetingInput($username)."', '".$value1."', '".DATE_NOW."', '".TIME_NOW."', '".eMeetingInput($value2)."' , '".eMeetingInput($value3)."', '".$_SERVER['REMOTE_ADDR']."', '".eMeetingInput($type)."','".$page."','".$sub."')");
    }
}

function PhotoPathsCheckService($Path){
    /* ERROR HANDELING AND VALIDATION */
    if(!is_writable($Path) || !is_writable($Path))
    {
        return "The path <p> ".$Path." </p> is not writeable. Please check that the server has access to upload files to this directory. (CHMOD 777)";
    }
    return 1;
}

function PhotoValidationService($Photo_Upload){

    $exts = array('gif' => IMAGETYPE_GIF, 'jpg' => IMAGETYPE_JPEG,  'jpeg' => IMAGETYPE_JPEG, 'png' => IMAGETYPE_PNG);
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
    /* A valid uploaded file will pass this test. */
    elseif ( ! is_uploaded_file($Photo_Upload['tmp_name']) ){
        $error =  $GLOBALS['_LANG_ERROR']['_fileE7'];;
    }
    elseif ( function_exists('exif_imagetype') && $exts[$ext] != $imagetype = exif_imagetype($Photo_Upload['tmp_name']) ){
        $error =  $GLOBALS['_LANG_ERROR']['_fileE8'];
    }
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


function PhotoThumbNailService($image_name, $photo_upload,$photo_id, $ResizeLarge, $LH=''){

    global $DB;

    require_once("../classes/class_thumbnail.php");

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

function VideoValidationService($Video_Upload){
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

function MusicValidationService($Music_Upload){

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

function RandomFileNameService($Lenght = 25) {
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

function changeMainPhoto($uid,$fid){
    global $DB;

    $DB->Update("UPDATE files SET `default` =0 WHERE uid= ( '".$uid."' )");
    $DB->Update("UPDATE files SET `default` =1 WHERE uid= ( '".$uid."' ) AND bigimage= ( '".$fid."' ) LIMIT 1");

    ## add system log
    $UsernameResult = $DB->Row("select username from members where id=".$uid);
    AddEventSystemLogService($UsernameResult['username'],"file_default", "", "", $uid, $fid, 0);
    return "Your main photo has been updated.";
}

?>