<?php defined('BASEPATH') OR exit('No direct script access allowed');
$cw = isset($warna) ? max(1, min(5, (int)$warna)) : 1;
?>
<section class="page-header ph-hak-anak">
    <p class="section-label">HAK ANAK</p>
    <h1>Pemenuhan Hak Anak</h1>
    <p>Informasi mengenai hak anak serta berbagai upaya dalam mendukung pemenuhan dan perlindungan anak.</p>
</section>
<section class="cluster-detail cw-<?php echo $cw; ?>">
    <div class="cluster-detail-container">
        <a href="<?php echo site_url('hak-anak'); ?>" class="back-link">← Kembali ke Hak Anak</a>
        <div class="cluster-detail-content">
            <div class="cluster-detail-header">
                <div class="cluster-detail-icon"><?php echo htmlspecialchars($klaster->ikon); ?></div>
                <div>
                    <span class="cluster-detail-number">KLASTER <?php echo htmlspecialchars($klaster->nomor); ?></span>
                    <h1><?php echo htmlspecialchars($klaster->judul); ?></h1>
                </div>
            </div>
            <div class="cluster-description">
                <h2>Tentang Klaster Ini</h2>
                <p><?php echo nl2br(htmlspecialchars($klaster->deskripsi)); ?></p>
            </div>
            <?php if (!empty($klaster->poin)): ?>
            <div class="cluster-points">
                <h2>Ruang Lingkup</h2>
                <div class="cluster-point-list">
                    <?php foreach ($klaster->poin as $p): ?>
                    <div class="cluster-point"><span>✓</span><p><?php echo htmlspecialchars($p->poin); ?></p></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php if (!empty($klaster->google_drive_link)): ?>
            <div class="cluster-drive-link">
                <a href="<?php echo htmlspecialchars($klaster->google_drive_link); ?>" target="_blank" rel="noopener noreferrer">
                    <i class="fa-brands fa-google-drive"></i>
                    <span>Lihat Dokumen Klaster Ini</span>
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>