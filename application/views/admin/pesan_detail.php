<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="admin-dashboard">
    <div class="admin-title">
        <p class="section-label">KELOLA PESAN</p>
        <h1>Detail Pesan</h1>
    </div>
    <div id="newsForm" class="admin-form">
        <h2 id="formTitle">Pesan dari <?php echo htmlspecialchars($row->nama); ?></h2>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" value="<?php echo htmlspecialchars($row->nama); ?>" readonly>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" value="<?php echo htmlspecialchars($row->email); ?>" readonly>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="text" value="<?php echo tgl_indo($row->tanggal, TRUE); ?>" readonly>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" value="<?php echo htmlspecialchars($row->status); ?>" readonly>
        </div>
        <div class="form-group">
            <label>Isi Pesan</label>
            <textarea rows="6" readonly><?php echo htmlspecialchars($row->pesan); ?></textarea>
        </div>
        <div class="form-actions">
            <a href="<?php echo site_url('admin-pesan'); ?>" class="cancel-button" style="text-decoration:none;display:inline-block;">← Kembali</a>
        </div>
    </div>
</section>
