<?php
	// DO NOT MODIFY THIS FILE

	function up_presence($presence_id, $password, $user_id, $url, $notify, $cmdURL)
	{
		$encr_user_id = up_getEncrypted($password, $user_id);
		if($encr_user_id == "")
		{
		  	return false;
		}

		if ( strcmp($notify, "true") != 0 )
			$notify = "false";

		$rData = "\n\n<script src=\"http://cache.static.userplane.com/presence/f.js\" language=\"javascript\" type=\"text/javascript\"></script>\n";
		$rData .= "<script language=\"javascript\" type=\"text/javascript\">\n";
		$rData .= "<!--\n";
		$rData .= "\tup_wmURL = '$url';\n";
		$rData .= "\tup_cmdURL = '$cmdURL';\n";
		$rData .= "\tup_alwaysNotify = $notify;\n";
		//$rData .= "\tup_runPresence(%s, '%s');\n", $presence_id, $encr_user_id;
		$rData .="\tup_runPresence('".$presence_id."', '".$encr_user_id."');\n";
		$rData .= "//-->\n";
		$rData .= "</script>\n\n";

		return $rData;
 
	}
	// USED TO ECRYPT USER ID
	function up_getEncrypted($password, $user_id)
	{
		srand();

		$td = mcrypt_module_open('rijndael-128', '', 'cbc', '');
		$keylen = mcrypt_enc_get_key_size($td);
		$key = substr($password, 0, $keylen);
		$key = str_pad($key, $keylen);
		$iv_size = mcrypt_enc_get_iv_size($td);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		if (mcrypt_generic_init($td, $key, $iv) != -1)
		{
			$pad = 16 - strlen($user_id);
			$mypadded = $user_id . str_repeat(chr($pad), $pad);
			$c_t = mcrypt_generic($td, pack('H*', md5($user_id)).$user_id);
			mcrypt_generic_deinit($td);
			$result = base64_encode($iv.$c_t);
			return $result;
		}
		else
		{
		  	return "";
		}
	}
	// USED TO DECRYPT ENCRYPTED USER ID
	function up_getDecrypted($password, $encrypted)
	{
	 	$base46str = base64_decode($encrypted);
		$td = mcrypt_module_open('rijndael-128', '', 'cbc', '');
		$keylen = mcrypt_enc_get_key_size($td);
		$key = substr($password, 0, $keylen);
		$key = str_pad($key, $keylen);
		$iv_size = mcrypt_enc_get_iv_size($td);
		$iv = substr($base46str, 0, $iv_size);
		$encrypted = substr($base46str, $iv_size);
		if (strlen($iv) != $iv_size)
		{
			return "";
		}
		if (mcrypt_generic_init($td, $key, $iv) != -1)
		{
			$u_t = mdecrypt_generic($td, $encrypted);
		 	$md5 = substr($u_t, 0, 16);
		 	$decrypted = substr($u_t, 16);
			$pad = substr($decrypted, -1);
			$result = trim($decrypted, $pad);
			mcrypt_generic_deinit($td);
			return $result;
		}
		else
		{
		  	return "";
		}
	}

function GetUserplaneRooms(){

	global $DB;

	$result = $DB->Query("SELECT * FROM chatroom_rooms");

    while( $room = $DB->NextRow($result) )
    {
		$room['room_name'] = str_replace("&","&amp;",$room['room_name']);
		echo "<room><name>".$room['room_name']."</name><description></description></room>";
	}
}
function GetUserplaneIMData($id){
	
	global $DB;	  
	//return;
	$result = $DB->Row("SELECT 
	members_data.location AS location, 
	members_data.country AS country, 
	members_data.gender, 
	members_data.age, 
	members.username AS username, 
	members.moderator,
	package.icon,
	package.name AS name,
	files.bigimage,
	files.type,
	files.approved
	FROM members	
	INNER JOIN members_data ON ( members.id = members_data.uid ) 
	LEFT JOIN files ON ( files.uid = members_data.uid ) 
	LEFT JOIN members_privacy ON ( members_privacy.uid = members_data.uid )
	LEFT JOIN package ON ( package.pid = members.packageid )
	LEFT JOIN members_online ON ( members_online.logid = members_data.uid )
	WHERE members.id = ( '".strip_tags($id)."' ) ORDER BY files.default DESC LIMIT 1");

	// FILE DETAILS ARRAY
	if($result['type'] =="photo"){
			$UImage = WEB_PATH_IMAGE_THUMBS.$result['bigimage']; 										
	}elseif($result['type'] =="music"){				
			$UImage = DEFAULT_MUSIC;									
	}elseif($result['type'] =="video"){				
			$UImage = DEFAULT_VIDEO;		
	}else{
			$UImage = DEFAULT_IMAGE;
	}
	// if not approved
	if($result['approved'] =="no"){
			$UImage = WATINGAPPROVAL_IMAGE;
	}

	//////////////////////////////////////////////
	//////////////////////////////////////////////	 
	$data['username'] 		= $result['username'];	
	$data['package'] 		= $result['name'];
	$data['country'] 		= $result['country'];
	$data['location'] 		= $result['location'];

	if($result['moderator'] == 'yes') {
		$data['admin'] = 'true';
	}
	else {
		$data['admin'] = 'false';
	}
		
	$data['big_image'] 		= $UImage;		
	$data['thumbs_image'] 	= $UImage;	
	return $data;
}
function GetUserplaneBlockedList($id){

	global $DB;

	$result = $DB->Query("SELECT id, uid, to_uid, comments, approved FROM members_network WHERE uid=".$id." AND type=3");

    while( $room = $DB->NextRow($result) )
    {
		echo "<userid>".$album['to_uid']."</userid>";
	}

}

function GetUserplaneBuddyList($id){

	global $DB;

	$result = $DB->Query("SELECT id, uid, to_uid, comments, approved FROM members_network WHERE uid=".strip_tags($id)." AND type=2");

    while( $room = $DB->NextRow($result) )
    {
		echo( "<user>" );
		
			echo( "<userid>22222</userid>" );
				echo( "<displayname>joeschmoe</displayname>" );
				
			echo( "<images>" );
				echo( "<icon>http://images.yourcompany.userplane.com/pathToIcon.jpg</icon>" );
				echo( "<thumbnail>http://images.yourcompany.userplane.com/pathToThumbnail.jpg</thumbnail>" );
			echo( "</images>" );
				
			echo( "</user>" );
	}
}
?>