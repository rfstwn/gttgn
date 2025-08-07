<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('contact_model');
        $this->load->model('contact_submission_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        // Get dynamic contact information from database
        $contact_info_db = $this->contact_model->get_contact_info();
        
        // Convert to array format expected by the view
        $data['contact_info'] = [
            'address' => $contact_info_db->address,
            'phone' => $contact_info_db->phone,
            'fax' => $contact_info_db->fax,
            'email' => $contact_info_db->email,
            'website' => $contact_info_db->website,
            'website_name' => $contact_info_db->website_name,
            'maps_embed' => $contact_info_db->maps_embed,
            'office_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB', // Keep static for now
            'social_media' => [
                ['name' => 'Facebook', 'icon' => 'fab fa-facebook-f', 'url' => 'https://facebook.com/gttgn'],
                ['name' => 'Twitter', 'icon' => 'fab fa-twitter', 'url' => 'https://twitter.com/gttgn'],
                ['name' => 'Instagram', 'icon' => 'fab fa-instagram', 'url' => 'https://instagram.com/gttgn'],
                ['name' => 'LinkedIn', 'icon' => 'fab fa-linkedin-in', 'url' => 'https://linkedin.com/company/gttgn'],
                ['name' => 'YouTube', 'icon' => 'fab fa-youtube', 'url' => 'https://youtube.com/gttgn']
            ]
        ];

        $data['contact_form'] = [
            'title' => 'Kirim Pesan',
            'description' => 'Silakan isi formulir di bawah ini untuk mengirimkan pesan kepada kami. Kami akan merespons pesan Anda sesegera mungkin.'
        ];
        
        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('kontak/index', $data);
    }
    
    /**
     * Handle contact form submission
     */
    public function submit() {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Telepon', 'trim');
        $this->form_validation->set_rules('subject', 'Subjek', 'required|trim');
        $this->form_validation->set_rules('message', 'Pesan', 'required|trim');
        $this->form_validation->set_rules('privacy', 'Kebijakan Privasi', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload form with errors
            $this->session->set_flashdata('error', 'Mohon lengkapi semua field yang diperlukan dengan benar.');
            $this->session->set_flashdata('form_data', $this->input->post());
            redirect('kontak');
        } else {
            // Prepare data for submission
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'status' => 'new'
            ];
            
            // Save contact submission
            if ($this->contact_submission_model->add_submission($data)) {
                $this->session->set_flashdata('success', 'Pesan Anda berhasil dikirim! Kami akan segera merespons.');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
            }
            
            redirect('kontak');
        }
    }
}
