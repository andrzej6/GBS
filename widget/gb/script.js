
    jQuery(document).ready(function($) { 
        /******* Load CSS *******/
        var css_link = $("<link>", { 
            rel: "stylesheet", 
            type: "text/css", 
            href: "https://getbritainstanding.org/widget/gb/calculator.css" 
        });
        css_link.appendTo('head');    
        
          

        /******* Load HTML *******/
       $.getJSON('https://getbritainstanding.org/widget/gb/container.php?callback=?','container=calculator',function(res){
           $('#halfright1').html(res.content);
}); 
   
 });
   
   
   
     
$(window).bind("load", function() {
   // code here     
 // Handler for .ready() called.

var lightblue = '#4cbad9';
var darkblue = '#204aa0';
var lightgreen = '#92ad4c';

//generating input fields
for( var i = 0; i <= 8; i += 0.25 ){
	j=parseInt(i);
	jstring=j.toString();
	istring =i.toString();
	lasttwo = istring.slice(-2);

	if (i<1) ending = 'mins';
	else if ((i>=1)&&(i<2)) ending ='hour';
	else if (i>2) ending ='hours';
 

	if (lasttwo=="25") beforeend = '15';
	   else if(lasttwo==".5") beforeend = '30';
	      else if(lasttwo=="75") beforeend = '45';
	         else beforeend = '00';

	h = jstring+':'+beforeend+' '+ending;
	$('#eatinput').append(
		'<option value="'+i+'">'+h+'</option>'
	);

	
	$('#comuttinput').append(
		'<option value="'+i+'">'+h+'</option>'
	);

	
	$('#workinput').append(
		'<option value="'+i+'">'+h+'</option>'
	);

	
	$('#relaxinput').append(
		'<option value="'+i+'">'+h+'</option>'
	);
}



// merging eat slider changes with eat input
$('#eatingslider').on('change', function(){
    $('#eatinput').val($('#eatingslider').val());
           // applying color changes
            value = this.value/8;
            this.style.backgroundImage = [
                '-webkit-gradient(',
                  'linear, ',
                  'left top, ',
                  'right top, ',
                  'color-stop(' + value + ', ' + lightblue +'), ',
                  'color-stop(' + value + ', ' + darkblue +')',
                ')'
            ].join('');
             $( "#resultcalc" ).fadeOut(2000);
});



// merging as previous
$('#comuttingslider').on('change', function(){
    $('#comuttinput').val($('#comuttingslider').val());
           // applying color changes
            value = this.value/8;
            this.style.backgroundImage = [
                '-webkit-gradient(',
                  'linear, ',
                  'left top, ',
                  'right top, ',
                  'color-stop(' + value + ', ' + lightblue +'), ',
                  'color-stop(' + value + ', ' + darkblue +')',
                ')'
            ].join('');
             $( "#resultcalc" ).fadeOut(2000);
});


// merging as previous
$('#workingslider').on('change', function(){
    $('#workinput').val($('#workingslider').val());
           // applying color changes
            value = this.value/8;
            this.style.backgroundImage = [
                '-webkit-gradient(',
                  'linear, ',
                  'left top, ',
                  'right top, ',
                  'color-stop(' + value + ', ' + lightblue +'), ',
                  'color-stop(' + value + ', ' + darkblue +') ',
                ')'
            ].join('');
             $( "#resultcalc" ).fadeOut(2000);
});


// merging as previous
$('#relaxingslider').on('change', function(){
    $('#relaxinput').val($('#relaxingslider').val());
           // applying color changes
            value = this.value/8;
            this.style.backgroundImage = [
                '-webkit-gradient(',
                  'linear, ',
                  'left top, ',
                  'right top, ',
                  'color-stop(' + value + ', ' + lightblue +'), ',
                  'color-stop(' + value + ', ' + darkblue +')',
                ')'
            ].join('');
             $( "#resultcalc" ).fadeOut(2000);
});


// merging changes on iput field onto the slider
$('#eatinput').on('change', function(){
    $('#eatingslider').val($('#eatinput').val());
    value = $('#eatingslider').val()/8;
    $('#eatingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+value+', ' + lightblue +'),  color-stop('+value+', ' + darkblue +'))' });  
     $( "#resultcalc" ).fadeOut(2000);
});


// merging as above
$('#comuttinput').on('change', function(){
    $('#comuttingslider').val($('#comuttinput').val());
    value = $('#comuttingslider').val()/8;
    $('#comuttingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+value+', ' + lightblue +'), color-stop('+value+', ' + darkblue +'))'});  
     $( "#resultcalc" ).fadeOut(2000);
});


