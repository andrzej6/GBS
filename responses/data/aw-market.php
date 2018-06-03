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
    
    
     $data = $conn->query('SELECT * FROM email_market order by time desc');
     
     echo "<table border='1'>
             <tr>
          <th>email</th>
          <th>date</th>
          <th>email activation</th>
         
           </tr>";

      foreach($data as $row)
      {
          
       


          
          
        echo "<tr>";
        
        echo "<td><div class=\"title\">" . $row['email'] . "</div></td>";
        echo "<td> <div class=\"time\">" . $row['time'] . "</div></td>";
        echo "<td align=\"center\"> <div class=\"active\">" ;
		if ($row['active']==NULL) print "";
		  else if ($row['active']=='true') print "active";
		echo "</div></td>";
        
        
        
        
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