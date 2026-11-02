<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_program extends Admin_Controller {
    public function index() {
        $this->load->model('M_program');
        $this->render('admin/program_list', array('title'=>'Kelola Program','rows'=>$this->M_program->get_all()));
    }
    public function tambah() { $this->render('admin/program_form', array('title'=>'Tambah Program','row'=>NULL)); }
    public function simpan() {
        $this->load->model('M_program');
        $this->load->library(array('form_validation','upload'));
        $this->form_validation->set_rules('judul','Judul','required|max_length[200]');
        $this->form_validation->set_rules('kategori','Kategori','required|max_length[100]');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        if ($this->form_validation->run() === FALSE) { $this->render('admin/program_form', array('title'=>'Tambah Program','row'=>NULL)); return; }
        $gambar = '';
        if (!empty($_FILES['gambar']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/program/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            if (!is_dir($cfg['upload_path'])) mkdir($cfg['upload_path'],0755,TRUE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('gambar')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-program/tambah'); return; }
            $gambar = $this->upload->data('file_name');
        }
        $this->M_program->insert(array('judul'=>$this->input->post('judul',TRUE),'kategori'=>$this->input->post('kategori',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE),'gambar'=>$gambar));
        $this->session->set_flashdata('success','Program ditambahkan.'); redirect('admin-program');
    }
    public function ubah($id = NULL) {
        $this->load->model('M_program');
        $row = $this->M_program->get((int)$id); if (!$row) show_404();
        $this->render('admin/program_form', array('title'=>'Ubah Program','row'=>$row));
    }
    public function perbarui($id = NULL) {
        $this->load->model('M_program');
        $this->load->library(array('form_validation','upload'));
        $row = $this->M_program->get((int)$id); if (!$row) show_404();
        $data = array('judul'=>$this->input->post('judul',TRUE),'kategori'=>$this->input->post('kategori',TRUE),'deskripsi'=>$this->input->post('deskripsi',TRUE));
        if (!empty($_FILES['gambar']['name'])) {
            $cfg = array('upload_path'=>'./assets/uploads/program/','allowed_types'=>'jpg|jpeg|png','max_size'=>5120,'remove_spaces'=>TRUE,'overwrite'=>FALSE);
            $this->upload->initialize($cfg);
            if (!$this->upload->do_upload('gambar')) { $this->session->set_flashdata('error',$this->upload->display_errors('','')); redirect('admin-program/ubah/'.$id); return; }
            if (!empty($row->gambar) && is_file('./assets/uploads/program/'.$row->gambar)) @unlink('./assets/uploads/program/'.$row->gambar);
            $data['gambar'] = $this->upload->data('file_name');
        }
        $this->M_program->update($id,$data);
        $this->session->set_flashdata('success','Program diperbarui.'); redirect('admin-program');
    }
    public function hapus($id = NULL) {
        $this->load->model('M_program');
        $row = $this->M_program->get((int)$id);
        if ($row && !empty($row->gambar) && is_file('./assets/uploads/program/'.$row->gambar)) @unlink('./assets/uploads/program/'.$row->gambar);
        $this->M_program->delete((int)$id);
        $this->session->set_flashdata('success','Program dihapus.'); redirect('admin-program');
    }
}
