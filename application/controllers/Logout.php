<?php


class Logout extends CI_Controller
{

    public function index()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('auth_message', '<div class="alert alert-success text-center" role="alert">Berhasil Keluar</div>');
        redirect('login');
    }
}
