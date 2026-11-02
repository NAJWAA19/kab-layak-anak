<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Public_Controller
 * Base controller untuk semua halaman publik.
 * - Mencatat kunjungan (1 IP unik per hari) ke tb_pengunjung
 * - Menyediakan angka counter pengunjung untuk footer
 */
class Public_Controller extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pengunjung');

        // Catat kunjungan halaman publik
        $this->M_pengunjung->catat($this->input->ip_address());

        // Angka untuk footer
        $this->data['total_pengunjung']    = $this->M_pengunjung->total();
        $this->data['pengunjung_hari_ini'] = $this->M_pengunjung->hari_ini();
    }

    /**
     * Render halaman publik dengan header + footer template.
     */
    protected function render($view, $data = array()) {
        $data = array_merge($this->data, $data);
        $this->load->view('templates/public_header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/public_footer', $data);
    }
}

/**
 * Admin_Controller
 * Base controller untuk panel admin.
 * - Wajib login (session 'admin_login' = TRUE)
 */
class Admin_Controller extends CI_Controller {

    protected $data = array();

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('admin_login') !== TRUE) {
            $this->session->set_flashdata(
                'error',
                'Silakan login terlebih dahulu.'
            );
            redirect('admin-login');
        }

        $this->data['admin_nama'] = $this->session->userdata('admin_nama');
        $this->load->model('M_pesan');
        $this->data['pesan_belum_dibaca'] = $this->M_pesan->hitung_belum_dibaca();
    }

    /**
     * Render halaman admin dengan header + footer template.
     */
    protected function render($view, $data = array()) {
        $data = array_merge($this->data, $data);
        $this->load->view('templates/admin_header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/admin_footer', $data);
    }
}
