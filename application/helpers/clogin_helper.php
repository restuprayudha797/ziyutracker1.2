<?php


function check_login($is_active)
{
    $ci = &get_instance();
    $ci->load->database();
    $email = $ci->session->userdata('email');

    if ($email) {

        if ($is_active == 1) {
            redirect('login');
        } elseif ($is_active == 2) {
            redirect('informasi-pembayaran');
        } elseif ($is_active == 3) {
            redirect('dasbor');
        } elseif ($is_active == 4) {
            echo 4;
        } elseif ($is_active == 5) {
           redirect('data-user');
        }elseif ($is_active == 6) {
            // redirect('data-user');'
            // admin tidak aktif
         }
    } else {

        redirect('login');
    }
}
