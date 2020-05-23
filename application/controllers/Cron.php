<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function index()
    {
        redirect('main');
    }

    public function getPriceScrape(){

        $url = $this->m_global->get("product_link",['status'=>1]);
        
        foreach($url as $item){
            $price = 0;
            //Getting contents from valid url
            $html = file_get_contents($item->url);
            
            $getDom = new DOMDocument();
            libxml_use_internal_errors(TRUE);
            $getDom->loadHTML($html);
            libxml_clear_errors();
            $domXpath = new DOMXPath($getDom);
            $dataDom = $domXpath->query('//div[contains(@class,"product-info-main")]');
            
            //Get item name and price
            foreach($getDom->getElementsByTagName('meta') as $nmeta){
                if($nmeta->getAttribute('property')=="product:price:amount"){
                    $price = round($nmeta->getAttribute('content'));
                }
            }
    
            //Insert Price Data
            $today = date("Y-m-d H:i:s");
            $dataPrice = [
                "price" => $price,
                "product_id" => $item->id,
                "created_at" => $today,
                "updated_at" => $today
            ];
            $this->m_global->store("product_price_history",$dataPrice);
        }

    }

}
