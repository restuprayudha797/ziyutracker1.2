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


    public function turnOff()
    {
        $data = $this->input->get('data');

        $this->db->set('state', 0);
        $update = $this->db->update('ledstatus_' . $data);

        if ($update) {

            $this->session->set_flashdata('saklar_message', '<script>Swal.fire({
                icon: "success",
                title: "Saklar berhasil nonaktifkan",
                showConfirmButton: false,
                timer: 2000
              });</script>');
              redirect('saklar?data=' . $data);
        }
    }

    public function turnOn()
    {
        $data = $this->input->get('data');

        $this->db->set('state', 1);
        $update = $this->db->update('ledstatus_' . $data);

        if ($update) {

            $this->session->set_flashdata('saklar_message', '<script>Swal.fire({
                icon: "success",
                title: "Saklar berhasil diaktifkan",
                showConfirmButton: false,
                timer: 2000
              });</script>');
              redirect('saklar?data=' . $data);
        }
    }
}
