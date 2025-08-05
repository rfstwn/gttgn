<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('informasi_model');
    }

    public function index()
    {
        $data['menu_segments'] = $this->uri->segment(1);
        
        // Load informasi content from database
        $data['informasi_content'] = $this->informasi_model->get_content();
        
        // Load transportation data from database
        $data['transportation_list'] = $this->informasi_model->get_transportation();
        
        $this->load->view('informasi/index', $data);
    }
}
