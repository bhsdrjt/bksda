<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-home"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/laporanlihat">
            <i class="fa fa-map-marker"></i>Edit Laporan</a>
    </li>
    <li class="active">
        <strong> Pemberdayaan Masyarakat</strong>
    </li>
</ol>

<h3>Edit Laporan Pemberdayaan Masyarakat</h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
	Edit
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">

	<?php pesan_get('msg',"Berhasil Mengedit Laporan","Gagal  Mengedit Laporan") ?>
	<a href="<?php echo base_url('app/laporanedit') ?>" class="btn btn-primary btn-s-xs  btn-icon icon-left">
		<i class="fa fa-arrow-left"></i> Kembali</a>
		<a href="<?php echo base_url('app/laporandetail?id='.$data["id_laporan"].'') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">
		<i class="fa fa-eye"></i> Lihat</a>
		<br/><br/>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>app/laporanedit"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-12">
			    <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                <input type="hidden" name="kategori" value="Pemberdayaan Masyarakat">
				<input type="hidden" name="id_laporan" value="<?php echo $data['id_laporan']; ?>">
				<input type="hidden" name="data7" value="">
				<input type="hidden" name="data8" value="">
                <div class="form-group">
					<label class="col-lg-3 control-label">Lokasi Kawasan Konservasi *</label>
					<div class="col-lg-6">
                        <select class="form-control" name="id_kawasan" id="id_kawasan" >
                            <option value="" disabled selected>.:Pilih Kawasan:.</option>
						
                            <?php
                                foreach($kawasan->result_array() as $row) {
									echo "<option value='".$row['id_kawasan']."'".($data['id_kawasan']==$row['id_kawasan']?"Selected":"").">";
                                    echo "".$row['namakawasan']."</option>";
                                }
                            ?>
                            </select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kegiatan *</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="kegiatan" id="kegiatan" value="<?php echo $data['kegiatan']; ?>" 
						/>
					</div>
				</div>
                <div class="form-group">
					<label class="col-lg-3 control-label">Koordinat Lintang *</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="lintang" id="lintang" value="<?php echo $data['lintang']; ?>"  placeholder="Contoh:-3.70459(minimal 5 angka setelah koma)"
						/>
					</div>
				</div>
                <div class="form-group">
					<label class="col-lg-3 control-label">Koordinat Bujur *</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="bujur" id="bujur" value="<?php echo $data['bujur']; ?>"   placeholder="Contoh:128.11475(minimal 5 angka setelah koma)"
						/>
					</div>
				</div>

                <div class="form-group">
						<label class="col-lg-3 control-label">Waktu Pendataan *</label>
						<div class="col-lg-6">
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
					<label class="col-lg-3 control-label">Nama Kelompok *</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data1" id="data1" value="<?php echo $data['data1']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<div class="form-group">
					<label class="col-lg-3 control-label">SK Kelompok *</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data2" id="data2" value="<?php echo $data['data2']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Lokasi *</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data3" id="data3" value="<?php echo $data['data3']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Jenis Usaha *</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data4" id="data4" value="<?php echo $data['data4']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Jumlah Anggota *</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data5" id="data5" value="<?php echo $data['data5']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kegiatan-kegiatan *</label>
                    <div class="col-lg-6">
					<select class="form-control" name="data6" id="data6" >
                            <option value="" disabled selected>.:Pilih kegiatan:.</option>
							<option value="Pembentukan" <?php echo $data['data6']=="Pembentukan"?"selected":""; ?>>Pembentukan</option>
							<option value="Pendampingan" <?php echo $data['data6']=="Pendampingan"?"selected":""; ?>>Pendampingan</option>
							<option value="Monitoring" <?php echo $data['data6']=="Monitoring"?"selected":""; ?>>Monitoring</option>
						</select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-6">
                    <textarea class="form-control" name="keterangan" id="keterangan"><?php echo $data['keterangan']; ?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label class="col-lg-3 control-label">Petugas Lapangan *</label>
					<div class="col-lg-6">
                    <textarea class="form-control" name="petugas" id="petugas"><?php echo $data['petugas']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
						<label class="col-sm-3 control-label">Upload Foto</label>
						<div class="col-sm-6">
						<div class="fileinput <?php  echo ($data['foto']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
								<img src="http://placehold.it/310x160"  alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/laporan/".$data['foto'] ?>" alt="...">
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
<footer class="panel-footer text-center bg-light lter">
<button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
    <a href="<?php echo base_url('app/laporanedit?id='.$data['id_laporan'].'') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">
		<i class="fa fa-refresh"></i> Reset</a>


		</form>	
</footer>

</div>
