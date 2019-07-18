/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - db_kependudukan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kependudukan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kependudukan`;

/*Table structure for table `tabel_asalkedatangan` */

DROP TABLE IF EXISTS `tabel_asalkedatangan`;

CREATE TABLE `tabel_asalkedatangan` (
  `id_asalkedatangan` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_asalkedatangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_asalperpindahan` */

DROP TABLE IF EXISTS `tabel_asalperpindahan`;

CREATE TABLE `tabel_asalperpindahan` (
  `id_asalperpindahan` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asalperpindahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_kedatangan` */

DROP TABLE IF EXISTS `tabel_kedatangan`;

CREATE TABLE `tabel_kedatangan` (
  `id_datang` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `id_klasifikasi` int(11) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `id_asalkedatangan` int(11) DEFAULT NULL,
  `id_tujuankedatangan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_datang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_kelahiran` */

DROP TABLE IF EXISTS `tabel_kelahiran`;

CREATE TABLE `tabel_kelahiran` (
  `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_lapor` date DEFAULT NULL,
  `no_akta` varchar(100) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id_kelahiran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_kematian` */

DROP TABLE IF EXISTS `tabel_kematian`;

CREATE TABLE `tabel_kematian` (
  `id_kematian` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_lapor` date DEFAULT NULL,
  `no_akta` varchar(100) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  PRIMARY KEY (`id_kematian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_klasifikasi` */

DROP TABLE IF EXISTS `tabel_klasifikasi`;

CREATE TABLE `tabel_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_klasifikasi`),
  CONSTRAINT `tabel_klasifikasi_ibfk_1` FOREIGN KEY (`id_klasifikasi`) REFERENCES `tabel_perpindahan` (`id_pindah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_penduduk` */

DROP TABLE IF EXISTS `tabel_penduduk`;

CREATE TABLE `tabel_penduduk` (
  `id_penduduk` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `shdk` enum('kepala keluarga','istri','anak') DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status` enum('kawin','belum kawin') DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `rt` int(5) DEFAULT NULL,
  `rw` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_penduduk`),
  CONSTRAINT `tabel_penduduk_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tabel_perpindahan` (`id_pindah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_perpindahan` */

DROP TABLE IF EXISTS `tabel_perpindahan`;

CREATE TABLE `tabel_perpindahan` (
  `id_pindah` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `id_klasifikasi` int(11) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `id_tujuanperpindahan` int(11) DEFAULT NULL,
  `id_asalperpindahan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pindah`),
  KEY `id_tujuanperpindahan` (`id_tujuanperpindahan`),
  KEY `id_asalperpindahan` (`id_asalperpindahan`),
  CONSTRAINT `tabel_perpindahan_ibfk_1` FOREIGN KEY (`id_tujuanperpindahan`) REFERENCES `tabel_tujuanperpindahan` (`id_tujuanperpindahan`),
  CONSTRAINT `tabel_perpindahan_ibfk_2` FOREIGN KEY (`id_asalperpindahan`) REFERENCES `tabel_asalkedatangan` (`id_asalkedatangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_tujuankedatangan` */

DROP TABLE IF EXISTS `tabel_tujuankedatangan`;

CREATE TABLE `tabel_tujuankedatangan` (
  `id_tujuankedatangan` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tujuankedatangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tabel_tujuanperpindahan` */

DROP TABLE IF EXISTS `tabel_tujuanperpindahan`;

CREATE TABLE `tabel_tujuanperpindahan` (
  `id_tujuanperpindahan` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tujuanperpindahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
