<?php


class Saklar extends CI_Controller
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

        $id_devices_active = $this->input->get('data');

        if ($id_devices_active != null) {
            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $userActive = $this->db->get_where('devices_active', ['email' => $user['email']])->row_array();
            $marker  = $this->db->query("SELECT * FROM `marker_" . $id_devices_active . "` ORDER BY id_marker DESC LIMIT 1;")->row_array();

            $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $userActive = $this->db->get_where('user_active', ['email' => $user['email']])->row_array();
            $ledStatus  = $this->db->get('ledStatus_' . $userActive['id_active'])->result_array();


            $data = [
                'title' => 'Location',
                'page' => 'saklar',
                'user' => $user,
                'marker' => $marker
            ];

            $this->load->view('user-index', $data);
        } else {
        }
    }

    // public function updateLokasi()
    // {
    //     $data = $this->input->post('data');

    //     $marker  = $this->db->query("SELECT * FROM `marker_" . $data . "` ORDER BY id_marker DESC LIMIT 1;")->row_array();

    //     header('Content-Type: application/json');
    //     echo json_encode($marker);
    // }
}
