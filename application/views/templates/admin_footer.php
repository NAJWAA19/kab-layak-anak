<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<footer style="background:linear-gradient(135deg,#0b2a5b 0%,#1558b0 50%,#6a1b9a 100%);border-top:none;position:relative;color:#c9d8f2;padding:0;overflow:hidden;">
    <style>
    .admin-footer-marquee{overflow:hidden;white-space:nowrap;padding:14px 0;position:relative;}
    .admin-footer-marquee-inner{display:inline-flex;animation:afMarquee 20s linear infinite;white-space:nowrap;}
    .admin-footer-marquee-inner span{font-size:13px;color:#c9d8f2;letter-spacing:.3px;padding-right:60px;}
    @keyframes afMarquee{0%{transform:translateX(0);}100%{transform:translateX(-50%);}}
    </style>
    <!-- Admin Footer Illustrations -->
    <div class="admin-footer-illustrations">
        <div class="af-sun">
            <svg viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
                <circle cx="65" cy="65" r="24" fill="#fbbf24" opacity=".2"/>
                <circle cx="65" cy="65" r="16" fill="#f59e0b" opacity=".25"/>
                <circle cx="65" cy="65" r="9" fill="#fcd34d" opacity=".15"/>
                <g class="af-sun-rays">
                    <line x1="65" y1="18" x2="65" y2="8" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".14"/>
                    <line x1="65" y1="122" x2="65" y2="112" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".14"/>
                    <line x1="18" y1="65" x2="8" y2="65" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".14"/>
                    <line x1="122" y1="65" x2="112" y2="65" stroke="#fbbf24" stroke-width="2.5" stroke-linecap="round" opacity=".14"/>
                    <line x1="32" y1="32" x2="24" y2="24" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".11"/>
                    <line x1="98" y1="32" x2="106" y2="24" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".11"/>
                    <line x1="32" y1="98" x2="24" y2="106" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".11"/>
                    <line x1="98" y1="98" x2="106" y2="106" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".11"/>
                </g>
            </svg>
        </div>
        <div class="af-cloud afc-1">
            <svg viewBox="0 0 120 60" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="55" cy="38" rx="38" ry="18" fill="#fff" opacity=".08"/>
                <ellipse cx="38" cy="30" rx="24" ry="16" fill="#fff" opacity=".06"/>
                <ellipse cx="72" cy="32" rx="20" ry="14" fill="#fff" opacity=".05"/>
            </svg>
        </div>
        <div class="af-cloud afc-2">
            <svg viewBox="0 0 90 45" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="42" cy="28" rx="28" ry="12" fill="#fff" opacity=".06"/>
                <ellipse cx="28" cy="22" rx="18" ry="10" fill="#fff" opacity=".04"/>
            </svg>
        </div>
        <div class="af-birds">
            <svg viewBox="0 0 55 28" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 16 Q12 8 18 14" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" opacity=".1"/>
                <path d="M24 10 Q28 2 34 8" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" opacity=".08"/>
                <path d="M40 14 Q44 6 50 12" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" opacity=".07"/>
            </svg>
        </div>
        <div class="af-tree aft-1">
            <svg viewBox="0 0 55 85" xmlns="http://www.w3.org/2000/svg">
                <rect x="23" y="50" width="8" height="28" rx="3" fill="#fff" opacity=".06"/>
                <ellipse cx="27" cy="36" rx="20" ry="22" fill="#22c55e" opacity=".07"/>
                <ellipse cx="27" cy="28" rx="14" ry="15" fill="#86efac" opacity=".04"/>
            </svg>
        </div>
        <div class="af-tree aft-2">
            <svg viewBox="0 0 45 70" xmlns="http://www.w3.org/2000/svg">
                <rect x="19" y="42" width="6" height="22" rx="3" fill="#fff" opacity=".05"/>
                <ellipse cx="22" cy="30" rx="16" ry="18" fill="#22c55e" opacity=".06"/>
                <ellipse cx="22" cy="24" rx="10" ry="12" fill="#4ade80" opacity=".03"/>
            </svg>
        </div>
        <div class="af-children">
            <svg viewBox="0 0 90 70" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <circle cx="22" cy="10" r="6.5" fill="#fff" opacity=".1"/>
                    <path d="M16 7 Q17 3 22 2 Q27 3 28 7 Q28 5 26 4.5 Q24 3.5 22 3.5 Q20 3.5 18 4.5 Q16 5 16 7Z" fill="#fff" opacity=".08"/>
                    <path d="M18 16 L15 36 Q22 38 29 36 L26 16Z" fill="#fff" opacity=".09"/>
                    <path d="M18 18 L10 12 Q8 11 7 13 L14 20Z" fill="#fff" opacity=".08"/>
                    <path d="M26 18 L34 24 Q36 25 35 27 L28 22Z" fill="#fff" opacity=".08"/>
                    <path d="M16 36 L8 52 Q7 54 9 55 L18 44Z" fill="#fff" opacity=".08"/>
                    <path d="M28 36 L36 50 Q37 52 35 53 L26 44Z" fill="#fff" opacity=".08"/>
                </g>
                <g>
                    <circle cx="58" cy="14" r="6" fill="#fff" opacity=".09"/>
                    <path d="M53 11 Q54 7 58 6 Q62 7 63 11 Q63 9 61 8.5 Q60 8 58 8 Q56 8 55 8.5 Q53 9 53 11Z" fill="#fff" opacity=".07"/>
                    <path d="M54 20 L52 36 Q58 38 64 36 L62 20Z" fill="#fff" opacity=".09"/>
                    <path d="M54 22 L46 28 Q44 29 43 27 L50 20Z" fill="#fff" opacity=".08"/>
                    <path d="M62 22 L70 28 Q72 29 73 27 L66 20Z" fill="#fff" opacity=".08"/>
                    <path d="M52 36 L46 50 Q45 52 47 52 L54 42Z" fill="#fff" opacity=".08"/>
                    <path d="M64 36 L70 48 Q71 50 69 50 L62 42Z" fill="#fff" opacity=".08"/>
                </g>
            </svg>
        </div>
        <div class="af-flowers aff-1">
            <svg viewBox="0 0 40 35" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="10" r="4" fill="#f472b6" opacity=".1"/>
                <circle cx="12" cy="10" r="2" fill="#fbbf24" opacity=".08"/>
                <line x1="12" y1="14" x2="12" y2="30" stroke="#22c55e" stroke-width="1.5" opacity=".07"/>
                <circle cx="28" cy="8" r="3.5" fill="#a78bfa" opacity=".09"/>
                <circle cx="28" cy="8" r="1.8" fill="#fbbf24" opacity=".07"/>
                <line x1="28" y1="12" x2="28" y2="28" stroke="#22c55e" stroke-width="1.3" opacity=".06"/>
            </svg>
        </div>
        <div class="af-stars afs-1">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 3 L14 9 L20 9 L15 13 L17 19 L12 15 L7 19 L9 13 L4 9 L10 9Z" fill="#fbbf24" opacity=".09"/>
            </svg>
        </div>
        <div class="af-stars afs-2">
            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 2 L12 8 L18 8 L13 11 L15 17 L10 13 L5 17 L7 11 L2 8 L8 8Z" fill="#fbbf24" opacity=".07"/>
            </svg>
        </div>
        <div class="af-butterfly afbf-1">
            <svg viewBox="0 0 35 25" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 12 Q10 6 7 9 Q3 13 10 15 Q14 16 18 12Z" fill="#f472b6" opacity=".09"/>
                <path d="M18 12 Q26 6 29 9 Q33 13 26 15 Q22 16 18 12Z" fill="#a78bfa" opacity=".08"/>
                <path d="M18 12 Q12 16 9 18 Q5 20 12 18 Q16 16 18 12Z" fill="#f472b6" opacity=".07"/>
                <path d="M18 12 Q24 16 27 18 Q31 20 24 18 Q20 16 18 12Z" fill="#a78bfa" opacity=".06"/>
            </svg>
        </div>
        <div class="af-grass">
            <svg viewBox="0 0 1200 35" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0 35 Q50 8 100 35 Q150 3 200 35 Q250 12 300 35 Q350 5 400 35 Q450 10 500 35 Q550 3 600 35 Q650 15 700 35 Q750 5 800 35 Q850 12 900 35 Q950 3 1000 35 Q1050 10 1100 35 Q1150 5 1200 35Z" fill="#22c55e" opacity=".05"/>
            </svg>
        </div>
    </div>
    <div style="height:4px;background:linear-gradient(90deg,#f472b6,#fbbf24,#22c55e,#38bdf8,#a78bfa);position:relative;z-index:1;"></div>
    <div style="padding:0;position:relative;z-index:1;max-width:1200px;margin:0 auto;">
        <div class="admin-footer-marquee">
            <div class="admin-footer-marquee-inner">
                <span>&copy; 2026 Website Layak Anak — Dinas Sosial PPKB PPPA Kab. Magelang. &#8226; Semua hak dilindungi.</span>
                <span>&copy; 2026 Website Layak Anak — Dinas Sosial PPKB PPPA Kab. Magelang. &#8226; Semua hak dilindungi.</span>
                <span>&copy; 2026 Website Layak Anak — Dinas Sosial PPKB PPPA Kab. Magelang. &#8226; Semua hak dilindungi.</span>
                <span>&copy; 2026 Website Layak Anak — Dinas Sosial PPKB PPPA Kab. Magelang. &#8226; Semua hak dilindungi.</span>
                <span>&copy; 2026 Website Layak Anak — Dinas Sosial PPKB PPPA Kab. Magelang. &#8226; Semua hak dilindungi.</span>
                <span>&copy; 2026 Website Layak Anak — Dinas Sosial PPKB PPPA Kab. Magelang. &#8226; Semua hak dilindungi.</span>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script>
(function(){
    var btn = document.getElementById('sidebarToggle');
    var backdrop = document.getElementById('sidebarBackdrop');
    var header = document.querySelector('header.admin-header');
    function syncHeaderHeight(){
        if (header) document.documentElement.style.setProperty('--admin-header-h', header.offsetHeight + 'px');
    }
    function setDefault(){ if (window.innerWidth <= 900) document.body.classList.add('sidebar-collapsed'); }
    if (btn) btn.addEventListener('click', function(){ syncHeaderHeight(); document.body.classList.toggle('sidebar-collapsed'); });
    if (backdrop) backdrop.addEventListener('click', function(){ document.body.classList.add('sidebar-collapsed'); });
    window.addEventListener('resize', function(){ syncHeaderHeight(); setDefault(); });
    window.addEventListener('load', syncHeaderHeight);
    syncHeaderHeight();
    setDefault();
})();
</script>
<style>
.admin-confirm-overlay{position:fixed;inset:0;background:rgba(15,23,42,.5);backdrop-filter:blur(4px);z-index:9999;display:flex;align-items:center;justify-content:center;opacity:0;visibility:hidden;transition:.25s}
.admin-confirm-overlay.active{opacity:1;visibility:visible}
.admin-confirm-modal{background:#fff;border-radius:20px;padding:32px;max-width:400px;width:90%;box-shadow:0 25px 60px rgba(0,0,0,.2);transform:scale(.9) translateY(20px);transition:.3s;text-align:center}
.admin-confirm-overlay.active .admin-confirm-modal{transform:scale(1) translateY(0)}
.admin-confirm-icon{width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;font-size:28px}
.admin-confirm-icon.danger{background:#fee2e2;color:#dc2626}
.admin-confirm-icon.warning{background:#fef3c7;color:#d97706}
.admin-confirm-title{font-size:18px;font-weight:800;color:#1e293b;margin-bottom:8px}
.admin-confirm-text{font-size:14px;color:#64748b;line-height:1.6;margin-bottom:24px}
.admin-confirm-actions{display:flex;gap:10px;justify-content:center}
.admin-confirm-btn{padding:11px 24px;border-radius:12px;font-size:14px;font-weight:700;border:none;cursor:pointer;transition:.2s;display:inline-flex;align-items:center;gap:8px}
.admin-confirm-btn:hover{transform:translateY(-1px)}
.admin-confirm-btn.cancel{background:#f1f5f9;color:#475569;border:1px solid #e2e8f0}
.admin-confirm-btn.cancel:hover{background:#e2e8f0}
.admin-confirm-btn.confirm-delete{background:linear-gradient(135deg,#dc2626,#b91c1c);color:#fff;box-shadow:0 4px 14px rgba(220,38,38,.3)}
.admin-confirm-btn.confirm-delete:hover{box-shadow:0 6px 20px rgba(220,38,38,.4)}
</style>
<div class="admin-confirm-overlay" id="adminConfirmOverlay">
    <div class="admin-confirm-modal">
        <div class="admin-confirm-icon danger" id="adminConfirmIcon"><i class="fa-solid fa-trash-can"></i></div>
        <h3 class="admin-confirm-title" id="adminConfirmTitle">Hapus Data?</h3>
        <p class="admin-confirm-text" id="adminConfirmText">Data yang dihapus tidak dapat dikembalikan.</p>
        <div class="admin-confirm-actions">
            <button class="admin-confirm-btn cancel" id="adminConfirmCancel">Batal</button>
            <button class="admin-confirm-btn confirm-delete" id="adminConfirmOk">Hapus</button>
        </div>
    </div>
</div>
<script>
(function(){
    var overlay=document.getElementById('adminConfirmOverlay'),
        titleEl=document.getElementById('adminConfirmTitle'),
        textEl=document.getElementById('adminConfirmText'),
        iconEl=document.getElementById('adminConfirmIcon'),
        cancelBtn=document.getElementById('adminConfirmCancel'),
        okBtn=document.getElementById('adminConfirmOk'),
        pendingHref=null;

    function openModal(title,text,href,icon){
        titleEl.textContent=title;
        textEl.textContent=text;
        pendingHref=href;
        if(icon){
            iconEl.innerHTML='<i class="fa-solid '+icon+'"></i>';
            iconEl.className='admin-confirm-icon danger';
        }
        overlay.classList.add('active');
        document.body.style.overflow='hidden';
    }
    function closeModal(){
        overlay.classList.remove('active');
        document.body.style.overflow='';
        pendingHref=null;
    }
    cancelBtn.addEventListener('click',closeModal);
    overlay.addEventListener('click',function(e){if(e.target===overlay)closeModal();});
    okBtn.addEventListener('click',function(){if(pendingHref)window.location.href=pendingHref;});

    window.adminConfirm=function(title,text,href,icon){
        openModal(title,text,href,icon||'fa-trash-can');
        return false;
    };
    window.adminConfirmGaleri=function(title,text,href){
        openModal(title,text,href,'fa-images');
        return false;
    };
})();
</script>
</body>
</html>
