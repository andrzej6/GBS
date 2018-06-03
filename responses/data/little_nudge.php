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
    
    
     $data = $conn->query('SELECT * FROM little_nudge order by date_created desc');
     
     echo "<table border='1'>
             <tr>
			    <th>first_name</th>
				<th>last_name</th>
				<th>jobposition</th>
				<th>email</th>
				<th>workphone</th>
				<th>address_line1</th>
				<th>address_line2</th>
				<th>postcode</th>
				<th>city</th>
				<th>country</th>
				<th>licnum</th>
				<th>years</th>
				<th>order_cost</th>
				<th>date_created</th>
           </tr>";

      foreach($data as $row)
      {
       
        echo "<tr>";
        
        echo "<td> <div class=\"firstname\">" . $row['first_name'] . "</div></td>";
        echo "<td> <div class=\"lastname\">" . $row['last_name'] . "</div></td>";
		
		echo "<td> <div class=\"lastname\">" . $row['jobposition'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['email'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['workphone'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['address_line1'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['address_line2'] . "</div></td>";
		
		echo "<td> <div class=\"lastname\">" . $row['postcode'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['city'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['country'] . "</div></td>";
		
		echo "<td> <div class=\"lastname\">" . $row['licnum'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['years'] . "</div></td>";
		echo "<td> <div class=\"lastname\">" . $row['order_cost'] . "</div></td>";
       
		
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