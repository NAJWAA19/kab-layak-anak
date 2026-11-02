<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="page-header ph-program">
    <p class="section-label">PROGRAM DAN KEGIATAN</p>
    <h1>Program Layak Anak</h1>
    <p>Berbagai program dan kegiatan yang mendukung pemenuhan hak serta perlindungan anak.</p>
</section>
<section class="program-detail">
    <div class="program-detail-container">
        <div class="program-detail-image">
            <?php if (!empty($program->gambar)): ?><img src="<?php echo base_url('assets/uploads/program/'.$program->gambar); ?>" alt="<?php echo htmlspecialchars($program->judul); ?>"><?php else: ?><div class="program-no-image">PROGRAM LAYAK ANAK</div><?php endif; ?>
        </div>
        <div class="program-detail-content">
            <span class="program-detail-category"><?php echo htmlspecialchars($program->kategori); ?></span>
            <h1><?php echo htmlspecialchars($program->judul); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($program->deskripsi)); ?></p>
            <a href="<?php echo site_url('program'); ?>" class="back-button">← Kembali ke Program</a>
        </div>
    </div>
</section>