<!-- location dashboard -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://bookmy.estate/assets/map-assets/src/L.Control.GeoapifyAddressSearch.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://bookmy.estate//assets/map-assets/src/L.Control.GeoapifyAddressSearch.js"></script>
<script src="https://unpkg.com/@highlightjs/cdn-assets@11.3.1/highlight.min.js"></script>
@section('style')

@endsection('style')
@php 
    $location=tourlocations($tour->locations);
@endphp 
<div class="border-map" style="margin-top: 15px;">
    <div id="map"></div>
</div>
<script>
   var myAPIKey = "{{ env('GEO_MAP_KEY') }}";
    var locations = @json($location);
    console.log(locations);
    var initialLocation = locations[0];
    var map = L.map('map', {
        zoomControl: false
    }).setView([33.9721, 73.7548], 8);
    var mapURL = L.Browser.retina ?
        `https://maps.geoapify.com/v1/tile/osm-liberty/{z}/{x}/{y}.png?apiKey=${myAPIKey}` :
        `https://maps.geoapify.com/v1/tile/osm-liberty/{z}/{x}/{y}@2x.png?apiKey=${myAPIKey}`;

    L.tileLayer(mapURL, {
        attribution: 'Powered by <a href="https://itb.ajk.gov.pk/" title="AJ&K Information Technology Board" target="_blank">AJ&K Information Technology Board</a>|',
        maxZoom: 20
    }).addTo(map);

    function addMarkers(locations) {


        locations.forEach(function(location) {
            let customIcon = L.icon({
                
                iconUrl: `https://api.geoapify.com/v1/icon/?type=circle&color=${location.color}&apiKey=${myAPIKey}`,
                iconSize: [31, 46], // size of the icon
                iconAnchor: [15, 46], // point of the icon which will correspond to marker's location
                popupAnchor: [0, -46] // point from which the popup should open relative to the iconAnchor
            });
            L.marker([location.lat, location.long], {
                    icon: customIcon
                })
                .addTo(map)
                .bindTooltip(location.tooltip); // Bind the tooltip text to the marker
        });
    }
    function addPolyline(locations) {
       // Convert locations to LatLng array
       let latLngs = locations.map(function(location) {
           return [location.lat, location.long];
       });

       // Create a polyline using the array of LatLngs
       var polyline = L.polyline(latLngs, {
           color: '#00FFFF',  // Set the color of the polyline
           weight: 3,         // Set the width of the polyline
           opacity: 0.8,      // Set the opacity of the polyline
           lineJoin: 'round'  // Set the shape of the polyline at corners
       }).addTo(map);

       // Optionally, fit the map bounds to the polyline
       map.fitBounds(polyline.getBounds());
   }


   
   
   L.control.zoom({
       position: 'bottomright'
    }).addTo(map);
    // addMarkers(locations);
    addPolyline(locations);
</script>