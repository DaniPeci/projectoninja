<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
		<link rel="stylesheet" type="text/css" href="../CSS/screen.css" />
		<link rel="stylesheet" href="../JS/jquery-ui-1.10.3/themes/base/jquery-ui.css" />
		<script src="../JS/jquery-1.9.1.min.js"></script>
		<script src="../JS/jquery-ui-1.10.3/ui/jquery-ui.js"></script>
		<script src="../JS/jquery.js"></script>
		<script type="text/javascript" src="../JS/easySlider1.7.js"></script>
		<script>
			$(function() {
				$("#ventanaRegistro").dialog({
					autoOpen: false,
					height: 400,
					 width: 500,
					 modal: true
				});
				$("#botonRegistro").click(function(){
					$("#ventanaRegistro").dialog("open");
				
				});

				$("#slider").easySlider({
					auto: true, 
					continuous: true,
					pause: 4000
				});
				
			});
		</script>
	</head>
	<body>
		<?php
			require_once("config.php");
			//include_once('funciones.php'); No se utiliza en este archivo
			session_start();
			
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
			<!--Espacio Principal-->	
				<div id="content">
					<div id="slider">
						<ul>				
							<li><a href="http://eu.battle.net/sc2/es/blog/10054894/Comienzan_los_dieciseisavos_de_WCS_Europa-14_05_2013"  target="_blank"><img src="../imagenes/slider/campeonato.jpg" alt="Campeonato Mundial" /></a></li>
							<li><a href="http://eu.battle.net/sc2/es/blog/10100892/Requisito_de_Liga_de_maestros_para_la_WCS-31_05_2013"  target="_blank"><img src="../imagenes/slider/maestros.jpg" alt="Requisitos liga maestros SC2" /></a></li>
							<li><a href="http://eu.battle.net/sc2/es/blog/10054754/Novedad_en_Arcade_Clownzs_Gladiator_Arena-27_05_2013"  target="_blank"><img src="../imagenes/slider/clownzArena.jpg" alt="Clownz Gladiator Arena" /></a></li>		
						</ul>
					</div>
				</div>

			

			</div>
			
			<div id="columna-der">
			<div id="login">
			<?php
			include_once('login.php');
			?>	
			</div>
			<div id="espacio">
					<?php
						include_once "listaStream.php";
						include_once "twitter.php";
					?>


			</div>
		
		</div>
		</div>
		<div id="ventanaRegistro" title="Registro">
			<?php
				include_once("registro.php");
			?>
		</div>
	</body>
	
</html>