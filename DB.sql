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

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values 
(1,'admin','Administrator'),
(2,'members','General User');

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`version`) values 
(1);

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

/*Data for the table `tabel_asalkedatangan` */

/*Table structure for table `tabel_asalperpindahan` */

DROP TABLE IF EXISTS `tabel_asalperpindahan`;

CREATE TABLE `tabel_asalperpindahan` (
  `id_asalperpindahan` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asalperpindahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_asalperpindahan` */

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
  PRIMARY KEY (`id_datang`),
  KEY `id_klasifikasi` (`id_klasifikasi`),
  KEY `id_penduduk` (`id_penduduk`),
  KEY `id_asalkedatangan` (`id_asalkedatangan`),
  KEY `id_tujuankedatangan` (`id_tujuankedatangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_kedatangan` */

/*Table structure for table `tabel_kelahiran` */

DROP TABLE IF EXISTS `tabel_kelahiran`;

CREATE TABLE `tabel_kelahiran` (
  `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_lapor` date DEFAULT NULL,
  `no_akta` varchar(100) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kelahiran`),
  KEY `id_penduduk` (`id_penduduk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_kelahiran` */

insert  into `tabel_kelahiran`(`id_kelahiran`,`tanggal_lapor`,`no_akta`,`id_penduduk`,`tanggal_lahir`,`tempat_lahir`) values 
(1,'2014-11-14','3308-LU-01122014-0037',11,'2014-10-10',NULL);

/*Table structure for table `tabel_kematian` */

DROP TABLE IF EXISTS `tabel_kematian`;

CREATE TABLE `tabel_kematian` (
  `id_kematian` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_lapor` date DEFAULT NULL,
  `no_akta` varchar(100) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  PRIMARY KEY (`id_kematian`),
  KEY `id_penduduk` (`id_penduduk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_kematian` */

insert  into `tabel_kematian`(`id_kematian`,`tanggal_lapor`,`no_akta`,`id_penduduk`,`tanggal_meninggal`) values 
(1,'2017-10-10','3308-KM-10102017-0017',13,'2017-05-07');

/*Table structure for table `tabel_klasifikasi` */

DROP TABLE IF EXISTS `tabel_klasifikasi`;

CREATE TABLE `tabel_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_klasifikasi` */

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
  PRIMARY KEY (`id_penduduk`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `tabel_penduduk` */

insert  into `tabel_penduduk`(`id_penduduk`,`nik`,`no_kk`,`shdk`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`status`,`pekerjaan`,`nama_ibu`,`nama_ayah`,`alamat`,`rt`,`rw`) values 
(1,'3308131303540001','3308130307102464','kepala keluarga','MUH KOLIL','laki-laki','MAGELANG','1954-03-13','kawin','Petani/Pekebun','PAINI','','BULUSARI',1,1),
(2,'3308135905560001','3308130307102464','istri','TUMINAH','perempuan','MAGELANG','1956-05-19','kawin','Petani/Pekebun','PAINEM','','BULUSARI',1,1),
(3,'3308131212500004','3308130407101591','kepala keluarga','MUHADI','laki-laki','MAGELANG','1950-12-12','kawin','Lainnya','','','BULUSARI',1,1),
(4,'3308131108670003','3308130407101606','kepala keluarga','MUHIDIN','laki-laki','MAGELANG','1967-08-11','kawin','Petani/Pekebun','SITI KHOTIJAH','','BULUSARI',1,1),
(5,'3308137112720075','3308130407101606','istri','SARTINI','perempuan','MAGELANG','1973-12-31','kawin','Petani/Pekebun','SIYEM','','BULUSARI',1,1),
(6,'3308136007000001','3308130407101606','anak','RINI','perempuan','MAGELANG','2000-07-29','belum kawin','Petani/Pekebun','SARTINI','','BULUSARI',1,1),
(7,'3308130605580003','3308130407104971','kepala keluarga','WALYONO','laki-laki','MAGELANG','1958-05-06','kawin','Petani/Pekebun','RUNI','','BULUSARI',1,1),
(8,'3308135207650006','3308130407104971','istri','NASMI','perempuan','MAGELANG','1965-07-12','kawin','Petani/Pekebun','JUMI','','BULUSARI',1,1),
(9,'3308131205550006','3308130407107815','kepala keluarga','PONIRAN','laki-laki','MAGELANG','1955-05-12','kawin','Petani/Pekebun','WAGINAH','','BULUSARI',1,1),
(10,'3308134408570003','3308130407107815','istri','MUYEM','perempuan','MAGELANG','1957-08-04','kawin','Petani/Pekebun','SIAM','','BULUSARI',1,1),
(11,'3308135010140001','3308131211120004','anak','ZULFA UMMULAILA','perempuan','MAGELANG','2014-10-10','belum kawin','Belum/Tidak Bekerja','MULYANAH','','BULUSARI',1,5),
(12,'3308131304400002','3308130407100346','kepala keluarga','WARSONO','laki-laki','MAGELANG','1940-04-13','kawin','Petani/Pekebun','SARINI','','BULUSARI',1,5),
(13,'3308131005550006','3308130307106220','kepala keluarga','WARTONO','laki-laki','MAGELANG','1955-05-10','kawin','Petani/Pekebun','REGET','','BULUSARI',2,6),
(14,'3308133003950006','3308130407107815','anak','WALNO','laki-laki','MAGELANG','1995-03-30','belum kawin','Lainnya','MUYEM','','BUUSARI',1,1),
(15,'3308132308880004','3308130407107815','anak','SANGKRIP PRIHATIN','laki-laki','MAGELANG','1988-08-23','belum kawin','Petani/Pekebun','MUYEM','','BULUSARI',1,1),
(16,'3308132310950001','3308131504170002','kepala keluarga','NGARI','laki-laki','MAGELANG','1995-10-23','kawin','Petani/Pekebun','SARTINI','','BULUSARI',1,1),
(17,'3308105801980003','3308131504170002','istri','YANUAR DWI WAHYUNINGSIH','perempuan','MAGELANG','1997-01-18','kawin','Mengurus Rumah Tangga','MARYUNI','','BULUSARI',1,1),
(18,'3308133112740041','3308130407101594','kepala keluarga','MIFTAHUDIN','laki-laki','MAGELANG','1974-12-31','kawin','Petani/Pekebun','WARTI','','BULUSARI',1,1),
(19,'3308136006850008','3308130407101594','istri','AL ISTIKOMAH','perempuan','MAGELANG','1985-06-20','kawin','Petani/Pekebun','TARIYAH','','BULUSARI',1,1),
(20,'3308130205100001','3308130407101594','anak','HANIF','laki-laki','MAGELANG','2010-05-02','belum kawin','Belum/Tidak Bekerja','AL ISTIKOMAH','','BULUSARI',1,1),
(21,'3308130711450005','3308130307107194','kepala keluarga','NIRTO','laki-laki','MAGELANG','1945-11-07','kawin','Petani/Pekebun','KLINEM','','BULUSARI',1,2),
(22,'3308136306550002','3308130307107194','istri','TURIYAH','perempuan','MAGELANG','1955-06-23','kawin','Petani/Pekebun','SURAMI','','BULUSARI',1,2),
(23,'3308133112740042','3308130407101596','kepala keluarga','KABUL','laki-laki','MAGELANG','1974-12-31','kawin','Wiraswasta','WARSIH','','BULUSARI',1,2),
(24,'3308137112790041','3308130407101596','istri','SUTARTI','perempuan','MAGELANG','1979-12-31','kawin','Petani/Pekebun','TUKIYAH','','BULUSARI',1,2),
(25,'3308132402990009','3308130407101596','anak','NURROHMAN','laki-laki','MAGELANG','1999-02-24','belum kawin','Buruh Harian Lepas','SUTARTI','','BULUSARI',1,2),
(26,'3308130511030002','3308130407101596','anak','MIFTAHUL ANAM','laki-laki','MAGELANG','2003-11-05','belum kawin','Pelajar/Mahasiswa','SUTARTI','','BULUSARI',1,2),
(27,'3308137112750048','3308130407101603','kepala keluarga','LASMI','perempuan','MAGELANG','1975-12-31','kawin','Lainnya','','','BULUSARI',1,2),
(28,'3308137112030005','3308130407101603','anak','RENI SAFITRI','perempuan','MAGELANG','2003-12-31','belum kawin','Lainnya','LASMI','','BULUSARI',1,2),
(29,'3308137112000019','3308130407101603','anak','REFI','perempuan','MAGELANG','2000-12-31','belum kawin','Lainnya','LASMI','','BULUSARI',1,2),
(30,'3308130702830002','3308130407106065','kepala keluarga','URIP PRIHATIN','laki-laki','MAGELANG','1983-02-07','kawin','Wiraswasta','TUKIYAH','','BULUSARI',1,2),
(31,'3308136102840003','3308130407106065','istri','LESTARI','perempuan','MAGELANG','1984-02-21','kawin','Mengurus Rumah Tangga','NOKIYAH','','BULUSARI',1,2);

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
  KEY `id_asalperpindahan` (`id_asalperpindahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_perpindahan` */

/*Table structure for table `tabel_tujuankedatangan` */

DROP TABLE IF EXISTS `tabel_tujuankedatangan`;

CREATE TABLE `tabel_tujuankedatangan` (
  `id_tujuankedatangan` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tujuankedatangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tabel_tujuankedatangan` */

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

/*Data for the table `tabel_tujuanperpindahan` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `activation_selector` (`activation_selector`),
  UNIQUE KEY `forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`email`,`activation_selector`,`activation_code`,`forgotten_password_selector`,`forgotten_password_code`,`forgotten_password_time`,`remember_selector`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values 
(1,'127.0.0.1','administrator','$2y$12$rB9gVIJmL8Q0cWoieCn3L.7uK7O51INOzoYPeG9taXkJZ.RM7E.eu','admin@admin.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1268889823,1564276647,1,'Admin','istrator','ADMIN','0');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(1,1,1),
(2,1,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
