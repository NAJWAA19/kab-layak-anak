<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_paparan extends Admin_Controller {
    private function sanitize_name($name) {
        $name = preg_replace('/[^a-zA-Z0-9._-]/', '_', (string)$name);
        return trim($name, '._');
    }
    public function index() {
        $this->load->model('M_paparan');
        $this->render('admin/paparan_list', array('title'=>'Kelola Paparan','rows'=>$this->M_paparan->get_all()));
    }
    public function tambah() { $this->render('admin/paparan_form', array('title'=>'Tambah Paparan','row'=>NULL)); }
    public function ubah($id = NULL) {
        $this->load->model('M_paparan');
        $row = $this->M_paparan->get((int)$id);
        if (!$row) { $this->session->set_flashdata('error','Data tidak ditemukan.'); redirect('admin-paparan'); return; }
        $this->render('admin/paparan_form', array('title'=>'Edit Paparan','row'=>$row));
    }
    public function simpan() {
        $this->load->model('M_paparan');
        $this->load->library(array('form_validation','upload'));
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        if ($this->form_validation->run() === FALSE) { $this->render('admin/paparan_form', array('title'=>'Tambah Paparan','row'=>NULL)); return; }
        // Kode error upload PHP -> pesan yang jelas (tidak redirect buta)
        $err = isset($_FILES['berkas']['error']) ? (int)$_FILES['berkas']['error'] : UPLOAD_ERR_NO_FILE;
        if ($err === UPLOAD_ERR_NO_FILE || empty($_FILES['berkas']['name'])) {
            $this->render('admin/paparan_form', array('title'=>'Tambah Paparan','row'=>NULL,'upload_error'=>'Pilih berkas PDF/JPG/PNG terlebih dahulu (maksimal 25 MB).'));
            return;
        }
        if ($err === UPLOAD_ERR_INI_SIZE || $err === UPLOAD_ERR_FORM_SIZE) {
            $this->render('admin/paparan_form', array('title'=>'Tambah Paparan','row'=>NULL,'upload_error'=>'Ukuran file melebihi batas server. Maksimal 25 MB.'));
            return;
        }
        if ($err !== UPLOAD_ERR_OK) {
            $this->render('admin/paparan_form', array('title'=>'Tambah Paparan','row'=>NULL,'upload_error'=>'File gagal diunggah (kode error '.$err.'). Silakan coba lagi.'));
            return;
        }
        // Validasi ukuran manual (25 MB = 26214400 byte)
        if ($_FILES['berkas']['size'] > 26214400) {
            $this->render('admin/paparan_form', array('title'=>'Tambah Paparan','row'=>NULL,'upload_error'=>'Ukuran file maksimal 25 MB.'));
            return;
        }
        // TIDAK ada cek ketat $_FILES['berkas']['type'] (nilai dari browser, tidak reliabel).
        // Validasi tipe file dipercayakan ke CI Upload (deteksi server/fileinfo + mimes.php).
        $dir = './assets/uploads/paparan/';
        if (!is_dir($dir)) mkdir($dir,0755,TRUE);
        $clean = $this->sanitize_name($_FILES['berkas']['name']);
        if ($clean === '') { $this->session->set_flashdata('error','Nama file tidak valid.'); redirect('admin-paparan/tambah'); return; }
        // Hindari timpa: tambah suffix waktu bila duplikat (nama tetap terbaca, tidak dienkripsi)
        $target = $clean;
        if (is_file($dir.$target)) {
            $ext = pathinfo($clean, PATHINFO_EXTENSION);
            $base = pathinfo($clean, PATHINFO_FILENAME);
            $target = $base.'_'.date('YmdHis').($ext ? '.'.$ext : '');
        }
        $_FILES['berkas']['name'] = $target;
        // Nama file tidak dienkripsi sesuai permintaan
        $cfg = array('upload_path'=>$dir,'allowed_types'=>'pdf|jpg|jpeg|png','max_size'=>25600,'encrypt_name'=>FALSE,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
        $this->upload->initialize($cfg);
        if (!$this->upload->do_upload('berkas')) {
            $this->render('admin/paparan_form', array('title'=>'Tambah Paparan','row'=>NULL,'upload_error'=>$this->upload->display_errors('','')));
            return;
        }
        $up = $this->upload->data();
        $ukuran_byte = (int)round($up['file_size'] * 1024);
        if ($ukuran_byte <= 0 && isset($_FILES['berkas']['size'])) $ukuran_byte = (int)$_FILES['berkas']['size'];
        $this->M_paparan->insert(array('judul'=>$this->input->post('judul',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE),'berkas'=>$up['file_name'],'mime'=>$up['file_type'],'ukuran'=>$ukuran_byte,'tanggal'=>date('Y-m-d H:i:s')));
        $this->session->set_flashdata('success','Paparan ditambahkan: '.$up['file_name']); redirect('admin-paparan');
    }
    public function update($id = NULL) {
        $this->load->model('M_paparan');
        $row = $this->M_paparan->get((int)$id);
        if (!$row) { $this->session->set_flashdata('error','Data tidak ditemukan.'); redirect('admin-paparan'); return; }
        $this->load->library(array('form_validation','upload'));
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        if ($this->form_validation->run() === FALSE) { $this->render('admin/paparan_form', array('title'=>'Edit Paparan','row'=>$row)); return; }
        $data = array('judul'=>$this->input->post('judul',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE));
        // Cek apakah ada file baru diupload
        $err = isset($_FILES['berkas']['error']) ? (int)$_FILES['berkas']['error'] : UPLOAD_ERR_NO_FILE;
        if ($err !== UPLOAD_ERR_NO_FILE && !empty($_FILES['berkas']['name'])) {
            if ($err === UPLOAD_ERR_INI_SIZE || $err === UPLOAD_ERR_FORM_SIZE) {
                $this->render('admin/paparan_form', array('title'=>'Edit Paparan','row'=>$row,'upload_error'=>'Ukuran file melebihi batas server. Maksimal 25 MB.'));
                return;
            }
            if ($err !== UPLOAD_ERR_OK) {
                $this->render('admin/paparan_form', array('title'=>'Edit Paparan','row'=>$row,'upload_error'=>'File gagal diunggah (kode error '.$err.'). Silakan coba lagi.'));
                return;
            }
            if ($_FILES['berkas']['size'] > 26214400) {
                $this->render('admin/paparan_form', array('title'=>'Edit Paparan','row'=>$row,'upload_error'=>'Ukuran file maksimal 25 MB.'));
                return;
            }
            $dir = './assets/uploads/paparan/';
            if (!is_dir($dir)) mkdir($dir,0755,TRUE);
            $clean = $this->sanitize_name($_FILES['berkas']['name']);
            if ($clean === '') { $this->session->set_flashdata('error','Nama file tidak valid.'); redirect('admin-paparan/ubah/'.$id); return; }
            $target = $clean;
            if (is_file($dir.$target)) {
                $ext = pathinfo($clean, PATHINFO_EXTENSION);
                $base = pathinfo($clean, PATHINFO_FILENAME);
                $target = $base.'_'.date('YmdHis').($ext ? '.'.$ext : '');
            }
            $_FILES['berkas']['name'] = $target;
$cfg = array('upload_path'=>$dir,'allowed_types'=>'pdf|jpg|jpeg|png','max_size'=>25600,'encrypt_name'=>FALSE,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('berkas')) {
                $this->render('admin/paparan_form', array('title'=>'Edit Paparan','row'=>$row,'upload_error'=>$this->upload->display_errors('','')));
                return;
            }
            $up = $this->upload->data();
            $ukuran_byte = (int)round($up['file_size'] * 1024);
            if ($ukuran_byte <= 0 && isset($_FILES['berkas']['size'])) $ukuran_byte = (int)$_FILES['berkas']['size'];
            // Hapus file lama
            if (!empty($row->berkas) && is_file($dir.$row->berkas)) @unlink($dir.$row->berkas);
            $data['berkas'] = $up['file_name'];
            $data['mime'] = $up['file_type'];
            $data['ukuran'] = $ukuran_byte;
        }
        $this->M_paparan->update((int)$id, $data);
        $this->session->set_flashdata('success','Paparan berhasil diperbarui.'); redirect('admin-paparan');
    }
    public function hapus($id = NULL) {
        $this->load->model('M_paparan');
        $row = $this->M_paparan->get((int)$id);
        if ($row && !empty($row->berkas) && is_file('./assets/uploads/paparan/'.$row->berkas)) @unlink('./assets/uploads/paparan/'.$row->berkas);
        $this->M_paparan->delete((int)$id);
        $this->session->set_flashdata('success','Paparan dihapus.'); redirect('admin-paparan');
    }
}
