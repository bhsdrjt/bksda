<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data kawasan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>app/kawasaneditproses" method="post" enctype="multipart/form-data" id="form2">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_kawasan" id="id_kawasan" value="<?php echo $data['id_kawasan'] ?>"> 
                           
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama kawasan*</label>
                                <input type="text" class="form-control" id="namakawasan" name="namakawasan"  value="<?php echo $data['namakawasan'] ?>">
                            </div>
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
                                <label for="field-1" class="control-label">Koordinat Lintang Kantor kawasan *</label>
                                <input type="text" class="form-control" id="lintang" name="lintang" placeholder="Contoh:-3.70459(minimal 5 angka setelah koma)" value="<?php echo $data['lintang'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Koordinat Bujur Kantor Seksi *</label>
                                <input type="text" class="form-control" id="bujur" name="bujur"  placeholder="Contoh:128.11475(minimal 5 angka setelah koma)" value="<?php echo $data['bujur'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Upload SK Penetapan</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
                                    <div class="input-group">
                                        <div class="form-control uneditable-input" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"><?php echo $data['sk'] ?></span>
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