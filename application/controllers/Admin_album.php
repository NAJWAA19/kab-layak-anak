<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_album extends Admin_Controller {
    public function index() {
        $this->load->model('M_album');
        $this->render('admin/album_list', array('title'=>'Kelola Galeri','rows'=>$this->M_album->get_all()));
    }
    public function tambah() {
        $this->render('admin/album_form', array('title'=>'Tambah Galeri','row'=>NULL));
    }
    public function simpan() {
        $this->load->model('M_album');
        $this->load->library(array('form_validation','upload'));
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        if ($this->form_validation->run() === FALSE) { $this->render('admin/album_form', array('title'=>'Tambah Galeri','row'=>NULL)); return; }
        $cover = '';
        if (!empty($_FILES['cover']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/galeri/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            if (!is_dir($cfg['upload_path'])) mkdir($cfg['upload_path'],0755,TRUE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('cover')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-galeri/tambah'); return; }
            $cover = $this->upload->data('file_name');
        }
        $this->M_album->insert(array('cover'=>$cover,'judul'=>$this->input->post('judul',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE)));
        $this->session->set_flashdata('success','Galeri ditambahkan.'); redirect('admin-galeri');
    }
    public function ubah($id = NULL) {
        $this->load->model('M_album');
        $row = $this->M_album->get((int)$id); if (!$row) show_404();
        $this->render('admin/album_form', array('title'=>'Ubah Galeri','row'=>$row));
    }
    public function perbarui($id = NULL) {
        $this->load->model('M_album');
        $this->load->library(array('form_validation','upload'));
        $row = $this->M_album->get((int)$id); if (!$row) show_404();
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        if ($this->form_validation->run() === FALSE) { $this->render('admin/album_form', array('title'=>'Ubah Galeri','row'=>$row)); return; }
        $data = array('judul'=>$this->input->post('judul',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE));
        if (!empty($_FILES['cover']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/galeri/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('cover')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-galeri/ubah/'.$id); return; }
            if (!empty($row->cover) && is_file('./assets/uploads/galeri/'.$row->cover)) @unlink('./assets/uploads/galeri/'.$row->cover);
            $data['cover'] = $this->upload->data('file_name');
        }
        $this->M_album->update($id,$data);
        $this->session->set_flashdata('success','Galeri diperbarui.'); redirect('admin-galeri');
    }
    public function hapus($id = NULL) {
        $this->load->model('M_album');
        $row = $this->M_album->get((int)$id);
        if ($row && !empty($row->cover) && is_file('./assets/uploads/galeri/'.$row->cover)) @unlink('./assets/uploads/galeri/'.$row->cover);
        $this->M_album->delete((int)$id);
        $this->session->set_flashdata('success','Galeri dihapus.'); redirect('admin-galeri');
    }
    public function detail($id = NULL) {
        $this->load->model('M_album');
        $row = $this->M_album->get((int)$id); if (!$row) show_404();
        $fotos = $this->M_album->get_fotos((int)$id);
        $this->render('admin/album_detail', array('title'=>'Detail Galeri: '.$row->judul,'row'=>$row,'fotos'=>$fotos));
    }
    public function simpan_foto_multi($album_id = NULL) {
        $this->load->model('M_album');
        $this->load->model('M_galeri');
        $this->load->library('upload');
        $album = $this->M_album->get((int)$album_id); if (!$album) show_404();
        $gambar_list = isset($_FILES['gambar']['name']) ? $_FILES['gambar']['name'] : array();
        $judul_list = $this->input->post('judul', TRUE);
        $total = count($gambar_list);
        $uploaded = 0;
        $errors = 0;
        if (!empty($gambar_list[0])) {
            $cfg = array('upload_path'=>'./assets/uploads/galeri/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            if (!is_dir($cfg['upload_path'])) mkdir($cfg['upload_path'],0755,TRUE);
            $this->upload->initialize($cfg);
            for ($i = 0; $i < $total; $i++) {
                if (empty($gambar_list[$i])) continue;
                $_FILES['gambar_single']['name'] = $gambar_list[$i];
                $_FILES['gambar_single']['type'] = $_FILES['gambar']['type'][$i];
                $_FILES['gambar_single']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                $_FILES['gambar_single']['error'] = $_FILES['gambar']['error'][$i];
                $_FILES['gambar_single']['size'] = $_FILES['gambar']['size'][$i];
                if ($this->upload->do_upload('gambar_single')) {
                    $file_name = $this->upload->data('file_name');
                    $judul = !empty($judul_list[$i]) ? $judul_list[$i] : 'Foto '.($uploaded+1);
                    $this->M_galeri->insert(array('album_id'=>$album_id,'judul'=>$judul,'deskripsi'=>'','gambar'=>$file_name));
                    $uploaded++;
                } else {
                    $errors++;
                }
            }
        }
        $msg = $uploaded.' foto berhasil diupload.';
        if ($errors > 0) $msg .= ' '.$errors.' foto gagal.';
        $this->session->set_flashdata('success',$msg);
        redirect('admin-galeri/detail/'.$album_id);
    }
    public function set_cover($id = NULL) {
        $this->load->model('M_galeri');
        $row = $this->M_galeri->get((int)$id);
        if ($row && !empty($row->gambar)) {
            $this->load->model('M_album');
            $this->M_album->update($row->album_id, array('cover'=>$row->gambar));
            $this->session->set_flashdata('success','Cover berhasil diubah.');
            redirect('admin-galeri/detail/'.$row->album_id);
        } else {
            redirect('admin-galeri');
        }
    }
    public function hapus_foto($id = NULL) {
        $this->load->model('M_galeri');
        $row = $this->M_galeri->get((int)$id);
        if ($row) {
            $album_id = $row->album_id;
            if (!empty($row->gambar) && is_file('./assets/uploads/galeri/'.$row->gambar)) @unlink('./assets/uploads/galeri/'.$row->gambar);
            $this->M_galeri->delete((int)$id);
            $this->session->set_flashdata('success','Foto dihapus.');
            redirect('admin-galeri/detail/'.$album_id);
        } else {
            redirect('admin-galeri');
        }
    }
    public function ubah_foto($id = NULL) {
        $this->load->model(array('M_galeri','M_album'));
        $row = $this->M_galeri->get((int)$id); if (!$row) show_404();
        $this->render('admin/galeri_form_edit', array('title'=>'Ubah Foto','row'=>$row));
    }
    public function perbarui_foto($id = NULL) {
        $this->load->model(array('M_galeri','M_album'));
        $this->load->library(array('form_validation','upload'));
        $row = $this->M_galeri->get((int)$id); if (!$row) show_404();
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        if ($this->form_validation->run() === FALSE) {
            $this->render('admin/galeri_form_edit', array('title'=>'Ubah Foto','row'=>$row));
            return;
        }
        $data = array('judul'=>$this->input->post('judul',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE));
        if (!empty($_FILES['gambar']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/galeri/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('gambar')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-galeri/ubah-foto/'.$id); return; }
            if (!empty($row->gambar) && is_file('./assets/uploads/galeri/'.$row->gambar)) @unlink('./assets/uploads/galeri/'.$row->gambar);
            $data['gambar'] = $this->upload->data('file_name');
        }
        $this->M_galeri->update($id,$data);
        $this->session->set_flashdata('success','Foto diperbarui.');
        redirect('admin-galeri/detail/'.$row->album_id);
    }
}
