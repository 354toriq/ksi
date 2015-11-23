-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2015 at 02:42 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pkbmksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
`id_absensi` int(11) NOT NULL,
  `id_sekolah` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_sekolah`, `judul`, `tgl_mulai`, `tgl_akhir`, `keterangan`) VALUES
(1, 'SKL0004', 'Absensi Harian', '2015-10-08', '0000-00-00', 'Testing'),
(2, 'KSI0001', 'Absen Pertemuan Pertama', '2015-09-08', '0000-00-00', 'Absen Pertemuan Pertama'),
(3, 'KSI0001', 'Absen Pertemuan Kedua', '2015-10-15', '0000-00-00', 'Absen Pertemuan Kedua'),
(4, 'KSI0001', 'Absensi Pertemuan Ketiga', '2015-10-08', '2015-10-15', 'Oke');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kontak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `email`, `kontak`) VALUES
('admin', 'admin', 'Toriq Pria Dhigfora', 'toriq.354@gmail.com', '089623997382');

-- --------------------------------------------------------

--
-- Table structure for table `detail_absensi`
--

CREATE TABLE IF NOT EXISTS `detail_absensi` (
`id_detail_absensi` int(11) NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `status` enum('H','A','I') NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `detail_absensi`
--

INSERT INTO `detail_absensi` (`id_detail_absensi`, `id_absensi`, `id_siswa`, `status`, `tgl`) VALUES
(11, 4, 'KSI00071500', 'H', '2015-10-08'),
(12, 4, 'KSI000715001', 'H', '2015-10-08'),
(13, 3, 'KSI000715001', 'H', '2015-10-08'),
(14, 2, 'KSI000715001', 'H', '2015-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `id_employer` varchar(100) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jnsklmn` varchar(10) NOT NULL,
  `tgllhr` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `perusahaan` varchar(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id_employer`, `id_perusahaan`, `nama`, `jnsklmn`, `tgllhr`, `alamat`, `foto`, `pendidikan`, `jenjang`, `password`, `email`, `telp`, `jabatan`, `status`, `perusahaan`) VALUES
('EMP1500002', 7, 'Albert', 'Pria', '09-09-2015', 'Sunter', 'FB_IMG_1431966599744.jpg', 'Perguruan Tinggi', 'D3 - Bina Sarana Informatika', '123456', 'aminudin@gmail.com', '1232132', 'Junior Programmer', 'A', 'Baru'),
('EMP1500004', 10, 'Arvin', 'Pria', '04-05-2012', 'Kelapa Gading', '24 jam open.png', 'Perguruan Tinggi', 'Universitas Indonesia', 'oke123', 'arvin@gmail.com', '085777267177', 'Senior Programmer', 'N', ''),
('EMP1500005', 7, 'Fauzi', 'Pria', '09-09-2015', 'Jakarta', '200px-Rockstar_Games_logo.svg.png', 'SMP', 'Universitas Indonesia', 'oke123', 'fauzi@gmail.com', '0896232131213', '', 'N', ''),
('EMP1500006', 11, 'Septian', 'Pria', '09-09-2015', 'Jakarta', '200px-Rockstar_Games_logo.svg.png', 'SMP', 'Universitas Indonesia', 'oke123', 'fauzi@gmail.com', '0896232131213', 'Kepala Divisi Pengkabelan', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_lowongan`
--

CREATE TABLE IF NOT EXISTS `kategori_lowongan` (
`id_kat_lowongan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kategori_lowongan`
--

INSERT INTO `kategori_lowongan` (`id_kat_lowongan`, `nama`) VALUES
(6, 'Project'),
(7, 'Full Time'),
(8, 'Part Time');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
`id_lowongan` int(11) NOT NULL,
  `id_employer` varchar(20) NOT NULL,
  `id_kat_lowongan` int(11) NOT NULL,
  `judul` text NOT NULL,
  `posisi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_posting` varchar(100) NOT NULL,
  `tgl_tutup` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_employer`, `id_kat_lowongan`, `judul`, `posisi`, `deskripsi`, `tgl_posting`, `tgl_tutup`, `status`) VALUES
(5, 'EMP1500002', 7, 'Dibutuhkan Web Developer Evercoss Indonesia', 'Web Developer', '<p>Harus bisa Code Igniter</p>\r\n', '06-09-2015', '06-09-2015', 'Tahan'),
(6, 'EMP1500002', 6, 'Dibutuhkan Web Konten Evercoss Indonesia', 'Web Konten', '<p>The company develop web and desktop applications using Object Oriented Programming language such as PHP, JAVA, and Joomla as the major base.<br />\r\nThe successful candidates are expected to work well with minimal supervision both in a team and independent to produce a very high standard product. Above all else, you must have a positive attitude and willingness to think outside the box.</p>\r\n\r\n<p><strong>Tanggung Jawab Pekerjaan :</strong></p>\r\n\r\n<p>&bull; Design and development of web applications using PHP / Mysql / Joomla</p>\r\n\r\n<p><strong>Persyaratan Pengalaman :</strong></p>\r\n\r\n<p>Min. 3 years experience in PHP and or or Joomla</p>\r\n\r\n<p><strong>Keahlian :</strong></p>\r\n\r\n<p>&ndash; Expert in PHP<br />\r\n&ndash; Strong knowledge of Mysql and Joomla<br />\r\n&ndash; Can code Joomla component</p>\r\n\r\n<p><strong>Kualifikasi :</strong></p>\r\n\r\n<p>&ndash; Male / female<br />\r\n&ndash; Honest and detailed<br />\r\n&ndash; Able to work under minimum supervision independently or in team<br />\r\n&ndash; Able to work with certain target</p>\r\n', '06-09-2015', '06-09-2015', 'Tahan'),
(7, 'EMP1500005', 8, 'Membutuhkan Data Entry Untuk Evercoss', 'Data Entry', '<p><strong>Tanggung Jawab Pekerjaan :</strong></p>\r\n\r\n<p>&ndash; Membuat Data laporan untuk Keuangan<br />\r\n&ndash; Menngisi Data konsumen</p>\r\n\r\n<p><strong>Persyaratan Pengalaman :</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Keahlian :</strong></p>\r\n\r\n<p>&ndash; Menguasai Komputer<br />\r\n&ndash; Menguasai Internet<br />\r\n&ndash; Menguasai Microsoft Office</p>\r\n\r\n<p><strong>Kualifikasi :</strong></p>\r\n\r\n<p>Persyaratan:<br />\r\n&ndash; Lulusan SMA/SMK/Sederajat Segala Jurusan<br />\r\n&ndash; Bisa Mengoperasikan Komputer (Min Ms.Office)<br />\r\n&ndash; Pria / Wanita Usia Minimal 18 &ndash; 42 Tahun<br />\r\n&ndash; Kreatif &amp; Mempunyai Motivasi Tinggi<br />\r\n&ndash; Berpenampilan Menariik Komunikati<br />\r\n&ndash; Pengalaman / Non Pengalaman<br />\r\n&ndash; Boleh berjilbab/berkacamata<br />\r\n&ndash; Bisa Bekerja dalam team<br />\r\n&ndash; Sopan, Elegan &amp; Jujur<br />\r\n&ndash; Displin dalam Kerja</p>\r\n', '16-09-2015', '16-09-2015', 'Terbit');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE IF NOT EXISTS `matpel` (
  `id_matpel` varchar(10) NOT NULL,
  `id_paket` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`id_matpel`, `id_paket`, `nama`, `keterangan`) VALUES
('MP0001', 'PK0001', 'Bahasa Indonesia', 'Pelajaran Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
`id_modul` int(10) NOT NULL,
  `id_matpel` varchar(10) NOT NULL,
  `tgl_upload` varchar(15) NOT NULL,
  `judul` text NOT NULL,
  `file` text NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `id_matpel`, `tgl_upload`, `judul`, `file`, `video`) VALUES
(1, 'MP0001', '19/09/15', 'Unsur Intrinsik Cerita Pendek (Cerpen)', 'bindo.pdf', 'Y2DT6-gmSrE'),
(2, 'MP0001', '03/10/15', 'Disdsa', '03.a.DOKUMEN-PENGADAAN-ATK.doc', 'xczxcxz');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_soal`
--

CREATE TABLE IF NOT EXISTS `nilai_soal` (
`id_nilai` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `benar` int(11) NOT NULL,
  `kosong` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nilai_soal`
--

INSERT INTO `nilai_soal` (`id_nilai`, `id_modul`, `id_siswa`, `nilai`, `salah`, `benar`, `kosong`, `tgl`) VALUES
(1, 1, '0', 40, 3, 2, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id_paket` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama`, `keterangan`) VALUES
('PK0001', 'Paket A', 'Untuk meneruskan SD'),
('PK0002', 'Paket B', 'Meneruskan SMP');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE IF NOT EXISTS `pelamar` (
`id` int(11) NOT NULL,
  `id_penjab` varchar(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_lowongan` varchar(2) NOT NULL,
  `status` varchar(1) NOT NULL,
  `tgl_lamar` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `id_penjab`, `id_siswa`, `id_lowongan`, `status`, `tgl_lamar`) VALUES
(74, 'PJ0001', 'KSI000515002', '6', '1', '15/09/10'),
(75, 'PJ0001', 'KSI000515001', '6', '1', '15/09/10'),
(76, 'PJ0001', 'KSI000515004', '6', '1', '15/09/10'),
(77, 'PJ0001', 'KSI000515003', '6', '1', '15/09/10'),
(78, 'PJ0001', 'KSI000515005', '6', '1', '15/09/10'),
(79, 'PJ0001', 'KSI000515007', '6', '1', '15/09/10'),
(80, 'PJ0001', 'KSI000515008', '6', '1', '15/09/10'),
(81, 'PJ0004', 'SKL000415001', '6', '1', '15/09/11'),
(82, 'PJ0001', 'KSI000515006', '6', '1', '15/09/12'),
(83, 'PJ0002', 'KSI000715001', '6', '1', '15/09/12');

-- --------------------------------------------------------

--
-- Table structure for table `penjab`
--

CREATE TABLE IF NOT EXISTS `penjab` (
  `id_penjab` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jnsklmn` varchar(15) NOT NULL,
  `tmp_lhr` varchar(50) NOT NULL,
  `tgl_lhr` varchar(15) NOT NULL,
  `pdkn` varchar(10) NOT NULL,
  `jenjang` text NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjab`
--

INSERT INTO `penjab` (`id_penjab`, `nama`, `jnsklmn`, `tmp_lhr`, `tgl_lhr`, `pdkn`, `jenjang`, `kontak`, `prov`, `kota`, `alamat`, `email`, `password`, `foto`) VALUES
('PJ0002', 'Elsi Shim Shimi', 'Wanita', 'Palembang', '17-08-2015', 'SMA/SMK', 'SMK PGRI 3 Palembang - RPL', '0892131213123', 'Sumatera Barat', 'Palembang', 'Palembang', 'elsi@gmail.com', 'oke123', 'FB_IMG_1433095987008.jpg'),
('PJ0004', 'Drs. H. Sudarmani', 'Pria', 'Malang', '01-05-1959', 'Sarjana', 'Universitas Indonesia', '085777267177', 'Malang Barat', 'Batu', 'Pandan', 'sudarmani@gmail.com', 'oke45', '307211_288349794528394_2096808417_n.jpg'),
('PJ15005', 'Abdul Muhyi', 'Pria', 'Malang', '31-08-2015', 'Sarjana', 'Universitas Indonesia', '085777267177', 'Jakarta Utara', 'Jakarta', 'sdadsdasdsa', 'connor.kenway@gmail.com', 'kenway', 'TheWeb.png');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
`id_perusahaan` int(10) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `negara_perusahaan` varchar(100) NOT NULL,
  `provinsi_perusahaan` varchar(100) NOT NULL,
  `email_perusahaan` varchar(100) NOT NULL,
  `kontak_perusahaan` text NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `website` text NOT NULL,
  `desk_perusahaan` text NOT NULL,
  `logo` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `negara_perusahaan`, `provinsi_perusahaan`, `email_perusahaan`, `kontak_perusahaan`, `alamat_perusahaan`, `website`, `desk_perusahaan`, `logo`, `status`) VALUES
(7, 'Evercoss Indonesia', 'Indonesia', 'jakarta utara', 'admin@evercoss.com', '081231248549', 'Sunter', 'evercoss.com', 'sdsadassad\r\n', '', 0),
(11, 'PT. Aman selamat lancar barokah', 'Indonesia', 'Jawa Timur', 'aslabar@aslabar.com', '081231248549', 'Jawa Timur', 'aslabar.com', 'Perusahaan yang bergerak dibidang kesejahteraan manusian', '', 0),
(10, 'Evercoss Indonesia', 'Indonesia', 'Jakarta Utara', 'hrd@evercoss.com', '02312213213', 'Sunter', 'evercoss.com', 'sdadsaadsa', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
  `id_sekolah` varchar(10) NOT NULL,
  `id_penjab` varchar(10) NOT NULL,
  `nama` text NOT NULL,
  `prov` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tgl_berdiri` varchar(15) NOT NULL,
  `Alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `id_penjab`, `nama`, `prov`, `kota`, `tgl_berdiri`, `Alamat`, `telp`) VALUES
('KSI0001', 'PJ0002', 'Al-Asoy', 'Sumatera Barat', 'Palembang', '02-09-2015', 'Palembang\r\n', '085777267177'),
('KSI0005', 'PJ15005', 'Al-Muflihun Sunter', 'Jakarta Pusat', 'Jakarta', '02-04-2015', 'Jakarta', '089623993782'),
('SKL0004', 'PJ0004', 'Afham Kaiyisah Pandan', 'Jawa Timur', 'Batu', '26-01-1999', 'Pandan', '08555555555555');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` varchar(20) NOT NULL,
  `id_sekolah` varchar(20) NOT NULL,
  `id_paket` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jnsklmn` varchar(15) NOT NULL,
  `tmp_lhr` varchar(50) NOT NULL,
  `tgl_lhr` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `pdkn` varchar(10) NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `thn_lulus` varchar(7) NOT NULL,
  `no_ijasah` varchar(20) NOT NULL,
  `no_skhun` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `foto_ijasah` text NOT NULL,
  `foto_skhun` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_sekolah`, `id_paket`, `nama`, `jnsklmn`, `tmp_lhr`, `tgl_lhr`, `agama`, `nama_ortu`, `pdkn`, `jenjang`, `thn_lulus`, `no_ijasah`, `no_skhun`, `foto`, `foto_ijasah`, `foto_skhun`, `email`, `prov`, `kota`, `telp`, `alamat`, `password`) VALUES
('KSI000515002', 'KSI0005', 'PK0001', 'Andi Angga', 'Pria', 'Jakarta', '28-07-1995', 'Islam', 'Haruka', 'SMP', 'SMP 01 Jakarta - Kelas 3', '2010', '1231232', '32131232', 'call_of_duty_modern_warfare_3_by_stiannius-d3g8llx.jpg', '', '', 'aminudin@gmail.com', 'Jakarta Utara', 'Sunter', '085777267177', '', '123456'),
('KSI000515009', 'KSI0001', 'PK0001', 'testing', 'Pria', 'Jakarta', '28-07-2015', 'Katolik', 'Haruka', 'SD', 'SMP 01 Jakarta - Kelas 3', '2010', '1231232', '32131232', '', '', '', 'connor.kenway@gmail.com', 'Jakarta Utara', 'Jakarta', '085777267177', '', 'kenway'),
('KSI000715001', 'KSI0001', 'PK0001', 'Niko Aditya', 'Pria', 'Jakarta', '01-02-1990', 'Islam', 'xxxxxxxxx', 'SD', 'xxxxxxxxxx', 'xxxxxxx', 'xxxxxxxxx', 'xxxxxxxxx', 'grand-theft-auto-v-15691-1366x768.jpg', '', '', 'connor.kenway@gmail.com', 'Jakarta Utara', 'Jakarta', '089623132', '', 'kenway'),
('SKL000415001', 'SKL0004', 'PK0001', 'Hanna Anggraeni', 'Pria', 'Jakarta', '01-02-1990', 'Islam', 'Haruka', 'SD', 'SMP 01 Jakarta - Kelas 3', 'sdsadsa', '1231232', '32131232', 'ACU_hero.jpg', '', '', 'connor.kenway@gmail.com', 'Jakarta Utara', 'Jakarta', '085777267177', '', 'kenway');

-- --------------------------------------------------------

--
-- Table structure for table `soal_modul`
--

CREATE TABLE IF NOT EXISTS `soal_modul` (
`id_soal_modul` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `soal` text NOT NULL,
  `no` int(11) NOT NULL,
  `pa` text NOT NULL,
  `pb` text NOT NULL,
  `pc` text NOT NULL,
  `pd` text NOT NULL,
  `kunci` char(1) NOT NULL,
  `tgl` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `soal_modul`
--

INSERT INTO `soal_modul` (`id_soal_modul`, `id_modul`, `soal`, `no`, `pa`, `pb`, `pc`, `pd`, `kunci`, `tgl`) VALUES
(3, 1, '<p>Penyebab kecelakaan lalu lintas di jalan raya terutama kesalahan para pengemudi biasa kurang sabar. Mereka sering mengebut dan ingin mendahului. Mengantuk juga sering menjadi penyebab kecelakaan. Jarak yang ditempuh kendaraan terlalu jauh akan mengakibatkan sopir lelah dan mengantuk sehingga mudah tabrakan dengan kendaraan lain.<br />\r\nKalimat tanggapan yang sesuai dengan isi paragraf tersebut adalah&hellip;..</p>\r\n', 1, 'asdsadsa', 'dsadas', 'sadsa', 'sadasd', 'A', '20-09-2015'),
(4, 1, '<p>Penyebab kecelakaan lalu lintas di jalan raya terutama kesalahan para pengemudi biasa kurang sabar. Mereka sering mengebut dan ingin mendahului. Mengantuk juga sering menjadi penyebab kecelakaan. Jarak yang ditempuh kendaraan terlalu jauh akan mengakibatkan sopir lelah dan mengantuk sehingga mudah tabrakan dengan kendaraan lain.<br />\r\nKalimat tanggapan yang sesuai dengan isi paragraf tersebut adalah&hellip;..</p>\r\n', 4, 'denjaka', 'kopassus', 'taifib', 'xcxcxcxcxcxcx', 'D', '20-09-2015'),
(5, 1, '<p>Siapa yang jomblo ?&nbsp;</p>\r\n', 3, 'Aku', 'Saya', 'Diriku', 'semua benar', 'D', '20-09-2015'),
(22, 1, 'ahhahahahahahah', 5, 'shadhsashda', 'xzcxzzxc', 'weqweqw', 'qwewqert', 'B', '26-09-2015'),
(23, 1, 'xxxxxxxxxxxxxxxx', 6, 'xxxxxxxxxx', 'xxxxxxxxx', 'xxxxxxx', 'xxxxxxxxxx', 'A', '26-09-2015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
 ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
 ADD PRIMARY KEY (`id_detail_absensi`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
 ADD PRIMARY KEY (`id_employer`);

--
-- Indexes for table `kategori_lowongan`
--
ALTER TABLE `kategori_lowongan`
 ADD PRIMARY KEY (`id_kat_lowongan`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
 ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
 ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
 ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `nilai_soal`
--
ALTER TABLE `nilai_soal`
 ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
 ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjab`
--
ALTER TABLE `penjab`
 ADD PRIMARY KEY (`id_penjab`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
 ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
 ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `soal_modul`
--
ALTER TABLE `soal_modul`
 ADD PRIMARY KEY (`id_soal_modul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
MODIFY `id_detail_absensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kategori_lowongan`
--
ALTER TABLE `kategori_lowongan`
MODIFY `id_kat_lowongan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nilai_soal`
--
ALTER TABLE `nilai_soal`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
MODIFY `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `soal_modul`
--
ALTER TABLE `soal_modul`
MODIFY `id_soal_modul` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
