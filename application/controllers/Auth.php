<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('login', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if ($user) {
                if ($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'nama_user' => $user['nama_user'],
                        'id_user' => $user['id_user']
                    ];
                    $this->session->set_userdata($data);
					if ($user['role']=='Admin'){
						redirect('Admin');
					}else{
						redirect('home');
					}
                } else {
                    $this->session->set_flashdata('message', 'Wrong Password!');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', 'Username is not registered!');
                redirect('login');
            }
        }
	}
	public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_user');

        $this->session->set_flashdata('message', 'You have been logged out!');
        redirect('login');
    }
    public function registrasi()
    {
        $data['title'] = 'Admin';
        $data['user'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('registrasi', $data);
            
        } else {
            $this->db->insert('user', [
                'nama_user' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'role' => 'User'
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success!</div>');
            redirect('login');
        }
    }
}
