<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA HAK ANAK</p>
        <h1>Klaster Hak Anak</h1>
        <p>Kelola informasi yang ditampilkan pada lima klaster Hak Anak.</p>
    </div>

    <!-- Kelembagaan Section -->
    <div style="max-width:1200px;margin:0 auto 30px;background:#fff;border-radius:14px;border:1px solid #f1f5f9;box-shadow:0 1px 4px rgba(0,0,0,.04);overflow:hidden;">
        <div style="padding:20px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:12px;">
            <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,#1565c0,#0d47a1);display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px;box-shadow:0 3px 10px rgba(21,101,192,.25);">
                <i class="fa-solid fa-building-columns"></i>
            </div>
            <div>
                <h3 style="margin:0;color:#1e293b;font-size:16px;">Kelembagaan</h3>
                <p style="margin:2px 0 0;color:#64748b;font-size:12.5px;">Link Google Drive yang ditampilkan di atas 5 klaster pada halaman publik Hak Anak.</p>
            </div>
        </div>
        <div style="padding:20px 24px;">
            <form action="<?php echo site_url('admin-klaster/kelembagaan'); ?>" method="post" style="display:flex;gap:10px;align-items:flex-end;flex-wrap:wrap;">
                <div style="flex:1;min-width:280px;">
                    <label style="display:block;margin-bottom:5px;font-weight:700;color:#1e293b;font-size:12.5px;"><i class="fa-brands fa-google-drive" style="color:#4285f4;margin-right:4px;"></i>Link Google Drive</label>
                    <input type="url" name="google_drive_kelembagaan"
                        value="<?php echo htmlspecialchars($kelembagaan->google_drive_kelembagaan ?? ''); ?>"
                        placeholder="https://drive.google.com/drive/folders/... atau https://drive.google.com/file/d/..."
                        style="width:100%;padding:9px 13px;border:1.5px solid #e2e8f0;border-radius:8px;font-size:13px;color:#1e293b;background:#fff;transition:.2s;"
                        onfocus="this.style.borderColor='#1976d2'" onblur="this.style.borderColor='#e2e8f0'">
                </div>
                <div style="display:flex;gap:8px;flex-shrink:0;">
                    <?php if (!empty($kelembagaan->google_drive_kelembagaan)): ?>
                    <a href="<?php echo htmlspecialchars($kelembagaan->google_drive_kelembagaan); ?>" target="_blank" rel="noopener"
                       style="padding:9px 14px;background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;border-radius:8px;font-size:12px;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:5px;white-space:nowrap;">
                        <i class="fa-solid fa-up-right-from-square"></i> Lihat
                    </a>
                    <?php endif; ?>
                    <button type="submit"
                        style="padding:9px 20px;background:linear-gradient(135deg,#1976d2,#1565c0);color:#fff;border:none;border-radius:8px;font-size:12.5px;font-weight:700;cursor:pointer;box-shadow:0 2px 8px rgba(25,118,210,.25);white-space:nowrap;">
                        <i class="fa-solid fa-check" style="margin-right:4px;"></i> Simpan
                    </button>
                </div>
            </form>
            <?php if (!empty($kelembagaan->google_drive_kelembagaan)): ?>
            <p style="margin:8px 0 0;color:#94a3b8;font-size:11.5px;">
                <i class="fa-solid fa-circle-info" style="margin-right:3px;"></i>
                Link ini akan muncul sebagai kartu di atas klaster pada halaman <strong>Hak Anak</strong> di situs publik.
            </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Klaster Cards -->
    <div id="adminClusterContainer" class="admin-cluster-container">
        <?php foreach ($rows as $r): ?>
        <div class="admin-cluster-card">
            <div class="admin-cluster-top">
                <span class="admin-cluster-number"><?php echo htmlspecialchars($r->nomor); ?></span>
                <span class="admin-cluster-icon"><?php echo htmlspecialchars($r->ikon); ?></span>
            </div>
            <span class="admin-cluster-label">KLASTER <?php echo htmlspecialchars($r->nomor); ?></span>
            <h3><?php echo htmlspecialchars($r->judul); ?></h3>
            <p><?php echo htmlspecialchars($r->deskripsi); ?></p>
            <?php if (!empty($r->google_drive_link)): ?>
            <div style="margin:10px 0;"><span style="display:inline-flex;align-items:center;gap:5px;background:#e8f5e9;color:#2e7d32;padding:4px 10px;border-radius:6px;font-size:12px;font-weight:700;"><i class="fa-brands fa-google-drive"></i> Link Aktif</span></div>
            <?php else: ?>
            <div style="margin:10px 0;"><span style="display:inline-flex;align-items:center;gap:5px;background:#f1f5f9;color:#94a3b8;padding:4px 10px;border-radius:6px;font-size:12px;font-weight:700;"><i class="fa-solid fa-link-slash"></i> Belum Ada Link</span></div>
            <?php endif; ?>
            <div class="admin-cluster-actions">
                <a href="<?php echo site_url('admin-klaster/ubah/'.$r->id); ?>" class="edit-button" style="text-decoration:none;">Edit</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
