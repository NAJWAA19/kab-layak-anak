<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="page-header ph-berita">
    <p class="section-label">BERITA DAN INFORMASI</p>
    <h1>Berita Layak Anak</h1>
    <p>Informasi terbaru mengenai kegiatan dan upaya dalam mendukung pemenuhan hak serta perlindungan anak.</p>
</section>
<section class="detail-news">
    <div class="detail-news-container">
        <a href="<?php echo site_url('berita'); ?>" class="back-news">← Kembali ke Berita</a>
        <article class="detail-article">
            <div class="detail-image">
                <?php if (!empty($berita->gambar)): ?><img src="<?php echo base_url('assets/uploads/berita/'.$berita->gambar); ?>" alt="<?php echo htmlspecialchars($berita->judul); ?>"><?php else: ?><span>LAYAK ANAK</span><?php endif; ?>
            </div>
            <div class="detail-content">
                <span class="detail-date"><i class="fa-solid fa-calendar-days"></i> <?php echo tgl_indo($berita->tanggal); ?></span>
                <h1><?php echo htmlspecialchars($berita->judul); ?></h1>
                <div class="detail-text"><p><?php echo nl2br(htmlspecialchars($berita->deskripsi)); ?></p></div>
            </div>
        </article>
    </div>
</section>