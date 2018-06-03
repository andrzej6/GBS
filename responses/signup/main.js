
$( document ).ready(function() {
   



    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      position: { my: "left top", at: "left bottom", of: window }
    });
 
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
    
    
    
    
    
    
    
    
 
  
  
 
  


});