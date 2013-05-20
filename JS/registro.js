var valido=false;
var valido2=false;
var nombreCorrecto=false;

function validarUsuario(usuario){

			var url = 'validarusuario.php';

			var parametros='usuario='+usuario.value;
		
			//var ajax = new Ajax.Updater('comprobarusuario',url,{method: 'get', parameters: parametros});

			 $.ajax({

                data:  parametros,

                url:   url,

                type:  'get',

                beforeSend: function () {
                        $("#comprobarusuario").html("<img src='../imagenes/cargando.gif' />");
                },

                success:  function (response) {

                        $("#comprobarusuario").html(response);
                }
        });
}

function botonRegistro(boleano, boleano2, boleano3){
	if(boleano && boleano2 && boleano3){
		$("#enviar").removeAttr("disabled");
	}else{
		$("#enviar").attr("disabled","disabled");
		}
	

}

		
$(document).ready(function(){
	
		
	$("#passwordRegistro").keyup(function(){
		var pass=$(this).val();
		var pass2=$("#pwRegistro2").val();
		if(pass===pass2 && pass!="" && pass2!=""){
			$("#correcto").html("<img src='../imagenes/correcto.gif'/>");
			valido=true;
			
		
		}else{
			$("#correcto").html("<img src='../imagenes/cerrar.png'/>");
			valido=false;
		
		}
		botonRegistro(valido, valido2, nombreCorrecto);
	});
	
	$("#pwRegistro2").keyup(function(){
		var pass2=$(this).val();
		var pass=$("#passwordRegistro").val();
		if(pass===pass2 && pass!="" && pass2!=""){
			$("#correcto").html("<img src='../imagenes/correcto.gif'/>");
			valido=true;
			
		
		}else{
			$("#correcto").html("<img src='../imagenes/cerrar.png'/>");
			valido=false;
		
		}
		botonRegistro(valido, valido2, nombreCorrecto);
	});
	
	$("#postal").on("keyup change", function(){
		var expresion=/^[0-9]{5}$/
		var correcto=expresion.test($(this).val());
		if(!correcto){
			$(this).addClass("bordeRojo");
			valido2=false;
			
		}else{
			$(this).removeClass("bordeRojo");
			valido2=true;
			
		}
		botonRegistro(valido, valido2, nombreCorrecto);
	});
	
	
	
	
});