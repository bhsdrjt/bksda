--
-- Database: `arsip`
--
CREATE DATABASE IF NOT EXISTS `arsip` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `arsip`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_arsip`
--

CREATE TABLE `tb_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_arsip` varchar(256) NOT NULL,
  `no_arsip` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `keterangan` text NOT NULL,
  `media` varchar(64) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_arsip` date NOT NULL,
  `tanggal_aktif` date NOT NULL,
  `jenis_arsip` varchar(32) NOT NULL,
  `asli` varchar(32) NOT NULL,
  `file` varchar(256) NOT NULL,
  `id_tempatarsip` int(11) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL,
  `user_create` varchar(64) NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_update` varchar(64) NOT NULL,
  `time_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_arsip`
--

INSERT INTO `tb_arsip` (`id_arsip`, `id_kategori`, `nama_arsip`, `no_arsip`, `deskripsi`, `keterangan`, `media`, `jumlah`, `tanggal_arsip`, `tanggal_aktif`, `jenis_arsip`, `asli`, `file`, `id_tempatarsip`, `id_pegawai`, `user_create`, `time_create`, `user_update`, `time_update`) VALUES
(9, 10, 'CALK SEMESTER I 2017', '', 'Laporan Keuangan ini meliputi:\r\n1. LAPORAN REALISASI ANGGARAN\r\n2. NERACA\r\n3. LAPORAN OPERASIONAL\r\n4. LAPORAN PERUBAHAN EKUITAS\r\n5. CATATAN ATAS LAPORAN KEUANGAN', 'Uji Coba', 'Kertas', 30, '2017-07-01', '2021-07-01', 'Penting', 'Asli', 'CALK_SEMESTER_I_2017.rar', 7, 7, 'admin', '2018-11-09 02:50:45', 'admin', '2018-11-09 02:52:38'),
(10, 6, 'RINCIAN KERTAS KERJA SATKER T.A 2017', '', '', '', 'Kertas', 7, '2017-07-01', '2021-07-01', 'Penting', 'Asli', 'POK-2017.pdf', NULL, 7, 'admin', '2018-11-09 02:55:59', 'admin', '2018-11-09 02:55:59'),
(11, 3, 'LAPORAN BARANG MILIK NEGARA TRIWULAN III', '', 'Laporan Barang Milik Negara Satuan Kerja Balai Jasa Konstruksi Wilayah V Banjarmasin yang terdiri dari : Data Transaksi Barang, Laporan Posisi Barang, dan Catatan atas Laporan Barang Milik Negara Triwulan III Tahun Anggaran 2017 sebagaimana terlampir adalah tanggung jawab kami.', '', 'Kertas', 18, '2017-10-17', '2021-10-01', 'Penting', 'Asli', 'pdf.rar', NULL, 7, 'admin', '2018-11-09 03:00:30', 'admin', '2018-11-09 03:00:30'),
(12, 7, 'RINGKASAN KONTRAK PENGADAAN PAKET MEETING DAN PENGINAPAN', '', 'Pengadaan Paket Meeting dan Penginapan Untuk Forum Harmonisasi Program Pembinaan Jasa Kontruksi Kalimantan di Banjarbaru, Provinsi Kalimantan Selatan', '', 'Kertas', 3, '2017-02-20', '2021-02-20', 'Penting', 'Asli', 'ringkasan_dokumen_kontrak_2017.pdf', NULL, 7, 'admin', '2018-11-09 03:14:36', 'admin', '2018-11-09 03:14:36'),
(13, 7, 'SPK Pengemudi', '', 'Kontak Pengemudi', '', 'Kertas', 4, '2017-01-04', '2020-01-07', 'Penting', 'Asli', 'SPK_Pengemudi.rar', 3, 7, 'admin', '2018-11-12 13:40:28', 'admin', '2018-11-12 13:40:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(128) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Kepala'),
(2, 'Staf PNS'),
(3, 'Staf Non PNS'),
(4, 'Kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `kunci` varchar(8) NOT NULL,
  `id_seksi` int(11) NOT NULL,
  `user_create` varchar(64) NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_update` varchar(64) NOT NULL,
  `time_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `keterangan`, `kunci`, `id_seksi`, `user_create`, `time_create`, `user_update`, `time_update`) VALUES
(1, 'Keuangan', 'Arsip Keuangan', 'KU', 2, 'admin', '2018-10-25 05:35:23', 'admin', '2018-10-25 06:02:53'),
(2, 'Laporan Kegiatan', '', 'LK', 2, 'admin', '2018-10-25 05:36:20', 'admin', '2018-10-25 05:36:20'),
(3, 'Laporan Barang Milik Negara', '', 'LB', 5, 'admin', '2018-10-26 01:35:14', 'admin', '2018-10-26 01:35:14'),
(4, 'DIPA', '', 'DP', 5, 'admin', '2018-10-26 01:42:52', 'admin', '2018-10-26 01:42:52'),
(5, 'Laporan Kegiatan', '', 'LK', 4, 'admin', '2018-10-26 01:43:17', 'admin', '2018-10-26 01:43:17'),
(6, 'POK', '', 'PK', 5, 'admin', '2018-10-26 01:43:54', 'admin', '2018-10-26 01:43:54'),
(7, 'Kontrak', '', 'KT', 5, 'admin', '2018-10-26 01:44:10', 'admin', '2018-10-26 01:44:10'),
(8, 'SPM', '', 'SPM', 5, 'admin', '2018-11-01 02:15:09', 'admin', '2018-11-01 02:15:09'),
(9, 'Laporan Kegiatan', '', 'LKK', 9, 'admin', '2018-11-06 02:38:31', 'admin', '2018-11-06 02:38:31'),
(10, 'Laporan Keuangan', '', 'KU', 5, 'admin', '2018-11-09 02:37:28', 'admin', '2018-11-09 02:37:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lemari`
--

