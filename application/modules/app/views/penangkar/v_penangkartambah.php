<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-home"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/penangkar">
            <i class="fa fa-pow"></i>Pendataan Penangkar</a>
    </li>
    <li class="active">
        <strong>Tambah Penangkar</strong>
    </li>
</ol>

<h3>Tambah Satwa </h3>
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Input
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">
        <?php pesan_get('msg', "Berhasil Menambahkan Satwa", "Gagal Menambahkan Satwa") ?>
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/penangkartambah" method="post" enctype="multipart/form-data" id="form">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nomor SK *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nosk" name="nosk">
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
                        <label class="col-lg-4 control-label">Nama Pemilik *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="pemilik" name="pemilik">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Alamat *</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jenis*</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="jenis" id="jenis">
                                <option value="" disabled selected>.:Pilih Jenis:.</option>
                                <option value="Mamalia">Mamalia</option>
                                <option value="Burung/Aves">Burung/Aves</option>
                                <option value="Amfibi">Amfibi</option>
                                <option value="Reptil">Reptil</option>
                                <option value="Ikan">Ikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Asal Usul*</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="asal_usul" name="asal_usul">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jumlah FO*</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="jumlah" name="jumlah">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-8">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/300x200" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 200px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="foto" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
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