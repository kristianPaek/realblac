<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


/**
* Info: Funcions used by the extra forums / phpbb and vbull
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

	function verify_md5(&$md5)
	{
		return (preg_match('#^[a-f0-9]{32}$#', $md5) ? true : false);
	}
	
	function verify_password($password)
	{
		$salt = fetch_user_salt();
		$salt="Kxn";
		// generate the password
		$password = hash_password($password, $salt);
		
		return $password;
	}
	
	function hash_password($password, $salt)
	{
		// if the password is not already an md5, md5 it now
		if ($password == '')
		{
		}
		else if (!verify_md5($password))
		{
			$password = md5($password);
		}

		// hash the md5'd password with the salt
		return md5($password . $salt);
	}
	
	function fetch_user_salt($length = 3)
	{
		$salt = '';
		for ($i = 0; $i < $length; $i++)
		{
			$salt .= chr(rand(32, 126));
		}
		return $salt;
	}
	
?>