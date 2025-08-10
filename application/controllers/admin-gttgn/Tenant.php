<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    /**
     * Display tenant list
     */
    public function index() {
        $data['title'] = 'Data Tenant';
        $data['tenants'] = $this->user_model->get_all_tenants_with_user_info();
        $this->load_admin_view('admin-gttgn/tenant/list', $data);
    }
    
    /**
     * Export tenant data to Excel
     */
    public function export_excel() {
        // Load Excel library
        $this->load->library('excel');
        
        // Get tenant data
        $tenants = $this->user_model->get_all_tenants_with_user_info();
        
        // Define headers
        $headers = [
            'No',
            'Nama Tenant',
            'Produk Utama',
            'No. Telepon',
            'Email',
            'YouTube',
            'Alamat',
            'Nama PIC',
            'Kontak PIC',
            'Tanggal Dibuat'
        ];
        
        // Prepare data array
        $data = [];
        $no = 1;
        foreach ($tenants as $tenant) {
            $data[] = [
                $no++,
                $tenant->nama_tenant,
                $tenant->produk_utama ?? '-',
                $tenant->no_telp ?? '-',
                $tenant->email ?? '-',
                $tenant->youtube ?? '-',
                $tenant->address ?? '-',
                $tenant->user_name ?? '-',
                $tenant->user_whatsapp ?? '-',
                date('d/m/Y H:i', strtotime($tenant->created_at))
            ];
        }
        
        // Generate Excel file
        $this->excel->generate('Data_Tenant_' . date('Y-m-d_H-i-s'), $data, [$headers]);
    }
    
    /**
     * Export tenant data to PDF
     */
    public function export_pdf() {
        // Get tenant data
        $data['tenants'] = $this->user_model->get_all_tenants_with_user_info();
        $data['title'] = 'Data Tenant GTTGN';
        
        // Load view to string
        $html = $this->load->view('admin-gttgn/tenant/pdf_export', $data, true);
        
        // Generate PDF
        $this->load->library('pdf');
        $this->pdf->create($html, 'Data_Tenant_' . date('Y-m-d_H-i-s') . '.pdf');
        
    }
    
    /**
     * Get tenant detail via AJAX for admin
     */
    public function get_detail($tenant_id) {
        // Get tenant data
        $tenant = $this->user_model->get_tenant_by_id($tenant_id);
        
        if (!$tenant) {
            echo json_encode(['success' => false, 'message' => 'Tenant tidak ditemukan']);
            return;
        }
        
        echo json_encode([
            'success' => true,
            'tenant' => $tenant
        ]);
    }
}
