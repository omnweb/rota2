<?php
	require_once"cabec.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Rotas</title>
	<meta charset="utf-8">
   <style>
      html, body, #mapa {
        height: 80%;
        margin: 0px;
        padding: 0px
       
	  }
      #painel {
        height: 80%;
        float: right;
        width: 40%;
        overflow: auto;
		 margin-right:8%;
		
      }
	  #painel table{
		margin-left:5%;
		 width: 90%;		
	  }
	  div.adp{
		  text-align:center;
	  }
	  #mapa{
		  width:40%;
	  }
	 #mapa {
        margin: 1% 0 0 11%;
		
      }	 
	#destino {
        margin: 2% 0 0 11%;
		
      }	 
	  #destino2 {
        margin: 0 0 0 11%;
		
      }	 
	</style>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCK_eBmMSQlh8uuaIIO8jixlj03RvbYHZU"></script>
    <script>
var rota;
var servico = new google.maps.DirectionsService();

function iniciar() {
  rota = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(-22.31450423845,-48.54807680310)
  };
  var map = new google.maps.Map(document.getElementById('mapa'),
      mapOptions);
  rota.setMap(map);
  rota.setPanel(document.getElementById('painel'));
}

function Rota() {
  var origem = "-22.31450423845,-48.54807680310";
  var destino = document.getElementById('destino').value;
  var solicitacao = {
    origin: origem,
    destination: destino,
    travelMode: google.maps.TravelMode.DRIVING
  };
  servico.route(solicitacao, function(resposta, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      rota.setDirections(resposta);
    }
  });
}

google.maps.event.addDomListener(window, 'load', iniciar);

    </script>
  </head>
 
	<br/>
      <label id="destino2">Destino:</label>	 
      <select id="destino" onchange="Rota();">
		<?php foreach($retorno as $dado)
		{
			echo"<option value='{$dado->latitude}, {$dado->longitude}'>{$dado->nome}</option>";
		}
		?>		
      </select>
	  <br/>
    <div id="painel"></div>
    <div id="mapa"></div>
  