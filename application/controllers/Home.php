<?php 

class Home extends CI_Controller{


    public function index(){

        $data['title'] = 'home';
        $this->load->view('home-index', $data);
    }


}



?>
