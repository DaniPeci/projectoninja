<?php
	//Este archivo se utiliza sólo en las páginas en las que se deba estar logueado
	comprobarLogin();
	include_once "config.php";

	function mostrarForos()
	{
		$consulta = mysql_query("SELECT * FROM categoria");
		while($resultado = mysql_fetch_array($consulta)){
			
		if($resultado['idCategoria']%2 !=0){
		echo "<a href='categoria.php?id=".$resultado['idCategoria']."'>";
		echo "<div class='cat-izq' id='categoria".$resultado['idCategoria']."'data-id='".$resultado["idCategoria"]."'>".$resultado["nombre"];
			echo '<br/><img src="../imagenes/'.$resultado['nombre'].'.png"/>';
			echo "<div class='derechaFondo'></div>";
		echo "</div>";
		echo "</a>";
		}
		else {
		echo "<a href='categoria.php?id=".$resultado['idCategoria']."'>";
		echo "<div class='cat-der' id='categoria".$resultado['idCategoria']."'data-id='".$resultado["idCategoria"]."'>".$resultado["nombre"];
		echo '<br/><img src="../imagenes/'.$resultado['nombre'].'.png"/>';
			echo "<div class='derechaFondo'></div>";
		echo "</div>";
		echo "</a>";
			}
		}
	}
	
	
	function comprobarLogin(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("Location: ../index.php");
        }else{
		
		$tiempo=time();
		$tiempoTranscurrido=$tiempo-$_SESSION['tiempo'];
			if($tiempoTranscurrido>=900){
				destruirSesion();
			}else{$_SESSION['tiempo']=time();}
		}
    }
	
	 function destruirSesion(){
		session_unset();
        session_destroy();
        header("Location: ../index.php");
    }

     function upload_image($destination_dir,$name_media_field,$file_name){
        $tmp_name = $_FILES[$name_media_field]['tmp_name'];
        //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
        if ( is_dir($destination_dir) && is_uploaded_file($tmp_name) &&  $_FILES[$name_media_field]['size']<1000000) 
        {        
            $img_file  = $_FILES[$name_media_field]['name'] ;                      
            $img_type  = $_FILES[$name_media_field]['type'];   
            //¿es una imágen realmente?           
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") || strpos($img_type,"jpg")) || strpos($img_type,"png") )){
                //¿Tenemos permisos para subir la imágen?
                if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){   
                	if(substr($img_type, -3)!="peg"){
                		$nuevoNombre=$destination_dir.'/'.$file_name.".".substr($img_type, -3);
                		rename($destination_dir.'/'.$img_file,$nuevoNombre); 
                		$consulta="UPDATE datos_usuario SET imagenPerfil='".$file_name.".".substr($img_type, -3)."' WHERE idUsuario=(SELECT id FROM usuario WHERE nickname='".$_SESSION['usuario']."');";

                	}else{
                		$nuevoNombre=$destination_dir.'/'.$file_name.".".substr($img_type, -4);
                		rename($destination_dir.'/'.$img_file,$nuevoNombre);      
                		$consulta="UPDATE datos_usuario SET imagenPerfil='".$file_name.".".substr($img_type, -4)."' WHERE idUsuario=(SELECT id FROM usuario WHERE nickname='".$_SESSION['usuario']."');";
                	}
                	mysql_query($consulta) or die("No se puede insertar la imagen en la BD".mysql_error());
                    return true;
                }
            }
        }else{echo "<script>alert('No puede subirse una imagen tan grande')</script>";}
        //si llegamos hasta aquí es que algo ha fallado
        return false; 
    }//end function

    function obtenerImagen($usuario){

    	$consulta="SELECT imagenPerfil FROM datos_usuario WHERE idUsuario=(SELECT id FROM usuario WHERE nickname='".$usuario."');";
    	$resultado=mysql_query($consulta);
    	$valor=false;
    	if(mysql_affected_rows()!=0){
    		while ($fila=mysql_fetch_array($resultado)){
    			$valor=$fila[0];
    		}
    	}

    	return $valor;

    }

    function eliminarImagen($usuario){
    	$consulta1="SELECT imagenPerfil FROM datos_usuario WHERE idUsuario=(SELECT id FROM usuario WHERE nickname='".$usuario."');";
    	$resultado1=mysql_query($consulta1);
    	$valor="";
    	while ($fila=mysql_fetch_array($resultado1)){
    			$valor=$fila[0];
    		}
    	$consulta2="UPDATE datos_usuario SET imagenPerfil='' WHERE idUsuario=(SELECT id FROM usuario WHERE nickname='".$usuario."');";
    	$resultado2=mysql_query($consulta2) or die(mysql_error());
    	unlink("../imgPerfil/".$valor);

    }
    //Recepción por ajax para eliminar imágen de perfil
    if(isset($_POST['eliminarImagen'])){
    	eliminarImagen($_POST['eliminarImagen']);
    }
?>