<?php 
function check_supporter($supporter)
{
	
		$request = $_SERVER['REQUEST_URI'];
        $string1 = substr($request,12);
        $string2 = substr($string1,0,-4);
		
		if ($string2 == $supporter)
		print "active";	
}

?>


<div class="gbs-supporters-list">

                                	<div class="supporters-horizont <?php check_supporter('chiropractors'); ?>">
                                		<a href="/supporters/chiropractors.php">Chiropractors</a>
                                	</div>


                                	<div class="supporters-horizont <?php check_supporter('osteopaths'); ?>">
                                	    <a href="/supporters/osteopaths.php">Osteopaths</a>
                                	</div>


                                	<div class="supporters-horizont <?php check_supporter('physiotherapists'); ?>">
                                		<a href="/supporters/physiotherapists.php">Physiotherapists</a>
                                	</div>
                                	
                                	
                                	<div class="supporters-horizont <?php check_supporter('exercise-professionals'); ?>">
                                	   <a href="/supporters/exercise-professionals.php">Exercise Professionals</a>
                                	</div>
                                	
                                	
                                	
                                	<div class="clear"><!-- ClearFix --></div>
                                	
                                    
                                    <div class="supporters-horizont <?php check_supporter('regional-dealers'); ?>">
                                	   <a href="/supporters/regional-dealers.php">Regional Dealers</a>
                                	</div>
                                    
                                	
                                	<div class="supporters-horizont <?php check_supporter('national-dealers'); ?>">
                                	   <a href="/supporters/national-dealers.php">National Dealers</a>
                                	</div>
                                	
                                	


                                	<div class="supporters-horizont <?php check_supporter('product-suppliers'); ?>">
                                	    <a href="/supporters/product-suppliers.php">Product Suppliers</a>
                                	</div>

                                	
                                	<div class="supporters-horizont <?php check_supporter('professional-services'); ?>">
                                	   <a href="/supporters/professional-services.php">Professional Services</a>
                                	</div>


                                

 </div>
 





