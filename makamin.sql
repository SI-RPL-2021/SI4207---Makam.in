-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 12:29 AM
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
  `nomor` int(20) NOT NULL,
  `pemilik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `merek`, `nomor`, `pemilik`) VALUES
(1, 'Bank BCA', 789876543, 'Makamin ID'),
(2, 'Bank BRI', 1238468167, 'Makamin ID');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pemakaman`
--

CREATE TABLE `jadwal_pemakaman` (
  `id_jadwal` int(11) NOT NULL,
  `id_makam` int(11) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pemakaman`
--

INSERT INTO `jadwal_pemakaman` (`id_jadwal`, `id_makam`, `blok`, `jam`) VALUES
(1, 2, 'AA.I', '07:00 - 08:00'),
(2, 2, 'AA.II', '07:00 - 08:00'),
(3, 2, 'AA.I', '08:00 - 09:00');

-- --------------------------------------------------------

--
-- Table structure for table `makam`
--

CREATE TABLE `makam` (
  `id_makam` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `gbr_nama` varchar(255) NOT NULL,
  `gbr_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makam`
--

INSERT INTO `makam` (`id_makam`, `nama`, `alamat`, `kota`, `kecamatan`, `kode_pos`, `gbr_nama`, `gbr_ukuran`) VALUES
(1, 'TPU Pondok Ranggon', 'Jl. TPU Pondok Ranggon', 'Jakarta Timur', 'Cipayung', 13860, 'ranggon.png', 0),
(2, 'TPU Tegal ALur', 'Jl. Benda Raya, Tegal Alur,', 'Jakarta Barat', 'Kalideres', 11810, 'tegal.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `makam_stok`
--

CREATE TABLE `makam_stok` (
  `id_stok` int(11) NOT NULL,
  `id_makam` int(11) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makam_stok`
--

INSERT INTO `makam_stok` (`id_stok`, `id_makam`, `blok`, `harga`, `stok`) VALUES
(1, 1, 'AA.I', 100000, 0),
(2, 1, 'AA.II', 60000, 0),
(3, 2, 'AA.I', 100000, 100),
(4, 2, 'AA.II', 60000, 100);

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

--
-- Dumping data for table `paket_sewa`
--

INSERT INTO `paket_sewa` (`id_paket`, `nama_paket`, `deskripsi`, `jumlah`) VALUES
(1, 'Satuan', 'per kavling', 1),
(2, 'Pasangan', 'dua kavling', 2),
(3, 'Trio', 'tiga kavling', 3),
(4, 'Empat', 'empat kavling', 4),
(5, 'Keluarga', 'lima kavling', 5);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa_jasa`
--

CREATE TABLE `penyewa_jasa` (
  `id_sewa` varchar(11) NOT NULL,
  `verif` varchar(4) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_makam` int(11) NOT NULL,
  `nama_makam` varchar(100) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `nama_nisan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jumlah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa_jasa`
--

INSERT INTO `penyewa_jasa` (`id_sewa`, `verif`, `id_user`, `id_makam`, `nama_makam`, `blok`, `nama_nisan`, `nama`, `telp`, `email`, `jumlah`) VALUES
('CdI2wDW34zR', 'wait', '4IirdwJhV1h', 1, 'TPU Pondok Ranggon', 'AA.I', 'laksdj', 'laskdjlk', 85721, 'asldkj@alsdjk.com', 1),
('E7XfQumNbSR', 'wait', 'Kj3mI6B5Zgt', 1, 'TPU Pondok Ranggon', 'AA.I', 'gkjgkj', 'hkjhjk', 87585, 'ai@ai.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa_makam`
--

CREATE TABLE `penyewa_makam` (
  `id_sewa` varchar(11) NOT NULL,
  `verif` varchar(4) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_makam` int(11) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `gbr_smb` varchar(255) NOT NULL,
  `gbr_kk_ktp` varchar(255) NOT NULL,
  `gbr_sk` varchar(255) NOT NULL,
  `gbr_kk_ktp_jenazah` varchar(255) NOT NULL,
  `gbr_sk_instansi` varchar(255) NOT NULL,
  `gbr_sk_lokal` varchar(255) NOT NULL,
  `gbr_sp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa_makam`
--

INSERT INTO `penyewa_makam` (`id_sewa`, `verif`, `id_user`, `id_makam`, `blok`, `jumlah`, `jam`, `nama`, `telp`, `email`, `alamat`, `catatan`, `gbr_smb`, `gbr_kk_ktp`, `gbr_sk`, `gbr_kk_ktp_jenazah`, `gbr_sk_instansi`, `gbr_sk_lokal`, `gbr_sp`) VALUES
('Wa0WoNg3tqI', 'wait', 'Kj3mI6B5Zgt', 2, 'AA.I', 1, '07:00 - 08:00', 'alskdaj', 91238, 'aosdh@asdioh.com', 'askldjak', 'ajskdb', 'meta-chart.png', 'meta-chart.png', 'meta-chart.png', 'meta-chart.png', 'meta-chart.png|', 'meta-chart.png', 'meta-chart.png|meta-chart.png|'),
('Yi8HLYzxeib', 'wait', '4IirdwJhV1h', 2, 'AA.I', 1, '07:00 - 08:00', 'aksjdla', 918273, 'laksdj@alksjd.com', 'alskjdlka', 'laksdj', 'meta-chart.png', 'meta-chart.png', 'meta-chart.png', 'meta-chart.png', 'meta-chart.png|', 'meta-chart.png', 'meta-chart.png|meta-chart.png|');

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
  `telp` int(12) NOT NULL,
  `unit` int(2) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `pajak` int(50) NOT NULL,
  `metode_bayar` varchar(20) NOT NULL,
  `resi_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_sewa`, `id_renew`, `verif`, `paid`, `tipe`, `nama`, `email`, `telp`, `unit`, `deskripsi`, `total`, `pajak`, `metode_bayar`, `resi_transfer`) VALUES
('', '4IirdwJhV1h', 'Yi8HLYzxeib', 'kx2lkPK8hXR', 'no', 'wait', 'lahan', 'aksjdla', 'laksdj@alksjd.com', 918273, 1, 'renew lahan', 109500000, 0, '', ''),
('8TYfEGzmxV4', 'Kj3mI6B5Zgt', 'E7XfQumNbSR', '', '', 'wait', 'jasa', 'hkjhjk', 'ai@ai.com', 87585, 1, '', 3000000, 0, '', ''),
('iLWqoudou4H', '4IirdwJhV1h', 'Yi8HLYzxeib', '', 'no', 'wait', 'lahan', 'aksjdla', 'laksdj@alksjd.com', 918273, 1, 'laksdj', 109500000, 0, '', ''),
('SHBhazfOtPC', '4IirdwJhV1h', 'CdI2wDW34zR', '', '', 'wait', 'jasa', 'laskdjlk', 'asldkj@alsdjk.com', 85721, 1, '', 3000000, 0, '', ''),
('xftHs9HSdgt', 'Kj3mI6B5Zgt', 'Wa0WoNg3tqI', '', 'no', 'yes', 'lahan', 'alskdaj', 'aosdh@asdioh.com', 91238, 1, 'ajskdb', 109500000, 0, 'Bank BCA', 'meta-chart.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` int(12) NOT NULL,
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
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `status`, `email`, `telp`, `password`, `verif`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `kawin`, `alamat`, `negara`, `gender`, `agama`, `pekerjaan`) VALUES
('1', 'admin', 'admin', 0, '21232f297a57a5a743894a0e4a801fc3', 'yes', 'admin', '0000000000000000', 'admin', '2021-04-24', 'admin', 'admin', 'Indonesia', 'admin', 'admin', 'admin'),
('4IirdwJhV1h', 'user', 'ai@ai.com', 2147483647, '4921c0e2d1f6005abe1f9ec2e2041909', 'yes', 'ai', '8586586', 'ai', '0809-09-09', 'Belum Kawin', 'Disana', 'Indonesia', 'Pria', 'Islam', 'ai');

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
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_pemakaman`
--
ALTER TABLE `jadwal_pemakaman`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `makam`
--
ALTER TABLE `makam`
  MODIFY `id_makam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `makam_stok`
--
ALTER TABLE `makam_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paket_sewa`
--
ALTER TABLE `paket_sewa`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
