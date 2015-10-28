-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 01:45 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_sekolah`, `judul`, `tgl_mulai`, `tgl_akhir`, `keterangan`) VALUES
(5, 'KSI001', 'Absensi Pertemuan Tanggal 13', '2015-10-13', '2015-10-13', 'Absensi Pertama Testing'),
(6, 'KSI001', 'pertemuan pertama', '2015-10-15', '2015-10-16', 'testing');

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
('admin', 'aslamabar', 'Toriq Pria Dhigfora', 'toriq.354@gmail.com', '089623997382');

-- --------------------------------------------------------

--
-- Table structure for table `detail_absensi`
--

CREATE TABLE IF NOT EXISTS `detail_absensi` (
`id_detail_absensi` int(11) NOT NULL,
  `id_absensi` int(11) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `status` enum('H','A','I','S') NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `detail_absensi`
--

INSERT INTO `detail_absensi` (`id_detail_absensi`, `id_absensi`, `id_siswa`, `status`, `tgl`) VALUES
(21, 5, 'KSI00115002', 'H', '2015-10-14'),
(22, 5, 'KSI00115001', 'H', '2015-10-20');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id_employer`, `id_perusahaan`, `nama`, `jnsklmn`, `tgllhr`, `alamat`, `foto`, `pendidikan`, `jenjang`, `password`, `email`, `telp`, `jabatan`, `status`, `perusahaan`) VALUES
('EMP1500002', 7, 'Albert', 'Pria', '09-09-2015', 'sdasdsad', '1rjk5gd7.jpg', 'Perguruan Tinggi', 'D3 - Bina Sarana Informatika', '123456', 'aminudin@gmail.com', '1232132', 'Junior Programmer', '', ''),
('', 0, 'sdasdsasadassa', 'asdsdassa', '', '', '', '', '', '', '', '', '', '', ''),
('EMP1500003', 0, 'Reynaldi Dwi Setiawan', 'Pria', '30-09-2015', 'Jakarta', '', '', '', 'oke123', 'reynaldi@gmail.com', '081231221312', '', '', '');

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
(1, 'Web Developer'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `id_employer`, `id_kat_lowongan`, `judul`, `posisi`, `deskripsi`, `tgl_posting`, `tgl_tutup`, `status`) VALUES
(5, 'EMP1500002', 7, 'Dibutuhkan Web Developer Evercoss Indonesia', 'Web Developer', '<p>Harus bisa Code Igniter</p>\r\n', '06-09-2015', '06-09-2015', 'Tahan'),
(6, 'EMP1500002', 8, 'Dibutuhkan Web Konten Evercoss Indonesia', 'Web Konten', '<p>The company develop web and desktop applications using Object Oriented Programming language such as PHP, JAVA, and Joomla as the major base.<br />\r\nThe successful candidates are expected to work well with minimal supervision both in a team and independent to produce a very high standard product. Above all else, you must have a positive attitude and willingness to think outside the box.</p>\r\n\r\n<p><strong>Tanggung Jawab Pekerjaan :</strong></p>\r\n\r\n<p>&bull; Design and development of web applications using PHP / Mysql / Joomla</p>\r\n\r\n<p><strong>Persyaratan Pengalaman :</strong></p>\r\n\r\n<p>Min. 3 years experience in PHP and or or Joomla</p>\r\n\r\n<p><strong>Keahlian :</strong></p>\r\n\r\n<p>&ndash; Expert in PHP<br />\r\n&ndash; Strong knowledge of Mysql and Joomla<br />\r\n&ndash; Can code Joomla component</p>\r\n\r\n<p><strong>Kualifikasi :</strong></p>\r\n\r\n<p>&ndash; Male / female<br />\r\n&ndash; Honest and detailed<br />\r\n&ndash; Able to work under minimum supervision independently or in team<br />\r\n&ndash; Able to work with certain target</p>\r\n', '06-09-2015', '06-09-2015', 'Terbit');

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
('MP0001', 'PK0001', 'BAHASA INDONESIA', 'BAHASA INDONESIA UNTUK SD'),
('MP0002', 'PK0001', 'MATEMATIKA', 'MATEMATIKA UNTUK SD'),
('MP0003', 'PK0001', 'ILMU PENGETAHUAN ALAM', 'IPA UNTUK SD'),
('MP0004', 'PK0001', 'ILMU PENGETAHUAN SOSIAL', 'IPS UNTUK SD'),
('MP0005', 'PK0001', 'PENDIDIKAN KEWARGANEGARAAN', 'PKN UNTUK SD'),
('MP0006', 'PK0002', 'BAHASA INDONESIA', 'BAHASA INDONESIA UNTUK SMP'),
('MP0007', 'PK0002', 'BAHASA INGGRIS', 'BAHASA INGGRIS UNTUK SMP'),
('MP0008', 'PK0002', 'MATEMATIKA', 'MATEMATIKA UNTUK SMP'),
('MP0009', 'PK0002', 'ILMU PENGETAHUAN ALAM', 'IPA UNTUK SMP'),
('MP0010', 'PK0002', 'ILMU PENGETAHUAN SOSIAL', 'IPS UNTUK SMP'),
('MP0011', 'PK0002', 'PENDIDIKAN KEWARGANEGARAAN', 'PKN UNTUK SMP'),
('MP0012', 'PK0003', 'BAHASA INDONESIA', 'BAHASA INDONESIA UNTUK SMA IPA'),
('MP0013', 'PK0003', 'BAHASA INGGRIS', 'BAHASA INGGRIS UNTUK SMA IPA'),
('MP0014', 'PK0003', 'MATEMATIKA', 'MATEMATIKA UNTUK SMA IPA'),
('MP0015', 'PK0003', 'FISIKA', 'FISIKA UNTUK SMA IPA'),
('MP0016', 'PK0003', 'KIMIA', 'KIMIA UNTUK SMA IPA'),
('MP0017', 'PK0003', 'BIOLOGI', 'BIOLOGI UNTUK SMA IPA'),
('MP0018', 'PK0003', 'PENDIDIKAN KEWARGANEGARAAN', 'PKN UNTUK SMA IPA'),
('MP0019', 'PK0004', 'BAHASA INDONESIA', 'BAHASA INDONESIA UNTUK SMA IPS'),
('MP0020', 'PK0004', 'BAHASA INGGRIS', 'BAHASA INGGRIS UNTUK SMA IPS'),
('MP0021', 'PK0004', 'MATEMATIKA', 'MATEMATIKA UNTUK SMA IPS'),
('MP0022', 'PK0004', 'EKONOMI', 'EKONOMI UNTUK SMA IPS'),
('MP0023', 'PK0004', 'GEOGRAFI', 'GEOGRAFI UNTUK SMA IPS'),
('MP0024', 'PK0004', 'SOSIOLOGI', 'SOSIOLOGI UNTUK SMA IPS'),
('MP0025', 'PK0004', 'PENDIDIKAN KEWARGANEGARAAN', 'PKN UNTUK SMA IPS');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `id_matpel`, `tgl_upload`, `judul`, `file`, `video`) VALUES
(6, 'MP0006', '08/09/15', 'BAHASA INDONESIA', 'Bhs.Indo pkt B 26.pdf', ''),
(7, 'MP0007', '08/09/15', 'BAHASA INGGRIS', 'B. Inggris PKT B 26.pdf', ''),
(8, 'MP0008', '08/09/15', 'MATEMATIKA', 'Matematika PKT B 26.pdf', ''),
(9, 'MP0009', '08/09/15', 'ILMU PENGETAHUAN ALAM', 'IPA PKT B 26.pdf', ''),
(10, 'MP0010', '08/09/15', 'ILMU PENGETAHUAN SOSIAL', 'IPS PKT B 26.pdf', ''),
(11, 'MP0011', '08/09/15', 'PENDIDIKAN KEWARGANEGARAAN', 'PKN.pdf', ''),
(12, 'MP0012', '08/09/15', 'BAHASA INDONESIA', 'Paket C Bahasa Indonesia 28.pdf', ''),
(13, 'MP0013', '08/09/15', 'BAHASA INGGRIS', 'Paket C B. Inggris 28.pdf', ''),
(14, 'MP0014', '08/09/15', 'MATEMATIKA', 'Matematika PKT C 28.pdf', ''),
(15, 'MP0018', '08/09/15', 'PENDIDIKAN KEWARGANEGARAAN', 'Pkn  Paket C 28.pdf', ''),
(16, 'MP0019', '08/09/15', 'BAHASA INDONESIA', 'Paket C Bahasa Indonesia 28.pdf', ''),
(17, 'MP0020', '08/09/15', 'BAHASA INGGRIS', 'Paket C B. Inggris 28.pdf', ''),
(18, 'MP0021', '08/09/15', 'MATEMATIKA', 'Matematika PKT C 28.pdf', ''),
(19, 'MP0022', '08/09/15', 'EKONOMI', 'Paket C Ekonomi 28.pdf', ''),
(20, 'MP0023', '08/09/15', 'GEOGRAFI', 'Geografi paket C 28.pdf', ''),
(21, 'MP0024', '08/09/15', 'SOSIOLOGI', 'Sosiologi Paket C 28.pdf', ''),
(22, 'MP0025', '08/09/15', 'PENDIDIKAN KEWARGANEGARAAN', 'Pkn  Paket C 28.pdf', ''),
(26, 'MP0001', '06/10/15', 'Latihan UN Bahasa Indonesia 2013', 'latihan-un-sd-mi-2013-B-Indo.pdf', '26'),
(27, 'MP0002', '06/10/15', 'Latihan UN Matematika 2013', 'latihan-un-sd-mi-2013-Mtk.pdf', '27'),
(28, 'MP0003', '06/10/15', 'Latihan UN IPA 2013', 'latihan-un-sd-mi-2013-Ipa.pdf', '28'),
(29, 'MP0015', '06/10/15', 'Latihan UN Fisika ', 'latihan-un-sma-fisika.pdf', '29'),
(30, 'MP0016', '06/10/15', 'Latihan UN Kimia', 'latihan-un-sma-kimia.pdf', '30'),
(31, 'MP0017', '06/10/15', 'Latihan UN Biologi', 'latihan-un-sma-biologi.pdf', '31'),
(32, 'MP0002', '06/10/15', 'Soal UN Matematika 2013', 'soal-un-matematika-sd-p1-2013.pdf', '32'),
(33, 'MP0003', '06/10/15', 'Soal UN IPA 2013 ', 'soal-un-ipa-sd-p1-2013.pdf', '33'),
(34, 'MP0020', '07/10/15', 'Latihan UN Bahasa Inggris', 'latihan-un-sma-b-inggris.pdf', '34'),
(35, 'MP0019', '07/10/15', 'Latihan UN Bahasa Indonesia 2013', 'lt-soal-indo-un-sma-ipa-ips-keagamaan-2013 (1).pdf', '35'),
(36, 'MP0021', '07/10/15', 'Latihan UN Matematika 2013', 'lt-soal-mtk-un-sma-2013-ips-keagamaan.pdf', '36'),
(37, 'MP0022', '07/10/15', 'Latihan UN Ekonomi', 'latihan-un-sma-ekonomi.pdf', '37'),
(38, 'MP0023', '07/10/15', 'Latihan UN Geografi', 'latihan-un-sma-geografi.pdf', '38'),
(39, 'MP0024', '07/10/15', 'Latihan UN Sosiologi', 'latihan-un-sma-sosiologi.pdf', '39'),
(40, 'MP0006', '07/10/15', 'Latihan UN Bahasa Indonesia 2013', 'lt-soal-indo-un-smp-2013-1.pdf', '40'),
(41, 'MP0007', '07/10/15', 'Latihan UN Bahasa Inggris', 'lt-soal-ingg-un-smp.pdf', '40'),
(42, 'MP0008', '07/10/15', 'Latihan UN Matematika', 'lt-soal-mtk-un-smp.pdf', '42'),
(43, 'MP0009', '07/10/15', 'Latihan UN IPA', 'lt-soal-ipa-un-smp.pdf', '43'),
(44, 'MP0014', '07/10/15', 'Latihan UN Matematika 2013', 'lt-soal-mtk-un-sma-2013-Ipa.pdf', '44'),
(45, 'MP0024', '07/10/15', 'Soal UN Sosiologi 2013', 'soal-un-sosiologi-sma-ips-2013-kode-sosiologi_ips_sa_37.pdf', '45'),
(46, 'MP0021', '07/10/15', 'Soal UN Matematika Program IPS 2013', 'soal-un-matematika-ips-2013-kode-mtk_ips_sa_54.pdf', '46'),
(47, 'MP0023', '07/10/15', 'Soal UN Geografi 2013', 'soal-un-geografi-sma-ips-2013-kode-geo_ips_sa_76.pdf', '47'),
(48, 'MP0014', '07/10/15', 'Pembahasan UN Matematika Program IPA 2014', 'Pembahasan Soal UN Matematika Program IPA SMA 2014 Paket 1 (Full Version).pdf', '48'),
(49, 'MP0013', '07/10/15', 'Latihan UN Bahasa Inggris ', 'latihan-un-sma-b-inggris.pdf', '49'),
(50, 'MP0012', '07/10/15', 'Latihan UN Bahasa Indonesia 2013', 'lt-soal-indo-un-sma-ipa-ips-keagamaan-2013 (1).pdf', '50'),
(51, 'MP0025', '07/10/15', 'Ringkasan Materi PKN', 'Ringkasan Materi PKn.pdf', '51'),
(52, 'MP0022', '07/10/15', 'Ringkasan Materi Ekonomi', 'Ringkasan Materi Ekonomi.pdf', '52'),
(53, 'MP0020', '07/10/15', 'Ringkasan Materi Bahasa Inggris', 'Ringkasan Materi Bahasa Inggris.pdf', '53'),
(54, 'MP0021', '07/10/15', 'Ringkasan Materi Matematika', 'Ringkasan Materi Matematik.pdf', '54'),
(55, 'MP0023', '07/10/15', 'Ringkasan Materi Geografi', 'Ringkasan Materi Geografi.pdf', '55'),
(56, 'MP0024', '07/10/15', 'Ringkasan Materi Sosiologi', 'Ringkasan Materi Sosiologi.pdf', '56'),
(57, 'MP0025', '08/10/15', 'Buku Modul PKN Kelas 10', 'PKN-10-Rima.pdf', '57'),
(58, 'MP0025', '08/10/15', 'Buku Modul PKN Kelas 11', 'PKN-11-Rima.pdf', '58'),
(59, 'MP0021', '08/10/15', 'Pembahasan UN Matematika Program IPS 2014', 'Pembahasan Soal UN Matematika Program IPS SMA 2014 Paket 1 (Full Version).pdf', '59'),
(60, 'MP0018', '08/10/15', 'Ringkasan Materi PKN', 'Ringkasan Materi PKn.pdf', '60'),
(61, 'MP0014', '08/10/15', 'Ringkasan Materi Matematika', 'Ringkasan Materi Matematik.pdf', '61'),
(62, 'MP0013', '08/10/15', 'Ringkasan Materi Bahasa Inggris', 'Ringkasan Materi Bahasa Inggris.pdf', '62'),
(63, 'MP0018', '08/10/15', 'Buku Modul PKN Kelas 10', 'PKN-10-Rima.pdf', '63'),
(64, 'MP0018', '08/10/15', 'Buku Modul PKN Kelas 11', 'PKN-11-Rima.pdf', '64'),
(67, 'MP0021', '08/10/15', 'Buku Modul Matematika Program IPS Kelas 11', 'Khazanah Matematika (IPS)-11-Rosihan.pdf', '65'),
(68, 'MP0022', '08/10/15', 'Buku Modul Ekonomi Kelas 12', 'Ekonomi Kelas XII.pdf', '68'),
(70, 'MP0022', '08/10/15', 'Buku Modul Ekonomi Kelas 11', 'Ekonomi Kelas XI.pdf', '69'),
(71, 'MP0022', '08/10/15', 'Buku Modul Ekonomi Kelas 10', 'Ekonomi Kelas X.pdf', '70');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
('PK0001', 'Paket A', 'KESETARAAN SD'),
('PK0002', 'Paket B', 'KESETARAAN SMP'),
('PK0003', 'Paket C IPA', 'KESETARAAN SMA IPA'),
('PK0004', 'Paket C IPS', 'Kesetaraan SMA IPS');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `id_penjab`, `id_siswa`, `id_lowongan`, `status`, `tgl_lamar`) VALUES
(86, 'PJ0001', 'KSI00115003', '6', '1', '15/09/12'),
(87, 'PJ0001', 'KSI00115016', '6', '1', '15/09/12');

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
('PJ001', 'Dedy Prihatin', 'Pria', 'Jakarta', '08-10-1975', 'Perguruan ', 'UPN jakarta', '082110887887', 'JAKARTA', 'JAKARTA BARAT', 'JL. FAJAR BARU II NO 2\r\nCENGKARENG TIMUR\r\nJAKARTA BARAT\r\nINDONESIA', 'dedy_dnd@yahoo.co.id', 'salamperjuangan', '01032010(040).jpg'),
('PJ002', 'Drs. H. Darmani Abdillah', 'Pria', 'Ngawi', '04-03-1965', 'Sarjana', 'Universitas Malang', '081233744951', 'Malang Barat', 'Batu', 'Jln. Arjuno No. 3 Rt. 071 Rw. 011\r\nDusun Sumber sari\r\nDesa Giripurno\r\nKecamatan Bumiaji Kota Batu', 'darmani.abdillah@gmail.com', 'penjabmalang354', 'IMG-20150901-WA0001[1].jpg'),
('PJ003', 'Abdullah Syafari', 'Pria', 'Jakarta', '23-05-1988', 'Sarjana', 'Sekolah Tinggi Agama Islam Salahudin al ayubi', '082255165561', 'DKI Jakarta', 'Jakarta Barat', 'Jl. Panjang H. Jaani No.43 \r\nRt 006  Rw 011 \r\nKebon Jeruk Jakarta Barat', 'syafarirhomadhon@gmail.com', 'syafari123', 'IMG-20150905-WA0005[1].jpg'),
('PJ004', 'SUNARYO', 'Pria', 'JAKARTA', '28-07-2015', 'Sarjana', 'BINA NUSANTARA', '085777267177', 'JAKARTA', 'JAKARTA BARAT', '', 'sunaryo@gmail.com', 'sunaryo', 'pas foto.jpg'),
('PJ005', 'Wahyu Abdurrohman, S.Pd.I', 'Pria', 'Kediri', '17-07-1967', 'Sarjana', 'STAIN Kediri', '08123428294', 'Jawa Timur', 'Kediri', 'Jl. Slamet Riyadi 65', 'alathif@Gmail.com', 'alathif', ''),
('PJ006', 'H. Luqman Hakim', 'Pria', 'Tulung Agung', '03-09-2015', 'Sarjana', 'Universitas Indonesia', '081234351213', 'Jawa Timur', 'Tulung Agung', '--', 'alen@gmail.com', 'oke', '1rjk5gd7.jpg'),
('PJ007', 'H. Agung Anugrahjati, SH.', 'Pria', 'Jakarta', '22-05-1977', 'Sarjana', 'Universitas Singaperbangsa Karawang', '083879778687', 'Jawa Barat', 'Karawang', 'Perum Bumi Telukjambe Blok J No 261 RT 04 RW 08 Desa Sukaluyu, Kec. Telukjambe Timur, Kab. Karawang 41361 ', 'agung.anugrahjati@gmail.com', 'krw313354', 'Agung Anugrahjati.jpg'),
('PJ008', 'IMELDA KHASIATIN', 'Wanita', 'Lebak', '12-01-1968', 'Sarjana', 'Ilmu Administrasi Niaga,  Universitas Indonesia', '081210256651', 'Jawa Barat', 'Bogor', 'Kavling Muara Barokah Blok Q 21-22\r\nRT 04/04 Desa Karihkil Kec. Ciseeng Kab. Bogor\r\n', 'imelda.tax@gmail.com', 'imelda.tax', 'imelda.jpg'),
('PJ009', 'DAMAS ALCHUSNA SUPRAPTO, SH', 'Pria', 'KARANG ANYAR', '20-03-1966', 'Sarjana', 'UNIVERSITAS SURABAYA', '082152359000', 'JAWA BARAT', 'KERAWANG', 'Jl. Ciherang Rt. 02/06, Wadas, Teluk Jambe Timur\r\nKerawang Barat, Jawa Barat', 'p3nairlinesschool@gmail.com', '20031966', 'Snapshot_20150820_24-1.jpg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `negara_perusahaan`, `provinsi_perusahaan`, `email_perusahaan`, `kontak_perusahaan`, `alamat_perusahaan`, `website`, `desk_perusahaan`, `logo`, `status`) VALUES
(7, 'Evercoss Indonesia', 'Indonesia', 'jakarta utara', 'admin@evercoss.com', '081231248549', 'Sunter', 'evercoss.com', 'sdsadassad\r\n', '', 0),
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
('KSI001', 'PJ001', 'KAIYISAH SMART INFORMATIKA', 'JAKARTA', 'JAKARTA BARAT', '06-07-2012', 'JL. FAJAR BARU II NO 2\r\nCENGKARENG TIMUR\r\nJAKARTA BARAT\r\nINDONESIA', '0215454126'),
('KSI002', 'PJ002', 'PKBM Kaiyisah Smart Informatika II', 'Jawa Timur', 'Batu', '01-09-2015', 'Jln Arjuno No. 3 Rt. 071 Rw. 011\r\nDusun Sumbersari\r\nDesa Giripurno\r\nKecamatan Bumiaji, kota Batu', '081233744951'),
('KSI003', 'PJ003', 'PKBM Kaiyisah Smart Informatika III', 'DKI Jakarta', 'Jakarta Barat', '01-09-2015', 'JlL. Panjang H. Jaani No.43\r\nRt 006 Rw 011\r\nKebon Jeruk  Jakarta Barat', '081325121404'),
('KSI004', 'PJ004', 'PKBM Kaiyisah Smart Informatika IV', 'TANGERANG', 'CILEDUK', '01-09-2015', 'CILEDUK RAYA\r\nJL. PENINGGILAN', '08962399'),
('KSI005', 'PJ005', 'PKBM Kaiyisah Smart Informatika V', 'Jawa Timur', 'Kediri', '01-09-2015', 'Jl. Slamet Riyadi', '08123428294'),
('KSI006', 'PJ006', 'PKBM Kaiyisah Smart Informatika VI', 'Jawa Timur', 'Tulung Agung', '13-09-2015', 'Jawa Timur', '085777267177'),
('KSI007', 'PJ007', 'PKBM Kaiyisah Smart Informatika VII', 'Jawa Barat', 'Karawang', '01-09-2015', 'Perum Bumi Telukjambe Blok J No 261 RT/RW 04/08 Desa Sukaluyu, Kec. Telukjambe Timur, Kab. Karawang 41361', '083879778687'),
('KSI008', 'PJ008', 'PKBM Kaiyisah Smart Informatika VIII', 'Jawa Barat', 'Bogor', '01-09-2015', 'Kavling Muara Barokah Blok Q 21-22\r\nRT 04/04 Desa Karihkil Kec. Ciseeng Kab. Bogor\r\n', '081210256651'),
('KSI009', 'PJ009', 'PKBM Kaiyisah Smart Informatika IX', 'JAWA BARAT', 'KERAWANG', '01-09-2015', 'Jl. Ciherang Rt. 02/06, Wadas, Teluk Jambe Timur\r\nKerawang Barat, Jawa Barat', '082152359000');

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
('KSI00115001', 'KSI001', 'PK0004', 'PRASTYA ABDULLAH', 'Pria', 'KEDIRI', '06-08-1993', 'Islam', 'ABDUL GHOFUR', 'SMP', 'BUDI UTOMO', '2009', '0122110', '0122110', 'kali3.PNG', 'ijazah prastya.jpg', '', 'prastya313@gmail.com', 'JAKARTA', 'JAKARTA BARAT', '082233449025', '', 'prastya313'),
('KSI00115002', 'KSI001', 'PK0004', 'LUDVI NUR ALI', 'Pria', 'KLATEN', '16-03-1997', 'Islam', 'SRIHONO', 'SMP', 'SMP NEGRI 2 BAYAT', '2013', 'DN-03 DI 0180123', 'DN-03 DI 0180123', 'ludvinurali.jpg', 'ijazah ludvi.jpg', '', 'ludvinurali@gmail.com', 'JAWA TENGAH', 'KLATEN', '08128231231231', '', 'ludvinurali'),
('KSI00115003', 'KSI001', 'PK0004', 'ABDULLOH NUR SAB''I BIMO PIJJO SAKTI', 'Pria', 'KEDIRI', '16-06-1998', 'Islam', 'IDRIS FATCUROHMAN', 'SMP', 'SMP NEGRIB1 KEDAWUNG', '2013', 'DN-02 DI 0306994', 'DN-02 DI 0428781', '230882_219340401429334_4502897_n.jpg', '', '', 'abdullohnursab@yahoo.co.id', 'JAWA BARAT', 'CIREBON', '021', '', 'abdullohnur'),
('KSI00115004', 'KSI001', 'PK0004', 'ALWI', 'Pria', 'BIMA', '13-07-1987', 'Islam', 'MUHAMMAD', 'SMP', 'SMP 2 BELO', '2003', 'DN-23.DI2328133', 'DN-23.DI2328133', 'Pas-Photo.jpg', '', '', 'ALWI@GMAIL.COM', 'NUSA TENGGARA BARAT', 'BIMA', '081', '', 'ALWI'),
('KSI00115005', 'KSI001', 'PK0004', 'HENI AGUSTIN', 'Pria', 'JAKARTA', '25-08-1983', 'Islam', 'AAN ABDUL HALIM', 'SMP', 'SLTP HARDI YUANA', '2000', '02DI0283639', '02DI0283639', '', 'IJAZAH  HENI.jpg', '', 'HENI@GMAIL.COM', 'JAWA BARAT', 'SUKABUMI', '021', '', 'HENI'),
('KSI00115006', 'KSI001', 'PK0004', 'EFFI LUTHFIANINGSI', 'Wanita', 'BREBES', '01-12-1992', 'Islam', 'TARYO SUGIONO', 'SMP', 'SMP NEGERI 4 TANJUNG', '2008', 'DN.03.DI0524102', 'DN-03DI0950989', '', 'IJAZAH EFFI.jpg', '', 'EFFI@GMAIL.COM', 'JAWA BARAT', 'BREBES', '021', '', 'EFFI'),
('KSI00115007', 'KSI001', 'PK0004', 'JAELANI', 'Pria', 'JAKARTA', '21 DESEMBER 199', 'Islam', 'TIDAK ADA', 'SMP', 'SMP NEGERI 108', '2011', 'DN 01 DI 0040683', 'DN 01 DI 0040683', '', '', 'IJAZAH JAELANI.jpg', 'JAELANI@GMAIL.COM', 'JAWA BARAT', 'JAKARTA', '081', '', 'JAELANI'),
('KSI00115008', 'KSI001', 'PK0004', 'AHMAD FAUZAN ABDULLOH', 'Pria', 'TULUNGAGUNG', '8 AGUSTUS 1994', 'Islam', 'TUMIRAN', 'SMP', 'PKBM KAIYISAH SMART INFORMATIKA', '2014', 'DN 01 PB 0005512', 'DN 01 PB 0005512', '', '', '', 'AHMAD@GMAIL.COM', 'JAWA TENGAH', 'TULUNGAGUNG', '081', '', 'AHMAD'),
('KSI00115009', 'KSI001', 'PK0004', 'NGATINO', 'Pria', 'SERAGEN', '24 APRIL 1994', 'Islam', 'GIYANTI', 'SMP', 'SMP MUHAMMADIYAH 7 SUMBERLAWANG', '2010', 'DN 03 DI 0993459', 'DN 03 DI 0214144', '', '', '', 'NGATINO@GMAIL.COM', 'JAWA TENGAH', 'SERAGEN', '081', '', 'NGATINO'),
('KSI00115010', 'KSI001', 'PK0004', 'TRI NOVIANI', 'Wanita', 'JAKARTA', '12-11-1995', 'Islam', 'BODO', 'SMP', 'SMP TERBUKA', '2011', 'DN 01 DI 0044652', 'DN 01 DI 0044652', '', 'ijazah tri.jpg', '', 'TRI@GMAIL.COM', 'JAKARTA', 'JAKARTA BARAT', '085921356592', '', 'TRINOVIANI'),
('KSI00115011', 'KSI001', 'PK0004', 'BANGUN PANDIANGAN', 'Pria', 'GUNUNG KELAMBU', '03-06-1973', 'Islam', 'WILMAN PANDIANGAN', 'SMP', 'SMP NEGERI 3 LUMUT', '1991', '05 0A OB 0306814', '05 0A OB 0306814', '', '', '', 'BANGUN@GMAIL.COM', 'SUMATRA UTARA', 'LUMUT', '08192312312', '', 'BANGUN'),
('KSI00115012', 'KSI001', 'PK0004', 'ACHMAD BUKHORI', 'Pria', 'JAKARTA', '06-10-1991', 'Islam', 'PARDI', 'SMP', 'PKBM KARTINI', '2013', 'DN 02 PB 0004084', 'DN 02 PB 0004084', 'achmad bukhori.jpg', 'ijazah achmad.jpg', '', 'ACHMAD@GMAIL.COM', 'JAKARTA', 'JAKARTA BARAT', '0817772671777', '', 'ACHMAD'),
('KSI00115013', 'KSI001', 'PK0004', 'JOKO SUSILO', 'Pria', 'JAKARTA', '26-07-1999', 'Islam', 'SUPARDI', 'SMP', 'SDN CENGKARENG TIMUR 01 PAGI', '2014', 'DN 01 DD 0053779', 'DN 01 DD 0053779', 'joko susilo.jpg', 'ijazah joko.jpg', '', 'JOKO@GMAIL.COM', 'JAKARTA', 'JAKARTA BARAT', '089681408538', '', 'JOKO'),
('KSI00115014', 'KSI001', 'PK0004', 'FAUZIANA HAJAR GUSTIANI', 'Wanita', 'JAKARTA', '17-08-1995', 'Islam', 'PARNO', 'SMP', 'SMP SYAHID 1', '2010', 'DN 01 DI 0019732', 'DN 01 DI 0019732', '', '', '', 'FAUZIAH@GMAIL.COM', 'JAKARTA', 'JAKARTA BARAT', '081', '', 'FAUZIAH'),
('KSI00115015', 'KSI001', 'PK0002', 'SITI MARYANI', 'Wanita', 'KLATEN', '24-02-1948', 'Islam', 'NURSIDI', 'SD', 'NEGERI DANGURAN', '1990', 'NO 03 OA 0202989', 'NO 03 OA 0202989', 'siti maryani.jpg', 'ijazah siti maryani.jpg', '', 'SITI@GMAIL.COM', 'JAWA TENGAH', 'KLATEN', '083807502731', '', 'SITI'),
('KSI00115016', 'KSI001', 'PK0004', 'ILYAS ILYASA  HIKMATIYAR', 'Pria', 'TANGERANG', '23-08-2000', 'Islam', 'ADE MAULIDIN HIKMAT', 'SD', 'NEGERI CENGKARENG TIMUR 09 PAGI', '2012', 'DN 01 DD 0055807', 'DN 01 DD 0055807', 'ilyas.jpg', 'ijazah ilyas.jpg', '', 'ILYAS@GMAIL.COM', 'JAKARTA', 'TANGERANG', '081', '', 'ILYAS'),
('KSI00115017', 'KSI001', 'PK0004', 'AKHMAD  NOVI MUDZAKKIR', 'Pria', 'BEKASI', '09-11-1994', 'Islam', 'CHAERUL ACHMAD', 'SMP', 'SMP NEGERI 18 BEKASI', '2010', 'DN 02 DI 0268418', 'DN 02 DI 0176621', '', 'ijazah akhmad.jpg', '', 'AKHMAD@GMAIL.COM', 'JAWA BARAT', 'BEKASI', '081', '', 'AKHMAD'),
('KSI00115018', 'KSI001', 'PK0004', 'ERI YANTO SUBANA', 'Pria', 'JAKARTA', '06-02-1995', 'Islam', 'RAHAYU SUBANA', 'SMP', 'SMP AL HUDA', '2010', 'DN 01 DI 0043275', 'DN 01 DI 0043275', '', 'skhu eri.jpg', '', 'ERI@GMAIL.COM', 'JAKARTA', 'JAKARTA BARAT', '089502955105', '', 'ERIYANTO'),
('KSI00115019', 'KSI001', 'PK0004', 'SITI HALIMAH', 'Wanita', 'CIHAYAM', '11-07-1986', 'Islam', 'TIDAK ADA', 'SMP', 'MTS Al-islam bunut', '2002', 'NO 12  DI 2365722', 'NO 12  DI 2365722', '', '', '', 'SITII@GMail.COM', 'LAMPUNG SELATAN', 'LAMPUNG', '085777843611', '', 'SITIHALIMAH'),
('KSI00115020', 'KSI001', 'PK0004', 'LINGGA WAHYU PRATAMA', 'Pria', 'JAKARTA', '13-11-1998', 'Islam', 'TIDAK ADA', 'SD', 'SDN CENGKARENG TIMUR 01 PAGI', '2014', 'DN 01 DD 0055153', 'DN 01 DD 0055153', '', '', '', 'LINGGA@GMAIL.COM', 'JAKARTA BARAT', 'JAKARTA', '089681408609', '', 'LINGGA'),
('KSI00115021', 'KSI001', 'PK0004', 'MUHAMMAD AHYARUL UMAM', 'Pria', 'BANDUNG', '06-05-1993', 'Islam', 'RIDWAN R', 'SMP', 'DARUL ULUM', '2009', 'MTS 28040283', 'MTS 28040283', '', '', '', 'MUHAMMAD@GMAIL.COM', 'JAWA BARAT', 'BANDUNG', '082153265421', '', 'MUHAMMAD'),
('KSI00115022', 'KSI001', 'PK0004', 'IMAM FAJAR LIAN', 'Pria', 'CILACAP', '10-05-1989', 'Islam', 'SUPRIADI', 'SMP', 'SMP TERBUKA MOOS', '', 'DN 03 DI 0537164', 'DN 03 DI 0537164', '', '', '', 'IMAM@GMAIL.COM', 'JAWA BARAT', 'CILACAP', '085779909417', '', 'IMAM'),
('KSI00115023', 'KSI001', 'PK0002', 'ISNA ALFIANA SABILA', 'Wanita', 'SIMPANG TIGA', '23-08-1997', 'Islam', 'EKO FAUZI', 'SD', 'SD CIIMPAKA', '2009', 'DN 02 DD 0040896', 'DN 02 DD 0040896', '', '', '', 'ISNA@GMAIL.COM', 'JAKARTA BARAT', 'CEMPAKA', '081', '', 'ISNA'),
('KSI00115024', 'KSI001', 'PK0004', 'HASANUDIN', 'Pria', 'PEKALONGAN', '27-06-1976', 'Islam', 'LASIM', 'SMP', 'SMP PGRI', '1991', '04 OA OB 1088733', '04 OA OB 1088733', 'hasanudin.jpg', 'IJAZAH HASANUDIN.jpg', '', 'HASANUDIN@GMAIL.COM', 'JAWA TIMUR', 'PEKALONGAN', '081', '', 'HASANUDIN'),
('KSI00315001', 'KSI003', 'PK0004', 'RIA SEFI NURHAENI', 'Wanita', 'TULUNGAGUNG', '14-01-1992', 'Islam', 'RAIS', 'SMP', 'SMP NEGERI  1 PAKEL', '2006', 'DN-05DI1201139', 'DN-05DI1201139', '', '', '', 'RIA@GMAIL.COM', 'JAWA  TENGAH', 'TULUNGAGUNG', '021', '', 'penjabmalang354'),
('KSI00315002', 'KSI003', 'PK0004', 'ISTIQOMAH', 'Wanita', 'BATANG', '05-01-1996', 'Islam', 'DARMAN', 'SMP', 'SMP NEGERI 1 REBAN', '2010', 'DN-03DI0327189', 'DN-03DI0327189', '', '', '', 'ISTIQOMAH@GMAIL.COM', 'JAWA  TENGAH', 'BATANG', '021', '', 'ISTIQOMAH'),
('KSI00315003', 'KSI003', 'PK0004', 'NURUL INDAH KARTIKA', 'Wanita', 'CILACAP', '07-09-1997', 'Islam', 'AHMAD NURDIN', 'SMP', 'SMP PURNAMA SAMPANG', '2012', 'DN-03DI0098391', 'DN-03DI0098391', '', '', '', 'NURUL@GMAIL.COM', 'JAWA TENGAH', 'CILACAP', '021', '', 'NURUL'),
('KSI00315004', 'KSI003', 'PK0002', 'ISNA ALFIANI SABILA', 'Wanita', 'SIMPANG TIGA KASUI', '23-08-1997', 'Islam', 'EKO FAUZI', 'SD', 'SD NEGERI CEMPAKA', '2009', 'DN-02Dd0040896', 'DN-02Dd0040896', '', '', '', 'ISNA@GMAIL.COM', 'SUMATRA SELATAN', 'PALEMBANG', '085777267177', '', 'ISNA');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `soal_modul`
--

INSERT INTO `soal_modul` (`id_soal_modul`, `id_modul`, `soal`, `no`, `pa`, `pb`, `pc`, `pd`, `kunci`, `tgl`) VALUES
(3, 1, '<p>Penyebab kecelakaan lalu lintas di jalan raya terutama kesalahan para pengemudi biasa kurang sabar. Mereka sering mengebut dan ingin mendahului. Mengantuk juga sering menjadi penyebab kecelakaan. Jarak yang ditempuh kendaraan terlalu jauh akan mengakibatkan sopir lelah dan mengantuk sehingga mudah tabrakan dengan kendaraan lain.<br />\r\nKalimat tanggapan yang sesuai dengan isi paragraf tersebut adalah&hellip;..</p>\r\n', 1, 'asdsadsa', 'dsadas', 'sadsa', 'sadasd', 'A', '20-09-2015'),
(4, 1, '<p>Penyebab kecelakaan lalu lintas di jalan raya terutama kesalahan para pengemudi biasa kurang sabar. Mereka sering mengebut dan ingin mendahului. Mengantuk juga sering menjadi penyebab kecelakaan. Jarak yang ditempuh kendaraan terlalu jauh akan mengakibatkan sopir lelah dan mengantuk sehingga mudah tabrakan dengan kendaraan lain.<br />\r\nKalimat tanggapan yang sesuai dengan isi paragraf tersebut adalah&hellip;..</p>\r\n', 4, 'denjaka', 'kopassus', 'taifib', 'xcxcxcxcxcxcx', 'D', '20-09-2015'),
(5, 1, '<p>Siapa yang jomblo ?&nbsp;</p>\r\n', 3, 'Aku', 'Saya', 'Diriku', 'semua benar', 'D', '20-09-2015'),
(9, 1, '<p>window.location.href=&#39;?ubah-soal=$idsoal&#39;&lt;/script&gt;</p>\r\n', 5, 'window.location.href=''?ubah-soal=$idsoal''</script>', 'window.location.href=''?ubah-soal=$idsoal''</script>', 'window.location.href=''?ubah-soal=$idsoal''</script>', 'window.location.href=''?ubah-soal=$idsoal''</script>', 'A', '20-09-2015'),
(10, 6, '<p>TESTING SOAL 1</p>\r\n', 1, 'ASDFG', 'QWERRYY', 'XCCVXC', 'OPOPO', 'A', '21-09-2015'),
(11, 22, '<h2 style="font-style:italic;"><tt>Siapakah yang membacakan teks proklamasi kemerdekaan&nbsp;Indonesia</tt></h2>\r\n', 1, 'moh. hatta', 'moh. yamin', 'Soekarno', 'Soeharto', 'A', '03-10-2015');

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
MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
MODIFY `id_detail_absensi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kategori_lowongan`
--
ALTER TABLE `kategori_lowongan`
MODIFY `id_kat_lowongan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
MODIFY `id_modul` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `nilai_soal`
--
ALTER TABLE `nilai_soal`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
MODIFY `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `soal_modul`
--
ALTER TABLE `soal_modul`
MODIFY `id_soal_modul` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
