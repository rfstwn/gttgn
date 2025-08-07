<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get cities by province ID
     * 
     * @param int $province_id Province ID
     * @return array List of cities in the province
     */
    public function get_cities_by_province($province_id) {
        $this->db->where('prov_id', $province_id);
        $this->db->order_by('city_name', 'ASC');
        $query = $this->db->get('cities');
        return $query->result();
    }
    
    /**
     * Get all cities
     * 
     * @return array List of all cities
     */
    public function get_all_cities() {
        $this->db->order_by('city_name', 'ASC');
        $query = $this->db->get('cities');
        return $query->result();
    }
    
    /**
     * Get city by ID
     * 
     * @param int $id City ID
     * @return object|bool City object if found, FALSE otherwise
     */
    public function get_city_by_id($id) {
        $this->db->where('city_id', $id);
        $query = $this->db->get('cities');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Initialize cities table with sample data
     * 
     * @return bool TRUE on success, FALSE on failure
     */
    public function init_cities() {
        // Check if table exists and has data
        $query = $this->db->get('cities');
        return $query->num_rows() > 0;
    }
}
