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

           
            $ledstatus =  $this->db->query("SELECT * FROM `ledstatus_" . $id_devices_active . "`")->row_array();
          

            $data = [
                'title' => 'Location',
                'page' => 'saklar',
                'user' => $user,
                'ledStatus' => $ledstatus
            ];

            $this->load->view('user-index', $data);
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
