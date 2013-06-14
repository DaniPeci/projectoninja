<html>
	<head>
		<title>Starcraft II</title>
		<link rel="stylesheet" type="text/css" href="../CSS/estilosRegistro.css" />

		<!--<script src="../JS/jquery-1.9.1.min.js"></script>-->
		<script src="../JS/registro.js"></script>
	</head>
	<body>
		<form action="registrarUsuario.php" method="post" style="line-height: 20px;padding: 10px;">
			<label>Nickname: <input type="text" name="usuario" onblur="validarUsuario(this)" /></label><span id="comprobarusuario"></span><br />
			<label>Contraseña: <input type="password" name="passwd" id="passwordRegistro" /></label><br />
			<label>Repite la Contraseña: <input type="password" name="passwd2" id="pwRegistro2" /></label><span id="correcto"></span><br />
			<label>Nombre: <input type="text" name="nombre" /></label><br />
			<label>Sexo: <input type="radio" name="sexo" value="h" checked="checked"/>Hombre
			<input type="radio" name="sexo" value="m"/>Mujer</label><br />
			<label>Email: <input type="email" name="mail" id="mail"/></label><br />
			<label>Dirección: <input type="text" name="direccion" /></label><br />
			<label>Cod_postal: <input type="text" name="c_postal" id="postal" /></label><br />
			<label>Fecha de nacimiento: <input type="date" name="f_nac" /></label><br />
			<input type="submit" disabled="disabled" value="Registro" id="enviar" />
		</form>
	</body>

</html>