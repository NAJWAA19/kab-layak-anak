<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hak_anak extends Public_Controller {
    public function index() {
        $this->load->model('M_klaster');
        $this->render('hak_anak/index', array(
            'title'=>'Hak Anak',
            'klaster'=>$this->M_klaster->get_all(),
            'kelembagaan'=>$this->M_klaster->get_kelembagaan()
        ));
    }
    public function detail($id = NULL) {
        $this->load->model('M_klaster');
        $klaster = $this->M_klaster->get((int)$id);
        if (!$klaster) show_404();
        // Samakan warna dengan kartu di halaman indeks (urutan nomor ASC -> cluster-1..5)
        $warna = 1;
        $semua = $this->M_klaster->get_all();
        foreach ($semua as $i => $row) {
            if ((int)$row->id === (int)$klaster->id) { $warna = ($i % 5) + 1; break; }
        }
        $this->render('hak_anak/detail', array('title'=>$klaster->judul,'klaster'=>$klaster,'warna'=>$warna));
    }
}
