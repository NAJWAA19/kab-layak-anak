<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {
    public function get() {
        $row = $this->db->get_where('tb_profil', array('id' => 1))->row();
        if (!$row) return NULL;
        $row->tujuan = $this->get_tujuan();
        return $row;
    }

    public function get_tujuan() {
        $this->db->order_by('urutan', 'ASC');
        $this->db->order_by('id', 'ASC');
        return $this->db->get('tb_profil_tujuan')->result();
    }

    public function update($data) {
        return $this->db->where('id', 1)->update('tb_profil', $data);
    }

    public function ensure_exists() {
        $exists = $this->db->get_where('tb_profil', array('id' => 1))->row();
        if (!$exists) {
            $this->db->insert('tb_profil', array(
                'id' => 1,
                'tentang_label' => 'TENTANG LAYAK ANAK',
                'tentang_judul' => 'Mewujudkan Lingkungan yang Aman dan Ramah bagi Anak',
                'tentang_deskripsi' => '',
                'visi_label' => 'VISI & MISI',
                'visi_judul' => 'Visi & Misi Layak Anak',
                'visi' => '',
                'misi' => '',
                'tujuan_label' => 'TUJUAN',
                'tujuan_judul' => 'Tujuan Layak Anak',
                'tujuan_deskripsi' => '',
            ));
        }
    }

    public function replace_tujuan($items) {
        $this->db->empty_table('tb_profil_tujuan');
        $urutan = 1;
        foreach ((array) $items as $it) {
            $judul = trim(isset($it['judul']) ? $it['judul'] : '');
            $deskripsi = trim(isset($it['deskripsi']) ? $it['deskripsi'] : '');
            if ($judul === '' && $deskripsi === '') continue;
            $this->db->insert('tb_profil_tujuan', array(
                'nomor' => sprintf('%02d', $urutan),
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'urutan' => $urutan++,
            ));
        }
    }
}
