<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style1.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="aw.js"></script>


</head>

<body>






<?php 


$username = 'gbs1';
$password = 'Gbs4221A';


try 
   {
       
    $conn = new PDO('mysql:host=localhost;dbname=data', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
     $data = $conn->query('select CONCAT(c.title, c.first_name , c.last_name) as name,
c.id as REF, c.organization, c.jobposition as position, c.department as department, c.furniture_supplier as supplier,
c.phone, c.email, c.member,
c.street, c.town, c.county, c.postcode, c.country, 
c.dietary, c.allergy, c.assistance, c.correspondence,
c.date_created,
o.payment_status, o.payment_amount, o.selected_option, o.transaction_id
from customers1s c LEFT JOIN orders o ON c.id=o.user_id
order by c.date_created desc');
     
     echo "<a href=\"#\" id=\"aw-addressinfo\">Address info</a>&nbsp;&nbsp;
            <a href=\"#\" id=\"aw-addinfo\">Additional info</a>&nbsp;&nbsp;  
            <a href=\"#\" id=\"aw-payinfo\">Payment Info</a><br/><br/>
          <table border='1'>
          <tr>
          <th>Name</th>
          <th>REF</th>
          <th>organization</th>
          <th>position</th>
          <th>department</th>
          <th>supplier</th>
		  <th>member</th>
          <th>phone</th>
          <th>email</th>
		  
          
          <th class=\"taddress\">street</th>
          <th class=\"taddress\">town</th>
          <th class=\"taddress\">county</th>
          <th class=\"taddress\">postcode</th>
          <th class=\"taddress\">country</th>
          
          <th class=\"tadd\">dietary</th>
          <th class=\"tadd\">allergy</th>
          <th class=\"tadd\">assistance</th>
          <th class=\"tadd\">correspondence</th>
          
          <th>date_created</th>
          
          <th class=\"tpay\">payment_status</th>
          <th class=\"tpay\">payment_amount</th>
          <th class=\"tpay\">selected_option</th>
          <th class=\"tpay\">trans_id</th>
 
           </tr>";

      foreach($data as $row)
      {
          
          
        echo "<tr>";
        
        echo "<td><div class=\"name\">" . $row['name'] . "</div></td>"; 
        echo "<td> <div class=\"ref\"> AW-" . $row['REF'] . "</div></td>";
        
        echo "<td> <div class=\"organ\">" . $row['organization'] . "</div></td>";
        echo "<td> <div class=\"pos\">" . $row['position'] . "</div></td>";
        echo "<td> <div class=\"dep\">" . $row['department'] . "</div></td>";
        echo "<td> <div class=\"sup\">" . $row['supplier'] . "</div></td>";
		echo "<td> <div class=\"email\">" . $row['member'] . "</div></td>";
        
        echo "<td> <div class=\"phone\">" . $row['phone'] . "</div></td>";
        echo "<td> <div class=\"email\">" . $row['email'] . "</div></td>";
		 
        
        echo "<td class=\"taddress\"> <div class=\"aw-address\">" . $row['street'] . "</div></td>";
        echo "<td class=\"taddress\"> <div class=\"aw-address\">" . $row['town'] . "</div></td>";
        echo "<td class=\"taddress\"> <div class=\"aw-address\">" . $row['county'] . "</div></td>";
        echo "<td class=\"taddress\"> <div class=\"aw-address\">" . $row['postcode'] . "</div></td>";
        echo "<td class=\"taddress\"> <div class=\"aw-address\">" . $row['country'] . "</div></td>";
        
        
        echo "<td class=\"tadd\"> <div class=\"aw-additional\">" . $row['dietary'] . "</div></td>";
        echo "<td class=\"tadd\"> <div class=\"aw-additional\">" . $row['allergy'] . "</div></td>";
        echo "<td class=\"tadd\"> <div class=\"aw-additional\">" . $row['assistance'] . "</div></td>";
        echo "<td class=\"tadd\"> <div class=\"aw-additional\">" . $row['correspondence'] . "</div></td>";
        
        echo "<td> <div class=\"date-cr\">" . $row['date_created'] . "</div></td>";
        
        echo "<td class=\"tpay\"> <div class=\"aw-payment\">" . $row['payment_status'] . "</div></td>";
        echo "<td class=\"tpay\"> <div class=\"aw-payment\">" . $row['payment_amount'] . "</div></td>";
        echo "<td class=\"tpay\"> <div class=\"aw-payment\">" . $row['selected_option'] . "</div></td>";
        echo "<td class=\"tpay\"> <div class=\"aw-payment\">" . $row['transaction_id'] . "</div></td>";
        
        
        echo "</tr>";
      }
      echo "</table>";
 
 
 
 
 
    
    
   } 
catch(PDOException $e) 
   {
    echo 'ERROR: ' . $e->getMessage();
   }




?>




</body>
</html>