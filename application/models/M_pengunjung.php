<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengunjung extends CI_Model {
    public function catat($ip) {
        if (empty($ip)) $ip = '0.0.0.0';
        $today = date('Y-m-d');
        $exists = $this->db->get_where('tb_pengunjung', array('tanggal'=>$today,'ip'=>$ip))->row();
        if (!$exists) {
            $this->db->insert('tb_pengunjung', array('tanggal'=>$today,'ip'=>$ip));
        }
    }
    public function total() { return $this->db->count_all('tb_pengunjung'); }
    public function hari_ini() {
        return $this->db->where('tanggal', date('Y-m-d'))->count_all_results('tb_pengunjung');
    }
}
