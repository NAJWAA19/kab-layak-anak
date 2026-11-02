<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_klaster extends Admin_Controller {
    public function index() {
        $this->load->model('M_klaster');
        $rows = $this->M_klaster->get_all();
        foreach ($rows as $r) $r->poin = $this->M_klaster->poin($r->id);
        $kelembagaan = $this->M_klaster->get_kelembagaan();
        $this->render('admin/klaster_list', array('title'=>'Kelola Hak Anak','rows'=>$rows,'kelembagaan'=>$kelembagaan));
    }
    public function ubah($id = NULL) {
        $this->load->model('M_klaster');
        $row = $this->M_klaster->get((int)$id); if (!$row) show_404();
        $this->render('admin/klaster_form', array('title'=>'Ubah Klaster','row'=>$row));
    }
    public function perbarui($id = NULL) {
        $this->load->model('M_klaster');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul','Judul','required|max_length[150]');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('google_drive_link','Link Google Drive','max_length[500]');
        $row = $this->M_klaster->get((int)$id); if (!$row) show_404();
        if ($this->form_validation->run() === FALSE) { $this->render('admin/klaster_form', array('title'=>'Ubah Klaster','row'=>$row)); return; }
        $link = $this->input->post('google_drive_link', TRUE);
        if (!empty($link) &&strpos($link, 'drive.google.com') === false) {
            $this->session->set_flashdata('error','Link harus berupa URL Google Drive yang valid.'); redirect('admin-klaster/ubah/'.$id); return;
        }
        $this->M_klaster->update($id, array(
            'judul'=>$this->input->post('judul',TRUE),
            'deskripsi'=>$this->input->post('deskripsi',TRUE),
            'ikon'=>$this->input->post('ikon',TRUE),
            'google_drive_link'=> !empty($link) ? $link : NULL
        ));
        $poins = explode("\n", (string)$this->input->post('poin'));
        $this->M_klaster->replace_poin($id, $poins);
        $this->session->set_flashdata('success','Klaster diperbarui.'); redirect('admin-klaster');
    }
    public function kelembagaan() {
        $this->load->model('M_klaster');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('google_drive_kelembagaan','Link Google Drive Kelembagaan','max_length[500]');
        if ($this->form_validation->run() === FALSE) { redirect('admin-klaster'); return; }
        $link = $this->input->post('google_drive_kelembagaan', TRUE);
        if (!empty($link) && strpos($link, 'drive.google.com') === false) {
            $this->session->set_flashdata('error','Link harus berupa URL Google Drive yang valid.'); redirect('admin-klaster'); return;
        }
        $this->M_klaster->update_kelembagaan(!empty($link) ? $link : NULL);
        $this->session->set_flashdata('success','Link Kelembagaan diperbarui.'); redirect('admin-klaster');
    }
}
