<?php
/**
 * api: eMeeting Dating Software
 * title: Paymo Mobile Gateway
 * description: Allows you to take payment using Paymo mobile phone billing system.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.mobilemerchantservices.com
 * license: eMeeting 9.0
 * config:
 * provides: Paymo
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 5th 2008
 * Notes: Sample Code: <div style="float:right;"><script language='JavaScript' src='http://buy.paymo.net/buybutton/8091f094008236187e0dade7/buy.js?param=<?=$_SESSION['uid']."**".$package['id'] ?>'></script></div>
 	.package_box { background: none; }
	.checkinfo p { color:black;}
	.package_name { color:black;}
*/
 
$HIDE_PAYMENT_INFO=1; // HIDE THE OTHER PAYMENT ICONS

if(isset($_GET['action']) && $_GET['action']=="billingresult"){


        if (substr($_GET['result-msg'], 0, 2) != "OK")
        {
            // The Data is NOT sent by AlertPay.
            // Take appropriate action 
        }
        else
        {
			
			######################################################################
			#################### EMEETING INTEGRATION ############################
			
			$OrderID 	= trim($_GET['param']);
			$ORDER_PARTS = explode("**", $OrderID);
			$PackageID 	=  $ORDER_PARTS[1];
			$UserID 	=  $ORDER_PARTS[0];
			
			// Transaction is complete. It means that the amount was paid successfully.
						
			AddOrder($UserID, $PackageID, "Paymo", "n/a", $_GET['trx-id']);         
        	
		}
	
	######################################################################
	#################### EMEETING INTEGRATION ############################
	// Customer info variables
    function setCustomerInfoVariables($data)
    {
        $ThisData = array();
		
		$ThisData['action'] 		= $data['action'];
        $ThisData['trx-id'] 		= $data['trx-id'];
        $ThisData['result-code'] 	= $data['result-code'];
        $ThisData['result-msg'] 	= $data['result-msg'];
        $ThisData['merchant-ref'] 	= $data['merchant-ref'];
        $ThisData['content-id'] 	= $data['content-id'];
        $ThisData['mobile-number'] 	= $data['mobile-number'];
        $ThisData['paid'] 			= $data['paid'];
        $ThisData['amount'] 		= $data['amount'];
        $ThisData['currency'] 		= $data['currency'];
        $ThisData['locale'] 		= $data['locale'];
				
		return $ThisData;
    }

	
}	
?>