<?php defined('BASEPATH') OR exit('No direct script access allowed');
$poin_text = '';
if (!empty($row->poin)) { $arr = array(); foreach ($row->poin as $p) $arr[] = $p->poin; $poin_text = implode("\n", $arr); }
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA HAK ANAK</p>
        <h1>Klaster Hak Anak</h1>
    </div>
</section>
<div id="editModal" class="admin-modal show" style="display:block;position:static;padding:0;">
    <div class="admin-modal-content">
        <div class="admin-modal-header">
            <div>
                <p class="section-label">EDIT KLASTER</p>
                <h2 id="modalTitle">Edit Klaster <?php echo htmlspecialchars($row->nomor); ?></h2>
            </div>
        </div>
        <?php echo validation_errors('<p class="login-error">', '</p>'); ?>
        <form action="<?php echo site_url('admin-klaster/perbarui/'.$row->id); ?>" method="post">
            <div class="form-group">
                <label>Nama Klaster</label>
                <input type="text" name="judul" value="<?php echo set_value('judul', $row->judul); ?>" required>
            </div>
            <div class="form-group">
                <label>Ikon</label>
                <input type="text" name="ikon" value="<?php echo set_value('ikon', $row->ikon); ?>">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" required><?php echo set_value('deskripsi', $row->deskripsi); ?></textarea>
            </div>
            <div class="form-group">
                <label>Isi / Ruang Lingkup</label>
                <textarea name="poin" placeholder="Satu poin per baris" required><?php echo htmlspecialchars($poin_text); ?></textarea>
                <small class="image-help">Tulis setiap isi atau ruang lingkup pada baris yang berbeda.</small>
            </div>
            <div class="form-group">
                <label><i class="fa-brands fa-google-drive" style="color:#f4b400;margin-right:6px;"></i>Link Google Drive (Opsional)</label>
                <input type="url" name="google_drive_link" value="<?php echo set_value('google_drive_link', isset($row->google_drive_link) ? $row->google_drive_link : ''); ?>" placeholder="https://drive.google.com/file/d/.../view?usp=sharing">
                <small class="image-help">Tempel link Google Drive berisi dokumen untuk klaster ini. Link akan ditampilkan ke masyarakat.</small>
                <?php if (!empty($row->google_drive_link)): ?>
                <div style="margin-top:8px;">
                    <a href="<?php echo htmlspecialchars($row->google_drive_link); ?>" target="_blank" style="display:inline-flex;align-items:center;gap:6px;color:#1976d2;font-size:13px;font-weight:600;text-decoration:none;"><i class="fa-solid fa-external-link-alt"></i> Lihat Link Saat Ini</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="form-actions">
                <a href="<?php echo site_url('admin-klaster'); ?>" class="cancel-button" style="text-decoration:none;display:inline-block;">Batal</a>
                <button type="submit" class="save-button">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
