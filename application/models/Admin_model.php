<?php




class Admin_model extends CI_Model
{

    private $PAYMENT = 'payment';
    private $USER_ACTIVE = 'user_active';
    private $USER = 'users';


    public function getAllPaymentData()
    {

        return $this->db->query("SELECT * FROM payment, users WHERE payment.email = users.email")->result_array();
    }

    public function getAllUsersData()
    {

        return $this->db->order_by('date_created', 'DESC')->get('users')->result_array();
    }

    public function getUsersAktif()
    {

        return $this->db->where_in('is_active', [3, 4])->get('users')->result_array();
    }
    public function getAdminAktif()
    {

        return $this->db->where_in('is_active', [5, 6])->get('users')->result_array();
    }

    public function Prosess_Data($states, $id)
    {

        if ($states == 'done') {

            $this->_updateRole($id, "pembayaran berhasil dikonfirmasi", 2);
        } elseif ($states == 'cancel') {

            $this->_updateRole($id, 'pembayaran berhasil dibatalkan', 3);
        } elseif ($states == 'doneCod') {
            $this->_updateRole($id, 'COD berhasil dikonfirmasi', 5);
        } elseif ($states == 'cancelCod') {
            $this->_updateRole($id, 'COD berhasil dibatalkan', 6);
        }
    }

    private function _updateRole($id, $message, $role_payment)
    {

        $update =   $this->db->set('role_payment', $role_payment)->where('id_payment', $id)->update($this->PAYMENT);

        if ($update) {
            $paymentData = $this->db->get_where($this->PAYMENT, ['id_payment' => $id])->row_array();
            $userActive = $this->db->get_where($this->USER_ACTIVE, ['email' => $paymentData['email']])->row_array();

            if (!$userActive) {

                if ($paymentData['package'] == 4 || $paymentData['package'] == 3) {
                    $time = time() + 60 * 60 * 24 * 360;
                } elseif ($paymentData['package'] == 2) {
                    $time = time() + 60 * 60 * 24 * 30;
                } elseif ($paymentData['package'] == 1) {
                    $time = time() + 60 * 60 * 24 * 7;
                }

                $noSeri = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

                $data = [
                    'email' => $paymentData['email'],
                    'time_out' => $time

                ];
                $insert = $this->db->insert($this->USER_ACTIVE, $data);

                if ($insert) {
                    $this->createTableForUser($paymentData['email']);
                } else {
                    echo 'data gagal ditambahkan, silahkan hubungi developer untuk memperbaiki masalah ini';
                }
            } else {

                if ($paymentData['package'] == 3) {
                    $time = time() + 60 * 60 * 24 * 360;
                } elseif ($paymentData['package'] == 2) {
                    $time = time() + 60 * 60 * 24 * 30;
                } elseif ($paymentData['package'] == 1) {
                    $time = time() + 60 * 60 * 24 * 7;
                }
                $data = [
                    'time_out' => $time
                ];



                $this->db->where('email', $paymentData['email']);
                $this->db->update($this->USER_ACTIVE, $data);
            }
        }


        $this->session->set_flashdata('admin_message', ' <div class="alert alert-success" id="notification" role="alert">
             Data ' . $message . '!
            </div>');

        redirect('admin/payment');
    }
    private function createTableForUser($email)
    {
        $this->load->dbforge();


        $userActive = $this->db->get_where($this->USER_ACTIVE, ['email' => $email])->row_array();

        $markerName = $userActive['id_active'];

        // add new table for user tracking
        $tbMarker = [
            'id_marker' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'lat' => [
                'type' => 'VARCHAR',
                'constraint' => '128'

            ],
            'lng' => [
                'type' => 'VARCHAR',
                'constraint' => '128'

            ],
            'spd' => [
                'type' => 'VARCHAR',
                'constraint' => '128'


            ],
            'datetime' => [
                'type' => 'DATETIME'

            ]
        ];
        $this->dbforge->add_key('id_marker', TRUE);
        $this->dbforge->add_field($tbMarker);
        $markerCreate = $this->dbforge->create_table('marker_' . $markerName);
        // end add table tracking

        if ($markerCreate) {
            $ledStatusName = $userActive['id_active'];
            // add new table for user power
            $ledStatus = [
                'id_ledStatus_' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ],
                'color' => [
                    'type' => 'VARCHAR',
                    'constraint' => '20'

                ],
                'state' => [
                    'type' => 'INT',
                    'constraint' => '1'

                ]
            ];
            $this->dbforge->add_key('id_ledStatus_', TRUE);

            $this->dbforge->add_field($ledStatus);
            $ledStatusCreate = $this->dbforge->create_table('ledStatus_' . $ledStatusName);

            if ($ledStatusCreate) {

                $data1 = [
                    'color' => 'blue',
                    'state' => '1'
                ];
                $setdata1 = $this->db->insert('ledStatus_' . $ledStatusName, $data1);

                if ($setdata1) {
                    $data2 = [
                        'color' => 'red',
                        'state' => '1'
                    ];
                    $setdata2 = $this->db->insert('ledStatus_' . $ledStatusName, $data2);

                    if ($setdata2) {

                        $data3 = [
                            'color' => 'green',
                            'state' => '1'
                        ];
                        $setdata3 = $this->db->insert('ledStatus_' . $ledStatusName, $data3);

                        if ($setdata3) {
                            $update =   $this->db->set('is_active', 3)->where('email', $userActive['email'])->update($this->USER);
                        }
                    }
                }
            } else {

                die;
                echo "table marker gagal dibuat silahkan hubungi developer untuk menyelesaikan masalah ini";
            }
        } else {
            die;
            echo "table marker gagal dibuat silahkan hubungi developer untuk menyelesaikan masalah ini";
        }
    }
}
