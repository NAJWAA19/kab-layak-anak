<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_album extends CI_Model {
    public function get_all() {
        $this->db->select('tb_album.*, (SELECT COUNT(*) FROM tb_galeri WHERE tb_galeri.album_id = tb_album.id) as jumlah_foto');
        $this->db->order_by('id','DESC');
        return $this->db->get('tb_album')->result();
    }
    public function count_all() { return $this->db->count_all('tb_album'); }
    public function get($id) {
        $this->db->select('tb_album.*, (SELECT COUNT(*) FROM tb_galeri WHERE tb_galeri.album_id = tb_album.id) as jumlah_foto');
        return $this->db->get_where('tb_album', array('id'=>$id))->row();
    }
    public function insert($data) { $this->db->insert('tb_album',$data); return $this->db->insert_id(); }
    public function update($id,$data) { return $this->db->where('id',$id)->update('tb_album',$data); }
    public function delete($id) {
        $this->db->where('id',$id)->delete('tb_album');
        $this->db->where('album_id',$id)->update('tb_galeri', array('album_id'=>NULL));
    }
    public function get_fotos($album_id) {
        $this->db->order_by('id','DESC');
        return $this->db->get_where('tb_galeri', array('album_id'=>$album_id))->result();
    }
    public function count_fotos($album_id) {
        return $this->db->where('album_id',$album_id)->count_all_results('tb_galeri');
    }
}
