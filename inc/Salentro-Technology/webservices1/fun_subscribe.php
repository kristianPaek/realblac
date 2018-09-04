<?php

function checkUserExpire($id){
    global $DB;
    $query = "SELECT members.activate_code, members_template.header_background AS background, members_template.header_text AS color_text, members_data.gender AS genderD, package.view_adult, package.name, package.wink, package.Highlighted, package.Featured, package.maxMessage, members.moderator, package.maxFiles, members.active, members.id, members.activate_code, members.username, members.packageid, members.lastlogin, members_privacy.Language FROM members INNER JOIN members_privacy ON ( members.id = members_privacy.uid ) LEFT JOIN members_template ON ( members_template.uid = members_privacy.uid ) LEFT JOIN members_data ON ( members.id = members_data.uid ) LEFT JOIN package ON ( members.packageid = package.pid ) WHERE ( members.id = '".$id."' OR members.email='' )";
    $privacy = $DB->Row($query);
}

?>