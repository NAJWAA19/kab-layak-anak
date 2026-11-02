<?php defined('BASEPATH') OR exit('No direct script access allowed');
$total = count($rows);
$belum = 0; foreach ($rows as $r) if ($r->status === 'Belum Dibaca') $belum++;
?>
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
        <p class="section-label">KELOLA PESAN</p>
        <h1>Pesan dari Masyarakat</h1>
        <p>Kelola pesan dan pertanyaan yang dikirimkan oleh masyarakat melalui halaman kontak. (<?php echo (int)$total; ?> pesan • <?php echo (int)$belum; ?> belum dibaca)</p>
    </div>
    <div id="newsList" class="admin-news-list">
        <?php if (empty($rows)): ?>
        <div class="empty-state-box">
            <div class="empty-state-illustration">
                <svg viewBox="0 0 200 160" xmlns="http://www.w3.org/2000/svg">
                    <rect x="35" y="25" width="130" height="95" rx="14" fill="#faf5ff" opacity=".8"/>
                    <rect x="35" y="25" width="130" height="30" rx="14" fill="#f3e8ff" opacity=".6"/>
                    <rect x="50" y="65" width="80" height="6" rx="3" fill="#e9d5ff" opacity=".7"/>
                    <rect x="50" y="78" width="100" height="6" rx="3" fill="#e9d5ff" opacity=".5"/>
                    <rect x="50" y="91" width="60" height="6" rx="3" fill="#e9d5ff" opacity=".4"/>
                    <circle cx="155" cy="40" r="12" fill="#a78bfa" opacity=".3"/>
                    <path d="M150 36 l5-8 l5 8 l-4-3 l4 0Z" fill="#a78bfa" opacity=".4"/>
                    <circle cx="30" cy="120" r="8" fill="#22c55e" opacity=".2"/>
                    <circle cx="175" cy="130" r="6" fill="#f472b6" opacity=".2"/>
                </svg>
            </div>
            <div class="empty-state-icon" style="background:linear-gradient(135deg,#f5f3ff,#ede9fe);color:#7c3aed;"><i class="fa-solid fa-envelope-open"></i></div>
            <h3>Belum Ada Pesan</h3>
            <p>Pesan dari masyarakat akan muncul di sini. Ketika ada yang mengirim pesan melalui halaman kontak, pesannya akan tampil di panel ini.</p>
        </div>
        <?php else: foreach ($rows as $item): ?>
        <div class="admin-news-card">
            <div class="admin-news-content">
                <span class="admin-news-date"><?php echo tgl_indo($item->tanggal, TRUE); ?> • <?php echo htmlspecialchars($item->status); ?></span>
                <h3><?php echo htmlspecialchars($item->nama ?: 'Tanpa Nama'); ?> — <?php echo htmlspecialchars($item->email ?: '-'); ?></h3>
                <p><?php echo htmlspecialchars(potong_teks($item->pesan, 200)); ?></p>
            </div>
            <div class="admin-news-actions">
                <a href="<?php echo site_url('admin-pesan/baca/'.$item->id); ?>" class="edit-button" style="text-decoration:none;">Lihat</a>
                <a href="<?php echo site_url('admin-pesan/hapus/'.$item->id); ?>" class="delete-button" style="text-decoration:none;" onclick="return adminConfirm('Hapus Pesan?','Pesan dari <?php echo htmlspecialchars(addslashes($item->nama)); ?> akan dihapus permanen.','<?php echo site_url('admin-pesan/hapus/'.$item->id); ?>')">Hapus</a>
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
</style>
