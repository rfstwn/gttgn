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
}
