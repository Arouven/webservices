<?php

require '../php_files/database.php';

new api();

class api
{
  private $format;
  private $query;
  private $db;

  function __construct()
  {
    // Use parse_str() function to parse the
    // string passed via URL
    parse_str(strtolower($_SERVER["QUERY_STRING"]), $params); // store all queries in $params

    if (isset($params['format'])) {
      if ($params['format'] == 'json') {
        $this->format = 'json'; //set format var to json
      }
      if ($params["format"] == "xml") {
        $this->format = 'xml'; //set format var to xml
      }
      $this->query = "SELECT * FROM books" . $this->subquery($params); //generate the sql query and set the var query
      $this->db = new database(); //create the database class
      //echo $this->query;
      print $this->select($this->query); //retrieve the output from the query
    } else { //if there is a wrong query the page will display how to use to the user

      print "Welcome to bookstore api!";
      print "</br>";
      print "No api key or registration needed its all free to use!!!!!!!";
      print "</br>";
      print "</br>";
      print "</br>";
      print "how to use?";
      print "</br>";
      print "format(json or xml) -- ?format=json";
      print "</br>";
      print "author(fullname or part of name) -- ?author=seventhswan";
      print "</br>";
      print "category -- ?category=romance";
      print "</br>";
      print "title(full title or part of title) -- ?title=Close Protection";
      print "</br>";
      print "year_published -- ?year_published=2015";
      print "</br>";
      print "language -- ?language=english";
      print "</br>";
      print "orderby -- ?orderby=rating";
      print "</br>";
      print "limit(max number of book to output) -- ?limit=10";
      print "</br>";
      print "</br>";
      print "</br>";
      print "examples";
      print "</br>";
      print "json output with title contains 'close' -- ?format=json&title=Close";
      print "</br>";
      print "xml output with author contains 'se', written in english, show highest rating first, limit the result to only 5 -- ?format=xml&author=se&language=english&orderby=rating&limit=5";
    }
  }

  function subquery($params)
  { // generate sql sub query -- starting from 'WHERE'
    $subquery = "";
    $subqueryarray = array(); //everything that will have 'AND' in front will be push to array
    if (isset($params['isbn'])) {
      array_push($subqueryarray, " isbn LIKE '%" . $params["isbn"] . "%'");
    }
    if (isset($params['author'])) {
      array_push($subqueryarray, " author LIKE '%" . $params["author"] . "%'");
    }
    if (isset($params['category'])) {
      array_push($subqueryarray, " category LIKE '%" . $params["category"] . "%'");
    }
    if (isset($params['title'])) {
      array_push($subqueryarray,  " title LIKE '%" . $params['title'] . "%'");
    }
    if (isset($params['language'])) {
      array_push($subqueryarray, " language LIKE '%" . $params['language'] . "%'");
    }
    if (isset($params['year_published'])) {
      array_push($subqueryarray, " year_published LIKE '%" . $params['year_published'] . "%'");
    }

    if (!empty($subqueryarray)) { // adding the 'AND' word infront of each value in the array
      $subquery .= " WHERE";
      foreach ($subqueryarray as $key => $value) {
        if (!empty($value)) {
          $subquery .= " AND" . $value;
        }
      }
    }
    if (isset($params['orderby'])) { //no 'AND' infront therefore no need to push to array
      $subquery .=  " ORDER BY " . $params['orderby'] . "";
    }
    if (isset($params['limit'])) { //no 'AND' infront therefore no need to push to array
      $subquery .=  " LIMIT " . $params['limit'] . "";
    }
    return str_replace(' WHERE AND', ' WHERE', $subquery . ";"); //return a usable sql select query statement
  }
  function select($selectquery = "SELECT * FROM books", $countquery = "SELECT COUNT(*) FROM books")
  {
    $count = $this->db->select($countquery)[0]["COUNT(*)"]; //get number of rows in books table
    $data = $this->db->select($selectquery); // get all details from books table
    $statusCode = "";
    $statusMessage = "";

    if (!empty($data)) { //executed when there is format query
      $statusCode = "200";
      $statusMessage = "Successfull";
    } else {
      $statusCode = "404";
      $statusMessage = "Not found";
    }

    if ($this->format == 'json') {
      header("Content-Type:application/json");
      $response = $this->addStatusToData($statusCode, $statusMessage, $count, $data); //call funtion to add status code , message , totalbook  to the response
      $json_response = json_encode($response, JSON_UNESCAPED_SLASHES); //output in json format
      return $json_response;
    } elseif ($this->format == 'xml') {
      header("Content-Type:application/xml");
      $response = $this->addStatusToData($statusCode, $statusMessage, $count, $data); //call funtion to add status code , message , totalbook  to the response
      $xml_response = $this->xml_encode($response); //function created to immitate json_encode
      return $xml_response;
    } else { //bad request
      header("Content-Type:application/json");
      $response = $this->addStatusToData(400, 'Bad Request', $count, null); //call funtion to add status code , message , totalbook  to the response
      $json_response = json_encode($response, JSON_UNESCAPED_SLASHES); //output in json format
      return $json_response;
    }
  }

  function addStatusToData($status, $statusMessage, $count, $data)
  { // adding status code , message , totalbook  to the response
    header("HTTP/1.1 $status $statusMessage");
    $response['status'] = $status;
    $response['message'] = $statusMessage;
    $response['totalBookInDB'] = $count;
    $response['response'] = $data;
    return $response;
  }

  function xml_encode($data)
  {
    // creating object of SimpleXMLElement
    $xml = new SimpleXMLElement('<?xml version="1.0"?><bookstore></bookstore>');
    //function call to convert array to xml
    $this->array_to_xml($data, $xml);
    //saving generated xml file; 
    $result = $xml->asXML();
    //output the file in xml in the browser
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
        $this->array_to_xml($value, $subnode); //recursive function
      } else {
        $xml->addChild("$key", htmlspecialchars("$value")); //add the value for the node
      }
    }
  }
}
