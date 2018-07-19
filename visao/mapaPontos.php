<?php
	require_once "visao/cabec.php";
?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsTfnLRmo3HOQqSuSXF59ruwqS9-Xe_0M"></script>
	<article>
			<br/>
	    	<div id="mapa" style="height:340px; width:100%; margin-left:3%;"></div> <!-- Criar div com tamanho definido para aparecer o mapa-->
		<script>
				
				google.maps.event.addDomListener(window, 'load', carrega_mapa); <!-- quando carregar a página "load" dispara a função carrega_mapa-->
				
				<!-- Pega o retorno que é um array php e transforma em javascript-->
				var pontos = <?php echo json_encode($retorno, JSON_UNESCAPED_UNICODE);?>;
				
				<!-- cria o mapa-->
				function carrega_mapa()
				{
					var mapa =new google.maps.Map(document.getElementById('mapa'),{ 
					zoom:14,
                        
					center:{lat:-22.3063632,lng:-48.5650704}
					});					
					mostrar_pontos(mapa); 
				}
				function mostrar_pontos(mapa)
				{
					for(var x=0; x<pontos.length;x++)
					{
						var marca = new google.maps.Marker({ <!-- cria uma marca para cada elemento json -->
							position: {lat: parseFloat(pontos[x].latitude), 
							lng: parseFloat(pontos[x].longitude)}, <!-- parseFloat pq o elemento é varchar no banco-->
							map: mapa,
							title: pontos[x].nome, <!-- mostra o nome do aluno quando passa o -->
						});		
					}//for
				}//function
		</script>
		</article>
	</body>
</html>
