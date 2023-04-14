<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo base_url() ?>app">
			<i class="fa fa-map-marker"></i>Tumbuhan</a>
	</li>
	<li class="active">
		<strong>Lihat Laporan Tumbuhan</strong>
	</li>
</ol>

<h3>Data Detil Laporan Tumbuhan</h3>
<div class="panel panel-primary" data-collapsed="0">

		<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
		<div class="panel-body">
		<?php pesan_get('msg',"Berhasil Memvalidasi Laporan","Berhasil Menolak Validasi laporan") ?>
      
			<a href="<?php echo base_url('app/laporanlihat') ?>" class="btn btn-primary btn-s-xs">
				<i class="fa fa-arrow-left"></i> Kembali</a>
				<hr/>
			<div class="row">
				<div class="col-md-5">
						
					<div class="form-group row">
						<label class="col-lg-4 control-label">Lokasi Kawasan Konservasi</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['namakawasan']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Jenis Laporan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['kategori']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Kegiatan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['kegiatan']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Waktu</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo tgl_indo($data['waktu']); ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Koordinat Lintang  Laporan </label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['lintang']; ?> </p>
						</div>
					</div>
					
					<div class="form-group row">
						<label class="col-lg-4 control-label">Koordinat Bujur  Laporan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > :  <?php echo $data['bujur']; ?></p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Jenis Gangguan </label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['data1']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Keterangan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['keterangan']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Petugas Lapangan</label>
						<div class="col-lg-8">
							<p  class="form-control-static" > : <?php echo $data['petugas']; ?> </p>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-4 control-label">Status</label>
						<div class="col-lg-8">
							<p  class="form-control-static" >: <?php     if($data['validasi']=="Menunggu Validasi") {
                                    echo "<span class='text-warning'><i class='fa fa-spinner'></i> ".$data['validasi']."</span>";
                                } else if ($data['validasi']=="Tervalidasi") {
                                    echo "<span class='text-success'><i class='fa fa-check-circle'></i> ".$data['validasi']."</span>";
                                } else if ($data['validasi']=="Tertolak") {
									echo "<span class='text-danger'><i class='fa fa-times'></i> ".$data['validasi']."</span>";
                                } ?>
							</p>
						</div>
					</div>
					
							
					
				</div>

				<div class="col-md-7">
					<div class="row">
						<div class="col-md-6">
							<?php 
								if ($data['foto']!="") {
							?>
							<img src="<?php echo base_url("assets/images/laporan/".$data['foto']) ?>" alt=" <?php echo $data['kegiatan']; ?>" style="width:100%;height:400px">
							<?php 
								}
							?>
						</div>
						<div class="col-md-6">
							<div id="map-canvas" style="height: 400px;"> </div>
						</div>
					</div>

				
						
						
					
						
				
				</div>
			
					
			</div>
			<?php
				if ($rule!="user") {
			?>
				<a  href="<?php echo base_url("app/laporanedit?id=".$data['id_laporan']) ?>" class="btn btn-primary btn-icon icon-left">
					Edit
					<i class="fa fa-edit"></i>
				</a>
				<a  href="<?php echo base_url("app/tolak?id=".$data['id_laporan']) ?>" class="btn btn-red btn-round btn-icon icon-left">
					Tolak
					<i class="entypo-cancel"></i>
				</a>
				
				<a href="<?php echo base_url("app/validasi?id=".$data['id_laporan']) ?>"  class="btn btn-green btn-icon icon-left">
					Validasi
					<i class="fa fa-check"></i>
				</a>
				<?php
					}
				?>
				
			
		</div>
		
	</form>
</div>
