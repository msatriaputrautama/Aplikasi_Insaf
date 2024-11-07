<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->database('local', TRUE);
    }

    function index()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('dashboard');
        }
        $this->load->view('auth/vw_login');
    }

    function auth_login()
    {
        $username    = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));

        $validate = $this->login_model->validate($username, $password);
        if ($validate->num_rows() > 0) {
            $data  = $validate->row_array();
            $name  = $data['nama'];
            $username  = $data['username'];
            $email = $data['email'];
            $level = $data['level'];
            $cab = $data['cab'];
            $kode_inst = $data['kode_inst'];
            $kode_rekon = explode(',', $data['kode_rekon']);
            $sesdata = array(
                'username'  => $username,
                'name'  => $name,
                'email'     => $email,
                'level'     => $level,
                'cab'     => $cab,
                'kode_inst'     => $kode_inst,
                'kode_rekon'     => $kode_rekon,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            redirect('dashboard');
        } else {
            echo $this->session->set_flashdata('msg', 'Username or Password is Wrong');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
