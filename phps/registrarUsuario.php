
	
<?php
	//RECOGIDA DEL FORMULARIO
	$nickname = $_REQUEST['usuario'];
	$passwd = $_REQUEST['passwd'];
	$nombre = $_REQUEST['nombre'];
	$mail = $_REQUEST['mail'];
	$dir = $_REQUEST['direccion'];
	$cp = $_REQUEST['c_postal'];
	$f_nac = $_REQUEST['f_nac'];
	$sexo = $_REQUEST['sexo'];
	$f_alta = date('Y-m-d');
	$idUsuario;
	$nombre2=strtolower($nickname);
	$corte=substr($nombre2,0,2);
	$passwd=crypt($passwd,$corte);
	
	require_once("config.php");
	$salir = false;
	//Comprobacion de correo cogido
	$resultado = mysql_query("SELECT * FROM datos_usuario");
	while($fila = mysql_fetch_array($resultado))
	{
		if($fila["correo"]==$mail)
		{
			$salir=true;
		}
	}

	if(!$salir)
	{
		//INSERCION USUARIO
		$consulta="insert into usuario(nickname) value('".$nickname."')";
			$datos=mysql_query($consulta,$conexion) or die ('Se ha producido un error1.');
			
		$consulta = "commit;";
			$datos=mysql_query($consulta,$conexion) or die ('Se ha producido un error2.');
		
		//RECOGIDA ID USUARIO
		$result = mysql_query("SELECT * FROM usuario where nickname='".$nickname."'");
		while($fila = mysql_fetch_array($result))
		{
			$idUsuario=$fila["id"];
		}
		
		//INSERT EN TABLA datos_usuario
		$consulta="insert into datos_usuario(idUsuario,password,nombre,correo,direccion,cod_postal,sexo,f_alta,f_nacimiento) values(".$idUsuario.",'".$passwd."','".$nombre."','".$mail."','".$dir."',".$cp.",'".$sexo."','".$f_alta."','".$f_nac."');";
			$datos=mysql_query($consulta,$conexion) or die ('Se ha producido un error3.');
		
				session_start();  
				$_SESSION['usuario']=$nickname;
				$_SESSION['idUsuario']=$idUsuario;
				$_SESSION['rol']="Miembro";
				$_SESSION['tiempo']=time();
		
		$url="http://".$_SERVER['HTTP_HOST']."/projectoninja/index.php";
		echo $url;
		header("Location: ".$url);
	}else
	{
		$url="http://".$_SERVER['HTTP_HOST']."/projectoninja/index.php";
		echo "Se ha producido un error. La dirección de correo ya se encuentra en nuestra base de datos.";
		echo "<h1><a href='".$url."'>Volver</a></h1>";
	}
?>
