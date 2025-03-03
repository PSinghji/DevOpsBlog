<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Insert new user
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    // Check user login credentials
    public function login_user($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $user = $query->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
