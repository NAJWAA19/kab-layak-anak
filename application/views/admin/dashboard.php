<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">DASHBOARD ADMIN</p>
        <h1>Selamat Datang, <?php echo isset($admin_nama) ? htmlspecialchars($admin_nama) : 'Admin'; ?> 👋</h1>
        <p>Kelola informasi yang ditampilkan pada Website Layak Anak melalui halaman ini.</p>
    </div>
    <div class="admin-menu">
        <div class="admin-card">
            <div class="admin-card-icon" style="background:linear-gradient(135deg,#1976d2,#42a5f5);"><i class="fa-solid fa-building"></i></div>
            <h3>Kelola Profil</h3>
            <p>Mengelola isi halaman profil yang ditampilkan pada website.</p>
            <a href="<?php echo site_url('admin-profil'); ?>">Kelola <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <div class="admin-card-icon" style="background:linear-gradient(135deg,#d81b60,#f06292);"><i class="fa-solid fa-scale-balanced"></i></div>
            <h3>Kelola Hak Anak</h3>
            <p>Mengelola informasi dan isi dari setiap klaster hak anak. <span class="admin-card-count"><?php echo isset($jml_klaster) ? (int)$jml_klaster : 5; ?> klaster</span></p>
            <a href="<?php echo site_url('admin-klaster'); ?>">Kelola <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <div class="admin-card-icon" style="background:linear-gradient(135deg,#2e7d32,#66bb6a);"><i class="fa-solid fa-hand-holding-heart"></i></div>
            <h3>Kelola Program</h3>
            <p>Mengelola program dan kegiatan Layak Anak. <span class="admin-card-count"><?php echo isset($jml_program) ? (int)$jml_program : 0; ?> program</span></p>
            <a href="<?php echo site_url('admin-program'); ?>">Kelola <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <div class="admin-card-icon" style="background:linear-gradient(135deg,#e65100,#fb923c);"><i class="fa-solid fa-newspaper"></i></div>
            <h3>Kelola Berita</h3>
            <p>Mengelola berita dan informasi kegiatan terbaru. <span class="admin-card-count"><?php echo isset($jml_berita) ? (int)$jml_berita : 0; ?> berita</span></p>
            <a href="<?php echo site_url('admin-berita'); ?>">Kelola <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <div class="admin-card-icon" style="background:linear-gradient(135deg,#6a1b9a,#ab47bc);"><i class="fa-solid fa-file-pdf"></i></div>
            <h3>Kelola Paparan</h3>
            <p>Mengelola materi dan dokumen PDF yang dapat dibaca oleh masyarakat. <span class="admin-card-count"><?php echo isset($jml_paparan) ? (int)$jml_paparan : 0; ?> materi</span></p>
            <a href="<?php echo site_url('admin-paparan'); ?>">Kelola <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <div class="admin-card-icon" style="background:linear-gradient(135deg,#00838f,#26c6da);"><i class="fa-solid fa-images"></i></div>
            <h3>Kelola Galeri</h3>
            <p>Mengelola dokumentasi galeri kegiatan. <span class="admin-card-count"><?php echo isset($jml_galeri) ? (int)$jml_galeri : 0; ?> foto</span></p>
            <a href="<?php echo site_url('admin-galeri'); ?>">Kelola <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="admin-card">
            <div class="admin-card-icon" style="background:linear-gradient(135deg,#f57f17,#fdd835);"><i class="fa-solid fa-envelope"></i></div>
            <h3>Pesan Masyarakat</h3>
            <p>Mengelola pesan dari masyarakat melalui halaman kontak. <span class="admin-card-count"><?php echo isset($jml_pesan) ? (int)$jml_pesan : 0; ?> pesan</span></p>
            <a href="<?php echo site_url('admin-pesan'); ?>">Kelola <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
<style>
.admin-dashboard{padding:40px 6% 60px;}
.admin-title{max-width:800px;margin:0 auto 40px;text-align:center;}
.admin-title h1{font-size:32px;margin:10px 0;color:#172033;}
.admin-title p:last-child{color:#64748b;line-height:1.7;}
.admin-menu{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:20px;align-items:stretch;}
.admin-card{background:#fff;border:1px solid #e5e7eb;border-radius:16px;padding:28px 24px;transition:all .25s;position:relative;overflow:hidden;}
.admin-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(15,23,42,.1);}
.admin-card-icon{width:50px;height:50px;border-radius:14px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;margin-bottom:18px;box-shadow:0 6px 16px rgba(0,0,0,.15);}
.admin-card h3{font-size:17px;color:#172033;margin-bottom:8px;}
.admin-card p{color:#64748b;font-size:13.5px;line-height:1.6;margin-bottom:18px;}
.admin-card-count{display:inline;background:#e0f2fe;color:#0369a1;padding:2px 8px;border-radius:6px;font-size:12px;font-weight:700;}
.admin-card a{color:#1976d2;font-weight:700;font-size:14px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;transition:gap .2s;}
.admin-card a:hover{gap:10px;color:#0d47a1;}
.admin-card a i{font-size:11px;}
</style>
