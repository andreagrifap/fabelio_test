<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Product extends CI_Controller {

    public function index()
    {
        $data = [
            "status" => "Rejected",
            "message" => "Access is not allowed"
        ];

        echo json_encode($data);
    }

    public function submit_link(){
        //Check if URL input is not null
        if(empty($this->input->post('url'))){
            echo json_encode(["status"=>"failed","message"=>"Product page url input can not be empty"]);
            die();
        }

        $url = $this->input->post('url');

        //Validate url
        $this->load->helper('web_scrape');
        $webScrape = new WebScrape();
        $validate = $webScrape->validateUrl($url);
        

        //Set csrf token for valid form but rejected input value
        $validate['tokenName'] = $this->security->get_csrf_token_name();
        $validate['tokenHash'] = $this->security->get_csrf_hash();
        
        if($validate['status']=="ok"){
            $data = [];
            $img = [];
            $price = 0;
            $url = $validate['url'];
            //Getting contents from valid url
            $html = file_get_contents($url);
            
            $getDom = new DOMDocument();
            libxml_use_internal_errors(TRUE);

            $getDom->loadHTML($html);
            libxml_clear_errors();

            $domXpath = new DOMXPath($getDom);
            $dataDom = $domXpath->query('//div[contains(@class,"product-info-main")]');
            
            if($dataDom->length>0){
                //Get item name and price
                foreach($getDom->getElementsByTagName('meta') as $nmeta){
                    if($nmeta->getAttribute('property')=="og:title"){
                        $data['name'] = strip_tags($nmeta->getAttribute('content'));
                    }
                    if($nmeta->getAttribute('property')=="product:price:amount"){
                        $price = round($nmeta->getAttribute('content'));
                    }
                    if($nmeta->getAttribute('name')=="description"){
                        $data['description'] = strip_tags($nmeta->getAttribute('content'));
                    }
                }

                //Get img
                $pattern = '/"data":(.*?)}]/';
                preg_match_all($pattern,$html,$getImg);
                $getImg = json_decode($getImg[1][0]."}]");

                $validate['data'] = $data;

                //set slug for API response 
                $validate['productSlug'] = createSlug($data['name']);;

                //Check if url already exist but deleted
                $urlExist = $this->m_global->get("product_link",['url'=>$url,'status'=>0]);
                if(count($urlExist) > 0){
                    //Revert url status to available
                    $revert['status'] = 1;
                    $this->m_global->update("product_link",['id'=>$urlExist[0]->id],$revert);
                    
                }else{
                    //Insert Data
                    if(count($data)){
                        //Insert Product Data
                        $today = date("Y-m-d H:i:s");
                        $data['url'] = $url;
                        $data['created_at'] = $today;
                        $data['updated_at'] = $today;
                        $data['slug'] = $validate['productSlug'];
                        $productId = $this->m_global->store("product_link",$data);

                        //Insert Price Data
                        $dataPrice = [
                            "price" => $price,
                            "product_id" => $productId,
                            "created_at" => $today,
                            "updated_at" => $today
                        ];
                        $this->m_global->store("product_price_history",$dataPrice);

                        //Insert Images Data
                        $dataImg = [];
                        foreach($getImg as $item){
                            $dataImg[] = [
                                "img_url" => $item->img,
                                "product_id" => $productId,
                                "created_at" => $today,
                                "updated_at" => $today
                            ];
                        }
                        $this->m_global->store_batch("product_img",$dataImg);
                    }

                }

                echo json_encode($validate);

            }else{
                //Response for valid fabelio url but invalid product page link
                $validate['status'] = "failed";
                $validate['message'] = "Please insert Fabelio product page link. Your url input is not product page link";
                echo json_encode($validate);
            }
        }else{
            //Response for invalid url input 
            echo json_encode($validate);
        }
    }
    
}
