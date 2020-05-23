<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebScrape{

    Protected $htmlContent;

    function validateUrl($url){
        $CI =& get_instance();

        $resp = [
            "status" => "ok",
            "message" => "default",
            "data" => 0
        ];

        //Sanitize url
        $chkUrl = explode("://",$url);
        if($chkUrl[0]=="http"){
            str_replace("http://","https://",$url);
        }
        if($chkUrl[0]!="http" && $chkUrl[0]!="https"){
            str_replace("://","",$url);
            $url = "https://".$url;
        }

        //check url validation
        if(!preg_match("/fabelio.com/",$url)){
            $resp['status'] = "failed";
            $resp['message'] = "Please insert valid fabelio.com product page link";
        }

        if($resp['status'] == "ok" && filter_var($url, FILTER_VALIDATE_URL)===false){
            $resp['status'] = "failed";
            $resp['message'] = "URL is not valid";
        }

        $header = @get_headers($url);
        if($resp['status'] == "ok" && (!$header || $header[0] == 'HTTP/1.1 404 Not Found')){
            $resp['status'] = "failed";
            $resp['message'] = "URL not found";
        }

        //check if url already exist
        $urlExist = $CI->m_global->get("product_link",['url'=>$url,'status'=>1]);
        if($resp['status'] == "ok" && count($urlExist) > 0){
            $resp['status'] = "failed";
            $resp['message'] = "Url already exist in database";
        }

        $resp['url'] = $url;
        return $resp;
    }

}
