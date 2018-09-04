<?php


include '../config.php';
include '../config_db.php';

$qry = "SELECT members.id, files.id AS FileID,files.type,files.bigimage FROM members LEFT JOIN files ON ( files.uid = members.id AND files.default=1 AND files.type='photo')";

// "SELECT id,uid,bigimage FROM files" ;
 $userresult = $DB->Query($qry);
 
 while($Data=$DB->NextRow($userresult))
     {
        $filename = WEB_PATH_IMAGE.$Data['bigimage'];
        if(@getimagesize($filename))
        {
           // echo  'Image Found : '.$filename;            
        }
        else
        {  
            // Update Image
            $userID = $Data['id'];
            $FileID = $Data['FileID'] ;
            //echo 'NO Image : '.$Data['id'].' <img src="'.$filename.'">'.'<br>'  ; 
            
            // Fetch all images of User
            $qrys = "SELECT id, default, bigimage FROM `files` WHERE uid = ( '".$userID."' ) ";
            $userresults = $DB->Query("SELECT `id`,`default`,`bigimage` FROM `files` WHERE uid='".$userID."'");
            
            while($Row = $DB->NextRow($userresults))
            {
                // if File id  == File ID and default
                //&& @getimagesize($filePath)
                // Userimage Path
                $filePath = WEB_PATH_IMAGE.$Row['bigimage'];
                
                // if user image is not default and file exist 
                if($FileID == $Row['id'] && @getimagesize($filePath))
                {
                   $ssql = "UPDATE `files` SET `default`='1' WHERE id = '".$Row['id']."' ";
                   $DB->Update($ssql);
                   break;
                }
                elseif($FileID != $Row['id'] && @getimagesize($filePath))
                {
                   $sql = "UPDATE `files` SET `default`='1' WHERE id = '".$Row['id']."'";
                   
                   $DB->Update($sql);
                   
                   // Update the previous image default = 0 
                   $sqls = "UPDATE `files` SET `default`='0' WHERE id = '".$FileID."'";
                   $DB->Update($sqls);                   
                   break;
                }
                else 
                    {
                    break;
                    }
            }
            
        }
    }
    
?>