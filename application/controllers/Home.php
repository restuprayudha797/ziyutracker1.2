<?php 

class Home extends CI_Controller{


    public function index(){

        $data = [
            'title' => 'Beranda',
            'page' => 'index-home'

        ];
        
        $this->load->view('home-index', $data);
    }


}



?>
