<?php

require '../database.php';

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
    $querystring = "SELECT * FROM books";
    if (isset($params['format'])) {
      if ($params['format'] == 'json') {
        $this->format = 'json';
        $this->query = $querystring . $this->subquery($params);
      }
      if ($params["format"] == "xml") {
        $this->format = 'xml';
        $this->query = $querystring . $this->subquery($params);
      }
      $this->db = new database();
      print $this->select($this->query);
    } else {
      print "Welcome to bookstore api!";
      print "No api key or registration needed its all free to use!!!!!!!";
      print "how to use?";
      print "format(json or xml) -- ?format=json";
      print "author(fullname or part of name) -- ?author=seventhswan";
      print "category -- ?category=romance";
      print "title(full title or part of title) -- ?title=Close Protection";
      print "language -- ?language=english";
      print "orderby -- ?orderby=rating";
      print "limit(max number of book to output) -- ?limit=10";
      print "";
      print "examples";
      print "json output with title contains 'close' -- ?format=json&title=Close";
      print "xml output with author contains 'se', written in english, show highest rating first, limit the result to only 5 -- ?format=xml&author=se&language=english&orderby=rating&limit=5";
    }
  }
  function subquery($params)
  {
    $subquery = "";
    $subqueryarray = array();
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

    if (!empty($subqueryarray)) {
      $subquery .= " WHERE";
      foreach ($subqueryarray as $key => $value) {
        if (!empty($value)) {
          $subquery .= " AND" . $value;
        }
      }
    }
    if (isset($params['orderby'])) {
      $subquery .=  " ORDER BY " . $params['orderby'] . "";
    }
    if (isset($params['limit'])) {
      $subquery .=  " LIMIT " . $params['limit'] . "";
    }
    return str_replace(' WHERE AND', ' WHERE', $subquery . ";");
  }
  function select($selectquery = "SELECT * FROM books", $countquery = "SELECT COUNT(*) FROM books")
  {
    $count = $this->db->select($countquery)[0]["COUNT(*)"];
    $data = $this->db->select($selectquery);
    $statusCode = "";
    $statusMessage = "";

    if (!empty($data)) {
      $statusCode = "200";
      $statusMessage = "Successfull";
    } else {
      $statusCode = "404";
      $statusMessage = "Not found";
    }
    if ($this->format == 'xml') {
      return $this->deliver_xml_response($statusCode, $statusMessage, $count, $data);
    } elseif ($this->format == 'json') {
      return $this->deliver_json_response($statusCode, $statusMessage, $count, $data);
    }
  }


  function deliver_json_response($status, $statusMessage, $count, $data)
  {
    header("Content-Type:application/json");
    $response = $this->addStatusToData($status, $statusMessage, $count, $data);
    $json_response = json_encode($response, JSON_UNESCAPED_SLASHES);
    return $json_response;
  }
  function deliver_xml_response($status, $statusMessage, $count, $data)
  {
    header("Content-Type:application/xml");
    $response = $this->addStatusToData($status, $statusMessage, $count, $data);
    $xml_response = $this->xml_encode($response);
    return $xml_response;
  }
  function addStatusToData($status, $statusMessage, $count, $data)
  {
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
