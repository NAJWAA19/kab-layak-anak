<?php defined('BASEPATH') OR exit('No direct script access allowed');
$is_edit = !empty($row);
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA BERITA</p>
        <h1><?php echo $is_edit ? 'Ubah Berita' : 'Tambah Berita'; ?></h1>
    </div>
    <div id="newsForm" class="admin-form">
        <h2 id="formTitle"><?php echo $is_edit ? 'Ubah Berita' : 'Tambah Berita'; ?></h2>
        <?php echo validation_errors('<p class="login-error">', '</p>'); ?>
        <form action="<?php echo $is_edit ? site_url('admin-berita/perbarui/'.$row->id) : site_url('admin-berita/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="newsTitle">Judul Berita</label>
                <input type="text" id="newsTitle" name="judul" placeholder="Masukkan judul berita" value="<?php echo set_value('judul', $is_edit ? $row->judul : ''); ?>" required>
            </div>
            <div class="form-group">
                <label for="newsDate">Tanggal</label>
                <input type="date" id="newsDate" name="tanggal" value="<?php echo set_value('tanggal', $is_edit ? $row->tanggal : date('Y-m-d')); ?>" required>
            </div>
            <div class="form-group">
                <label for="newsImage">Foto Berita<?php echo ($is_edit && !empty($row->gambar)) ? ' (saat ini: '.htmlspecialchars($row->gambar).')' : ''; ?></label>
                <input type="file" id="newsImage" name="gambar" accept="image/*">
                <small class="image-help">Pilih foto dengan format JPG, JPEG, atau PNG.</small>
            </div>
            <div class="form-group">
                <label for="newsDescription">Isi Berita</label>
                <textarea id="newsDescription" name="deskripsi" rows="6" placeholder="Masukkan isi berita" required><?php echo set_value('deskripsi', $is_edit ? $row->deskripsi : ''); ?></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="save-button">Simpan</button>
                <a href="<?php echo site_url('admin-berita'); ?>" class="cancel-button" style="text-decoration:none;display:inline-block;">Batal</a>
            </div>
        </form>
    </div>
</section>
