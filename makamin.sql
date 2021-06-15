-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 11:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makamin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `pemilik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pemakaman`
--

CREATE TABLE `jadwal_pemakaman` (
  `id_jadwal` int(11) NOT NULL,
  `id_makam` varchar(11) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `makam`
--

CREATE TABLE `makam` (
  `id_makam` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `gbr_nama` varchar(255) NOT NULL,
  `bulan_count` int(2) NOT NULL,
  `tahun_count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `makam_stok`
--

CREATE TABLE `makam_stok` (
  `id_stok` int(11) NOT NULL,
  `id_makam` varchar(11) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(6) NOT NULL,
  `bulan_count` int(2) NOT NULL,
  `tahun_count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paket_sewa`
--

CREATE TABLE `paket_sewa` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa_jasa`
--

CREATE TABLE `penyewa_jasa` (
  `id_sewa` varchar(11) NOT NULL,
  `verif` varchar(4) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_makam` varchar(11) NOT NULL,
  `nama_makam` varchar(100) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `nama_nisan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `tgl_verif` varchar(20) NOT NULL,
  `waktu_verif` varchar(20) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `waktu_input` varchar(20) NOT NULL,
  `bulan_count` int(2) NOT NULL,
  `tahun_count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa_makam`
--

CREATE TABLE `penyewa_makam` (
  `id_sewa` varchar(11) NOT NULL,
  `verif` varchar(4) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_makam` varchar(11) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `gbr_smb` varchar(255) NOT NULL,
  `gbr_kk_ktp` varchar(255) NOT NULL,
  `gbr_sk` varchar(255) NOT NULL,
  `gbr_kk_ktp_jenazah` varchar(255) NOT NULL,
  `gbr_sk_instansi` varchar(255) NOT NULL,
  `gbr_sk_lokal` varchar(255) NOT NULL,
  `gbr_sp` varchar(255) NOT NULL,
  `tgl_verif` varchar(20) NOT NULL,
  `waktu_verif` varchar(20) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `waktu_input` varchar(20) NOT NULL,
  `bulan_count` int(2) NOT NULL,
  `tahun_count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_sewa` varchar(11) NOT NULL,
  `id_renew` varchar(11) NOT NULL,
  `verif` varchar(4) NOT NULL,
  `paid` varchar(4) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `unit` int(2) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `pajak` int(50) NOT NULL,
  `metode_bayar` varchar(20) NOT NULL,
  `resi_transfer` varchar(255) NOT NULL,
  `tgl_verif` varchar(20) NOT NULL,
  `waktu_verif` varchar(20) NOT NULL,
  `paid_tgl` varchar(20) NOT NULL,
  `paid_waktu` varchar(20) NOT NULL,
  `bulan_count` int(2) NOT NULL,
  `tahun_count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verif` varchar(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(12) NOT NULL,
  `kawin` varchar(12) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `tgl_verif` varchar(20) NOT NULL,
  `waktu_verif` varchar(20) NOT NULL,
  `tgl_daftar` varchar(20) NOT NULL,
  `waktu_daftar` varchar(20) NOT NULL,
  `bulan_count` int(2) NOT NULL,
  `tahun_count` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `status`, `email`, `telp`, `password`, `verif`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `kawin`, `alamat`, `negara`, `gender`, `agama`, `pekerjaan`, `tgl_verif`, `waktu_verif`, `tgl_daftar`, `waktu_daftar`, `bulan_count`, `tahun_count`) VALUES
('1', 'admin', 'admin', '0', '21232f297a57a5a743894a0e4a801fc3', 'yes', 'admin', '0000000000000000', 'admin', '2021-04-24', 'admin', 'admin', 'Indonesia', 'admin', 'admin', 'admin', '04', '2021', '', '', 4, 2021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `jadwal_pemakaman`
--
ALTER TABLE `jadwal_pemakaman`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `makam`
--
ALTER TABLE `makam`
  ADD PRIMARY KEY (`id_makam`);

--
-- Indexes for table `makam_stok`
--
ALTER TABLE `makam_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `paket_sewa`
--
ALTER TABLE `paket_sewa`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `penyewa_jasa`
--
ALTER TABLE `penyewa_jasa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `penyewa_makam`
--
ALTER TABLE `penyewa_makam`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_pemakaman`
--
ALTER TABLE `jadwal_pemakaman`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `makam_stok`
--
ALTER TABLE `makam_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paket_sewa`
--
ALTER TABLE `paket_sewa`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
