<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet-src.js"></script>
<script src="https://cdn.rawgit.com/aparshin/leaflet-boundary-canvas/f00b4d35/src/BoundaryCanvas.js"></script>
<style>
  #map {
    height: 500px;
  }
</style>
<div id="map"></div>
<script>
  var map = L.map("map");

  $.getJSON(
    "https://raw.githubusercontent.co   m/hamadkh/GeoJson4Kashmir/master/AJK/ajktest.geo.json"
  ).then(function (geoJSON) {
    var osm = new L.TileLayer.BoundaryCanvas(
      "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      {
        boundary: geoJSON,
        attribution:
          '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors, UK shape <a href="https://github.com/johan/world.geo.json">johan/word.geo.json</a>',

      }
    );
    map.addLayer(osm);
    var ukLayer = L.geoJSON(geoJSON);
    map.fitBounds(ukLayer.getBounds());
  });
</script>