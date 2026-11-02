<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model {
    public function get_all() {
        return $this->db->order_by('urutan','ASC')->get('tb_beranda')->result();
    }
    public function get($bagian) {
        return $this->db->get_where('tb_beranda', array('bagian'=>$bagian))->row();
    }
    public function get_by_bagian($bagian) {
        return $this->db->get_where('tb_beranda', array('bagian'=>$bagian))->row();
    }
    public function update($bagian, $data) {
        return $this->db->where('bagian', $bagian)->update('tb_beranda', $data);
    }
    public function insert($data) {
        return $this->db->insert('tb_beranda', $data);
    }
    public function get_hero() {
        return $this->db->get_where('tb_beranda', array('bagian'=>'hero'))->row();
    }
    public function get_why_cards() {
        return $this->db->like('bagian','why_','after')->order_by('urutan','ASC')->get('tb_beranda')->result();
    }
    public function get_message() {
        return $this->db->get_where('tb_beranda', array('bagian'=>'message'))->row();
    }
}
