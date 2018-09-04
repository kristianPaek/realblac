<?php
include '../config.php';
include '../config_db.php';

$qry = "SELECT id,packageid,active FROM members WHERE `active`!='active'";

// "SELECT id,uid,bigimage FROM files" ;
 $userresult = $DB->Query($qry);
 while($Data=$DB->NextRow($userresult))
     {
        if($Data['packageid']==18 || $Data['packageid']==50 || $Data['packageid']==54)
        {
           $sql = "UPDATE `members` SET `active`='active' WHERE id = '".$Data['id']."' ";
           //echo $sql ; 
            $DB->Update($sql);           
        }
        else
        {  
            // No action
        }
    }
    
?>