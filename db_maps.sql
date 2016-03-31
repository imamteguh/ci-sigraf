-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2016 at 10:33 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_layer`
--

CREATE TABLE IF NOT EXISTS `t_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(15) NOT NULL,
  `kordinat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `t_layer`
--

INSERT INTO `t_layer` (`id`, `tipe`, `kordinat`) VALUES
(2, 'marker', '(-6.852591579107722, 107.5261116027832)'),
(4, 'marker', '(-6.85131331415936, 107.52967357635498)'),
(5, 'marker', '(-6.859025460631484, 107.52113342285156)'),
(6, 'marker', '(-6.861837593478938, 107.52851486206055)'),
(8, 'marker', '(-6.866013154033911, 107.52855777740479)'),
(16, 'polygon', 'h|zh@ybfoSl@F@h@Tp@d@rA~@jAL`@b@K|@MNITELVlA[jCMJu@pAmAlBgA`GoEj@u@n@gBhA}Dr@mBF_A^{AEuBBu@DiBuEgJSQDSAs@QQ_@@i@_@gAa@Ok@@_@Z}@UWb@qBaA]H}@V_Dd@cBTcBC]a@_Ac@y@Ik@UQUOMWBuACiAQq@OaAi@y@[a@Yq@?e@u@eAy@g@w@Sm@YyAqAcCsA{@q@iDT{EuB[s@w@_AM{@P}@XcBCiAaB_D_A]mFiAcCMmEuBm@dAyCwAQi@wCaAwDLoAEs@Z}@zAmA|Bu@xEWhDKfD}@xAmAlFj@`@pBjB`@QjDThAZb@QJ[`@cA`@[~@@~ARv@NrA|Ap@zCkA|@a@p@BRJTu@dAm@fAa@rCk@dD]hAo@X{AtE|KdC`Cd@dFt@i@Zc@x@W|@DXh@`@jAx@L`@O~@HtAvAtCj@dBjA\\v@l@d@~@X~AXr@v@rAz@|Bv@vBd@XPj@^RV@d@`@LbAI|@d@~@Kr@P`A^ZEn@ZX');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
