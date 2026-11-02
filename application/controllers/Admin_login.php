<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
    public function index() {
        if ($this->session->userdata('admin_login') === TRUE) redirect('admin');
        $this->load->view('admin/login', array('title'=>'Login Admin'));
    }
    public function auth() {
        $this->load->model('M_user');
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password');
        $user = $this->M_user->get_by_username($username);
        if ($user && password_verify((string)$password, $user->password)) {
            $this->session->set_userdata(array('admin_login'=>TRUE,'admin_id'=>$user->id,'admin_username'=>$user->username,'admin_nama'=>$user->nama));
            redirect('admin');
            return;
        }
        $this->session->set_flashdata('error','Username atau password salah.');
        redirect('admin-login');
    }
    public function logout() {
        $this->session->unset_userdata(array('admin_login','admin_id','admin_username','admin_nama'));
        $this->session->set_flashdata('success','Berhasil logout.');
        redirect('admin-login');
    }
}
