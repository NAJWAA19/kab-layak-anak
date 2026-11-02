<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <!-- Header -->
    <div class="admin-title">
        <p class="section-label">KELOLA GALERI</p>
        <h1><?php echo htmlspecialchars($row->judul); ?></h1>
        <p style="color:#666;font-size:14px;margin-top:4px;"><?php echo htmlspecialchars($row->deskripsi); ?></p>
    </div>

    <!-- Tombol Navigasi -->
    <div style="display:flex;gap:10px;margin-bottom:24px;flex-wrap:wrap;align-items:center;">
        <a href="<?php echo site_url('admin-galeri'); ?>" style="text-decoration:none;display:inline-flex;align-items:center;gap:6px;padding:9px 18px;background:#f1f5f9;border-radius:8px;color:#475569;font-size:13px;font-weight:600;border:1px solid #e2e8f0;transition:.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <a href="<?php echo site_url('admin-galeri/ubah/'.$row->id); ?>" style="text-decoration:none;display:inline-flex;align-items:center;gap:6px;padding:9px 18px;background:#dbeafe;border-radius:8px;color:#1d4ed8;font-size:13px;font-weight:600;border:1px solid #bfdbfe;transition:.2s;" onmouseover="this.style.background='#bfdbfe'" onmouseout="this.style.background='#dbeafe'"><i class="fa-solid fa-pen"></i> Edit</a>
        <a href="<?php echo site_url('admin-galeri/hapus/'.$row->id); ?>" style="text-decoration:none;display:inline-flex;align-items:center;gap:6px;padding:9px 18px;background:#fee2e2;border-radius:8px;color:#dc2626;font-size:13px;font-weight:600;border:1px solid #fca5a5;transition:.2s;" onclick="return adminConfirm('Hapus Galeri?','Galeri \"<?php echo htmlspecialchars(addslashes($row->judul)); ?>\" dan semua foto di dalamnya akan dihapus permanen.','<?php echo site_url('admin-galeri/hapus/'.$row->id); ?>','fa-images')" onmouseover="this.style.background='#fecaca'" onmouseout="this.style.background='#fee2e2'"><i class="fa-solid fa-trash"></i> Hapus</a>
        <span style="margin-left:auto;font-size:13px;color:#94a3b8;background:#f1f5f9;padding:6px 14px;border-radius:8px;"><i class="fa-solid fa-images" style="margin-right:4px;"></i> <?php echo (int)$row->jumlah_foto; ?> foto</span>
    </div>

    <!-- Foto Sampul -->
    <?php if (!empty($row->cover)): ?>
    <div style="margin-bottom:24px;background:#fff;border-radius:14px;padding:20px;border:1px solid #e5e7eb;">
        <div style="display:flex;align-items:center;gap:14px;">
            <img src="<?php echo base_url('assets/uploads/galeri/'.$row->cover); ?>" style="width:100px;height:100px;object-fit:cover;border-radius:10px;border:1px solid #e5e7eb;">
            <div>
                <p style="font-size:14px;font-weight:700;color:#1e293b;margin:0 0 4px;"><i class="fa-solid fa-image" style="margin-right:6px;color:#1976d2;"></i>Foto Sampul</p>
                <p style="font-size:12px;color:#94a3b8;margin:0;">Klik "Edit" untuk mengganti foto sampul.</p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Form Upload Banyak Foto -->
    <div style="background:#fff;border-radius:14px;padding:24px;border:2px dashed #dbeafe;margin-bottom:30px;">
        <h3 style="margin:0 0 6px;font-size:16px;color:#1e293b;"><i class="fa-solid fa-cloud-arrow-up" style="margin-right:8px;color:#1976d2;"></i>Tambah Foto Baru</h3>
        <p style="font-size:13px;color:#94a3b8;margin:0 0 18px;">Pilih satu atau lebih foto untuk ditambahkan ke galeri ini.</p>
        <form action="<?php echo site_url('admin-galeri/simpan-foto-multi/'.$row->id); ?>" method="post" enctype="multipart/form-data" id="multiUploadForm">
            <div id="fotoFields">
                <div class="foto-field">
                    <div class="foto-field-input">
                        <label>Foto <span style="color:#dc2626;">*</span></label>
                        <input type="file" name="gambar[]" accept="image/*" required>
                    </div>
                    <div class="foto-field-input">
                        <label>Judul <span style="color:#94a3b8;font-weight:400;">(opsional)</span></label>
                        <input type="text" name="judul[]" placeholder="Contoh: Kegiatan sosialisasi">
                    </div>
                    <button type="button" onclick="removeField(this)" class="btn-hapus-baris"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <div style="display:flex;gap:10px;margin-top:16px;flex-wrap:wrap;">
                <button type="button" onclick="addField()" class="btn-tambah-baris"><i class="fa-solid fa-plus"></i> Tambah Baris Lain</button>
                <button type="submit" class="btn-upload"><i class="fa-solid fa-upload"></i> Upload Semua Foto</button>
            </div>
        </form>
    </div>

    <!-- Daftar Foto -->
    <div style="margin-bottom:10px;">
        <h3 style="margin:0;font-size:16px;color:#1e293b;"><i class="fa-solid fa-images" style="margin-right:8px;color:#1976d2;"></i>Foto dalam Galeri (<?php echo (int)$row->jumlah_foto; ?>)</h3>
    </div>

    <?php if (!empty($fotos)): ?>
    <div class="galeri-foto-grid">
        <?php foreach ($fotos as $i => $f): ?>
        <div class="galeri-foto-card">
            <div class="galeri-foto-num"><?php echo $i+1; ?></div>
            <div class="galeri-foto-img">
                <?php if (!empty($f->gambar)): ?>
                    <img src="<?php echo base_url('assets/uploads/galeri/'.$f->gambar); ?>" alt="<?php echo htmlspecialchars($f->judul); ?>">
                <?php else: ?>
                    <span>📷</span>
                <?php endif; ?>
            </div>
            <div class="galeri-foto-info">
                <h4><?php echo htmlspecialchars($f->judul); ?></h4>
                <div class="galeri-foto-actions">
                    <?php if (!empty($f->gambar)): ?>
                    <a href="<?php echo site_url('admin-galeri/set-cover/'.$f->id); ?>" class="btn-set-cover" title="Jadikan cover" onclick="return adminConfirm('Jadikan Cover?','Foto ini akan dijadikan sampul galeri.','<?php echo site_url('admin-galeri/set-cover/'.$f->id); ?>','fa-image')"><i class="fa-solid fa-image"></i></a>
                    <?php endif; ?>
                    <a href="<?php echo site_url('admin-galeri/ubah-foto/'.$f->id); ?>" class="btn-edit-foto" title="Edit foto"><i class="fa-solid fa-pen"></i></a>
                    <a href="<?php echo site_url('admin-galeri/hapus-foto/'.$f->id); ?>" class="btn-hapus-foto" title="Hapus foto" onclick="return adminConfirm('Hapus Foto?','Foto ini akan dihapus permanen dari galeri.','<?php echo site_url('admin-galeri/hapus-foto/'.$f->id); ?>')"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="album-empty-state">
        <div class="album-empty-illustration">
            <svg viewBox="0 0 200 150" xmlns="http://www.w3.org/2000/svg">
                <rect x="30" y="25" width="60" height="50" rx="8" fill="#dbeafe" opacity=".6"/>
                <rect x="36" y="31" width="48" height="30" rx="5" fill="#bfdbfe" opacity=".5"/>
                <circle cx="50" cy="42" r="5" fill="#fbbf24" opacity=".5"/>
                <path d="M36 52 l14-10 l10 7 l8-6 l10 9Z" fill="#1976d2" opacity=".3"/>
                <rect x="110" y="35" width="60" height="50" rx="8" fill="#fef3c7" opacity=".6"/>
                <rect x="116" y="41" width="48" height="30" rx="5" fill="#fde68a" opacity=".5"/>
                <circle cx="130" cy="52" r="5" fill="#f97316" opacity=".5"/>
                <path d="M116 62 l14-10 l10 7 l8-6 l10 9Z" fill="#16a34a" opacity=".3"/>
                <rect x="60" y="85" width="80" height="45" rx="8" fill="#fde2e8" opacity=".5"/>
                <rect x="66" y="91" width="68" height="28" rx="5" fill="#fbcfe8" opacity=".4"/>
                <circle cx="82" cy="102" r="5" fill="#ec4899" opacity=".5"/>
                <path d="M66 112 l18-12 l14 9 l10-7 l12 10Z" fill="#7c3aed" opacity=".3"/>
                <circle cx="175" cy="15" r="6" fill="#22c55e" opacity=".2"/>
                <circle cx="20" cy="130" r="5" fill="#f472b6" opacity=".2"/>
            </svg>
        </div>
        <div class="album-empty-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
        <h3>Belum Ada Foto</h3>
        <p>Gunakan form di atas untuk menambahkan foto pertama ke galeri ini.</p>
    </div>
    <?php endif; ?>
