<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'ASCFwUfkajL00dpTV-0Z9uKZ_xfmtI3BEB6Cdeld7kJqH90EDP30nmnlXcTWAp-fbm9dXAcJl5qLar7n');
define('CLIENT_SECRET', 'EK5P7aNeeIoPQDMVHkziG-q84BBhC8A387saWUQgVy70XlOElo5A8LphhnadNzygEhv8_p2VtFHuN6ee');
 
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
