<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="http://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
    <script src="http://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script> --}}
    <!-- Leaflet CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

<!-- Leaflet JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

<script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>

    <script src="{{asset('templateUser')}}/kml/kml.js"></script>
</head>
<style>
    #map { height: 500px; }
</style>
<body>
    
    <div id="map"></div>
    <div id="sidebar"></div>
    <script>
        var map = L.map('map').setView([-6.560261,107.763734], 13);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

 
	

   
  
   // menambahkan layer dari KML
    var kmlLayer = omnivore.kml('path/to/kml').addTo(map)

   // Bind popup to each feature on click
   kmlLayer.on('click', function(e) {
        var name = e.layer.feature.properties.name;
        var description = e.layer.feature.properties.description;
        var coordinates = e.layer.feature.geometry.coordinates;

    // Do something with the image data (e.g. display the image)

        var popupContent = '<h3>' + name + '</h3>' +
                           '<div>' + description + '</div>';
                                              
        e.layer.bindPopup(popupContent).openPopup();
    });
    </script>
</body>
</html>