<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="page-header ph-paparan">
    <p class="section-label">MATERI DAN INFORMASI</p>
    <h1>Paparan Layak Anak</h1>
    <p>Berbagai materi dan informasi mengenai pemenuhan hak serta perlindungan anak.</p>
</section>
<?php $this->load->view('templates/page_slider', array('slider_id' => 'paparanSlider', 'slides' => array(
    array('icon' => 'fa-solid fa-file-pdf', 'theme' => 'blue', 'title' => 'Materi Paparan', 'desc' => 'Kumpulan materi pemenuhan hak dan perlindungan anak.'),
    array('icon' => 'fa-solid fa-book-open-reader', 'theme' => 'green', 'title' => 'Baca Langsung', 'desc' => 'Baca materi di halaman ini tanpa perlu mengunduh terlebih dahulu.'),
    array('icon' => 'fa-solid fa-download', 'theme' => 'pink', 'title' => 'Unduh & Bagikan', 'desc' => 'Unduh dokumen dan sebarkan informasi baik kepada lingkunganmu.'),
))); ?>

<section class="paparan-content">
    <div class="paparan-section-header">
        <div class="paparan-section-title">
            <h2>Materi Paparan</h2>
            <p>Silakan baca atau unduh materi di bawah ini.</p>
        </div>
        <?php if (!empty($paparan)): ?>
        <div class="paparan-stats">
            <?php
                $jml_total = count($paparan);
                $jml_pdf = count(array_filter($paparan, function($p){ return strtolower(pathinfo($p->berkas, PATHINFO_EXTENSION)) === 'pdf'; }));
                $jml_img = count(array_filter($paparan, function($p){ return in_array(strtolower(pathinfo($p->berkas, PATHINFO_EXTENSION)), ['jpg','jpeg','png']); }));
            ?>
            <div class="paparan-stat"><i class="fa-solid fa-layer-group"></i> <span><?php echo $jml_total; ?> Materi</span></div>
            <div class="paparan-stat"><i class="fa-solid fa-file-pdf"></i> <span><?php echo $jml_pdf; ?> Materi</span></div>
            <div class="paparan-stat"><i class="fa-solid fa-image"></i> <span><?php echo $jml_img; ?> Gambar</span></div>
        </div>
        <?php endif; ?>
    </div>

    <div id="paparanMateriList" class="paparan-grid">
        <?php if (!empty($paparan)): foreach ($paparan as $p): ?>
        <?php
            $ext = strtolower(pathinfo($p->berkas, PATHINFO_EXTENSION));
            $is_pdf = ($ext === 'pdf') || (stripos($p->mime, 'pdf') !== FALSE);
            $is_img = in_array($ext, ['jpg','jpeg','png']) || (stripos($p->mime, 'image') !== FALSE);
            $url_baca = site_url('paparan/baca/'.$p->id);
            $url_file = base_url('assets/uploads/paparan/'.rawurlencode($p->berkas));
            $ukuran = format_size($p->ukuran);
            $tanggal = tgl_indo($p->tanggal);
        ?>
        <div class="paparan-card">
            <?php if ($is_img): ?>
            <div class="paparan-card-thumb">
                <img src="<?php echo $url_file; ?>" alt="<?php echo htmlspecialchars($p->judul); ?>" loading="lazy">
                <button type="button" class="paparan-thumb-view" onclick="bukaPaparan('<?php echo $url_file; ?>','<?php echo htmlspecialchars($p->judul, ENT_QUOTES); ?>','img')"><i class="fa-solid fa-expand"></i></button>
            </div>
            <?php elseif ($is_pdf): ?>
            <div class="paparan-card-pdf">
                <iframe src="<?php echo $url_file; ?>" title="<?php echo htmlspecialchars($p->judul); ?>" loading="lazy"></iframe>
            </div>
            <?php else: ?>
            <div class="paparan-card-doc">
                <div class="paparan-doc-icon"><i class="fa-solid fa-file"></i></div>
                <div class="paparan-doc-info">
                    <span class="paparan-doc-ext"><?php echo strtoupper($ext); ?></span>
                    <span class="paparan-doc-size"><?php echo $ukuran; ?></span>
                </div>
            </div>
            <?php endif; ?>

            <div class="paparan-card-body">
                <h3><?php echo htmlspecialchars($p->judul); ?></h3>
                <p><?php echo htmlspecialchars(potong_teks($p->deskripsi, 100)); ?></p>
                <div class="paparan-card-meta">
                    <span><i class="fa-regular fa-calendar"></i> <?php echo $tanggal; ?></span>
                    <span><i class="fa-solid fa-weight-scale"></i> <?php echo $ukuran; ?></span>
                </div>
                <div class="paparan-card-actions">
                    <?php if ($is_pdf): ?>
                    <button type="button" class="paparan-btn-primary" onclick="bukaPaparan('<?php echo $url_file; ?>','<?php echo htmlspecialchars($p->judul, ENT_QUOTES); ?>','pdf')"><i class="fa-solid fa-book-open"></i> Baca</button>
                    <?php elseif ($is_img): ?>
                    <button type="button" class="paparan-btn-primary" onclick="bukaPaparan('<?php echo $url_file; ?>','<?php echo htmlspecialchars($p->judul, ENT_QUOTES); ?>','img')"><i class="fa-solid fa-expand"></i> Lihat</button>
                    <?php else: ?>
                    <a class="paparan-btn-primary" href="<?php echo $url_baca; ?>" target="_blank" rel="noopener"><i class="fa-solid fa-up-right-from-square"></i> Buka</a>
                    <?php endif; ?>
                    <a class="paparan-btn-secondary" href="<?php echo site_url('paparan/unduh/'.$p->id); ?>"><i class="fa-solid fa-download"></i> Unduh</a>
                </div>
            </div>
        </div>
        <?php endforeach; else: ?>
        <div class="paparan-empty">
            <div class="paparan-empty-icon"><i class="fa-solid fa-file-circle-question"></i></div>
            <h3>Belum Ada Paparan</h3>
            <p>Materi paparan akan ditampilkan di sini.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<div id="paparanModal" class="paparan-modal" onclick="if(event.target===this) tutupPaparan()">
    <div class="paparan-modal-box">
        <div class="paparan-modal-header">
            <div class="paparan-modal-title">
                <i class="fa-solid fa-file-lines"></i>
                <h3 id="paparanModalJudul">Pratinjau</h3>
            </div>
            <div class="paparan-modal-actions">
                <button type="button" class="paparan-modal-close" onclick="tutupPaparan()" aria-label="Tutup"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
        <div class="paparan-modal-content">
            <iframe id="paparanPdfViewer" title="Pembaca Paparan" style="display:none;"></iframe>
            <div id="paparanImgWrap" style="display:none;">
                <img id="paparanImgViewer" alt="Pratinjau gambar">
            </div>
        </div>
    </div>
</div>

<script>
function bukaPaparan(url, judul, tipe) {
    var modal = document.getElementById('paparanModal');
    var frame = document.getElementById('paparanPdfViewer');
    var imgWrap = document.getElementById('paparanImgWrap');
    var img = document.getElementById('paparanImgViewer');
    document.getElementById('paparanModalJudul').textContent = judul || 'Pratinjau';
    if (tipe === 'img') {
        frame.style.display = 'none'; frame.removeAttribute('src');
        img.src = url;
        imgWrap.style.display = 'flex';
    } else {
        imgWrap.style.display = 'none';
        img.removeAttribute('src');
        frame.style.display = 'block'; frame.src = url;
    }
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function tutupPaparan() {
    var modal = document.getElementById('paparanModal');
    modal.classList.remove('show');
    document.getElementById('paparanPdfViewer').removeAttribute('src');
    document.getElementById('paparanImgViewer').removeAttribute('src');
    document.getElementById('paparanImgWrap').style.display = 'none';
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) { if (e.key === 'Escape') tutupPaparan(); });
</script>
