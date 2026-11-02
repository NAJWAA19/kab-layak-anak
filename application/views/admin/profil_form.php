<?php defined('BASEPATH') OR exit('No direct script access allowed');
$tujuan = !empty($row->tujuan) ? $row->tujuan : array();
while (count($tujuan) < 3) $tujuan[] = (object) array('nomor' => sprintf('%02d', count($tujuan) + 1), 'judul' => '', 'deskripsi' => '');
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA PROFIL</p>
        <h1>Profil Layak Anak</h1>
        <p>Ubah isi halaman profil yang ditampilkan pada website kapan saja melalui form ini.</p>
    </div>
    <div id="newsForm" class="admin-form">
        <h2 id="formTitle">Ubah Profil</h2>
        <?php echo validation_errors('<p class="login-error">', '</p>'); ?>
        <form action="<?php echo site_url('admin-profil/perbarui'); ?>" method="post">
            <div class="form-group">
                <label for="tentangLabel">Label Tentang</label>
                <input type="text" id="tentangLabel" name="tentang_label" placeholder="Contoh: TENTANG LAYAK ANAK" value="<?php echo set_value('tentang_label', !empty($row->tentang_label) ? $row->tentang_label : ''); ?>">
            </div>
            <div class="form-group">
                <label for="tentangJudul">Judul Tentang</label>
                <input type="text" id="tentangJudul" name="tentang_judul" placeholder="Masukkan judul bagian tentang" value="<?php echo set_value('tentang_judul', !empty($row->tentang_judul) ? $row->tentang_judul : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="tentangDeskripsi">Deskripsi Tentang</label>
                <textarea id="tentangDeskripsi" name="tentang_deskripsi" rows="6" placeholder="Tulis setiap paragraf pada baris kosong berbeda (pisahkan dengan baris kosong)" required><?php echo set_value('tentang_deskripsi', !empty($row->tentang_deskripsi) ? $row->tentang_deskripsi : ''); ?></textarea>
                <small class="image-help">Pisahkan tiap paragraf dengan satu baris kosong.</small>
            </div>
            <div class="form-group">
                <label for="visiLabel">Label Visi &amp; Misi</label>
                <input type="text" id="visiLabel" name="visi_label" value="<?php echo set_value('visi_label', !empty($row->visi_label) ? $row->visi_label : ''); ?>">
            </div>
            <div class="form-group">
                <label for="visiJudul">Judul Visi &amp; Misi</label>
                <input type="text" id="visiJudul" name="visi_judul" value="<?php echo set_value('visi_judul', !empty($row->visi_judul) ? $row->visi_judul : ''); ?>">
            </div>
            <div class="form-group">
                <label for="visi">Visi</label>
                <textarea id="visi" name="visi" rows="3" placeholder="Masukkan visi" required><?php echo set_value('visi', !empty($row->visi) ? $row->visi : ''); ?></textarea>
            </div>
            <div class="form-group">
                <label for="misi">Misi</label>
                <textarea id="misi" name="misi" rows="6" placeholder="Satu misi per baris" required><?php echo set_value('misi', !empty($row->misi) ? $row->misi : ''); ?></textarea>
                <small class="image-help">Tulis setiap misi pada baris yang berbeda.</small>
            </div>
            <div class="form-group">
                <label for="tujuanLabel">Label Tujuan</label>
                <input type="text" id="tujuanLabel" name="tujuan_label" value="<?php echo set_value('tujuan_label', !empty($row->tujuan_label) ? $row->tujuan_label : ''); ?>">
            </div>
            <div class="form-group">
                <label for="tujuanJudul">Judul Tujuan</label>
                <input type="text" id="tujuanJudul" name="tujuan_judul" value="<?php echo set_value('tujuan_judul', !empty($row->tujuan_judul) ? $row->tujuan_judul : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="tujuanDeskripsi">Deskripsi Tujuan</label>
                <textarea id="tujuanDeskripsi" name="tujuan_deskripsi" rows="3" placeholder="Masukkan pengantar bagian tujuan"><?php echo set_value('tujuan_deskripsi', !empty($row->tujuan_deskripsi) ? $row->tujuan_deskripsi : ''); ?></textarea>
            </div>
            <?php foreach ($tujuan as $i => $t): ?>
            <div class="form-group">
                <label>Kartu Tujuan <?php echo sprintf('%02d', $i + 1); ?></label>
                <input type="text" name="tujuan_item_judul[]" placeholder="Judul tujuan" value="<?php echo htmlspecialchars(set_value('tujuan_item_judul['.$i.']', $t->judul)); ?>" style="margin-bottom:8px;">
                <textarea name="tujuan_item_deskripsi[]" rows="3" placeholder="Deskripsi tujuan"><?php echo htmlspecialchars($t->deskripsi); ?></textarea>
            </div>
            <?php endforeach; ?>
            <div class="form-actions">
                <button type="submit" class="save-button">Simpan Perubahan</button>
                <a href="<?php echo site_url('admin'); ?>" class="cancel-button" style="text-decoration:none;display:inline-block;">Kembali</a>
            </div>
        </form>
    </div>
</section>
