<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<footer class="main-footer">
    <div class="footer-content">

        <div class="footer-brand">
            <div class="footer-logo-row">
                <img src="<?php echo base_url('assets/img/logo-dinsos.png'); ?>" alt="Logo Dinas Sosial Kabupaten Magelang" class="footer-logo">
                <img src="<?php echo base_url('assets/img/logo-kla.png'); ?>" alt="Logo Kabupaten Layak Anak" class="footer-logo">
                <div>
                    <strong>KABUPATEN LAYAK ANAK</strong>
                    <span>KABUPATEN MAGELANG</span>
                </div>
            </div>
            <p class="footer-desc"><span class="footer-pin" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></span> Jl. Letnan Tukiyat No.40, Gunungan, Deyangan, Kec. Mertoyudan, Kabupaten Magelang, Jawa Tengah 56172</p>
        </div>

        <div class="footer-block">
            <h4>Statistik</h4>
            <div class="footer-dash">
                <div class="footer-stat">
                    <i class="fa-solid fa-users" aria-hidden="true"></i>
                    <div>
                        <strong><?php echo isset($total_pengunjung) ? number_format((int)$total_pengunjung, 0, ',', '.') : '0'; ?></strong>
                        <small>Total Pengunjung</small>
                    </div>
                </div>
                <div class="footer-stat">
                    <i class="fa-solid fa-fire" aria-hidden="true"></i>
                    <div>
                        <strong><?php echo isset($pengunjung_hari_ini) ? number_format((int)$pengunjung_hari_ini, 0, ',', '.') : '0'; ?></strong>
                        <small>Pengunjung Hari Ini</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-block">
            <h4>Ikuti Kami</h4>
            <div class="social-list">
                <a class="soc-card ig" href="https://www.instagram.com/dinsosppkbpppa_kabmagelang?stkn=MW5zY3E2NmZzeXVx" target="_blank" rel="noopener" aria-label="Instagram Kabupaten Layak Anak Magelang">
                    <span class="soc-ico"><i class="fa-brands fa-instagram" aria-hidden="true"></i></span>
                    <span class="soc-txt">
                        <span class="soc-name">Instagram</span>
                        <span class="soc-handle">@dinsosppkbpppa_kabmagelang</span>
                    </span>
                </a>
                <a class="soc-card yt" href="https://youtube.com/@dinsosppkbpppakabmagelang2140?si=sB44CmjzR5FT2_qU" target="_blank" rel="noopener" aria-label="YouTube Dinas Sosial PPKB PPPA Kabupaten Magelang">
                    <span class="soc-ico"><i class="fa-brands fa-youtube" aria-hidden="true"></i></span>
                    <span class="soc-txt">
                        <span class="soc-name">YouTube</span>
                        <span class="soc-handle">@dinsosppkbpppakabmagelang2140</span>
                    </span>
                </a>
                <a class="soc-card phone-number" href="tel:+62293788167" title="Telepon 0293788167" aria-label="Nomor telepon 0293788167">
                    <span class="soc-ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
                    <span class="soc-txt">
                        <span class="soc-name">Telepon</span>
                        <span class="soc-handle">0293788167</span>
                    </span>
                </a>
            </div>
        </div>

    </div>

    <?php $footer_copyright = '&copy; ' . date('Y') . ' Website Layak Anak &mdash; Dinas Sosial PPKB PPPA Kabupaten Magelang. Semua hak dilindungi.'; ?>
    <div class="footer-bottom">
        <div class="footer-marquee">
            <div class="footer-marquee-inner">
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <span class="footer-marquee-item"><?php echo $footer_copyright; ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

