<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Authentication Controller
 * 
 * Handles admin login, logout, and authentication
 */
class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('security');
    }
    
    public function index() {
        // Check if already logged in
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin-gttgn/dashboard');
        }
        
        $this->load->view('admin-gttgn/login');
    }
    
    public function login() {
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return to login form with errors
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin-gttgn/auth');
        } else {
            // Get form data
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            // Check credentials
            $admin = $this->admin_model->check_login($email);
            if ($admin && password_verify($password, $admin->password)) {
                // Set session data
                $session_data = array(
                    'admin_id' => $admin->id,
                    'admin_name' => $admin->name,
                    'admin_email' => $admin->email,
                    'admin_logged_in' => TRUE
                );
                
                $this->session->set_userdata($session_data);
                
                // Check if there's a redirect URL stored in session
                if ($this->session->userdata('redirect_url')) {
                    $redirect_url = $this->session->userdata('redirect_url');
                    $this->session->unset_userdata('redirect_url');
                    redirect($redirect_url);
                } else {
                    redirect('admin-gttgn/dashboard');
                }
            } else {
                // Login failed
                $this->session->set_flashdata('error', 'Email atau password salah');
                redirect('admin-gttgn/auth');
            }
        }
    }
    
    public function logout() {
        // Unset admin session data
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_logged_in');
        
        $this->session->set_flashdata('success', 'Anda telah berhasil logout');
        redirect('admin-gttgn/auth');
    }
}
