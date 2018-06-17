<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// get posted data
/*
php://input is a read-only stream that allows you to read raw data from the request body.
In the case of POST requests, it is preferable to use php://input instead of
$HTTP_RAW_POST_DATA as it does not depend on special php.ini directives.
Moreover, for those cases where $HTTP_RAW_POST_DATA is not populated by default,
it is a potentially less memory intensive alternative to activating
always_populate_raw_post_data. php://input is not available with enctype="multipart/form-data".

file_get_contents — Reads entire file into a string
json_decode — Decodes a JSON string
*/
$data = json_decode(file_get_contents("php://input"));

// set product property values
$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->category_id = $data->category_id;
$product->created = date('Y-m-d H:i:s');

// create the product
if($product->create()){
    echo '{';
    echo '"message": "Product was created."';
    echo '}';
}

// if unable to create the product, tell the user
else{
    echo '{';
    echo '"message": "Unable to create product."';
    echo '}';
}
?>