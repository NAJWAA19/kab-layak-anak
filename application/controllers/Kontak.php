<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends Public_Controller {
    public function index() {
        $this->render('kontak/index', array('title'=>'Kontak'));
    }
    public function kirim() {
        $this->load->model('M_pesan');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama','Nama','required|max_length[100]');
        $this->form_validation->set_rules('email','Email','required|valid_email|max_length[100]');
        $this->form_validation->set_rules('pesan','Pesan','required');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('kontak');
            return;
        }
        $this->M_pesan->insert(array(
            'nama'=>$this->input->post('nama', TRUE),
            'email'=>$this->input->post('email', TRUE),
            'pesan'=>$this->input->post('pesan', TRUE),
        ));
        $this->session->set_flashdata('success','Pesan berhasil dikirim. Terima kasih.');
        redirect('kontak');
    }
}
