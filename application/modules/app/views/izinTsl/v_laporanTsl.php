<?php

header("Content-type: application/vnd-ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Laporan Izin TSL " . $jenis . ".xls");

echo '<table border="1">';

if ($jenis == "null") {
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
        echo '<td style ="vertical-align: top;">' . str_replace(array("\r", "\n"), '', $row['keterangan']). '</td>';
        $i++;
    }
} else {
    echo '<tr><th colspan = "6">LAPORAN IZIN TSL ' . strtoupper($jenis) . ' </th></tr>';
    echo '<tr><th style ="vertical-align: top;" style="width:50px">No</th><th style ="vertical-align: top;width:250px">Pemilik</th><th style ="vertical-align: top; width:150px">Waktu Pendataan</th><th style ="vertical-align: top;" style="width:150px">Kelas Satwa</th><th style ="vertical-align: top;width:100px">Jumlah Saat Ini</th><th style ="vertical-align: top; width:600px">Keterangan</th></tr>';
    $i = 1;

    foreach ($data->result_array() as $row) {
        $datetime_pendataan = new DateTime($row['waktu_pendataan']);
        $pendataan = strftime('%d %B %Y', strtotime($datetime_pendataan->format('Y-m-d')));
        echo '<tr><td style ="vertical-align: top;">' . $i . '</td>';
        echo '<td style ="vertical-align: top;">' . strtoupper($row['pemilik']) . '</td >';
        echo '<td style ="vertical-align: top;">' . $pendataan . '</td >';
        echo '<td style ="vertical-align: top;">' . $row['kelas_satwa'] . '</td >';
        echo '<td style ="vertical-align: top;">' . $row['jumlah'] . '</td >';
        echo '<td style ="vertical-align: top;">' . str_replace(array("\r", "\n"), '', $row['keterangan']). '</td >';
        $i++;
    }
}

echo '</table>';
