<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->helper('text');
    }

    // Load homepage with blog posts
    public function index() {
        $data['blogs'] = $this->Blog_model->get_all_blogs();
        $this->load->view('home', $data);
    }

    // View a single blog post
    public function view($id) {
        $data['blog'] = $this->Blog_model->get_blog_by_id($id);
        if (empty($data['blog'])) {
            show_404();
        }
        $this->load->view('blog/view', $data);
    }
    public function create() {
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'You must be logged in to create a blog post.');
            redirect('user/login');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('blog/create');
        } else {
            $this->Blog_model->insert_blog([
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'user_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            redirect('/');
        }
    }
    
}
