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
          "page" => "All Links",
          "product" => $this->m_product->get(['p.status'=>1])
        ];
        $this->load->view('layout/template',$data);
    }

    public function detail($slug=false){
        if(!$slug){
          $this->session->set_flashdata("error","Product <b>".unSlug($slug)."</b> not found in database");
          redirect('main/link_list');
        }

        $getProduct = $this->m_product->get(['p.slug'=>$slug]);
        if(!$getProduct){
          $this->session->set_flashdata("error","Product <b>".unSlug($slug)."</b> not found in database");
          redirect('main/link_list');
        }

        $imgs = $this->m_global->get("product_img",["product_id"=>$getProduct->row()->id]);
        $priceHistory = $this->m_global->get("product_price_history",["product_id"=>$getProduct->row()->id],['created_at','DESC']);
        $data = [
          "content" => "pages/product_detail",
          "module" => "product_detail",
          "page" => "Product Detail",
          "item" => $getProduct->row(),
          "imgs" => $imgs,
          "priceHistory" => $priceHistory
        ];
        $this->load->view('layout/template',$data);
    }

    public function remove($product_id = null){
        $getProduct = $this->m_global->get("product_link");
        if(!$getProduct){
          $this->session->set_flashdata("error","Remove product failed. Product not found");
          redirect('main/link_list');
        }

        $update['status'] = 0;
        $this->m_global->update("product_link",['id'=>$product_id],$update);

        $this->session->set_flashdata("success","Removing product <b>".$getProduct[0]->name."</b> success");
        redirect('main/link_list');        
    }

}
