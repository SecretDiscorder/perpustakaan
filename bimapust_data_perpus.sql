-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2024 at 06:46 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.30

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(225) DEFAULT NULL,
  `pengarang` varchar(225) DEFAULT NULL,
  `penerbit` varchar(225) DEFAULT NULL,
  `th_terbit` varchar(10) DEFAULT NULL,
  `drive_url` text DEFAULT NULL,
  `category` enum('Sains','Sosial','Sejarah','Agama','Seni','Komik & Cerita','Bahasa') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`, `drive_url`, `category`) VALUES
(510, 'Ensiklopedia Bumi dan Energi', 'null', 'null', '0', 'https://drive.google.com/file/d/19i3kCzKSHaGuw-MmALTyL_RSse120QlG/view?usp=drive_link', 'Sains'),
(509, 'Terampil Bermusik', '', '', '0', 'https://drive.google.com/file/d/1f6yGUnvbhm9hHe2GYcPVKTkXYTG6meOf/view?usp=drive_link', 'Seni'),
(508, 'Modul HTML CSS DIV', '', '', '0', 'https://drive.google.com/file/d/1fhCsWL7bpwVlIcb1F-vpeinZJLXzZkXk/view?usp=sharing', 'Sains'),
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
(471, 'Seni Tari', '', '', '', 'https://drive.google.com/file/d/1JaxL875iQ5HS_CHxlpLRVAHnNcCn4RPw/view?usp=drive_link', 'Seni'),
(472, '7 Jam Membuat Website Mulai_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IwxTt4wlE8FtzIO1SzvGnslv5TK8vkRE/view?usp=sharing', 'Sains'),
(511, 'Aliran Seni Lukis', '', '', '', 'https://drive.google.com/file/d/1IH10hYJVK9ztbnjshBoy9fNFo3uPlkcU/view?usp=sharing', 'Seni'),
(512, 'Animation of Mechanic Motion', '', '', '', 'https://drive.google.com/file/d/1KEJcb2AdZePW7r0JSsFWZZkb-LC9yi3v/view?usp=drive_link', 'Seni'),
(513, 'Solo Levelling (Komik)', '', '', '', 'https://drive.google.com/drive/folders/19BZq6KvBy51Fgsf1AOk9om7zgK4PlHkm?usp=drive_link', 'Komik & Cerita'),
(514, '1001 Malam', '', '', '', 'https://drive.google.com/drive/folders/1Z8MZGVyDKPGZ6voCGajrxqyDWs_Dg9mC?usp=drive_link', 'Komik & Cerita'),
(515, 'Kisah-Kisah Teladan Rasulul_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1Iv_6nVQm5cN5OtLVRurH6QvrpSQfxf2t/view?usp=sharing', 'Agama'),
(516, 'Penciptaan Alam Raya (Harun_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1Io1NSiHuOlIaWb0bNZu9hRRnR-4HbJ5h/view?usp=sharing', 'Agama'),
(517, 'studi hadits_ok.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_TLiN08eyHgEzx0BcDlZGmjfGU8f3ZjH/view?usp=sharing', 'Agama'),
(518, 'Sumbangan Peradaban Islam Untuk Dunia - Roghib As Sirjani.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1-tI2h8pIsPI74x8nhT55hXebcBZt--SR/view?usp=sharing', 'Agama'),
(519, 'Tauhid Kalam 2014.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1WBVsJe7vY-inBdtgdLP2IXTqpyFOI4jZ/view?usp=sharing', 'Agama'),
(520, 'Tarekat Naqsabandiyah di Kepulauan Melayu - Kajian Atas Naskah Kaifiyah Al-Zikir ‘Ala Tharīqah An-Naqsabandiyah Al-Mujaddidiyah Al-Ahmadiyah -Dr. Muhammad Faisal, M.Ag-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1QKt-qSG-NOw5TDik8c0x-aNhcSELCbY3/view?usp=sharing', 'Agama'),
(521, 'TANYA JAWAB NAHWU DAN SHARF.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_j7MtwTgKtP-kUCkTqMjp0b0U-k504I_/view?usp=sharing', 'Agama'),
(522, 'Terjemah - Demi Masa Yusuf Qordlowi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/12o3A93JjWO_PXkdlYLUP-rA2nX0T35Yv/view?usp=sharing', 'Agama'),
(523, 'Tuntunan_Shalat_Untuk_Warga_NU_dan_Dalil_Dalilnya_KH_Muhammad_Sholeh.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/11eEP9FKyc3YE2NXmz7qzKPJWrGw4kuMH/view?usp=sharing', 'Agama'),
(524, 'Tuntunan Baca Tulis Pegon (_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1NvLFprq_YENjF-tcq9jEs29fm7VGucbE/view?usp=sharing', 'Agama'),
(525, 'Tuntunan sholat lengkap.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1KZyoprFzfjkMn2-D17MhmtVAGZc-7fLt/view?usp=sharing', 'Agama'),
(526, 'Shahih_bukhari_muslim.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pdkyhrNh-lejjSTrbAuRig5Aj-_ZoJrh/view?usp=sharing', 'Agama'),
(527, 'yajuj-majuj.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ZkNQWy4_6S226EcbdV3oKNFoctGLY3vm/view?usp=sharing', 'Agama'),
(528, 'ILMU-HADITS-PDFDrive-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LcMP27kZiGc7RzT0L7dW27nwol80GxSI/view?usp=sharing', 'Agama'),
(529, 'Rahasia Puasa (Asraru Shaum) - Imam Al-Ghazali.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1OAGGg6ZgYP8sYdzp1XsoE-acUFffiRVB/view?usp=sharing', 'Agama'),
(530, 'panduan_sholat.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1RKLQrB2AITVWPBPH24NMLw7NfOgfhSDe/view?usp=sharing', 'Agama'),
(531, 'Khutbah_Nabi_Terlengkap_&_Terpilih_Muhammad_Khalil_Khathib.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cbSe7xebMxyAIZylq5ZWLW3oXrA9uinY/view?usp=sharing', 'Agama'),
(532, 'Istri_&_Putri_Rasulullah_SAW_Mengenal_dan_Mencintai_Ahlul_Bait_Abdullah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VVpqfrsFOIl1tYshIheuhuonwlYjzGnb/view?usp=sharing', 'Agama'),
(533, 'PERBANDINGAN MAZIIAB .pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dofKlALcVae_522TRtchbkv52D8VLyag/view?usp=sharing', 'Agama'),
(534, 'IlmuSharafUntukPemula.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cbv_nIpf9UyN4YtNNlqdOO4NMz6RkYS-/view?usp=sharing', 'Agama'),
(535, 'PENGANTAR ILMU HADIS FINAL.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Rnu07nBRuALSKf3QgbK1gwwwBhQDft_U/view?usp=sharing', 'Agama'),
(536, 'Isteri & Puteri Rasulullah [Abdullah Haidir].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1PnOeRtoecMOVhV8iNVGdzJ0flfmhAZVZ/view?usp=sharing', 'Agama'),
(537, 'Roh (Ibnu Qayyim Al-Jauziyah) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1YrvnT4Iyi9l7Vvp96gMNWAnbFMJH4-VJ/view?usp=sharing', 'Agama'),
(538, 'id_the_book_of_tawheed.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dwUiinOl5jguVsi0Ul0LGaya5gRBNsfm/view?usp=sharing', 'Agama'),
(539, 'ilmu hadis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1b-t_az22zrZrQPd0Znw3s8a4-Wk5WxzG/view?usp=sharing', 'Agama'),
(540, 'Prahara Padang Mahsyar - Dr. Ahmad Musthafa Mutawalli.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VVoRFBuCPBTpw51KUDd4kTYu-4L919Oj/view?usp=sharing', 'Agama'),
(541, 'Ilmu Tauhid Tingkat Dasar.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1YsEPR6JgaHxN-Etuyr6z1LbkGld4KPwh/view?usp=sharing', 'Agama'),
(542, 'Kisah-kisah Shahih dalam Al-Qur\'an.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1bO2twpWfkaMnFGHf_vmGZE6pt5Wr53Ux/view?usp=sharing', 'Agama'),
(543, 'Menuju Islam Rasional.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1JbgzVLZDQhnZ9KawMhdR3qqEVGM_qmtP/view?usp=sharing', 'Agama'),
(544, 'Mukjizat di Sekitar Kita - Seri Chicken Soup For The Soul.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1DuxCOjmHWiFLCfwOq-W36WFkYkh2yL8m/view?usp=sharing', 'Agama'),
(545, 'Kisah Mualaf Paling Seru -Pena Kreativa-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Bu0jsO4AP3Hh1CuHj-fTMEAAr7_GhudP/view?usp=sharing', 'Agama'),
(546, 'Juz \'Amma Al-Madinah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1B8pZAM7LyfEHkjRiKBnhs2NZPh0wWlU3/view?usp=sharing', 'Agama'),
(547, 'Musawar-Belajar Mudah Ilmu Sharaf.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/19yrtRwWZuuDqCmJF-2L7C-pCV_TxDozs/view?usp=sharing', 'Agama'),
(548, 'Qoidah-qoidah ilmu nahwu dan Sharaf.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/10CGL0P5Z3d0NSXxe1nH17s3hmunN4-VS/view?usp=sharing', 'Agama'),
(549, 'Islam-BS-KLS-X.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1AS_np7cgQzKBegGKInwLX5zVZ49XJeWR/view?usp=sharing', 'Agama'),
(550, 'Ruqyah_Jin,_Sihir_dan_Terapinya_Syaikh_Wahid_Abdussalam_Bali_Z_Library.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/182yBRpKwcJYHPxEh7PT0oVK8s4KYu-VA/view?usp=sharing', 'Agama'),
(551, 'Ringkasan nahwu sharaf.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1JOO8dz8cgG9s9wW9_IN9uTlkbV2O_7we/view?usp=sharing', 'Agama'),
(552, 'Memahami_Tujuan_Pokok_Berpuasa_Maqashid_Ash_Shiyam_Syeikh_Izzuddin.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1A_9yLzDwcDLVMn79xpZGp2TFhGyuPifP/view?usp=sharing', 'Agama'),
(553, 'Mengenal_Masjidil_Aqsha_Pusat_Barakah_Bagi_Seluruh_Dunia_Sahabat.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/13N4PXjv0ecsTbNIy-0MuNbpnVZT174ae/view?usp=sharing', 'Agama'),
(554, 'Buku - Cara Cepat Belajar Tajwid Praktis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pWa9Yuw4FfN-lllX-m2WGTifrVmrG4SN/view?usp=sharing', 'Agama'),
(555, 'Ensiklopedi Aliran dan Madzhab di Dunia Islam.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1qWg_avKK3C6cyZo_KbZJHo8TvowPFR3h/view?usp=sharing', 'Agama'),
(556, 'Fikih_Umrah_Menurut_Madzhab_Imam_Syafi’i_Wahyudi_Ibnu_Yusuf.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1vw2snWmnEeJAMv70bBzZ87A5oBOorxPj/view?usp=sharing', 'Agama'),
(557, 'Fathul-Baari-Syarah-Hadits-Bukhari 2 (1).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1enP8kqvbdr87JF4Qj91jq4RvVdAkcQnw/view?usp=sharing', 'Agama'),
(558, 'Ensiklopedi Hadits-Hadits Adab (Imam Bukhari) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Mjd5QeNYo6QMMzpBydypoSefPD8tCa9x/view?usp=sharing', 'Agama'),
(559, 'Fiqih Islam Lengkap Madzhab Syafi\'i.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1NlI_NYAhoJYVCvm482nnINRxkj0YMkWE/view?usp=sharing', 'Agama'),
(560, 'Fikih-Ibadah-PDFDrive-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FnVB6Q7Yu7YGoXmXFW4ScHtuwgci6A5_/view?usp=sharing', 'Agama'),
(561, 'Buku Studi Akhlak.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1UF4b9_W34mTFAa8W0hHk6WWAyjY9CMRy/view?usp=sharing', 'Agama'),
(562, 'Ensiklopedi Akhir Zaman -Dr. Muhammad Ahmad Al-Mubayyadh-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1bxw8Xs85kI4m90Syf77YtoIYM-RM1cRP/view?usp=sharing', 'Agama'),
(563, 'Fathul-Baari-Syarah-Hadits-Bukhari 2.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VIvrj3fHdCnM2f-kL7UgNHELmkIPLV9Z/view?usp=sharing', 'Agama'),
(564, 'ebook-ilmu-sharaf-untuk-pemula-cetakan-2-revisi-3.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1EaRYOPzebu2EhyKc6LofHpLEy-j-qFLj/view?usp=sharing', 'Agama'),
(565, 'Fikih Akhlak (Musthafa al-Adawy) (z-lib.org).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1JTV-DqfHP10fJjKgebjNf7qWg3s2CHe5/view?usp=sharing', 'Agama'),
(566, 'umar kayam.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/176puVd-1piYKMCWnOtbtmECVW2QhRR7j/view?usp=sharing', 'Agama'),
(567, '7 Cara Identifikasi Riba (74 Halaman) - Ahmad Suryana.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1q7Rtp1ZJJ4D8ikYJ08YgKM8X_5qJOQvT/view?usp=sharing', 'Agama'),
(568, '1.475) 40 Hadis Tentang Dakwah dan Tarbiah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1xMz2xA1Rbn2hLAismVVjqT4D4PjPUE2Y/view?usp=sharing', 'Agama'),
(569, 'Awas_Fenomena_Syirik_di_Sekitar_Kita_Abu_Ubaidah_Yusuf_Bin_Mukhtar.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1lM2Mhm_03ihaxiD2PKhhBeLvLVyVUQOx/view?usp=sharing', 'Agama'),
(570, '67 Faedah Terkait Kurban - Syaikh Muhammad Salih Al-Munajjid.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1yGmo9-xkk7PkDI1x9mCPErFy-5qa2BFQ/view?usp=sharing', 'Agama'),
(571, 'Alam Jin (Imam As-Suyuthy) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1nqBKVeBNKPfu8E-9P_MMFztGtYcN0v7D/view?usp=sharing', 'Agama'),
(572, 'Bencana_Bencana_Besar_Dalam_Sejarah_Islam_Dr_Fathi_Zaghrut.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1lzeQopoMDJyWHO7duXvsYE-yZMu5Sb19/view?usp=sharing', 'Agama'),
(573, '1.250) Kamus Ilmu Hadis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pRI-3GteD6P2gAS8EQJ3lyu9KiPOtpYU/view?usp=sharing', 'Agama'),
(574, '\'Ali_ibn_Abi_Thalib_Khalifah_Nabi_Tercinta_Khalid_Muhammad_Khalid.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1yos8U7ax498rSUOjKUNhb3d_KwLrolTa/view?usp=sharing', 'Agama'),
(575, '1.197) Studi Ilmu Hadis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1yIyu_52VAGeiM-ojAUlDt3CpgA-XDVfQ/view?usp=sharing', 'Agama'),
(576, '1.382) Metode dan Pendekatan Dalam Syarah Hadis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1xRjBYRaKXPR3khpF7d_x5XOLZnZCK6NO/view?usp=sharing', 'Agama'),
(577, '6. Hasbi; Buku Ilmu Tauhid.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16U19WLP8kZ0tNnQkvrcXgP9qKIH_qxQJ/view?usp=sharing', 'Agama'),
(578, 'Alquran_&_Terjemahannya_Edisi_Penyempurnaan_Kemenag_RI.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1DKwTrO7xSl8fK7Qk9nsVXKzsJlbg9FGz/view?usp=sharing', 'Agama'),
(579, '855) 40 Hadis Palsu Populer.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/10ENftKjvng5Os9NFIHqWtaMNPj3PPmWZ/view?usp=sharing', 'Agama'),
(580, 'Revolusi Hidup Sehat ala Rasulullah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1JGexQnJOhVKB-x6VtcSgiUujCKj9VrJ8/view?usp=sharing', 'Agama'),
(581, 'AlGhazali_Hai_Anak.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1AHsEUOk5DLkQo__JollOrx4-8yDUp2Ww/view?usp=sharing', 'Agama'),
(582, '122. Quranic Law Of Attraction- Meraih Asa Dengan Energi Kalam Ilahi(1).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/19wJUgOTSTe0MYg8HJ0c0mZkVsQ_u9B1t/view?usp=sharing', 'Agama'),
(583, '27 Keutamaan Shalat Berjamaah di Masjid.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/110qmAfMo7eAVbpsNZo_DIdt0vbgNRSc7/view?usp=sharing', 'Agama'),
(584, '854) Hadis-Hadis Bermasalah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FnPWoch9qq5EZTOxCY5UJaXnTLUmKHFZ/view?usp=sharing', 'Agama'),
(585, 'Agama dan Kepercayaan Nusantara by Sumanto Al-Qurtuby.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1HY4gNflK7AGarEBxx0mcPSk6QHLl4zfV/view?usp=sharing', 'Agama'),
(586, '80 % kosakata al-qur\'an.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1CnfLMchoGysOE0fCZKQOkrZcodggmA4j/view?usp=sharing', 'Agama'),
(587, 'Alam Malaikat (Dr. Muhammad bin A.W. al-Aqil) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1DGzO4t8uHMP26m33PnHJ2XeP97anUaFI/view?usp=sharing', 'Agama'),
(588, '200-Fiqih-Praktis-LowRes.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1CyMEmkW_mbvJetm9Sw3hWLpBFwsFTZ2g/view?usp=sharing', 'Agama'),
(589, '1.177) Hadis-Hadis Keutamaan Al-Quran.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/14VTjZq8DW4c0On4qbIU9c6h9aW8swD-t/view?usp=sharing', 'Agama'),
(590, '537) Pengantar Ulumul Qur’an dan Ulumul Hadis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1KtN6HRjtQJnsVF1ouHGa_WSyJoD1CIva/view?usp=sharing', 'Agama'),
(591, 'Bacalah_Surat_Al_Waaqiah_Maka_Engkau_Akan_Kaya!_Muhammad_Makhdlori.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Fz1Cco-fMbrCmsTyRUrC9RqkRipC-kxW/view?usp=sharing', 'Agama'),
(592, 'AL-QUR_\'AN HADIS_MA_KELAS X_KSKK_2020.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LAfwnTCYNFEdCOshMKXRJEELpdogLTzR/view?usp=sharing', 'Agama'),
(593, '6. Hasbi_ Buku Ilmu Tauhid.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dcUxrEejh3gpUt_f86omTsqd2X3-eyV6/view?usp=sharing', 'Agama'),
(594, 'al-Kutub al-Sittah_Kasman.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1SJxt5SAlaPlxG4g-9PQd-MUpRwSrSaYg/view?usp=sharing', 'Agama'),
(595, '1.550) Rekonstruksi Hadis Maudlu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cZXkd3atxkSxnQmRSIio41hBW8mu-x8k/view?usp=sharing', 'Agama'),
(596, 'Agama dan Kepercayaan Nusantara by Sumanto Al-Qurtuby-1.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1jdr9nrpGQ-RH9GvnJ3Xy27InKttVVC_L/view?usp=sharing', 'Agama'),
(597, '[Cerry Book] Syahid Muhammad - Egosentris.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Xh-bK8MV5juO6gB0npEOqn9g-4jICs-3/view?usp=sharing', 'Agama'),
(598, 'Negeri-Negeri Akhir Zaman - Abu Fatiah Ad-Adnani.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1vlI8xLxHQ8dSSJyAdCS8sVlAZ_-5vYpa/view?usp=sharing', 'Agama'),
(599, 'IlmuSharafUntukPemulaCetakan2rev1.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1z3dkrecqZSQI-QINRSe5YM07ww3uHDz5/view?usp=sharing', 'Agama'),
(600, 'Kamus-Ilmu-Nahwu-dan-Sharaf-PDFDrive-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1mr0aRJ0XQV7uYkWcatei_lIlJp9vcdbv/view?usp=sharing', 'Agama'),
(601, 'Kitab_Seks_Islam_Terjemah_Qurrat_Al_Uyun_Bi_Syarh_Nazham_Ibnu_Yamun.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ntYhpAVmCDZTJ0X81AV-ZSG8JSm3h10Y/view?usp=sharing', 'Agama'),
(602, 'PR Pengantar Perbandingan Mazhab 90hlm.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1yT6Dd0tdOsKjEXHlgG4yRLYfLdC6l_Cq/view?usp=sharing', 'Agama'),
(603, 'KISAH_KISAH_GAIB_DALAM_HADITS_SHAHIH_Islam_Quran_Hadith_Sunnah_Dr.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1fc2Anm0kG5vzvlr8UDGqDczT4cQPlA6W/view?usp=sharing', 'Agama'),
(604, 'Kupas_Tuntas_Dunia_Malaikat_dan_Mengenal_Malaikat_Syeikh_Shalih.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ejxRNNCC5ROaYe87Cyc69BjvCgH7Rx-2/view?usp=sharing', 'Agama'),
(605, 'Isa & Al-Mahdi di Akhir Zaman -Dr. Muslih Abdul Karim, M.A.-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1uh2rWVBDzuX6fMEcAF4XnYEpd4X87mZ6/view?usp=sharing', 'Agama'),
(606, 'Sutiono+Mahdi,+KAMUS+BAHASA+BESEMAH-INDONESIA-INGGRIS.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/10Uf0QtnKYrcCL-fgwwyiOet7AZeGGVv7/view?usp=sharing', 'Bahasa'),
(607, 'The Book Of Complete English Grammar (Tata bahasa Inggris Lengkap).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1-v0m6E6apOXFMqtt20S64D232Ivl6dJC/view?usp=sharing', 'Bahasa'),
(608, 'KiDemangSokowaten-BausastraKawiJawa.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LtFy32lfReGQsXjQV-PTLDiuKj9tJyfz/view?usp=sharing', 'Bahasa'),
(609, 'KAMUS-BESAR-BAHASA-INDONESIA_Mutatis-Mutandis-Hal-1078.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1YpojarukMvHZAWEDb1BhmqIABKniYHmU/view?usp=sharing', 'Bahasa'),
(610, 'KBBI - Kamus Besar Bahasa Indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cfa_3onLq4R-sKCibwaox3AxLDnRYxVU/view?usp=sharing', 'Bahasa'),
(611, 'Kamus Sinonim Bahasa Inggri_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cjNcSzhJe-Ubbbk9_2bAuExXjv5CNlxu/view?usp=sharing', 'Bahasa'),
(612, 'Partikel bahasa jepang ternyata mudah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Y4gyWpB6ilMMw0Xe1OQDh57biQ7h6K38/view?usp=sharing', 'Bahasa'),
(613, 'Kamus Inggris Indonesia ( PDFDrive ).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1W-yS8U24CKKjUwkTm8b3fHW5VKooxIUF/view?usp=sharing', 'Bahasa'),
(614, 'Kamus B Jawa.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1RmCqxH_tNnnqBeYH-JjtU0i7q6r_NiUB/view?usp=sharing', 'Bahasa'),
(615, 'Big bank soal bahasa inggris.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1F3TzTVSvAvOOvx46Q-RJBgNyd1ioPrlb/view?usp=sharing', 'Bahasa'),
(616, 'Kamus Mini Lengkap Bahasa Mandarin - Ririn Febrianti.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1BC7Nbyetz3J12vblppUwYtXmmf5521Tk/view?usp=sharing', 'Bahasa'),
(617, 'kamus bahasa jawa - bahasa indonesia I 469ha.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15sTTOjNsjSubzLc8rjAP9FYWacuZBwNm/view?usp=sharing', 'Bahasa'),
(618, 'kamus-tesaurus_bahasa-indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1DMtqBmWfNVTET8wmwdXOS8UismvcqXUu/view?usp=sharing', 'Bahasa'),
(619, 'BUKU AJAR BAHASA DAN SASTRA INDONESIA DI KELAS TINGGI.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FNFu2PUFYORem7owsFNpXT6sEmDnkGZt/view?usp=sharing', 'Bahasa'),
(620, 'Buku Ajar Sastra Indonesia_Ebook.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1HKxWiJzZHykxxH1skTThagxa0GSbvsSr/view?usp=sharing', 'Bahasa'),
(621, 'Diksi & Gaya Bahasa - Gorys Keraf.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18Dq3ZOmhRacGv0MtQZWfKlSNIZCM6G3O/view?usp=sharing', 'Bahasa'),
(622, 'Buku guru bahasa inggris kelas 9.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VShubtl0Z3RceTColtok_7Z-M33CZ4Ds/view?usp=sharing', 'Bahasa'),
(623, 'E-Book_Pengantar-Bahasa-Sastra-Indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18AY3osioKOIPZxkbsGwNK41q1F2Wzxyc/view?usp=sharing', 'Bahasa'),
(624, '500_Kata_Percakapan_dalam_Bahasa_Mandarin_Overseas_Chinese_Affairs.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15xgk9BABqk6AVtYsq2b4jmMmx8TazkT3/view?usp=sharing', 'Bahasa'),
(625, 'Bahasa inggris kelas 10.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1HFVM9bvg9sce6i_fYiOD1zA27wixgqzW/view?usp=sharing', 'Bahasa'),
(626, '2169. Otodidak Jago Kuasai Bahasa Inggris Dari Nol.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/14MYFuz91dQilN088MQToFzVdR5lLq-r7/view?usp=sharing', 'Bahasa'),
(627, '500_Kata_Percakapan_dalam_Bahasa_Mandarin_Overseas_Chinese_Affairs (1).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FAsaKgdORH6YlwzHd8kwUSBblRJlh22r/view?usp=sharing', 'Bahasa'),
(628, 'PUEBI.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1U8gHfBCRoEa1at_MVZJF8d1M0gHc4DTq/view?usp=sharing', 'Bahasa'),
(629, '60676902jenis-jenistekssma.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Z3kfqqGwIp7VvUqjkdCPNRDA_UpQdOuA/view?usp=sharing', 'Bahasa'),
(630, 'Big Bank soal + bahas Bahas_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dq9GCiDz_qbgjnuI2LA5z7VdnnOfmXZW/view?usp=sharing', 'Bahasa'),
(631, 'KAMUS_BASA_JAWA_INDONESIA.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1qxOieM-d7YmHlNfmnj_40AWx4qQsseCV/view?usp=sharing', 'Bahasa'),
(632, 'IPN-YOUR BASIC GRAMMAR-NEW 2021.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ytTZsFghVIZTB3wwP7W_gP6LCI-RQDJd/view?usp=sharing', 'Bahasa'),
(633, 'Sastra jendra Hayuningrat.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1mp6ClDhc1cEqCAsM_yjPk_LjGLKqzr61/view?usp=sharing', 'Bahasa'),
(634, 'Matpel kuliah B.indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1tEMWlPEpmF_YbHqNE9EAEWjFZrbyLTlR/view?usp=sharing', 'Bahasa'),
(635, 'Kamus Mini Lengkap Bahasa Korea - Chaerina Ayu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1p63HahVJ8O0WVrY217BVOVarIQTSgtl0/view?usp=sharing', 'Bahasa'),
(636, 'Tere liye - tentang kamu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Q7lA2hRIWO_0mSWXwUmjch1zxRT9mh6b/view?usp=sharing', 'Komik & Cerita'),
(637, 'Tere_Liye_-_Matahari.pdf.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_sNZ0yy3N8fAyUqZbCrnRNdBQbLPSDRN/view?usp=sharing', 'Komik & Cerita'),
(638, 'The Last Samurai Epos yang Menginspirasi tentang Samurai Terakhir, Sang Pahlawan-Pemberontak by John Man.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1rzG1jQBgM-9Ne3G6iZi6_sT_i0YcQINF/view?usp=sharing', 'Komik & Cerita'),
(639, 'Tere liye - the falling leaf never hates the .pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1CZZ04SUgmSQ3pb3EFS9n1Eujeyng7Ob6/view?usp=sharing', 'Komik & Cerita'),
(640, 'Tere Liye - Bulan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1kN4YetrDcg18CG40934KlirfaOi5pK8K/view?usp=sharing', 'Komik & Cerita'),
(641, 'Tere Liye - Bintang.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1k9RX0yZ6UQtXfxowvoECPdCoWNKP6jjD/view?usp=sharing', 'Komik & Cerita'),
(642, 'The Last Samurai Epos yang_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1el0IgcsLcmg0QOOkgjeaMek2IrqNhbkT/view?usp=sharing', 'Komik & Cerita'),
(643, 'Matahari (403 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1NOQ5Brv0gJG6f0DvrOVI-4iey1sgJUIz/view?usp=sharing', 'Komik & Cerita'),
(644, 'Novel Hafalan Shalat Delisa - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1MgDQ0t4oZCwI-iu29PEyeM5Lth9L4vun/view?usp=sharing', 'Komik & Cerita'),
(645, 'Novel Pramoedya - Bumi Manusia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Mw2MScEUpL1JyXaDbMyUAim5xfcrrw88/view?usp=sharing', 'Komik & Cerita'),
(646, 'Novel Lumpu (684 Halaman)- Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1MGQrhBtoc96rBuOmtNgCDxipZa8Eqotq/view?usp=sharing', 'Komik & Cerita'),
(647, 'Radikus Makankakus - Raditya Dika.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1bcX4buEX-m4u6xzagVx4XjzvegLgTki_/view?usp=sharing', 'Komik & Cerita'),
(648, 'MB_Rahimsyah_Kisah_1001_Malam_Abunawas_Sang_Penggeli_Hati.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1PdSFQN0ptPWnRDNh3yY4zphJeStQM-_N/view?usp=sharing', 'Komik & Cerita'),
(649, 'Novel Pulang (486 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1OcCdVQER4a6Lp0GKCYFmhCKHPUIKfWGf/view?usp=sharing', 'Komik & Cerita'),
(650, 'Karen Armstrong - Masa Depan Tuhan (2014).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1V7g20fmrI7DEMKsfWFJOjqd8XSC2Ob59/view?usp=sharing', 'Komik & Cerita'),
(651, 'Negeri 5 Menara (Novel Religi pembangun Jiwa) - Ahmad Fuadi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1X_8I5vJHNbWjNhGv_csIM3ohbflj6eU-/view?usp=sharing', 'Komik & Cerita'),
(652, 'Pirates and Emperors by Noam Chomsky.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1bN6AzwFzUhg5QNAGMeN3U8Tvs77-lbh-/view?usp=sharing', 'Komik & Cerita'),
(653, 'Mahabharata_022639.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1KFirDkeMq3v3YNWwGXP53t6Z3iLM92k1/view?usp=sharing', 'Komik & Cerita'),
(654, 'Novel Ayahku (Bukan) Pembohong (307 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1DR_L56ZiCj7KlgLaOIB5k2KxUj9E1uXl/view?usp=sharing', 'Komik & Cerita'),
(655, 'Majalah Bobo - Misteri UFO.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16jh6VLDwT6GnP3MVesGMvYmlnzV06ovT/view?usp=sharing', 'Komik & Cerita'),
(656, 'Jalan Para Pencari Allah Bagaimana Kita Mencapai Maqam Tertinggi Bertemu Allah (Al-Ghazali).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LJRHk8CCwNk9ZOSrD3GtASeah1rlRBJH/view?usp=sharing', 'Komik & Cerita'),
(657, 'Novel Ceroz & Batozar (380 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18zgJmS3HI-5oo8-lCuL_wxL6OuMGUIzN/view?usp=sharing', 'Komik & Cerita'),
(658, 'Novel Pergi (514 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1JBwkWinyZLjQFOe9YWhQYi-uveucIGMA/view?usp=sharing', 'Komik & Cerita'),
(659, 'Malaikat_Izrail_Bilang_Ini_Ramadhan_Terakhirku!_Ahmad_Rifai_Rifan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1IwgSEmMFq-r2Pifxyl8IPQ4HhgKBgD-S/view?usp=sharing', 'Komik & Cerita'),
(660, 'Kisah Heroik 65 Orang Shahabat Rasulullah SAW -Dr. Abdurrahman Ra’fat al-Basya-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1K7ekcTpm1RWTBMdY38ahGE0x-s3nvyjc/view?usp=sharing', 'Komik & Cerita'),
(661, 'Novel Tentang Kamu (648 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1HTsKNaO5D_8ZLUhrMOwWzwuM4k4_SKeL/view?usp=sharing', 'Komik & Cerita'),
(662, 'pdfcoffee.com_sam-kok-romance-of-the-three-kingdom-bahasa-indonesia-pdf-free.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17i3L9FntXR_r7ZlhFqCK0Wy8FkpE9nQX/view?usp=sharing', 'Komik & Cerita'),
(663, 'Negeri Sufi - Kisah-kisah Terbaik -Mojdeh Bayat & Muhammad Ali Jamnia-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1GeJjjkeufiT5w0Mmzcg030NDYAgQOh69/view?usp=sharing', 'Komik & Cerita'),
(664, 'Marchella Fp - Nanti Kita Cerita Tentang Hari Ini-(Ig-@Free_Book12).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Dgzvczym7nIkWr7u12u5FFxrLyJZheVE/view?usp=sharing', 'Komik & Cerita'),
(665, 'Karsa - ElAlicia (SFILEMOBI)_240518_232946.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FtAnAWisCt-Bct3KOWBiTb0I6AYiVW9y/view?usp=sharing', 'Komik & Cerita'),
(666, 'Novel Bulan (401 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/183nKCVmrrmuH0Ju6wCN6FyFTjBqUzqQ1/view?usp=sharing', 'Komik & Cerita'),
(667, 'Laut Bercerita - Leila S. Chudori.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1F8fcqU5HLZpD3xWiaXlqmcEg83LZq2tf/view?usp=sharing', 'Komik & Cerita'),
(668, 'Janji_Janji_Kemenangan_Dalam_Alquran_Dr_Shalah_Abdul_Fattah_Al_Khalidi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/12CybNL_vaiFQNG30kwflFF42Th1yIwLH/view?usp=sharing', 'Komik & Cerita'),
(669, 'Kisah_Petualangan_Seru_Kancil_&_Teman_Temannya_Antologi_Fabel_Nusantara.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FWtQecjYnYfCjg4XShXLjCQMgeagMEyq/view?usp=sharing', 'Komik & Cerita'),
(670, 'Bidadari-Bidadari Surga (136 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1BSYkxMoRAde0GhDixMHU9rozuTrKWZZ2/view?usp=sharing', 'Komik & Cerita'),
(671, 'Erisca Februari - Dear Nathan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1kRcQ36h7mpW3oqCUhOp0EdwIe3NYesfy/view?usp=sharing', 'Komik & Cerita'),
(672, 'E Dixon - Kisah - kisah Dari Negeri 1001 Malam.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1hpxj3ot5lP85afKrAvXSLgK7Oy007jzn/view?usp=sharing', 'Komik & Cerita'),
(673, 'Bumi - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1iD8NMYTzg5F1LWlX5Ww2aVKIe53-qKPm/view?usp=sharing', 'Komik & Cerita'),
(674, 'Dongeng Sebelum Tidur Jilid 2 - Dini W. Tamam.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1lQZXk3jmQzpkINoRmFgrQaW7raJL6dP6/view?usp=sharing', 'Komik & Cerita'),
(675, 'Cerita Rakyat Jawa Tengah Kabupaten Kudus dan Jepara (2016).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1clzqsU68JANw5qOwQUmA3mLL4-_ccUEb/view?usp=sharing', 'Komik & Cerita'),
(676, 'Dracula Pembantai Umat Islam Dalam Perang Salib.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17X1oHcQCPB_j4cJXrYaORYXso2YNpblr/view?usp=sharing', 'Komik & Cerita'),
(677, 'Boy Candra - Pada Senja Yang Membawamu Pergi (SFILE.MOBI).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1RsgATc8JnbyjRnRCz1CZN2-kuoIEQ0Xj/view?usp=sharing', 'Komik & Cerita'),
(678, 'Cerita Rakyat Jawa Tengah K_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Atl6imm5XPIgsMNpS6tf3IWtS1T0s7Jh/view?usp=sharing', 'Komik & Cerita'),
(679, 'Dilan 2 (Pidi Baiq) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Pwyc37HJJvAA8NsXfWtH3V7y-67xdgDk/view?usp=sharing', 'Komik & Cerita'),
(680, 'Dongeng Sebelum Tidur Jilid 1 - Dini W. Tamam.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1fB6kbNXdMDh9r1q3dzDysvnGw76m0VDz/view?usp=sharing', 'Komik & Cerita'),
(681, 'Camino Island (Pulau Camino).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Mi6WWH4onWg4f1AEtSy3VBp6-GnoomB6/view?usp=sharing', 'Komik & Cerita'),
(682, 'Doa-Doa Yang Terkabul - Seri Chicken Soup For The Soul.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1-vvgaAGpyUr1vsTz4xmV5IKGOEbcSfsR/view?usp=sharing', 'Komik & Cerita'),
(683, 'Chara Perdana - Skripsick - Derita Mahasiswa Abadi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LPIwur6LPdx_iILCBBW7ieRyNSZ4wxyX/view?usp=sharing', 'Komik & Cerita'),
(684, 'Gabriella Chandra - Memutar Ulang Waktu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18ne4oqcmk4et42tnOgWRCtJE__ljXgcS/view?usp=sharing', 'Komik & Cerita'),
(685, 'Erisca Februari -  Dear Nathan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cZT8Ng-RhCLcMTleGW18FiEsn5FBbLAL/view?usp=sharing', 'Komik & Cerita'),
(686, 'Dilan 1 (Pidi Baiq) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15gCzbqF69vERFboohjk1M4P_nh1P1Bfw/view?usp=sharing', 'Komik & Cerita'),
(687, 'Rumah Kaca.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16fNGgDyyR1d_T7weg4Zc6VEHVibw2c6R/view?usp=sharing', 'Komik & Cerita'),
(688, 'Nyanyi sunyi seorang bisu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17ChTRr_TQ3AFejgazgkluARYGmdW7kj2/view?usp=sharing', 'Komik & Cerita'),
(689, 'Kisah-Kisah dari Negeri 100_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17Qa4IHWPeQAhTsUWUui1tSuMNE0_CIfR/view?usp=sharing', 'Komik & Cerita'),
(690, 'Cerita dari Jakarta.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16duhrxQ8HwRWhKTJAdbHAi6sxoZmRf0n/view?usp=sharing', 'Komik & Cerita'),
(691, 'Bumi Manusia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17M90y8esGmV4cg3vlOb33Q4mPktFPp0o/view?usp=sharing', 'Komik & Cerita'),
(692, 'Apa_yang_Dilakukan_Einstein_Saat_Galau_Bayu_Prasetyo_&_Jubilee_Enterprise.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pl3ZPgZeztqC-4LYURByYHwzzd-C7q9R/view?usp=sharing', 'Komik & Cerita'),
(693, '02. Eldest - Christopher Paolini.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ue9Vmw604Wj6tOpJsm6f87VwmLLBz-lc/view?usp=sharing', 'Komik & Cerita'),
(694, 'Andrea Hirata - Ayah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1tcDHMDObx0VZkCjmP9bU_v-o6-MJYU0_/view?usp=sharing', 'Komik & Cerita'),
(695, '1. Pramoedya AT - Bumi Manusia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1kzX9XDf8thPznLL98PkIp9rJvBov2_35/view?usp=sharing', 'Komik & Cerita'),
(696, 'Alex Michaelides - Pelukis Bisu (The Silent Patient).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Hz_E5LMq_uXYr3k7GctD7NCEBvcxLA5h/view?usp=sharing', 'Komik & Cerita'),
(697, '100 Cerita Rakyat Nusantara by Dian Kristiani.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16bYfzaA79ZGH7RMkcxOzAShFq_ki6_K9/view?usp=sharing', 'Komik & Cerita'),
(698, '01-GundalaPuteraPetir.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1SUrCGujQNZJe9JQweASsGRQSkQBtwl4b/view?usp=sharing', 'Komik & Cerita'),
(699, '447. Angels Demons - Malaikat Iblis (Dan Brown).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1hGyMidyFL3AqkZb5D0vaQwIQpBoZl913/view?usp=sharing', 'Komik & Cerita'),
(700, 'Bentangkan Sayap.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1jmDG2EMbauJrPWXkdvWV3lVm9wdE5H_Q/view?usp=sharing', 'Komik & Cerita'),
(701, 'Aku Ini Binatang Jalang - Kumpulan Puisi - Chairil Anwar.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cKdNavCXQJch23zi1t008CReyD6AIPy5/view?usp=sharing', 'Komik & Cerita'),
(702, 'Pipit Chie - Revenge On You (nl).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1nGTPuqvPxEngQ4Jywf8Be8kt5xYFII2s/view?usp=sharing', 'Komik & Cerita'),
(703, 'Pulang - Novel Peristiwa Sejarah - Leila S. Chudori.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1yPPRG-cpvGJHNZVPEgifIvQFRGAZqNTe/view?usp=sharing', 'Komik & Cerita'),
(704, 'Kambing Jantan - Raditya Dika.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1hCKBeVBpAFsa0QhoYpzAeiQ0lK8m0hcM/view?usp=sharing', 'Komik & Cerita'),
(705, 'Sayap-Sayap Patah - Kumpulan Tulisan Sastra - Kahlil Gibran.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1e-wLJjcjJc1nmvjIawPJtz1y6yJ-r599/view?usp=sharing', 'Komik & Cerita'),
(706, 'Novel Hujan (315 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1sL1I5Y_IQBMlM0xxmaCRrJFY9IIOpDwj/view?usp=sharing', 'Komik & Cerita'),
(707, 'Novel Komet (386 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1oTaCAHeAuym6_X1W_brimZ05qa64mtmH/view?usp=sharing', 'Komik & Cerita'),
(708, 'Negeri Para Bedebah (444 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1zc4ilbDg0dCJpq-4govpChfmJS3Z2stU/view?usp=sharing', 'Komik & Cerita'),
(709, 'Kurasu no Daikirai na Joshi to Kekkon Suru Koto ni Natta.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1iAve8PeUAr1iMFgBIdcoRqkCCVSHN2Gd/view?usp=sharing', 'Komik & Cerita'),
(710, 'kumpulan_cerpen_Kompas_2006.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1jpr2h24AfOHaluzUipNIzVpaw5n8iVcH/view?usp=sharing', 'Komik & Cerita'),
(711, 'Laut Bercerita (Leila S. Chudori)Indonesian_9786024246945_—_2017_Kepustakaan Populer Gramedia_—_—_bb3b8106ab0ced3cf713edfada5c1596 (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1fEhMonkns-jnq7LVgZwQiViBOZg7hUeL/view?usp=sharing', 'Komik & Cerita'),
(712, 'Kisah Tanah Jawa Pocong Gundul by @kisahtanahjawa.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1qEspm3HvmOFGpiRQ1NJV1psPpZJholFG/view?usp=sharing', 'Komik & Cerita'),
(713, 'Jared Diamond - Upheaval (2022).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1w6Veu38Pnjqc1MzgyZTbPy7Ve8HJyDpR/view?usp=sharing', 'Komik & Cerita'),
(714, 'Romance of the Three Kingdoms by Halim Ivan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1iGMh6E8Nfqf2-1ojGKWWeAV2p55agx4i/view?usp=sharing', 'Komik & Cerita'),
(715, 'Hujan - Tere liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1skSkWgGEhrjjGXIizZwi9n4kVEPqCVxk/view?usp=sharing', 'Komik & Cerita'),
(716, 'Pulang.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1mX8hZJ0W9fZuj53u0VUt3TrhRs316EfW/view?usp=sharing', 'Komik & Cerita'),
(717, 'Rindu Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1t5zlGjnBUdiO1QGbKSqZYsiunMapIkF-/view?usp=sharing', 'Komik & Cerita'),
(718, 'TypeScript Interfaces.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cNXGMj0xoTRj_9c3DmSdmQMXGwrEoQnj/view?usp=sharing', 'Sains'),
(719, 'The alchemist.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VnklQ0Fi-0d3OpJcgTivo_UWRWihu94F/view?usp=sharing', 'Sains'),
(720, 'tmp_23263-HANJAR-PROXY-WAR-1197984620.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1vl_t539Ceu3OZFxFdMKn-PpbIcCptHdF/view?usp=sharing', 'Sains'),
(721, 'TypeScript Control Flow Analysis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pmIIGEJoBELct9Qg8lySq41BKcrgWVCq/view?usp=sharing', 'Sains'),
(722, 'Teknologi_Pengolahan_Daging_Prof_Dr_Harapin_Hafid,_M_Si_Dkk.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1sPOBG_Ko-43Iso2jrLME6R9op6CLxejA/view?usp=sharing', 'Sains'),
(723, 'TypeScript Types.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1G070qkK9eWensjmsCRTzb5U4mN6upabC/view?usp=sharing', 'Sains'),
(724, 'Resep Kue Kering untuk Usaha Boga - Chendawati.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ZAeAPOkZJgtmi9m-srd8JIzqsx7nJ0o7/view?usp=sharing', 'Sains'),
(725, 'NodeJSNotesForProfessionals.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1BRlqQ2v2gtnDdEaCru7SIt3JaxVcE8Jf/view?usp=sharing', 'Sains'),
(726, 'Buku Sakti Hacker Full Version ( 364 Halaman )-compressed.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1079n1vJty2SvaY2E0b8UUVzgsAGiNPEY/view?usp=sharing', 'Sains'),
(727, 'fundamentos-basicos-programacion-cplusplus.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1QSo8b77jhvOB1EYMmv7qZnchqHldszTZ/view?usp=sharing', 'Sains'),
(728, 'Kosmologi - Studi Struktur_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/179-y3y7OyJkDLRMpiSyYvwqx3a0TnO6n/view?usp=sharing', 'Sains'),
(729, '7. Buku Digital - Keperawatan Onkologi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/149xeNEmhnwHFc8MB4AOJ2SuKDWLFPh0r/view?usp=sharing', 'Sains'),
(730, 'Dasar-Dasar Astronomi dan F_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1GNFHlqfRZfUPuofF6HLi_Th3l04kxA8j/view?usp=sharing', 'Sains'),
(731, 'Kamus Pintar Fisika (Supart_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1HkYlqOZ_JeXSTYI_JL_idqMuYfgAkIxN/view?usp=sharing', 'Sains'),
(732, 'Rian+Damariswara,+BUKU+AJAR+BAHASA+JAWA.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1olWKgBmyMAoTBL3xC8KTpnS6oGishk9Y/view?usp=sharing', 'Sains'),
(733, 'Metodologi_Penelitian_Kesehatan_Prof_Dr_Soekidjo_Notoatmodjo.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1gUiqPgQ_KY7rdT4KAfXY5mtliPtID-r5/view?usp=sharing', 'Sains'),
(734, 'Kosmologi - Studi Struktur dan Asal Mula Alam Semesta by Fabian Chandra (z-lib.org)_023543.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1vQbnS3CMbyefZYVbIc_6Ozxncg0dSURD/view?usp=sharing', 'Sains'),
(735, 'umarbinkhattab.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1jEALVP9dGqxUnGEXcdLoyqgpvErtky7a/view?usp=sharing', 'Sejarah'),
(736, 'Sejarah Tuhan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1zMoGTuP9VgKxO3jdG-dHs-YWqUywFBUm/view?usp=sharing', 'Sejarah'),
(737, 'Sirah Nabawiyah - Syaikh Shafiyurrahman Al Mubarakfuri.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Ftb_KDiNsSbdeqGIQyckih_Cn9x-0MU2/view?usp=sharing', 'Sejarah'),
(738, 'Yuval N Harari- Homo Sapiens (MLY).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LTzp2zrZyop2DO0mEwd4IOro1gli1fr6/view?usp=sharing', 'Sejarah'),
(739, 'Tak Ada Penyiksaan Terhadap 6 Jenderal _ Dr. Liaw Yan Siang _ IndoProgress - @bebaskanbuku.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1fQGWcKGbK1zW1hHnMwso6_ypindJJDoZ/view?usp=sharing', 'Sejarah'),
(740, 'Sejarah_Politik_dan_Kekuasaan_Islam,_Nasionalisme_dan_Komunisme.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1R5N6G6vE4xeJPUSvYSGrSn2jmmPswTVC/view?usp=sharing', 'Sejarah'),
(741, 'Sejarah Prancis Dari Zaman_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1iOzP7GcAhdVCV8VNaTCly5cuxHnT-vTH/view?usp=sharing', 'Sejarah'),
(742, 'soekarno-indonesia-menggugat.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1MRIiy5WnpyQDGJ1BL9HCY7KT6w2SUNjE/view?usp=sharing', 'Sejarah'),
(743, 'WASIAT_AKHIR_NABI_TERAKHIR_Sunnah_Hadits_Hadith_Hadis_by_Dr_Said.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1hjiLYH-rZlzXJ3VdhWhpak3g5z0I9jSg/view?usp=sharing', 'Sejarah'),
(744, 'Sukarno (1965) - Subur Subur Suburlah PKI.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_erjIxGR2ZSfuKmeVF1zwc67SyRevBfQ/view?usp=sharing', 'Sejarah'),
(745, 'Sejarah Peradaban Islam.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1n5X7W9rnWxXkG1YsBGniy3db986XV4sF/view?usp=sharing', 'Sejarah'),
(746, 'Tarikh Islam - Sejarah Cendikiawan Muslim.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1SM8fuJ00oHXXh03cAGSkw_vW251DOQgX/view?usp=sharing', 'Sejarah'),
(747, 'Sejarah Amerika Serikat.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LddXQdL9_WI0Jgix51PyxrxEPGTukWjb/view?usp=sharing', 'Sejarah'),
(748, 'History_of_World_War_II_1939_1945.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LMimCN37SWqgOQ5KfXPIg3Pxh3Jxj5cA/view?usp=sharing', 'Sejarah'),
(749, 'Kelas XI_Sejarah Indonesia_KD 3.5.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1bdhBByvmlGzq8Q1a0nLmyv0poofATUX7/view?usp=sharing', 'Sejarah'),
(750, 'Islam Liberal - Sejarah, Konsepsi, Penyimpangan dan Jawabannya -Adian Husaini, M.A. & Nuim Hidayat-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1bs5P09IHFCfS3wWNLCRGXLp2Y4nhHfTB/view?usp=sharing', 'Sejarah'),
(751, 'Sejarah Nasional Indonesia_ (Z-Library)-2.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cvDHQKc8suNACRk2gPgzlJUPEZuhS8Vr/view?usp=sharing', 'Sejarah'),
(752, 'Sejarah Berita Proklamasi Kemerdekaan Indonesia by Tim Penulis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1TIgK0T2YHM8xWFy-glW_qnHkCy4GkV4n/view?usp=sharing', 'Sejarah'),
(753, 'Sejarah Islam Asia Tenggara.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1RNMa5mkqyXY7relV24gvlmYA8ER1YUMp/view?usp=sharing', 'Sejarah'),
(754, 'Sejarah Nasional Indonesia_ (Z-Library)-1.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Y8yHObu0aJiKcH--iTWcby5RF3SOVR45/view?usp=sharing', 'Sejarah'),
(755, 'Malapetaka Runtuhnya Khilafah - Syaikh Abdul Qadim Zallum.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1TAmn76PHvUIQoG7Uzft0XYiw--mvs5LR/view?usp=sharing', 'Sejarah'),
(756, 'sejarah-dunia-kunopdf_compress.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_aGm93Mhtk2p-3ixyUazoEIEbksmjc9k/view?usp=sharing', 'Sejarah'),
(757, 'Islam_Melayu_Mozaik_Kebudayaan_Islam_di_Singapura_&_Brunei_Dr_H.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ZtNLdXCdkQgvthRduAd6vZtp6TvOzc6V/view?usp=sharing', 'Sejarah'),
(758, 'Qin Kaisar Terakota by Michael Wicaksono.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_BiT0PgENu2Yq22WFYA_ROuP1VsSlvHT/view?usp=sharing', 'Sejarah'),
(759, 'Pembelajaran abad 21.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1QZ5T0OA7-USRv5rzZSohVn2JHQrLASaq/view?usp=sharing', 'Sejarah'),
(760, 'mata_uang_emas_kerajaan_kerajaan_di_aceh_t_ibrahim_alfian_1979.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_wD5DfFhUZW3zQmR4zKqDM9b1T7Bqj-E/view?usp=sharing', 'Sejarah'),
(761, 'Malahayati_Srikandi_dari_Aceh_by_Solichin_Salam_t_me_bukupdf.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1YB82Vjivlk3peqpb3Y5XBMJ77pddu8s8/view?usp=sharing', 'Sejarah'),
(762, 'MesjidBersejarahI.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1OhJXQiBglry03QNLXaDVeiLhORVamm7u/view?usp=sharing', 'Sejarah'),
(763, 'Islam_Lokal_Sejarah,_Budaya,_dan_Masyarakat_Septi_Wanda,_dkk_.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FqeuWsKC7PKBbg226PIVR6rzExBbm4WP/view?usp=sharing', 'Sejarah'),
(764, 'Biografi Shalahuddin al-Ayyubi -Stanley-Lane Poole-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1EihbuXSF4hKBk1LbNL7CkeLDLJNedUTD/view?usp=sharing', 'Sejarah'),
(765, 'Ringkasan Sejarah Wali Songo.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/178oiwPQsKSXo-9elR_yQc3hOgqVflgjj/view?usp=sharing', 'Sejarah');
INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `th_terbit`, `drive_url`, `category`) VALUES
(766, 'Intelijen_Nabi_SAW_Melacak_Jaringan_Intelijen_Militer_dan_Sipil.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FmUUyhnlKZ1QstyMqU__9mlaDgsCxl_k/view?usp=sharing', 'Sejarah'),
(767, 'Homo Deus  [Yuval Noah Harari].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15SmnCNMzJp00FVkOelgfhkJHC_462MX9/view?usp=sharing', 'Sejarah'),
(768, 'Sejarah Islam di Nusantara ( PDFDrive ).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1EIL36baAbH4CERhj4NDP1FCAJq3ah7do/view?usp=sharing', 'Sejarah'),
(769, 'Sejarah Nasional Indonesia_ (Z-Library)-3.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/135HkPpfxI60hUqEu03MgtoKyqJTvTRr5/view?usp=sharing', 'Sejarah'),
(770, 'Pengantar Ilmu Sejarah by Kuntowijoyo.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16nno8-IU3KT7AhzfFubviwKeC71CQs_P/view?usp=sharing', 'Sejarah'),
(771, 'PDF Islam Doktrin Dan Peradaban.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16T3A986uDlKayxKfunaoJ4oCuzT_P-oC/view?usp=sharing', 'Sejarah'),
(772, 'P.K. Ojong - Perang Pasifik  -Penerbit Buku Kompas.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/14xNNHNhzUJptRUeivl3gAllTxcR2pt8x/view?usp=sharing', 'Sejarah'),
(773, 'Kisah Menakjubkan -25 Nabi dan Rasul -Nurul Ihsan-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1KAoD5ai9zJxReNHNmBaxVP8cFsb-fmar/view?usp=sharing', 'Sejarah'),
(774, 'Sejarah Islam yang Hilang by Alkhateeb, F. (z-lib.org).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/10a0VCqRX5e5Vo_oMuMka8XoGx9WM1hKY/view?usp=sharing', 'Sejarah'),
(775, 'Kisah Para Nabi dan Rasul (Ibnu Katsir) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/11g4sfXo_3US5-3WoauSxoUsW8DuhYjua/view?usp=sharing', 'Sejarah'),
(776, 'm-c-ricklefs-sejarah-indonesia-modern-1200-2004.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FYX7_F6l90tzJDEQg66n2eXeFoUeALnw/view?usp=sharing', 'Sejarah'),
(777, 'Ibnu Al-Haitham - Pencetus Teknologi Kamera -Yoli Hemdi-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1KTARxjBU9k0x45__1tIc5wa5ZpZlyOaP/view?usp=sharing', 'Sejarah'),
(778, 'Best Stories of Abu Bakar As-Shiddiq -Salih SuruÇ-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1-xzR57fFySU1eESTdlRGqOhzlQfWsPhG/view?usp=sharing', 'Sejarah'),
(779, 'Kitab-Merah-Kumpulan-Kisah-Kisah-Tokoh-G30S-PKI-oleh-Majalah-Tempo.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1EZCf3oItO_lFqXNOH_VjWmZ_9jnliAow/view?usp=sharing', 'Sejarah'),
(780, 'Jenghis Khan Legenda Sang Penakluk dari Mongolia by John Man_024035.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1E4TfAr2s_3AIs32UKSHB5N8GAL_yxGgq/view?usp=sharing', 'Sejarah'),
(781, 'Mukaddimah - Ibnu Khaldun.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/196Ctr9o779ma86DesH4VfwaCPzyeACug/view?usp=sharing', 'Sejarah'),
(782, 'Sejarah Indonesia Masa Kemerdekaan 1945-1998 by Dr. Aman, M.Pd._024137.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1BAxfIy65cWhEwPkoMstnU8hekq2S0p0k/view?usp=sharing', 'Sejarah'),
(783, 'Sejarah Indonesia Modern, 1_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/13i0IvdjlfuDcj_zta7_WamaxftBqxRKI/view?usp=sharing', 'Sejarah'),
(784, 'Perang Sabil versus Perang Salib - Umat Islam Melawan Penjajah Kristen Portugis dan Belanda -Abdul Qodir Jaelani-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FA2r7V_uPXQP5b2ozr8aMRDVhjEZtPaH/view?usp=sharing', 'Sejarah'),
(785, 'Indonesia Melawan Amerika Konflik Perang Dingin 1953-1963 by Baskara T. Wardaya.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/10gjyKFTzkX0KesDlRTg9QS_Yl4NyOJEZ/view?usp=sharing', 'Sejarah'),
(786, 'Sejarah Intelektual - Juraid Abdul Latief.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15q_Y0Qlb4jkwnBLySHwuIpPenLjguOL9/view?usp=sharing', 'Sejarah'),
(787, 'Peristiwa Sekitar Proklamasi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Cd4-iZxLqmsMAy7ErOUS-oFtEe4tN8kZ/view?usp=sharing', 'Sejarah'),
(788, 'Sejarah Islam di Nusantara.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1EDn_gF86oZD4hd5mHu560wz54CfGOae6/view?usp=sharing', 'Sejarah'),
(789, 'Ibnu Rusyd - Tokoh Filsafat Islam [Yoli Hemdi].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Is3WgEsGoP9tH-bV2DvwfIg5SGe0itNb/view?usp=sharing', 'Sejarah'),
(790, 'Dinasti Umawiyah [Dr. Yusuf Al’ Isy].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1zou-s-S-OC1LzsIXaJUEMdt1KY3Ctv5X/view?usp=sharing', 'Sejarah'),
(791, 'Candi_Borobudur_&_Peninggalan_Nabi_Sulaiman_AS_KH_Fahmi_Basya.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1jDiGlHGdz4W7GiJ9jz_0hPHptF8aHKj0/view?usp=sharing', 'Sejarah'),
(792, 'Buku - Sejarah Sosial Media (Dari Gutenberg Sampai Internet).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1zkbj2J_lMatn6M_jHbbfR8_VjQeaN4f7/view?usp=sharing', 'Sejarah'),
(793, 'Ensiklopedi Kerajaan-Kerajaan Nusantara Hikayat dan Sejarah 1 by Ivan Taniputera.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1msO7UJ_UstyWAghGVDCKTmiPZMzdgv2E/view?usp=sharing', 'Sejarah'),
(794, 'Ensiklopedia_Biografi_Sahabat_Nabi_Kisah_Hidup_154_Wisudawn_Madrasah.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1s8fbbl5HaRnaslPeoaIlTBdSReCAYKqE/view?usp=sharing', 'Sejarah'),
(795, 'Gajah Mada 4 revisi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dR1ZNOOhn5DXDnNJZ5qFechmlNaKPHGg/view?usp=sharing', 'Sejarah'),
(796, 'Dinasti Abbasiyah [Dr. Yusuf Al-Isy].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1AByxDd15GvZbFdcqut-wa8E52zrtBVFy/view?usp=sharing', 'Sejarah'),
(797, 'Gajah Mada 3 - Hamukti Palapa.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Mhv5LkRRd0QSS5s_csHGwFJOwWKLERzW/view?usp=sharing', 'Sejarah'),
(798, 'Ceng Ho, Muslim Tionghoa - Misteri Perjalanan Muhibah di Nusantara -Prof. Kong Yuanzhi-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1OJLGLXCBVSnxDXt1AiiDu53qXwrcaL0p/view?usp=sharing', 'Sejarah'),
(799, 'Buku - Sejarah Dunia yang Disembunyikan (Jonathan Black).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1YtwfPwToQCerpkna-arHCc7NoG_cy3RI/view?usp=sharing', 'Sejarah'),
(800, 'Buku Ajar Sejarah Peradaban Islam (Pendekatan Tematik) -Ibnu Anshori-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1_ZCylF989x8aLyp7JZQDVHSam1HA0voU/view?usp=sharing', 'Sejarah'),
(801, 'Buku Pintar Sejarah Islam.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16v9hQcnRW3Ugp6Wtey778sUcRoKpqSvH/view?usp=sharing', 'Sejarah'),
(802, 'Distorsi Sejarah Islam [Dr. Yusuf Al-Qaradhawi].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1BJF424o4c_mao8mrV7LR-s3VtXTJ5uG3/view?usp=sharing', 'Sejarah'),
(803, 'Buku - Republik Tiongkok (1912-1949).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1DVN5NDckjtmt9vmMOrROyeRkC2BHkO27/view?usp=sharing', 'Sejarah'),
(804, 'fdokumen.com_sejarah-gaib-pulau-jawa.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1QRJqG14nXqIo18ujHy_09Rt66nhzFD0A/view?usp=sharing', 'Sejarah'),
(805, 'TUANKU IMAM BONJOL.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16h4FsuS9tQW8347FOkH7Cwe9l7_r_BjK/view?usp=sharing', 'Sejarah'),
(806, 'SUPRIYADI.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16Ln66saf1g_XlBLhOkv4hBatsgQX3b8_/view?usp=sharing', 'Sejarah'),
(807, 'sultan iskandar muda.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16atKPxr9lhd7sgozx_vIxv2Smx4-Km1m/view?usp=sharing', 'Sejarah'),
(808, 'riwayat perjuangan k h abdul halim.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16IRkxtHiMcxROXW3E0BaJccJ8Mt8aS8o/view?usp=sharing', 'Sejarah'),
(809, 'Mereka Jang Dilumpuhkan I.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16n1te7fR0f9zAOxEWc_cGCbB03EV5irG/view?usp=sharing', 'Sejarah'),
(810, 'Menuju Sejarah Sumatra Anta_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17TimSseBN3wX1ulzBAyqmMouPThfk3HR/view?usp=sharing', 'Sejarah'),
(811, 'Kisah Menarik Einstein dan_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/175tvAlzgEb-ujuk9nYXxSzYlwwGzLSlx/view?usp=sharing', 'Sejarah'),
(812, 'Ki Hajar Dewantara.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16KHRNamaiIKiJVrManFzEMVQboicKko4/view?usp=sharing', 'Sejarah'),
(813, 'Kamus Sejarah Indonesia Jil_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17UHLQjrNlWutmWcnKmKdB8YuapWiWErF/view?usp=sharing', 'Sejarah'),
(814, 'cut nyak din.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16Im1CvuPdrtg0u6uPZIocCIgy_YUzwrV/view?usp=sharing', 'Sejarah'),
(815, 'Arok Dedes.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/16gI0rmXKhLQWDoeSa9xhaGwsWPMNQeWe/view?usp=sharing', 'Sejarah'),
(816, '100 Pahlawan Nusantara.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1rXepyuvb5hT4mHrjXtB4IW0p2jgeSUDG/view?usp=sharing', 'Sejarah'),
(817, 'Atlas Sejarah Islam - Sejak Masa Permulaan Hingga Kejayaan Islam -Dar Al-\'Ilm-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pY35yx7Bt9hOIXD8mcmlyhYd1ute6dj3/view?usp=sharing', 'Sejarah'),
(818, 'Babad Tanah Jawi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1pk1O8z8UlTvuImLaWGzTFMr6cmDAF5pN/view?usp=sharing', 'Sejarah'),
(819, 'Asal Bangsa dan Bahasa Nusantara - Prof. Dr. Slamet Muljana.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1rm3AZ9NQW3P0OnZqtmgUqOX8OGxiQ45d/view?usp=sharing', 'Sejarah'),
(820, 'Al-Idrisi - Penemu Peta Pola Bumi [Yoli Hemdi].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1wHmQY1vJfMJCVfvjtP5DQkqNsOS8008T/view?usp=sharing', 'Sejarah'),
(821, 'Al-Biruni - Guru Segala Ilmu [Yoli Hemdi].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ndv9DdTAUtDc4cLoHxLtKhu9gZacUsPQ/view?usp=sharing', 'Sejarah'),
(822, '100 Tokoh Paling Berpengaruh dalam Sejarah - Michael H. Hart.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1vbRA6pfevELjMVRKlM_AnzEf2f3F7QFY/view?usp=sharing', 'Sejarah'),
(823, 'Atlas Walisongo.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/12NctR2FgITetIrntfCoo_h0GAGwvCMuy/view?usp=sharing', 'Sejarah'),
(824, 'Bertrand Russell - A History of Western Philosophy.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/164HTsw6bUoDtTwQ7SuuPLMHwwzAmcyqE/view?usp=sharing', 'Sejarah'),
(825, 'A memori of solferino.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1EzXfimvD8eNJJza98MfUX_MEPND3Pcll/view?usp=sharing', 'Sejarah'),
(826, 'Biografi 60 Shahabat Nabi (Khalid Muhammad Khalid).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18UkWFExDMvxlulywowpaHtN_SiUV6m8q/view?usp=sharing', 'Sejarah'),
(827, 'Aji Saka.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/14SnFa9STPTjdAlyodf4QWjUoNipZO_8j/view?usp=sharing', 'Sejarah'),
(828, 'Asal Usul Perang Jawa - Pemberontakan Sepoy & Lukisan Raden Saleh (2012).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Ke4Ojh74-fsfQuSQLbFkf1sHuTtqYJ67/view?usp=sharing', 'Sejarah'),
(829, 'Bangkit_dan_Runtuhnya_Andalusia_Prof_Dr_Raghib_As_Sirjani.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1IDgs68fyhxTzcfzVNmor-v0DMFzC93td/view?usp=sharing', 'Sejarah'),
(830, 'Kisah_Para_Nabi_Kisah_31_Nabi_dari_Adam_Hingga_Isa_Ibnu_Katsir_Z.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1J4JxnzHJk1-KHl-91LnK2V43J4E6ScyH/view?usp=sharing', 'Sejarah'),
(831, 'Indonesia Melawan Amerika 1953-1963 (2008).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/14QzmIqPtmgdkv-Ecf1XQv_Un94-OLKs4/view?usp=sharing', 'Sejarah'),
(832, 'Konflik Bersejarah Nazi di_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Jwb3lDXa-ydp86n6o5Dne-eTO_3bxkgo/view?usp=sharing', 'Sejarah'),
(833, 'Ensiklopedi_Kerajaan_Kerajaan_Nusantara_Hikayat_dan_Sejarah_1.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15XjcpfQuqtmMdmtzt3Y9zftKqp6HKKvd/view?usp=sharing', 'Sejarah'),
(834, 'Seni budaya kelas 10.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ZxHpHt3tbXDv5H_8f81jUBAqDoBkNieE/view?usp=sharing', 'Seni'),
(835, 'Kelas X_Seni Budaya(Seni Rupa)_KD 3.1.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1zFsRjh5okr8EV7cq6-dqy0hluY1mB9iZ/view?usp=sharing', 'Seni'),
(836, '51 Perempuan Pencerah Dunia_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IW5imNgO4vUmrwFFWcm_TwpT47CwjotF/view?usp=sharing', 'Sosial'),
(837, 'Antropologi Agama Wacana-Wa_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IUgEF23HUINkHRvMl2Wih3xODmqmDICU/view?usp=sharing', 'Sosial'),
(838, 'Ideologi Islam dan Utopia T_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IzEqiAFatcI206JvdKZ-OkxdAHtDHxFn/view?usp=sharing', 'Sosial'),
(839, 'Ilmu Sosial  Budaya Dasar (_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1Ida-QeBetlBpTYW2zJENwfwcgRgl_sn4/view?usp=sharing', 'Sosial'),
(840, 'Menjadi Pemimpin Sejati (Re_ (Z-Library)', NULL, NULL, '0', 'https://drive.google.com/file/d/1IiL369H676uCtM7GSbq-q6lyQk3KJWcU/view?usp=sharing', 'Sosial'),
(841, 'Yang fana adalah waktu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1rC3ycmZo-EpzNZ1_2KvBScJTs6Qb4fS2/view?usp=sharing', 'Sosial'),
(842, 'The_Islamophobia_Industry_How_the_Right_Manufactures_Hatred_of_Muslims.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1w3bJfP717ulq0vetBOBWAqE2FrSVFGrV/view?usp=sharing', 'Sosial'),
(843, 'THE MAGIC LIBRARY by Jostein Gaarder_240525_214501.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1qrJpLVWMIYpJrBF2tjOyI6e1IVYGBiCv/view?usp=sharing', 'Sosial'),
(844, 'Setiap Hari Stoik.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1sRyHGXDZvEQJR6fetlzcx-0Q7JxKzyl2/view?usp=sharing', 'Sosial'),
(845, 'Sukses Menjalin Relasi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1t4BAUVw682hIKCVvfYpneIil400fpzFL/view?usp=sharing', 'Sosial'),
(846, 'Stalin.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1wMRblPpCUe_Uqj2MNqjm_ETI51o-2DFG/view?usp=sharing', 'Sosial'),
(847, 'Zenius Ebook Membongkar Masalah Belajar dan Solusinya (SFILE.MOBI).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1eJmt4Ia57cqncegF11KjXh_TOTBe63Ol/view?usp=sharing', 'Sosial'),
(848, 'Unknown Soldiers - Drishya Sanal.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1AIt6X7RMEgQQ3OZTVA26SQx83O_tMbSM/view?usp=sharing', 'Sosial'),
(849, 'sku-penggalang.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1jQ1oejCduuREsQln0QnK5H1sI1_oVxQf/view?usp=sharing', 'Sosial'),
(850, 'Ulama_&_Kekuasaan_Pergumulan_Elite_Muslim_dalam_Sejarah_Indonesia.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1W1SfYf26T5XSF5ZLra7nD8QnJIntA0UH/view?usp=sharing', 'Sosial'),
(851, 'Teach Like Finland - Mengajar Seperti Finlandia [Timothy Walker].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1aJjG-KYB16o-uS_il5IYF6IrCSPMY8Nk/view?usp=sharing', 'Sosial'),
(852, 'soekarno-mentjapai-indonesia-merdeka.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1hRJWaDGClzGPINJr6YzaN6UxCKwwBa-g/view?usp=sharing', 'Sosial'),
(853, 'Setiap Pemimpin Harus Baca Buku Ini The New Art of the Leader (William A. Cohen, Ph.D.).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1x-g7Ae-HGAoxfP3T55s3vQgrHpS5HLOD/view?usp=sharing', 'Sosial'),
(854, 'The Creative Thinking Handbook - Chris Griffiths.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18T7GlcGZewEQBZ2KE_U_T4Ns4ytBH_0o/view?usp=sharing', 'Sosial'),
(855, 'Selfish Gene.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dTAeUgegzqk_gYiBrMF5tcN_uAp8Jlvj/view?usp=sharing', 'Sosial'),
(856, 'The_8th_Habits_Melampaui_Efektivitas_Menggapai_Keagungan_Stephen.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1BAgorX0OUuGH3Luw27ehRgPVTNyAvmzm/view?usp=sharing', 'Sosial'),
(857, 'Titi Sanaria - Dongeng Tentang Waktu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1muHDMxphSzsPucHd5O-CIbypxwqUiA21/view?usp=sharing', 'Sosial'),
(858, 'sku-pandega.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1llHOyWDGA0MFgyVsron8PXQ1yykjLmt0/view?usp=sharing', 'Sosial'),
(859, 'Tuhan Izinkan Aku Menjadi Pelacur (SFILE.MOBI).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1jmr4-mz_ydVNwvUA5yRbbsYAOTMXtapf/view?usp=sharing', 'Sosial'),
(860, 'Teolog Versus Filosof - Debat tentang Tuhan dan Alam [Mambaul Ngadhimah].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dBy6MK4TnZ5RULXpFM7yVvE555Y-jqUa/view?usp=sharing', 'Sosial'),
(861, 'Teruslah_Bergerak_Karena_Anda_Luar_Biasa!_Fransiska_Lintang.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1nWNxvNPwIOJcLhOL6A1rH9S3A2kBmhnP/view?usp=sharing', 'Sosial'),
(862, 'STRATEGI MANIPULASI PSIKOLOGI.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Xl_kQD5vvGi2ytpJJsfu0m8I1p4IjhEf/view?usp=sharing', 'Sosial'),
(863, 'The Magic of  Reality.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1lOSRaPOmO4Y2-PLRABLjt9YfQbCAUBKf/view?usp=sharing', 'Sosial'),
(864, 'Ziggy Zezsyazeoviennazabrizkie - Jakarta Sebelum Pagi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1vqHbIwqCklCKeUUvdGiZke63qoyiRPCs/view?usp=sharing', 'Sosial'),
(865, 'Stolen Heart.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/19uabGLR1XvpLJ1lmGt-Nu5_rx2xvIGTQ/view?usp=sharing', 'Sosial'),
(866, 'The Alpha Girl’s Guide.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1-WDqtu6e8WM0XZoHxuKmHTNt1U1wVsF3/view?usp=sharing', 'Sosial'),
(867, 'The 48 Laws Of Power.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1sRdqVFFWgk5figUjeh9Gj2kaZkDOtqxn/view?usp=sharing', 'Sosial'),
(868, 'Tuhan Pasti Ahli Matematika [Hadi Susanto].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1YkTQF4vACdJzg8FYls8WPddh9AuYKEq2/view?usp=sharing', 'Sosial'),
(869, 'The Tipping Point - Malcolm Gladwell.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1WsDkd2Zfe87sJYZ6tzvKtBy554kUZNLG/view?usp=sharing', 'Sosial'),
(870, 'Stephen King Different season.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1UMPidgqKuZVGNwqQterIcDVdSNBV64qf/view?usp=sharing', 'Sosial'),
(871, 'Tanah Palestina dan Rakyatnya -Dr. Muhsin Muhammad Shaleh-.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1qZu5aP0lWz3nVu-2UUnM0VMt1yBoyd24/view?usp=sharing', 'Sosial'),
(872, 'Stephen King Carrie.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1mQmwfyhJgWwCDJ2evWzPGhKGv8dbK3A6/view?usp=sharing', 'Sosial'),
(873, 'Teladan_Hidup_Panglima_Besar_Jenderal_Soedirman_Eri_Sumarwan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1i1U6bTqRAoLogK549Ti7VyYScIF5nERH/view?usp=sharing', 'Sosial'),
(874, 'Sekolah itu Candu OCRed.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FhkBRlr9QWoKbnQ-TDN1QiUhOYmaGULx/view?usp=sharing', 'Sosial'),
(875, 'Spiritualitas Tanpa Tuhan (2007).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1p0_DsTAja5vDpiIoPWa3WyaR87hxoN9z/view?usp=sharing', 'Sosial'),
(876, 'Wealth-Nations.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1W-muft5ypjFdF0u7Dn1DbyEHF2ZafVec/view?usp=sharing', 'Sosial'),
(877, 'THE-BOOK-OF-IKIGAI-Make-Life-Worth-Living-_Indonesian-Edition_-_Ken-Mogi_-_Z-Library_.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1iV9G5-5AWaOtD59LucyBB6C8kF2VfOBa/view?usp=sharing', 'Sosial'),
(878, 'Surga  Neraka (Dr. Ahmad Musthafa Mutawalli) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1XXlG3AZR6qqBfFgIoMEt9pYobFZ4wkKn/view?usp=sharing', 'Sosial'),
(879, 'The Art of War (Sun Tzu).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1veTLPiZNJpQg_IPE5TsxSkBfw1cqf5JG/view?usp=sharing', 'Sosial'),
(880, 'sku-siaga.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18IazRwtwcQa9KQUcCy7uoN5aL303FhXI/view?usp=sharing', 'Sosial'),
(881, 'SIAGA BENCANA.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1MPY5sg9RsEeEw93RbDGj8LwxPJJQ342Z/view?usp=sharing', 'Sosial'),
(882, 'Stephen King the long walk.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cBfV_p8dKOBQjGFtYAX-TFaC2T7yFN9-/view?usp=sharing', 'Sosial'),
(883, 'Tenggelamnya Kapal Van Der_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/15qFms1y0iNJqZSpP1loT-Te23fI4L3sD/view?usp=sharing', 'Sosial'),
(884, 'Soekarno-INDONESIA-MENGGUGAT-Gmni.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/17XhZaQkstAo5qarbebA08HJZkGLKe9vN/view?usp=sharing', 'Sosial'),
(885, 'Tabloid_Saji_Edisi_487_Panduan_Memasak_&_Usaha_Bubur_Manis_&_Kolak.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1XQn6reS2NxWi5Qpk9CDJxBesnjnFHPvp/view?usp=sharing', 'Sosial'),
(886, 'The Secret of Santet - A. Masruri.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/18YrtU4MOM69G9eP3TtU-0j11Rlk14RJZ/view?usp=sharing', 'Sosial'),
(887, 'Selamatkan Bisnis Anda! - Tumpas 101 Penyakit Bisnis.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ZiHenK-jREjGq1sUXtytw_0wX71v5yzO/view?usp=sharing', 'Sosial'),
(888, 'The Art of Strategy A Game Theorist’s Guide to Succe.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1oaeDuGuQCSzSgtv0PMVnnbRWYxnIsKvz/view?usp=sharing', 'Sosial'),
(889, 'Stephen King Negeri Petaka.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1DMrF2I_m3OQE_DkNDKWVwz7IitjMVfNv/view?usp=sharing', 'Sosial'),
(890, 'Semua_Guru_Semua_Murid_Memetik_Hikmah_dari_Sosok_dan_Peristiwa_Muhammad.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1uSrpxYSTztyMgTZJJx7cv5sNbfqvjzfv/view?usp=sharing', 'Sosial'),
(891, 'Tokoh dan Pemikiran Filsafat Islam versus Barat.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1xNq4zywmcgoJ0S53LFOuvk_J9TR_RDgk/view?usp=sharing', 'Sosial'),
(892, 'sku-penegak.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1FD_4UrZq6fxzkL8WtlfVc9Bp8HGi2s10/view?usp=sharing', 'Sosial'),
(893, 'tan-malaka-gerpolek.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1aQxwjpqwGsMQjZ9TrrxlFlYTsW2cFECf/view?usp=sharing', 'Sosial'),
(894, 'Stephen King Mr.Mercedez.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/124LApwvzaOpqqBx5bQdzBH5KzyzgjjE4/view?usp=sharing', 'Sosial'),
(895, 'Teori bipolar dunia - HUANG FENGLIN.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1OURAcQ29i9dWiuU-R_bqiLmti3DQLnE-/view?usp=sharing', 'Sosial'),
(896, 'tan-malaka-madilog.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1vmkiSVe4dJHoi3ojTH6pwalxmKuLx1gO/view?usp=sharing', 'Sosial'),
(897, 'Teacher Resource Guide Ancient Egypt.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1en0taVZaXs4UCimLrMwmfmErIcu1d5Hq/view?usp=sharing', 'Sosial'),
(898, 'PSIKOLOGI KRIMINAL.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Mt-xvvdP8UUs3o079pLR_bb0bYX1xDi6/view?usp=sharing', 'Sosial'),
(899, 'Membaca_Pikiran_Seseorang_Lewat_Bahasa_T_023509.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1M9C7z-xmdEnxzmj2x5xvNFqDZRxlVjW9/view?usp=sharing', 'Sosial'),
(900, 'Kathryn Littlewood - Sihir Setiap Menit-Seri Bliss Bakery 6.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1O0p_MnSH_kc7Zq84mkDWSJGTqoRDkQNd/view?usp=sharing', 'Sosial'),
(901, 'How to make people like you_.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LM7o3W6sft15HGi4Zh1Wo9uiEFj_v30l/view?usp=sharing', 'Sosial'),
(902, 'Bilveer Singh - Succession Politics in Indonesia_ The 1998 Presidential Elections and the Fall of Suharto (2000, Palgrave Macmillan).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LjS3u6ZLF5hKfr_lZcmliuque838Re5u/view?usp=sharing', 'Sosial'),
(903, 'Jatuh Sekali Bangkit Berkali-Kali - Syahrul.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1N9V-lPa6YK_kvUz2DJIKKBBaEH8DwCRR/view?usp=sharing', 'Sosial'),
(904, 'Mustikarasa.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LqdaXjMnNkroYn75I68_8RlEMCRm2pP2/view?usp=sharing', 'Sosial'),
(905, 'KEPEMIMPINAN.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1O9AdS_zA78UJ0OfpBqVvWXBzv2Du2aDg/view?usp=sharing', 'Sosial'),
(906, 'Menggagas_Pendidikan_Islami_Ustadz_Muhammad_Ismail_Yusanto,_dkk_.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Mua9Oa6P1Gy6Usg8sVAe_RaGP9kXURmi/view?usp=sharing', 'Sosial'),
(907, 'Inspirasi Tanpa Menggurui Buku Hitam yang Mencerahkan (Cahyo Satria Wijaya) (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1M80dK4fdtLiU7tTk9iwwChp0pMTXYamz/view?usp=sharing', 'Sosial'),
(908, 'Sedang TUHAN pun Cemburu.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1LjVz2BY9Tn1QtbHyYmz4wGWtWsxp1zrr/view?usp=sharing', 'Sosial'),
(909, 'Intelligent Investor.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1MyR4p_qAGLwTBZBjBJrCE_vNoqNnromp/view?usp=sharing', 'Sosial'),
(910, 'PPKn-BS-KLS_X [www.defantri.com].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Nr913HdKmTZ6A5kZe90MsW3gDmL1kHfB/view?usp=sharing', 'Sosial'),
(911, 'BICARA ITU ADA SENINYA Rahasia Komunikasi Yang Efektif by Oh Su Hyang.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1PXGzkJI_bx4ObowPPray7kk0nUVgqu15/view?usp=sharing', 'Sosial'),
(912, 'Big Book SBMPTN SOSHUM 2016_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1X0TBUlTykoScz6qgaV9wCAQYZ_MK0eZ7/view?usp=sharing', 'Sosial'),
(913, 'Karen Armstrong - Field of Blood (2014).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1aHfrqkVccPm-i7xlBxg8aRmsqpPt1BWg/view?usp=sharing', 'Sosial'),
(914, 'Psikologi Klinis ( PDFDrive ).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1XGi2w3iwilsXZaSwCiG8fZuKeDuPTDq4/view?usp=sharing', 'Sosial'),
(915, 'Kitab Anti-Bodoh Terampil Berpikir Benar Terhindar dari Cacat Logika & Sesat Pikir ( PDFDrive ).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1W_tt-bY1wqm8XpVaKvbtUQMEWUoXAVPz/view?usp=sharing', 'Sosial'),
(916, 'Perempuan di Titik Nol by Nawal El-Saadawi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1URIckhioRgl4gAX-gC2LRm9VfXtF0yL8/view?usp=sharing', 'Sosial'),
(917, 'Sebuah Seni untuk Bersikap Bodo Amat by Mark Manson.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cqd1hSyEOr9ccc9U3ZUXRUKKGhVV8uzm/view?usp=sharing', 'Sosial'),
(918, '[ID] The Demon-Haunted World by Carl Sagan.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1bqPkdlD9A0O9Bef4x_pnD7z_BuWb8T_A/view?usp=sharing', 'Sosial'),
(919, 'Negotiating 101 From Planning Your Strategy to Findi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1cKt-4HJ_f2fnNzkqhZ9SZm5-u0LqZ0mG/view?usp=sharing', 'Sosial'),
(920, 'Passion Itu Dipraktekkin - Tim Wesfix.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1WTljmikN0VwHVEqc0j3eabdZE4-FyuJC/view?usp=sharing', 'Sosial'),
(921, 'Pengantar Filsafat Untuk Psikologi.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1dejsl8pGAde_WyIdHQHR41-17hKLPXi9/view?usp=sharing', 'Sosial'),
(922, 'Kumpulan_Mutiara_Faedah_Ramadhan_Abu_Ubaidah_Yusuf_Bin_Mukhtar_As.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VVj3vp64dvHdeDh1UtAqDBdIYui4Gk_5/view?usp=sharing', 'Sosial'),
(923, 'Law Attraction.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1UaJmdILcWUHnI80ugi6lM-YiKxMwr0-w/view?usp=sharing', 'Sosial'),
(924, 'Richard Dawkins  The God Delusion (SFILE.MOBI).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Pjl8AM5NpW0PTz2w63vLAHEcQQWY-wKZ/view?usp=sharing', 'Sosial'),
(925, 'Referensi Pintar Atlas Geog_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VXHwta3-2YNO51hdZIE0JRcheGI6d7a2/view?usp=sharing', 'Sosial'),
(926, 'Kau Aku dan Sepucuk Angpau Merah (516 Halaman) - Tere Liye.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1ax02QBd718TuRxrLCpARTZQ1DeK7Zh52/view?usp=sharing', 'Sosial'),
(927, 'Mau Sehat Jauhi Rumah Sakit - Dr. Shin Woo Seob.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Y7H2xlhD1nM2dbNCy5Y9V8oJq_oN3m5Q/view?usp=sharing', 'Sosial'),
(928, 'resepveganICVI21 (SFILE.MOBI).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1Wi_eRw2xrEs08LVYvsFtB9ESWgOka7PO/view?usp=sharing', 'Sosial'),
(929, 'Jangan Membuat Masalah Kecil Jadi Masalah Besar [Richard Carlson].pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1RFqU3BgrkXCKusBnAWGKIcy0dy_dekEp/view?usp=sharing', 'Sosial'),
(930, 'Kekuatan Memaafkan - Seri Chicken Soup For The Soul.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1csA-rdfwqHFXs4Q7vyZ_KRwJOUp_i8US/view?usp=sharing', 'Sosial'),
(931, 'Pengantar Ilmu Antropologi_ (Z-Library).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VsWHqOHKvl_aQwxIdm6mD_pkHn9Xo7N6/view?usp=sharing', 'Sosial'),
(932, 'Kekuatan Bersyukur - Seri Chicken Soup For The Soul.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1TJ5soFGrWJvlQw5RGL6CNRVHA3J8NPvz/view?usp=sharing', 'Sosial'),
(933, 'Rahasia-Menghancurkan-Mental-Block.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1aErbTvOqbGQhjZhDZeGq8g4oBybxabqr/view?usp=sharing', 'Sosial'),
(934, 'Mantra (Seni Komunikasi & Psikologi) - Deddy Corbuizer.pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1VZ96yFZy8B3kvFeQiF_uPqGnoVl3RVX5/view?usp=sharing', 'Sosial'),
(935, 'Karen Armstrong - Sejarah Tuhan (2011).pdf', NULL, NULL, '0', 'https://drive.google.com/file/d/1TRxca45oe2qk7ZwFMj5o9yPcaaCmYOuI/view?usp=sharing', 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(225) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('Administrator','Petugas','User','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Bima Adhi Pratama Kharis', 'khadmin123321', 'khbimakha23**32', 'Administrator'),
(7, 'Mahasin Dharmawan', 'mahasin', '123', 'User'),
(11, 'Bima Adhi Pratama Kharis ', 'bimastar', 'star123', 'User'),
(12, 'Mahasin Dharmawan', 'mahasin111', '1122334455', 'Petugas');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=936;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
