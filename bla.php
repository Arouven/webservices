<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
  <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="datatables/1.10.24/css/jquery.dataTables.min.css">
  <title>sexy page</title>
  <style>

  </style>

</head>

<body>
  <h1>XML SEISME</h1>
  <div class="table-responsive">
    <table id="earthquakes1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Date and Time</th>
          <th>Name and description</th>
          <th>Magnitude</th>
          <th>Coordinates (Longitude, Latitude)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php


        $url = ('https://earthquake.usgs.gov/fdsnws/event/1/query?format=quakeml&starttime=2020-01-15T00:00:00&endtime=2020-01-15T12:00:00');
        $xml = simplexml_load_file($url);


        foreach ($xml->children()->children() as $event) {
          if (empty($event->description->text)) {
            break;
          }

          $description_text = $event->description->text;
          $origin_time_value =  '';
          try {
            $origin_time_value =  $event->origin->time->value; //DateTime::createFromFormat("Y-m-d\TH:i:s.vP", $event->origin->time->value)->format('Y-m-d\TH:i:s.vP');
          } catch (Exception $e) {
            $origin_time_value = '';
          }
          $magnitude_mag_value = $event->magnitude->mag->value;
          $magnitude_mag_uncertainty = $event->magnitude->mag->uncertainty;
          if (empty(strval($magnitude_mag_uncertainty))) {
            $magnitude_mag_uncertainty = 'n.a';
          }
          $origin_longitude_value = $event->origin->longitude->value;
          $origin_latitude_value = $event->origin->latitude->value;
          $magnitude_mag = strval("$magnitude_mag_value ± $magnitude_mag_uncertainty");
          $origin_coordinates = strval("($origin_longitude_value, $origin_latitude_value)");
          echo '<tr>';
          echo "<td>$origin_time_value</td>";
          echo "<td>$description_text</td>";
          echo "<td>$magnitude_mag</td>";
          echo "<td>$origin_coordinates</td>";
          echo '<td>
          <button type="button" class="btn btn-primary">
          <i class="fas fa-map-marked-alt"></i>
            Button
          </button>
          </td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>


  </div>

  <script src="jquery-3.5.1.min.js"></script>
  <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="datatables/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#earthquakes1').dataTable({
        "columnDefs": [{
          "targets": -1,
          "orderable": false
        }],
        "oLanguage": {
          "sSearch": "Quick Search:"
        }
      });
    });
  </script>
</body>

</html>