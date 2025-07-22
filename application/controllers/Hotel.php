<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends MY_Controller
{
    public function index()
    {
        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('hotel/index', $data);
    }
}
