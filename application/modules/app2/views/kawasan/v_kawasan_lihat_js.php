<script>

var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": false,
        "order": [[ 1, "desc" ]],
        "fnDrawCallback": function () {
        },
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });

    function initialize() {
        var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(<?php echo "".$data['lintang'].",".$data['bujur'].""; ?>),
                mapTypeId : 'hybrid'   
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
         setMarkers(map, beaches);
         var kmlLayer = new google.maps.KmlLayer({
          url : '<?php echo base_url("assets/images/kalsel3.kml") ?>',
          suppressInfoWindows: true,
          preserveViewport: true,
          map: map
        });
        
     }

    var beaches = [
         ['<?php echo "$data[namakawasan]"; ?>', <?php echo "$data[lintang], $data[bujur]"; ?>],
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
            label:{ color: '#ffffff', fontWeight: 'bold', fontSize: '12px', text: '<?php echo "$data[namakawasan]"; ?>' },
         
            
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
  


 

        var marker3;
      function initialize3() {
        var infoWindow3 = new google.maps.InfoWindow;
        var mapOptions3 = {
          mapTypeId: google.maps.MapTypeId.HYBRID,
          zoom: 13,
          minZoom : 13
       
        } 
        var map3 = new google.maps.Map(document.getElementById('map-area'), mapOptions3);
        var kmlLayer = new google.maps.KmlLayer({
          url : '<?php echo base_url("assets/images/kalsel3.kml") ?>',
          suppressInfoWindows: true,
          preserveViewport: true,
          map: map3
        });
        var bounds = new google.maps.LatLngBounds();
        
        <?php
        $icon = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
        $icon2 = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
          echo ("addMarker3($data[lintang], $data[bujur], 'Nama Kawasan : $data[namakawasan]<br/> Latitude : $data[lintang]<br/>Longitude : $data[bujur]', '$data[namakawasan]','$icon');\n");             
           	foreach($area->result_array() as $row){
                $namakawasan = $row['data3'];
                $lat = $row['lintang'];
                $lon = $row['bujur'];
                echo ("addMarker3($lat, $lon, 'Jenis Area Terbuka : $namakawasan<br/> Latitude : $lat<br/>Longitude : $lon', '$namakawasan','$icon2');\n");                      
        
        }
          ?>
        function addMarker3(lat, lng, info, kawasan,icon) {
            var lokasi3 = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi3);
            var marker3 = new google.maps.Marker({
                map: map3,
                position: lokasi3,
                icon: {
                    url: icon 
                    },
                label:{ color: '#ffffff', fontWeight: 'bold', fontSize: '12px', text: kawasan },
            });       
            map3.fitBounds(bounds);
            bindInfoWindow3(marker3, map3, infoWindow3, info);
         }
        
        function bindInfoWindow3(marker3, map, infoWindow3, html) {
          google.maps.event.addListener(marker3, 'click', function() {
            infoWindow3.setContent(html);
            infoWindow3.open(map, marker3);
          });
        }
        }
           google.maps.event.addDomListener(window, 'load', initialize3);

           $(document).ready(function() {
                        setTimeout(function() { 
                        $("#area").removeClass( "active" );
                    }, 200);
            });

</script>