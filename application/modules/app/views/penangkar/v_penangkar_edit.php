<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-satwas"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/penangkar">
            <i class="fa fa-satwa"></i>Penangkar</a>
    </li>
    <li class="active">
        <strong>Tambah Penangkar</strong>
    </li>
</ol>

<h3>Edit Penangkar </h3>
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Edit Penangkar
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">
        <?php pesan_get('msg', "Berhasil Mengedit Penangkar", "Gagal Mengedit Penangkar") ?>
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/penangkaredit" method="post" enctype="multipart/form-data" id="form">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nomor SK *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nosk" name="nosk" value="<?php echo $data['nosk'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Pemilik *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?php echo $data['pemilik'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Alamat *</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="alamat" name="alamat"><?php echo $data['alamat'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jenis *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $data['jenis']; ?>" style="font-weight:bold; font-style:italic;">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jumlah*</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="jumlah_fo" name="jumlah_fo" value="<?php echo $data['jumlah_fo'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Masa berlaku</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Tgl Awal</span>
                                        <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tglawal_berlaku'); ?>" name="tglawal_berlaku" style="background-color:#fff" placeholder="dd/mm/yyyy" id="tglawal_berlaku" data-mask="date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Tgl Berakhir</span>
                                        <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tglakhir_berlaku'); ?>" name="tglakhir_berlaku" style="background-color:#fff" placeholder="dd/mm/yyyy" id="tglakhir_berlaku" data-mask="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Asal Usul*</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="asal_usul" name="asal_usul" value="<?php echo $data['asal_usul'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-8">
                            <div class="fileinput <?php echo ($data['foto'] == "") ? "fileinput-new" : "fileinput-exists" ?> " data-provides="fileinput">
                                <input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
                                <div class="fileinput-new thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/300x200" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
                                    <img src="<?php echo base_url() . "assets/images/penangkar/" . $data['foto'] ?>" alt="...">
                                </div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="foto" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange  	fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>


    </div>
    <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-primary btn-s-xs   btn-icon icon-left">
            <i class="fa fa-save"></i> Simpan</button>
        &nbsp
        <a href="<?php echo base_url('app/penangkar') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
            <i class="fa fa-times"></i> Kembali</a>

        </form>
    </footer>

</div>
<script>
    $('#form').validate({ // initialize plugin
        highlight: function(label) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
            //$('.error').css({'font-size':'9px','margin-bottom':'0px'});
            $('#status-error').css({
                'font-size': '6px'
            });
        },
        success: function(label) {
            $(label).closest('.form-group').removeClass('has-error');
            label.remove();
        },
        errorPlacement: function(error, element) {
            var placement = element.closest('.input-group');
            if (!placement.get(0)) {
                placement = element;
            }
            if (error.text() !== '') {
                placement.after(error);
            }
        },

        rules: {
            nosk: {
                required: true
            },
            tglawal_berlaku: {
                required: true,
            },
            tglakhir_berlaku: {
                required: true,
            },
            pemilik: {
                required: true,
            },
            alamat: {
                required: true,
            },
            jenis: {
                required: true,
            },
            jumlah_fo: {
                required: true,
                number: true
            },
            asal_usul: {
                required: true,
            }
        }
    });
</script>