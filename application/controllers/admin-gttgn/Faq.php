<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('faq_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Kelola FAQ';
        $data['faqs'] = $this->faq_model->get_all_faqs();
        
        $this->load_admin_view('admin-gttgn/faq/list', $data);
    }
    
    public function add() {
        $data['title'] = 'Tambah FAQ';
        
        $this->load_admin_view('admin-gttgn/faq/add_faq', $data);
    }
    
    public function add_process() {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required|trim');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required|trim');
        $this->form_validation->set_rules('display_order', 'Urutan Tampil', 'required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_faq();
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'display_order' => $this->input->post('display_order')
            ];
            
            if ($this->faq_model->add_faq($data)) {
                $this->session->set_flashdata('success', 'FAQ berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan FAQ!');
            }
            
            redirect('admin-gttgn/faq');
        }
    }
    
    public function edit($id) {
        $data['title'] = 'Edit FAQ';
        $data['faq'] = $this->faq_model->get_faq_by_id($id);
        
        if (!$data['faq']) {
            $this->session->set_flashdata('error', 'FAQ tidak ditemukan!');
            redirect('admin-gttgn/faq');
        }
        
        $this->load_admin_view('admin-gttgn/faq/edit_faq', $data);
    }
    
    public function edit_process($id) {
        $this->form_validation->set_rules('question', 'Pertanyaan', 'required|trim');
        $this->form_validation->set_rules('answer', 'Jawaban', 'required|trim');
        $this->form_validation->set_rules('display_order', 'Urutan Tampil', 'required|integer');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit_faq($id);
        } else {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'display_order' => $this->input->post('display_order')
            ];
            
            if ($this->faq_model->update_faq($id, $data)) {
                $this->session->set_flashdata('success', 'FAQ berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui FAQ!');
            }
            
            redirect('admin-gttgn/faq');
        }
    }

    public function delete($id) {
        if ($this->faq_model->delete_faq($id)) {
            $this->session->set_flashdata('success', 'FAQ berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus FAQ!');
        }
        
        redirect('admin-gttgn/faq');
    }
}
