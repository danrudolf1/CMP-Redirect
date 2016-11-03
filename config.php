<?php
require('./vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_live_CmWB5dEXCgC8DvfgWzXSW8Xc",
  "publishable_key" => "pk_live_vxf6BTKJ8mlCtIz1RkCS9dmg"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseRelation;
use Parse\ParseUser;

ParseClient::initialize('WKvDyqa7Hs23bkdbhPqAM4eadylYMxRlKTboJ56G', 
						'VzCV5wmXG0RXO3xsyBreS9U9myANFn5hnUYGLS6a', 
						'GThIGs94JOAB2T3jgiNPNEBlNFzKIi2eT6NVw1TP');

?>