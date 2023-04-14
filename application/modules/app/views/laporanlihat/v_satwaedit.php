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
        <strong> Satwa Liar</strong>
    </li>
</ol>

<h3>Edit Laporan Satwa Liar</h3>
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
                <input type="hidden" name="kategori" value="Satwa Liar">
				<input type="hidden" name="data8" value="">
				<input type="hidden" name="id_laporan" value="<?php echo $data['id_laporan']; ?>">
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
                    <label class="col-lg-3 control-label">Spesies / Nama Latin *</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data1" id="data1" value="<?php echo $data['data1']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<input type="hidden" class="form-control" name="data2" id="data2" value="<?php echo $data['data2']; ?>" />
				<div class="form-group">
                    <label class="col-lg-3 control-label">Nama Lokal </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data3" id="data3" value="<?php echo $data['data3']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-lg-3 control-label">Jumlah Perjumpaan * </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="data8" id="data8" value="<?php  echo $data['data8']; ?>" 
						placeholder="" />
                    </div>
                </div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Kelas Satwa *</label>
					<div class="col-lg-6">
                        <select class="form-control" name="data4" id="data4" >
                            <option value="" disabled selected>.:Pilih Kelas:.</option>
							<option value="Mamalia" <?php echo $data['data4']=="Mamalia"?"selected":""; ?>>Mamalia</option>
							<option value="Burung/Aves" <?php echo $data['data4']=="Burung/Aves"?"selected":""; ?>>Burung/Aves</option>
							<option value="Amfibi" <?php echo $data['data4']=="Amfibi"?"selected":""; ?>>Amfibi</option>
							<option value="Reptil" <?php echo $data['data4']=="Reptil"?"selected":""; ?>>Reptil</option>
							<option value="Ikan" <?php echo $data['data4']=="Ikan"?"selected":""; ?>>Ikan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Endemisitas *</label>
					<div class="col-lg-6">
                        <select class="form-control" name="data5" id="data5" >
                            <option value="" disabled selected>.:Pilih Endemisitas:.</option>
							<option value="Endemik" <?php echo $data['data5']=="Endemik"?"selected":""; ?>>Endemik</option>
     						<option value="Non Endemik" <?php echo $data['data5']=="Non Endemik"?"selected":""; ?>>Non Endemik</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Status Perlindungan *</label>
					<div class="col-lg-6">
                        <select class="form-control" name="data6" id="data6" >
                            <option value="" disabled selected>.:Pilih Status:.</option>
							<option value="Dilindungi" <?php echo $data['data6']=="Dilindungi"?"selected":""; ?>>Dilindungi</option>
     					    <option value="Tidak Dilindungi" <?php echo $data['data6']=="Tidak Dilindungi"?"selected":""; ?>>Tidak Dilindungi</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Status IUCN *</label>
					<div class="col-lg-6">
                        <select class="form-control" name="data7" id="data7" >
                            <option value="" disabled selected>.:Pilih Status IUCN:.</option>
							<option value="Extinct (EX) / Punah" <?php echo $data['data7']=="Extinct (EX) / Punah"?"selected":""; ?>>Extinct (EX) / Punah</option>
							<option value="Extinct in the Wild (EW) / Punah di alam" <?php echo $data['data7']=="Extinct in the Wild (EW) / Punah di alam"?"selected":""; ?>>Extinct in the Wild (EW) / Punah di alam</option>
							<option value="Critically Endangered (CE) / Kritis" <?php echo $data['data7']=="Critically Endangered (CE) / Kritis"?"selected":""; ?>>Critically Endangered (CE) / Kritis</option>
							<option value="Endangered (EN) / Terancam" <?php echo $data['data7']=="Endangered (EN) / Terancam"?"selected":""; ?>>Endangered (EN) / Terancam</option>
							<option value="Vulnerable (VU) / Rentan" <?php echo $data['data7']=="Vulnerable (VU) / Rentan"?"selected":""; ?>>Vulnerable (VU) / Rentan</option>
							<option value="Near Threathened (NT) / Hampir Terancam"> <?php echo $data['data7']=="Near Threathened (NT) / Hampir Terancam"?"selected":""; ?>Near Threathened (NT) / Hampir Terancam</option>
							<option value="Least Concern (LC) / Beresiko Rendah" <?php echo $data['data7']=="Least Concern (LC) / Beresiko Rendah"?"selected":""; ?>>Least Concern (LC) / Beresiko Rendah</option>
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
