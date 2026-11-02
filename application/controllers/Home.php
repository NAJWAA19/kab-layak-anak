<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {
    public function index() {
        $this->load->model(array('M_berita','M_program','M_album','M_beranda'));
        $data = array(
            'title' => 'Beranda',
            'berita_terbaru' => $this->M_berita->get_all(3),
            'program_terbaru' => $this->M_program->get_all(3),
            'galeri_terbaru' => $this->M_album->get_all(),
            'beranda_hero' => $this->M_beranda->get_hero(),
            'beranda_why_title' => $this->M_beranda->get_by_bagian('why_title'),
            'beranda_why_cards' => $this->M_beranda->get_why_cards(),
            'beranda_message' => $this->M_beranda->get_message(),
        );
        $data['galeri_terbaru'] = array_slice($data['galeri_terbaru'], 0, 3);
        $this->render('home/index', $data);
    }
}
