
	
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
	//INSERCION USUARIO
	/*$consulta="insert into usuario(nickname) value('".$nickname."')";
		$datos=mysql_query($consulta,$conexion) or die ('Se ha producido un error.');*/
		
	//RECOGIDA ID USUARIO
	$consulta="SELECT * from usuario where nickname=".$nickname;
	while($fila = mysql_fetch_array($consulta))
	{
		$idUsuario=$fila["id"];
	}
	echo $idUsuario;
	
	//INSERT EN TABLA datos_usuario
	$consulta="insert into usuario(idUsuario,password,nombre,correo,direccion,cod_postal,sexo,f_alta,f_nacimiento) value(".$idUsuario.",'".$passwd."','".$nombre."','".$mail."','".$dir."',".$cp.",'".$sexo."','".$f_alta."','".$f_nac."')";
		$datos=mysql_query($consulta,$conexion) or die ('Se ha producido un error.');
?>
