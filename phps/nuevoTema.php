<?php
	if(isset($_REQUEST['categoria'])&&(isset($_REQUEST['titulo']))&&(isset($_REQUEST['contenido']))&&(isset($_REQUEST['usuario'])))
	{
		echo "Dentro del bucle";
		//CREANDO LA FECHA EN PHP
		$fecha=date('Y-m-d H:i:s');
		$categoria=($_REQUEST['categoria']);
		$nombre=($_REQUEST['titulo']);
		$texto=($_REQUEST['contenido']);
		$usuario=($_REQUEST['usuario']);
		require_once("config.php");
		
		
		$consulta="INSERT into tema(idCategoria,nombre,texto,f_creacion,usuario) values(".$categoria.",'".$nombre."','".$texto."','".$fecha."','".$usuario."')";
		echo $consulta;
		$datos=mysql_query($consulta,$conexion);
	}
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	header("Location: ".$url."");
?>