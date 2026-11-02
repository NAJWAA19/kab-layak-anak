<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Foto background beranda (slide horizontal). Urutan: 1) bupati, 2) nakanak1, 3) nakanak2.
// Ganti nama file di sini bila ingin mengganti foto.
$hero_bg = array(
    'assets/img/hero-bg-1.jpg?v=2',
    'assets/img/hero-bg-2.jpg?v=2',
    'assets/img/hero-bg-3.jpg?v=2',
);
?>
<section class="home-hero">
    <div class="hero-bg-slides" aria-hidden="true">
        <div class="hero-bg-track">
            <?php foreach ($hero_bg as $src): ?>
            <div class="hero-bg-slide" style="background-image:url('<?php echo base_url($src); ?>');"></div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="home-hero-content reveal">
        <p class="home-hero-label"><span class="pulse-dot"></span><?php echo !empty($beranda_hero) ? htmlspecialchars($beranda_hero->label) : 'WEBSITE KABUPATEN LAYAK ANAK MAGELANG'; ?></p>
        <h1><?php echo !empty($beranda_hero) ? $beranda_hero->judul : 'Mewujudkan Lingkungan yang <span class="hl">Layak dan Aman</span> bagi Anak'; ?></h1>
        <p class="home-hero-description"><?php echo !empty($beranda_hero) ? htmlspecialchars($beranda_hero->deskripsi) : 'Bersama menciptakan lingkungan yang mendukung pemenuhan hak, perlindungan, tumbuh kembang, dan partisipasi anak.'; ?></p>
    </div>
</section>


<div class="wave-separator" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,30 C360,60 720,0 1080,30 C1260,45 1380,40 1440,30 L1440,60 L0,60Z" fill="#f0f9ff" opacity=".6"/>
        <path d="M0,40 C320,10 640,55 960,30 C1200,12 1360,45 1440,35 L1440,60 L0,60Z" fill="#fdf2f8" opacity=".4"/>
    </svg>
</div>

<section class="why-section">
    <div class="home-container">
        <div class="home-section-heading">
            <p class="home-label"><?php echo !empty($beranda_why_title) ? htmlspecialchars($beranda_why_title->label) : 'TENTANG LAYAK ANAK'; ?></p>
            <h2><?php echo !empty($beranda_why_title) ? htmlspecialchars($beranda_why_title->judul) : 'Kenapa Lingkungan Layak Anak Itu Penting?'; ?></h2>
            <p><?php echo !empty($beranda_why_title) ? htmlspecialchars($beranda_why_title->deskripsi) : 'Setiap anak berhak mendapatkan lingkungan yang aman, nyaman, sehat, serta mendukung proses tumbuh dan berkembang.'; ?></p>
        </div>
        <div class="why-grid">
            <?php if (!empty($beranda_why_cards)): foreach ($beranda_why_cards as $wc): ?>
            <div class="why-card"><div class="why-icon"><i class="<?php echo htmlspecialchars(!empty($wc->icon) ? $wc->icon : 'fa-solid fa-circle-question'); ?>"></i></div><h3><?php echo htmlspecialchars($wc->judul); ?></h3><p><?php echo htmlspecialchars($wc->deskripsi); ?></p></div>
            <?php endforeach; else: ?>
            <div class="why-card"><div class="why-icon"><i class="fa-solid fa-shield-heart"></i></div><h3>Perlindungan Anak</h3><p>Menciptakan lingkungan yang aman dan melindungi anak dari kekerasan, diskriminasi, serta berbagai bentuk perlakuan yang merugikan.</p></div>
            <div class="why-card"><div class="why-icon"><i class="fa-solid fa-heart"></i></div><h3>Pemenuhan Hak</h3><p>Mendukung terpenuhinya hak anak untuk mendapatkan kehidupan, kesehatan, pendidikan, dan lingkungan yang layak.</p></div>
            <div class="why-card"><div class="why-icon"><i class="fa-solid fa-seedling"></i></div><h3>Tumbuh dan Berkembang</h3><p>Memberikan ruang bagi anak untuk tumbuh, belajar, bermain, berkarya, dan mengembangkan potensi dirinya.</p></div>
            <div class="why-card"><div class="why-icon"><i class="fa-solid fa-comments"></i></div><h3>Partisipasi Anak</h3><p>Memberikan kesempatan kepada anak untuk menyampaikan pendapat dan ikut berpartisipasi dalam lingkungan sekitarnya.</p></div>
<?php endif; ?>

