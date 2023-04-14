<script>
      var marker;
      function initialize() {
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.HYBRID
        } 
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        var kmlLayer = new google.maps.KmlLayer({
          url : '<?php echo base_url("assets/images/").$poligon."" ?>',
          suppressInfoWindows: true,
          preserveViewport: false,
          map: map
        });
        // Pengambilan data dari database
        <?php
           	foreach($data->result_array() as $row){
         
                $namakawasan = $row['namakawasan'];
                $namawilayah = $row['namawilayah'];
                $lat = $row['lintang'];
                $lon = $row['bujur'];
                $url = base_url("app/kawasanlihat?id=".$row['id_kawasan']."");
                echo ("addMarker($lat, $lon, 'Kawasan : $namakawasan<br/> SKW : $namawilayah<br/>Latitude : $lat<br/>Longitude : $lon', '$namakawasan','$url');\n");                      
        
        }
          ?>
      
        // Proses membuat marker 
        function addMarker(lat, lng, info, kawasan,urll) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                url:urll,
                position: lokasi,
                label:{ color: '#ffffff', fontWeight: 'bold', fontSize: '12px', text: kawasan },
                
            });       
            map.fitBounds(bounds);
            google.maps.event.addListener(marker, 'click', function() {
              window.location.href = this.url;
            })
         }
        
       
        }
      google.maps.event.addDomListener(window, 'load', initialize);


 
</script>