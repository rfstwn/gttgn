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
        $this->load->model('product_model');
    }
    
    public function index()
    {
        // Get dynamic FAQ data from database
        $data['faqs'] = $this->faq_model->get_formatted_faqs();
        
        // Get dynamic schedule/rundown data from database
        $data['schedule'] = $this->rundown_model->get_formatted_rundown();

        // Get random products from database for homepage
        $products_data = $this->product_model->get_random_products(5);
        $data['products'] = array();
        foreach ($products_data as $product) {
            $data['products'][] = $this->product_model->format_product_for_display($product);
        }


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
