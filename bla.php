<!-- <!doctype html> -->
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
  <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="datatables/1.10.24/css/jquery.dataTables.min.css">
  <title>sexy page</title>
  <link rel="stylesheet" href="mycss.css">
  <style>

  </style>

</head>

<body>
  <h1>XML SEISME</h1>
  <div class="table-responsive">
    <table id="earthquakes1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Date and Time</th>
          <th>Name and description</th>
          <th>Magnitude</th>
          <th>Coordinates (Longitude, Latitude)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require('xmlDisplay.php');
        new xmlDisplay();
        ?>
      </tbody>
    </table>
  </div>
  <div class="colorCode">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Class</th>
          <th>Magnitude</th>
        </tr>
      </thead>
      <tbody>
        <tr class="Great">
          <td>Great</td>
          <td>8 or more</td>
        </tr>
        <tr class="Major">
          <td>Major</td>
          <td>7 - 7.9</td>
        </tr>
        <tr class="Strong">
          <td>Strong</td>
          <td>6 - 6.9</td>
        </tr>
        <tr class="Moderate">
          <td>Moderate</td>
          <td>5 - 5.9</td>
        </tr>
        <tr class="Light">
          <td>Light</td>
          <td>4 - 4.9</td>
        </tr>
        <tr class="Minor">
          <td>Minor</td>
          <td>3 -3.9</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="mapdiv"></div>

  <script src="jquery-3.5.1.min.js"></script>
  <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="datatables/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
  <script src="myjs.js"></script>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>


  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());

    var lonLat = new OpenLayers.LonLat(-20.15, 51.5077286)
      .transform(
        new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
        map.getProjectionObject() // to Spherical Mercator Projection
      );

    var zoom = 15;

    var markers = new OpenLayers.Layer.Markers("Markers");
    map.addLayer(markers);

    markers.addMarker(new OpenLayers.Marker(lonLat));

    map.setCenter(lonLat, zoom);
  </script>
</body>

</html>