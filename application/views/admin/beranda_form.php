<?php defined('BASEPATH') OR exit('No direct script access allowed');
$sections = array(
    'hero'=>array('label'=>'Hero / Slider Utama','icon'=>'fa-solid fa-house','desc'=>'Judul utama dan deskripsi di bagian atas halaman beranda.'),
    'why_title'=>array('label'=>'Judul Section "Kenapa"','icon'=>'fa-solid fa-circle-question','desc'=>'Judul dan deskripsi section kenapa layak anak penting.'),
    'why_1'=>array('label'=>'Card Kenapa #1','icon'=>'fa-solid fa-shield-heart','desc'=>'Perlindungan Anak'),
    'why_2'=>array('label'=>'Card Kenapa #2','icon'=>'fa-solid fa-heart','desc'=>'Pemenuhan Hak'),
    'why_3'=>array('label'=>'Card Kenapa #3','icon'=>'fa-solid fa-seedling','desc'=>'Tumbuh dan Berkembang'),
    'why_4'=>array('label'=>'Card Kenapa #4','icon'=>'fa-solid fa-comments','desc'=>'Partisipasi Anak'),
    'message'=>array('label'=>'Kutipan / Motto','icon'=>'fa-solid fa-quote-left','desc'=>'Pesan inspiratif di tengah halaman beranda.')
);
$Data = array();
if (!empty($rows)) { foreach ($rows as $r) { $Data[$r->bagian] = $r; } }
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA BERANDA</p>
        <h1>Kelola Konten Beranda</h1>
        <p style="color:#666;font-size:14px;margin-top:6px;">Perbarui konten yang tampil di halaman utama website.</p>
    </div>

    <form action="<?php echo site_url('admin-beranda/simpan'); ?>" method="post" style="max-width:900px;">
        <input type="hidden" name="section" value="<?php echo implode(',', array_keys($sections)); ?>">

        <?php foreach ($sections as $key => $sec): ?>
        <?php $d = isset($Data[$key]) ? $Data[$key] : NULL; ?>
        <div class="beranda-section-card">
            <div class="beranda-section-header">
                <div class="beranda-section-icon"><i class="<?php echo $sec['icon']; ?>"></i></div>
                <div>
                    <h3><?php echo $sec['label']; ?></h3>
                    <p style="color:#888;font-size:12px;margin:2px 0 0;"><?php echo $sec['desc']; ?></p>
                </div>
            </div>
            <input type="hidden" name="bagian_<?php echo $key; ?>" value="<?php echo $key; ?>">

            <?php if ($key !== 'message'): ?>
            <div class="form-group">
                <label>Label / Kecil</label>
                <input type="text" name="label_<?php echo $key; ?>" placeholder="Contoh: TENTANG LAYAK ANAK" value="<?php echo htmlspecialchars($d ? $d->label : ''); ?>">
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label><?php echo ($key === 'message') ? 'Kutipan Utama' : 'Judul'; ?></label>
                <input type="text" name="judul_<?php echo $key; ?>" placeholder="Masukkan judul" value="<?php echo htmlspecialchars($d ? $d->judul : ''); ?>" <?php echo ($key !== 'hero') ? 'required' : ''; ?>>
            </div>

            <?php if ($key !== 'message'): ?>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi_<?php echo $key; ?>" rows="3" placeholder="Masukkan deskripsi"><?php echo htmlspecialchars($d ? $d->deskripsi : ''); ?></textarea>
            </div>
            <?php else: ?>
            <div class="form-group">
                <label>Pesan Kecil</label>
                <input type="text" name="deskripsi_<?php echo $key; ?>" placeholder="Pesan pendukung" value="<?php echo htmlspecialchars($d ? $d->deskripsi : ''); ?>">
            </div>
            <?php endif; ?>

            <?php if (strpos($key, 'why_') === 0): ?>
            <div class="form-group">
                <label>Icon <small>(Font Awesome class)</small></label>
                <input type="text" name="icon_<?php echo $key; ?>" placeholder="fa-solid fa-shield-heart" value="<?php echo htmlspecialchars($d ? $d->icon : ''); ?>">
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>

        <div style="display:flex;gap:12px;margin-top:24px;padding-bottom:40px;">
            <button type="submit" class="save-button"><i class="fa-solid fa-check" style="margin-right:6px;"></i>Simpan Perubahan</button>
            <a href="<?php echo site_url('admin'); ?>" class="cancel-button" style="text-decoration:none;display:inline-flex;align-items:center;">Batal</a>
        </div>
    </form>
</section>

<style>
.beranda-section-card {
    background: #fff;
    border-radius: 14px;
    padding: 24px 28px;
    margin-bottom: 18px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 8px rgba(0,0,0,.04);
    transition: box-shadow .2s;
}
.beranda-section-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,.07); }
.beranda-section-header {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 18px;
    padding-bottom: 14px;
    border-bottom: 1px solid #f1f5f9;
}
.beranda-section-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: linear-gradient(135deg,#dbeafe,#ede9fe);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #1976d2;
    flex-shrink: 0;
}
.beranda-section-header h3 {
    margin: 0;
    font-size: 15px;
    color: #1e293b;
}
.admin-dashboard .form-group { margin-bottom: 14px; }
.admin-dashboard .form-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 5px;
}
.admin-dashboard .form-group input,
.admin-dashboard .form-group textarea {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 14px;
    color: #1e293b;
    background: #f9fafb;
    transition: border .2s, box-shadow .2s;
    box-sizing: border-box;
}
.admin-dashboard .form-group input:focus,
.admin-dashboard .form-group textarea:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 3px rgba(25,118,210,.12);
    background: #fff;
}
.save-button {
    background: linear-gradient(135deg,#1976d2,#1565c0);
    color: #fff;
    border: none;
    padding: 11px 28px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: transform .2s, box-shadow .2s;
}
.save-button:hover { transform: translateY(-1px); box-shadow: 0 4px 14px rgba(25,118,210,.3); }
.cancel-button {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    padding: 11px 24px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: .2s;
}
.cancel-button:hover { background: #e2e8f0; }
</style>
