<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {
    public function get_all($limit = NULL, $offset = 0) {
        $this->db->order_by('tanggal','DESC')->order_by('id','DESC');
        if ($limit !== NULL) $this->db->limit($limit, $offset);
        return $this->db->get('tb_berita')->result();
    }
    public function count_all() { return $this->db->count_all('tb_berita'); }
    public function get($id) { return $this->db->get_where('tb_berita', array('id'=>$id))->row(); }
    public function insert($data) { $this->db->insert('tb_berita',$data); return $this->db->insert_id(); }
    public function update($id,$data) { return $this->db->where('id',$id)->update('tb_berita',$data); }
    public function delete($id) { return $this->db->where('id',$id)->delete('tb_berita'); }
}
