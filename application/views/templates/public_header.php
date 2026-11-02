<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($title) ? $title.' | Layak Anak' : 'Layak Anak - Beranda'; ?></title>
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css?v='.filemtime(FCPATH.'assets/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/galeri.css?v='.filemtime(FCPATH.'assets/css/galeri.css')); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/paparan.css?v='.filemtime(FCPATH.'assets/css/paparan.css')); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/hero-anim.css?v='.filemtime(FCPATH.'assets/css/hero-anim.css')); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/modern.css?v='.filemtime(FCPATH.'assets/css/modern.css')); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/aksesibilitas.css?v='.filemtime(FCPATH.'assets/css/aksesibilitas.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<?php
$page_bg_segment = strtolower((string) $this->uri->segment(1));
$page_bg_on = in_array($page_bg_segment, array('profil', 'hak-anak', 'program', 'berita', 'galeri', 'paparan', 'kontak'), true);
?>
<body<?php echo $page_bg_on ? ' class="has-page-bg"' : ''; ?>>
<header class="main-header">
    <!-- Header SVG Illustrations -->
    <div class="header-illustrations">
        <!-- Matahari -->
        <div class="header-sun">
            <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                <circle cx="60" cy="60" r="22" fill="#fbbf24" opacity=".3"/>
                <circle cx="60" cy="60" r="15" fill="#f59e0b" opacity=".35"/>
                <g class="sun-rays">
                    <line x1="60" y1="18" x2="60" y2="8" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".25"/>
                    <line x1="60" y1="112" x2="60" y2="102" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".25"/>
                    <line x1="18" y1="60" x2="8" y2="60" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".25"/>
                    <line x1="112" y1="60" x2="102" y2="60" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".25"/>
                    <line x1="30" y1="30" x2="23" y2="23" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".2"/>
                    <line x1="90" y1="30" x2="97" y2="23" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".2"/>
                    <line x1="30" y1="90" x2="23" y2="97" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".2"/>
                    <line x1="90" y1="90" x2="97" y2="97" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".2"/>
                </g>
            </svg>
        </div>
        <!-- Awan kiri -->
        <div class="header-cloud cloud-1">
            <svg viewBox="0 0 120 60" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="55" cy="38" rx="38" ry="18" fill="#fff" opacity=".18"/>
                <ellipse cx="38" cy="30" rx="24" ry="16" fill="#fff" opacity=".15"/>
                <ellipse cx="72" cy="32" rx="20" ry="14" fill="#fff" opacity=".13"/>
            </svg>
        </div>
        <!-- Awan kanan -->
        <div class="header-cloud cloud-2">
            <svg viewBox="0 0 100 50" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="48" cy="32" rx="32" ry="14" fill="#fff" opacity=".16"/>
                <ellipse cx="32" cy="25" rx="20" ry="13" fill="#fff" opacity=".12"/>
            </svg>
        </div>
        <!-- Burung -->
        <div class="header-birds">
            <svg viewBox="0 0 60 30" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 18 Q12 10 18 16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" opacity=".2"/>
                <path d="M24 12 Q28 4 34 10" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" opacity=".18"/>
                <path d="M42 16 Q46 8 52 14" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" opacity=".15"/>
            </svg>
        </div>
        <!-- Pohon kiri -->
        <div class="header-tree tree-1">
            <svg viewBox="0 0 60 90" xmlns="http://www.w3.org/2000/svg">
                <rect x="26" y="52" width="8" height="30" rx="3" fill="#fff" opacity=".12"/>
                <ellipse cx="30" cy="38" rx="22" ry="24" fill="#22c55e" opacity=".12"/>
                <ellipse cx="30" cy="30" rx="16" ry="18" fill="#22c55e" opacity=".08"/>
            </svg>
        </div>
        <!-- Pohon kanan -->
        <div class="header-tree tree-2">
            <svg viewBox="0 0 50 80" xmlns="http://www.w3.org/2000/svg">
                <rect x="21" y="48" width="7" height="26" rx="3" fill="#fff" opacity=".1"/>
                <ellipse cx="25" cy="35" rx="18" ry="20" fill="#22c55e" opacity=".1"/>
                <ellipse cx="25" cy="28" rx="12" ry="14" fill="#86efac" opacity=".07"/>
            </svg>
        </div>
        <!-- Anak-anak bermain -->
        <div class="header-children children-left">
            <svg viewBox="0 0 100 80" xmlns="http://www.w3.org/2000/svg">
                <!-- Anak 1 (gadis - berdiri & melambai) -->
                <g>
                    <!-- Rambut belakang -->
                    <ellipse cx="28" cy="12" rx="9" ry="10" fill="#fff" opacity=".14"/>
                    <!-- Kepala -->
                    <circle cx="28" cy="11" r="7.5" fill="#fff" opacity=".2"/>
                    <!-- Rambut depan -->
                    <path d="M21 8 Q22 3 28 2 Q34 3 35 8 Q35 6 32 5 Q30 4 28 4 Q26 4 24 5 Q21 6 21 8Z" fill="#fff" opacity=".16"/>
                    <!-- Poni -->
                    <path d="M21 8 Q20 10 21 12 Q22 10 24 8Z" fill="#fff" opacity=".1"/>
                    <path d="M35 8 Q36 10 35 12 Q34 10 32 8Z" fill="#fff" opacity=".1"/>
                    <!-- Badan (gaun) -->
                    <path d="M22 18 L18 44 Q28 46 38 44 L34 18Z" fill="#fff" opacity=".15"/>
                    <!-- Lengan kiri (terangkat melambai) -->
                    <path d="M22 20 L12 14 Q10 13 9 15 L16 22Z" fill="#fff" opacity=".14"/>
                    <!-- Tangan kiri -->
                    <circle cx="10" cy="14" r="2.5" fill="#fff" opacity=".16"/>
                    <!-- Lengan kanan -->
                    <path d="M34 20 L40 30 Q41 32 39 33 L34 26Z" fill="#fff" opacity=".13"/>
                    <!-- Tangan kanan -->
                    <circle cx="39" cy="32" r="2" fill="#fff" opacity=".14"/>
                    <!-- Kaki kiri -->
                    <rect x="22" y="43" width="4.5" height="16" rx="2.2" fill="#fff" opacity=".13"/>
                    <!-- Sepatu kiri -->
                    <ellipse cx="24" cy="60" rx="4" ry="2.5" fill="#fff" opacity=".12"/>
                    <!-- Kaki kanan -->
                    <rect x="31" y="43" width="4.5" height="16" rx="2.2" fill="#fff" opacity=".13"/>
                    <!-- Sepatu kanan -->
                    <ellipse cx="33" cy="60" rx="4" ry="2.5" fill="#fff" opacity=".12"/>
                </g>
                <!-- Anak 2 (anak laki-laki - melompat) -->
                <g>
                    <!-- Kepala -->
                    <circle cx="68" cy="18" r="7" fill="#fff" opacity=".18"/>
                    <!-- Rambut -->
                    <path d="M61 15 Q62 10 68 9 Q74 10 75 15 Q75 13 73 12 Q70 10 68 10 Q66 10 63 12 Q61 13 61 15Z" fill="#fff" opacity=".14"/>
                    <!-- Badan (kaos) -->
                    <path d="M63 25 L61 42 Q68 44 75 42 L73 25Z" fill="#fff" opacity=".15"/>
                    <!-- Lengan kiri (terbuka) -->
                    <path d="M63 26 L54 32 Q52 33 51 31 L58 24Z" fill="#fff" opacity=".13"/>
                    <circle cx="52" cy="32" r="2" fill="#fff" opacity=".14"/>
                    <!-- Lengan kanan (terbuka) -->
                    <path d="M73 26 L82 20 Q84 19 85 21 L78 28Z" fill="#fff" opacity=".13"/>
                    <circle cx="84" cy="20" r="2" fill="#fff" opacity=".14"/>
                    <!-- Kaki kiri (melompat) -->
                    <path d="M62 42 L56 58 Q55 60 57 61 L64 52Z" fill="#fff" opacity=".13"/>
                    <ellipse cx="57" cy="60" rx="3.5" ry="2" fill="#fff" opacity=".11"/>
                    <!-- Kaki kanan (melompat) -->
                    <path d="M74 42 L80 56 Q81 58 79 59 L72 50Z" fill="#fff" opacity=".13"/>
                    <ellipse cx="80" cy="57" rx="3.5" ry="2" fill="#fff" opacity=".11"/>
                    <!-- Wajah tersenyum -->
                    <path d="M65 19 Q68 22 71 19" fill="none" stroke="#fff" stroke-width="1" stroke-linecap="round" opacity=".12"/>
                </g>
            </svg>
        </div>
        <!-- Bunga -->
        <div class="header-flowers">
            <svg viewBox="0 0 40 30" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="10" r="4" fill="#f472b6" opacity=".15"/>
                <circle cx="12" cy="10" r="2" fill="#fbbf24" opacity=".12"/>
                <line x1="12" y1="14" x2="12" y2="28" stroke="#22c55e" stroke-width="1.5" opacity=".1"/>
                <circle cx="28" cy="8" r="3.5" fill="#a78bfa" opacity=".13"/>
                <circle cx="28" cy="8" r="1.8" fill="#fbbf24" opacity=".1"/>
                <line x1="28" y1="12" x2="28" y2="26" stroke="#22c55e" stroke-width="1.3" opacity=".09"/>
            </svg>
        </div>
    </div>

    <div class="header-brand">
        <div class="header-logos">
            <img src="<?php echo base_url('assets/img/logo-dinsos.png'); ?>" alt="Logo Dinas Sosial Kabupaten Magelang" class="logo-dinsos">
            <img src="<?php echo base_url('assets/img/logo-kla.png'); ?>" alt="Logo Kabupaten Layak Anak" class="logo-kla">
        </div>
        <div class="header-title">
            <h2>KABUPATEN LAYAK ANAK</h2>
            <span>KABUPATEN MAGELANG</span>
        </div>
    </div>
    <nav class="main-nav">
        <a href="<?php echo site_url('/'); ?>" class="<?php echo active_menu(array('')); ?>">Beranda</a>
        <a href="<?php echo site_url('profil'); ?>" class="<?php echo active_menu(array('profil')); ?>">Profil</a>
        <a href="<?php echo site_url('hak-anak'); ?>" class="<?php echo active_menu(array('hak-anak','hak_anak')); ?>">Hak Anak</a>
        <a href="<?php echo site_url('program'); ?>" class="<?php echo active_menu(array('program')); ?>">Program</a>
        <a href="<?php echo site_url('berita'); ?>" class="<?php echo active_menu(array('berita')); ?>">Berita</a>
        <a href="<?php echo site_url('galeri'); ?>" class="<?php echo active_menu(array('galeri')); ?>">Galeri</a>
        <a href="<?php echo site_url('paparan'); ?>" class="<?php echo active_menu(array('paparan')); ?>">Paparan</a>
        <a href="<?php echo site_url('kontak'); ?>" class="<?php echo active_menu(array('kontak')); ?>">Kontak</a>
    </nav>
</header>
<?php if ($this->session->flashdata('success')): ?>
<div style="max-width:900px;margin:16px auto;padding:12px 16px;background:#e8f5e9;border:1px solid #a5d6a7;border-radius:8px;"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
<div style="max-width:900px;margin:16px auto;padding:12px 16px;background:#ffebee;border:1px solid #ef9a9a;border-radius:8px;"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>
