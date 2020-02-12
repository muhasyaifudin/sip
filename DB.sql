CREATE DATABASE  IF NOT EXISTS `db_kependudukan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_kependudukan`;
-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: localhost    Database: db_kependudukan
-- ------------------------------------------------------
-- Server version 5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `login_attempts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (1,'::1','admin@example.com',1580427200);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_asalkedatangan`
--

DROP TABLE IF EXISTS `tabel_asalkedatangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_asalkedatangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_asalkedatangan`
--

LOCK TABLES `tabel_asalkedatangan` WRITE;
/*!40000 ALTER TABLE `tabel_asalkedatangan` DISABLE KEYS */;
INSERT INTO `tabel_asalkedatangan` VALUES (1,'BULUSARI','1','1',NULL,NULL,NULL),(2,'BULUSARI','2','6',NULL,NULL,NULL),(3,'A','1','2','A','B','C'),(4,'A','1','2','A','b','c'),(5,'asda','12','12','SS','KK','asdas'),(6,'asda','12','12','SS','KK','asdas'),(7,'asda','12','12','SS','KK','asdas'),(11,'asda','12','12','SS','KK','asdas'),(12,'asda','12','12','SS','KK','asdas'),(13,'asda','12','12','SS','KK','asdas'),(14,'asda','12','12','SS','KK','asdas'),(15,'asda','12','12','SS','KK','asdas'),(16,'asda','12','12','SS','KK','asdas'),(17,'asda','12','12','SS','KK','asdas'),(18,'asdas','123','123','sdafa','12311','231');
/*!40000 ALTER TABLE `tabel_asalkedatangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_asalperpindahan`
--

DROP TABLE IF EXISTS `tabel_asalperpindahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_asalperpindahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_asalperpindahan`
--

LOCK TABLES `tabel_asalperpindahan` WRITE;
/*!40000 ALTER TABLE `tabel_asalperpindahan` DISABLE KEYS */;
INSERT INTO `tabel_asalperpindahan` VALUES (1,'BULUSARI',1,1),(2,'BULUSARI',2,6);
/*!40000 ALTER TABLE `tabel_asalperpindahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_kedatangan`
--

DROP TABLE IF EXISTS `tabel_kedatangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_kedatangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `id_klasifikasi` int(11) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `id_asalkedatangan` int(11) DEFAULT NULL,
  `id_tujuankedatangan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_klasifikasi` (`id_klasifikasi`),
  KEY `id_penduduk` (`id_penduduk`),
  KEY `id_asalkedatangan` (`id_asalkedatangan`),
  KEY `id_tujuankedatangan` (`id_tujuankedatangan`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kedatangan`
--

LOCK TABLES `tabel_kedatangan` WRITE;
/*!40000 ALTER TABLE `tabel_kedatangan` DISABLE KEYS */;
INSERT INTO `tabel_kedatangan` VALUES (1,'1212','2019-07-13',1,13,NULL,NULL),(2,'1212','2019-07-20',1,13,4,2),(3,NULL,NULL,1,NULL,5,3),(4,NULL,NULL,1,NULL,NULL,NULL),(5,NULL,NULL,1,18,7,5),(9,NULL,NULL,1,22,11,9),(10,NULL,NULL,1,23,12,10),(11,'1212','2020-01-10',1,24,13,11),(12,NULL,NULL,1,25,14,12),(13,NULL,NULL,1,26,15,13),(14,NULL,NULL,1,27,16,14),(15,'Surat12312','2020-01-10',1,28,17,15),(16,'Surat12312','2020-01-10',1,29,18,16);
/*!40000 ALTER TABLE `tabel_kedatangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_kelahiran`
--

DROP TABLE IF EXISTS `tabel_kelahiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_kelahiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_lapor` date DEFAULT NULL,
  `no_akta` varchar(100) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_penduduk` (`id_penduduk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kelahiran`
--

LOCK TABLES `tabel_kelahiran` WRITE;
/*!40000 ALTER TABLE `tabel_kelahiran` DISABLE KEYS */;
INSERT INTO `tabel_kelahiran` VALUES (1,'2014-11-14','3308-LU-01122014-0037',11,'2014-10-10',NULL);
/*!40000 ALTER TABLE `tabel_kelahiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_kematian`
--

DROP TABLE IF EXISTS `tabel_kematian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_kematian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_lapor` date DEFAULT NULL,
  `no_akta` varchar(100) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_penduduk` (`id_penduduk`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_kematian`
--

LOCK TABLES `tabel_kematian` WRITE;
/*!40000 ALTER TABLE `tabel_kematian` DISABLE KEYS */;
INSERT INTO `tabel_kematian` VALUES (1,'2017-10-10','3308-KM-10102017-0017',17,'2017-05-07');
/*!40000 ALTER TABLE `tabel_kematian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_klasifikasi`
--

DROP TABLE IF EXISTS `tabel_klasifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_klasifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_klasifikasi`
--

LOCK TABLES `tabel_klasifikasi` WRITE;
/*!40000 ALTER TABLE `tabel_klasifikasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabel_klasifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_penduduk`
--

DROP TABLE IF EXISTS `tabel_penduduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_penduduk`
--

LOCK TABLES `tabel_penduduk` WRITE;
/*!40000 ALTER TABLE `tabel_penduduk` DISABLE KEYS */;
INSERT INTO `tabel_penduduk` VALUES (1,'3308131303540001','3308130307102464','kepala keluarga','MUH KOLIL','laki-laki','MAGELANG','1954-03-13','kawin','Petani/Pekebun','PAINI','','BULUSARI',1,1),(2,'3308135905560001','3308130307102464','istri','TUMINAH','perempuan','MAGELANG','1956-05-19','kawin','Petani/Pekebun','PAINEM','','BULUSARI',1,1),(3,'3308131212500004','3308130407101591','kepala keluarga','MUHADI','laki-laki','MAGELANG','1950-12-12','kawin','Lainnya','','','BULUSARI',1,1),(4,'3308131108670003','3308130407101606','kepala keluarga','MUHIDIN','laki-laki','MAGELANG','1967-08-11','kawin','Petani/Pekebun','SITI KHOTIJAH','','BULUSARI',1,1),(5,'3308137112720075','3308130407101606','istri','SARTINI','perempuan','MAGELANG','1973-12-31','kawin','Petani/Pekebun','SIYEM','','BULUSARI',1,1),(6,'3308136007000001','3308130407101606','anak','RINI','perempuan','MAGELANG','2000-07-29','belum kawin','Petani/Pekebun','SARTINI','','BULUSARI',1,1),(7,'3308130605580003','3308130407104971','kepala keluarga','WALYONO','laki-laki','MAGELANG','1958-05-06','kawin','Petani/Pekebun','RUNI','','BULUSARI',1,1),(8,'3308135207650006','3308130407104971','istri','NASMI','perempuan','MAGELANG','1965-07-12','kawin','Petani/Pekebun','JUMI','','BULUSARI',1,1),(9,'3308131205550006','3308130407107815','kepala keluarga','PONIRAN','laki-laki','MAGELANG','1955-05-12','kawin','Petani/Pekebun','WAGINAH','','BULUSARI',1,1),(10,'3308134408570003','3308130407107815','istri','MUYEM','perempuan','MAGELANG','1957-08-04','kawin','Petani/Pekebun','SIAM','','BULUSARI',1,1),(11,'3308135010140001','3308131211120004','anak','ZULFA UMMULAILA','perempuan','MAGELANG','2014-10-10','belum kawin','Belum/Tidak Bekerja','MULYANAH','','BULUSARI',1,5),(12,'3308131304400002','3308130407100346','kepala keluarga','WARSONO','laki-laki','MAGELANG','1940-04-13','kawin','Petani/Pekebun','SARINI','','BULUSARI',1,5),(13,'3308131005550006','3308130307106220','kepala keluarga','WARTONO','laki-laki','MAGELANG','1955-05-10','kawin','Petani/Pekebun','REGET','','BULUSARI',2,6),(14,'','','kepala keluarga','','laki-laki','','0000-00-00','kawin','','','','',0,0),(15,'','','kepala keluarga','','laki-laki','','0000-00-00','kawin','','','','',0,0),(16,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(17,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(18,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(22,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(23,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(24,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(25,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(26,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(27,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(28,'12312','1231','kepala keluarga','asda','laki-laki','12312','2020-01-07','belum kawin','asd','asdas','asd','asdas',322,234),(29,'1231231','123123','kepala keluarga','Udiiasoid','laki-laki','1231231','2020-01-09','kawin','asda','asd','asdas','asd',123,1231);
/*!40000 ALTER TABLE `tabel_penduduk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_pengajuan`
--

DROP TABLE IF EXISTS `tabel_pengajuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `nama_pengirim` varchar(45) DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `sub_jenis` varchar(45) DEFAULT NULL,
  `status_pengajuan` varchar(45) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `id_kedatangan` int(11) DEFAULT NULL,
  `id_perpindahan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_pengajuan`
--

LOCK TABLES `tabel_pengajuan` WRITE;
/*!40000 ALTER TABLE `tabel_pengajuan` DISABLE KEYS */;
INSERT INTO `tabel_pengajuan` VALUES (1,'0000-00-00','','perpindahan_datang','perpindahan_datang','0',NULL,'asdas',NULL,NULL),(2,'0000-00-00','','perpindahan_datang','perpindahan_datang','0',NULL,'asdas',NULL,NULL),(3,'2020-01-09','','perpindahan_datang','perpindahan_datang','0',NULL,'asdas',NULL,NULL),(4,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','0',NULL,'xczx',NULL,NULL),(5,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','0',NULL,'xczx',NULL,NULL),(6,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','0',NULL,'xczx',11,NULL),(7,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','0',NULL,'xczx',12,NULL),(8,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','0',NULL,'xczx',13,NULL),(9,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','0',NULL,'xczx',14,NULL),(10,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','1',NULL,'xczx',15,NULL),(11,'2020-01-09','Udin','perpindahan_datang','perpindahan_datang','1',NULL,'1231',16,NULL);
/*!40000 ALTER TABLE `tabel_pengajuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_perpindahan`
--

DROP TABLE IF EXISTS `tabel_perpindahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_perpindahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `id_klasifikasi` int(11) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `id_tujuanperpindahan` int(11) DEFAULT NULL,
  `id_asalperpindahan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tujuanperpindahan` (`id_tujuanperpindahan`),
  KEY `id_asalperpindahan` (`id_asalperpindahan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_perpindahan`
--

LOCK TABLES `tabel_perpindahan` WRITE;
/*!40000 ALTER TABLE `tabel_perpindahan` DISABLE KEYS */;
INSERT INTO `tabel_perpindahan` VALUES (1,'1212','2019-07-19',1,2,NULL,1),(2,'1212','2019-07-12',1,12,2,2);
/*!40000 ALTER TABLE `tabel_perpindahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_tujuankedatangan`
--

DROP TABLE IF EXISTS `tabel_tujuankedatangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_tujuankedatangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_tujuankedatangan`
--

LOCK TABLES `tabel_tujuankedatangan` WRITE;
/*!40000 ALTER TABLE `tabel_tujuankedatangan` DISABLE KEYS */;
INSERT INTO `tabel_tujuankedatangan` VALUES (1,'A                            \r\n                        ',1,2),(2,'a                            \r\n                        ',1,2),(3,'asdas',322,234),(4,'asdas',322,234),(5,'asdas',322,234),(9,'asdas',322,234),(10,'asdas',322,234),(11,'asdas',322,234),(12,'asdas',322,234),(13,'asdas',322,234),(14,'asdas',322,234),(15,'asdas',322,234),(16,'asd',123,1231);
/*!40000 ALTER TABLE `tabel_tujuankedatangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_tujuanperpindahan`
--

DROP TABLE IF EXISTS `tabel_tujuanperpindahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tabel_tujuanperpindahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(200) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten_kota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_tujuanperpindahan`
--

LOCK TABLES `tabel_tujuanperpindahan` WRITE;
/*!40000 ALTER TABLE `tabel_tujuanperpindahan` DISABLE KEYS */;
INSERT INTO `tabel_tujuanperpindahan` VALUES (1,'1','12','12','A','B','C'),(2,'AA                   \r\n                        ','1','2','A','B','D');
/*!40000 ALTER TABLE `tabel_tujuanperpindahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2y$12$GbDBxXIJxSnyHqsGuQ41IegWvFqWAujdVokhMmv27l9FZvtq4AwBS','admin@admin.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1268889823,1580432288,1,'Admin','istrator','ADMIN','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,1,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_kependudukan'
--

--
-- Dumping routines for database 'db_kependudukan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-12 19:04:48
