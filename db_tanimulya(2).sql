-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 10:37 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tanimulya`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kegiatan` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `kat_pend`
--

CREATE TABLE IF NOT EXISTS `kat_pend` (
  `id` int(2) NOT NULL,
  `nm_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_pend`
--

INSERT INTO `kat_pend` (`id`, `nm_kategori`) VALUES
(1, 'Tidak/Belum Sekolah'),
(2, 'Belum Tamat SD/Seder'),
(3, 'Tamat SD/Sederajat'),
(4, 'SLTP/Sederajat'),
(5, 'SLTA/Sederajat'),
(6, 'Diploma I/II'),
(7, 'Akademi/Diploma III/'),
(8, 'Diploma IV/Strata I'),
(9, 'Strata II'),
(10, 'Strata III');

-- --------------------------------------------------------

--
-- Table structure for table `kat_perker`
--

CREATE TABLE IF NOT EXISTS `kat_perker` (
  `id` int(3) NOT NULL,
  `nm_kategori` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_perker`
--

INSERT INTO `kat_perker` (`id`, `nm_kategori`) VALUES
(1, 'Belum/Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar/Mahasiswa'),
(4, 'Pensiunan'),
(5, 'Pegawai Negeri Sipil'),
(6, 'Tentara Nasional Indonesia'),
(7, 'Kepolisian RI'),
(8, 'Perdagangan'),
(9, 'Petani/Pekebun'),
(10, 'Peternak'),
(11, 'Nelayan/Perikanan'),
(12, 'Industri'),
(13, 'Konstruksi'),
(14, 'Transportasi'),
(15, 'Karyawan Swasta'),
(16, 'Karyawan BUMN'),
(17, 'Karyawan BUMD'),
(18, 'Karyawan Honorer'),
(19, 'Buruh Harian Lepas'),
(20, 'Buruh Tani/Perkebunan'),
(21, 'Buruh Nelayan/Perikanan'),
(22, 'Buruh Peternakan'),
(23, 'Pembantu Rumah Tangga'),
(24, 'Tukang Cukur'),
(25, 'Tukang Listrik'),
(26, 'Tukang Batu'),
(27, 'Tukang Kayu'),
(28, 'Tukang Sol Sepatu'),
(29, 'Tukang Las/Pandai Besi'),
(30, 'Tukang Jahit'),
(31, 'Tukang Gigi'),
(32, 'Penata Rias'),
(33, 'Penata Busana'),
(34, 'Penata Rambut'),
(35, 'Mekanik'),
(36, 'Seniman'),
(37, 'Tabib'),
(38, 'Paraji'),
(39, 'Perancang Busana'),
(40, 'Penterjemah'),
(41, 'Imam Mesjid'),
(42, 'Pendeta'),
(43, 'Pastor'),
(44, 'Wartawan'),
(45, 'Ustadz/Mubaligh'),
(46, 'Juru Masak'),
(47, 'Promotor Acara'),
(48, 'Anggota DPR-RI'),
(49, 'Anggota DPD'),
(50, 'Anggota BPK'),
(51, 'Presiden'),
(52, 'Wakil Presiden'),
(53, 'Anggota Mahkamah Konstitusi'),
(54, 'Anggota Kabinet/Kementerian'),
(55, 'Duta Besar'),
(56, 'Gubernur'),
(57, 'Wakil Gubernur'),
(58, 'Bupati'),
(59, 'Wakil Bupati'),
(60, 'Walikota'),
(61, 'Wakil Walikota'),
(62, 'Anggota DPRD Provinsi'),
(63, 'Anggota DPRD Kabupaten/Kota'),
(64, 'Dosen'),
(65, 'Guru'),
(66, 'Pilot'),
(67, 'Pengacara'),
(68, 'Notaris'),
(69, 'Arsitek'),
(70, 'Akuntan'),
(71, 'Konsultan'),
(72, 'Dokter'),
(73, 'Bidan'),
(74, 'Perawat'),
(75, 'Apoteker'),
(76, 'Psikiater/Psikolog'),
(77, 'Penyiar Televisi'),
(78, 'Penyiar Radio'),
(79, 'Pelaut'),
(80, 'Peneliti'),
(81, 'Sopir'),
(82, 'Pialang'),
(83, 'Paranormal'),
(84, 'Pedagang'),
(85, 'Perangkat Desa'),
(86, 'Kepala Desa'),
(87, 'Biarawati'),
(88, 'Wiraswasta'),
(89, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kode_agama`
--

CREATE TABLE IF NOT EXISTS `kode_agama` (
  `id` int(2) NOT NULL,
  `nm_agama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_agama`
--

INSERT INTO `kode_agama` (`id`, `nm_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katholik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghuchu'),
(7, 'Aliran Kepercayaan');

-- --------------------------------------------------------

--
-- Table structure for table `map_kategori`
--

CREATE TABLE IF NOT EXISTS `map_kategori` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `map_kategori`
--

INSERT INTO `map_kategori` (`id_kategori`, `nm_kategori`, `icon`) VALUES
(1, 'Kantor Desa', 'kantor.png'),
(2, 'Sekolah Dasar', 'sd.png'),
(3, 'Sekolah Menengah Pertama', 'smp.png'),
(4, 'Sekolah Menengah Atas', 'sma.png'),
(5, 'Universitas', 'universitas.png'),
(6, 'Tempat Wisata', 'wisata.png'),
(7, 'Pasar', 'pasar.png'),
(8, 'Bank Sampah', 'bs.png');

-- --------------------------------------------------------

--
-- Table structure for table `map_layer`
--

CREATE TABLE IF NOT EXISTS `map_layer` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `koordinat` text NOT NULL,
  `judul` varchar(20) NOT NULL,
  `link` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `warna` varchar(7) NOT NULL,
  `foto` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `map_layer`
--

INSERT INTO `map_layer` (`id`, `koordinat`, `judul`, `link`, `status`, `warna`, `foto`) VALUES
(2, 'vu{h@icfoSYYa@]iB_C^]aBmBc@e@oCvBoC~BgB`BOR{AR@j@|@dC|@hAJ^`BUXONAJXlA_@hCKLs@hAgALKbAk@b@U', 'RW 13', '13', 0, '#808000', ''),
(3, 'f}{h@sogoSoBZs@jHFhC_@FgFkC{AjIxAZxDvA|HEdB@Be@b@_BGwBF}CaEeI', 'RW 05', '5', 0, '#000099', ''),
(4, '~b|h@gwfoSqBAsHBaDkASK{A[Qh@cB`CSn@JZ~BjChCtCa@\\dBzB`Az@dDgC`@[l@s@l@aBnAoEj@aB', 'RW 12', '12', 0, '#cc00cc', ''),
(5, 't}zh@sbfoSm@G[VWW@m@[WQeALu@c@}@HaAOeA_@YjCqAt@Fl@uDtEp@pBoOb@w@zDfB{AlIOj@cB`CWx@FThChCkDjCiDxCmAlA', 'RW 14', '14', 0, '#0066ff', ''),
(6, 'ty{h@wngoSU@qA_AoAJaHaAyGkAUz@Hd@BnAh@FLVb@vApDxA~DlB`FfCd@AIqC', 'RW 04', '4', 0, '#004d00', ''),
(7, 'jwzh@{ofoSa@Ce@_@Mc@_@S_@aAhAiBx@uElAmA\\oFJ_@`AO^}HPs@xB`@U|@JV@`Bh@DTZXlArDzAa@v@uBzOoE_Ao@vDw@K', 'RW 06', '6', 0, '#000066', ''),
(8, 'rrzh@ytfoSuAyD]u@[_@[u@UeBe@y@iAs@X[RmA^qAHUKe@fADvAGd@?`@l@Ff@`BEtC\\Yp@S`FoApAs@tE', 'RW 24', '24', 0, '#808000', ''),
(9, 'vf{h@msgoSdAkGh@oDp@cEZJd@JnBLRHXALQr@J|AXMxASbC`A^e@rBVP]|@Ab@Pj@z@Vt@f@`@ENRChAHLuBZSAsA_AoANsFy@', 'RW 03', '3', 0, '#1a1a00', ''),
(10, 'tf{h@osgoS{FeASCC_@AgAj@uDQGAK\\gD_B_AE]Bk@Zw@f@y@NQhAaALN\\HnBXrEv@g@fCwAfJcAdG', 'RW 15', '15', 0, '#992600', ''),
(11, 'd~zh@}ugoSoCk@qEk@y@OsB?Gy@PmC{AcEYs@CWX}@h@cAhA\\PTz@vBtCoAHET?xBt@z@\\HD|Az@]fD@JRFe@nCGd@@pA', 'RW 07', '7', 0, '#003333', ''),
(13, 'zw{h@kehoSwCg@KNYDMIuBK}@[d@gC_J{AMOEMtAeBz@cAeAo@qA{@oAi@aBy@Eq@w@i@ESb@_A`@k@^?`AkA`AeAbBwCbB~@NFd@`@|@v@tAf@PDn@\\t@fA?j@Xn@bAtATpANd@?~CLXf@`@Lp@j@fAVf@BZOtA', 'RW 02', '2', 0, '#000066', ''),
(15, 'pmzh@ushoSV_ALKRCXc@l@oARe@r@Zr@ZbFnCCHCTn@d@ApAd@b@`@^a@`@[b@OXw@e@oAa@Sg@m@QaCeAgAg@u@Wo@M', 'RW 19', '19', 0, '#003300', ''),
(16, 'drzh@_{hoSSK?MNUPQ`@eAXo@t@kAhA{@BAJMj@cAPHv@b@j@ZXPcAnA_@?cAjBBRv@h@Dr@~Av@x@\\ZNv@f@xA~@y@bAq@z@c@h@BLo@f@eAcA?qAo@e@BUDKsAs@cB}@sCsA', 'RW 16', '16', 0, '#99004d', ''),
(18, '|ezh@mihoSd@kAX_AW]lAsDDMxBb@NFd@H`A\\rAn@~Ar@v@TRf@fA^HBj@\\JDMRSj@Cj@D\\oAg@kBo@Y?uB~@g@Tu@mBU_@iA]_@p@MRYz@iBg@', 'RW 18', '18', 0, '#660000', ''),
(19, 'xizh@ythoS\\}@R{@?[EUr@sBh@_BPc@d@yAf@aBp@oBn@Rn@T\\LnAd@d@Vi@`AMNw@l@UPo@bA]v@]x@EHQPMT?NTH]x@c@z@Yb@WBKJU~@', 'RW 22', '22', 0, '#cc00cc', ''),
(20, 'z~zh@wdioSoC{Ag@WkE}AjAyDJTzEtBjDUfAz@mArBUb@w@x@', 'RW 17', '17', 0, '#992600', ''),
(21, '|hzh@qegoSs@Q{@eCeAuBKyANw@Ok@qBuAG[T{@b@_Aj@WqEs@GiAJyBLmCC]lAa@dC@hB\\d@HzA`@DZt@lB~@`CQnCDz@xB@fC^jC\\dCf@Qv@MlBOvCCv@}@L?GwC]_BHGq@_@g@uBFwAEJ`@@L[`AOn@Oz@', 'RW 08', '8', 0, '#1a1a00', ''),
(22, 'r{yh@s}goSeCe@cBa@mBe@yEcAzAuEp@Y\\mAZoBxCdA~Bf@l@Fl@X@R?fAB\\SlEG~@', 'RW 09', '9', 0, '#808000', ''),
(23, '`|yh@gihoS?yAb@yA^sCLwA@wANMj@YlFdBjA`@_@bAeA`DV^W|@Yt@MX_AOc@KaCAK@cA^', 'RW 20', '20', 0, '#ff6600', ''),
(24, 'r~yh@ayhoSFYp@w@BaABOSmEbAA\\PnARf@HJJhCv@hATuAbEDP@^U~@KTgFcBqAc@', 'RW 21', '21', 0, '#004d4d', ''),
(25, 'hpyh@sphoS`@kCF_@DWZk@`@u@b@k@KS?W`@s@jA}@q@{CsA{AYGTy@`@Sr@sAbAC`@CVAPHPCJLn@pAj@tA^l@Lp@JvBFrACTE~@q@t@EX?vAQnBQzAMl@a@lAk@_@i@AeAQeAYkBu@', 'RW 10', '10', 0, '#99004d', ''),
(26, 'tpzh@{fioSy@a@cCUc@McBo@GWaBe@m@{@gBkAg@OQTi@hBJHf@bAb@bAN`@`@n@Jn@fACVRrARd@HJNhAVz@ZlAR\\w@\\gA', 'RW 23', '23', 0, '#992600', ''),
(27, 'tpzh@yfioSy@c@_CUkC}@GWaBg@k@w@eBkAk@Qt@mCp@Of@HjB|@bE|AJ`@zD`Cf@PIJ', 'RW 25', '25', 0, '#4d0099', ''),
(28, 'vrzh@ikioSe@O{@k@aCwAKc@wAi@aC}@uAs@e@Gu@NyAmBaAWEo@AYOKqAc@Oq@g@Mq@W[DSAOKKQYc@QMYu@DkDo@qBtBEdBj@n@RPh@rCvAHAf@_Aj@Vv@\\jB|@`CJpDz@|Bl@v@~Af@~@FhAe@`CE^Dh@BNb@j@TVLZWz@Uv@', 'RW 01', '1', 0, '#001a00', ''),
(29, '|ryh@chioSSCk@Kq@GOC}@Ac@Za@dAIXe@PgA[a@CiAI_AGa@P}@y@o@m@o@e@TcA^_BViAj@aAPWFqBBu@@EFy@B]HgAD_@TwALw@Jo@j@cAXk@dAgBt@[F?x@DJ?h@AZCL^`@lAAbAChBXt@PNd@r@NJR@ZEp@Vf@LNp@jA`@F@LJFhAp@PNDRVj@t@Z^M`@YdAMd@QTQj@Wz@QBQIeADw@BU`@Wf@EHa@RQl@', 'RW 11', '11', 0, '#000066', '');

-- --------------------------------------------------------

--
-- Table structure for table `map_point`
--

CREATE TABLE IF NOT EXISTS `map_point` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `koordinat` tinytext NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `foto` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `map_point`
--

INSERT INTO `map_point` (`id`, `koordinat`, `nama`, `alamat`, `id_kategori`, `foto`) VALUES
(1, '(-6.859653931155633, 107.53147602081299)', 'KANTOR DESA TANIMULYA', 'Jl. Sowadinata', 1, ''),
(2, '(-6.858066775183875, 107.53427624702454)', 'SMP NEGERI 2 NGAMPRAH', 'JL. SOWADINATA', 3, ''),
(3, '(-6.859350348039887, 107.53092885017395)', 'SDN PAKUSARAKAN', 'JL. SOWADINATA', 2, ''),
(4, '(-6.859275783736243, 107.53082692623138)', 'SDN MARGAMULYA', 'JL. SOWADINATA', 2, ''),
(5, '(-6.854322557429137, 107.53380417823792)', 'KOLAM RENANG DELTA VALEY', 'JL. DIRAWINATA', 6, ''),
(6, '(-6.854146796840128, 107.53268301486969)', 'SDN CILEDUG 01', 'JL. DIRAWINATA', 2, ''),
(7, '(-6.860484789219771, 107.52539277076721)', 'KOLAM RENANG TIRTA MULYA', 'JL SOMAWANATA', 6, ''),
(8, '(-6.856703308113141, 107.52478122711182)', 'PASAR DESA TANIMULYA', 'JL. H GOFUR. RW GIRANG', 7, ''),
(9, '(-6.857837755596999, 107.5240409374237)', 'SD AS SAKINAH', 'RAWA POJOK', 2, ''),
(10, '(-6.857736560860753, 107.52386927604675)', 'SMP AS SAKINAH', 'RAWA POJOK', 3, ''),
(11, '(-6.857843081635158, 107.52411603927612)', 'SMA AS SAKINAH', 'RAWA POJOK', 4, ''),
(12, '(-6.858649975727684, 107.52344012260437)', 'SMP FITRAH INSANI', 'JL. H. GOFUR', 3, ''),
(13, '(-6.860977444759111, 107.52394169569016)', 'SD FITRAH INSANI', 'JL. H. GOFUR', 2, ''),
(14, '(-6.860575331357123, 107.52098321914673)', 'SDN KARYAMULYA', 'JL. GIOK 4', 2, ''),
(15, '(-6.861661835662495, 107.52085447311401)', 'SDN SIRNAGALIH', 'JL. PERMATA RAYA', 2, ''),
(16, '(-6.86311316720251, 107.52349108457565)', 'SDN CILEDUG 02', 'JL. H. GOFUR', 2, ''),
(17, '(-6.858109383466957, 107.53031730651855)', 'SD NIAGARA', 'JL. PURI KENANGAN RAYA', 2, ''),
(18, '(-6.858580737344317, 107.52970039844513)', 'BANK SAMPAH RW 22', 'JL. SOWADINATA', 8, ''),
(19, '(-6.853571579913911, 107.53357887268066)', 'BANK SAMPAH RW 11', 'JL. DIRAWINATA', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE IF NOT EXISTS `pengumuman` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `judul` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `deskripsi`, `tanggal`, `status`) VALUES
(1, 'KARTU TANDA PENDUDUK (KTP)', '<p>1. Penerbitan KTP baru bagi penduduk WNI,dilakukan setelah memenuhi syarat berupa :<br />\r\na.&nbsp; Telah berusia 17 (tujuh belas) tahun atau sudah kawin atau pernah kawin<br />\r\nb.&nbsp; Surat pengantar RT/RW dan Kepala desa/lurah<br />\r\nc.&nbsp; Poto copy Kartu Keluarga<br />\r\nd.&nbsp; Kutipan Akta Nikah/Akta Kawin bagi Penduduk yang belum berusia 17 tahun<br />\r\ne.&nbsp; Kutipan Akta Kelahiran<br />\r\nf.&nbsp; Surat keterangan datang dari luar negeri yang diterbitkan oleh Instansi pelaksana bagi WNI yang datang dari luar&nbsp; negeri Karena&nbsp; pindah</p>\r\n', '2016-04-13', 1),
(2, 'Biodata Penduduk', '<p>1. Penduduk WNI wajib melaporan Kepada Instansi Pelaksana melalui Lurah dan Camat untuk dicatatkan Biodatanya<br />\r\n2. Pencatatan Biodata Penduduk WNI dilakukan setelah memenuhi syarat :<br />\r\na)&nbsp;&nbsp; Surat Pengantar dari RT dan RW<br />\r\nb)&nbsp;&nbsp; Kutipan Akta Kelahiran<br />\r\nc)&nbsp;&nbsp; Ijazah atau Surat Tanda Tamat Belajar<br />\r\nd)&nbsp;&nbsp; Kartu Keluarga<br />\r\ne)&nbsp;&nbsp; Kartu Tanda Penduduk<br />\r\nf)&nbsp;&nbsp;&nbsp; Kutipan Akta Perkawinan/Kutipan Akta Nikah atau<br />\r\ng)&nbsp;&nbsp; Kutipan Akta Perceraian</p>\r\n', '2016-04-13', 1),
(3, 'Kartu Keluarga', '<p>1. Penduduk WNI wajib melaporkan susunan Keluarganya kepada Instansi pelaksana melalui Lurah dan Camat<br />\r\n2. Penerbitan KK dilakukan setelah memenuhi syarat :<br />\r\na.&nbsp; Surat Pengantar RT dan RW<br />\r\nb.&nbsp; Ijin tinggal tetap bagi orang asing<br />\r\nc.&nbsp; Foto copi Kutipan Akta Nikah/Kutipan Akta Perkawinan<br />\r\nd.&nbsp; Surat Keterangan Pindah/Surat Keterangan Pindah Datang dalam wilayah NKRI<br />\r\ne.&nbsp; Surat Keterangan datang dari Luar Negeri bagi WNI yang datang dari luar negeri karena pindah<br />\r\nf. Kartu Keluarga (KK) lama karena penambahan/pengurangan anggota Keluarga</p>\r\n', '2016-04-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `judul` varchar(40) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `judul`, `foto`, `status`) VALUES
(1, 'Peta satu', '20160413821.PNG', 1),
(2, 'peta dua', '20160413903.jpg', 1),
(3, 'Peta tiga', '20160413749.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@tanimulya.com', 'Admin Tanimulya'),
('imamteguh', 'c9b0e2cb916873f6603dbdfafb5137fd', 'imam.teguh33@gmail.com', 'Imam Teguh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
