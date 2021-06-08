<?php
include('multiplug.php');

class display
{
    private $url;
    private $markers;
    private $format;
    private $fillTable;

    //default constructor
    function __construct($format, $url, $fillTable = true)
    {
        $this->url = $url;
        $this->format = $format;
        $this->fillTable = $fillTable;

        if ($this->format == 'quakeml') {
            $this->xmlDisplay();
        } else if ($this->format == 'geojson') {
            $this->jsonDisplay();
        }
    }

    //runs when format is xml
    function xmlDisplay()
    {
        $xml = @simplexml_load_file($this->url); //prevent errors load the xmlfile in the simplexml plugin

        if (false !== $xml) { //remove errors 
            if (isset($xml->eventParameters->event)) {
                if ($this->fillTable) { //if there is a datatable
                    foreach ($xml->children()->children() as $event) {
                        if (empty($event->description->text)) { //skip the one with empty data -- prevent wrong filling of datatable
                            break;
                        }
                        $description = $event->description->text;
                        $datetime =  strval(date("Y-m-d H:i:s", strtotime($event->origin->time->value))); // get the date in string and convert it to date
                        $magnitude = $event->magnitude->mag->value;
                        $longitude = $event->origin->longitude->value;
                        $latitude = $event->origin->latitude->value;
                        $depth = strval(((float)$event->origin->depth->value) / 1000); //convert to km
                        $url_components = parse_url($event['publicID']); // convert the text into url
                        parse_str($url_components['query'], $params); // store all queries in $params
                        $url = 'https://earthquake.usgs.gov/earthquakes/eventpage/' . $params['eventid'];
                        $this->fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url);
                        $this->setMarkers($longitude, $latitude); //building js var
                    }
                } else { //no datatable to fill
                    foreach ($xml->children()->children() as $event) {
                        if (empty($event->description->text)) { //skip the one with empty data -- prevent wrong filling of coordinates
                            break;
                        }
                        $longitude = $event->origin->longitude->value;
                        $latitude = $event->origin->latitude->value;
                        $this->setMarkers($longitude, $latitude); //building js var
                    }
                }
                $this->getjsMarkers(); //output the js var that has been building
            }
        }
    }

    //runs when format is json
    function jsonDisplay()
    {
        $json = file_get_contents($this->url); //get the content in the json file
        $data = json_decode($json, true); //get the json out of it and true to be able to use the key in the foreach loop
        if ($this->fillTable) {
            foreach ($data['features'] as $key => $value) { //key will return the position in the array
                $datetime = date("Y-m-d H:i:s", substr($data['features'][$key]['properties']['time'], 0, 10)); // get the date in string and convert it to date
                $description = $data['features'][$key]['properties']['place'];
                $magnitude = $data['features'][$key]['properties']['mag'];
                $longitude = $data['features'][$key]['geometry']['coordinates'][0];
                $latitude = $data['features'][$key]['geometry']['coordinates'][1];
                $depth = $data['features'][$key]['geometry']['coordinates'][2];
                $url = $data['features'][$key]['properties']['url'];
                $this->fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url);
                $this->setMarkers($longitude, $latitude); //building js var
            }
        } else {
            foreach ($data['features'] as $key => $value) { //key will return the position in the array
                $longitude = $data['features'][$key]['geometry']['coordinates'][0];
                $latitude = $data['features'][$key]['geometry']['coordinates'][1];
                $this->setMarkers($longitude, $latitude); //building js var
            }
        }
        $this->getjsMarkers(); //output the js var that has been building
    }

    //echo the javascript markers variables
    function getjsMarkers()
    {
        echo "<script>var markers=[$this->markers];</script>";
    }

    //filling the variable markers
    function setMarkers($longitude, $latitude)
    {
        $this->markers = $this->markers . "[$longitude,$latitude],";
    }

    //insert into table
    function fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url)
    {
        new multiplug($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url);
    }
}
