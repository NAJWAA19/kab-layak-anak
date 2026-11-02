<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA BERITA</p>
        <h1>Berita dan Kegiatan</h1>
        <p>Tambahkan, ubah, atau hapus informasi berita yang ditampilkan pada website.</p>
    </div>
    <div class="admin-action">
        <a href="<?php echo site_url('admin-berita/tambah'); ?>" class="add-button" style="text-decoration:none;display:inline-block;">+ Tambah Berita</a>
    </div>
    <div id="newsList" class="admin-news-list">
        <?php if (empty($rows)): ?>
        <div class="empty-state-box">
            <div class="empty-state-illustration">
                <svg viewBox="0 0 200 160" xmlns="http://www.w3.org/2000/svg">
                    <rect x="30" y="30" width="140" height="100" rx="12" fill="#e3f2fd" opacity=".6"/>
                    <rect x="42" y="42" width="56" height="8" rx="4" fill="#90caf9"/>
                    <rect x="42" y="56" width="116" height="5" rx="2.5" fill="#bbdefb"/>
                    <rect x="42" y="66" width="98" height="5" rx="2.5" fill="#bbdefb"/>
                    <rect x="42" y="76" width="80" height="5" rx="2.5" fill="#bbdefb"/>
                    <rect x="42" y="92" width="40" height="14" rx="7" fill="#1976d2" opacity=".7"/>
                    <circle cx="150" cy="50" r="16" fill="#fbbf24" opacity=".3"/>
                    <path d="M145 44 l5-10 l5 10 l-8-4 l8 0Z" fill="#fbbf24" opacity=".4"/>
                    <circle cx="28" cy="130" r="8" fill="#22c55e" opacity=".2"/>
                    <circle cx="172" cy="120" r="6" fill="#f472b6" opacity=".2"/>
                </svg>
            </div>
            <div class="empty-state-icon"><i class="fa-solid fa-newspaper"></i></div>
            <h3>Belum Ada Berita</h3>
            <p>Belum ada berita atau kegiatan yang ditampilkan. Mulai tambahkan berita terkini untuk informasi masyarakat.</p>
            <a href="<?php echo site_url('admin-berita/tambah'); ?>" class="empty-state-btn"><i class="fa-solid fa-plus"></i> Tambah Berita Pertama</a>
        </div>
        <?php else: foreach ($rows as $r): ?>
        <div class="admin-news-card">
            <div class="admin-news-content">
                <span class="admin-news-date"><?php echo tgl_indo($r->tanggal); ?></span>
                <h3><?php echo htmlspecialchars($r->judul); ?></h3>
                <p><?php echo htmlspecialchars(potong_teks($r->deskripsi, 200)); ?></p>
                <?php if (!empty($r->gambar)): ?><p><small>Foto: <?php echo htmlspecialchars($r->gambar); ?></small></p><?php endif; ?>
            </div>
            <div class="admin-news-actions">
                <a href="<?php echo site_url('admin-berita/ubah/'.$r->id); ?>" class="edit-button" style="text-decoration:none;">Edit</a>
                <a href="<?php echo site_url('admin-berita/hapus/'.$r->id); ?>" class="delete-button" style="text-decoration:none;" onclick="return adminConfirm('Hapus Berita?','Berita \"<?php echo htmlspecialchars(addslashes($r->judul)); ?>\" akan dihapus permanen.','<?php echo site_url('admin-berita/hapus/'.$r->id); ?>')">Hapus</a>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</section>
<style>
.empty-state-box{background:#fff;border:2px dashed #e2e8f0;border-radius:20px;padding:50px 30px;text-align:center;margin-top:10px;}
.empty-state-illustration{width:180px;margin:0 auto 16px;opacity:.85;}
.empty-state-illustration svg{width:100%;height:auto;}
.empty-state-icon{width:72px;height:72px;margin:0 auto 18px;display:flex;align-items:center;justify-content:center;border-radius:50%;background:linear-gradient(135deg,#e3f2fd,#bbdefb);color:#1976d2;font-size:30px;}
.empty-state-box h3{font-size:20px;color:#1e293b;margin:0 0 8px;}
.empty-state-box p{color:#64748b;font-size:14px;max-width:420px;margin:0 auto 24px;line-height:1.6;}
.empty-state-btn{display:inline-flex;align-items:center;gap:8px;padding:12px 26px;background:linear-gradient(135deg,#1976d2,#1565c0);color:#fff;border-radius:12px;font-size:14px;font-weight:700;text-decoration:none;transition:.2s;box-shadow:0 4px 14px rgba(25,118,210,.3);}
.empty-state-btn:hover{transform:translateY(-2px);box-shadow:0 8px 22px rgba(25,118,210,.4);}
</style>
