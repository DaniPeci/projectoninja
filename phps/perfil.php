<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilosPerfil.css" />
		<script src="../JS/jquery-1.9.1.min.js"></script>
		<script src="../JS/jquery.js"></script>
		<?php
			include_once "config.php";
			include_once "funciones.php";
		?>
		<script type="text/javascript">
		<?php
			echo "var usuario='".$_SESSION['usuario']."';";
		?>
			$(function(){
				$("#eliminarImagen").click(function(){
				
					eliminarImgPerfil(usuario);
				
				});
			});//Fin del ready
		</script>


	</head>
	<body>
		<div id="contenedor">
			<div id="foros">
				<?php
					if(!empty($_POST)){
     					upload_image('../imgPerfil','uploadImage',$_SESSION['usuario']);
					}
					$consulta="SELECT E.nickname, D.nombre, D.correo, D.direccion, D.cod_postal, D.sexo, D.f_alta, D.f_nacimiento,E.rol FROM usuario E, datos_usuario D WHERE E.id=D.idUsuario=(SELECT idUsuario from usuario where nickname='".$_SESSION['usuario']."');";
					$resultado=mysql_query($consulta) or
					die("No se puede obtener tu información personal en este momento");

					echo "<div id='texto'>";
						echo "<label for='nick'>Nombre de usuario: </label><br />";
						echo "<label for='nombre'>Nombre: </label><br />";
						echo "<label for='email'>E-mail: </label><br />";
						echo "<label for='direc'>Direccion: </label><br />";
						echo "<label for='cPostal'>Codigo Postal: </label><br />";
						echo "<label for='sexo'>Sexo: </label><br />";
						echo "<label for='fRegistro'>Fecha de registro: </label><br />";
						echo "<label for='fNacimiento'>Fecha de nacimiento: </label><br />";
						echo "<label for='Permisos'>Permisos: </label><br />";
						echo "<label for='uploadImage'>Imagen de perfil: </label>";
						if(obtenerImagen($_SESSION['usuario'])){
							$imagen=obtenerImagen($_SESSION['usuario']);
						echo "<img src='../imgPerfil/".$imagen."' height='40' width='40'/><img src='../imagenes/cerrar.png' id='eliminarImagen' name='eliminarImagen' />";
						}
					echo "</div>";


					echo "<div id='input'>";
					while($fila=mysql_fetch_array($resultado)){
						for($i=0;$i<9;$i++){
							echo $fila[$i]."<br />";
						}
					}

					echo '<form id="form1" enctype="multipart/form-data" method="post" action="perfil.php">';
						echo '<input id="uploadImage" name="uploadImage" type="file" />';
						echo '<input id="enviar" name="enviar" type="submit" value="Enviar" />';
					echo '</form> ';
					echo "</div>";
			
				?>
			</div>
		</div>
	</body>
</html>