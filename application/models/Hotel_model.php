<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all hotels
     * 
     * @return array List of all hotels
     */
    public function get_all_hotels() {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('hotels');
        return $query->result();
    }
    
    /**
     * Get hotel by ID
     * 
     * @param int $id Hotel ID
     * @return object|bool Hotel object if found, FALSE otherwise
     */
    public function get_hotel_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('hotels');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Add new hotel
     * 
     * @param array $data Hotel data
     * @return bool TRUE on success, FALSE on failure
     */
    public function add_hotel($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('hotels', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Update hotel
     * 
     * @param int $id Hotel ID
     * @param array $data Hotel data
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_hotel($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('hotels', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Delete hotel
     * 
     * @param int $id Hotel ID
     * @return bool TRUE on success, FALSE on failure
     */
    public function delete_hotel($id) {
        $this->db->where('id', $id);
        $this->db->delete('hotels');
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Count total hotels
     * 
     * @return int Total number of hotels
     */
    public function count_all() {
        return $this->db->count_all('hotels');
    }
    
    /**
     * Initialize hotels table with sample data
     * 
     * @return bool TRUE on success, FALSE on failure
     */
    public function init_sample_data() {
        // Check if table has data
        $count = $this->count_all();
        
        if ($count == 0) {
            $sample_hotels = [
                [
                    'name' => 'Grand Hotel Gatteng',
                    'address' => 'Jl. Raya Gatteng No. 123, Gatteng',
                    'phone' => '+62 123-456-7890',
                    'stars' => 5,
                    'latitude' => '-7.123456',
                    'longitude' => '110.123456',
                    'image' => 'assets/image/hotel/hotel-1.jpg'
                ],
                [
                    'name' => 'Gatteng Boutique Hotel',
                    'address' => 'Jl. Pemuda No. 45, Gatteng',
                    'phone' => '+62 123-456-7891',
                    'stars' => 4,
                    'latitude' => '-7.234567',
                    'longitude' => '110.234567',
                    'image' => 'assets/image/hotel/hotel-2.jpg'
                ],
                [
                    'name' => 'Gatteng Resort & Spa',
                    'address' => 'Jl. Pantai Indah No. 78, Gatteng',
                    'phone' => '+62 123-456-7892',
                    'stars' => 4,
                    'latitude' => '-7.345678',
                    'longitude' => '110.345678',
                    'image' => 'assets/image/hotel/hotel-3.jpg'
                ],
                [
                    'name' => 'Gatteng Inn',
                    'address' => 'Jl. Pahlawan No. 56, Gatteng',
                    'phone' => '+62 123-456-7893',
                    'stars' => 3,
                    'latitude' => '-7.456789',
                    'longitude' => '110.456789',
                    'image' => 'assets/image/hotel/hotel-4.jpg'
                ],
                [
                    'name' => 'Sartika Hotel',
                    'address' => 'Jl. Bumi Bintan No. 56, Bintan',
                    'phone' => '+62 123-456-7893',
                    'stars' => 4,
                    'latitude' => '-7.456789',
                    'longitude' => '110.456789',
                    'image' => 'assets/image/hotel/hotel-5.jpg'
                ],
                [
                    'name' => 'Bintan Hotel',
                    'address' => 'Jl. Serpong No. 56, Serpong',
                    'phone' => '+62 123-456-7893',
                    'stars' => 5,
                    'latitude' => '-7.456789',
                    'longitude' => '110.456789',
                    'image' => 'assets/image/hotel/hotel-6.jpg'
                ]
            ];
            
            foreach ($sample_hotels as $hotel) {
                $hotel['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('hotels', $hotel);
            }
            
            return ($this->db->affected_rows() > 0);
        }
        
        return TRUE;
    }
}
