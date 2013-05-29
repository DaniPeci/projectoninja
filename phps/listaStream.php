	<?php
						/*El $stream_list es un string con los nombres de los canales,
						las claves del $stream_name son el nombre que aparecerá en la web y en valor será el nombre exacto del stream*/
						$stream_list="egstephano,followgrubby,empiretvkas,mlgsc2,liquidsnute,rootcatz,hellosase";
						$stream_name=array("EGStephano"=>"egstephano","FollowGrubby"=>"followgrubby","Empire Kas"=>"empiretvkas","MLG"=>"mlgsc2","Liquid Snute"=>"liquidsnute","ROOT Catz"=>"rootcatz","SaSe"=>"hellosase");
						//Hay que activar curl en php para que funcione
						$mycurl = curl_init();

						curl_setopt ($mycurl, CURLOPT_HEADER, 0);
						curl_setopt ($mycurl, CURLOPT_RETURNTRANSFER, 1); 

						//Crear la URL
						$url = "http://api.justin.tv/api/stream/list.json?channel=" . $stream_list; 
						curl_setopt ($mycurl, CURLOPT_URL, $url);

						$web_response =  curl_exec($mycurl); 

						$results = json_decode($web_response); 
						$i=0;
						foreach($results as $s) {
							$informacion[$i]=$s->channel->login;
							$embed_code[$informacion[$i]]=$s->channel->embed_code;
							$i++;
						}
						echo "<ul id='listaStreams'>";
						foreach($stream_name as $sn=> $valor){
							if(isset($informacion)){
								if(array_search(strtolower($valor),$informacion)!==false){
									echo "<a href='verstream.php?stream=".$valor."'><li>".$sn."&nbsp;<img style = 'width: 50px !important;' src='../imagenes/live.gif' /></li></a>";
									$_SESSION["stream:".$valor]=$embed_code[$valor];
								}else{
									echo "<li>".$sn."&nbsp;<img src='../imagenes/offline.gif' /></li>";
								}
							}else{
								echo "<li>".$sn."&nbsp;<img src='../imagenes/offline.gif' /></li>";
							}
						}
						echo "</ul>";
		?>