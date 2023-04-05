CREATE DATABASE IF NOT EXISTS `produktif`;

ALTER DATABASE produktif
	DEFAULT CHARACTER SET UTF8MB4;
	
ALTER DATABASE produktif
	DEFAULT COLLATE UTF8MB4_UNICODE_CI;

USE `produktif`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`nama`, `alamat`) VALUES
	('Anton Suhendar', 'Sumedang'),
   ('Budi Haryanto', 'Jakarta'),
   ('I Gusti Mahawirasena', 'Bali');
