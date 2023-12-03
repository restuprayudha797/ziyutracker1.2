<?php 


class Dasbor extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        if ($is_active != 3) {
            check_login($is_active);
        } else {


            $this->load->model('Admin_model', 'adm');

        }
    }

    public function index(){

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'title' => 'Dashboard',
            'page' => 'dasbor',
            'user'=> $user
        ];
        $this->load->view('user-index', $data);
      
    }

}
