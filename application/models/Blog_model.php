<?php

// CodeIgniter 3 Blogging Website - Blog Model

// Ensuring direct script access restriction
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }
    
    // Fetch all blogs from the database
    public function get_all_blogs() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('blogs');
        return $query->result_array();
    }
    
    // Fetch a specific blog by ID
    public function get_blog_by_id($id) {
        $query = $this->db->get_where('blogs', array('id' => $id));
        return $query->row_array();
    }
    
    // // Insert a new blog post
    // public function insert_blog($data) {
    //     return $this->db->insert('blogs', $data);
    // }
    
    // Delete a blog post
    public function delete_blog($id) {
        return $this->db->delete('blogs', array('id' => $id));
    }
    
    // Update a blog post
    public function update_blog($id, $image_path = null) {
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        if ($image_path) {
            $data['image'] = $image_path;
        }
        $this->db->where('id', $id);
        return $this->db->update('blogs', $data);
    }
    public function insert_blog() {
        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'image' => $this->upload_image_file('blog_image') // Save image file path
        ];
        return $this->db->insert('blogs', $data);
    }
    
    private function upload_image_file($field_name) {
        if (!empty($_FILES[$field_name]['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload($field_name)) {
                return 'uploads/' . $this->upload->data('file_name');
            }
        }
        return null;
    }
    
}

?>