CREATE TABLE `tb_lemari` (
  `id_lemari` int(11) NOT NULL,
  `id_ruangan` varchar(16) NOT NULL,
  `nama_lemari` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `kondisi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lemari`
--

INSERT INTO `tb_lemari` (`id_lemari`, `id_ruangan`, `nama_lemari`, `keterangan`, `kondisi`) VALUES
(4, 'R1', 'Lemari 1', '', 'Baik'),
(5, 'R2', 'Lemari 2', '', 'Baik'),
(6, 'R1', 'Lemari 3', '', 'Baik'),
(7, 'R1', 'Lemari 4', '', 'Baik'),
(8, 'R1', 'Tidak dilemari TU', '', 'Baik'),
(9, 'R0', 'Tidak dilemari ruangan', '', 'Baik'),
(10, 'R0', '22', '22', 'Baik'),
(11, 'R3', 'Lemari Satker 1', '', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `jk` varchar(64) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_seksi` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama`, `nip`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nohp`, `email`, `id_jabatan`, `id_seksi`, `foto`) VALUES
(4, 'MUHAMMAD NI\'MAN NASIR1', '2435241', 'Perempuan', 'Martapura1', '1995-01-05', 'Jalan Mesjid Pasayangan Utara1', '0852482620021', 'nikman.mnn@gmail.com1', 2, 3, 'file0025.JPG'),
(5, '222', '23', 'Perempuan', '2', '2018-11-22', '2', '2', '244@434.com', 2, 1, ''),
(6, '2', '2', 'Laki-laki', '23', '2018-11-09', '23', '232', '342@2.com', 1, 1, ''),
(7, 'Indira', '', 'Perempuan', 'Banjarmasin', '1994-06-14', '', '', '', 3, 5, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id` int(11) NOT NULL,
  `instansi` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(64) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengaturan`
--

INSERT INTO `tb_pengaturan` (`id`, `instansi`, `alamat`, `telepon`, `keterangan`) VALUES
(1, 'Balai Jasa Kontruksi Wilayah V', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `id_lemari` int(11) NOT NULL,
  `nama_rak` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `id_lemari`, `nama_rak`, `keterangan`) VALUES
(7, 4, '1', ''),
(8, 4, '2', ''),
(10, 5, '1', ''),
(11, 5, '2', ''),
(12, 5, '3', ''),
(13, 8, 'None', ''),
(14, 11, 'TIngkat 1', ''),
(15, 11, 'Tingkat 2', ''),
(16, 11, 'Tingkat 3', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` varchar(16) NOT NULL,
  `nama_ruangan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `kondisi` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `keterangan`, `kondisi`) VALUES
('R0', 'Tidak diruangan', '', 'Baik'),
('R1', 'Ruangan Tata Usaha', '', 'Baik'),
('R2', 'Ruangan Perencanaan', '', 'Baik'),
('R3', 'Ruangan Satker', '', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_seksi`
--

CREATE TABLE `tb_seksi` (
  `id_seksi` int(11) NOT NULL,
  `seksi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_seksi`
--

INSERT INTO `tb_seksi` (`id_seksi`, `seksi`) VALUES
(1, 'Kepala Balai'),
(2, 'Tata Usaha'),
(3, 'Seksi Perencanaan dan Informasi'),
(4, 'Seksi Penyelenggaraan dan Pengendalian Mutu'),
(5, 'Satuan Kerja'),
(6, 'Jabatan Fungsional'),
(9, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkategori`
--

CREATE TABLE `tb_subkategori` (
  `id_subkategori` int(11) NOT NULL,
  `nama_subkategori` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tempatarsip`
--

CREATE TABLE `tb_tempatarsip` (
  `id_tempatarsip` int(11) NOT NULL,
  `tempatarsip` varchar(128) NOT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tempatarsip`
--

INSERT INTO `tb_tempatarsip` (`id_tempatarsip`, `tempatarsip`, `id_rak`, `keterangan`) VALUES
(2, 'A2', 7, ''),
(3, 'A3', 7, ''),
(4, 'A4', 8, ''),
(5, 'A1', 11, '123'),
(6, 'None', 13, ''),
(7, 'Arsip Keuangan 1', 14, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `nohp` varchar(32) NOT NULL,
  `alamat` varchar(168) NOT NULL,
  `jk` varchar(16) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_seksi` int(11) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `rule` varchar(32) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `email`, `nohp`, `alamat`, `jk`, `id_jabatan`, `id_seksi`, `foto`, `rule`, `status`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 'nikmannasir123@gmail.com', '085248262002', 'jalan mesjid no. 28', 'Laki-laki', 1, 2, 'default.png', 'administrator', 'Aktif'),
('indira', 'e10adc3949ba59abbe56e057f20f883e', 'Indira', '', '', '', 'Perempuan', 3, 5, '', 'user', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_lemari`
--
ALTER TABLE `tb_lemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tb_seksi`
--
ALTER TABLE `tb_seksi`
  ADD PRIMARY KEY (`id_seksi`);

--
-- Indexes for table `tb_subkategori`
--
ALTER TABLE `tb_subkategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `tb_tempatarsip`
--
ALTER TABLE `tb_tempatarsip`
  ADD PRIMARY KEY (`id_tempatarsip`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_lemari`
--
ALTER TABLE `tb_lemari`
  MODIFY `id_lemari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_seksi`
--
ALTER TABLE `tb_seksi`
  MODIFY `id_seksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_subkategori`
--
ALTER TABLE `tb_subkategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tempatarsip`
--
ALTER TABLE `tb_tempatarsip`
  MODIFY `id_tempatarsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;--