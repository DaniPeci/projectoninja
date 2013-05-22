<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
		<link rel="stylesheet" href="../JS/jquery-ui-1.10.3/themes/base/jquery-ui.css" />
		<!--<link rel="stylesheet" type="text/css" href="../CSS/slide/camera.css" />-->
		<script src="../JS/jquery-1.9.1.min.js"></script>
		<script src="../JS/jquery-ui-1.10.3/ui/jquery-ui.js"></script>
		<script src="../JS/jquery.js"></script>
		<!--<script src="../JS/slide/jquery.easing.1.3.js"></script>
		<script src="../JS/slide/jquery.mobile.customized.min.js"></script>
		<script src="../JS/slide/camera.min.js"></script>-->
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
				
		
			</div>
			
			<div id="columna-der">
			<div id="login">
			<?php
			include_once('login.php');
			?>	
			</div>
			<div id="espacio">
				<button>sadasd</button><br />
				<?php
						$stream_list = "sc2sage,egstephano"; 
						//Hay que activar curl en php para que funcione
						$mycurl = curl_init();

						curl_setopt ($mycurl, CURLOPT_HEADER, 0);
						curl_setopt ($mycurl, CURLOPT_RETURNTRANSFER, 1); 

						//Build the URL 
						$url = "http://api.justin.tv/api/stream/list.json?channel=" . $stream_list; 
						curl_setopt ($mycurl, CURLOPT_URL, $url);

						$web_response =  curl_exec($mycurl); 

						$results = json_decode($web_response); 
						echo "<ul id='listaStreams'>";
						$i=0;
						foreach($results as $s) {
							echo "<li>".$s->channel->title."<img src='../imagenes/live.gif'></img></li>";
						
						$i++;
						/* echo $s->title . "\n";
						 echo $s->channel_count . " viewers watching\n";
						 echo $s->channel->screen_cap_url_large . " is the url for the screen capture\n";*/
						}
						echo "</ul>";

				?>
			
			
			<!-- <iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=covalent&popout_chat=true" height="301" width="221"></iframe>-->
			
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
