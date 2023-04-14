<?php $this->load->view("template/header") ?>


<h3>Selamat Datang di Situation Room BKSDA KALSEL  <!--<small>(<?php echo $tahun ?>)</small>--></h3> 

        <br />
        <div class="row">
            <div class="col-sm-6">
            
            <div class="panel panel-primary" id="charts_env">

                <div class="panel-heading">
                    <div class="panel-title">Map</div>

                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li class=""><a href="#gender" data-toggle="tab">SKW</a></li>
                            <li class=""><a href="#golongan" data-toggle="tab">Resort</a></li>
                            <li class="active"><a href="#jabatan" data-toggle="tab">Kawasan</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="tab-content">

                        <div class="tab-pane active" id="gender">
                            <div id="map-skw" style="height: 600px;"> </div>
                        </div>

                        <div class="tab-pane active" id="golongan">
                        <div id="map-resort" style="height: 600px;"> </div>
                        </div>
                        <div class="tab-pane active" id="jabatan">
                        <div id="map-kawasan" style="height: 600px;"> </div>
                        </div>

                    

                    </div>

                </div>

                <table class="table table-bordered table-responsive">

                    <thead>
                        <tr>
                            
                            <th width="33%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Jumlah Resort</div>
                                  <span style="font-size:15px"><?php echo $jumlahresort ?></span>
                                </div>
                                <span class="pull-right uniquevisitors"></span>
                            </th>
                            <th width="33%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Jumlah SKW</div>
                                    <span style="font-size:15px"><?php echo $jumlahskw ?></span>
                                </div>
                                <span class="pull-right uniquevisitors"></span>
                            </th>
                            <th width="33%" class="col-padding-1">
                                <div class="pull-left">
                                    <div class="h4 no-margin">Jumlah Kawasan</div>
                                    <span style="font-size:15px"> <?php echo $jumlahkawasan ?></span>
                                </div>
                                <span class="pull-right pageviews"></span>

                            </th>
                        </tr>
                    </thead>

                </table>

            </div>

        </div>

 
    </div>

      <script>
      var marker;
      function initialize() {
        var infoWindow = new google.maps.InfoWindow;
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.roadmap,
          center: new google.maps.LatLng(-2.5273099702779023,115.81022689016731),
          zoom: 1,
        } 
        var map = new google.maps.Map(document.getElementById('map-kawasan'), mapOptions);
        var bounds = new google.maps.LatLngBounds();
        <?php
           	foreach($kawasan->result_array() as $row){
            $namakawasan = $row['namakawasan'];
            $lat = $row['lintang'];
            $lon = $row['bujur'];
            echo ("addMarker($lat, $lon, 'Kawasan : $namakawasan<br/> Latitude : $lat<br/>Longitude : $lon', '$namakawasan');\n");                      
        }
        ?>
            function addMarker(lat, lng, info, kawasan) {
                var lokasi = new google.maps.LatLng(lat, lng);
                bounds.extend(lokasi);
                var marker = new google.maps.Marker({
                    map: map,
                    position: lokasi,
                    label:{ color: '#ffffff', fontWeight: 'bold', fontSize: '12px', text: kawasan },
                    
                });       
                map.fitBounds(bounds);
                bindInfoWindow(marker, map, infoWindow, info);
            }
        
            function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
           
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);

  


    var marker2;
      function initialize2() {
        var infoWindow2 = new google.maps.InfoWindow;
        var mapOptions2 = {
          mapTypeId: google.maps.MapTypeId.roadmap,
          zoom: 10,
        } 
        var map2 = new google.maps.Map(document.getElementById('map-skw'), mapOptions2);
        var bounds = new google.maps.LatLngBounds();
        <?php
           	foreach($skw->result_array() as $row){
                $namakawasan = $row['namawilayah'];
                $lat = $row['lintang'];
                $lon = $row['bujur'];
                $url = base_url("app/skwlihat?id=".$row['id_skw']."");
                echo ("addMarker2($lat, $lon, 'SKW : $namakawasan<br/> Latitude : $lat<br/>Longitude : $lon', '$namakawasan','$url');\n");                      
        
        }
          ?>
        function addMarker2(lat, lng, info, kawasan,urll) {
            var lokasi2 = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi2);
            var marker2 = new google.maps.Marker({
                map: map2,
                url:urll,
                position: lokasi2,
                label:{ color: '#ffffff', fontWeight: 'bold', fontSize: '12px', text: kawasan },
            });       
            map2.fitBounds(bounds);
            google.maps.event.addListener(marker2, 'click', function() {
              window.location.href = this.url;
            })
         }
        
        function bindInfoWindow2(marker2, map, infoWindow2, html) {
          google.maps.event.addListener(marker2, 'click', function() {
            infoWindow2.setContent(html);
            infoWindow2.open(map, marker2);
          });
        }
        }
           google.maps.event.addDomListener(window, 'load', initialize2);
          
        

    var marker3;
      function initialize3() {
        var infoWindow3 = new google.maps.InfoWindow;
        var mapOptions3 = {
          mapTypeId: google.maps.MapTypeId.roadmap
        } 
        var map3 = new google.maps.Map(document.getElementById('map-resort'), mapOptions3);
        var bounds = new google.maps.LatLngBounds();
        <?php
           	foreach($resort->result_array() as $row){
                $namakawasan = $row['namaresort'];
                $lat = $row['lintang'];
                $lon = $row['bujur'];
                $url = base_url("app/resortlihat?id=".$row['id_resort'].""); 
                echo ("addMarker3($lat, $lon, 'Resort : $namakawasan<br/> Latitude : $lat<br/>Longitude : $lon', '$namakawasan','$url');\n");                      
        
        }
          ?>
        function addMarker3(lat, lng, info, kawasan,urll) {
            var lokasi3 = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi3);
            var marker3 = new google.maps.Marker({
                map: map3,
                url:urll,
                position: lokasi3,
                label:{ color: '#ffffff', fontWeight: 'bold', fontSize: '12px', text: kawasan },
            });       
            map3.fitBounds(bounds);
            google.maps.event.addListener(marker3, 'click', function() {
              window.location.href = this.url;
            })
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
                        $("#gender").removeClass( "active" );
                        $("#golongan").removeClass( "active" );
                    }, 200);
            });
 
</script> 




<?php $this->load->view("template/footer") ?>
<!-- Footer -->
