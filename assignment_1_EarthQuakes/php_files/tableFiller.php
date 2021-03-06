<?php


class tableFiller
{
    private string $datetime;
    private string $description;
    private string $magnitude;
    private string $longitude;
    private string $latitude;
    private string $depth;
    private string $url;

    //default constructor
    function __construct($datetime, $description, $magnitude, $longitude, $latitude, $depth, $url)
    {
        $this->datetime = $datetime;
        $this->description = $description;
        $this->magnitude = $magnitude;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->depth = $depth;
        $this->url = $url;
        $this->outputting();
    }

    //get the classes -- to help css
    function earthquakeClass(string $value)
    {
        // Class	Magnitude
        // Great	8 or more
        // Major	7 - 7.9
        // Strong	6 - 6.9
        // Moderate	5 - 5.9
        // Light	4 - 4.9
        // Minor	3 - 3.9
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

    //insert records in tables
    function outputting()
    {
        $highlightMagnitudeClasses = $this->earthquakeClass($this->magnitude);
        echo '
        <tr>
            <td>' . $this->datetime . '</td>
            <td>' . $this->description . '</td>
            <td class="' . $highlightMagnitudeClasses . '">' . $this->magnitude . '</td>
            <td>' . strval("($this->longitude, $this->latitude)") . '</td>
            <td>' . $this->depth . '</td>
            <td style="width: 100px;">
                <div style="text-align: center;">
                    <button type="button" 
                    class="btn btn-primary" 
                    style="width: 40px;" 
                    data-toggle="modal" 
                    data-target="#myModal" 
                    data-lat=' . $this->latitude . ' 
                    data-lng=' . $this->longitude . ' 
                    title="open map ' . $this->description . '">
                        <i class="fas fa-map-marked-alt"></i>
                    </button>
                    <button type="button" 
                    class="btn btn-primary" 
                    style="width: 40px;" 
                    title="Open details" 
                    onclick="location.href = \'' . $this->url . '\';">
                        <i class="fa fa-external-link-square-alt"></i>
                    </button>
                </div>
            </td>
        </tr>
        ';
    }
}
