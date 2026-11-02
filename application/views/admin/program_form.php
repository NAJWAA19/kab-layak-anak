<?php defined('BASEPATH') OR exit('No direct script access allowed');
$is_edit = !empty($row);
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA PROGRAM</p>
        <h1><?php echo $is_edit ? 'Ubah Program' : 'Tambah Program'; ?></h1>
    </div>
    <div id="newsForm" class="admin-form">
        <h2 id="formTitle"><?php echo $is_edit ? 'Ubah Program' : 'Tambah Program'; ?></h2>
        <?php echo validation_errors('<p class="login-error">', '</p>'); ?>
        <form action="<?php echo $is_edit ? site_url('admin-program/perbarui/'.$row->id) : site_url('admin-program/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="newsTitle">Judul Program</label>
                <input type="text" id="newsTitle" name="judul" placeholder="Masukkan judul program" value="<?php echo set_value('judul', $is_edit ? $row->judul : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="newsDate">Kategori</label>
                <input type="text" id="newsDate" name="kategori" placeholder="Masukkan kategori" value="<?php echo set_value('kategori', $is_edit ? $row->kategori : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="newsImage">Foto Program</label>
                <input type="file" id="newsImage" name="gambar" accept="image/*">
                <small class="image-help">Pilih foto dengan format JPG, JPEG, atau PNG.</small>
            </div>
            <div class="form-group">
                <label for="newsDescription">Deskripsi</label>
                <textarea id="newsDescription" name="deskripsi" rows="6" placeholder="Masukkan deskripsi program" required><?php echo set_value('deskripsi', $is_edit ? $row->deskripsi : ''); ?></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="save-button">Simpan</button>
                <a href="<?php echo site_url('admin-program'); ?>" class="cancel-button" style="text-decoration:none;display:inline-block;">Batal</a>
            </div>
        </form>
    </div>
</section>
