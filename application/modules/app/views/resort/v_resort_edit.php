<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data resort</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>app/resorteditproses" method="post" enctype="multipart/form-data" id="form2">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_resort" id="id_resort" value="<?php echo $data['id_resort'] ?>"> 
                            <div class="form-group">
                                <label for="field-1" class="control-label">SKW *</label>
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
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama resort*</label>
                                <input type="text" class="form-control" id="namaresort" name="namaresort"  value="<?php echo $data['namaresort'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Koordinat Lintang Kantor Resort *</label>
                                <input type="text" class="form-control" id="lintang" name="lintang" placeholder="Contoh:-3.70459(minimal 5 angka setelah koma)" value="<?php echo $data['lintang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Koordinat Bujur Kantor Seksi *</label>
                                <input type="text" class="form-control" id="bujur" name="bujur"  placeholder="Contoh:128.11475(minimal 5 angka setelah koma)" value="<?php echo $data['bujur'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Kepala SKW</label>
                                <input type="text" class="form-control" id="kepala" name="kepala"   value="<?php echo $data['kepala'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Contact Person</label>
                                <input type="text" class="form-control" id="kontak" name="kontak"   value="<?php echo $data['kontak'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"><?php echo $data['keterangan'] ?></textarea>
                            </div>
                          
                             <div class="form-group">
                                <label for="field-1" class="control-label">Foto Kepala SKW</label><br/>
                                    <div class="fileinput <?php  echo ($data['foto']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput" >
                                    <input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
                                        <div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
                                        <img src="http://placehold.it/180x240"  alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 180px; height: 240px;" data-trigger="fileinput">
                                            <img src="<?php echo base_url()."assets/images/foto/".$data['foto'] ?>" alt="...">  
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>