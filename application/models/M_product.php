<?php
class M_product extends CI_Model
{
    function get_wts($user_currency=null, $code=null, $slug=null, $sort=null, $where=null, $like=null, $limit=1000000, $pagination = 0, $count = false){
        $select_query = "";
        if(!$count){
            $select_query = 'a.*, u.first_name, u.last_name, u.username, u.display_name, u.id as user_id, u.code as usr_code, u.country as seller_country, (a.price * IFNULL(rc.value * 1.05, 1)) AS convertedPrice';
        }else{
            $select_query = 'a.id';
        }

        $this->db->select($select_query);
        $this->db->from('wts a');
        $this->db->join('users u','a.user_id = u.id','left');
        $this->db->join('region_currency rc',"a.currency = rc.origin_code AND rc.target_code = '".$user_currency."' AND rc.target_code != rc.origin_code ", 'left');

        if($where && in_array("wts_item",$where['key'])){
            $this->db->join('wts_item ai','a.id = ai.wts_id','left');
            $this->db->where('ai.status',1);
        }

        $this->db->where('a.status',"1");
        $this->db->where('a.publish',"1");
        if($code){$this->db->where('a.code',$code);}
        if($slug){$this->db->where('a.slug',$slug);}
        //if($user_currency){$this->db->where('rg.code',$user_currency);}

        if($where){
            foreach ($where['value'] as $key => $value) {
                if (empty($value)) {
                    $this->db->where($key);
                }
                else
                {
                    $this->db->where($key, $value);
                }
            }
        }

        if($like){$this->db->like($like);}
        $this->db->group_by("a.id");

        if($sort){
            $this->db->order_by($sort['value'],$sort['sort']);
        }else{
            $this->db->order_by('a.created_at',"DESC");
        }

        if($limit){$this->db->limit($limit,$pagination);}
        $result = $this->db->get()->result();

        return $result;
    }

}