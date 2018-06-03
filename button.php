<div id="aw-payment">

<div class="aw-payment-message">
     To complete the process, please now click the button below so that you may pay for your
     "Acive Working Summit 2015" entrance  via PayPal. When you complete your payment at PayPal, please click the button to return to
     this site.
</div>


<div class="aw-payment-button">

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="A5TCAD52RK5W2">
<table>
<tr><td><input type="hidden" name="on0" value="Choose Summit Entry">Choose Summit Entry</td></tr><tr><td><select name="os0">


<!-- that would be pricing after early bird discount 236, 156     556, 396 -->

<?php if ($fsupplier =='NO') {
?>
  <option value="Standard - FULL DAY -">Standard - FULL DAY - £236.00 (inc VAT)</option>
	<option value="Standard - ONLY SESSION 3 -">Standard - ONLY SESSION 3 - £156.00 (inc VAT)</option>
	
<?php }  ?>
  
  <option value="Suppliers - FULL DAY -">Suppliers - FULL DAY - £556.00 (inc VAT)</option>
	<option value="Suppliers - ONLY SESSION 3 -">Suppliers - ONLY SESSION 3 - £396.00 (inc VAT)</option>
	
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="GBP">


<?php 

echo '<input type="hidden" name="custom" value="' . $lid . '">
			 <input type="hidden" name="email" value="' . $replyto . '">';

?>




<input type="image" src="https://www.sandbox.paypal.com/en_GB/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

</div>




</div>