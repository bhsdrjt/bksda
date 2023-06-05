<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>app">
            <i class="fa fa-file"></i>App</a>
    </li>
    <li class="active">
        <strong>Data laporan</strong>
    </li>
</ol>

<h3>Data laporan</h3>
<div class="row">
    <div class="col-md-12">

        <div style="margin-bottom:10px" class="text-right">
            <a href="<?php echo $exportxls ?>" target="_blank" class="btn btn-success btn-icon icon-left"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
        </div>
        <div class="panel panel-primary col-md-12" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    Filter
                </div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url() ?>app/lihatTsl" method="post" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Jenis Laporan</label>
                                <div class="col-lg-8">
                                    <select class="form-control " name="jenis" id="jenis" onchange="loadpemilik()">
                                        <option value="">-- Pilih Jenis Perizinan --</option>
                                        <option value="penangkar" <?php echo $jenis == 'penangkar' ? 'selected' : '' ?>>Penangkar</option>
                                        <option value="pengedar" <?php echo $jenis == 'pengedar' ? 'selected' : '' ?>>Pengedar</option>
                                        <option value="lembaga konservasi" <?php echo $jenis == 'lembaga konservasi' ? 'selected' : '' ?>>Lembaga Konservasi</option>
                                    </select>
                                    <span id="errorMessagejenis" style="color: red;"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Pemilik</label>
                                <div class="col-lg-8">
                                    <select class="form-control " id="pemilik" name="pemilik">
                                        <option value=""> -- Pilih Pemilik --</option>
                                    </select>
                                    <span id="errorMessagepemilik" style="color: red;"></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-8">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-filter"></i> Filter</button>
                                    <button class="btn btn-primary" type="button" onClick="location.href=location.href"><i class="fa fa-times"></i> Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php pesan_get('msg', "", "Berhasil Menghapus Laporan", "Berhasil Menghapus Laporan", "") ?>
        <table class="table table-bordered datatable" id="table-1" style="font-size:12px">
            <thead>
                <tr>
                    <th width='30px'>No</th>
                    <th>Jenis Izin TSL</th>
                    <th>Pemilik</th>
                    <th>Waktu Pendataan</th>
                    <th>Kelas Satwa</th>
                    <th>jumlah</th>
                    <th>Keterangan</th>
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
                        
                                <td>" . strtoupper($row['jenis']) . "</td>
                                <td>" . strtoupper($row['pemilik']) . "</td>
                                <td>" . tanggal($row['waktu_pendataan']) . "</td>
                                <td>" . $row['kelas_satwa'] . "</td>
                                <td>" . $row['jumlah'] . "</td>
                                <td>" . $row['keterangan'] . "</td>
                                
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
        loadpemilik()
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
                    $.confirm({
                        title: 'Hapus!',
                        content: 'Yakin ingin menghapus ?',
                        buttons: {
                            hapus: {
                                text: 'Hapus',
                                btnClass: 'btn-primary',
                                action: function() {
                                    window.location.assign("<?php echo base_url() ?>app/laporanhapus?id=" + v_id);
                                }
                            },
                            batal: function() {

                            }

                        }
                    });
                });

            },
        });
        $table1.closest('.dataTables_wrapper').find('select').select2({
            minimumResultsForSearch: -1
        });

    });

    function loadpemilik() {
        let jenis = $("#jenis").val();
        $.ajax({
            url: "<?php echo base_url() ?>app/getPemilik",
            method: "GET",
            data: {
                jenis: jenis
            },
            success: function(response) {
                console.log(response)
                $("#pemilik").empty();
                $("#pemilik").append('<option value="">-- Pilih Pemilik --</option>');

                // Menambahkan opsi pemilik berdasarkan data response
                for (let i = 0; i < response.length; i++) {
                    let option = $("<option></option>").val(response[i].id).text(response[i].pemilik);

                    // Menentukan opsi pemilik yang dipilih berdasarkan value $data['id_reff']
                    if (response[i].id == "<?php echo $id_reff ?>") {
                        option.prop("selected", true);
                    }

                    $("#pemilik").append(option);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                // Tindakan yang ingin Anda lakukan jika terjadi error pada request
            }
        });
    }
</script>