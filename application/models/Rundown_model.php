<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rundown_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all rundown items ordered by date
     * 
     * @return array List of all rundown items
     */
    public function get_all_rundown() {
        $this->db->order_by('event_date', 'ASC');
        $query = $this->db->get('rundown');
        return $query->result();
    }
    
    /**
     * Get rundown by ID
     * 
     * @param int $id Rundown ID
     * @return object|bool Rundown object if found, FALSE otherwise
     */
    public function get_rundown_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('rundown');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Add new rundown item
     * 
     * @param array $data Rundown data
     * @return bool TRUE on success, FALSE on failure
     */
    public function add_rundown($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('rundown', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Update rundown item
     * 
     * @param int $id Rundown ID
     * @param array $data Rundown data
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_rundown($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('rundown', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Delete rundown item
     * 
     * @param int $id Rundown ID
     * @return bool TRUE on success, FALSE on failure
     */
    public function delete_rundown($id) {
        $this->db->where('id', $id);
        $this->db->delete('rundown');
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Count total rundown items
     * 
     * @return int Total number of rundown items
     */
    public function count_all() {
        return $this->db->count_all('rundown');
    }
    
    /**
     * Get formatted rundown for frontend display
     * 
     * @return array Formatted rundown data
     */
    public function get_formatted_rundown() {
        $rundown_data = $this->get_all_rundown();
        $formatted = [];
        
        foreach ($rundown_data as $item) {
            $date = new DateTime($item->event_date);
            $formatted[] = [
                'date' => $date->format('d'),
                'month' => $this->get_indonesian_month($date->format('n')),
                'year' => $date->format('Y'),
                'event' => $item->event_title
            ];
        }
        
        return $formatted;
    }
    
    /**
     * Get Indonesian month name
     * 
     * @param int $month_number Month number (1-12)
     * @return string Indonesian month name
     */
    private function get_indonesian_month($month_number) {
        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Ags',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
        ];
        
        return $months[$month_number] ?? 'Jan';
    }
    
    /**
     * Initialize rundown table with sample data
     * 
     * @return bool TRUE on success, FALSE on failure
     */
    public function init_sample_data() {
        $count = $this->count_all();
        
        if ($count == 0) {
            $sample_rundown = [
                [
                    'event_title' => 'Pembukaan Pendaftaran GTTGN 2024',
                    'event_date' => '2024-03-01',
                    'description' => 'Pembukaan resmi pendaftaran peserta GTTGN 2024'
                ],
                [
                    'event_title' => 'Batas Akhir Pendaftaran Gelombang 1',
                    'event_date' => '2024-04-15',
                    'description' => 'Batas akhir pendaftaran untuk gelombang pertama'
                ],
                [
                    'event_title' => 'Pengumuman Peserta Lolos Gelombang 1',
                    'event_date' => '2024-05-01',
                    'description' => 'Pengumuman peserta yang lolos seleksi gelombang pertama'
                ],
                [
                    'event_title' => 'Pelaksanaan GTTGN 2024',
                    'event_date' => '2024-08-15',
                    'description' => 'Pelaksanaan acara utama GTTGN 2024'
                ]
            ];
            
            foreach ($sample_rundown as $item) {
                $item['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('rundown', $item);
            }
            
            return ($this->db->affected_rows() > 0);
        }
        
        return TRUE;
    }
}
