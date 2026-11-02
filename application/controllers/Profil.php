<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends Public_Controller {
    public function index() {
        $this->load->model('M_profil');
        $profil = $this->M_profil->get();
        $this->render('profil/index', array('title' => 'Profil', 'profil' => $profil));
    }
}
