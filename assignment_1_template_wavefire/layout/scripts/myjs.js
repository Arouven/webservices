
$(document).ready(function () {
    //datatable
    $('#earthquakes1').dataTable({
        "columnDefs": [{
            "targets": -1,
            "searchable": false
        }, {
            "targets": [-1, 3],
            "orderable": false,
        }],
        "oLanguage": {
            "sSearch": "Quick Search:"
        }
    });
});
$(document).ready(function () {//map
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
//url
function xmlCore() {
    window.open(window.location.pathname + "?url='https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00'", "_self");
}

function jsonCore() {
    window.open(window.location.pathname + "?url='https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00'", "_self");
}
function buildURL() {
    var output = window.location.pathname + "?url='https://earthquake.usgs.gov/fdsnws/event/1/query?";
    var format = $('#format').val();
    var starttime = $("#start_date").val();
    var endtime = $("#end_date").val();
    var alertlevel = $('#alertlevel').val();
    var currenttime = new Date();

    if ((Date.parse(starttime) > Date.parse(endtime)) || ((Date.parse(endtime) > Date.parse(currenttime)))) {
        alert("Invalid Date Range");
    } else {
        output += "format=" + format;
        if (starttime) {
            output += "&starttime=" + starttime;
        }
        if (endtime) {
            output += "&endtime=" + endtime;
        }
        if (alertlevel) {
            output += "&alertlevel=" + alertlevel;
        }
        output += "'";
        window.open(output, "_self");
        //alert(output);
    }
}



function fillElements() {
    var url = window.location.href;
    url = url.substring(url.indexOf('%27') + 0);
    url = url.replaceAll('%27', '');
    url = new URL(url);
    var format = url.searchParams.get("format");
    var starttime = url.searchParams.get("starttime");
    var endtime = url.searchParams.get("endtime");
    var alertlevel = url.searchParams.get("alertlevel");

    // if (format) {
    //     xmlCore();
    // }
    $('#format').val(format);
    if (starttime) {
        $("#start_date").attr('value', starttime);
    }
    if (endtime) {
        $("#end_date").attr('value', endtime);
    }
    if (alertlevel) {
        $('#alertlevel').val(alertlevel);
    }
}

//clock
function currentTime() {
    var date = new Date(); /* creating object of Date class */
    var hour = date.getUTCHours();
    var min = date.getUTCMinutes();
    var sec = date.getUTCSeconds();
    hour = updateTime(hour);
    min = updateTime(min);
    sec = updateTime(sec);
    document.getElementById("clock").innerText = "UTC " + hour + " : " + min + " : " + sec; /* adding time to the div */
    var t = setTimeout(function () {
        currentTime()
    }, 1000); /* setting timer */
}

function updateTime(k) {
    if (k < 10) {
        return "0" + k;
    } else {
        return k;
    }
}

currentTime();



