-- ==================================================
-- MIGRASI : tb_profil + tb_profil_tujuan
-- Kelola Profil (singleton, bisa diubah admin kapan saja)
-- ==================================================
USE layanan_layak_anak;

CREATE TABLE IF NOT EXISTS tb_profil (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  tentang_label VARCHAR(100) NOT NULL DEFAULT 'TENTANG LAYAK ANAK',
  tentang_judul VARCHAR(255) NOT NULL DEFAULT 'Mewujudkan Lingkungan yang Aman dan Ramah bagi Anak',
  tentang_deskripsi TEXT NOT NULL,
  visi_label VARCHAR(100) NOT NULL DEFAULT 'VISI & MISI',
  visi_judul VARCHAR(255) NOT NULL DEFAULT 'Visi & Misi Layak Anak',
  visi TEXT NOT NULL,
  misi TEXT NOT NULL,
  tujuan_label VARCHAR(100) NOT NULL DEFAULT 'TUJUAN',
  tujuan_judul VARCHAR(255) NOT NULL DEFAULT 'Tujuan Layak Anak',
  tujuan_deskripsi VARCHAR(255) NOT NULL DEFAULT 'Beberapa tujuan utama dalam mewujudkan lingkungan yang mendukung pemenuhan hak dan perlindungan anak.',
  diperbarui_pada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tb_profil_tujuan (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nomor VARCHAR(5) NOT NULL DEFAULT '01',
  judul VARCHAR(150) NOT NULL,
  deskripsi TEXT NOT NULL,
  urutan INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed awal dari isi statis views/profil/index.php (hanya jika kosong)
INSERT INTO tb_profil (id, tentang_label, tentang_judul, tentang_deskripsi, visi_label, visi_judul, visi, misi, tujuan_label, tujuan_judul, tujuan_deskripsi)
SELECT 1,
  'TENTANG LAYAK ANAK',
  'Mewujudkan Lingkungan yang Aman dan Ramah bagi Anak',
  'Kabupaten/Kota Layak Anak merupakan upaya untuk menciptakan lingkungan yang mendukung pemenuhan hak dan perlindungan anak melalui kebijakan, program, dan kegiatan yang terintegrasi.\n\nPelaksanaan program Layak Anak melibatkan berbagai pihak dalam menciptakan kondisi lingkungan yang aman, nyaman, sehat, serta mendukung tumbuh dan berkembangnya anak.\n\nMelalui berbagai program dan kegiatan, pemenuhan hak anak diharapkan dapat dilakukan secara berkelanjutan serta memberikan ruang bagi anak untuk tumbuh dan berpartisipasi.',
  'VISI & MISI',
  'Visi & Misi Layak Anak',
  'Terwujudnya Kabupaten Magelang sebagai Kabupaten Layak Anak yang aman, nyaman, dan ramah bagi tumbuh kembang serta perlindungan anak.',
  'Hak Sipil dan Kebebasan. Meningkatkan pemenuhan hak identitas serta kebebasan berekspresi dan berpendapat bagi setiap anak.\nKeluarga dan Pengasuhan. Memperkuat peran keluarga dalam pengasuhan serta memastikan tersedianya pengasuhan alternatif yang layak bagi anak.\nKesehatan dan Kesejahteraan. Meningkatkan akses pelayanan kesehatan, gizi, dan kesejahteraan sosial bagi seluruh anak.\nPendidikan dan Budaya. Memperluas akses pendidikan berkualitas serta ruang bermain, berekspresi, dan berkegiatan budaya bagi anak.\nPerlindungan Khusus. Memberikan perlindungan khusus bagi anak dari kekerasan, eksploitasi, serta bagi anak dalam situasi darurat dan berhadapan dengan hukum.',
  'TUJUAN',
  'Tujuan Layak Anak',
  'Beberapa tujuan utama dalam mewujudkan lingkungan yang mendukung pemenuhan hak dan perlindungan anak.'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM tb_profil WHERE id = 1);

INSERT INTO tb_profil_tujuan (nomor, judul, deskripsi, urutan)
SELECT * FROM (
  SELECT '01' AS nomor, 'Pemenuhan Hak Anak' AS judul, 'Mendukung terpenuhinya berbagai hak anak melalui kebijakan, program, dan pelayanan yang sesuai dengan kebutuhan anak.' AS deskripsi, 1 AS urutan UNION ALL
  SELECT '02', 'Perlindungan Anak', 'Menciptakan lingkungan yang memberikan perlindungan kepada anak dari berbagai bentuk kekerasan, diskriminasi, dan perlakuan yang merugikan.', 2 UNION ALL
  SELECT '03', 'Partisipasi Anak', 'Memberikan kesempatan kepada anak untuk menyampaikan pendapat serta berpartisipasi dalam berbagai kegiatan yang berkaitan dengan kehidupan mereka.', 3
) AS seed
WHERE NOT EXISTS (SELECT 1 FROM tb_profil_tujuan);
