

<?php
require "../apis/allCard.php";
$api = new api;

//$json = $api->selectAllBooks(); //get the content in the json file
// $obj = json_decode($json, true);
// // Display the value of json object
// print $obj[0]['title'];
$data = json_decode($json, true); //get the json out of it and true to be able to use the key in the foreach loop

foreach ($data as $key => $value) { //key will return the position in the array
  $imageurl = $data[$key]['cover_photo'];
  //echo $imageurl;
  echo "
    <div class='card bg-primary b1'>
          <div class='card-body text-center'>
            <img src='$imageurl' class='rounded-circle'>
            <h3>John Smith</h3>
            <h5>Director</h5>
           <p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <div class='socialicon'>
              <a href='#'><i class='fa fa-facebook-square'></i></a>
              <a href='#'><i class='fa fa-twitter-square'></i></a>
              <a href='#'><i class='fa fa-google-plus-square'></i></a>
              <a href='#'><i class='fa fa-linkedin-square'></i></a>
              </div>
          </div>
        </div>
        ";
}
