<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->helper('text');
        $this->load->library('pagination');
    }

    // Load homepage with blog posts
    public function index() {
         // Get category ID and search term from URL parameters
         $category_id = $this->input->get('category_id');
         $search_term = $this->input->get('search');
 
         // Pagination configuration
         $config['base_url'] = site_url('blog/index');
         $config['total_rows'] = $this->Blog_model->count_blogs($category_id, $search_term);
         $config['per_page'] = 5;
         $config['page_query_string'] = TRUE;
         $this->pagination->initialize($config);

        // Get current page number
        $page = $this->input->get('per_page');
        $offset = $page ? $page : 0;

        // Fetch blogs
        $data['blogs'] = $this->Blog_model->get_blogs($config['per_page'], $offset, $category_id, $search_term);
        $data['categories'] = $this->Blog_model->get_categories();
        $data['pagination'] = $this->pagination->create_links();

        // Load views
        // $this->load->view('templates/header');
        // $this->load->view('blog/index', $data);
        // $this->load->view('templates/footer');

        $data['blogs'] = $this->Blog_model->get_all_blogs();
        $this->load->view('home', $data);
    }

    // View a single blog post
    public function view($id) {
        $data['blog'] = $this->Blog_model->get_blog_by_id($id);
            $data['categories'] = $this->Blog_model->get_categories(); // Fetch all categories

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
    
        $this->load->model('Category_model'); // Load Category Model
        $data['categories'] = $this->Category_model->get_all_categories(); // Fetch categories
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required|integer'); // Validate category selection
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('blog/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Blog_model->insert_blog([
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            redirect('/');
        }
    }
    

    public function upload_image() {
        if (isset($_FILES['upload']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB max
    
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
    
    public function category($category_id) {
        // Load categories and blogs of the given category
        $data['categories'] = $this->Blog_model->get_categories();
        $data['posts'] = $this->Blog_model->get_blogs_by_category($category_id);
        $data['category'] = $this->Blog_model->get_category_by_id($category_id);
    
        // if (empty($data['posts'])) {
        //     show_404();
        // }
    
        $this->load->view('templates/header', $data);
        $this->load->view('blog/category', $data);
        $this->load->view('templates/footer');
    }
    
}
