<?php
//include('tableFiller.php');

class display
{
    private $url;
    //private $markers;
    //private $format;

    //default constructor
    function __construct($url)
    {
        $this->url = $url;
        parse_str(strtolower($_SERVER["QUERY_STRING"]), $params); // store all queries in $params

        if (isset($params['format'])) {
            if ($params['format'] == 'json') {
                $this->jsonDisplay();
            }
            if ($params["format"] == "xml") {
                $this->xmlDisplay();
            }
        }
    }

    //  runs when format is xml
    function xmlDisplay()
    {
        $xml = @simplexml_load_file($this->url); //prevent errors load the xmlfile in the simplexml plugin
        if ($xml->status == '200') {
            foreach ($xml->children()->response->children() as $book) {
                $isbn = $book->isbn;
                $category = $book->category;
                $rating = $book->rating;
                $year_published  = $book->year_published;
                $description  = $book->description;
                $language = $book->language;
                $review  = $book->review;
                $best_seller = $book->best_seller;
                $cover_photo  = $book->cover_photo;
                $title = $book->title;
                $author = $book->author;
                $this->filler($isbn,  $category, $rating, $year_published, $description, $language, $review, $best_seller, $cover_photo, $title, $author);
            }
        } else { //echo problem with url
            echo '
            <div class="row" style="border: 2px solid red;padding: 20px;">
                problem with url
            </div>
            <br>
            ';
        }
    }

    //runs when format is json
    function jsonDisplay()
    {
        $json = file_get_contents($this->url); //get the content in the json file
        $data = json_decode($json, true); //get the json out of it and true to be able to use the key in the foreach loop
        if ($data['status'] == '200') {
            foreach ($data['response'] as $key => $value) { //key will return the position in the array
                $isbn = $data['response'][$key]['isbn'];
                $category = $data['response'][$key]['category'];
                $rating = $data['response'][$key]['rating'];
                $year_published  = $data['response'][$key]['year_published'];
                $description  = $data['response'][$key]['description'];
                $language = $data['response'][$key]['language'];
                $review  = $data['response'][$key]['review'];
                $best_seller = $data['response'][$key]['best_seller'];
                $cover_photo  = $data['response'][$key]['cover_photo'];
                $title = $data['response'][$key]['title'];
                $author = $data['response'][$key]['author'];
                $this->filler($isbn,  $category, $rating, $year_published, $description, $language, $review, $best_seller, $cover_photo, $title, $author);
            }
        } else { //echo problem with url
            echo '
            <div class="row" style="border: 2px solid red;padding: 20px;">
                problem with url
            </div>
            <br>
            ';
        }
    }

    function filler($isbn,  $category, $rating, $year_published, $description, $language, $review, $best_seller, $cover_photo, $title, $author)
    {
        echo '
        <div class="row" style="border: 1px solid black;padding: 20px;">
            <div class="col-sm-3"><img src="' . $cover_photo . '" style="width:150px;height:200px;" /></div>
            <div class="col-sm-6">' . $title . '<br>by ' . $author . '<br>Category: ' . $category . '</div>
            <div class="col-sm-3">  
                <button type="button" 
                class="btn btn-primary" 
                style="width: 150px;" 
                title="Open details" 
                onclick="location.href = \'http://localhost/1/2/assignment_2_BookStore/pages/detail.php?isbn=' . $isbn . '\';">View Detail</button>
            </div>
        </div>
        <br>
        ';
    }
}
