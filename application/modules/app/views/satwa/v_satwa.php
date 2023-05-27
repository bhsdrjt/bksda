<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data Satwa</strong>
    </li>
</ol>

<h3>Data Satwa</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg', "Berhasil Menambah Data Satwa", "Berhasil Menghapus Data Satwa", "Berhasil mengedit Data Satwa", "Berhasil mengedit Data Satwa") ?>
        <?php if ($this->session->userdata("nama") != 'Tamu') { 
        ?>
            <a href="<?php echo base_url("app/satwatambah") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left">
                <i class="fa fa-plus"></i> Tambah Data Satwa</a>
        <?php }else{ ?>
            <?php } ?>
        <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
            <thead>
                <tr>
                    <th width='30px'>No</th>
                    <th>Nomor Seri</th>
                    <th>Nama Pemilik</th>
                    <th>Jenis Satwa</th>
                    <th>Nama Satwa</th>
                    <th width="200px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($data->result_array() as $row) {
                    $i++;
                    echo "
							<tr>
								
                                <td>" . $i . "</td>
                                <td>" . $row['noseri'] . "</td>
                                <td>" . $row['pemilik'] . "</td>
                                <td>" . $row['jenis'] . "</td>
                                <td>" . $row['namasatwa'] . "</td>
                                 <td class='text-center'>
                            <div>
                                <a href='" . base_url("app/satwalihat?id=" . $row['id_satwa'] . "") . "' class='btn btn-default lihat' title='Lihat' id='" . $row['id_satwa'] . "'><i class='fa fa-eye'></i> Lihat</a>";
                                if ($this->session->userdata("nama") != 'Tamu') {
                                    echo "
                                        <a href='" . base_url("app/satwaedit?id=" . $row['id_satwa'] . "") . "' class='btn btn-primary edit' title='Edit' id='" . $row['id_satwa'] . "' ><i class='fa fa-edit' id='" . $row['id_satwa'] . "'></i> Edit</a>
                                        <a href='#' class='btn btn-danger hapus' title='Hapus' id='" . $row['id_satwa'] . "'><i class='fa fa-trash-o'></i> Hapus</a>
                                    ";
                                }

                    echo "
                            </div>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>