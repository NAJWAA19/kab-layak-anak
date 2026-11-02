<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="page-header ph-program">
    <p class="section-label">PROGRAM DAN KEGIATAN</p>
    <h1>Program Layak Anak</h1>
    <p>Berbagai program dan kegiatan yang mendukung pemenuhan hak serta perlindungan anak.</p>
</section>
<section class="program">
    <div class="program-container">
        <?php if (!empty($program)): foreach ($program as $p): ?>
        <article class="program-card">
            <div class="program-image"><?php if (!empty($p->gambar)): ?><img src="<?php echo base_url('assets/uploads/program/'.$p->gambar); ?>" alt="<?php echo htmlspecialchars($p->judul); ?>"><?php else: ?><span>PROGRAM</span><?php endif; ?></div>
            <div class="program-content"><span><?php echo htmlspecialchars($p->kategori); ?></span><h3><?php echo htmlspecialchars($p->judul); ?></h3><p><?php echo htmlspecialchars(potong_teks($p->deskripsi,140)); ?></p><a href="<?php echo site_url('program/'.$p->id); ?>">Selengkapnya →</a></div>
        </article>
        <?php endforeach; else: ?>
        <div class="empty-public-news"><h3>Belum Ada Program</h3><p>Informasi program akan ditampilkan di sini.</p></div>
        <?php endif; ?>
    </div>
</section>
