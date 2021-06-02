<!DOCTYPE html>
<html lang="">

<head>
  <title>Wavefire | Pages | Full Width</title>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
  <link rel="stylesheet" href="../fontawesome-free-5.15.3-web/css/all.css">
  <link rel="stylesheet" href="../bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../datatables/1.10.24/css/jquery.dataTables.min.css">
  <link href="../layout/styles/mycss.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Orbitron');

    #clock {
      font-family: 'Orbitron', sans-serif;
      color: #66ff99;
      font-size: 56px;
      text-align: center;
      padding-top: 40px;
      padding-bottom: 40px;
    }
  </style>
</head>

<body onload="fillElements();">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      <div id="clock"></div>
    </div>
  </div>
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
    </div>
    <div class="col-sm-4">
      <input type="datetime-local" value="" name="end_date" id="end_date" class="form-control">
      <span class="add-on"><i class="icon-remove"></i></span>
      <span class="add-on"><i class="icon-th"></i></span>
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


  <div class="legend">
    <div class="row">
      <div class="col-sm-3">
        <div class="colorCode">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th colspan="2">Classes of earthquakes</th>
              </tr>
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
      </div>
      <div class="col-sm-1"></div>
      <div class="col-sm-8">
        <div class="colorCode">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th colspan="2">Alert Levels</th>
              </tr>
            </thead>
            <tbody>
              <tr style="color:green;" class="BoldMe">
                <td>Green</td>
                <td>Volcano is in typical background, non-eruptive state or, after a change from a higher level, volcanic activity has ceased and volcano has returned to noneruptive background state.</td>
              </tr>
              <tr style="color:yellow;" class="BoldMe">
                <td>Yellow</td>
                <td>Volcano is exhibiting signs of unrest above known background level or, after a change from a higher level, volcanic activity has decreased significantly but continues to be closely monitored for possible increase.</td>
              </tr>
              <tr style="color:orange;" class="BoldMe">
                <td>Orange</td>
                <td>Volcano is exhibiting heightenai or unrest with increased gx)tential of eruption, timeframe uncertain, OR eruption is underway with no or minor volcanic-ash emissions [ash-plume height specified, if possible].</td>
              </tr>
              <tr style="color:red;" class="BoldMe">
                <td>Red</td>
                <td>Eruption is imminent with significant emission of volcanic ash into the atmosphere likely OR eruption is underway or suspected with significant emission of volcanic ash into the atmosphere [ash-plume height specified, if possible].</td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="dateCode col-sm-6">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th colspan="3">Date parameters</th>
            </tr>
            <tr>
              <th>Parameter</th>
              <th>Default</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            <tr class="BoldMe">
              <td>Endtime</td>
              <td>Present time</td>
              <td>Limit to events on or before the specified end time.</td>
            </tr>
            <tr class="BoldMe">
              <td>Starttime</td>
              <td>NOW - 30 days</td>
              <td>Limit to events on or after the specified start time.</td>
            </tr>
            <tr class="BoldMe">
              <td colspan="3" style="text-align: right;">NOTE: All times use ISO8601 Date/Time format. UTC is assumed.</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <br><br>


  <h1>Table of earthquakes</h1>
  <div class="scrollable">
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
          // additional functionalities needed 2
          // map de mo region
          // map of the whole world
          // redirect to another page


          // code
          // comment partout

          // report show all
          // functionality
          // flow chart
          // screen shot
          // works well

          //video some code parts
          //show all fn
          // most complex fn -- to explain coding (1 or 2)
          require('../php_files/display.php');
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
            $display = new display($params['format'], $url);
            // if ($params['format'] == 'quakeml') {
            //   $display->xmlDisplay($url);
            // }
            // if ($params['format'] == 'geojson') {
            //   $display->jsonDisplay($url);
            // }
            // if ($params['format'] == null) {
            //   echo 'ssssssssss';
            // };
          } else {
            $url = $_SERVER['SCRIPT_NAME'] . "?url=" . "'https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00'";
            echo $url;
            header("Location: $url");
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <br>
  <br>
  <h1>WorldWide Map</h1>
  <div id="mapdiv" style="width: 1000px; height: 600px;"></div>
  <br>
  <br>

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

  <!-- JAVASCRIPTS -->
  <script src="../layout/scripts/jquery-3.5.1.min.js"></script>
  <script src="../bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../datatables/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script src="../layout/scripts/myjs.js"></script>

  <script>

  </script>

</body>

</html>