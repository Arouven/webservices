<?php

require 'allCard.php';


// Use parse_str() function to parse the
// string passed via URL
parse_str($_SERVER["QUERY_STRING"], $params); // store all queries in $params



if (isset($params["format"])) {
    if ($params["format"] == "json") {
        $api = new api('json');
        echo $api->select("SELECT * FROM books limit 5, 10;", "SELECT COUNT(*) FROM books;");
    }
    if ($params["format"] == "xml") {
        $api = new api('xml');
        echo $api->select("SELECT * FROM books limit 5, 10;", "SELECT COUNT(*) FROM books;");
    }
} else {
    print "Welcome to bookstore api!";
    print "how to use?";
}
