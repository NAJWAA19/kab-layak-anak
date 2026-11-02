<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
    $jml_total = count($rows);
    $jml_pdf = 0; $jml_img = 0; $total_size = 0;
    foreach ($rows as $r) {
        $ext = strtolower(pathinfo($r->berkas, PATHINFO_EXTENSION));
        if ($ext === 'pdf') $jml_pdf++;
        elseif (in_array($ext, ['jpg','jpeg','png'])) $jml_img++;
        $total_size += $r->ukuran;
    }
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <div style="display:flex;align-items:center;gap:14px;margin-bottom:6px;">
            <div style="width:48px;height:48px;border-radius:14px;background:linear-gradient(135deg,#dc2626,#ef4444);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;box-shadow:0 6px 18px rgba(220,38,38,.25);">
                <i class="fa-solid fa-file-pdf"></i>
            </div>
            <div>
                <p class="section-label" style="margin:0;">KELOLA PAPARAN</p>
                <h1 style="margin:2px 0 0;">Materi Paparan</h1>
            </div>
        </div>
        <p>Kelola materi dan dokumen yang dapat diakses oleh masyarakat.</p>
    </div>

    <!-- Stats Ringkasan -->
    <?php if (!empty($rows)): ?>
    <div class="paparan-stats-bar">
        <div class="paparan-stat-card">
            <div class="paparan-stat-icon psi-blue"><i class="fa-solid fa-layer-group"></i></div>
            <div class="paparan-stat-info">
                <strong><?php echo $jml_total; ?></strong>
                <span>Total Materi</span>
            </div>
        </div>
        <div class="paparan-stat-card">
            <div class="paparan-stat-icon psi-red"><i class="fa-solid fa-file-pdf"></i></div>
            <div class="paparan-stat-info">
                <strong><?php echo $jml_pdf; ?></strong>
                <span>Dokumen PDF</span>
            </div>
        </div>
        <div class="paparan-stat-card">
            <div class="paparan-stat-icon psi-purple"><i class="fa-solid fa-file-image"></i></div>
            <div class="paparan-stat-info">
                <strong><?php echo $jml_img; ?></strong>
                <span>Gambar</span>
            </div>
        </div>
        <div class="paparan-stat-card">
            <div class="paparan-stat-icon psi-green"><i class="fa-solid fa-hard-drive"></i></div>
            <div class="paparan-stat-info">
                <strong><?php echo format_size($total_size); ?></strong>
                <span>Total Ukuran</span>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Aksi -->
    <div class="paparan-admin-actions">
        <a href="<?php echo site_url('admin-paparan/tambah'); ?>" class="paparan-add-btn"><i class="fa-solid fa-plus"></i> Tambah Materi</a>
    </div>

    <?php if (empty($rows)): ?>
    <div class="paparan-empty-state">
        <div class="paparan-empty-icon"><i class="fa-solid fa-file-circle-plus"></i></div>
        <h3>Belum Ada Materi</h3>
        <p>Belum ada dokumen paparan yang diupload. Mulai tambahkan materi untuk ditampilkan ke masyarakat.</p>
        <a href="<?php echo site_url('admin-paparan/tambah'); ?>" class="paparan-add-btn" style="margin-top:20px;display:inline-flex;"><i class="fa-solid fa-plus"></i> Tambah Materi Pertama</a>
    </div>
    <?php else: ?>

    <!-- Tabel Daftar Materi -->
    <div class="paparan-table-wrap">
        <table class="paparan-table">
            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th style="width:60px;">Dokumen</th>
                    <th>Judul & Deskripsi</th>
                    <th style="width:100px;">Tipe</th>
                    <th style="width:90px;">Ukuran</th>
                    <th style="width:120px;">Tanggal</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach ($rows as $r): ?>
                <?php
                    $ext = strtolower(pathinfo($r->berkas, PATHINFO_EXTENSION));
                    $is_pdf = ($ext === 'pdf');
                    $is_img = in_array($ext, array('jpg','jpeg','png'));
                    if ($is_pdf) { $file_icon = 'fa-solid fa-file-pdf'; $file_color = '#dc2626'; $file_bg = '#fee2e2'; }
                    elseif ($is_img) { $file_icon = 'fa-solid fa-file-image'; $file_color = '#7c3aed'; $file_bg = '#ede9fe'; }
                    else { $file_icon = 'fa-solid fa-file'; $file_color = '#64748b'; $file_bg = '#f1f5f9'; }
                ?>
                <tr>
                    <td class="paparan-td-num"><?php echo $no++; ?></td>
                    <td>
                        <div class="paparan-td-icon" style="background:<?php echo $file_bg; ?>;color:<?php echo $file_color; ?>;">
                            <i class="<?php echo $file_icon; ?>"></i>
                        </div>
                    </td>
                    <td>
                        <div class="paparan-td-title"><?php echo htmlspecialchars($r->judul); ?></div>
                        <div class="paparan-td-desc"><?php echo htmlspecialchars(potong_teks($r->deskripsi, 80)); ?></div>
                    </td>
                    <td><span class="paparan-td-badge" style="background:<?php echo $file_bg; ?>;color:<?php echo $file_color; ?>;"><?php echo strtoupper($ext); ?></span></td>
                    <td class="paparan-td-size"><?php echo format_size($r->ukuran); ?></td>
                    <td class="paparan-td-date"><?php echo tgl_indo($r->tanggal, TRUE); ?></td>
                    <td>
                        <div class="paparan-td-actions">
                            <a href="<?php echo site_url('admin-paparan/ubah/'.$r->id); ?>" class="paparan-act-btn pab-edit" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="<?php echo site_url('paparan/unduh/'.$r->id); ?>" class="paparan-act-btn pab-download" title="Unduh" target="_blank"><i class="fa-solid fa-download"></i></a>
                            <a href="<?php echo site_url('admin-paparan/hapus/'.$r->id); ?>" class="paparan-act-btn pab-delete" title="Hapus" onclick="return adminConfirm('Hapus Materi?','Materi \"<?php echo htmlspecialchars(addslashes($r->judul)); ?>\" akan dihapus permanen.','<?php echo site_url('admin-paparan/hapus/'.$r->id); ?>')"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Grid Cards (Alternatif) -->
    <div class="paparan-section-divider">
        <span><i class="fa-solid fa-grip"></i> Tampilan Kartu</span>
    </div>
    <div class="paparan-admin-grid">
        <?php foreach ($rows as $r): ?>
        <?php
            $ext = strtolower(pathinfo($r->berkas, PATHINFO_EXTENSION));
            $is_pdf = ($ext === 'pdf');
            $is_img = in_array($ext, array('jpg','jpeg','png'));
            if ($is_pdf) { $file_icon = 'fa-solid fa-file-pdf'; $file_color = '#dc2626'; $file_bg = '#fee2e2'; }
            elseif ($is_img) { $file_icon = 'fa-solid fa-file-image'; $file_color = '#7c3aed'; $file_bg = '#ede9fe'; }
            else { $file_icon = 'fa-solid fa-file'; $file_color = '#64748b'; $file_bg = '#f1f5f9'; }
        ?>
        <div class="paparan-admin-card">
            <div class="paparan-card-preview">
                <?php if ($is_img): ?>
                <img src="<?php echo base_url('assets/uploads/paparan/'.rawurlencode($r->berkas)); ?>" alt="<?php echo htmlspecialchars($r->judul); ?>" loading="lazy">
                <?php else: ?>
                <div class="paparan-doc-preview">
                    <div class="paparan-doc-icon-wrap">
                        <i class="<?php echo $file_icon; ?>"></i>
                    </div>
                    <span class="paparan-doc-ext"><?php echo strtoupper($ext); ?></span>
                    <span class="paparan-doc-size"><?php echo format_size($r->ukuran); ?></span>
                </div>
                <?php endif; ?>
            </div>
            <div class="paparan-card-body">
                <div class="paparan-card-meta">
                    <span class="paparan-file-badge" style="background:<?php echo $file_bg; ?>;color:<?php echo $file_color; ?>;"><i class="<?php echo $file_icon; ?>"></i> <?php echo strtoupper($ext); ?></span>
                    <span class="paparan-size-badge"><?php echo format_size($r->ukuran); ?></span>
                </div>
                <h3><?php echo htmlspecialchars($r->judul); ?></h3>
                <p><?php echo htmlspecialchars(potong_teks($r->deskripsi, 120)); ?></p>
                <div class="paparan-card-date"><i class="fa-regular fa-calendar"></i> <?php echo tgl_indo($r->tanggal, TRUE); ?></div>
                <div class="paparan-card-actions">
                    <a href="<?php echo site_url('admin-paparan/ubah/'.$r->id); ?>" class="paparan-btn-edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <a href="<?php echo site_url('paparan/unduh/'.$r->id); ?>" class="paparan-btn-download" target="_blank"><i class="fa-solid fa-download"></i> Unduh</a>
                    <a href="<?php echo site_url('admin-paparan/hapus/'.$r->id); ?>" class="paparan-btn-delete" onclick="return adminConfirm('Hapus Materi?','Materi \"<?php echo htmlspecialchars(addslashes($r->judul)); ?>\" akan dihapus permanen.','<?php echo site_url('admin-paparan/hapus/'.$r->id); ?>')"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>

