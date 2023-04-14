<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Cari Koordinat</strong> 
    </li>
</ol>

<h3>Koordinat</h3> 
<div class="row">
    <div class="col-md-9">
    <p><b></b>Geser Tanda <i class="fa fa-map-marker"></i> untuk Menemukan Koordinat</b></p>
     <div id="map" style="height: 700px;"></div>
   
  

         
    </div>

    <div class="col-md-3">
       
        <div class="control-group">
        <label class="control-label" for="lat">latitude</label>
        <div class="controls">
            <input type="text" name='lat' id='lat'  class="form-control" >
        </div>
        </div>
        <div class="control-group">
        <label class="control-label" for="lng">Longitude</label>
        <div class="controls">
          <input type="text" class="form-control" name='lng' id='lng'>

        </div>
        </div>
       
    </div>
</div>  

