<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA GALERI</p>
        <h1>Galeri Kegiatan</h1>
        <p>Semua foto dikelola melalui Album. Silakan kelola album untuk menambah, mengedit, atau menghapus foto.</p>
    </div>
    <div class="galeri-redirect-box">
        <div class="galeri-redirect-illustration">
            <svg viewBox="0 0 240 180" xmlns="http://www.w3.org/2000/svg">
                <!-- Frame 1 -->
                <rect x="20" y="40" width="85" height="70" rx="10" fill="#fff" stroke="#e2e8f0" stroke-width="2"/>
                <rect x="28" y="48" width="69" height="40" rx="6" fill="#dbeafe"/>
                <circle cx="48" cy="60" r="6" fill="#fbbf24" opacity=".6"/>
                <path d="M28 76 l20-14 l16 10 l12-8 l13 12Z" fill="#1976d2" opacity=".3"/>
                <rect x="28" y="96" width="40" height="4" rx="2" fill="#e2e8f0"/>
                <rect x="28" y="104" width="25" height="3" rx="1.5" fill="#f1f5f9"/>
                <!-- Frame 2 -->
                <rect x="135" y="25" width="85" height="70" rx="10" fill="#fff" stroke="#e2e8f0" stroke-width="2"/>
                <rect x="143" y="33" width="69" height="40" rx="6" fill="#fef3c7"/>
                <circle cx="163" cy="45" r="6" fill="#f97316" opacity=".5"/>
                <path d="M143 61 l20-14 l16 10 l12-8 l13 12Z" fill="#16a34a" opacity=".3"/>
                <rect x="143" y="79" width="40" height="4" rx="2" fill="#e2e8f0"/>
                <rect x="143" y="87" width="25" height="3" rx="1.5" fill="#f1f5f9"/>
                <!-- Frame 3 -->
                <rect x="78" y="100" width="85" height="70" rx="10" fill="#fff" stroke="#e2e8f0" stroke-width="2"/>
                <rect x="86" y="108" width="69" height="40" rx="6" fill="#fde2e8"/>
                <circle cx="106" cy="120" r="6" fill="#ec4899" opacity=".5"/>
                <path d="M86 136 l20-14 l16 10 l12-8 l13 12Z" fill="#7c3aed" opacity=".3"/>
                <rect x="86" y="154" width="40" height="4" rx="2" fill="#e2e8f0"/>
                <!-- Decorations -->
                <circle cx="15" cy="20" r="5" fill="#fbbf24" opacity=".3"/>
                <circle cx="225" cy="170" r="5" fill="#f472b6" opacity=".3"/>
                <path d="M220 15 l3-8 l3 8 l-4-3 l4 0Z" fill="#fbbf24" opacity=".3"/>
            </svg>
        </div>
        <div class="galeri-redirect-icon"><i class="fa-solid fa-images"></i></div>
        <h3>Galeri DiKelola Melalui Album</h3>
        <p>Semua foto kegiatan disimpan dalam album. Buat album baru, lalu unggah foto-foto ke dalamnya.</p>
        <div class="galeri-redirect-steps">
            <div class="galeri-step">
                <div class="galeri-step-num">1</div>
                <span>Buat Album Baru</span>
            </div>
            <div class="galeri-step-arrow"><i class="fa-solid fa-chevron-right"></i></div>
            <div class="galeri-step">
                <div class="galeri-step-num">2</div>
                <span>Upload Foto</span>
            </div>
            <div class="galeri-step-arrow"><i class="fa-solid fa-chevron-right"></i></div>
            <div class="galeri-step">
                <div class="galeri-step-num">3</div>
                <span>Tampil di Website</span>
            </div>
        </div>
        <a href="<?php echo site_url('admin-album'); ?>" class="galeri-redirect-btn"><i class="fa-solid fa-folder-open"></i> Kelola Album</a>
    </div>
</section>
<style>
.galeri-redirect-box{background:#fff;border:2px dashed #e2e8f0;border-radius:20px;padding:50px 30px;text-align:center;margin-top:10px;}
.galeri-redirect-illustration{width:220px;margin:0 auto 16px;opacity:.85;}
.galeri-redirect-illustration svg{width:100%;height:auto;}
.galeri-redirect-icon{width:72px;height:72px;margin:0 auto 18px;display:flex;align-items:center;justify-content:center;border-radius:50%;background:linear-gradient(135deg,#fef3c7,#fde68a);color:#d97706;font-size:30px;}
.galeri-redirect-box h3{font-size:20px;color:#1e293b;margin:0 0 8px;}
.galeri-redirect-box>p{color:#64748b;font-size:14px;max-width:420px;margin:0 auto 28px;line-height:1.6;}
.galeri-redirect-steps{display:flex;align-items:center;justify-content:center;gap:14px;margin-bottom:28px;flex-wrap:wrap;}
.galeri-step{display:flex;flex-direction:column;align-items:center;gap:6px;}
.galeri-step-num{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#1976d2,#1565c0);color:#fff;font-size:14px;font-weight:800;display:flex;align-items:center;justify-content:center;}
.galeri-step span{font-size:12px;font-weight:600;color:#475569;}
.galeri-step-arrow{color:#cbd5e1;font-size:12px;margin-top:-12px;}
.galeri-redirect-btn{display:inline-flex;align-items:center;gap:8px;padding:13px 30px;background:linear-gradient(135deg,#1976d2,#1565c0);color:#fff;border-radius:12px;font-size:15px;font-weight:700;text-decoration:none;transition:.2s;box-shadow:0 6px 18px rgba(25,118,210,.3);}
.galeri-redirect-btn:hover{transform:translateY(-2px);box-shadow:0 10px 26px rgba(25,118,210,.4);}
@media(max-width:500px){.galeri-redirect-steps{gap:8px;}.galeri-step-arrow{display:none;}}
</style>
