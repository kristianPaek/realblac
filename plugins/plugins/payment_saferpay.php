<?php 
/**
 * api: eMeeting Dating Software
 * title: Saferpay IPN Plugin
 * description: Allows you to automatically update your membership packages when taking payment using the IPN system from Saferpay.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.saferpay.com
 * license: eMeeting 9.0
 * config:
 * provides: Saferpay
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: Oct 15th 2008
 */
if(isset($_GET['returnSaferpay']) && isset($_GET['SaferUid']) ){

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


			$OrderID 	= trim($_GET['SaferUid']);
			$ORDER_PARTS = explode("**", $OrderID);
			$PackageID 	=  $ORDER_PARTS[1];
			$UserID 	=  $ORDER_PARTS[0];
			
                 
			// Transaction is complete. It means that the amount was paid successfully.					
			AddOrder($UserID, $PackageID, "Saferpay", "email@saferpay.com", time());

}
?>