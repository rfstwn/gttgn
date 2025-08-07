<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rundown extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('rundown_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Kelola Jadwal Kegiatan';
        $data['rundown'] = $this->rundown_model->get_all_rundown();
        
        $this->load_admin_view('admin-gttgn/rundown/list', $data);
    }
    
    public function add() {
        $data['title'] = 'Tambah Jadwal Kegiatan';
        
        $this->load_admin_view('admin-gttgn/rundown/add_rundown', $data);
    }
    
    public function add_process() {
        $this->form_validation->set_rules('event_title', 'Judul Kegiatan', 'required|trim');
        $this->form_validation->set_rules('event_date', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_rundown();
        } else {
            $data = [
                'event_title' => $this->input->post('event_title'),
                'event_date' => $this->input->post('event_date'),
                'description' => $this->input->post('description')
            ];
            
            if ($this->rundown_model->add_rundown($data)) {
                $this->session->set_flashdata('success', 'Jadwal kegiatan berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan jadwal kegiatan!');
            }
            
            redirect('admin-gttgn/rundown');
        }
    }
    
    public function edit($id) {
        $data['title'] = 'Edit Jadwal Kegiatan';
        $data['rundown'] = $this->rundown_model->get_rundown_by_id($id);
        
        if (!$data['rundown']) {
            $this->session->set_flashdata('error', 'Jadwal kegiatan tidak ditemukan!');
            redirect('admin-gttgn/rundown');
        }
        
        $this->load_admin_view('admin-gttgn/rundown/edit_rundown', $data);
    }
    
    public function edit_process($id) {
        $this->form_validation->set_rules('event_title', 'Judul Kegiatan', 'required|trim');
        $this->form_validation->set_rules('event_date', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit_rundown($id);
        } else {
            $data = [
                'event_title' => $this->input->post('event_title'),
                'event_date' => $this->input->post('event_date'),
                'description' => $this->input->post('description')
            ];
            
            if ($this->rundown_model->update_rundown($id, $data)) {
                $this->session->set_flashdata('success', 'Jadwal kegiatan berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui jadwal kegiatan!');
            }
            
            redirect('admin-gttgn/rundown');
        }
    }
    
    public function delete($id) {
        if ($this->rundown_model->delete_rundown($id)) {
            $this->session->set_flashdata('success', 'Jadwal kegiatan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus jadwal kegiatan!');
        }
        
        redirect('admin-gttgn/rundown');
    }
}
