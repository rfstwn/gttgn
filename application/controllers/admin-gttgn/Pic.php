<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('province_model');
        $this->load->model('city_model');
        $this->load->helper('download');
    }
    
    /**
     * User data listing page
     */
    public function index() {
        $data['title'] = 'User PIC';
        $data_pic = $this->user_model->get_all_users();
        foreach ($data_pic as $pic) {
            $pic->prov_id = $this->province_model->get_province_by_id($pic->prov_id);
            $pic->city_id = $this->city_model->get_city_by_id($pic->city_id);
        }
        $data['users'] = $data_pic;
        $data['button_title'] = [
            'url' => base_url('admin-gttgn/pic/export'),
            'title' => 'Export Data'
        ];
        
        // Load the user data view with header and footer
        $this->load_admin_view('admin-gttgn/pic/list', $data);
    }
    
    /**
     * Export user data to Excel
     */
    public function export() {
        // Load Excel export library
        $this->load->library('excel_export');
        
        // Get all users
        $users = $this->user_model->get_all_users();
        
        // Define headers
        $headers = array(
            'No',
            'Tipe Registrasi',
            'Nama Lengkap',
            'No Whatsapp',
            'Provinsi',
            'Kota/Kabupaten',
            'Tanggal Registrasi'
        );
        
        // Prepare data rows
        $data = array();
        foreach ($users as $index => $user) {
            // Map registration type
            $registration_type = ($user->registration_type == 1) ? 'Pemerintah' : 'Non-Pemerintah';
            
            $data[] = array(
                $index + 1,
                $registration_type,
                $user->nama_lengkap,
                $user->no_whatsapp,
                $this->province_model->get_province_by_id($user->prov_id)->prov_name,
                $this->city_model->get_city_by_id($user->city_id)->city_name,
                date('d-m-Y H:i', strtotime($user->created_at))
            );
        }
        
        // Generate filename
        $filename = 'Data_User_GTTGN_' . date('Y-m-d_H-i-s') . '.csv';
        
        // Export to CSV
        $this->excel_export->export_csv($filename, $headers, $data);
    }
}
