<!DOCTYPE html>
<!--
Template Name: Wavefire
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="en">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
  <title>EarthQuakes | Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
  <link href="../bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="../datatables/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../layout/styles/mycss.css" rel="stylesheet">
</head>

<!-- when the body load fill the elements with the appropriate details such as date time alertlevel format... -->

<body id="top" onload="fillElements();">
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <header id="header" class="hoc clear">
      <!-- ################################################################################################ -->
      <div id="logo" class="one_quarter first">
        <h1><a href="index.php"><span>E</span>arth<span>Q</span>uakes</a></h1>
      </div>
      <div class="three_quarter">
        <ul class="nospace clear">
          <li class="one_third first">
            <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Give us a call:</strong> +00 (123) 456 7890</span></div>
          </li>
          <li class="one_third">
            <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong> support@domain.com</span></div>
          </li>
          <li class="one_third">
            <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat.:</strong> 08.00am - 18.00pm</span></div>
          </li>
        </ul>
      </div>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <section class="hoc clear">
      <!-- ################################################################################################ -->
      <nav id="mainav">
        <ul class="clear">
          <li><a href="index.php">Home Page</a></li>
          <li><a href="regional.php">Regional EarthQuakes</a></li>
          <li class="active"><a class="drop" href="#">Pages</a>
            <ul>
              <li class="active"><a href="index.php">Home Page</a></li>
              <li><a href="regional.php">Regional EarthQuakes</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
      <div id="searchform">
        <div>
          <form action="#" method="post">
            <fieldset>
              <legend>Quick Search:</legend>
              <input type="text" placeholder="Enter search term&hellip;">
              <button type="submit"><i class="fas fa-search"></i></button>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- ################################################################################################ -->
    </section>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper bgded overlay" style="background-image:url('../images/demo/backgrounds/01.png');">
    <div id="breadcrumb" class="hoc clear">
      <!-- ################################################################################################ -->
      <h6 class="heading">Earth Quakes</h6>
      <ul>
        <li><a href="#">Home Page</a></li>
      </ul>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row3">
    <main class="hoc container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div class="content">
        <!-- ################################################################################################ -->

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
            <!--on click the js will build the url and then request the server -->
            <input type="button" name="search" id="search" value="Advanced Search" class="btn btn-info form-control" onclick="buildURL();" />
          </div>
        </div>
        <br>
        <br>

        <!-- legend tables -->
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
                      <td>3 - 3.9</td>
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
            <div class="col-sm-3">
            </div>
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
        <br>
        <br>

        <!-- main table  -->
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
                require('../php_files/display.php'); // allow to use the display class
                if ($_SERVER["QUERY_STRING"] != null) { // check if there is any query in the url
                  $url = trim($_SERVER["QUERY_STRING"]); // remove unwanted white spaces
                  $url = strstr($url, '%27'); // keep the text as from %27 till the end
                  $url = str_replace("%27", "", $url); // remove the %27 in the url


                  // Use parse_url() function to parse the URL 
                  // and return an associative array which
                  // contains its various components
                  $url_components = parse_url($url); // convert the text into url

                  // Use parse_str() function to parse the
                  // string passed via URL
                  parse_str($url_components['query'], $params); // store all queries in $params
                  new display($params['format'], $url); //create the display with the constructors parameters
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
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
        <!-- ################################################################################################ -->
      </div>
      <!-- ################################################################################################ -->
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row4">
    <footer id="footer" class="hoc clear">
      <!-- ################################################################################################ -->
      <h1>WorldWide Map</h1>
      <div id="mapdiv" style="max-width:100%; height: 600px;"></div>
      <!-- ################################################################################################ -->
    </footer>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear">
      <!-- ################################################################################################ -->
      <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
      <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="../layout/scripts/jquery-3.5.1.min.js"></script>
  <!-- <script src="../layout/scripts/jquery.min.js"></script> -->
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  <script src="../bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../datatables/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script src="../layout/scripts/myjs.js"></script>
</body>

</html>