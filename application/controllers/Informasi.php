<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends MY_Controller
{
    public function index()
    {
        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('informasi/index', $data);
    }
}
