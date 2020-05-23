<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        redirect('main/link_submission');
    }

    public function link_submission(){
      $data = [
        "content" => "pages/link_submission",
        "module" => "link_submission",
        "page" => "Link Submission"
      ];
      $this->load->view('layout/template',$data);
    }
      
    public function link_list(){
      $data = [
        "content" => "pages/link_list",
        "module" => "link_list",
        "page" => "All Links"
      ];
      $this->load->view('layout/template',$data);
    }

}
