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
</style>

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
    <?php pesan_get('msg', "Berhasil Edit Lembaga Konservasi", "Gagal Edit Lembaga konservasi") ?>
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/lemkonedit" method="post" enctype="multipart/form-data" id="form-data">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="<?= $csrf['name'] ?>" id="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Pemilik *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?php echo $data['nama_pemilik'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">SK *</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="nosk" name="nosk" value="<?php echo $data['nosk'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Masa berlaku</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <span class="input-group-addon">Tgl Awal</span>
                                <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo date("d-m-Y", strtotime($data['tglawal_berlaku'])); ?>" name="tglawal_berlaku" style="background-color:#fff" placeholder="" id="tglawal_berlaku" data-mask="date">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Tgl Berakhir</span>
                                <input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo date("d-m-Y", strtotime($data['tglakhir_berlaku'])); ?>" name="tglakhir_berlaku" style="background-color:#fff" placeholder="" id="tglakhir_berlaku" data-mask="date">
                            </div>
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
                                    <img src="<?php echo base_url() . "assets/images/lemkon/" . $data['foto'] ?>" alt="...">
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
        </form>
        <div class="row">
            <div class="col-md-12">
                <br>
                <label class="col-md-2 control-label text-left">Detail Data </label>
                <table class="table table-bordered datatable" id="table-1">
                    <thead>
                        <tr>
                            <th style="width: auto;">Satwa</th>
                            <th>Tahun</th>
                            <th>Jumlah</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="isi">
                        <tr>
                            <td>
                                <input type="text" class="form-control" id="satwa">
                            </td>
                            <td>
                                <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="tahun">
                            </td>
                            <td>
                                <input type="text" class="form-control angka" onkeypress="return inputAngka(event)" id="jumlah">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
                            </td>
                        </tr>
                        <?php
                        $detail  = json_decode($data['detail'], true);
                        if (!empty($detail)) {
                            foreach ($detail as $d) { ?>
                                <tr>
                                    <td id="satwa1"><?php echo $d['satwa'] ?> </td>
                                    <td id="tahun1"><?php echo $d['tahun'] ?></td>
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
    <footer class="panel-footer text-right bg-light lter">
        <a type="button" id="tombol-simpan" class="btn btn-primary btn-s-xs btn-icon icon-left">
            <i class="fa fa-save"></i> Simpan</a>
        &nbsp
        <a href="<?php echo base_url('app/penangkar') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
            <i class="fa fa-times"></i> Kembali</a>

    </footer>

</div>

<script>
    var deletedRows = [];
    jQuery(document).ready(function($) {
        var csfrData = {};
        csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
        $.ajaxSetup({
            data: csfrData
        });
        var $table1 = jQuery('#table-1');
        // Initialize DataTable
        $table1.DataTable({
            "paging": false,
            "ordering": false,
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
            var satwa = $("#satwa").val();
            var tahun = parseInt($("#tahun").val()); // Parse ke integer
            var jumlah = $("#jumlah").val();


            if (satwa === "" || tahun === "" || jumlah === "") {
                alert("Inputan tidak boleh kosong");
                $("#satwa").val("");
                $("#tahun").val("");
                $("#jumlah").val("");
                return;
            }

            // Validasi tahun
            var currentYear = new Date().getFullYear();
            if (tahun < 1980 || tahun > currentYear) {
                alert("Tahun harus di antara 1980 dan " + currentYear);
                $("#satwa").val("");
                $("#tahun").val("");
                $("#jumlah").val("");
                return; // Keluar dari function jika tidak valid
            }
            $table1.DataTable().row.add([
                satwa,
                tahun,
                '<input type="text" class="form-control angka" onkeypress="return inputAngka(event)" value="' + jumlah + '">',
                '<button type="button" class="btn btn-danger hapus">Hapus</button>'
            ]).draw(false);

            // Reset form
            $("#satwa").val("");
            $("#tahun").val("");
            $("#jumlah").val("");
        });

        jQuery('#tombol-simpan').click(function(event) {
            event.preventDefault();
            var formData = new FormData(document.getElementById('form-data'));
            var formAction = jQuery('#form-data').attr('action');
            var detail = __detaildata();
            // console.log(detail)
            // console.log(deletedRows)
            // return false
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
                        window.location.href = "<?php echo base_url() ?>app/lemkonedit?id=<?= $data['id'] ?>&msg=1"
                    } else {
                        window.location.href = "<?php echo base_url() ?>app/lemkonedit?id=<?= $data['id'] ?> &msg=0"
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        function __detaildata() {
            var $table = jQuery('#table-1');
            var detail = [];

            $table.find('tbody tr:gt(0)').each(function() {
                var $row = jQuery(this);
                var id_detail = $row.find('#id_detail').val(); // Retrieve value from the hidden input field
                id_detail = id_detail !== undefined ? parseInt(id_detail) : null;

                var satwa = $row.find('td:eq(0)').text().trim(); // Get the trimmed text content of the first column
                var tahun = $row.find('td:eq(1)').text().trim(); // Get the trimmed text content of the second column
                var jumlah = parseInt($row.find('td:eq(2) input').val()); // Retrieve value from the input field

                detail.push({
                    id_detail: id_detail,
                    satwa: satwa,
                    tahun: tahun,
                    jumlah: isNaN(jumlah) ? 0 : jumlah // Handle NaN values
                });
            });

            return detail;
        }


    });

    $('#table-1 tbody').on('click', '.hapus', function() {
        var $table1 = jQuery('#table-1');
        $table1.DataTable()
            .row($(this).parents('tr'))
            .remove()
            .draw(false);
    });
    var inputs = document.getElementsByClassName("angka");

    // menambahkan event listener untuk setiap elemen input
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("input", function() {
            // memeriksa apakah nilai yang dimasukkan pengguna memenuhi kriteria minimal
            if (this.value < 1) {
                this.value = 1;
            }
        });
    }

    function inputAngka(evt) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;

        return true;

    }
    $(document).on('click', '.hapus', function() {
        // Get current row
        var currentRow = $(this).closest('tr');

        // Clone current row and remove "hapus" button
        var tempRow = currentRow.clone();
        tempRow.find('.hapus').remove();

        // Store row data in an object
        if (typeof tempRow.find('#id_detail').val() !== 'undefined') {
            // var rowData = {
            //     tempRow.find('#id_detail').val()
            // };

            // Remove current row from DOM
            currentRow.remove();

            // Add row data to an array of deleted rows

            deletedRows.push(parseInt(tempRow.find('#id_detail').val()));
            // console.log('Deleted rows:', deletedRows);
        }

        // Do something with the deleted rows, e.g. send them to server via AJAX
    });





    // $('#form-data').validate({ // initialize plugin
    //     highlight: function(label) {
    //         $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
    //         //$('.error').css({'font-size':'9px','margin-bottom':'0px'});
    //         $('#status-error').css({
    //             'font-size': '6px'
    //         });
    //     },
    //     success: function(label) {
    //         $(label).closest('.form-group').removeClass('has-error');
    //         label.remove();
    //     },
    //     errorPlacement: function(error, element) {
    //         var placement = element.closest('.input-group');
    //         if (!placement.get(0)) {
    //             placement = element;
    //         }
    //         if (error.text() !== '') {
    //             placement.after(error);
    //         }
    //     },

    //     rules: {
    //         nosk: {
    //             required: true
    //         },
    //         pemilik: {
    //             required: true,
    //         },
    //         alamat: {
    //             required: true,
    //         },

    //         tglawal_berlaku: {
    //             required: true,
    //         },
    //         tglakhir_berlaku: {
    //             required: true,
    //         }
    //     }
    // });
</script>