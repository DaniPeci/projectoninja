<html lang="es">
	<head>
		<meta charset="UTF-8" />
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
					$("#ventanaRegistro").dialog('option', "z-index", 1002);
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
							<li>
								<a href="http://eu.battle.net/sc2/es/blog/10054894/Comienzan_los_dieciseisavos_de_WCS_Europa-14_05_2013"  target="_blank"><img src="../imagenes/slider/campeonato.jpg" alt="Comienzan los dieciseisavos de WCS Europa" />
									<div class='fondo_slider'></div>
									<div class="slider_texto">
										Comienzan los dieciseisavos de WCS Europa
									</div>

								</a>
							</li>
							<li>
								<a href="http://eu.battle.net/sc2/es/blog/10100892/Requisito_de_Liga_de_maestros_para_la_WCS-31_05_2013"  target="_blank"><img src="../imagenes/slider/maestros.jpg" alt="Requisito de Liga de maestros para la WCS" />
									<div class='fondo_slider'></div>
									<div class="slider_texto">
										Requisito de Liga de maestros para la WCS
									</div>
								</a>
							</li>
							<li>
								<a href="http://eu.battle.net/sc2/es/blog/10054754/Novedad_en_Arcade_Clownzs_Gladiator_Arena-27_05_2013"  target="_blank"><img src="../imagenes/slider/clownzArena.jpg" alt="Novedad en Arcade: Clownz's Gladiator Arena" />
									<div class='fondo_slider'></div>
									<div class="slider_texto">
										Novedad en Arcade: Clownz's Gladiator Arena
									</div>
								</a>
							</li>		
							<li>
								<a href="http://us.battle.net/sc2/es/blog/10145837/Mapas_nuevos_para_la_escala_de_la_4%C2%AA_temporada_del_2013-5_6_2013"  target="_blank"><img src="../imagenes/slider/nuevosMapas.jpg" alt="Mapas nuevos para la escala de la 4ª temporada del 2013" />
									<div class='fondo_slider'></div>
									<div class="slider_texto">
										Mapas nuevos para la escala de la 4ª temporada del 2013
									</div>
								</a>
							</li>
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