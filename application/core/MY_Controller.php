<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Admin Controller
 * 
 * This class serves as the base controller for all admin controllers.
 * It provides common functionality and authentication checks.
 */
class MY_Controller extends CI_Controller {
    
    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        
        // Check if user is logged in for all admin pages except auth controller
        $current_class = $this->router->fetch_class();
        $current_directory = $this->router->fetch_directory();
        
        // Only apply authentication check for controllers in 4dm1n directory
        if ($current_directory == '4dm1n/' && !$this->session->userdata('admin_logged_in') && $current_class != 'auth') {
            
            // Store the requested URL to redirect back after login
            $this->session->set_userdata('redirect_url', current_url());
            
            // Redirect to login page
            redirect('admin/auth');
        }
    }
    
    /**
     * Load admin view with header and footer
     * 
     * @param string $view View name
     * @param array $data Data to pass to the view
     */
    protected function load_admin_view($view, $data = array()) {
        // Add admin name to data if logged in
        if ($this->session->userdata('admin_logged_in')) {
            $data['admin_name'] = $this->session->userdata('admin_name');
        }
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view($view, $data);
        $this->load->view('admin/templates/footer');
    }
}
