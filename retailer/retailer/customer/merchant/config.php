<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 

 
define('PAYPAL_RETURN_URL', 'http://localhost/proj/retailer/customer/merchant/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/proj/retailer/customer/merchant/cancel.php');
define('PAYPAL_CURRENCY', 'PhP');
 
// Connect with the database
$db = new mysqli('localhost', 'root', '', 'dbRetailer'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');

$gateway->setTestMode(true); //set it to 'false' when go live
