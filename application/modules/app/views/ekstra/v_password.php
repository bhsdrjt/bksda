<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-newspaper-o"></i>App</a>
    </li>
    <li class="active">
        <strong>Profil</strong>
    </li>
</ol>

<h3>Profil</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg',"Berhasil Mengganti Password ","Berhasil Mengganti Password ") ?>
        <?php if (isset($gagal))
				pesanvar($gagal,"Gagal Mengganti Password, Password Lama yang dimasukkan salah!","Gagal Mengganti Password !") ?>
        <form role="form"  action="<?php echo base_url() ?>app/password" method="post" enctype="multipart/form-data" id="form2">

        <div class="panel panel-primary" data-collapsed="0">
<div class="panel-body">

    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
            <div class="form-group">
                    <label for="field-1" class="control-label">Password Lama</label>
                    <input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Masukkan Password Lama"  value="<?php echo set_value('passwordlama'); ?>">
                </div>
            <div class="form-group">
                                <label for="password" class="control-label">Password Baru</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" type="password" id="password2" name="password2" placeholder="Masukkan Password ">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kpassword" class="control-label">Konfirmasi Password Baru</label>
                                <div class="input-group" id="show_hide_password">
                                    <input class="form-control" type="password" id="kpassword2" name="kpassword2" placeholder="Masukkan Konfirmasi ">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

        </div>

    </div>

</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-primary" id="edit">Simpan</button>
</div>
</form>
</div>


    </div>
</div>
