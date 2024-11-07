<?php
class Role extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('role_model');
        $this->load->database('local', TRUE);
    }

    public function index()
    {
        $data_roles = $this->role_model->get_role();

        $data['roles'] = array_map(function ($role) {
            return (object) $role;
        }, $data_roles);

        return $this->template->load('template/layout', 'master/vw_role', $data);
    }

    public function tambah()
    {
        $data_array = array(
            'role_name' => $this->input->post('role_name'),
            'description' => $this->input->post('description'),
        );

        $tambahData = $this->role_model->add_role($data_array);

        if (!$tambahData) {
            echo json_encode(['status' => 'gagal', 'message' => "Gagal menambahkan data", 'kode' => 40]);
        } else {
            echo json_encode(['status' => 'sukses', 'message' => "Berhasil menambahkan data", 'kode' => 20]);
        }
    }

    public function edit()
    {
        $data_array = array(
            'id_role' => $this->input->post('id_role'),
            'role_name' => $this->input->post('role_name'),
            'description' => $this->input->post('description'),
        );

        $editData = $this->role_model->edit_role($data_array);

        if (!$editData) {
            echo json_encode(['status' => 'gagal', 'message' => "Gagal mengubah data", 'kode' => 40]);
        } else {
            echo json_encode(['status' => 'sukses', 'message' => "Berhasil mengubah data", 'kode' => 20]);
        }
    }

    public function hapus($id)
    {
        $id = decrypt_data($id);

        $deleteData = $this->role_model->delete_role($id);

        if (!$deleteData) {
            $this->session->set_flashdata('sukses', 'Gagal menghapus data');
        } else {
            $this->session->set_flashdata('gagal', 'Berhasil menghapus data');
        }

        redirect('role');
    }
}
