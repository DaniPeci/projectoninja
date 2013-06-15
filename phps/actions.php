<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<script type="text/javascript">

			$(function(){
				$("#eliminarImagen").click(function(){
				
					eliminarImgPerfil(usuario);
				
				});
			});//Fin del ready
		</script>	
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
			echo "var usuario='".$_SESSION['usuario']."';";
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
					if($_SESSION['rol']=='Administrador')
					{
						if(isset($_REQUEST['rol_usuario']))
						{
							//ACCIONES DE CAMBIO DE ROL DE USUARIO
							$usuario = $_REQUEST['usuarios'];
							$nuevo_rol = $_REQUEST['rol_usuario'];
							$consulta2=mysql_query("UPDATE usuario set rol='".$nuevo_rol."' where nickname='".$usuario."'");
							$datos=mysql_query($consulta2,$conexion);
							echo "<table class='tablaForo' style='text-align: center;'><tr><td colspan='2'>El usuario ".$usuario." ha cambiado su rol a: ".$nuevo_rol."</td></tr></table>";
						}else if(isset($_REQUEST['eliminar']))
						{
							//ACCIONES DE ELIMINACION DE USUARIO
							$usuario = $_REQUEST['usuarios'];
							$consulta2=mysql_query("UPDATE usuario set rol='Bloqueado' where nickname='".$usuario."'");
								$datos=mysql_query($consulta2,$conexion);
								echo "<table class='tablaForo' style='text-align: center;'><tr><td colspan='2'>El usuario ".$usuario." ha sido desactivado.</td></tr></table>";
						}else if(isset($_REQUEST['activar']))
						{
							//ACCIONES DE ACTIVACION DE USUARIOS
							$usuario = $_REQUEST['usuarios'];
							$consulta2=mysql_query("UPDATE usuario set rol='Miembro' where nickname='".$usuario."'");
							$datos=mysql_query($consulta2,$conexion);
							echo "<table class='tablaForo' style='text-align: center;'><tr><td colspan='2'>El usuario ".$usuario." ha sido activado.</td></tr></table>";
						}
					}else
					{
						echo "No tiene acceso a esta web";
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
							include_once "twitter.php";
						?>
			</div>
		
		</div>
		</div>
	</body>
</html>
