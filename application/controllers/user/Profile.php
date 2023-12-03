<?php


class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $is_active = $user['is_active'];

        // load helper clogin jika is_active tidak = 2

        if ($is_active != 3) {
            check_login($is_active);
        } else {
        }
    }

    public function index()
    {


        $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();




        $data = [
            'title' => 'Location',
            'page' => 'profile',
            'user' => $user,
        ];

        $this->load->view('user-index', $data);
    }

    public function updateProfile($id)
    {


        $device_name = $this->input->post('devices_name');

       $update = $this->db->set('device_name', $device_name)->where('id_active', $id)->update('devices_active');

        if ($update) {

            $this->session->set_flashdata('profile_message', '<script>Swal.fire({
                icon: "success",
                title: "Nama Perangkat Berhasil Diubah",
                showConfirmButton: false,
                timer: 2000
              });</script>');

            redirect('profile');
        }
    }
    
}
