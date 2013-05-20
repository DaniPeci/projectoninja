<?php
	if(isset($_REQUEST['contenido'])&&(isset($_REQUEST['idUsuario']))&&(isset($_REQUEST['idTema'])))
	{
		echo "Entrado en el bucle";
		//CREANDO LA FECHA EN PHP
		$fecha=date('Y-m-d H:i:s');
		$texto=htmlspecialchars($_REQUEST['contenido']);
		$usuario=$_REQUEST['idUsuario'];
		$tema=$_REQUEST['idTema'];
		$textoHtml=htmlspecialchars($texto);
		require_once("config.php");
		
		$consulta="INSERT into respuesta(texto,idUsuario,idTema,f_creacion) values('".$texto."',".$usuario.",".$tema.",'".$fecha."')";
		echo $consulta;
		$datos=mysql_query($consulta,$conexion) or die ('Se ha producido un error.');
	}

?>