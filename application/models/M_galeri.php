<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {
    public function get_all() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tb_galeri')->result();
    }
    public function get_by_album($album_id) {
        $this->db->where('album_id',$album_id);
        $this->db->order_by('id','DESC');
        return $this->db->get('tb_galeri')->result();
    }
    public function get_orphan() {
        $this->db->where('album_id IS NULL', NULL, FALSE);
        $this->db->order_by('id','DESC');
        return $this->db->get('tb_galeri')->result();
    }
    public function count_all() { return $this->db->count_all('tb_galeri'); }
    public function get($id) { return $this->db->get_where('tb_galeri', array('id'=>$id))->row(); }
    public function insert($data) { $this->db->insert('tb_galeri',$data); return $this->db->insert_id(); }
    public function update($id,$data) { return $this->db->where('id',$id)->update('tb_galeri',$data); }
    public function delete($id) { $this->db->where('id',$id)->delete('tb_galeri'); }
}
