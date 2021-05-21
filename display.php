<?php
include('multiplug.php');

class xmlDisplay
{
    private $url;

    function __construct($urlinput)
    {

        $this->url = trim($urlinput);
        if (empty($this->url)) {
            $this->url = 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00';
        }
        $xml = @simplexml_load_file($this->url);
        if (false !== $xml) {
            // Do anything with xml

            if (isset($xml->eventParameters->event)) {
                foreach ($xml->children()->children() as $event) {
                    if (empty($event->description->text)) {
                        break;
                    }
                    $description_text = $event->description->text;
                    $origin_time_value =  $event->origin->time->value; //DateTime::createFromFormat("Y-m-d\TH:i:s.vP", $event->origin->time->value)->format('Y-m-d\TH:i:s.vP');
                    $magnitude_mag_value = $event->magnitude->mag->value;
                    $magnitude_mag_uncertainty = $event->magnitude->mag->uncertainty;
                    $origin_longitude_value = $event->origin->longitude->value;
                    $origin_latitude_value = $event->origin->latitude->value;
                    //echo $magnitude_mag_uncertainty, $magnitude_mag_value, $origin_longitude_value, $origin_latitude_value, $origin_time_value, $description_text;
                    if ($description_text != null) {
                        $mp = new multiplug($magnitude_mag_uncertainty, $magnitude_mag_value, $origin_longitude_value, $origin_latitude_value, $origin_time_value, $description_text);
                        $mp->outputting();
                    }
                }
            }
        }
    }
}
class jsonDisplay
{
    private $url;

    function __construct($urlinput)
    {

        $this->url = trim($urlinput);
        if (empty($this->url)) {
            $this->url = 'https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00';
        }
        $xml = @simplexml_load_file($this->url);
        if (false !== $xml) {
            // Do anything with xml

            if (isset($xml->eventParameters->event)) {
                foreach ($xml->children()->children() as $event) {
                    if (empty($event->description->text)) {
                        break;
                    }
                    $description_text = $event->description->text;
                    $origin_time_value =  $event->origin->time->value; //DateTime::createFromFormat("Y-m-d\TH:i:s.vP", $event->origin->time->value)->format('Y-m-d\TH:i:s.vP');
                    $magnitude_mag_value = $event->magnitude->mag->value;
                    $magnitude_mag_uncertainty = $event->magnitude->mag->uncertainty;
                    $origin_longitude_value = $event->origin->longitude->value;
                    $origin_latitude_value = $event->origin->latitude->value;
                    //echo $magnitude_mag_uncertainty, $magnitude_mag_value, $origin_longitude_value, $origin_latitude_value, $origin_time_value, $description_text;
                    if ($description_text != null) {
                        $mp = new multiplug($magnitude_mag_uncertainty, $magnitude_mag_value, $origin_longitude_value, $origin_latitude_value, $origin_time_value, $description_text);
                        $mp->outputting();
                    }
                }
            }
        }
    }
}
