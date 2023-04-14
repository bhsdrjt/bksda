<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data KEE</strong> 
    </li>
</ol>

<h3>Data KEE</h3> 
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Data KEE","Berhasil Menghapus Data Kee","Berhasil mengedit Data KEEKEE","Berhasil mengedit Data KEE") ?>
            <a href="<?php  echo base_url("app/keetambah") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" >
                <i class="fa fa-plus"></i> Tambah Data KEE</a>
             
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                  <tr>
                    <th width='30px'>No</th>
                    <th>Jenis KEE</th>
                    <th>Lokasi</th>
                    <th>Bentuk Pengelolaan</th>
                    <th>SK</th>
                    <th>Nilai Ekosistem Penting</th>
                    <th width="200px">Opsi</th>
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
                                <td>".$row['jenis']."</td>
                                <td>".$row['lokasi']."</td>
                                <td>".$row['bentuk']."</td>
                                <td>".$row['sk']."</td>
                                <td>".$row['nilai']."</td>
                                <td>
								<div>
                                  <a href='".base_url("app/keelihat?id=".$row['id_kee']."")."' class='btn btn-default  lihat' title='Lihat' id='".$row['id_kee']."'><i class='fa fa-eye'></i> Lihat</a>
                                    <a href='".base_url("app/keeedit?id=".$row['id_kee']."")."' class='btn btn-primary edit' title='Edit' id='".$row['id_kee']."' ><i class='fa fa-edit' id='".$row['id_kee']."'></i> Edit</a>
									<a href='#' class='btn btn-danger  hapus' title='Hapus' id='".$row['id_kee']."'><i class='fa fa-trash-o'></i> Hapus</a>
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
