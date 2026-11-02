<?php defined('BASEPATH') OR exit('No direct script access allowed');
$is_edit = !empty($row);
?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA PAPARAN</p>
        <h1><?php echo $is_edit ? 'Edit Materi Paparan' : 'Tambah Materi Paparan'; ?></h1>
        <p><?php echo $is_edit ? 'Perbarui dokumen paparan yang sudah ada.' : 'Upload dokumen PDF atau gambar untuk ditampilkan ke masyarakat.'; ?></p>
    </div>
    <div class="paparan-form-card">
        <?php echo validation_errors('<div class="paparan-form-error"><i class="fa-solid fa-circle-exclamation"></i> ', '</div>'); ?>
        <?php if (!empty($upload_error)): ?><div class="paparan-form-error"><i class="fa-solid fa-circle-exclamation"></i> <?php echo $upload_error; ?></div><?php endif; ?>
        <form action="<?php echo site_url($is_edit ? 'admin-paparan/update/'.$row->id : 'admin-paparan/simpan'); ?>" method="post" enctype="multipart/form-data">
            <div class="paparan-form-grid">
                <div class="paparan-form-left">
                    <div class="paparan-form-group">
                        <label><i class="fa-solid fa-heading"></i> Judul Paparan</label>
                        <input type="text" name="judul" placeholder="Contoh: Kebijakan Kabupaten Layak Anak" value="<?php echo $is_edit ? htmlspecialchars($row->judul) : set_value('judul'); ?>" required>
                    </div>
                    <div class="paparan-form-group">
                        <label><i class="fa-solid fa-align-left"></i> Deskripsi</label>
                        <textarea name="deskripsi" placeholder="Jelaskan isi materi paparan ini..." required><?php echo $is_edit ? htmlspecialchars($row->deskripsi) : set_value('deskripsi'); ?></textarea>
                    </div>
                </div>
                <div class="paparan-form-right">
                    <div class="paparan-form-group">
                        <label><i class="fa-solid fa-cloud-arrow-up"></i> <?php echo $is_edit ? 'Ganti Dokumen (Opsional)' : 'Upload Dokumen'; ?></label>
                        <?php if ($is_edit && !empty($row->berkas)): ?>
                        <div class="paparan-current-file">
                            <div class="paparan-current-file-icon"><i class="fa-solid fa-file-<?php echo strtolower(pathinfo($row->berkas, PATHINFO_EXTENSION)) === 'pdf' ? 'pdf' : 'image'; ?>"></i></div>
                            <div class="paparan-current-file-info">
                                <strong><?php echo htmlspecialchars($row->berkas); ?></strong>
                                <span><?php echo format_size($row->ukuran); ?> &middot; File saat ini</span>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="paparan-upload-area" id="uploadArea">
                            <div class="paparan-upload-icon"><i class="fa-solid fa-file-arrow-up"></i></div>
                            <h4>Seret & Letakkan File</h4>
                            <p>atau klik untuk memilih dari komputer</p>
                            <input type="file" id="fileInput" name="berkas" accept=".pdf,.jpg,.jpeg,.png" <?php echo $is_edit ? '' : 'required'; ?>>
                            <div class="paparan-upload-formats">
                                <span><i class="fa-solid fa-file-pdf"></i> PDF</span>
                                <span><i class="fa-solid fa-file-image"></i> JPG</span>
                                <span><i class="fa-solid fa-file-image"></i> PNG</span>
                                <span><i class="fa-solid fa-weight-scale"></i> Maks 25 MB</span>
                            </div>
                        </div>
                        <div class="paparan-file-preview" id="filePreview" style="display:none;">
                            <div class="paparan-file-icon" id="fileIcon"><i class="fa-solid fa-file"></i></div>
                            <div class="paparan-file-info">
                                <strong id="fileName"></strong>
                                <span id="fileSize"></span>
                            </div>
                            <button type="button" class="paparan-file-remove" id="fileRemove"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="paparan-form-actions">
                <a href="<?php echo site_url('admin-paparan'); ?>" class="paparan-btn-cancel"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                <button type="submit" class="paparan-btn-save"><i class="fa-solid fa-floppy-disk"></i> <?php echo $is_edit ? 'Perbarui Materi' : 'Simpan Materi'; ?></button>
            </div>
        </form>
    </div>
