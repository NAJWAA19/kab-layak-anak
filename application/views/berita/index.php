<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="page-header ph-berita">
    <p class="section-label">BERITA DAN INFORMASI</p>
    <h1>Berita Layak Anak</h1>
    <p>Informasi terbaru mengenai kegiatan dan upaya dalam mendukung pemenuhan hak serta perlindungan anak.</p>
</section>
<?php $this->load->view('templates/page_slider', array('slider_id' => 'beritaSlider', 'slides' => array(
    array('icon' => 'fa-solid fa-newspaper', 'theme' => 'blue', 'title' => 'Berita Terbaru', 'desc' => 'Ikuti kabar terkini seputar program dan kegiatan Layak Anak.'),
    array('icon' => 'fa-solid fa-hand-holding-heart', 'theme' => 'green', 'title' => 'Kegiatan & Program', 'desc' => 'Dokumentasi aksi nyata pemenuhan hak dan perlindungan anak.'),
    array('icon' => 'fa-solid fa-bullhorn', 'theme' => 'pink', 'title' => 'Pengumuman', 'desc' => 'Informasi penting yang perlu diketahui masyarakat dan keluarga.'),
))); ?>
<section class="program">
    <div class="program-container">
        <?php if (!empty($berita)): foreach ($berita as $b): ?>
        <article class="program-card">
            <div class="program-image"><?php if (!empty($b->gambar)): ?><img src="<?php echo base_url('assets/uploads/berita/'.$b->gambar); ?>" alt="<?php echo htmlspecialchars($b->judul); ?>"><?php else: ?><span>BERITA</span><?php endif; ?></div>
            <div class="program-content"><span><?php echo tgl_indo($b->tanggal); ?></span><h3><?php echo htmlspecialchars($b->judul); ?></h3><p><?php echo htmlspecialchars(potong_teks($b->deskripsi,140)); ?></p><a href="<?php echo site_url('berita/'.$b->id); ?>">Selengkapnya →</a></div>
        </article>
        <?php endforeach; else: ?>
        <div class="empty-public-news"><h3>Belum Ada Berita</h3><p>Informasi berita akan ditampilkan di sini.</p></div>
        <?php endif; ?>
    </div>
</section>
