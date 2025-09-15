-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2024 at 03:00 PM
-- Server version: 8.0.40-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimapust_data_perpus`
--
CREATE DATABASE IF NOT EXISTS `bimapust_data_perpus` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bimapust_data_perpus`;

-- --------------------------------------------------------

--
-- Table structure for table `log_pinjam`
--

CREATE TABLE `log_pinjam` (
  `id_log` int NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama`, `jekel`, `kelas`, `no_hp`) VALUES
('11', 'Bima Adhi Pratama Kharis ', 'Laki-laki', 'XII.F5', '0895418197532'),
('12', 'Aji Chandra Kusuma', 'Laki-laki', 'XII.F5', '089886777'),
('19', 'AJI CHANDRA KUSUMA', 'Laki-laki', 'XII.F5', '08966666666'),
('7', 'Mahasin Dharmawan', 'Laki-laki', 'XI.F5', '08888888888');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int NOT NULL,
  `judul_buku` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengarang` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penerbit` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `th_terbit` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `drive_url` text COLLATE utf8mb4_general_ci,
  `category` enum('Sains','Sosial','Sejarah','Agama','Seni','Komik & Cerita') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`, `drive_url`, `category`) VALUES
(510, 'Kategori Cerita ', 'admin', 'admin', '2024', 'google.com', 'Komik & Cerita'),
(509, 'Kategori Sosial', 'admin', 'admin', '2024', 'google.com', 'Sosial'),
(508, 'pdf-div-class-2qs3tf-truncatedtext-module-wrapper-fg1km9p-classtruncatedtext-module-lineclamped-85ulhh-style-max-lines5buku-bahasa-indonesia-p-div_compress.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1fhCsWL7bpwVlIcb1F-vpeinZJLXzZkXk/view?usp=sharing', 'Sains'),
(507, 'MEGA BANK SBMPTN SAINTEK 20_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1rSy8vW8IAxfhLx9bXkmq1LjrAJ5y3-Kq/view?usp=sharing', 'Sains'),
(506, 'Ensiklopedia Kimia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1rZqQmtdiZwkmeooctBl6K6zgiM1nxaUA/view?usp=sharing', 'Sains'),
(505, 'Kitab Sakti Kumpulan Rumus_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1niQBdMYDmnAAdKQe0YqQCudBqL9-uTva/view?usp=sharing', 'Sains'),
(504, 'Mega book 6 mata pelajaran.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1skOFyGENhxHHPu43xP0hGjRPm0Nxx3QO/view?usp=sharing', 'Sains'),
(503, 'pdfcoffee.com_buku-pintar-matematika-ma-sma-pdf-free.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cntGjvjbD_QEEd4uMXJhID0PcneF42pH/view?usp=sharing', 'Sains'),
(502, 'Ruang Angkasa (Space) Ensik_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1t9PEGMR6XgtgvvtBa2ool4XN5_iUmQWX/view?usp=sharing', 'Sains'),
(501, 'Cara Pintar Gila Matematika_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1zPYmpHP76XXFrUywx0aDFcsLgJBaDouD/view?usp=sharing', 'Sains'),
(500, 'Cara Cepat Menyelesaikan Pe_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1lR-tneuq9T3L-JIkUXwK91S7N-ytkrQ8/view?usp=sharing', 'Sains'),
(499, 'pdfcoffee.com_pintar-matematika-tanpa-bimbel-sma-x-xi-xii-noti-lansaroni-ssipdf-2-pdf-free.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1At5oiM_QGWCR-N9okPRNyFlRyhEdMl2v/view?usp=sharing', 'Sains'),
(498, 'pdfcoffee.com_panduan-belajar-termux-pdf-free.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Ht0Fy9eLGUUaeQUiga5JLvf-gjOnY6pe/view?usp=sharing', 'Sains'),
(497, 'Tips Singkat & Galeri Fotografi Ponsel - Tim Ka Noer (Tantri Ida Nursanti), Jonronny, Jonis Jo.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1BOci7tDQR_wuyjk-D_MbPrGUdEbl_irq/view?usp=sharing', 'Sains'),
(496, 'kumpulan-rumus-cepat-matematika-sma.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17Rgvje9yyTC1wtNWSKE-lukJHT3_EBZe/view?usp=sharing', 'Sains'),
(495, '40 Algorithms Every Programmer Should Know.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1MSJbQtEMLOCzqfFF5oAWYz2Ik8k-Fx6N/view?usp=sharing', 'Sains'),
(494, '101 Tip  Trik Kamera Digita_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15f5PHT4bvozdub3FbW_iEoYJG2JhRltY/view?usp=sharing', 'Sains'),
(493, 'Bumi  Antariksa Konsep  Pan_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/13kMKFE2Y6j7Amn3N3QcErvph3pQ_vz14/view?usp=sharing', 'Sains'),
(492, 'Cara Cepat Menyelesaikan Perkalian - Harris Syamsi Yulianto.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17IvUJtQcK_bhhlAkoFDTSytJFQw3_j6N/view?usp=sharing', 'Sains'),
(491, '100 Pengetahuan Tentang Cuaca - Pakar Raya Pustaka.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1p1pWH36g0G2wzMpkhV9gSCk386IlBt33/view?usp=sharing', 'Sains'),
(490, 'Ensiklopedia_Dunia_Fauna_Jilid_2_Fakta_Unik_&_Menakjubkan_Seputar.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1NT0OQpZtaPOZ-rGohf7j38VAYNhPhWBA/view?usp=sharing', 'Sains'),
(489, 'Ensiklopedia_Dunia_Fauna_Jilid_3_Fakta_Unik_&_Menakjubkan_Seputar.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17_2ys7YaRuw3vMW900PfRAao_S0TXBjv/view?usp=sharing', 'Sains'),
(488, 'Ensiklopedia Penyakit (Prof_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1XUHU5_GJOMJ6u6JoaioE7XoGY2Eg9UTj/view?usp=sharing', 'Sains'),
(487, 'Ensiklopedia Jelajah Dunia Matematika - Janu Ismadi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Ej8tW4LtDpGz74V3Qu0hHuiF-R-THllW/view?usp=sharing', 'Sains'),
(486, 'Ensiklopedia Digital Planet_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18bZl1NQ0mMjGAJcLbPhhl9nw7KBHTGIz/view?usp=sharing', 'Sains'),
(485, 'Ensiklopedia Pengetahuan 2_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Wt52bnDZHrmp3X7tjNXFCIbHwr_v2tCi/view?usp=sharing', 'Sains'),
(484, 'Ensiklopedia Dunia Fauna Jilid 1 - Buku Anak Indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/14h3dz8a_O_cb6Luy2YbWC8WSwDWvPYrk/view?usp=sharing', 'Sains'),
(483, 'Ensiklopedia Jelajah Dunia_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1J6NvzJCga_az5xOzld_ph9cx-TUMLc-a/view?usp=sharing', 'Sains'),
(482, 'Ensiklopedia Dunia Fauna Jilid 3 - Buku Anak Indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FCcm6Pibc3v8JhXIxnFiT7HA4MyMWXiE/view?usp=sharing', 'Sains'),
(481, 'Ensiklopedia Dunia Fauna Jilid 2 - Buku Anak Indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16fKvzv9_I9ZDKSbyNYEm14m_p_zGOU-C/view?usp=sharing', 'Sains'),
(480, 'Ensiklopedia_Jus_Buah_&_Sayur_Untuk_Penyembuhan_Dr_Abednego_Bangun.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pWB3tN6IOk0dcJ-u6WhG3qGOC_Ek7pVa/view?usp=sharing', 'Sains'),
(479, 'Buku - Teknologi Masa Depan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1v60xo-LP4kiWeMOnvM8PV09o49jOMihb/view?usp=sharing', 'Sains'),
(478, 'Ensiklopedia_Dunia_Fauna_Jilid_1_Fakta_Unik_&_Menakjubkan_Seputar.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1lKcJcFnnXayj8awAQE8seCmlBxDX5nRW/view?usp=sharing', 'Sains'),
(477, 'Kitab Masakan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1H37NkfsZcoDYPnuAnEJ7h_VwCT1H4BJz/view?usp=sharing', 'Sains'),
(476, 'LANGKAH - Langkah Mail Merger.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1XY2F6dvH9K5Bc0YJ9BoSz0R3LNfHXp1s/view?usp=sharing', 'Sains'),
(475, 'Sains dan Dunia Modern.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1OnbiInSAYKqKxTiKPA3zuLVXKhwHfVNh/view?usp=sharing', 'Sains'),
(474, 'Pemrograman C++ Untuk SMK (_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IqrCKrWQlVLqHZgnwc_98pS0E7UBwdOY/view?usp=sharing', 'Sains'),
(473, 'Fakta Paling Top Alam Semes_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IMZRyuNSNxxL5nwXaqOEKACzee15tCgH/view?usp=sharing', 'Sains'),
(471, 'Judul Buku Baru', 'Nama Pengarang', 'Nama Penerbit', '2024', 'http://driveurl.com/file', 'Sains'),
(472, '7 Jam Membuat Website Mulai_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IwxTt4wlE8FtzIO1SzvGnslv5TK8vkRE/view?usp=sharing', 'Sains');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int NOT NULL,
  `nama_pengguna` varchar(225) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('Administrator','Petugas','User','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Bima Adhi Pratama Kharis', 'khadmin123', 'khbimakha23*', 'Administrator'),
