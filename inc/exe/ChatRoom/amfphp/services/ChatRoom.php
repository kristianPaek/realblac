<?php

class ChatRoom {

	function ChatRoom() {

		$this->methodTable = array(
			"doRegister" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doLP" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doEnter" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doEnterIPB" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doEntervB" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doInitMessages" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doInitOnline" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doInitAuth" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doInitRooms" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doChat" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doResyncMessages" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doResyncOnline" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doResyncAuth" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doKick" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doKickIPB" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doKickvB" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doQuit" => array(
				"description" => "-",
				"access" => "remote"
			),
			"jandaba" => array(
				"description" => "-",
				"access" => "remote"
			),
			"viewRooms" => array(
				"description" => "-",
				"access" => "remote"
			),
			"getRoomID" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doEnterRoom" => array(
				"description" => "-",
				"access" => "remote"
			),
			"checkPass" => array(
				"description" => "-",
				"access" => "remote"
			),
			"doFunc" => array(
				"description" => "-",
				"access" => "remote"
			),
			"addRoom" => array(
				"description" => "-",
				"access" => "remote"
			)
		);

		//////////////////////////////////////////////
		////////////// EMEETIN VERSION 6 /////////////
		
		$subd = "../../../../../";
		require_once $subd."inc/config_db.php";
		require_once $subd."inc/classes/class_mysql.php";
		$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE);
		$DB->Connect();
		
		$config['db_port']			= '3306'; 
		$config['db_type']			= 'MySQL';
		
		$config['db_host']			= DB_HOST;
		$config['db_name']			= DB_BASE;
		$config['db_user']			= DB_USER;
		$config['db_pass']			= DB_PASS;

		define('DB_PREFIX', 'chatroom_');
		define('DB_EMAIL', '');
		define('TOPIC', 'welcome to ');
		define('DB_SET_LANG','windows-1251');

		$host = $config['db_host'] . ':' . $config['db_port'];
		$link = mysql_connect($host, $config['db_user'], $config['db_pass']);
		$db = mysql_select_db($config['db_name']);

	}
	

	function doFunc($varrr){
		return '$varrr';
	}
	
	function addRoom($name,$pass){
				// DELETE ROOMS WITH NOONE IN THEM
				$sql = "DELETE FROM " . DB_PREFIX . "rooms WHERE room_count =0";
				$result = mysql_query($sql);
				
				// ADD THE NEW ROOM
				$sql = "INSERT INTO " . DB_PREFIX . "rooms (room_id, room_name, 		room_count, room_pass) VALUES('null','$name','0','$pass')";

				$result = mysql_query($sql);
				return 'shevida';
	}
	
	// amocmebs tu akvs otaxs paroli
	function checkPass($num){
		$query = "SELECT * FROM ". DB_PREFIX ."rooms where room_id='$num'"; 
		$result = mysql_query($query);
		while ($r = mysql_fetch_array($result)) {
			return $r["room_pass"];
		}
	}
	
	
	
	
	//useris roomis fieldis shecvla
	function doEnterRoom($user, $pass, $roomID){
	
	// SELECT THE CURRENT ROOM ID
	$sql2 = "SELECT room_id FROM chatroom_onlinelist WHERE username = '$user' LIMIT 1";
	$result2 = mysql_query($sql2);
	$row_r = mysql_fetch_assoc($result2);
	
	if(isset($row_r['room_id']) && is_numeric($row_r['room_id'])){
		$sql3 = "UPDATE chatroom_rooms SET room_count=room_count-1 WHERE room_id = '".$row_r['room_id']."' LIMIT 1";
		$result3 = mysql_query($sql3);
	}
		
	$sql = "UPDATE chatroom_rooms SET room_count=room_count+1 WHERE room_id = '$roomID' LIMIT 1";
	$result = mysql_query($sql);
	
		$sql = "UPDATE " . DB_PREFIX . "onlinelist SET
			room_id = '$roomID'			
		WHERE
			username = '$user'";

		$result = mysql_query($sql);
		if($result){
		return true;
		}else{
		return false;
		}
	}
	// otaxis id-s dabruneba flash-shi
	function getRoomID($num){
		
		$query = "SELECT * FROM ". DB_PREFIX ."rooms where room_id>=1 ORDER BY room_id"; 
		$result = mysql_query($query);
		$nom = 0;
		while ($r = mysql_fetch_array($result)) {
			if($nom == $num){
				return $r["room_id"];
			}else{
				$nom++;
			}
		}
		
	}
	
	// otaxebis siis gamosatani punkcia	
	function viewRooms($name,$pass){
	
	
	//$sql = "DELETE FROM " . DB_PREFIX . "rooms WHERE room_count=0 AND room_id !=1";
	//$result = mysql_query($sql);
	
	if($name != ""){
		$sql = "INSERT INTO " . DB_PREFIX . "rooms (room_id,room_name,room_count,room_pass) VALUES('null','$name','0','$pass')";
				mysql_query("set names '".DB_SET_LANG."'");
				$result = mysql_query($sql);
	}
		$sql = "SELECT room_name FROM " . DB_PREFIX . "rooms WHERE room_id>=1 ORDER BY room_id";
		
		mysql_query("set names '".DB_SET_LANG."'");
		$result = mysql_query($sql);

		return $result;
	}
	
	function jandaba($name){
		return $name;
	}
	
	// NOT USED
	function doRegister($username, $password, $email) {	}

	// NOT USED
	function doLP($email, $password) {}

	function doEnter($username, $password) {
	
		$username_clean = $this->_escape($username);
		$password_clean = $this->_escape($password);

		$sql = "SELECT username, moderator FROM members WHERE username = '$username_clean' LIMIT 1";
		
		$result = mysql_query($sql);
		
		if(!mysql_num_rows($result)) {

			return false;

		}
		$row = mysql_fetch_assoc($result);
		
		// status change for group id
		if($row['moderator'] =="yes"){
			$status = 2;
		}else{
			$status = 1;
		}

		$sql = "SELECT username FROM " . DB_PREFIX . "onlinelist WHERE 90 < (" . time() . " - online_time)";

		$result_resync = mysql_query($sql);

		while($row = mysql_fetch_assoc($result_resync)) {
				$username_clean = $this->_escape($row['username']);
				$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('$username_clean', " . time() . ", '<i><b>$username_clean has left the room.</b></i><br>')";

				$result = mysql_query($sql);

				$sql = "DELETE FROM " . DB_PREFIX . "onlinelist WHERE username = '$username_clean'";

				$result = mysql_query($sql);

		}

		$username_clean = $this->_escape($username);

		$sql = "SELECT username FROM " . DB_PREFIX . "onlinelist WHERE username = '$username_clean'";

		$result = mysql_query($sql);

		if(mysql_num_rows($result)) {
		
				$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('$username_clean', " . time() . ", '<i><b>$username_clean has left the room.</b></i><br>')";

				$result = mysql_query($sql);

				$sql = "DELETE FROM " . DB_PREFIX . "onlinelist WHERE username = '$username_clean'";

				$result = mysql_query($sql);

		}

		$sql = "INSERT INTO " . DB_PREFIX . "onlinelist (username, online_time, status) VALUES('$username_clean', " . time() . ", $status)";

		$result = mysql_query($sql);

		$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('$username_clean', (" . time() . " + 1), '<i><b>$username_clean has entered the room.</b></i><br>')";

		$result = mysql_query($sql);

		return $username;

	}
	
	function doInitMessages($timezone_offset,$roomID) {

		$offset = date('Z', time());


		if($offset < 0) {
		
			$timezone_offset	=  $timezone_offset;
			$offset				=  -$offset;
			
		}
		
		// roomis saxelis amogeba bazidan
		$sql = "SELECT room_name FROM " . DB_PREFIX . "rooms WHERE room_id = '$roomID'";
		
		mysql_query("set names '".DB_SET_LANG."'");
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		$name = $row['room_name'];
		
		
		
		$message  = TOPIC . $name .'<br>';
		$message .= '[' . date('g:i a', time() + $offset + $timezone_offset ) . '] <b>Welcome!</b><br>';

		return $message;
		
	}

	function doInitOnline($roomID) {
	
		$sql = "SELECT username, status FROM " . DB_PREFIX . "onlinelist WHERE 90 >= (" . time() . " - online_time) and room_id = '$roomID'";

		$result = mysql_query($sql);

		return $result;
		
	}

	function doInitAuth($username) {

		$username_clean = $this->_escape($username);

		$sql = "SELECT status FROM " . DB_PREFIX . "onlinelist WHERE username = '$username_clean'";

		$result = mysql_query($sql);

		$row = mysql_fetch_assoc($result);

		return $row['status'];
		
	}

	function doInitRooms() {

		$sql = "SELECT room_name FROM " . DB_PREFIX . "rooms WHERE room_id = 1";

		$result = mysql_query($sql);

		$row = mysql_fetch_assoc($result);

		return $row['room_name'];
		
	}

	function doChat($message, $username, $message_pm_recipient, $roomID) {

		$message = preg_replace("/\[url=(\W?)(.*?)(\W?)\](.*?)\[\/url\]/", '<a href="$2" target="_blank">$4</a>', $message);
		
		// MAKE BAD WORDS
		$badwords		= array('sex',' MSN'	,'msn'	,'bugger'	,'twat'	,'cunt'	,'faceparty'	,'netlog'	,'yahoo'	,'@'	,'wanker'	,'shit'	,'fuck'	,'gmail.com'	,'yahoo.com'	,'hotmail.com');
		$message = str_replace($badwords, "***", $message);

		$username_clean			= $this->_escape($username);
		$message_clean			= $this->_escape($message);
		$message_pm_recipient	= $this->_escape($message_pm_recipient);
		$tt = array('sex');
		
		$message_real 	= '<b>' . $username_clean . '</b>' . ': ' . $message_clean;
		$message		= '<b>' . $username . '</b>' . ': ' . $message;

		$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text, message_pm_recipient,room_id) VALUES('$username_clean', " . time() . ", '$message_real', '$message_pm_recipient', '$roomID')";

		$result = mysql_query($sql);

		return $message;
		
	}

	function doResyncMessages($username, $timezone_offset, $roomID, $lastNum) {

		$username_clean = $this->_escape($username);

		$sql = "SELECT username, room_id FROM " . DB_PREFIX . "onlinelist WHERE 90 < (" . time() . " - online_time)";

		$result_resync = mysql_query($sql);

		while($row = mysql_fetch_assoc($result_resync)) {

				$sql = "DELETE FROM " . DB_PREFIX . "onlinelist WHERE username = '{$row['username']}'";

				$result = mysql_query($sql);
				
				$sql = "UPDATE chatroom_rooms SET room_count=room_count-1 WHERE room_id = '{$row['room_id']}' LIMIT 1";
				
				$result = mysql_query($sql);

				$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('{$row['username']}', " . time() . ", '<i><b>{$row['username']} has left the room.</b></i><br>')";

				$result = mysql_query($sql);	

		}
		if($lastNum == "notSet") $sql = "SELECT message_text, message_date FROM " . DB_PREFIX . "messages WHERE message_username <> '$username_clean' AND (message_pm_recipient = '$username_clean' OR message_pm_recipient = '') AND " . time() . " - message_date < 5 AND room_id = '$roomID'  ORDER BY message_date DESC";
		else $sql = "SELECT message_text, message_date FROM " . DB_PREFIX . "messages WHERE message_username <> '$username_clean' AND (message_pm_recipient = '$username_clean' OR message_pm_recipient = '') AND  message_id > $lastNum AND room_id = '$roomID'  ORDER BY message_date DESC";
		$result = mysql_query($sql);

		if(!mysql_num_rows($result)) {
		
			return 'none';
			
		}

		$offset = date('Z', time());

		if($offset < 0) {
		
			$timezone_offset	=  $timezone_offset;
			$offset				=  -$offset;
			
		}

		$messages_raw = array();

		while($row = mysql_fetch_assoc($result)) {
		
			$messages_raw[] = $row['message_text'];
			$messages_raw[] = '[' . date('g:i a', ($row['message_date']) + $offset + $timezone_offset ) . '] ';
			
		}

		$messages_reversed = array_reverse($messages_raw);
		//chemi dmatebuli 
		$sql1 = "SELECT * FROM " . DB_PREFIX . "messages ORDER BY message_id DESC LIMIT 1";
		$result1 = mysql_query($sql1);
		while($row1 = mysql_fetch_array($result1)){
				$messages = $row1['message_id'];
		}
		//$messages = $row1['message_id'];
		//$messadges = '';
		$main = "";
		for($i = 0; $i < count($messages_reversed); $i++) {
			$main .= $messages_reversed[$i];			
		}
		$return = "$messages"."$main";

		return $return;
		
	}

	function doResyncOnline($username,$roomID) {

		$username_clean = $this->_escape($username);

		$sql = "UPDATE " . DB_PREFIX . "onlinelist SET online_time = " . time() . " WHERE username = '$username_clean'";

		$result = mysql_query($sql);

		$sql = "SELECT username, status FROM " . DB_PREFIX . "onlinelist WHERE room_id='$roomID'";

		$result = mysql_query($sql);

		return $result;		

	}

	function doResyncAuth($username) {
	
		$username_clean = $this->_escape($username);
	
		$sql = "SELECT status FROM " . DB_PREFIX . "onlinelist WHERE username = '$username_clean'";

		$result = mysql_query($sql);
		
		$row = mysql_fetch_assoc($result);
		
		return $row['status'];
	
	}

	function doKick($username) {
	
		$username_clean = $this->_escape($username);
	
		$sql = "UPDATE " . DB_PREFIX . "onlinelist SET
			status = 0
		WHERE
			username = '$username_clean'";
			
		$result = mysql_query($sql);

		$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('$username_clean', " . time() . ", '<i><b>$username_clean was kicked from the room.</b></i><br>')";

		$result = mysql_query($sql);
	
	}

	function doKickIPB($username) {
	
		$username_clean = $this->_escape($username);
	
		$sql = "UPDATE " . DB_PREFIX . "onlinelist SET
			status = 5
		WHERE
			username = '$username_clean'";
			
		$result = mysql_query($sql);

		$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('$username_clean', " . time() . ", '<i><b>$username_clean was kicked from the room.</b></i><br>')";

		$result = mysql_query($sql);
	
	}

	function doKickvB($username) {
	
		$username_clean = $this->_escape($username);
	
		$sql = "UPDATE " . DB_PREFIX . "onlinelist SET
			status = 8
		WHERE
			username = '$username_clean'";
			
		$result = mysql_query($sql);

		$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('$username_clean', " . time() . ", '<i><b>$username_clean was kicked from the room.</b></i><br>')";

		$result = mysql_query($sql);
	
	}

	function doQuit($username) {
	
		$username_clean = $this->_escape($username);

		$sql = "DELETE FROM " . DB_PREFIX . "onlinelist WHERE username = '$username_clean'";

		$result = mysql_query($sql);

		$sql = "INSERT INTO " . DB_PREFIX . "messages (message_username, message_date, message_text) VALUES('$username_clean', " . time() . ", '<i><b>$username_clean has left the room.</b></i><br>')";

		$result = mysql_query($sql);	

	}

	function _escape($string) {

		return mysql_real_escape_string($string);

	}


	function _salt($size) {

		$salt = '';

		for ($i = 0; $i < $size; $i++) {

			$num = rand(33, 126);

			if ($num == '92') {

				$num = 93;

			}

			$salt .= chr($num);

		}

		return $salt;

	}

	function _mail($to, $subject, $message) {

		return ;

	}

}
?>