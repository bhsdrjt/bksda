<style>
    table {
        font-family: Arial, sans-serif;
    }
</style>
<?php
setlocale(LC_TIME, 'id_ID');


header("Content-type: application/vnd-ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Laporan Izin TSL " . $jenis . ".xls");

echo '<table border="1">';

if ($jenis == 'pengedar') {
    echo '<tr></th><th colspan = "11">LAPORAN IZIN TSL ' . strtoupper($jenis) . '</th></tr>';
    echo '<tr><th style="vertical-align: top; width:50px">No</th><th style="vertical-align: top; width:250px">Pemilik</th><th style="vertical-align: top; width:150px">Waktu Pendataan</th><th style="vertical-align: top;width:150px">Kelas Satwa</th><th style="vertical-align: top;width:100px">Jumlah Saat Ini</th><th style="vertical-align: top; width:600px">Keterangan</th><th style="vertical-align: top; width:160px">No. Sk</th><th style="vertical-align: top; width:150px">Tentang Sk</th><th style="vertical-align: top; width:150px">Alamat</th><th style="vertical-align: top; width:250px">Masa Berlaku</th><th style="vertical-align: top; width:150px">Jenis Komoditi</th></tr>';
    $i = 1;
    foreach ($data->result_array() as $row) {
        $datetime_pendataan = new DateTime($row['waktu_pendataan']);
        $pendataan = strftime('%d %B %Y', strtotime($datetime_pendataan->format('Y-m-d')));
        $datetime_tglawal = new DateTime($row['tglawal_berlaku']);
        $tglawal = strftime('%d %B %Y', strtotime($datetime_tglawal->format('Y-m-d')));
        $datetime_tglakhir = new DateTime($row['tglakhir_berlaku']);
        $tglakhir = strftime('%d %B %Y', strtotime($datetime_tglakhir->format('Y-m-d')));

        echo '<tr><td style ="vertical-align: top;">' . $i . '</td >';
        echo '<td style ="vertical-align: top;">' . strtoupper($row['pemilik']) . '</td>';
        echo '<td style ="vertical-align: top;">' . $pendataan . '</td>';
        echo '<td style ="vertical-align: top;">' . $row['kelas_satwa'] . '</td>';
        echo '<td style ="vertical-align: top;">' . $row['jumlah'] . '</td>';
        echo '<td style ="vertical-align: top;">' . str_replace(array("\r", "\n"), '', $row['keterangan']) . '</td>';
        echo '<td style="vertical-align: top;">' . $row['nosk'] . '</td>';
        echo '<td style="vertical-align: top;">' . $row['tentang_sk'] . '</td>';
        echo '<td style="vertical-align: top;">' . $row['alamat'] . '</td>';
        echo '<td style="vertical-align: top;"><b>' . $tglawal . '</b> sampai <b>' . $tglakhir . '</b></td>';
        echo '<td style="vertical-align: top;">' . $row['jenis_komoditi'] . '</td>';
        $i++;
    }
} else if ($jenis == 'penangkar') {
    echo '<tr><th colspan="11">LAPORAN IZIN TSL ' . strtoupper($jenis) . ' </th></tr>';
    echo '<tr><th style="vertical-align: top; width:50px">No</th><th style="vertical-align: top; width:250px">Pemilik</th><th style="vertical-align: top; width:150px">Waktu Pendataan</th><th style="vertical-align: top;width:150px">Kelas Satwa</th><th style="vertical-align: top;width:100px">Jumlah Saat Ini</th><th style="vertical-align: top; width:600px">Keterangan</th><th style="vertical-align: top; width:160px">No. SK</th><th style="vertical-align: top; width:150px">Alamat</th><th style="vertical-align: top; width:250px">Masa Berlaku</th><th style="vertical-align: top; width:150px">Satwa</th><th style="vertical-align: top; width:150px">Jumlah</th></tr>';
    $i = 1;
    foreach ($data->result_array() as $row) {
        $datetime_pendataan = new DateTime($row['waktu_pendataan']);
        $pendataan = strftime('%d %B %Y', strtotime($datetime_pendataan->format('Y-m-d')));
        $datetime_tglawal = new DateTime($row['tglawal_berlaku']);
        $tglawal = strftime('%d %B %Y', strtotime($datetime_tglawal->format('Y-m-d')));
        $datetime_tglakhir = new DateTime($row['tglakhir_berlaku']);
        $tglakhir = strftime('%d %B %Y', strtotime($datetime_tglakhir->format('Y-m-d')));
        $detail = json_decode($row['detail'], true);
        $jumlahArray = count($detail);
        echo '<tr>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $i . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . strtoupper($row['pemilik']) . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $pendataan . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['kelas_satwa'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['jumlah'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . str_replace(array("\r", "\n"), '', $row['keterangan']) . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['nosk'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['alamat'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '"><b>' . $tglawal . '</b> sampai <b>' . $tglakhir . '</b></td>';
        $isFirstDetail = true;
        foreach ($detail as $item) {
            if (!$isFirstDetail) {
                echo '<tr>';
            }
            echo '<td style="vertical-align: top;">' . $item['satwa'] . '</td>';
            echo '<td style="vertical-align: top;">' . $item['jumlah'] . '</td>';
            echo '</tr>';
            $isFirstDetail = false;
        }
        $i++;
    }
    echo '</tr>';
} else if ($jenis == 'lembaga konservasi') {
    echo '<tr><th colspan="12">LAPORAN IZIN TSL ' . strtoupper($jenis) . ' </th></tr>';
    echo '<tr><th style="vertical-align: top; width:50px">No</th><th style="vertical-align: top; width:250px">Pemilik</th><th style="vertical-align: top; width:150px">Waktu Pendataan</th><th style="vertical-align: top;width:150px">Kelas Satwa</th><th style="vertical-align: top;width:100px">Jumlah Saat Ini</th><th style="vertical-align: top; width:600px">Keterangan</th><th style="vertical-align: top; width:160px">No. SK</th><th style="vertical-align: top; width:150px">Alamat</th><th style="vertical-align: top; width:250px">Masa Berlaku</th><th style="vertical-align: top; width:150px">Satwa</th><th style="vertical-align: top; width:150px">Tahun</th><th style="vertical-align: top; width:150px">Jumlah</th></tr>';
    $i = 1;
    foreach ($data->result_array() as $row) {
        $datetime_pendataan = new DateTime($row['waktu_pendataan']);
        $pendataan = strftime('%d %B %Y', strtotime($datetime_pendataan->format('Y-m-d')));
        $datetime_tglawal = new DateTime($row['tglawal_berlaku']);
        $tglawal = strftime('%d %B %Y', strtotime($datetime_tglawal->format('Y-m-d')));
        $datetime_tglakhir = new DateTime($row['tglakhir_berlaku']);
        $tglakhir = strftime('%d %B %Y', strtotime($datetime_tglakhir->format('Y-m-d')));
        $detail = json_decode($row['detail'], true);
        $jumlahArray = count($detail);
        echo '<tr>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $i . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . strtoupper($row['pemilik']) . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $pendataan . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['kelas_satwa'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['jumlah'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . str_replace(array("\r", "\n"), '', $row['keterangan']) . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['nosk'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '">' . $row['alamat'] . '</td>';
        echo '<td style="vertical-align: top;" rowspan="' . $jumlahArray . '"><b>' . $tglawal . '</b> sampai <b>' . $tglakhir . '</b></td>';
        $isFirstDetail = true;
        foreach ($detail as $item) {
            if (!$isFirstDetail) {
                echo '<tr>';
            }
            echo '<td style="vertical-align: top;">' . $item['satwa'] . '</td>';
            echo '<td style="vertical-align: top;">' . $item['tahun'] . '</td>';
            echo '<td style="vertical-align: top;">' . $item['jumlah'] . '</td>';
            echo '</tr>';
            $isFirstDetail = false;
        }
        $i++;
    }
    echo '</tr>';
} else {
    echo '<tr></th><th colspan = "6">LAPORAN IZIN TSL KESELURUHAN</th></tr>';
    echo '<tr><th style ="vertical-align: top;" style="width:50px">No</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Jenis Izin TSL</th><th style ="vertical-align: top;" style="width:150px">Pemilik</th><th style ="vertical-align: top;" style="width:250px">Kelas Satwa</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:150px">Jumlah Saat Ini</th style ="vertical-align: top;"><th style ="vertical-align: top;" style="width:600px">Keterangan</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        $datetime_pendataan = new DateTime($row['waktu_pendataan']);
        $pendataan = strftime('%d %B %Y', strtotime($datetime_pendataan->format('Y-m-d')));
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td >';
        echo '<td style ="vertical-align: top;">' . strtoupper($row['jenis']) . '</td>';
        echo '<td style ="vertical-align: top;">' . strtoupper($row['pemilik']) . '</td>';
        echo '<td style ="vertical-align: top;">' . $pendataan . '</td>';
        echo '<td style ="vertical-align: top;">' . $row['kelas_satwa'] . '</td>';
        echo '<td style ="vertical-align: top;">' . $row['jumlah'] . '</td>';
        echo '<td style ="vertical-align: top;">' . str_replace(array("\r", "\n"), '', $row['keterangan']) . '</td>';
        $i++;
    }
}

echo '</table>';
