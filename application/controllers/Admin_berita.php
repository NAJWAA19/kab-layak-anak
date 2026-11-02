<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_berita extends Admin_Controller {
    public function index() {
        $this->load->model('M_berita');
        $this->render('admin/berita_list', array('title'=>'Kelola Berita','rows'=>$this->M_berita->get_all()));
    }
    public function tambah() { $this->render('admin/berita_form', array('title'=>'Tambah Berita','row'=>NULL)); }
    public function simpan() {
        $this->load->model('M_berita');
        $this->load->library(array('form_validation','upload'));
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        if ($this->form_validation->run() === FALSE) { $this->render('admin/berita_form', array('title'=>'Tambah Berita','row'=>NULL)); return; }
        $gambar = '';
        if (!empty($_FILES['gambar']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/berita/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            if (!is_dir($cfg['upload_path'])) mkdir($cfg['upload_path'],0755,TRUE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('gambar')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-berita/tambah'); return; }
            $gambar = $this->upload->data('file_name');
        }
        $this->M_berita->insert(array('judul'=>$this->input->post('judul',TRUE),'tanggal'=>$this->input->post('tanggal',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE),'gambar'=>$gambar));
        $this->session->set_flashdata('success','Berita ditambahkan.'); redirect('admin-berita');
    }
    public function ubah($id = NULL) {
        $this->load->model('M_berita');
        $row = $this->M_berita->get((int)$id); if (!$row) show_404();
        $this->render('admin/berita_form', array('title'=>'Ubah Berita','row'=>$row));
    }
    public function perbarui($id = NULL) {
        $this->load->model('M_berita');
        $this->load->library(array('form_validation','upload'));
        $row = $this->M_berita->get((int)$id); if (!$row) show_404();
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        if ($this->form_validation->run() === FALSE) { $this->render('admin/berita_form', array('title'=>'Ubah Berita','row'=>$row)); return; }
        $data = array('judul'=>$this->input->post('judul',TRUE),'tanggal'=>$this->input->post('tanggal',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE));
        if (!empty($_FILES['gambar']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/berita/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('gambar')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-berita/ubah/'.$id); return; }
            if (!empty($row->gambar) && is_file('./assets/uploads/berita/'.$row->gambar)) @unlink('./assets/uploads/berita/'.$row->gambar);
            $data['gambar'] = $this->upload->data('file_name');
        }
        $this->M_berita->update($id,$data);
        $this->session->set_flashdata('success','Berita diperbarui.'); redirect('admin-berita');
    }
    public function hapus($id = NULL) {
        $this->load->model('M_berita');
        $row = $this->M_berita->get((int)$id);
        if ($row && !empty($row->gambar) && is_file('./assets/uploads/berita/'.$row->gambar)) @unlink('./assets/uploads/berita/'.$row->gambar);
        $this->M_berita->delete((int)$id);
        $this->session->set_flashdata('success','Berita dihapus.'); redirect('admin-berita');
    }
}
