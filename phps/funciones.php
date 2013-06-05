<?php
	//Este archivo se utiliza sólo en las páginas en las que se deba estar logueado
	comprobarLogin();

	function mostrarForos()
	{
		$consulta = mysql_query("SELECT * FROM categoria");
		while($resultado = mysql_fetch_array($consulta)){
			
		if($resultado['idCategoria']%2 !=0){
		echo "<a href='categoria.php?id=".$resultado['idCategoria']."'>";
		echo "<div class='cat-izq' id='categoria".$resultado['idCategoria']."'data-id='".$resultado["idCategoria"]."'>".$resultado["nombre"];
			echo '<br/><img src="../imagenes/'.$resultado['nombre'].'.png"/>';
			echo "<div class='derechaFondo'></div>";
		echo "</div>";
		echo "</a>";
		}
		else {
		echo "<a href='categoria.php?id=".$resultado['idCategoria']."'>";
		echo "<div class='cat-der' id='categoria".$resultado['idCategoria']."'data-id='".$resultado["idCategoria"]."'>".$resultado["nombre"];
		echo '<br/><img src="../imagenes/'.$resultado['nombre'].'.png"/>';
			echo "<div class='derechaFondo'></div>";
		echo "</div>";
		echo "</a>";
			}
			}
	}
	
	
	function comprobarLogin(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("Location: ../index.php");
        }else{
		
		$tiempo=time();
		$tiempoTranscurrido=$tiempo-$_SESSION['tiempo'];
			if($tiempoTranscurrido>=600){
				destruirSesion();
			}else{$_SESSION['tiempo']=time();}
		}
    }
	
	 function destruirSesion(){
		session_unset();
        session_destroy();
        header("Location: ../index.php");
    }
?>