<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data kawasan</strong> 
    </li>
</ol>

<h3>Data kawasan</h3> 
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Menambah Data kawasan","Berhasil Menghapus Data kawasan","Berhasil mengedit Data kawasan","Berhasil mengedit Data kawasan") ?>
            <a href="#" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> Tambah Data kawasan</a>
             
            <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
                <thead>
                  <tr>
                    <th width='30px'>No</th>
                    <th>Nama kawasan</th>
                    <th>SKW</th>
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
                                <td>".$row['namakawasan']."</td>
                                <td>".$row['namawilayah']."</td>
                                <td>
								<div>
                                
                                    <a href='".base_url("app/editkawasan?id=".$row['id_kawasan']."")."'  class='btn btn-primary edit' title='Edit' id='".$row['id_kawasan']."' ><i class='fa fa-edit' id='".$row['id_kawasan']."'></i> Edit</a>
									<a href='#' class='btn btn-danger  hapus' title='Hapus' id='".$row['id_kawasan']."'><i class='fa fa-trash-o'></i> Hapus</a>
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
                <h4 class="modal-title">Tambah Data kawasan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>app/kawasantambah" method="post" enctype="multipart/form-data" id="form">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama kawasan*</label>
                                <input type="text" class="form-control" id="namakawasan" name="namakawasan">
                            </div>
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
                                <label for="field-1" class="control-label">Koordinat Lintang  kawasan *</label>
                                <input type="text" class="form-control" id="lintang" name="lintang" placeholder="Contoh:-3.70459(minimal 5 angka setelah koma)">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Koordinat Bujur  kawasan *</label>
                                <input type="text" class="form-control" id="bujur" name="bujur"  placeholder="Contoh:128.11475(minimal 5 angka setelah koma)">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Upload SK Penetapan</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
                                    <div class="input-group">
                                        <div class="form-control uneditable-input" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"><?php echo set_value('sk') ?></span>
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