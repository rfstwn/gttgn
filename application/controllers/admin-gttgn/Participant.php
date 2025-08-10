<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participant extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    /**
     * Display participant list
     */
    public function index() {
        $data['title'] = 'Data Participant';
        $data['participants'] = $this->user_model->get_all_participants_with_user_info();
        $this->load_admin_view('admin-gttgn/participant/list', $data);
    }
    
    /**
     * Export participant data to Excel
     */
    public function export_excel() {
        // Load Excel library
        $this->load->library('excel');
        
        // Get participant data
        $participants = $this->user_model->get_all_participants_with_user_info();
        
        // Define headers
        $headers = [
            'No',
            'Nama Participant',
            'No. WhatsApp',
            'Jabatan',
            'Status Kehadiran',
            'PIC',
            'Kontak PIC',
            'Tanggal Dibuat'
        ];
        
        // Prepare data array
        $data = [];
        $no = 1;
        foreach ($participants as $participant) {
            $data[] = [
                $no++,
                $participant->nama_lengkap,
                $participant->no_whatsapp,
                $participant->jabatan,
                $participant->is_present ? 'Hadir' : 'Tidak Hadir',
                $participant->user_name ?? '-',
                $participant->user_whatsapp ?? '-',
                date('d/m/Y H:i', strtotime($participant->created_at))
            ];
        }
        
        // Generate Excel file
        $this->excel->generate('Data_Participant_' . date('Y-m-d_H-i-s'), $data, [$headers]);
    }
    
    /**
     * Export participant data to PDF
     */
    public function export_pdf() {
        // Get participant data
        $data['participants'] = $this->user_model->get_all_participants_with_user_info();
        $data['title'] = 'Data Participant GTTGN';
        
        // Load the view into a string
        $html = $this->load->view('admin-gttgn/participant/pdf_export', $data, true);

        // Load PDF library and create file
        $this->load->library('pdf');
        $this->pdf->create($html, 'Data_Participant_' . date('Y-m-d_H-i-s') . '.pdf');
    }
}
