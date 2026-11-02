<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Partial slideshow banner untuk halaman dalam.
 * Variabel yang diharapkan:
 *   $slider_id : string unik, mis. 'profilSlider'
 *   $slides    : array berisi ['icon'=>'fa-solid fa-...', 'theme'=>'blue|green|pink', 'title'=>'...', 'desc'=>'...']
 */
$slider_id = isset($slider_id) ? $slider_id : 'pageSlider';
$slides = isset($slides) && is_array($slides) ? $slides : array();
if (empty($slides)) return;
?>
<section class="page-slider-wrap">
    <div class="page-slider js-slider" id="<?php echo htmlspecialchars($slider_id); ?>">
        <?php foreach ($slides as $i => $s): $theme = isset($s['theme']) ? $s['theme'] : 'blue'; ?>
        <div class="page-slide<?php echo $i === 0 ? ' active' : ''; ?>">
            <!-- Ilustrasi Kiri -->
            <div class="slide-deco slide-deco-left">
                <?php if ($i == 0): ?>
                <svg viewBox="0 0 100 160" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="32" r="14" fill="#ec4899" opacity=".5"/>
                    <path d="M38 30 Q40 20 50 18 Q60 20 62 30 Q62 27 59 26 Q56 25 50 25 Q44 25 41 26 Q38 27 38 30Z" fill="#db2777" opacity=".4"/>
                    <circle cx="46" cy="28" r="1.8" fill="#fff" opacity=".7"/>
                    <circle cx="54" cy="28" r="1.8" fill="#fff" opacity=".7"/>
                    <path d="M46 34 Q50 38 54 34" fill="none" stroke="#fff" stroke-width="1.3" stroke-linecap="round" opacity=".6"/>
                    <path d="M42 44 L39 68 Q50 72 61 68 L58 44Z" fill="#ec4899" opacity=".4"/>
                    <path d="M42 47 L30 38" stroke="#ec4899" stroke-width="4" stroke-linecap="round" opacity=".35"/>
                    <path d="M58 47 L70 38" stroke="#ec4899" stroke-width="4" stroke-linecap="round" opacity=".35"/>
                    <path d="M39 68 L32 90" stroke="#ec4899" stroke-width="4" stroke-linecap="round" opacity=".35"/>
                    <path d="M61 68 L68 90" stroke="#ec4899" stroke-width="4" stroke-linecap="round" opacity=".35"/>
                    <circle cx="25" cy="110" r="7" fill="#f472b6" opacity=".35"/>
                    <circle cx="25" cy="110" r="3.5" fill="#fbbf24" opacity=".3"/>
                    <line x1="25" y1="117" x2="25" y2="135" stroke="#22c55e" stroke-width="2" opacity=".3"/>
                    <path d="M75 15 L77 10 L79 15 L84 15 L80 18 L81 23 L77 20 L73 23 L74 18 L70 15Z" fill="#fbbf24" opacity=".35"/>
                    <path d="M15 65 L17 61 L19 65 L23 65 L20 67 L21 71 L17 69 L13 71 L14 67 L11 65Z" fill="#fbbf24" opacity=".3"/>
                </svg>
                <?php elseif ($i == 1): ?>
                <svg viewBox="0 0 100 160" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="34" r="13" fill="#16a34a" opacity=".45"/>
                    <path d="M39 32 Q41 24 50 22 Q59 24 61 32 Q61 29 58 28 Q55 27 50 27 Q45 27 42 28 Q39 29 39 32Z" fill="#15803d" opacity=".38"/>
                    <circle cx="46" cy="30" r="1.5" fill="#fff" opacity=".7"/>
                    <circle cx="54" cy="30" r="1.5" fill="#fff" opacity=".7"/>
                    <path d="M46 36 Q50 39 54 36" fill="none" stroke="#fff" stroke-width="1.3" stroke-linecap="round" opacity=".6"/>
                    <path d="M42 44 L40 66 Q50 68 60 66 L58 44Z" fill="#16a34a" opacity=".38"/>
                    <path d="M42 47 L32 40" stroke="#16a34a" stroke-width="4" stroke-linecap="round" opacity=".34"/>
                    <path d="M58 47 L68 40" stroke="#16a34a" stroke-width="4" stroke-linecap="round" opacity=".34"/>
                    <rect x="24" y="42" width="14" height="10" rx="2" fill="#f59e0b" opacity=".35" transform="rotate(-8 31 47)"/>
                    <rect x="26" y="44" width="10" height="6" rx="1" fill="#fbbf24" opacity=".3" transform="rotate(-8 31 47)"/>
                    <rect x="41" y="65" width="3.5" height="14" rx="1.7" fill="#16a34a" opacity=".34"/>
                    <rect x="56" y="65" width="3.5" height="14" rx="1.7" fill="#16a34a" opacity=".34"/>
                    <rect x="72" y="100" width="20" height="7" rx="2" fill="#16a34a" opacity=".25"/>
                    <rect x="75" y="93" width="15" height="7" rx="2" fill="#22c55e" opacity=".22"/>
                    <rect x="70" y="86" width="22" height="7" rx="2" fill="#4ade80" opacity=".2"/>
                    <path d="M18 18 L20 13 L22 18 L27 18 L23 21 L24 26 L20 23 L16 26 L17 21 L13 18Z" fill="#fbbf24" opacity=".3"/>
                </svg>
                <?php else: ?>
                <svg viewBox="0 0 100 160" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="38" cy="32" r="12" fill="#1976d2" opacity=".45"/>
                    <path d="M28 30 Q30 23 38 21 Q46 23 48 30 Q48 28 46 27 Q43 26 38 26 Q33 26 30 27 Q28 28 28 30Z" fill="#1565c0" opacity=".38"/>
                    <circle cx="35" cy="28" r="1.3" fill="#fff" opacity=".7"/>
                    <circle cx="41" cy="28" r="1.3" fill="#fff" opacity=".7"/>
                    <path d="M35 34 Q38 37 41 34" fill="none" stroke="#fff" stroke-width="1.2" stroke-linecap="round" opacity=".6"/>
                    <path d="M31 42 L30 62 Q38 64 46 62 L45 42Z" fill="#1976d2" opacity=".38"/>
                    <path d="M31 44 L22 38" stroke="#1976d2" stroke-width="3.5" stroke-linecap="round" opacity=".34"/>
                    <path d="M45 44 L54 38" stroke="#1976d2" stroke-width="3.5" stroke-linecap="round" opacity=".34"/>
                    <rect x="30" y="61" width="3" height="12" rx="1.5" fill="#1976d2" opacity=".34"/>
                    <rect x="43" y="61" width="3" height="12" rx="1.5" fill="#1976d2" opacity=".34"/>
                    <circle cx="72" cy="38" r="10" fill="#7c3aed" opacity=".4"/>
                    <path d="M64 36 Q66 30 72 28 Q78 30 80 36 Q80 34 78 33 Q75 32 72 32 Q69 32 66 33 Q64 34 64 36Z" fill="#6d28d9" opacity=".34"/>
                    <circle cx="69" cy="34" r="1.2" fill="#fff" opacity=".7"/>
                    <circle cx="75" cy="34" r="1.2" fill="#fff" opacity=".7"/>
                    <path d="M69 40 Q72 43 75 40" fill="none" stroke="#fff" stroke-width="1.1" stroke-linecap="round" opacity=".55"/>
                    <path d="M66 48 L65 66 Q72 68 79 66 L78 48Z" fill="#7c3aed" opacity=".34"/>
                    <path d="M25 100 L38 108 L50 100 L50 118 Q38 126 25 118Z" fill="#1976d2" opacity=".2"/>
                    <path d="M30 104 L38 110 L46 104 L46 116 Q38 122 30 116Z" fill="#60a5fa" opacity=".16"/>
                    <path d="M12 75 L14 71 L16 75 L20 75 L17 77 L18 81 L14 79 L10 81 L11 77 L8 75Z" fill="#fbbf24" opacity=".3"/>
                </svg>
                <?php endif; ?>
            </div>

            <div class="page-art art-<?php echo htmlspecialchars($theme); ?>">
                <div class="page-art-icon"><i class="<?php echo htmlspecialchars(isset($s['icon']) ? $s['icon'] : 'fa-solid fa-star'); ?>"></i></div>
                <div class="page-art-text"><strong><?php echo htmlspecialchars($s['title']); ?></strong><span><?php echo htmlspecialchars($s['desc']); ?></span></div>
            </div>

            <!-- Ilustrasi Kanan -->
            <div class="slide-deco slide-deco-right">
                <?php if ($i == 0): ?>
                <svg viewBox="0 0 100 160" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="34" r="13" fill="#f59e0b" opacity=".45"/>
                    <path d="M39 32 Q41 24 50 22 Q59 24 61 32 Q61 29 58 28 Q55 27 50 27 Q45 27 42 28 Q39 29 39 32Z" fill="#d97706" opacity=".38"/>
                    <circle cx="46" cy="30" r="1.5" fill="#fff" opacity=".7"/>
                    <circle cx="54" cy="30" r="1.5" fill="#fff" opacity=".7"/>
                    <path d="M46 36 Q50 39 54 36" fill="none" stroke="#fff" stroke-width="1.3" stroke-linecap="round" opacity=".6"/>
                    <path d="M42 44 L40 66 Q50 68 60 66 L58 44Z" fill="#f59e0b" opacity=".38"/>
                    <path d="M42 47 L32 40" stroke="#f59e0b" stroke-width="4" stroke-linecap="round" opacity=".34"/>
                    <path d="M58 47 L68 40" stroke="#f59e0b" stroke-width="4" stroke-linecap="round" opacity=".34"/>
                    <rect x="41" y="65" width="3.5" height="14" rx="1.7" fill="#f59e0b" opacity=".34"/>
                    <rect x="56" y="65" width="3.5" height="14" rx="1.7" fill="#f59e0b" opacity=".34"/>
                    <path d="M30 95 Q37 83 44 95 Q51 83 58 95 Q44 110 30 95Z" fill="#ec4899" opacity=".25"/>
                    <circle cx="78" cy="105" r="6" fill="#a78bfa" opacity=".3"/>
                    <circle cx="78" cy="105" r="3" fill="#fbbf24" opacity=".25"/>
                    <line x1="78" y1="111" x2="78" y2="128" stroke="#22c55e" stroke-width="1.8" opacity=".25"/>
                    <path d="M18 18 L20 13 L22 18 L27 18 L23 21 L24 26 L20 23 L16 26 L17 21 L13 18Z" fill="#fbbf24" opacity=".35"/>
                    <path d="M80 60 L82 56 L84 60 L88 60 L85 62 L86 66 L82 64 L78 66 L79 62 L76 60Z" fill="#fbbf24" opacity=".3"/>
                </svg>
                <?php elseif ($i == 1): ?>
                <svg viewBox="0 0 100 160" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="34" r="13" fill="#ef4444" opacity=".4"/>
                    <path d="M39 32 Q41 24 50 22 Q59 24 61 32 Q61 29 58 28 Q55 27 50 27 Q45 27 42 28 Q39 29 39 32Z" fill="#dc2626" opacity=".34"/>
                    <circle cx="46" cy="30" r="1.5" fill="#fff" opacity=".7"/>
                    <circle cx="54" cy="30" r="1.5" fill="#fff" opacity=".7"/>
                    <path d="M46 36 Q50 39 54 36" fill="none" stroke="#fff" stroke-width="1.3" stroke-linecap="round" opacity=".6"/>
                    <path d="M42 44 L40 66 Q50 68 60 66 L58 44Z" fill="#ef4444" opacity=".34"/>
                    <path d="M42 47 L32 38" stroke="#ef4444" stroke-width="4" stroke-linecap="round" opacity=".3"/>
                    <path d="M58 47 L68 38" stroke="#ef4444" stroke-width="4" stroke-linecap="round" opacity=".3"/>
                    <rect x="41" y="65" width="3.5" height="14" rx="1.7" fill="#ef4444" opacity=".3"/>
                    <rect x="56" y="65" width="3.5" height="14" rx="1.7" fill="#ef4444" opacity=".3"/>
                    <circle cx="25" cy="95" r="9" fill="#ef4444" opacity=".25"/>
                    <line x1="25" y1="86" x2="27" y2="81" stroke="#22c55e" stroke-width="1.8" opacity=".22"/>
                    <ellipse cx="28" cy="82" rx="3.5" ry="2.5" fill="#22c55e" opacity=".2"/>
                    <path d="M70 90 Q73 82 76 90" fill="#22c55e" opacity=".2"/>
                    <circle cx="78" cy="42" r="7" fill="none" stroke="#16a34a" stroke-width="2" opacity=".25"/>
                    <path d="M71 42 Q60 42 60 55" fill="none" stroke="#16a34a" stroke-width="2" opacity=".22"/>
                    <circle cx="60" cy="55" r="4" fill="#16a34a" opacity=".22"/>
                    <path d="M12 22 L14 17 L16 22 L21 22 L17 25 L18 30 L14 28 L10 30 L11 25 L8 22Z" fill="#fbbf24" opacity=".3"/>
                </svg>
                <?php else: ?>
                <svg viewBox="0 0 100 160" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="32" r="13" fill="#a78bfa" opacity=".45"/>
                    <path d="M39 30 Q41 22 50 20 Q59 22 61 30 Q61 27 58 26 Q55 25 50 25 Q45 25 42 26 Q39 27 39 30Z" fill="#7c3aed" opacity=".38"/>
                    <circle cx="46" cy="28" r="1.5" fill="#fff" opacity=".7"/>
                    <circle cx="54" cy="28" r="1.5" fill="#fff" opacity=".7"/>
                    <path d="M46 34 Q50 37 54 34" fill="none" stroke="#fff" stroke-width="1.3" stroke-linecap="round" opacity=".6"/>
                    <path d="M42 42 L40 64 Q50 66 60 64 L58 42Z" fill="#a78bfa" opacity=".38"/>
                    <path d="M42 45 L32 36" stroke="#a78bfa" stroke-width="4" stroke-linecap="round" opacity=".34"/>
                    <path d="M58 45 L68 32" stroke="#a78bfa" stroke-width="4" stroke-linecap="round" opacity=".34"/>
                    <line x1="68" y1="32" x2="72" y2="22" stroke="#a78bfa" stroke-width="3" stroke-linecap="round" opacity=".3"/>
                    <circle cx="72" cy="20" r="3.5" fill="#a78bfa" opacity=".25"/>
                    <rect x="41" y="63" width="3.5" height="14" rx="1.7" fill="#a78bfa" opacity=".34"/>
                    <rect x="56" y="63" width="3.5" height="14" rx="1.7" fill="#a78bfa" opacity=".34"/>
                    <rect x="70" y="40" width="3.5" height="12" rx="1.7" fill="#f472b6" opacity=".25"/>
                    <circle cx="72" cy="37" r="4.5" fill="#f472b6" opacity=".22"/>
                    <path d="M66 42 Q66 35 72 35 Q78 35 78 42" fill="none" stroke="#f472b6" stroke-width="1.5" opacity=".2"/>
                    <path d="M30 100 Q37 88 44 100 Q51 88 58 100 Q44 115 30 100Z" fill="#ec4899" opacity=".22"/>
                    <path d="M15 70 L17 66 L19 70 L23 70 L20 72 L21 76 L17 74 L13 76 L14 72 L11 70Z" fill="#fbbf24" opacity=".3"/>
                    <path d="M80 85 L82 81 L84 85 L88 85 L85 87 L86 91 L82 89 L78 91 L79 87 L76 85Z" fill="#fbbf24" opacity=".25"/>
                </svg>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
        <button type="button" class="hero-arrow prev" data-prev aria-label="Sebelumnya"><i class="fa-solid fa-chevron-left"></i></button>
        <button type="button" class="hero-arrow next" data-next aria-label="Berikutnya"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="hero-dots" data-dots role="tablist" aria-label="Pilih slide"></div>
    </div>
</section>
