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
  <title>BookStore | Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="../fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet">
  <link href="../bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="../layout/styles/mycss.css" rel="stylesheet">
</head>

<!-- when the body load fill the elements with the appropriate details such as date time alertlevel format... -->

<body id="top">
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
          <li class="active"><a class="drop" href="#">Pages</a>
            <ul>
              <li class="active"><a href="index.php">Home Page</a></li>
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


        <br>
        <br>

        <!-- main display  -->
        <h1>Books</h1>
        <?php
        // require("../php_files/page_number.php");
        // $api = 'http://localhost/1/2/assignment_2_BookStore/apis/myapi.php?format=json';
        // $json = file_get_contents($api); //get the content in the json file
        // $data = json_decode($json, true);

        // get_the_Title();
        //addPagination($data, 3, 'index.php');
        require("display.php"); //display the div - list one by one
        new display('http://localhost/1/2/assignment_2_BookStore/apis/myapi.php?' . $_SERVER['QUERY_STRING']);
        ?>
        <br>
        <br>


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
  <script src="../layout/scripts/myjs.js"></script>
</body>

</html>