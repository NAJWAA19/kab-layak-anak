<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="gallery-page">
    <div class="gallery-page-header">
        <p class="section-label">DOKUMENTASI</p>
        <h1><?php echo htmlspecialchars($album->judul); ?></h1>
        <p><?php echo htmlspecialchars($album->deskripsi); ?></p>
    </div>

    <div style="max-width:1200px;margin:0 auto;padding:0 8% 40px;">
        <a href="<?php echo site_url('galeri'); ?>" style="display:inline-flex;align-items:center;gap:6px;font-size:14px;font-weight:600;color:#1976d2;text-decoration:none;margin-bottom:24px;transition:.2s;" onmouseover="this.style.gap='10px'" onmouseout="this.style.gap='6px'"><i class="fa-solid fa-arrow-left"></i> Kembali ke Galeri</a>

        <?php if ((int)$album->jumlah_foto > 0): ?>
        <p style="font-size:13px;color:#94a3b8;margin-bottom:20px;"><i class="fa-solid fa-images" style="margin-right:4px;"></i> <?php echo (int)$album->jumlah_foto; ?> foto dalam album ini</p>
        <?php endif; ?>
    </div>

    <div class="gallery-public-container">
        <?php if (!empty($fotos)): foreach ($fotos as $f): ?>
        <div class="gallery-public-card">
            <div class="gallery-public-image">
                <?php if (!empty($f->gambar)): ?>
                    <img src="<?php echo base_url('assets/uploads/galeri/'.$f->gambar); ?>" alt="<?php echo htmlspecialchars($f->judul); ?>" style="cursor:pointer;" onclick="openLightbox(this.src)">
                <?php else: ?>
                    <span class="gallery-no-image">📷</span>
                <?php endif; ?>
            </div>
            <div class="gallery-public-content">
                <h3><?php echo htmlspecialchars($f->judul); ?></h3>
                <p><?php echo htmlspecialchars($f->deskripsi); ?></p>
            </div>
        </div>
        <?php endforeach; else: ?>
        <div class="paparan-empty"><div class="paparan-empty-icon">📷</div><h3>Belum Ada Foto</h3><p>Album ini belum memiliki foto.</p></div>
        <?php endif; ?>
    </div>
</section>

<!-- Lightbox -->
<div id="lightbox" onclick="closeLightbox()" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.85);z-index:9999;cursor:pointer;align-items:center;justify-content:center;">
    <img id="lightboxImg" src="" style="max-width:90%;max-height:90%;border-radius:8px;box-shadow:0 8px 32px rgba(0,0,0,.5);">
    <button onclick="closeLightbox()" style="position:absolute;top:20px;right:24px;background:none;border:none;color:#fff;font-size:28px;cursor:pointer;"><i class="fa-solid fa-xmark"></i></button>
</div>

<script>
function openLightbox(src) {
    document.getElementById('lightboxImg').src = src;
    document.getElementById('lightbox').style.display = 'flex';
}
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeLightbox(); });
</script>
