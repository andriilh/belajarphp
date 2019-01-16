-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2011 at 05:43 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dbsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblguru`
--

CREATE TABLE IF NOT EXISTS `tblguru` (
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` varchar(40) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguru`
--

INSERT INTO `tblguru` (`nip`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `alamat`, `golongan`, `jabatan`, `hp`, `jenis_kelamin`, `agama`, `foto`) VALUES
('1099001', 'M. Multazam, S.Kom', 'Lombok Timur', '1985-04-02', 'Lingsar Lombok Barat', '3B', 'Wakil Kepala Sekolah', '081805727985', 'Laki-Laki', 'Islam', 'foto6.jpg'),
('1099002', 'Burhanudin, M.Pd', 'Mataram', '1980-04-02', 'Kekalik Mataram', '4A', 'Kepala Sekolah', '08199887766', 'Laki-Laki', 'Islam', '89speech.jpg'),
('1099003', 'Indra Septiawan, SE', 'Surabaya', '1979-04-04', 'Mataram', '3A', 'Guru', '085234567', 'Laki-Laki', 'Islam', '22ahmadinejad.jpg'),
('1099004', 'Rina Fitriani, SE', 'Ampenan', '1986-03-04', 'Ampenan Mataram', '2A', 'Guru', '0852987654', 'Laki-Laki', 'Islam', '89sharapova.jpg'),
('1099005', 'Alifia Cindrawasih, S.Pd', 'Praya', '1982-05-03', 'Praya Lombok Tengah', '3A', 'Guru', '0818765432', 'Perempuan', 'Islam', 'alicia5.jpg'),
('1099006', 'Andi Feri Irawan, SE', 'Narmada', '1981-02-06', 'Narmada Lombok Barat', '2C', 'Tata Usaha', '08754329877', 'Laki-Laki', 'Islam', '33federer.jpg'),
('1099007', 'Yuni Ariana', 'Mataram', '1982-04-03', 'Mataram', '3A', 'Guru', '08198765432', 'Perempuan', 'Islam', 'foto10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblmapel`
--

CREATE TABLE IF NOT EXISTS `tblmapel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kdmapel` varchar(5) NOT NULL,
  `nama_mapel` varchar(40) NOT NULL,
  `kkm` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tblmapel`
--

INSERT INTO `tblmapel` (`id`, `kdmapel`, `nama_mapel`, `kkm`) VALUES
(1, 'MP001', 'Pendidikan Kewarganegaraan', 70),
(2, 'MP002', 'Pendidikan Agama', 70),
(3, 'MP003', 'Bahasa Inggris', 70),
(4, 'MP004', 'Bahasa Indonesia', 75),
(5, 'MP005', 'Fisika', 60),
(6, 'MP006', 'Matematika', 60),
(7, 'MP007', 'Biologi', 70),
(10, 'MP008', 'Ekonomi', 70),
(11, 'MP009', 'Sejarah', 75),
(12, 'MP010', 'Akuntansi', 70),
(13, 'MP011', 'Kimia', 60),
(14, 'MP012', 'Pendidikan Jasmani', 75),
(15, 'MP013', 'Bahasa Daerah', 75),
(16, 'MP014', 'Mulok Kerajinan Tangan', 75),
(17, 'MP015', 'Mulok Kesenian', 75);

-- --------------------------------------------------------

--
-- Table structure for table `tblnilai`
--

CREATE TABLE IF NOT EXISTS `tblnilai` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) DEFAULT NULL,
  `idmapel` int(10) DEFAULT NULL,
  `nilai` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

--
-- Dumping data for table `tblnilai`
--

INSERT INTO `tblnilai` (`id`, `nis`, `idmapel`, `nilai`) VALUES
(109, '2011001', 1, 85),
(110, '2011001', 2, 88),
(111, '2011001', 3, 78),
(112, '2011001', 4, 86),
(113, '2011001', 5, 77),
(114, '2011001', 6, 70),
(115, '2011001', 7, 80),
(116, '2011001', 13, 77),
(118, '2011002', 1, 86),
(119, '2011002', 2, 87),
(120, '2011002', 3, 76),
(121, '2011002', 4, 88),
(122, '2011002', 10, 80),
(123, '2011002', 11, 80),
(124, '2011002', 12, 75),
(125, '2011002', 14, 77),
(126, '2011002', 16, 84),
(127, '2011003', 1, 88),
(128, '2011003', 2, 85),
(129, '2011003', 3, 77),
(130, '2011003', 4, 78),
(131, '2011003', 5, 75),
(132, '2011003', 6, 76),
(133, '2011003', 7, 76),
(134, '2011003', 13, 76),
(135, '2011003', 17, 78),
(136, '2011004', 1, 80),
(137, '2011004', 2, 75),
(138, '2011004', 3, 79),
(139, '2011004', 4, 89),
(140, '2011004', 5, 78),
(141, '2011004', 6, 75),
(142, '2011004', 7, 75),
(143, '2011004', 13, 75),
(144, '2011004', 16, 83),
(145, '2011005', 1, 80),
(146, '2011005', 2, 78),
(147, '2011005', 3, 80),
(148, '2011005', 4, 85),
(149, '2011005', 10, 86),
(150, '2011005', 11, 85),
(151, '2011005', 12, 77),
(152, '2011005', 14, 78),
(153, '2011005', 17, 77),
(154, '2011006', 1, 86),
(155, '2011006', 2, 79),
(156, '2011006', 3, 84),
(157, '2011006', 4, 82),
(158, '2011006', 10, 84),
(159, '2011006', 11, 89),
(160, '2011006', 12, 78),
(161, '2011006', 15, 87),
(162, '2011007', 1, 87),
(163, '2011007', 2, 80),
(164, '2011007', 3, 82),
(165, '2011007', 4, 81),
(166, '2011007', 5, 70),
(167, '2011007', 6, 73),
(168, '2011007', 7, 78),
(169, '2011007', 13, 75),
(170, '2011007', 15, 88),
(171, '2011008', 1, 80),
(172, '2011008', 2, 77),
(173, '2011008', 3, 77),
(174, '2011008', 4, 80),
(175, '2011008', 5, 74),
(176, '2011008', 6, 78),
(177, '2011008', 7, 74),
(178, '2011008', 13, 74),
(179, '2011008', 17, 79),
(180, '2011009', 1, 90),
(181, '2011009', 2, 89),
(182, '2011009', 3, 75),
(183, '2011009', 4, 88),
(184, '2011009', 10, 80),
(185, '2011009', 11, 82),
(186, '2011009', 12, 78),
(187, '2011009', 14, 79),
(188, '2011009', 17, 80),
(189, '2011010', 1, 84),
(190, '2011010', 2, 85),
(191, '2011010', 3, 77),
(192, '2011010', 4, 89),
(193, '2011010', 5, 60),
(194, '2011010', 6, 77),
(195, '2011010', 7, 77),
(196, '2011010', 13, 74),
(197, '2011010', 15, 89),
(198, '2011001', 15, 94);

-- --------------------------------------------------------

--
-- Table structure for table `tblsiswa`
--

CREATE TABLE IF NOT EXISTS `tblsiswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(35) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `semester` int(1) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` varchar(40) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsiswa`
--

