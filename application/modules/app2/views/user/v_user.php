<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-users"></i>App</a>
    </li>
    <li class="active">
        <strong>User</strong>
    </li>
</ol>

<h3>User</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah User","Berhasil Menghapus User","Berhasil mengedit User","Berhasil Mengganti Password") ?>
            <a href="<?php echo base_url() ?>app/usertambah" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left">
                <i class="fa fa-plus"></i> Tambah User</a>
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                    <tr>
                        <th width='30px'>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Jabatan</th>
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
                                <td>".$row['username']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['nohp']."</td>
                                <td>".$row['jabatan']."</td>
								<td>
								<div>
                                    <a href='".base_url("app/useredit?id=".$row['username']."")."' class='btn btn-primary btn-xs' title='Edit/Lihat' id='".$row['username']."'><i class='fa fa-edit' id='".$row['username']."'  ></i> Edit</a>
                                    <a href='#' class='btn btn-info btn-xs kunci' title='Password' data-toggle='modal' id='".$row['username']."' data-target='#myModal'><i class='fa fa-key' id='".$row['username']."'  ></i> Reset Password</a>
                                    
									<a href='#' class='btn btn-danger btn-xs hapus' title='Hapus' id='".$row['username']."'><i class='fa fa-trash-o'></i> Hapus</a>
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


<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content"  id="modal-lihat">
				
			
			</div>
		</div>
	</div>
