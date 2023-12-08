<?php

class Handle_data_pembayaran extends CI_Model
{

  private $PAYMENT = 'payment';
  private $DEVICE_ACTIVE = 'devices_active';
  private $USER = 'users';


  public function prosesDataPembayaran($states, $id)
  {

    if ($states == 'done') {

      // fungsi konfirmasi pembayaran
      $updateRole = $this->_updateRolePayment($id, 2);

      if ($updateRole) {
        // jika update role pembayaran berhasil lakukan pengupdatan is_active pada user jika user sebelumnya belum aktif
        $cekUserAktivation = $this->db->query('SELECT users.is_active, users.email FROM payment, users WHERE payment.email = users.email AND payment.id_payment = ' . $id)->row_array();

        if ($cekUserAktivation['is_active'] != 3 && $cekUserAktivation['is_active'] != 5) {
          // jika user active = 3 / 5 maka update user active menjadi 3

          $updateUserActive = $this->_updateUserActive($cekUserAktivation['email'], 3);

          if ($updateUserActive) {
            // jika update user berhasil maka tambahkan data baru untuk devices active
            // cek apakah user apakah sebelumnya pernah memiliki devices
            $cekDevicesName = $this->db->get_where($this->DEVICE_ACTIVE, ['email' => $cekUserAktivation['email']])->row_array();

            if ($cekDevicesName) {

              $devices_name = 'Main';
            } else {

              $devices_name = "New Devices";
            }

            $addNewDevicesData = $this->_addNewDevicesData($cekUserAktivation['email'], $devices_name);

            if ($addNewDevicesData) {
              // jika berhasil menambahkan data device baru maka buat table marker dan ledstatus


              $getLatestDevicesActive = $this->db->query("SELECT id_active FROM devices_active WHERE email = '" . $cekUserAktivation['email'] . "' ORDER BY id_active DESC LIMIT 1")->row_array();

              $addNewMarker = $this->_addNewMarker($getLatestDevicesActive['id_active']);

              if ($addNewDevicesData) {
                // jika tambah table marker berhasil maka tambah table ledstatus baru

                $addNewLedStatus = $this->_addNewLedStatus($getLatestDevicesActive['id_active']);

                if ($addNewLedStatus) {

                  $addDataLedStatus1 = $this->_addNewLedStatusData($getLatestDevicesActive['id_active'], 'blue');

                  if ($addDataLedStatus1) {
                    $addDataLedStatus2 = $this->_addNewLedStatusData($getLatestDevicesActive['id_active'], 'red');

                    if ($addDataLedStatus2) {
                      $addDataLedStatus3 = $this->_addNewLedStatusData($getLatestDevicesActive['id_active'], 'green');
                      if ($addDataLedStatus3) {

                        $this->session->set_flashdata('user_message', '<script>
                        Swal.fire({
                          title: "SELAMAT!",
                          text: "Data pembayaran berhasil dikonfirmasi dan perangkat baru sudah diaktifkan!",
                          icon: "success"
                        });
                      </script>');
                        redirect("pembayaran");
                      } else {
                        echo 'data ledstatus 3 gagal di tambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
                      }
                    } else {
                      echo 'data ledstatus 2 gagal di tambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
                    }
                  } else {
                    echo 'data ledstatus 1 gagal di tambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
                  }
                } else {
                  echo 'ledstatus baru gagal ditambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
                }
              } else {

                echo 'marker baru gagal ditambahkan silahkan hubungi admin untuk menyelesaikan masalah ini!';
              }
            } else {
              // jika gagal menambahkan data device baru maka set pembayaran role pembayaran jadi 1, dan useractive menjadi 2 data diveice belu dimiliki
              echo 'devices gagal  ditambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
            }
          } else {
            echo 'Maaf update user active gagal, silahkan hubungi admin untuk menyelesaikan masalah ini!';
          }
        } else {
          // jika user active tidak = 3 / 5 maka tambahkan data baru untuk devices active
          $addNewDevicesData = $this->_addNewDevicesData($cekUserAktivation['email'], 'Utama');

          if ($addNewDevicesData) {
            // jika berhasil menambahkan data device baru maka buat table marker dan ledstatus


            $getLatestDevicesActive = $this->db->query("SELECT id_active FROM devices_active WHERE email = '" . $cekUserAktivation['email'] . "' ORDER BY id_active DESC LIMIT 1")->row_array();

            $addNewMarker = $this->_addNewMarker($getLatestDevicesActive['id_active']);

            if ($addNewDevicesData) {
              // jika tambah table marker berhasil maka tambah table ledstatus baru

              $addNewLedStatus = $this->_addNewLedStatus($getLatestDevicesActive['id_active']);

              if ($addNewLedStatus) {

                $addDataLedStatus1 = $this->_addNewLedStatusData($getLatestDevicesActive['id_active'], 'blue');

                if ($addDataLedStatus1) {
                  $addDataLedStatus2 = $this->_addNewLedStatusData($getLatestDevicesActive['id_active'], 'red');

                  if ($addDataLedStatus2) {
                    $addDataLedStatus3 = $this->_addNewLedStatusData($getLatestDevicesActive['id_active'], 'green');
                    if ($addDataLedStatus3) {

                      $this->session->set_flashdata('user_message', '<script>
                      Swal.fire({
                        title: "SELAMAT!",
                        text: "Data pembayaran berhasil dikonfirmasi dan perangkat baru sudah diaktifkan!",
                        icon: "success"
                      });
                    </script>');
                      redirect("pembayaran");
                    } else {
                      echo 'data ledstatus 3 gagal di tambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
                    }
                  } else {
                    echo 'data ledstatus 2 gagal di tambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
                  }
                } else {
                  echo 'data ledstatus 1 gagal di tambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
                }
              } else {
                echo 'ledstatus baru gagal ditambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
              }
            } else {

              echo 'marker baru gagal ditambahkan silahkan hubungi admin untuk menyelesaikan masalah ini!';
            }
          } else {
            // jika gagal menambahkan data device baru maka set pembayaran role pembayaran jadi 1, dan useractive menjadi 2 data diveice belu dimiliki
            echo 'devices gagal  ditambahkan, silahkan hubungi admin untuk menyelesaikan masalah ini!';
          }
        }
      } else {
        echo 'Maaf update role payment gagal, silahkan hubungi admin untuk menyelesaikan masalah ini!';
      }
    } elseif ($states == 'cancel') {

      $updateRole = $this->_updateRolePayment($id, 3);

      if ($updateRole) {
        $this->session->set_flashdata('user_message', '<script>
        Swal.fire({
          title: "SELAMAT!",
          text: "Data pembayaran berhasil ditolak!",
          icon: "success"
        });
      </script>');
        redirect("pembayaran");
      }
    } else {
      echo 'data pembayaran gagal ditolak, silahkan hubungi admin untuk menyelesaikan masalah ini!';
    }
  }

  public function _addNewLedStatusData($id, $color)
  {
    $dataLedStatus = [
      'color' => $color,
      'state' => '1'
    ];
    $setLedStatus = $this->db->insert('ledstatus_' . $id, $dataLedStatus);
    if ($setLedStatus) {
      return true;
    } else {
      return false;
    }
  }
  public function _addNewLedStatus($id)
  {
    $this->load->dbforge();
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
    $ledStatusCreate = $this->dbforge->create_table('ledstatus_' . $id);
    if ($ledStatusCreate) {
      return true;
    } else {
      return false;
    }
  }

  private function _addNewMarker($id)
  {
    $this->load->dbforge();
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
    $markerCreate = $this->dbforge->create_table('marker_' . $id);

    if ($markerCreate) {
      return true;
    } else {
      return false;
    }
  }



  private function _addNewDevicesData($email, $devices_name)
  {
    $dataDevicesActive = [
      'email' => $email,
      'device_name' => $devices_name,
      'is_active' => 1

    ];
    $insert = $this->db->insert($this->DEVICE_ACTIVE, $dataDevicesActive);
    if ($insert) {
      return true;
    } else {
      return false;
    }
  }

  private function _updateUserActive($email, $is_active)
  {
    // update role pembayaran / paymenr]
    $update =   $this->db->set('is_active', $is_active)->where('email', $email)->update($this->USER);

    if ($update) {
      return true;
    } else {
      return false;
    }
  }
  private function _updateRolePayment($id, $role_payment)
  {
    // update role pembayaran / paymenr]
    $update =   $this->db->set('role_payment', $role_payment)->where('id_payment', $id)->update($this->PAYMENT);

    if ($update) {
      return true;
    } else {
      return false;
    }
  }
}
