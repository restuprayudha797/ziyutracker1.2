<?php

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        if ($is_active != 2) {
            check_login($is_active);
        }
    }

    public function index()
    {

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Informasi Pembayaran";
        $data = [
            'title' => 'Pendaftaran',
            'page' => 'auth/payment',
            'user' => $user
        ];

        $this->load->view('home-index', $data);
    }


    public function pay()
    {

        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


        // Cek apakah user ada mengupload gambar
        $proof_of_payment =   $_FILES['proof_of_payment']['name'];

        $proof = 'kosong';

        if ($proof_of_payment) {

            $config['allowed_types'] = 'jpg|png|jpeg|pdf';
            $config['max_size']     = '3024';
            $config['upload_path'] = './assets/proof_of_payment';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('proof_of_payment')) {

                $proof = $this->upload->data('file_name');
            } else {

                echo $this->upload->display_errors();
            }
        }

        // akhir dari pengecekan gambar

        if ($proof == 'kosong') {

             $this->session->set_flashdata('auth_message', '<script>Swal.fire({
                        icon: "error",
                        title: "Maaf🙏...",
                        text: "File yang anda kirim seperti tidak sesuai Pastikan yang anda upload adalah gambar atau file dengan format : (.jpg | .jpeg | .png | .pdf)",
                      });</script>');
                    redirect('informasi-pembayaran');
          
        } else {
            $data = [
                'email' => $user['email'],
                'proof_of_payment' => $proof,
                'payment_date' => time(),
                'role_payment' => 1,
            ];

           $insertPayment = $this->db->insert('payment', $data);

           if($insertPayment){
            $this->session->set_flashdata('auth_message', '<script>Swal.fire({
                icon: "success",
                title: "Bukti pembayaran berhasil dikirim",
                showConfirmButton: false,
                timer: 2000
              });</script>');
            redirect('informasi-pembayaran');
           }else{

            $this->session->set_flashdata('auth_message', '<script>Swal.fire({
                icon: "error",
                title: "Maaf🙏...",
                text: "Maaf sepertinya sistem sedang sibuk silahkan hubungi admin dengan klick link <a href="https://api.whatsapp.com/send?phone=+6285176929114&text=Saya%20tidak%20dapat%20mengirim%20bukti%20pembayaran">ini</a>",
              });</script>');
            redirect('informasi-pembayaran');
           }
           
        }
    }
}
