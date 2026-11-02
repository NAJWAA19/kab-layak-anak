<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends Public_Controller {
    public function index() {
        $this->load->model('M_berita');
        $this->render('berita/index', array('title'=>'Berita','berita'=>$this->M_berita->get_all()));
    }
    public function detail($id = NULL) {
        $this->load->model('M_berita');
        $row = $this->M_berita->get((int)$id);
        if (!$row) show_404();
        $this->render('berita/detail', array('title'=>$row->judul,'berita'=>$row));
    }
}
