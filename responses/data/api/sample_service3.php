<html><head><title>CRUD Tutorial - Customer's list</title></head><body>
<?php


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

    $opt['resource'] = 'customers';





    // We set an id if we want to retrieve infos from a customer
    if (isset($_GET['id']))
        $opt['id'] = (int)$_GET['id']; // cast string => int for security measures
    else {
        $opt['display']  = 'full';
        $opt['limit']='50';
        $opt['sort']='[id_ASC]';
        $opt['filter[email]'] = '%[work]%';
    }


    // Call
    $xml = $webService->get($opt);

    // Here we get the elements from children of customer markup which is children of prestashop root markup
    $resources = $xml->children()->children();
}
catch (PrestaShopWebserviceException $e)
{
    // Here we are dealing with errors
    $trace = $e->getTrace();
    if ($trace[0]['args'][0] == 404) echo 'Bad ID';
    else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
    else echo 'Other error<br />'.$e->getMessage();
}



if (isset($_GET['id']) && isset($_POST['id'])) // Here we check id cause in every resource there's an id
{
    // Here we have XML before update, lets update XML with new values
    foreach ($resources as $nodeKey => $node)
    {
        $resources->$nodeKey = $_POST[$nodeKey];
    }
    // And call the web service
    try
    {
        $opt = array('resource' => 'customers');
        $opt['putXml'] = $xml->asXML();
        $opt['id'] = $_GET['id'];
        $xml = $webService->edit($opt);
        // if WebService don't throw an exception the action worked well and we don't show the following message
        echo "Successfully updated.";
    }
    catch (PrestaShopWebserviceException $ex)
    {
        // Here we are dealing with errors
        $trace = $ex->getTrace();
        if ($trace[0]['args'][0] == 404) echo 'Bad ID';
        else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
        else echo 'Other error<br />'.$ex->getMessage();
    }
}





// We set the Title
echo '<h1>Customers ';
if (isset($_GET['id']))
    echo 'Details';
else
    echo 'List';
echo '</h1>';

// We set a link to go back to list if we are in customer's details
if (isset($_GET['id']))
    echo '<a href="?">Return to the list</a>';

echo '<table border="5">';
// if $resources is set we can lists element in it otherwise do nothing cause there's an error
if (isset($resources))
{
    if (!isset($_GET['id']))
    {


        echo '<tr><th>Id</th><th>E-mail</th><th>First Name</th><th>Last Name</th></tr>';

        foreach ($resources as $resource)
        {
            // Iterates on the found IDs
            echo '<tr><td>'.$resource->id.'</td><td>'.
                '<a href="?id='.$resource->id.'">'.$resource->email.'</a>'.
                '</td>
                 <td>'.$resource->firstname.'</td>
                 <td>'.$resource->lastname.'</td></tr>';
        }
    }
    else
    {
        echo '<form method="POST" action="?id='.$_GET['id'].'">';

        foreach ($resources as $key => $resource)
        {
            if ($key == 'id')
                echo '<input type="hidden" name="' . $key . '" value="' . $resource . '"/>';
            elseif ($key == 'date_add')
                echo '<tr><th>' . $key . '</th><td>' . $resource . '</td></tr>';
            elseif (($key == 'lastname')|| ($key == 'firstname')|| ($key == 'email') )
            {
                echo '<tr><th>'.$key.'</th><td><input type="text" name="' . $key . '" value="' . $resource . '"/></td></tr>';
            }
        }
        echo '<input type="submit" value="Update"></form>';
    }
}
echo '</table>';
print_r($resources);

?>
</body></html>












