<?phpinclude('config.php');$replyto = $_POST['email1'];$response = "";$key = $replyto . date('dmY');$key = md5($key);try    {    $conn = new PDO('mysql:host=localhost;dbname=data', $username, $password);    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    date_default_timezone_set('Europe/London');    $q1 = "INSERT INTO email_market (email, time, cust_key) VALUES (:email, :time, :ckey)";    $stmt = $conn->prepare($q1);    $result1 = $stmt->execute(array(                              ':email'=>$replyto,                              ':time'=>date("Y-m-d H:i:s",time()),							  ':ckey'=>$key                              ));     if ($result1)              {                if ($stmt->rowCount() == 1)  { }                else {$response = "data cannot be stored";}              }          else {$response = "data cannot be stored";}       $error = 'error';       $ok='OK';// Multiple recipients    $to = 'web@sit-stand.com'; // note the comma// Subject    $subject = 'Get Britain Standing Newsletter';// Message    $message = '<html><style>body {font-family:Arial}</style><body><div style="color:black;font-size:80%"><a href="http://getbritainstanding.org/index.php" style="color:#009999;">		                     <img src="https://getbritainstanding.org/images/emails/gbs.png" width="100"/></a>		                     <br/><br/>		                   Thank you for signing up for our e-newsletter.<br/><br/>							<strong>Please confirm your email</strong> by							<a href="http://getbritainstanding.org/email_confirm.php?email='.$replyto.'&key='.$key.'">clicking here</a>.							<br/><br/>                           Also you may find it useful to visit our <strong>"Official Supporter"</strong> websites below: <br/>		                  <a href="http://sit-stand.com/" style="color:#009999;">						  <img src="https://getbritainstanding.org/images/emails/sit-stand.jpg" width="150"/></a>&nbsp;&nbsp;&nbsp;						   <a href="https://www.ajproducts.co.uk/" style="color:#009999;">						  <img src="https://getbritainstanding.org/lara_base/public/img/aw/summit/partners/aj-logo.jpg" width="100"/></a>						  <a href="https://getbritainstanding.org/littlenudge.php" style="color:#009999;">						  <img src="https://getbritainstanding.org/images/emails/little_nudge.jpg" width="150"/></a>&nbsp;&nbsp;&nbsp;                         <a href="http://yo-yodesk.com/" style="color:#009999;">						  <img src="https://getbritainstanding.org/images/emails/yo-yo.jpg" width="150"/></a>						 &nbsp;						  <div style="clear:both"></div>						&nbsp;&nbsp;&nbsp;						 <a href="http://www.fellowes.com/" style="color:#009999;">                           <img src="https://getbritainstanding.org/lara_base/public/img/aw/summit/partners/fellowes.jpg" width="150"/></a>&nbsp;&nbsp;&nbsp;						   <a href="https://steppie.dk/en/" style="color:#009999;">                            <img src="https://getbritainstanding.org/lara_base/public/img/aw/summit/partners/steppie.jpg" width="150"/></a>&nbsp;&nbsp;&nbsp;                          <a href="http://www.thefreedesk.com/start/" style="color:#009999;">                           <img src="https://getbritainstanding.org/lara_base/public/img/aw/summit/partners/freedesk.jpg" width="150"/></a>&nbsp;&nbsp;&nbsp;						  						  <div style="clear:both"></div>						 &nbsp;&nbsp;						  <br/>						  Thank you from all the team <br/><br/>                         <strong> Active Working C.I.C  <br/>                         Get Britain Standing campaign </strong>						  <br/><br/>						  <div style="font-size:0.8em;text-align:justify">						  <span style="font-weight:bold;color:#EA1E30">Get Britain Standing:</span> a campaign to grow awareness						  and education of the dangers of sedentary working and in particular prolonged sitting time. The average						  <span style="color:#EA1E30">UK</span> office worker sits 10 hours each day, with almost 70% of sitting						  taking place at work. There is growing scientific evidence highlighting the multiple health risks						  (including cardiovascular disease, diabetes (type 2), certain cancers and mental health) caused by						  excessive and prolonged sitting. <br/><br/>                          <strong>Active Working CIC </strong>is leading the global insight and evidence based research on                          sedentary behaviour. We commissioned the first                          <a href="http://activeworking.com/expert_statement.php">global expert recommendations </a>                          on standing time for office workers (with the support of <strong>Public Health England</strong>),                          published by the <strong>British Journal for Sports Medicine</strong> in June 2015. We spearhead                          international  <strong>Get Standing &trade;</strong> campaigns in <span style="color:#EA1E30">UK</span>, Australia, USA, Canada, Ireland and Europe.                          </div>                      </div>                      </div></body></html>';// To send HTML mail, the Content-type header must be set    $headers[] = 'MIME-Version: 1.0';    $headers[] = 'Content-type: text/html; charset=iso-8859-1';// Additional headers    $headers[] = 'From: Get Britain Standing Campaign <info@getbritainstanding.org>';    // if ((mail($replyto, $subject, $message1, $headers)? $ok : $error)=='OK')    if ((mail($replyto, $subject, $message, implode("\r\n", $headers))? $ok : $error)=='OK')        // $response .="";        $response .="";    else        $response = "error sending mail";    print $response;}catch(PDOException $e)    {    $response = 'Data cannot be stored. Please try again later.'. $e;   }