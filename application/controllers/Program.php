<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends Public_Controller {
    public function index() {
        $this->load->model('M_program');
        $this->render('program/index', array('title'=>'Program','program'=>$this->M_program->get_all()));
    }
    public function detail($id = NULL) {
        $this->load->model('M_program');
        $row = $this->M_program->get((int)$id);
        if (!$row) show_404();
        $this->render('program/detail', array('title'=>$row->judul,'program'=>$row));
    }
}
