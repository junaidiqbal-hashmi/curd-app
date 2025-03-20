<!-- location dashboard -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link rel="stylesheet" href="https://bookmy.estate/assets/map-assets/src/L.Control.GeoapifyAddressSearch.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://bookmy.estate//assets/map-assets/src/L.Control.GeoapifyAddressSearch.js"></script>
<script src="https://unpkg.com/@highlightjs/cdn-assets@11.3.1/highlight.min.js"></script>
@section('style')

@endsection('style')
@php
$location=formateLocation($users);
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
                iconUrl: `https://api.geoapify.com/v1/icon/?type=material&color=${location.color}&icon=${location.icon}&apiKey=${myAPIKey}`,
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

    function addroutes(locations) {
        const locations2 = [
            [34.3660, 73.4708], // Muzaffarabad city center
            [34.3712, 73.4733], // Near Chattar Park
            [34.3685, 73.4801], // Near Neelum River
            [34.3669, 73.4864] // Near Shaheed Gali
        ];

        const waypoints = locations2.map((loc) => loc.join(",")).join("|");

        fetch(`https://api.geoapify.com/v1/routing?waypoints=${waypoints}&mode=drive&apiKey=${myAPIKey}`)
            .then((response) => response.json())
            .then((data) => {
                console.log("Routing Data:", data);

                if (data.features && data.features.length > 0) {
                    // const coordinates = data.features[0].geometry.coordinates;
                    const coordinates = [
                        [34.3660, 73.4708], // Point A
                        [34.3712, 73.4733], // Point B
                        [34.3685, 73.4801], // Point C
                        [34.3669, 73.4864]  // Point D
                    ];
                    console.log("Routing Data:", coordinates);
                    console.log("Polyline Coordinates:", coordinates);

                    const latlngs = coordinates.map((coord) => [coord[1], coord[0]]); // Flip coordinates to [lat, lng]

                    // Draw the polyline on the map
                    const polyline = L.polyline(latlngs, {
                        color: 'blue',
                        weight: 5, // Thickness of the line
                        opacity: 0.7, // Opacity of the line
                        zIndex: 10000 // Ensure it's on top
                    }).addTo(map);

                    // Define and fit bounds
                    const bounds = L.latLngBounds([
                        [34.365335, 73.471274], // South-West corner
                        [34.371304, 73.478788] // North-East corner
                    ]);
                    map.fitBounds(bounds);
                } else {
                    console.error("No route found in the data");
                }
            })
            .catch((error) => console.error("Error fetching routing data:", error));
    }





    L.control.zoom({
        position: 'bottomright'
    }).addTo(map);

    addMarkers(locations);
    // addroutes(locations);
</script>