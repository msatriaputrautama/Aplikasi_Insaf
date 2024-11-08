<?php
class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->database('local', TRUE);
    }

    public function index()
    {
        $data_menu = $this->menu_model->get_menu();

        $data['menus'] = array_map(function ($menu) {
            return (object) $menu;
        }, $data_menu);

        return $this->template->load('template/layout', 'master/vw_menu', $data);
    }

    public function tambah()
    {
        $data_array = array(
            'menu_name' => $this->input->post('menu_name'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
        );

        $tambahData = $this->menu_model->add_menu($data_array);

        if (!$tambahData) {
            echo json_encode(['status' => 'gagal', 'message' => "Gagal menambahkan data", 'kode' => 40]);
        } else {
            echo json_encode(['status' => 'sukses', 'message' => "Berhasil menambahkan data", 'kode' => 20]);
        }
    }

    public function edit()
    {
        $data_array = array(
            'id_menu' => $this->input->post('id_menu'),
            'menu_name' => $this->input->post('menu_name'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
        );

        $editData = $this->menu_model->edit_menu($data_array);

        if (!$editData) {
            echo json_encode(['status' => 'gagal', 'message' => "Gagal mengubah data", 'kode' => 40]);
        } else {
            echo json_encode(['status' => 'sukses', 'message' => "Berhasil mengubah data", 'kode' => 20]);
        }
    }

    public function hapus($id)
    {
        $id = decrypt_data($id);

        $deleteData = $this->menu_model->delete_menu($id);

        if (!$deleteData) {
            $this->session->set_flashdata('sukses', 'Gagal menghapus data');
        } else {
            $this->session->set_flashdata('gagal', 'Berhasil menghapus data');
        }
        redirect('menu');
    }
}
