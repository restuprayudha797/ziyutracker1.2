<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        // $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        // if ($is_active != 6) {
        //     check_login($is_active);
        // } else {


            $this->load->model('Admin_model', 'adm');
        // }
    }

    public function index()
    {

        // Ambil data dari database atau sumber data lainnya

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'title' => 'Dashboard',
            'content' => 'page/index',
            'user' => $user
        ];

        $this->load->view('admin/index', $data);
    }

    public function page_users()
    {

        // Ambil data dari database atau sumber data lainnya

        $users = $this->adm->getAllUsersData();

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'title' => 'Users',
            'content' => 'page/users',
            'user' => $user,
            'users' => $users
        ];

        $this->load->view('admin-index', $data);
    }

}
