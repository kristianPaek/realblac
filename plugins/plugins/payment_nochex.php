<?php
/**
 * api: eMeeting Dating Software
 * title: NoChex APC Plugin
 * description: Allows you to automatically update your membership packages when taking payment using the APC system from NoChex.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.nochex.com
 * license: eMeeting 9.0
 * config:
 * provides: NoChex
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 5th 2008
 */

	function http_post($server, $port, $url, $vars) {
		// get urlencoded vesion of $vars array
		$urlencoded = "";
		foreach ($vars as $Index => $Value)
		$urlencoded .= urlencode($Index ) . "=" . urlencode($Value) . "&";
		$urlencoded = substr($urlencoded,0,-1); 
	 
		$headers = "POST $url HTTP/1.0\r\n"
		. "Content-Type: application/x-www-form-urlencoded\r\n"
		. "Content-Length: ". strlen($urlencoded) . "\r\n\r\n";
	 
		$fp = fsockopen($server, $port, $errno, $errstr, 10);
		if (!$fp) return "ERROR: fsockopen failed.\r\nError no: $errno - $errstr";
	 
		fputs($fp, $headers);
		fputs($fp, $urlencoded);
	 
		$ret = "";
		while (!feof($fp)) $ret .= fgets($fp, 1024);
	 
		fclose($fp);
		return $ret;
	}



// $_POST['order_id'] = "3**8";
// $_POST['security_key'] = "1234";
// $_POST['from_email'] = "test@aol.com";
// $_POST['transaction_id'] = "4567";

if(substr($page,0,5) == "order") {

		require_once("inc/API/api_functions.php");

		$response = http_post("www.nochex.com", 80, "/nochex.dll/apc/apc", $_POST);
		 
		$debug = "IP -> " . $_SERVER['REMOTE_ADDR'] ."\r\n\r\nPOST DATA:\r\n";
		foreach($_POST as $Index => $Value) $debug .= "$Index -> $Value\r\n";
		$debug .= "\r\nRESPONSE:\r\n$response";
		 


	if(isset($_POST["security_key"])){

		if (strstr($response, "AUTHORISED")) {
		
			$OrderID 	= trim($_POST['order_id']);
			$ORDER_PARTS = explode("**", $OrderID);
			$PackageID 	=  $ORDER_PARTS[1];
			$UserID 	=  $ORDER_PARTS[0];	

		
       
			// Transaction is complete. It means that the amount was paid successfully.
						
				 AddOrder($UserID, $PackageID, "NoChex", $_POST['from_email'], $_POST['transaction_id']);

		}
			
	
	}
}	
?>