<link href="../CSS/estilos_respuestas.css" type="text/css" rel="stylesheet">
<?php
	  
	@$page=$_REQUEST['page'];
	$rows_per_page=10;

	$consulta="SELECT t.nombre,t.usuario,idTema from tema t where t.idCategoria=".$categoria." order by idTema desc";
	$datos=mysql_query($consulta,$conexion);
	$num_rows=mysql_num_rows($datos);
	$lastpage= ceil($num_rows / $rows_per_page);
	@$page=(int)$page;
	 
	if($page > $lastpage)
	{
		$page= $lastpage;
	}
	if($page < 1)
	{
		$page=1;
	}
	  
	$limit= 'LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;
	$consulta .=" $limit";
	$respuestas=mysql_query($consulta,$conexion);

	if(!$respuestas)
	{
			die('Invalid query: ' . mysql_error());
	}
	else
	{
		$frase=1;
		while($row = mysql_fetch_assoc($respuestas))
          {  
			$consulta2=mysql_query("SELECT nickname from usuario where id=".$row['usuario']);
			while($fila=mysql_fetch_array($consulta2))
			{
				$nombre_creador=$fila[0];
			}
			$consulta3=mysql_query("SELECT idUsuario,f_creacion from respuesta where idTema=".$row['idTema']);
			while($fila3=mysql_fetch_array($consulta3))
			{
				$id_ultima_respuesta=$fila3[0];
				$fecha_ultima_respuesta=$fila3[1];
			}
			
			if(isset($id_ultima_respuesta))
			{
				$consulta4=mysql_query("SELECT nickname from usuario where id=".$id_ultima_respuesta);
				while($fila4=mysql_fetch_array($consulta4))
				{
					$nombre_ultima_respuesta=$fila4[0];
				}
			}else
			{
				$nombre_ultima_respuesta = "";
				$frase=2;
			}
			
			if(!isset($fecha_ultima_respuesta))
			{
				@$fecha_ultima_respuesta == "";
				$frase=2;
			}
			
			if($frase==1)
			{
				echo "<tr><td><a href='tema.php?tema=".$row['idTema']."'>".$row['nombre']."</a><br/>Creado por: ".$nombre_creador."</td><td>Enviada por: ".$nombre_ultima_respuesta."<br />Enviado el ".@$fecha_ultima_respuesta."</td></tr>";
			}else
			{
				echo "<tr><td><a href='tema.php?tema=".$row['idTema']."'>".$row['nombre']."</a><br/>Creado por: ".$nombre_creador."</td><td>Hilo sin respuestas</td></tr>";
			}
			
			//RESETEADO DE TODAS LAS VARIABLES CON EL FIN DE EVITAR ERRORES
			$id_ultima_respuesta = null;
			$nombre_ultima_respuesta = null;
			$fecha_ultima_respuesta = null;
			$nombre_creador = null;
			$frase=1;
		  } ?>
        </table><br />
		
		
<?php	//CREACION DE LOS ENLACES DE PAGINACION DEL HILO
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if($num_rows != 0)
    {
       $nextpage= $page +1;
       $prevpage= $page -1;
     
       ?><ul id="pagination-digg"><?php
           if ($page == 1) 
           {
            ?>
              <li class="previous-off">&laquo; Anterior</li>
              <li class="active">1</li> 
         <?php
              for($i= $page+1; $i<= $lastpage ; $i++)
              {
				echo "<li><a href='categoria.php?id=".$categoria."&page=".$i."'>".$i."</a></li>" ?>
        <?php }
           
            if($lastpage >$page )
            {
				echo "<li class='next'><a href='categoria.php?id=".$categoria."&page=".$nextpage."'>Siguiente &raquo;</a></li>";
            }
            else
            {?>
                <li class="next-off">Siguiente &raquo;</li>
        <?php
            }
        } 
        else
        {
     
        ?>
			<?php echo "<li class='previous'><a href='categoria.php?id=".$categoria."&page=".$prevpage."'>&laquo; Anterior</a></li>";
             for($i= 1; $i<= $lastpage ; $i++)
             {
                if($page == $i)
                {
            ?><li class="active"><?php echo $i;?></li><?php
                }
                else
                {
					echo "<li><a href='categoria.php?id=".$categoria."&page=".$i."'>".$i."</a></li>";
                }
            } 
            if($lastpage >$page )
            {   
				echo "<li class='next'><a href='categoria.php?id=".$categoria."&page=".$nextpage."'>Siguiente &raquo;</a></li>";			
            }
            else
            {
        ?>       <li class="next-off">Siguiente &raquo;</li><?php
            }
        }     
    ?></ul><?php
    } 
}
 
?>