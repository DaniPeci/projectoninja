<?php
	function mostrarForos()
	{
		$consulta = mysql_query("SELECT * FROM noticias WHERE categoria = '".$tipoDeNoticia."' ORDER BY id DESC LIMIT 1");
		$resultado = mysql_fetch_array($consulta);
		echo "<p class='titulo' data-id='".$resultado["id"]."'>".$resultado["titulo"];
		echo "<p class='texto'>".$resultado["texto"]."<p/>";
	}
?>