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
                <form action="<?php echo base_url() ?>app/laporanlihat" method="post" class="form-horizontal">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Jenis Laporan</label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control select2" name="kategori">
                                        <option value="">.:Semua Jenis:.</option>
                                        <option value="PAL Batas Wilayah" <?php echo $jenislaporan == "PAL Batas Wilayah" ? "selected" : ""; ?>>PAL Batas Wilayah</option>
                                        <option value="Area Terbuka/Open Area" <?php echo $jenislaporan == "Area Terbuka/Open Area" ? "selected" : ""; ?>>Area Terbuka/Open Area</option>
                                        <option value="Satwa Liar" <?php echo $jenislaporan == "Satwa Liar" ? "selected" : ""; ?>>Satwa Liar</option>
                                        <option value="Tumbuhan" <?php echo $jenislaporan == "Tumbuhan" ? "selected" : ""; ?>>Tumbuhan</option>
                                        <option value="Wisata Alam" <?php echo $jenislaporan == "Wisata Alam" ? "selected" : ""; ?>>Wisata Alam</option>
                                        <option value="Gangguan" <?php echo $jenislaporan == "Gangguan" ? "selected" : ""; ?>>Gangguan</option>
                                        <option value="Sosial Ekonomi" <?php echo $jenislaporan == "Sosial Ekonomi" ? "selected" : ""; ?>>Sosial Ekonomi</option>
                                        <option value="Pemberdayaan Masyarakat" <?php echo $jenislaporan == "Pemberdayaan Masyarakat" ? "selected" : ""; ?>>Pemberdayaan Masyarakat</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Kawasan</label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control select2" name="id_kawasan">
                                        <option value="">.:Semua Kawasan:.</option>
                                        <?php
                                        foreach ($kawasan->result_array() as $row) {
                                            echo "<option value='" . $row['id_kawasan'] . "'  " . ($row['id_kawasan'] == $id_kawasan ? "selected" : "") . ">";
                                            echo "" . $row['namakawasan'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Status Validasi</label>
                                <div class="col-sm-8">
                                    <select type="text" class="form-control select2" name="validasi">
                                        <option value="">.:Semua:.</option>
                                        <option value="Menunggu Validasi" <?php echo $validasi == "Menunggu Validasi" ? "selected" : ""; ?>> Menunggu Validasi</option>
                                        <option value="Tervalidasi" <?php echo $validasi == "Tervalidasi" ? "selected" : ""; ?>>Tervalidasi</option>
                                        <option value="Tertolak" <?php echo $validasi == "Tertolak" ? "selected" : ""; ?>>Tertolak</option>
                                    </select>
                                </div>
                            </div>
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
                    <th>Jenis Laporan</th>
                    <th>Lokasi Pendataan</th>
                    <th>Waktu Pendataan</th>
                    <th>Nama Kegiatan</th>
                    <th>Status</th>
                    <th width="250px">Opsi</th>
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
                        
                                <td>" . $row['kategori'] . "</td>
                                <td>" . $row['namakawasan'] . "</td>
                                <td>" . tanggal($row['waktu']) . "</td>
                                <td>" . $row['kegiatan'] . "</td>
                                <td>";
                    if ($row['validasi'] == "Menunggu Validasi") {
                        echo "<span' class='text-warning'><i class='fa fa-spinner'></i> " . $row['validasi'] . "</span>";
                    } else if ($row['validasi'] == "Tervalidasi") {
                        echo "<span' class='text-succcess'><i class='fa fa-check-circle'></i> " . $row['validasi'] . "</span></a>";
                    } else if ($row['validasi'] == "Tertolak") {
                        echo "<span' class='text-danger'><i class='fa fa-check-circle'></i> " . $row['validasi'] . "</span></a>";
                    }
                    echo "</td>
                                <td width='300px'>
								<div>
                                   <a href='" . base_url("app/laporandetail?id=" . $row['id_laporan'] . "") . "' class='btn btn-default  lihat' title='Lihat' id='" . $row['id_laporan'] . "' style='width:60px'><i class='fa fa-eye'></i> Lihat</a>
                                    <a href='" . base_url("app/laporanedit?id=" . $row['id_laporan'] . "") . "'  class='btn btn-primary edit' title='Edit' id='" . $row['id_laporan'] . "' ><i class='fa fa-edit' id='" . $row['id_laporan'] . "'></i> Edit</a>
                                    <a href='" . base_url("app/cetaklaporan?id=" . $row['id_laporan'] . "") . "' target='_blank' class='btn btn-success  lihat' title='Lihat' id='" . $row['id_laporan'] . "' ><i class='fa fa-print'></i> Cetak</a>
									<a href='#' class='btn btn-danger  hapus' title='Hapus' id='" . $row['id_laporan'] . "'><i class='fa fa-trash-o'></i> Hapus</a>
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
