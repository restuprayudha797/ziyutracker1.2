<?php

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        if ($is_active != 5) {
            check_login($is_active);
        } else {


            $this->load->model('Admin_model', 'adm');
        }
    }

    public function index()
    {

        // Ambil data dari database atau sumber data lainnya

        $payment = $this->adm->getAllPaymentData();

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'title' => 'Pembayaran',
            'page' => 'k_payment',
            'user' => $user,
            'payment' => $payment
        ];

        $this->load->view('admin-index', $data);
    }
}