<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Directions service</title>
<style>
#map {
	height: 100%;
}
html, body {
	height: 100%;
	margin: 0;
	padding: 0;
}
</style>
</head>
<body>
<div id="map"></div>
<script>
function initMap() {
	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer;
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 7
	});
	directionsDisplay.setMap(map);
	calculateAndDisplayRoute(directionsService, directionsDisplay);
}
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
	directionsService.route({
		origin: '<?php echo $awal;?>',
		destination: '<?php echo $akhir;?>',
		travelMode: 'DRIVING'
	}, function(response, status) {
		if (status === 'OK') {
			directionsDisplay.setDirections(response);
		} else {
			// window.alert('Directions request failed due to ' + status);
		}
	});
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_maps_api;?>&callback=initMap"
async defer></script>
</body>
</html>