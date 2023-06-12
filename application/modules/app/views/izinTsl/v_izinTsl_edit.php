<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-home"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/izinTsl">
            <i class="fa fa-pow"></i>Pendataan Izin TSL</a>
    </li>
    <li class="active">
        <strong>Tambah Data Izin TSL</strong>
    </li>
</ol>


<style>
    .table-bordered>thead>tr>th,
    .table-bordered>thead>tr>td {
        color: #303641 !important;
        font-weight: bold;
        text-align: center;
    }

    .input-group-addon {
        width: 120px;
    }

    .disabled-action {
        pointer-events: none;
        opacity: 0.65;
        filter: alpha(opacity=65);
        cursor: not-allowed;
    }
</style>

<h3>Tambah Data Izin TSL</h3>
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
        <?php pesan_get('msg', "Berhasil Edit Data Izin TSL", "Gagal Edit Data Izin TSL") ?>
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/izinTsledit" method="post" enctype="multipart/form-data" id="form" onsubmit="validateForm(event)">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jenis Perizinan *</label>
                        <div class="col-lg-8">
                            <select class="form-control disabled-action" name="jenis" id="jenis" onchange="loadpemilik()">
                                <option value="">-- Pilih Jenis Perizinan --</option>
                                <option value="penangkar" <?php echo $data['jenis'] == 'penangkar' ? 'selected' : '' ?>>Penangkar</option>
                                <option value="pengedar" <?php echo $data['jenis'] == 'pengedar' ? 'selected' : '' ?>>Pengedar</option>
                                <option value="lembaga konservasi" <?php echo $data['jenis'] == 'lembaga konservasi' ? 'selected' : '' ?>>Lembaga Konservasi</option>
                                <!-- <option value="reptile" <?php echo $data['jenis'] == 'reptile' ? 'selected' : '' ?>>Reptile</option> -->
                            </select>
                            <span id="errorMessagejenis" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Pemilik *</label>
                        <div class="col-lg-8">
                            <!-- <input type="text" class="form-control" id="pemilik" name="pemilik"> -->
                            <select class="form-control disabled-action" id="pemilik" name="pemilik">
                                <option value=""> -- Pilih Pemilik --</option>
                            </select>
                            <span id="errorMessagepemilik" style="color: red;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Waktu Pendataan</label>
                        <div class="col-lg-8">
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control datepicker error-message" data-format="dd-mm-yyyy" value="<?php echo date('d-m-Y', strtotime($data['waktu_pendataan'])) ?>" name="waktu_pendataan" style="background-color:#fff" placeholder="" id="waktu_pendataan" data-mask="date" aria-invalid="true">
                                <span class="input-group-addon" style="width: 140px;">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </div>
                            <span id="errorMessagewaktu_pendataan" style="color: red;"></span>
                        </div>
                    </div>



                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Kelas Satwa*</label>
                        <div class="col-lg-8">
                            <select class="form-control" name="kelas_satwa" id="kelas_satwa">
                                <option value="">-- Pilih Kelas Satwa --</option>
                                <option value="Mamalia" <?php echo $data['kelas_satwa'] == 'Mamalia' ? 'selected' : '' ?>>Mamalia</option>
                                <option value="Burung/Aves" <?php echo $data['kelas_satwa'] == 'Burung/Aves' ? 'selected' : '' ?>>Burung/Aves</option>
                                <option value="Amfibi" <?php echo $data['kelas_satwa'] == 'Amfibi' ? 'selected' : '' ?>>Amfibi</option>
                                <option value="Reptile" <?php echo $data['kelas_satwa'] == 'Reptile' ? 'selected' : '' ?>>Reptile</option>
                            </select>
                            <span id="errorMessagekelas_satwa" style="color: red;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jumlah Saat Ini*</label>
                        <div class="col-lg-8">
                            <input type="text" id="jumlah" name="jumlah" class="form-control angka" onkeypress="return inputAngka(event)" value="<?php echo $data['jumlah'] ?>">
                            <span id="errorMessagejumlah" style="color: red;"></span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Keterangan </label>
                        <div class="col-lg-8">
                            <textarea style="height: 100px;" class="form-control" id="keterangan" name="keterangan"><?php echo $data['keterangan']?></textarea>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-primary btn-s-xs   btn-icon icon-left">
            <i class="fa fa-save"></i> Simpan</button>
        &nbsp
        <a href="<?php echo base_url('app/izinTsl') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
            <i class="fa fa-times"></i> Kembali</a>

        </form>
    </footer>




</div>

<script>
    jQuery(document).ready(function($) {
        loadpemilik()
    })
    var inputs = document.getElementsByClassName("angka");

    // menambahkan event listener untuk setiap elemen input
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("input", function() {});
    }

    function inputAngka(evt) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;

        return true;

    }

    function loadpemilik() {
        let jenis = $("#jenis").val();
        $.ajax({
            url: "<?php echo base_url() ?>app/getPemilik",
            method: "GET",
            data: {
                jenis: jenis
            },
            success: function(response) {
                $("#pemilik").empty();
                $("#pemilik").append('<option value="">-- Pilih Pemilik --</option>');

                // Menambahkan opsi pemilik berdasarkan data response
                for (let i = 0; i < response.length; i++) {
                    let option = $("<option></option>").val(response[i].id).text(response[i].pemilik);

                    // Menentukan opsi pemilik yang dipilih berdasarkan value $data['id_reff']
                    if (response[i].id == "<?php echo $data['id_reff'] ?>") {
                        option.prop("selected", true);
                    }

                    $("#pemilik").append(option);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                // Tindakan yang ingin Anda lakukan jika terjadi error pada request
            }
        });
    }





    function validateForm(event) {
        var errorCount = 0;

        var jenis = $('#jenis').val();
        var pemilik = $('#pemilik').val();
        var waktu_pendataan = $('#waktu_pendataan').val();
        var kelas_satwa = $('#kelas_satwa').val();
        var jumlah = $('#jumlah').val();

        $('#errorMessagejenis').empty();
        $('#errorMessagepemilik').empty();
        $('#errorMessagewaktu_pendataan').empty();
        $('#errorMessagekelas_satwa').empty();
        $('#errorMessagejumlah').empty();

        if (jenis.trim() === '') {
            $('#errorMessagejenis').append('Jenis tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (pemilik.trim() === '') {
            $('#errorMessagepemilik').append('Nama Pemilik tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (waktu_pendataan.trim() === '') {
            $('#errorMessagewaktu_pendataan').append('Waktu pendataan tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (kelas_satwa.trim() === '') {
            $('#errorMessagekelas_satwa').append('Kelas Satwa tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (jumlah.trim() === '') {
            $('#errorMessagejumlah').append('Jumlah tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (errorCount !== 0) {
            // alert(errorCount)
            event.preventDefault(); // Menghentikan pengiriman form jika terdapat kesalahan validasi
            return
        }
    }
</script>