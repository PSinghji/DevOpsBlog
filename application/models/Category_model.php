<?php
class Category_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query->result_array();
    }
}
