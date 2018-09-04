<?php
/**
 * api: eMeeting Dating Software
 * title: AlertPay IPN Plugin
 * description: Allows you to automatically update your membership packages when taking payment using the IPN system from Alertpay.
 * type: functions
 * category: Payment Gateways
 * author: eMeeting Ltd 
 * url: http://www.alertpay.com
 * license: eMeeting 9.0
 * config:<var name="AlertPay[Code]" type="text" class="t1" value="0" title="AlertPay Security Code" description="AlertPay Security Code" set="always" />
 * provides: Alertpay
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: April 5th 2008
 */
if(isset($_POST['ap_securitycode'])){

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


        if ($_POST['ap_securitycode'] != $AlertPay[Code])
        {
            // The Data is NOT sent by AlertPay.
            // Take appropriate action 
        }
        else
        {
			
			######################################################################
			#################### EMEETING INTEGRATION ############################
			
			$OrderID 	= trim($_POST['ap_itemcode']);
			$ORDER_PARTS = explode("**", $OrderID);
			$PackageID 	=  $ORDER_PARTS[1];
			$UserID 	=  $ORDER_PARTS[0];
			
			if ($_POST['ap_test'] == "1"){
			
                // Your site is currently being integrated with AlertPay IPN for TESTING PURPOSES
                // ONLY. Don't store any information in your Production database and don't process
                // this transaction as a real order.   
				/*$string="";
				foreach($_POST as $key => $value){
				 $string .= $key." == ".$value." <br>";
				}
				$string .= "Package ID: $PackageID Member ID:".$UserID;
				mail(ADMIN_EMAIL,"Alertpay Test Mode",$string);*/
				         
            }

            if ($_POST['ap_status'] == "Success"){
                 
				// Transaction is complete. It means that the amount was paid successfully.
						
				 AddOrder($UserID, $PackageID, "AlertPay", $_POST['ap_custemailaddress'], $_POST['ap_referencenumber']);

            }
        	
		}

	
	######################################################################
	#################### EMEETING INTEGRATION ############################
	// Customer info variables
    function setCustomerInfoVariables($data)
    {
        $ThisData = array();
		
		$ThisData['FirstName'] 		= $data['ap_custfirstname'];
        $ThisData['LastName'] 		= $data['ap_custlastname'];
        $ThisData['Address'] 		= $data['ap_custaddress'];
        $ThisData['City'] 			= $data['ap_custcity'];
        $ThisData['Country'] 		= $data['ap_custcountry'];
        $ThisData['Zip'] 			= $data['ap_custzip'];
        $ThisData['EmailAddress'] 	= $data['ap_custemailaddress'];
        $ThisData['PurchaseType'] 	= $data['ap_purchasetype'];
        $ThisData['Merchant'] 		= $data['ap_merchant'];
		
		return $ThisData;
    }
	
	// Common transaction variables
    function setCommonTransactionVariables($data)
    {
		$ThisData = array();
		
        $ThisData['ItemName'] 			= $data['ap_itemname'];
        $ThisData['Description'] 		= $data['ap_description'];
        $ThisData['Quantity']			= $data['ap_quantity'];
        $ThisData['Amount'] 			= $data['ap_amount'];
        $ThisData['AdditionalCharges']	= $data['ap_additionalcharges'];
        $ThisData['ShippingCharges']	= $data['ap_shippingcharges'];
        $ThisData['TaxAmount']			= $data['ap_taxamount'];
        $ThisData['DiscountAmount']		= $data['ap_discountamount'];
        $ThisData['TotalAmount'] 		= $data['ap_totalamount'];
        $ThisData['Currency']			= $data['ap_currency'];
        $ThisData['ReferenceNumber'] 	= $data['ap_referencenumber'];
        $ThisData['Status'] 			= $data['ap_status'];
        $ThisData['ItemCode'] 			= $data['ap_itemcode'];
        $ThisData['Test'] 				= $data['ap_test'];
		
		return $ThisData;
    }
	
	// Subscription variables
    function setSubscriptionVariables()
    {
		$ThisData = array();
		
	    $ThisData['SubscriptionReferenceNumber'] 	= $data['ap_subscriptionreferencenumber'];
	    $ThisData['TimeUnit'] 						= $data['ap_timeunit'];
	    $ThisData['PeriodLength']					= $data['ap_periodlength'];
	    $ThisData['PeriodCount']					= $data['ap_periodcount'];
	    $ThisData['NextRunDate']					= $data['ap_nextrundate'];
	    $ThisData['TrialTimeUnit']					= $data['ap_trialtimeunit'];
	    $ThisData['TrialPeriodLength']				= $data['ap_trialperiodlength'];
	    $ThisData['TrialAmount']					= $data['ap_trialamount'];
		
		return $ThisData;
    }

	// Custom fields
    function setCustomFields()
    {
		$ThisData = array();
		
        $ThisData['Apc_1'] = $data['apc_1'];
        $ThisData['Apc_2'] = $data['apc_2'];
		
		return $ThisData;
    }
	
}	
?>