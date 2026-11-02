<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($title) ? $title.' | Admin' : 'Dashboard Admin | Layak Anak'; ?></title>
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/admin-paparan.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
/* ===== ADMIN HEADER ===== */
header.admin-header{position:sticky;top:0;z-index:300;background:linear-gradient(135deg,#0d47a1 0%,#1976d2 48%,#7b1fa2 100%);border-bottom:none;box-shadow:0 6px 24px rgba(21,101,192,.3);display:flex;justify-content:space-between;align-items:center;padding:14px 8%;}
header.admin-header::after{content:"";position:absolute;left:0;right:0;bottom:0;height:4px;background:linear-gradient(90deg,#f472b6,#fbbf24,#22c55e,#38bdf8,#a78bfa);}
.admin-logo{display:flex;align-items:center;gap:12px;}
.admin-logo .header-logos img{background:#fff;border-radius:50%;padding:3px;box-shadow:0 3px 10px rgba(0,0,0,.25);}
.admin-logo .header-logos{display:flex;align-items:center;gap:8px;}
.admin-logo h2{color:#fff;font-size:18px;margin:0;text-shadow:0 1px 6px rgba(0,0,0,.2);}
.admin-logo span{color:#dbeafe;font-size:10px;letter-spacing:2px;font-weight:700;}
.sidebar-toggle{border:none;background:rgba(255,255,255,.2);border-radius:8px;font-size:18px;line-height:1;padding:8px 12px;cursor:pointer;color:#fff;transition:.2s;}
.sidebar-toggle:hover{background:rgba(255,255,255,.35);}

/* ===== ADMIN SIDEBAR ===== */
.admin-layout{display:flex;align-items:stretch;min-height:calc(100vh - 70px);}
.admin-sidebar{width:250px;flex-shrink:0;background:linear-gradient(180deg,#0b2a5b 0%,#1558b0 50%,#6a1b9a 100%);padding:20px 14px;display:flex;flex-direction:column;gap:4px;position:sticky;top:70px;height:calc(100vh - 70px);min-height:calc(100vh - 70px);overflow-y:auto;align-self:flex-start;border-right:none;}
.admin-sidebar::-webkit-scrollbar{width:4px;}
.admin-sidebar::-webkit-scrollbar-thumb{background:rgba(255,255,255,.2);border-radius:4px;}
.admin-sidebar a{display:flex;align-items:center;gap:10px;padding:11px 14px;border-radius:10px;text-decoration:none;color:rgba(255,255,255,.75);font-size:13.5px;font-weight:500;transition:all .2s;}
.admin-sidebar a i{width:18px;text-align:center;font-size:14px;}
.admin-sidebar a:hover{background:rgba(255,255,255,.15);color:#fff;}
.admin-sidebar a.active{background:#fff;color:#1976d2;box-shadow:0 4px 14px rgba(0,0,0,.2);font-weight:700;}
.admin-sidebar a.active i{color:#1976d2;}
.admin-sidebar .logout-button{margin-top:auto;background:rgba(239,68,68,.2);color:#fca5a5;border:1px solid rgba(239,68,68,.3);text-align:center;justify-content:center;font-weight:700;}
.admin-sidebar .logout-button:hover{background:rgba(239,68,68,.4);color:#fff;}
.sidebar-badge{background:#ef4444;color:#fff;font-size:11px;font-weight:700;padding:2px 7px;border-radius:10px;margin-left:auto;}

/* ===== ADMIN HEADER ILLUSTRATIONS ===== */
.admin-header-illustrations{position:absolute;inset:0;pointer-events:none;overflow:hidden;z-index:0;}
.admin-logo,.sidebar-toggle{position:relative;z-index:1;}
.admin-sun{position:absolute;top:-16px;right:6%;width:62px;height:62px;animation:aSunPulse 4s ease-in-out infinite;}
@keyframes aSunPulse{0%,100%{transform:scale(1) rotate(0deg);opacity:1;}50%{transform:scale(1.05) rotate(12deg);opacity:.8;}}
.admin-sun-rays{transform-origin:60px 60px;animation:aSunSpin 20s linear infinite;}
@keyframes aSunSpin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}
.admin-cloud{position:absolute;animation:aCloudDrift linear infinite;}
.ac-1{top:4px;left:16%;width:88px;animation-duration:24s;}
.ac-2{top:10px;right:20%;width:70px;animation-duration:30s;animation-delay:-10s;}
@keyframes aCloudDrift{0%{transform:translateX(0);}50%{transform:translateX(14px);}100%{transform:translateX(0);}}
.admin-birds{position:absolute;top:6px;left:36%;width:48px;animation:aBirdsFly 3.5s ease-in-out infinite;}
@keyframes aBirdsFly{0%,100%{transform:translate(0,0);}25%{transform:translate(8px,-3px);}50%{transform:translate(16px,1px);}75%{transform:translate(6px,-2px);}}
.admin-tree{position:absolute;bottom:6px;}
.at-1{left:2%;width:36px;animation:aTreeSway 5s ease-in-out infinite;}
.at-2{right:3%;width:30px;animation:aTreeSway 6s ease-in-out infinite;animation-delay:-2s;}
@keyframes aTreeSway{0%,100%{transform:rotate(0deg);}25%{transform:rotate(1.2deg);}75%{transform:rotate(-1.2deg);}}
.admin-children{position:absolute;bottom:2px;left:10%;width:68px;animation:aKidsBounce 2.8s ease-in-out infinite;}
@keyframes aKidsBounce{0%,100%{transform:translateY(0);}30%{transform:translateY(-4px);}60%{transform:translateY(-1px);}}

/* ===== ADMIN MAIN ===== */
.admin-main{flex:1;min-width:0;display:flex;flex-direction:column;background:#f0f4f8;}
.admin-main > footer{margin-top:auto;}

/* ===== SIDEBAR TOGGLE ===== */
.sidebar-backdrop{display:none;}
body.sidebar-collapsed .admin-sidebar{display:none;}
body.sidebar-collapsed .admin-main{margin-left:0;}

/* ===== ADMIN FOOTER ILLUSTRATIONS ===== */
.admin-footer-illustrations{position:absolute;inset:0;pointer-events:none;overflow:hidden;z-index:0;}
.af-sun{position:absolute;top:-18px;right:5%;width:75px;height:75px;animation:afSunPulse 5s ease-in-out infinite;}
@keyframes afSunPulse{0%,100%{transform:scale(1) rotate(0deg);opacity:1;}50%{transform:scale(1.05) rotate(10deg);opacity:.75;}}
.af-sun-rays{transform-origin:65px 65px;animation:afSunSpin 22s linear infinite;}
@keyframes afSunSpin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}
.af-cloud{position:absolute;animation:afCloudDrift linear infinite;}
.afc-1{top:6px;left:14%;width:95px;animation-duration:26s;}
.afc-2{top:14px;right:18%;width:72px;animation-duration:32s;animation-delay:-10s;}
@keyframes afCloudDrift{0%{transform:translateX(0);}50%{transform:translateX(14px);}100%{transform:translateX(0);}}
.af-birds{position:absolute;top:8px;left:38%;width:48px;animation:afBirdsFly 3.8s ease-in-out infinite;}
@keyframes afBirdsFly{0%,100%{transform:translate(0,0);}25%{transform:translate(7px,-3px);}50%{transform:translate(14px,1px);}75%{transform:translate(5px,-2px);}}
.af-tree{position:absolute;bottom:6px;}
.aft-1{left:2%;width:38px;animation:afTreeSway 5.5s ease-in-out infinite;}
.aft-2{right:3%;width:32px;animation:afTreeSway 6s ease-in-out infinite;animation-delay:-2s;}
@keyframes afTreeSway{0%,100%{transform:rotate(0deg);}25%{transform:rotate(1.2deg);}75%{transform:rotate(-1.2deg);}}
.af-children{position:absolute;bottom:4px;left:10%;width:66px;animation:afKidsBounce 3s ease-in-out infinite;}
@keyframes afKidsBounce{0%,100%{transform:translateY(0);}30%{transform:translateY(-4px);}60%{transform:translateY(-1px);}}
.af-flowers{position:absolute;bottom:8px;}
.aff-1{right:20%;width:34px;animation:afFlowerSway 4s ease-in-out infinite;}
@keyframes afFlowerSway{0%,100%{transform:rotate(0deg);}50%{transform:rotate(3deg);}}
.af-stars{position:absolute;animation:afStarTwinkle 2.5s ease-in-out infinite;}
.afs-1{top:20px;left:8%;width:18px;}
.afs-2{top:28px;right:10%;width:15px;animation-delay:-1s;animation-duration:3s;}
@keyframes afStarTwinkle{0%,100%{transform:scale(1);opacity:1;}50%{transform:scale(1.3);opacity:.5;}}
.af-butterfly{position:absolute;animation:afButterflyFloat 5s ease-in-out infinite;}
.afbf-1{bottom:22px;left:40%;width:28px;}
@keyframes afButterflyFloat{0%,100%{transform:translate(0,0);}25%{transform:translate(10px,-6px);}50%{transform:translate(5px,-3px);}75%{transform:translate(12px,-8px);}}
.af-grass{position:absolute;bottom:0;left:0;right:0;height:30px;pointer-events:none;}
.af-grass svg{width:100%;height:100%;}

/* ===== RESPONSIVE ===== */
@media (max-width:900px){
:root{--admin-header-h:70px;}
.admin-header{padding:12px 5%;}
.admin-header-illustrations{display:none;}
.admin-footer-illustrations{display:none;}
.admin-sidebar{position:fixed;left:0;top:70px;top:var(--admin-header-h);bottom:0;height:auto;min-height:calc(100vh - 70px);min-height:calc(100dvh - var(--admin-header-h, 70px));padding-top:16px;z-index:200;box-shadow:0 8px 32px rgba(0,0,0,.25);overflow-y:auto;}
body.sidebar-collapsed .sidebar-backdrop{display:none;}
body:not(.sidebar-collapsed) .sidebar-backdrop{display:block;position:fixed;left:0;right:0;bottom:0;top:70px;top:var(--admin-header-h);background:rgba(0,0,0,.5);z-index:150;backdrop-filter:blur(2px);}
.admin-logo h2{font-size:15px;}
}
</style>
</head>
<body class="admin-page">
<header class="admin-header">
    <!-- Admin Header Illustrations -->
    <div class="admin-header-illustrations">
        <div class="admin-sun">
            <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
                <circle cx="60" cy="60" r="22" fill="#fbbf24" opacity=".25"/>
                <circle cx="60" cy="60" r="15" fill="#f59e0b" opacity=".3"/>
                <g class="admin-sun-rays">
                    <line x1="60" y1="18" x2="60" y2="8" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".2"/>
                    <line x1="60" y1="112" x2="60" y2="102" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".2"/>
                    <line x1="18" y1="60" x2="8" y2="60" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".2"/>
                    <line x1="112" y1="60" x2="102" y2="60" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".2"/>
                    <line x1="30" y1="30" x2="23" y2="23" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".15"/>
                    <line x1="90" y1="30" x2="97" y2="23" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".15"/>
                    <line x1="30" y1="90" x2="23" y2="97" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".15"/>
                    <line x1="90" y1="90" x2="97" y2="97" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".15"/>
                </g>
            </svg>
        </div>
        <div class="admin-cloud ac-1">
            <svg viewBox="0 0 120 60" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="55" cy="38" rx="38" ry="18" fill="#fff" opacity=".14"/>
                <ellipse cx="38" cy="30" rx="24" ry="16" fill="#fff" opacity=".11"/>
                <ellipse cx="72" cy="32" rx="20" ry="14" fill="#fff" opacity=".1"/>
            </svg>
        </div>
        <div class="admin-cloud ac-2">
            <svg viewBox="0 0 100 50" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="48" cy="32" rx="32" ry="14" fill="#fff" opacity=".12"/>
                <ellipse cx="32" cy="25" rx="20" ry="13" fill="#fff" opacity=".09"/>
            </svg>
        </div>
        <div class="admin-birds">
            <svg viewBox="0 0 60 30" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 18 Q12 10 18 16" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" opacity=".16"/>
                <path d="M24 12 Q28 4 34 10" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" opacity=".14"/>
                <path d="M42 16 Q46 8 52 14" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" opacity=".12"/>
            </svg>
        </div>
        <div class="admin-tree at-1">
            <svg viewBox="0 0 60 90" xmlns="http://www.w3.org/2000/svg">
                <rect x="26" y="52" width="8" height="30" rx="3" fill="#fff" opacity=".1"/>
                <ellipse cx="30" cy="38" rx="22" ry="24" fill="#22c55e" opacity=".1"/>
                <ellipse cx="30" cy="30" rx="16" ry="18" fill="#22c55e" opacity=".06"/>
            </svg>
        </div>
        <div class="admin-tree at-2">
            <svg viewBox="0 0 50 80" xmlns="http://www.w3.org/2000/svg">
                <rect x="21" y="48" width="7" height="26" rx="3" fill="#fff" opacity=".08"/>
                <ellipse cx="25" cy="35" rx="18" ry="20" fill="#22c55e" opacity=".08"/>
                <ellipse cx="25" cy="28" rx="12" ry="14" fill="#86efac" opacity=".05"/>
            </svg>
        </div>
        <div class="admin-children">
            <svg viewBox="0 0 100 80" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <ellipse cx="28" cy="12" rx="9" ry="10" fill="#fff" opacity=".1"/>
                    <circle cx="28" cy="11" r="7.5" fill="#fff" opacity=".15"/>
                    <path d="M21 8 Q22 3 28 2 Q34 3 35 8 Q35 6 32 5 Q30 4 28 4 Q26 4 24 5 Q21 6 21 8Z" fill="#fff" opacity=".11"/>
                    <path d="M22 18 L18 44 Q28 46 38 44 L34 18Z" fill="#fff" opacity=".11"/>
                    <path d="M22 20 L12 14 Q10 13 9 15 L16 22Z" fill="#fff" opacity=".1"/>
                    <circle cx="10" cy="14" r="2.5" fill="#fff" opacity=".12"/>
                    <path d="M34 20 L40 30 Q41 32 39 33 L34 26Z" fill="#fff" opacity=".1"/>
                    <rect x="22" y="43" width="4.5" height="16" rx="2.2" fill="#fff" opacity=".1"/>
                    <rect x="31" y="43" width="4.5" height="16" rx="2.2" fill="#fff" opacity=".1"/>
                </g>
                <g>
                    <circle cx="68" cy="18" r="7" fill="#fff" opacity=".13"/>
                    <path d="M61 15 Q62 10 68 9 Q74 10 75 15 Q75 13 73 12 Q70 10 68 10 Q66 10 63 12 Q61 13 61 15Z" fill="#fff" opacity=".1"/>
                    <path d="M63 25 L61 42 Q68 44 75 42 L73 25Z" fill="#fff" opacity=".11"/>
                    <path d="M63 26 L54 32 Q52 33 51 31 L58 24Z" fill="#fff" opacity=".1"/>
                    <path d="M73 26 L82 20 Q84 19 85 21 L78 28Z" fill="#fff" opacity=".1"/>
                    <path d="M62 42 L56 58 Q55 60 57 61 L64 52Z" fill="#fff" opacity=".1"/>
                    <path d="M74 42 L80 56 Q81 58 79 59 L72 50Z" fill="#fff" opacity=".1"/>
                </g>
            </svg>
        </div>
    </div>
    <div class="admin-logo">
        <button type="button" id="sidebarToggle" class="sidebar-toggle" aria-label="Buka/tutup menu"><i class="fa-solid fa-bars"></i></button>
        <div class="header-logos">
            <img src="<?php echo base_url('assets/img/logo-dinsos.png'); ?>" alt="Logo Dinas Sosial Kabupaten Magelang" class="logo-dinsos" width="38" height="38">
            <img src="<?php echo base_url('assets/img/logo-kla.png'); ?>" alt="Logo Kabupaten Layak Anak" class="logo-kla" width="38" height="38">
        </div>
        <div>
            <h2>KABUPATEN LAYAK ANAK</h2>
            <span>ADMIN PANEL</span>
        </div>
    </div>
</header>
<div class="admin-layout">
<aside class="admin-sidebar" id="adminSidebar">
    <a href="<?php echo site_url('admin'); ?>" class="<?php echo active_menu(array('admin')); ?>"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>
    <a href="<?php echo site_url('admin-beranda'); ?>" class="<?php echo active_menu(array('admin-beranda','admin_beranda')); ?>"><i class="fa-solid fa-house"></i> Beranda</a>
    <a href="<?php echo site_url('admin-profil'); ?>" class="<?php echo active_menu(array('admin-profil','admin_profil')); ?>"><i class="fa-solid fa-building"></i> Profil</a>
    <a href="<?php echo site_url('admin-klaster'); ?>" class="<?php echo active_menu(array('admin-klaster','admin_klaster')); ?>"><i class="fa-solid fa-scale-balanced"></i> Hak Anak</a>
    <a href="<?php echo site_url('admin-program'); ?>" class="<?php echo active_menu(array('admin-program','admin_program')); ?>"><i class="fa-solid fa-hand-holding-heart"></i> Program</a>
    <a href="<?php echo site_url('admin-berita'); ?>" class="<?php echo active_menu(array('admin-berita','admin_berita')); ?>"><i class="fa-solid fa-newspaper"></i> Berita</a>
    <a href="<?php echo site_url('admin-galeri'); ?>" class="<?php echo active_menu(array('admin-galeri','admin_galeri')); ?>"><i class="fa-solid fa-images"></i> Galeri</a>
    <a href="<?php echo site_url('admin-paparan'); ?>" class="<?php echo active_menu(array('admin-paparan','admin_paparan')); ?>"><i class="fa-solid fa-file-pdf"></i> Paparan</a>
    <a href="<?php echo site_url('admin-pesan'); ?>" class="<?php echo active_menu(array('admin-pesan','admin_pesan')); ?>"><i class="fa-solid fa-envelope"></i> Pesan<?php if(!empty($pesan_belum_dibaca)): ?><span class="sidebar-badge"><?php echo (int)$pesan_belum_dibaca; ?></span><?php endif; ?></a>
    <a href="<?php echo site_url('/'); ?>" target="_blank"><i class="fa-solid fa-globe"></i> Lihat Situs</a>
    <a href="<?php echo site_url('admin-logout'); ?>" class="logout-button"><i class="fa-solid fa-right-from-bracket"></i> Keluar</a>
</aside>
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
<div class="admin-main">
<?php if ($this->session->flashdata('success')): ?><div style="max-width:1200px;margin:16px auto 0;padding:14px 18px;background:#dcfce7;border:1px solid #86efac;border-radius:10px;color:#166534;font-weight:600;"><i class="fa-solid fa-circle-check" style="margin-right:8px;"></i><?php echo $this->session->flashdata('success'); ?></div><?php endif; ?>
<?php if ($this->session->flashdata('error')): ?><div style="max-width:1200px;margin:16px auto 0;padding:14px 18px;background:#fee2e2;border:1px solid #fca5a5;border-radius:10px;color:#991b1b;font-weight:600;"><i class="fa-solid fa-circle-exclamation" style="margin-right:8px;"></i><?php echo $this->session->flashdata('error'); ?></div><?php endif; ?>
