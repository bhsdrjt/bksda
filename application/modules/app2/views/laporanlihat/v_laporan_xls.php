<?php
    $separator = "\t";
    if ($kategori!="null") { 
         $jkategori = "-".$kategori;
    }
    else {
        $jkategori = ""; 
    } 
    header("Content-type: application/vnd-ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=Laporan".$jkategori.".xls");

    if ($kategori=="null") {
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }

    } else if ($kategori=="PAL Batas Wilayah"){
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Nomor PAL Batas".$separator."Kondisi PAL".$separator."Material PAL".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['data2'];
        echo $separator.$row['data3'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }

    } else if ($kategori=="Area Terbuka/Open Area"){
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Luas Wilayah Terbuka".$separator."Indikasi Penyebab".$separator."Jenis Open Area".$separator."Tingkat Kerusakan".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['data2'];
        echo $separator.$row['data3'];
        echo $separator.$row['data4'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }
        
    } else if ($kategori=="Satwa Liar") {
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Spesies /Nama Latin ".$separator."Nama Lokal".$separator."Jumlah Perjumpaan".$separator."Kelas Satwa".$separator."Endemisitas".$separator."Status Perlindungan".$separator."Status IUCN ".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['data3'];
        echo $separator.$row['data8'];
        echo $separator.$row['data4'];
        echo $separator.$row['data5'];
        echo $separator.$row['data6'];
        echo $separator.$row['data7'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }
     
    } else if ($kategori=="Tumbuhan") {
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Spesies / Nama Latin ".$separator."Nama Lokal".$separator."Jenis Tumbuhan".$separator."Status Perlindungan".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['data3'];
            echo $separator.$row['data4'];
            echo $separator.$row['data5'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }
       
    } else if ($kategori=="Wisata Alam") {
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Nama Lokasi Wisata ".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }
      
    } else if ($kategori=="Gangguan") {
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Jenis Gangguan".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }
      
    }else if ($kategori=="Sosial Ekonomi") {
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Nama Desa / Dusun".$separator."Nama Kepala Desa / Dusun".$separator."Kontak Person".$separator."Jumlah Penduduk".$separator."Jumlah Kepala Keluarga".$separator."Mayoritas pekerjaan".$separator."Keterangan Sejarah Desa".$separator."Keterangan Interaksi Masyarakat terhadap kawasan".$separator."Keterangan Lainnya".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['data2'];
        echo $separator.$row['data3'];
        echo $separator.$row['data4'];
        echo $separator.$row['data5'];
        echo $separator.$row['data6'];
        echo $separator.$row['data7'];
        echo $separator.$row['data8'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }

    } else if ($kategori=="Pemberdayaan Masyarakat") {
        echo "No".$separator."Jenis Laporan".$separator."Lokasi Pendataan".$separator."Waktu Pendataan".$separator."Nama Kegiatan".$separator."Lintang".$separator."Bujur".$separator."Nama Kelompok".$separator."SK Kelompok".$separator."Lokasi".$separator."Jenis Usaha".$separator."Jumlah Anggota ".$separator."Kegiatan-kegiatan".$separator."Keterangan".$separator."Status".$separator."\r\n";
        $i=1;

        foreach($data->result_array() as $row ) {
        echo $i;
        echo $separator.$row['kategori'];
        echo $separator.$row['namakawasan'];
        echo $separator.tanggal($row['waktu']);
        echo $separator.$row['kegiatan'];
        echo $separator.$row['lintang'];
        echo $separator.$row['bujur'];
        echo $separator.$row['data1'];
        echo $separator.$row['data2'];
        echo $separator.$row['data3'];
        echo $separator.$row['data4'];
        echo $separator.$row['data5'];
        echo $separator.$row['data6'];
        echo $separator.$row['keterangan'];
        echo $separator.$row['validasi'];
        echo "\r\n";
        $i++;
        }

    }

?>



         
         
         