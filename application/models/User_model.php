<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Save user registration data to the database
     * 
     * @param array $data Registration form data
     * @return int|bool User ID on success, FALSE on failure
     */
    public function save_registration($data) {
        // Insert data into the user table
        $this->db->insert('user', $data);
        
        // Return the inserted ID or FALSE if insert failed
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : FALSE;
    }
    
    /**
     * Validate unique code
     * 
     * @param string $code The code to validate
     * @return bool TRUE if valid, FALSE otherwise
     */
    public function validate_unique_code($code) {
        // Check if the code matches the expected value
        return $code === 'GTTGNXXVI';
    }
    
    /**
     * Get all registered users
     * 
     * @return array List of all registered users
     */
    public function get_all_users() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('user');
        return $query->result();
    }

    public function count_all() {
        $query = $this->db->get('user');
        return $query->num_rows();
    }
    
    /**
     * Get user by ID
     * 
     * @param int $id User ID
     * @return object|bool User object if found, FALSE otherwise
     */
    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
}
