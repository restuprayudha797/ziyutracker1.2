<?php


class Auth_model extends CI_Model
{

    private $USERS = 'users';
    private $TOKEN = 'activation_token';

    public function login()
    {

        // get data from login form
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        // get user data where email input login form
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        // Check if the email entered by the user is in the database
        if ($user) {

            // if the user is registered in the database, check whether the password entered by the user matches the data in the database

            if (password_verify($password, $user['password'])) {


                if ($user['is_active'] == 1) {
                    // sudah mendaftar tapi belum melakukan aktifasi
                    $this->session->set_flashdata('auth_message', '<div class="alert alert-danger text-center" role="alert">Anda belum melakukan aktifasi, silahkan check email dan lakukan aktifasi !</div>');
                    redirect('login');
                } elseif ($user['is_active'] == 2) {
                    // sudah mendaftar dan sudah melakukan aktifasi, tetapi belum melakukan pembayaran
                    $this->_set_session($user['email']);
                    redirect('informasi-pembayaran');
                } elseif ($user['is_active'] == 3) {
                    // sudah mendaftar, aktifasi, dan sudah melakukan pembayaran (aktif)
                    $this->_set_session($user['email']);
                    redirect('dasbor');
                } elseif ($user['is_active'] == 4) {
                    // user dinonaktifkan / dibekukan dan tidak dapat mengakses fitur ziyutrack
                    echo 'aman bisa masuk dashboard user';
                } elseif ($user['is_active'] == 5) {
                    $this->_set_session($user['email']);
                    redirect('data-user');
                } elseif ($user['is_active'] == 6) {
                    // admin aktif
                    $this->_set_session($user['email']);
                    redirect('admin');
                } elseif ($user['is_active' == 7]) {

                    // admin nonaktif

                } else {

                    $this->session->set_flashdata('auth_message', '<div class="alert alert-danger text-center" role="alert">Akun anda sedang bermasalah silahkan hubungi admin untuk menyelesaikan masalah ini!</div>');

                    redirect('login');
                }
            } else {

                $this->session->set_flashdata('auth_message', '<div class="alert alert-danger text-center" role="alert">Password yang anda masukkan tidak sesuai!   </div>');
                redirect('login');
            }
        } else {
            // notify the user the email entered does not exist

            // notify user
            $this->session->set_flashdata('auth_message', '<div class="alert alert-danger text-center" role="alert">Email tidak terdaftar</div>');
            redirect('login');
        }
    }

    public function register()
    {
        // inisialisasi data

        $email = $this->input->post('email', true);
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $name = $this->input->post('name', true);
        $phone = $this->input->post('contact', true);


        $data = [
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'phone' => $phone,
            'alamat' => '-',
            'profile' => 'default.jpg',
            'is_active' => 1,
            'date_created' => time()
        ];

        $token = password_hash('token', PASSWORD_DEFAULT);

        $data_activationToken = [
            'email' => $email,
            'token' => $token,
            'date_created' => time(),

        ];

        $insert = $this->db->insert($this->USERS, $data);

        if ($insert) {
            $this->db->insert($this->TOKEN, $data_activationToken);

            $this->_sendMail($email, 'verify', $token);
        }
    }

    private function _sendMail($email, $type, $token)
    {
        $config = [

            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.ziyutechno.com',
            'smtp_user' => 'track@ziyutechno.com',
            'smtp_pass' => 'n^GJPofPu[aW',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];



        $this->load->library('email', $config);

        $this->email->from('track@ziyutechno.com', 'ZIYUTECHNO');
        $this->email->to($email);
        $this->email->subject('VERIFIKASI AKUN');

        if ($type == 'verify') {

            $this->email->message('<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .verification-message {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .verification-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .verification-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .verification-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="verification-message">
            Terima kasih telah mendaftar! Silakan verifikasi alamat email Anda untuk mengaktifkan akun Anda.
        </div>
        <div class="verification-link">
            <a href="' . base_url() . 'verify?email=' . $email . '&token=' . $token . '">Verifikasi Email</a>
        </div>
    </div>
</body>

</html>');

            if ($this->email->send()) {
                $this->session->set_flashdata('auth_message', '<div class="alert alert-success" role="alert"> Akun anda berhasil dibuat silahkan cek email anda secara berkala dan lakukan aktifasi, jika email tidak masuk sampai dengan jangka waktu yang telah ditentukan 10 menit, silahkan klik <a href="https://api.whatsapp.com/send?phone=+6285176929114&text=Aktifasi%20Token%20Tidak%20Masuk">disini</a> untuk menghubungi admin</div>');
                redirect('login');
            } else {
                // echo $this->email->print_debugger();

                $this->db->delete($this->USERS, ['email' => $email]);
                $this->db->delete($this->TOKEN, ['email' => $email]);

                echo '<div class="alert alert-danger" role="alert">Mohon Maaf Sistem saat ini sedang sibuk silahkan hubungi admin dan lakukan registrasi secara manual dengan klik link <a href="https://api.whatsapp.com/send?phone=+6285176929114&text=Saya%20tidak%20Bisa%20Melakukan%20Aktifasi%20email">disini</a><b>Sekali lagi mohon maaf atas ketidak nyamanan nya terimakasih...</b></div>';
            }
        }
    }


    private function _set_session($email)
    {

        $data = [
            'email'   => $email
        ];
        $this->session->set_userdata($data);
    }

    // ===== END LOGIN =====


}
