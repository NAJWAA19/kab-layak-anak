<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_galeri extends Admin_Controller {
    public function index() {
        redirect('admin-album');
    }
    public function tambah() {
        $this->load->model('M_album');
        $album_id = $this->input->get('album_id', TRUE);
        $data = array('title'=>'Tambah Foto','row'=>NULL,'albums'=>$this->M_album->get_all(),'selected_album'=>$album_id);
        $this->render('admin/galeri_form', $data);
    }
    public function simpan() {
        $this->load->model(array('M_galeri','M_album'));
        $this->load->library(array('form_validation','upload'));
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        if ($this->form_validation->run() === FALSE) {
            $this->render('admin/galeri_form', array('title'=>'Tambah Foto','row'=>NULL,'albums'=>$this->M_album->get_all(),'selected_album'=>$this->input->post('album_id',TRUE)));
            return;
        }
        $gambar = '';
        if (!empty($_FILES['gambar']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/galeri/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            if (!is_dir($cfg['upload_path'])) mkdir($cfg['upload_path'],0755,TRUE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('gambar')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-galeri/tambah'); return; }
            $gambar = $this->upload->data('file_name');
        }
        $album_id = $this->input->post('album_id',TRUE);
        $this->M_galeri->insert(array('album_id'=>!empty($album_id) ? $album_id : NULL,'judul'=>$this->input->post('judul',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE),'gambar'=>$gambar));
        $this->session->set_flashdata('success','Foto ditambahkan.');
        if (!empty($album_id)) { redirect('admin-album/detail/'.$album_id); } else { redirect('admin-album'); }
    }
    public function hapus($id = NULL) {
        $this->load->model('M_galeri');
        $row = $this->M_galeri->get((int)$id);
        if ($row) {
            $album_id = $row->album_id;
            if (!empty($row->gambar) && is_file('./assets/uploads/galeri/'.$row->gambar)) @unlink('./assets/uploads/galeri/'.$row->gambar);
            $this->M_galeri->delete((int)$id);
            $this->session->set_flashdata('success','Foto dihapus.');
            if (!empty($album_id)) { redirect('admin-album/detail/'.$album_id); } else { redirect('admin-album'); }
        } else {
            redirect('admin-album');
        }
    }
    public function ubah($id = NULL) {
        $this->load->model(array('M_galeri','M_album'));
        $row = $this->M_galeri->get((int)$id); if (!$row) show_404();
        $this->render('admin/galeri_form', array('title'=>'Ubah Foto','row'=>$row,'albums'=>$this->M_album->get_all(),'selected_album'=>$row->album_id));
    }
    public function perbarui($id = NULL) {
        $this->load->model(array('M_galeri','M_album'));
        $this->load->library(array('form_validation','upload'));
        $row = $this->M_galeri->get((int)$id); if (!$row) show_404();
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        if ($this->form_validation->run() === FALSE) {
            $this->render('admin/galeri_form', array('title'=>'Ubah Foto','row'=>$row,'albums'=>$this->M_album->get_all(),'selected_album'=>$row->album_id));
            return;
        }
        $album_id = $this->input->post('album_id',TRUE);
        $data = array('album_id'=>!empty($album_id) ? $album_id : NULL,'judul'=>$this->input->post('judul',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE));
        if (!empty($_FILES['gambar']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/galeri/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('gambar')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-galeri/ubah/'.$id); return; }
            if (!empty($row->gambar) && is_file('./assets/uploads/galeri/'.$row->gambar)) @unlink('./assets/uploads/galeri/'.$row->gambar);
            $data['gambar'] = $this->upload->data('file_name');
        }
        $this->M_galeri->update($id,$data);
        $this->session->set_flashdata('success','Foto diperbarui.');
        if (!empty($album_id)) { redirect('admin-album/detail/'.$album_id); } else { redirect('admin-album'); }
    }
}