<style>
/* ===== STATS BAR ===== */
.paparan-stats-bar{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px;}
.paparan-stat-card{display:flex;align-items:center;gap:14px;background:#fff;border:1px solid #f1f5f9;border-radius:14px;padding:18px 20px;box-shadow:0 1px 4px rgba(0,0,0,.03);}
.paparan-stat-icon{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
.psi-blue{background:linear-gradient(135deg,#e3f2fd,#bbdefb);color:#1976d2;}
.psi-red{background:linear-gradient(135deg,#fef2f2,#fee2e2);color:#dc2626;}
.psi-purple{background:linear-gradient(135deg,#f5f3ff,#ede9fe);color:#7c3aed;}
.psi-green{background:linear-gradient(135deg,#f0fdf4,#dcfce7);color:#16a34a;}
.paparan-stat-info strong{display:block;font-size:22px;color:#172033;line-height:1;}
.paparan-stat-info span{font-size:12px;color:#94a3b8;font-weight:500;}

/* ===== ACTIONS ===== */
.paparan-admin-actions{display:flex;justify-content:flex-end;margin-bottom:24px;}
.paparan-add-btn{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:linear-gradient(135deg,#1976d2,#1565c0);color:#fff;border:none;border-radius:12px;font-size:14px;font-weight:700;text-decoration:none;cursor:pointer;transition:.2s;box-shadow:0 6px 16px rgba(25,118,210,.3);}
.paparan-add-btn:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(25,118,210,.4);}

/* ===== EMPTY STATE ===== */
.paparan-empty-state{background:#fff;border:2px dashed #e2e8f0;border-radius:20px;padding:60px 30px;text-align:center;}
.paparan-empty-icon{width:80px;height:80px;margin:0 auto 20px;display:flex;align-items:center;justify-content:center;border-radius:20px;background:linear-gradient(135deg,#e3f2fd,#bbdefb);color:#1976d2;font-size:36px;}
.paparan-empty-state h3{font-size:22px;color:#172033;margin-bottom:8px;}
.paparan-empty-state p{color:#64748b;font-size:15px;max-width:400px;margin:0 auto;}

/* ===== TABLE ===== */
.paparan-table-wrap{background:#fff;border:1px solid #e5e7eb;border-radius:16px;overflow:hidden;margin-bottom:32px;box-shadow:0 1px 4px rgba(0,0,0,.03);}
.paparan-table{width:100%;border-collapse:collapse;}
.paparan-table thead{background:#f8fafc;border-bottom:2px solid #e5e7eb;}
.paparan-table th{padding:14px 16px;text-align:left;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;}
.paparan-table td{padding:14px 16px;border-bottom:1px solid #f1f5f9;vertical-align:middle;}
.paparan-table tbody tr{transition:.15s;}
.paparan-table tbody tr:hover{background:#f8fafc;}
.paparan-table tbody tr:last-child td{border-bottom:none;}
.paparan-td-num{font-size:13px;font-weight:600;color:#94a3b8;text-align:center;}
.paparan-td-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;}
.paparan-td-title{font-size:14px;font-weight:700;color:#172033;margin-bottom:3px;}
.paparan-td-desc{font-size:12.5px;color:#94a3b8;line-height:1.4;}
.paparan-td-badge{display:inline-block;padding:3px 10px;border-radius:6px;font-size:11px;font-weight:700;letter-spacing:.3px;}
.paparan-td-size{font-size:13px;font-weight:600;color:#475569;}
.paparan-td-date{font-size:12.5px;color:#94a3b8;}
.paparan-td-actions{display:flex;gap:6px;}
.paparan-act-btn{width:34px;height:34px;display:flex;align-items:center;justify-content:center;border-radius:9px;font-size:13px;text-decoration:none;transition:.2s;border:none;}
.pab-edit{background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;}
.pab-edit:hover{background:#dcfce7;}
.pab-download{background:#eff6ff;color:#1976d2;border:1px solid #bfdbfe;}
.pab-download:hover{background:#dbeafe;}
.pab-delete{background:#fee2e2;color:#dc2626;border:1px solid #fecaca;}
.pab-delete:hover{background:#fecaca;}

/* ===== SECTION DIVIDER ===== */
.paparan-section-divider{display:flex;align-items:center;gap:12px;margin-bottom:20px;color:#94a3b8;font-size:13px;font-weight:600;}
.paparan-section-divider::before,.paparan-section-divider::after{content:"";flex:1;height:1px;background:#e5e7eb;}
.paparan-section-divider i{font-size:14px;}

/* ===== GRID CARDS ===== */
.paparan-admin-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:22px;}
.paparan-admin-card{background:#fff;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;transition:.25s;display:flex;flex-direction:column;}
.paparan-admin-card:hover{transform:translateY(-3px);box-shadow:0 10px 28px rgba(15,23,42,.08);}
.paparan-card-preview{height:170px;background:#f1f5f9;overflow:hidden;position:relative;border-bottom:1px solid #f1f5f9;}
.paparan-card-preview img{width:100%;height:100%;object-fit:cover;display:block;}
.paparan-doc-preview{height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:10px;background:linear-gradient(145deg,#fef2f2,#fff5f5);}
.paparan-doc-icon-wrap{width:56px;height:56px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:28px;background:rgba(220,38,38,.08);color:#dc2626;}
.paparan-doc-ext{padding:3px 12px;border-radius:6px;font-size:11px;font-weight:700;letter-spacing:.5px;background:rgba(220,38,38,.08);color:#dc2626;}
.paparan-doc-size{font-size:12px;color:#94a3b8;font-weight:600;}
.paparan-card-body{padding:18px;flex:1;display:flex;flex-direction:column;}
.paparan-card-meta{display:flex;gap:8px;margin-bottom:10px;flex-wrap:wrap;}
.paparan-file-badge{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:8px;font-size:12px;font-weight:700;}
.paparan-size-badge{display:inline-flex;align-items:center;padding:4px 10px;border-radius:8px;font-size:12px;font-weight:600;background:#f1f5f9;color:#64748b;}
.paparan-card-body h3{font-size:16px;color:#172033;margin-bottom:6px;line-height:1.4;}
.paparan-card-body > p{color:#64748b;font-size:13px;line-height:1.55;margin-bottom:10px;flex:1;}
.paparan-card-date{display:flex;align-items:center;gap:6px;color:#94a3b8;font-size:12px;margin-bottom:14px;}
.paparan-card-actions{display:flex;gap:8px;}
.paparan-btn-edit,.paparan-btn-download,.paparan-btn-delete{display:flex;align-items:center;justify-content:center;gap:5px;padding:8px 12px;border-radius:9px;font-size:12px;font-weight:700;text-decoration:none;transition:.2s;border:none;}
.paparan-btn-edit{background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0;}
.paparan-btn-edit:hover{background:#dcfce7;}
.paparan-btn-download{background:linear-gradient(135deg,#1976d2,#1565c0);color:#fff;flex:1;}
.paparan-btn-download:hover{box-shadow:0 4px 12px rgba(25,118,210,.3);}
.paparan-btn-delete{background:#fee2e2;color:#dc2626;width:36px;height:36px;padding:0;}
.paparan-btn-delete:hover{background:#fecaca;}

/* ===== RESPONSIVE ===== */
@media(max-width:900px){
    .paparan-stats-bar{grid-template-columns:repeat(2,1fr);}
    .paparan-table-wrap{overflow-x:auto;}
    .paparan-table{min-width:700px;}
}
@media(max-width:600px){
    .paparan-stats-bar{grid-template-columns:1fr;}
    .paparan-admin-grid{grid-template-columns:1fr;}
}
</style>
