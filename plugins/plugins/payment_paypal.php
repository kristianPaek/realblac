<?php
/**
 * api: eMeeting Dating Software
 * title: Paypal Payment Plugin
 * description: This plugin will install the Paypal payment system into your website.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.Paypal.com
 * license: eMeeting 9.0
 * config:<var name="Paypal[ID]" type="text" class="t1" value="0" title="Paypal Merchant ID" description="Enter your Paypal Email" set="always" />
 * provides: paypal
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: March 15th 2009
 */


///////////////////////////////////////////////////////////////////////////////////////////
// ADMIN AREA FUNCTION
///////////////////////////////////////////////////////////////////////////////////////////
if(defined("A_LANG") && isset($_POST['setting']['Paypal%5BID%5D']) ){ // only display for admin area pages (%5D) is HTML for the bracket sign [ and ]
  
	$data = array();

	$data['Merchant_Name'] 		= "Paypal";
	$data['Merchant_Image'] 	= ""; // not used
	$data['Merchant_Method'] 	= "POST"; // POST OR GET
	$data['Merchant_Gateway'] 	= "https://www.paypal.com/cgi-bin/webscr"; // gateway URL, CURL or bank

	$data['email'] 				= $_POST['setting']['Paypal%5BID%5D'];

	PluginPaypal($data);

}

///////////////////////////////////////////////////////////////////////////////////////////
// PYMENT CALLBACK (AFTER PAYMENT IS MADE)
///////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['mc_gross'])){


			$OrderID 	= trim($_POST['custom']);
			$ORDER_PARTS = explode("**", $OrderID);
			$PackageID 	=  $ORDER_PARTS[1];
			$UserID 	=  $ORDER_PARTS[0];
			
            if ($_POST['payment_status'] == "Completed"){
                 
				// Transaction is complete. It means that the amount was paid successfully.
						
				 AddOrder($UserID, $PackageID, "PayPal", $_POST['payer_email'], $_POST['txn_id']);

            }
			elseif ($_POST['payment_status'] =="Pending"){
			
				
			
			} elseif ( ($_POST['payment_status'] == 'Reversed') || ($_POST['payment_status'] == 'Refunded') ) {
			
				// Transaction / subscription has ended, lets stop their subscription
				
				StopSubscription($_POST['txn_id']);
			
			}
			


}
///////////////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS
///////////////////////////////////////////////////////////////////////////////////////////
function PluginPaypal($data){

	global $DB;

	// CHECK THIS DOESNT ALREADY EXIST

	$Merchant = $DB->Row("SELECT id FROM merchant WHERE name='".$data['Merchant_Name']."' LIMIT 1");

	if(empty($Merchant)){
	
		$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , '".$data['Merchant_Name']."', '', 'yes', '".$data['Merchant_Gateway']."', '".$data['Merchant_Method']."', '".$data['Merchant_Image']."')");
		
		$LASTID = $DB->InsertID();
		
		// BASIC DATA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amount', '(amount)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_name', '(name)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'custom', '(custom)', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'notify_url', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cancel_return', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=cancel', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'return', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
		
		// PAYPAL EXTRA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'no_shipping', '1', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'src', '1', 'hidden')");
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cmd', '_xclick', 'hidden')");

		// CUSTOM DATA
		$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'business', '".$data['email']."', 'hidden')");


	}else{

		$DB->Update("UPDATE merchant_data SET value = '".$data['email']."' WHERE name='Paypal_id' AND mid=(".$Merchant['id'].") LIMIT 1");
		
	}

}	
?>