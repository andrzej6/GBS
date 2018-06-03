<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style-ov.css">


</head>

<body>






<?php 


$username = 'gbs1';
$password = 'Gbs4221A';


try 
   {
       
    $conn1 = new PDO('mysql:host=localhost;dbname=data', $username, $password);
	$conn2 = new PDO('mysql:host=localhost;dbname=data_us', $username, $password);
	$conn3 = new PDO('mysql:host=localhost;dbname=data_aus', $username, $password);
	$conn4 = new PDO('mysql:host=localhost;dbname=data_can', $username, $password);
	$conn5 = new PDO('mysql:host=localhost;dbname=data_aw_network', $username, $password);

	
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn4->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn5->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	
	$dates = array('2016-01-16','2016-02-16','2016-03-16','2016-04-16',date("Y-m-d"));
	$gbsreg = $gbsreg_c = array();
	 
	
	
	for ($i = 0; $i < count($dates); $i++) 
	{
	    $gbsreg[$i]= $conn1->query("SELECT count(distinct(email)) as emails FROM customers where date_created <'".$dates[$i]."'");
		$gbsreg_c[$i] = $gbsreg[$i]->fetchColumn();
		
		$gbslett[$i]= $conn1->query("SELECT count(distinct(email)) as emails FROM email_market where time <'".$dates[$i]."'");
		$gbslett_c[$i] = $gbslett[$i]->fetchColumn();
		
		$gbsoyf[$i]= $conn1->query("SELECT count(distinct(email)) as emails FROM onyourfeet1 where date_created <'".$dates[$i]."'");
		$gbsoyf_c[$i] = $gbsoyf[$i]->fetchColumn();
		
		
		
		$gusreg[$i]= $conn2->query("SELECT count(distinct(email)) as emails FROM customers where date_created <'".$dates[$i]."'");
		$gusreg_c[$i] = $gusreg[$i]->fetchColumn();
		
		$guslett[$i]= $conn2->query("SELECT count(distinct(email)) as emails FROM email_market where time <'".$dates[$i]."'");
		$guslett_c[$i] = $guslett[$i]->fetchColumn();
		
		$gusoyf[$i]= $conn2->query("SELECT count(distinct(email)) as emails FROM onyourfeet1 where date_created <'".$dates[$i]."'");
		$gusoyf_c[$i] = $gusoyf[$i]->fetchColumn();
		
		
		
		$gcanreg[$i]= $conn4->query("SELECT count(distinct(email)) as emails FROM customers where date_created <'".$dates[$i]."'");
		$gcanreg_c[$i] = $gcanreg[$i]->fetchColumn();
		
		$gcanlett[$i]= $conn4->query("SELECT count(distinct(email)) as emails FROM email_market where time <'".$dates[$i]."'");
		$gcanlett_c[$i] = $gcanlett[$i]->fetchColumn();
		
		$gcanoyf[$i]= $conn4->query("SELECT count(distinct(email)) as emails FROM onyourfeet1 where date_created <'".$dates[$i]."'");
		$gcanoyf_c[$i] = $gcanoyf[$i]->fetchColumn();
		
		
		
		
		
		$gausreg[$i]= $conn3->query("SELECT count(distinct(email)) as emails FROM customers where date_created <'".$dates[$i]."'");
		$gausreg_c[$i] = $gausreg[$i]->fetchColumn();
		
		$gauslett[$i]= $conn3->query("SELECT count(distinct(email)) as emails FROM email_market where time <'".$dates[$i]."'");
		$gauslett_c[$i] = $gauslett[$i]->fetchColumn();
		
		
		
		
		$awreg[$i]= $conn5->query("SELECT count(distinct(email)) as emails FROM network where date_created <'".$dates[$i]."'");
		$awreg_c[$i] = $awreg[$i]->fetchColumn();
		
		$awlett[$i]= $conn5->query("SELECT count(distinct(email)) as emails FROM email_market where time <'".$dates[$i]."'");
		$awlett_c[$i] = $awlett[$i]->fetchColumn();
		
		
		
		
		
		
		
		
	}
	
	 
 
	 
        print "<table border='1'><tr><th>database</th>";
	 
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<th>".$dates[$i]."</th>";
		}
		
	    print "</tr>";
          

		   
		   
		   
     
        print "<tr><td>GBS Registrations</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gbsreg_c[$i]."</td>";
		}	 
		print "</tr>";

        
		print "<tr><td>USA Registrations</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gusreg_c[$i]."</td>";
		}	 
		print "</tr>";
		
		print "<tr><td>Canada Registrations</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gcanreg_c[$i]."</td>";
		}	 
		print "</tr>";
		
		print "<tr><td>Australia Registrations</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gausreg_c[$i]."</td>";
		}	 
		print "</tr>";
		
		print "<tr><td>AW Registrations</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$awreg_c[$i]."</td>";
		}	 
		print "</tr>";
		
		
		print "<tr><td></td></tr>";
		
		
		
		
		
		 print "<tr><td>GBS Newsletter</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gbslett_c[$i]."</td>";
		}	 
		print "</tr>";

		
        
		 print "<tr><td>USA Newsletter</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$guslett_c[$i]."</td>";
		}	 
		print "</tr>";

		
		print "<tr><td>Canada Newsletter</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gcanlett_c[$i]."</td>";
		}	 
		print "</tr>";
		
		print "<tr><td>Australia Newsletter</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gauslett_c[$i]."</td>";
		}	 
		print "</tr>";
		
		print "<tr><td>AW Newsletter</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$awlett_c[$i]."</td>";
		}	 
		print "</tr>";
		
		
	
        print "<tr><td></td></tr>";
		
		
		 print "<tr><td>On Your Feet Britain</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gbsoyf_c[$i]."</td>";
		}	 
		print "</tr>";
		
		 print "<tr><td>On Your Feet America</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gusoyf_c[$i]."</td>";
		}	 
		print "</tr>";
		
		 print "<tr><td>On Your Feet Canada</td>";  
		for ($i = 0; $i < count($dates); $i++) 
	    {		
		    print "<td align=\"center\" class=\"content\">".$gcanoyf_c[$i]."</td>";
		}	 
		print "</tr>";


		
			  
			  
        echo "</table>";
 
 
 
 
 
    
    
   } 
catch(PDOException $e) 
   {
    echo 'ERROR: ' . $e->getMessage();
   }




?>




</body>
</html>