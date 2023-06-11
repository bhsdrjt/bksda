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

<h3>Lihat Data Penangkar </h3>
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
        <a href="<?php echo base_url('app/penangkar') ?>" class="btn btn-primary btn-s-xs">
            <i class="fa fa-arrow-left"></i> Kembali</a>

        <hr />
        <form role="form" class="form-horizontal validate" action="<?php echo base_url() ?>app/penangkaredit" method="post" enctype="multipart/form-data" id="form">
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
                        <label class="col-lg-4 control-label">Masa Berlaku</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> <b><?php echo tgl_indo($data['tglawal_berlaku']) ?></b> - <b><?php echo tgl_indo($data['tglakhir_berlaku']) ?></b></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Asal Usul</label>
                        <div class="col-lg-8">
                            <p class="form-control-static"> : <?php echo $data['asal_usul'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-8">
                            <img src="<?php echo base_url() . "assets/images/penangkar/" . $data['foto'] ?>" class="thumbnail" style="max-width: 300px; height: 200px;" alt="...">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        $detail = json_decode($data['detail'], true);
                        if (!empty($detail)) {
                        ?>
                            <table class="table" style="width: 50%;">
                                <thead>
                                    <tr>
                                        <th>Satwa</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $d) { ?>
                                        <tr>
                                            <td><?php echo $d['satwa']; ?></td>
                                            <td><?php echo $d['jumlah']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>


            </div>


    </div>
    <footer class="panel-footer text-right bg-light lter">

        </form>
    </footer>

</div>