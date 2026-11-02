<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_beranda extends Admin_Controller {
    public function index() {
        $this->load->model('M_beranda');
        $this->render('admin/beranda_form', array(
            'title'=>'Kelola Beranda',
            'rows'=>$this->M_beranda->get_all()
        ));
    }
    public function simpan() {
        $this->load->model('M_beranda');
        $this->load->library('form_validation');
        $sections = $this->input->post('section', TRUE);
        if (!empty($sections) && !is_array($sections)) {
            $sections = array_filter(array_map('trim', explode(',', $sections)));
        }
        if (!empty($sections) && is_array($sections)) {
            foreach ($sections as $s) {
                $bagian = $this->input->post('bagian_'.$s, TRUE);
                $label = $this->input->post('label_'.$s, TRUE);
                $judul = $this->input->post('judul_'.$s, TRUE);
                $deskripsi = $this->input->post('deskripsi_'.$s, TRUE);
                $icon = $this->input->post('icon_'.$s, TRUE);
                $link = $this->input->post('link_'.$s, TRUE);
                $data = array(
                    'label'=>$label,
                    'judul'=>$judul,
                    'deskripsi'=>$deskripsi,
                    'icon'=>$icon,
                    'link'=>$link
                );
                $existing = $this->M_beranda->get_by_bagian($bagian);
                if ($existing) {
                    $this->M_beranda->update($bagian, $data);
                } else {
                    $data['bagian'] = $bagian;
                    $this->M_beranda->insert($data);
                }
            }
        }
        $this->session->set_flashdata('success','Beranda berhasil diperbarui.');
        redirect('admin-beranda');
    }
}
