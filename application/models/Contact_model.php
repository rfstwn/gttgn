<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get contact information
     * 
     * @return object|bool Contact info object if found, FALSE otherwise
     */
    public function get_contact_info() {
        $query = $this->db->get('contact_info');
        
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        
        // Return default values if no data exists
        return (object) [
            'website_name' => 'GTTGN',
            'address' => 'Alamat belum diatur',
            'phone' => 'Telepon belum diatur',
            'fax' => 'Fax belum diatur',
            'email' => 'email@example.com',
            'website' => 'https://example.com',
            'maps_embed' => ''
        ];
    }
    
    /**
     * Update contact information
     * 
     * @param array $data Contact data
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_contact_info($data) {
        // Check if record exists
        $existing = $this->db->get('contact_info');
        
        if ($existing->num_rows() > 0) {
            // Update existing record
            $this->db->where('id', 1);
            $this->db->update('contact_info', $data);
        } else {
            // Insert new record
            $data['id'] = 1;
            $this->db->insert('contact_info', $data);
        }
        
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Initialize contact info table with default data
     * 
     * @return bool TRUE on success, FALSE on failure
     */
    public function init_contact_info() {
        // Check if table exists and has data
        $query = $this->db->get('contact_info');
        
        if ($query->num_rows() == 0) {
            $default_data = [
                'id' => 1,
                'website_name' => 'GTTGN',
                'address' => 'Jl. Contoh No. 123, Jakarta',
                'phone' => '021-12345678',
                'fax' => '021-12345679',
                'email' => 'info@gttgn.com',
                'website' => 'https://gttgn.com',
                'maps_embed' => '<iframe src="https://www.google.com/maps/embed" width="100%" height="300" frameborder="0" allowfullscreen></iframe>'
            ];
            
            $this->db->insert('contact_info', $default_data);
            return ($this->db->affected_rows() > 0);
        }
        
        return TRUE;
    }
}
