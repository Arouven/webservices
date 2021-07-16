<?php

require '../database.php';


// Use parse_str() function to parse the
// string passed via URL
parse_str($_SERVER["QUERY_STRING"], $params); // store all queries in $params
$selectquery = buildSqlQueryFromURL($params);

$db = new database();
$data = $db->select($selectquery);

if (isset($params["format"])) {
    if ($params["format"] == "json") {
        print json_encode($data);
    }
    if ($params["format"] == "xml") {
        print xml_encode($data);
    }
} else {
    print json_encode($data);
}




function xml_encode($data)
{
    // creating object of SimpleXMLElement
    $xml = new SimpleXMLElement('<?xml version="1.0"?><bookstore></bookstore>');
    //function call to convert array to xml
    array_to_xml($data, $xml);
    //saving generated xml file; 
    $result = $xml->asXML();
    //output the file in xml in the browser
    header('Content-Type: text/xml');
    return ($result);
}

function array_to_xml($data, &$xml)
{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) { //if there are sub arrays
                $key = 'book' . $key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml->addChild($key); //add a node to the main 
            array_to_xml($value, $subnode); //recursive function
        } else {
            $xml->addChild("$key", htmlspecialchars("$value")); //add the value for the node
        }
    }
}
function buildSqlQueryFromURL($params)
{
    $selectquery = "SELECT * FROM bookstore.books";
    $whereclause = " WHERE ";
    foreach ($params as $key => $value) { //key will return the position in the array
        if ($key !== null) { //verify if there is something to query in the url
            if ($key == "format") {
                //do nothing
                //dont add to sql statement
            } else { //add to sql statement
                $whereclause = $whereclause . $key . " = " . $value . " AND ";
            }
        }
    }
    if ($whereclause == " WHERE ") { //if there is no query in the url display all books
        $selectquery = $selectquery . ";";
    } else {
        $selectquery = substr($selectquery . $whereclause, 0, -5) . ";";
    }
    return $selectquery;
}
