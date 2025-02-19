<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', '');
define('CLIENT_SECRET', '');
 
define('PAYPAL_RETURN_URL', 'http://localhost/proj/retailer/customer/merchant/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/proj/retailer/customer/merchant/cancel.php');
define('PAYPAL_CURRENCY', 'PhP'); // set your currency here
 
// Connect with the database
$db = new mysqli('localhost', 'root', 'jinSQL', 'dbRetailer'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live
