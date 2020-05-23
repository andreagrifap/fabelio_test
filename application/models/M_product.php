<?php
class M_product extends CI_Model
{
    function get($where=null){
        $joinPrice = "SELECT id, product_id, price, min(created_at) FROM product_price_history WHERE created_at in (SELECT MAX(created_at) from product_price_history GROUP BY product_id) GROUP BY product_id";

        $this->db->select("p.*, pph.price, pm.img_url");
        $this->db->join('('.$joinPrice.') pph','p.id = pph.product_id','left');
        $this->db->join('product_img pm','p.id = pm.product_id','left');
        if($where){
            $this->db->where($where);
        }
        $this->db->order_by("p.created_at","DESC");
        $this->db->group_by("p.id");
        $resp = $this->db->get("product_link p");
        return $resp;
    }

}