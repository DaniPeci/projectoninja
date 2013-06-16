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
		<link rel="stylesheet" type="text/css" href="../CSS/estilosPerfil.css" />
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
					if(!empty($_POST)){
     					upload_image('../imgPerfil','uploadImage',$_SESSION['usuario']);
					}
					$consulta="SELECT E.nickname, D.nombre, D.correo, D.direccion, D.cod_postal, D.sexo, D.f_alta, D.f_nacimiento,E.rol FROM usuario E, datos_usuario D WHERE E.id=(SELECT id from usuario where nickname='".$_SESSION['usuario']."') AND D.idUsuario=(SELECT id from usuario where nickname='".$_SESSION['usuario']."');";
					$resultado=mysql_query($consulta) or
					die("No se puede obtener tu información personal en este momento");

					$array = array("Nickname: ", "Nombre: ", "Email: ", "Direccion: ","Código Postal: ","Sexo: ","Fecha de registro: ","Fecha de nacimiento: ","Rol: ");

					echo "<h3 id='titulo'>Perfil de Usuario</h3>";
					echo "<div id='caja'>";
					while($fila=mysql_fetch_array($resultado)){
						for($i=0;$i<9;$i++){
							echo $array[$i]." ".$fila[$i]."<br />";
						}
					}
					if(obtenerImagen($_SESSION['usuario'])){
							$imagen=obtenerImagen($_SESSION['usuario']);
							echo "Imagen: ";
						echo "<img src='../imgPerfil/".$imagen."' height='40' width='40'/><img src='../imagenes/cerrar.png' id='eliminarImagen' name='eliminarImagen' />";
					}
					else{
						echo "<div style='clear: both;'>&nbsp;</div>";
					}
					

					echo '<form id="form1" enctype="multipart/form-data" method="post" action="perfil.php">';
						echo '<input id="uploadImage" name="uploadImage" type="file" />';
						echo '<input id="enviar" name="enviar" type="submit" value="Enviar" />';
					echo '</form> ';
					echo "</div>";
			
					if($_SESSION['rol']=="Administrador")
						{
							echo '<br /><br /><a href="./controlPanel.php"><h3 id="titulo" style="color: gold;">Panel de control</h3></a>';									
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
