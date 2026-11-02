<?php defined('BASEPATH') OR exit('No direct script access allowed');
$is_edit = !empty($row);
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA GALERI</p>
        <h1><?php echo $is_edit ? 'Ubah Foto' : 'Tambah Foto'; ?></h1>
    </div>
    <div id="galleryForm" class="admin-form" style="max-width:600px;">
        <h2><?php echo $is_edit ? 'Ubah Foto' : 'Tambah Foto Baru'; ?></h2>
        <?php echo validation_errors('<p class="login-error">', '</p>'); ?>
        <form action="<?php echo $is_edit ? site_url('admin-galeri/perbarui/'.$row->id) : site_url('admin-galeri/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="albumSelect">Album <small>(opsional)</small></label>
                <select id="albumSelect" name="album_id">
                    <option value="">-- Tanpa Album --</option>
                    <?php if (!empty($albums)): foreach ($albums as $a): ?>
                    <option value="<?php echo $a->id; ?>" <?php echo ($selected_album == $a->id) ? 'selected' : ''; ?>><?php echo htmlspecialchars($a->judul); ?></option>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="galleryTitle">Judul / Keterangan Foto</label>
                <input type="text" id="galleryTitle" name="judul" placeholder="Contoh: Kegiatan Forum Anak" value="<?php echo htmlspecialchars(set_value('judul', $is_edit ? $row->judul : '')); ?>" required>
            </div>
            <div class="form-group">
                <label for="galleryDesc">Deskripsi</label>
                <input type="text" id="galleryDesc" name="deskripsi" placeholder="Dokumentasi kegiatan Layak Anak." value="<?php echo htmlspecialchars(set_value('deskripsi', $is_edit ? $row->deskripsi : '')); ?>">
            </div>
            <div class="form-group">
                <label for="photoFile">Foto<?php echo ($is_edit && !empty($row->gambar)) ? ' (saat ini: '.htmlspecialchars($row->gambar).')' : ''; ?></label>
                <input type="file" id="photoFile" name="gambar" accept="image/*">
                <small style="display:block;margin-top:4px;color:#94a3b8;font-size:12px;">Format: JPG, JPEG, atau PNG. Maks 5MB.</small>
                <?php if ($is_edit && !empty($row->gambar)): ?>
                <div style="margin-top:10px;">
                    <img src="<?php echo base_url('assets/uploads/galeri/'.$row->gambar); ?>" style="max-width:180px;border-radius:8px;border:1px solid #e5e7eb;">
                </div>
                <?php endif; ?>
            </div>
            <div style="display:flex;gap:12px;margin-top:24px;padding-bottom:40px;">
                <button type="submit" class="save-button"><i class="fa-solid fa-check" style="margin-right:6px;"></i>Simpan</button>
                <a href="<?php echo (!empty($selected_album)) ? site_url('admin-album/detail/'.$selected_album) : site_url('admin-galeri'); ?>" class="cancel-button" style="text-decoration:none;display:inline-flex;align-items:center;">Batal</a>
            </div>
        </form>
    </div>
</section>

<style>
.admin-form select {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 14px;
    color: #1e293b;
    background: #f9fafb;
    transition: border .2s, box-shadow .2s;
    box-sizing: border-box;
    cursor: pointer;
}
.admin-form select:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 3px rgba(25,118,210,.12);
    background: #fff;
}
</style>
