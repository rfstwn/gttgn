<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Dashboard Controller
 * 
 * Handles admin dashboard functionality
 */
class Dashboard extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('contact_model');
        $this->load->model('user_model');
        $this->load->model('hotel_model');
        $this->load->model('rundown_model');
        $this->load->model('faq_model');
        $this->load->model('contact_submission_model');
        $this->load->model('informasi_model');
        $this->load->library('form_validation');
    }
    
    /**
     * Dashboard page
     */
    public function index() {
        $data['title'] = 'Dashboard Admin';
        $data['user_count'] = $this->user_model->count_all();
        $data['new_contact_submission_count'] = $this->contact_submission_model->count_by_status('new');
        
        // Load the dashboard view with header and footer
        $this->load_admin_view('admin-gttgn/dashboard', $data);
    }
    
    /**
     * Contact information management page
     */
    public function contact_info() {
        $data['title'] = 'Kelola Informasi Kontak';
        $data['contact_info'] = $this->contact_model->get_contact_info();
        
        // Load the contact info view
        $this->load_admin_view('admin-gttgn/contact_info', $data);
    }
    
    /**
     * Update contact information
     */
    public function update_contact_info() {
        // Set validation rules
        $this->form_validation->set_rules('website_name', 'Nama Website', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('fax', 'Fax', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('website', 'Website', 'required|valid_url|trim');
        $this->form_validation->set_rules('maps_embed', 'Embed Maps', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $this->contact_info();
        } else {
            // Prepare data for update
            $data = [
                'website_name' => $this->input->post('website_name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'fax' => $this->input->post('fax'),
                'email' => $this->input->post('email'),
                'website' => $this->input->post('website'),
                'maps_embed' => $this->input->post('maps_embed'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            // Update contact information
            if ($this->contact_model->update_contact_info($data)) {
                $this->session->set_flashdata('success', 'Informasi kontak berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui informasi kontak!');
            }
            
            redirect('admin-gttgn/dashboard/contact_info');
        }
    }
    
    /**
     * Hotel management page
     */
    public function hotels() {
        $data['title'] = 'Kelola Hotel';
        $data['hotels'] = $this->hotel_model->get_all_hotels();
        
        // Load the hotels management view
        $this->load_admin_view('admin-gttgn/hotels', $data);
    }
    
    /**
     * Add hotel page
     */
    public function add_hotel() {
        $data['title'] = 'Tambah Hotel';
        
        // Load the add hotel view
        $this->load_admin_view('admin-gttgn/add_hotel', $data);
    }
    
    /**
     * Save new hotel
     */
    public function save_hotel() {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Nama Hotel', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('stars', 'Rating Bintang', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $this->add_hotel();
        } else {
            // Prepare data for insert
            $data = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'stars' => $this->input->post('stars'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'image' => $this->input->post('image') ?: 'assets/image/hotel/default.jpg'
            ];
            
            // Save hotel
            if ($this->hotel_model->add_hotel($data)) {
                $this->session->set_flashdata('success', 'Hotel berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan hotel!');
            }
            
            redirect('admin-gttgn/dashboard/hotels');
        }
    }
    
    /**
     * Edit hotel page
     */
    public function edit_hotel($id) {
        $data['title'] = 'Edit Hotel';
        $data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
        
        if (!$data['hotel']) {
            $this->session->set_flashdata('error', 'Hotel tidak ditemukan!');
            redirect('admin-gttgn/dashboard/hotels');
        }
        
        // Load the edit hotel view
        $this->load_admin_view('admin-gttgn/edit_hotel', $data);
    }
    
    /**
     * Update hotel
     */
    public function update_hotel($id) {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Nama Hotel', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('stars', 'Rating Bintang', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $this->edit_hotel($id);
        } else {
            // Prepare data for update
            $data = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'stars' => $this->input->post('stars'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'image' => $this->input->post('image') ?: 'assets/image/hotel/default.jpg'
            ];
            
            // Update hotel
            if ($this->hotel_model->update_hotel($id, $data)) {
                $this->session->set_flashdata('success', 'Hotel berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui hotel!');
            }
            
            redirect('admin-gttgn/dashboard/hotels');
        }
    }
    
    /**
     * Delete hotel
     */
    public function delete_hotel($id) {
        if ($this->hotel_model->delete_hotel($id)) {
            $this->session->set_flashdata('success', 'Hotel berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus hotel!');
        }
        
        redirect('admin-gttgn/dashboard/hotels');
    }
    
    // ==================== RUNDOWN MANAGEMENT ====================
    
    /**
     * Rundown management page
     */
    public function rundown() {
        $data['title'] = 'Kelola Jadwal Kegiatan';
        $data['rundown'] = $this->rundown_model->get_all_rundown();
        
        $this->load_admin_view('admin-gttgn/rundown', $data);
    }
    
    /**
     * Add rundown page
     */
    public function add_rundown() {
        $data['title'] = 'Tambah Jadwal Kegiatan';
        
        $this->load_admin_view('admin-gttgn/add_rundown', $data);
    }
    
    /**
     * Save new rundown
     */
    public function save_rundown() {
        $this->form_validation->set_rules('event_title', 'Judul Kegiatan', 'required|trim');
        $this->form_validation->set_rules('event_date', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_rundown();
        } else {
            $data = [
                'event_title' => $this->input->post('event_title'),
                'event_date' => $this->input->post('event_date'),
                'description' => $this->input->post('description')
            ];
            
            if ($this->rundown_model->add_rundown($data)) {
                $this->session->set_flashdata('success', 'Jadwal kegiatan berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan jadwal kegiatan!');
            }
            
            redirect('admin-gttgn/dashboard/rundown');
        }
    }
    
    /**
     * Edit rundown page
     */
    public function edit_rundown($id) {
        $data['title'] = 'Edit Jadwal Kegiatan';
        $data['rundown'] = $this->rundown_model->get_rundown_by_id($id);
        
        if (!$data['rundown']) {
            $this->session->set_flashdata('error', 'Jadwal kegiatan tidak ditemukan!');
            redirect('admin-gttgn/dashboard/rundown');
        }
        
        $this->load_admin_view('admin-gttgn/edit_rundown', $data);
    }
    
    /**
     * Update rundown
     */
    public function update_rundown($id) {
        $this->form_validation->set_rules('event_title', 'Judul Kegiatan', 'required|trim');
        $this->form_validation->set_rules('event_date', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit_rundown($id);
        } else {
            $data = [
                'event_title' => $this->input->post('event_title'),
                'event_date' => $this->input->post('event_date'),
                'description' => $this->input->post('description')
            ];
            
            if ($this->rundown_model->update_rundown($id, $data)) {
                $this->session->set_flashdata('success', 'Jadwal kegiatan berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui jadwal kegiatan!');
            }
            
            redirect('admin-gttgn/dashboard/rundown');
        }
    }
    
    /**
     * Delete rundown
     */
    public function delete_rundown($id) {
        if ($this->rundown_model->delete_rundown($id)) {
            $this->session->set_flashdata('success', 'Jadwal kegiatan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus jadwal kegiatan!');
        }
        
        redirect('admin-gttgn/dashboard/rundown');
    }
    
    // ==================== FAQ MANAGEMENT ====================
    
    /**
     * FAQ management page
     */
    public function faq() {
        $data['title'] = 'Kelola FAQ';
        $data['faqs'] = $this->faq_model->get_all_faqs();
        
        $this->load_admin_view('admin-gttgn/faq', $data);
    }
    
    /**
     * Add FAQ page
     */
    public function add_faq() {
        $data['title'] = 'Tambah FAQ';
        
        $this->load_admin_view('admin-gttgn/add_faq', $data);
    }
    
    /**
     * Save new FAQ
     */
    public function save_faq() {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required|trim');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required|trim');
        $this->form_validation->set_rules('display_order', 'Urutan Tampil', 'required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_faq();
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'display_order' => $this->input->post('display_order')
            ];
            
            if ($this->faq_model->add_faq($data)) {
                $this->session->set_flashdata('success', 'FAQ berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan FAQ!');
            }
            
            redirect('admin-gttgn/dashboard/faq');
        }
    }
    
    /**
     * Edit FAQ page
     */
    public function edit_faq($id) {
        $data['title'] = 'Edit FAQ';
        $data['faq'] = $this->faq_model->get_faq_by_id($id);
        
        if (!$data['faq']) {
            $this->session->set_flashdata('error', 'FAQ tidak ditemukan!');
            redirect('admin-gttgn/dashboard/faq');
        }
        
        $this->load_admin_view('admin-gttgn/edit_faq', $data);
    }
    
    /**
     * Update FAQ
     */
    public function update_faq($id) {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required|trim');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required|trim');
        $this->form_validation->set_rules('display_order', 'Urutan Tampil', 'required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit_faq($id);
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'display_order' => $this->input->post('display_order')
            ];
            
            if ($this->faq_model->update_faq($id, $data)) {
                $this->session->set_flashdata('success', 'FAQ berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui FAQ!');
            }
            
            redirect('admin-gttgn/dashboard/faq');
        }
    }
    
    /**
     * Delete FAQ
     */
    public function delete_faq($id) {
        if ($this->faq_model->delete_faq($id)) {
            $this->session->set_flashdata('success', 'FAQ berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus FAQ!');
        }
        
        redirect('admin-gttgn/dashboard/faq');
    }
    
    // ==================== INFORMASI MANAGEMENT ====================
    
    /**
     * Informasi content management page
     */
    public function informasi_content() {
        $data['title'] = 'Kelola Konten Informasi';
        $data['content'] = $this->informasi_model->get_content();
        $data['transportation'] = $this->informasi_model->get_all_transportation();
        
        $this->load_admin_view('admin-gttgn/informasi_content', $data);
    }
    
    /**
     * Update informasi content
     */
    public function update_informasi_content() {
        $this->form_validation->set_rules('description', 'Deskripsi Informasi', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->informasi_content();
        } else {
            $data = [
                'description' => $this->input->post('description'),
                'address' => $this->input->post('address'),
            ];
            
            if ($this->informasi_model->update_content($data)) {
                $this->session->set_flashdata('success', 'Konten informasi berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui konten informasi!');
            }
            
            redirect('admin-gttgn/informasi');
        }
    }
    
    /**
     * Add transportation page
     */
    public function add_transportation() {
        $data['title'] = 'Tambah Transportasi';
        
        $this->load_admin_view('admin-gttgn/add_transportation', $data);
    }
    
    /**
     * Save new transportation
     */
    public function save_transportation() {
        $this->form_validation->set_rules('name', 'Nama Transportasi', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('image', 'Gambar', 'required|trim');
        $this->form_validation->set_rules('description_1', 'Deskripsi 1', 'required|trim');
        $this->form_validation->set_rules('description_2', 'Deskripsi 2', 'trim');
        $this->form_validation->set_rules('schedule_note', 'Catatan Jadwal', 'trim');
        $this->form_validation->set_rules('order_position', 'Urutan', 'required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_transportation();
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'icon' => $this->input->post('icon'),
                'image' => $this->input->post('image'),
                'description_1' => $this->input->post('description_1'),
                'description_2' => $this->input->post('description_2'),
                'schedule_note' => $this->input->post('schedule_note'),
                'order_position' => $this->input->post('order_position'),
                'is_active' => 1
            ];
            
            if ($this->informasi_model->add_transportation($data)) {
                $this->session->set_flashdata('success', 'Transportasi berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan transportasi!');
            }
            
            redirect('admin-gttgn/informasi');
        }
    }
    
    /**
     * Edit transportation page
     */
    public function edit_transportation($id) {
        $data['title'] = 'Edit Transportasi';
        $data['transportation'] = $this->informasi_model->get_transportation_by_id($id);
        
        if (!$data['transportation']) {
            $this->session->set_flashdata('error', 'Transportasi tidak ditemukan!');
            redirect('admin-gttgn/informasi');
        }
        
        $this->load_admin_view('admin-gttgn/edit_transportation', $data);
    }
    
    /**
     * Update transportation
     */
    public function update_transportation($id) {
        $this->form_validation->set_rules('name', 'Nama Transportasi', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('image', 'Gambar', 'required|trim');
        $this->form_validation->set_rules('description_1', 'Deskripsi 1', 'required|trim');
        $this->form_validation->set_rules('description_2', 'Deskripsi 2', 'trim');
        $this->form_validation->set_rules('schedule_note', 'Catatan Jadwal', 'trim');
        $this->form_validation->set_rules('order_position', 'Urutan', 'required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit_transportation($id);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'icon' => $this->input->post('icon'),
                'image' => $this->input->post('image'),
                'description_1' => $this->input->post('description_1'),
                'description_2' => $this->input->post('description_2'),
                'schedule_note' => $this->input->post('schedule_note'),
                'order_position' => $this->input->post('order_position')
            ];
            
            if ($this->informasi_model->update_transportation($id, $data)) {
                $this->session->set_flashdata('success', 'Transportasi berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui transportasi!');
            }
            
            redirect('admin-gttgn/informasi');
        }
    }
    
    /**
     * Delete transportation
     */
    public function delete_transportation($id) {
        if ($this->informasi_model->delete_transportation($id)) {
            $this->session->set_flashdata('success', 'Transportasi berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus transportasi!');
        }
        
        redirect('admin-gttgn/informasi');
    }
    
    /**
     * Toggle transportation status
     */
    public function toggle_transportation($id) {
        if ($this->informasi_model->toggle_status($id)) {
            $this->session->set_flashdata('success', 'Status transportasi berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah status transportasi!');
        }
        
        redirect('admin-gttgn/informasi');
    }
    
    // ==================== CONTACT SUBMISSIONS ====================
    
    /**
     * Contact submissions page
     */
    public function contact_submissions() {
        $data['title'] = 'Pesan Kontak';
        $data['submissions'] = $this->contact_submission_model->get_all_submissions();
        
        $this->load_admin_view('admin-gttgn/contact_submissions', $data);
    }
    
    /**
     * View contact submission detail
     */
    public function view_submission($id) {
        $data['title'] = 'Detail Pesan Kontak';
        $data['submission'] = $this->contact_submission_model->get_submission_by_id($id);
        
        if (!$data['submission']) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin-gttgn/dashboard/contact_submissions');
        }
        
        // Mark as read if not already
        if ($data['submission']->status == 'unread') {
            $this->contact_submission_model->update_status($id, 'read');
        }
        
        $this->load_admin_view('admin-gttgn/view_submission', $data);
    }
    
    /**
     * Update submission status
     */
    public function update_submission_status($id, $status) {
        if ($this->contact_submission_model->update_status($id, $status)) {
            $this->session->set_flashdata('success', 'Status pesan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status pesan!');
        }
        
        redirect('admin-gttgn/dashboard/contact_submissions');
    }
    
    /**
     * Delete contact submission
     */
    public function delete_submission($id) {
        if ($this->contact_submission_model->delete_submission($id)) {
            $this->session->set_flashdata('success', 'Pesan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pesan!');
        }
        
        redirect('admin-gttgn/dashboard/contact_submissions');
    }
}
