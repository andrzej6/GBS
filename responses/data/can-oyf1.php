<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style1.css">


</head>

<body>






<?php 


$username = 'gbs1';
$password = 'Gbs4221A';


try 
   {
       
    $conn = new PDO('mysql:host=localhost;dbname=data_can', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
     $data = $conn->query('SELECT * FROM onyourfeet1 order by date_created desc');
     
     echo "<table border='1'>
             <tr>
          <th>Title</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>email</th>
          <th>workphone</th>
          <th>mobile phone</th>
		  
		  <th>address line1</th>
		  <th>address line2</th>

		  <th>city</th>
		  <th>state</th>
          <th>postcode</th>		  
          <th>employer name</th>
		  
		  
          <th class=\"extra\">job position</th>
          <th class=\"extra\">department</th>
          <th class=\"extra\">on behalf of</th>
		  <th class=\"extra\">event place</th>
		  <th class=\"extra\">emp. count</th>
		  
		  <th class=\"extra2\">extra sites</th>
          <th class=\"extra2\">extra emp.</th>
          <th class=\"extra2\">hear from</th>
		  <th class=\"extra2\">additional</th>
	
          <th>date</th>
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
		
		echo "<td> <div class=\"addr1\">" . $row['address_line1'] . "</div></td>";
		echo "<td> <div class=\"addr2\">" . $row['address_line2'] . "</div></td>";
		
		 echo "<td> <div class=\"city\">" . $row['city'] . "</div></td>";
		  echo "<td> <div class=\"state\">" . $row['state'] . "</div></td>";
        echo "<td> <div class=\"postcode\">" . $row['postcode'] . "</div></td>";
		
		
		
        echo "<td> <div class=\"employername\">" . $row['employername'] . "</div></td>";
        echo "<td> <div class=\"pos\">" . $row['jobposition'] . "</div></td>";
        echo "<td> <div class=\"dep\">" . $row['department'] . "</div></td>";
        echo "<td> <div class=\"beh\">" . $row['behalf'] . "</div></td>";
		
		echo "<td> <div class=\"eloc\">" . $row['event_location'] . "</div></td>";
		echo "<td> <div class=\"esize\">" . $row['workplace_basic_size'] . "</div></td>";
		echo "<td> <div class=\"e-extra\">" . $row['workplace_extra'] . "</div></td>";
		echo "<td> <div class=\"e-extra-size\">" . $row['workplace_extra_size'] . "</div></td>";
		
		echo "<td> <div class=\"hear\">" . $row['hear_from'] . "</div></td>";
	
        echo "<td> <div class=\"add\">" . $row['additional'] . "</div></td>";
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