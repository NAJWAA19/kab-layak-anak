<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA GALERI</p>
        <h1>Ubah Foto</h1>
    </div>
    <div class="admin-form" style="max-width:600px;">
        <h2>Ubah Foto</h2>
        <?php echo validation_errors('<p class="login-error">', '</p>'); ?>
        <form action="<?php echo site_url('admin-galeri/perbarui-foto/'.$row->id); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="galleryTitle">Judul / Keterangan Foto</label>
                <input type="text" id="galleryTitle" name="judul" placeholder="Contoh: Kegiatan Forum Anak" value="<?php echo htmlspecialchars(set_value('judul', $row->judul)); ?>" required>
            </div>
            <div class="form-group">
                <label for="galleryDesc">Deskripsi</label>
                <input type="text" id="galleryDesc" name="deskripsi" placeholder="Dokumentasi kegiatan Layak Anak." value="<?php echo htmlspecialchars(set_value('deskripsi', $row->deskripsi)); ?>">
            </div>
            <div class="form-group">
                <label for="photoFile">Ganti Foto <?php echo !empty($row->gambar) ? '(biarkan kosong jika tidak ingin mengubah)' : ''; ?></label>
                <input type="file" id="photoFile" name="gambar" accept="image/*">
                <small style="display:block;margin-top:4px;color:#94a3b8;font-size:12px;">Format: JPG, JPEG, atau PNG. Maks 5MB.</small>
                <?php if (!empty($row->gambar)): ?>
                <div style="margin-top:10px;">
                    <img src="<?php echo base_url('assets/uploads/galeri/'.$row->gambar); ?>" style="max-width:180px;border-radius:8px;border:1px solid #e5e7eb;">
                </div>
                <?php endif; ?>
            </div>
            <div style="display:flex;gap:12px;margin-top:24px;padding-bottom:40px;">
                <button type="submit" class="save-button"><i class="fa-solid fa-check" style="margin-right:6px;"></i>Simpan</button>
                <a href="<?php echo site_url('admin-galeri/detail/'.$row->album_id); ?>" class="cancel-button" style="text-decoration:none;display:inline-flex;align-items:center;">Batal</a>
            </div>
        </form>
    </div>
</section>
