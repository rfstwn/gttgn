<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rundown_model');
        $this->load->model('faq_model');
        $this->load->model('province_model');
    }
    
    public function index()
    {
        // Get dynamic FAQ data from database
        $data['faqs'] = $this->faq_model->get_formatted_faqs();
        
        // Get dynamic schedule/rundown data from database
        $data['schedule'] = $this->rundown_model->get_formatted_rundown();

        $data['products'] = [
            [
                'title' => 'Kabel Listrik',
                'image' =>  base_url('assets/image/product/kabel.jpg'),
                'description' => 'Kabel listrik low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Lampu LED',
                'image' => base_url('assets/image/product/lampu.jpg'),
                'description' => 'Kabel listrik low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Panel Surya',
                'image' => base_url('assets/image/product/panel-surya.jpeg'),
                'description' => 'Kabel listrik low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Pemanas Air',
                'image' => base_url('assets/image/product/pemanas-air.jpg'),
                'description' => 'Pemanas Air low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Kompor Listrik',
                'image' => base_url('assets/image/product/kompor.jpg'),
                'description' => 'Pemanas Air low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ]
        ];


        $data['audiences'] = [
            ['count' => '35', 'title' => 'Inventor'],
            ['count' => '38', 'title' => 'Stan Provinsi'],
            ['count' => '15', 'title' => 'Stan BUMN'],
            ['count' => '10', 'title' => 'Stan BUMD'],
            ['count' => '07', 'title' => 'Stan Swasta'],
        ];

        $data['menu_segments'] = $this->uri->segment(1);
        
        $this->load->view('home/index', $data);
    }
}
