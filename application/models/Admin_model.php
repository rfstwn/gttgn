<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Check login credentials
     * 
     * @param string $email Email address
     * @return object|bool User object if found, FALSE otherwise
     */
    public function check_login($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('user_admin');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Get all admin users
     * 
     * @return array List of all admin users
     */
    public function get_all_users() {
        $query = $this->db->get('user_admin');
        return $query->result();
    }
    
    /**
     * Get user by ID
     * 
     * @param int $id User ID
     * @return object|bool User object if found, FALSE otherwise
     */
    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('user_admin');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Add new admin user
     * 
     * @param array $data User data
     * @return bool TRUE on success, FALSE on failure
     */
    public function add_user($data) {
        $this->db->insert('user_admin', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Update admin user
     * 
     * @param int $id User ID
     * @param array $data User data
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('user_admin', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Delete admin user
     * 
     * @param int $id User ID
     * @return bool TRUE on success, FALSE on failure
     */
    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('user_admin');
        return ($this->db->affected_rows() > 0);
    }
}
