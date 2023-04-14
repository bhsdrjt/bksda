<ol class="breadcrumb bc-3">
   <li>
      <a href="<?php echo base_url() ?>app">
      <i class="fa fa-user"></i>Data kawasan</a>
   </li>
   <li class="active">
      <strong>kawasan</strong>
   </li>
</ol>
<h3>Kawasan "<?php echo $data["namakawasan"] ?>"</h3>
<a href="<?php echo base_url('app/eksplor') ?>" class="btn btn-primary btn-s-xs  btn-icon icon-left">
		<i class="fa fa-arrow-left"></i> Kembali</a>
		<hr/>
<div class="row">
   <div class="col-sm-12">
      <div class="tabs-vertical-env">
         <ul class="nav tabs-vertical left-aligned">
            <!-- available classes "right-aligned" -->
            <li class="active"><a href="#profil" data-toggle="tab">Profil Kawasan </a></li>
            <li><a href="#ekosistem" data-toggle="tab">Ekosistem</a></li>
            <li><a href="#satwa" data-toggle="tab">Satwa</a></li>
            <li><a href="#tumbuhan" data-toggle="tab">Tumbuhan</a></li>
			<li><a href="#wisata" data-toggle="tab">Wisata Alam</a></li>
            <li><a href="#potensi" data-toggle="tab">Potensi Sosial Ekonomi</a></li>
            <li><a href="#desa" data-toggle="tab">Desa Penyangga</a></li>
            <li><a href="#area" data-toggle="tab">Open Area</a></li>
            <li><a href="#dokumen" data-toggle="tab">Dokumen Kawasan</a></li>
         </ul>
         <div class="tab-content">
            <div class="tab-pane active" id="profil">
                  <h3 class="text-center"><b>Profil Kawasan</b> </h3>
                  <hr/>
				  <div class="row" style="margin-bottom:40px">
					<div class="col-md-12">
						<div id="map-canvas" style="height: 600px;"> </div>
					</div>
				  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div>
                           <label>Nama Kawasan </label>
                           <blockquote><?php echo $data["namakawasan"] ?> </blockquote>
                        
                        </div>
                        <div>
                           <label>Fungsi Kawasan </label>
						   <blockquote><?php echo $data["fungsi"] ?> </blockquote>
                        </div>
                        <div>
                           <label>SKW </label>
						 	  <blockquote><?php echo $data["namawilayah"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Koordinat Lintang Kawasan </label>
						   <blockquote><?php echo $data["lintang"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Koordinat Bujur Kawasan </label>
						   <blockquote><?php echo $data["bujur"] ?> </blockquote>
                        </div>
                        
                       
                     </div>
                     <div class="col-md-6">
					 <div>
                           <label>Nomor SK</label>
						   <blockquote><?php echo $data["nosk"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Tanggal SK</label>
						   <blockquote><?php echo tgl_indo($data["tanggalsk"]) ?> </blockquote>
                        </div>
                        <div>
                           <label>SK</label>
						   <blockquote><a href="<?php echo base_url("/assets/images/sk/".$data['sk']."") ?>" target="_blank" class="btn btn-default <?php if($data['sk']=="") echo "disabled" ?>" ><i class="fa fa-download"></i> download</a></blockquote>
                        </div>
                        <div>
                           <label>Letak Administrasi</label>
						   <blockquote><?php echo $data["letakadmin"] ?> </blockquote>
                            
                        </div>
						 <div>
                           <label>Luas Kawasan</label>
						   <blockquote><?php echo $data["luas"] ?> </blockquote>

                        </div>
                        
                     </div>
                  </div>
				  <div class="row">
				  <div class="col-md-12">
				  <div>
                           <label>Sejarah Kawasan</label>
						   <blockquote><?php echo $data["sejarah"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Aksesibilitas Kawasan</label>
						   <blockquote><?php echo $data["akses"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Status Hukum Kawasan</label>
						   <blockquote><?php echo $data["statushukum"] ?> </blockquote>
                        </div>
				  </div>
				  </div>
                 
            </div>
            <div class="tab-pane" id="ekosistem">
		         <h3 class="text-center"><b>Ekosistem Kawasan</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-6">
						 <div>
                           <label>Keaslian Ekosistem </label>
						   <blockquote><?php echo $data["asli_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Kekayaan Ekosistem </label>
						   <blockquote><?php echo $data["kaya_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Keterwakilan Ekosistem </label>
						   <blockquote><?php echo $data["wakil_ekosistem"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Keutuhan Ekosistem </label>
						   <blockquote><?php echo $data["utuh_ekosistem"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Ketergantungan Ekosistem </label>
						   <blockquote><?php echo $data["gantung_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Keunikan Ekosistem </label>
						   <blockquote><?php echo $data["unik_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Kerentanan Ekosistem </label>
						   <blockquote><?php echo $data["rentan_ekosistem"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Produktivitas Ekosistem </label>
                           <blockquote><?php echo $data["produk_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Karakteristik Ekosistem </label>
						   <blockquote><?php echo $data["karakter_ekosistem"] ?> </blockquote>
                        </div>
					
						
                     </div>
                     <div class="col-md-6">
					 <div>
                           <label>Fungsi Ekosistem </label>
						   <blockquote><?php echo $data["fungsi_ekosistem"] ?> </blockquote>
                        </div>
                      
						 <div>
                           <label>Kekhasan Ekosistem </label>
						   <blockquote><?php echo $data["khas_ekosistem"] ?> </blockquote>
                        </div>
					 	<div>
                           <label>Kelangkaan Ekosistem </label>
						   <blockquote><?php echo $data["langka_ekosistem"] ?> </blockquote>
                        </div>
						 <div>
                           <label>Jenis Tanah</label>
						   <blockquote><?php echo $data["jenistanah_ekosistem"] ?> </blockquote>
                        </div>
						
                        <div>
                           <label>Geologi </label>
						   <blockquote><?php echo $data["geologi_ekosistem"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Ketinggian </label>
						   <blockquote><?php echo $data["ketinggian_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Kelerengan</label>
						   <blockquote><?php echo $data["kelerengan_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Bentang Alam</label>
						   <blockquote><?php echo $data["bentangalam_ekosistem"] ?> </blockquote>
                        </div>
						<div>
                           <label>Gejala Alam</label>
						   <blockquote><?php echo $data["gejalaalam_ekosistem"] ?> </blockquote>
                        </div>
						
                     </div>
                  </div>
               
            </div>
            <div class="tab-pane" id="satwa">
			
		     <h3 class="text-center"><b>Satwa Liar</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div>
						 	<blockquote><?php echo $data["satwa"] ?> </blockquote>
                           </div>
							<hr/>
						   <label>Satwa Liar Berdasarkan Laporan Masuk :</label>
						   <br/>
						   <table class="table table-bordered ">
						   <?php
							foreach($satwa->result_array() as $row){
								echo "
									<tr>
										<td style='width:80px'>
										<img src='".base_url("assets/images/laporan/".$row['foto']."")."' alt='Foto ".$row['data3']."' style='width:80px'/>
										</td>
										<td>".$row['data3']." (<em>".$row['data1']."</em>) <br/>
										".$row['data4']." - ".$row['data5']." - ".$row['data6']."</td>
									</tr>
								";
							}
						?>
						   </table>
                	
             							
           							
                    
					</div>
				  </div>
			
            </div>
            <div class="tab-pane" id="tumbuhan">
			
                  <h3 class="text-center"><b>Tumbuhan</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div>
						 <blockquote><?php echo $data["tumbuhan"] ?> </blockquote>
                           </div>
						   <hr/>
						   <label>Tumbuhan Berdasarkan Laporan Masuk :</label>
						   <br/>
						   <table class="table table-bordered ">
						   <?php
							foreach($tumbuhan->result_array() as $row){
								echo "
									<tr>
										<td style='width:80px'>
										<img src='".base_url("assets/images/laporan/".$row['foto']."")."' alt='Foto ".$row['data3']."' style='width:80px'/>
										</td>
										<td>".$row['data3']." (<em>".$row['data1']."</em>) <br/>
										".$row['data4']." - ".$row['data5']."</td>
									</tr>
								";
							}
						?>
						   </table>
                	
                    
					</div>
				  </div>
			  </div>
			<div class="tab-pane" id="wisata">
		
                 <h3 class="text-center"><b>Wisata Alam</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div>
						 <blockquote><?php echo $data["wisata"] ?> </blockquote>
                           </div>
						   <hr/>
						   <label>Wisata Alam Berdasarkan Laporan Masuk :</label>
						   <br/>
						   <table class="table table-bordered ">
						   <?php
							foreach($wisata->result_array() as $row){
								echo "
									<tr>
										<td style='width:80px'>
										<img src='".base_url("assets/images/laporan/".$row['foto']."")."' alt='Foto ".$row['data3']."' style='width:80px'/>
										</td>
										<td>".$row['data1']."</td>
									</tr>
								";
							}
						?>
						   </table>
                    
					</div>
				  </div>
				 
            </div>
			<div class="tab-pane" id="potensi">
                  <h3 class="text-center"><b>Potensi Sosial dan Ekonomi</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-6">
						 <div>
                           <label>Sumber Ekonomi Masyarakat</label>
						   <blockquote><?php echo $data["sumberekonomi"] ?> </blockquote>
                        </div>
						<div>
                           <label>Perkembangan Usaha</label>
						   <blockquote><?php echo $data["perkembanganusaha"] ?> </blockquote>
                        </div>
						<div>
                           <label>Investasi </label>
						   <blockquote><?php echo $data["investasi"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Ketergantungan Masyarakat</label>
						   <blockquote><?php echo $data["ketergantunganmasyarakat"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Sarana & Prasarana</label>
						   <blockquote><?php echo $data["saranaprasarana"] ?> </blockquote>
                        </div>
						<div>
                           <label>Rencana Pembangunan </label>
						   <blockquote><?php echo $data["rencanapembangunan"] ?> </blockquote>
                        </div>
						<div>
                           <label>Sejarah Pemukiman</label>
						   <blockquote><?php echo $data["sejarahpemukiman"] ?> </blockquote>
                        </div>
                       
                     </div>
                     <div class="col-md-6">
					 <div>
                           <label>Perkembangan Demografi </label>
						   <blockquote><?php echo $data["perkembangandemografi"] ?> </blockquote>
                        </div>
                      
						 <div>
                           <label>Kearifan Tradisional</label>
                           <blockquote><?php echo $data["kearifantradisional"] ?> </blockquote>
                        </div>
					 	<div>
                           <label>Kelembagaan</label>
						   <blockquote><?php echo $data["kelembagaan"] ?> </blockquote>
                        </div>
						 <div>
                           <label>Adat Istiadat</label>
						   <blockquote><?php echo $data["adatistiadat"] ?> </blockquote>
                        </div>
						
                        <div>
                           <label>Persepsi Masyarakat Setempat Terhadap Kawasan & Potensinya</label>
						   <blockquote><?php echo $data["persepsimasyarakat"] ?> </blockquote>
                        </div>
                        <div>
                           <label>Persepsi Pemerintah Daerah Terhadap Kawasan & potensinya</label>
                            <blockquote><?php echo $data["persepsipemerintah"] ?> </blockquote>
                        </div>
						
                     </div>
                  </div>
            </div>

			<div class="tab-pane" id="desa">
		      <h3 class="text-center"><b>Desa Penyangga</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div>
						 <blockquote><?php echo $data["desa"] ?> </blockquote>
                           </div>
						   <hr/>
						   <label>Desa Penyangga Berdasarkan Laporan Masuk :</label>
						   <br/>
						   <table class="table table-bordered ">
						   <?php
							foreach($desa->result_array() as $row){
								echo "
									<tr>
										<td style='width:80px'>
										<img src='".base_url("assets/images/laporan/".$row['foto']."")."' alt='Foto ".$row['data3']."' style='width:80px'/>
										</td>
										<td>Nama Desa : ".$row['data1']." </td>
									</tr>
								";
							}
						?>
						   </table>
                    
                    
					</div>
				  </div>
				  	
            </div>

			<div class="tab-pane" id="area">
		      <h3 class="text-center"><b>Open Area</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div>
						 <div id="map-area" style="height: 600px;"> </div>
						 <br/>
						 <br/>
						 <blockquote><?php echo $data["area"] ?> </blockquote>
                           </div>
						   <hr/>
						   <label>Open Area Berdasarkan Laporan Masuk :</label>
						   <br/>
						   <table class="table table-bordered ">
						   <?php
							foreach($area->result_array() as $row){
								echo "
									<tr>
										<td style='width:80px'>
										<img src='".base_url("assets/images/laporan/".$row['foto']."")."' alt='Foto ".$row['data3']."' style='width:80px'/>
										</td>
										<td>".$row['data3']." </td>
									</tr>
								";
							}
						?>
						   </table>
                    
					</div>
				  </div>
					
            </div>


			<div class="tab-pane " id="dokumen">
                  <h3 class="text-center"><b>Dokumen Kawasan</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
					<table class="table table-bordered datatable" id="table-1" style="font-size:12px">
						<thead>
						<tr>
								<th>Nama Dokumen</th>
								<th>Author</th>
								<th>Tahun</th>
								<th>Download</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($data2->result_array() as $row){
								echo "
									<tr>
										<td>".$row['judul']."</td>
										<td>".$row['author']."</td>
										<td>".$row['tahun']."</td>
										<td>";
										if ($row['dokumen']!="") {
											echo "<a href='".base_url()."assets/images/dokumen/".$row['dokumen']."' class='btn btn-default btn-xs' target='_blank'> <i class='fa fa-download'></li> Download</a>";
										} else {
											echo "<a href='#' class='btn btn-default btn-xs' disabled> <i class='fa fa-download'></li> Download</a>";    
										}
										echo "</td>
											
										
									</tr>
								";
							}
						?>
						</tbody>
					</table>
                    
					</div>
				  </div>
				
            </div>

         </div>
      </div>
   </div>
</div>

