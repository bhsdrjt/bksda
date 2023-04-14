<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data laporan</strong> 
    </li>
</ol>

<h3>Data laporan</h3> 
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"","Berhasil Menghapus Laporan","Berhasil Menghapus Laporan","") ?>
      
             
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                  <tr>
                    <th width='30px'>No</th>

                    <th>Jenis Laporan</th>
                    <th>Lokasi Pendataan</th>
                    <th>Waktu Pendataan</th>
                    <th>Nama Kegiatan</th>
                    <th>Status</th>
                    <th width="250px">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
					foreach($data->result_array() as $row){
                        $i++;
						echo "
							<tr>
								
                                <td>".$i."</td>
                        
                                <td>".$row['kategori']."</td>
                                <td>".$row['namakawasan']."</td>
                                <td>".tanggal($row['waktu'])."</td>
                                <td>".$row['kegiatan']."</td>
                                <td>";
                                if($row['validasi']=="Menunggu Validasi") {
                                    echo "<span' class='text-warning'><i class='fa fa-spinner'></i> ".$row['validasi']."</span>";
                                } else if ($row['validasi']=="Tervalidasi") {
                                    echo "<span' class='text-succcess'><i class='fa fa-check-circle'></i> ".$row['validasi']."</span></a>";
                                } else if ($row['validasi']=="Tertolak") {
                                    echo "<span' class='text-danger'><i class='fa fa-check-circle'></i> ".$row['validasi']."</span></a>";
                                } 
                                echo "</td>
                                <td>
								<div>";
                                if($row['validasi']=="Menunggu Validasi") {

                                    echo  "<a href='".base_url("app/laporandetail?id=".$row['id_laporan']."")."' class='btn btn-default  lihat' title='Lihat' id='".$row['id_laporan']."' style='width:60px'><i class='fa fa-eye'></i> Lihat</a>
                                    <a href='".base_url("app/laporanedit?id=".$row['id_laporan']."")."'  class='btn btn-primary edit' title='Edit' id='".$row['id_laporan']."' ><i class='fa fa-edit' id='".$row['id_laporan']."'></i> Edit</a>
									<a href='#' class='btn btn-danger  hapus' title='Hapus' id='".$row['id_laporan']."'><i class='fa fa-trash-o'></i> Hapus</a>";
                                } else if ($row['validasi']=="Tervalidasi") {
                                    echo  "<a href='".base_url("app/laporandetail?id=".$row['id_laporan']."")."' class='btn btn-default  lihat' title='Lihat' id='".$row['id_laporan']."' style='width:60px'><i class='fa fa-eye'></i> Lihat</a>";
                                } else if ($row['validasi']=="Tertolak") {
                                    echo  "<a href='".base_url("app/laporandetail?id=".$row['id_laporan']."")."' class='btn btn-default  lihat' title='Lihat' id='".$row['id_laporan']."' style='width:60px'><i class='fa fa-eye'></i> Lihat</a>
                                    <a href='#' class='btn btn-danger  hapus' title='Hapus' id='".$row['id_laporan']."'><i class='fa fa-trash-o'></i> Hapus</a>";;
                                    
                                } 

                                echo "
								</div>
								</td>
							</tr>
						";
					}
				?>
                </tbody>
            </table>
    </div>
</div>