</section>
<style>
.paparan-form-card{background:#fff;border:1px solid #e5e7eb;border-radius:20px;padding:36px;box-shadow:0 8px 30px rgba(15,23,42,.05);}
.paparan-form-error{background:#fef2f2;color:#dc2626;padding:14px 18px;border-radius:12px;font-size:14px;font-weight:600;margin-bottom:20px;display:flex;align-items:center;gap:8px;}
.paparan-form-grid{display:grid;grid-template-columns:1fr 1fr;gap:32px;margin-bottom:8px;}
.paparan-form-group{margin-bottom:22px;}
.paparan-form-group label{display:flex;align-items:center;gap:8px;margin-bottom:10px;font-size:14px;font-weight:700;color:#334155;}
.paparan-form-group label i{color:#1976d2;font-size:13px;}
.paparan-form-group input[type="text"],.paparan-form-group textarea{width:100%;padding:13px 16px;border:1px solid #e2e8f0;border-radius:12px;font-size:14.5px;outline:none;transition:.2s;background:#f9fafb;font-family:Arial,sans-serif;}
.paparan-form-group input[type="text"]:focus,.paparan-form-group textarea:focus{border-color:#1976d2;box-shadow:0 0 0 3px rgba(25,118,210,.08);background:#fff;}
.paparan-form-group textarea{min-height:130px;resize:vertical;line-height:1.6;}

.paparan-upload-area{border:2px dashed #d1d5db;border-radius:16px;padding:36px 20px;text-align:center;background:#f9fafb;cursor:pointer;transition:.2s;position:relative;}
.paparan-upload-area:hover,.paparan-upload-area.dragover{border-color:#1976d2;background:#eff6ff;}
.paparan-upload-icon{width:64px;height:64px;margin:0 auto 14px;display:flex;align-items:center;justify-content:center;border-radius:16px;background:linear-gradient(135deg,#e3f2fd,#bbdefb);color:#1976d2;font-size:28px;}
.paparan-upload-area h4{color:#172033;font-size:16px;margin-bottom:4px;}
.paparan-upload-area p{color:#64748b;font-size:13px;margin-bottom:14px;}
.paparan-upload-area input[type="file"]{position:absolute;inset:0;opacity:0;cursor:pointer;}
.paparan-upload-formats{display:flex;gap:10px;justify-content:center;flex-wrap:wrap;}
.paparan-upload-formats span{display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:8px;background:#fff;border:1px solid #e5e7eb;font-size:11.5px;font-weight:600;color:#64748b;}

.paparan-current-file{display:flex;align-items:center;gap:14px;padding:14px 16px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:14px;margin-bottom:14px;}
.paparan-current-file-icon{width:44px;height:44px;display:flex;align-items:center;justify-content:center;border-radius:10px;font-size:20px;background:#dcfce7;color:#16a34a;flex-shrink:0;}
.paparan-current-file-info{flex:1;min-width:0;}
.paparan-current-file-info strong{display:block;color:#172033;font-size:13px;word-break:break-word;margin-bottom:2px;}
.paparan-current-file-info span{color:#64748b;font-size:12px;}

.paparan-file-preview{display:flex;align-items:center;gap:14px;padding:16px;background:#eff6ff;border:1px solid #bfdbfe;border-radius:14px;margin-top:14px;}
.paparan-file-icon{width:48px;height:48px;display:flex;align-items:center;justify-content:center;border-radius:12px;font-size:22px;flex-shrink:0;}
.paparan-file-info{flex:1;min-width:0;}
.paparan-file-info strong{display:block;color:#172033;font-size:14px;word-break:break-word;margin-bottom:3px;}
.paparan-file-info span{color:#64748b;font-size:12.5px;}
.paparan-file-remove{width:36px;height:36px;display:flex;align-items:center;justify-content:center;border:none;background:#fee2e2;color:#dc2626;border-radius:10px;cursor:pointer;font-size:14px;flex-shrink:0;transition:.2s;}
.paparan-file-remove:hover{background:#fecaca;}

.paparan-form-actions{display:flex;justify-content:flex-end;gap:12px;margin-top:28px;padding-top:24px;border-top:1px solid #f1f5f9;}
.paparan-btn-cancel,.paparan-btn-save{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:12px;font-size:14px;font-weight:700;text-decoration:none;cursor:pointer;transition:.2s;border:none;}
.paparan-btn-cancel{background:#f1f1f9;color:#475569;}
.paparan-btn-cancel:hover{background:#e2e8f0;}
.paparan-btn-save{background:linear-gradient(135deg,#1976d2,#1565c0);color:#fff;box-shadow:0 6px 16px rgba(25,118,210,.3);}
.paparan-btn-save:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(25,118,210,.4);}

@media(max-width:768px){.paparan-form-grid{grid-template-columns:1fr;}.paparan-form-card{padding:24px 18px;}}
</style>
<script>
(function(){
    var area=document.getElementById('uploadArea'),input=document.getElementById('fileInput'),
        preview=document.getElementById('filePreview'),nameEl=document.getElementById('fileName'),
        sizeEl=document.getElementById('fileSize'),iconEl=document.getElementById('fileIcon'),
        removeBtn=document.getElementById('fileRemove');
    function showFile(f){
        if(!f)return;
        var kb=Math.round(f.size/1024),mb=(f.size/1048576).toFixed(1);
        var ext=f.name.split('.').pop().toLowerCase();
        var cls='fa-solid fa-file',color='#64748b',bg='#f1f5f9';
        if(ext==='pdf'){cls='fa-solid fa-file-pdf';color='#dc2626';bg='#fee2e2';}
        else if(['jpg','jpeg','png'].indexOf(ext)!==-1){cls='fa-solid fa-file-image';color='#7c3aed';bg='#ede9fe';}
        iconEl.innerHTML='<i class="'+cls+'"></i>';
        iconEl.style.background=bg;iconEl.style.color=color;
        nameEl.textContent=f.name;
        sizeEl.textContent=kb>1024?mb+' MB':kb+' KB';
        preview.style.display='flex';area.style.display='none';
    }
    if(input)input.addEventListener('change',function(){if(input.files&&input.files[0])showFile(input.files[0]);});
    if(removeBtn)removeBtn.addEventListener('click',function(){input.value='';preview.style.display='none';area.style.display='';});
    if(area){
        area.addEventListener('dragover',function(e){e.preventDefault();area.classList.add('dragover');});
        area.addEventListener('dragleave',function(){area.classList.remove('dragover');});
        area.addEventListener('drop',function(e){e.preventDefault();area.classList.remove('dragover');if(e.dataTransfer.files.length)showFile(e.dataTransfer.files[0]);});
    }
})();
</script>
