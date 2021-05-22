<!-- <!doctype html> -->
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>sexy page</title>

  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
  <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="datatables/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="mycss.css">
  <style>

  </style>

</head>

<body onload="fillElements();">
  <h1>sexy page
  </h1>
  <br>
  <br>

  <div class="row">
    <div class="col-sm-4">
      Startdate:
    </div>
    <div class="col-sm-4">
      Enddate:
    </div>
    <div class="col-sm-4">
    </div>
  </div>
  <br>

  <div class="row">
    <div class="col-sm-4">
      <input type="datetime-local" value="" name="start_date" id="start_date" class="form-control">
      <span class="add-on"><i class="icon-remove"></i></span>
      <span class="add-on"><i class="icon-th"></i></span>
      <input type="hidden" id="dtp_sd" value="" />
    </div>
    <div class="col-sm-4">
      <input type="datetime-local" value="" name="end_date" id="end_date" class="form-control">
      <span class="add-on"><i class="icon-remove"></i></span>
      <span class="add-on"><i class="icon-th"></i></span>
      <input type="hidden" id="dtp_ed" value="" />

    </div>
    <div class="col-sm-2">
      <button onclick='xmlCore();' class="btn btn-primary form-control">core xml</button>
    </div>
    <div class="col-sm-2">
      <button onclick='jsonCore();' class="btn btn-primary form-control">core json</button>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <select name="format" id="format" class="form-control">
        <option value="quakeml">QuakeML</option>
        <option value="geojson">GeoJSON</option>
      </select>
    </div>
    <div class="col-sm-4">
      <select name="alertlevel" id="alertlevel" class="form-control">
        <option value="">choose an alertlevel</option>
        <option value="green">Green</option>
        <option value="yellow">Yellow</option>
        <option value="orange">Orange</option>
        <option value="red">Red</option>
      </select>
    </div>
    <div class="col-sm-4">
      <input type="button" name="search" id="search" value="Advanced Search" class="btn btn-info form-control" onclick="buildURL();" />

    </div>

  </div>
  <br>
  <br>


  <div class="table-responsive">
    <table id="earthquakes1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Date and Time (UTC)</th>
          <th>Name and description</th>
          <th>Magnitude</th>
          <th>Coordinates (Longitude, Latitude)</th>
          <th>Depth (km)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require('display.php');
        if ($_SERVER["QUERY_STRING"] != null) {
          $url = trim($_SERVER["QUERY_STRING"]);
          $url = strstr($url, '%27');
          $url = str_replace("%27", "", $url);


          // Use parse_url() function to parse the URL 
          // and return an associative array which
          // contains its various components
          $url_components = parse_url($url);

          // Use parse_str() function to parse the
          // string passed via URL
          parse_str($url_components['query'], $params);
          $display = new display();
          if ($params['format'] == 'quakeml') {
            $display->xmlDisplay($url);
          }
          if ($params['format'] == 'geojson') {
            $display->jsonDisplay($url);
          }
        } else {
          $url = $_SERVER['SCRIPT_NAME'] . "?url=" . "'https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00'";
          header("Location: $url");
        }
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



  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Viewing Map</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 modal_body_content" id="bodyRow1">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 modal_body_map">
              <div class="location-map" id="location-map">
                <div style="width: 600px; height: 400px;" id="map_canvas">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="jquery-3.5.1.min.js"></script>
  <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="datatables/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script src="myjs.js"></script>
  <script>

  </script>
</body>

</html>