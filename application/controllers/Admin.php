<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {
    public function index() {
        $this->load->model(array('M_berita','M_program','M_galeri','M_paparan','M_pesan','M_klaster','M_album'));
        $data = array(
            'title'=>'Dashboard',
            'jml_berita'=>$this->M_berita->count_all(),
            'jml_program'=>$this->M_program->count_all(),
            'jml_galeri'=>$this->M_galeri->count_all(),
            'jml_album'=>$this->M_album->count_all(),
            'jml_paparan'=>$this->M_paparan->count_all(),
            'jml_pesan'=>$this->M_pesan->count_all(),
            'jml_klaster'=>count($this->M_klaster->get_all()),
        );
        $this->render('admin/dashboard', $data);
    }
}
