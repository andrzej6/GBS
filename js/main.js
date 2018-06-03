
   jQuery(document).ready(function($) {
  var dialog, form, emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      email = $( "#email1" );
            /* little nudge calc */     $( "#nudge-calc-button" ).click(function() {     	     	licnum = parseInt($( "input[name='numboflic']" ).val());     	     	if ((licnum>0)&&(licnum<100000))     	{     		     		switch(true)             {               case ((licnum > 0) && (licnum <= 4)):                  y = 34.95;               break;               	               case ((licnum > 4) && (licnum <= 99)):                  y = 29.95;               break;               case ((licnum > 99) && (licnum <= 249)):                  y = 19.95;               break;                              case ((licnum > 249) && (licnum <= 499)):                   y = 14.95;                 break;                              case ((licnum > 499) && (licnum <= 999)):                   y = 9.95;                                  break;                              case ((licnum > 999) && (licnum <= 100000)):                  y = 4.95;               break;            }     		totalcost = licnum * y;     		totalnice = Math.round(totalcost);     		     		unitprice = totalcost / licnum;     		     		 $( "input[name='nudge-annual-price']" ).val(addCommas(totalnice));         		 $( "input[name='nudge-unit-price']" ).val(unitprice.toFixed(2));         		     		     		// $("#nudge-res").html('licences by £29.95: '+ x1 +'<br/>'+ 'licences by £19.95: '+ x2 +'<br/>'+ 'licences by £14.95: '+ x3 +'<br/>'+ 'licences by £9.95: '+ x4 +'<br/>'+'licences by £4.95: '+ x5 +'<br/>');     		     	}     	else {     		alert("Please enter number of licences between 1 and 100,000");     	}                 });               $('#numblic').keypress(function (e) {          if (e.which == 13)           {             $( "#nudge-calc-button" ).click();             return false;    //<---- Add this line            }      });                                             function addCommas(nStr){	nStr += '';	x = nStr.split('.');	x1 = x[0];	x2 = x.length > 1 ? '.' + x[1] : '';	var rgx = /(\d+)(\d{3})/;	while (rgx.test(x1)) {		x1 = x1.replace(rgx, '$1' + ',' + '$2');	}	return x1 + x2;}                                   
     
     
     function checkRegexp( o, regexp) {
      if ( !( regexp.test( o.val() ) ) ) {
        return false;
      } else {
        return true;
      }
    }
    
    
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        return false;
      } else {
        return true;
      }
    }
     
     
     function addUser() { 
     
     $('#qreg-form')[0].checkValidity();
      var valid = true;
      
      valid = valid && checkLength( email, "email", 6, 80 );
      valid = valid && checkRegexp( email, emailRegex);
      
      if ( valid ) 
        {  
        //$("#cookie-store").html($.cookie('quick-register'));
        
        $.post( "/store.php", $( "#qreg-form" ).serialize()).done(function( data ) {
         if (data=="") 
         { 
            
            $(".qreg-cont").html('<div class="qreg-m"><br/>Thank you for signing up. <br/>You will receive an email shortly.</div>');
            $.cookie('quick-register', 1, { expires: 90, path: '/'});
            $('.blue-butt').remove();
            $('.ui-dialog').css({ "height": "157px"});
         }
         else {
           $(".qreg-cont").html('<div class="qreg-m"><br/>Sorry, we could not sign you up. <br/>Try again later.</div>');
           $('.ui-dialog').css({ "height": "157px"});
             }
      });
        
       
        } 
      else 
       { 
       $(".qreg-err").html('Input correct email address, please.');
       $("#email1").focus();
       $("#email1").css({ "border": "1px solid red"});
       
       
       }
     
     } 
  
  
     var windowwidth = 300;
     var margintop = 0;
     var titletext = '<img src="/images/logos/awcic/gbs/minilogo.png" /><span class="gbs-popup-title"> &nbsp;Keep connected.</span>';
     if ($(window).width()>550) 
         { windowwidth = 550;
           margintop = '-113px';
           titletext ='<img src="/images/logos/awcic/gbs/minilogo.png" /><span class="gbs-popup-title"> &nbsp;Keep connected to our campaign. JOIN US</span>';
          } 
          
     dialog = $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      // position: { my: "left top+110px", at: "left top", of: window },
      position: { my: "center", at: "center", of: window },
      
      buttons: {"Sign Up":{ 'text':'Sign Up','click':addUser,'class':'blue-butt'} },
      
      close : function(){
                  if (!$.cookie('close-window'))
                  {
                     $.cookie('close-window', 1, { expires: 90, path: '/'});
                     console.log(1);
                  } 
                  else 
                  {
                     var cl = $.cookie('close-window');
                     cl++;
                     $.cookie('close-window', cl, { expires: 90, path: '/'});
                     console.log(cl);
                     
                     if (cl == 2)
                       {
                          $.cookie('quick-register', 1, { expires: 90, path: '/'}); 
                       }
                     
                  }
              },
       title: 'JOIN US',
       width: windowwidth
      
      
    });
 
 
     dialog.data( "uiDialog" )._title = function(title) {
    title.html( this.options.title );
     };

    dialog.dialog('option', 'title', titletext);
 
     $('.ui-dialog-buttonset').css( "margin-top", margintop );
 
     form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
    
    
    
    /*
    
    $( "#opener" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
    
    
    $( "#cookie-store" ).click(function() {
    
      s=$.removeCookie('quick-register',{ path: '/'});
      $("#cookie-store").html('value='+s+'.');
      
    });
    
    */
    
    
    
    
    
  
   
   if (!$.cookie('quick-register')) 
   {
   setTimeout(function(){
       $( "#dialog" ).dialog( "open" );
   }, 30000);
   
  
   }
    
    
    
    
     if ($(".ui-widget-overlay")) //the dialog has popped up in modal view
        {
            //fix the overlay so it scrolls down with the page
            $(".ui-widget-overlay").css({
                position: 'fixed',
                top: '0'
            });

            //get the current popup position of the dialog box
            pos = $(".ui-dialog").position();

            //adjust the dialog box so that it scrolls as you scroll the page
            $(".ui-dialog").css({
                position: 'fixed',
                top: pos.y
            });
        }
    
    
    
    
    if ( $(".fancybox"))
    $(".fancybox").fancybox({ prevEffect: 'none',nextEffect: 'none'});
    
    
    });
    
    
    
    
    