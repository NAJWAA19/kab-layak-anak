<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="page-header ph-hak-anak">
    <p class="section-label">HAK ANAK</p>
    <h1>Pemenuhan Hak Anak</h1>
    <p>Informasi mengenai hak anak serta berbagai upaya dalam mendukung pemenuhan dan perlindungan anak.</p>
</section>
<?php $this->load->view('templates/page_slider', array('slider_id' => 'hakAnakSlider', 'slides' => array(
    array('icon' => 'fa-solid fa-heart', 'theme' => 'pink', 'title' => 'Hak Hidup & Tumbuh', 'desc' => 'Setiap anak berhak hidup, tumbuh, dan berkembang secara optimal.'),
    array('icon' => 'fa-solid fa-graduation-cap', 'theme' => 'green', 'title' => 'Hak Pendidikan & Kesehatan', 'desc' => 'Akses pendidikan berkualitas dan pelayanan kesehatan untuk semua anak.'),
    array('icon' => 'fa-solid fa-shield-heart', 'theme' => 'blue', 'title' => 'Hak Perlindungan & Partisipasi', 'desc' => 'Terlindungi dari kekerasan dan didengar pendapatnya dalam lingkungannya.'),
))); ?>
<section class="rights-intro">
    <div class="rights-intro-content">
        <p class="section-label">TENTANG HAK ANAK</p>
        <h2>Setiap Anak Berhak Tumbuh dan Berkembang</h2>
        <p>Anak memiliki hak untuk memperoleh kehidupan yang layak, tumbuh dan berkembang secara optimal, memperoleh pendidikan, mendapatkan pelayanan kesehatan, serta memperoleh perlindungan.</p>
        <p>Pemenuhan hak anak membutuhkan dukungan dari keluarga, masyarakat, pemerintah, dan berbagai pihak lainnya agar anak dapat tumbuh dalam lingkungan yang aman dan mendukung.</p>
    </div>
</section>

