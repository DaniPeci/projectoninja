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
					//A PARTIR DE AQUI REALIZAMOS EL LISTADO DE LOS HILOS, INCLUYENDO EN PRIMERA INSTANCIA EL NOMBRE DE LA CATEGORIA
					$categoria=$_GET['id'];
					/*RECOGIDA DEL TITULAR DE LA CATEGORIA*/
					$consulta=mysql_query("SELECT nombre from categoria where idCategoria=".$categoria);
					while($fila=mysql_fetch_array($consulta))
					{
						echo "<h1 align='center' style='color: white;'>".$fila[0]."</h1>"; //Editar el estilo
					}
					?>
					<a href="#despliegaRellenable"  ><img src="../imagenes/nuevoTema.png" alt="nuevo tema" id="anclaDespliegue" /></a>
					<?php
					//AQUI EMPIEZA LA INCLUSION DE LOS TEMAS DEL FORO
					echo "<table border='10px' class='hilos'><tr><th>Tema</th><th>Ultima respuesta</th></tr>";
					$consulta=mysql_query("SELECT t.nombre,t.usuario,idTema from tema t where t.idCategoria=".$categoria);
					//PAGINACION DE LOS TEMAS DE LA CATEGORIA EN CUESTION
					include_once('paginacionCategorias.php');
					
					
					?></table><br/>
					<?php
						if(!isset($_REQUEST['usuario'])){
											
					?>
					
					<div class="contenedor_respuesta">
						<img src="../imagenes/nuevoTema.png" alt="nuevo tema" id="despliegaRellenable" />
						<div class="contenido_respuesta"><br/>
							<table class="tabla_nueva">
							<?php 
									$direccion= "?nombre=".$_SESSION['usuario']."&categoria=".$categoria."";
								?>
							<form method="post" action="nuevoTema.php">
								<input type="hidden" value="<?php echo $_SESSION['idUsuario']?>" name="usuario" />
								<input type="hidden" value="<?php echo $categoria?>" name="categoria" />
								<tr><td>Titulo</td><td><input type="text" id="titulo" size="50"name="titulo" /></td></tr>
								<tr><td>Contenido</td><td><textarea id="contenido" rows="12" cols="45" name="contenido"></textarea></td></tr>
								<tr><td></td><td><input type="image" src="../imagenes/send.jpg" value="enviar" id="enviarTema" disabled="disabled" ><input type="submit" src="../imagenes/send.jpg" value="Enviar"  style="display:none;" /></input></td></tr>
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
			
			</div>
		
		</div>
		</div>
	</body>
</html>
