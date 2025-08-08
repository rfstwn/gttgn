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
        // Use the enhanced method that includes participant, tenant, and product counts
        $data['users'] = $this->user_model->get_all_users_with_details();
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
    
    /**
     * Get user participants via AJAX
     */
    public function get_participants() {
        $user_id = $this->input->post('user_id');
        
        if (!$user_id) {
            echo '<div class="alert alert-danger">Invalid user ID</div>';
            return;
        }
        
        $participants = $this->user_model->get_user_participants($user_id);
        
        if (empty($participants)) {
            echo '<div class="alert alert-info">No participants found</div>';
            return;
        }
        
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Nama Lengkap</th><th>No. WhatsApp</th><th>Jabatan</th><th>Status</th><th>Tanggal</th></tr></thead>';
        echo '<tbody>';
        
        foreach ($participants as $participant) {
            $status_badge = $participant->is_present ? 'bg-success' : 'bg-secondary';
            $status_text = $participant->is_present ? 'Hadir' : 'Tidak Hadir';
            
            echo '<tr>';
            echo '<td>' . htmlspecialchars($participant->nama_lengkap) . '</td>';
            echo '<td>' . htmlspecialchars($participant->no_whatsapp) . '</td>';
            echo '<td>' . htmlspecialchars($participant->jabatan) . '</td>';
            echo '<td><span class="badge ' . $status_badge . '">' . $status_text . '</span></td>';
            echo '<td>' . date('d/m/Y H:i', strtotime($participant->created_at)) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody></table></div>';
    }
    
    /**
     * Get user tenants via AJAX
     */
    public function get_tenants() {
        $user_id = $this->input->post('user_id');
        
        if (!$user_id) {
            echo '<div class="alert alert-danger">Invalid user ID</div>';
            return;
        }
        
        $tenants = $this->user_model->get_user_tenants($user_id);
        
        if (empty($tenants)) {
            echo '<div class="alert alert-info">No tenants found</div>';
            return;
        }
        
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Nama Tenant</th><th>Tanggal Dibuat</th></tr></thead>';
        echo '<tbody>';
        
        foreach ($tenants as $tenant) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($tenant->nama_tenant) . '</td>';
            echo '<td>' . date('d/m/Y H:i', strtotime($tenant->created_at)) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody></table></div>';
    }
    
    /**
     * Get user products via AJAX
     */
    public function get_products() {
        $user_id = $this->input->post('user_id');
        
        if (!$user_id) {
            echo '<div class="alert alert-danger">Invalid user ID</div>';
            return;
        }
        
        $products = $this->user_model->get_user_products($user_id);
        
        if (empty($products)) {
            echo '<div class="alert alert-info">No products found</div>';
            return;
        }
        
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Gambar</th><th>Nama Produk</th><th>Tenant</th><th style="width: 250px;">Deskripsi</th><th>Video</th><th>Katalog</th><th>Tanggal</th></tr></thead>';
        echo '<tbody>';
        
        foreach ($products as $product) {
            echo '<tr>';
            
            // Image
            echo '<td>';
            if ($product->image_1) {
                echo '<img src="' . base_url('assets/image/produk/' . $product->image_1) . '" alt="' . htmlspecialchars($product->name) . '" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">';
            } else {
                echo '<span class="text-muted">No Image</span>';
            }
            echo '</td>';
            
            // Product name
            echo '<td>' . htmlspecialchars($product->name) . '</td>';
            
            // Tenant
            echo '<td>' . htmlspecialchars($product->nama_tenant) . '</td>';
            
            // Description
            $description = htmlspecialchars(substr($product->description, 0, 100));
            if (strlen($product->description) > 100) {
                $description .= '...';
            }
            echo '<td>' . $description . '</td>';
            
            // Video
            echo '<td>';
            if ($product->video) {
                echo '<a href="' . htmlspecialchars($product->video) . '" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-play"></i></a>';
            } else {
                echo '<span class="text-muted">-</span>';
            }
            echo '</td>';
            
            // Katalog
            echo '<td>';
            if ($product->katalog) {
                echo '<a href="' . base_url('assets/image/produk/' . $product->katalog) . '" target="_blank" class="btn btn-sm btn-outline-success"><i class="fas fa-file-pdf"></i></a>';
            } else {
                echo '<span class="text-muted">-</span>';
            }
            echo '</td>';
            
            // Date
            echo '<td>' . date('d/m/Y H:i', strtotime($product->created_at)) . '</td>';
            echo '</tr>';
        }
        
        echo '</tbody></table></div>';
    }
}