<!-- Widget Ramah Disabilitas -->
<nav class="a11y-widget" id="a11yWidget" aria-label="Fitur ramah disabilitas">
    <button type="button" class="a11y-toggle" id="a11yToggle" aria-expanded="false" aria-controls="a11yPanel" title="Fitur Ramah Disabilitas">
        <i class="fa-solid fa-wheelchair-move" aria-hidden="true"></i>
    </button>
    <div class="a11y-panel" id="a11yPanel" role="dialog" aria-label="Pengaturan aksesibilitas" hidden>
        <div class="a11y-panel-head">
            <strong>Fitur Ramah Disabilitas</strong>
            <button type="button" class="a11y-close" id="a11yClose" aria-label="Tutup menu aksesibilitas">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        </div>
        <ul class="a11y-actions">
            <li>
                <button type="button" data-a11y="read" aria-pressed="false">
                    <i class="fa-solid fa-volume-high" aria-hidden="true"></i>
                    <span>Bacakan Halaman</span>
                </button>
            </li>
            <li>
                <button type="button" data-a11y="text-inc" aria-pressed="false">
                    <i class="fa-solid fa-magnifying-glass-plus" aria-hidden="true"></i>
                    <span>Perbesar Teks</span>
                    <span class="a11y-level" aria-label="Ukuran teks saat ini">100%</span>
                </button>
            </li>
            <li>
                <button type="button" data-a11y="text-dec" aria-pressed="false">
                    <i class="fa-solid fa-magnifying-glass-minus" aria-hidden="true"></i>
                    <span>Perkecil Teks</span>
                    <span class="a11y-level" aria-label="Ukuran teks saat ini">100%</span>
                </button>
            </li>
            <li>
                <button type="button" data-a11y="hc" aria-pressed="false">
                    <i class="fa-solid fa-circle-half-stroke" aria-hidden="true"></i>
                    <span>Kontras Tinggi</span>
                </button>
            </li>
            <li>
                <button type="button" data-a11y="dc" aria-pressed="false">
                    <i class="fa-solid fa-moon" aria-hidden="true"></i>
                    <span>Kontras Gelap</span>
                </button>
            </li>
            <li>
                <button type="button" data-a11y="kb" aria-pressed="false">
                    <i class="fa-solid fa-keyboard" aria-hidden="true"></i>
                    <span>Navigasi Keyboard</span>
                </button>
            </li>
            <li>
                <button type="button" data-a11y="anim" aria-pressed="false">
                    <i class="fa-solid fa-pause" aria-hidden="true"></i>
                    <span>Hentikan Animasi</span>
                </button>
            </li>
            <li>
                <button type="button" data-a11y="reset" class="a11y-reset-btn">
                    <i class="fa-solid fa-rotate-left" aria-hidden="true"></i>
                    <span>Reset Pengaturan</span>
                </button>
            </li>
        </ul>
    </div>
</nav>

<!-- Scroll Progress Bar -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Back to Top Button -->
<button class="back-to-top" id="backToTop" aria-label="Kembali ke atas">
    <i class="fa-solid fa-arrow-up"></i>
</button>

<script src="<?php echo base_url('assets/js/aksesibilitas.js?v='.filemtime(FCPATH.'assets/js/aksesibilitas.js')); ?>"></script>

<script>
(function(){
  function initSlider(slider){
    var slides = slider.querySelectorAll('.page-slide');
    if(!slides.length) return;
    var dotsBox = slider.querySelector('[data-dots]');
    if(!dotsBox) return;
    dotsBox.innerHTML = '';
    var idx = 0, timer = null;
    slides.forEach(function(_,i){
      var b = document.createElement('button');
      b.type = 'button';
      b.setAttribute('aria-label','Slide '+(i+1));
      if(i===0) b.classList.add('active');
      b.addEventListener('click',function(){ go(i); restart(); });
      dotsBox.appendChild(b);
    });
    var dots = dotsBox.querySelectorAll('button');
    function go(i){
      idx = (i+slides.length)%slides.length;
      slides.forEach(function(s,k){ s.classList.toggle('active',k===idx); });
      dots.forEach(function(d,k){ d.classList.toggle('active',k===idx); });
    }
    function restart(){ if(timer) clearInterval(timer); timer = setInterval(function(){ go(idx+1); },4500); }
    var p = slider.querySelector('[data-prev]');
    var n = slider.querySelector('[data-next]');
    if(p) p.addEventListener('click',function(){ go(idx-1); restart(); });
    if(n) n.addEventListener('click',function(){ go(idx+1); restart(); });
    slider.addEventListener('mouseenter',function(){ if(timer) clearInterval(timer); });
    slider.addEventListener('mouseleave',restart);
    var sx=0; slider.addEventListener('touchstart',function(e){ sx=e.touches[0].clientX; },{passive:true});
    slider.addEventListener('touchend',function(e){ var dx=e.changedTouches[0].clientX-sx; if(Math.abs(dx)>40){ go(idx+(dx<0?1:-1)); restart(); } },{passive:true});
    restart();
  }
  document.querySelectorAll('.js-slider').forEach(initSlider);
  var els = document.querySelectorAll('.reveal, .why-card, .program-card, .page-art, .purpose-card, .right-card, .gallery-public-card, .paparan-card');
  if('IntersectionObserver' in window){
    var io = new IntersectionObserver(function(es){ es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('visible'); io.unobserve(e.target); } }); },{threshold:.12});
    els.forEach(function(el){ el.classList.add('reveal'); io.observe(el); });
  } else { els.forEach(function(el){ el.classList.add('visible'); }); }

  // Scroll Progress Bar
  var progressBar = document.getElementById('scrollProgress');
  var backToTopBtn = document.getElementById('backToTop');
  if(progressBar || backToTopBtn){
    window.addEventListener('scroll', function(){
      var st = window.scrollY;
      var dh = document.documentElement.scrollHeight - window.innerHeight;
      if(progressBar) progressBar.style.width = dh > 0 ? (st/dh*100)+'%' : '0%';
      if(backToTopBtn) backToTopBtn.classList.toggle('show', st > 400);
    }, {passive:true});
    if(backToTopBtn) backToTopBtn.addEventListener('click', function(){
      window.scrollTo({top:0, behavior:'smooth'});
    });
  }
})();
</script>
</body>
</html>
