-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2020 pada 15.37
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipedes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akta_kelahiran`
--

CREATE TABLE `akta_kelahiran` (
  `id_akta_kelahiran` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `no_rumah` varchar(255) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akta_kelahiran`
--

INSERT INTO `akta_kelahiran` (`id_akta_kelahiran`, `id_penduduk`, `nama_lengkap`, `tmp_lahir`, `tgl_lahir`, `jk`, `kewarganegaraan`, `agama`, `nama_ayah`, `nama_ibu`, `alamat`, `rt`, `rw`, `no_rumah`, `kelurahan_desa`, `kecamatan`, `kabupaten_kota`, `kode_pos`, `gambar_surat_pengantar`, `waktu`, `kode`, `status`) VALUES
(6, 2, 'Bela Ciao', 'Banyumas', '2020-08-02', 'p', 'Indonesia', 'Islam', 'Bahar', 'Rina', 'Purwokerto', 2, 4, 'B5', 'Purwokerto Selatan', 'Purwokerto Utara', 'Banyumas', 5323344, 'akta.jpg', '2020-08-02 14:37:44', 'AKT001', 'belum'),
(7, 3, 'Reno Agil Saputra', 'Banyumas', '2020-08-21', 'p', 'Indonesia', 'Islam', 'Akbar', 'Siti', 'Banyumas', 4, 5, 'AB', 'Kembaran', 'Purwokerto Utara', 'Banyumas', 5323344, 'akta1.jpg', '2020-08-02 14:38:34', 'AKT002', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_acara`
--

CREATE TABLE `izin_acara` (
  `id_izin_acara` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `acara` text NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `lokasi` text NOT NULL,
  `jenis_acara` varchar(255) NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `izin_acara`
--

INSERT INTO `izin_acara` (`id_izin_acara`, `id_penduduk`, `acara`, `tgl_mulai`, `tgl_selesai`, `lokasi`, `jenis_acara`, `gambar_surat_pengantar`, `waktu`, `kode`, `status`) VALUES
(1, 2, 'Konser', '2020-07-30 15:16:00', '2020-08-26 18:16:00', 'Lapangan', 'Konser Musik', 'izin_acara_surat_pengantar.jpg', '2020-07-30 15:16:40', 'IZA001', 'proses'),
(2, 3, 'Konser Dangdut', '2020-08-02 14:32:00', '2020-08-20 14:32:00', 'Lapangan', 'Konser Musik', 'izin_acara_surat_pengantar.png', '2020-08-02 14:32:37', 'IZA002', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_usaha`
--

CREATE TABLE `izin_usaha` (
  `id_izin_usaha` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `jenis_usaha` varchar(255) NOT NULL,
  `modal_usaha` int(100) NOT NULL,
  `tempat_usaha` text NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `izin_usaha`
--

INSERT INTO `izin_usaha` (`id_izin_usaha`, `id_penduduk`, `nama_usaha`, `jenis_usaha`, `modal_usaha`, `tempat_usaha`, `gambar_surat_pengantar`, `waktu`, `kode`, `status`) VALUES
(2, 2, 'Baso Aci', 'Makanan', 100000, 'Pasar', 'izin_usaha_surat_pengantar.jpg', '2020-08-02 17:33:42', 'IZU001', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasi`
--

CREATE TABLE `kasi` (
  `id_kasi` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga_pindah`
--

CREATE TABLE `keluarga_pindah` (
  `id_keluarga_pindah` int(11) NOT NULL,
  `id_suket_pindah` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga_pindah`
--

INSERT INTO `keluarga_pindah` (`id_keluarga_pindah`, `id_suket_pindah`, `nik`, `nama`) VALUES
(1, 1, '8954895489', 'Reno');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kependudukan`
--

CREATE TABLE `kependudukan` (
  `id_kependudukan` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `jenis_pelayanan` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `gambar_akta_kelahiran` text NOT NULL,
  `waktu` datetime NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kependudukan`
--

INSERT INTO `kependudukan` (`id_kependudukan`, `id_penduduk`, `jenis_pelayanan`, `keperluan`, `gambar_surat_pengantar`, `gambar_akta_kelahiran`, `waktu`, `kode`, `status`) VALUES
(8, 2, 'KTP', 'membuat', 'kependudukan_bukti.jpg', 'kependudukan_bukti1.jpg', '2020-07-29 13:32:45', 'KPN001', 'belum'),
(9, 2, 'KIA', 'membuat', 'kependudukan_bukti2.jpg', 'kependudukan_bukti3.jpg', '2020-07-29 13:36:48', 'KPN002', 'belum'),
(10, 3, 'KTP', 'merubah', 'kependudukan_bukti9.jpg', 'kependudukan_bukti10.jpg', '2020-07-29 13:44:46', 'KPN003', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasangan`
--

CREATE TABLE `pasangan` (
  `id_pasangan` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `no_rumah` int(11) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `jenis_pelayanan` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `id_penduduk`, `jenis_pelayanan`, `keperluan`, `gambar_surat_pengantar`, `waktu`, `kode`, `status`) VALUES
(2, 3, 'Surat Keterangan Sudah Menikah', 'membuat', 'pelayanan_surat_pengantar1.jpg', '2020-07-29 10:01:06', 'PLY001', 'belum'),
(5, 2, 'Surat Keterangan Belum Menikah', 'membuat', 'pelayanan_surat_pengantar4.jpg', '2020-07-29 10:14:48', 'PLY002', 'belum'),
(6, 3, 'Domisili', 'merubah', 'pelayanan_surat_pengantar.jpg', '2020-07-29 10:15:24', 'PLY003', 'proses'),
(7, 2, 'Surat Keterangan Sudah Menikah', 'merubah', 'pelayanan_surat_pengantar2.jpg', '2020-07-30 18:52:05', 'PLY004', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `no_rumah` varchar(255) NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nik`, `no_kk`, `nama_lengkap`, `tmp_lahir`, `tgl_lahir`, `jk`, `kewarganegaraan`, `status_perkawinan`, `agama`, `pekerjaan`, `telp`, `alamat`, `rt`, `rw`, `no_rumah`, `kelurahan_desa`, `kecamatan`, `kabupaten_kota`, `kode_pos`, `kata_sandi`, `foto`) VALUES
(2, '73453243', '9494949', 'Reno Agil Saputra', 'Banyumas', '2020-07-28', 'l', 'Indonesia', 'belum kawin', 'Islam', 'Pelajar', '08384758999', 'Purwokerto', 2, 3, '4', 'Teluk', 'Purwokerto Selatan', 'Banyumas', 5234, '$2y$10$LTFu/oWIkHCRChilJAbPNu.x.0U.RMZ9RIJdAIkD4IQnx4dSUnE92', 'penduduk-73453243.jpg'),
(3, '828838882', '838785859', 'Bella L', 'Bekasi', '1998-02-19', 'p', 'Indonesia', 'sudah kawin', 'Islam', 'Chef', '08384758999', 'Purwokerto Utara', 4, 1, '4', 'Kembaran', 'Purwokerto Barat', 'Banyumas', 534323, '$2y$10$KaTrjaYEBk3Y21FK19INMefBZK10/.nastSTsI48VHQYMaDfKhK1e', 'penduduk-828838882.jpg'),
(4, '9999999', '9384050', 'Bambang P', 'Banyumas', '2020-08-02', 'l', 'Indonesia', 'belum kawin', 'Islam', 'Guru', '081327566748', 'Kembarang', 3, 5, '-', 'Bawang', 'Purwokerto Utara', 'Banyumas', 5323344, '$2y$10$RzO0G9d1Zl9ZMe1FoTttM.rcnb3wuNkFeFt7kMxBC18iFQGhmj.9G', 'penduduk-9999999.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_mati`
--

CREATE TABLE `penduduk_mati` (
  `id_penduduk_mati` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk_mati`
--

INSERT INTO `penduduk_mati` (`id_penduduk_mati`, `id_penduduk`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nik_pengadu` varchar(255) NOT NULL,
  `nama_pengadu` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text,
  `tempat_kejadian` text NOT NULL,
  `waktu_kejadian` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nik_pengadu`, `nama_pengadu`, `deskripsi`, `foto`, `tempat_kejadian`, `waktu_kejadian`, `status`, `waktu`) VALUES
(3, '3234', 'Reno', 'sdfklslm', '3234-pengaduan.jpeg', 'fv', '2020-07-28 20:19:00', 'belum', '2020-07-28 20:19:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suket_kematian`
--

CREATE TABLE `suket_kematian` (
  `id_suket_kematian` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_penduduk_mati` int(11) NOT NULL,
  `waktu_kematian` datetime NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suket_kematian`
--

INSERT INTO `suket_kematian` (`id_suket_kematian`, `id_penduduk`, `id_penduduk_mati`, `waktu_kematian`, `gambar_surat_pengantar`, `waktu`, `kode`, `status`) VALUES
(1, 2, 2, '2020-08-11 19:19:00', 'suket_mati2.jpg', '2020-08-02 19:20:14', 'SKM001', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suket_menikah`
--

CREATE TABLE `suket_menikah` (
  `id_suket_menikah` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_pasanangan` int(11) NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `gambar_akta_kelahiran` text NOT NULL,
  `kode` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suket_pindah`
--

CREATE TABLE `suket_pindah` (
  `id_suket_pindah` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `status_kependudukan` varchar(255) NOT NULL,
  `jml_keluarga_pindah` int(11) NOT NULL,
  `pindah_ke` text NOT NULL,
  `tgl_pindah` datetime NOT NULL,
  `kelurahan_desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suket_pindah`
--

INSERT INTO `suket_pindah` (`id_suket_pindah`, `id_penduduk`, `status_kependudukan`, `jml_keluarga_pindah`, `pindah_ke`, `tgl_pindah`, `kelurahan_desa`, `kecamatan`, `kabupaten_kota`, `gambar_surat_pengantar`, `waktu`, `status`, `kode`) VALUES
(1, 2, 'warga desa', 3, 'Jakarta', '2020-08-19 16:05:00', 'Bawang', 'Purwokerto Utara', 'Banyumas', 'suket_pindah.jpg', '2020-08-02 16:05:22', 'proses', 'SKP001'),
(3, 3, 'warga desa', 4, 'Kalimantan', '2020-08-19 17:00:00', 'Bawang', 'Purwokerto Utara', 'Banyumas', 'suket_pindah1.jpg', '2020-08-02 17:00:50', 'belum', 'SKP002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `jenis_usaha` varchar(255) NOT NULL,
  `modal_usaha` int(11) NOT NULL,
  `tempat_usaha` text NOT NULL,
  `gambar_surat_pengantar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akta_kelahiran`
--
ALTER TABLE `akta_kelahiran`
  ADD PRIMARY KEY (`id_akta_kelahiran`);

--
-- Indeks untuk tabel `izin_acara`
--
ALTER TABLE `izin_acara`
  ADD PRIMARY KEY (`id_izin_acara`);

--
-- Indeks untuk tabel `izin_usaha`
--
ALTER TABLE `izin_usaha`
  ADD PRIMARY KEY (`id_izin_usaha`);

--
-- Indeks untuk tabel `kasi`
--
ALTER TABLE `kasi`
  ADD PRIMARY KEY (`id_kasi`);

--
-- Indeks untuk tabel `keluarga_pindah`
--
ALTER TABLE `keluarga_pindah`
  ADD PRIMARY KEY (`id_keluarga_pindah`);

--
-- Indeks untuk tabel `kependudukan`
--
ALTER TABLE `kependudukan`
  ADD PRIMARY KEY (`id_kependudukan`);

--
-- Indeks untuk tabel `pasangan`
--
ALTER TABLE `pasangan`
  ADD PRIMARY KEY (`id_pasangan`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indeks untuk tabel `penduduk_mati`
--
ALTER TABLE `penduduk_mati`
  ADD PRIMARY KEY (`id_penduduk_mati`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `suket_kematian`
--
ALTER TABLE `suket_kematian`
  ADD PRIMARY KEY (`id_suket_kematian`);

--
-- Indeks untuk tabel `suket_menikah`
--
ALTER TABLE `suket_menikah`
  ADD PRIMARY KEY (`id_suket_menikah`);

--
-- Indeks untuk tabel `suket_pindah`
--
ALTER TABLE `suket_pindah`
  ADD PRIMARY KEY (`id_suket_pindah`);

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akta_kelahiran`
--
ALTER TABLE `akta_kelahiran`
  MODIFY `id_akta_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `izin_acara`
--
ALTER TABLE `izin_acara`
  MODIFY `id_izin_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `izin_usaha`
--
ALTER TABLE `izin_usaha`
  MODIFY `id_izin_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kasi`
--
ALTER TABLE `kasi`
  MODIFY `id_kasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keluarga_pindah`
--
ALTER TABLE `keluarga_pindah`
  MODIFY `id_keluarga_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kependudukan`
--
ALTER TABLE `kependudukan`
  MODIFY `id_kependudukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pasangan`
--
ALTER TABLE `pasangan`
  MODIFY `id_pasangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penduduk_mati`
--
ALTER TABLE `penduduk_mati`
  MODIFY `id_penduduk_mati` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suket_kematian`
--
ALTER TABLE `suket_kematian`
  MODIFY `id_suket_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suket_menikah`
--
ALTER TABLE `suket_menikah`
  MODIFY `id_suket_menikah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suket_pindah`
--
ALTER TABLE `suket_pindah`
  MODIFY `id_suket_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
