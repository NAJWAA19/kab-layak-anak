-- ==================================================
-- DATABASE : layanan_layak_anak
-- PROJECT  : layanan-layak-anak (CodeIgniter 3)
-- SUMBER DATA : project "website_layakanak"
--   - localStorage clusterData  -> tb_klaster + tb_klaster_poin
--   - localStorage newsData     -> tb_berita
--   - localStorage programData  -> tb_program
--   - localStorage galleryData  -> tb_galeri
--   - IndexedDB paparan         -> tb_paparan
--   - IndexedDB kontak/pesan    -> tb_pesan
--   - admin/admin123            -> tb_user (bcrypt)
--   - counter pengunjung footer -> tb_pengunjung
-- ==================================================

CREATE DATABASE IF NOT EXISTS layanan_layak_anak
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE layanan_layak_anak;

-- ==================================================
-- TABEL ADMIN / USER
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_user (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  dibuat_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- TABEL KLASTER HAK ANAK (5 klaster)
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_klaster (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nomor VARCHAR(5) NOT NULL,
  ikon VARCHAR(10) NOT NULL DEFAULT '',
  judul VARCHAR(150) NOT NULL,
  deskripsi TEXT NOT NULL,
  dibuat_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_nomor (nomor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tb_klaster_poin (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  klaster_id INT UNSIGNED NOT NULL,
  poin TEXT NOT NULL,
  urutan INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  KEY fk_poin_klaster (klaster_id),
  CONSTRAINT fk_poin_klaster
    FOREIGN KEY (klaster_id) REFERENCES tb_klaster (id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- TABEL BERITA
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_berita (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  judul VARCHAR(200) NOT NULL,
  tanggal DATE NOT NULL,
  deskripsi TEXT NOT NULL,
  gambar VARCHAR(255) NOT NULL DEFAULT '',
  dibuat_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_berita_tanggal (tanggal)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- TABEL PROGRAM
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_program (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  judul VARCHAR(200) NOT NULL,
  kategori VARCHAR(100) NOT NULL,
  deskripsi TEXT NOT NULL,
  gambar VARCHAR(255) NOT NULL DEFAULT '',
  dibuat_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- TABEL GALERI
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_galeri (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  judul VARCHAR(200) NOT NULL,
  deskripsi VARCHAR(255) NOT NULL DEFAULT 'Dokumentasi kegiatan Layak Anak.',
  gambar VARCHAR(255) NOT NULL DEFAULT '',
  dibuat_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- TABEL PAPARAN (materi PDF)
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_paparan (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  judul VARCHAR(200) NOT NULL,
  deskripsi TEXT NOT NULL,
  berkas VARCHAR(255) NOT NULL DEFAULT '',
  mime VARCHAR(100) NOT NULL DEFAULT 'application/pdf',
  ukuran INT UNSIGNED NOT NULL DEFAULT 0,
  tanggal DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dibuat_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- TABEL PESAN KONTAK (dari masyarakat)
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_pesan (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pesan TEXT NOT NULL,
  tanggal DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status ENUM('Belum Dibaca','Sudah Dibaca') NOT NULL DEFAULT 'Belum Dibaca',
  tanggal_dibaca DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (id),
  KEY idx_pesan_tanggal (tanggal)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- TABEL PENGUNJUNG (counter footer)
-- 1 baris = 1 IP unik per hari
-- ==================================================

CREATE TABLE IF NOT EXISTS tb_pengunjung (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tanggal DATE NOT NULL,
  ip VARCHAR(45) NOT NULL,
  dibuat_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_kunjungan (tanggal, ip),
  KEY idx_kunjung_tanggal (tanggal)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ==================================================
-- SEED : USER ADMIN (admin / admin123 - bcrypt)
-- ==================================================

INSERT INTO tb_user (username, password, nama) VALUES
('admin', '$2y$10$.KcfqbcXK2Y6JjU1DsuX8O4Ab3u3Xj.3Dcxw2Pn3iR5F74z4Gm8j6', 'Administrator');

-- ==================================================
-- SEED : 5 KLASTER HAK ANAK (dari defaultClusters)
-- ==================================================

INSERT INTO tb_klaster (nomor, ikon, judul, deskripsi) VALUES
('01', '🪪', 'Hak Sipil dan Kebebasan', 'Pemenuhan hak anak atas identitas, pencatatan kelahiran, informasi, serta kesempatan untuk menyampaikan pendapat dan berpartisipasi.'),
('02', '🏠', 'Lingkungan Keluarga dan Pengasuhan', 'Dukungan terhadap keluarga dan pengasuhan yang aman agar anak dapat tumbuh dan berkembang dalam lingkungan yang mendukung.'),
('03', '❤️', 'Kesehatan Dasar dan Kesejahteraan', 'Pemenuhan kebutuhan kesehatan, gizi, sanitasi, serta kesejahteraan anak dalam kehidupan sehari-hari.'),
('04', '🎓', 'Pendidikan, Waktu Luang dan Budaya', 'Dukungan terhadap pendidikan, kegiatan bermain, waktu luang, kreativitas, olahraga, dan pengembangan budaya anak.'),
('05', '🛡️', 'Perlindungan Khusus', 'Perlindungan dan pelayanan bagi anak yang berada dalam kondisi tertentu dan membutuhkan perlindungan khusus.');

INSERT INTO tb_klaster_poin (klaster_id, poin, urutan) VALUES
(1, 'Hak memperoleh identitas', 1),
(1, 'Hak memperoleh akta kelahiran', 2),
(1, 'Hak memperoleh informasi', 3),
(1, 'Hak menyampaikan pendapat', 4),
(1, 'Hak untuk berpartisipasi', 5),
(2, 'Pengasuhan yang layak', 1),
(2, 'Lingkungan keluarga yang aman', 2),
(2, 'Dukungan bagi keluarga', 3),
(2, 'Pencegahan penelantaran anak', 4),
(2, 'Pemenuhan kebutuhan anak dalam keluarga', 5),
(3, 'Pelayanan kesehatan anak', 1),
(3, 'Pemenuhan kebutuhan gizi', 2),
(3, 'Akses terhadap air bersih', 3),
(3, 'Sanitasi yang layak', 4),
(3, 'Pemenuhan kesejahteraan anak', 5),
(4, 'Akses pendidikan', 1),
(4, 'Lingkungan pendidikan yang aman', 2),
(4, 'Kesempatan bermain', 3),
(4, 'Kegiatan olahraga dan kreativitas', 4),
(4, 'Pengembangan minat dan bakat', 5),
(5, 'Perlindungan dari kekerasan', 1),
(5, 'Perlindungan dari eksploitasi', 2),
(5, 'Perlindungan dari diskriminasi', 3),
(5, 'Perlindungan bagi anak dalam kondisi khusus', 4),
(5, 'Pelayanan bagi anak yang membutuhkan perlindungan', 5);

-- ==================================================
-- SEED : BERITA CONTOH (dari defaultNews)
-- ==================================================

INSERT INTO tb_berita (judul, tanggal, deskripsi, gambar) VALUES
('Kegiatan Penguatan Kabupaten/Kota Layak Anak', '2026-09-07', 'Informasi mengenai kegiatan dan upaya pemerintah dalam mendukung pemenuhan hak dan perlindungan anak.', ''),
('Sosialisasi Pemenuhan Hak Anak', '2026-09-05', 'Kegiatan sosialisasi sebagai bagian dari upaya meningkatkan pemahaman mengenai hak dan perlindungan anak.', ''),
('Kegiatan Forum Anak Daerah', '2026-09-03', 'Informasi kegiatan partisipasi anak dalam pembangunan dan penyelenggaraan Kabupaten/Kota Layak Anak.', '');

-- ==================================================
-- SEED : PROGRAM CONTOH (dari defaultPrograms)
-- ==================================================

INSERT INTO tb_program (judul, kategori, deskripsi, gambar) VALUES
('Pendidikan dan Partisipasi Anak', 'Pendidikan', 'Program yang mendukung keterlibatan anak dalam memperoleh pendidikan yang layak serta memberikan ruang bagi anak untuk berpartisipasi dalam berbagai kegiatan.', ''),
('Perlindungan Anak', 'Perlindungan', 'Program yang bertujuan meningkatkan upaya perlindungan anak dari berbagai bentuk kekerasan, eksploitasi, diskriminasi, dan perlakuan yang dapat merugikan anak.', ''),
('Forum Anak', 'Partisipasi Anak', 'Program yang memberikan ruang bagi anak untuk menyampaikan aspirasi, berpartisipasi dalam kegiatan pembangunan, dan ikut mendukung penyelenggaraan Kabupaten/Kota Layak Anak.', '');
