<script>

    function initialize() {
        var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(<?php echo "".$data['lintang'].",".$data['bujur'].""; ?>),
                mapTypeId : 'hybrid'   
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
         setMarkers(map, beaches);
         
         var kmlLayer = new google.maps.KmlLayer({
          url : '<?php echo base_url("assets/images/").$poligon."" ?>'
          suppressInfoWindows: true,
          preserveViewport: true,
          map: map
        });
        
     }
     

    var beaches = [
         ['<?php echo "$data[namawilayah]"; ?>', <?php echo "$data[lintang], $data[bujur]"; ?>],
    ];

    function setMarkers(map, locations) {
        
        var shape = {
            coords: [1, 1, 1, 20, 18, 20, 18 , 1],
            type: 'poly'
        };

    
        var infoWindow = new google.maps.InfoWindow;
          for (var i = 0; i < locations.length; i++) {
        var beach = locations[i];
        var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: beach[4],
            shape: shape,
            title: beach[0],
            zIndex: beach[3],
            label:{ color: '#ffffff', fontWeight: 'bold', fontSize: '12px', text: '<?php echo "$data[namawilayah]"; ?>' },
         
            
        });
        var html = 'Lokasi : '+beach[0]+'<br/>Latitude : '+beach[1]+'<br/>Longitude : '+beach[2]+'';
            bindInfoWindow(marker, map, infoWindow, html);
        }
    }

    
  
    function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
        });
        }

  google.maps.event.addDomListener(window, 'load', initialize);
  


 
</script>