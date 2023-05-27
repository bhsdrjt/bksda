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
        <strong>Lihat Lembaga Konservasi</strong>
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
                            <p class="form-control-static"> : <?php echo $data['pemilik'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">SK *</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <?php echo $data['nosk'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Masa berlaku</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <!-- <span class="input-group-addon">Tgl Awal</span> -->
                                <p class="form-control-static"> : <b><?php echo date("d-m-Y", strtotime($data['tglawal_berlaku'])); ?></b> Sampai <b><?php echo date("d-m-Y", strtotime($data['tglakhir_berlaku'])); ?></b></p>
                            </div>
                            <!-- <br>
                            <div class="input-group">
                                <span class="input-group-addon">Tgl Berakhir</span>
                                <p class="form-control-static"> : </p>
                            </div> -->
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Pemilik *</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <?php echo $data['pemilik'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Alamat *</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <?php echo $data['alamat'] ?></p>
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
                                <!-- <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="foto" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange  	fileinput-exists" data-dismiss="fileinput">Remove</a> -->
                                <!-- </div> -->
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
                        </tr>
                    </thead>
                    <tbody id="isi">

                        <?php
                        $detail  = json_decode($data['detail'], true);
                        if (!empty($detail)) {
                            foreach ($detail as $d) { ?>
                                <tr>
                                    <td id="satwa1"><?php echo $d['satwa'] ?> </td>
                                    <td id="tahun1"><?php echo $d['tahun'] ?></td>
                                    <td id="jumlah1"><?php echo $d['jumlah'] ?></td>
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
        <!-- <a type="button" id="tombol-simpan" class="btn btn-primary btn-s-xs btn-icon icon-left">
            <i class="fa fa-save"></i> Simpan</a> -->
        &nbsp
        <a href="<?php echo base_url('app/lemkon') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
            <i class="fa fa-times"></i> Kembali</a>

    </footer>

</div>
<script>
    jQuery(document).ready(function($) {

        var $table1 = jQuery('#table-1');
        // Initialize DataTable
        $table1.DataTable({
            // "paging": false,
            // "ordering": false,
            // "searching": false,
            // "lengthChange": false,
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
    });
</script>