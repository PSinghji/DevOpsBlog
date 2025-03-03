<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    // Load registration page
    public function register() {
        $this->load->view('user/register');
    }

    // Process user registration
    public function register_process() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('user/register');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->User_model->register_user($data);
            $this->session->set_flashdata('success', 'Registration successful! Please login.');
            redirect('user/login');
        }
    }

    // Load login page
    public function login() {
        $this->load->view('user/login');
    }

    // Process user login
    public function login_process() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->login_user($email, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('user_name', $user['name']);
            redirect('/');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('user/login');
        }
    }

    // Logout user
    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        redirect('/');
    }
}
