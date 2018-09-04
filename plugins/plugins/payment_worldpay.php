<?php
/**
 * api: eMeeting Dating Software
 * title: Worldpay Callback Plugin
 * description: Allows you to automatically update your membership packages when taking payment using the IPN system from PayPal.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.worldpay.com
 * license: eMeeting 9.0
 * config:<var name="Worldpay[ID]" type="text" class="t1" value="0" title="Worldpay Merchant ID" description="Enter your worldpay merchant ID" set="always" />
 * provides: Worldpay
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 5th 2008
 */


///////////////////////////////////////////////////////////////////////////////////////////
// ADMIN AREA FUNCTION
///////////////////////////////////////////////////////////////////////////////////////////
if(defined("A_LANG") && isset($_POST['setting']['Worldpay%5BID%5D']) ){ // only display for admin area pages
 
	$data = array();

	$data['Merchant_Name'] 		= "Worldpay";
	$data['Merchant_Image'] 	= "http://".$_SERVER['HTTP_HOST']."/images/payment/world_pay.gif"; // not used
	$data['Merchant_Method'] 	= "POST"; // POST OR GET
	$data['Merchant_Gateway'] 	= "https://select.worldpay.com/wcc/purchase"; // gateway URL, CURL or bank

	$data['email'] = $_POST['setting']['Worldpay%5BID%5D'];

	PluginWorldpay($data);

}

///////////////////////////////////////////////////////////////////////////////////////////
// PYMENT CALLBACK (AFTER PAYMENT IS MADE)
///////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['transStatus']) && $_POST['transStatus'] == "Y"){


			$OrderID 	= trim($_POST['cartId']);
			$ORDER_PARTS = explode("**", $OrderID);
			$PackageID 	=  $ORDER_PARTS[1];
			$UserID 	=  $ORDER_PARTS[0];
			
			$Email = $_POST['email'];
			$TransID = $_POST['transId'];
			if($_POST['testMode'] ==100){ $_POST['transId']=100;}

			if($Email==""){ $Email="email@email.com"; }			
			if($TransID ==""){ $TransID="123".date('d'); }			

			if($PackageID !="" && $UserID !="" ){ 
			 AddOrder($UserID, $PackageID, "Worldpay", $Email, $TransID);			
			}

}
///////////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS
///////////////////////////////////////////////////////////////////////////////////////////
function PluginWorldpay($data){

	global $DB;

	// CHECK THIS DOESNT ALREADY EXIST

	$Merchant = $DB->Row("SELECT id FROM merchant WHERE name='".$data['Merchant_Name']."' LIMIT 1");

	if(empty($Merchant)){
	
		$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , '".$data['Merchant_Name']."', '', 'yes', '".$data['Merchant_Gateway']."', '".$data['Merchant_Method']."', '".$data['Merchant_Image']."')");
		
		$LASTID = $DB->InsertID();
		
		// CUSTOM DATA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'instId', '".$data['email']."', 'hidden')");
		
		// BASIC DATA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amount', '(amount)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'desc', '(name)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cartId', '(custom)', 'hidden')");
	
		// WORLDPAY EXTRA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'currency', 'USD', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'testMode', '0', 'hidden')");

	}else{

		//$DB->Update("UPDATE merchant SET ins");

	}

}	
?>