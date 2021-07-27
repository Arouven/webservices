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

<body id="top" onload="fillElements()">
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row0">
    <header id="header" class="hoc clear">
      <!-- ################################################################################################ -->
      <div id="logo" class="one_quarter first">
        <h1><a href="index.php"><span>B</span>ook<span>S</span>tore</a></h1>
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
      <h6 class="heading">BookStore</h6>
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


        <br>
        <br>

        <div class="row">
          <div class="col-sm-4">
            <input type="text" value="" name="isbn" id="isbn" class="form-control" placeholder="isbn">
          </div>
          <div class="col-sm-4">
            <input type="text" value="" name="author" id="author" class="form-control" placeholder="author">
          </div>
          <div class="col-sm-4">
            <input type="text" value="" name="title" id="title" class="form-control" placeholder="title">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-4">
            <input type="text" value="" name="language" id="language" class="form-control" placeholder="language">
          </div>
          <div class="col-sm-4">
            <input type="text" value="" name="orderby" id="orderby" class="form-control" placeholder="orderby">
          </div>
          <div class="col-sm-4">
            <input type="text" value="" name="limit" id="limit" class="form-control" placeholder="limit">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-4">
            <input type="text" value="" name="category" id="category" class="form-control" placeholder="category">

          </div>
          <div class="col-sm-4">
            <select name="format" id="format" class="form-control">
              <option value="xml">XML</option>
              <option value="json">JSON</option>
            </select>
          </div>
          <div class="col-sm-4">
            <input type="text" value="" name="year_published" id="year_published" class="form-control" placeholder="year published">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
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
        require("../php_files/display.php"); //display the div - list one by one
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