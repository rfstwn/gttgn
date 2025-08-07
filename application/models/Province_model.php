<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all provinces
     * 
     * @return array List of all provinces
     */
    public function get_all_provinces() {
        $this->db->order_by('prov_name', 'ASC');
        $query = $this->db->get('provinces');
        return $query->result();
    }
    
    /**
     * Get province by ID
     * 
     * @param int $id Province ID
     * @return object|bool Province object if found, FALSE otherwise
     */
    public function get_province_by_id($id) {
        $this->db->where('prov_id', $id);
        $query = $this->db->get('provinces');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Initialize provinces table with sample data
     * 
     * @return bool TRUE on success, FALSE on failure
     */
    public function init_provinces() {
        // Check if table exists and has data
        $query = $this->db->get('provinces');
        return $query->num_rows() > 0;
    }
}
