<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-satwas"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/satwa">
            <i class="fa fa-satwa"></i>Satwa</a>
    </li>
    <li class="active">
        <strong>Tambah Satwa</strong>
    </li>
</ol>

<h3>Edit Satwa </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Edit Satwa
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Satwa","Gagal Mengedit Satwa") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>app/satwaedit"	method="post"  enctype="multipart/form-data" id="form"> 	
	<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
            <input type="hidden" name="id_satwa" value="<?=$data['id_satwa']?>">
				<div class="form-group">
					<label class="col-lg-4 control-label">Nomor Seri *</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="noseri" name="noseri"  value="<?php echo $data['noseri'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama Pemilik *</label>
					<div class="col-lg-8">
					<input type="text" class="form-control" id="pemilik" name="pemilik" value="<?php echo $data['pemilik'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat *</label>
					<div class="col-lg-8">
						<textarea class="form-control" id="alamat" name="alamat"><?php echo $data['alamat'] ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo $data['email'] ?>"
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Satwa*</label>
					<div class="col-lg-8">
						<select class="form-control" name="jenis" id="jenis" >
						<option value="" disabled selected>.:Pilih Jenis:.</option>
                                    <option value="Mamalia" <?php echo $data['jenis']=="Mamalia"?"selected":""; ?>>Mamalia</option>
                                    <option value="Burung/Aves" <?php echo $data['jenis']=="Burung/Aves"?"selected":""; ?>>Burung/Aves</option>
                                    <option value="Amfibi" <?php echo $data['jenis']=="Amfibi"?"selected":""; ?>>Amfibi</option>
                                    <option value="Reptil" <?php echo $data['jenis']=="Reptil"?"selected":""; ?>>Reptil</option>
                                    <option value="Ikan" <?php echo $data['jenis']=="Ikan"?"selected":""; ?>>Ikan</option>
						</select>
					</div>
				</div>
		
			<div class="form-group">
					<label class="col-lg-4 control-label">Nama Satwa*</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="namasatwa" name="namasatwa" placeholder="Nama Satwa dan Nama Latin"  value="<?php echo $data['namasatwa'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jumlah*</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $data['jumlah'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Di Pelihara Sejak</label>
					<div class="col-lg-8">
					<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo tanggal($data['sejak']); ?>" name="sejak" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="sejak"  data-mask="date">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Asal Usul Satwa*</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="usul" name="usul" value="<?php echo $data['usul'] ?>">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-lg-4 control-label">Sumber Satwa*</label>
					<div class="col-lg-8">
                    <input type="text" class="form-control" id="sumber" name="sumber" value="<?php echo $data['sumber'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Genetik atau Kawin Silang*</label>
					<div class="col-lg-8">
					<select class="form-control" name="genetik" id="genetik" >
						<option value="" disabled selected>.:Pilih:.</option>
						<option value="Genetik" <?php echo $data['genetik']=="Genetik"?"selected":""; ?>>Genetik</option>
                                    <option value="Kawin Silang" <?php echo $data['genetik']=="Kawin Silang"?"selected":""; ?>>Kawin Silang</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Kesehatan*</label>
					<div class="col-lg-8">
                    <input type="text" class="form-control" id="kesehatan" name="kesehatan" value="<?php echo $data['kesehatan'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Waktu Pendataan*</label>
					<div class="col-lg-8">
						<div class="input-group">
							<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo tanggal($data['waktu']); ?>" name="waktu" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="waktu"  data-mask="date">
							<div class="input-group-addon" style="background-color:#fff">
								<a href="#">
									<i class="entypo-calendar"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
                <div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
						<div class="fileinput <?php  echo ($data['foto']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
								<div class="fileinput-new thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
								<img src="http://placehold.it/300x200"  alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/satwa/".$data['foto'] ?>" alt="...">
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
	&nbsp
	<a href="<?php echo base_url('app/satwa') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
