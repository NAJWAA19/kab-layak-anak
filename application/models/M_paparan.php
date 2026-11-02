<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paparan extends CI_Model {
    public function get_all() { $this->db->order_by('tanggal','DESC')->order_by('id','DESC'); return $this->db->get('tb_paparan')->result(); }
    public function count_all() { return $this->db->count_all('tb_paparan'); }
    public function get($id) { return $this->db->get_where('tb_paparan', array('id'=>$id))->row(); }
    public function insert($data) { $this->db->insert('tb_paparan',$data); return $this->db->insert_id(); }
    public function update($id,$data) { return $this->db->where('id',$id)->update('tb_paparan',$data); }
    public function delete($id) { return $this->db->where('id',$id)->delete('tb_paparan'); }
}
