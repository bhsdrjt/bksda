<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-users"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/user">
            <i class="fa fa-user"></i>Poligon</a>
    </li>
    <li class="active">
        <strong>Edit Poligon</strong>
    </li>
</ol>

<h3>Edit Poligon </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Edit Poligon
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Poligon","Gagal Mengedit Poligon") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>app/poligon"	method="post"  enctype="multipart/form-data" id="form"> 	
	<div class="row">
			<div class="col-md-6 col-sm-12">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
	
            
				<input type="hidden" name="nama" value="<?=$data['nama']?>">
				<div class="form-group">
                                <label for="field-1" class="col-sm-4 control-labe">Upload Poligon (*.kml)</label>
								<div class="col-sm-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<input type="hidden" value="<?php echo $data['poligon'] ?>" name="poligon">
                                    <div class="input-group">
                                        <div class="form-control uneditable-input" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"><?php echo $data['poligon'] ?></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="poligon"   id="image-source"  onchange="previewImage();">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
						    	</div>
								</div>
                            </div>
			
			</div>
		
		
		</div>
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs   btn-icon icon-left">
		<i class="fa fa-save"></i> Simpan</button>

		</form>	
</footer>

</div>
