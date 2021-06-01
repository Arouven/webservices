<!DOCTYPE html>
<!--
Template Name: Wavefire
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
  <title>Wavefire | Pages | Full Width</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
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

<body id="top" onload="fillElements();">
  <div class="wrapper row0">
    <header id="header" class="hoc clear">
      <div id="logo" class="one_quarter first">
        <h1><a href="../index.html"><span>w</span>ave<span>f</span>ire</a></h1>
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
    </header>
  </div>
  <div class="wrapper row1">
    <section class="hoc clear">
      <nav id="mainav">
        <ul class="clear">
          <li><a href="../index.html">Home</a></li>
          <li class="active"><a class="drop" href="#">Pages</a>
            <ul>
              <li><a href="gallery.html">Gallery</a></li>
              <li class="active"><a href="full-width.html">Full Width</a></li>
              <li><a href="sidebar-left.html">Sidebar Left</a></li>
              <li><a href="sidebar-right.html">Sidebar Right</a></li>
              <li><a href="basic-grid.html">Basic Grid</a></li>
              <li><a href="font-icons.html">Font Icons</a></li>
            </ul>
          </li>
          <li><a class="drop" href="#">Dropdown</a>
            <ul>
              <li><a href="#">Level 2</a></li>
              <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                  <li><a href="#">Level 3</a></li>
                </ul>
              </li>
              <li><a href="#">Level 2</a></li>
            </ul>
          </li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Link Text</a></li>
          <li><a href="#">Long Link Text</a></li>
        </ul>
      </nav>
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
    </section>
  </div>

  <div class="wrapper bgded overlay" style="background-image:url('../images/demo/backgrounds/01.png');">
    <div id="breadcrumb" class="hoc clear">
      <h6 class="heading">Full Width</h6>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Lorem</a></li>
        <li><a href="#">Ipsum</a></li>
        <li><a href="#">Dolor</a></li>
      </ul>
    </div>
  </div>
  <div class="wrapper row3">
    <main class="hoc container clear">
      <!-- main body -->
      <div class="content">


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





        <h1>Table(s)</h1>
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
                  $display = new display();
                  if ($params['format'] == 'quakeml') {
                    $display->xmlDisplay($url);
                  }
                  if ($params['format'] == 'geojson') {
                    $display->jsonDisplay($url);
                  }
                  // if ($params['format'] == null) {
                  //   echo 'ssssssssss';
                  // };
                }

                // else {
                //   $url = $_SERVER['SCRIPT_NAME'] . "?url=" . "'https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00'";
                //   echo $url;
                //   header("Location: $url");
                // }
                ?>
              </tbody>
            </table>
          </div>
        </div>



        <br>
        <br>
        <div class="legend">
          <div class="time">
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
          parameter default description
          endtime present time Limit to events on or before the specified end time. NOTE: All times use ISO8601 Date/Time format. Unless a timezone is specified, UTC is assumed.
          starttime NOW - 30 days Limit to events on or after the specified start time. NOTE: All times use ISO8601 Date/Time format. Unless a timezone is specified, UTC is assumed.


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
        </div>


        <div id="comments">
          <h2>Comments</h2>
          <ul>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                  <address>
                    By <a href="#">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                  <address>
                    By <a href="#">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
            <li>
              <article>
                <header>
                  <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                  <address>
                    By <a href="#">A Name</a>
                  </address>
                  <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                </header>
                <div class="comcont">
                  <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                </div>
              </article>
            </li>
          </ul>
          <h2>Write A Comment</h2>
          <form action="#" method="post">
            <div class="one_third first">
              <label for="name">Name <span>*</span></label>
              <input type="text" name="name" id="name" value="" size="22" required>
            </div>
            <div class="one_third">
              <label for="email">Mail <span>*</span></label>
              <input type="email" name="email" id="email" value="" size="22" required>
            </div>
            <div class="one_third">
              <label for="url">Website</label>
              <input type="url" name="url" id="url" value="" size="22">
            </div>
            <div class="block clear">
              <label for="comment">Your Comment</label>
              <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
            </div>
            <div>
              <input type="submit" name="submit" value="Submit Form">
              &nbsp;
              <input type="reset" name="reset" value="Reset Form">
            </div>
          </form>
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
      <div class="one_third first">
        <h6 class="heading">Nulla facilisi praesent</h6>
        <p>Diam libero interdum at fringilla id interdum eu ante phasellus nec mauris non risus fermentum condimentum in.</p>
        <p class="btmspace-30">Vulputate ante ut adipiscing egestas risus orci tincidunt nulla ac lacinia lacus felis et augue donec lacus [<a href="#"><i class="fas fa-arrow-right"></i></a>]</p>
        <ul class="faico clear">
          <li><a class="faicon-dribble" href="#"><i class="fab fa-dribbble"></i></a></li>
          <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
          <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
          <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
        </ul>
      </div>
      <div class="one_third">
        <h6 class="heading">Aenean lobortis quam at</h6>
        <ul class="nospace clear latestimg">
          <li><a href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
          <li><a href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
          <li><a href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
          <li><a href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
          <li><a href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
          <li><a href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        </ul>
      </div>
      <div class="one_third">
        <h6 class="heading">Enim fusce venenatis laoreet</h6>
        <p class="nospace btmspace-15">Elit sed est tortor molestie in consectetuer fringilla suscipit ut odio in.</p>
        <form method="post" action="#">
          <fieldset>
            <legend>Newsletter:</legend>
            <input class="btmspace-15" type="text" value="" placeholder="Name">
            <input class="btmspace-15" type="text" value="" placeholder="Email">
            <button type="submit" value="submit">Submit</button>
          </fieldset>
        </form>
      </div>
    </footer>
  </div>
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear">
      <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
      <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    </div>
  </div>
  <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>


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
  <script src="../layout/scripts/jquery.min.js"></script>
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  <!-- <script src="../layout/scripts/jquery-3.5.1.min.js"></script> -->
  <script src="../bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../datatables/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script src="../layout/scripts/myjs.js"></script>
  <script>
    function detectQueryString() {
      var currentQueryString = window.location.search;
      if (currentQueryString) {
        return true;
      } else {
        return false;
      }
    };
    $(document).ready(function() {
      if (!detectQueryString()) {
        xmlCore();
      }
    });
  </script>

</body>

</html>