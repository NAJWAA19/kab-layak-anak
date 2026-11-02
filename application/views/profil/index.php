<?php defined('BASEPATH') OR exit('No direct script access allowed');
$tentang_label = !empty($profil->tentang_label) ? $profil->tentang_label : 'TENTANG LAYAK ANAK';
$tentang_judul = !empty($profil->tentang_judul) ? $profil->tentang_judul : 'Mewujudkan Lingkungan yang Aman dan Ramah bagi Anak';
$tentang_paragraf = array();
if (!empty($profil->tentang_deskripsi)) {
    $tentang_paragraf = preg_split('/\R{2,}/', trim($profil->tentang_deskripsi));
} else {
    $tentang_paragraf = array(
        'Kabupaten/Kota Layak Anak merupakan upaya untuk menciptakan lingkungan yang mendukung pemenuhan hak dan perlindungan anak melalui kebijakan, program, dan kegiatan yang terintegrasi.',
        'Pelaksanaan program Layak Anak melibatkan berbagai pihak dalam menciptakan kondisi lingkungan yang aman, nyaman, sehat, serta mendukung tumbuh dan berkembangnya anak.',
        'Melalui berbagai program dan kegiatan, pemenuhan hak anak diharapkan dapat dilakukan secara berkelanjutan serta memberikan ruang bagi anak untuk tumbuh dan berpartisipasi.',
    );
}
$visi_label = !empty($profil->visi_label) ? $profil->visi_label : 'VISI & MISI';
$visi_judul = !empty($profil->visi_judul) ? $profil->visi_judul : 'Visi & Misi Layak Anak';
$visi = !empty($profil->visi) ? $profil->visi : 'Terwujudnya Kabupaten Magelang sebagai Kabupaten Layak Anak yang aman, nyaman, dan ramah bagi tumbuh kembang serta perlindungan anak.';
$misi_list = array();
if (!empty($profil->misi)) {
    foreach (preg_split('/\R/', trim($profil->misi)) as $m) {
        $m = trim($m);
        if ($m !== '') $misi_list[] = $m;
    }
}
if (empty($misi_list)) {
    $misi_list = array(
        'Hak Sipil dan Kebebasan. Meningkatkan pemenuhan hak identitas serta kebebasan berekspresi dan berpendapat bagi setiap anak.',
        'Keluarga dan Pengasuhan. Memperkuat peran keluarga dalam pengasuhan serta memastikan tersedianya pengasuhan alternatif yang layak bagi anak.',
        'Kesehatan dan Kesejahteraan. Meningkatkan akses pelayanan kesehatan, gizi, dan kesejahteraan sosial bagi seluruh anak.',
        'Pendidikan dan Budaya. Memperluas akses pendidikan berkualitas serta ruang bermain, berekspresi, dan berkegiatan budaya bagi anak.',
        'Perlindungan Khusus. Memberikan perlindungan khusus bagi anak dari kekerasan, eksploitasi, serta bagi anak dalam situasi darurat dan berhadapan dengan hukum.',
    );
}
$tujuan_label = !empty($profil->tujuan_label) ? $profil->tujuan_label : 'TUJUAN';
$tujuan_judul = !empty($profil->tujuan_judul) ? $profil->tujuan_judul : 'Tujuan Layak Anak';
$tujuan_deskripsi = isset($profil->tujuan_deskripsi) && $profil->tujuan_deskripsi !== '' ? $profil->tujuan_deskripsi : 'Beberapa tujuan utama dalam mewujudkan lingkungan yang mendukung pemenuhan hak dan perlindungan anak.';
$tujuan_items = !empty($profil->tujuan) ? $profil->tujuan : array();
?>
<section class="page-header ph-profil">
    <p class="section-label">PROFIL</p>
    <h1>Tentang Layak Anak</h1>
    <p>Mengenal Kabupaten/Kota Layak Anak dan upaya dalam mewujudkan lingkungan yang aman serta ramah bagi anak.</p>
</section>
<?php $this->load->view('templates/page_slider', array('slider_id' => 'profilSlider', 'slides' => array(
    array('icon' => 'fa-solid fa-shield-heart', 'theme' => 'blue', 'title' => 'Tentang Layak Anak', 'desc' => 'Kebijakan, program, dan kegiatan terintegrasi untuk pemenuhan hak anak.'),
    array('icon' => 'fa-solid fa-eye', 'theme' => 'green', 'title' => 'Visi & Misi', 'desc' => 'Magelang sebagai Kabupaten Layak Anak yang aman, nyaman, dan ramah anak.'),
    array('icon' => 'fa-solid fa-bullseye', 'theme' => 'pink', 'title' => 'Tujuan Kami', 'desc' => 'Pemenuhan hak, perlindungan, dan partisipasi anak secara berkelanjutan.'),
))); ?>
<section class="profile-section">
    <div class="profile-content">
        <p class="section-label"><?php echo htmlspecialchars($tentang_label); ?></p>
        <h2><?php echo htmlspecialchars($tentang_judul); ?></h2>
        <?php foreach ($tentang_paragraf as $p): ?>
        <p><?php echo nl2br(htmlspecialchars(trim($p))); ?></p>
        <?php endforeach; ?>
    </div>
</section>
<section class="profile-section">
    <div class="profile-content">
        <p class="section-label"><?php echo htmlspecialchars($visi_label); ?></p>
        <h2><?php echo htmlspecialchars($visi_judul); ?></h2>
        <p><strong>Visi.</strong> <?php echo htmlspecialchars($visi); ?></p>
        <p><strong>Misi.</strong></p>
        <ol>
            <?php foreach ($misi_list as $m): ?>
            <li><?php echo htmlspecialchars($m); ?></li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
<section class="purpose">
    <div class="section-title"><p class="section-label"><?php echo htmlspecialchars($tujuan_label); ?></p><h2><?php echo htmlspecialchars($tujuan_judul); ?></h2><p><?php echo htmlspecialchars($tujuan_deskripsi); ?></p></div>
    <div class="purpose-container">
        <?php if (!empty($tujuan_items)): foreach ($tujuan_items as $t): ?>
        <div class="purpose-card"><span><?php echo htmlspecialchars($t->nomor); ?></span><h3><?php echo htmlspecialchars($t->judul); ?></h3><p><?php echo htmlspecialchars($t->deskripsi); ?></p></div>
        <?php endforeach; else: ?>
        <div class="purpose-card"><span>01</span><h3>Pemenuhan Hak Anak</h3><p>Mendukung terpenuhinya berbagai hak anak melalui kebijakan, program, dan pelayanan yang sesuai dengan kebutuhan anak.</p></div>
        <div class="purpose-card"><span>02</span><h3>Perlindungan Anak</h3><p>Menciptakan lingkungan yang memberikan perlindungan kepada anak dari berbagai bentuk kekerasan, diskriminasi, dan perlakuan yang merugikan.</p></div>
        <div class="purpose-card"><span>03</span><h3>Partisipasi Anak</h3><p>Memberikan kesempatan kepada anak untuk menyampaikan pendapat serta berpartisipasi dalam berbagai kegiatan yang berkaitan dengan kehidupan mereka.</p></div>
        <?php endif; ?>
    </div>
</section>
