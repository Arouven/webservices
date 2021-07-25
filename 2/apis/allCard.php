<?php

require '../database.php';



class api
{
  private $format;
  private $db;

  function __construct($format = "json")
  {
    $this->db = new database();
    $this->format = $format;
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
      $statusCode = "400";
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
    $response['count'] = $count;
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
