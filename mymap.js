$(document).ready(function () {
    var map = null;


    function initializeGMap(lat, lon) {
        var zoom = 5;
        var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
        var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
        var position = new OpenLayers.LonLat(lon, lat).transform(fromProjection, toProjection);

        map = new OpenLayers.Map("map_canvas");
        var mapnik = new OpenLayers.Layer.OSM();
        map.addLayer(mapnik);

        var markers = new OpenLayers.Layer.Markers("Markers");
        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(position));

        map.setCenter(position, zoom);
    }
    // Re-init map before show modal
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        initializeGMap(button.data('lat'), button.data('lng'));
        $("#location-map").css("width", "100%");
        $("#map_canvas").css("width", "100%");
        $("#bodyRow1").html("Longitude: " + button.data('lng') + ", Latitude: " + button.data('lat'));
    });

    // Trigger map resize event after modal shown
    $('#myModal').on('shown.bs.modal', function () {

        map.updateSize();
    });
    $('#myModal').on('hidden.bs.modal', function () {
        $("#map_canvas").html('');
    });

});