</section>

<style>
/* Form Upload */
.foto-field {
    display: flex;
    gap: 12px;
    align-items: flex-end;
    margin-bottom: 12px;
    padding: 14px;
    background: #f9fafb;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
}
.foto-field-input { flex: 1; }
.foto-field-input label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 4px;
}
.foto-field-input input[type="file"],
.foto-field-input input[type="text"] {
    width: 100%;
    padding: 9px 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 13px;
    color: #1e293b;
    background: #fff;
    box-sizing: border-box;
    transition: border .2s, box-shadow .2s;
}
.foto-field-input input:focus {
    outline: none;
    border-color: #1976d2;
    box-shadow: 0 0 0 3px rgba(25,118,210,.1);
}
.btn-hapus-baris {
    background: #fee2e2;
    color: #dc2626;
    border: none;
    width: 36px;
    height: 36px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    transition: .2s;
    flex-shrink: 0;
}
.btn-hapus-baris:hover { background: #fecaca; }
.btn-tambah-baris {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    transition: .2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.btn-tambah-baris:hover { background: #e2e8f0; }
.btn-upload {
    background: linear-gradient(135deg,#1976d2,#1565c0);
    color: #fff;
    border: none;
    padding: 10px 24px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
    transition: .2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-left: auto;
}
.btn-upload:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(25,118,210,.3); }

/* Grid Foto */
.galeri-foto-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    gap: 16px;
}
.galeri-foto-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 6px rgba(0,0,0,.03);
    transition: transform .2s, box-shadow .2s;
    position: relative;
}
.galeri-foto-card:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(0,0,0,.08); }
.galeri-foto-num {
    position: absolute;
    top: 8px;
    left: 8px;
    width: 24px;
    height: 24px;
    background: rgba(0,0,0,.5);
    color: #fff;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}
.galeri-foto-img {
    height: 160px;
    background: linear-gradient(135deg, #dbeafe, #ede9fe);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.galeri-foto-img img { width: 100%; height: 100%; object-fit: cover; }
.galeri-foto-img span { font-size: 32px; opacity: .4; }
.galeri-foto-info { padding: 12px 14px; }
.galeri-foto-info h4 {
    margin: 0 0 10px;
    font-size: 12px;
    color: #1e293b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.galeri-foto-actions {
    display: flex;
    gap: 6px;
    justify-content: flex-end;
}
.galeri-foto-actions a {
    width: 30px;
    height: 30px;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    text-decoration: none;
    transition: .2s;
}
.btn-set-cover { background: #dcfce7; color: #16a34a; }
.btn-set-cover:hover { background: #bbf7d0; }
.btn-edit-foto { background: #dbeafe; color: #1d4ed8; }
.btn-edit-foto:hover { background: #bfdbfe; }
.btn-hapus-foto { background: #fee2e2; color: #dc2626; }
.btn-hapus-foto:hover { background: #fecaca; }

@media (max-width: 600px) {
    .foto-field { flex-direction: column; }
    .btn-upload { margin-left: 0; width: 100%; justify-content: center; }
}
</style>

<script>
function addField() {
    var html = '<div class="foto-field">' +
        '<div class="foto-field-input"><label>Foto <span style="color:#dc2626;">*</span></label><input type="file" name="gambar[]" accept="image/*" required></div>' +
        '<div class="foto-field-input"><label>Judul <span style="color:#94a3b8;font-weight:400;">(opsional)</span></label><input type="text" name="judul[]" placeholder="Contoh: Kegiatan sosialisasi"></div>' +
        '<button type="button" onclick="removeField(this)" class="btn-hapus-baris"><i class="fa-solid fa-xmark"></i></button>' +
        '</div>';
    document.getElementById('fotoFields').insertAdjacentHTML('beforeend', html);
}
function removeField(btn) {
    var fields = document.querySelectorAll('.foto-field');
    if (fields.length > 1) {
        btn.closest('.foto-field').remove();
    } else {
        alert('Minimal harus ada 1 baris foto.');
    }
}
</script>
