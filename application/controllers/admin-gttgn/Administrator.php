<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin User Management Controller
 * 
 * Handles admin user management functionality
 */
class Administrator extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
    }
    
    /**
     * User management page
     */
    public function index() {
        $data['title'] = 'User Administrator';
        $data['users'] = $this->admin_model->get_all_users();
        $data['button_title'] = [
            'url' => base_url('admin-gttgn/administrator/add'),
            'title' => 'Tambah'
        ];
        
        // Load the users view with header and footer
        $this->load_admin_view('admin-gttgn/administrator/users', $data);
    }
    
    /**
     * Add user form
     */
    public function add() {
        $data['title'] = 'Tambah User Administrator';
        
        // Load the add user view with header and footer
        $this->load_admin_view('admin-gttgn/administrator/add_user', $data);
    }
    
    /**
     * Process add user form
     */
    public function add_process() {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return to form with errors
            $data['title'] = 'Tambah User Administrator';
            
            $this->load_admin_view('admin-gttgn/administrator/add_user', $data);
        } else {
            // Hash password
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            
            // Prepare data
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $password
            );
            
            // Save user
            $result = $this->admin_model->add_user($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'User berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan user');
            }
            
            redirect('admin-gttgn/administrator');
        }
    }
    
    /**
     * Edit user form
     */
    public function edit($id) {
        $data['title'] = 'Edit User Administrator';
        $data['user'] = $this->admin_model->get_user_by_id($id);
        
        if (!$data['user']) {
            $this->session->set_flashdata('error', 'User tidak ditemukan');
            redirect('admin-gttgn/administrator');
        }
        
        $this->load_admin_view('admin-gttgn/administrator/edit_user', $data);
    }
    
    /**
     * Process edit user form
     */
    public function edit_process() {
        $user_id = $this->input->post('id');
        $current_user = $this->admin_model->get_user_by_id($user_id);
        
        if (!$current_user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan');
            redirect('admin-gttgn/administrator');
        }
        
        // Check if email is changed
        if ($this->input->post('email') != $current_user->email) {
            $is_unique = '|is_unique[user_admin.email]';
        } else {
            $is_unique = '';
        }
        
        // Set validation rules
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email'.$is_unique);
        
        // Only validate password if it's being changed
        if (!empty($this->input->post('password'))) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'trim|matches[password]');
        }
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return to form with errors
            $data['title'] = 'Edit User Administrator';
            $data['user'] = $current_user;
            
            $this->load_admin_view('admin-gttgn/administrator/edit_user', $data);
        } else {
            // Prepare data
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            );
            
            // Update password if provided
            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            
            // Update user
            $result = $this->admin_model->update_user($user_id, $data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'User berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate user');
            }
            
            redirect('admin-gttgn/administrator');
        }
    }
    
    /**
     * Delete user
     */
    public function delete($id) {
        // Check if user exists
        $user = $this->admin_model->get_user_by_id($id);
        
        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan');
            redirect('admin-gttgn/administrator');
        }
        
        // Cannot delete yourself
        if ($id == $this->session->userdata('admin_id')) {
            $this->session->set_flashdata('error', 'Anda tidak dapat menghapus akun Anda sendiri');
            redirect('admin-gttgn/administrator');
        }
        
        // Delete user
        $result = $this->admin_model->delete_user($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'User berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user');
        }
        
        redirect('admin-gttgn/administrator');
    }
}
