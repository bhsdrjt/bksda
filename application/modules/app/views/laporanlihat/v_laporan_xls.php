<?php
$separator = "\t";
if ($kategori != "null") {
    $jkategori = "-" . $kategori;
} else {
    $jkategori = "";
}
header("Content-type: application/vnd-ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Laporan" . $jkategori . ".xls");

echo '<table border="1">';

if ($kategori == "null") {
    echo '<tr></th><th colspan = "9">LAPORAN KESELURUHAN</th></tr>';
    echo '<tr><th style ="vertical-align: top;" style="width:50px">No</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Jenis Laporan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:250px">Lokasi Pendataan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Waktu Pendataan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Nama Kegiatan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Lintang</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Bujur</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:600px">Keterangan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . str_replace(array("\r", "\n"), '', $row['keterangan']);
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
} else if ($kategori == "PAL Batas Wilayah") {
    echo '<tr><th colspan = "12">LAPORAN PAL BATAS WILAYAH </th></tr>';
    echo '<tr><th style ="vertical-align: top;" style="width:50px">No</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Jenis Laporan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:250px">Lokasi Pendataan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Waktu Pendataan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Nama Kegiatan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Lintang</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Bujur</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Nomor PAL Batas</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Kondisi PAL</th style ="vertical-align: top;"> <th style ="vertical-align: top;" style="width:100px">Material PAL</th style ="vertical-align: top;"> <th style ="vertical-align: top;" style="width:600px">Keterangan</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data2'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data3'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
} else if ($kategori == "Area Terbuka/Open Area") {
    echo '<tr><th colspan = "13">LAPORAN AREA TERBUKA/OPEN AREA </th></tr>';
    echo '<tr><th style="width: 50px">No</th><th style="width: 150px">Jenis Laporan</th><th style="width: 250px">Lokasi Pendataan</th><th style="width: 150px">Waktu Pendataan</th><th style="width: 150px">Nama Kegiatan</th><th style="width: 100px">Lintang</th><th style="width: 100px">Bujur</th><th style="width: 100px">Luas Wilayah Terbuka</th><th style="width: 150px">Indikasi Penyebab</th><th style="width: 150px">Jenis Open Area</th><th style="width: 150px">Tingkat Kerusakan</th><th style="width: 600px">Keterangan</th><th style="width: 100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data2'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data3'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data4'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;">';
        $i++;
    }
} else if ($kategori == "Satwa Liar") {
    echo '<tr><th colspan = "16">LAPORAN SATWA LIAR </th></tr>';
    echo '<tr><th style="width:50px">No</th><th style="width:150px">Jenis Laporan</th><th style="width:250px">Lokasi Pendataan</th><th style="width:150px">Waktu Pendataan</th><th style="width:150px">Nama Kegiatan</th><th style="width:100px">Lintang</th><th style="width:100px">Bujur</th><th style="width:150px">Spesies / Nama Latin</th><th style="width:150px">Nama Lokal</th><th style="width:100px">Jumlah Perjumpaan</th><th style="width:100px">Kelas Satwa</th><th style="width:100px">Endemisitas</th><th style="width:150px">Status Perlindungan</th><th style="width:150px">Status IUCN</th><th style="width:600px">Keterangan</th><th style="width:100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data3'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data8'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data4'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data5'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data6'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data7'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
} else if ($kategori == "Tumbuhan") {
    echo '<tr><th colspan = "13">LAPORAN TUMBUHAN </th></tr>';
    echo '<tr><th style="width: 50px;">No</th><th style="width: 150px;">Jenis Laporan</th><th style="width: 250px;">Lokasi Pendataan</th><th style="width: 150px;">Waktu Pendataan</th><th style="width: 150px;">Nama Kegiatan</th><th style="width: 100px;">Lintang</th><th style="width: 100px;">Bujur</th><th style="width: 200px;">Spesies / Nama Latin</th><th style="width: 150px;">Nama Lokal</th><th style="width: 150px;">Jenis Tumbuhan</th><th style="width: 150px;">Status Perlindungan</th><th style="width: 200px;">Keterangan</th><th style="width: 100px;">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data3'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data4'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data5'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
} else if ($kategori == "Wisata Alam") {
    echo '<tr><th colspan = "10">LAPORAN WISATA ALAM </th></tr>';
    echo '<tr><th style="width:50px">No</th><th style="width:150px">Jenis Laporan</th><th style="width:250px">Lokasi Pendataan</th><th style="width:150px">Waktu Pendataan</th><th style="width:150px">Nama Kegiatan</th><th style="width:100px">Lintang</th><th style="width:100px">Bujur</th><th style="width:200px">Nama Lokasi Wisata</th><th style="width:600px">Keterangan</th><th style="width:100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
} else if ($kategori == "Gangguan") {
    echo '<tr><th colspan = "10">LAPORAN GANGGUAN </th></tr>';
    echo '<tr><th style="width:50px">No</th><th style="width:150px">Jenis Laporan</th><th style="width:250px">Lokasi Pendataan</th><th style="width:150px">Waktu Pendataan</th><th style="width:150px">Nama Kegiatan</th><th style="width:100px">Lintang</th><th style="width:100px">Bujur</th><th style="width:100px">Jenis Gangguan</th><th style="width:600px">Keterangan</th><th style="width:100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
} else if ($kategori == "Sosial Ekonomi") {
    echo '<tr><th colspan = "17">LAPORAN SOSIAL EKONOMI </th></tr>';
    echo '<tr><th style="width:50px">No</th><th style="width:150px">Jenis Laporan</th><th style="width:250px">Lokasi Pendataan</th><th style="width:150px">Waktu Pendataan</th><th style="width:150px">Nama Kegiatan</th><th style="width:100px">Lintang</th><th style="width:100px">Bujur</th><th style="width:100px">Nama Desa / Dusun</th><th style="width:100px">Nama Kepala Desa / Dusun</th><th style="width:100px">Kontak Person</th><th style="width:80px">Jumlah Penduduk</th><th style="width:80px">Jumlah Kepala Keluarga</th><th style="width:100px">Mayoritas pekerjaan</th><th style="width:350px">Keterangan Sejarah Desa</th><th style="width:350px">Keterangan Interaksi Masyarakat terhadap kawasan</th><th style="width:600px">Keterangan Lainnya</th><th style="width:100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data2'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data3'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data4'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data5'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data6'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data7'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data8'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
} else if ($kategori == "Pemberdayaan Masyarakat") {
    echo '<tr><th colspan = "15">LAPORAN PEMBERDAYAAN MASYARAKAT </th></tr>';
    echo '<tr><th style="width:50px">No</th><th style="width:150px">Jenis Laporan</th><th style="width:250px">Lokasi Pendataan</th><th style="width:150px">Waktu Pendataan</th><th style="width:150px">Nama Kegiatan</th><th style="width:100px">Lintang</th><th style="width:100px">Bujur</th><th style="width:100px">Nama Kelompok</th><th style="width:80px">SK Kelompok</th><th style="width:80px">Lokasi</th><th style="width:80px">Jenis Usaha</th><th style="width:80px">Jumlah Anggota</th><th style="width:150px">Kegiatan-kegiatan</th><th style="width:100px">Keterangan</th><th style="width:100px">Status</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['kategori'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['namakawasan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['waktu'];
        echo '<td style ="vertical-align: top;">' . $row['kegiatan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['lintang'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['bujur'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data1'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data2'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data3'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data4'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data5'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['data6'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['keterangan'] . '</td style ="vertical-align: top;">';
        echo '<td style ="vertical-align: top;">' . $row['validasi'] . '</td style ="vertical-align: top;"></tr>';
        $i++;
    }
}
echo '</table>';
