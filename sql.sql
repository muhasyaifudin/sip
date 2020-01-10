USE db_kependudukan;

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


ALTER TABLE `db_kependudukan`.`tabel_kedatangan` 
CHANGE COLUMN `id_datang` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_asalkedatangan` 
CHANGE COLUMN `id_asalkedatangan` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_asalperpindahan` 
CHANGE COLUMN `id_asalperpindahan` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_kelahiran` 
CHANGE COLUMN `id_kelahiran` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_kematian` 
CHANGE COLUMN `id_kematian` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_klasifikasi` 
CHANGE COLUMN `id_klasifikasi` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_penduduk` 
CHANGE COLUMN `id_penduduk` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_perpindahan` 
CHANGE COLUMN `id_pindah` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_tujuankedatangan` 
CHANGE COLUMN `id_tujuankedatangan` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `db_kependudukan`.`tabel_tujuanperpindahan` 
CHANGE COLUMN `id_tujuanperpindahan` `id` INT(11) NOT NULL AUTO_INCREMENT;

