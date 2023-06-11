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

<style>
    .error {
        color: red;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>thead>tr>td {
        color: #303641 !important;
        font-weight: bold;
        text-align: center;
    }

    .input-group-addon {
        width: 120px;
    }

    i.mce-ico.mce-i-bold:before,
    i.mce-ico.mce-i-italic:before {
        font-size: 12px !important;
    }
</style>
<!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->


<h3>Edit Penangkar </h3>
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
                        <label class="col-lg-4 control-label">Alamat *</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="alamat" name="alamat"><?php echo $data['alamat'] ?></textarea>
                            <span id="errorMessagealamat" style="color: red;"></span>
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
                        <label class="col-lg-4 control-label">Asal Usul*</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="asal_usul" name="asal_usul" value="<?php echo $data['asal_usul'] ?>">
                            <span id="errorMessageasalusul" style="color: red;"></span>
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




                    <!-- <div class="form-group">
                        <label class="col-lg-4 control-label">Jenis *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="jenis" value="<?php echo $data['jenis'] ?>" name="jenis">
                            <span id="errorMessagejenis" style="color: red;"></span>
                        </div>
                    </div> -->


                </div>
                <div class="col-md-6">
                    <!-- <div class="form-group">
                        <label class="col-lg-4 control-label">Jumlah*</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control angka" id="jumlah_fo" name="jumlah_fo" value="<?php echo $data['jumlah_fo'] ?>" onkeypress="return inputAngka(event)">
                            <span id="errorMessagejumlah" style="color: red;"></span>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-md-2 control-label text-left">Detail Satwa </label>
                        <span id="errorMessagedetail" style="color: red;"></span>

                        <table class="table table-bordered datatable" id="table-1">
                            <thead>
                                <tr>
                                    <th style="width: auto;">Satwa</th>
                                    <th>Jumlah</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody id="isi">
                                <tr>
                                    
                                    <td>
                                        <input type="text" class="form-control" id="satwa">
                                        <span id="errorMessagesatwa" style="color: red;"></span>
                                    </td>
                                    <td style="vertical-align:middle;">
                                        <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="jumlah">
                                        <span id="errorMessagejumlah" style="color: red;"></span>
                                    </td>
                                    <td style="vertical-align:middle; text-align:center;">
                                        <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
                                    </td>
                                </tr>
                                <?php
                                $detail  = json_decode($data['detail'], true);
                                if (!empty($detail)) {
                                    foreach ($detail as $d) { ?>
                                        <tr>
                                            <td id="satwa1"><?php echo $d['satwa'] ?> </td>
                                            <td id="jumlah1"><input type="text" class="form-control angka" onkeypress="return inputAngka(event)" value="<?php echo $d['jumlah'] ?>"></td>
                                            <td>
                                                <input type="hidden" class="form-control" value="<?php echo $d['id_detail'] ?>" id="id_detail">
                                                <button type="button" class="btn btn-danger hapus">Hapus</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


    </div>
    <footer class="panel-footer text-right bg-light lter">
        <a type="button" id="tombol-simpan" class="btn btn-primary btn-s-xs btn-icon icon-left">
            <i class="fa fa-save"></i> Simpan</a>
        &nbsp
        <a href="<?php echo base_url('app/penangkar') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
            <i class="fa fa-times"></i> Kembali</a>

        </form>
    </footer>

</div>
<script>
    var deletedRows = [];
    jQuery(document).ready(function($) {
        tinymce.init({
            selector: '#satwa',
            menubar: false,
            toolbar: 'bold italic',
            statusbar: false
        });

        var csfrData = {};
        csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajaxSetup({
            data: csfrData
        });
        var $table1 = jQuery('#table-1');
        // Initialize DataTable
        $table1.DataTable({
            "ordering": false,
            "paging": false,
            "searching": false,
            "lengthChange": false,
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "bStateSave": false,
            "order": [
                [0, "asc"]
            ],
            "columnDefs": [{
                "targets": -1,
                "orderable": false
            }],
            "fnDrawCallback": function() {
                $(".hapus").click(function(e) {});
            },
        });
        // Initalize Select Dropdown after DataTables is created
        $table1.closest('.dataTables_wrapper').find('select').select2({
            minimumResultsForSearch: -1
        });
    })
    // BATAS DOC READY -----

    var inputs = document.getElementsByClassName("angka");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("input", function() {});
    }

    function inputAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }



    function validateDetail() {
        let errorCount = 0;
        let satwa = tinymce.get('satwa').getContent();
        let jumlah = $('#jumlah').val();

        $('#errorMessagesatwa').empty();
        $('#errorMessagetahun').empty();
        $('#errorMessagejumlah').empty();

        if (satwa.trim() === '') {
            $('#errorMessagesatwa').append('Satwa tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (jumlah.trim() === '') {
            $('#errorMessagejumlah').append('jumlah tidak boleh kosong!<br>');
            errorCount += 1;
        }
        return errorCount
    }

    $(document).on('click', '.hapus', function() {
        var currentRow = $(this).closest('tr');
        var tempRow = currentRow.clone();
        tempRow.find('.hapus').remove();
        if (typeof tempRow.find('#id_detail').val() !== 'undefined') {
            currentRow.remove();
            deletedRows.push(parseInt(tempRow.find('#id_detail').val()));
        }
    });

    $('#table-1 tbody').on('click', '.hapus', function() {
        // var $table1 = jQuery('#table-1');
        tinymce.remove('#satwa')
        jQuery('#table-1').DataTable()
            .row($(this).parents('tr'))
            .remove()
            .draw(false);

        tinymce.init({
            selector: '#satwa',
            menubar: false,
            toolbar: 'bold italic',
            statusbar: false,
            height: 100,
            fontsize_formats: '6px 8px 10px'
        });
    });


    $("#simpan").click(function() {
        var satwa = tinymce.get('satwa').getContent();
        var tahun = parseInt($("#tahun").val());
        var jumlah = $("#jumlah").val();


        var error = validateDetail()
        // alert(error)
        if (error > 0) {
            return;
        }

        // Manipulasi konten
        satwa = satwa.replace(/<p>/g, '').replace(/<\/p>/g, ''); // Menghapus tag <p>
        satwa = satwa.replace(/<strong>/g, '<b>').replace(/<\/strong>/g, '</b>'); // Mengganti tag <strong> dengan <b>
        satwa = satwa.replace(/<em>/g, '<i>').replace(/<\/em>/g, '</i>'); // Mengganti tag <em> dengan <i>


        jQuery('#table-1').DataTable().row.add([satwa, '<input type="text" class="form-control angka" onkeypress="return inputAngka(event)" value="' + jumlah + '">', '<button type="button" class="btn btn-danger hapus">Hapus</button>']).draw(false);

        // Simpan konten TinyMCE sebelum menghapus


        // // Reset form
        tinymce.remove('#satwa')
        tinymce.init({
            selector: '#satwa',
            menubar: false,
            toolbar: 'bold italic',
            statusbar: false,
            height: 100,
            fontsize_formats: '6px 8px 10px'
        });
        tinymce.get('satwa').setContent('');
        $("#tahun").val('');
        $("#jumlah").val('');

    });

    function __detaildata() {
        var $table = jQuery('#table-1');
        var detail = [];

        $table.find('tbody tr:gt(0)').each(function() {
            var $row = jQuery(this);
            var id_detail = $row.find('#id_detail').val(); // Retrieve value from the hidden input field
            id_detail = id_detail !== undefined ? parseInt(id_detail) : null;

            var satwa = $row.find('td:eq(0)').html(); // Get the trimmed text content of the first column
            var jumlah = parseInt($row.find('td:eq(1) input').val()); // Retrieve value from the input field

            detail.push({
                id_detail: id_detail,
                satwa: satwa,
                jumlah: isNaN(jumlah) ? 0 : jumlah // Handle NaN values
            });
        });

        return detail;
    }

    

    function validateForm(event) {
        var errorCount = 0;

        var nosk = $('#nosk').val();
        var pemilik = $('#pemilik').val();
        var alamat = $('#alamat').val();
        var tglawal_berlaku = $('#tglawal_berlaku').val();
        var tglakhir_berlaku = $('#tglakhir_berlaku').val();
        var asal_usul = $('#asal_usul').val();
        var $table = jQuery('#table-1');

        $('#errorMessagenosk').empty();
        $('#errorMessagepemilik').empty();
        $('#errorMessagealamat').empty();
        $('#errorMessageawal').empty();
        $('#errorMessageakhir').empty();
        $('#errorMessageasalusul').empty();
        $('#errorMessagedetail').empty();


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
        if (asal_usul.trim() === '') {
            $('#errorMessageasalusul').append('Asal Usul tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if ($table.find('tbody tr:gt(0)').length < 1) {
            $('#errorMessagedetail').append('Detail satwa tidak boleh kosong!<br>');
            errorCount += 1;
        }
        if (errorCount > 0) {
            event.preventDefault();
            return
        }

    }

    jQuery('#tombol-simpan').click(function(event) {
        validateForm();
        var formData = new FormData(document.getElementById('form'));
        var formAction = jQuery('#form-data').attr('action');
        var detail = __detaildata();
        formData.append('detail', JSON.stringify(detail));
        formData.append('id_deleted', JSON.stringify(deletedRows));
        jQuery.ajax({
            url: formAction,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response) {
                    window.location.href = "<?php echo base_url() ?>app/penangkaredit?id=<?= $data['id'] ?>&msg=1"
                } else {
                    window.location.href = "<?php echo base_url() ?>app/penangkaredit?id=<?= $data['id'] ?> &msg=0"
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
</script>