<script>
(function () {
  var hero    = document.querySelector('.home-hero');
  var wrap    = document.querySelector('.hero-bg-slides');
  var track   = document.querySelector('.hero-bg-track');
  var slides  = track ? track.querySelectorAll('.hero-bg-slide') : [];
  if (!hero || !track || slides.length < 2) return;

  var index = 0, timer = null, dragging = false, startX = 0, startY = 0, delta = 0, locked = false;
  var DURATION = 5500, THRESHOLD = 60, ZOOM = 1.06;
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var zoomAnim = [];

  function zoom(i) {
    if (reduceMotion || !slides[i] || !slides[i].animate) return;
    zoomAnim.forEach(function (a) { a.cancel(); });
    zoomAnim = [];
    zoomAnim.push(slides[i].animate(
      [{ transform: 'scale(1)' }, { transform: 'scale(' + ZOOM + ')' }],
      { duration: DURATION, easing: 'linear', fill: 'forwards' }
    ));
  }

  function render(animate) {
    if (!animate) track.style.transition = 'none';
    track.style.transform = 'translate3d(' + (-index * 100) + '%,0,0)';
    if (!animate) {
      void track.offsetWidth;
      track.style.transition = '';
    }
    zoom(index);
  }

  function go(i) {
    index = (i + slides.length) % slides.length;
    render(true);
  }
  function next() { go(index + 1); }
  function prev() { go(index - 1); }

  function start() {
    if (timer) clearInterval(timer);
    timer = setInterval(next, DURATION);
  }
  function stop() {
    if (timer) clearInterval(timer);
    timer = null;
  }

  // swipe / drag
  function onDown(e) {
    if (e.target.closest('a, button')) return;
    dragging = true; locked = false;
    startX = e.clientX; startY = e.clientY; delta = 0;
    wrap.classList.add('is-dragging');
    stop();
  }
  function onMove(e) {
    if (!dragging) return;
    var dx = e.clientX - startX;
    var dy = e.clientY - startY;
    // kunci arah: cegah scroll vertikal digeser horizontal
    if (!locked) {
      if (Math.abs(dx) > 8 && Math.abs(dx) > Math.abs(dy)) locked = true;
      else if (Math.abs(dy) > 8) { dragging = false; wrap.classList.remove('is-dragging'); start(); return; }
    }
    if (!locked) return;
    var pct = (dx / wrap.offsetWidth) * 100;
    track.style.transform = 'translate3d(' + (-index * 100 + pct) + '%,0,0)';
    delta = dx;
  }
  function onUp() {
    if (!dragging) return;
    dragging = false;
    wrap.classList.remove('is-dragging');
    if (locked && Math.abs(delta) > THRESHOLD) {
      if (delta < 0) next(); else prev();
    } else {
      render(true);
    }
    start();
  }

  hero.addEventListener('pointerdown', onDown);
  hero.addEventListener('pointermove', onMove);
  hero.addEventListener('pointerup', onUp);
  hero.addEventListener('pointercancel', onUp);
  hero.addEventListener('pointerleave', onUp);

  // swipe untuk perangkat lama tanpa Pointer Events
  hero.addEventListener('touchstart', function (e) {
    if (e.target.closest('a, button')) return;
    startX = e.touches[0].clientX; startY = e.touches[0].clientY;
    dragging = true; locked = false; delta = 0;
    stop();
  }, { passive: true });
  hero.addEventListener('touchmove', function (e) {
    if (!dragging) return;
    var dx = e.touches[0].clientX - startX;
    var dy = e.touches[0].clientY - startY;
    if (!locked) {
      if (Math.abs(dx) > 8 && Math.abs(dx) > Math.abs(dy)) locked = true;
      else if (Math.abs(dy) > 8) { dragging = false; return; }
    }
    if (!locked) return;
    delta = dx;
    var pct = (dx / wrap.offsetWidth) * 100;
    track.style.transform = 'translate3d(' + (-index * 100 + pct) + '%,0,0)';
  }, { passive: true });
  hero.addEventListener('touchend', function () {
    if (!dragging) return;
    dragging = false;
    if (locked && Math.abs(delta) > THRESHOLD) {
      if (delta < 0) next(); else prev();
    } else {
      render(true);
    }
    start();
  });

  document.addEventListener('visibilitychange', function () {
    if (document.hidden) stop(); else start();
  });

  render(false);
  start();
})();
</script>

        </div>
    </div>
</section>

<div class="wave-separator" aria-hidden="true">
    <svg viewBox="0 0 1440 60" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,20 C480,55 960,5 1440,35 L1440,60 L0,60Z" fill="#eef2ff" opacity=".5"/>
        <path d="M0,45 C360,15 720,50 1080,25 C1260,15 1380,30 1440,25 L1440,60 L0,60Z" fill="#fff7ed" opacity=".4"/>
    </svg>
</div>

<?php if (!empty($berita_terbaru)): ?>
<section class="program home-news">
    <div class="home-container">
        <div class="home-section-heading center"><p class="home-label">INFORMASI</p><h2>Berita Terbaru</h2></div>
        <div class="program-container">
            <?php foreach ($berita_terbaru as $b): ?>
            <article class="program-card">
                <div class="program-image"><?php if (!empty($b->gambar)): ?><img src="<?php echo base_url('assets/uploads/berita/'.$b->gambar); ?>" alt="<?php echo htmlspecialchars($b->judul); ?>"><?php else: ?><span>BERITA</span><?php endif; ?></div>
                <div class="program-content"><span><?php echo tgl_indo($b->tanggal); ?></span><h3><?php echo htmlspecialchars($b->judul); ?></h3><p><?php echo htmlspecialchars(potong_teks($b->deskripsi,140)); ?></p><a href="<?php echo site_url('berita/'.$b->id); ?>">Selengkapnya →</a></div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
