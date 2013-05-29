<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilosCategoria.css" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script src="../JS/jquery.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	</head>
	<body>
		<?php
			require_once("config.php");
			include_once('funciones.php'); //Por ahora desde aqui no se usa funciones.php
			
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
					// A PARTIR DE AQUI REALIZAMOS EL MUESTREO DEL HILO
					$tema=$_GET['tema'];
					
					
					
					$nombre_tema;
					//Obtenemos el nombre del tema
					$consulta=mysql_query("SELECT nombre,usuario,texto,f_creacion from tema where idTema=".$tema);
					while($fila=mysql_fetch_array($consulta))
					{
						$nombre_tema=$fila[0];
						$id_creador=$fila[1];
						$texto=$fila[2];
						$fecha=$fila[3];
						$nombre_creador;
						$consulta2=mysql_query("SELECT nickname from usuario where id=".$id_creador);
						while($fila2=mysql_fetch_array($consulta2))
						{
							$nombre_creador=$fila2[0];
						}
						$consulta2=mysql_query("SELECT nombre,usuario,texto,f_creacion from tema where idTema=".$tema);
						
						
						echo "<table border='1' class='respuestas'><tr><th>Usuario</th><th>".$nombre_tema."</th></tr>";
						
						if(isset($_GET['page']))
						{
								if($_GET['page']==1)
							{
								$rows_per_page= 9;
								echo "<tr><td>".$nombre_creador."</td><td>".$texto."<br /><br />Creado el: ".$fecha."</td></tr>";
							}else
							{
								$page= $_GET['page'];
								$rows_per_page= 10;
							}
						}
						else
						{
							$page=1;
							$rows_per_page= 9;
							echo "<tr><td>".$nombre_creador."</td><td>".$texto."<br /><br />Creado el: ".$fecha."</td></tr>";
						}
						
					}
					//Creando todas las respuestas al hilo
					$consulta=mysql_query("SELECT idUsuario,texto,f_creacion from respuesta where idTema=".$tema);
					
					include_once('paginacionRespuestas.php');
					?></table><br/>		
						<?php
						if(!isset($_REQUEST['usuario'])){
											
					?>
					
					<div class="contenedor_respuesta">
						<img src="../imagenes/responder.png" alt="Nueva respuesta" id="despliegaRellenable" />
						<div class="contenido_respuesta"><br />
							<table class="tabla_nueva">
							<form method="post" action="nuevaRespuesta.php">
							<input type="hidden" value="<?php echo $_SESSION['idUsuario']?>" name="idUsuario" />
							<input type="hidden" value="<?php echo $_REQUEST['tema'] ?>" name="idTema" />
								<tr><td>Contenido</td><td><textarea id="contenido" rows="12" cols="45" name="contenido"></textarea></td></tr>
								<tr><td></td><td><input type="image" src="../imagenes/send.jpg" value="enviar" id="enviarRespuesta" disabled="disabled" ><input type="submit" src="../imagenes/send.jpg" value="Enviar"  style="display:none;" /></input></td></tr>
							</form>
							</table>
						</div>
					</div>
						<?php					
						}
					?>
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
				?>

			</div>
		
		</div>
		</div>
	</body>
</html>
