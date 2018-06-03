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
       
    $conn = new PDO('mysql:host=localhost;dbname=data_aw_network', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
     $data = $conn->query('SELECT * FROM network order by date_created desc');
     
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
		  
		  <th>Workplace employees</th>
		  <th>Additional worksites</th>
          <th>Additional worksite employees</th>
          <th>Hear from</th>
          <th>Comments</th>
		  <th>AWN package</th>
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
		
		
		
        echo "<td> <div class=\"beh\">" . $row['workplace_basic_size'] . "</div></td>";
        echo "<td> <div class=\"question\">" . $row['workplace_extra'] . "</div></td>";
        echo "<td> <div class=\"add\">" . $row['workplace_extra_size'] . "</div></td>";
		echo "<td> <div class=\"add\">" . $row['hear_from'] . "</div></td>";
		echo "<td> <div class=\"add\">" . $row['question'] . "</div></td>";
		echo "<td> <div class=\"add\">" . $row['network_pack'] . "</div></td>";
		
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