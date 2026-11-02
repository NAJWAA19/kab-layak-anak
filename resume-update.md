# Resume Update — Website Kabupaten Layak Anak Magelang

## 1. Ringkasan Eksekutif
- **Tujuan**: Modernisasi tampilan agar tidak "flat", menambahkan animasi/slideshow, konsisten di semua halaman
- **Cakupan**: Hero beranda, header, footer, 6 halaman inner, sistem slider reusable
- **Pendekatan**: CSS-only animasi, vanilla JS (IntersectionObserver), partial CI3 view, tanpa library tambahan
- **Status**: Rollback badge ke state pre-redesign (2026-09-14)

## 2. Changelog per Komit Logika

| Komit Logika | Tanggal | File Terdampak | Deskripsi Singkat |
|--------------|---------|----------------|-------------------|
| `feat: hero-slideshow-beranda` | 2026-09-14 | `home/index.php`, `hero-anim.css` | Ganti emoji 🧒👧 → 3 ilustrasi SVG animate + auto-slide 4.5s |
| `feat: header-gradient-nav` | 2026-09-14 | `public_header.php`, `hero-anim.css` | Header gradient biru-ungu, nav pill, decorative blob, rainbow bar |
| `feat: footer-glassmorphism` | 2026-09-14 | `public_footer.php`, `hero-anim.css` | Footer gradient navy-biru-ungu, glass cards, alamat Dinsos, stats |
| `feat: css-animasi-modern` | 2026-09-14 | `hero-anim.css` (baru) | blobFloat, slideIn, artBob, floatY, pulse, reveal, reduced-motion |
| `feat: partial-page-slider` | 2026-09-14 | `templates/page_slider.php` (baru) | Partial reusable: icon + theme + title + desc → slider 3 slide |
| `feat: inner-pages-slider` | 2026-09-14 | 6 file view | Pasang slider di Profil, Hak Anak, Berita, Galeri, Paparan, Kontak |
| `feat: js-generic-slider-reveal` | 2026-09-14 | `public_footer.php` | initSlider() generic, swipe touch, hover pause, scroll-reveal global |
| `fix: badge-berkembang-position` | 2026-09-14 | `hero-anim.css` | Pindah `top:60%` → `top:62px` biar gak nutupi caption |
| `refactor: badge-redesign` | 2026-09-14 | `home/index.php`, `hero-anim.css` | **DI-ROLLBACK** — glass pill, dual-line text, gradient icon bg |
| `rollback: badge-pre-redesign` | 2026-09-14 | `home/index.php`, `hero-anim.css` | Kembalikan badge ke glass pill 1 baris + float stagger |

## 3. Before / After Visual Description

### Hero Beranda
| Aspek | Before (Awal) | After (Sekarang - Post Rollback) |
|-------|---------------|----------------------------------|
| Visual kanan | Lingkaran biru + emoji `🧒 👧` statis | 3 ilustrasi SVG anak (Aman, Belajar, Partisipasi) + bob animation |
| Interaksi | Tidak ada | Auto-slide 4.5s, panah kiri/kanan, dots, swipe HP, pause hover |
| Background | Gradient biru polos | Gradient + 3 blob blur bergerak (blobFloat 9s) |
| Badge kecil | 3 kotak absolute pos statis | 3 glass pill badge (Aman/Peduli/Berkembang) + floatY stagger |
| Teks hero | Label putar, heading polos | Label + pulse dot, heading gradient text |

### Header
| Aspek | Before | After |
|-------|--------|-------|
| Background | Putih + border-bottom abu | Gradient `#0d47a1 → #1976d2 → #7b1fa2` + shadow + blob dekor |
| Nav link | Teks abu, hover biru | Pill putih transparan, teks biru muda, hover glass, active putih solid |
| Logo | Gambar polos | Lingkaran putih + shadow |

### Footer
| Aspek | Before | After |
|-------|--------|-------|
| Background | Putih + border-top abu | Gradient `#0b2a5b → #1558b0 → #6a1b9a` + radial glow + rainbow top bar |
| Kolom 1 | Statistik pengunjung emoji | Logo Dinsos+KLA + judul + deskripsi alamat + 2 glass stat cards |
| Link navigasi | Teks abu polos | Chevron icon + hover slide X + warna kuning |
| Sosmed | Emoji + teks | Tombol glass pill: IG (pink), YT (merah), Telpon (biru) + copy |
| Bottom bar | Center copyright | Flex 2 sisi: copyright + nama dinas |

### 6 Halaman Inner (Profil, Hak Anak, Berita, Galeri, Paparan, Kontak)
| Aspek | Before | After |
|-------|--------|-------|
| Header halaman | `page-header` polos biru muda | Sama + **slider banner** di bawahnya (3 card icon+theme) |
| Slider banner | Tidak ada | Card gradient (blue/green/pink) + ikon lingkaran putih + teks 2 baris |
| Animasi masuk | Tidak ada | Semua kartu fade-up via IntersectionObserver |

### Animasi Global (CSS `hero-anim.css`)
| Animasi | Digunakan Di |
|---------|--------------|
| `blobFloat` | Hero bg decor, Header blob |
| `slideIn` | Hero slide, Page slide |
| `artBob` | SVG ilustrasi hero, Page art icon |
| `floatY` | 3 badge kecil (stagger delay) |
| `pulse` | Live indicator dot di label hero |
| `reveal` + `visible` | Semua section card via JS IntersectionObserver |
| `prefers-reduced-motion` | Matikan semua animasi untuk aksesibilitas |

## 4. File Baru / Dimodifikasi

### File Baru
- `assets/css/hero-anim.css` — Semua animasi + style slider + header + footer + badge
- `application/views/templates/page_slider.php` — Partial reusable slider

### File Dimodifikasi
- `application/views/home/index.php` — Hero rewrite lengkap (badge di-rollback)
- `application/views/templates/public_header.php` — Load hero-anim.css
- `application/views/templates/public_footer.php` — Structure baru + JS generic
- `application/views/profil/index.php` — + slider
- `application/views/hak_anak/index.php` — + slider
- `application/views/berita/index.php` — + slider
- `application/views/galeri/index.php` — + slider
- `application/views/paparan/index.php` — + slider
- `application/views/kontak/index.php` — + slider

## 5. Responsif & Aksesibilitas
- Breakpoint: 760px (mobile), 800px (tablet), 1000px (desktop)
- `prefers-reduced-motion: reduce` → matikan semua animasi
- ARIA label di panah, dots, slider
- Touch swipe support (40px threshold)
- Semantic HTML: `<section>`, `<button>`, `<footer>`, `role="tablist"`

## 6. Cara Verifikasi Manual

| Halaman | URL | Cek |
|---------|-----|-----|
| Beranda | `/` | Hero slide 3 ilustrasi, badge float 1-baris, header gradient, footer glass |
| Profil | `/profil` | Page slider (Tentang/Visi/Tujuan) |
| Hak Anak | `/hak-anak` | Page slider (Hidup/Pendidikan/Perlindungan) |
| Berita | `/berita` | Page slider (Berita/Kegiatan/Pengumuman) |
| Galeri | `/galeri` | Page slider (Dokumentasi/Ruang/Momen) |
| Paparan | `/paparan` | Page slider (Materi/Baca/Unduh) |
| Kontak | `/kontak` | Page slider (Alamat/Jam/Pesan) |
