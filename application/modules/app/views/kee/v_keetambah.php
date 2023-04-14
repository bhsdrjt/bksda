<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-home"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/kee">
            <i class="fa fa-pow"></i>Pendataan KEE</a>
    </li>
    <li class="active">
        <strong>Tambah KEE</strong>
    </li>
</ol>

<h3>Tambah KEE </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Input 
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Menambahkan KEE","Gagal Menambahkan KEE") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>app/keetambah"	method="post"  enctype="multipart/form-data" id="form"> 	
	<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
			<div class="form-group">
					<label class="col-lg-4 control-label">Jenis KEE*</label>
					<div class="col-lg-8">
						<select class="form-control" name="jenis" id="jenis" >
							<option value="" disabled selected>.:Pilih Jenis:.</option>
							<option value="Areal Bernilai Konservasi Tinggi (ABKT)">Areal Bernilai Konservasi Tinggi (ABKT)</option>
							<option value="Koridor Hidupan Liar">Koridor Hidupan Liar</option>
							<option value="Ekosistem Lahan Basah">Ekosistem Lahan Basah</option>
							<option value="Taman Keanekaragaman Hayati">Taman Keanekaragaman Hayati</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Lokasi *</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="lokasi" name="lokasi">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Luas *</label>
					<div class="col-lg-8">
					<input type="text" class="form-control" id="luas" name="luas">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Bentuk Pengelolaan *</label>
					<div class="col-lg-8">
					<select class="form-control" name="bentuk" id="bentuk" >
							<option value="" disabled selected>.:Pilih Bentuk:.</option>
							<option value="Kolaboratif">Kolaboratif</option>
							<option value="Tunggal">Tunggal</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">SK *</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="sk" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nilai Ekosistem Penting *</label>
					<div class="col-lg-8">
						<textarea  class="form-control" name="nilai"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Keterangan</label>
					<div class="col-lg-8">
						<textarea  class="form-control" name="keterangan"></textarea>
					</div>
				</div>
				
		
			</div>
			<div class="col-md-6">
				<div class="form-group">
                                <label for="field-1" class="col-sm-4 control-label"">Upload Dokumen</label>
								<div class="col-sm-8">
                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
                                    <div class="input-group">
                                        <div class="form-control uneditable-input" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                            <span class="fileinput-new">Select file</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="dokumen"   id="image-source"  onchange="previewImage();">
                                        </span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
						    	</div>
								</div>
                            </div>
				<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
						<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
									<img src="http://placehold.it/300x200" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 200px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
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
	&nbsp
	<a href="<?php echo base_url('app/kee') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
