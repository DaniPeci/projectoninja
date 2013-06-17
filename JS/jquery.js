jQuery(function($){
   
      $("#eliminarImagen").click(function(){
      confirm('¿Estás seguro de querer eliminar tu imagen de perfil?');
    	});
    	
      $("#eliminarhilo").click(function(){
      confirm('¿Estás seguro de querer eliminar el hilo?');
    	});
    	
    $( "#menu-web" ).click(function(){
      window.location = 'portada.php';
    	});
    	
    $( "#menu-foro" ).click(function(){
      window.location = 'foro.php';
    	});
    	
    	$("#despliegaRellenable").click(function(){
       //$(".contenido_respuesta").css("display", "block");
		$(".contenido_respuesta").show('slow');
    	});
    	
    	$("#ancladespliegue").click(function(){
		$(".contenido_respuesta").show('slow');
    	});
    	
    	 $("#contenido").keypress(function(){
       if($("#contenido").val()!=""){
       	$("#enviarRespuesta").prop("disabled", false);  	
       	}
		
    	});  
 	 $("#contenido").keypress(function(){
       if($("#contenido").val()!=""&&$("#titulo").val()!=""){
       	$("#enviarTema").prop("disabled", false);
       	}
		
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
		});//fin del ready
		
		 });


    function eliminarImgPerfil(usuario){
    	$.ajax({
		  type: "POST",
		  url: "../phps/funciones.php",
		  data: "eliminarImagen="+usuario
		});
		location.reload();
    }