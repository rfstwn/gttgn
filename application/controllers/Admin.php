<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Legacy Admin Controller
 * 
 * This controller now redirects to the new grouped controllers
 */
class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    /**
     * Login page
     */
    public function index() {
        // Redirect to new auth controller
        redirect('admin/auth');
    }
    
    /**
     * Process login form
     */
    public function login() {
        // Redirect to new auth controller
        redirect('admin/auth/login');
    }
    
    /**
     * Dashboard page
     */
    public function dashboard() {
        // Redirect to new dashboard controller
        redirect('admin/dashboard');
    }
    
    /**
     * Logout function
     */
    public function logout() {
        // Redirect to new auth controller logout
        redirect('admin/auth/logout');
    }
    
    /**
     * User management page
     */
    public function users() {
        // Redirect to new user admin controller
        redirect('admin/user-admin');
    }
    
    /**
     * Add user form
     */
    public function add_user() {
        // Redirect to new user admin controller add
        redirect('admin/user-admin/add');
    }
    
    /**
     * Process add user form
     */
    public function save_user() {
        // Redirect to new user admin controller save
        redirect('admin/user-admin/save');
    }
    
    /**
     * Edit user form
     */
    public function edit_user($id) {
        // Redirect to new user admin controller edit
        redirect('admin/user-admin/edit/' . $id);
    }
    
    /**
     * Process edit user form
     */
    public function update_user() {
        // Redirect to new user admin controller update
        redirect('admin/user-admin/update');
    }
    
    /**
     * Delete user
     */
    public function delete_user($id) {
        // Redirect to new user admin controller delete
        redirect('admin/user-admin/delete/' . $id);
    }
}
