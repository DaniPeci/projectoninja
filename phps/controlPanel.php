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
					//AQUI COMPROBACION DE ROL Y CREACION DEL CONTROL PANEL
					if($_SESSION['rol']=='Administrador')
					{
						
						//CREACION DE DDL DINAMICO
						echo "<div>";
						echo "<form action='actions.php' method='post'>";
						echo "<h3>Administracion de usuarios</h3>";
						$consulta2=mysql_query("SELECT nickname from usuario");
						echo "<label>Selecciona usuario: <select id='usuarios' name='usuarios'>";
						while($fila=mysql_fetch_array($consulta2))
						{
							$usu = $fila['nickname'];
							if($usu!=$_SESSION['usuario'])
							{
								echo "<option value='".$usu."'>".$usu."</option>";
							}
						}
						echo "</select></label><br /><br />";
						echo "<label>Selecciona rol: <select id='rol_usuario' name='rol_usuario'><option value='Administrador'>Administrador</option>";
						echo "<option value='Moderador'>Moderador</option><option value='Miembro' selected='selected'>Miembro</option></select></label>";
						echo "<br /><input type='submit' value='Establecer Rol' />";
						echo "</form>";
						echo "</div>";
						echo "<div>";
						echo "<form action='actions.php' method='post'>";
						echo "<h3>Borrado de usuarios</h3>";
						$consulta2=mysql_query("SELECT nickname from usuario where rol!='Bloqueado'");
						echo "<label>Selecciona usuario: <select id='usuarios' name='usuarios'>";
						while($fila=mysql_fetch_array($consulta2))
						{
							$usu = $fila['nickname'];
							if($usu!=$_SESSION['usuario'])
							{
								echo "<option value='".$usu."'>".$usu."</option>";
							}
						}
						echo "</select></label><br /><br />";
						echo "<input type='hidden' name='eliminar' value='eliminar' />";
						echo "<input type='submit' value='Bloquear usuario' />";
						echo "</form>";
						echo "</div>";
												echo "<div>";
						echo "<form action='actions.php' method='post'>";
						echo "<h3>Borrado de usuarios</h3>";
						$consulta2=mysql_query("SELECT nickname from usuario where rol='Bloqueado'");
						echo "<label>Selecciona usuario: <select id='usuarios' name='usuarios'>";
						while($fila=mysql_fetch_array($consulta2))
						{
							$usu = $fila['nickname'];
							if($usu!=$_SESSION['usuario'])
							{
								echo "<option value='".$usu."'>".$usu."</option>";
							}
						}
						echo "</select></label><br /><br />";
						echo "<input type='hidden' name='activar' value='activar' />";
						echo "<input type='submit' value='Activar usuario' />";
						echo "</form>";
						echo "</div>";
					}
					else
					{
						echo "No tienes permiso para acceder al panel de control";
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
