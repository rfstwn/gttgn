<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->load->library('form_validation');
    }
    
     /**
     * Hotel management page
     */
    public function index() {
        $data['title'] = 'Hotel';
        $data['hotels'] = $this->hotel_model->get_all_hotels();
        $data['button_title'] = [
            'url' => base_url('admin-gttgn/hotel/add'),
            'title' => 'Tambah Hotel'
        ];
        
        // Load the hotels management view
        $this->load_admin_view('admin-gttgn/hotel/list', $data);
    }
    
    /**
     * Add hotel page
     */
    public function add() {
        $data['title'] = 'Tambah Hotel';
        
        // Load the add hotel view
        $this->load_admin_view('admin-gttgn/hotel/add_hotel', $data);
    }
    
    /**
     * Save new hotel
     */
    public function save() {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Nama Hotel', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('stars', 'Rating Bintang', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric');
        
        // Handle file upload
        $image_path = 'assets/image/hotel/default.jpg'; // Default image
        if (!empty($_FILES['image_file']['name'])) {
            $config['upload_path'] = './assets/image/hotel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image_file')) {
                $upload_data = $this->upload->data();
                $image_path = 'assets/image/hotel/' . $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Error upload gambar: ' . $this->upload->display_errors());
                $this->add();
                return;
            }
        }
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $this->add();
        } else {
            // Prepare data for insert
            $data = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'stars' => $this->input->post('stars'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'image' => $image_path
            ];
            
            // Save hotel
            if ($this->hotel_model->add_hotel($data)) {
                $this->session->set_flashdata('success', 'Hotel berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan hotel!');
            }
            
            redirect('admin-gttgn/hotel');
        }
    }
    
    /**
     * Edit hotel page
     */
    public function edit($id) {
        $data['title'] = 'Edit Hotel';
        $data['hotel'] = $this->hotel_model->get_hotel_by_id($id);
        
        if (!$data['hotel']) {
            $this->session->set_flashdata('error', 'Hotel tidak ditemukan!');
            redirect('admin-gttgn/hotel');
        }
        
        // Load the edit hotel view
        $this->load_admin_view('admin-gttgn/hotel/edit_hotel', $data);
    }
    
    /**
     * Update hotel
     */
    public function update($id) {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Nama Hotel', 'required|trim');
        $this->form_validation->set_rules('address', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('stars', 'Rating Bintang', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|numeric');
        
        // Handle file upload
        $image_path = $this->input->post('current_image'); // Keep current image by default
        if (!empty($_FILES['image_file']['name'])) {
            $config['upload_path'] = './assets/image/hotel/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image_file')) {
                $upload_data = $this->upload->data();
                $image_path = 'assets/image/hotel/' . $upload_data['file_name'];
                
                // Delete old image if exists and different from new one
                $old_image = $this->input->post('current_image');
                if (!empty($old_image) && $old_image !== 'assets/image/hotel/default.jpg' && file_exists('./' . $old_image)) {
                    unlink('./' . $old_image);
                }
            } else {
                $this->session->set_flashdata('error', 'Error upload gambar: ' . $this->upload->display_errors());
                $this->edit($id);
                return;
            }
        }
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $this->edit($id);
        } else {
            // Prepare data for update
            $data = [
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'stars' => $this->input->post('stars'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'image' => $image_path
            ];
            
            // Update hotel
            if ($this->hotel_model->update_hotel($id, $data)) {
                $this->session->set_flashdata('success', 'Hotel berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui hotel!');
            }
            
            redirect('admin-gttgn/hotel');
        }
    }
    
    /**
     * Delete hotel
     */
    public function delete($id) {
        if ($this->hotel_model->delete_hotel($id)) {
            $this->session->set_flashdata('success', 'Hotel berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus hotel!');
        }
        
        redirect('admin-gttgn/hotel');
    }
}
