<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong> Data Izin TSL </strong>
    </li>
</ol>

<h3> Data Izin TSL </h3>
<div class="row">
    <div class="col-md-12">
    <?php if ($this->session->userdata("nama") != 'Tamu') { // Gantikan "logged_in()" dengan fungsi yang sesuai untuk memeriksa apakah pengguna sudah login 
        ?>
        <a href="<?php echo base_url("app/izinTsltambah") ?>" style="margin: 5px 0 10px 0px" class="btn  btn-primary tambah   btn-icon icon-left">
            <i class="fa fa-plus"></i> Tambah Data Izin TSL</a>
            <?php } ?>

        <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
            <thead>
                <tr>
                    <th width='3%'>No</th>
                    <th>Jenis</th>
                    <th>Nama Pemilik</th>
                    <th>Kelas Satwa</th>
                    <th width="10%">Jumlah Saat ini</th>
                    <th>Waktu Pendataan</th>
                    <th width="40%">Keterangan</th>
                    <th width="10%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                setlocale(LC_TIME, 'id_ID');

                $i = 0;
                foreach ($data->result_array() as $row) {
                    setlocale(LC_TIME, 'id_ID');
                    $datetime_pendataan = new DateTime($row['waktu_pendataan']);
                    $pendataan = strftime('%d %B %Y', strtotime($datetime_pendataan->format('Y-m-d')));
                    $i++;
                    echo "
							<tr>
								
                                <td>" . $i . "</td>
                                <td class='text-center'>" . ucfirst($row['jenis']) . "</td>
                                <td>" . $row['pemilik'] . "</td>
                                <td class='text-center'>" . $row['kelas_satwa'] . "</td>
                                <td class='text-center'>" . $row['jumlah'] . "</td>
                                <td class='text-center'>" . $pendataan ."</td>
                                <td>" . $row['keterangan'] . "</td>
                                <td class='text-center'>
                                    <div>";
                                        if ($this->session->userdata("nama") != 'Tamu') {
                                            echo "
                                                <a href='" . base_url("app/izinTsledit?id=" . $row['id'] . "") . "' class='btn btn-primary edit' title='Edit' id='" . $row['id'] . "' ><i class='fa fa-edit' id='" . $row['id'] . "'></i> Edit</a>
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
                                    window.location.assign("<?php echo base_url() ?>app/izinTslhapus?id="+v_id);
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