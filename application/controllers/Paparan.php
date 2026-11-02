<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paparan extends Public_Controller {
    public function index() {
        $this->load->model('M_paparan');
        $this->render('paparan/index', array('title'=>'Paparan','paparan'=>$this->M_paparan->get_all()));
    }
    public function unduh($id = NULL) {
        $this->load->model('M_paparan');
        $this->load->helper('download');
        $row = $this->M_paparan->get((int)$id);
        if (!$row || empty($row->berkas)) show_404();
        $path = FCPATH.'assets/uploads/paparan/'.$row->berkas;
        if (!is_file($path)) show_404();
        force_download($row->berkas, file_get_contents($path));
    }
    public function baca($id = NULL) {
        $this->load->model('M_paparan');
        $row = $this->M_paparan->get((int)$id);
        if (!$row || empty($row->berkas)) show_404();
        // Cegah path traversal: hanya basename
        $nama = basename($row->berkas);
        $path = FCPATH.'assets/uploads/paparan/'.$nama;
        if (!is_file($path)) show_404();
        $ext = strtolower(pathinfo($nama, PATHINFO_EXTENSION));
        $mime = 'application/octet-stream';
        if ($ext === 'pdf') $mime = 'application/pdf';
        elseif (in_array($ext, array('jpg','jpeg'))) $mime = 'image/jpeg';
        elseif ($ext === 'png') $mime = 'image/png';
        elseif (!empty($row->mime)) $mime = $row->mime;
        // Tampilkan inline agar langsung terbaca di browser, bukan diunduh
        header('Content-Type: '.$mime);
        header('Content-Length: '.filesize($path));
        header('Content-Disposition: inline; filename="'.str_replace('"','',$nama).'"');
        header('X-Content-Type-Options: nosniff');
        header('Accept-Ranges: bytes');
        header('Cache-Control: public, max-age=3600');
        readfile($path);
        exit;
    }
}
