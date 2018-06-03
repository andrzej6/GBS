<html><head><title>CRUD Tutorial - Customer's list</title></head><body>
<?php

error_reporting(E_ALL);
  ini_set("display_errors", 1);

// Here we define constants /!\ You need to replace this parameters
define('DEBUG', false);											// Debug mode
define('PS_SHOP_PATH', 'https://sit-stand.com/');		// Root path of your PrestaShop store
define('PS_WS_AUTH_KEY', 'IJ8ESAYX6EPAP3UEH33VM4A18EVFMVXD');	// Auth key (Get it in your Back Office)
require_once('PSWebServiceLibrary.php');
// Here we make the WebService Call
// Here we make the WebService Call
try
{
	$webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
	// Here we set the option array for the Webservice : we want customers resources
	
	
	//$opt['resource'] = 'customers';
	$opt = array(
    'resource'   => 'products',
    'display'    => '[name,id]',
    'filter[id]' => '[13|16]'
);
	
	
	
	
	
	// We set an id if we want to retrieve infos from a customer
	if (isset($_GET['id']))
		$opt['id'] = (int)$_GET['id']; // cast string => int for security measures

	// Call
	$xml = $webService->get($opt);

	// Here we get the elements from children of customer markup which is children of prestashop root markup
	$resources = $xml->children()->children();
	
	$json = json_encode($xml);
	$json2 = json_decode($json, true);
	
	var_dump($json2);
	print "<hr><br/>";
	
	
	foreach ($json2['products']['product'] as &$obj)
	 {
	 $obj['proper_name']= $obj['name']['language'];
	 unset($obj['name']);
	 }
	
	 print "<hr><br/>";
	 var_dump($json2);
	 
	 
	
	 
	 /*sample connection to zoho */
	 $ch = curl_init("https://inventory.zoho.com/api/v1/items?authtoken=58d48149fa1739c485cb6b79d0007070&organization_id=20060025927");
	 $ch1 = curl_init("https://inventory.zoho.com/api/v1/items?authtoken=dbea52d8d00af98eeb064f03183c36ab&organization_id=20060025927");
	 
	    curl_setopt($ch, CURLOPT_POSTFIELDS, array('JSONString' => '{
    "group_id": 4815000000044220,
    "group_name": "Sample API group",
    "unit": "qty",
    "item_type": "inventory",
    "product_type": "goods",
    "is_taxable": true,
    "tax_id": 4815000000044043,
    "description": "description",
    "purchase_account_id": 4815000000035003,
    "inventory_account_id": 4815000000035001,
    "attribute_name1": "Small",
    "name": "Sample API product",
    "rate": 6,
    "purchase_rate": 6,
    "reorder_level": 5,
    "initial_stock": 50,
    "initial_stock_rate": 500,
    "vendor_id": 4815000000044080,
    "vendor_name": "Sample API vendor",
    "sku": "SK123",
    "upc": 111111111111,
    "ean": 111111111112,
    "isbn": 111111111113,
    "part_number": 111111111114,
    "attribute_option_name1": "Small",
    "purchase_description": "Purchase description"
}'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);       
        curl_close($ch);
        echo $output;
	 
	
	
}
catch (PrestaShopWebserviceException $e)
{
	// Here we are dealing with errors
	$trace = $e->getTrace();
	if ($trace[0]['args'][0] == 404) echo 'Bad ID';
	else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
	else echo 'Other error<br />'.$e->getMessage();
}



//print $json;

?>
</body></html>












