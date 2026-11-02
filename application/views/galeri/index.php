<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="gallery-page">
    <div class="gallery-page-header">
        <p class="section-label">DOKUMENTASI</p>
        <h1>Galeri Album Kegiatan</h1>
        <p>Dokumentasi berbagai kegiatan dalam mendukung pemenuhan hak dan perlindungan anak.</p>
    </div>
    <?php $this->load->view('templates/page_slider', array('slider_id' => 'galeriSlider', 'slides' => array(
        array('icon' => 'fa-solid fa-images', 'theme' => 'blue', 'title' => 'Dokumentasi Kegiatan', 'desc' => 'Potret keseruan dan kebersamaan dalam setiap kegiatan anak.'),
        array('icon' => 'fa-solid fa-children', 'theme' => 'green', 'title' => 'Ruang Bermain & Belajar', 'desc' => 'Anak tumbuh lewat bermain, belajar, dan berkarya bersama.'),
        array('icon' => 'fa-solid fa-camera', 'theme' => 'pink', 'title' => 'Momen Berharga', 'desc' => 'Abadikan partisipasi anak dalam membangun lingkungan ramah anak.'),
    ))); ?>

    <div class="gallery-public-container">
        <?php if (!empty($albums)): foreach ($albums as $a): ?>
        <div class="gallery-public-card album-public-card">
            <div class="gallery-public-image">
                <?php if (!empty($a->cover)): ?>
                    <img src="<?php echo base_url('assets/uploads/galeri/'.$a->cover); ?>" alt="<?php echo htmlspecialchars($a->judul); ?>">
                <?php else: ?>
                    <span class="gallery-no-image"><i class="fa-solid fa-images" style="font-size:36px;opacity:.3;"></i></span>
                <?php endif; ?>
                <div class="album-foto-badge">
                    <i class="fa-solid fa-images"></i> <?php echo (int)$a->jumlah_foto; ?> Foto
                </div>
            </div>
            <div class="gallery-public-content">
                <h3><?php echo htmlspecialchars($a->judul); ?></h3>
                <p><?php echo htmlspecialchars($a->deskripsi); ?></p>
                <?php if ((int)$a->jumlah_foto > 0): ?>
                <a href="<?php echo site_url('galeri/'.$a->id); ?>" class="album-view-btn">Lihat Foto <i class="fa-solid fa-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; else: ?>
        <div class="paparan-empty"><div class="paparan-empty-icon">📁</div><h3>Belum Ada Album</h3><p>Dokumentasi kegiatan akan ditampilkan di sini.</p></div>
        <?php endif; ?>
    </div>
</section>

<style>
.album-public-card { position: relative; }
.album-foto-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(0,0,0,.55);
    color: #fff;
    padding: 4px 10px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    backdrop-filter: blur(4px);
}
.album-view-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-top: 10px;
    font-size: 13px;
    font-weight: 600;
    color: #1976d2;
    text-decoration: none;
    transition: .2s;
}
.album-view-btn:hover { color: #1565c0; gap: 10px; }
</style>
