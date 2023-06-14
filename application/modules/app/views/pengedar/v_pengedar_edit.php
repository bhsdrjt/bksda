<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-satwas"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/pengedar ">
            <i class="fa fa-satwa"></i>Pengedar</a>
    </li>
    <li class="active">
        <strong>Edit Pengedar</strong>
    </li>
</ol>

<h3>Edit Pengedar </h3>
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Edit
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">
        <?php pesan_get('msg', "Berhasil Mengedit Pengedar", "Gagal Mengedit Pengedar") ?>
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/pengedaredit" method="post" enctype="multipart/form-data" id="form" onsubmit="validateForm(event)">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nomor SK *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nosk" name="nosk" value="<?php echo $data['nosk'] ?>">
                            <span id="errorMessagenosk" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Pemilik *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?php echo $data['pemilik'] ?>">
                            <span id="errorMessagepemilik" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Tentang SK *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="tentang_sk" name="tentang_sk" value="<?php echo $data['tentang_sk'] ?>">
                            <span id="errorMessagetentangsk" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Masa berlaku</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="tglawal_berlaku">Awal:</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control datepicker error-message" data-format="dd-mm-yyyy" value="<?php echo date('d-m-Y', strtotime($data['tglawal_berlaku'])) ?>" name="tglawal_berlaku" style="background-color:#fff" placeholder="" id="tglawal_berlaku" data-mask="date" aria-invalid="true">
                                            </div>
                                            <span id="errorMessageawal" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="tglakhir_berlaku">Akhir:</label>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control datepicker error-message" data-format="dd-mm-yyyy" value="<?php echo date('d-m-Y', strtotime($data['tglakhir_berlaku'])) ?>" name="tglakhir_berlaku" style="background-color:#fff" placeholder="" id="tglakhir_berlaku" data-mask="date" aria-invalid="true">
                                            </div>
                                            <span id="errorMessageakhir" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Alamat *</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="alamat" name="alamat"><?php echo $data['alamat'] ?></textarea>
                            <span id="errorMessagealamat" style="color: red;"></span>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jenis Komoditi*</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="jenis_komoditi" name="jenis_komoditi" value="<?php echo $data['jenis_komoditi']; ?>" >
                            <span id="errorMessagejenis_komoditi" style="color: red;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-8">
                            <div class="fileinput <?php echo ($data['foto'] == "") ? "fileinput-new" : "fileinput-exists" ?> " data-provides="fileinput">
                                <input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
                                <div class="fileinput-new thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
                                    <img src="http://placehold.it/300x200" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; height: 200px;" data-trigger="fileinput">
                                    <img src="<?php echo base_url() . "assets/images/pengedar/" . $data['foto'] ?>" alt="...">
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
        <a href="<?php echo base_url('app/pengedar') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
            <i class="fa fa-times"></i> Kembali</a>

        </form>
    </footer>

</div>
<script>
    jQuery(document).ready(function($) {
        tinymce.init({
            selector: '#jenis_komoditi',
            menubar: false,
            toolbar: 'bold italic',
            statusbar: false
        });
        tinymce.init({
            selector: '#tentang_sk',
            menubar: false,
            toolbar: 'bold italic',
            statusbar: false
        });

        // tinymce.get('jenis').on('change', function() {
        //     var cek = $('#jenis').valid();
        //     console.log(cek)
        // // });

        // var inputs = document.getElementsByClassName("angka");

        // // menambahkan event listener untuk setiap elemen input
        // for (var i = 0; i < inputs.length; i++) {
        //     inputs[i].addEventListener("input", function() {
        //         // memeriksa apakah nilai yang dimasukkan pengguna memenuhi kriteria minimal

        //     });
        // }

        // function inputAngka(evt) {

        //     var charCode = (evt.which) ? evt.which : event.keyCode

        //     if (charCode > 31 && (charCode < 48 || charCode > 57))

        //         return false;

        //     return true;

        // }
    })


    function validateForm(event) {
        var errorCount = 0;
        var nosk = $('#nosk').val();
        var pemilik = $('#pemilik').val();
        var alamat = $('#alamat').val();
        var tglawal_berlaku = $('#tglawal_berlaku').val();
        var tglakhir_berlaku = $('#tglakhir_berlaku').val();
        var jenis_komoditi = tinymce.get('jenis_komoditi').getContent();

        $('#errorMessagenosk').empty();
        $('#errorMessagepemilik').empty();
        $('#errorMessagealamat').empty();
        $('#errorMessagejenis_komoditi').empty();
        $('#errorMessageawal').empty();
        $('#errorMessageakhir').empty();
        $('#errorMessagejumlah').empty();
        $('#errorMessageasalusul').empty();

        if (nosk.trim() === '') {
            $('#errorMessagenosk').append('Nomor SK tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (pemilik.trim() === '') {
            $('#errorMessagepemilik').append('Nama Pemilik tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (alamat.trim() === '') {
            $('#errorMessagealamat').append('Alamat tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (tglawal_berlaku.trim() === '') {
            $('#errorMessageawal').append('Masa berlaku - Tanggal Awal tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (tglakhir_berlaku.trim() === '') {
            $('#errorMessageakhir').append('Masa berlaku - Tanggal Akhir tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (jenis_komoditi.trim() === '') {
            $('#errorMessagejenis_komoditi').append('Jenis Komoditi tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (errorCount > 0) {
            event.preventDefault();
            return
        }
    }
</script>