INSERT INTO `tblsiswa` (`nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kelas`, `semester`, `jenis_kelamin`, `agama`, `foto`) VALUES
('2011001', 'M. Faris Azmi', 'Dasan Baru Kesik', '1995-02-01', 'Dasan Baru Kesik, Masbagik Lombok Timur', 'X', 1, 'Laki-Laki', 'Islam', 'faris.jpg'),
('2011002', 'Alicia', 'Mataram', '1995-02-02', 'Dasan Agung Mataram', 'XI', 2, 'Perempuan', 'Kristen', 'alicia2.jpg'),
('2011003', 'Irvan Bachdim', 'Jakarta', '1994-02-01', 'Jakarta Utara', 'XII', 1, 'Laki-Laki', 'Islam', '1bachdim.jpg'),
('2011004', 'Siti Aminah', 'Praya', '1994-06-17', 'Praya Lombok Tengah', 'XI', 2, 'Perempuan', 'Islam', 'foto3.jpg'),
('2011005', 'Eko Patrio', 'Selong', '1996-08-02', 'Selong Lombok Timur', 'XI', 2, 'Laki-Laki', 'Islam', '17mark_zuckerberg.jpg'),
('2011006', 'Ayu Ningsih', 'Gomong', '1994-04-05', 'Gomong Lama Mataram', 'XI', 2, 'Perempuan', 'Islam', 'alicia4.jpg'),
('2011007', 'Evi Tamala', 'Gerung', '1995-12-02', 'Gerung Lombok Barat', 'X', 2, 'Perempuan', 'Islam', 'campbells.jpg'),
('2011008', 'Luna Maya', 'Mataram', '1994-10-05', 'Ampenan Mataram', 'XI', 2, 'Perempuan', 'Islam', 'lunamaya2.jpg'),
('2011009', 'Putri Maharani', 'Masbagik', '1993-01-09', 'Masbagik Lombok Timur', 'XI', 2, 'Perempuan', 'Islam', 'foto4.jpg'),
('2011010', 'Udin Sedunia', 'Lotim', '1993-04-02', 'Pancor Lombok Timur', 'XI', 2, 'Laki-Laki', 'Islam', '92cristianoronaldo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', '123', 'admin');
