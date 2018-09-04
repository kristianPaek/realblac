<?php 

// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


	// **************************************************
	// * Looks into your PHP-configuration 
	// *
	// * Stops script immediately if CURL is not available
	// * Info will be used for accessing available XML-functions later also
	// **************************************************
	$arm = get_loaded_extensions(); 
		
	if(!in_array("curl",$arm)) { die("PHP-CURL is not installed or activated on your system!"); }


	// ************************************************** 
	// *
	// * Definitions only for this testscript
	// *
	// **************************************************

	// **************************************************
	// * Get the own webserver’s self URL for this testscript(s)
	// *
	// **************************************************
	// * Define protocol: check if own page is SSL-secured
	// **************************************************

	if (isset($_SERVER["HTTPS"])) {	
		if($_SERVER["HTTPS"] == "on") {
			$self_protocol = "https://";
		} else {
			$self_protocol = "http://"; 
		}
	} else {	
		$self_protocol = "http://"; 
	}

	// **************************************************
	// * Get this scripts web-address 
	// **************************************************

	$self_url_script = $self_protocol . $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; 

	// **************************************************
	// * Get this scripts web-folder by removing script’s filename 
	// * (needed for SUCCESS-/FAIL-/BACK- returnlinks below)
	// **************************************************

	$self_url_folder = substr($self_url_script, 0, strrpos($self_url_script, '/')) . "/"; 

	// **************************************************
	// *
	// * End definitions only for this testscript(s)
	// *
	// **************************************************


	// **************************************************
	// * Constant: The hosting gateway URL to create payinit URL 
	// **************************************************

	$saferpay_payinit_gateway = "https://www.saferpay.com/hosting/CreatePayInit.asp"; 


	// **************************************************
	// *
	// * Put all attributes together…
	// * for hosting: each attribute which could have non-url-conform characters inside should be urlencoded before
	// *
	// **************************************************
	// * Mandatory attributes
	// **************************************************

	$attributes = "?ACCOUNTID=" . $accountid;
	$attributes .= "&AMOUNT=" . $amount;
	$attributes .= "&CURRENCY=" . $currency;
	$attributes .= "&DESCRIPTION=" . urlencode($description);
	$attributes .= "&SUCCESSLINK=" . urlencode($successlink);
	$attributes .= "&FAILLINK=" . urlencode($faillink);
	$attributes .= "&BACKLINK=" . urlencode($backlink);
	
	// **************************************************
	// * Additional attributes
	// **************************************************

	$attributes .= "&CCCVC=yes"; // input of cardsecuritynumber mandatory
	$attributes .= "&CCNAME=yes"; // input of cardholder name mandatory
	
	// **************************************************
	// * Important (but optional) attributes
	// **************************************************

	$attributes .= "&ORDERID=" . $orderid; // input of cardsecuritynumber mandatory

	// **************************************************
	// * …and create hosting PayInit URL 
	// **************************************************

	$payinit_url = $saferpay_payinit_gateway . $attributes; 

	// **************************************************
	// *
	// * Get the Payment URL from the saferpay hosting server 
	// *
	// **************************************************
	// Initialize CURL session
	// **************************************************

	$cs = curl_init($payinit_url);

	// **************************************************
	// * Set CURL-session options
	// **************************************************

	curl_setopt($cs, CURLOPT_PORT, 443);			// set option for outgoing SSL requests via CURL
	curl_setopt($cs, CURLOPT_SSL_VERIFYPEER, false);	// ignore SSL-certificate-check - session still SSL-safe
	curl_setopt($cs, CURLOPT_HEADER, 0);			// no header in output
	curl_setopt ($cs, CURLOPT_RETURNTRANSFER, true); 	// receive returned characters

	// **************************************************
	// * Execute CURL-session
	// **************************************************

	$payment_url = curl_exec($cs);

	// **************************************************
	// * End CURL-session
	// **************************************************
	
	$ce = curl_error($cs);
	curl_close($cs); 

	// **************************************************
	// Stop if php-curl is not working
	// **************************************************

	if( strtolower( substr( $payment_url, 0, 36 ) ) != "https://www.saferpay.com/vt/pay.asp?" ) {
		$msg = "<h1>PHP-CURL is not working correctly for outgoing SSL-calls on your server</h1>\r\n";
		$msg .= "<h2><font color=\"red\">".htmlentities($payment_url)."&nbsp;</font></h2>\r\n";
		$msg .= "<h2><font color=\"red\">".htmlentities($ce)."&nbsp;</font></h2>\r\n";
		die($msg);
	}

	// **************************************************
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// * 
	// * If you reach this line, you created the URL 
	// * for the customer's browser to reach 
	// * the Saferpay-VirtualTerminal
	// * 
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// **************************************************

?>