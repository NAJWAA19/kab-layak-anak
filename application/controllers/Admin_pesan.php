<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_pesan extends Admin_Controller {
    public function index() {
        $this->load->model('M_pesan');
        $this->render('admin/pesan_list', array('title'=>'Pesan Masuk','rows'=>$this->M_pesan->get_all()));
    }
    public function baca($id = NULL) {
        $this->load->model('M_pesan');
        $row = $this->M_pesan->get((int)$id); if (!$row) show_404();
        $this->M_pesan->tandai_dibaca((int)$id);
        $this->render('admin/pesan_detail', array('title'=>'Detail Pesan','row'=>$row));
    }
    public function hapus($id = NULL) {
        $this->load->model('M_pesan');
        $this->M_pesan->delete((int)$id);
        $this->session->set_flashdata('success','Pesan dihapus.'); redirect('admin-pesan');
    }
}
