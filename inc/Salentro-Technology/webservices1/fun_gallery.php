<?php

//-- Function to show albums
function showAlbums($id){
    global $DB;
    $DataArray = array();
    $result = $DB->Query("SELECT album.password, album.aid, album.title, album.comment, album.filecount, allow_a FROM album WHERE album.uid='".$id."' ORDER BY album.title ASC");
    while( $Data = $DB->NextRow($result) )
    {
        $result1 = $DB->Row("SELECT type, files.approved, adult_content, bigimage FROM files WHERE aid='".$Data['aid']."' AND type='photo' ORDER BY date DESC LIMIT 1");
        $DataArray[] = array(
            "aid"=> $Data['aid'],
            "title"=> eMeetingOutput($Data['title']),
            "comment" => eMeetingOutput($Data['comment']),
            "filecount" => $Data['filecount'],
            "adult" => $Data['allow_a'],
            "password" => $Data['password'],
            "image" => ReturnDeImage($result1,"medium")
        );
    }
    return $DataArray;
}

function checkAccessOfAlbum($id, $aid, $password=""){
    global $DB;

    ## check album for password
    $pass = $DB->Row("SELECT allow_f,allow_h,uid,password,cat FROM album WHERE aid='".$aid."' LIMIT 1");
    if($id == $pass['uid'] )//user own the album
    {
        return true;
    }

    if( $pass['cat'] == "public" && $pass['password']=="")
    {
        return true;
    }
    else
    {

        ## check for password
        if( $pass['password']!="" && $password == $pass['password'])
        {
            return true;
        }

        //if no password but friends
        elseif( ($pass['allow_f'] =="y" || $pass['allow_h'] =="y") && ( $pass['password']=="" ) )
        {

            // CHECK FRIENDS AND HOTLIST
            $SQL = "select row_num from
				(
					SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$id."' AND members_network.uid='".$pass['uid']."' )  AND members_network.type= ( '2' ) )
					union ALL
					SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$id."' AND members_network.uid='".$pass['uid']."' )  AND members_network.type= ( '1' ) )
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
}

/**
 * Info: Funcions used to display all files for one album
 *
 * @version  9.0
 * @created  Fri Sep 25 10:48:31 EEST 2008
 * @updated  Fri Sep 25 10:48:31 EEST 2008
 */

function showAlbumPhotos($id,$albumOwnerID, $aid, $pass, $profile=false){
    include_once("../func/globals.php");
    global $DB;

    $Counter =1; $DataArray = array(); $MODdata['type'] ='system'; $CanViewAlbum=1;

    if($id == $albumOwnerID){
        $EditString="";
    }else{
        $EditString=" AND files.approved='yes' ";
    }

    $albumAccess = checkAccessOfAlbum($id, $aid, $pass);


    $cK = $DB->Row("SELECT album.uid, album.cat, album.allow_f, album.allow_h FROM album WHERE  aid= ( '".$aid."' ) LIMIT 1");

    // CHECK IF THIS MEMBER CAN VIEW THIS ALBUM
    if($cK['cat']=="private" && $albumAccess != true ){

        // IS THIS ALBUM SECURED?
        if($cK['uid'] != $id){

            // CHECK FRIENDS AND HOTLIST

            $SQL = "select row_num from
					(
						SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$id."' AND members_network.uid='".$cK['uid']."' )  AND members_network.type= ( '2' ) )

						union ALL

						SELECT DISTINCT count(members.id) AS row_num FROM members_network, members  WHERE ( ( members.id = members_network.to_uid AND members_network.to_uid='".$id."' AND members_network.uid='".$cK['uid']."' )  AND members_network.type= ( '1' ) )

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


    $SQL = "SELECT album.cat, album.allow_f, album.allow_h, files.default, files.description, album.time, album.date, album.title AS atitle, files.adult_content,  files.approved,   files.bigimage,  files.id,  files.uid, files.aid,  files.type,  files.title,  files.views , files.rating,  files.rating_votes
	FROM files
	INNER JOIN album ON ( files.aid = album.aid )
	WHERE  files.aid= ( '".$aid."' ) AND  files.uid=( '".$albumOwnerID."' )   ".$EditString."
	ORDER BY  files.date DESC";

    $result1 = $DB->Query($SQL);

    $photos = array();
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


        $query = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members INNER JOIN members_privacy ON ( members.id = members_privacy.uid ) LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid ) LEFT JOIN members_data ON ( members.id = members_data.uid ) LEFT JOIN package ON ( members.packageid = package.pid ) WHERE ( members.id = '".$id."' OR members.email='' )";
        $privacy = $DB->Row($query);

        if($privacy['view_adult'] !="yes" && $Data['adult_content'] =="yes" && $Data['uid'] != $id && $privacy['moderator'] =='no' && ENABLE_ADULTCONTENT =="yes"){

            $link = "javascript:alert('".$GLOBALS['_LANG_ERROR']['_noAdultAccess']."')";

        }else{

            $link = MakeLinkMOD($MODdata);
        }


        $photos[] = array(
            "id" => $Data['id'],
            "aid"  => $Data['aid'],
            "uid"=>$Data['uid'],
            "atitle" =>eMeetingOutput($Data['atitle']),
            "time" =>$Data['time'],
            "date" =>dates_interconv($Data['date']),
            "bigimage" => $Data['bigimage'],
            "title" => eMeetingOutput($Data['title']),
            "description"=>eMeetingOutput($Data['description']),
            "default" => $Data['default'],
            "approved" => $Data['approved'],
            "rating" => $perc,
            "rating_image" => DisplayFileRating($perc),
            "views" => $Data['views'],
            "type" => $Data['type'],
            "comments" => $re['total'],
            "image" => ReturnDeImage($Data,"medium"),
            "rating_votes" =>$Data['rating_votes'],
            "adult" => $Data['adult_content'],
            "adult_content" => $Data['adult_content'],
            "link" => $link,
            "edit_link" => MakeLinkMOD($MODdata)

        );
        $Counter++;

    }

    return $photos;
}

function DelateUserFile($FileID){

    if( isset($FileID) && is_numeric($FileID) ){

        global $DB;

        $file = $DB->Row("SELECT bigimage, aid, type FROM files WHERE id = '".$FileID."'  LIMIT 1");

        $DB->Insert("DELETE FROM files WHERE id  = '".$FileID."' LIMIT 1");
        ///////////////////////////////////////////////////////
        ///	CHECK FILE PATHS
        //////////////////////////////////////////////////////
        if( $file['type'] == 'music'){
            @unlink(PATH_MUSIC.$file['bigimage']);

        }elseif($file['type'] =='video'){

            @unlink(PATH_VIDEO.$file['bigimage']);

        }else{
            @unlink(PATH_IMAGE.$file['bigimage']);
            @unlink(PATH_IMAGE_THUMBS.$file['bigimage']);
        }
        ///////////////////////////////////////////////////////
        ///	UPDATE ALBUM COUNT
        //////////////////////////////////////////////////////
        $DB->Update("UPDATE album SET filecount=filecount-1 WHERE aid=".$file['aid']);
        $DB->Update("DELETE FROM comments WHERE ex1_id='".$FileID."'");

        return true;

    }
    else{
        return false;
    }
}

function rotateImageWith90($FileID){
    foreach (new DirectoryIterator('../../uploads/cache') as $fileInfo) {
        if(!$fileInfo->isDot()) {
            unlink($fileInfo->getPathname());
        }
    }

    $degrees = -90; //change this to be whatever degree of rotation you want

    $filenameimg = '../../uploads/images/'.$FileID; //this is the original file
    if(file_exists($filenameimg)){
        $sourceimg = imagecreatefromjpeg($filenameimg) or notfound();
        $rotateimg = imagerotate($sourceimg,$degrees,0);
        imagejpeg($rotateimg,$filenameimg); //save the new image
        imagedestroy($sourceimg); //free up the memory
        imagedestroy($rotateimg); //free up the memory -

        $filename = '../../uploads/thumbs/'.$FileID; //this is the original file
        $source = imagecreatefromjpeg($filename) or notfound();
        $rotate = imagerotate($source,$degrees,0);
        imagejpeg($rotate,$filename); //save the new image
        imagedestroy($source); //free up the memory
        imagedestroy($rotate); //free up the memory -

        return true;
    }
    else {
        return false;
    }
}

?>