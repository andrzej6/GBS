<?php
// Set this to 0 once you go live or don't require logging.
define("DEBUG", 0);
// Set to 0 once you're ready to go live
define("USE_SANDBOX", 1);
define("LOG_FILE", "./ipn.log");
    $to = 'web@activeworking.com';
    $subject = 'Active Working Summit 2016';
    $message = '<html>no message<body>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'To: Web <web@activeworking.com>' . "\r\n";
    $headers .= 'From: IPN Payment <info@getbritainstanding.org>' . "\r\n";
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
	$keyval = explode ('=', $keyval);
	if (count($keyval) == 2)
		$myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
	$get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
	if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
		$value = urlencode(stripslashes($value));
	} else {
		$value = urlencode($value);
	}
	$req .= "&$key=$value";
}


if(USE_SANDBOX == true) {
	$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
} else {
	$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
}

$ch = curl_init($paypal_url);
if ($ch == FALSE) {
	return FALSE;
}
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

if(DEBUG == true) {
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
}

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

$res = curl_exec($ch);
if (curl_errno($ch) != 0) // cURL error
	{
	if(DEBUG == true) {	
		error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);
	}
	curl_close($ch);
	exit;
} else {
		
		if(DEBUG == true) {
			error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);
			error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);
			// Split response headers and payload
			list($headers, $res) = explode("\r\n\r\n", $res, 2);
		}
		curl_close($ch);
}

if (strcmp ($res, "VERIFIED") == 0) {
			if ( isset($_POST['payment_status'])
			 && ($_POST['payment_status'] == 'Completed')
			 			&& ($_POST['receiver_email'] == 'andrzejd@yahoo.co.uk')
			 && ($_POST['mc_currency']  == 'GBP') 
			 && (!empty($_POST['txn_id']))	 
			) {
				$txn_id = $_POST['txn_id'];
				try 
           {   
             $username = 'gbs1';
             $password = 'Gbs4221A';
             $conn1 = new PDO('mysql:host=localhost;dbname=data', $username, $password);
             $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             date_default_timezone_set('Europe/London');
             $sql1 = 'SELECT id FROM orders WHERE transaction_id= :txn_id';
             $stmt1 = $conn1->prepare($sql1);
             $res1 = $stmt1->execute(array (':txn_id'=>$txn_id));
             $rows = $stmt1->fetch(PDO::FETCH_NUM);
             // transaction is not in database
             if ($rows[0] == 0)
                {
                   $uid = (isset($_POST['custom'])) ? (int) $_POST['custom'] : 0;
					         $status = $_POST['payment_status'];
					         $amount = (float) $_POST['mc_gross'];
					         $sel_option = $_POST['option_selection1'];
					         $q2 = "INSERT INTO orders (user_id, transaction_id, payment_status, payment_amount, selected_option) VALUES (:uid, :txn_id, :status, :amount, :option)";
					         $stmt2 = $conn1->prepare($q2);
                   $res2 = $stmt2->execute(array(
                                              ':uid'=>$uid,
                                              ':txn_id'=>$txn_id,
                                              ':status'=>$status,
                                              ':amount'=>$amount,
                                              ':option'=>$sel_option));
					         if ($res2)
					            {
					              //inserted transaction into orders
                        if ($stmt2->rowCount() == 1)  
                          {  
                              if ($uid > 0)
                                {
                                  $message =$_POST['receiver_email']." received payment of ". $amount . ". Check database.";								  //$to .= ', info@activeworking.com';							      //$to .= ', nandan@activeworking.com';
                                }
                               else 
                                {
                                  $message ="Invalid user ID"; 
                                }
                         
                                                          mail($to, $subject, $message, $headers);							 $to = 'web@activeworking.com';
                          
                            }    
                        // couldnt insert transaction
                        else 
                            {
                              $message = "data cannot be stored1";
                              mail($to, $subject, $message, $headers);
                            }
                        }
                   // something wrong with query     
                   else 
                       {
                          $message = "data cannot be stored2";
                           mail($to, $subject, $message, $headers);
                       }   
					     }
					     //transaction not in database
             
          }
				catch(PDOException $e) 
            {
               mail($to, $subject, $e, $headers);
            } 
		
    } 
    else
    // The right values don't exist in $_POST!
    {
      $message = 'Something wrong with values in POST array <br/> $_POST array: ';
      $message .= 'status: '.$_POST['payment_status']. ' receiver_email: '.$_POST['receiver_email'].' currency: '.$_POST['mc_currency'].' gross: '.$_POST['mc_gross'];
      mail($to, $subject, $message, $headers);
    }        
  
	$message = "VERIFIED IPN";
  mail($to, $subject, $message, $headers);
	
	if(DEBUG == true) {
		error_log($message, 1, $to);
	}
} 

else if (strcmp ($res, "INVALID") == 0) {
	// log for manual investigation
	// Add business logic here which deals with invalid IPN messages
	$message = "INVALID IPN";
	mail($to, $subject, $message, $headers);
      
	if(DEBUG == true) {
		error_log($message, 1, $to);
	}
}

?>