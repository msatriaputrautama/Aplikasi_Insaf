<?php
class Menu_model extends CI_Model
{
    public function get_menu($main_menu = null) {
        $this->db->where('main_menu', $main_menu);
        $this->db->where('active', 1);
        $this->db->order_by('order', 'ASC');
        return $this->db->get('menu')->result_array();
    }
    
    public function add_menu($data)
    {
        $add_data = $this->db->insert('menu', $data);
        if ($add_data) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_menu($data)
    {
        $this->db->where('id', $data['id_menu']);
        unset($data['id_menu']); 
        return $this->db->update('menu', $data);
    }

    public function delete_menu($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('menu');
    }
}