// merging as above
$('#workinput').on('change', function(){
    $('#workingslider').val($('#workinput').val());
    value = $('#workingslider').val()/8;
    $('#workingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+value+', ' + lightblue +'), color-stop('+value+', ' + darkblue +'))'});  
     $( "#resultcalc" ).fadeOut(2000);
});

// merging as above
$('#relaxinput').on('change', function(){
    $('#relaxingslider').val($('#relaxinput').val());
    value = $('#relaxingslider').val()/8;
    $('#relaxingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+value+', ' + lightblue +'), color-stop('+value+', ' + darkblue +'))'}); 
     $( "#resultcalc" ).fadeOut(2000); 
});


$("#calculate").click(function(event){
	event.preventDefault();
  sithours = parseFloat($('#eatinput').val())+parseFloat($('#comuttinput').val())+parseFloat($('#workinput').val())+parseFloat($('#relaxinput').val());

  switch (true) {
  case (sithours <4): /* do something */ 
      color= lightgreen;
      text=' LOW';
      break;
  case ((sithours >= 4)&& (sithours <6)): /* do something */ 
       color='#FFCB00';
       text=' LOW MEDIUM';
       break;
  case ((sithours >= 6)&& (sithours <8)): /* do something */ 
       color='#CB9800';
       text=' HIGH MEDIUM';
       break;
  case ((sithours >= 8)&& (sithours <11)): /* do something */ 
       color='#EA1E30'
       text=' HIGH';
       break;
  case ((sithours >= 11)&& (sithours <=24)): /* do something */ 
       color='#980000';
       text=' VERY HIGH';
       break;
  case (sithours >24): /* do something */ 
       text='You have indicated total siting hours longer than a 24-hours day! Please correct your select';
       break;
}

  
  if (sithours>24)
    alert(text);
  else
  {
    roundhours=parseInt(sithours);
	jstring=roundhours.toString();
	sithoursstring =sithours.toString();
	lasttwost = sithoursstring.slice(-2);
 

	if (lasttwost=="25") beforeendst = '15';
	   else if(lasttwost==".5") beforeendst = '30';
	      else if(lasttwost=="75") beforeendst = '45';
	         else beforeendst = '00';

	h = ' '+roundhours+ ' Hours';
	if (beforeendst!='00') h= h+' and '+ beforeendst+' Mins';

  

  

  //$( "#resultcalc" ).html('Your risk for \'Sitting Disease\' is '+text +'</br>'+h+'<div id="malepiwo">aaaa</div>');

  

  $( "#resultcalc" ).html('<div class="colfirst"><h5>Your sitting time: </h5> </div><div class="colbox">'+h+'</div><div style="clear: both;"></div>'+
                           '<div class="colfirst"><h5>Your risk level:  </h5></div> <div class="colbox">'+text);
  $( "#resultcalc" ).css({'width':'98%','margin-top':'1%'}); 
  $( ".colbox").css({'background-color':color,
                      'float':'right',
                      'color':'white',
                      'padding':'10px',
                      'width':'50%',
                      'margin-top':'-10px',
                      'text-align':'right'}); 

  $( ".colfirst").css({'float':'left'}); 
  $( "#resultcalc" ).slideDown( "slow" );
  }


});


$("#clearselection").click(function(event){
	event.preventDefault();
	$('#eatinput').val(0);
	$('#eatingslider').val(0);
	$('#eatingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+0+', red), color-stop('+0+',' +lightgreen+'))'     }); 

    $('#comuttinput').val(0);
	$('#comuttingslider').val(0);
	$('#comuttingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+0+', red), color-stop('+0+',' +lightgreen+'))'     }); 

    $('#workinput').val(0);
	$('#workingslider').val(0);
	$('#workingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+0+', red), color-stop('+0+',' +lightgreen+'))'     }); 

    $('#relaxinput').val(0);
	$('#relaxingslider').val(0);
	$('#relaxingslider').css({'background-image':
    '-webkit-gradient(linear, 0% 0%, 100% 0%, color-stop('+0+', red), color-stop('+0+',' +lightgreen+'))'     }); 
    $( "#resultcalc" ).fadeOut(2000);

});




      
       
       
    });
