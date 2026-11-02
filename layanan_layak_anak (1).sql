-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2026 at 02:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan_layak_anak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_album`
--

CREATE TABLE `tb_album` (
  `id` int(11) NOT NULL,
  `cover` varchar(255) DEFAULT '',
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_album`
--

INSERT INTO `tb_album` (`id`, `cover`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'WhatsApp_Image_2026-09-16_at_11_14_261.jpeg', 'Selamat Hari Anak Nasional ke-42 Tahun 2026', 'Puncak peringatan Hari Anak Nasional (HAN) ke-42 Kabupaten Magelang yang bertema &quot;Sayangi Anak, Lindungi, dan Bangun Masa Depan&quot; diselenggarakan pada hari Kamis, 30 Juli 2026 di Kompleks Pemda Kabupaten Magelang dan diikuti oleh 1.217 anak dari seluruh Kabupaten Magelang.\r\n', '2026-09-16 04:46:08', '2026-09-16 06:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beranda`
--

CREATE TABLE `tb_beranda` (
  `id` int(11) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_beranda`
--

INSERT INTO `tb_beranda` (`id`, `bagian`, `label`, `judul`, `deskripsi`, `icon`, `link`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'hero', 'WEBSITE KABUPATEN LAYAK ANAK MAGELANG', 'Mewujudkan Lingkungan yang <span class=\"hl\">Layak dan Aman</span> bagi Anak', 'Bersama menciptakan lingkungan yang mendukung pemenuhan hak, perlindungan, tumbuh kembang, dan partisipasi anak.', '', '', 0, '2026-09-16 04:10:59', '2026-09-25 00:52:27'),
(2, 'why_title', 'TENTANG LAYAK ANAK', 'Kenapa Lingkungan Layak Anak Itu Penting?', 'Setiap anak berhak mendapatkan lingkungan yang aman, nyaman, sehat, serta mendukung proses tumbuh dan berkembang.', 'fa-solid fa-circle-question', '', 0, '2026-09-16 04:10:59', '2026-10-07 00:53:44'),
(3, 'why_1', '', 'Perlindungan Anak', 'Menciptakan lingkungan yang aman dan melindungi anak dari kekerasan, diskriminasi, serta berbagai bentuk perlakuan yang merugikan.', 'fa-solid fa-shield-heart', '', 1, '2026-09-16 04:10:59', '2026-09-16 04:10:59'),
(4, 'why_2', '', 'Pemenuhan Hak', 'Mendukung terpenuhinya hak anak untuk mendapatkan kehidupan, kesehatan, pendidikan, dan lingkungan yang layak.', 'fa-solid fa-heart', '', 2, '2026-09-16 04:10:59', '2026-09-16 04:10:59'),
(5, 'why_3', '', 'Tumbuh dan Berkembang', 'Memberikan ruang bagi anak untuk tumbuh, belajar, bermain, berkarya, dan mengembangkan potensi dirinya.', 'fa-solid fa-seedling', '', 3, '2026-09-16 04:10:59', '2026-09-16 04:10:59'),
(6, 'why_4', '', 'Partisipasi Anak', 'Memberikan kesempatan kepada anak untuk menyampaikan pendapat dan ikut berpartisipasi dalam lingkungan sekitarnya.', 'fa-solid fa-comments', '', 4, '2026-09-16 04:10:59', '2026-09-16 04:10:59'),
(7, 'message', '', 'Setiap anak berhak tumbuh, berkembang, merasa aman, dan didengar.', 'Menciptakan lingkungan layak anak adalah tanggung jawab kita bersama.', '', '', 0, '2026-09-16 04:10:59', '2026-09-16 04:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT '',
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul`, `tanggal`, `deskripsi`, `gambar`, `dibuat_pada`) VALUES
(1, 'HARI ANAK NASIONAL KABUPATEN MAGELANG 2026', '2026-07-30', 'Puncak peringatan Hari Anak Nasional (HAN) ke-42 Kabupaten Magelang yang bertema \"Sayangi Anak, Lindungi, dan Bangun Masa Depan\" diselenggarakan pada hari Kamis, 30 Juli 2026 di Kompleks Pemda Kabupaten Magelang dan diikuti oleh 1.217 anak dari seluruh Kabupaten Magelang.\r\n\r\nBupati Magelang Grengseng Pamuji mengatakan, pembangunan masa depan Kabupaten Magelang dimulai dari pemberian pelayanan terbaik kepada anak sejak usia dini. Menurutnya, kolaborasi lintas Perangkat Daerah (PD) menjadi langkah strategis untuk menyiapkan sumber daya manusia yang berkualitas.', 'WhatsApp_Image_2026-09-16_at_11_13_58.jpeg', '2026-09-12 17:48:19'),
(2, 'Standar Pelayanan Bantuan Anak Terlantar', '2026-09-05', 'Informasi mengenai prosedur, persyaratan, produk layanan, biaya, waktu pelayanan, dan layanan pengaduan bagi anak terlantar di Kabupaten Magelang.', 'Screenshot_2026-09-16_150701.png', '2026-09-12 17:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(10) UNSIGNED NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` varchar(255) NOT NULL DEFAULT 'Dokumentasi kegiatan Layak Anak.',
  `gambar` varchar(255) NOT NULL DEFAULT '',
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `album_id`, `judul`, `deskripsi`, `gambar`, `dibuat_pada`) VALUES
(5, NULL, 'HARI ANAK NASIONAL KABUPATEN MAGELANG 2026', 'SEMANGAT', 'WhatsApp_Image_2026-09-16_at_11_14_26.jpeg', '2026-09-16 11:42:25'),
(6, NULL, 'Foto 1', '', '2025_02_17_18_18_IMG_3626.JPG', '2026-09-16 11:56:22'),
(10, 2, 'HARI ANAK NASIONAL KABUPATEN MAGELANG 2026', '', 'WhatsApp_Image_2026-09-16_at_11_17_451.jpeg', '2026-09-16 13:17:29'),
(11, 2, 'HARI ANAK NASIONAL KABUPATEN MAGELANG 2026', '', 'WhatsApp_Image_2026-09-16_at_11_14_262.jpeg', '2026-09-16 13:17:29'),
(12, 2, 'HARI ANAK NASIONAL KABUPATEN MAGELANG 2026', '', 'WhatsApp_Image_2026-09-16_at_11_17_43.jpeg', '2026-09-16 13:17:29'),
(13, 2, 'HARI ANAK NASIONAL KABUPATEN MAGELANG 2026', '', 'WhatsApp_Image_2026-09-16_at_11_14_01.jpeg', '2026-09-16 13:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klaster`
--

CREATE TABLE `tb_klaster` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` varchar(5) NOT NULL,
  `ikon` varchar(10) NOT NULL DEFAULT '',
  `judul` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `google_drive_link` varchar(500) DEFAULT NULL,
  `google_drive_kelembagaan` varchar(500) DEFAULT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_klaster`
--

INSERT INTO `tb_klaster` (`id`, `nomor`, `ikon`, `judul`, `deskripsi`, `google_drive_link`, `google_drive_kelembagaan`, `dibuat_pada`) VALUES
(1, '01', '🪪', 'Hak Sipil dan Kebebasan', 'Pemenuhan hak anak atas identitas, pencatatan kelahiran, informasi, serta kesempatan untuk menyampaikan pendapat dan berpartisipasi.', 'https://drive.google.com/drive/folders/1GzN1sW1uuzjAGZKZ1pLqKyi8CWJsxwsK?usp=drive_link', 'https://drive.google.com/drive/folders/1AtbxOcDy_gjGsguz2FZNWcvqjPaLhHxd?usp=sharing', '2026-09-12 17:48:19'),
(2, '02', '🏠', 'Lingkungan Keluarga dan Pengasuhan', 'Dukungan terhadap keluarga dan pengasuhan yang aman agar anak dapat tumbuh dan berkembang dalam lingkungan yang mendukung.', 'https://drive.google.com/drive/folders/170bsq0xA5uRb0oa-Rxg_Qqwa6e6zBG2u?usp=drive_link', 'https://drive.google.com/drive/folders/1AtbxOcDy_gjGsguz2FZNWcvqjPaLhHxd?usp=sharing', '2026-09-12 17:48:19'),
(3, '03', '❤️', 'Kesehatan Dasar dan Kesejahteraan', 'Pemenuhan kebutuhan kesehatan, gizi, sanitasi, serta kesejahteraan anak dalam kehidupan sehari-hari.', 'https://drive.google.com/drive/folders/12mUkzlB0h_jehriVUx0cQjdH_M2x43CW?usp=drive_link', 'https://drive.google.com/drive/folders/1AtbxOcDy_gjGsguz2FZNWcvqjPaLhHxd?usp=sharing', '2026-09-12 17:48:19'),
(4, '04', '🎓', 'Pendidikan, Waktu Luang dan Budaya', 'Dukungan terhadap pendidikan, kegiatan bermain, waktu luang, kreativitas, olahraga, dan pengembangan budaya anak.', 'https://drive.google.com/drive/folders/1cX3dv0vukro4EXfsg95USICXrldOHp2D?usp=drive_link', 'https://drive.google.com/drive/folders/1AtbxOcDy_gjGsguz2FZNWcvqjPaLhHxd?usp=sharing', '2026-09-12 17:48:19'),
(5, '05', '🛡️', 'Perlindungan Khusus', 'Perlindungan dan pelayanan bagi anak yang berada dalam kondisi tertentu dan membutuhkan perlindungan khusus.', 'https://drive.google.com/drive/folders/1DBNblz0fFkh9YvFm9PtGy2s2nviOLhAJ?usp=drive_link', 'https://drive.google.com/drive/folders/1AtbxOcDy_gjGsguz2FZNWcvqjPaLhHxd?usp=sharing', '2026-09-12 17:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klaster_poin`
--

CREATE TABLE `tb_klaster_poin` (
  `id` int(10) UNSIGNED NOT NULL,
  `klaster_id` int(10) UNSIGNED NOT NULL,
  `poin` text NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_klaster_poin`
--

INSERT INTO `tb_klaster_poin` (`id`, `klaster_id`, `poin`, `urutan`) VALUES
(61, 1, 'Hak memperoleh identitas', 1),
(62, 1, 'Hak memperoleh identitas', 2),
(63, 1, 'Hak memperoleh akta kelahiran', 3),
(64, 1, 'Hak memperoleh akta kelahiran', 4),
(65, 1, 'Hak memperoleh informasi', 5),
(66, 1, 'Hak memperoleh informasi', 6),
(67, 1, 'Hak menyampaikan pendapat', 7),
(68, 1, 'Hak menyampaikan pendapat', 8),
(69, 1, 'Hak untuk berpartisipasi', 9),
(70, 1, 'Hak untuk berpartisipasi', 10),
(71, 2, 'Pengasuhan yang layak', 1),
(72, 2, 'Pengasuhan yang layak', 2),
(73, 2, 'Lingkungan keluarga yang aman', 3),
(74, 2, 'Lingkungan keluarga yang aman', 4),
(75, 2, 'Dukungan bagi keluarga', 5),
(76, 2, 'Dukungan bagi keluarga', 6),
(77, 2, 'Pencegahan penelantaran anak', 7),
(78, 2, 'Pencegahan penelantaran anak', 8),
(79, 2, 'Pemenuhan kebutuhan anak dalam keluarga', 9),
(80, 2, 'Pemenuhan kebutuhan anak dalam keluarga', 10),
(81, 3, 'Pelayanan kesehatan anak', 1),
(82, 3, 'Pelayanan kesehatan anak', 2),
(83, 3, 'Pemenuhan kebutuhan gizi', 3),
(84, 3, 'Pemenuhan kebutuhan gizi', 4),
(85, 3, 'Akses terhadap air bersih', 5),
(86, 3, 'Akses terhadap air bersih', 6),
(87, 3, 'Sanitasi yang layak', 7),
(88, 3, 'Sanitasi yang layak', 8),
(89, 3, 'Pemenuhan kesejahteraan anak', 9),
(90, 3, 'Pemenuhan kesejahteraan anak', 10),
(91, 4, 'Akses pendidikan', 1),
(92, 4, 'Akses pendidikan', 2),
(93, 4, 'Lingkungan pendidikan yang aman', 3),
(94, 4, 'Lingkungan pendidikan yang aman', 4),
(95, 4, 'Kesempatan bermain', 5),
(96, 4, 'Kesempatan bermain', 6),
(97, 4, 'Kegiatan olahraga dan kreativitas', 7),
(98, 4, 'Kegiatan olahraga dan kreativitas', 8),
(99, 4, 'Pengembangan minat dan bakat', 9),
(100, 4, 'Pengembangan minat dan bakat', 10),
(101, 5, 'Perlindungan dari kekerasan', 1),
(102, 5, 'Perlindungan dari kekerasan', 2),
(103, 5, 'Perlindungan dari eksploitasi', 3),
(104, 5, 'Perlindungan dari eksploitasi', 4),
(105, 5, 'Perlindungan dari diskriminasi', 5),
(106, 5, 'Perlindungan dari diskriminasi', 6),
(107, 5, 'Perlindungan bagi anak dalam kondisi khusus', 7),
(108, 5, 'Perlindungan bagi anak dalam kondisi khusus', 8),
(109, 5, 'Pelayanan bagi anak yang membutuhkan perlindungan', 9),
(110, 5, 'Pelayanan bagi anak yang membutuhkan perlindungan', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_paparan`
--

CREATE TABLE `tb_paparan` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `berkas` varchar(255) NOT NULL DEFAULT '',
  `mime` varchar(100) NOT NULL DEFAULT 'application/pdf',
  `ukuran` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_paparan`
--

INSERT INTO `tb_paparan` (`id`, `judul`, `deskripsi`, `berkas`, `mime`, `ukuran`, `tanggal`, `dibuat_pada`) VALUES
(12, 'Hasil Rekap Pemeriksaan Psikologis Pasangan Dispensasi Kawin (1).pdf 291 KB', 'Rekap Pemeriksaan Psikologis Pasangan Dispensasi Kawin', 'Hasil_Rekap_Pemeriksaan_Psikologis_Pasangan_Dispensasi_Kawin__1_.pdf', 'application/pdf', 297882, '2026-09-17 09:45:10', '2026-09-17 14:45:10'),
(13, 'Konvensi Hak Anak sebagai fondasi Layanan PUSPAGA', 'Tuliskan tanggapan Anda di kolom Chat setelah membaca pernyataan\r\nyang ditayangkan. Tanggapan Anda bisa SETUJU, TIDAK SETUJU atau\r\nRAGU-RAGU. Lanjutkan untuk semua pernyataan.', 'Bimtek_KHA_PUSPAGA_daring.pdf', 'application/pdf', 22994104, '2026-09-29 03:07:51', '2026-09-29 08:07:51'),
(14, 'PUSPAGA 2026: PEMETAAN ASET LINGKUNGAN SEKITAR', ' Pemetaan Aset Lingkunan Masyarakat Sekitar PUSPAGA', 'Tugas_PEMETAAN_ASET_LINGK_Bimtek_KHA_PUSPAGA.pdf', 'application/pdf', 491407, '2026-09-29 03:12:55', '2026-09-29 08:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `ip` varchar(45) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`id`, `tanggal`, `ip`, `dibuat_pada`) VALUES
(2, '2026-09-12', '::1', '2026-09-12 18:50:09'),
(3, '2026-09-12', '127.0.0.1', '2026-09-12 20:58:04'),
(4, '2026-09-13', '::1', '2026-09-13 08:53:09'),
(5, '2026-09-14', '::1', '2026-09-14 07:48:35'),
(6, '2026-09-14', '127.0.0.1', '2026-09-14 08:35:19'),
(7, '2026-09-15', '::1', '2026-09-15 07:31:50'),
(8, '2026-09-16', '::1', '2026-09-16 07:34:01'),
(9, '2026-09-17', '::1', '2026-09-17 07:36:30'),
(11, '2026-09-18', '::1', '2026-09-18 07:37:18'),
(12, '2026-09-25', '::1', '2026-09-25 07:41:35'),
(13, '2026-09-29', '::1', '2026-09-29 07:58:57'),
(14, '2026-10-02', '::1', '2026-10-02 11:37:07'),
(15, '2026-10-05', '::1', '2026-10-05 13:56:24'),
(16, '2026-10-06', '::1', '2026-10-06 08:11:33'),
(17, '2026-10-07', '::1', '2026-10-07 07:38:22'),
(18, '2026-10-08', '::1', '2026-10-08 07:44:05'),
(19, '2026-10-15', '::1', '2026-10-15 07:42:33'),
(20, '2026-10-21', '::1', '2026-10-21 15:09:43'),
(21, '2026-10-29', '::1', '2026-10-29 11:19:05'),
(22, '2026-11-01', '::1', '2026-11-01 15:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Belum Dibaca','Sudah Dibaca') NOT NULL DEFAULT 'Belum Dibaca',
  `tanggal_dibaca` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id`, `nama`, `email`, `pesan`, `tanggal`, `status`, `tanggal_dibaca`) VALUES
(5, 'Najwa', 'galuhnajwapramudyaramadhani@gmail.com', 'Halo, Aku mau buat laporan\r\n', '2026-09-15 11:42:17', 'Sudah Dibaca', '2026-10-15 02:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id` int(10) UNSIGNED NOT NULL,
  `tentang_label` varchar(100) NOT NULL DEFAULT 'TENTANG LAYAK ANAK',
  `tentang_judul` varchar(255) NOT NULL DEFAULT 'Mewujudkan Lingkungan yang Aman dan Ramah bagi Anak',
  `tentang_deskripsi` text NOT NULL,
  `visi_label` varchar(100) NOT NULL DEFAULT 'VISI & MISI',
  `visi_judul` varchar(255) NOT NULL DEFAULT 'Visi & Misi Layak Anak',
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `tujuan_label` varchar(100) NOT NULL DEFAULT 'TUJUAN',
  `tujuan_judul` varchar(255) NOT NULL DEFAULT 'Tujuan Layak Anak',
  `tujuan_deskripsi` varchar(255) NOT NULL DEFAULT 'Beberapa tujuan utama dalam mewujudkan lingkungan yang mendukung pemenuhan hak dan perlindungan anak.',
  `diperbarui_pada` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id`, `tentang_label`, `tentang_judul`, `tentang_deskripsi`, `visi_label`, `visi_judul`, `visi`, `misi`, `tujuan_label`, `tujuan_judul`, `tujuan_deskripsi`, `diperbarui_pada`) VALUES
(1, 'TENTANG LAYAK ANAK', 'Mewujudkan Lingkungan yang Aman dan Ramah bagi Anak', 'Kabupaten/Kota Layak Anak merupakan upaya untuk menciptakan lingkungan yang mendukung pemenuhan hak dan perlindungan anak melalui kebijakan, program, dan kegiatan yang terintegrasi.\r\n\r\nPelaksanaan program Layak Anak melibatkan berbagai pihak dalam menciptakan kondisi lingkungan yang aman, nyaman, sehat, serta mendukung tumbuh dan berkembangnya anak.\r\n\r\nMelalui berbagai program dan kegiatan, pemenuhan hak anak diharapkan dapat dilakukan secara berkelanjutan serta memberikan ruang bagi anak untuk tumbuh dan berpartisipasi.', 'VISI & MISI', 'Visi & Misi Layak Anak', 'Terwujudnya Kabupaten Magelang sebagai Kabupaten Layak Anak yang aman, nyaman, dan ramah bagi tumbuh kembang serta perlindungan anak.', 'Hak Sipil dan Kebebasan. Meningkatkan pemenuhan hak identitas serta kebebasan berekspresi dan berpendapat bagi setiap anak.\r\nKeluarga dan Pengasuhan. Memperkuat peran keluarga dalam pengasuhan serta memastikan tersedianya pengasuhan alternatif yang layak bagi anak.\r\nKesehatan dan Kesejahteraan. Meningkatkan akses pelayanan kesehatan, gizi, dan kesejahteraan sosial bagi seluruh anak.\r\nPendidikan dan Budaya. Memperluas akses pendidikan berkualitas serta ruang bermain, berekspresi, dan berkegiatan budaya bagi anak.\r\nPerlindungan Khusus. Memberikan perlindungan khusus bagi anak dari kekerasan, eksploitasi, serta bagi anak dalam situasi darurat dan berhadapan dengan hukum.', 'TUJUAN', 'Tujuan Layak Anak', 'Beberapa tujuan utama dalam mewujudkan lingkungan yang mendukung pemenuhan hak dan perlindungan anak.', '2026-09-14 13:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil_tujuan`
--

CREATE TABLE `tb_profil_tujuan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor` varchar(5) NOT NULL DEFAULT '01',
  `judul` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_profil_tujuan`
--

INSERT INTO `tb_profil_tujuan` (`id`, `nomor`, `judul`, `deskripsi`, `urutan`) VALUES
(16, '01', 'Pemenuhan Hak Anak', 'Mendukung terpenuhinya berbagai hak anak melalui kebijakan, program, dan pelayanan yang sesuai dengan kebutuhan anak.', 1),
(17, '02', 'Perlindungan Anak', 'Menciptakan lingkungan yang memberikan perlindungan kepada anak dari berbagai bentuk kekerasan, diskriminasi, dan perlakuan yang merugikan.', 2),
(18, '03', 'Partisipasi Anak', 'Memberikan kesempatan kepada anak untuk menyampaikan pendapat serta berpartisipasi dalam berbagai kegiatan yang berkaitan dengan kehidupan mereka.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT '',
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id`, `judul`, `kategori`, `deskripsi`, `gambar`, `dibuat_pada`) VALUES
(1, 'Pendidikan dan Partisipasi Anak', 'Pendidikan', 'Program yang mendukung keterlibatan anak dalam memperoleh pendidikan yang layak serta memberikan ruang bagi anak untuk berpartisipasi dalam berbagai kegiatan.', '', '2026-09-12 17:48:19'),
(2, 'Perlindungan Anak', 'Perlindungan', 'Program yang bertujuan meningkatkan upaya perlindungan anak dari berbagai bentuk kekerasan, eksploitasi, diskriminasi, dan perlakuan yang dapat merugikan anak.', '', '2026-09-12 17:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `dibuat_pada` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `dibuat_pada`) VALUES
(1, 'admin', '$2y$10$.KcfqbcXK2Y6JjU1DsuX8O4Ab3u3Xj.3Dcxw2Pn3iR5F74z4Gm8j6', 'Administrator', '2026-09-12 17:48:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_album`
--
ALTER TABLE `tb_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_beranda`
--
ALTER TABLE `tb_beranda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_bagian` (`bagian`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_berita_tanggal` (`tanggal`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_klaster`
--
ALTER TABLE `tb_klaster`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_nomor` (`nomor`);

--
-- Indexes for table `tb_klaster_poin`
--
ALTER TABLE `tb_klaster_poin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_poin_klaster` (`klaster_id`);

--
-- Indexes for table `tb_paparan`
--
ALTER TABLE `tb_paparan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_kunjungan` (`tanggal`,`ip`),
  ADD KEY `idx_kunjung_tanggal` (`tanggal`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_pesan_tanggal` (`tanggal`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profil_tujuan`
--
ALTER TABLE `tb_profil_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_album`
--
ALTER TABLE `tb_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_beranda`
--
ALTER TABLE `tb_beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_klaster`
--
ALTER TABLE `tb_klaster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_klaster_poin`
--
ALTER TABLE `tb_klaster_poin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tb_paparan`
--
ALTER TABLE `tb_paparan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_profil_tujuan`
--
ALTER TABLE `tb_profil_tujuan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_klaster_poin`
--
ALTER TABLE `tb_klaster_poin`
  ADD CONSTRAINT `fk_poin_klaster` FOREIGN KEY (`klaster_id`) REFERENCES `tb_klaster` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
