<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
@media (max-width:700px){
    #newsList .admin-news-card{flex-direction:column;align-items:stretch;gap:16px;padding:20px;}
    #newsList .admin-news-content h3{overflow-wrap:anywhere;}
    #newsList .admin-news-actions{width:100%;}
    #newsList .edit-button,#newsList .delete-button{flex:1;display:inline-block;text-align:center;}
}
</style>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA PROGRAM</p>
        <h1>Program Layak Anak</h1>
        <p>Tambahkan, ubah, atau hapus program yang ditampilkan pada website.</p>
    </div>
    <div class="admin-action">
        <a href="<?php echo site_url('admin-program/tambah'); ?>" class="add-button" style="text-decoration:none;display:inline-block;">+ Tambah Program</a>
    </div>
    <div id="newsList" class="admin-news-list">
        <?php if (empty($rows)): ?>
        <div class="empty-state-box">
            <div class="empty-state-illustration">
                <svg viewBox="0 0 200 160" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="80" r="50" fill="#f0fdf4" opacity=".8"/>
                    <circle cx="100" cy="80" r="35" fill="#dcfce7" opacity=".6"/>
                    <path d="M90 75 l6 12 l18-20" stroke="#16a34a" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".7"/>
                    <rect x="40" y="130" width="120" height="8" rx="4" fill="#e2e8f0" opacity=".5"/>
                    <circle cx="30" cy="40" r="10" fill="#fbbf24" opacity=".2"/>
                    <circle cx="170" cy="50" r="8" fill="#f472b6" opacity=".2"/>
                    <path d="M25 35 l3-8 l3 8 l-5-3 l5 0Z" fill="#fbbf24" opacity=".3"/>
                </svg>
            </div>
            <div class="empty-state-icon" style="background:linear-gradient(135deg,#f0fdf4,#dcfce7);color:#16a34a;"><i class="fa-solid fa-rocket"></i></div>
            <h3>Belum Ada Program</h3>
            <p>Belum ada program layak anak yang terdaftar. Mulai tambahkan program untuk melayani anak-anak di Kabupaten Magelang.</p>
            <a href="<?php echo site_url('admin-program/tambah'); ?>" class="empty-state-btn" style="background:linear-gradient(135deg,#16a34a,#15803d);box-shadow:0 4px 14px rgba(22,163,74,.3);"><i class="fa-solid fa-plus"></i> Tambah Program Pertama</a>
        </div>
        <?php else: foreach ($rows as $r): ?>
        <div class="admin-news-card">
            <div class="admin-news-content">
                <span class="admin-news-date"><?php echo htmlspecialchars($r->kategori); ?></span>
                <h3><?php echo htmlspecialchars($r->judul); ?></h3>
                <p><?php echo htmlspecialchars(potong_teks($r->deskripsi, 200)); ?></p>
            </div>
            <div class="admin-news-actions">
                <a href="<?php echo site_url('admin-program/ubah/'.$r->id); ?>" class="edit-button" style="text-decoration:none;">Edit</a>
                <a href="<?php echo site_url('admin-program/hapus/'.$r->id); ?>" class="delete-button" style="text-decoration:none;" onclick="return adminConfirm('Hapus Program?','Program \"<?php echo htmlspecialchars(addslashes($r->judul)); ?>\" akan dihapus permanen.','<?php echo site_url('admin-program/hapus/'.$r->id); ?>')">Hapus</a>
            </div>
        </div>
        <?php endforeach; endif; ?>
    </div>
</section>
<style>
.empty-state-box{background:#fff;border:2px dashed #e2e8f0;border-radius:20px;padding:50px 30px;text-align:center;margin-top:10px;}
.empty-state-illustration{width:180px;margin:0 auto 16px;opacity:.85;}
.empty-state-illustration svg{width:100%;height:auto;}
.empty-state-icon{width:72px;height:72px;margin:0 auto 18px;display:flex;align-items:center;justify-content:center;border-radius:50%;font-size:30px;}
.empty-state-box h3{font-size:20px;color:#1e293b;margin:0 0 8px;}
.empty-state-box p{color:#64748b;font-size:14px;max-width:420px;margin:0 auto 24px;line-height:1.6;}
.empty-state-btn{display:inline-flex;align-items:center;gap:8px;padding:12px 26px;color:#fff;border-radius:12px;font-size:14px;font-weight:700;text-decoration:none;transition:.2s;}
.empty-state-btn:hover{transform:translateY(-2px);}
</style>
