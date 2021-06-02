<?php
include('multiplug.php');

class display
{
    private $url;
    private $markers;
    private $format;
    private $fillTable;





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
    function xmlDisplay()
    {
        $xml = @simplexml_load_file($this->url);

        if (false !== $xml) { //remove errors 
            // Do anything with xml

            if (isset($xml->eventParameters->event)) {
                if ($this->fillTable) {
                    foreach ($xml->children()->children() as $event) {
                        if (empty($event->description->text)) {
                            break;
                        }
                        $description = $event->description->text;
                        $datetime =  strval(date("Y-m-d H:i:s", strtotime($event->origin->time->value)));
                        $magnitude = $event->magnitude->mag->value;
                        $longitude = $event->origin->longitude->value;
                        $latitude = $event->origin->latitude->value;
                        $depth = strval(((float)$event->origin->depth->value) / 1000); //convert to km
                        $url_components = parse_url($event['publicID']);
                        parse_str($url_components['query'], $params);
                        $url = 'https://earthquake.usgs.gov/earthquakes/eventpage/' . $params['eventid'];
                        $this->fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url);
                        $this->setMarkers($longitude, $latitude);
                    }
                } else {
                    foreach ($xml->children()->children() as $event) {
                        if (empty($event->description->text)) {
                            break;
                        }
                        $longitude = $event->origin->longitude->value;
                        $latitude = $event->origin->latitude->value;
                        $this->setMarkers($longitude, $latitude);
                    }
                }
                $this->getjsMarkers();
            }
        }
    }
    function jsonDisplay()
    {
        $json = file_get_contents($this->url);
        $data = json_decode($json, true);
        if ($this->fillTable) {
            foreach ($data['features'] as $key => $value) {
                $datetime = date("Y-m-d H:i:s", substr($data['features'][$key]['properties']['time'], 0, 10));
                $description = $data['features'][$key]['properties']['place'];
                $magnitude = $data['features'][$key]['properties']['mag'];
                $longitude = $data['features'][$key]['geometry']['coordinates'][0];
                $latitude = $data['features'][$key]['geometry']['coordinates'][1];
                $depth = $data['features'][$key]['geometry']['coordinates'][2];
                $url = $data['features'][$key]['properties']['url'];
                $this->fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url);
                $this->setMarkers($longitude, $latitude);
            }
        } else {
            foreach ($data['features'] as $key => $value) {
                $longitude = $data['features'][$key]['geometry']['coordinates'][0];
                $latitude = $data['features'][$key]['geometry']['coordinates'][1];
                $this->setMarkers($longitude, $latitude);
            }
        }
        $this->getjsMarkers();
    }


    function getjsMarkers()
    {
        echo "<script>var markers=[$this->markers];</script>";
    }
    function setMarkers($longitude, $latitude)
    {
        $this->markers = $this->markers . "[$longitude,$latitude],";
    }
    function fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url)
    {
        if ($description != null) {
            new multiplug($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url);
        }
    }
}