<?php if (!empty($kelembagaan) && !empty($kelembagaan->google_drive_kelembagaan)): ?>
<section class="kelembagaan-section">
    <div class="kelembagaan-wrapper">
        <div class="kelembagaan-card">
            <div class="kelembagaan-left">
                <div class="kelembagaan-icon">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="kelembagaan-text">
                    <h2>Kelembagaan</h2>
                    <p>Struktur kelembagaan Kabupaten Layak Anak Kabupaten Magelang.</p>
                </div>
            </div>
            <div class="kelembagaan-right">
                <a href="<?php echo htmlspecialchars($kelembagaan->google_drive_kelembagaan); ?>" target="_blank" rel="noopener" class="kelembagaan-btn">
                    <i class="fa-brands fa-google-drive"></i>
                    <span>Lihat Struktur Kelembagaan</span>
                    <i class="fa-solid fa-arrow-up-right-from-square kelembagaan-btn-arrow"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="rights-clusters">
    <div class="section-title"><p class="section-label">KLASTER</p><h2>Klaster Hak Anak</h2><p>Lima klaster utama yang menjadi bagian dari pemenuhan hak dan perlindungan anak.</p></div>
    <div class="rights-container">
        <?php if (!empty($klaster)): $i=1; foreach ($klaster as $k): ?>
        <a href="<?php echo site_url('hak-anak/'.$k->id); ?>" class="right-card cluster-<?php echo $i; ?>">
                <!-- Ilustrasi Dekoratif -->
            <div class="hc-decor">
                <?php if ($i == 1): ?>
                <!-- Klaster 1: Hidup & Tumbuh - Anak bermain + matahari + bunga -->
                <svg class="hc-deco-svg" viewBox="0 0 220 140" xmlns="http://www.w3.org/2000/svg">
                    <!-- Matahari -->
                    <circle cx="185" cy="22" r="18" fill="#fbbf24" opacity=".12"/>
                    <circle cx="185" cy="22" r="11" fill="#f59e0b" opacity=".1"/>
                    <g class="hc-sun-spin">
                        <line x1="185" y1="2" x2="185" y2="6" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".1"/>
                        <line x1="185" y1="38" x2="185" y2="42" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".1"/>
                        <line x1="165" y1="22" x2="169" y2="22" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".1"/>
                        <line x1="201" y1="22" x2="205" y2="22" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" opacity=".1"/>
                    </g>
                    <!-- Anak 1 (melompat) -->
                    <circle cx="40" cy="48" r="10" fill="#1976d2" opacity=".08"/>
                    <path d="M32 46 Q33 40 40 39 Q47 40 48 46 Q48 44 46 43 Q44 42 40 42 Q36 42 34 43 Q32 44 32 46Z" fill="#1976d2" opacity=".06"/>
                    <path d="M34 58 L30 82 Q40 86 50 82 L46 58Z" fill="#1976d2" opacity=".07"/>
                    <path d="M34 60 L24 52 Q22 51 21 53 L30 62Z" fill="#1976d2" opacity=".06"/>
                    <path d="M46 60 L56 52 Q58 51 59 53 L50 62Z" fill="#1976d2" opacity=".06"/>
                    <path d="M32 82 L24 100 Q23 102 25 103 L34 90Z" fill="#1976d2" opacity=".06"/>
                    <path d="M48 82 L56 100 Q57 102 55 103 L46 90Z" fill="#1976d2" opacity=".06"/>
                    <!-- Anak 2 (berdiri) -->
                    <circle cx="100" cy="52" r="9" fill="#42a5f5" opacity=".07"/>
                    <path d="M93 50 Q94 45 100 44 Q106 45 107 50 Q107 48 105 47.5 Q103 47 100 47 Q97 47 95 47.5 Q93 48 93 50Z" fill="#42a5f5" opacity=".05"/>
                    <path d="M95 60 L93 80 Q100 82 107 80 L105 60Z" fill="#42a5f5" opacity=".06"/>
                    <path d="M95 62 L88 56 Q86 55 85 57 L92 64Z" fill="#42a5f5" opacity=".05"/>
                    <path d="M105 62 L112 56 Q114 55 115 57 L108 64Z" fill="#42a5f5" opacity=".05"/>
                    <rect x="94" y="79" width="4" height="14" rx="2" fill="#42a5f5" opacity=".05"/>
                    <rect x="102" y="79" width="4" height="14" rx="2" fill="#42a5f5" opacity=".05"/>
                    <!-- Bunga -->
                    <circle cx="155" cy="95" r="7" fill="#f472b6" opacity=".08"/>
                    <circle cx="155" cy="95" r="3.5" fill="#fbbf24" opacity=".07"/>
                    <line x1="155" y1="102" x2="155" y2="125" stroke="#22c55e" stroke-width="2" opacity=".06"/>
                    <circle cx="175" cy="100" r="5" fill="#a78bfa" opacity=".07"/>
                    <circle cx="175" cy="100" r="2.5" fill="#fbbf24" opacity=".06"/>
                    <line x1="175" y1="105" x2="175" y2="122" stroke="#22c55e" stroke-width="1.5" opacity=".05"/>
                    <!-- Bintang -->
                    <path d="M200 65 L202 60 L204 65 L209 65 L205 68 L206 73 L202 70 L198 73 L199 68 L195 65Z" fill="#fbbf24" opacity=".07"/>
                    <path d="M15 20 L17 16 L19 20 L23 20 L20 22 L21 26 L17 24 L13 26 L14 22 L11 20Z" fill="#fbbf24" opacity=".06"/>
                </svg>
                <?php elseif ($i == 2): ?>
                <!-- Klaster 2: Pendidikan - Anak membaca + buku + tas -->
                <svg class="hc-deco-svg" viewBox="0 0 220 140" xmlns="http://www.w3.org/2000/svg">
                    <!-- Anak membaca -->
                    <circle cx="45" cy="45" r="10" fill="#d97706" opacity=".08"/>
                    <path d="M37 43 Q38 37 45 36 Q52 37 53 43 Q53 41 51 40.5 Q49 40 45 40 Q41 40 39 40.5 Q37 41 37 43Z" fill="#d97706" opacity=".06"/>
                    <path d="M39 55 L37 75 Q45 77 53 75 L51 55Z" fill="#d97706" opacity=".07"/>
                    <path d="M39 57 L30 50 Q28 49 27 51 L36 60Z" fill="#d97706" opacity=".06"/>
                    <path d="M51 57 L60 50 Q62 49 63 51 L54 60Z" fill="#d97706" opacity=".06"/>
                    <!-- Buku di tangan -->
                    <rect x="26" y="58" width="16" height="12" rx="1.5" fill="#f59e0b" opacity=".08" transform="rotate(-10 34 64)"/>
                    <rect x="28" y="60" width="12" height="8" rx="1" fill="#fbbf24" opacity=".06" transform="rotate(-10 34 64)"/>
                    <rect x="52" y="56" width="14" height="10" rx="1.5" fill="#f59e0b" opacity=".07" transform="rotate(8 59 61)"/>
                    <!-- Buku bertumpuk -->
                    <rect x="155" y="85" width="35" height="8" rx="2" fill="#d97706" opacity=".07"/>
                    <rect x="158" y="77" width="30" height="8" rx="2" fill="#f59e0b" opacity=".06"/>
                    <rect x="153" y="69" width="38" height="8" rx="2" fill="#fbbf24" opacity=".05"/>
                    <!-- Pensil -->
                    <rect x="195" y="30" width="4" height="28" rx="1" fill="#f59e0b" opacity=".07" transform="rotate(15 197 44)"/>
                    <polygon points="195,58 197,66 199,58" fill="#fbbf24" opacity=".06" transform="rotate(15 197 62)"/>
                    <!-- Bintang -->
                    <path d="M30 15 L32 10 L34 15 L39 15 L35 18 L36 23 L32 20 L28 23 L29 18 L25 15Z" fill="#fbbf24" opacity=".06"/>
                    <path d="M180 15 L182 11 L184 15 L188 15 L185 17 L186 21 L182 19 L178 21 L179 17 L176 15Z" fill="#fbbf24" opacity=".05"/>
                    <!-- Anak 2 (kecil) -->
                    <circle cx="120" cy="55" r="7" fill="#d97706" opacity=".06"/>
                    <path d="M115 53 Q116 49 120 48 Q124 49 125 53Z" fill="#d97706" opacity=".05"/>
                    <path d="M117 60 L116 72 Q120 73 124 72 L123 60Z" fill="#d97706" opacity=".05"/>
                    <rect x="116" y="71" width="3" height="10" rx="1.5" fill="#d97706" opacity=".04"/>
                    <rect x="121" y="71" width="3" height="10" rx="1.5" fill="#d97706" opacity=".04"/>
                </svg>
                <?php elseif ($i == 3): ?>
                <!-- Klaster 3: Kesehatan - Dokter + makanan sehat + olahraga -->
                <svg class="hc-deco-svg" viewBox="0 0 220 140" xmlns="http://www.w3.org/2000/svg">
                    <!-- Anak berolahraga (lari) -->
                    <circle cx="40" cy="42" r="9" fill="#16a34a" opacity=".08"/>
                    <path d="M33 40 Q34 35 40 34 Q46 35 47 40 Q47 38 45 37.5 Q43 37 40 37 Q37 37 35 37.5 Q33 38 33 40Z" fill="#16a34a" opacity=".06"/>
                    <path d="M35 50 L33 68 Q40 70 47 68 L45 50Z" fill="#16a34a" opacity=".07"/>
                    <path d="M35 52 L26 46 Q24 45 23 47 L32 54Z" fill="#16a34a" opacity=".06"/>
                    <path d="M45 52 L54 44 Q56 43 57 45 L48 54Z" fill="#16a34a" opacity=".06"/>
                    <path d="M33 68 L24 84 Q23 86 25 87 L34 76Z" fill="#16a34a" opacity=".06"/>
                    <path d="M47 68 L56 82 Q57 84 55 85 L46 76Z" fill="#16a34a" opacity=".06"/>
                    <!-- Apel -->
                    <circle cx="170" cy="30" r="10" fill="#ef4444" opacity=".07"/>
                    <line x1="170" y1="20" x2="172" y2="15" stroke="#22c55e" stroke-width="1.5" opacity=".06"/>
                    <ellipse cx="173" cy="16" rx="3" ry="2" fill="#22c55e" opacity=".05"/>
                    <!-- Wortel -->
                    <path d="M195 50 L200 80 Q200 84 196 84 Q192 84 192 80Z" fill="#fb923c" opacity=".06"/>
                    <path d="M193 50 Q196 42 199 50" fill="#22c55e" opacity=".05"/>
                    <!-- Kardus obat -->
                    <rect x="150" y="85" width="24" height="18" rx="3" fill="#16a34a" opacity=".06"/>
                    <rect x="158" y="89" width="8" height="10" rx="1" fill="#fff" opacity=".04"/>
                    <rect x="154" y="93" width="16" height="2" rx="1" fill="#fff" opacity=".03"/>
                    <!-- Stetoskop -->
                    <circle cx="100" cy="20" r="8" fill="none" stroke="#16a34a" stroke-width="2" opacity=".06"/>
                    <path d="M92 20 Q80 20 80 35" fill="none" stroke="#16a34a" stroke-width="2" opacity=".05"/>
                    <circle cx="80" cy="35" r="4" fill="#16a34a" opacity=".05"/>
                    <!-- Bintang -->
                    <path d="M25 18 L27 13 L29 18 L34 18 L30 21 L31 26 L27 23 L23 26 L24 21 L20 18Z" fill="#fbbf24" opacity=".06"/>
                </svg>
                <?php elseif ($i == 4): ?>
                <!-- Klaster 4: Perlindungan - Rumah + perisai + anak aman -->
                <svg class="hc-deco-svg" viewBox="0 0 220 140" xmlns="http://www.w3.org/2000/svg">
                    <!-- Rumah -->
                    <rect x="155" y="55" width="40" height="30" rx="2" fill="#7c3aed" opacity=".06"/>
                    <polygon points="155,55 175,35 195,55" fill="#8b5cf6" opacity=".06"/>
                    <rect x="170" y="65" width="12" height="20" rx="1" fill="#a78bfa" opacity=".05"/>
                    <rect x="158" y="62" width="8" height="8" rx="1" fill="#c4b5fd" opacity=".05"/>
                    <rect x="184" y="62" width="8" height="8" rx="1" fill="#c4b5fd" opacity=".05"/>
                    <!-- Perisai -->
                    <path d="M40 25 L55 32 L55 52 Q55 65 40 72 Q25 65 25 52 L25 32Z" fill="#7c3aed" opacity=".07"/>
                    <path d="M40 32 L50 37 L50 48 Q50 56 40 62 Q30 56 30 48 L30 37Z" fill="#a78bfa" opacity=".05"/>
                    <!-- Anak tersenyum -->
                    <circle cx="40" cy="45" r="6" fill="#c4b5fd" opacity=".06"/>
                    <path d="M37 46 Q40 49 43 46" fill="none" stroke="#7c3aed" stroke-width="1" stroke-linecap="round" opacity=".05"/>
                    <!-- Bintang -->
                    <path d="M200 20 L202 15 L204 20 L209 20 L205 23 L206 28 L202 25 L198 28 L199 23 L195 20Z" fill="#fbbf24" opacity=".06"/>
                    <path d="M15 80 L17 76 L19 80 L23 80 L20 82 L21 86 L17 84 L13 86 L14 82 L11 80Z" fill="#fbbf24" opacity=".05"/>
                    <!-- Love -->
                    <path d="M100 95 Q105 85 110 95 Q115 85 120 95 Q110 110 100 95Z" fill="#ec4899" opacity=".05"/>
                </svg>
                <?php elseif ($i == 5): ?>
                <!-- Klaster 5: Partisipasi - Anak berkumpul + mic + bintang -->
                <svg class="hc-deco-svg" viewBox="0 0 220 140" xmlns="http://www.w3.org/2000/svg">
                    <!-- Anak 1 (berbicara) -->
                    <circle cx="35" cy="45" r="9" fill="#ec4899" opacity=".08"/>
                    <path d="M28 43 Q29 38 35 37 Q41 38 42 43 Q42 41 40 40.5 Q38 40 35 40 Q32 40 30 40.5 Q28 41 28 43Z" fill="#ec4899" opacity=".06"/>
                    <path d="M30 55 L28 75 Q35 77 42 75 L40 55Z" fill="#ec4899" opacity=".07"/>
                    <path d="M30 57 L22 50 Q20 49 19 51 L28 60Z" fill="#ec4899" opacity=".06"/>
                    <path d="M40 57 L48 50 Q50 49 51 51 L42 60Z" fill="#ec4899" opacity=".06"/>
                    <!-- Mic -->
                    <rect x="48" y="48" width="4" height="14" rx="2" fill="#f472b6" opacity=".07"/>
                    <circle cx="50" cy="45" r="5" fill="#f472b6" opacity=".06"/>
                    <path d="M45 50 Q45 42 50 42 Q55 42 55 50" fill="none" stroke="#f472b6" stroke-width="1.5" opacity=".05"/>
                    <!-- Anak 2 (mendengarkan) -->
                    <circle cx="90" cy="48" r="8" fill="#f472b6" opacity=".07"/>
                    <path d="M84 46 Q85 42 90 41 Q95 42 96 46Z" fill="#f472b6" opacity=".05"/>
                    <path d="M86 56 L85 72 Q90 73 95 72 L94 56Z" fill="#f472b6" opacity=".06"/>
                    <rect x="86" y="71" width="3.5" height="11" rx="1.7" fill="#f472b6" opacity=".05"/>
                    <rect x="91" y="71" width="3.5" height="11" rx="1.7" fill="#f472b6" opacity=".05"/>
                    <!-- Anak 3 (angkat tangan) -->
                    <circle cx="140" cy="42" r="8" fill="#ec4899" opacity=".07"/>
                    <path d="M134 40 Q135 36 140 35 Q145 36 146 40Z" fill="#ec4899" opacity=".05"/>
                    <path d="M136 50 L135 68 Q140 69 145 68 L144 50Z" fill="#ec4899" opacity=".06"/>
                    <path d="M136 52 L128 44 Q126 43 125 45 L134 54Z" fill="#ec4899" opacity=".05"/>
                    <path d="M144 52 L152 40 Q154 38 155 40 L146 54Z" fill="#ec4899" opacity=".06"/>
                    <!-- Tangan di atas -->
                    <line x1="152" y1="40" x2="155" y2="30" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" opacity=".05"/>
                    <circle cx="155" cy="28" r="3" fill="#ec4899" opacity=".04"/>
                    <!-- Bintang partisipasi -->
                    <path d="M190 25 L192 20 L194 25 L199 25 L195 28 L196 33 L192 30 L188 33 L189 28 L185 25Z" fill="#fbbf24" opacity=".06"/>
                    <path d="M60 100 L62 96 L64 100 L68 100 L65 102 L66 106 L62 104 L58 106 L59 102 L56 100Z" fill="#fbbf24" opacity=".05"/>
                    <!-- Tanganï¿½ï¿½mplimen -->
                    <circle cx="200" cy="90" r="6" fill="#f472b6" opacity=".05"/>
                </svg>
                <?php endif; ?>
            </div>
            <div class="right-card-top"><span class="right-number"><?php echo htmlspecialchars($k->nomor); ?></span><span class="right-icon"><?php echo htmlspecialchars($k->ikon); ?></span></div>
            <h3><?php echo htmlspecialchars($k->judul); ?></h3>
            <p><?php echo htmlspecialchars($k->deskripsi); ?></p>
            <span class="cluster-link">Selengkapnya <span class="cluster-arrow">→</span></span>
        </a>
        <?php $i++; endforeach; else: ?><p>Data klaster belum tersedia.</p><?php endif; ?>
    </div>
</section>
