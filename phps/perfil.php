<html lang="es">
	<head>
		<meta charset="ISO-8859-1" />
		<title>Foro Starcraft II</title>
		<link href="../imagenes/starcraft-logo.png" rel="shortcut icon" />
		<link rel="stylesheet" type="text/css" href="../CSS/estilos.css" />
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
					$consulta= "SELECT * FROM datos_usuario WHERE idUsuario=(SELECT idUsuario from usuario where nickname='".$_SESSION['usuario']."');";
					$resultado=mysql_query($consulta) or
					die("No se puede obtener tu información personal en este momento");
					$i=0;
					while($fila=mysql_fetch_array($resultado)){
						for($i=2;$i<9;$i++){
							echo $fila[$i]."<br />";
						}
					}
				?>
			</div>
		</div>
	</body>
</html>