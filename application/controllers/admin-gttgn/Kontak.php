<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('contact_model');
        $this->load->model('contact_submission_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Kelola Informasi Kontak';
        $data['contact_info'] = $this->contact_model->get_contact_info();
        
        // Load the contact info view
        $this->load_admin_view('admin-gttgn/kontak/contact_info', $data);
    }
    
    public function edit_kontak_process() {
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
            
            redirect('admin-gttgn/kontak');
        }
    }


    public function submission() {
        $data['title'] = 'Pesan Kontak';
        $data['submissions'] = $this->contact_submission_model->get_all_submissions();
        
        $this->load_admin_view('admin-gttgn/kontak/submission', $data);
    }
    
    /**
     * View contact submission detail
     */
    public function submission_detail($id) {
        $data['title'] = 'Detail Pesan Kontak';
        $data['submission'] = $this->contact_submission_model->get_submission_by_id($id);
        
        if (!$data['submission']) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin-gttgn/kontak/submission');
        }
        
        // Mark as read if not already
        if ($data['submission']->status == 'unread') {
            $this->contact_submission_model->update_status($id, 'read');
        }
        
        $this->load_admin_view('admin-gttgn/kontak/submission_detail', $data);
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
        
        redirect('admin-gttgn/kontak/submission');
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
        
        redirect('admin-gttgn/kontak/submission');
    }
}
