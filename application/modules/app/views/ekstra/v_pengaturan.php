<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-users"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/user">
            <i class="fa fa-user"></i>Pengaturan</a>
    </li>
    <li class="active">
        <strong>Edit Pengaturan</strong>
    </li>
</ol>

<h3>Edit Pengaturan </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Edit Pengaturan
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Pengaturan","Gagal Mengedit Pengaturan") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>app/pengaturan"	method="post"  enctype="multipart/form-data" id="form"> 	
	<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
	
              
				<div class="form-group">
					<label class="col-lg-4 control-label">Jabatan</label>
					<div class="col-lg-8">
					<input type="text" class="form-control" name="jabatan" value="<?php echo (set_value('jabatan')) ? set_value('jabatan') : $data['jabatan'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nama" value="<?php echo (set_value('nama')) ? set_value('nama') : $data['nama'] ; ?>" 
						/>
						
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label">Pesan</label>
					<div class="col-lg-8">
						<textarea class="form-control" name="pesan"><?php echo (set_value('pesan')) ? set_value('pesan') : $data['pesan'] ; ?></textarea>
					</div>
				</div>
				
               
			</div>
			
			<div class="col-md-6">
			
			
				<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
						<div class="fileinput <?php  echo ($data['foto']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
								<img src="http://placehold.it/180x240"  alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 180px; height: 240px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/foto/".$data['foto'] ?>" alt="...">
								</div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto" accept="image/*" >
									</span>
									<a href="#" class="btn btn-orange  	fileinput-exists" data-dismiss="fileinput">Remove</a>
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
