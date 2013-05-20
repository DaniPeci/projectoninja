<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/estilosLogin.css" />
		<!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script src="../JS/jquery.js"></script>-->
	</head>
<?php

	require_once("config.php");
	
		if(!isset($_REQUEST['logout'])){
			$_REQUEST['logout']=false;
		}
		
		if($_REQUEST['logout']){
			unset($_SESSION);
			session_destroy();
	
		}
		$usuarioCorrecto=false;
		
	
		if(isset($_SESSION['usuario'])){
			$usuarioCorrecto=true;
		
		}
	
	
	
		if(!empty($_POST['user']) && !empty($_POST['passwd'])){
		$datos=obtenerDatosUsuario();
		$usuarioCorrecto=validarDatos($datos);
		
		
		
		if($usuarioCorrecto){
			$datos=obtenerDatosUsuario();
			$fila=mysql_fetch_array($datos);
			$_SESSION['usuario']=$fila[2];
			$_SESSION['idUsuario']=$fila[0];
			$_SESSION['rol']=$fila[3];
			$_SESSION['tiempo']=time();
			$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			echo "Estás logueado como <strong>".$_SESSION['usuario']."</strong><br />";
			echo "Tipo de usuario: <strong>".$_SESSION['rol']."</strong><br />";
			$cadena = $_SERVER['REQUEST_URI'];
			$letra   = '?';
			$pos = strpos($cadena, $letra);
			if ($pos === false) {
				?>
				<input type="image" src="../imagenes/logout.png" height="40px" width="40px" value="login" class="botones" onclick="location.href='logout.php'"/> 
				<?php
				
			} else {
			
				?>
				<input type="image" src="../imagenes/logout.png" height="40px" width="40px" value="login" class="botones" onclick="location.href='logout.php'"/>
				<?php
			}
			
			
			}else{
				echo "Combinación de usuario y contraseña incorrectos";
				unset($_SESSION);
			}
		
		
		
	}else if($usuarioCorrecto){
			$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			echo "Estás logueado como <strong>".$_SESSION['usuario']."</strong><br />";
			echo "Tipo de usuario: <strong>".$_SESSION['rol']."</strong><br />";
			$cadena = $_SERVER['REQUEST_URI'];
			$letra   = '?';
			$pos = strpos($cadena, $letra);
			
			if ($pos === false) {
				?>
				<input type="image"  src="../imagenes/logout.png" height="40px" width="40px" value="login" class="botones" onclick="location.href='logout.php'"/>
				<?php
				
			} else {

				?>
				<input type="image"  src="../imagenes/logout.png" height="40px" width="40px" value="login" class="botones" onclick="location.href='logout.php'"/>
				<?php
			}
			
		
	}

	if(!isset($_SESSION['usuario'])){
		//Recordar cambiar el action del formulario
		$usuarioCorrecto=false;
	?>
	<body>
		<?php
			$urls=$_SERVER['REQUEST_URI'];
		echo '<form id="formulario" method="post" action="'.$urls.'">'
		?>
			<label>Username:<input type="text" id="username" name="user" size="10" /></label><br />
			<label>Password:<input type="password" id="password" name="passwd" size="10" /></label><br />
			<input type="image" src="../imagenes/login.png" height="40px" width="40px" value="login" class="botones" > <input type="submit" value="Login"  id="boton" /> </input>
			<div id="botonRegistro"><img  src="../imagenes/registrarse2.png" height="30%" width="30%" id="registro" /></div>
		</form>
	</body>
<?php
	}
	function validarDatos($datos){
		$correcto=false;
		$fila=mysql_fetch_array($datos);
		if($fila[0]===$fila[1] && $fila[0]!=""){
			$correcto=true;
		}
		
		return $correcto;
		
	}
	
	
	function obtenerDatosUsuario(){
		//realizamos la consulta
		$nombre=strtolower($_POST['user']);
		$corte=substr($nombre,0,2);
		$passwd=crypt($_POST['passwd'],$corte);
		
		$query=mysql_query("SELECT usuario.id, datos_usuario.idUsuario, usuario.nickname, usuario.rol from usuario, datos_usuario WHERE usuario.nickname='".$nombre."'AND datos_usuario.password='".$passwd."';") or
		die("No se puede realizar la consulta ".mysql_error());
		
		return $query;
	
	}
?>
</html>