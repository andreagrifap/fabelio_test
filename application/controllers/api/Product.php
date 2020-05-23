<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $data = [
          "content" => "pages/link_list",
          "module" => "link_list"
        ];
        $this->load->view('layout/template',$data);
    }

    public function link_submission()
    {
        $data = [
          "content" => "pages/link_list",
          "module" => "link_list"
        ];
        $this->load->view('layout/template',$data);
    }
      
    public function link_list(){
        
    }
    
}
