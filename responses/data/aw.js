$( document ).ready(function() {



$( "#aw-addressinfo" ).click(function(e) {
   e.preventDefault();
   
   
   $( ".taddress" ).slideToggle( "slow" );
   return false;
});




$( "#aw-addinfo" ).click(function(e) {
   e.preventDefault();
   
   
   $( ".tadd" ).slideToggle( "slow" );
   return false;
});




$( "#aw-payinfo" ).click(function(e) {
   e.preventDefault();
   
   
   $( ".tpay" ).slideToggle( "slow" );
   return false;
});



});