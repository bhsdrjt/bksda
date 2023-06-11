<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data Penangkar</strong>
    </li>
</ol>

<h3>Data Penangkar</h3>
<div class="row">
    <div class="col-md-12">
    <?php if ($this->session->userdata("nama") != 'Tamu') { // Gantikan "logged_in()" dengan fungsi yang sesuai untuk memeriksa apakah pengguna sudah login 
        ?>
        <a href="<?php echo base_url("app/penangkartambah") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left">
            <i class="fa fa-plus"></i> Tambah Data Penangkar</a>
            <?php } ?>

        <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
            <thead>
                <tr>
                    <th width='30px'>No</th>
                    <th>Nomor SK</th>
                    <th>Pemilik</th>
                    <th>Masa Berlaku</th>
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
                                <td>" . $row['pemilik'] . "</td>
                                <td><b>" . $tglawal . '</b> sampai <b>' . $tglakhir . "</b></td>
                                <td class='text-center'>
                                    <div>
                                        <a href='" . base_url("app/penangkarlihat?id=" . $row['id'] . "") . "' class='btn btn-default lihat' title='Lihat' id='" . $row['id'] . "'><i class='fa fa-eye'></i> Lihat</a>";
                                        if ($this->session->userdata("nama") != 'Tamu') {
                                            echo "
                                                <a href='" . base_url("app/penangkaredit?id=" . $row['id'] . "") . "' class='btn btn-primary edit' title='Edit' id='" . $row['id'] . "' ><i class='fa fa-edit' id='" . $row['id'] . "'></i> Edit</a>
                                                <a href='#' class='btn btn-danger hapus' title='Hapus' id='" . $row['id'] . "'><i class='fa fa-trash-o'></i> Hapus</a>
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
                $(".hapus").click(function(e) {
                    var v_id = this.id;
                    jQuery.confirm({
                        title: 'Hapus!',
                        content: 'Yakin ingin menghapus ?',
                        buttons: {
                            hapus: {
                                text: 'Hapus',
                                btnClass: 'btn-primary',
                                action: function() {
                                    // alert('asek')
                                    window.location.assign("<?php echo base_url() ?>app/penangkarhapus?id="+v_id);
                                }
                            },
                            batal: function() {

                            }
                        }
                    });
                });
            },
        });
        // Initalize Select Dropdown after DataTables is created
        $table1.closest('.dataTables_wrapper').find('select').select2({
            minimumResultsForSearch: -1
        });


    });
</script>