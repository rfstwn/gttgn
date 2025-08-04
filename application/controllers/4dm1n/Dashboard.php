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
    }
    
    /**
     * Dashboard page
     */
    public function index() {
        $data['title'] = 'Dashboard Admin';
        
        // Load the dashboard view with header and footer
        $this->load_admin_view('admin/dashboard', $data);
    }
}
