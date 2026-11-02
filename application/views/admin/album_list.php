<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA GALERI</p>
        <h1>Galeri Kegiatan</h1>
        <p>Kelola dokumentasi foto kegiatan yang ditampilkan pada website.</p>
    </div>
    <div style="margin-bottom:20px;">
        <a href="<?php echo site_url('admin-galeri/tambah'); ?>" class="add-button" style="text-decoration:none;display:inline-flex;align-items:center;gap:6px;">+ Tambah Galeri</a>
    </div>

    <?php if (!empty($rows)): ?>
    <div class="album-grid">
        <?php foreach ($rows as $a): ?>
        <div class="album-card">
            <a href="<?php echo site_url('admin-galeri/detail/'.$a->id); ?>" class="album-cover-link">
                <div class="album-cover">
                    <?php if (!empty($a->cover)): ?>
                        <img src="<?php echo base_url('assets/uploads/galeri/'.$a->cover); ?>" alt="<?php echo htmlspecialchars($a->judul); ?>">
                    <?php else: ?>
                        <div class="album-cover-placeholder">
                            <i class="fa-solid fa-images"></i>
                            <span><?php echo (int)$a->jumlah_foto; ?> Foto</span>
                        </div>
                    <?php endif; ?>
                    <div class="album-cover-overlay">
                        <i class="fa-solid fa-eye"></i> Lihat
                    </div>
                </div>
            </a>
            <div class="album-info">
                <h3><?php echo htmlspecialchars($a->judul); ?></h3>
                <p><?php echo htmlspecialchars($a->deskripsi); ?></p>
                <div class="album-meta">
                    <span class="album-count"><i class="fa-solid fa-images"></i> <?php echo (int)$a->jumlah_foto; ?> foto</span>
                    <span class="album-date"><i class="fa-regular fa-calendar"></i> <?php echo date('d M Y', strtotime($a->created_at)); ?></span>
                </div>
                <div class="album-actions">
                    <a href="<?php echo site_url('admin-galeri/detail/'.$a->id); ?>" class="edit-button" style="text-decoration:none;"><i class="fa-solid fa-folder-open"></i> Buka</a>
                    <a href="<?php echo site_url('admin-galeri/ubah/'.$a->id); ?>" class="edit-button" style="text-decoration:none;"><i class="fa-solid fa-pen"></i> Edit</a>
                    <a href="<?php echo site_url('admin-galeri/hapus/'.$a->id); ?>" class="delete-button" style="text-decoration:none;" onclick="return adminConfirm('Hapus Galeri?','Galeri \"<?php echo htmlspecialchars(addslashes($a->judul)); ?>\" dan semua foto di dalamnya akan dihapus permanen.','<?php echo site_url('admin-galeri/hapus/'.$a->id); ?>','fa-images')"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="empty-gallery">
        <div class="empty-gallery-icon">📷</div>
        <h3>Belum ada galeri</h3>
        <p>Silakan buat galeri baru menggunakan tombol di atas.</p>
    </div>
    <?php endif; ?>
</section>

<style>
.album-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}
.album-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 8px rgba(0,0,0,.04);
    transition: transform .2s, box-shadow .2s;
}
.album-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.08); }
.album-cover-link { display: block; text-decoration: none; }
.album-cover {
    height: 200px;
    background: linear-gradient(135deg, #dbeafe, #ede9fe);
    position: relative;
    overflow: hidden;
}
.album-cover img { width: 100%; height: 100%; object-fit: cover; }
.album-cover-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: #94a3b8;
}
.album-cover-placeholder i { font-size: 40px; opacity: .5; }
.album-cover-placeholder span { font-size: 13px; font-weight: 600; }
.album-cover-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,.4);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    opacity: 0;
    transition: opacity .2s;
}
.album-card:hover .album-cover-overlay { opacity: 1; }
.album-info { padding: 16px 18px; }
.album-info h3 { margin: 0 0 6px; font-size: 15px; color: #1e293b; }
.album-info p { margin: 0 0 10px; font-size: 13px; color: #64748b; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.album-meta {
    display: flex;
    gap: 14px;
    font-size: 12px;
    color: #94a3b8;
    margin-bottom: 12px;
}
.album-meta span { display: inline-flex; align-items: center; gap: 4px; }
.album-actions {
    display: flex;
    gap: 8px;
    align-items: center;
    padding-top: 12px;
    border-top: 1px solid #f1f5f9;
}
.album-actions .edit-button {
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    background: #f1f5f9;
    color: #475569;
    transition: .2s;
}
.album-actions .edit-button:hover { background: #e2e8f0; }
.album-actions .delete-button {
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 12px;
    background: #fee2e2;
    color: #dc2626;
    margin-left: auto;
    transition: .2s;
}
.album-actions .delete-button:hover { background: #fecaca; }
</style>
