<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_klaster extends CI_Model {
    public function get_all() { $this->db->order_by('nomor','ASC'); return $this->db->get('tb_klaster')->result(); }
    public function get($id) {
        $klaster = $this->db->get_where('tb_klaster', array('id'=>$id))->row();
        if ($klaster) $klaster->poin = $this->poin($id);
        return $klaster;
    }
    public function poin($klaster_id) {
        return $this->db->order_by('urutan','ASC')->get_where('tb_klaster_poin', array('klaster_id'=>$klaster_id))->result();
    }
    public function insert($data) { $this->db->insert('tb_klaster',$data); return $this->db->insert_id(); }
    public function update($id,$data) { return $this->db->where('id',$id)->update('tb_klaster',$data); }
    public function replace_poin($klaster_id, $poins) {
        $this->db->where('klaster_id',$klaster_id)->delete('tb_klaster_poin');
        $i = 1;
        foreach ((array)$poins as $p) {
            $p = trim($p);
            if ($p === '') continue;
            $this->db->insert('tb_klaster_poin', array('klaster_id'=>$klaster_id,'poin'=>$p,'urutan'=>$i++));
        }
    }
    public function get_kelembagaan() {
        return $this->db->select('google_drive_kelembagaan')->get('tb_klaster')->row();
    }
    public function update_kelembagaan($link) {
        $this->db->update('tb_klaster', array('google_drive_kelembagaan'=>$link), array('1'=>1));
    }
}
