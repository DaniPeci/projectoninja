<?php

$usuario=$_REQUEST['usuario'];

$db=new mysqli("localhost","webmaster","webmaster","starcraft");

$query="SELECT nickname FROM usuario WHERE nickname='$usuario'";

$db->query($query)

;if($db->affected_rows==0 && $usuario!="")

{

echo "<img src='../imagenes/correcto.gif'/>";
echo "<script>";
echo "var nombreCorrecto=true;";
echo "</script>";

}else{

echo "<img src='../imagenes/cerrar.png'/>";
echo "<script>";
echo "var nombreCorrecto=false;";
echo "</script>";

}
?>