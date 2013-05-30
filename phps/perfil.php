<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilosPerfil.css" />
		<script src="../JS/jquery.js"></script>
		<?php
			include_once "config.php";
			include_once "funciones.php";
		?>
	</head>
	<body>
		<div id="contenedor">
			<div id="foros">
				<?php
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
					echo "</div>";


					echo "<div id='input'>";
					while($fila=mysql_fetch_array($resultado)){
						for($i=0;$i<9;$i++){
							echo $fila[$i]."<br />";
						}
					}
					echo "</div>";
			
				?>
			</div>
		</div>
	</body>
</html>