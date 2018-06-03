<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>






<?php 


$username = 'gbs1';
$password = 'Gbs4221A';


try 
   {
       
    $conn = new PDO('mysql:host=localhost;dbname=data', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
     $data = $conn->query('SELECT * FROM customers order by date_created desc');
     
     echo "<table border='1'>
             <tr>
          <th>Title</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>email</th>
          <th>workphone</th>
          <th>mobile phone</th>
          <th>company name</th>
         <th>address1</th>
         <th>address2</th>
          <th>postcode</th>
          <th>job position</th>
          <th>department</th>
          <th>on behalf of</th>
          <th>question</th>
          <th>additional</th>
		  <th>vouchers/ free trial</th>
          <th>date of request</th>
           </tr>";

      foreach($data as $row)
      {
          
       


          
          
        echo "<tr>";
        
        echo "<td><div class=\"title\">" . $row['title'] . "</div></td>";
        echo "<td> <div class=\"firstname\">" . $row['first_name'] . "</div></td>";
        echo "<td> <div class=\"lastname\">" . $row['last_name'] . "</div></td>";
        echo "<td> <div class=\"email\">" . $row['email'] . "</div></td>";
        echo "<td> <div class=\"workphone\">" . $row['workphone'] . "</div></td>";
        echo "<td> <div class=\"mobilephone\">" . $row['mobilephone'] . "</div></td>";
		
		if (!empty($row['employername']))
		   echo "<td> <div class=\"employername\">" . $row['employername'] . "</div></td>";
		else
		echo "<td> <div class=\"employername\">" . $row['company_name'] . "</div></td>";
		
		
		echo "<td> <div class=\"employername\">" . $row['address_line1'] . "</div></td>";
		echo "<td> <div class=\"employername\">" . $row['address_line2'] . "</div></td>";
        echo "<td> <div class=\"postcode\">" . $row['postcode'] . "</div></td>";
        
        echo "<td> <div class=\"pos\">" . $row['jobposition'] . "</div></td>";
        echo "<td> <div class=\"dep\">" . $row['department'] . "</div></td>";
        echo "<td> <div class=\"beh\">" . $row['behalf'] . "</div></td>";
        echo "<td> <div class=\"question\">" . $row['question'] . "</div></td>";
        echo "<td> <div class=\"add\">" . $row['additional'] . "</div></td>";
		echo "<td> <div class=\"add\">" . $row['vouchers'] . "</div></td>";
        echo "<td> <div class=\"date\">" . $row['date_created'] . "</div></td>";
        
        
        
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