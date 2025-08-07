<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('informasi_model');
        $this->load->library('form_validation');
    }
    
    /**
     * Informasi content management page
     */
    public function index() {
        $data['title'] = 'Informasi';
        $data['content'] = $this->informasi_model->get_content();
        $data['transportation'] = $this->informasi_model->get_all_transportation();
        
        $this->load_admin_view('admin-gttgn/informasi/informasi_content', $data);
    }
    
    /**
     * Update informasi content
     */
    public function edit_informasi_process() {
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
        
        $this->load_admin_view('admin-gttgn/informasi/add_transportation', $data);
    }
    
    /**
     * Save new transportation
     */
    public function add_transportation_process() {
        $this->form_validation->set_rules('name', 'Nama Transportasi', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('description_1', 'Deskripsi 1', 'required|trim');
        $this->form_validation->set_rules('description_2', 'Deskripsi 2', 'trim');
        $this->form_validation->set_rules('schedule_note', 'Catatan Jadwal', 'trim');
        $this->form_validation->set_rules('order_position', 'Urutan', 'required|integer');
        
        // Handle file upload
        $image_name = '';
        if (!empty($_FILES['image_file']['name'])) {
            $config['upload_path'] = './assets/image/transportation/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image_file')) {
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Error upload gambar: ' . $this->upload->display_errors());
                $this->add_transportation();
                return;
            }
        } else {
            $this->session->set_flashdata('error', 'Gambar harus diupload!');
            $this->add_transportation();
            return;
        }
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_transportation();
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'icon' => $this->input->post('icon'),
                'image' => $image_name,
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
        
        $this->load_admin_view('admin-gttgn/informasi/edit_transportation', $data);
    }
    
    /**
     * Update transportation
     */
    public function edit_transportation_process($id) {
        $this->form_validation->set_rules('name', 'Nama Transportasi', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('description_1', 'Deskripsi 1', 'required|trim');
        $this->form_validation->set_rules('description_2', 'Deskripsi 2', 'trim');
        $this->form_validation->set_rules('schedule_note', 'Catatan Jadwal', 'trim');
        $this->form_validation->set_rules('order_position', 'Urutan', 'required|integer');
        
        // Handle file upload
        $image_name = $this->input->post('current_image'); // Keep current image by default
        if (!empty($_FILES['image_file']['name'])) {
            $config['upload_path'] = './assets/image/transportation/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('image_file')) {
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
                
                // Delete old image if exists and different from new one
                $old_image = $this->input->post('current_image');
                if (!empty($old_image) && file_exists('./assets/image/transportation/' . $old_image)) {
                    unlink('./assets/image/transportation/' . $old_image);
                }
            } else {
                $this->session->set_flashdata('error', 'Error upload gambar: ' . $this->upload->display_errors());
                $this->edit_transportation($id);
                return;
            }
        }
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit_transportation($id);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'icon' => $this->input->post('icon'),
                'image' => $image_name,
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
}
