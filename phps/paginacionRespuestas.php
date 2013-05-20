<link href="../CSS/estilos_respuestas.css" type="text/css" rel="stylesheet">
<?php
  

  
$consulta="SELECT texto, idUsuario,f_creacion FROM respuesta where idTema=".$tema;
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
      ?> 
    <?php while($row = mysql_fetch_assoc($respuestas))
          {  
        $consulta2=mysql_query("SELECT nickname from usuario where id=".$row['idUsuario']);
		while($fila2=mysql_fetch_array($consulta2))
		{
			$nombre_creador=$fila2[0];
		}
	?>
            <tr><td><?php echo $nombre_creador; ?> </td><td> <?php echo $row['texto']."<br>";  echo $row['f_creacion']; ?> </td></tr>
   <?php  } ?>
        </table><br />
<?php
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
              {?>
                <?php echo "<li><a href='tema.php?tema=".$tema."&page=".$i."'>".$i."</a></li>" ?>
        <?php }
           
            if($lastpage >$page )
            {?>      
				<?php echo "<li class='next'><a href='tema.php?tema=".$tema."&page=".$nextpage."'>Siguiente &raquo;</a></li>";
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
			<?php echo "<li class='previous'><a href='tema.php?tema=".$tema."&page=".$prevpage."'>&laquo; Anterior</a></li>";
             for($i= 1; $i<= $lastpage ; $i++)
             {
                if($page == $i)
                {
            ?>       <li class="active"><?php echo $i;?></li><?php
                }
                else
                {
            ?>       
					<?php echo "<li><a href='tema.php?tema=".$tema."&page=".$i."'>".$i."</a></li>";
                }
            } 
            if($lastpage >$page )
            {   ?>
				<?php echo "<li class='next'><a href='tema.php?tema=".$tema."&page=".$nextpage."'>Siguiente &raquo;</a></li>";			
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