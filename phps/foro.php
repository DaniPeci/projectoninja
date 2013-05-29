<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script src="../JS/jquery.js"></script>
		<script src="../JS/javascript.js">
		</script>	
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
				<div id="menu-web">
				<img src="../imagenes/home.png" height="15px" width="15px" />
							INICIO	
				</div>
				<div id="menu-foro">
				<img src="../imagenes/foro1.png" height="15px" width="15px" />
							FORO	
				</div>		
			</div>
				<?php
					mostrarForos();
					?>
			</div>
			
			<div id="columna-der">
			<div id="login">
			<?php
			include_once('/login.php');
			?>	
			</div>
			<div id="espacio">
			<button>sadasd</button>
				<?php
						include_once "listaStream.php";
				?>
			</div>
		
		</div>
		</div>
	</body>
</html>
