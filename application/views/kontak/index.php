<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="page-header ph-kontak">
    <p class="section-label">HUBUNGI KAMI</p>
    <h1>Kontak</h1>
    <p>Silakan menghubungi kami untuk mendapatkan informasi mengenai program dan kegiatan Layak Anak.</p>
</section>
<?php $this->load->view('templates/page_slider', array('slider_id' => 'kontakSlider', 'slides' => array(
    array('icon' => 'fa-solid fa-location-dot', 'theme' => 'blue', 'title' => 'Kunjungi Kami', 'desc' => 'Jl. Letnan Tukiyat No.40, Mertoyudan, Kabupaten Magelang.'),
    array('icon' => 'fa-solid fa-clock', 'theme' => 'green', 'title' => 'Jam Pelayanan', 'desc' => 'Senin – Jumat, pukul 08.00 – 16.00 WIB.'),
    array('icon' => 'fa-solid fa-envelope-open-text', 'theme' => 'pink', 'title' => 'Kirim Pesan', 'desc' => 'Isi formulir di bawah, pesanmu langsung diterima administrator.'),
))); ?>
<section class="contact-section">
    <div class="contact-container">
        <div class="contact-info">
            <p class="section-label">INFORMASI KONTAK</p>
            <h2>Mari Terhubung</h2>
            <p>Untuk informasi lebih lanjut mengenai program, kegiatan, pemenuhan hak, dan perlindungan anak, silakan menghubungi kami melalui informasi yang tersedia.</p>
            <div class="contact-item"><h3>Alamat</h3><p>Jl. Letnan Tukiyat No.40, Gunungan, Deyangan, Kec. Mertoyudan, Kabupaten Magelang, Jawa Tengah 56172</p></div>
            <div class="contact-item"><h3>Email</h3><p>pppa.dinsosppkbpppamgl123@gmail.com</p></div>
            <div class="contact-item"><h3>Telepon</h3><p>(0293)-788167</p></div>
            <div class="contact-item">
                <h3><i class="fa-brands fa-whatsapp" style="color:#25d366;margin-right:6px;"></i>WhatsApp</h3>
                <p><a href="https://wa.me/6289526050500?text=Halo%20Layak%20Anak%20Kabupaten%20Magelang" target="_blank" rel="noopener" style="color:#25d366;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;gap:8px;padding:8px 16px;background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:8px;font-size:14px;transition:.2s;" onmouseover="this.style.background='#dcfce7';this.style.borderColor='#86efac'" onmouseout="this.style.background='#f0fdf4';this.style.borderColor='#bbf7d0'"><i class="fa-brands fa-whatsapp" style="font-size:18px;"></i> 0895-2605-0500 <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:10px;opacity:.5;"></i></a></p>
            </div>
            <div class="contact-item"><h3>Jam Pelayanan</h3><p>Senin - Jumat<br>08.00 - 16.00 WIB</p></div>
        </div>
        <div class="contact-form">
            <h2>Kirim Pesan</h2>
            <p class="contact-form-description">Silakan isi formulir berikut. Pesan yang dikirim akan diterima oleh administrator.</p>
            <?php echo validation_errors('<div class="alert error">','</div>'); ?>
            <form action="<?php echo site_url('kontak/kirim'); ?>" method="post">
                <div class="form-group"><label for="nama">Nama</label><input type="text" id="nama" name="nama" placeholder="Masukkan nama" value="<?php echo set_value('nama'); ?>" required></div>
                <div class="form-group"><label for="email">Email</label><input type="email" id="email" name="email" placeholder="Masukkan email" value="<?php echo set_value('email'); ?>" required></div>
                <div class="form-group"><label for="pesan">Pesan</label><textarea id="pesan" name="pesan" rows="6" placeholder="Tuliskan pesan" required><?php echo set_value('pesan'); ?></textarea></div>
                <button type="submit">Kirim Pesan</button>
            </form>
        </div>
    </div>
</section>
