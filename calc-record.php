<?php 

if($_POST['sithours'] > 0) {
  $total =$_POST['sithours'];
  
  $username = 'gbs1';
  $password = 'Gbs4221A';
  
  try 
   {
    $conn = new PDO('mysql:host=localhost;dbname=data', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('Europe/London');
    $q1 = "INSERT INTO calc_results (total) VALUES (:total)";
    $stmt = $conn->prepare($q1);
    $result1 = $stmt->execute(array(':total'=>$total));

     if ($result1)
              {
                if ($stmt->rowCount() == 1)  { $response ="ok";}    
                else {$response = "data cannot be stored";}
              }
          else {$response = "data cannot be stored";}    
     } 
catch(PDOException $e) 
   {
    $response = 'Data cannot be stored. Please try again later.'. $e;
   }    

  

  echo $response;
}
else 
echo $_POST['sithours'];

