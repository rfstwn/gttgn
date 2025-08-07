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
    
    /**
     * Authenticate user login
     * 
     * @param string $no_whatsapp WhatsApp number
     * @param string $password Password
     * @return object|bool User object if authenticated, FALSE otherwise
     */
    public function authenticate($no_whatsapp, $password) {
        $this->db->where('no_whatsapp', $no_whatsapp);
        $query = $this->db->get('user');
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        
        return FALSE;
    }
    
    /**
     * Save user participant data
     * 
     * @param array $data Participant data
     * @return int|bool Participant ID on success, FALSE on failure
     */
    public function save_participant($data) {
        $this->db->insert('user_participant', $data);
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : FALSE;
    }
    
    /**
     * Save tenant data
     * 
     * @param array $data Tenant data
     * @return int|bool Tenant ID on success, FALSE on failure
     */
    public function save_tenant($data) {
        $this->db->insert('tenant', $data);
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : FALSE;
    }
    
    /**
     * Get user participants by user ID
     * 
     * @param int $user_id User ID
     * @return array List of participants
     */
    public function get_user_participants($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('user_participant');
        return $query->result();
    }
    
    /**
     * Get user tenants by user ID
     * 
     * @param int $user_id User ID
     * @return array List of tenants
     */
    public function get_user_tenants($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('tenant');
        return $query->result();
    }
}
