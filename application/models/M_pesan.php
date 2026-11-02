<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_Model {
    public function get_all() { $this->db->order_by('tanggal','DESC'); return $this->db->get('tb_pesan')->result(); }
    public function count_all() { return $this->db->count_all('tb_pesan'); }
    public function get($id) { return $this->db->get_where('tb_pesan', array('id'=>$id))->row(); }
    public function insert($data) { $this->db->insert('tb_pesan',$data); return $this->db->insert_id(); }
    public function tandai_dibaca($id) {
        return $this->db->where('id',$id)->update('tb_pesan', array('status'=>'Sudah Dibaca','tanggal_dibaca'=>date('Y-m-d H:i:s')));
    }
    public function delete($id) { return $this->db->where('id',$id)->delete('tb_pesan'); }
    public function hitung_belum_dibaca() { return $this->db->where('status','Belum Dibaca')->count_all_results('tb_pesan'); }
}
