<?php



$username = 'gbs1';
$password = 'Gbs4221A';


try 
   {
       
    $conn = new PDO('mysql:host=localhost;dbname=data', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    date_default_timezone_set('Europe/London');
  
     //added for email confirmation link purpose, below 2 lines
    $key = $replyto . date('mYd');
    $key = md5($key);
 
    $q1 = "INSERT INTO customers (title, first_name, last_name, email, workphone, mobilephone, company_name, address_line1, address_line2, postcode, jobposition, department, behalf, question, additional, date_created, cust_key, vouchers) VALUES
                               (:title, :first_name, :last_name, :email, :workphone, :mobilephone, :company_name, :address_line1, :address_line2, :postcode, :jobposition, :department, :behalf, :question, :additional, :date_created, :ckey, :vouchers)";
        
    $stmt = $conn->prepare($q1);
    $result1 = $stmt->execute(array(
                                              ':title'=>$regtitle,
                                              ':first_name'=>$fn,
                                              ':last_name'=>$ln,
                                              ':email'=>$replyto, 
                                              ':workphone'=>$wphone,
                                              ':mobilephone'=>$mphone,
                                              ':company_name'=>$en,
                                              ':address_line1'=>$address1,
                                              ':address_line2'=>$address2,
                                              ':postcode'=>$zip, 
                                              ':jobposition'=>$job,
                                              ':department'=>$dep, 
                                              ':behalf'=>$behalf,
                                              ':question'=>$mess,
                                              ':additional'=>$additional,
                                              ':date_created'=>date("Y-m-d H:i:s",time()),
                                              ':ckey'=>$key,
                                              ':vouchers'=>$extra_line
                                              
                                              
                                              
                                              
                                              ));
     
     if ($result1)
              {
                if ($stmt->rowCount() == 1)  { }    
              
                else {print "data cannot be stored";}
              
              }
          else {print "data cannot be stored";}    
          
     } 



catch(PDOException $e) 
   {
    echo 'Data cannot be stored. Please try again later';
   }    
   
   
   
   
   
    
          
          
          ?>