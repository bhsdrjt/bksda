<script type="text/javascript">
    document.getElementById('reset').onclick= function() {
        var field1= document.getElementById('lng');
 var field2= document.getElementById('lat');
        field1.value= field1.defaultValue;
 field2.value= field2.defaultValue;
    };
</script>   

<script>
      function updateMarkerPosition(latLng) {
  document.getElementById('lat').value = [latLng.lat()];
  document.getElementById('lng').value = [latLng.lng()];
  }

    var myOptions = {
      zoom: 8,
        scaleControl: true,
      center:  new google.maps.LatLng(-3.4447843961547013,114.85304305227669),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

 
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);
        var kmlLayer = new google.maps.KmlLayer({
          url : '<?php echo base_url("assets/images/kalsel3.kml") ?>',
          suppressInfoWindows: true,
          preserveViewport: true,
          map: map
        });

 var marker1 = new google.maps.Marker({
 position : new google.maps.LatLng(-3.4447843961547013,114.85304305227669),
 title : 'lokasi',
 map : map,
 draggable : true
 });
 
 //updateMarkerPosition(latLng);

 google.maps.event.addListener(marker1, 'drag', function() {
  updateMarkerPosition(marker1.getPosition());
 });
</script>