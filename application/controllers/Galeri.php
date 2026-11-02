<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends Public_Controller {
    public function index() {
        $this->load->model('M_album');
        $this->render('galeri/index', array('title'=>'Galeri','albums'=>$this->M_album->get_all()));
    }
    public function detail($id = NULL) {
        $this->load->model('M_album');
        $row = $this->M_album->get((int)$id); if (!$row) show_404();
        $fotos = $this->M_album->get_fotos((int)$id);
        $this->render('galeri/detail', array('title'=>$row->judul,'album'=>$row,'fotos'=>$fotos));
    }
}
