<?
// no direct access
defined( 'KEY_ID' ) or die( 'Restricted access' );


function Saferpay($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , 'Saferpay', '', 'yes', 'CURL', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/moneybookers.gif')");
	
	$LASTID = $DB->InsertID();

	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'account_id', '".$data['email9']."', 'hidden')");

}

function Bank($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , 'Bank / Wire Transfer', '', 'yes', 'bank', 'POST', '')");
	
	$LASTID = $DB->InsertID();

	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'Beneficiary', '".$data['b1']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'Bank Name', '".$data['b2']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'SWIFT Addr', '".$data['b3']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'BLZ', '".$data['b4']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'IBAN Number', '".$data['b5']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'Account Number', '".$data['b6']."', 'hidden')");

}

function AddMoneyBookers($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , 'MoneyBookers', '', 'yes', 'https://www.moneybookers.com/app/payment.pl', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/moneybookers.gif')");
	
	$LASTID = $DB->InsertID();

	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'pay_to_email', '".$data['email9']."', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amount', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'recipient_description', '(name)', 'hidden')");
	
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'notify_url', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cancel_url', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=cancel', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'return_url', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'currency', 'USD', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'language', 'EN', 'hidden')");
	
	## CUSTOM FIELD	
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'merchant_fields', 'custom', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'custom', '(custom)', 'hidden')");
	
	## PRODUCT FIELDS
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'detail1_description', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'detail1_text', '(custom)', 'hidden')");

}

function AddCCBill($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , 'CCBill', '', 'yes', 'https://bill.ccbill.com/jpost/signup.cgi', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/ccbill.gif')");
	
	$LASTID = $DB->InsertID();

	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'clientAccnum', '".$data['accNo']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'clientSubacc', '".$data['subNo']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'formName', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'custom', '(custom)', 'hidden')");

}

function AddGoogleCheckout($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon) VALUES (NULL , 'GoogleCheckout', '', 'yes', 'https://checkout.google.com/api/checkout/v2/checkoutForm/Merchant/".$data['email13']."', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/google.gif')");
	
	$LASTID = $DB->InsertID();


	## CUSTOM FIELD		
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_selection_1', '1', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amount', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_option_name_1', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_option_description_1', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_option_quantity_1', '1', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_option_price_1', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_option_currency_1', 'USD', 'hidden')");
	
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', '_charset_', 'utf-8', 'hidden')");

}

function AddPayPal($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , 'PayPal', '', 'yes', 'https://www.paypal.com/cgi-bin/webscr', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/paypal.gif')");
	
	$LASTID = $DB->InsertID();
	
	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'business', '".$data['email']."', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amount', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'item_name', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'custom', '(custom)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'notify_url', '".DB_DOMAIN."index.php?dll=order&sub=thankyou', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cancel_return', '".DB_DOMAIN."index.php?dll=order&sub=cancel', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'return', '".DB_DOMAIN."index.php?dll=order&sub=thankyou', 'hidden')");
	
	// PAYPAL EXTRA
	//$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cmd', '_xclick', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'no_shipping', '1', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'src', '1', 'hidden')");
}

function AddNoChecx($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , 'NOCHEX', '', 'yes', 'https://www.nochex.com/nochex.dll/checkout', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/nochex.gif')");
	
	$LASTID = $DB->InsertID();
	
	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'email', '".$data['email']."', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amount', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'description', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'custom', '(custom)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'responderurl', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cancelurl', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=cancel', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'returnurl', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	
}

function TwoCheckout($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , '2Checkout', '', 'yes', 'https://www2.2checkout.com/2co/buyer/purchase', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/2checkout.gif')");
	
	$LASTID = $DB->InsertID();
	
	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'sid', '".$data['email']."', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'total', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cart_id', '(custom)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_receipt_link_url', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");

	// 2CHECKOUT EXTRA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'cart_order_id', '1', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'quantity', '1', 'hidden')");	
}

function AddEgold($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , 'EGOLD', '', 'yes', 'https://www.e-gold.com/sci_asp/payments.asp', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/e_gold.gif')");
	
	$LASTID = $DB->InsertID();
	
	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'PAYEE_ACCOUNT', '".$data['email']."', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'PAYMENT_AMOUNT', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'PAYEE_NAME', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'CUST_NUM', '(custom)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'STATUS_URL', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'NOPAYMENT_URL', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=cancel', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'PAYMENT_URL', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	
	// EGOLD EXTRA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'PAYMENT_UNITS', '1', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'PAYMENT_METAL_ID', '1', 'hidden')");	
}


function AddAlertPay($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , 'AlertPay', '', 'yes', 'https://www.alertpay.com/PayProcess.aspx', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/header_01.gif')");
	
	$LASTID = $DB->InsertID();
	
	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_merchant', '".$data['email']."', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_amount', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_itemname', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_description', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_cancelurl', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=cancel', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_returnurl', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_itemcode', '(custom)', 'hidden')");
	// ALERTPAY EXTRA
	//$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_purchasetype', 'service', 'hidden')");	
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_quantity', '1', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_currency', 'USD', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ap_test', '0', 'hidden')");
		
}

function AddPayMate($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , 'PayMate', '', 'yes', 'http://www.paymate.com.au/cart/cart.html', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/logo.gif')");
	
	$LASTID = $DB->InsertID();
	
	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'mid', '".$data['email']."', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'ref', '(custom)', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'amt', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'pmt_item_name', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'return', 'http://".$_SERVER['HTTP_HOST']."/index.php?dll=order&sub=thankyou', 'hidden')");
	
	// ALERTPAY EXTRA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'add', '1', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'currency', 'USD', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'shipping', '0.00', 'hidden')");
	
}

function AddWorldPay($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , 'World Pay', '', 'yes', 'https://select.worldpay.com/wcc/purchase', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/world_pay.gif')");
	
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

	
}

function AddAuthorize($data){

	global $DB;
	
	$DB->Insert("INSERT INTO `merchant` ( `id` , `name` , `comments` , `active` , action, method, icon)VALUES (NULL , 'Authorize.net', '', 'yes', 'https://secure.authorize.net/gateway/transact.dll', 'POST', 'http://".$_SERVER['HTTP_HOST']."/images/payment/authorize_net.gif')");
	
	$LASTID = $DB->InsertID();
	
	// CUSTOM DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_login', '".$data['email']."', 'hidden')");
	
	// BASIC DATA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_amount', '(amount)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_description', '(name)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_cust_ID', '(custom)', 'hidden')");
	// .NET EXTRA
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_show_form', 'PAYMENT_FORM', 'hidden')");
	
	
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_fp_sequence', '(sequence)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_fp_timestamp', '(time)', 'hidden')");
	$DB->Insert("INSERT INTO `merchant_data` ( `mid` , `name` , `value` , `type` )VALUES ('".$LASTID."', 'x_fp_hash', '(fingerprint)', 'hidden')");
	
}
function hmac ($key, $data)
{
return (bin2hex (@mhash(MHASH_MD5, $data, $key)));
}
function CalculateFP ($loginid, $x_tran_key, $amount, $sequence, $tstamp, $currency = "")
{
	return (hmac ($x_tran_key, $loginid . "^" . $sequence . "^" . $tstamp . "^" . $amount . "^" . $currency));
}

?>