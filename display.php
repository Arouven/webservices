<?php
include('multiplug.php');

class display
{
    private $url;


    function xmlDisplay($urlinput)
    {
        $this->url = $urlinput;
        $xml = @simplexml_load_file($this->url);
        if (false !== $xml) { //remove errors 
            // Do anything with xml

            if (isset($xml->eventParameters->event)) {
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
                    $this->fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth);
                }
            }
        }
    }
    function jsonDisplay($urlinput)
    {
        $this->url = $urlinput;
        $json = file_get_contents($this->url);
        $data = json_decode($json, true);
        foreach ($data['features'] as $key => $value) {
            $datetime = date("Y-m-d H:i:s", substr($data['features'][$key]['properties']['time'], 0, 10));
            $description = $data['features'][$key]['properties']['place'];
            $magnitude = $data['features'][$key]['properties']['mag'];
            $longitude = $data['features'][$key]['geometry']['coordinates'][0];
            $latitude = $data['features'][$key]['geometry']['coordinates'][1];
            $depth = $data['features'][$key]['geometry']['coordinates'][2];
            $this->fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth);
        }
    }
    function fillTable($datetime, $description, $magnitude, $longitude, $latitude, $depth)
    {
        if ($description != null) {
            new multiplug($datetime, $description, $magnitude, $longitude, $latitude, $depth);
        }
    }
}
