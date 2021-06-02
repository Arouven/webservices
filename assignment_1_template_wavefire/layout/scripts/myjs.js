function detectQueryString() {
    var currentQueryString = window.location.search;
    if (currentQueryString) {
        return true;
    } else {
        return false;
    }
};

function bigMapBuilder() {
    // Adapted from: harrywood.co.uk
    epsg4326 = new OpenLayers.Projection("EPSG:4326")

    bmap = new OpenLayers.Map({
        div: "mapdiv",
        displayProjection: epsg4326 // With this setting, lat and lon are displayed correctly in MousePosition and permanent anchor
    });

    //   map = new OpenLayers.Map("mapdiv");
    bmap.addLayer(new OpenLayers.Layer.OSM());
    bmap.addLayer(new OpenLayers.Layer.OSM("Wikimedia",
        ["https://maps.wikimedia.org/osm-intl/${z}/${x}/${y}.png"], {
        attribution: "&copy; <a href='http://www.openstreetmap.org/'>OpenStreetMap</a> and contributors, under an <a href='http://www.openstreetmap.org/copyright' title='ODbL'>open license</a>. <a href='https://www.mediawiki.org/wiki/Maps'>Wikimedia's new style (beta)</a>",
        "tileOptions": {
            "crossOriginKeyword": null
        }
    }));
    // See https://wiki.openstreetmap.org/wiki/Tile_servers for other OSM-based layers

    bmap.addControls([
        new OpenLayers.Control.MousePosition(),
        new OpenLayers.Control.ScaleLine(),
        new OpenLayers.Control.LayerSwitcher(),
        new OpenLayers.Control.Permalink({
            anchor: true
        })
    ]);

    projectTo = bmap.getProjectionObject(); //The map projection (Spherical Mercator)
    var lonLat = new OpenLayers.LonLat(8.0, 50.3).transform(epsg4326, projectTo);
    var zoom = 1;
    if (!bmap.getCenter()) {
        bmap.setCenter(lonLat, zoom);
    }


    var colorList = ["red"];
    var layerName = [markers[0][2]];
    var styleArray = [new OpenLayers.StyleMap({
        pointRadius: 6,
        fillColor: colorList[0],
        fillOpacity: 0.5
    })];
    var vectorLayer = [new OpenLayers.Layer.Vector(layerName[0], {
        styleMap: styleArray[0]
    })]; // First element defines first Layer

    var j = 0;
    for (var i = 1; i < markers.length; i++) {
        if (!layerName.includes(markers[i][2])) {
            j++;
            layerName.push(markers[i][2]); // If new layer name found it is created
            styleArray.push(new OpenLayers.StyleMap({
                pointRadius: 6,
                fillColor: colorList[j % colorList.length],
                fillOpacity: 0.5
            }));
            vectorLayer.push(new OpenLayers.Layer.Vector(layerName[j], {
                styleMap: styleArray[j]
            }));
        }
    }

    //Loop through the markers array
    for (var i = 0; i < markers.length; i++) {
        var lon = markers[i][0];
        var lat = markers[i][1];
        var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(lon, lat).transform(epsg4326, projectTo), {
            description: "marker number " + i
        }
            // see http://dev.openlayers.org/docs/files/OpenLayers/Feature/Vector-js.html#OpenLayers.Feature.Vector.Constants for more options
        );
        vectorLayer[layerName.indexOf(markers[i][2])].addFeatures(feature);
    }

    for (var i = 0; i < layerName.length; i++) {
        bmap.addLayer(vectorLayer[i]);
    }
};

$(document).ready(function () {
    if (!detectQueryString()) {
        xmlCore();
    }
    bigMapBuilder();
});


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
    var longitude = $("#lon").val();
    var latitude = $("#lat").val();
    var maxradiuskm = $("#rad").val();
    var alertlevel = $('#alertlevel').val();
    var currenttime = new Date();

    if ((Date.parse(starttime) > Date.parse(endtime)) || ((Date.parse(endtime) > Date.parse(currenttime)))) {
        alert("Invalid Date Range");
    } else if ((parseFloat(maxradiuskm) > 20001.6)) {
        alert("Invalid radius must be less than 20001.6");
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
        if (longitude) {
            output += "&longitude=" + longitude;
        }
        if (latitude) {
            output += "&latitude=" + latitude;
        }
        if ((maxradiuskm) && (longitude) && (latitude)) {
            output += "&maxradiuskm=" + maxradiuskm;
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
    var longitude = url.searchParams.get("longitude");
    var latitude = url.searchParams.get("latitude");
    var maxradiuskm = url.searchParams.get("maxradiuskm");

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
    if (longitude) {
        $("#lon").val(longitude);
    }
    if (latitude) {
        $("#lat").val(latitude);
    }
    if (maxradiuskm) {
        $("#rad").val(maxradiuskm);
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



