
							
		
		<div class="invoice">
		
			<div class="row">
			
				<div class="col-sm-12 ">
				
					<a href="#">
						<img src="<?=  base_url()?>assets/images/pu.png" width="100" alt="" style="float:left" />
					</a>
					  <p style="margin-bottom:0px;text-align:center;font-size:16px">KEMENTERIAN LINGKUNGAN HIDUP DAN KEHUTANAN</p>
						<p style="margin-bottom:0px;margin-top:0px;text-align:center;font-size:16px">DIREKTORAT JENDERAL KONSERVASI SUMBER DAYA ALAM DAN EKOSISTEM</p>
						<p style="margin-bottom:0px;margin-top:0px;text-align:center;font-size:16px"><b>BALAI KONSERVASI SUMBER DAYA ALAM KALIMANTAN SELATAN</b> </p> 
						<p style="margin-bottom:0px;margin-top:0px;text-align:center;font-size:12px">Jalan Sungai Ulin Kota K. Pos. 1048 Telp (0511) 4772408 Fax (0511) 47737322</p>
						<p style="margin-bottom:0px;margin-top:0px;text-align:center;font-size:12px">BANJARBARU - 70714</p>
						<hr style="margin-bottom:0px;margin-top:0px; border-top: 2px solid black;"/>
				</div>
		
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<br/>
						<h3 style="margin-bottom:0px;margin-top:0px;text-align:center;font-size:16px"><b><u>LAPORAN</u></b></hr></h3>

				<table width="100%" style="margin:30px">
					<tr> 
						<td width="30%">Lokasi Kawasan Konservasi</td><td> : <?php echo $data['namakawasan']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Jenis Laporan</td><td> : <?php echo $data['kategori']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Kegiatan</td><td> : <?php echo $data['kegiatan']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Waktu</td><td> : <?php echo $data['waktu']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Koordinat Lintang  Laporan</td><td> : <?php echo $data['lintang']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Koordinat Bujur  Laporan</td><td> : <?php echo $data['bujur']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Nomor PAL Batas</td><td> : <?php echo $data['data1']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Kondisi PAL</td><td> : <?php echo $data['data2']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Material PAL</td><td> : <?php echo $data['data3']; ?></td>
					</tr>
				
					<tr> 
						<td width="30%">Keterangan</td><td> : <?php echo $data['keterangan']; ?></td>
					</tr>
					
					<tr> 
						<td width="30%">Petugas Lapangan</td><td> : <?php echo $data['petugas']; ?></td>
					</tr>
					<tr> 
						<td width="30%">Status</td><td> : <?php echo $data['validasi']; ?></td>
					</tr>

					
			</table>

			<table border="0px"  style="margin-left:20px">

			<tr> 
						<td   style="padding: 10px">	<?php 
								if ($data['foto']!="") {
							?>
							<img src="<?php echo base_url("assets/images/laporan/".$data['foto']) ?>" alt=" <?php echo $data['kegiatan']; ?>" style="height:200px;width:250px">
							<?php 
								}
							?></td><td  align="left"> 	<div id="map-canvas" style="height:200px;width:250px"> </div></td>
					</tr>
					<tr>
							<td align="center">
								Foto
							</td>
							<td  align="center">
								Map
							</td>
					</tr>
			</table>
		

				</div>
			
					
			</div>
		
			
			<div class="margin"></div>
		
			<div class="row">
			
				<div class="col-sm-6">
				
					<div class="invoice-left">
						<!-- <ol style="font-size:9px;line-height:1.2">
							<li>Sampaikan kepada petugas jika ada sepatu yang perlu perlakukan khusus</li>
							<li>Cek tulisan pada nota (sepatu,warna,ukuran)</li>
							<li>Pengembalian sepatu harus disertai nota</li>
							<li>Pengaduan maksimal 2 x 24 jam setelah sepatu diterima, disertai nota</li>
							<li>Sepatu yang tidak diambil lebih dari 14 hari setelah ada pemberitahuan selesai, bukan menjadi tanggung jawab kami.</li>
						</ol>
						<span style="background-color:#4a4a4a;"><strong style="color:#fff;"> &nbsp SHINE U'R SHOES WITH US &nbsp </strong></span> -->
					</div>
				
				</div>
				<div class="col-sm-6">
					<div class="invoice-right">
						<ul class="list-unstyled">					
						</ul>
						<br />
						
						<a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
							Print 
							<i class="fa fa-print"></i>
						</a>
						
						&nbsp;
						
						
					</div>
					
				</div>
				
			</div>
		
		</div>
	<script>
		$( document ).ready(function() {
			// window.print();
});
		
		</script>
