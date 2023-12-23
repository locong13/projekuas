-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Apr 2023 pada 14.44
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpus_lsp`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampillog`()
BEGIN
    SELECT log_activity.*,penerbit.nama_penerbit FROM penerbit,log_activity WHERE penerbit.id_penerbit=log_activity.id_penerbit;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`id_buku` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_penerbit`, `judul_buku`, `jumlah`) VALUES
(2, 2, 'Pemrograman Android', 26),
(3, 8, 'Mahir Pemrograman Web dalam 10 Jam', 5),
(4, 8, 'Pemrograman Dasar', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE IF NOT EXISTS `log_activity` (
`id_log` int(11) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_activity`
--

INSERT INTO `log_activity` (`id_log`, `id_penerbit`, `ip`, `agent`, `waktu`) VALUES
(10, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-04-06 06:48:50'),
(11, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-04-06 09:06:52'),
(12, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-04-07 18:05:38'),
(13, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0', '2023-04-07 18:10:03'),
(14, 8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-04-08 14:06:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
`id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `tahun` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `tahun`, `email`, `password`) VALUES
(2, 'Yudistira', 2000, 'yudistira@gmail.com', 'yu123'),
(4, 'Bumi Aksara', 2021, 'aksara@gmail.com', 'aksara123'),
(8, 'Informatika', 2023, 'info@gmail.com', 'info123');

--
-- Trigger `penerbit`
--
DELIMITER //
CREATE TRIGGER `hapus_data_penerbit` AFTER DELETE ON `penerbit`
 FOR EACH ROW BEGIN
DELETE FROM buku
WHERE id_penerbit=old.id_penerbit;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewrelasi`
--
CREATE TABLE IF NOT EXISTS `viewrelasi` (
`id_buku` int(11)
,`id_penerbit` int(11)
,`judul_buku` varchar(100)
,`jumlah` int(11)
,`nama_penerbit` varchar(100)
,`tahun` int(5)
,`email` varchar(50)
,`password` varchar(32)
);
-- --------------------------------------------------------

--
-- Struktur untuk view `viewrelasi`
--
DROP TABLE IF EXISTS `viewrelasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewrelasi` AS select `buku`.`id_buku` AS `id_buku`,`buku`.`id_penerbit` AS `id_penerbit`,`buku`.`judul_buku` AS `judul_buku`,`buku`.`jumlah` AS `jumlah`,`penerbit`.`nama_penerbit` AS `nama_penerbit`,`penerbit`.`tahun` AS `tahun`,`penerbit`.`email` AS `email`,`penerbit`.`password` AS `password` from (`buku` join `penerbit`) where (`penerbit`.`id_penerbit` = `buku`.`id_penerbit`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`id_buku`), ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
 ADD PRIMARY KEY (`id_log`), ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
 ADD PRIMARY KEY (`id_penerbit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
ADD CONSTRAINT `log_activity_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
