<?php defined('BASEPATH') OR exit('No direct script access allowed');
$is_edit = !empty($row);
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA GALERI</p>
        <h1><?php echo $is_edit ? 'Ubah Galeri' : 'Tambah Galeri'; ?></h1>
    </div>
    <div id="albumForm" class="admin-form" style="max-width:700px;">
        <h2><?php echo $is_edit ? 'Ubah Galeri' : 'Tambah Galeri Baru'; ?></h2>
        <?php echo validation_errors('<p class="login-error">', '</p>'); ?>
        <form action="<?php echo $is_edit ? site_url('admin-galeri/perbarui/'.$row->id) : site_url('admin-galeri/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="albumTitle">Judul Galeri</label>
                <input type="text" id="albumTitle" name="judul" placeholder="Contoh: Kegiatan Sosialisasi KLA 2024" value="<?php echo htmlspecialchars(set_value('judul', $is_edit ? $row->judul : '')); ?>" required>
            </div>
            <div class="form-group">
                <label for="albumDesc">Deskripsi Singkat</label>
                <textarea id="albumDesc" name="deskripsi" rows="3" placeholder="Deskripsi singkat tentang galeri ini..."><?php echo htmlspecialchars(set_value('deskripsi', $is_edit ? $row->deskripsi : '')); ?></textarea>
            </div>
            <div class="form-group">
                <label for="albumCover">Foto Sampul<?php echo ($is_edit && !empty($row->cover)) ? ' (saat ini: '.htmlspecialchars($row->cover).')' : ''; ?></label>
                <input type="file" id="albumCover" name="cover" accept="image/*">
                <small style="display:block;margin-top:4px;color:#94a3b8;font-size:12px;">Format: JPG, JPEG, atau PNG. Maks 5MB. Biarkan kosong jika tidak ingin mengubah sampul.</small>
                <?php if ($is_edit && !empty($row->cover)): ?>
                <div style="margin-top:10px;">
                    <img src="<?php echo base_url('assets/uploads/galeri/'.$row->cover); ?>" style="max-width:200px;border-radius:8px;border:1px solid #e5e7eb;">
                </div>
                <?php endif; ?>
            </div>
            <div style="display:flex;gap:12px;margin-top:24px;padding-bottom:40px;">
                <button type="submit" class="save-button"><i class="fa-solid fa-check" style="margin-right:6px;"></i>Simpan</button>
                <a href="<?php echo site_url('admin-galeri'); ?>" class="cancel-button" style="text-decoration:none;display:inline-flex;align-items:center;">Batal</a>
            </div>
        </form>
    </div>
</section>
