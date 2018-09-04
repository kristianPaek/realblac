<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
function updateInformation($user_id,$email,$email_msg,$email_winks) {
    global $DB;
    $DB->Update("UPDATE members SET email='".$email."' WHERE id= ( '".$user_id."' ) LIMIT 1");
    $DB->Update("UPDATE `members_privacy` SET  `email_winks` = '".$email_winks."', `email_msg` = '".$email_msg."' WHERE `uid` = ".$user_id." LIMIT 1");
    return "Your settings have been updated.";
}

function updatePassword($user_id,$cpassword,$npassword) {
    global $DB;
    $pw = $DB->Row("SELECT password FROM members WHERE id= ( '".$user_id."' ) LIMIT 1");
define('OW_PASSWORD_SALT', '4f94930cd4ff3');
    $myhash = hash('sha256', OW_PASSWORD_SALT . $cpassword);
    $myhash_new = hash('sha256', OW_PASSWORD_SALT . $npassword);
     if(isset($_GET['t']) && $_GET['t']==1){

         echo"<pre>";
         print_r($pw);
         echo $cpassword." current=>".$cpassword."<br>";
         echo $npassword." current_new=>".$npassword."<br>";
         echo $cpassword." current=>".$myhash."<br>";
         echo $npassword." current_new=>".$myhash_new."<br>";
         echo"<pre>";

     }
    if( ( D_MD5 ==1 && $myhash == $pw['password']) || ( $cpassword == $pw['password'] ) ) {



        if(D_MD5 ==1) {

            $passcode = hash('sha256', OW_PASSWORD_SALT . $npassword);

        }else {

            $passcode = $npassword;

        }



        $DB->Update("UPDATE members SET password='".$passcode."' WHERE id= ( '".$user_id."' ) LIMIT 1");





        /* FORUM INTEGRATION CODE */



        if(FORUM_PHPBB_ENABLED =="yes") {



            global $db, $cache, $config, $user, $auth;



            $DB->Update("UPDATE ".FORUM_PHPBB_DATABASE.".".USERS_TABLE." SET user_password='".phpbb_hash($npassword)."' WHERE user_id = ( '".$user_id."' ) LIMIT 1");



        }elseif(FORUM_VB_ENABLED=="yes") {


            $DB->Update("UPDATE ".FORUM_VB_DATABASE.".`user` SET password='".verify_password($npassword)."' WHERE userid = ( '".$user_id."' ) LIMIT 1");
            


        }

        /* END FORUM INTEGRATION */



        return "Password Updated";



    }else {



        return "Password Not Updated";



    }
}
?>
