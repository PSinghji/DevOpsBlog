<?php

// CodeIgniter 3 Blogging Website - Admin Panel Controller

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }
    
    // Admin dashboard
    public function index() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $data['blogs'] = $this->Blog_model->get_all_blogs();
        //$this->load->view('admin/templates/header');
        $this->load->view('admin/dashboard', $data);
        //$this->load->view('admin/templates/footer');
    }
    
    // Admin login
    public function login() {
        //$this->load->view('admin/templates/header');
        $this->load->view('admin/login');
        //$this->load->view('admin/templates/footer');
    }
    
    // Process admin login
    public function login_process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if ($username === 'admin' && $password === 'password') {
            $this->session->set_userdata('admin_logged_in', true);
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Invalid credentials');
            redirect('admin/login');
        }
    }
    
    // Admin logout
    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('admin/login');
    }
    
    // Add new blog post
    public function create() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            //$this->load->view('admin/templates/header');
            $this->load->view('admin/create');
            //$this->load->view('admin/templates/footer');
        } else {
            $this->Blog_model->insert_blog();
            redirect('admin');
        }
    }
    
    // Edit blog post
    public function edit($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $data['blog'] = $this->Blog_model->get_blog_by_id($id);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            //$this->load->view('admin/templates/header');
            $this->load->view('admin/edit', $data);
           // $this->load->view('admin/templates/footer');
        } else {
            $this->Blog_model->update_blog($id);
            redirect('admin');
        }
    }
    
    // Delete blog post
    public function delete($id) {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->Blog_model->delete_blog($id);
        redirect('admin');
    }
    // Function to handle image uploads in CKEditor
public function upload_image() {
    if (isset($_FILES['upload']['name'])) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB max size

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('upload')) {
            $file_data = $this->upload->data();
            $url = base_url('uploads/' . $file_data['file_name']);

            echo json_encode([
                "uploaded" => 1,
                "fileName" => $file_data['file_name'],
                "url" => $url
            ]);
        } else {
            echo json_encode(['uploaded' => 0, 'error' => $this->upload->display_errors()]);
        }
    }
}

}

?>
