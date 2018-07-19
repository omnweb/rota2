<?php
	require_once "visao/cabec.php";
?>
	<!DOCTYPE html>
<html>
	<head>
		<title>Mapa Fatec</title>
	</head>
	<body>
		<div style="margin:5% 0 0 20%">
			<img src="http://maps.googleapis.com/maps/api/staticmap?
			center=fatec+Jahu+jau,sp&
			zoom=15&size=1200x400&maptype=roadmap&
			markers=icon:https://chart.apis.google.com/chart?chst=d_map_pin_icon%26chld=cafe%257C996600|color:blue|label:F|-22.314707,-48.549376&
			markers=color:red|label:O|-22.314600, -48.548600&path=color:blue|weight:7|fillcolor:0x0000ff|-22.313922,-48.550215|-22.312981,-48.548452|-22.316192,-48.548162|-22.316106,-48.550346|-22.313922,-48.550215&
			sensor=false&key=AIzaSyA_9N0iyFYoXKz4IMDJ_KEgBCWB7Rgn8_I" />
		</div>
	</body>
</html>