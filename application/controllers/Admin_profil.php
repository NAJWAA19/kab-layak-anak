<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profil extends Admin_Controller {
    public function index() {
        $this->load->model('M_profil');
        $this->M_profil->ensure_exists();
        $row = $this->M_profil->get();
        $this->render('admin/profil_form', array('title' => 'Kelola Profil', 'row' => $row));
    }

    public function perbarui() {
        $this->load->model('M_profil');
        $this->load->library('form_validation');
        $this->M_profil->ensure_exists();
        $row = $this->M_profil->get();

        $this->form_validation->set_rules('tentang_judul', 'Judul Tentang', 'required|max_length[255]');
        $this->form_validation->set_rules('tentang_deskripsi', 'Deskripsi Tentang', 'required');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');
        $this->form_validation->set_rules('tujuan_judul', 'Judul Tujuan', 'required|max_length[255]');

        if ($this->form_validation->run() === FALSE) {
            $this->render('admin/profil_form', array('title' => 'Kelola Profil', 'row' => $row));
            return;
        }

        $this->M_profil->update(array(
            'tentang_label' => $this->input->post('tentang_label', TRUE),
            'tentang_judul' => $this->input->post('tentang_judul', TRUE),
            'tentang_deskripsi' => $this->input->post('tentang_deskripsi', TRUE),
            'visi_label' => $this->input->post('visi_label', TRUE),
            'visi_judul' => $this->input->post('visi_judul', TRUE),
            'visi' => $this->input->post('visi', TRUE),
            'misi' => $this->input->post('misi', TRUE),
            'tujuan_label' => $this->input->post('tujuan_label', TRUE),
            'tujuan_judul' => $this->input->post('tujuan_judul', TRUE),
            'tujuan_deskripsi' => $this->input->post('tujuan_deskripsi', TRUE),
        ));

        $judul_tujuan = $this->input->post('tujuan_item_judul');
        $desc_tujuan = $this->input->post('tujuan_item_deskripsi');
        $items = array();
        if (is_array($judul_tujuan)) {
            foreach ($judul_tujuan as $i => $j) {
                $items[] = array(
                    'judul' => $j,
                    'deskripsi' => is_array($desc_tujuan) && isset($desc_tujuan[$i]) ? $desc_tujuan[$i] : '',
                );
            }
        }
        $this->M_profil->replace_tujuan($items);

        $this->session->set_flashdata('success', 'Profil diperbarui.');
        redirect('admin-profil');
    }
}
