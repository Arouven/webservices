<?php


class multiplug
{
    private $magnitude_mag_uncertainty;
    private  $magnitude_mag_value;
    private $origin_longitude_value;
    private $origin_latitude_value;
    private  $origin_time_value;
    private     $description_text;

    function __construct($magnitudeUncertainty, $magnitudeValue, $longitudeValue, $latitudeValue, $dateTimeValue, $description)
    {
        $this->magnitude_mag_uncertainty = $magnitudeUncertainty;
        $this->magnitude_mag_value = $magnitudeValue;
        $this->origin_longitude_value = $longitudeValue;
        $this->origin_latitude_value = $latitudeValue;
        $this->origin_time_value = $dateTimeValue;
        $this->description_text = $description;
    }

    function earthquakeClass($value)
    {
        // Class	Magnitude
        // Great	8 or more
        // Major	7 - 7.9
        // Strong	6 - 6.9
        // Moderate	5 - 5.9
        // Light	4 - 4.9
        // Minor	3 -3.9
        if ((int)$value >= 8) {
            return 'Great';
        } elseif ((int)$value == 7) {
            return 'Major';
        } elseif ((int)$value == 6) {
            return 'Strong';
        } elseif ((int)$value == 5) {
            return 'Moderate';
        } elseif ((int)$value == 4) {
            return 'Light';
        } elseif ((int)$value == 3) {
            return 'Minor';
        } else {
            return 'Negligible';
        }
    }
    function outputting()
    {
        if (empty(strval($this->magnitude_mag_uncertainty))) {
            $magnitude_mag_uncertainty = 'n.a';
        }
        $magnitude_mag = strval("$this->magnitude_mag_value ± $this->magnitude_mag_uncertainty");
        $origin_coordinates = strval("($this->origin_longitude_value, $this->origin_latitude_value)");
        $highlightMagnitudeClasses = $this->earthquakeClass($this->magnitude_mag_value);
        echo '
        <tr>
        <td>' . $this->origin_time_value . '</td>
        <td>' . $this->description_text . '</td>
        <td class="' . $highlightMagnitudeClasses . '">' . $magnitude_mag . '</td>
        <td>' . $origin_coordinates . '</td>
        <td>
            <button type="button" class="btn btn-primary" style="margin:auto;display:block;" title="open map ' . $this->description_text . '">
            <i class="fas fa-map-marked-alt"></i>
            </button>
        </td>
        </tr>
        ';
    }
}
