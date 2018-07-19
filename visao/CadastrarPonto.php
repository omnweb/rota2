<?php
	require_once "visao/cabec.php";
?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsTfnLRmo3HOQqSuSXF59ruwqS9-Xe_0M"></script>
	<article>
	    <div id="mapa" style="height:300px; width:980px; margin-left:3%;"></div> <!-- Criar div com tamanho definido para aparecer o mapa-->
		<script>	
			var marca = null;
			google.maps.event.addDomListener(window, 'load', carrega_mapa); <!-- quando carregar a página "load" dispara a função carrega_mapa-->
			  function carrega_mapa() {
			  var geocoder = new google.maps.Geocoder; // usado para converter latitude em endereço
			  var escola = { lat: -22.3163293, lng: -48.564295 };
			  var mapa = new google.maps.Map(document.getElementById('mapa'), {
			  zoom: 14,
			  center: escola
			  });
			  google.maps.event.addListener(mapa, 'click', function(event) {
				// Separar latitude e longetude
				var latlong = event.latLng;
				latlong = latlong.toString(); // transforma em string
				var tam = latlong.length -1;
				latlong = latlong.substring(1, tam);	
				latlong = latlong.split(", ")
				document.getElementById("lat").value =latlong[0];
				document.getElementById("lon").value =latlong[1];
			    //alert(latlong);
				
				//pegar o endereço a partir da latitude e longetude
				
				var latlng = {lat:parseFloat(latlong[0]), lng:parseFloat(latlong[1])}
				geocoder.geocode({'location':latlng}, function(results, status){
					alert(results[5].formatted_address);
			
				var results = results[5].formatted_address.toString(); 													
				results = results.split(", ");				
				document.getElementById("cidade").value =results[1].split("-",1);
				document.getElementById("pais").value =results[3];
				});
				if (marca != null)
				{
					marca.setMap(null);
				}				
				adicionaMarca(event.latLng, mapa);
				
			  });			 
			}
			function adicionaMarca(local, mapa) {
			  
			   marca = new google.maps.Marker({
				position: local,				
				map: mapa
			  });
			}
		</script>			
	
		<br/>
	<form method="POST" action="#" enctype="multipart/form-data">
	  <table id = "todoform">
	  <thead>
        <tr>
		  <th colspan="2">Cadastro de Pontos</th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
	   	<td><input type="hidden" name="id" value = "<?php if($id != "") echo $retorno[0]->idpontos;?>"/></td></tr>
	   <tr>
		 <td><label>Nome:</label></td>
		 <td><input type="text" name="nome"  title="Nome" required="" title="Nome" required="" value="<?php if($id != "") echo $retorno[0]->nome;?>"/> </td>
	   </tr>	   
	   <tr>		 
		 <td><label>Cidade:</label></td>
		 <td><input type="text" id = "cidade" name="cidade" size="10" title="Cidade" required="" value="<?php if($id != "") echo $retorno[0]->cidade;?>"/></td></tr>			 
		 <tr>		 
		 <td><label>Pais:</label></td>
		 <td><input type="text" id = "pais" name="pais" size="10" title="Pais" required="" value="<?php if($id != "") echo $retorno[0]->pais;?>"/></td></tr>			 

		 <tr>
		 <td><label>Latitude:</label></td>
		 <td><input type="text"  id = "lat" name="latitude" size="10" title="Latitude" required="" value="<?php if($id != "") echo $retorno[0]->latitude;?>"/></td></tr>			 
		<tr>
		 <td><label>Longitude:</label></td>
		 <td><input type="text" id = "lon" name="longitude" size="10" title="Longitude" required="" value="<?php if($id != "") echo $retorno[0]->longitude;?>"/></td></tr>			 
		<tr></tr> 
		<tr></tr> 
	   </tbody>
	   <tfoot align = "center">
	   <tr>
		  <td colspan = "2">
			<input type="submit" name="salvar" value="Salvar" class="botao"/> 
		  
         </td></tr>
		  
	   </tfoot>
	   </table>
	</form>
  </article>
</body>
</html>