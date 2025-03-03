<?php
class Auth extends CI_Controller {
    public function register() {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role' => 'user'
            );
            $this->User_model->register($data);
            redirect('auth/login');
        }
    }

    public function login() {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login');
        } else {
            $user = $this->User_model->login($this->input->post('email'), $this->input->post('password'));
            if ($user) {
                $this->session->set_userdata(['user_id' => $user['id'], 'role' => $user['role']]);
                redirect('blog');
            } else {
                $this->session->set_flashdata('error', 'Invalid credentials');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
