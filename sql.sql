CREATE TABLE `tabel_informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT '1',
  `like` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
