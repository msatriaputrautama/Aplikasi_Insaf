<?php
class Role_model extends CI_Model
{
    public function get_role()
    {
        return $this->db->get('role')->result_array();
    }

    public function add_Role($data)
    {
        $add_data = $this->db->insert('role', $data);
        if ($add_data) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_Role($data)
    {
        $this->db->where('id', $data['id_role']);
        unset($data['id_role']); 
        return $this->db->update('role', $data);
    }

    public function delete_Role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('role');
    }
}