(7, 'Mahasin Dharmawan', 'mahasin', '123', 'User'),
(11, 'Bima Adhi Pratama Kharis ', 'bimastar', 'star123', 'User'),
(12, 'Mahasin Dharmawan', 'mahasin111', '1122334455', 'Petugas'),
(19, 'AJI CHANDRA KUSUMA', 'ajicha', '123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sirkulasi`
--

CREATE TABLE `tb_sirkulasi` (
  `id_sk` varchar(20) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('PIN','KEM') NOT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  `telat_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_sirkulasi`
--
ALTER TABLE `tb_sirkulasi`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_pinjam`
--
ALTER TABLE `log_pinjam`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--


--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `bimapust_data_perpus` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `bimapust_data_perpus`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `query` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_length` text COLLATE utf8mb3_bin,
  `col_collation` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8mb3_bin DEFAULT '',
  `col_default` text COLLATE utf8mb3_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `settings_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `template_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tables` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `page_nr` int UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tables` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('phpmyadmin', '[{\"db\":\"data_perpus\",\"table\":\"tb_buku\"},{\"db\":\"data_perpus\",\"table\":\"tb_pengguna\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pdf_page_number` int NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `prefs` text COLLATE utf8mb3_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `version` int UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8mb3_bin NOT NULL,
  `schema_sql` text COLLATE utf8mb3_bin,
  `data_sql` longtext COLLATE utf8mb3_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8mb3_bin DEFAULT NULL,
  `tracking_active` int UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('phpmyadmin', '2024-12-07 08:00:05', '{\"Console\\/Mode\":\"show\",\"NavigationWidth\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8mb3_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
