<?php
class M_global extends CI_Model
{
    function get($table, $where, $order = NULL, $limit = NULL, $offset = NULL, $select = NULL)
    {
        if ($select !== NULL) 
        {
            $this->db->select(implode(",", $select));  
        }
        else
        {
            $this->db->select('*');
        }
        
        $this->db->from($table);
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($order)) {
            $this->db->order_by($order[0], $order[1]);
        }
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        if (!empty($offset) && !empty($limit)) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }
    
    public function store($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function store_batch($table, $data)
    {
        $this->db->insert_batch($table, $data);
        return $this->db->insert_id();
    }

    function update($table, $where, $data)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->update($table, $data);
    }
    
    function replace($table, $data)
    {
        $this->db->replace($table, $data);
        return $this->db->insert_id();
    }

    function delete($table, $where)
    {
        $this->db->delete($table, $where);
        return;
    }

}