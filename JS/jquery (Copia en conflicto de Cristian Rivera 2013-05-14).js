jQuery(function($){
    $( "button:first" ).button({
      icons: {
        primary: "ui-icon-gear",
        secondary: "ui-icon-triangle-1-s"
      },
      text: false
    });
      
      
       
 	$( "#registro" ).click(function(){
      alert('registro');
    	});  
  
    $(document).ready(function(){
 
		$('#menu-web').on('mouseover', function(){
		$('#menu-web').animate({
			backgroundColor: '#B79DE1'
			},
			300
			);
		});
	 $('#menu-web').on('mouseleave', function(){
		$('#menu-web').stop(true).animate({
			backgroundColor: '#59399E'
			}
			); 
		});
	 
  	
  	
		
	 $('#menu-foro').on('mouseover', function(){
		$('#menu-foro').animate({
			backgroundColor: '#B79DE1'
			},
			300
			);
		});
	 $('#menu-foro').on('mouseleave', function(){
		$('#menu-foro').stop(true).animate({
			backgroundColor: '#59399E'
			}
			);
		});
		
		$( "#menu-web" ).click(function(){
      window.location = '/phps/portada.php';
    	});
   $( "#menu-foro" ).click(function(){
      window.location = '/phps/foro.php';
    	});
		});//fin del ready
		
		 });