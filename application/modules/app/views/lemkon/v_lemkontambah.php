<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-home"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/lemkon">
            <i class="fa fa-pow"></i>Pendataan Lembaga Konservasi</a>
    </li>
    <li class="active">
        <strong>Tambah Lembaga Konservasi</strong>
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

    i.mce-ico.mce-i-bold:before,
    i.mce-ico.mce-i-italic:before {
        font-size: 12px !important;
    }
</style>

<h3>Tambah Lembaga Konservasi </h3>
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
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/lemkontambah" method="post" enctype="multipart/form-data" id="form-data">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="<?= $csrf['name'] ?>" id="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">SK *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nosk" name="nosk">
                            <span id="errorMessagenosk" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Pemilik *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="pemilik" name="pemilik">
                            <span id="errorMessagepemilik" style="color: red;"></span>
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
                                                <input type="text" class="form-control datepicker error-message" data-format="dd-mm-yyyy" value="" name="tglawal_berlaku" style="background-color:#fff" placeholder="" id="tglawal_berlaku" data-mask="date" aria-invalid="true">
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
                                                <input type="text" class="form-control datepicker error-message" data-format="dd-mm-yyyy" value="" name="tglakhir_berlaku" style="background-color:#fff" placeholder="" id="tglakhir_berlaku" data-mask="date" aria-invalid="true">
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
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>

                            <span id="errorMessagealamat" style="color: red;"></span>
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
        </form>
        <div class="row">
            <div class="col-md-12">
                <br>
                <label class="col-md-2 control-label text-left">Detail Data </label>
                <span id="errorMessagedetail" style="color: red;"></span>

                <table class="table table-bordered datatable" id="table-1">
                    <thead>
                        <tr>
                            <th style="width: 30%;">Satwa</th>
                            <th>Tahun</th>
                            <th>Total Jumlah</th>
                            <th>Jantan</th>
                            <th>Betina</th>
                            <th>Tidak Diketahui</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="isi">
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">
                                <input type="text" class="form-control" id="satwa">
                                <span id="errorMessagesatwa" style="color: red;"></span>
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="tahun">
                                <span id="errorMessagetahun" style="color: red;"></span>
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="jumlah">
                                <span id="errorMessagejumlah" style="color: red;"></span>
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="jantan">
                                <span id="errorMessagejantan" style="color: red;"></span>
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="betina">
                                <span id="errorMessagebetina" style="color: red;"></span>
                            </td>
                            <td style="vertical-align: middle;">
                                <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="tidaktahu">
                                <span id="errorMessagetidaktahu" style="color: red;"></span>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <footer class="panel-footer text-right bg-light lter">
        <a type="button" id="tombol-simpan" class="btn btn-primary btn-s-xs btn-icon icon-left">
            <i class="fa fa-save"></i> Simpan</a>
        &nbsp
        <a href="<?php echo base_url('app/penangkar') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
            <i class="fa fa-times"></i> Kembali</a>

    </footer>

</div>

