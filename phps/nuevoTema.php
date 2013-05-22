<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilosCategoria.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script src="../JS/jquery.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	</head>
	<body>
		<?php
			require_once("config.php");
			include_once('funciones.php');
			
		?>
		<div id="contenedor">
			<div id="cabecera">
		<img src="../imagenes/logo3.png"/>
			</div>
			<div id="foros">
			<div id="menu">
				<div id="menu-web" class="meniu">
				<img src="../imagenes/home.png" height="15px" width="15px" />
							INICIO	
				</div>
				<div id="menu-foro" class="meniu">
				<img src="../imagenes/foro1.png" height="15px" width="15px" />
							FORO
				</div>		
			</div>
				
				<?php
	if(isset($_REQUEST['categoria'])&&(isset($_REQUEST['titulo']))&&(isset($_REQUEST['contenido']))&&(isset($_REQUEST['usuario'])))
	{
		//CREANDO LA FECHA EN PHP
		$fecha=date('Y-m-d H:i:s');
		$categoria=($_REQUEST['categoria']);
		$nombre=($_REQUEST['titulo']);
		$texto=($_REQUEST['contenido']);
		$usuario=($_REQUEST['usuario']);
		require_once("config.php");
		
		
		$consulta="INSERT into tema(idCategoria,nombre,texto,f_creacion,usuario) values(".$categoria.",'".$nombre."','".$texto."','".$fecha."','".$usuario."')";
		$datos=mysql_query($consulta,$conexion);
	}
				
	require_once("config.php");
	$ultimo_tema = mysql_query("SELECT MAX(idTema) FROM tema");
		while($ultimo=mysql_fetch_array($ultimo_tema))
		{
			$last=$ultimo[0];
		} 
		
	$url_tema= "./tema.php?tema=".$last;
	$url_volver="./categoria.php?id=".$categoria;
	echo $url_volver;
	echo "<table style='text-align: center;'><tr><th colspan='2'>Felicidades, acaba de registrar un nuevo tema<th></tr>";
	echo '<tr><td><u><a href='.$url_tema.'>IR AL TEMA</a></u></td><td><u><a href='.$url_volver.'>VOLVER ATRAS</a></u></td></tr></table>';
?>
				
			</div>
			
			
			
			<div id="columna-der">
			<div id="login">
			<?php
			include_once('login.php');
			?>	
			</div>
			<div id="espacio">
			
			</div>
		
		</div>
		</div>
	</body>
</html>
