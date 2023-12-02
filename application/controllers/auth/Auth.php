<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    // ================ start  __construct ================

    public function __construct()
    {
        parent::__construct();
        //  call Auth_model


        if ($this->session->userdata('email')) {

            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $is_active = $user['is_active'];
            // load helper c_login

            if ($is_active == 1) {

                $this->session->unset_userdata('email');

                $this->session->set_flashdata('auth_message', '<div class="alert alert-danger text-center" role="alert">Anda belum melakukan aktifasi, silahkan check email dan lakukan aktifasi !</div>');
                redirect('login');
            } else {
                check_login($is_active);
            }
        }

        $this->load->model('Auth_model', 'am');
    }

    // ================ end  __construct ================


    // ================ start method index ================

    public function index()
    {


        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

        if ($this->form_validation->run() == FALSE) {


            $data['title'] = 'Masuk';

            $this->load->view('frontend/layout/frontend-header', $data);
            $this->load->view('frontend/layout/frontend-navbar');
            $this->load->view('auth/index-auth');
            $this->load->view('frontend/layout/frontend-footer');
        } else {

            $this->am->login();
        }
    }

    // ================ end method index ================

    // ================ start method register ================
    public function register()
    {

        $data['title'] = 'Pendaftaran';


        $this->form_validation->set_rules('name', 'Nama', 'required', [
            'required' => 'kolom nama harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email yang anda gunakan sudah terdaftar, silahkan whatsapp admin dengan cara klik <a href="">disini</a> jika terjadi kesalahan',
            'valid_email' => 'yang anda masukkan bukan email, silahkan masukkan alamat email yang benar',
            'required' => 'kolom Email harus diisi',
            'is_unique' => 'Email yang anda gunakan sudah terdaftar'
        ]);
        $this->form_validation->set_rules('contact', 'Kontak', 'required|min_length[12]|max_length[13]|numeric', [
            'numeric' => 'Yang anda masukkan bukan nomor telepon',
            'min_length' => 'Panjang nomor telepon minimal 12 angka',
            'required' => 'nomor telepon harus diisi',
            'max_length' => 'panjang nomor maksimal 13 angka',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', [

            'required' => 'Password harus diisi',
            'min_length' => 'Panjang password minimal 8 karakter'

        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password]', [

            'required' => 'Konfirmasi password harus diisi',
            'matches' => 'Konfirmasi password tidak sesuai',
            'matches' => 'Konfirmasi password tidak sesuai',


        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('frontend/layout/frontend-header', $data);
            $this->load->view('frontend/layout/frontend-navbar');
            $this->load->view('auth/register');
            $this->load->view('frontend/layout/frontend-footer');
        } else {

            $this->am->register();
        }
    }

    // ================ end method register ================


    // ===== START VERIFY EMAIL ACCOUNT =====

    public function verify()
    {

        $email = $_GET['email'];
        $token = $_GET['token'];

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {

            $users_token = $this->db->get_where('activation_token', ['token' => $token])->row_array();


            if ($users_token) {

                if (time() - $users_token['date_created'] <= (60 * 60 * 24)) {


                    $this->db->set('is_active', 2);
                    $this->db->where('email', $email);
                    $this->db->update('users');
                    $this->db->delete('activation_token', ['email' => $email]);

                    $this->session->set_flashdata('auth_message', '<div class="alert alert-success" role="alert"> Akun anda sudah aktif, Silah Login  </div>');
                    redirect('auth');
                } else {


                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('activation_token', ['email' => $email]);

                    $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert"> Akun gagal diaktifkan karena Akun telah kadaluarsa silahkan Mendaftar kembali  </div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert"> Akun gagal diaktifkan, token aktifasi tidak sesuai  </div>');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert"> Akun gagal diaktifkan, email tidak sesuai  </div>');
            redirect('auth');
        }
    }
    // ===== END VERIFY EMAIL ACOUNT =====

}
