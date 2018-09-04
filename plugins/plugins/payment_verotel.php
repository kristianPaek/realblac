<?php
/**
 * api: eMeeting Dating Software
 * title: Verotel Payment Plugin
 * description: This plugin will install the Verotel payment system into your website.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.verotel.com
 * license: eMeeting 9.0
 * config:<var name="Verotel[ID]" type="text" class="t1" value="0" title="Verotel Merchant ID" description="Enter your Verotel merchant ID" set="always" /><var name="Verotel[website]" type="text" class="t1" value="0" title="Verotel Website ID" description="Enter your Verotel Website ID (Not your website url, it is a numerical number provided by verotel)" set="always" />
 * provides: Verotel
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: March 15th 2009
 */


///////////////////////////////////////////////////////////////////////////////////////////
// ADMIN AREA FUNCTION
///////////////////////////////////////////////////////////////////////////////////////////
if(defined("A_LANG") && isset($_POST['setting']['Verotel%5BID%5D']) ){ // only display for admin area pages (%5D) is HTML for the bracket sign [ and ]
  
	$data = array();

	$data['Merchant_Name'] 		= "Verotel";
	$data['Merchant_Image'] 	= "http://".$_SERVER['HTTP_HOST']."/images/payment/verotel_pay.gif"; // not used
	$data['Merchant_Method'] 	= "POST"; // POST OR GET
	$data['Merchant_Gateway'] 	= "https://secure.verotel.com/cgi-bin/vtjp.pl"; // gateway URL, CURL or bank

	$data['email'] 				= $_POST['setting']['Verotel%5BID%5D'];
	$data['website'] 			= $_POST['setting']['Verotel%5Bwebsite%5D'];

	PluginVerotel($data);

}

///////////////////////////////////////////////////////////////////////////////////////////
// PYMENT CALLBACK (AFTER PAYMENT IS MADE)
///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS
///////////////////////////////////////////////////////////////////////////////////////////
function PluginVerotel($data){

	global $DB;

	// CHECK THIS DOESNT ALREADY EXIST

	$Merchant = $DB->Row("SELECT id FROM merchant WHERE name='".$data['Merchant_Name']."' LIMIT 1");

	if(empty($Merchant)){
	
		$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , '".$data['Merchant_Name']."', '', 'yes', '".$data['Merchant_Gateway']."', '".$data['Merchant_Method']."', '".$data['Merchant_Image']."')");
		
		$LASTID = $DB->InsertID();
		
		// CUSTOM DATA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'verotel_id', '".$data['email']."', 'hidden')");
		
		// BASIC DATA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amount', '(amount)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'desc', '(name)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'verotel_custom1', '(custom)', 'hidden')");

		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'verotel_website', '".$data['website']."', 'hidden')");

	}else{

		$DB->Update("UPDATE merchant_data SET value = '".$data['email']."' WHERE name='verotel_id' AND mid=(".$Merchant['id'].") LIMIT 1");

		$DB->Update("UPDATE merchant_data SET value = '".$data['website']."' WHERE name='verotel_website' AND mid=(".$Merchant['id'].") LIMIT 1"); 

	}

}	
?>