<?php

class Admin extends CI_Controller
{

    public function index()
    {

        // Ambil data dari database atau sumber data lainnya

        // $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'title' => 'Dashboard',
            'content' => 'dashboard/dashboard',
            'user' => $user
        ];

        $this->load->view('admin/index', $data);
    }

    public function page_users()
    {

        // Ambil data dari database atau sumber data lainnya

        // $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'title' => 'Dashboard',
            'content' => 'page/index',
            // 'user' => $user
        ];

        $this->load->view('admin-index', $data);
    }

}
