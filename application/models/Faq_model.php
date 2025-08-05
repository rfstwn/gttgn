<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all FAQ items ordered by order field
     * 
     * @return array List of all FAQ items
     */
    public function get_all_faqs() {
        $this->db->order_by('display_order', 'ASC');
        $query = $this->db->get('faqs');
        return $query->result();
    }
    
    /**
     * Get FAQ by ID
     * 
     * @param int $id FAQ ID
     * @return object|bool FAQ object if found, FALSE otherwise
     */
    public function get_faq_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('faqs');
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Add new FAQ item
     * 
     * @param array $data FAQ data
     * @return bool TRUE on success, FALSE on failure
     */
    public function add_faq($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('faqs', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Update FAQ item
     * 
     * @param int $id FAQ ID
     * @param array $data FAQ data
     * @return bool TRUE on success, FALSE on failure
     */
    public function update_faq($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        $this->db->update('faqs', $data);
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Delete FAQ item
     * 
     * @param int $id FAQ ID
     * @return bool TRUE on success, FALSE on failure
     */
    public function delete_faq($id) {
        $this->db->where('id', $id);
        $this->db->delete('faqs');
        return ($this->db->affected_rows() > 0);
    }
    
    /**
     * Count total FAQ items
     * 
     * @return int Total number of FAQ items
     */
    public function count_all() {
        return $this->db->count_all('faqs');
    }
    
    /**
     * Get formatted FAQs for frontend display
     * 
     * @return array Formatted FAQ data
     */
    public function get_formatted_faqs() {
        $faqs_data = $this->get_all_faqs();
        $formatted = [];
        
        foreach ($faqs_data as $faq) {
            $formatted[] = [
                'question' => $faq->question,
                'answer' => $faq->answer
            ];
        }
        
        return $formatted;
    }
    
    /**
     * Initialize FAQ table with sample data
     * 
     * @return bool TRUE on success, FALSE on failure
     */
    public function init_sample_data() {
        $count = $this->count_all();
        
        if ($count == 0) {
            $sample_faqs = [
                [
                    'question' => 'Apa itu GTTGN?',
                    'answer' => 'GTTGN (Gatteng Tourism and Gastronomy Network) adalah acara tahunan yang menggabungkan pariwisata dan kuliner untuk mempromosikan potensi daerah.',
                    'display_order' => 1
                ],
                [
                    'question' => 'Siapa yang bisa mengikuti GTTGN?',
                    'answer' => 'GTTGN terbuka untuk semua kalangan, mulai dari pelajar, mahasiswa, profesional, hingga pelaku usaha di bidang pariwisata dan kuliner.',
                    'display_order' => 2
                ],
                [
                    'question' => 'Bagaimana cara mendaftar?',
                    'answer' => 'Pendaftaran dapat dilakukan melalui website resmi GTTGN dengan mengisi formulir pendaftaran dan melengkapi persyaratan yang ditentukan.',
                    'display_order' => 3
                ],
                [
                    'question' => 'Apakah ada biaya pendaftaran?',
                    'answer' => 'Informasi mengenai biaya pendaftaran akan diumumkan sesuai dengan jadwal yang telah ditentukan. Silakan pantau website resmi untuk update terbaru.',
                    'display_order' => 4
                ],
                [
                    'question' => 'Kapan acara GTTGN dilaksanakan?',
                    'answer' => 'Jadwal pelaksanaan GTTGN dapat dilihat pada halaman jadwal kegiatan di website ini. Pastikan untuk selalu mengecek update terbaru.',
                    'display_order' => 5
                ]
            ];
            
            foreach ($sample_faqs as $faq) {
                $faq['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('faqs', $faq);
            }
            
            return ($this->db->affected_rows() > 0);
        }
        
        return TRUE;
    }
}
