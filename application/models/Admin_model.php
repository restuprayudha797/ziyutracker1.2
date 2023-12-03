<?php




class Admin_model extends CI_Model
{

    private $PAYMENT = 'payment';
    private $DEVICE_ACTIVE = 'devices_active';
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
        }
    }

    private function _updateRole($id, $message, $role_payment)
    {

        // $this->db->set('is_active', 3)->where('email', $deviceactive['email'])->update($this->USER);


        $update =   $this->db->set('role_payment', $role_payment)->where('id_payment', $id)->update($this->PAYMENT);

        if ($update && $role_payment == 2) {
            $paymentData = $this->db->get_where($this->PAYMENT, ['id_payment' => $id])->row_array();
            $deviceactive = $this->db->get_where($this->DEVICE_ACTIVE, ['email' => $paymentData['email']])->row_array();

            // var_dump(!$deviceactive);
            // die;
            
            if (!$deviceactive) {

                $data = [
                    'email' => $paymentData['email'],
                    'device_name' => 'Utama',
                    'is_active' => 1

                ];
                $insert = $this->db->insert($this->DEVICE_ACTIVE, $data);

                if ($insert) {
                    $this->createTableForUser($paymentData['email']);
                } else {
                    echo 'data gagal ditambahkan, silahkan hubungi developer untuk memperbaiki masalah ini';
                }
            } else {

                $data = [
                    'email' => $paymentData['email'],
                    'device_name' => 'NewDevice',
                    'is_active' => 1
                ];

                $this->db->insert($this->DEVICE_ACTIVE, $data);
            }
        }

        echo "table marker gagal dibuat silahkan hubungi developer untuk menyelesaikan masalah ini";
        die;
        $this->session->set_flashdata('auth_message', '<script>Swal.fire({
            icon: "success",
            title: "Pembayaran Berhasil Di Konfirmasi",
            showConfirmButton: false,
            timer: 2000
          });</script>');

        redirect('pembayaran');


    }
    private function createTableForUser($email)
    {
        $this->load->dbforge();


        $deviceActive = $this->db->get_where($this->DEVICE_ACTIVE, ['email' => $email])->row_array();

        $markerName = $deviceActive['id_active'];

        // add new table for user tracking
        $tbMarker = [
            'id_marker' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
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
            $ledStatusName = $deviceActive['id_active'];
            // add new table for user power
            $ledStatus = [
                'id_ledstatus_' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100'
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
            $this->dbforge->add_key('id_ledstatus_', TRUE);

            $this->dbforge->add_field($ledStatus);
            $ledStatusCreate = $this->dbforge->create_table('ledstatus_' . $ledStatusName);

            if ($ledStatusCreate) {

                $data1 = [
                    'color' => 'blue',
                    'state' => '1'
                ];
                $setdata1 = $this->db->insert('ledstatus_' . $ledStatusName, $data1);

                if ($setdata1) {
                    $data2 = [
                        'color' => 'red',
                        'state' => '1'
                    ];
                    $setdata2 = $this->db->insert('ledstatus_' . $ledStatusName, $data2);

                    if ($setdata2) {

                        $data3 = [
                            'color' => 'green',
                            'state' => '1'
                        ];
                        $setdata3 = $this->db->insert('ledstatus_' . $ledStatusName, $data3);

                        if ($setdata3) {
                            $update =   $this->db->set('is_active', 3)->where('email', $deviceActive['email'])->update($this->USER);
                        }
                    }
                }
            } else {

                $this->dbforge->drop_table('marker_' . $markerName);

                $this->db->where('id_active',$deviceActive['id_active']);
                $this->db->delete($this->DEVICE_ACTIVE);

                $this->session->set_flashdata('auth_message', '<script>Swal.fire({
                    icon: "error",
                    title: "table marker gagal dibuat silahkan hubungi developer untuk menyelesaikan masalah ini",
                    showConfirmButton: True
                  });</script>');
                
            }
        } else {

            $this->db->where('id_active',$deviceActive['id_active']);
                $this->db->delete($this->DEVICE_ACTIVE);

                $this->session->set_flashdata('auth_message', '<script>Swal.fire({
                    icon: "error",
                    title: "table marker gagal dibuat silahkan hubungi developer untuk menyelesaikan masalah ini",
                    showConfirmButton: True
                  });</script>');
        }
    }
}
