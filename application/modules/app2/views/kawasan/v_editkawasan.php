<ol class="breadcrumb bc-3">
   <li>
      <a href="<?php echo base_url() ?>app">
      <i class="fa fa-user"></i>Data kawasan</a>
   </li>
   <li class="active">
      <strong>Edit kawasan</strong>
   </li>
</ol>
<h3>Edit kawasan "<?php echo $data["namakawasan"] ?>"</h3>
<a href="<?php echo base_url('app/kawasan') ?>" class="btn btn-primary btn-s-xs  btn-icon icon-left">
		<i class="fa fa-arrow-left"></i> Kembali</a>
		<hr/>
<div class="row">
   <div class="col-sm-12">
      <div class="tabs-vertical-env">
         <ul class="nav tabs-vertical left-aligned">
            <!-- available classes "right-aligned" -->
            <li class="<?= ($aktif == "profil") ? " active" : ""; ?>"><a href="#profil" data-toggle="tab">Profil Kawasan </a></li>
            <li class="<?= ($aktif == "ekosistem") ? " active" : ""; ?>"><a href="#ekosistem" data-toggle="tab">Ekosistem</a></li>
            <li class="<?= ($aktif == "satwa") ? " active" : ""; ?>"><a href="#satwa" data-toggle="tab">Satwa</a></li>
            <li class="<?= ($aktif == "tumbuhan") ? " active" : ""; ?>"><a href="#tumbuhan" data-toggle="tab">Tumbuhan</a></li>
			<li class="<?= ($aktif == "wisata") ? " active" : ""; ?>"><a href="#wisata" data-toggle="tab">Wisata Alam</a></li>
            <li class="<?= ($aktif == "potensi") ? " active" : ""; ?>"><a href="#potensi" data-toggle="tab">Potensi Sosial Ekonomi</a></li>
            <li class="<?= ($aktif == "desa") ? " active" : ""; ?>"><a href="#desa" data-toggle="tab">Desa Penyangga</a></li>
            <li class="<?= ($aktif == "area") ? " active" : ""; ?>"><a href="#area" data-toggle="tab">Open Area</a></li>
            <li class="<?= ($aktif == "dokumen") ? " active" : ""; ?>"><a href="#dokumen" data-toggle="tab">Dokumen Kawasan</a></li>
         </ul>
         <div class="tab-content">
            <div class="tab-pane <?= ($aktif == "profil") ? " active" : ""; ?>" id="profil">
			    <?php pesan_get('msgprofil',"Berhasil Menyimpan Profil Kawasan","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasanprofil"	method="post"  enctype="multipart/form-data" id="formprofil">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Profil Kawasan</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Nama Kawasan </label>
                           <div class="col-lg-8">
                              <input type="text" class="form-control" name="namakawasan" id="namakawasan" value="<?php echo $data["namakawasan"] ?>" 
                                 />
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Fungsi Kawasan </label>
                           <div class="col-lg-8">
                              <input type="text" class="form-control" name="fungsi" id="fungsi" value="<?php echo $data['fungsi'] ?>"  	/>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">SKW </label>
                           <div class="col-lg-8">
                              <select class="form-control" name="id_skw" id="id_skw" >
                                 <option value="" disabled selected>.:Pilih SKW:.</option>
                                 <?php
                                    foreach($skw->result_array() as $row) {
                                        
                                        echo "<option value='".$row['id_skw']."'".($data['id_skw']==$row['id_skw']?"Selected":"").">";
                                        echo "".$row['namawilayah']."</option>";
                                    }
                                    ?>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Koordinat Lintang Kawasan </label>
                           <div class="col-lg-8">
                              <input type="text" class="form-control" id="lintang" name="lintang" placeholder="Contoh:-3.70459(minimal 5 angka setelah koma)" value="<?php echo $data['lintang'] ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Koordinat Bujur Kawasan </label>
                           <div class="col-lg-8">
                              <input type="text" class="form-control" id="bujur" name="bujur"  placeholder="Contoh:128.11475(minimal 5 angka setelah koma)" value="<?php echo $data['bujur'] ?>">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Nomor SK</label>
                           <div class="col-lg-8">
                              <input type="text" class="form-control" name="nosk" id="nosk" value="<?php echo $data['nosk'] ?>" 
                                 />
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Tanggal SK</label>
                           <div class="col-lg-8">
                              <div class="input-group">
                                 <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" name="tanggalsk" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="tanggalsk"  data-mask="date" value="<?php echo tanggal($data['tanggalsk']) ?>">
                                 <div class="input-group-addon" style="background-color:#fff">
                                    <a href="#">
                                    <i class="entypo-calendar"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Upload SK</label>
                           <div class="col-lg-8">
                              <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
                                 <div class="input-group">
                                    <div class="form-control uneditable-input" data-trigger="fileinput">
                                       <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                       <span class="fileinput-filename"><?php echo substr($data['sk'],0,40) ?></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Select file</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="sk"   id="image-source"  onchange="previewImage();">
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Letak Administrasi</label>
                           <div class="col-lg-8">
                              <input type="text" class="form-control" name="letakadmin" id="letakadmin" value="<?php echo $data['letakadmin'] ?>" 
                                 />
                           </div>
                        </div>
                       
                     </div>
                     <div class="col-md-6">
					 <div class="form-group">
                           <label class="col-lg-4 control-label">Luas Kawasan</label>
                           <div class="col-lg-8">
                              <input type="text" class="form-control" name="luas" id="luas" value="<?php echo $data['luas'] ?>" 
                                 />
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Sejarah Kawasan</label>
                           <div class="col-lg-8">
                              <textarea class="form-control" name="sejarah" id="sejarah" rows="5"><?php echo $data['sejarah'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Aksesibilitas Kawasan</label>
                           <div class="col-lg-8">
                              <textarea class="form-control" name="akses" id="akses" rows="5"><?php echo $data['akses'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Status Hukum Kawasan</label>
                           <div class="col-lg-8">
                              <textarea class="form-control" name="statushukum" id="statushukum" rows="5"><?php echo $data['statushukum'] ?></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
               </form>
            </div>
            <div class="tab-pane <?= ($aktif == "ekosistem") ? " active" : ""; ?>" id="ekosistem">
			<?php pesan_get('msgekosistem',"Berhasil Menyimpan Ekosistem Kawasan","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasanekosistem"	method="post"  enctype="multipart/form-data" id="formekosistem">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Ekosistem</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-6">
						 <div class="form-group">
                           <label class="col-lg-4 control-label">Keaslian Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="asli_ekosistem" id="asli_ekosistem" rows="4"><?php echo $data['asli_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Kekayaan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="kaya_ekosistem" id="kaya_ekosistem" rows="4"><?php echo $data['kaya_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Keterwakilan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="wakil_ekosistem" id="wakil_ekosistem" rows="4"><?php echo $data['wakil_ekosistem'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Keutuhan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="utuh_ekosistem" id="utuh_ekosistem" rows="4"><?php echo $data['utuh_ekosistem'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Ketergantungan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="gantung_ekosistem" id="gantung_ekosistem" rows="4"><?php echo $data['gantung_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Keunikan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="unik_ekosistem" id="unik_ekosistem" rows="4"><?php echo $data['unik_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Kerentanan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="rentan_ekosistem" id="rentan_ekosistem" rows="4"><?php echo $data['rentan_ekosistem'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Produktivitas Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="produk_ekosistem" id="produk_ekosistem" rows="4"><?php echo $data['produk_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Karakteristik Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="karakter_ekosistem" id="fungsi_ekosistem" rows="4"><?php echo $data['karakter_ekosistem'] ?></textarea>
                           </div>
                        </div>
					
						
                     </div>
                     <div class="col-md-6">
					 <div class="form-group">
                           <label class="col-lg-4 control-label">Fungsi Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="fungsi_ekosistem" id="fungsi_ekosistem" rows="4"><?php echo $data['fungsi_ekosistem'] ?></textarea>
                           </div>
                        </div>
                      
						 <div class="form-group">
                           <label class="col-lg-4 control-label">Kekhasan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="khas_ekosistem" id="khas_ekosistem" rows="4"><?php echo $data['khas_ekosistem'] ?></textarea>
                           </div>
                        </div>
					 	<div class="form-group">
                           <label class="col-lg-4 control-label">Kelangkaan Ekosistem </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="langka_ekosistem" id="langka_ekosistem" rows="4"><?php echo $data['langka_ekosistem'] ?></textarea>
                           </div>
                        </div>
						 <div class="form-group">
                           <label class="col-lg-4 control-label">Jenis Tanah</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="jenistanah_ekosistem" id="jenistanah_ekosistem" rows="4"><?php echo $data['jenistanah_ekosistem'] ?></textarea>
                           </div>
                        </div>
						
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Geologi </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="geologi_ekosistem" id="geologi_ekosistem" rows="4"><?php echo $data['geologi_ekosistem'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Ketinggian </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="ketinggian_ekosistem" id="ketinggian_ekosistem" rows="4"><?php echo $data['ketinggian_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Kelerengan</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="kelerengan_ekosistem" id="kelerengan_ekosistem" rows="4"><?php echo $data['kelerengan_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Bentang Alam</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="bentangalam_ekosistem" id="bentangalam_ekosistem" rows="4"><?php echo $data['bentangalam_ekosistem'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Gejala Alam</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="gejalaalam_ekosistem" id="gejalaalam_ekosistem" rows="4"><?php echo $data['gejalaalam_ekosistem'] ?></textarea>
                           </div>
                        </div>
						
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
               </form>	
            </div>
            <div class="tab-pane <?= ($aktif == "satwa") ? " active" : ""; ?>" id="satwa">
			
			<?php pesan_get('msgsatwa',"Berhasil Menyimpan Data Satwa Kawasan","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasansatwa"	method="post"  enctype="multipart/form-data" id="formsatwa">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Satwa Liar</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div class="form-group">
						   <textarea class="form-control wysi" name="satwa" id="satwa"><?php echo $data['satwa'] ?></textarea>
                           </div>
                    
					</div>
				  </div>
				  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
				  </form>	



			
            </div>
            <div class="tab-pane <?= ($aktif == "tumbuhan") ? " active" : ""; ?>" id="tumbuhan">
			<?php pesan_get('msgtumbuhan',"Berhasil Menyimpan Data Tumbuhan Kawasan","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasantumbuhan"	method="post"  enctype="multipart/form-data" id="formtumbuhan">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Tumbuhan</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div class="form-group">
						   <textarea class="form-control wysi" name="tumbuhan" id="tumbuhan"><?php echo $data['tumbuhan'] ?></textarea>
                           </div>
                    
					</div>
				  </div>
				  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
				  </form>	
            </div>
			<div class="tab-pane <?= ($aktif == "wisata") ? " active" : ""; ?>" id="wisata">
			<?php pesan_get('msgwisata',"Berhasil Menyimpan Data Wisata Alam Kawasan","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasanwisata"	method="post"  enctype="multipart/form-data" id="formwisata">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Wisata Alam</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div class="form-group">
						   <textarea class="form-control wysi" name="wisata" id="wisata"><?php echo $data['wisata'] ?></textarea>
                           </div>
                    
					</div>
				  </div>
				  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
				  </form>	
            </div>
			<div class="tab-pane <?= ($aktif == "potensi") ? " active" : ""; ?>" id="potensi">
			<?php pesan_get('msgpotensi',"Berhasil Menyimpan Potensi Sosial dan Ekonomi","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasanpotensi"	method="post"  enctype="multipart/form-data" id="formpotensi">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Potensi Sosial dan Ekonomi</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-6">
						 <div class="form-group">
                           <label class="col-lg-4 control-label">Sumber Ekonomi Masyarakat</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="sumberekonomi" id="sumberekonomi" rows="4"><?php echo $data['sumberekonomi'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Perkembangan Usaha</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="perkembanganusaha" id="perkembanganusaha" rows="4"><?php echo $data['perkembanganusaha'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Investasi </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="investasi" id="investasi" rows="4"><?php echo $data['investasi'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Ketergantungan Masyarakat</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="ketergantunganmasyarakat" id="ketergantunganmasyarakat" rows="4"><?php echo $data['ketergantunganmasyarakat'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Sarana & Prasarana</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="saranaprasarana" id="saranaprasarana" rows="4"><?php echo $data['saranaprasarana'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Rencana Pembangunan </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="rencanapembangunan" id="rencanapembangunan" rows="4"><?php echo $data['rencanapembangunan'] ?></textarea>
                           </div>
                        </div>
						<div class="form-group">
                           <label class="col-lg-4 control-label">Sejarah Pemukiman</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="sejarahpemukiman" id="sejarahpemukiman " rows="4"><?php echo $data['sejarahpemukiman'] ?></textarea>
                           </div>
                        </div>
                       
                     </div>
                     <div class="col-md-6">
					 <div class="form-group">
                           <label class="col-lg-4 control-label">Perkembangan Demografi </label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="perkembangandemografi" id="perkembangandemografi" rows="4"><?php echo $data['perkembangandemografi'] ?></textarea>
                           </div>
                        </div>
                      
						 <div class="form-group">
                           <label class="col-lg-4 control-label">Kearifan Tradisional</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="kearifantradisional" id="kearifantradisional" rows="4"><?php echo $data['kearifantradisional'] ?></textarea>
                           </div>
                        </div>
					 	<div class="form-group">
                           <label class="col-lg-4 control-label">Kelembagaan</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="kelembagaan" id="kelembagaan" rows="4"><?php echo $data['kelembagaan'] ?></textarea>
                           </div>
                        </div>
						 <div class="form-group">
                           <label class="col-lg-4 control-label">Adat Istiadat</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="adatistiadat" id="adatistiadat" rows="4"><?php echo $data['adatistiadat'] ?></textarea>
                           </div>
                        </div>
						
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Persepsi Masyarakat Setempat Terhadap Kawasan & Potensinya</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="persepsimasyarakat" id="persepsimasyarakat" rows="4"><?php echo $data['persepsimasyarakat'] ?></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-lg-4 control-label">Persepsi Pemerintah Daerah Terhadap Kawasan & potensinya</label>
                           <div class="col-lg-8">
						  	 <textarea class="form-control" name="persepsipemerintah" id="persepsipemerintah" rows="4"><?php echo $data['persepsipemerintah'] ?></textarea>
                           </div>
                        </div>
						
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
               </form>	
            </div>

			<div class="tab-pane <?= ($aktif == "desa") ? " active" : ""; ?>" id="desa">
			<?php pesan_get('msgdesa',"Berhasil Menyimpan Data Desa Penyangga","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasandesa"	method="post"  enctype="multipart/form-data" id="formdesa">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Desa Penyangga</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div class="form-group">
						   <textarea class="form-control wysi" name="desa" id="desa"><?php echo $data['desa'] ?></textarea>
                           </div>
                    
					</div>
				  </div>
				  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
				  </form>	
            </div>

			<div class="tab-pane <?= ($aktif == "area") ? " active" : ""; ?>" id="area">
			<?php pesan_get('msgarea',"Berhasil Menyimpan Data Open Area","Gagal  menyimpan Perubahan") ?>
               <form role="form" class="form-horizontal"  action="<?php echo base_url() ?>app/editkawasanarea"	method="post"  enctype="multipart/form-data" id="formarea">
                  <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				  <input type="hidden" name="id_kawasan" value="<?=$data["id_kawasan"]?>">
                  <h3 class="text-center"><b>Open Area</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
						 <div class="form-group">
						   <textarea class="form-control wysi" name="area" id="area"><?php echo $data['area'] ?></textarea>
                           </div>
                    
					</div>
				  </div>
				  <div class="text-center">
                     <button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
                     <i class="fa fa-save"></i> Simpan</button>
                  </div>
				  </form>	
            </div>


			<div class="tab-pane <?= ($aktif == "dokumen") ? " active" : ""; ?>" id="dokumen">
			<?php pesan_get('msgdokumen',"Berhasil Menambah Dokumen Kawasan","Gagal  menyimpan Perubahan") ?>
                  <h3 class="text-center"><b>Dokumen Kawasan</b> </h3>
                  <hr/>
                  <div class="row">
                     <div class="col-md-12">
					 <a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" data-toggle="modal" data-target="#myModal">
						<i class="fa fa-plus"></i> Tambah Dokumen Kawasan</a>
					<table class="table table-bordered datatable" id="table-1" style="font-size:12px">
						<thead>
						<tr>
								<th>Nama Dokumen</th>
								<th>Author</th>
								<th>Tahun</th>
								<th>Download</th>
								<th>Opsi</th>
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
											
										<td>
									
										<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['id_dokumen']."'><i class='fa fa-trash-o'></i> Hapus</a>
									</td>
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



<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-tambah">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Dokumen Kawasan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>app/editkawasandokumen" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_kawasan" value="<?=$data['id_kawasan']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Judul Dokumen</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Dokumen" required>
                            </div>
							<div class="form-group">
                                <label for="field-1" class="control-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Masukkan Author Dokumen" required>
                            </div>
							<div class="form-group">
                                <label for="field-1" class="control-label">Tahun</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun Dokumen" required data-validate="number">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">File</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo set_value('dokumen') ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="dokumen"   required>
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
                            </div>
                            
                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

