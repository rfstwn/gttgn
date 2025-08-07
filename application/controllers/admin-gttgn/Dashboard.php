<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('contact_submission_model');
        $this->load->library('form_validation');
    }
    
    public function index() {
        $data['title'] = 'Dashboard Admin';
        $data['shortcut_dashboard'] = [
            [
                'title' => 'User PIC',
                'count' => $this->user_model->count_all(),
                'description' => 'User PIC terdaftar',
                'link' => base_url('admin-gttgn/pic'),
            ],
            [
                'title' => 'Pesan Kontak',
                'count' => $this->contact_submission_model->count_by_status('new'),
                'description' => 'Pesan kontak baru',
                'link' => base_url('admin-gttgn/kontak/submission')
            ]
        ];
        // Load the dashboard view with header and footer
        $this->load_admin_view('admin-gttgn/dashboard', $data);
    }
}
