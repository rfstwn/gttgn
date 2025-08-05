<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get informasi content
    public function get_content() {
        $query = $this->db->get('informasi_content');
        return $query->row_array();
    }

    // Update informasi content
    public function update_content($data) {
        // Check if record exists
        $existing = $this->get_content();
        
        if ($existing) {
            $this->db->where('id', $existing['id']);
            return $this->db->update('informasi_content', $data);
        } else {
            return $this->db->insert('informasi_content', $data);
        }
    }

    // Get all transportation options
    public function get_transportation() {
        $this->db->where('is_active', 1);
        $this->db->order_by('order_position', 'ASC');
        $query = $this->db->get('transportation');
        return $query->result_array();
    }

    // Get transportation by ID
    public function get_transportation_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('transportation');
        return $query->row_array();
    }

    // Add new transportation
    public function add_transportation($data) {
        return $this->db->insert('transportation', $data);
    }

    // Update transportation
    public function update_transportation($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('transportation', $data);
    }

    // Delete transportation
    public function delete_transportation($id) {
        $this->db->where('id', $id);
        return $this->db->delete('transportation');
    }

    // Get all transportation for admin (including inactive)
    public function get_all_transportation() {
        $this->db->order_by('order_position', 'ASC');
        $query = $this->db->get('transportation');
        return $query->result_array();
    }

    // Update transportation order
    public function update_order($id, $order) {
        $this->db->where('id', $id);
        return $this->db->update('transportation', ['order_position' => $order]);
    }

    // Toggle transportation status
    public function toggle_status($id) {
        $transport = $this->get_transportation_by_id($id);
        if ($transport) {
            $new_status = $transport['is_active'] ? 0 : 1;
            $this->db->where('id', $id);
            return $this->db->update('transportation', ['is_active' => $new_status]);
        }
        return false;
    }
}