<script>
    jQuery(document).ready(function($) {
        // console.log("Before initializing TinyMCE");
        tinymce.init({
            selector: '#satwa',
            menubar: false,
            toolbar: 'bold italic',
            statusbar: false,
            height: 100,
            fontsize_formats: '6px 8px 10px'
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

        $("#simpan").click(function() {
            var $table1 = jQuery('#table-1');
            var satwa = tinymce.get('satwa').getContent();
            var tahun = parseInt($("#tahun").val());
            var jumlah = $("#jumlah").val();
            var betina = $("#betina").val();
            var jantan = $("#jantan").val();
            var tidaktahu = $("#tidaktahu").val();


            var error = validateDetail()
            // alert(error)
            if (error > 0) {
                return;
            }

            // Manipulasi konten
            satwa = satwa.replace(/<p>/g, '').replace(/<\/p>/g, ''); // Menghapus tag <p>
            satwa = satwa.replace(/<strong>/g, '<b>').replace(/<\/strong>/g, '</b>'); // Mengganti tag <strong> dengan <b>
            satwa = satwa.replace(/<em>/g, '<i>').replace(/<\/em>/g, '</i>'); // Mengganti tag <em> dengan <i>


            jQuery('#table-1').DataTable().row.add([satwa, tahun, '<input type="text" class="form-control angka" onkeypress="return inputAngka(event)" value="' + jumlah + '">', '<input type="text" class="form-control angka" onkeypress="return inputAngka(event)" value="' + jantan + '">', '<input type="text" class="form-control angka" onkeypress="return inputAngka(event)" value="' + betina + '">', '<input type="text" class="form-control angka" onkeypress="return inputAngka(event)" value="' + tidaktahu + '">', '<button type="button" class="btn btn-danger hapus" >Hapus</button>']).draw(false);

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
            $("#jantan").val('');
            $("#betina").val('');
            $("#tidaktahu").val('');

        });





        jQuery('#tombol-simpan').click(function(event) {
            validateForm();
            var formData = new FormData(document.getElementById('form-data'));
            var formAction = jQuery('#form-data').attr('action');
            var detail = __detaildata();
            // console.log(detail)
            // return false
            formData.append('detail', JSON.stringify(detail));
            jQuery.ajax({
                url: formAction,
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response) {
                        window.location.href = "<?php echo base_url() ?>app/lemkon?msg=1"
                    } else {
                        window.location.href = "<?php echo base_url() ?>app/lemkon?msg=0"
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });






    });

    function __detaildata() {
        var $table = jQuery('#table-1');
        var detail = [];

        $table.find('tbody tr:gt(0)').each(function() {
            var $row = jQuery(this);


            var satwa = $row.find('td:eq(0)').html(); // Get the trimmed text content of the first column
            var tahun = $row.find('td:eq(1)').text().trim(); // Get the trimmed text content of the second column
            var jumlah = parseInt($row.find('td:eq(2) input').val()); // Retrieve value from the input field
            var jantan = parseInt($row.find('td:eq(3) input').val()); // Retrieve value from the input field
            var betina = parseInt($row.find('td:eq(4) input').val()); // Retrieve value from the input field
            var tidaktahu = parseInt($row.find('td:eq(5) input').val()); // Retrieve value from the input field

            detail.push({
                satwa: satwa,
                tahun: tahun,
                jumlah: isNaN(jumlah) ? 0 : jumlah, // Handle NaN values
                jantan: isNaN(jantan) ? 0 : jantan, // Handle NaN values
                betina: isNaN(betina) ? 0 : betina, // Handle NaN values
                tidaktahu: isNaN(tidaktahu) ? 0 : tidaktahu // Handle NaN values
            });
        });

        return detail;
    }
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

    function validateForm(event) {
        let errorCount = 0;
        let nosk = $('#nosk').val();
        let pemilik = $('#pemilik').val();
        let alamat = $('#alamat').val();
        let tglawal_berlaku = $('#tglawal_berlaku').val();
        let tglakhir_berlaku = $('#tglakhir_berlaku').val();
        var $table = jQuery('#table-1');

        $('#errorMessagenosk').empty();
        $('#errorMessagepemilik').empty();
        $('#errorMessagealamat').empty();
        $('#errorMessageawal').empty();
        $('#errorMessageakhir').empty();
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
        if ($table.find('tbody tr:gt(0)').length < 1) {
            $('#errorMessagedetail').append('Detail tidak boleh kosong!<br>');
            errorCount += 1;
            // alert('oyyy')
        }

        if (errorCount !== 0) {
            event.preventDefault(); // Menghentikan pengiriman form jika terdapat kesalahan validasi
        }
    }


    
    function validateDetail() {
        let errorCount = 0;
        let satwa = tinymce.get('satwa').getContent();
        let tahun = $('#tahun').val();
        let jumlah = $('#jumlah').val();
        let jantan = $('#jantan').val();
        let betina = $('#betina').val();
        let tidaktahu = $('#tidaktahu').val();

        $('#errorMessagesatwa').empty();
        $('#errorMessagetahun').empty();
        $('#errorMessagejumlah').empty();
        $('#errorMessagejantan').empty();
        $('#errorMessagebetina').empty();
        $('#errorMessagetidaktahu').empty();

        if (satwa.trim() === '') {
            $('#errorMessagesatwa').append('Satwa tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (tahun.trim() === '') {
            $('#errorMessagetahun').append('Tahun tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (jumlah.trim() === '') {
            $('#errorMessagejumlah').append('Jumlah tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (jantan.trim() === '') {
            $('#errorMessagejantan').append('Jantan tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (betina.trim() === '') {
            $('#errorMessagebetina').append('Betina tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (tidaktahu.trim() === '') {
            $('#errorMessagetidaktahu').append('Tidak Tahu tidak boleh kosong!<br>');
            errorCount += 1;
        }

        if (parseInt(jantan) + parseInt(betina) + parseInt(tidaktahu) !== parseInt(jumlah)) {
            $('#errorMessagejumlah').append('Jumlah Total harus sama dengan jumlah (jantan + betina + data tidak diketahui)!<br>');
            errorCount += 1;
        }

        return errorCount;
    }
</script>