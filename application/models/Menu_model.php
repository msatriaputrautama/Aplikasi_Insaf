<?php
class Menu_model extends CI_Model
{
    public function get_menus($main_menu) {
        $this->db->where('main_menu', $main_menu);
        $this->db->where('active', 1);
        $this->db->order_by('order', 'ASC');
        return $this->db->get('menu')->result_array();
    }
}