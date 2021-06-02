<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid">
    <h1>Display Google maps in Bootstrap Modal</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-lat='21.03' data-lng='105.85'>
      Location 1
    </button>


  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 modal_body_content">
              <p>Some contents...</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 modal_body_map">
              <div class="location-map" id="location-map">
                <div style="width: 600px; height: 400px;" id="map_canvas">



                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Placed at the end of the document so the pages load faster -->
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->

  <script src="jquery-3.5.1.min.js"></script>
  <!-- <script src="//maps.googleapis.com/maps/api/js"></script> -->

  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

  <script src="bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
    // Code goes here

    $(document).ready(function() {
      var map = null;
      var myMarker;
      var myLatlng;

      function initializeGMap(lat, lng) {
        myLatlng = new google.maps.LatLng(lat, lng);

        var myOptions = {
          zoom: 12,
          zoomControl: true,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        myMarker = new google.maps.Marker({
          position: myLatlng
        });
        myMarker.setMap(map);
      }

      // Re-init map before show modal
      $('#myModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        initializeGMap(button.data('lat'), button.data('lng'));
        $("#location-map").css("width", "100%");
        $("#map_canvas").css("width", "100%");
      });

      // Trigger map resize event after modal shown
      $('#myModal').on('shown.bs.modal', function() {
        google.maps.event.trigger(map, "resize");
        map.setCenter(myLatlng);
      });
    });
  </script>
</body>

</html>