<?php

use Freshbooks\FreshBooksApi;
require_once "Freshbooks/FreshBooksApi.php";
require_once "Freshbooks/FreshBooksApiException.php";
require_once "Freshbooks/XmlDomConstruct.php";


// Setup the login credentials
$domain = 'https://activeworking.freshbooks.com/api/2.1/xml-in';
$token = 'ef8732537d28a2472b24847fd9a3bc1d';
FreshBooksApi::init($domain, $token);

/**********************************************
 * Fetch all clients by a specific id
 **********************************************/
//$fb = new FreshBooksApi('client.list');
$fb = new FreshBooksApi($domain, $token);
$fb->post(array(
    'email' => 'some@email.com'
));
$fb->request();
if($fb->success())
{
    echo 'successful! the full response is in an array below';
    print_r($fb->getResponse());
}
else
{
    echo $fb->getError();
    print_r($fb->getResponse());
}

