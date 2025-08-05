<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_submission_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all contact submissions ordered by date
     * 
     * @return array List of all contact submissions
     */
    public function get_all_submissions() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('contact_submissions');
        return $query->result();
    }
    
    /**
     * Get contact submission by ID
     * 
     * @param int $id Submission ID
     * @return object|bool Submission object if found, FALSE otherwise
     */
    public function get_submission_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('contact_submissions');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Add new contact submission
     * 
     * @param array $data Submission data
     * @return bool TRUE on success, FALSE on failure
     */
    public function add_submission($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('contact_submissions', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Update submission status
     * 
     * @param int $id Submission ID
     * @param string $status New status
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_status($id, $status) {
        $data = [
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->where('id', $id);
        $this->db->update('contact_submissions', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Delete contact submission
     * 
     * @param int $id Submission ID
     * @return bool TRUE on success, FALSE on failure
     */
    public function delete_submission($id) {
        $this->db->where('id', $id);
        $this->db->delete('contact_submissions');
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Count total submissions
     * 
     * @return int Total number of submissions
     */
    public function count_all() {
        return $this->db->count_all('contact_submissions');
    }
    
    /**
     * Count submissions by status
     * 
     * @param string $status Status to count
     * @return int Number of submissions with given status
     */
    public function count_by_status($status) {
        $this->db->where('status', $status);
        return $this->db->count_all_results('contact_submissions');
    }
    
    /**
     * Get recent submissions (last 30 days)
     * 
     * @param int $limit Number of submissions to return
     * @return array Recent submissions
     */
    public function get_recent_submissions($limit = 10) {
        $this->db->where('created_at >=', date('Y-m-d H:i:s', strtotime('-30 days')));
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get('contact_submissions');
        return $query->result();
    }
}
