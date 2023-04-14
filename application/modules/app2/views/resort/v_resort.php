<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data Resort</strong> 
    </li>
</ol>

<h3>Data Resort</h3> 
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Data resort","Berhasil Menghapus Data resort","Berhasil mengedit Data resort","Berhasil mengedit Data resort") ?>
            <a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah Data resort</a>
             
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                  <tr>
                    <th width='30px'>No</th>
                    <th>Nama Resort</th>
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
                                <td>".$row['namaresort']."</td>
                                <td>
								<div>
                                  <a href='".base_url("app/resortlihat?id=".$row['id_resort']."")."' class='btn btn-default  lihat' title='Lihat' id='".$row['id_resort']."'><i class='fa fa-eye'></i> Lihat</a>
                                    <a href='#' class='btn btn-primary edit' title='Edit' data-toggle='modal' id='".$row['id_resort']."' data-target='#myModal2'><i class='fa fa-edit' id='".$row['id_resort']."'></i> Edit</a>
									<a href='#' class='btn btn-danger  hapus' title='Hapus' id='".$row['id_resort']."'><i class='fa fa-trash-o'></i> Hapus</a>
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
        <div class="modal-content" id="modal-tambah">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data resort</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>app/resorttambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                           
                            <div class="form-group">
                                <label for="field-1" class="control-label">SKW *</label>
                                <select class="form-control" name="id_skw" id="id_skw" >
                                    <option value="" disabled selected>.:Pilih SKW:.</option>
                                
                                    <?php
                                        foreach($skw->result_array() as $row) {
                                            
                                            echo "<option value='".$row['id_skw']."'>";
                                            echo "".$row['namawilayah']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama Resort*</label>
                                <input type="text" class="form-control" id="namaresort" name="namaresort">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Koordinat Lintang  Resort *</label>
                                <input type="text" class="form-control" id="lintang" name="lintang" placeholder="Contoh:-3.70459(minimal 5 angka setelah koma)">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Koordinat Bujur  Resort *</label>
                                <input type="text" class="form-control" id="bujur" name="bujur"  placeholder="Contoh:128.11475(minimal 5 angka setelah koma)">
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



<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-edit">
          
         
        </div>
    </div>
</div>