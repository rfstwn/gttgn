<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    
    /**
     * Registration form processing
     */
    public function register() {
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_whatsapp', 'No Whatsapp', 'required|trim|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('province_id', 'Provinsi', 'required|numeric');
        $this->form_validation->set_rules('city_id', 'Kota/Kabupaten', 'required|numeric');
        $this->form_validation->set_rules('kode_unik', 'Kode Unik', 'required|trim|callback_validate_kode_unik');
        
        // Check if validation fails
        if ($this->form_validation->run() == FALSE) {
            // Return to the registration form with errors
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
            redirect(base_url());
        } else {
            // Prepare data for database insertion
            $data = array(
                'registration_type' => $this->input->post('registrationType') ?: 1,
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_whatsapp' => $this->input->post('no_whatsapp'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'prov_id' => $this->input->post('province_id'),
                'city_id' => $this->input->post('city_id'),
                'kode_unik' => $this->input->post('kode_unik')
            );
            
            // Save data to database
            $result = $this->user_model->save_registration($data);
            
            if ($result) {
                // Registration successful
                $this->session->set_flashdata('success', 'Registrasi berhasil! Terima kasih telah mendaftar.');
            } else {
                // Registration failed
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            }
            
            // Redirect to homepage
            redirect(base_url());
        }
    }
    
    /**
     * Custom validation callback for kode_unik field
     * 
     * @param string $code The code to validate
     * @return bool TRUE if valid, FALSE otherwise
     */
    public function validate_kode_unik($code) {
        if (!$this->user_model->validate_unique_code($code)) {
            $this->form_validation->set_message('validate_kode_unik', 'Kode Unik tidak valid. Kode harus GTTGNXXVI.');
            return FALSE;
        }
        return TRUE;
    }
    
    /**
     * User login processing
     */
    public function login() {
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('no_whatsapp', 'No Whatsapp', 'required|trim|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'No. WhatsApp dan password harus diisi dengan benar.');
            redirect(base_url());
        } else {
            $no_whatsapp = $this->input->post('no_whatsapp');
            $password = $this->input->post('password');
            
            // Authenticate user
            $user = $this->user_model->authenticate($no_whatsapp, $password);
            
            if ($user) {
                // Set session data
                $session_data = array(
                    'user_id' => $user->id,
                    'nama_lengkap' => $user->nama_lengkap,
                    'no_whatsapp' => $user->no_whatsapp,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                
                $this->session->set_flashdata('success', 'Login berhasil! Selamat datang, ' . $user->nama_lengkap);
                redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('error', 'No. WhatsApp atau password salah.');
                redirect(base_url());
            }
        }
    }
    
    /**
     * User logout
     */
    public function logout() {
        // Destroy session
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda telah berhasil logout.');
        redirect(base_url());
    }
    
    /**
     * User dashboard - protected page
     */
    public function dashboard() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        $data['title'] = 'Dashboard PIC User';
        $data['user'] = (object) array(
            'id' => $this->session->userdata('user_id'),
            'nama_lengkap' => $this->session->userdata('nama_lengkap'),
            'no_whatsapp' => $this->session->userdata('no_whatsapp')
        );
        
        // Get user's participants and tenants
        $data['participants'] = $this->user_model->get_user_participants($data['user']->id);
        $data['tenants'] = $this->user_model->get_user_tenants($data['user']->id);
        $data['menu_segments'] = $this->uri->segment(1);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav'); 
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * Add participant
     */
    public function add_participant() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_whatsapp', 'No Whatsapp', 'required|trim|numeric');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
        } else {
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_whatsapp' => $this->input->post('no_whatsapp'),
                'jabatan' => $this->input->post('jabatan')
            );
            
            $result = $this->user_model->save_participant($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Participant berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan participant.');
            }
        }
        
        redirect('user/dashboard');
    }
    
    /**
     * Add tenant
     */
    public function add_tenant() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_tenant', 'Nama Tenant', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
        } else {
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'nama_tenant' => $this->input->post('nama_tenant')
            );
            
            $result = $this->user_model->save_tenant($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Tenant berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan tenant.');
            }
        }
        
        redirect('user/dashboard');
    }
}
