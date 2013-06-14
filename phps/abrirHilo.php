<link href="../CSS/estilos_respuestas.css" type="text/css" rel="stylesheet">


<html lang="es">
	<head>
		<meta charset="UTF-8" />
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
	  
	$tema=$_REQUEST['tema'];
	include_once('config.php');
	
	$consulta="update tema set cerrado=0 where idTema=$tema";
		$datos=mysql_query($consulta,$conexion) or die ('Se ha producido un error.');
		
	$url="./tema.php?tema=".$tema;	
	echo "<table style='text-align: center;'><tr><th>Acaba de abrir el Tema<th></tr>";
	echo '<tr><td><u><a href='.$url.'>IR AL TEMA</a></u></td></tr></table>';
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