<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-satwas"></i>App</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>app/pengedar">
            <i class="fa fa-satwa"></i>Pengedar</a>
    </li>
    <li class="active">
        <strong>Tambah Pengedar</strong>
    </li>
</ol>

<h3>Lihat Data Pengedar </h3>
<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            Edit Pengedar
        </div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
        </div>
    </div>

    <div class="panel-body">
        <a href="<?php echo base_url('app/pengedar') ?>" class="btn btn-primary btn-s-xs">
            <i class="fa fa-arrow-left"></i> Kembali</a>

        <hr />
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/pengedaredit" method="post" enctype="multipart/form-data" id="form">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nomor SK *</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <?php echo $data['nosk'] ?> </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Tentang SK *</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <?php echo $data['tentang_sk'] ?></p>
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

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Jenis*</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <?php echo $data['jenis_komoditi'] ?> </p>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label">Masa Berlaku</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <b><?php echo tgl_indo($data['tglawal_berlaku']) ?></b> - <b><?php echo tgl_indo($data['tglakhir_berlaku']) ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-8">
                            <img src="<?php echo base_url() . "assets/images/pengedar/" . $data['foto'] ?>" class="thumbnail" style="max-width: 300px; height: 200px;" alt="...">

                        </div>
                    </div>





                </div>
            </div>


    </div>
    <footer class="panel-footer text-right bg-light lter">

        </form>
    </footer>

</div>