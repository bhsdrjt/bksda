<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data Lembaga konservasi</strong>
    </li>
</ol>

<h3>Data Lembaga Konservasi</h3>
<div class="row">
    <div class="col-md-12">
        <?php pesan_get('msg', "Berhasil Menambahkan Lembaga Konservasi", "Gagal Menambahkan Lembaga konservasi") ?>
        <a href="<?php echo base_url("app/lemkontambah") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left">
            <i class="fa fa-plus"></i> Tambah Data Lembaga Konservasi</a>
        <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
            <thead>
                <tr>
                    <th width='30px'>No</th>
                    <th>SK</th>
                    <th>Masa Berlaku</th>
                    <th>Pemilik</th>
                    <th width="200px">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                setlocale(LC_TIME, 'id_ID');

                $i = 0;
                foreach ($data->result_array() as $row) {
                    setlocale(LC_TIME, 'id_ID');
                    $datetime_tglawal = new DateTime($row['tglawal_berlaku']);
                    $tglawal = strftime('%d %B %Y', strtotime($datetime_tglawal->format('Y-m-d')));
                    $datetime_tglakhir = new DateTime($row['tglakhir_berlaku']);
                    $tglakhir = strftime('%d %B %Y', strtotime($datetime_tglakhir->format('Y-m-d')));



                    $i++;
                    echo "
							<tr>
								
                                <td>" . $i . "</td>
                                <td>" . $row['nosk'] . "</td>
                                <td><b>" . $tglawal . '</b> sampai <b>' . $tglakhir . "</b></td>

                                <td>" . $row['pemilik'] . "</td>
                                <td>
                                    <div>
                                    <a href='" . base_url("app/lemkonlihat?id=" . $row['id'] . "") . "' class='btn btn-default  lihat' title='Lihat' id='" . $row['id'] . "'><i class='fa fa-eye'></i> Lihat</a>
                                    <a href='" . base_url("app/lemkonedit?id=" . $row['id'] . "") . "' class='btn btn-primary edit' title='Edit' id='" . $row['id'] . "' ><i class='fa fa-edit' id='" . $row['id'] . "'></i> Edit</a>
									<a href='#' class='btn btn-danger  hapus' title='Hapus' id='" . $row['id'] . "'><i class='fa fa-trash-o'></i> Hapus</a>
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

<script>
    jQuery(document).ready(function($) {
        var csfrData = {};
        csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
        $.ajaxSetup({
            data: csfrData
        });
        var $table1 = jQuery('#table-1');
        // Initialize DataTable
        $table1.DataTable({
            "aLengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "bStateSave": false,
            "order": [
                [0, "asc"]
            ],
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