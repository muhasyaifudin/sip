ALTER TABLE `db_kependudukan`.`tabel_pengajuan` 
ADD COLUMN `id_kematian` INT(11) NULL DEFAULT NULL AFTER `id_perpindahan`,
ADD COLUMN `id_kelahiran` INT(11) NULL DEFAULT NULL AFTER `id_kematian`;
