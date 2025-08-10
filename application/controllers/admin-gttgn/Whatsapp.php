<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data['title'] = 'WhatsApp Blast';
        $this->load_admin_view('admin-gttgn/whatsapp/index', $data);
    }
    
    public function send_blast() {
        // Get form data
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        
        // Validate input
        if (empty($subject) || empty($message)) {
            $this->session->set_flashdata('error', 'Subject dan pesan harus diisi!');
            redirect('admin-gttgn/whatsapp');
            return;
        }
        
        // TODO: Implement actual WhatsApp sending logic here
        // For now, just show success message
        $this->session->set_flashdata('success', 'Data blast WhatsApp berhasil disimpan! (Fitur pengiriman akan diimplementasikan kemudian)');
        
        redirect('admin-gttgn/whatsapp');
    }
}
